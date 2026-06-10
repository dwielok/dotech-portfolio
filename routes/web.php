<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

// ─── Public Routes ───────────────────────────────────────────────
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{project:slug}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/privacy-policy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms-conditions', [PageController::class, 'terms'])->name('terms');

// ─── Breeze Auth Routes ───────────────────────────────────────────
require __DIR__ . '/auth.php';

// ─── Admin Routes ─────────────────────────────────────────────────
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/dashboard', [Admin\DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('hero-sections', Admin\HeroSectionController::class);
        Route::resource('about-us', Admin\AboutUsController::class)->parameters(['about-us' => 'aboutUs']);
        Route::resource('projects', Admin\ProjectController::class);
        Route::delete('projects/{project}/images/{image}', [Admin\ProjectController::class, 'destroyImage'])
            ->name('projects.images.destroy');
        Route::resource('services', Admin\ServiceController::class);
        Route::resource('testimonials', Admin\TestimonialController::class);
        Route::resource('contact-info', Admin\ContactInformationController::class)->parameters(['contact-info' => 'contactInfo']);
        Route::resource('social-links', Admin\SocialLinkController::class);

        Route::get('messages', [Admin\ContactMessageController::class, 'index'])
            ->name('messages.index');
        Route::get('messages/{message}', [Admin\ContactMessageController::class, 'show'])
            ->name('messages.show');
        Route::patch('messages/{message}/read', [Admin\ContactMessageController::class, 'markRead'])
            ->name('messages.read');
        Route::patch('messages/{message}/unread', [Admin\ContactMessageController::class, 'markUnread'])
            ->name('messages.unread');
        Route::delete('messages/{message}', [Admin\ContactMessageController::class, 'destroy'])
            ->name('messages.destroy');
        Route::post('/admin/messages/bulk-mark-read', [Admin\ContactMessageController::class, 'bulkMarkRead'])->name('messages.bulk-mark-read');
        Route::delete('/admin/messages/bulk-destroy', [Admin\ContactMessageController::class, 'bulkDestroy'])->name('messages.bulk-destroy');

        Route::resource('users', Admin\UserController::class);
    });
