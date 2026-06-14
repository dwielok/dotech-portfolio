<?php
// database/migrations/2024_01_01_000001_create_site_identities_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_identities', function (Blueprint $table) {
            $table->id();

            // Basic Info
            $table->string('site_name')->default('Dotech Digital Solution');
            $table->string('site_title')->nullable();
            $table->text('site_description')->nullable();

            // Logo Settings
            $table->string('logo_dark')->nullable(); // Logo for light background
            $table->string('logo_light')->nullable(); // Logo for dark background
            $table->string('favicon')->nullable();
            $table->string('logo_alt')->nullable();

            // Navbar Settings
            $table->json('navbar_links')->nullable(); // Store navbar menu structure
            $table->boolean('show_search')->default(false);
            $table->boolean('sticky_header')->default(true);
            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('site_identities');
    }
};
