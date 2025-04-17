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
        return view('adminpanel.blogs.index', compact('blogs'));
    }

    public function edit($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);
        return view('adminpanel.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'heading' => 'required|string|max:255',
            'detail_subcontent' => 'required|string|max:5000',
            'subtitles' => 'required|array|min:1',
            'subtitles.*' => 'required|string|max:255',
            'textcontents' => 'required|array|min:1',
            'textcontents.*' => 'required|string|max:5000',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);

        $updateData = [
            'heading' => $request->heading,
            'detail_subcontent' => $request->detail_subcontent,
        ];

        if ($request->hasFile('image_url')) {
            if ($blog->image_url && file_exists(public_path($blog->image_url))) {
                unlink(public_path($blog->image_url));
            }

            $image = $request->file('image_url');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $updateData['image_url'] = 'images/' . $imageName;
        }

        $blog->update($updateData);
        $blog->sections()->delete();
        foreach ($request->subtitles as $index => $subtitle) {
            BlogSection::create([
                'blog_id' => $blog->id,
                'subtitle' => $subtitle,
                'textcontent' => $request->textcontents[$index],
            ]);
        }

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image_url && file_exists(public_path($blog->image_url))) {
            unlink(public_path($blog->image_url));
        }

        $blog->sections()->delete();
        $blog->delete();

        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully');
    }

    public function show($id)
    {
        $blog = Blog::with('sections')->findOrFail($id);
        $allBlogs = Blog::where('id', '!=', $id)->latest()->get();

        return view('blogsection', compact('blog', 'allBlogs'));
    }
    
      public function bloglist(){
        $blogs = Blog::all();
        return view('bloglist', compact('blogs'));
    }
}
