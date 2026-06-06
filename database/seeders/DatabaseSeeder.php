<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            // HeroSectionSeeder::class,
            // AboutUsSeeder::class,
            // ServiceSeeder::class,
            // ContactInformationSeeder::class,
            // SocialLinkSeeder::class,
            // ProjectSeeder::class,
            // TestimonialSeeder::class,
        ]);
    }
}
