<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;

class FrontBlogController extends Controller
{
    public function allBlogs(Request $request)
    {
        $search = $request->query('search');
        $categoryId = $request->query('category_id'); // ব্লেড থেকে পাঠানো ক্যাটাগরি আইডি রিসিভ করা

        $query = Blog::latest();

        // ১. সার্চ ফিল্টারিং (সার্চ করা হলে)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('desc', 'like', "%{$search}%")
                    ->orWhere('tags', 'like', "%{$search}%");
            });
        }

        // ২. ক্যাটাগরি ফিল্টারিং (ক্যাটাগরিতে ক্লিক করা হলে)
        if ($categoryId) {
            // আপনার মডেল অনুযায়ী এখানে 'category_id' ব্যবহার করা হয়েছে
            $query->where('category_id', $categoryId); 
        }

        $blogs = $query->paginate(4)->withQueryString();
        $categories = BlogCategory::withCount('blogs')->get();
        $latestBlogs = Blog::latest()->take(5)->get();
        return view('frontend.blog.index', compact('blogs', 'categories', 'latestBlogs', 'search', 'categoryId'));
    }

    public function blogDetails($id)
    {
        $blog = Blog::findOrFail($id);
        $latestBlogs = Blog::latest()->take(5)->get();
        $categories = BlogCategory::withCount('blogs')->get();

        return view('frontend.blog.detail', compact('blog', 'categories', 'latestBlogs'));
    }
}
