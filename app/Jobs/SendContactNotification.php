<?php

namespace App\Jobs;

use App\Mail\ContactMessageReceived;
use App\Models\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $backoff = 60;

    public function __construct(
        public readonly ContactMessage $message
    ) {}

    public function handle(): void
    {
        Mail::to(config('mail.admin_email', env('ADMIN_EMAIL')))
            ->send(new ContactMessageReceived($this->message));
    }

    public function failed(\Throwable $exception): void
    {
        logger()->error('Contact notification failed: ' . $exception->getMessage(), [
            'message_id' => $this->message->id,
        ]);
    }
}
