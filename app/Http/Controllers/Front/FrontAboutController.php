<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Education;
use App\Models\Award;
use App\Models\Skill;
use App\Models\About;
use Illuminate\Http\Request;


class FrontAboutController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        $awards = Award::all();
        $skills = Skill::all();
        $about = About::first();
        return view('frontend.about.index', compact('educations', 'awards', 'skills', 'about'));
    }
}
