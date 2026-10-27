<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
    // Testimonial List
    public function index()
    {
        $testimonials = Testimonial::latest()->get();

        return view(
            'admin.testimonial.index',
            compact('testimonials')
        );
    }

    // Create Form
    public function create()
    {
        return view('admin.testimonial.create');
    }

    // Store Testimonial
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
        ]);

        $testimonial = new Testimonial();
        $testimonial->fill($validated);
        $testimonial->save();

        return redirect()
            ->route('admin.testimonial.index')
            ->with('success', 'Testimonial created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view(
            'admin.testimonial.edit',
            compact('testimonial')
        );
    }

    // Update Testimonial
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'nullable|string|max:255',
            'title' => 'nullable|string|max:255',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->fill($validated);
        $testimonial->save();

        return redirect()
            ->route('admin.testimonial.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    // Delete Testimonial
    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $testimonial->delete();

        return redirect()
            ->route('admin.testimonial.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
