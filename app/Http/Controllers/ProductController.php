<?php

namespace App\Http\Controllers;
use Log;
use Carbon\Carbon;
use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Models\CompanyDetail;
use App\Events\ProductClicked;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    public function create(Request $request)
    {
        $companies = CompanyDetail::select('id', 'name')->get(); // Only fetch id and name
        $subcategories = Subcategory::select('id', 'name')->get(); // Only fetch id and name
        $categories = Category::select('id', 'name')->get(); // Only fetch id and name

        // Pass the data to the view
        return view('adminpanel.products.create', compact('subcategories', 'categories', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'company_id' => 'required|exists:company_details,id', // Validate company_id exists in company_details table
            'description' => 'required|string',
            'subcategory_id' => 'required|exists:subcategories,id',
            'category_type' => 'required|in:Top,Trending,New Arrival',
            'image_url' => 'required|file|image|max:10240',
            'material' => 'nullable|string',
            'size' => 'nullable|string',
        ]);

        $imagePath = null;

        // Handle `image_url` upload
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
            $imagePath = $image->move(public_path('images'), $imageName); // Store in public/images
            $imagePath = 'images/' . $imageName; // Save the relative path in the database
        }

        // Create the product with the company_id
        Product::create(array_merge($request->only([
            'name',
            'company_id', // Include company_id in the product creation
            'description',
            'subcategory_id',
            'category_type',
            'material',
            'size',
        ]), [
            'image_url' => $imagePath,
        ]));

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully');
    }

    public function index()
    {
        $products = Product::all();

        return view('adminpanel.products.index', compact('products'));
    }

    public function edit($id)
    {
        $subcategories = Subcategory::all();
        $product = Product::findOrFail($id);
        $categories = Category::all(); // Retrieve all categories

        return view('adminpanel.products.edit', compact('product', 'categories', 'subcategories'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validate incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'subcategory_id' => 'required|exists:subcategories,id',
            'category_type' => 'required|in:Top,Trending,New Arrival',
            'material' => 'nullable|string',
            'size' => 'nullable|string',
            'companyname' => 'required|string|max:255', // Add validation for company name
            'logo_url' => 'nullable|file|image|max:10240', // Add validation for logo
            'image_url' => 'nullable|file|image|max:10240', // Image is optional during update
        ]);

        $updateData = $request->except(['image_url', 'logo_url']); // Exclude file fields from the data array

        // Handle image_url update
        if ($request->hasFile('image_url')) {
            // Delete old image if it exists
            if ($product->image_url && file_exists(public_path($product->image_url))) {
                unlink(public_path($product->image_url));
            }

            // Store new image
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
            $image->move(public_path('images'), $imageName); // Save to public/images
            $updateData['image_url'] = 'images/' . $imageName; // Save relative path in the database
        }

        // Handle logo_url update
        if ($request->hasFile('logo_url')) {
            // Delete old logo if it exists
            if ($product->logo_url && file_exists(public_path($product->logo_url))) {
                unlink(public_path($product->logo_url));
            }

            // Store new logo
            $logo = $request->file('logo_url');
            $logoName = time() . '_' . $logo->getClientOriginalName(); // Unique filename for logo
            $logo->move(public_path('logos'), $logoName); // Save to public/logos
            $updateData['logo_url'] = 'logos/' . $logoName; // Save relative path in the database
        }

        // Update the product with the new data
        $product->update($updateData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully');
    }


    // Delete a product
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully');
    }

    public function userHomePage()
    {
        $topCategoryProducts = Product::where('category_type', 'Top')->take(4)->get();
        $trendingCategoryProducts = Product::where('category_type', 'Trending')->take(4)->get();
        $newArrivalCategoryProducts = Product::where('category_type', 'New Arrival')
            ->orderBy('id', 'desc')
            ->take(8)->get();
        $blogs = Blog::all();
        return view('layouts.welcome', compact('topCategoryProducts', 'trendingCategoryProducts', 'newArrivalCategoryProducts', 'blogs'));
    }
    public function topCategoryPage()
    {
        $topCategoryProducts = Product::where('category_type', 'Top')->get();

        return view('innertopcategory', compact('topCategoryProducts'));
    }

    public function trendingCategoryPage()
    {
        $trendingCategoryProducts = Product::where('category_type', 'Trending')->get();

        return view('alltrendingcategory', compact('trendingCategoryProducts'));
    }

    public function newArrivalCategoryPage()
    {
        $newArrivalCategoryProducts = Product::where('category_type', 'New Arrival')->get();

        return view('allnewarrival', compact('newArrivalCategoryProducts'));
    }

    public function show($id)
    {
        // Retrieve the product by its ID
        $product = Product::with(['company', 'category', 'subcategory'])->findOrFail($id);
        $user = auth()->user();
        if (Auth::check()) {
            $clickedProducts = session()->get('clicked_products', []);
            $clickedCompany = session()->get('clicked_company', []);

            $productCompanyid = $product->company->id;
            if (!in_array($id, $clickedProducts)) {
                if (!in_array($productCompanyid, $clickedCompany)) {
                    $clickedProducts[] = $id;
                    $clickedCompany[] = $productCompanyid;
                    session()->put('clicked_products', $clickedProducts);
                    session()->put('clicked_company', $clickedCompany);
                    event(new ProductClicked($product, $user));
                }
            }
        }

        return view('productdetails', compact('product'));
    }
    // Pass the product details to the view
    //  return redirect()->route('user.home')->with('alert', 'Please log in to view product details.');
    //  }

    public function productDetail($id)
    {

        $product = Product::with('company')->findOrFail($id);
        return view('product.detail', ['product' => $product]);
    }
    public function companyProducts(Request $request, $id)
    {
        // Fetch the company using the provided id
        $company = CompanyDetail::findOrFail($id);

        // Fetch all companies for the filter
        $companies = CompanyDetail::select('id', 'name')->get();

        // Get selected company IDs from checkbox filters (if any)
        $selectedCompanyIds = $request->has('company_ids') ? $request->company_ids : [$id]; // Default to the current company if no filter is selected

        // Fetch products for the selected companies
        $products = Product::whereIn('company_id', $selectedCompanyIds)->get();

        // Pass the company, selected company IDs, companies, and products to the view
        return view('company.products', compact('company', 'companies', 'products', 'selectedCompanyIds'));
    }
    //  public function search(Request $request)
//     {
//         $searchTerm = $request->input('query');

    //         // Searching in Products, Categories, Companies, Sub-categories
//         // $products = Product::where('name', 'like', "%{$searchTerm}%")
//         //                    ->orWhere('description', 'like', "%{$searchTerm}%")
//         //                    ->get();


    //         $categories = Category::where('name', 'like', "%{$searchTerm}%")
//                              ->get();


    //         $companies = CompanyDetail::where('name', 'like', "%{$searchTerm}%")
//                             ->orWhere('description', 'like', "%{$searchTerm}%")
//                             ->get();

    //         $subCategories = SubCategory::where('name', 'like', "%{$searchTerm}%")
//                                      ->get();
//         $products = Product::with(['company', 'category', 'subcategory'])
//     ->where(function ($query) use ($searchTerm) {
//         $query->where('name', 'like', "%{$searchTerm}%")
//               ->orWhere('description', 'like', "%{$searchTerm}%");
//     })
//     ->when($companies->id->isNotEmpty(), function ($query) use ($companyIds) {
//         $query->whereIn('company_id', $companyIds);
//     })
//     ->when($categories->id->isNotEmpty(), function ($query) use ($categoryIds) {
//         $query->whereIn('category_id', $categoryIds);
//     })
//     ->when($$subCategories->id->isNotEmpty(), function ($query) use ($subCategoryIds) {
//         $query->whereIn('sub_category_id', $subCategoryIds);
//     })
//     ->get();

    //         // Combine results into one collection (or you can return them separately)
//         $results = collect([
//             'products' => $products,
//             'categories' => $categories,
//             'companies' => $companies,
//             'subCategories' => $subCategories,
//         ]);

    //         return view('searchresult', compact('results', 'searchTerm'));
//         // return view('company.products', compact('company', 'companies', 'products', 'selectedCompanyIds'));
//     }
    public function filterProducts(Request $request)
    {
        $companyIds = $request->input('company_ids', []);
        $categoryIds = $request->input('category_ids', []);
        $subCategoryIds = $request->input('subcategory_ids', []);

        // Query products based on the selected filters
        $products = Product::with(['company', 'category', 'subcategory'])
            ->when(!empty($companyIds), function ($query) use ($companyIds) {
                $query->whereIn('company_id', $companyIds);
            })
            ->when(!empty($categoryIds), function ($query) use ($categoryIds) {
                $query->whereIn('category_id', $categoryIds);
            })
            ->when(!empty($subCategoryIds), function ($query) use ($subCategoryIds) {
                $query->whereIn('sub_category_id', $subCategoryIds);
            })
            ->get();

        // Return the filtered products as JSON
        return response()->json(['products' => $products]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('query');

        // Searching in Categories, Companies, Sub-categories
        $categories = Category::where('name', 'like', "%{$searchTerm}%");
        // $categories = SubCategory::whereIn('category_id', $categories);
        $companies = CompanyDetail::where('name', 'like', "%{$searchTerm}%")
            ->orWhere('description', 'like', "%{$searchTerm}%")
            ->get();
        $subCategories = SubCategory::where('name', 'like', "%{$searchTerm}%")->get();

        // Extract the IDs of the companies, categories, and subcategories
        $companyIds = $companies->pluck('id');
        $categoryIds = $categories->pluck('id');
        $categorieswith = SubCategory::whereIn('category_id', $categoryIds)->get();

        $subCategoryIdswith = $categorieswith->pluck('id');
        $subCategoryIds = $subCategories->pluck('id');

        // Prepare the query builder for products
        $query = Product::with(['company', 'category', 'subcategory']);



        // Apply filters for company, category, and subcategory if IDs are not empty
        if ($companyIds->isNotEmpty()) {
            $query->whereIn('company_id', $companyIds);
        } elseif ($categoryIds->isNotEmpty()) {
            $query->whereIn('subcategory_id', $subCategoryIdswith);
        } elseif ($subCategoryIds->isNotEmpty()) {
            $query->whereIn('subcategory_id', $subCategoryIds);
        } else {
            // Apply search filters
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'like', "%{$searchTerm}%")
                    ->orWhere('description', 'like', "%{$searchTerm}%");
            });
        }
        // dd($query->category);
        // Retrieve the products
        $products = $query->get();
        // dd($products->all());
        // Combine results into one collection (or you can return them separately)
        $results = collect([
            'products' => $products,
            'categories' => $categories,
            'companies' => $companies,
            'subCategories' => $subCategories,
        ]);

        return view('searchresult', compact('results', 'searchTerm'));
    }


    public function suggestions(Request $request)
    {
        $searchTerm = $request->input('query');

        // Search in Products
        $products = Product::select('id', 'name', 'description')
            ->where('name', 'like', "%{$searchTerm}%")
            ->orWhere('description', 'like', "%{$searchTerm}%")
            ->orWhere('material', 'like', "%{$searchTerm}%")
            ->orWhere('size', 'like', "%{$searchTerm}%")
            ->limit(5)
            ->get();

        // Search in Categories
        $categories = Category::select('id', 'name')
            ->where('name', 'like', "%{$searchTerm}%")
            ->limit(5)
            ->get();

        // Search in Subcategories
        $subcategories = SubCategory::select('id', 'name')
            ->where('name', 'like', "%{$searchTerm}%")
            ->limit(5)
            ->get();

        // Search in Company Details
        $companies = CompanyDetail::select('id', 'name', 'description')
            ->where('name', 'like', "%{$searchTerm}%")
            ->orWhere('description', 'like', "%{$searchTerm}%")
            ->orWhere('alternate_names', 'like', "%{$searchTerm}%")
            ->limit(5)
            ->get();

        // Combine Results
        $results = [
            'products' => $products,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'companies' => $companies,
        ];

        return response()->json($results);
    }

    public function getSuggestions(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');

        $productSuggestions = [];
        $companySuggestions = [];

        if ($category === 'All' || $category === 'Companies') {
            // Fetch company suggestions if category is "All" or "Companies"
            $companySuggestions = CompanyDetail::where('name', 'LIKE', "%{$query}%")
                ->orWhereRaw("FIND_IN_SET(?, alternate_names)", [$query])
                ->limit(10)
                ->get(['id', 'name']);
        }
        if ($category === 'All' || $category === 'Products') {
            // Fetch product suggestions if category is "All" or "Products"
            $productSuggestions = Product::where('name', 'LIKE', "%{$query}%")
                ->limit(10)
                ->get(['id', 'name']);
        }



        // Response handling for each category
        if ($category === 'Products') {
            return response()->json(['suggestions' => $productSuggestions]);
        } elseif ($category === 'Companies') {
            return response()->json(['suggestions' => $companySuggestions]);
        }

        // If "All" is selected, return both products and companies
        return response()->json([
            'products' => $productSuggestions,
            'companies' => $companySuggestions,
        ]);
    }




}
