<?php
// app/Http/Controllers/Admin/SiteSettingController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use App\Models\AboutUs;
use App\Models\ContactInformation;
use App\Models\SiteIdentity;
use App\Models\SocialLink;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;

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
        $socialLinks = SocialLink::active()->get();
        $teams = Team::ordered()->get();
        $siteIdentity = SiteIdentity::getInstance();

        $routes = collect(Route::getRoutes())
            ->filter(function ($route) {
                $name = $route->getName();

                return $name
                    && !str_starts_with($name, 'admin.')
                    && !str_starts_with($name, 'debugbar.')
                    && !str_starts_with($name, 'ignition.')
                    && !str_starts_with($name, 'password.')
                    && !str_starts_with($name, 'storage.')
                    && !str_starts_with($name, 'verification.')
                    && !str_starts_with($name, 'register')
                    && !str_starts_with($name, 'login')
                    && !str_starts_with($name, 'logout')
                    && !str_ends_with($name, '.store');
            })
            ->map(function ($route) {
                return [
                    'name' => $route->getName(),
                    'uri' => '/' . ltrim($route->uri(), '/'),
                ];
            })
            ->values();

        return view('admin.site-settings.index', compact('hero', 'about', 'contact', 'socialLinks', 'teams', 'routes', 'siteIdentity'));
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
            'remove_image' => 'nullable|in:1',
        ]);

        $hero = HeroSection::first();

        if (!$hero) {
            $hero = new HeroSection();
        }

        // Handle image removal
        if ($request->remove_image == '1') {
            if ($hero->background_image && Storage::disk('public')->exists($hero->background_image)) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $validated['background_image'] = null;
        }

        // Handle new image upload
        if ($request->hasFile('background_image')) {
            // Delete old image if exists
            if ($hero->background_image && Storage::disk('public')->exists($hero->background_image)) {
                Storage::disk('public')->delete($hero->background_image);
            }

            $path = $request->file('background_image')->store('hero', 'public');
            $validated['background_image'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');

        // Convert route names to actual URLs if needed
        if (!empty($validated['cta_primary_url']) && !str_starts_with($validated['cta_primary_url'], '/') && !str_starts_with($validated['cta_primary_url'], 'http')) {
            // Check if it's a named route
            try {
                $validated['cta_primary_url'] = route($validated['cta_primary_url']);
            } catch (\Exception $e) {
                // Keep as is if not a valid route
            }
        }

        if (!empty($validated['cta_secondary_url']) && !str_starts_with($validated['cta_secondary_url'], '/') && !str_starts_with($validated['cta_secondary_url'], 'http')) {
            try {
                $validated['cta_secondary_url'] = route($validated['cta_secondary_url']);
            } catch (\Exception $e) {
                // Keep as is if not a valid route
            }
        }

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

    /**
     * Store a new team member.
     */
    public function storeTeam(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'expertise_input' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('teams', 'public');
            $validated['image'] = $path;
        }

        // Collect social links
        $socialLinks = [];
        $socialPlatforms = ['facebook', 'instagram', 'linkedin', 'twitter'];
        foreach ($socialPlatforms as $platform) {
            if ($request->filled($platform)) {
                $socialLinks[$platform] = $request->$platform;
            }
        }
        $validated['social_links'] = $socialLinks;

        // Handle expertise as array
        if ($request->filled('expertise_input')) {
            $validated['expertise'] = array_filter(
                array_map('trim', explode(',', $request->expertise_input))
            );
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');
        $validated['sort_order'] = $validated['sort_order'] ?? Team::count() + 1;

        Team::create($validated);

        return redirect()->route('admin.site-settings.index', ['tab' => 'teams'])
            ->with('success', 'Team member berhasil ditambahkan.');
    }

    /**
     * Update a team member.
     */
    public function updateTeam(Request $request, Team $team)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:5120',
            'image_alt' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
            'expertise_input' => 'nullable|string',
            'experience_years' => 'nullable|integer|min:0',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean',
            'is_featured' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image
            if ($team->image && Storage::disk('public')->exists($team->image)) {
                Storage::disk('public')->delete($team->image);
            }

            $path = $request->file('image')->store('teams', 'public');
            $validated['image'] = $path;
        }

        // Collect social links
        $socialLinks = [];
        $socialPlatforms = ['facebook', 'instagram', 'linkedin', 'twitter'];
        foreach ($socialPlatforms as $platform) {
            if ($request->filled($platform)) {
                $socialLinks[$platform] = $request->$platform;
            }
        }
        $validated['social_links'] = $socialLinks;

        // Handle expertise as array
        if ($request->filled('expertise_input')) {
            $validated['expertise'] = array_filter(
                array_map('trim', explode(',', $request->expertise_input))
            );
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_featured'] = $request->has('is_featured');

        $team->update($validated);

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.site-settings.index', ['tab' => 'teams'])
            ->with('success', 'Team member berhasil diperbarui.');
    }

    /**
     * Delete a team member.
     */
    public function destroyTeam(Team $team)
    {
        // Delete image
        if ($team->image && Storage::disk('public')->exists($team->image)) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('admin.site-settings.index', ['tab' => 'teams'])
            ->with('success', 'Team member berhasil dihapus.');
    }

    /**
     * Reorder team members.
     */
    public function reorderTeams(Request $request)
    {
        $request->validate([
            'orders' => 'required|array',
            'orders.*' => 'required|integer|exists:teams,id',
        ]);

        foreach ($request->orders as $index => $id) {
            Team::where('id', $id)->update(['sort_order' => $index + 1]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Get team member data for editing.
     */
    public function editTeam(Team $team)
    {
        return response()->json([
            'id' => $team->id,
            'name' => $team->name,
            'title' => $team->title,
            'image_url' => $team->image_url,
            'image_alt' => $team->image_alt,
            'bio' => $team->bio,
            'expertise' => $team->expertise_list,
            'experience_years' => $team->experience_years,
            'email' => $team->email,
            'phone' => $team->phone,
            'social_links' => $team->social_links,
            'sort_order' => $team->sort_order,
            'is_active' => $team->is_active,
            'is_featured' => $team->is_featured,
            'meta_title' => $team->meta_title,
            'meta_description' => $team->meta_description,
        ]);
    }

    /**
     * Update Site Identity
     */
    public function updateSiteIdentity(Request $request)
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_title' => 'nullable|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'logo_light' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'favicon' => 'nullable|image|mimes:ico,png|max:1024',
            'logo_alt' => 'nullable|string|max:255',
            'show_search' => 'boolean',
            'sticky_header' => 'boolean',
            'is_active' => 'boolean',
        ]);

        $siteIdentity = SiteIdentity::getInstance();

        // Handle logo dark upload
        if ($request->hasFile('logo_dark')) {
            if ($siteIdentity->logo_dark && Storage::disk('public')->exists($siteIdentity->logo_dark)) {
                Storage::disk('public')->delete($siteIdentity->logo_dark);
            }
            $path = $request->file('logo_dark')->store('site/logos', 'public');
            $validated['logo_dark'] = $path;
        }

        // Handle logo light upload
        if ($request->hasFile('logo_light')) {
            if ($siteIdentity->logo_light && Storage::disk('public')->exists($siteIdentity->logo_light)) {
                Storage::disk('public')->delete($siteIdentity->logo_light);
            }
            $path = $request->file('logo_light')->store('site/logos', 'public');
            $validated['logo_light'] = $path;
        }

        // Handle favicon upload
        if ($request->hasFile('favicon')) {
            if ($siteIdentity->favicon && Storage::disk('public')->exists($siteIdentity->favicon)) {
                Storage::disk('public')->delete($siteIdentity->favicon);
            }
            $path = $request->file('favicon')->store('site/favicons', 'public');
            $validated['favicon'] = $path;
        }

        $validated['show_search'] = $request->has('show_search');
        $validated['sticky_header'] = $request->has('sticky_header');
        $validated['is_active'] = $request->has('is_active');

        $siteIdentity->update($validated);

        return response()->json(['success' => true]);
    }

    /**
     * Update Navbar Links
     */
    public function updateNavbarLinks(Request $request)
    {
        $validated = $request->validate([
            'navbar_links' => 'nullable|array',
            'navbar_links.*.label' => 'required|string|max:100',
            'navbar_links.*.url' => 'required|string|max:255',
            'navbar_links.*.is_active' => 'boolean',
            'navbar_links.*.target' => 'in:_self,_blank',
            'navbar_links.*.icon' => 'nullable|string|max:100',
        ]);

        $siteIdentity = SiteIdentity::getInstance();

        $navbarLinks = [];
        if ($request->has('navbar_links')) {
            foreach ($request->navbar_links as $link) {
                $navbarLinks[] = [
                    'label' => $link['label'],
                    'url' => $link['url'],
                    'is_active' => isset($link['is_active']) ? true : false,
                    'target' => $link['target'] ?? '_self',
                    'icon' => $link['icon'] ?? null,
                ];
            }
        }

        $siteIdentity->update(['navbar_links' => $navbarLinks]);

        if ($request->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => true]);
    }
}
