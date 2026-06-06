@extends('layouts.app')
@section('title', $project->meta_title)
@section('meta_description', $project->meta_description)
@section('meta_keywords', $project->meta_keywords)

@section('content')
<div class="pt-20">
    {{-- Hero --}}
    <div class="bg-gradient-to-br from-dotech-dark to-blue-950 text-white py-20">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($project->category)
            <span class="section-badge-light mb-3 inline-block">{{ $project->category }}</span>
            @endif
            <h1 class="text-3xl lg:text-4xl font-bold mt-2 mb-4">{{ $project->title }}</h1>
            <p class="text-gray-300 max-w-2xl">{{ $project->short_description }}</p>
        </div>
    </div>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            {{-- Main Content --}}
            <div class="lg:col-span-2">
                {{-- Featured Image --}}
                <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}"
                     class="w-full rounded-2xl shadow-lg mb-8">

                {{-- Description --}}
                @if($project->full_description)
                <div class="prose prose-lg max-w-none text-gray-700">
                    {!! nl2br(e($project->full_description)) !!}
                </div>
                @endif

                {{-- Gallery --}}
                @if($project->images->isNotEmpty())
                <div class="mt-10">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">Galeri Proyek</h2>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($project->images as $image)
                        <a href="{{ $image->image_url }}" target="_blank" class="group overflow-hidden rounded-xl">
                            <img src="{{ $image->image_url }}" alt="{{ $image->caption ?? $project->title }}"
                                 class="w-full aspect-video object-cover group-hover:scale-105 transition-transform duration-300"
                                 loading="lazy">
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Project Info --}}
                <div class="bg-gray-50 rounded-2xl p-6 space-y-4">
                    <h3 class="font-semibold text-gray-800">Informasi Proyek</h3>
                    @if($project->client_name)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide">Klien</p>
                        <p class="font-medium text-gray-700">{{ $project->client_name }}</p>
                    </div>
                    @endif
                    @if($project->project_date)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide">Tanggal</p>
                        <p class="font-medium text-gray-700">{{ $project->project_date->format('d F Y') }}</p>
                    </div>
                    @endif
                    @if($project->category)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide">Kategori</p>
                        <p class="font-medium text-gray-700">{{ $project->category }}</p>
                    </div>
                    @endif
                    @if($project->technologies)
                    <div>
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-2">Teknologi</p>
                        <div class="flex flex-wrap gap-1.5">
                            @foreach($project->technologies as $tech)
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded-full">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif
                    @if($project->project_url)
                    <a href="{{ $project->project_url }}" target="_blank" rel="noopener"
                       class="btn-primary w-full justify-center mt-2">
                        🔗 Lihat Live Demo
                    </a>
                    @endif
                </div>

                {{-- CTA --}}
                <div class="bg-dotech-dark text-white rounded-2xl p-6">
                    <h3 class="font-semibold mb-2">Punya Proyek Serupa?</h3>
                    <p class="text-sm text-gray-400 mb-4">Hubungi kami dan diskusikan kebutuhan Anda.</p>
                    <a href="{{ route('contact') }}" class="btn-primary w-full justify-center">Hubungi Kami</a>
                </div>
            </div>
        </div>

        {{-- Related Projects --}}
        @if($related->isNotEmpty())
        <div class="mt-16 border-t border-gray-100 pt-12">
            <h2 class="text-2xl font-bold text-gray-900 mb-8">Proyek Terkait</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($related as $p)
                <a href="{{ route('projects.show', $p->slug) }}" class="project-card group">
                    <div class="overflow-hidden rounded-t-2xl aspect-video bg-gray-100">
                        <img src="{{ $p->featured_image_url }}" alt="{{ $p->title }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                             loading="lazy">
                    </div>
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-900 group-hover:text-dotech-blue transition-colors">{{ $p->title }}</h3>
                        <p class="text-xs text-gray-400 mt-1">{{ $p->client_name }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
