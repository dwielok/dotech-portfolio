<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title'       => 'Web Development',
                'description' => 'Pengembangan website modern, responsif, dan berkinerja tinggi menggunakan teknologi terkini seperti Laravel, React, dan Vue.js.',
                'icon'        => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/></svg>',
                'color'       => '#2563EB',
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Mobile Development',
                'description' => 'Pengembangan aplikasi mobile Android dan iOS yang intuitif dan berkinerja tinggi dengan React Native dan Flutter.',
                'icon'        => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>',
                'color'       => '#7C3AED',
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Cloud Solution',
                'description' => 'Migrasi, deployment, dan pengelolaan infrastruktur cloud di AWS, GCP, dan Azure untuk skalabilitas optimal.',
                'icon'        => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>',
                'color'       => '#0891B2',
                'sort_order'  => 3,
            ],
            [
                'title'       => 'IT Consulting',
                'description' => 'Konsultasi strategi teknologi informasi untuk membantu bisnis Anda tumbuh dengan solusi IT yang tepat dan efisien.',
                'icon'        => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>',
                'color'       => '#059669',
                'sort_order'  => 4,
            ],
            [
                'title'       => 'UI/UX Design',
                'description' => 'Desain antarmuka yang indah dan pengalaman pengguna yang intuitif untuk produk digital Anda.',
                'icon'        => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/></svg>',
                'color'       => '#DC2626',
                'sort_order'  => 5,
            ],
            [
                'title'       => 'Digital Marketing',
                'description' => 'Strategi pemasaran digital komprehensif termasuk SEO, social media marketing, dan iklan berbayar.',
                'icon'        => '<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>',
                'color'       => '#D97706',
                'sort_order'  => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
