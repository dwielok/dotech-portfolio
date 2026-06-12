<?php
// app/Http/Controllers/Admin/NotificationController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of notifications.
     */
    public function index()
    {
        $notifications = Notification::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->latest()
            ->paginate(20);

        $unreadCount = Notification::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->unread()
            ->count();

        return view('admin.notifications.index', compact('notifications', 'unreadCount'));
    }

    /**
     * Mark a notification as read.
     */
    public function markAsRead(Notification $notification)
    {
        // Check if notification belongs to user or is global
        if ($notification->user_id && $notification->user_id !== auth()->id()) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        $notification->markAsRead();

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Notifikasi ditandai sebagai dibaca.');
    }

    /**
     * Mark all notifications as read.
     */
    public function markAllAsRead()
    {
        Notification::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->unread()
            ->update(['read_at' => now()]);

        if (request()->wantsJson()) {
            return response()->json(['success' => true]);
        }

        return back()->with('success', 'Semua notifikasi ditandai sebagai dibaca.');
    }

    /**
     * Get unread notifications count.
     */
    public function unreadCount()
    {
        $count = Notification::whereNull('user_id')
            ->orWhere('user_id', auth()->id())
            ->unread()
            ->count();

        return response()->json(['count' => $count]);
    }

    /**
     * Remove the specified notification.
     */
    public function destroy(Notification $notification)
    {
        // Check if notification belongs to user or is global
        if ($notification->user_id && $notification->user_id !== auth()->id()) {
            return back()->with('error', 'Unauthorized action.');
        }

        $notification->delete();

        return back()->with('success', 'Notifikasi berhasil dihapus.');
    }

    /**
     * Remove all read notifications.
     */
    public function destroyAllRead()
    {
        Notification::whereNotNull('read_at')
            ->where(function ($query) {
                $query->whereNull('user_id')
                    ->orWhere('user_id', auth()->id());
            })
            ->delete();

        return back()->with('success', 'Semua notifikasi yang sudah dibaca telah dihapus.');
    }
}
