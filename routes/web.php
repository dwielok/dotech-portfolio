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
        Route::post('/services/{service}/move-up', [Admin\ServiceController::class, 'moveUp'])->name('services.move-up');
        Route::post('/services/{service}/move-down', [Admin\ServiceController::class, 'moveDown'])->name('services.move-down');

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

        Route::get('/notifications', [App\Http\Controllers\Admin\NotificationController::class, 'index'])->name('notifications.index');
        Route::patch('/notifications/{notification}/mark-as-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAsRead'])->name('notifications.mark-as-read');
        Route::post('/notifications/mark-all-read', [App\Http\Controllers\Admin\NotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
        Route::get('/notifications/unread-count', [App\Http\Controllers\Admin\NotificationController::class, 'unreadCount'])->name('notifications.unread-count');
        Route::delete('/notifications/{notification}', [App\Http\Controllers\Admin\NotificationController::class, 'destroy'])->name('notifications.destroy');
        Route::delete('/notifications/read/all', [App\Http\Controllers\Admin\NotificationController::class, 'destroyAllRead'])->name('notifications.destroy-all-read');

        Route::get('/site-settings', [Admin\SiteSettingController::class, 'index'])->name('site-settings.index');
        Route::put('/site-settings/hero', [Admin\SiteSettingController::class, 'updateHero'])->name('site-settings.hero.update');
        Route::put('/site-settings/about', [Admin\SiteSettingController::class, 'updateAbout'])->name('site-settings.about.update');
        Route::put('/site-settings/contact', [Admin\SiteSettingController::class, 'updateContact'])->name('site-settings.contact.update');
        Route::post('/site-settings/social-links', [Admin\SiteSettingController::class, 'storeSocialLink'])->name('site-settings.social-links.store');
        Route::put('/site-settings/social-links/{socialLink}', [Admin\SiteSettingController::class, 'updateSocialLink'])->name('site-settings.social-links.update');
        Route::delete('/site-settings/social-links/{socialLink}', [Admin\SiteSettingController::class, 'destroySocialLink'])->name('site-settings.social-links.destroy');
        Route::post('/site-settings/social-links/reorder', [Admin\SiteSettingController::class, 'reorderSocialLinks'])->name('site-settings.social-links.reorder');
        Route::post('/site-settings/upload-image', [Admin\SiteSettingController::class, 'uploadImage'])->name('site-settings.upload-image');

        // Teams Routes
        Route::post('/site-settings/teams', [Admin\SiteSettingController::class, 'storeTeam'])->name('site-settings.teams.store');
        Route::put('/site-settings/teams/{team}', [Admin\SiteSettingController::class, 'updateTeam'])->name('site-settings.teams.update');
        Route::delete('/site-settings/teams/{team}', [Admin\SiteSettingController::class, 'destroyTeam'])->name('site-settings.teams.destroy');
        Route::post('/site-settings/teams/reorder', [Admin\SiteSettingController::class, 'reorderTeams'])->name('site-settings.teams.reorder');
        Route::get('/site-settings/teams/{team}/edit', [Admin\SiteSettingController::class, 'editTeam'])->name('admin.site-settings.teams.edit');
    });
