@extends('layouts.app')

@section('title', 'Proyek Kami — PT Dotech Digital Solution')

@section('content')
    <div class="pt-20">
        {{-- Page Header with enhanced animations --}}
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
            <div class="absolute top-40 right-40 opacity-10 animate-float-slow hidden lg:block">
                <i class="fab fa-vuejs text-4xl text-emerald-400"></i>
            </div>
            <div class="absolute bottom-40 left-32 opacity-10 animate-float-reverse hidden lg:block">
                <i class="fab fa-figma text-4xl text-pink-400"></i>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
                <div class="text-center">
                    {{-- Animated Badge --}}
                    <div
                        class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-6 animate-slide-down">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        <i class="fas fa-folder-open text-xs text-blue-300"></i>
                        <span class="text-blue-200 text-sm font-medium tracking-wide">Portfolio</span>
                        <span class="text-blue-300/50 text-xs">✦ Our Work</span>
                    </div>

                    {{-- Main Heading --}}
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up">
                        <span
                            class="bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-500 bg-clip-text text-transparent">Proyek</span>
                        Kami
                    </h1>

                    <p
                        class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                        Karya terbaik yang telah kami wujudkan bersama klien-klien terpercaya
                    </p>

                    {{-- Stats Row --}}
                    <div class="flex flex-wrap justify-center gap-8 mt-10 animate-fade-in-up animation-delay-400">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-check-circle text-blue-400 text-sm"></i>
                            </div>
                            <div>
                                <span class="text-white font-bold">250+</span>
                                <span class="text-gray-400 text-xs block">Projects</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-smile text-green-400 text-sm"></i>
                            </div>
                            <div>
                                <span class="text-white font-bold">150+</span>
                                <span class="text-gray-400 text-xs block">Happy Clients</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-purple-500/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-trophy text-purple-400 text-sm"></i>
                            </div>
                            <div>
                                <span class="text-white font-bold">98%</span>
                                <span class="text-gray-400 text-xs block">Success Rate</span>
                            </div>
                        </div>
                    </div>
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

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            {{-- Search & Filter Section --}}
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 mb-10 hover:shadow-md transition">
                <form method="GET" class="flex flex-col md:flex-row gap-4">
                    <div class="flex-1 relative">
                        <i class="fas fa-search absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                        <input type="text" name="q" value="{{ $term }}"
                            placeholder="Cari proyek, klien, kategori..."
                            class="w-full pl-11 pr-4 py-3 border border-gray-200 rounded-xl focus:border-dotech-blue focus:ring-2 focus:ring-dotech-blue/20 transition outline-none">
                    </div>
                    <button type="submit" class="btn-primary px-8 py-3 flex items-center justify-center gap-2">
                        <i class="fas fa-search text-sm"></i>
                        <span>Cari</span>
                    </button>
                    @if ($term)
                        <a href="{{ route('projects.index') }}"
                            class="btn-outline px-6 py-3 flex items-center justify-center gap-2">
                            <i class="fas fa-times text-sm"></i>
                            <span>Reset</span>
                        </a>
                    @endif
                </form>

                @if ($term)
                    <div class="mt-4 flex items-center gap-2 text-sm text-gray-500 bg-gray-50 rounded-lg px-4 py-2">
                        <i class="fas fa-chart-simple text-dotech-blue"></i>
                        <span>Hasil pencarian untuk "<strong class="text-gray-700">{{ $term }}</strong>":</span>
                        <span class="font-semibold text-dotech-blue">{{ $projects->total() }}</span>
                        <span>proyek ditemukan</span>
                    </div>
                @endif
            </div>

            {{-- Projects Grid --}}
            @if ($projects->isNotEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div
                            class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 hover:border-dotech-blue/20 transform hover:-translate-y-1">
                            <a href="{{ route('projects.show', $project->slug) }}" class="block">
                                {{-- Image Container --}}
                                <div
                                    class="relative overflow-hidden bg-gradient-to-br from-gray-100 to-gray-200 aspect-video">
                                    @if ($project->featured_image)
                                        <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out"
                                            loading="lazy">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center">
                                            <i class="fas fa-image text-5xl text-gray-300"></i>
                                        </div>
                                    @endif

                                    {{-- Category Badge --}}
                                    @if ($project->category)
                                        <div class="absolute top-3 left-3">
                                            <span
                                                class="bg-dotech-blue/90 backdrop-blur-sm text-white text-xs font-medium px-3 py-1.5 rounded-full shadow-lg">
                                                <i class="fas fa-tag mr-1 text-[10px]"></i>
                                                {{ $project->category }}
                                            </span>
                                        </div>
                                    @endif

                                    {{-- Overlay gradient on hover --}}
                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                    </div>

                                    {{-- View Details Icon on hover --}}
                                    <div
                                        class="absolute bottom-3 right-3 opacity-0 group-hover:opacity-100 transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                        <span
                                            class="bg-white text-dotech-blue rounded-full w-9 h-9 flex items-center justify-center shadow-lg hover:scale-110 transition">
                                            <i class="fas fa-arrow-right text-sm"></i>
                                        </span>
                                    </div>
                                </div>

                                {{-- Content --}}
                                <div class="p-5">
                                    <h2
                                        class="font-bold text-xl text-gray-900 mb-2 group-hover:text-dotech-blue transition-colors line-clamp-1">
                                        {{ $project->title }}
                                    </h2>
                                    <p class="text-gray-500 text-sm leading-relaxed line-clamp-2 mb-4">
                                        {{ $project->short_description }}
                                    </p>

                                    {{-- Technologies --}}
                                    @if ($project->technologies && is_array($project->technologies) && count($project->technologies) > 0)
                                        <div class="flex flex-wrap gap-2 mb-4">
                                            @foreach (array_slice($project->technologies, 0, 3) as $tech)
                                                <span
                                                    class="inline-flex items-center gap-1 text-xs bg-gray-100 text-gray-600 px-2.5 py-1 rounded-full">
                                                    <i class="fas fa-code text-[10px]"></i>
                                                    {{ $tech }}
                                                </span>
                                            @endforeach
                                            @if (count($project->technologies) > 3)
                                                <span
                                                    class="text-xs text-gray-400">+{{ count($project->technologies) - 3 }}</span>
                                            @endif
                                        </div>
                                    @endif

                                    {{-- Footer: Client & Date --}}
                                    <div class="flex items-center justify-between pt-3 border-t border-gray-100">
                                        <div class="flex items-center gap-1.5">
                                            <i class="fas fa-user-check text-gray-400 text-xs"></i>
                                            <span
                                                class="text-xs text-gray-500">{{ $project->client_name ?? 'Confidential' }}</span>
                                        </div>
                                        <div class="flex items-center gap-1.5">
                                            <i class="fas fa-calendar-alt text-gray-400 text-xs"></i>
                                            <span
                                                class="text-xs text-gray-400">{{ $project->project_date?->format('M Y') ?? 'Recent' }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                {{-- Empty State with proper icon --}}
                <div class="text-center py-20 bg-gray-50 rounded-3xl">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                        <i class="fas fa-search text-4xl text-gray-400"></i>
                    </div>
                    <p class="text-gray-400 text-lg mb-2">Tidak ada proyek yang ditemukan</p>
                    <p class="text-gray-400 text-sm">Coba dengan kata kunci lain atau reset filter pencarian</p>
                    @if ($term)
                        <a href="{{ route('projects.index') }}"
                            class="inline-flex items-center gap-2 mt-6 text-dotech-blue hover:text-blue-700 font-medium">
                            <i class="fas fa-arrow-left text-sm"></i>
                            <span>Lihat semua proyek</span>
                        </a>
                    @endif
                </div>
            @endif

            {{-- Pagination --}}
            @if ($projects->hasPages())
                <div class="mt-12 flex justify-center">
                    <div class="inline-flex items-center gap-2">
                        {{ $projects->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    @push('styles')
        <style>
            /* Animation keyframes */
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

            .animation-delay-200 {
                animation-delay: 0.2s;
            }

            .animation-delay-400 {
                animation-delay: 0.4s;
            }

            .animation-delay-600 {
                animation-delay: 0.6s;
            }

            /* Custom pagination styling */
            .pagination {
                display: flex;
                gap: 0.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .pagination .page-item .page-link {
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: 40px;
                height: 40px;
                padding: 0 0.75rem;
                border-radius: 0.75rem;
                background-color: #f3f4f6;
                color: #4b5563;
                font-weight: 500;
                transition: all 0.2s ease;
            }

            .pagination .page-item.active .page-link {
                background: linear-gradient(135deg, #2563EB, #1E3A8A);
                color: white;
                box-shadow: 0 4px 10px rgba(37, 99, 235, 0.3);
            }

            .pagination .page-item .page-link:hover:not(.active) {
                background-color: #e5e7eb;
                transform: translateY(-2px);
            }

            .pagination .page-item.disabled .page-link {
                opacity: 0.5;
                cursor: not-allowed;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                console.log('Projects page loaded with enhanced animations');

                // Optional: Add smooth scroll for filter section
                const searchInput = document.querySelector('input[name="q"]');
                if (searchInput && window.location.search.includes('q=')) {
                    searchInput.focus();
                }
            });
        </script>
    @endpush
@endsection
