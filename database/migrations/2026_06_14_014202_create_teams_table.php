<?php
// database/migrations/2024_01_01_000000_create_teams_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();

            // Basic Information
            $table->string('name');
            $table->string('title'); // Jabatan
            $table->string('slug')->unique();

            // Media
            $table->string('image')->nullable();
            $table->string('image_alt')->nullable();

            // Professional Info
            $table->text('bio')->nullable();
            $table->text('expertise')->nullable(); // Keahlian (JSON or comma separated)
            $table->integer('experience_years')->nullable(); // Tahun pengalaman

            // Social Links (JSON)
            $table->json('social_links')->nullable(); // {facebook, instagram, linkedin, twitter, etc}

            // Contact Info
            $table->string('email')->nullable();
            $table->string('phone')->nullable();

            // Display & Order
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_featured')->default(false); // Untuk ditampilkan di homepage

            // SEO
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();

            $table->timestamps();

            // Indexes
            $table->index('sort_order');
            $table->index('is_active');
            $table->index('is_featured');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
