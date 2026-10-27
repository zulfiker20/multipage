<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Work;
use Illuminate\Support\Facades\Storage;

class WorkController extends Controller
{
    // Work List
    public function index()
    {
        $works = Work::latest()->get();

        return view('admin.work.index', compact('works'));
    }

    // Create Form
    public function create()
    {
        return view('admin.work.create');
    }

    // Store Work
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('works', 'public');
        }

        $work = new Work();
        $work->fill($validated);
        $work->save();

        return redirect()
            ->route('admin.work.index')
            ->with('success', 'Work created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $work = Work::findOrFail($id);

        return view('admin.work.edit', compact('work'));
    }

    // Update Work
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $work = Work::findOrFail($id);

        if ($request->hasFile('image')) {
            if ($work->image) {
                Storage::disk('public')->delete($work->image);
            }

            $validated['image'] = $request->file('image')
                ->store('works', 'public');
        }

        $work->fill($validated);
        $work->save();

        return redirect()
            ->route('admin.work.index')
            ->with('success', 'Work updated successfully.');
    }

    // Delete Work
    public function destroy(string $id)
    {
        $work = Work::findOrFail($id);

        if ($work->image) {
            Storage::disk('public')->delete($work->image);
        }

        $work->delete();

        return redirect()
            ->route('admin.work.index')
            ->with('success', 'Work deleted successfully.');
    }
}

