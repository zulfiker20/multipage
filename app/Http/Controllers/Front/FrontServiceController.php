<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class FrontServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('frontend.service.index', compact('services'));
    }
    public function showBySlug($slug)
{
    // ID-এর বদলে slug দিয়ে ডাটা খোঁজা হচ্ছে
    $service = Service::where('slug', $slug)->firstOrFail();
    
    return view('frontend.service.show', compact('service'));
}
}
