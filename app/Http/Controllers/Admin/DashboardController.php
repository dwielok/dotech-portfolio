<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Project;
use App\Models\Service;
use App\Models\Testimonial;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'projects'         => Project::count(),
            'published'        => Project::published()->count(),
            'services'         => Service::count(),
            'testimonials'     => Testimonial::count(),
            'messages'         => ContactMessage::count(),
            'unread_messages'  => ContactMessage::unread()->count(),
        ];

        $recentMessages = ContactMessage::latest()->limit(5)->get();
        $recentProjects = Project::latest()->limit(5)->get();

        return view('admin.dashboard', compact('stats', 'recentMessages', 'recentProjects'));
    }
}
