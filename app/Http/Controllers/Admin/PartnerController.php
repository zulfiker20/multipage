<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    // Partner List
    public function index()
    {
        $partners = Partner::latest()->get();

        return view('admin.partner.index', compact('partners'));
    }

    // Create Form
    public function create()
    {
        return view('admin.partner.create');
    }

    // Store Partner
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
        ]);

        $partner = new Partner();
        $partner->fill($validated);
        $partner->save();

        return redirect()
            ->route('admin.partner.index')
            ->with('success', 'Partner created successfully.');
    }

    // Edit Form
    public function edit(string $id)
    {
        $partner = Partner::findOrFail($id);

        return view('admin.partner.edit', compact('partner'));
    }

    // Update Partner
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'sub_title' => 'nullable|string|max:255',
            'desc' => 'nullable|string',
        ]);

        $partner = Partner::findOrFail($id);

        $partner->fill($validated);
        $partner->save();

        return redirect()
            ->route('admin.partner.index')
            ->with('success', 'Partner updated successfully.');
    }

    // Delete Partner
    public function destroy(string $id)
    {
        $partner = Partner::findOrFail($id);

        $partner->delete();

        return redirect()
            ->route('admin.partner.index')
            ->with('success', 'Partner deleted successfully.');
    }
}
