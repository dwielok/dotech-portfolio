@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
    <div class="space-y-6">
        {{-- Header with Back Button --}}
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.messages.index') }}"
                    class="inline-flex items-center justify-center w-10 h-10 bg-white border border-gray-200 rounded-xl text-gray-600 hover:bg-gray-50 hover:text-dotech-blue transition-all duration-200">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Detail Pesan</h1>
                    <p class="text-sm text-gray-500 mt-0.5">Lihat informasi lengkap pesan dari pengunjung</p>
                </div>
            </div>
            <div class="flex items-center gap-3">
                {{-- Mark as Unread Button (if needed) --}}
                @if ($message->is_read)
                    <form action="{{ route('admin.messages.unread', $message) }}" method="POST" class="inline">
                        @csrf
                        @method('PATCH')
                        <button type="submit"
                            class="inline-flex items-center gap-2 px-5 py-2.5 bg-yellow-50 hover:bg-yellow-100 text-yellow-700 text-sm font-medium rounded-xl transition-all duration-200 border border-yellow-200">
                            <i class="fas fa-envelope"></i>
                            <span>Tandai Belum Dibaca</span>
                        </button>
                    </form>
                @endif

                {{-- Delete Button --}}
                <button type="button" onclick="showDeleteModal('{{ $message->id }}', '{{ addslashes($message->name) }}')"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-red-50 hover:bg-red-100 text-red-600 text-sm font-medium rounded-xl transition-all duration-200 border border-red-200">
                    <i class="fas fa-trash-alt"></i>
                    <span>Hapus</span>
                </button>
            </div>
        </div>

        {{-- Main Content Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Left Column - Message Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Message Card --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope-open-text text-blue-600 text-sm"></i>
                            </div>
                            <h3 class="font-semibold text-gray-800">Isi Pesan</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        {{-- Subject --}}
                        <div class="mb-6">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                                <i class="fas fa-tag mr-1"></i> Subjek
                            </label>
                            <div class="bg-gray-50 rounded-xl px-4 py-3 border border-gray-100">
                                <p class="text-gray-800 font-medium">{{ $message->subject }}</p>
                            </div>
                        </div>

                        {{-- Message --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wider mb-2">
                                <i class="fas fa-comment-dots mr-1"></i> Pesan
                            </label>
                            <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                                <div class="prose prose-sm max-w-none">
                                    <p class="text-gray-700 whitespace-pre-wrap leading-relaxed">{{ $message->message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Reply Info (if any) --}}
                @if ($message->replied_at)
                    <div class="bg-green-50 rounded-2xl border border-green-100 p-5">
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-reply-all text-green-600"></i>
                            </div>
                            <div class="flex-1">
                                <div class="flex items-center justify-between flex-wrap gap-2 mb-2">
                                    <h4 class="font-semibold text-green-800">Pesan Telah Dibalas</h4>
                                    <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-lg">
                                        {{ $message->replied_at->format('d M Y H:i') }}
                                    </span>
                                </div>
                                <p class="text-sm text-green-700">
                                    {{ $message->reply_notes ?? 'Balasan telah dikirim ke pengirim.' }}</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{-- Right Column - Sender Information --}}
            <div class="space-y-6">
                {{-- Sender Card --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden sticky top-6">
                    <div class="border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                <i class="fas fa-user-circle text-purple-600 text-sm"></i>
                            </div>
                            <h3 class="font-semibold text-gray-800">Informasi Pengirim</h3>
                        </div>
                    </div>
                    <div class="p-6">
                        {{-- Avatar & Name --}}
                        <div class="flex items-center gap-4 mb-6 pb-6 border-b border-gray-100">
                            <div
                                class="w-16 h-16 rounded-2xl bg-gradient-to-br from-dotech-blue to-blue-600 text-white flex items-center justify-center text-2xl font-bold shadow-lg">
                                {{ strtoupper(substr($message->name, 0, 1)) }}
                            </div>
                            <div class="flex-1">
                                <h4 class="font-bold text-gray-800 text-lg">{{ $message->name }}</h4>
                                <div class="flex items-center gap-2 mt-1">
                                    @if ($message->is_read)
                                        <span
                                            class="inline-flex items-center gap-1 text-xs text-green-600 bg-green-50 px-2 py-0.5 rounded-full">
                                            <i class="fas fa-check-circle text-xs"></i> Sudah Dibaca
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1 text-xs text-red-600 bg-red-50 px-2 py-0.5 rounded-full">
                                            <i class="fas fa-circle text-[8px]"></i> Belum Dibaca
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Contact Details --}}
                        <div class="space-y-4">
                            {{-- Email --}}
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-blue-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-envelope text-blue-500 text-sm"></i>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Alamat Email</p>
                                    <a href="mailto:{{ $message->email }}"
                                        class="text-sm text-dotech-blue hover:underline break-all">
                                        {{ $message->email }}
                                    </a>
                                </div>
                            </div>

                            {{-- Phone --}}
                            @if ($message->phone)
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-green-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-phone-alt text-green-500 text-sm"></i>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Nomor Telepon</p>
                                        <a href="tel:{{ $message->phone }}"
                                            class="text-sm text-gray-700 hover:text-dotech-blue">
                                            {{ $message->phone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            {{-- Received At --}}
                            <div class="flex items-start gap-3">
                                <div class="w-8 h-8 bg-gray-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <i class="fas fa-calendar-alt text-gray-500 text-sm"></i>
                                </div>
                                <div class="flex-1">
                                    <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Diterima Pada</p>
                                    <p class="text-sm text-gray-700">
                                        {{ $message->created_at->format('l, d F Y') }}
                                    </p>
                                    <p class="text-xs text-gray-400 mt-0.5">
                                        {{ $message->created_at->format('H:i:s') }} WIB
                                    </p>
                                </div>
                            </div>

                            {{-- IP Address (if available) --}}
                            @if ($message->ip_address)
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-orange-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-network-wired text-orange-500 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Alamat IP</p>
                                        <p class="text-sm text-gray-700 font-mono">{{ $message->ip_address }}</p>
                                    </div>
                                </div>
                            @endif

                            {{-- User Agent (if available) --}}
                            @if ($message->user_agent)
                                <div class="flex items-start gap-3">
                                    <div
                                        class="w-8 h-8 bg-indigo-50 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <i class="fas fa-globe text-indigo-500 text-sm"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs text-gray-500 uppercase tracking-wider mb-1">Browser / Perangkat
                                        </p>
                                        <p class="text-xs text-gray-600 break-words">{{ $message->user_agent }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        {{-- Quick Actions --}}
                        <div class="mt-6 pt-6 border-t border-gray-100">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-3">Aksi Cepat</p>
                            <div class="flex flex-col gap-2">
                                <a href="mailto:{{ $message->email }}?subject=Re: {{ $message->subject }}"
                                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:from-blue-700 hover:to-blue-700 transition-all duration-200">
                                    <i class="fas fa-reply"></i>
                                    <span>Balas via Email</span>
                                </a>
                                <button type="button" onclick="copyEmail('{{ $message->email }}')"
                                    class="inline-flex items-center justify-center gap-2 px-4 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all duration-200">
                                    <i class="fas fa-copy"></i>
                                    <span>Salin Alamat Email</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Delete Confirmation Modal --}}
    <div id="deleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeDeleteModal()"></div>

            <div
                class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')

                    <div class="bg-white px-6 pt-6 pb-4">
                        <div class="flex items-start gap-4">
                            <div
                                class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center animate-pulse">
                                <i class="fas fa-trash-alt text-red-600 text-xl"></i>
                            </div>

                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900">
                                    Hapus Pesan
                                </h3>
                                <div class="mt-3">
                                    <p class="text-sm text-gray-600">
                                        Apakah Anda yakin ingin menghapus pesan dari
                                        <span id="senderNameDisplay" class="font-semibold text-gray-900"></span>?
                                    </p>

                                    <div class="mt-4 p-3 bg-red-50 rounded-xl border border-red-100">
                                        <div class="flex items-start gap-2">
                                            <i class="fas fa-exclamation-triangle text-red-500 text-sm mt-0.5"></i>
                                            <p class="text-xs text-red-700">
                                                Tindakan ini akan menghapus pesan secara permanen dan tidak dapat
                                                dibatalkan.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                        <button type="button" onclick="closeDeleteModal()"
                            class="px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-medium rounded-xl shadow-lg shadow-red-500/25 transition-all duration-200 transform hover:scale-[1.02] flex items-center gap-2">
                            <i class="fas fa-trash-alt"></i>
                            <span>Ya, Hapus Pesan</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            /* Animation for modal */
            @keyframes slideIn {
                from {
                    transform: translateY(-50px);
                    opacity: 0;
                }

                to {
                    transform: translateY(0);
                    opacity: 1;
                }
            }

            .sm\:align-middle {
                animation: slideIn 0.3s ease-out;
            }

            @keyframes pulse {

                0%,
                100% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }
            }

            .animate-pulse {
                animation: pulse 0.5s ease-in-out;
            }

            /* Custom prose styling */
            .prose {
                line-height: 1.6;
            }

            /* Sticky sidebar */
            .sticky {
                position: sticky;
                top: 1.5rem;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Delete Modal Functions
            function showDeleteModal(messageId, senderName) {
                const modal = document.getElementById('deleteModal');
                const form = document.getElementById('deleteForm');
                const senderSpan = document.getElementById('senderNameDisplay');

                // Set form action
                form.action = `/admin/messages/${messageId}`;

                // Set sender name
                senderSpan.textContent = senderName;

                // Show modal
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';

                // Add escape key listener
                document.addEventListener('keydown', handleEscapeKey);
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                modal.classList.add('hidden');
                document.body.style.overflow = '';

                // Remove escape key listener
                document.removeEventListener('keydown', handleEscapeKey);
            }

            function handleEscapeKey(event) {
                if (event.key === 'Escape') {
                    closeDeleteModal();
                }
            }

            // Close modal when clicking outside
            document.getElementById('deleteModal').addEventListener('click', function(event) {
                if (event.target === this) {
                    closeDeleteModal();
                }
            });

            // Copy email to clipboard
            function copyEmail(email) {
                navigator.clipboard.writeText(email).then(function() {
                    // Show temporary notification
                    const notification = document.createElement('div');
                    notification.className =
                        'fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg z-50 animate-fade-in';
                    notification.innerHTML = '<i class="fas fa-check-circle mr-2"></i> Email berhasil disalin!';
                    document.body.appendChild(notification);

                    setTimeout(function() {
                        notification.remove();
                    }, 3000);
                }).catch(function() {
                    alert('Gagal menyalin email. Silakan salin manual.');
                });
            }
        </script>
    @endpush
@endsection
