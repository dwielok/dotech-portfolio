<?php
// app/Models/Team.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'name',
        'title',
        'slug',
        'image',
        'image_alt',
        'bio',
        'expertise',
        'experience_years',
        'social_links',
        'email',
        'phone',
        'sort_order',
        'is_active',
        'is_featured',
        'meta_title',
        'meta_description',
    ];

    protected $casts = [
        'social_links' => 'array',
        'expertise' => 'array',
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'experience_years' => 'integer',
        'sort_order' => 'integer',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($team) {
            if (empty($team->slug)) {
                $team->slug = Str::slug($team->name);
            }
        });

        static::updating(function ($team) {
            if ($team->isDirty('name')) {
                $team->slug = Str::slug($team->name);
            }
        });
    }

    /**
     * Get image URL attribute.
     */
    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    /**
     * Get expertise as array.
     */
    public function getExpertiseListAttribute(): array
    {
        if (is_array($this->expertise)) {
            return $this->expertise;
        }

        if (is_string($this->expertise)) {
            return explode(',', $this->expertise);
        }

        return [];
    }

    /**
     * Get social link by platform.
     */
    public function getSocialLink($platform): ?string
    {
        return $this->social_links[$platform] ?? null;
    }

    /**
     * Get formatted social links for display.
     */
    public function getSocialLinksAttribute($value)
    {
        $links = json_decode($value, true) ?? [];

        // Default social icons mapping
        $icons = [
            'facebook' => 'fab fa-facebook',
            'instagram' => 'fab fa-instagram',
            'linkedin' => 'fab fa-linkedin',
            'twitter' => 'fab fa-twitter',
            'youtube' => 'fab fa-youtube',
            'github' => 'fab fa-github',
            'whatsapp' => 'fab fa-whatsapp',
            'email' => 'fas fa-envelope',
        ];

        foreach ($links as $platform => $url) {
            $links[$platform] = [
                'url' => $url,
                'icon' => $icons[$platform] ?? 'fas fa-share-alt'
            ];
        }

        return $links;
    }

    /**
     * Scope for active teams.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for featured teams.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope ordered by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
