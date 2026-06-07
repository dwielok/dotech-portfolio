@extends('layouts.app')

@section('title', 'PT Dotech Digital Solution - IT Solutions Terpercaya')

@section('content')

{{-- ─── HERO SECTION ─── --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-[#0A1128] via-[#1E2A5E] to-[#0A1128]">
    {{-- Animated Background Grid --}}
    <div class="absolute inset-0 opacity-15">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    {{-- Animated Gradient Orbs --}}
    <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-blue-500/30 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-pulse-slower" style="animation-delay: 2s;"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-float"></div>

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

    {{-- Animated Code Lines Effect --}}
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-black/20 to-transparent pointer-events-none"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Left Content --}}
            <div class="max-w-2xl">
                {{-- Animated Badge --}}
                <div class="inline-flex items-center gap-2 bg-blue-600/20 backdrop-blur-sm border border-blue-400/30 rounded-full px-4 py-1.5 mb-6 animate-slide-down">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                    </span>
                    <span class="text-blue-200 text-sm font-medium tracking-wide">Digital Solution Partner</span>
                    <span class="text-blue-300/50 text-xs">✦ Since 2016</span>
                </div>

                {{-- Main Heading with Gradient Text --}}
                <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up">
                    Solusi Digital
                    <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-500 bg-clip-text text-transparent">Terpercaya</span>
                    untuk Bisnis Anda
                </h1>

                {{-- Description --}}
                <p class="text-lg md:text-xl text-gray-300 leading-relaxed mb-8 animate-fade-in-up animation-delay-200">
                    Kami membantu bisnis Anda berkembang dengan teknologi modern.
                    <span class="inline-flex items-center gap-1">
                        Web
                        <span class="w-1 h-1 bg-blue-400 rounded-full"></span>
                        Mobile
                        <span class="w-1 h-1 bg-blue-400 rounded-full"></span>
                        Cloud
                        <span class="w-1 h-1 bg-blue-400 rounded-full"></span>
                        IT Consulting
                    </span>
                </p>

                {{-- CTA Buttons with Hover Effects --}}
                <div class="flex flex-wrap gap-4 animate-fade-in-up animation-delay-400">
                    <a href="{{ route('contact') }}" class="group relative bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-500 hover:to-blue-600 text-white font-semibold px-8 py-3.5 rounded-xl transition-all duration-300 shadow-lg hover:shadow-blue-500/25 hover:-translate-y-0.5 flex items-center gap-2 overflow-hidden">
                        <span class="relative z-10 flex items-center gap-2">
                            <i class="fas fa-headset text-sm"></i>
                            Konsultasi Gratis
                            <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                        </span>
                        <span class="absolute inset-0 bg-gradient-to-r from-blue-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    </a>
                    <a href="{{ route('projects.index') }}" class="group border border-white/30 text-white hover:bg-white/10 px-8 py-3.5 rounded-xl transition-all duration-300 hover:-translate-y-0.5 flex items-center gap-2 backdrop-blur-sm">
                        <i class="fas fa-play-circle text-sm group-hover:scale-110 transition-transform"></i>
                        Lihat Proyek
                        <i class="fas fa-chevron-right text-xs opacity-0 group-hover:opacity-100 transition-all group-hover:translate-x-1"></i>
                    </a>
                </div>

                {{-- Trust Badges --}}
                <div class="flex flex-wrap items-center gap-6 mt-10 pt-6 border-t border-white/10 animate-fade-in-up animation-delay-600">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-star text-yellow-400 text-sm"></i>
                        <span class="text-gray-400 text-xs">150+ Klien Puas</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle text-green-400 text-sm"></i>
                        <span class="text-gray-400 text-xs">250+ Proyek</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i class="fas fa-award text-blue-400 text-sm"></i>
                        <span class="text-gray-400 text-xs">8+ Tahun Pengalaman</span>
                    </div>
                </div>
            </div>

            {{-- Right Side Illustration / 3D Card --}}
            <div class="hidden lg:block relative animate-fade-in-right">
                <div class="relative group">
                    {{-- Glow Effect --}}
                    <div class="absolute -inset-4 bg-gradient-to-r from-blue-600/20 to-cyan-600/20 rounded-3xl blur-xl group-hover:blur-2xl transition-all duration-500"></div>

                    {{-- Main Card --}}
                    <div class="relative bg-white/5 backdrop-blur-sm border border-white/10 rounded-2xl p-6 shadow-2xl overflow-hidden">
                        {{-- Gradient Border Animation --}}
                        <div class="absolute inset-0 rounded-2xl p-[1px] bg-gradient-to-r from-blue-500 via-cyan-500 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>

                        <div class="relative z-10">
                            {{-- Card Header --}}
                            <div class="flex items-center gap-3 mb-6 pb-4 border-b border-white/10">
                                <div class="w-10 h-10 bg-blue-500/20 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-chart-line text-blue-400 text-xl"></i>
                                </div>
                                <div>
                                    <p class="text-white font-semibold">Digital Transformation</p>
                                    <p class="text-gray-400 text-xs">2024 Impact Report</p>
                                </div>
                                <i class="fas fa-ellipsis-h text-gray-500 ml-auto"></i>
                            </div>

                            {{-- Stats Grid --}}
                            <div class="grid grid-cols-2 gap-4 mb-6">
                                <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                    <p class="text-2xl font-bold text-blue-400">98%</p>
                                    <p class="text-xs text-gray-400">Client Retention</p>
                                </div>
                                <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                    <p class="text-2xl font-bold text-cyan-400">2.5x</p>
                                    <p class="text-xs text-gray-400">ROI Average</p>
                                </div>
                                <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                    <p class="text-2xl font-bold text-green-400">24/7</p>
                                    <p class="text-xs text-gray-400">Support</p>
                                </div>
                                <div class="bg-white/5 rounded-xl p-3 text-center hover:bg-white/10 transition">
                                    <p class="text-2xl font-bold text-purple-400">100%</p>
                                    <p class="text-xs text-gray-400">On-Time Delivery</p>
                                </div>
                            </div>

                            {{-- Progress Bar --}}
                            <div class="mb-4">
                                <div class="flex justify-between text-xs text-gray-400 mb-1">
                                    <span>Project Success Rate</span>
                                    <span>98%</span>
                                </div>
                                <div class="h-1.5 bg-white/10 rounded-full overflow-hidden">
                                    <div class="h-full w-[98%] bg-gradient-to-r from-blue-500 to-cyan-500 rounded-full animate-shimmer"></div>
                                </div>
                            </div>

                            {{-- Tech Stack Tags --}}
                            <div class="flex flex-wrap gap-2 mt-4">
                                <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i class="fab fa-react mr-1 text-blue-400"></i> React</span>
                                <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i class="fab fa-laravel mr-1 text-red-400"></i> Laravel</span>
                                <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i class="fab fa-aws mr-1 text-yellow-400"></i> AWS</span>
                                <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i class="fas fa-cloud mr-1 text-cyan-400"></i> Cloud</span>
                                <span class="text-xs bg-white/10 px-2 py-1 rounded-full"><i class="fas fa-database mr-1 text-green-400"></i> MongoDB</span>
                            </div>
                        </div>
                    </div>

                    {{-- Floating Elements Around Card --}}
                    <div class="absolute -top-6 -right-6 w-16 h-16 bg-blue-500/20 rounded-full blur-xl animate-pulse"></div>
                    <div class="absolute -bottom-8 -left-8 w-20 h-20 bg-cyan-500/20 rounded-full blur-xl animate-pulse-slow"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Scroll Indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-400 animate-bounce-slow">
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
                <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">8+</div>
                <div class="text-gray-600 font-medium mt-1">Tahun Pengalaman</div>
            </div>
            <div class="stat-card p-4 rounded-2xl bg-gray-50/70 hover:bg-gray-100 transition">
                <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">250+</div>
                <div class="text-gray-600 font-medium mt-1">Proyek Selesai</div>
            </div>
            <div class="stat-card p-4 rounded-2xl bg-gray-50/70 hover:bg-gray-100 transition">
                <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">150+</div>
                <div class="text-gray-600 font-medium mt-1">Klien Puas</div>
            </div>
            <div class="stat-card p-4 rounded-2xl bg-gray-50/70 hover:bg-gray-100 transition">
                <div class="text-3xl md:text-4xl font-extrabold text-dotech-blue">50+</div>
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
            <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Kami menyediakan berbagai layanan teknologi untuk mendorong pertumbuhan bisnis Anda</p>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mt-5 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-blue-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-blue-100 transition">
                    <i class="fas fa-laptop-code text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Web Development</h3>
                <p class="text-gray-500 leading-relaxed">Website modern, responsif, dan performa tinggi dengan teknologi terkini.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-green-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-green-100 transition">
                    <i class="fas fa-mobile-alt text-2xl text-green-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Mobile Apps</h3>
                <p class="text-gray-500 leading-relaxed">Aplikasi mobile native untuk iOS dan Android dengan user experience terbaik.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-cyan-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-cyan-100 transition">
                    <i class="fas fa-cloud text-2xl text-cyan-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Cloud Solutions</h3>
                <p class="text-gray-500 leading-relaxed">Infrastruktur cloud yang scalable, aman, dan cost-efficient untuk bisnis Anda.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-purple-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-purple-100 transition">
                    <i class="fas fa-chart-line text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">IT Consulting</h3>
                <p class="text-gray-500 leading-relaxed">Konsultasi IT strategis untuk transformasi digital bisnis Anda.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-orange-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-orange-100 transition">
                    <i class="fas fa-shield-alt text-2xl text-orange-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Cyber Security</h3>
                <p class="text-gray-500 leading-relaxed">Perlindungan maksimal untuk data dan sistem bisnis Anda dari ancaman digital.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 group">
                <div class="w-14 h-14 bg-pink-50 rounded-xl flex items-center justify-center mb-5 group-hover:bg-pink-100 transition">
                    <i class="fas fa-robot text-2xl text-pink-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">AI & Automation</h3>
                <p class="text-gray-500 leading-relaxed">Solusi kecerdasan buatan dan otomatisasi untuk efisiensi bisnis.</p>
            </div>
        </div>
    </div>
</section>

{{-- ─── WHY CHOOSE US SECTION ─── --}}
<section class="py-24 bg-white relative overflow-hidden">
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 right-10 w-64 h-64 bg-blue-50 rounded-full blur-3xl opacity-40"></div>
        <div class="absolute bottom-10 left-5 w-72 h-72 bg-indigo-50 rounded-full blur-3xl opacity-30"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="bg-blue-100 text-blue-700 text-sm font-semibold px-4 py-1.5 rounded-full inline-flex items-center gap-2">
                <i class="fas fa-medal text-xs"></i> Why Choose Us
            </span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-5">Mengapa Harus Dotech?</h2>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mt-4 rounded-full"></div>
            <p class="text-gray-500 max-w-2xl mx-auto mt-5 text-lg">Kombinasi inovasi, integritas, dan keahlian teknis untuk memberikan dampak nyata.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center group">
                <div class="w-16 h-16 bg-blue-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-blue-100 transition">
                    <i class="fas fa-lightbulb text-2xl text-blue-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Inovasi</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Kami terus mengeksplorasi ide baru dan teknologi mutakhir untuk keunggulan kompetitif.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center group">
                <div class="w-16 h-16 bg-emerald-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-emerald-100 transition">
                    <i class="fas fa-shield-alt text-2xl text-emerald-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Integritas</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Transparansi penuh, kejujuran, dan komitmen etika dalam setiap kolaborasi.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center group">
                <div class="w-16 h-16 bg-purple-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-purple-100 transition">
                    <i class="fas fa-users text-2xl text-purple-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Kolaborasi</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Hasil terbaik lahir dari kerja sama tim yang erat dengan klien.</p>
            </div>
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-100 hover:shadow-xl transition-all duration-300 hover:-translate-y-1 text-center group">
                <div class="w-16 h-16 bg-amber-50 rounded-2xl flex items-center justify-center mx-auto mb-5 group-hover:bg-amber-100 transition">
                    <i class="fas fa-chart-line text-2xl text-amber-600"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-800">Dampak</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Kami berkomitmen menciptakan nilai yang membuat perbedaan nyata bagi bisnis Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- ─── FEATURED PROJECTS SECTION ─── --}}
<section class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="bg-gray-200 text-gray-700 text-sm font-semibold px-4 py-1.5 rounded-full">Portfolio</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">Proyek Unggulan Kami</h2>
            <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Beberapa karya terbaik yang telah kami hasilkan untuk klien</p>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-500 to-indigo-500 mx-auto mt-5 rounded-full"></div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="overflow-hidden h-52">
                    <img src="https://placehold.co/600x400/1E3A8A/white?text=E-Commerce+Platform" alt="project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <div class="text-xs text-dotech-blue font-semibold mb-2">E-Commerce</div>
                    <h3 class="font-bold text-lg text-gray-800 group-hover:text-dotech-blue transition">Modern E-Commerce Platform</h3>
                    <p class="text-gray-500 text-sm mt-1">Solusi belanja online dengan fitur lengkap dan performa tinggi.</p>
                </div>
            </div>
            <div class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="overflow-hidden h-52">
                    <img src="https://placehold.co/600x400/0F172A/white?text=Fintech+Dashboard" alt="project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <div class="text-xs text-dotech-blue font-semibold mb-2">Fintech</div>
                    <h3 class="font-bold text-lg text-gray-800 group-hover:text-dotech-blue transition">Financial Analytics Dashboard</h3>
                    <p class="text-gray-500 text-sm mt-1">Monitoring keuangan real-time dengan visualisasi data interaktif.</p>
                </div>
            </div>
            <div class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="overflow-hidden h-52">
                    <img src="https://placehold.co/600x400/2563EB/white?text=Healthcare+App" alt="project" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-5">
                    <div class="text-xs text-dotech-blue font-semibold mb-2">Healthcare</div>
                    <h3 class="font-bold text-lg text-gray-800 group-hover:text-dotech-blue transition">Telemedicine Platform</h3>
                    <p class="text-gray-500 text-sm mt-1">Aplikasi konsultasi dokter online dengan video call dan resep digital.</p>
                </div>
            </div>
        </div>
        <div class="text-center mt-10">
            <a href="{{ route('projects.index') }}" class="inline-flex items-center gap-2 text-dotech-blue font-semibold hover:gap-3 transition-all">
                Lihat Semua Proyek <i class="fas fa-arrow-right text-sm"></i>
            </a>
        </div>
    </div>
</section>

{{-- ─── TESTIMONIALS SECTION ─── --}}
<section class="py-20 bg-[#0A1128] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="bg-blue-900/40 text-blue-200 text-sm px-4 py-1.5 rounded-full inline-flex items-center gap-2">
                <i class="fas fa-star text-xs"></i> Testimonial
            </span>
            <h2 class="text-3xl font-bold mt-4">Apa Kata Klien Kami</h2>
            <p class="text-blue-200/70 mt-2">Kepercayaan klien adalah prioritas utama kami</p>
        </div>
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition">
                <div class="flex gap-1 mb-4">
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed">"Tim Dotech sangat profesional dan solusi yang diberikan meningkatkan efisiensi bisnis kami secara signifikan."</p>
                <div class="mt-4 flex items-center gap-3 pt-3 border-t border-white/10">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-blue-500 to-cyan-500 flex items-center justify-center font-bold">AW</div>
                    <div>
                        <div class="font-semibold text-sm">Andi Wijaya</div>
                        <div class="text-xs text-gray-400">CEO TechCorp</div>
                    </div>
                </div>
            </div>
            <div class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition">
                <div class="flex gap-1 mb-4">
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed">"Inovasi dan integritas mereka benar-benar membawa dampak besar bagi perusahaan kami. Sangat direkomendasikan!"</p>
                <div class="mt-4 flex items-center gap-3 pt-3 border-t border-white/10">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-pink-500 flex items-center justify-center font-bold">SM</div>
                    <div>
                        <div class="font-semibold text-sm">Sarah M.</div>
                        <div class="text-xs text-gray-400">Product Lead</div>
                    </div>
                </div>
            </div>
            <div class="bg-white/5 backdrop-blur-sm p-6 rounded-2xl border border-white/10 hover:bg-white/10 transition">
                <div class="flex gap-1 mb-4">
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                    <i class="fas fa-star text-yellow-400 text-sm"></i>
                </div>
                <p class="text-gray-300 text-sm leading-relaxed">"Kolaborasi yang luar biasa, hasil aplikasi mobile melebihi ekspektasi. Tim sangat responsif dan profesional."</p>
                <div class="mt-4 flex items-center gap-3 pt-3 border-t border-white/10">
                    <div class="w-10 h-10 rounded-full bg-gradient-to-r from-green-500 to-emerald-500 flex items-center justify-center font-bold">BS</div>
                    <div>
                        <div class="font-semibold text-sm">Budi Santoso</div>
                        <div class="text-xs text-gray-400">Owner</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ─── CONTACT CTA ─── --}}
<section class="py-20 bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="inline-flex items-center justify-center w-16 h-16 bg-white/20 rounded-full mb-6">
            <i class="fas fa-headset text-2xl"></i>
        </div>
        <h2 class="text-3xl md:text-4xl font-bold mb-4">Siap Memulai Proyek Anda?</h2>
        <p class="text-blue-100 text-lg mb-8">Konsultasikan kebutuhan digital Anda dengan tim ahli kami. Gratis, tanpa komitmen.</p>
        <div class="flex flex-wrap gap-4 justify-center">
            <a href="{{ route('contact') }}" class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-3.5 rounded-xl font-semibold transition flex items-center gap-2">
                <i class="fas fa-paper-plane"></i> Hubungi Kami Sekarang
            </a>
            <a href="#" class="bg-green-500 hover:bg-green-600 px-8 py-3.5 rounded-xl flex items-center gap-2 transition">
                <i class="fab fa-whatsapp"></i> Chat WhatsApp
            </a>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    @keyframes pulse-slow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.6; transform: scale(1.05); }
    }
    @keyframes pulse-slower {
        0%, 100% { opacity: 0.2; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(1.1); }
    }
    @keyframes float {
        0%, 100% { transform: translate(-50%, -50%) translateY(0px); }
        50% { transform: translate(-50%, -50%) translateY(-20px); }
    }
    @keyframes float-slow {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(-15px) translateX(10px); }
    }
    @keyframes float-reverse {
        0%, 100% { transform: translateY(0px) translateX(0px); }
        50% { transform: translateY(15px) translateX(-10px); }
    }
    @keyframes fade-in-up {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fade-in-right {
        from { opacity: 0; transform: translateX(50px); }
        to { opacity: 1; transform: translateX(0); }
    }
    @keyframes slide-down {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes scroll-down {
        0% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(15px); }
    }
    @keyframes shimmer {
        0% { transform: translateX(-100%); }
        100% { transform: translateX(100%); }
    }
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(5px); }
    }
    .animate-pulse-slow { animation: pulse-slow 4s ease-in-out infinite; }
    .animate-pulse-slower { animation: pulse-slower 6s ease-in-out infinite; }
    .animate-float { animation: float 6s ease-in-out infinite; }
    .animate-float-slow { animation: float-slow 8s ease-in-out infinite; }
    .animate-float-reverse { animation: float-reverse 7s ease-in-out infinite; }
    .animate-fade-in-up { animation: fade-in-up 0.8s ease-out forwards; opacity: 0; }
    .animate-fade-in-right { animation: fade-in-right 0.8s ease-out forwards; opacity: 0; }
    .animate-slide-down { animation: slide-down 0.6s ease-out forwards; opacity: 0; }
    .animate-scroll-down { animation: scroll-down 1.5s ease-in-out infinite; }
    .animate-bounce-slow { animation: bounce 2s ease-in-out infinite; }
    .animate-shimmer { animation: shimmer 2s infinite; }
    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }
</style>
@endpush
