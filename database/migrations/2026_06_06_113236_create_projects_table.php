<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description');
            $table->longText('full_description')->nullable();
            $table->string('client_name')->nullable();
            $table->date('project_date')->nullable();
            $table->string('project_url')->nullable();
            $table->string('featured_image')->nullable();
            $table->string('category')->nullable();
            $table->json('technologies')->nullable();
            $table->enum('status', ['draft', 'published'])->default('draft');
            $table->boolean('is_featured')->default(false);
            // SEO Fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
