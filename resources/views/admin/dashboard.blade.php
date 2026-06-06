@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    {{-- Stats Grid --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <div class="admin-stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Total Proyek</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['projects'] }}</p>
                    <p class="text-xs text-green-600 mt-1">{{ $stats['published'] }} dipublikasi</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center text-xl">🗂️</div>
            </div>
        </div>
        <div class="admin-stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Layanan</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['services'] }}</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-xl">⚙️</div>
            </div>
        </div>
        <div class="admin-stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Testimonial</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['testimonials'] }}</p>
                </div>
                <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center text-xl">💬</div>
            </div>
        </div>
        <div class="admin-stat-card">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-500">Pesan Masuk</p>
                    <p class="text-2xl font-bold text-gray-900 mt-1">{{ $stats['messages'] }}</p>
                    @if($stats['unread_messages'] > 0)
                    <p class="text-xs text-red-600 mt-1 font-semibold">{{ $stats['unread_messages'] }} belum dibaca</p>
                    @endif
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-xl">✉️</div>
            </div>
        </div>
    </div>

    {{-- Recent Content --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

        {{-- Recent Messages --}}
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="font-semibold text-gray-800">Pesan Terbaru</h3>
                <a href="{{ route('admin.messages.index') }}" class="text-sm text-dotech-blue hover:underline">Lihat semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recentMessages as $msg)
                <a href="{{ route('admin.messages.show', $msg) }}"
                   class="flex items-start gap-3 px-6 py-4 hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 rounded-full bg-dotech-blue/10 text-dotech-blue flex items-center justify-center text-sm font-bold flex-shrink-0">
                        {{ strtoupper(substr($msg->name, 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2">
                            <span class="font-medium text-sm text-gray-800 truncate">{{ $msg->name }}</span>
                            @if(!$msg->is_read)
                            <span class="w-2 h-2 bg-red-500 rounded-full flex-shrink-0"></span>
                            @endif
                        </div>
                        <p class="text-xs text-gray-500 truncate">{{ $msg->subject }}</p>
                        <p class="text-xs text-gray-400">{{ $msg->created_at->diffForHumans() }}</p>
                    </div>
                </a>
                @empty
                <p class="px-6 py-8 text-sm text-gray-400 text-center">Belum ada pesan</p>
                @endforelse
            </div>
        </div>

        {{-- Recent Projects --}}
        <div class="admin-card">
            <div class="admin-card-header">
                <h3 class="font-semibold text-gray-800">Proyek Terbaru</h3>
                <a href="{{ route('admin.projects.index') }}" class="text-sm text-dotech-blue hover:underline">Lihat semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse($recentProjects as $project)
                <div class="flex items-center gap-3 px-6 py-4">
                    @if($project->featured_image)
                    <img src="{{ $project->featured_image_url }}" alt="" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                    @else
                    <div class="w-10 h-10 rounded-lg bg-gray-100 flex-shrink-0"></div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <p class="font-medium text-sm text-gray-800 truncate">{{ $project->title }}</p>
                        <p class="text-xs text-gray-400">{{ $project->created_at->format('d M Y') }}</p>
                    </div>
                    <span class="{{ $project->status === 'published' ? 'badge-success' : 'badge-warning' }}">
                        {{ $project->status === 'published' ? 'Publik' : 'Draft' }}
                    </span>
                </div>
                @empty
                <p class="px-6 py-8 text-sm text-gray-400 text-center">Belum ada proyek</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
