<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    // Skill List
    public function index()
    {
        $skills = Skill::latest()->get();

        return view('admin.skill.index', compact('skills'));
    }

    // Create Form
    public function create()
    {
        return view('admin.skill.create');
    }

    // Store Skill
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'percentage'  => 'nullable|integer|min:0|max:100',
        ]);

        $skill = new Skill();
        $skill->fill($validated);
        $skill->save();

        return redirect()
            ->route('admin.skill.index')
            ->with('success', 'Skill created successfully.');
    }

    // Show Skill (Optional)
    public function show(string $id)
    {
        $skill = Skill::findOrFail($id);

        return view('admin.skill.show', compact('skill'));
    }

    // Edit Form
    public function edit(string $id)
    {
        $skill = Skill::findOrFail($id);

        return view('admin.skill.edit', compact('skill'));
    }

    // Update Skill
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'percentage'  => 'nullable|integer|min:0|max:100',
        ]);

        $skill = Skill::findOrFail($id);
        $skill->fill($validated);
        $skill->save();

        return redirect()
            ->route('admin.skill.index')
            ->with('success', 'Skill updated successfully.');
    }

    // Delete Skill
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()
            ->route('admin.skill.index')
            ->with('success', 'Skill deleted successfully.');
    }
}
