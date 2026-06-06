@extends('layouts.app')
@section('title', 'Proyek Kami — PT Dotech Digital Solution')

@section('content')
<div class="pt-20">
    {{-- Page Header --}}
    <div class="bg-gradient-to-br from-dotech-dark to-blue-950 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="section-badge-light mb-3">Portfolio</div>
            <h1 class="text-4xl font-bold mt-2">Proyek Kami</h1>
            <p class="text-gray-300 mt-3 max-w-xl">Karya terbaik yang telah kami wujudkan bersama klien-klien terpercaya</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        {{-- Search --}}
        <form method="GET" class="mb-10">
            <div class="flex gap-3 max-w-lg">
                <input type="text" name="q" value="{{ $term }}"
                       placeholder="Cari proyek, klien, kategori..."
                       class="form-input flex-1">
                <button type="submit" class="btn-primary px-6">Cari</button>
                @if($term)
                <a href="{{ route('projects.index') }}" class="btn-outline px-4">✕</a>
                @endif
            </div>
        </form>

        @if($term)
        <p class="text-sm text-gray-500 mb-6">
            Hasil pencarian untuk "<strong>{{ $term }}</strong>": {{ $projects->total() }} proyek ditemukan
        </p>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($projects as $project)
            <a href="{{ route('projects.show', $project->slug) }}" class="project-card group">
                <div class="relative overflow-hidden aspect-video bg-gray-100">
                    <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                         loading="lazy">
                    @if($project->category)
                    <span class="absolute top-3 left-3 bg-dotech-blue text-white text-xs font-medium px-2.5 py-1 rounded-full">
                        {{ $project->category }}
                    </span>
                    @endif
                </div>
                <div class="p-5">
                    <h2 class="font-semibold text-gray-900 mb-1 group-hover:text-dotech-blue transition-colors">
                        {{ $project->title }}
                    </h2>
                    <p class="text-sm text-gray-500 line-clamp-2 mb-3">{{ $project->short_description }}</p>
                    @if($project->technologies)
                    <div class="flex flex-wrap gap-1.5">
                        @foreach(array_slice($project->technologies, 0, 4) as $tech)
                        <span class="text-xs bg-blue-50 text-blue-600 px-2 py-0.5 rounded-full">{{ $tech }}</span>
                        @endforeach
                    </div>
                    @endif
                    <div class="flex items-center justify-between mt-4 pt-3 border-t border-gray-100">
                        <span class="text-xs text-gray-400">{{ $project->client_name ?? 'Confidential' }}</span>
                        <span class="text-xs text-gray-400">{{ $project->project_date?->format('M Y') }}</span>
                    </div>
                </div>
            </a>
            @empty
            <div class="col-span-3 text-center py-20">
                <div class="text-5xl mb-4">🔍</div>
                <p class="text-gray-400">Tidak ada proyek yang ditemukan</p>
            </div>
            @endforelse
        </div>

        @if($projects->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $projects->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
