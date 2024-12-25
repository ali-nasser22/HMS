<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\ContactUs;
use App\Models\Image;

class WelcomeController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::first();
        $contact = ContactUs::first();
        $images = Image::latest()->take(6)->get();
        return view('welcome', compact('aboutUs', 'contact', 'images'));
    }
}
