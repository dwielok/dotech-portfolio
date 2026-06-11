<?php
// app/Helpers/NotificationHelper.php

namespace App\Helpers;

use App\Models\Notification;

class NotificationHelper
{
    /**
     * Send notification to admin(s).
     */
    public static function send($type, $data, $userId = null)
    {
        try {
            return Notification::createFromTemplate($type, $data, $userId);
        } catch (\Exception $e) {
            \Log::error('Failed to create notification: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Send notification to all admins.
     */
    public static function sendToAllAdmins($type, $data)
    {
        $admins = \App\Models\User::where('role', 'admin')->get();
        $notifications = [];

        foreach ($admins as $admin) {
            $notifications[] = self::send($type, $data, $admin->id);
        }

        return $notifications;
    }

    /**
     * Get unread count for a user.
     */
    public static function unreadCount($userId = null)
    {
        $query = Notification::unread();

        if ($userId) {
            $query->where('user_id', $userId);
        }

        return $query->count();
    }

    /**
     * Clean up old notifications.
     */
    public static function cleanup($days = 90)
    {
        return Notification::deleteOldNotifications($days);
    }
}
