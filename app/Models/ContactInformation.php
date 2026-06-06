<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactInformation extends Model
{
    use HasFactory;
    protected $table="contact_informations";

    protected $fillable = [
        'company_name', 'email', 'phone', 'whatsapp',
        'address', 'google_maps_embed', 'office_hours', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getWhatsappUrlAttribute(): ?string
    {
        return $this->whatsapp
            ? 'https://wa.me/' . preg_replace('/[^0-9]/', '', $this->whatsapp)
            : null;
    }
}
