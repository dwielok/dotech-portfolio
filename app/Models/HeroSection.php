<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'headline', 'subheadline', 'description',
        'cta_primary_text', 'cta_primary_url',
        'cta_secondary_text', 'cta_secondary_url',
        'background_image', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getBackgroundImageUrlAttribute(): ?string
    {
        return $this->background_image
            ? asset('storage/' . $this->background_image)
            : null;
    }
}
