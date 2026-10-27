<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use App\Models\MultiImage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title'             => 'nullable|string',
            'short_title'       => 'nullable|string',
            'short_description' => 'nullable|string',
            'long_description'  => 'nullable|string',
            'about_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $about = About::first();

        if (!$about) {
            $about = new About();
        }

        $about->title             = $request->title;
        $about->short_title       = $request->short_title;
        $about->short_description = $request->short_description;
        $about->long_description  = $request->long_description;

        if ($request->file('about_image')) {
            $file = $request->file('about_image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/about_images'), $filename);
            $about->about_image = $filename;
        }


        $about->save();
        $notification = array(
            'message' => 'About Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()
            ->route('admin.about')
            ->with($notification);
    }

    public function MultiImage()
    {
        $multiImages = MultiImage::latest()->get();
        return view('admin.about.multi_image', compact('multiImages'));
    }

    public function CreateImage()
    {
        return view('admin.about.create');
    }

    public function StoreMultiImage(Request $request)
    {
        $validated = $request->validate([
            'multi_images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        foreach ($request->file('multi_images') as $image) {
            $validated = [
                'multi_image' => $image->store('multi_images', 'public'),
            ];

            MultiImage::create($validated);
        }

        return redirect()->back();
    }
    public function EditMultiImage($id)
    {
        $multiImage = MultiImage::findOrFail($id);

        return view('admin.about.edit', compact('multiImage'));
    }
}
