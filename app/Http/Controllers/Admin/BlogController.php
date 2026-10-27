<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    // Blog List
    public function index()
    {
        $blogs = Blog::latest()->get();
        $categories = BlogCategory::all();

        return view('admin.blog.index', compact('blogs', 'categories'));
    }

    // Create Form
    public function create()
    {
        $categories = BlogCategory::all();

        return view('admin.blog.create', compact('categories'));
    }

    // Store Blog
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_id' => 'nullable|exists:blog_categories,id',
            'title' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('blogs', 'public');
        }
        $slug = Str::slug($request->title);
        $validated['slug'] = $slug;

        $blog = new Blog();
        $blog->fill($validated);
        $blog->save();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all();

        return view('admin.blog.edit', compact('blog', 'categories'));
    }

    // Update Blog
    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $validated = $request->validate([
            'category_id' => 'nullable|exists:blog_categories,id',
            'title' => 'nullable|string|max:255',
            'tags' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }

            $validated['image'] = $request->file('image')
                ->store('blogs', 'public');
        }
        $slug = Str::slug($request->title);
        $validated['slug'] = $slug;

        $blog->fill($validated);
        $blog->save();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog updated successfully.');
    }

    // Delete Blog
    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()
            ->route('admin.blog.index')
            ->with('success', 'Blog deleted successfully.');
    }

      public function BlogDetails($slug)
    {
        // স্লাগ অনুযায়ী ডেটাবেজ থেকে ব্লগটি খুঁজে বের করবে, না পেলে 404 পেজ দেখাবে
        $blog = Blog::where('slug', $slug)->firstOrFail();
        

        return view('admin.blog.detail', compact('blog'));
    }
}
