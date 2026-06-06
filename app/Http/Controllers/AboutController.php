<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\SocialLink;

class AboutController extends Controller
{
    public function index()
    {
        $about       = AboutUs::where('is_active', true)->first();
        $services    = Service::active()->get();
        $testimonials = Testimonial::active()->limit(6)->get();
        $socialLinks = SocialLink::active()->get();

        return view('about', compact('about', 'services', 'testimonials', 'socialLinks'));
    }
}
