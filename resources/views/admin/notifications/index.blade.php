@extends('layouts.admin')
@section('title', 'Semua Notifikasi')

@section('content')
    <div class="space-y-6">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Semua Notifikasi</h1>
                <p class="text-sm text-gray-500 mt-0.5">Kelola semua notifikasi sistem</p>
            </div>
            <div class="flex items-center gap-3">
                @if ($unreadCount > 0)
                    <button onclick="markAllAsRead()"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-xl transition-all">
                        <i class="fas fa-check-double"></i>
                        <span>Tandai Semua Dibaca</span>
                    </button>
                @endif
                <button onclick="deleteAllRead()"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                    <i class="fas fa-trash-alt"></i>
                    <span>Hapus Notifikasi Terbaca</span>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="divide-y divide-gray-100">
                @forelse($notifications as $notification)
                    <div
                        class="notification-item p-6 {{ is_null($notification->read_at) ? 'bg-blue-50/20' : 'hover:bg-gray-50' }} transition-colors">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-12 h-12 rounded-xl {{ $notification->bg_color }} flex items-center justify-center">
                                    <i class="{{ $notification->icon }} {{ $notification->icon_color }} text-lg"></i>
                                </div>
                            </div>

                            <div class="flex-1 min-w-0">
                                <div class="flex items-start justify-between gap-4">
                                    <div class="flex-1">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <h3 class="font-semibold text-gray-900">{{ $notification->title }}</h3>
                                            @if ($notification->priority === 'high')
                                                <span
                                                    class="text-[10px] px-2 py-0.5 rounded-full bg-red-100 text-red-600">Penting</span>
                                            @endif
                                            @if (is_null($notification->read_at))
                                                <span
                                                    class="text-[10px] px-2 py-0.5 rounded-full bg-blue-100 text-blue-600">Baru</span>
                                            @endif
                                        </div>
                                        <p class="text-sm text-gray-600 mt-1">{{ $notification->content }}</p>
                                        <p class="text-xs text-gray-400 mt-2">
                                            {{ $notification->created_at->diffForHumans() }}</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        @if (is_null($notification->read_at))
                                            <button onclick="markAsRead({{ $notification->id }})"
                                                class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors"
                                                title="Tandai dibaca">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        @endif
                                        <button onclick="deleteNotification({{ $notification->id }})"
                                            class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition-colors"
                                            title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="flex flex-col items-center justify-center py-16 text-center">
                        <div class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-bell-slash text-gray-400 text-3xl"></i>
                        </div>
                        <p class="text-gray-500 font-medium text-lg">Tidak ada notifikasi</p>
                        <p class="text-sm text-gray-400 mt-1">Belum ada notifikasi yang masuk</p>
                    </div>
                @endforelse
            </div>

            @if ($notifications->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                    {{ $notifications->links() }}
                </div>
            @endif
        </div>
    </div>

    @push('scripts')
        <script>
            function markAsRead(id) {
                fetch(`/admin/notifications/${id}/mark-as-read`, {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    });
            }

            function markAllAsRead() {
                fetch('{{ route('admin.notifications.mark-all-read') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            'Content-Type': 'application/json'
                        }
                    }).then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            location.reload();
                        }
                    });
            }

            function deleteNotification(id) {
                if (confirm('Apakah Anda yakin ingin menghapus notifikasi ini?')) {
                    fetch(`/admin/notifications/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            }
                        });
                }
            }

            function deleteAllRead() {
                if (confirm('Apakah Anda yakin ingin menghapus semua notifikasi yang sudah dibaca?')) {
                    fetch('{{ route('admin.notifications.destroy-all-read') }}', {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            }
                        });
                }
            }
        </script>
    @endpush
@endsection
