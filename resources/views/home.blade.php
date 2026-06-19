@extends('layouts.app')

@section('title', 'Hevi Digital Solution - IT Solutions Terpercaya')

@section('content')

    {{-- ─── HERO SECTION ─── --}}
    <section
        class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-[#0A1128] via-[#1E2A5E] to-[#0A1128]">
        {{-- Background Image from Model --}}
        @if ($hero && $hero->background_image_url)
            <div class="absolute inset-0 z-0">
                <img src="{{ $hero->background_image_url }}" alt="Hero Background"
                    class="w-full h-full object-cover opacity-20">
                <div class="absolute inset-0 bg-gradient-to-br from-[#0A1128]/80 via-[#1E2A5E]/70 to-[#0A1128]/80"></div>
            </div>
        @endif

        {{-- Animated Background Grid --}}
        <div class="absolute inset-0 opacity-15 z-0">
            <div class="absolute inset-0"
                style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 40px 40px;">
            </div>
        </div>

        {{-- Animated Gradient Orbs --}}
        <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-blue-500/30 rounded-full blur-3xl animate-pulse-slow z-0"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-pulse-slower z-0"
            style="animation-delay: 2s;"></div>
        <div
            class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-float z-0">
        </div>

        {{-- Floating Tech Icons --}}
        <div class="absolute top-20 left-10 opacity-20 animate-float-slow hidden lg:block z-0">
            <i class="fab fa-react text-6xl text-blue-400"></i>
        </div>
        <div class="absolute bottom-20 right-10 opacity-20 animate-float-reverse hidden lg:block z-0">
            <i class="fab fa-laravel text-6xl text-red-400"></i>
        </div>
        <div class="absolute top-1/3 right-20 opacity-15 animate-pulse-slow hidden lg:block z-0">
            <i class="fab fa-aws text-5xl text-yellow-500"></i>
        </div>
        <div class="absolute bottom-1/3 left-20 opacity-15 animate-float hidden lg:block z-0">
            <i class="fas fa-database text-5xl text-green-400"></i>
        </div>

        {{-- Hero Content --}}
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                {{-- Left Content --}}
                <div class="max-w-2xl">
                    @if ($hero)
                        {{-- Subheadline Badge --}}
                        @if ($hero->subheadline)
                            <div
                                class="inline-flex items-center gap-2 bg-blue-600/20 backdrop-blur-sm border border-blue-400/30 rounded-full px-4 py-1.5 mb-6 animate-slide-down">
                                <span class="relative flex h-2 w-2">
                                    <span
                                        class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                                </span>
                                <span
                                    class="text-blue-200 text-sm font-medium tracking-wide">{{ $hero->subheadline }}</span>
                            </div>
                        @endif

                        {{-- Headline with Gradient Text --}}
                        @if ($hero->headline)
                            <h1
                                class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up">
                                {!! $hero->headline !!}
                            </h1>
                        @else
                            <h1
                                class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up">
                                Solusi Digital
                                <span
                                    class="bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-500 bg-clip-text text-transparent">Terpercaya</span>
                                untuk Bisnis Anda
                            </h1>
                        @endif

                        {{-- Description --}}
                        @if ($hero->description)
                            <p
                                class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8 animate-fade-in-up animation-delay-200">
                                {!! $hero->description !!}
                            </p>
                        @else
                            <p
                                class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8 animate-fade-in-up animation-delay-200">
                                Kami membantu bisnis Anda berkembang dengan teknologi modern.
                            </p>
                        @endif
                    @else
                        {{-- Default content if no hero data --}}
                        <h1
                            class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up">
                            Solusi Digital
                            <span
                                class="bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-500 bg-clip-text text-transparent">Terpercaya</span>
                            untuk Bisnis Anda
                        </h1>
                        <p
                            class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8 animate-fade-in-up animation-delay-200">
                            Kami membantu bisnis Anda berkembang dengan teknologi modern.
                        </p>
                    @endif

                    {{-- CTA Buttons --}}
                    <div class="flex flex-wrap gap-4 animate-fade-in-up animation-delay-400">
                        {{-- Primary CTA Button --}}
                        @php
                            $primaryText = $hero->cta_primary_text ?? 'Konsultasi Gratis';
                            $primaryUrl = $hero->cta_primary_url ?? route('contact');
                        @endphp
                        <a href="{{ $primaryUrl }}"
                            class="group relative bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-semibold px-8 py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-blue-500/25 hover:-translate-y-0.5 flex items-center gap-2 overflow-hidden">
                            <span class="relative z-10 flex items-center gap-2">
                                <i class="fas fa-headset text-sm"></i>
                                {{ $primaryText }}
                                <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                            </span>
                            <span
                                class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        </a>

                        {{-- Secondary CTA Button --}}
                        @php
                            $secondaryText = $hero->cta_secondary_text ?? 'Lihat Proyek';
                            $secondaryUrl = $hero->cta_secondary_url ?? route('projects.index');
                        @endphp
                        <a href="{{ $secondaryUrl }}"
                            class="group border border-white/30 text-white hover:bg-white/10 px-8 py-3.5 rounded-xl transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2 backdrop-blur-sm">
                            <i class="fas fa-play-circle text-sm"></i>
                            {{ $secondaryText }}
                            <i
                                class="fas fa-chevron-right text-xs opacity-0 group-hover:opacity-100 transition-all group-hover:translate-x-1"></i>
                        </a>
                    </div>

                    {{-- Trust Badges (optional - bisa dihide/show via setting nanti) --}}
                    <div
                        class="flex flex-wrap items-center gap-6 mt-10 pt-6 border-t border-white/10 animate-fade-in-up animation-delay-600">
                        <div class="flex items-center gap-2">
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                            <span class="text-gray-400 text-xs">{{ $stats['happy_clients'] ?? 150 }}+ Klien Puas</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-check-circle text-green-400 text-sm"></i>
                            <span class="text-gray-400 text-xs">{{ $stats['projects_completed'] ?? 250 }}+ Proyek</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fas fa-award text-blue-400 text-sm"></i>
                            <span class="text-gray-400 text-xs">{{ $stats['experience_years'] ?? 8 }}+ Tahun
                                Pengalaman</span>
                        </div>
                    </div>
                </div>

                {{-- Right Side Illustration --}}
                <div class="hidden lg:block relative animate-fade-in-right">
                    <div class="relative group">
                        <div
                            class="absolute -inset-4 bg-gradient-to-r from-blue-600/20 to-cyan-600/20 rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-500">
                        </div>
                        <div
                            class="relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 shadow-2xl overflow-hidden">
                            <div class="relative z-10">
                                <div class="flex items-center gap-3 mb-6 pb-4 border-b border-white/10">
                                    <div class="w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center">
                                        <i class="fas fa-chart-line text-blue-400 text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold">Digital Transformation</p>
                                        <p class="text-gray-400 text-xs">2024 Impact Report</p>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                        <p class="text-2xl font-bold text-blue-400">{{ $stats['happy_clients'] ?? 150 }}+
                                        </p>
                                        <p class="text-xs text-gray-400">Klien Puas</p>
                                    </div>
                                    <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                        <p class="text-2xl font-bold text-cyan-400">
                                            {{ $stats['projects_completed'] ?? 250 }}+</p>
                                        <p class="text-xs text-gray-400">Proyek</p>
                                    </div>
                                    <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                        <p class="text-2xl font-bold text-green-400">24/7</p>
                                        <p class="text-xs text-gray-400">Support</p>
                                    </div>
                                    <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                        <p class="text-2xl font-bold text-purple-400">{{ $stats['team_members'] ?? 50 }}+
                                        </p>
                                        <p class="text-xs text-gray-400">Tim Expert</p>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <div class="flex justify-between text-xs text-gray-400 mb-1">
                                        <span>Project Success Rate</span>
                                        <span>98%</span>
                                    </div>
                                    <div class="h-1.5 bg-white/10 rounded-full overflow-hidden">
                                        <div
                                            class="h-full w-[98%] bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full animate-shimmer">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-wrap gap-2 mt-4">
                                    <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i
                                            class="fab fa-react mr-1 text-blue-400"></i> React</span>
                                    <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i
                                            class="fab fa-laravel mr-1 text-red-400"></i> Laravel</span>
                                    <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i
                                            class="fab fa-aws mr-1 text-yellow-400"></i> AWS</span>
                                    <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i
                                            class="fas fa-cloud mr-1 text-cyan-400"></i> Cloud</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div
            class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-400 animate-bounce-slow z-10">
            <span class="text-[10px] tracking-wider uppercase">Scroll</span>
            <div class="w-5 h-8 border border-gray-500 rounded-full flex justify-center">
                <div class="w-1 h-2 bg-gray-400 rounded-full mt-1 animate-scroll-down"></div>
            </div>
        </div>
    </section>

    {{-- ─── STATS SECTION ─── --}}
    <section class="py-16 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="stat-card p-4 rounded-2xl bg-gray-50/70 hover:bg-gray-100 transition">
                    <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">
                        {{ $stats['experience_years'] ?? 8 }}+
                    </div>
                    <div class="text-gray-600 font-medium mt-1">Tahun Pengalaman</div>
                </div>
                <div class="stat-card p-4 rounded-2xl bg-gray-50/70 hover:bg-gray-100 transition">
                    <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">
                        {{ $stats['projects_completed'] ?? 250 }}+</div>
                    <div class="text-gray-600 font-medium mt-1">Proyek Selesai</div>
                </div>
                <div class="stat-card p-4 rounded-2xl bg-gray-50/70 hover:bg-gray-100 transition">
                    <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">
                        {{ $stats['happy_clients'] ?? 150 }}+
                    </div>
                    <div class="text-gray-600 font-medium mt-1">Klien Puas</div>
                </div>
                <div class="stat-card p-4 rounded-2xl bg-gray-50/70 hover:bg-gray-100 transition">
                    <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">{{ $stats['team_members'] ?? 50 }}+
                    </div>
                    <div class="text-gray-600 font-medium mt-1">Tim Expert</div>
                </div>
            </div>
        </div>
    </section>

    {{-- ─── SERVICES SECTION ─── --}}
    <section id="services" class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full">Layanan Kami</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">Solusi Digital Lengkap</h2>
                <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Kami menyediakan berbagai layanan teknologi untuk mendorong
                    pertumbuhan bisnis Anda</p>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mt-5 rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($services as $service)
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div
                            class="w-14 h-14 bg-{{ $service->color ?? 'blue' }}-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-{{ $service->color ?? 'blue' }}-100 transition">
                            <i
                                class="{{ $service->icon ?? 'fas fa-laptop-code' }} text-2xl text-{{ $service->color ?? 'blue' }}-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $service->title }}</h3>
                        <p class="text-gray-500 leading-relaxed">{{ $service->description }}</p>
                    </div>
                @empty
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div
                            class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-blue-100 transition">
                            <i class="fas fa-laptop-code text-2xl text-blue-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Web Development</h3>
                        <p class="text-gray-500 leading-relaxed">Website modern, responsif, dan performa tinggi dengan
                            teknologi terkini.</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div
                            class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-green-100 transition">
                            <i class="fas fa-mobile-alt text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Mobile Apps</h3>
                        <p class="text-gray-500 leading-relaxed">Aplikasi mobile native untuk iOS dan Android dengan user
                            experience terbaik.</p>
                    </div>
                    <div
                        class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                        <div
                            class="w-14 h-14 bg-cyan-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-cyan-100 transition">
                            <i class="fas fa-cloud text-2xl text-cyan-600"></i>
                        </div>
                        <h3 class="text-xl font-bold text-gray-800 mb-2">Cloud Solutions</h3>
                        <p class="text-gray-500 leading-relaxed">Infrastruktur cloud yang scalable, aman, dan
                            cost-efficient untuk bisnis Anda.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- ─── FEATURED PROJECTS SECTION ─── --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <span class="bg-gray-200 text-gray-700 text-sm font-semibold px-4 py-1.5 rounded-full">Portfolio</span>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">Proyek Unggulan Kami</h2>
                <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Beberapa karya terbaik yang telah kami hasilkan untuk klien
                </p>
                <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mt-5 rounded-full"></div>
            </div>

            @if ($projects->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div
                            class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                            <div class="overflow-hidden h-52 relative">
                                @if ($project->featured_image)
                                    <img src="{{ $project->featured_image_url }}" alt="{{ $project->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-blue-500 to-indigo-600 flex items-center justify-center">
                                        <i class="fas fa-image text-5xl text-gray-300"></i>
                                    </div>
                                @endif
                                @if ($project->category)
                                    <div class="absolute top-3 left-3">
                                        <span
                                            class="text-xs bg-white/90 backdrop-blur-sm text-gray-800 px-2 py-1 rounded-lg font-medium">{{ $project->category }}</span>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5">
                                <h3
                                    class="font-bold text-lg text-gray-800 group-hover:text-dotech-blue transition mb-2 line-clamp-1">
                                    {{ $project->title }}</h3>
                                @if ($project->short_description)
                                    <p class="text-gray-500 text-sm line-clamp-2">{{ $project->short_description }}</p>
                                @endif
                                <div class="mt-4 flex items-center justify-between">
                                    @if ($project->technologies && count($project->technologies) > 0)
                                        <div class="flex gap-1">
                                            @foreach (array_slice($project->technologies, 0, 2) as $tech)
                                                <span
                                                    class="text-xs bg-gray-100 px-2 py-1 rounded-lg text-gray-600">{{ $tech }}</span>
                                            @endforeach
                                        </div>
                                    @endif
                                    <a href="{{ route('projects.show', $project->slug) }}"
                                        class="text-dotech-blue hover:text-blue-700 text-sm font-medium inline-flex items-center gap-1 group-hover:gap-2 transition-all">
                                        Detail <i class="fas fa-arrow-right text-xs"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-gray-500">Belum ada proyek yang ditampilkan.</p>
                </div>
            @endif

            <div class="text-center mt-10">
                <a href="{{ route('projects.index') }}"
                    class="inline-flex items-center gap-2 text-dotech-blue font-semibold hover:gap-3 transition-all">
                    Lihat Semua Proyek <i class="fas fa-arrow-right text-sm"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ─── TEAMS SECTION ─── --}}
    @if ($teams->count() > 0)
        <section class="py-24 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span class="bg-purple-100 text-purple-700 text-sm font-semibold px-4 py-1.5 rounded-full">Tim
                        Ahli</span>
                    <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">Meet Our Team</h2>
                    <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Para profesional berpengalaman yang siap membantu
                        kesuksesan digital Anda</p>
                    <div class="w-20 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto mt-5 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach ($teams as $team)
                        <div
                            class="group bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                            <div class="relative overflow-hidden h-64">
                                @if ($team->image_url)
                                    <img src="{{ $team->image_url }}" alt="{{ $team->name }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                @else
                                    <div
                                        class="w-full h-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center">
                                        <i class="fas fa-user-circle text-white text-6xl opacity-50"></i>
                                    </div>
                                @endif

                                {{-- Social Links Overlay --}}
                                @if ($team->social_links && count((array) $team->social_links) > 0)
                                    <div
                                        class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-black/70 to-transparent p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                        <div class="flex justify-center gap-3">
                                            @if ($team->getSocialLink('facebook'))
                                                <a href="{{ $team->getSocialLink('facebook') }}" target="_blank"
                                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition">
                                                    <i class="fab fa-facebook-f text-white text-sm"></i>
                                                </a>
                                            @endif
                                            @if ($team->getSocialLink('instagram'))
                                                <a href="{{ $team->getSocialLink('instagram') }}" target="_blank"
                                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition">
                                                    <i class="fab fa-instagram text-white text-sm"></i>
                                                </a>
                                            @endif
                                            @if ($team->getSocialLink('linkedin'))
                                                <a href="{{ $team->getSocialLink('linkedin') }}" target="_blank"
                                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition">
                                                    <i class="fab fa-linkedin-in text-white text-sm"></i>
                                                </a>
                                            @endif
                                            @if ($team->getSocialLink('twitter'))
                                                <a href="{{ $team->getSocialLink('twitter') }}" target="_blank"
                                                    class="w-8 h-8 bg-white/20 rounded-full flex items-center justify-center hover:bg-white/30 transition">
                                                    <i class="fab fa-twitter text-white text-sm"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="p-5 text-center">
                                <h3 class="font-bold text-lg text-gray-800 mb-1">{{ $team->name }}</h3>
                                <p class="text-dotech-blue text-sm font-medium mb-2">{{ $team->title }}</p>
                                @if ($team->bio)
                                    <p class="text-gray-500 text-xs line-clamp-2">{{ Str::limit($team->bio, 80) }}</p>
                                @endif
                                @if ($team->expertise && count($team->expertise_list) > 0)
                                    <div class="flex flex-wrap gap-1 justify-center mt-3">
                                        @foreach (array_slice($team->expertise_list, 0, 2) as $skill)
                                            <span
                                                class="text-xs bg-gray-100 px-2 py-1 rounded-full text-gray-600">{{ $skill }}</span>
                                        @endforeach
                                        @if (count($team->expertise_list) > 2)
                                            <span
                                                class="text-xs bg-gray-100 px-2 py-1 rounded-full text-gray-600">+{{ count($team->expertise_list) - 2 }}</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($stats['team_members'] > 4)
                    <div class="text-center mt-10">
                        <a href="#"
                            class="inline-flex items-center gap-2 text-purple-600 font-semibold hover:gap-3 transition-all">
                            Lihat Semua Tim <i class="fas fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- ─── TESTIMONIALS SECTION ─── --}}
    @if ($testimonials->count() > 0)
        <section class="py-24 bg-gradient-to-br from-[#0A1128] to-[#1E2A5E] text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <span
                        class="bg-blue-900/40 text-blue-200 text-sm px-4 py-1.5 rounded-full inline-flex items-center gap-2">
                        <i class="fas fa-star text-xs"></i> Testimonial
                    </span>
                    <h2 class="text-3xl lg:text-4xl font-bold mt-4">Apa Kata Klien Kami</h2>
                    <p class="text-blue-200/70 mt-2 max-w-2xl mx-auto">Kepercayaan klien adalah prioritas utama kami</p>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-cyan-400 mx-auto mt-5 rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($testimonials as $testimonial)
                        <div
                            class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition group">
                            <div class="flex gap-1 mb-4">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= ($testimonial->rating ?? 5))
                                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                                    @else
                                        <i class="far fa-star text-yellow-400 text-sm opacity-50"></i>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-gray-300 text-sm leading-relaxed line-clamp-3">
                                "{{ $testimonial->testimonial }}"</p>
                            <div class="mt-4 flex items-center gap-3 pt-3 border-t border-white/10">
                                @if ($testimonial->photo_url && $testimonial->photo_url !== asset('images/avatar-placeholder.png'))
                                    <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}"
                                        class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <div
                                        class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 flex items-center justify-center font-bold">
                                        {{ strtoupper(substr($testimonial->client_name, 0, 1)) }}
                                    </div>
                                @endif
                                <div>
                                    <div class="font-semibold text-sm">{{ $testimonial->client_name }}</div>
                                    @if ($testimonial->company_name)
                                        <div class="text-xs text-gray-400">{{ $testimonial->company_name }}</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- ─── ABOUT US SECTION ─── --}}
    {{-- @if ($about)
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div class="relative">
                        @if ($about->image_url)
                            <img src="{{ $about->image_url }}" alt="{{ $about->title }}"
                                class="rounded-2xl shadow-lg w-full object-cover">
                        @else
                            <div
                                class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl shadow-lg w-full h-96 flex items-center justify-center">
                                <i class="fas fa-building text-white text-8xl opacity-30"></i>
                            </div>
                        @endif

                        <div
                            class="absolute -bottom-6 -right-6 bg-white rounded-2xl shadow-xl p-4 flex items-center gap-3">
                            <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-calendar-alt text-blue-600 text-xl"></i>
                            </div>
                            <div>
                                <div class="text-2xl font-bold text-gray-800">
                                    {{ $about->years_experience ?? ($stats['experience_years'] ?? 8) }}+</div>
                                <div class="text-xs text-gray-500">Tahun Pengalaman</div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full">Tentang
                            Kami</span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">
                            {{ $about->title ?? 'Hevi Digital Solution Solution' }}</h2>
                        @if ($about->subtitle)
                            <p class="text-lg text-gray-600 mt-2">{{ $about->subtitle }}</p>
                        @endif
                        <div class="prose prose-blue mt-6 text-gray-600 leading-relaxed">
                            {!! $about->description ??
                                'Kami adalah perusahaan teknologi yang berdedikasi untuk membantu bisnis Anda bertransformasi secara digital dengan solusi inovatif dan terpercaya.' !!}
                        </div>

                        <div class="grid grid-cols-2 gap-4 mt-8">
                            @if ($about->projects_completed)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-check-circle text-green-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-800">{{ $about->projects_completed }}+</div>
                                        <div class="text-xs text-gray-500">Proyek Selesai</div>
                                    </div>
                                </div>
                            @endif
                            @if ($about->happy_clients)
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-smile text-yellow-600"></i>
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-800">{{ $about->happy_clients }}+</div>
                                        <div class="text-xs text-gray-500">Klien Puas</div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif --}}

    {{-- ─── CONTACT CTA ─── --}}
    <section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-6">
                <i class="fas fa-headset text-2xl"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Proyek Anda?</h2>
            <p class="text-blue-100 text-lg mb-8">Konsultasikan kebutuhan digital Anda dengan tim ahli kami. Gratis, tanpa
                komitmen.</p>
            <div class="flex flex-wrap gap-4 justify-center">
                <a href="{{ route('contact') }}"
                    class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3.5 rounded-xl font-semibold transition flex items-center gap-2">
                    <i class="fas fa-paper-plane"></i> Hubungi Kami Sekarang
                </a>
                @if ($contact && $contact->whatsapp)
                    <a href="https://wa.me/{{ $contact->whatsapp }}" target="_blank"
                        class="bg-green-500 hover:bg-green-600 px-8 py-3.5 rounded-xl flex items-center gap-2 transition">
                        <i class="fab fa-whatsapp"></i> Chat WhatsApp
                    </a>
                @endif
            </div>
        </div>
    </section>

@endsection

@push('styles')
    <style>
        /* Line clamp utility */
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

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

        @keyframes fade-in-right {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
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

        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }

            100% {
                transform: translateX(100%);
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

        .animate-fade-in-right {
            animation: fade-in-right 0.8s ease-out forwards;
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

        .animate-shimmer {
            animation: shimmer 2s infinite;
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
    </style>
@endpush
