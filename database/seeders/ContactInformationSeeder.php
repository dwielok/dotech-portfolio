<?php

namespace Database\Seeders;

use App\Models\ContactInformation;
use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    public function run(): void
    {
        ContactInformation::create([
            'company_name'      => 'PT Dotech Digital Solution',
            'email'             => 'info@dotech.id',
            'phone'             => '+62-274-000-0000',
            'whatsapp'          => '+6281234567890',
            'address'           => 'Jl. Teknologi No. 1, Sleman, Yogyakarta 55281, Indonesia',
            'google_maps_embed' => '<iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
            'office_hours'      => 'Senin - Jumat: 08:00 - 17:00 WIB',
            'is_active'         => true,
        ]);
    }
}
