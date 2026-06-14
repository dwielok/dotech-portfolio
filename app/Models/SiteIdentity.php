<?php
// app/Models/SiteIdentity.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class SiteIdentity extends Model
{
    use HasFactory;

    protected $table = 'site_identities';

    protected $fillable = [
        'site_name',
        'site_title',
        'site_description',
        'logo_dark',
        'logo_light',
        'favicon',
        'logo_alt',
        'navbar_links',
        'show_search',
        'sticky_header',
        'is_active',
    ];

    protected $casts = [
        'navbar_links' => 'array',
        'show_search' => 'boolean',
        'sticky_header' => 'boolean',
        'is_active' => 'boolean',
    ];

    /**
     * Get logo dark URL
     */
    public function getLogoDarkUrlAttribute(): ?string
    {
        return $this->logo_dark ? asset('storage/' . $this->logo_dark) : null;
    }

    /**
     * Get logo light URL
     */
    public function getLogoLightUrlAttribute(): ?string
    {
        return $this->logo_light ? asset('storage/' . $this->logo_light) : null;
    }

    /**
     * Get favicon URL
     */
    public function getFaviconUrlAttribute(): ?string
    {
        return $this->favicon ? asset('storage/' . $this->favicon) : null;
    }

    /**
     * Get formatted navbar links with proper URLs
     */
    public function getFormattedNavbarLinksAttribute(): array
    {
        if (!$this->navbar_links) {
            return $this->getDefaultNavbarLinks();
        }

        $links = [];
        foreach ($this->navbar_links as $link) {
            $links[] = [
                'label' => $link['label'],
                'url' => $this->resolveUrl($link['url'] ?? '#'),
                'is_active' => $link['is_active'] ?? true,
                'target' => $link['target'] ?? '_self',
                'icon' => $link['icon'] ?? null,
            ];
        }

        return $links;
    }

    /**
     * Get default navbar links
     */
    private static function getDefaultNavbarLinks(): array
    {
        return [
            ['label' => 'Beranda', 'url' => '/', 'is_active' => true, 'target' => '_self'],
            ['label' => 'Tentang Kami', 'url' => '/about', 'is_active' => true, 'target' => '_self'],
            ['label' => 'Proyek', 'url' => '/projects', 'is_active' => true, 'target' => '_self'],
            ['label' => 'Contact', 'url' => '/contact', 'is_active' => true, 'target' => '_self'],
        ];
    }

    /**
     * Resolve URL from path or route name
     */
    private function resolveUrl($url): string
    {
        // Check if it's a named route (starts with route:)
        if (str_starts_with($url, 'route:')) {
            $routeName = substr($url, 6);
            try {
                return route($routeName);
            } catch (\Exception $e) {
                return '#';
            }
        }

        // Check if it's external URL
        if (str_starts_with($url, 'http://') || str_starts_with($url, 'https://')) {
            return $url;
        }

        // Return as is (relative path)
        return $url;
    }

    /**
     * Get site instance (singleton pattern)
     */
    public static function getInstance()
    {
        return self::first() ?? self::create([
            'site_name' => 'Dotech Digital Solution',
            'navbar_links' => self::getDefaultNavbarLinks(),
        ]);
    }
}
