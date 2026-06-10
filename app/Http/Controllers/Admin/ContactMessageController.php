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
            ->when($request->filter === 'read', fn($q) => $q->read())
            ->latest()
            ->paginate(15);

        $unreadCount = ContactMessage::unread()->count();
        $thisMonthCount = ContactMessage::whereMonth('created_at', now()->month)->count();
        $thisWeekCount = ContactMessage::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();

        return view('admin.messages.index', compact('messages', 'unreadCount', 'thisMonthCount', 'thisWeekCount'));
    }

    public function show(ContactMessage $message)
    {
        // $message->markAsRead();
        return view('admin.messages.show', compact('message'));
    }

    public function markRead(ContactMessage $message)
    {
        $message->markAsRead();
        return back()->with('success', 'Pesan ditandai telah dibaca.');
    }

    public function markUnread(ContactMessage $message)
    {
        $message->markAsUnread();
        return back()->with('success', 'Pesan ditandai belum dibaca.');
    }

    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')
            ->with('success', 'Pesan berhasil dihapus.');
    }

    public function bulkMarkRead(Request $request)
    {
        $ids = $request->ids;
        ContactMessage::whereIn('id', $ids)->update(['is_read' => true]);
        return response()->json(['success' => true]);
    }

    public function bulkDestroy(Request $request)
    {
        $ids = json_decode($request->ids);
        ContactMessage::whereIn('id', $ids)->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan terpilih berhasil dihapus.');
    }
}
