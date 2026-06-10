@extends('layouts.admin')
@section('title', 'Pesan Masuk')

@section('content')
    <div class="space-y-6">
        {{-- Header with Stats --}}
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Pesan Masuk</h1>
                <p class="text-sm text-gray-500 mt-0.5">Kelola dan baca pesan dari pengunjung website</p>
            </div>
            <div class="flex items-center gap-3">
                {{-- Bulk Action Button (optional) --}}
                @if ($messages->total() > 0)
                    <button type="button" onclick="toggleBulkMode()" id="bulkModeBtn"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all duration-200">
                        <i class="fas fa-check-double"></i>
                        <span>Pilih Banyak</span>
                    </button>
                @endif

                {{-- Refresh Button --}}
                <a href="{{ route('admin.messages.index') }}"
                    class="inline-flex items-center gap-2 px-5 py-2.5 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 text-sm font-medium rounded-xl transition-all duration-200">
                    <i class="fas fa-sync-alt"></i>
                    <span>Refresh</span>
                </a>
            </div>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
            {{-- Total Messages --}}
            <div
                class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Total Pesan</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $messages->total() }}</p>
                        <div class="flex items-center gap-1 mt-2">
                            <i class="fas fa-envelope text-blue-500 text-xs"></i>
                            <p class="text-xs text-gray-500">Semua pesan</p>
                        </div>
                    </div>
                    <div
                        class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-500 group-hover:scale-110 transition-all duration-300">
                        <i class="fas fa-inbox text-blue-600 text-xl group-hover:text-white transition-colors"></i>
                    </div>
                </div>
            </div>

            {{-- Unread Messages --}}
            <div
                class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Belum Dibaca</p>
                        <p class="text-3xl font-bold {{ $unreadCount > 0 ? 'text-red-600' : 'text-gray-900' }}">
                            {{ $unreadCount }}</p>
                        @if ($unreadCount > 0)
                            <div class="flex items-center gap-1 mt-2">
                                <i class="fas fa-circle text-red-500 text-[8px]"></i>
                                <p class="text-xs text-red-600 font-medium">Perlu perhatian</p>
                            </div>
                        @else
                            <div class="flex items-center gap-1 mt-2">
                                <i class="fas fa-check-circle text-green-500 text-xs"></i>
                                <p class="text-xs text-gray-500">Semua terbaca</p>
                            </div>
                        @endif
                    </div>
                    <div
                        class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center group-hover:bg-red-500 group-hover:scale-110 transition-all duration-300">
                        <i class="fas fa-envelope text-red-600 text-xl group-hover:text-white transition-colors"></i>
                    </div>
                </div>
            </div>

            {{-- This Month --}}
            <div
                class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Bulan Ini</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $thisMonthCount ?? 0 }}</p>
                        <div class="flex items-center gap-1 mt-2">
                            <i class="fas fa-calendar-alt text-purple-500 text-xs"></i>
                            <p class="text-xs text-gray-500">{{ now()->format('F Y') }}</p>
                        </div>
                    </div>
                    <div
                        class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center group-hover:bg-purple-500 group-hover:scale-110 transition-all duration-300">
                        <i class="fas fa-chart-line text-purple-600 text-xl group-hover:text-white transition-colors"></i>
                    </div>
                </div>
            </div>

            {{-- This Week --}}
            <div
                class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500 mb-1">Minggu Ini</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $thisWeekCount ?? 0 }}</p>
                        <div class="flex items-center gap-1 mt-2">
                            <i class="fas fa-clock text-green-500 text-xs"></i>
                            <p class="text-xs text-gray-500">7 hari terakhir</p>
                        </div>
                    </div>
                    <div
                        class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center group-hover:bg-green-500 group-hover:scale-110 transition-all duration-300">
                        <i class="fas fa-calendar-week text-green-600 text-xl group-hover:text-white transition-colors"></i>
                    </div>
                </div>
            </div>
        </div>

        {{-- Main Card --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            {{-- Search & Filter --}}
            <div class="p-5 border-b border-gray-100 bg-gray-50/50">
                <form method="GET" class="flex flex-wrap items-center gap-3">
                    <div class="relative flex-1 min-w-[200px]">
                        <i class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" name="search" value="{{ request('search') }}"
                            placeholder="Cari berdasarkan nama atau subjek..."
                            class="w-full pl-9 pr-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    </div>
                    <div class="relative">
                        <select name="filter"
                            class="px-4 py-2.5 bg-white border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all appearance-none cursor-pointer pr-10">
                            <option value="">Semua Pesan</option>
                            <option value="unread" {{ request('filter') === 'unread' ? 'selected' : '' }}>Belum Dibaca
                            </option>
                            <option value="read" {{ request('filter') === 'read' ? 'selected' : '' }}>Sudah Dibaca
                            </option>
                        </select>
                        <i
                            class="fas fa-chevron-down absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 text-xs pointer-events-none"></i>
                    </div>
                    <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-sm font-medium rounded-xl shadow-sm hover:shadow-md transition-all">
                        <i class="fas fa-filter mr-2"></i>Filter
                    </button>
                    @if (request()->hasAny(['search', 'filter']))
                        <a href="{{ route('admin.messages.index') }}"
                            class="px-5 py-2.5 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-xl shadow-sm transition-all">
                            <i class="fas fa-times mr-2"></i>Reset
                        </a>
                    @endif
                </form>
            </div>

            {{-- Bulk Actions Bar (hidden by default) --}}
            <div id="bulkActionsBar"
                class="hidden bg-blue-50 border-b border-blue-100 px-5 py-3 items-center justify-between transition-all duration-200">
                <div class="flex items-center gap-3">
                    <div class="flex items-center gap-2">
                        <input type="checkbox" id="selectAllCheckbox" onclick="toggleSelectAll()"
                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="text-sm text-gray-700">Pilih Semua</span>
                    </div>
                    <span id="selectedCount" class="text-sm font-semibold text-blue-700">0</span>
                    <span class="text-sm text-gray-500">pesan dipilih</span>
                </div>
                <div class="flex items-center gap-2">
                    <button type="button" onclick="bulkMarkRead()"
                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-all">
                        <i class="fas fa-check-double mr-2"></i>Tandai Dibaca
                    </button>
                    <button type="button" onclick="bulkDelete()"
                        class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-all">
                        <i class="fas fa-trash-alt mr-2"></i>Hapus
                    </button>
                    <button type="button" onclick="toggleBulkMode()"
                        class="px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-all">
                        <i class="fas fa-times mr-2"></i>Batal
                    </button>
                </div>
            </div>

            {{-- Messages Table --}}
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="bg-gray-50 border-b border-gray-100">
                            <th
                                class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider w-10">
                                <input type="checkbox" id="bulkCheckbox" style="display: none;"
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Pengirim</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Subjek</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Pesan</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Diterima</th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($messages as $message)
                            <tr
                                class="hover:bg-gray-50/50 transition-colors group {{ !$message->is_read ? 'bg-blue-50/30' : '' }}">
                                <td class="px-6 py-4">
                                    <input type="checkbox" name="message_ids[]" value="{{ $message->id }}"
                                        class="message-checkbox bulk-checkbox w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500"
                                        style="display: none;">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div class="relative">
                                            <div
                                                class="w-10 h-10 rounded-xl bg-gradient-to-br from-dotech-blue to-blue-600 text-white flex items-center justify-center text-sm font-bold shadow-sm">
                                                {{ strtoupper(substr($message->name, 0, 1)) }}
                                            </div>
                                            @if (!$message->is_read)
                                                <span class="absolute -top-1 -right-1 relative flex h-3 w-3">
                                                    <span
                                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                                    <span
                                                        class="relative inline-flex rounded-full h-3 w-3 bg-red-500"></span>
                                                </span>
                                            @endif
                                        </div>
                                        <div>
                                            <p
                                                class="font-semibold text-gray-800 group-hover:text-blue-600 transition-colors">
                                                {{ $message->name }}
                                            </p>
                                            <a href="mailto:{{ $message->email }}"
                                                class="text-xs text-gray-400 hover:text-dotech-blue transition-colors">
                                                {{ $message->email }}
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="max-w-[200px]">
                                        <p class="text-sm text-gray-700 font-medium truncate">{{ $message->subject }}</p>
                                        @if ($message->phone)
                                            <div class="flex items-center gap-1 mt-1">
                                                <i class="fas fa-phone-alt text-gray-300 text-xs"></i>
                                                <span class="text-xs text-gray-400">{{ $message->phone }}</span>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 line-clamp-2 max-w-[300px]">
                                        {{ Str::limit($message->message, 80) }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    @if ($message->is_read)
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-50 text-green-700">
                                            <i class="fas fa-check-circle text-xs"></i>
                                            <span>Dibaca</span>
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-red-50 text-red-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                                            <span>Belum Dibaca</span>
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span
                                            class="text-sm text-gray-600">{{ $message->created_at->format('d M Y') }}</span>
                                        <span
                                            class="text-xs text-gray-400">{{ $message->created_at->format('H:i') }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('admin.messages.show', $message) }}"
                                            class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all duration-200"
                                            title="Lihat Detail">
                                            <i class="fas fa-eye text-sm"></i>
                                        </a>
                                        @if (!$message->is_read)
                                            <form action="{{ route('admin.messages.read', $message) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit"
                                                    class="p-2 text-gray-400 hover:text-green-600 hover:bg-green-50 rounded-lg transition-all duration-200"
                                                    title="Tandai Dibaca">
                                                    <i class="fas fa-envelope-open text-sm"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if ($message->is_read)
                                            <form action="{{ route('admin.messages.unread', $message) }}" method="POST"
                                                class="inline">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit"
                                                    class="p-2 text-gray-400 hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-all duration-200"
                                                    title="Tandai Belum Dibaca">
                                                    <i class="fas fa-envelope text-sm"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <button type="button"
                                            onclick="showDeleteModal('{{ $message->id }}', '{{ addslashes($message->name) }}')"
                                            class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition-all duration-200"
                                            title="Hapus">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <div
                                            class="w-20 h-20 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                                            <i class="fas fa-inbox text-gray-400 text-3xl"></i>
                                        </div>
                                        <p class="text-gray-500 font-medium text-lg">Tidak ada pesan</p>
                                        <p class="text-sm text-gray-400 mt-1">Belum ada pesan masuk dari pengunjung</p>
                                        @if (request()->hasAny(['search', 'filter']))
                                            <a href="{{ route('admin.messages.index') }}"
                                                class="mt-4 inline-flex items-center gap-2 px-4 py-2 text-sm font-medium text-blue-600 bg-blue-50 rounded-xl hover:bg-blue-100 transition-colors">
                                                <i class="fas fa-times"></i>
                                                <span>Hapus Filter</span>
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($messages->hasPages())
                <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                    {{ $messages->appends(request()->query())->links() }}
                </div>
            @endif
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

    {{-- Bulk Delete Modal --}}
    <div id="bulkDeleteModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeBulkDeleteModal()">
            </div>

            <div
                class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="bulkDeleteForm" method="POST" action="{{ route('admin.messages.bulk-destroy') }}">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="ids" id="bulkDeleteIds">

                    <div class="bg-white px-6 pt-6 pb-4">
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-trash-alt text-red-600 text-xl"></i>
                            </div>
                            <div class="flex-1">
                                <h3 class="text-xl font-bold text-gray-900">Hapus Pesan Terpilih</h3>
                                <div class="mt-3">
                                    <p class="text-sm text-gray-600">
                                        Apakah Anda yakin ingin menghapus <span id="bulkDeleteCount"
                                            class="font-semibold text-red-600"></span> pesan yang dipilih?
                                    </p>
                                    <div class="mt-4 p-3 bg-red-50 rounded-xl border border-red-100">
                                        <p class="text-xs text-red-700">
                                            Tindakan ini akan menghapus semua pesan yang dipilih secara permanen dan tidak
                                            dapat dibatalkan.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                        <button type="button" onclick="closeBulkDeleteModal()"
                            class="px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition-all duration-200">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white text-sm font-medium rounded-xl shadow-lg shadow-red-500/25 transition-all duration-200">
                            <i class="fas fa-trash-alt mr-2"></i>Ya, Hapus Semua
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            /* Line clamp for message preview */
            .line-clamp-2 {
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }

            /* Modern pagination styling */
            .pagination {
                display: flex;
                gap: 0.5rem;
                justify-content: flex-end;
            }

            .pagination .page-item .page-link {
                padding: 0.5rem 0.875rem;
                border-radius: 0.75rem;
                font-size: 0.875rem;
                font-weight: 500;
                transition: all 0.2s;
            }

            .pagination .page-item.active .page-link {
                background: linear-gradient(135deg, #2563eb, #4f46e5);
                border-color: transparent;
                color: white;
            }

            .pagination .page-item:not(.active) .page-link:hover {
                background: #f3f4f6;
                color: #1f2937;
            }

            /* Modal animation */
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

            /* Checkbox styling */
            input[type="checkbox"] {
                cursor: pointer;
                accent-color: #2563eb;
            }

            /* Row highlight for unread */
            tr.bg-blue-50\/30 {
                background-color: rgba(239, 246, 255, 0.3);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            let bulkMode = false;

            // Toggle bulk selection mode
            function toggleBulkMode() {
                bulkMode = !bulkMode;
                const checkboxes = document.querySelectorAll('.bulk-checkbox');
                const bulkCheckbox = document.getElementById('bulkCheckbox');
                const bulkActionsBar = document.getElementById('bulkActionsBar');
                const bulkModeBtn = document.getElementById('bulkModeBtn');

                checkboxes.forEach(checkbox => {
                    checkbox.style.display = bulkMode ? 'inline-block' : 'none';
                });

                if (bulkCheckbox) {
                    bulkCheckbox.style.display = bulkMode ? 'inline-block' : 'none';
                }

                bulkActionsBar.style.display = bulkMode ? 'flex' : 'none';

                if (bulkMode) {
                    bulkModeBtn.innerHTML = '<i class="fas fa-times mr-2"></i>Batalkan Pilihan';
                    bulkModeBtn.classList.remove('bg-gray-100', 'hover:bg-gray-200');
                    bulkModeBtn.classList.add('bg-red-100', 'hover:bg-red-200', 'text-red-700');
                } else {
                    bulkModeBtn.innerHTML = '<i class="fas fa-check-double mr-2"></i>Pilih Banyak';
                    bulkModeBtn.classList.remove('bg-red-100', 'hover:bg-red-200', 'text-red-700');
                    bulkModeBtn.classList.add('bg-gray-100', 'hover:bg-gray-200', 'text-gray-700');
                    // Uncheck all checkboxes
                    document.querySelectorAll('.message-checkbox').forEach(cb => cb.checked = false);
                    updateSelectedCount();
                }
            }

            // Toggle select all
            function toggleSelectAll() {
                const selectAllCheckbox = document.getElementById('selectAllCheckbox');
                const checkboxes = document.querySelectorAll('.message-checkbox');
                checkboxes.forEach(checkbox => {
                    checkbox.checked = selectAllCheckbox.checked;
                });
                updateSelectedCount();
            }

            // Update selected count
            function updateSelectedCount() {
                const checkboxes = document.querySelectorAll('.message-checkbox:checked');
                const count = checkboxes.length;
                document.getElementById('selectedCount').innerText = count;

                // Update select all checkbox state
                const selectAllCheckbox = document.getElementById('selectAllCheckbox');
                const totalCheckboxes = document.querySelectorAll('.message-checkbox').length;
                if (selectAllCheckbox) {
                    selectAllCheckbox.checked = count === totalCheckboxes && count > 0;
                    selectAllCheckbox.indeterminate = count > 0 && count < totalCheckboxes;
                }
            }

            // Bulk mark as read
            function bulkMarkRead() {
                const selectedIds = Array.from(document.querySelectorAll('.message-checkbox:checked')).map(cb => cb.value);
                if (selectedIds.length === 0) {
                    alert('Pilih minimal satu pesan.');
                    return;
                }

                if (confirm(`Tandai ${selectedIds.length} pesan sebagai sudah dibaca?`)) {
                    fetch('{{ route('admin.messages.bulk-mark-read') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            ids: selectedIds
                        })
                    }).then(response => response.json()).then(data => {
                        if (data.success) {
                            location.reload();
                        } else {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    });
                }
            }

            // Bulk delete
            function bulkDelete() {
                const selectedIds = Array.from(document.querySelectorAll('.message-checkbox:checked')).map(cb => cb.value);
                if (selectedIds.length === 0) {
                    alert('Pilih minimal satu pesan.');
                    return;
                }

                document.getElementById('bulkDeleteCount').innerText = selectedIds.length;
                document.getElementById('bulkDeleteIds').value = JSON.stringify(selectedIds);
                document.getElementById('bulkDeleteModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function closeBulkDeleteModal() {
                document.getElementById('bulkDeleteModal').classList.add('hidden');
                document.body.style.overflow = '';
            }

            // Single delete modal
            function showDeleteModal(messageId, senderName) {
                const modal = document.getElementById('deleteModal');
                const form = document.getElementById('deleteForm');
                const senderSpan = document.getElementById('senderNameDisplay');

                form.action = `/admin/messages/${messageId}`;
                senderSpan.textContent = senderName;

                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                document.addEventListener('keydown', handleEscapeKey);
            }

            function closeDeleteModal() {
                const modal = document.getElementById('deleteModal');
                modal.classList.add('hidden');
                document.body.style.overflow = '';
                document.removeEventListener('keydown', handleEscapeKey);
            }

            function handleEscapeKey(event) {
                if (event.key === 'Escape') {
                    closeDeleteModal();
                    closeBulkDeleteModal();
                }
            }

            // Close modals when clicking outside
            document.getElementById('deleteModal')?.addEventListener('click', function(event) {
                if (event.target === this) closeDeleteModal();
            });
            document.getElementById('bulkDeleteModal')?.addEventListener('click', function(event) {
                if (event.target === this) closeBulkDeleteModal();
            });

            // Add event listeners to checkboxes
            document.addEventListener('DOMContentLoaded', function() {
                document.querySelectorAll('.message-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', updateSelectedCount);
                });
            });
        </script>
    @endpush
@endsection
