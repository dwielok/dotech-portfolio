<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'title', 'subtitle', 'description', 'mission', 'vision',
        'image', 'years_experience', 'projects_completed',
        'happy_clients', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'years_experience' => 'integer',
        'projects_completed' => 'integer',
        'happy_clients' => 'integer',
    ];

    public function getImageUrlAttribute(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }
}
