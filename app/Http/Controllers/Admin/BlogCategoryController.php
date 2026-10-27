<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

class BlogCategoryController extends Controller
{
    // Blog Category List
    public function index()
    {
        $categories = BlogCategory::latest()->get();

        return view('admin.blog_category.index', compact('categories'));
    }

    // Create Form
    public function create()
    {
        return view('admin.blog_category.create');
    }

    // Store Blog Category
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $slug = Str::slug($request->name);
        $validated['slug'] = $slug;

        $category = new BlogCategory();
        $category->fill($validated);
        $category->save();

        return redirect()
            ->route('admin.blog_category.index')
            ->with('success', 'Blog category created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $category = BlogCategory::findOrFail($id);

        return view('admin.blog_category.edit', compact('category'));
    }

    // Update Blog Category
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $category = BlogCategory::findOrFail($id);

        $category->fill($validated);
        $category->save();

        return redirect()
            ->route('admin.blog_category.index')
            ->with('success', 'Blog category updated successfully.');
    }

    // Delete Blog Category
    public function destroy(string $id)
    {
        $category = BlogCategory::findOrFail($id);

        $category->delete();

        return redirect()
            ->route('admin.blog_category.index')
            ->with('success', 'Blog category deleted successfully.');
    }
}
