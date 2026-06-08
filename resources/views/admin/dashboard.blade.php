@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Welcome Header --}}
    <div class="bg-gradient-to-r from-dotech-dark to-blue-900 rounded-2xl p-6 text-white">
        <div class="flex items-center justify-between flex-wrap gap-4">
            <div>
                <div class="inline-flex items-center gap-2 bg-white/20 backdrop-blur-sm rounded-full px-3 py-1 mb-3">
                    <i class="fas fa-chart-line text-xs"></i>
                    <span class="text-xs font-medium">Dashboard Overview</span>
                </div>
                <h2 class="text-2xl font-bold">Selamat Datang, Admin!</h2>
                <p class="text-blue-100 text-sm mt-1">Berikut ringkasan aktivitas dan performa website Anda</p>
            </div>
            <div class="flex items-center gap-2 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-2">
                <i class="fas fa-calendar-alt text-blue-300"></i>
                <span class="text-sm">{{ now()->format('l, d F Y') }}</span>
            </div>
        </div>
    </div>

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
        {{-- Projects Card --}}
        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Total Proyek</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['projects'] }}</p>
                    <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-check-circle text-green-500 text-xs"></i>
                        <p class="text-xs text-green-600 font-medium">{{ $stats['published'] }} dipublikasi</p>
                    </div>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center group-hover:bg-blue-500 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-folder-open text-blue-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
            </div>
        </div>

        {{-- Services Card --}}
        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Layanan</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['services'] }}</p>
                    <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-cog text-blue-500 text-xs"></i>
                        <p class="text-xs text-gray-500">Aktif</p>
                    </div>
                </div>
                <div class="w-12 h-12 bg-emerald-100 rounded-xl flex items-center justify-center group-hover:bg-emerald-500 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-cogs text-emerald-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
            </div>
        </div>

        {{-- Testimonials Card --}}
        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Testimonial</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['testimonials'] }}</p>
                    <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-star text-yellow-400 text-xs"></i>
                        <p class="text-xs text-gray-500">Rating positif</p>
                    </div>
                </div>
                <div class="w-12 h-12 bg-amber-100 rounded-xl flex items-center justify-center group-hover:bg-amber-500 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-comment-dots text-amber-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
            </div>
        </div>

        {{-- Messages Card --}}
        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 p-5 hover:shadow-lg transition-all duration-300 hover:-translate-y-1">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500 mb-1">Pesan Masuk</p>
                    <p class="text-3xl font-bold text-gray-900">{{ $stats['messages'] }}</p>
                    @if($stats['unread_messages'] > 0)
                    <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-envelope text-red-500 text-xs"></i>
                        <p class="text-xs text-red-600 font-semibold">{{ $stats['unread_messages'] }} belum dibaca</p>
                    </div>
                    @else
                    <div class="flex items-center gap-1 mt-2">
                        <i class="fas fa-check-circle text-green-500 text-xs"></i>
                        <p class="text-xs text-gray-500">Semua terbaca</p>
                    </div>
                    @endif
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center group-hover:bg-red-500 group-hover:scale-110 transition-all duration-300">
                    <i class="fas fa-inbox text-red-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Content Grid --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Recent Messages --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-envelope-open-text text-blue-600 text-sm"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">Pesan Terbaru</h3>
                </div>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-dotech-blue hover:text-blue-700 flex items-center gap-1 group">
                    <span>Lihat semua</span>
                    <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>
                </a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recentMessages as $msg)
                <a href="{{ route('admin.messages.show', $msg) }}"
                   class="flex items-start gap-3 px-6 py-4 hover:bg-gray-50 transition-colors group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-dotech-blue to-blue-600 text-white flex items-center justify-center text-sm font-bold flex-shrink-0 shadow-sm">
                        {{ strtoupper(substr($msg->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2">
                            <span class="font-semibold text-sm text-gray-800 truncate">{{ $msg->name }}</span>
                            @if(!$msg->is_read)
                            <span class="relative flex h-2 w-2">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                            </span>
                            @endif
                        </div>
                        <div class="flex items-center gap-2 mt-1">
                            <i class="fas fa-tag text-gray-300 text-xs"></i>
                            <p class="text-xs text-gray-500 truncate">{{ $msg->subject }}</p>
                        </div>
                        <div class="flex items-center gap-2 mt-1.5">
                            <i class="fas fa-clock text-gray-300 text-xs"></i>
                            <p class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</p>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right text-gray-300 text-sm group-hover:text-dotech-blue group-hover:translate-x-1 transition-all"></i>
                </a>
                @empty
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-inbox text-gray-400 text-2xl"></i>
                    </div>
                    <p class="text-sm text-gray-400">Belum ada pesan</p>
                    <p class="text-xs text-gray-300 mt-1">Pesan dari pengunjung akan muncul di sini</p>
                </div>
                @endforelse
            </div>
        </div>

        {{-- Recent Projects --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-md transition">
            <div class="flex items-center justify-between px-6 py-4 border-b border-gray-100">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                        <i class="fas fa-project-diagram text-purple-600 text-sm"></i>
                    </div>
                    <h3 class="font-semibold text-gray-800">Proyek Terbaru</h3>
                </div>
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-dotech-blue hover:text-blue-700 flex items-center gap-1 group">
                    <span>Lihat semua</span>
                    <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>
                </a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recentProjects as $project)
                <div class="flex items-center gap-3 px-6 py-4 hover:bg-gray-50 transition-colors group">
                    @if($project->featured_image)
                    <img src="{{ $project->featured_image_url }}" alt="" class="w-12 h-12 rounded-xl object-cover flex-shrink-0 shadow-sm">
                    @else
                    <div class="w-12 h-12 rounded-xl bg-gray-100 flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-image text-gray-400 text-lg"></i>
                    </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="font-semibold text-sm text-gray-800 truncate group-hover:text-dotech-blue transition">{{ $project->title }}</p>
                        <div class="flex items-center gap-2 mt-1">
                            <i class="fas fa-calendar-alt text-gray-300 text-xs"></i>
                            <p class="text-xs text-gray-400">{{ $project->created_at ? $project->created_at->format('d M Y') "-" }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-medium {{ $project->status === 'published' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            <i class="fas {{ $project->status === 'published' ? 'fa-check-circle' : 'fa-pen' }} text-xs"></i>
                            {{ $project->status === 'published' ? 'Publik' : 'Draft' }}
                        </span>
                        @if($project->status === 'draft')
                        <i class="fas fa-ellipsis-h text-gray-300"></i>
                        @endif
                    </div>
                </div>
                @empty
                <div class="flex flex-col items-center justify-center py-12 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                        <i class="fas fa-folder-open text-gray-400 text-2xl"></i>
                    </div>
                    <p class="text-sm text-gray-400">Belum ada proyek</p>
                    <p class="text-xs text-gray-300 mt-1">Tambahkan proyek pertama Anda</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Quick Actions Section --}}
    <div class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-sm border border-gray-100 p-6">
        <div class="flex items-center gap-2 mb-5">
            <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center">
                <i class="fas fa-bolt text-indigo-600 text-sm"></i>
            </div>
            <h3 class="font-semibold text-gray-800">Aksi Cepat</h3>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.projects.create') }}" class="group flex flex-col items-center gap-2 p-4 bg-white rounded-xl border border-gray-100 hover:border-dotech-blue hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center group-hover:bg-blue-500 transition-colors">
                    <i class="fas fa-plus-circle text-blue-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-dotech-blue">Tambah Proyek</span>
            </a>
            <a href="{{ route('admin.services.create') }}" class="group flex flex-col items-center gap-2 p-4 bg-white rounded-xl border border-gray-100 hover:border-dotech-blue hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 bg-emerald-50 rounded-xl flex items-center justify-center group-hover:bg-emerald-500 transition-colors">
                    <i class="fas fa-cog text-emerald-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-dotech-blue">Tambah Layanan</span>
            </a>
            <a href="{{ route('admin.testimonials.create') }}" class="group flex flex-col items-center gap-2 p-4 bg-white rounded-xl border border-gray-100 hover:border-dotech-blue hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 bg-amber-50 rounded-xl flex items-center justify-center group-hover:bg-amber-500 transition-colors">
                    <i class="fas fa-star text-amber-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-dotech-blue">Tambah Testimoni</span>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="group flex flex-col items-center gap-2 p-4 bg-white rounded-xl border border-gray-100 hover:border-dotech-blue hover:shadow-md transition-all duration-300">
                <div class="w-12 h-12 bg-red-50 rounded-xl flex items-center justify-center group-hover:bg-red-500 transition-colors">
                    <i class="fas fa-envelope text-red-600 text-xl group-hover:text-white transition-colors"></i>
                </div>
                <span class="text-sm font-medium text-gray-700 group-hover:text-dotech-blue">Lihat Pesan</span>
            </a>
        </div>
    </div>
</div>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* Additional custom styles for admin dashboard */
    .admin-stat-card {
        transition: all 0.3s ease;
    }
    .admin-stat-card:hover {
        transform: translateY(-4px);
    }

    /* Custom scrollbar for recent items */
    .divide-y::-webkit-scrollbar {
        width: 4px;
    }
    .divide-y::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    .divide-y::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }
    .divide-y::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }
</style>
@endpush
@endsection
