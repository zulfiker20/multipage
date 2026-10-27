<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;

class FrontPortfolioController extends Controller
{
    public function index()
    {
        $portfolio = Portfolio::latest()->paginate(2);
        return view('frontend.portfolio.index', compact('portfolio'));
    }
    public function showBySlug($slug)
{
    // ID-এর বদলে slug দিয়ে পোর্টফোলিও খোঁজা হচ্ছে
    $portfolio = Portfolio::where('slug', $slug)->firstOrFail();
    
    return view('frontend.portfolio.show', compact('portfolio'));
}
}
