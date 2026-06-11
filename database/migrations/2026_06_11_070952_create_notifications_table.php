<?php

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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();

            // Notification content
            $table->string('type'); // message, project, testimonial, system, etc.
            $table->string('title');
            $table->text('content');

            // Icon configuration
            $table->string('icon')->default('fas fa-bell');
            $table->string('icon_color')->default('text-gray-500');
            $table->string('bg_color')->default('bg-gray-100');

            // Routing
            $table->string('route_name')->nullable(); // admin.messages.index, etc.
            $table->string('route_param_id')->nullable(); // ID for route parameter
            $table->string('route_param_type')->nullable(); // 'message', 'project', etc. for polymorphic

            // Status
            $table->timestamp('read_at')->nullable();
            $table->timestamp('sent_at')->nullable();

            // Target user (if specific user, null = all admins)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');

            // Related model (polymorphic)
            $table->nullableMorphs('notifiable');

            // Priority
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');

            // Action buttons (JSON for custom actions)
            $table->json('actions')->nullable(); // Store custom action buttons

            // Expiry
            $table->timestamp('expires_at')->nullable();

            $table->timestamps();

            // Indexes for performance
            $table->index(['user_id', 'read_at']);
            $table->index('created_at');
            $table->index('type');
            $table->index('priority');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
