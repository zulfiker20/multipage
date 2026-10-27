<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    // Setting List
    public function index()
    {
        $settings = Setting::latest()->first();

        return view('admin.setting.index', compact('settings'));
    }


    // Store Setting
    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'adress' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'copyright' => 'nullable|string|max:255',
        ]);

        $setting = new Setting();
        $setting->fill($validated);
        $setting->save();

        return redirect()
            ->route('admin.setting.index')
            ->with('success', 'Setting created successfully.');
    }
}
