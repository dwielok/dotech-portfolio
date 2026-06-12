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
        $this->contactService->store($request->validated());

        NotificationHelper::send('message', [
            'name' => 'John Doe',
            'subject' => 'Info Produk'
        ]);

        return redirect()->route('contact')
            ->with('success', 'Pesan Anda berhasil dikirim! Kami akan segera menghubungi Anda.');
    }
}
