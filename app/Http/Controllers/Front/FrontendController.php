<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\Work;
use Illuminate\Http\Request;


class FrontendController extends Controller
{
    public function index()
    {
        $about = About::first();
        $banner = Banner::first();
        $works  = Work::all();
        $portfolios = Portfolio::all(); // Assuming you have a Portfolio model

        return view('welcome', compact('about', 'banner', 'works', 'portfolios'));
    }
}
