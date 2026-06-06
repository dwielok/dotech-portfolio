<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\HeroSection;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\ContactInformation;
use App\Models\SocialLink;

class HomeController extends Controller
{
    public function index()
    {
        $hero       = HeroSection::where('is_active', true)->first();
        $about      = AboutUs::where('is_active', true)->first();
        $services   = Service::active()->get();
        $projects   = Project::published()->featured()->with('images')->limit(6)->get();
        $testimonials = Testimonial::active()->limit(6)->get();
        $contact    = ContactInformation::where('is_active', true)->first();
        $socialLinks = SocialLink::active()->get();

        return view('home', compact(
            'hero', 'about', 'services', 'projects',
            'testimonials', 'contact', 'socialLinks'
        ));
    }
}
