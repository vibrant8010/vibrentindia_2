<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    // Show the form for creating a new blog
    public function create()
    {
        return view('adminpanel.blogs.create');
    }

    // Store a newly created blog in the database
    public function store(Request $request)
<<<<<<< HEAD
    {
        // Validate the request
        $request->validate([
            'heading' => 'required|string|max:255',
            'detail_subcontent' => 'required|string',
            'subtitles' => 'required|array', // Array of subtitles
            'subtitles.*' => 'required|string|max:255', // Each subtitle is required
            'textcontents' => 'required|array', // Array of text contents
            'textcontents.*' => 'required|string', // Each text content is required
            'image_url' => 'nullable|file|image|max:10240',
        ]);

        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
            $image->move(public_path('images'), $imageName); // Save to public/images
            $imagePath = 'images/' . $imageName; // Save the relative path in the database
        }

        // Create the blog
        $blog = Blog::create([
            'heading' => $request->heading,
            'detail_subcontent' => $request->detail_subcontent,
            'image_url' => $imagePath,
        ]);

        // Save subtitles and text contents
        foreach ($request->subtitles as $index => $subtitle) {
            BlogSection::create([
                'blog_id' => $blog->id,
                'subtitle' => $subtitle,
                'textcontent' => $request->textcontents[$index],
            ]);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');
    }

    // Display a listing of the blogs
    public function index()
    {
        $blogs = Blog::with('sections')->get(); // Eager load sections
=======
    {   
        // print_r($request->all());
        // Validate the request
        $request->validate([
            'heading' => 'required|string|max:255',
            'detail_subcontent' => 'required|string|max:5000',
            'subtitles' => 'required|array|min:1',
            'subtitles.*' => 'required|string|max:255',
            'textcontents' => 'required|array|min:1',
            'textcontents.*' => 'required|string|max:5000',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
     
        // Handle image upload
        $imagePath = null;
        if ($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $imagePath = 'images/' . $imageName;
        }

        // Create the blog
        $blog = Blog::create([
            'heading' => $request->heading,
            'detail_subcontent' => $request->detail_subcontent,
            'image_url' => $imagePath,
        ]);
     
        // Save subtitles and text contents
        foreach ($request->subtitles as $index => $subtitle) {
            BlogSection::create([
                'blog_id' => $blog->id,
                'subtitle' => $subtitle,
                'textcontent' => $request->textcontents[$index],
            ]);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');
    }

    public function index()
    {   
        $blogs = Blog::with('sections')->get();
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
        return view('adminpanel.blogs.index', compact('blogs'));
    }

    // Show the form for editing the specified blog
    public function edit($id)
    {
<<<<<<< HEAD
        $blog = Blog::with('sections')->findOrFail($id); // Eager load sections
        return view('adminpanel.blogs.edit', compact('blog'));
    }

    // Update the specified blog in the database
=======
        $blog = Blog::with('sections')->findOrFail($id);
        return view('adminpanel.blogs.edit', compact('blog'));
    }

>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

<<<<<<< HEAD
        // Validate the request
        $request->validate([
            'heading' => 'required|string|max:255',
            'detail_subcontent' => 'required|string',
            'subtitles' => 'required|array', // Array of subtitles
            'subtitles.*' => 'required|string|max:255', // Each subtitle is required
            'textcontents' => 'required|array', // Array of text contents
            'textcontents.*' => 'required|string', // Each text content is required
            'image_url' => 'nullable|file|image|max:10240',
        ]);

        // Handle image upload
=======
        $request->validate([
            'heading' => 'required|string|max:255',
            'detail_subcontent' => 'required|string|max:5000',
            'subtitles' => 'required|array|min:1',
            'subtitles.*' => 'required|string|max:255',
            'textcontents' => 'required|array|min:1',
            'textcontents.*' => 'required|string|max:5000',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
        $updateData = [
            'heading' => $request->heading,
            'detail_subcontent' => $request->detail_subcontent,
        ];

        if ($request->hasFile('image_url')) {
<<<<<<< HEAD
            // Delete old image if it exists
=======
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
            if ($blog->image_url && file_exists(public_path($blog->image_url))) {
                unlink(public_path($blog->image_url));
            }

            $image = $request->file('image_url');
<<<<<<< HEAD
            $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
            $image->move(public_path('images'), $imageName); // Save to public/images
            $updateData['image_url'] = 'images/' . $imageName; // Save relative path in the database
        }

        // Update the blog
        $blog->update($updateData);

        // Delete existing sections and save new ones
        $blog->sections()->delete(); // Delete old sections
=======
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $updateData['image_url'] = 'images/' . $imageName;
        }

        $blog->update($updateData);
        $blog->sections()->delete();
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
        foreach ($request->subtitles as $index => $subtitle) {
            BlogSection::create([
                'blog_id' => $blog->id,
                'subtitle' => $subtitle,
                'textcontent' => $request->textcontents[$index],
            ]);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

<<<<<<< HEAD
    // Remove the specified blog from the database
=======
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

<<<<<<< HEAD
        // Delete the image if it exists
=======
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
        if ($blog->image_url && file_exists(public_path($blog->image_url))) {
            unlink(public_path($blog->image_url));
        }

<<<<<<< HEAD
        // Delete the blog and its sections
        $blog->sections()->delete(); // Delete related sections
=======
        $blog->sections()->delete();
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }

<<<<<<< HEAD
    // Display the specified blog
    public function show($id)
    {
        // $blog = Blog::with('sections')->findOrFail($id); // Eager load sections
        // return view('blogsection', compact('blog'));

            // Fetch the main blog with its sections
             $blog = Blog::with('sections')->findOrFail($id);

             // Fetch all blogs except the current one for the right part
             $allBlogs = Blog::where('id', '!=', $id)->latest()->get();

             // Pass the data to the view
             return view('blogsection', compact('blog', 'allBlogs'));
    }

    public function bloglist(){
=======
    public function show($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);
        $allBlogs = Blog::where('id', '!=', $id)->latest()->get();

        return view('blogsection', compact('blog', 'allBlogs'));
    }
    
      public function bloglist(){
>>>>>>> 4913e25a9bea5c0867863dfd8d5bda8a9053b125
        $blogs = Blog::all();
        return view('bloglist', compact('blogs'));
    }
}
