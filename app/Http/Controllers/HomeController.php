<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\HeroSection;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\ContactInformation;
use App\Models\SocialLink;
use App\Models\Team;

class HomeController extends Controller
{
    public function index()
    {
        $hero       = HeroSection::where('is_active', true)->first();
        $about      = AboutUs::where('is_active', true)->first();
        $services   = Service::active()->get();

        // Get featured projects with their images
        $projects   = Project::published()
            ->featured()
            ->with('images')
            ->limit(6)
            ->get();

        // Get active testimonials with rating
        $testimonials = Testimonial::active()
            ->where('is_active', true)
            ->limit(6)
            ->get();

        // Get featured team members
        $teams = Team::active()
            ->featured()
            ->ordered()
            ->limit(4)
            ->get();

        $contact    = ContactInformation::where('is_active', true)->first();
        $socialLinks = SocialLink::active()->get();

        // Get statistics for stats section
        $stats = [
            'experience_years' => $about->years_experience ?? 8,
            'projects_completed' => Project::published()->count(),
            'happy_clients' => Testimonial::active()->count(),
            'team_members' => Team::active()->count(),
        ];

        return view('home', compact(
            'hero',
            'about',
            'services',
            'projects',
            'testimonials',
            'contact',
            'socialLinks',
            'teams',
            'stats'
        ));
    }
}
