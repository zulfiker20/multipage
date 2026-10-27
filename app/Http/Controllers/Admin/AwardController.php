<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Award;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    // Award List
    public function index()
    {
        $awards = Award::latest()->get();

        return view('admin.award.index', compact('awards'));
    }

    // Create Form
    public function create()
    {
        return view('admin.award.create');
    }

    // Store Award
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('awards', 'public');
        }

        Award::create($validated);

        return redirect()->back()->with('success', 'Award created successfully.');
    }

    // Show Single Award
    public function show(string $id)
    {
        $award = Award::findOrFail($id);

        return view('admin.award.show', compact('award'));
    }

    // Edit Form
    public function edit(string $id)
    {
        $award = Award::findOrFail($id);

        return view('admin.award.edit', compact('award'));
    }

    // Update Award
    public function update(Request $request, Award $award)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('awards', 'public');
        }

        $award->update($validated);

        return redirect()->back()->with('success', 'Award updated successfully.');
    }
    public function destroy(string $id)
    {
        $award = Award::findOrFail($id);
        if ($award->image) {
            Storage::disk('public')->delete($award->image);
        }

        $award->delete();

        return redirect()
            ->route('admin.award.index')
            ->with('success', 'Award deleted successfully.');
    }
}
