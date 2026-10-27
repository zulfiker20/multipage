<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Banner;

class HomeBannerController extends Controller
{
    public function index()
    {
        $banner = Banner::first();

        return view('admin.banner.index', compact('banner'));
    }
    public function update(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'short_title' => 'nullable|string|max:255',
            'home_slide' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'video_url' => 'nullable|url|max:255',
        ]);

        $banner = Banner::first();

        if (!$banner) {
            $banner = new Banner();
        }

        $banner->title = $request->title;
        $banner->short_title = $request->short_title;
        $banner->video_url = $request->video_url;

        if ($request->hasFile('home_slide')) {
            $banner->home_slide = $request->file('home_slide')
                ->store('home-banner', 'public');
        }

        $banner->save();

        return redirect()
            ->route('banner')
            ->with('success', 'Banner updated successfully.');
    }
}
