<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    // Service List
    public function index()
    {
        $services = Service::latest()->get();

        return view('admin.service.index', compact('services'));
    }

    // Create Form
    public function create()
    {
        return view('admin.service.create');
    }

    // Store Service
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'big_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'small_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('big_image')) {
            $validated['big_image'] = $request->file('big_image')
                ->store('services', 'public');
        }

        if ($request->hasFile('small_image')) {
            $validated['small_image'] = $request->file('small_image')
                ->store('services', 'public');
        }

        $validated['slug'] = Str::slug($request->title);

        $service = new Service();
        $service->fill($validated);
        $service->save();

        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Service created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $service = Service::findOrFail($id);

        return view('admin.service.edit', compact('service'));
    }

    // Update Service
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
            'big_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'small_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($request->title);

        $service = Service::findOrFail($id);

        // Upload new big image and remove old image
        if ($request->hasFile('big_image')) {
            if ($service->big_image) {
                Storage::disk('public')->delete($service->big_image);
            }

            $validated['big_image'] = $request->file('big_image')
                ->store('services', 'public');
        }

        // Upload new small image and remove old image
        if ($request->hasFile('small_image')) {
            if ($service->small_image) {
                Storage::disk('public')->delete($service->small_image);
            }

            $validated['small_image'] = $request->file('small_image')
                ->store('services', 'public');
        }

        $service->fill($validated);
        $service->save();

        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Service updated successfully.');
    }

    // Delete Service
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);

        if ($service->big_image) {
            Storage::disk('public')->delete($service->big_image);
        }

        if ($service->small_image) {
            Storage::disk('public')->delete($service->small_image);
        }

        $service->delete();

        return redirect()
            ->route('admin.service.index')
            ->with('success', 'Service deleted successfully.');
    }
}