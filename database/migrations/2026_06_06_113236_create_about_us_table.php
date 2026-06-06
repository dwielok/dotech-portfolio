<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->text('mission')->nullable();
            $table->text('vision')->nullable();
            $table->string('image')->nullable();
            $table->integer('years_experience')->default(0);
            $table->integer('projects_completed')->default(0);
            $table->integer('happy_clients')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
