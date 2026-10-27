<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
{
    // Education List
    public function index()
    {
        $educations = Education::latest()->get();

        return view('admin.education.index', compact('educations'));
    }

    // Create Form
    public function create()
    {
        return view('admin.education.create');
    }

    // Store Education
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'year'  => 'nullable|string|min:0|max:9999',
            'desc'  => 'nullable|string',
        ]);

        $education = new Education();
        $education->fill($validated);
        $education->save();

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education created successfully.');
    }

    // Show Education
    public function show(string $id)
    {
        $education = Education::findOrFail($id);

        return view('admin.education.show', compact('education'));
    }

    // Edit Form
    public function edit(string $id)
    {
        $education = Education::findOrFail($id);

        return view('admin.education.edit', compact('education'));
    }

    // Update Education
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'year'  => 'nullable|string|min:0|max:9999',
            'desc'  => 'nullable|string',
        ]);

        $education = Education::findOrFail($id);

        $education->fill($validated);
        $education->save();

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education updated successfully.');
    }

    // Delete Education
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()
            ->route('admin.education.index')
            ->with('success', 'Education deleted successfully.');
    }
}
