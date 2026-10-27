<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class FrontSubscriberController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'email'  => 'required|email|max:255|unique:subscribers,email',
            'number' => 'required|string|max:20',
        ]);

        Subscriber::create([
            'name'   => $request->name,
            'email'  => $request->email,
            'number' => $request->number,
        ]);

        return back()->with('success', 'Subscribed successfully!');
    }
}
