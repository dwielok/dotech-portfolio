<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Notification;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create mock notifications based on your mock data
        $notifications = [
            [
                'type' => 'message',
                'title' => 'Pesan Baru dari Customer',
                'content' => 'Anda menerima pesan baru dari Ahmad Rizki',
                'icon' => 'fas fa-envelope',
                'icon_color' => 'text-blue-500',
                'bg_color' => 'bg-blue-50',
                'route_name' => 'admin.messages.index',
                'read_at' => null,
                'created_at' => now()->subMinutes(5),
            ],
            [
                'type' => 'project',
                'title' => 'Proyek Baru Ditambahkan',
                'content' => 'Proyek "Website Perusahaan" telah ditambahkan',
                'icon' => 'fas fa-folder-open',
                'icon_color' => 'text-green-500',
                'bg_color' => 'bg-green-50',
                'route_name' => 'admin.projects.index',
                'read_at' => null,
                'created_at' => now()->subHours(2),
            ],
            [
                'type' => 'testimonial',
                'title' => 'Testimonial Baru',
                'content' => 'PT. Sukses Mandiri memberikan testimonial baru',
                'icon' => 'fas fa-star',
                'icon_color' => 'text-yellow-500',
                'bg_color' => 'bg-yellow-50',
                'route_name' => 'admin.testimonials.index',
                'read_at' => null,
                'created_at' => now()->subHours(5),
            ],
            [
                'type' => 'system',
                'title' => 'System Update',
                'content' => 'Sistem telah diperbarui ke versi terbaru',
                'icon' => 'fas fa-server',
                'icon_color' => 'text-purple-500',
                'bg_color' => 'bg-purple-50',
                'read_at' => now()->subDays(1),
                'created_at' => now()->subDays(1),
            ],
            [
                'type' => 'contact',
                'title' => 'Pesan dari Contact Form',
                'content' => 'Siti Aisyah mengirim pesan melalui contact form',
                'icon' => 'fas fa-comment-dots',
                'icon_color' => 'text-indigo-500',
                'bg_color' => 'bg-indigo-50',
                'route_name' => 'admin.messages.show',
                'route_param_id' => 1,
                'route_param_type' => 'message',
                'read_at' => now()->subDays(2),
                'created_at' => now()->subDays(2),
            ],
        ];

        foreach ($notifications as $notification) {
            Notification::create($notification);
        }
    }
}
