<?php

namespace App\Http\Controllers;

use App\Helpers\NotificationHelper;
use App\Http\Requests\StoreContactMessageRequest;
use App\Models\ContactInformation;
use App\Models\SocialLink;
use App\Services\ContactService;

class ContactController extends Controller
{
    public function __construct(
        private readonly ContactService $contactService
    ) {}

    public function index()
    {
        $contact     = ContactInformation::where('is_active', true)->first();
        $socialLinks = SocialLink::active()->get();

        return view('contact', compact('contact', 'socialLinks'));
    }

    public function store(StoreContactMessageRequest $request)
    {
        $msg = $this->contactService->store($request->validated());

        NotificationHelper::send('contact', [
            'id' => $msg->id,
            'name' => $msg->name,
            'subject' => $msg->subject,
        ]);

        return redirect()->route('contact')
            ->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
