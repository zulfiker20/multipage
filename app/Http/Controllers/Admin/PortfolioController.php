<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PortfolioController extends Controller
{
    // Portfolio List
    public function index()
    {
        $portfolios = Portfolio::latest()->get();

        return view('admin.portfolio.index', compact('portfolios'));
    }

    // Create Form
    public function create()
    {
        return view('admin.portfolio.create');
    }

    // Store Portfolio
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'  => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'desc'  => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('portfolios', 'public');
        }
        $validated['slug'] = Str::slug($request->title);
        $portfolio = new Portfolio();
        $portfolio->fill($validated);
        $portfolio->save();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        return view('admin.portfolio.edit', compact('portfolio'));
    }

    // Update Portfolio
    public function update(Request $request, $id)
    {
        // ১. ডাটা ভ্যালিডেশন
        $validated = $request->validate([
            'name'  => 'nullable|string|max:255',
            'title' => 'required|string|max:255',
            'desc'  => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ২. আইডি দিয়ে পোর্টফোলিও খুঁজে বের করা
        $portfolio = Portfolio::findOrFail($id);

        // ৩. নতুন ইমেজ আপলোড হলে প্রসেস করা
        if ($request->hasFile('image')) {
            // পুরানো ইমেজ থাকলে তা স্টোরেজ থেকে ডিলিট করে দেওয়া
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }

            // নতুন ইমেজ স্টোর করা
            $validated['image'] = $request->file('image')->store('portfolios', 'public');
        }
        $validated['slug'] = Str::slug($request->title);

        // ৪. ডাটা আপডেট ও সেভ করা
        $portfolio->fill($validated);
        $portfolio->save();

        // ৫. রিডাইরেক্ট করা
        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio updated successfully.');
    }

    // Delete Portfolio
    public function destroy(string $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        $portfolio->delete();

        return redirect()
            ->route('admin.portfolio.index')
            ->with('success', 'Portfolio deleted successfully.');
    }
}
