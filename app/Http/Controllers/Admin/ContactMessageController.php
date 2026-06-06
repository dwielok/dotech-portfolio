<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function index(Request $request)
    {
        $messages = ContactMessage::query()
            ->when($request->search, fn($q) => $q->where('name', 'like', "%{$request->search}%")
                ->orWhere('subject', 'like', "%{$request->search}%"))
            ->when($request->filter === 'unread', fn($q) => $q->unread())
            ->latest()
            ->paginate(15);

        $unreadCount = ContactMessage::unread()->count();

        return view('admin.messages.index', compact('messages', 'unreadCount'));
    }

    public function show(ContactMessage $message)
    {
        $message->markAsRead();
        return view('admin.messages.show', compact('message'));
    }

    public function markRead(ContactMessage $message)
    {
        $message->markAsRead();
        return back()->with('success', 'Pesan ditandai telah dibaca.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }
}
