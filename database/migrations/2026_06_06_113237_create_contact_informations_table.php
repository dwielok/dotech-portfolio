<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_informations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('whatsapp')->nullable();
            $table->text('address')->nullable();
            $table->text('google_maps_embed')->nullable();
            $table->string('office_hours')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_informations');
    }
};
