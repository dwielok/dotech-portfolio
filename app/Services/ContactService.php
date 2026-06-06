<?php

namespace App\Services;

use App\Jobs\SendContactNotification;
use App\Models\ContactMessage;

class ContactService
{
    public function store(array $data): ContactMessage
    {
        $message = ContactMessage::create([
            'name'       => $data['name'],
            'email'      => $data['email'],
            'phone'      => $data['phone'] ?? null,
            'subject'    => $data['subject'],
            'message'    => $data['message'],
            'ip_address' => request()->ip(),
        ]);

        // Dispatch queued email notification
        SendContactNotification::dispatch($message)->onQueue('emails');

        return $message;
    }
}
