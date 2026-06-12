<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Notification extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'type',
        'title',
        'content',
        'icon',
        'icon_color',
        'bg_color',
        'route_name',
        'route_param_id',
        'route_param_type',
        'read_at',
        'sent_at',
        'user_id',
        'notifiable_type',
        'notifiable_id',
        'priority',
        'actions',
        'expires_at',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'read_at' => 'datetime',
        'sent_at' => 'datetime',
        'expires_at' => 'datetime',
        'actions' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($notification) {
            if (!$notification->sent_at) {
                $notification->sent_at = now();
            }
        });
    }

    /**
     * Scope for unread notifications.
     */
    public function scopeUnread($query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Scope for read notifications.
     */
    public function scopeRead($query)
    {
        return $query->whereNotNull('read_at');
    }

    /**
     * Scope for notifications by priority.
     */
    public function scopePriority($query, $priority)
    {
        return $query->where('priority', $priority);
    }

    /**
     * Scope for high priority notifications.
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority', 'high');
    }

    /**
     * Scope for expired notifications.
     */
    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<', now());
    }

    /**
     * Scope for active notifications (not expired).
     */
    public function scopeActive($query)
    {
        return $query->where(function ($q) {
            $q->whereNull('expires_at')->orWhere('expires_at', '>', now());
        });
    }

    /**
     * Scope for notifications by type.
     */
    public function scopeOfType($query, $type)
    {
        return $query->where('type', $type);
    }

    /**
     * Get the owning notifiable model.
     */
    public function notifiable(): MorphTo
    {
        return $this->morphTo();
    }

    /**
     * Get the user that owns the notification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Mark notification as read.
     */
    public function markAsRead()
    {
        if (is_null($this->read_at)) {
            $this->update(['read_at' => now()]);
        }

        return $this;
    }

    /**
     * Mark notification as unread.
     */
    public function markAsUnread()
    {
        $this->update(['read_at' => null]);

        return $this;
    }

    /**
     * Check if notification is read.
     */
    public function getIsReadAttribute()
    {
        return !is_null($this->read_at);
    }

    /**
     * Get notification age in human readable format.
     */
    public function getAgeAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Get the route URL for the notification.
     */
    public function getRouteUrlAttribute()
    {
        if (!$this->route_name) {
            return null;
        }

        if ($this->route_param_id && $this->route_param_type) {
            $model = $this->route_param_type === 'message'
                ? ContactMessage::class
                : ($this->route_param_type === 'project'
                    ? Project::class
                    : null);

            if ($model && $this->route_param_id) {
                $item = $model::find($this->route_param_id);
                if ($item) {
                    return route($this->route_name, $item);
                }
            }
        }

        return $this->route_param_id
            ? route($this->route_name, $this->route_param_id)
            : route($this->route_name);
    }

    /**
     * Create notification from template.
     */
    public static function createFromTemplate($type, $data, $userId = null)
    {
        $templates = self::getTemplates();

        if (!isset($templates[$type])) {
            throw new \Exception("Notification template '{$type}' not found.");
        }

        $template = $templates[$type];

        // Replace placeholders in title and content
        $title = $template['title'];
        $content = $template['content'];

        foreach ($data as $key => $value) {
            $title = str_replace("{{{$key}}}", $value, $title);
            $content = str_replace("{{{$key}}}", $value, $content);
        }

        return self::create([
            'type' => $type,
            'title' => $title,
            'content' => $content,
            'icon' => $template['icon'],
            'icon_color' => $template['icon_color'],
            'bg_color' => $template['bg_color'],
            'route_name' => $template['route_name'] ?? null,
            'route_param_id' => $data['id'] ?? null,
            'route_param_type' => $template['route_param_type'] ?? null,
            'user_id' => $userId,
            'priority' => $template['priority'] ?? 'medium',
            'expires_at' => isset($template['expires_days'])
                ? now()->addDays($template['expires_days'])
                : null,
        ]);
    }

    /**
     * Get notification templates.
     */
    public static function getTemplates()
    {
        return [
            'message' => [
                'title' => 'Pesan Baru dari {{name}}',
                'content' => 'Anda menerima pesan baru dengan subjek "{{subject}}"',
                'icon' => 'fas fa-envelope',
                'icon_color' => 'text-blue-500',
                'bg_color' => 'bg-blue-50',
                'route_name' => 'admin.messages.show',
                'route_param_type' => 'message',
                'priority' => 'high',
                'expires_days' => 30,
            ],
            'project' => [
                'title' => 'Proyek Baru Ditambahkan',
                'content' => 'Proyek "{{title}}" telah ditambahkan ke portfolio',
                'icon' => 'fas fa-folder-open',
                'icon_color' => 'text-green-500',
                'bg_color' => 'bg-green-50',
                'route_name' => 'admin.projects.show',
                'route_param_type' => 'project',
                'priority' => 'medium',
                'expires_days' => 60,
            ],
            'testimonial' => [
                'title' => 'Testimonial Baru',
                'content' => '{{name}} memberikan testimonial baru dengan rating {{rating}}⭐',
                'icon' => 'fas fa-star',
                'icon_color' => 'text-yellow-500',
                'bg_color' => 'bg-yellow-50',
                'route_name' => 'admin.testimonials.show',
                'route_param_type' => 'testimonial',
                'priority' => 'medium',
                'expires_days' => 30,
            ],
            'system' => [
                'title' => '{{title}}',
                'content' => '{{content}}',
                'icon' => 'fas fa-server',
                'icon_color' => 'text-purple-500',
                'bg_color' => 'bg-purple-50',
                'route_name' => null,
                'priority' => 'low',
                'expires_days' => 7,
            ],
            'contact' => [
                'title' => 'Pesan dari Contact Form',
                'content' => '{{name}} mengirim pesan melalui contact form: "{{subject}}"',
                'icon' => 'fas fa-comment-dots',
                'icon_color' => 'text-indigo-500',
                'bg_color' => 'bg-indigo-50',
                'route_name' => 'admin.messages.show',
                'route_param_type' => 'message',
                'priority' => 'high',
                'expires_days' => 30,
            ],
            'user_registered' => [
                'title' => 'User Baru Mendaftar',
                'content' => 'User baru {{name}} ({{email}}) telah mendaftar',
                'icon' => 'fas fa-user-plus',
                'icon_color' => 'text-emerald-500',
                'bg_color' => 'bg-emerald-50',
                'route_name' => 'admin.users.show',
                'route_param_type' => 'user',
                'priority' => 'medium',
                'expires_days' => 7,
            ],
            'backup_completed' => [
                'title' => 'Backup Database Selesai',
                'content' => 'Backup database telah selesai pada {{time}}',
                'icon' => 'fas fa-database',
                'icon_color' => 'text-cyan-500',
                'bg_color' => 'bg-cyan-50',
                'route_name' => null,
                'priority' => 'low',
                'expires_days' => 3,
            ],
            'error_occurred' => [
                'title' => 'Error pada Sistem',
                'content' => 'Terjadi error: {{error_message}}',
                'icon' => 'fas fa-exclamation-triangle',
                'icon_color' => 'text-red-500',
                'bg_color' => 'bg-red-50',
                'route_name' => null,
                'priority' => 'high',
                'expires_days' => 1,
            ],
        ];
    }

    /**
     * Delete old notifications.
     */
    public static function deleteOldNotifications($days = 90)
    {
        return self::where('created_at', '<', now()->subDays($days))
            ->delete();
    }

    /**
     * Get notification priority badge class.
     */
    public function getPriorityBadgeAttribute()
    {
        return match ($this->priority) {
            'high' => 'bg-red-100 text-red-700',
            'medium' => 'bg-yellow-100 text-yellow-700',
            'low' => 'bg-green-100 text-green-700',
            default => 'bg-gray-100 text-gray-700',
        };
    }
}
