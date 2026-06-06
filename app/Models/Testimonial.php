<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name', 'company_name', 'position',
        'testimonial', 'photo', 'rating', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function getPhotoUrlAttribute(): string
    {
        return $this->photo
            ? asset('storage/' . $this->photo)
            : asset('images/avatar-placeholder.png');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }
}
