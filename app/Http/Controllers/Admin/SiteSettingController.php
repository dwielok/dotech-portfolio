<?php
// app/Http/Controllers/Admin/SiteSettingController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\AboutUs;
use App\Models\ContactInformation;
use App\Models\SocialLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingController extends Controller
{
    /**
     * Display site settings page with tabs.
     */
    public function index()
    {
        $hero = HeroSection::first() ?? new HeroSection(['is_active' => true]);
        $about = AboutUs::first() ?? new AboutUs(['is_active' => true]);
        $contact = ContactInformation::first() ?? new ContactInformation(['is_active' => true]);
        $socialLinks = SocialLink::get();

        return view('admin.site-settings.index', compact('hero', 'about', 'contact', 'socialLinks'));
    }

    /**
     * Update Hero Section.
     */
    public function updateHero(Request $request)
    {
        $validated = $request->validate([
            'headline' => 'nullable|string|max:255',
            'subheadline' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'cta_primary_text' => 'nullable|string|max:100',
            'cta_primary_url' => 'nullable|string|max:255',
            'cta_secondary_text' => 'nullable|string|max:100',
            'cta_secondary_url' => 'nullable|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'is_active' => 'boolean',
        ]);

        $hero = HeroSection::first();

        if (!$hero) {
            $hero = new HeroSection();
        }

        if ($request->hasFile('background_image')) {
            // Delete old image
            if ($hero->background_image && Storage::disk('public')->exists($hero->background_image)) {
                Storage::disk('public')->delete($hero->background_image);
            }

            $path = $request->file('background_image')->store('hero', 'public');
            $validated['background_image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $hero->fill($validated);
        $hero->save();

        return redirect()->route('admin.site-settings.index', ['tab' => 'hero'])
            ->with('success', 'Hero Section berhasil diperbarui.');
    }

    /**
     * Update About Us Section.
     */
    public function updateAbout(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'mission' => 'nullable|string',
            'vision' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'years_experience' => 'nullable|integer|min:0',
            'projects_completed' => 'nullable|integer|min:0',
            'happy_clients' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $about = AboutUs::first();

        if (!$about) {
            $about = new AboutUs();
        }

        if ($request->hasFile('image')) {
            // Delete old image
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }

            $path = $request->file('image')->store('about', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        $about->fill($validated);
        $about->save();

        return redirect()->route('admin.site-settings.index', ['tab' => 'about'])
            ->with('success', 'About Us berhasil diperbarui.');
    }

    /**
     * Update Contact Information.
     */
    public function updateContact(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'whatsapp' => 'nullable|string|max:50',
            'address' => 'nullable|string',
            'google_maps_embed' => 'nullable|string',
            'office_hours' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $contact = ContactInformation::first();

        if (!$contact) {
            $contact = new ContactInformation();
        }

        $validated['is_active'] = $request->has('is_active');

        $contact->fill($validated);
        $contact->save();

        return redirect()->route('admin.site-settings.index', ['tab' => 'contact'])
            ->with('success', 'Kontak Informasi berhasil diperbarui.');
    }

    /**
     * Store a new social link.
     */
    public function storeSocialLink(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:100',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');
        $validated['sort_order'] = $validated['sort_order'] ?? SocialLink::count() + 1;

        SocialLink::create($validated);

        return redirect()->route('admin.site-settings.index', ['tab' => 'social'])
            ->with('success', 'Social Link berhasil ditambahkan.');
    }

    /**
     * Update a social link.
     */
    public function updateSocialLink(Request $request, SocialLink $socialLink)
    {
        $validated = $request->validate([
            'platform' => 'required|string|max:100',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string|max:100',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $socialLink->update($validated);

        return redirect()->route('admin.site-settings.index', ['tab' => 'social'])
            ->with('success', 'Social Link berhasil diperbarui.');
    }

    /**
     * Delete a social link.
     */
    public function destroySocialLink(SocialLink $socialLink)
    {
        $socialLink->delete();

        return redirect()->route('admin.site-settings.index', ['tab' => 'social'])
            ->with('success', 'Social Link berhasil dihapus.');
    }

    /**
     * Reorder social links.
     */
    public function reorderSocialLinks(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:social_links,id',
        ]);

        foreach ($request->orders as $index => $id) {
            SocialLink::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Upload image via TinyMCE.
     */
    public function uploadImage(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
        ]);

        $path = $request->file('file')->store('content', 'public');
        $url = asset('storage/' . $path);

        return response()->json(['location' => $url]);
    }
}
