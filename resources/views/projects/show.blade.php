@extends('layouts.app')

@section('title', $project->meta_title ?? $project->title . ' - PT Dotech Digital Solution')
@section('meta_description', $project->meta_description ?? $project->short_description)
@section('meta_keywords', $project->meta_keywords)

@section('content')
    <div>
        {{-- Hero Section with Animations --}}
        <div class="relative bg-gradient-to-br from-dotech-dark via-blue-900 to-blue-950 text-white overflow-hidden">
            {{-- Animated Background Grid --}}
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0"
                    style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 40px 40px;">
                </div>
            </div>

            {{-- Animated Gradient Orbs --}}
            <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-blue-500/30 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-pulse-slower"
                style="animation-delay: 2s;"></div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-float">
            </div>

            {{-- Floating Tech Icons --}}
            <div class="absolute top-20 left-10 opacity-20 animate-float-slow hidden lg:block">
                <i class="fab fa-react text-6xl text-blue-400"></i>
            </div>
            <div class="absolute bottom-20 right-10 opacity-20 animate-float-reverse hidden lg:block">
                <i class="fab fa-laravel text-6xl text-red-400"></i>
            </div>
            <div class="absolute top-1/3 right-20 opacity-15 animate-pulse-slow hidden lg:block">
                <i class="fab fa-aws text-5xl text-yellow-500"></i>
            </div>
            <div class="absolute bottom-1/3 left-20 opacity-15 animate-float hidden lg:block">
                <i class="fas fa-database text-5xl text-green-400"></i>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
                {{-- Breadcrumb --}}
                <div class="flex items-center gap-2 text-sm text-gray-400 mb-6 animate-slide-down">
                    <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
                    <i class="fas fa-chevron-right text-xs"></i>
                    <a href="{{ route('projects.index') }}" class="hover:text-white transition">Proyek</a>
                    @if ($project->category)
                        <i class="fas fa-chevron-right text-xs"></i>
                        <span class="text-gray-300">{{ $project->category }}</span>
                    @endif
                </div>

                {{-- Category Badge --}}
                @if ($project->category)
                    <div
                        class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-5 animate-slide-down animation-delay-100">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        <i class="fas fa-tag text-xs text-blue-300"></i>
                        <span class="text-blue-200 text-sm font-medium">{{ $project->category }}</span>
                    </div>
                @endif

                {{-- Title --}}
                <h1 class="text-3xl lg:text-4xl xl:text-5xl font-extrabold mt-2 mb-5 leading-tight animate-fade-in-up">
                    {{ $project->title }}
                </h1>

                {{-- Description --}}
                <p class="text-blue-100 text-lg max-w-2xl leading-relaxed animate-fade-in-up animation-delay-200">
                    {{ $project->short_description }}
                </p>

                {{-- Quick Info Row --}}
                <div class="flex flex-wrap gap-6 mt-8 animate-fade-in-up animation-delay-400">
                    @if ($project->client_name)
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-building text-blue-300 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Klien</p>
                                <p class="text-sm font-medium text-white">{{ $project->client_name }}</p>
                            </div>
                        </div>
                    @endif
                    @if ($project->project_date)
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-white/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-blue-300 text-sm"></i>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400">Tanggal</p>
                                <p class="text-sm font-medium text-white">{{ $project->project_date->format('d F Y') }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Scroll Indicator --}}
            <div
                class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-400 animate-bounce-slow">
                <span class="text-[10px] tracking-wider uppercase">Scroll</span>
                <div class="w-5 h-8 border border-gray-500 rounded-full flex justify-center">
                    <div class="w-1 h-2 bg-gray-400 rounded-full mt-1 animate-scroll-down"></div>
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                {{-- Main Content --}}
                <div class="lg:col-span-2">
                    {{-- Featured Image with zoom on click --}}
                    <div class="group relative mb-8 overflow-hidden rounded-2xl shadow-xl bg-gray-100">
                        @if ($project->featured_image)
                            <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}"
                                class="w-full object-cover group-hover:scale-105 transition-transform duration-500 cursor-pointer"
                                style="max-height: 450px;"
                                onclick="window.open('{{ $project->featured_image_url }}', '_blank')" loading="lazy">

                            <div class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition">
                                <span class="bg-black/50 backdrop-blur-sm text-white text-xs px-2 py-1 rounded-lg">
                                    <i class="fas fa-expand-alt text-[10px] mr-1"></i>
                                    Klik untuk zoom
                                </span>
                            </div>
                        @else
                            <div class="h-[450px] flex flex-col items-center justify-center">
                                <i class="fas fa-image text-7xl text-gray-300 mb-4"></i>
                                <p class="text-gray-400 text-sm">Gambar unggulan tidak tersedia</p>
                            </div>
                        @endif
                    </div>

                    {{-- Description --}}
                    @if ($project->full_description)
                        <div class="prose prose-lg max-w-none text-gray-700">
                            {!! nl2br(e($project->full_description)) !!}
                        </div>
                    @endif

                    {{-- Gallery Section --}}
                    @if ($project->images->isNotEmpty())
                        <div class="mt-12">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-1 h-6 bg-dotech-blue rounded-full"></div>
                                <h2 class="text-xl font-bold text-gray-900">Galeri Proyek</h2>
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($project->images as $image)
                                    <a href="{{ $image->image_url }}" target="_blank"
                                        class="group overflow-hidden rounded-xl bg-gray-100 hover:shadow-lg transition">
                                        <img src="{{ $image->image_url }}" alt="{{ $image->caption ?? $project->title }}"
                                            class="w-full aspect-video object-cover group-hover:scale-110 transition-transform duration-500">
                                        @if ($image->caption)
                                            <div class="p-2 text-xs text-gray-500 bg-white border-t border-gray-100">
                                                <i class="fas fa-camera mr-1"></i> {{ $image->caption }}
                                            </div>
                                        @endif
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Challenge & Solution Section --}}
                    @if ($project->challenge || $project->solution)
                        <div class="mt-12 grid md:grid-cols-2 gap-6">
                            @if ($project->challenge)
                                <div
                                    class="bg-amber-50 rounded-xl p-5 border-l-4 border-amber-500 hover:shadow-md transition">
                                    <div class="flex items-center gap-2 mb-3">
                                        <i class="fas fa-exclamation-triangle text-amber-500"></i>
                                        <h3 class="font-bold text-gray-800">Tantangan</h3>
                                    </div>
                                    <p class="text-gray-600 text-sm leading-relaxed">{{ $project->challenge }}</p>
                                </div>
                            @endif
                            @if ($project->solution)
                                <div
                                    class="bg-green-50 rounded-xl p-5 border-l-4 border-green-500 hover:shadow-md transition">
                                    <div class="flex items-center gap-2 mb-3">
                                        <i class="fas fa-lightbulb text-green-500"></i>
                                        <h3 class="font-bold text-gray-800">Solusi</h3>
                                    </div>
                                    <p class="text-gray-600 text-sm leading-relaxed">{{ $project->solution }}</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    {{-- Project Info Card --}}
                    <div
                        class="bg-white rounded-2xl shadow-md border border-gray-100 p-6 space-y-5 hover:shadow-lg transition">
                        <div class="flex items-center gap-2 pb-2 border-b border-gray-100">
                            <i class="fas fa-info-circle text-dotech-blue"></i>
                            <h3 class="font-bold text-gray-800">Informasi Proyek</h3>
                        </div>

                        @if ($project->client_name)
                            <div class="flex items-start gap-3 group">
                                <i
                                    class="fas fa-building text-gray-400 w-5 mt-0.5 group-hover:text-dotech-blue transition"></i>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wide">Klien</p>
                                    <p class="font-semibold text-gray-800">{{ $project->client_name }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($project->project_date)
                            <div class="flex items-start gap-3 group">
                                <i
                                    class="fas fa-calendar-alt text-gray-400 w-5 mt-0.5 group-hover:text-dotech-blue transition"></i>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wide">Tanggal</p>
                                    <p class="font-medium text-gray-700">{{ $project->project_date->format('d F Y') }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($project->category)
                            <div class="flex items-start gap-3 group">
                                <i
                                    class="fas fa-folder text-gray-400 w-5 mt-0.5 group-hover:text-dotech-blue transition"></i>
                                <div>
                                    <p class="text-xs text-gray-400 uppercase tracking-wide">Kategori</p>
                                    <p class="font-medium text-gray-700">{{ $project->category }}</p>
                                </div>
                            </div>
                        @endif

                        @if ($project->technologies && is_array($project->technologies) && count($project->technologies) > 0)
                            <div>
                                <div class="flex items-center gap-2 mb-3">
                                    <i class="fas fa-microchip text-gray-400"></i>
                                    <p class="text-xs text-gray-400 uppercase tracking-wide">Teknologi</p>
                                </div>
                                <div class="flex flex-wrap gap-2">
                                    @foreach ($project->technologies as $tech)
                                        <span
                                            class="inline-flex items-center gap-1 text-xs bg-gradient-to-r from-blue-50 to-indigo-50 text-blue-700 px-3 py-1.5 rounded-full hover:from-blue-100 hover:to-indigo-100 transition">
                                            <i class="fas fa-code text-[10px]"></i>
                                            {{ $tech }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if ($project->project_url)
                            <a href="{{ $project->project_url }}" target="_blank" rel="noopener noreferrer"
                                class="btn-primary w-full justify-center flex items-center gap-2 mt-3 group">
                                <i class="fas fa-external-link-alt text-sm group-hover:translate-x-0.5 transition"></i>
                                <span>Lihat Live Demo</span>
                            </a>
                        @endif
                    </div>

                    {{-- CTA Card --}}
                    <div
                        class="relative bg-gradient-to-br from-dotech-dark to-blue-900 text-white rounded-2xl p-6 overflow-hidden group hover:shadow-xl transition">
                        <div
                            class="absolute top-0 right-0 w-32 h-32 bg-blue-500/20 rounded-full blur-2xl group-hover:scale-150 transition duration-700">
                        </div>
                        <div class="relative">
                            <div
                                class="inline-flex items-center justify-center w-12 h-12 bg-white/10 rounded-xl mb-4 group-hover:scale-110 transition">
                                <i class="fas fa-handshake text-xl text-white"></i>
                            </div>
                            <h3 class="font-bold text-xl mb-2">Punya Proyek Serupa?</h3>
                            <p class="text-sm text-blue-100 mb-5 leading-relaxed">Hubungi kami dan diskusikan kebutuhan
                                digital Anda dengan tim ahli kami.</p>
                            <a href="{{ route('contact') }}"
                                class="inline-flex items-center justify-center w-full gap-2 bg-white text-dotech-blue font-semibold px-5 py-3 rounded-xl hover:bg-gray-100 transition group">
                                <i class="fas fa-paper-plane text-sm group-hover:translate-x-0.5 transition"></i>
                                <span>Hubungi Kami</span>
                            </a>
                        </div>
                    </div>

                    {{-- Share Section --}}
                    <div class="bg-gray-50 rounded-2xl p-5 hover:shadow-md transition">
                        <p class="text-xs text-gray-400 uppercase tracking-wide mb-3 flex items-center gap-2">
                            <i class="fas fa-share-alt"></i> Bagikan Proyek
                        </p>
                        <div class="flex gap-3">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}"
                                target="_blank"
                                class="w-9 h-9 bg-[#1877F2]/10 text-[#1877F2] rounded-full flex items-center justify-center hover:bg-[#1877F2] hover:text-white transition transform hover:scale-110">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($project->title) }}&url={{ urlencode(url()->current()) }}"
                                target="_blank"
                                class="w-9 h-9 bg-[#1DA1F2]/10 text-[#1DA1F2] rounded-full flex items-center justify-center hover:bg-[#1DA1F2] hover:text-white transition transform hover:scale-110">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}&title={{ urlencode($project->title) }}"
                                target="_blank"
                                class="w-9 h-9 bg-[#0A66C2]/10 text-[#0A66C2] rounded-full flex items-center justify-center hover:bg-[#0A66C2] hover:text-white transition transform hover:scale-110">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                            <a href="https://wa.me/?text={{ urlencode($project->title . ' - ' . url()->current()) }}"
                                target="_blank"
                                class="w-9 h-9 bg-[#25D366]/10 text-[#25D366] rounded-full flex items-center justify-center hover:bg-[#25D366] hover:text-white transition transform hover:scale-110">
                                <i class="fab fa-whatsapp"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Related Projects Section --}}
            @if ($related->isNotEmpty())
                <div class="mt-16 pt-8 border-t border-gray-100">
                    <div class="flex items-center justify-between mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-1 h-7 bg-dotech-blue rounded-full"></div>
                            <h2 class="text-2xl font-bold text-gray-900">Proyek Terkait</h2>
                        </div>
                        <a href="{{ route('projects.index') }}"
                            class="text-sm text-dotech-blue hover:text-blue-700 flex items-center gap-1 group">
                            <span>Lihat Semua</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>
                        </a>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach ($related as $p)
                            <a href="{{ route('projects.show', $p->slug) }}"
                                class="group bg-white rounded-xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:-translate-y-1">
                                <div class="overflow-hidden aspect-video bg-gray-100">
                                    <img src="{{ $p->featured_image_url }}" alt="{{ $p->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                        loading="lazy">
                                </div>
                                <div class="p-4">
                                    <div class="flex items-center gap-1.5 mb-2">
                                        <i class="fas fa-folder-open text-dotech-blue text-xs"></i>
                                        <span class="text-xs text-gray-500">{{ $p->category ?? 'Portfolio' }}</span>
                                    </div>
                                    <h3
                                        class="font-bold text-gray-900 group-hover:text-dotech-blue transition-colors line-clamp-1">
                                        {{ $p->title }}
                                    </h3>
                                    @if ($p->client_name)
                                        <p class="text-xs text-gray-400 mt-1 flex items-center gap-1">
                                            <i class="fas fa-user"></i> {{ $p->client_name }}
                                        </p>
                                    @endif
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('styles')
        <style>
            @keyframes pulse-slow {

                0%,
                100% {
                    opacity: 0.3;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.6;
                    transform: scale(1.05);
                }
            }

            @keyframes pulse-slower {

                0%,
                100% {
                    opacity: 0.2;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.5;
                    transform: scale(1.1);
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translate(-50%, -50%) translateY(0px);
                }

                50% {
                    transform: translate(-50%, -50%) translateY(-20px);
                }
            }

            @keyframes float-slow {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(-15px) translateX(10px);
                }
            }

            @keyframes float-reverse {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(15px) translateX(-10px);
                }
            }

            @keyframes fade-in-up {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slide-down {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes scroll-down {
                0% {
                    opacity: 1;
                    transform: translateY(0);
                }

                100% {
                    opacity: 0;
                    transform: translateY(15px);
                }
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(5px);
                }
            }

            .animate-pulse-slow {
                animation: pulse-slow 4s ease-in-out infinite;
            }

            .animate-pulse-slower {
                animation: pulse-slower 6s ease-in-out infinite;
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-float-slow {
                animation: float-slow 8s ease-in-out infinite;
            }

            .animate-float-reverse {
                animation: float-reverse 7s ease-in-out infinite;
            }

            .animate-fade-in-up {
                animation: fade-in-up 0.8s ease-out forwards;
                opacity: 0;
            }

            .animate-slide-down {
                animation: slide-down 0.6s ease-out forwards;
                opacity: 0;
            }

            .animate-scroll-down {
                animation: scroll-down 1.5s ease-in-out infinite;
            }

            .animate-bounce-slow {
                animation: bounce 2s ease-in-out infinite;
            }

            .animation-delay-100 {
                animation-delay: 0.1s;
            }

            .animation-delay-200 {
                animation-delay: 0.2s;
            }

            .animation-delay-400 {
                animation-delay: 0.4s;
            }

            .prose {
                line-height: 1.75;
            }

            .prose p {
                margin-bottom: 1.25rem;
            }

            .prose h2,
            .prose h3 {
                margin-top: 1.5rem;
                margin-bottom: 0.75rem;
                font-weight: 600;
            }

            .prose ul,
            .prose ol {
                margin-left: 1.5rem;
                margin-bottom: 1.25rem;
            }

            .prose li {
                margin-bottom: 0.25rem;
            }

            .line-clamp-1 {
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Project detail page loaded with enhanced animations');
            });
        </script>
    @endpush
@endsection
