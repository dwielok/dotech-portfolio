<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectImage extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'image', 'caption', 'sort_order'];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function project(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    public function getImageUrlAttribute(): string
    {
        return asset('storage/' . $this->image);
    }
}
