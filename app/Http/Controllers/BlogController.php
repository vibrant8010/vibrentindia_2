<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function create()
    {
        return view('adminpanel.blogs.create');
    }

  public function store(Request $request)
{
    $request->validate([
        'heading' => 'required|string|max:255',
        'detail_subcontent' => 'required|string',
        'subtitle1' => 'required|string|max:255',
        'textcontent1' => 'required|string',
        'subtitle2' => 'nullable|string|max:255',
        'textcontent2' => 'nullable|string',
        'image_url' => 'nullable|file|image|max:10240',
    ]);

    $imagePath = null;

    if ($request->hasFile('image_url')) {
        $image = $request->file('image_url');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
        $image->move(public_path('images'), $imageName); // Save to public/images
        $imagePath = 'images/' . $imageName; // Save the relative path in the database
    }

    Blog::create(array_merge($request->all(), ['image_url' => $imagePath]));

    return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully');
}


    public function index()
    {
        $blogs = Blog::all();
        return view('adminpanel.blogs.index', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('adminpanel.blogs.edit', compact('blog'));
    }

 public function update(Request $request, $id)
{
    $blog = Blog::findOrFail($id);

    $request->validate([
        'heading' => 'required|string|max:255',
        'detail_subcontent' => 'required|string',
        'subtitle1' => 'required|string|max:255',
        'textcontent1' => 'required|string',
        'subtitle2' => 'nullable|string|max:255',
        'textcontent2' => 'nullable|string',
        'image_url' => 'nullable|file|image|max:10240',
    ]);

    $updateData = $request->except('image_url');

    if ($request->hasFile('image_url')) {
        // Delete old image if it exists
        if ($blog->image_url && file_exists(public_path($blog->image_url))) {
            unlink(public_path($blog->image_url));
        }

        $image = $request->file('image_url');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Unique filename
        $image->move(public_path('images'), $imageName); // Save to public/images
        $updateData['image_url'] = 'images/' . $imageName; // Save relative path in the database
    }

    $blog->update($updateData);

    return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
}


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        // Delete the image if it exists
        if ($blog->image_url) {
            Storage::delete('public/' . $blog->image_url);
        }

        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }
    
   public function show($id){
    $blog = Blog::findOrFail($id);

    // Pass the blog details to the view
    return view('blogsection', compact('blog'));
   }
  
    

}
