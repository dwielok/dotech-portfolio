
{{-- resources/views/about.blade.php --}}
@extends('layouts.app')

@section('title', 'Tentang Kami - PT Dotech Digital Solution')

@section('content')

{{-- ─── HERO SECTION (About Page) ─── --}}
<section class="relative min-h-[60vh] flex items-center overflow-hidden bg-gradient-to-br from-dotech-dark via-blue-950 to-dotech-dark">
    {{-- Animated Background Grid --}}
    <div class="absolute inset-0 opacity-10">
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
    <div class="absolute top-40 right-40 opacity-10 animate-float-slow hidden lg:block">
        <i class="fab fa-vuejs text-4xl text-emerald-400"></i>
    </div>
    <div class="absolute bottom-40 left-32 opacity-10 animate-float-reverse hidden lg:block">
        <i class="fab fa-figma text-4xl text-pink-400"></i>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28 text-center">
        {{-- Animated Badge --}}
        <div class="inline-flex items-center gap-2 bg-dotech-blue/20 backdrop-blur-sm border border-dotech-blue/30 rounded-full px-4 py-1.5 mb-6 animate-slide-down">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
            </span>
            <span class="text-blue-300 text-sm font-medium tracking-wide">Tentang Kami</span>
            <span class="text-blue-300/50 text-xs">✦ Our Story</span>
        </div>

        {{-- Main Heading with Gradient Text --}}
        <h1 class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up">
            @if($about && $about->headline)
                {!! nl2br(e($about->headline)) !!}
            @else
                <span class="bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-500 bg-clip-text text-transparent">Mengenal</span> Lebih Dekat
            @endif
        </h1>

        {{-- Description --}}
        <p class="text-lg md:text-xl text-gray-300 max-w-3xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
            @if($about && $about->hero_description)
                {{ $about->hero_description }}
            @else
                Kami adalah mitra transformasi digital yang berkomitmen menghadirkan solusi teknologi inovatif untuk mendorong pertumbuhan bisnis Anda.
            @endif
        </p>

        {{-- Stats Row --}}
        <div class="flex flex-wrap justify-center gap-8 mt-10 animate-fade-in-up animation-delay-400">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-calendar-alt text-blue-400 text-sm"></i>
                </div>
                <div>
                    <span class="text-white font-bold">Est. 2016</span>
                    <span class="text-gray-400 text-xs block">Since</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-users text-green-400 text-sm"></i>
                </div>
                <div>
                    <span class="text-white font-bold">150+</span>
                    <span class="text-gray-400 text-xs block">Clients</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-purple-500/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-rocket text-purple-400 text-sm"></i>
                </div>
                <div>
                    <span class="text-white font-bold">250+</span>
                    <span class="text-gray-400 text-xs block">Projects</span>
                </div>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-amber-500/20 rounded-full flex items-center justify-center">
                    <i class="fas fa-trophy text-amber-400 text-sm"></i>
                </div>
                <div>
                    <span class="text-white font-bold">98%</span>
                    <span class="text-gray-400 text-xs block">Satisfaction</span>
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
    </div>
</section>

{{-- ─── ABOUT MAIN CONTENT ─── --}}
@if($about)
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            {{-- Left Column: Image --}}
            <div class="relative">
                <div class="absolute -top-4 -left-4 w-32 h-32 bg-dotech-blue/10 rounded-2xl -z-0"></div>
                <div class="absolute -bottom-4 -right-4 w-40 h-40 bg-blue-100 rounded-full -z-0"></div>
                @if($about->image_url)
                    <img src="{{ $about->image_url }}" alt="{{ $about->title ?? 'About Us' }}"
                         class="relative rounded-2xl shadow-2xl w-full object-cover lazy" loading="lazy"
                         style="min-height: 400px; max-height: 500px;">
                @else
                    <div class="relative bg-gradient-to-br from-dotech-blue to-blue-700 rounded-2xl shadow-2xl w-full min-h-[400px] flex items-center justify-center">
                        <i class="fas fa-building text-white/20 text-8xl"></i>
                    </div>
                @endif
            </div>

            {{-- Right Column: Content --}}
            <div>
                <div class="inline-flex items-center gap-2 bg-blue-100 rounded-full px-4 py-1.5 mb-4">
                    <span class="w-2 h-2 bg-dotech-blue rounded-full"></span>
                    <span class="text-dotech-blue text-sm font-semibold">Our Story</span>
                </div>
                <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mb-4">
                    {{ $about->title ?? 'Kisah Perjalanan Kami' }}
                </h2>
                <div class="prose prose-lg text-gray-600 space-y-4">
                    @if($about->description)
                        {!! nl2br(e($about->description)) !!}
                    @else
                        <p>PT Dotech Digital Solution berdiri sejak tahun 2016 dengan visi menjadi perusahaan teknologi terdepan yang membantu bisnis di Indonesia bertransformasi secara digital. Kami percaya bahwa teknologi yang tepat dapat menjadi katalis pertumbuhan bisnis yang signifikan.</p>
                        <p>Dengan tim yang berpengalaman di berbagai bidang teknologi, kami telah membantu lebih dari 150+ klien dari berbagai industri untuk mencapai tujuan digital mereka. Komitmen kami adalah memberikan solusi yang tidak hanya canggih secara teknis, tetapi juga relevan dengan kebutuhan bisnis klien.</p>
                        <p>Sampai saat ini, kami terus berinovasi dan berkembang mengikuti perkembangan teknologi global, sambil tetap memegang teguh nilai-nilai integritas, kolaborasi, dan dampak positif.</p>
                    @endif
                </div>

                @if($about->mission || $about->vision)
                <div class="grid grid-cols-2 gap-4 mt-8">
                    @if($about->vision)
                    <div class="bg-blue-50 rounded-xl p-4">
                        <i class="fas fa-eye text-dotech-blue text-2xl mb-2"></i>
                        <h3 class="font-bold text-gray-900">Visi</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $about->vision }}</p>
                    </div>
                    @endif
                    @if($about->mission)
                    <div class="bg-blue-50 rounded-xl p-4">
                        <i class="fas fa-bullseye text-dotech-blue text-2xl mb-2"></i>
                        <h3 class="font-bold text-gray-900">Misi</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ $about->mission }}</p>
                    </div>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

{{-- ─── STATISTICS SECTION ─── --}}
@if($about && ($about->years_experience || $about->projects_completed || $about->happy_clients || $about->expert_team))
<section class="py-16 bg-gradient-to-r from-dotech-dark to-blue-950 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold">Pencapaian Kami</h2>
            <p class="text-blue-200 mt-2">Angka yang berbicara tentang dedikasi dan kepercayaan klien</p>
        </div>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="stat-card">
                <div class="text-4xl md:text-5xl font-extrabold text-dotech-blue">{{ $about->years_experience ?? '8' }}+</div>
                <div class="text-sm text-gray-300 mt-2">Tahun Pengalaman</div>
            </div>
            <div class="stat-card">
                <div class="text-4xl md:text-5xl font-extrabold text-dotech-blue">{{ $about->projects_completed ?? '250' }}+</div>
                <div class="text-sm text-gray-300 mt-2">Proyek Selesai</div>
            </div>
            <div class="stat-card">
                <div class="text-4xl md:text-5xl font-extrabold text-dotech-blue">{{ $about->happy_clients ?? '150' }}+</div>
                <div class="text-sm text-gray-300 mt-2">Klien Puas</div>
            </div>
            <div class="stat-card">
                <div class="text-4xl md:text-5xl font-extrabold text-dotech-blue">{{ $about->expert_team ?? '50' }}+</div>
                <div class="text-sm text-gray-300 mt-2">Tim Ahli</div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ─── VALUES / PRINCIPLES SECTION ─── --}}
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="bg-dotech-blue/10 text-dotech-blue text-sm font-semibold px-4 py-1.5 rounded-full">Core Values</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">Prinsip Yang Mendasari Setiap Langkah Kami</h2>
            <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Nilai-nilai yang menjadi fondasi dalam setiap proyek dan kolaborasi bersama klien</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            {{-- Innovation Card --}}
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition group">
                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-dotech-blue rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-lightbulb text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Innovation</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Kami terus mengeksplorasi ide baru dan teknologi mutakhir untuk memberikan keunggulan kompetitif.</p>
            </div>

            {{-- Integrity Card --}}
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition group">
                <div class="w-16 h-16 bg-gradient-to-br from-emerald-500 to-teal-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-shield-alt text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Integrity</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Kami membangun kepercayaan melalui kejujuran dan transparansi dalam setiap hubungan.</p>
            </div>

            {{-- Collaboration Card --}}
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition group">
                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-handshake text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Collaboration</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Kami percaya hasil terbaik datang dari kerja sama tim yang solid dengan klien.</p>
            </div>

            {{-- Impact Card --}}
            <div class="bg-white rounded-2xl p-6 text-center shadow-sm hover:shadow-md transition group">
                <div class="w-16 h-16 bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition duration-300">
                    <i class="fas fa-chart-line text-white text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-gray-900">Impact</h3>
                <p class="text-gray-500 text-sm mt-2 leading-relaxed">Kami berkomitmen menciptakan nilai yang membuat perbedaan nyata bagi bisnis Anda.</p>
            </div>
        </div>
    </div>
</section>

{{-- ─── SERVICES SECTION (from controller) ─── --}}
@if($services->isNotEmpty())
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="bg-dotech-blue/10 text-dotech-blue text-sm font-semibold px-4 py-1.5 rounded-full">Layanan Kami</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">Solusi Digital Yang Kami Tawarkan</h2>
            <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Teknologi tepat guna untuk mendorong pertumbuhan bisnis Anda</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($services as $service)
            <div class="service-card group bg-gray-50 rounded-xl p-6 hover:bg-white hover:shadow-lg transition-all duration-300">
                <div class="w-14 h-14 rounded-xl flex items-center justify-center mb-4" style="background-color: {{ $service->color ?? '#2563EB' }}22; color: {{ $service->color ?? '#2563EB' }}">
                    {!! $service->icon ?? '<i class="fas fa-cogs text-2xl"></i>' !!}
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-dotech-blue transition">
                    {{ $service->title }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ─── TEAM / EXPERTISE SECTION (Optional - jika ada model Team) --}}
{{-- Jika Anda memiliki model Team, bisa ditambahkan di sini --}}

{{-- ─── TESTIMONIALS SECTION ─── --}}
@if($testimonials->isNotEmpty())
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <span class="bg-dotech-blue/10 text-dotech-blue text-sm font-semibold px-4 py-1.5 rounded-full">Testimonial</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-gray-900 mt-4">Apa Kata Klien Kami</h2>
            <p class="text-gray-600 mt-3 max-w-2xl mx-auto">Kepercayaan klien adalah bukti nyata kualitas layanan kami</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($testimonials as $testimonial)
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition">
                <div class="flex gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                    <i class="fas fa-star text-xs {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-300' }}"></i>
                    @endfor
                </div>
                <p class="text-gray-600 text-sm leading-relaxed mb-6 italic">"{{ $testimonial->testimonial }}"</p>
                <div class="flex items-center gap-3">
                    @if($testimonial->photo_url)
                    <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}" class="w-10 h-10 rounded-full object-cover" loading="lazy">
                    @else
                    <div class="w-10 h-10 rounded-full bg-gradient-to-br from-dotech-blue to-blue-400 flex items-center justify-center text-white font-bold">
                        {{ substr($testimonial->client_name, 0, 1) }}
                    </div>
                    @endif
                    <div>
                        <div class="font-semibold text-gray-900 text-sm">{{ $testimonial->client_name }}</div>
                        <div class="text-xs text-gray-400">{{ $testimonial->position }}@if($testimonial->company_name), {{ $testimonial->company_name }}@endif</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ─── SOCIAL LINKS & CONTACT CTA ─── --}}
<section class="py-16 bg-gradient-to-r from-dotech-blue to-blue-700 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Terhubung Dengan Kami</h2>
        <p class="text-blue-100 mb-8">Ikuti kami di media sosial untuk update terbaru seputar teknologi dan inovasi</p>

        @if($socialLinks->isNotEmpty())
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            @foreach($socialLinks as $social)
            <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
               class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white hover:text-dotech-blue transition-all duration-300 group">
                {!! $social->icon !!}
            </a>
            @endforeach
        </div>
        @else
        <div class="flex flex-wrap justify-center gap-4 mb-8">
            <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white hover:text-dotech-blue transition">
                <i class="fab fa-facebook-f text-xl"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white hover:text-dotech-blue transition">
                <i class="fab fa-instagram text-xl"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white hover:text-dotech-blue transition">
                <i class="fab fa-linkedin-in text-xl"></i>
            </a>
            <a href="#" class="w-12 h-12 bg-white/20 rounded-full flex items-center justify-center hover:bg-white hover:text-dotech-blue transition">
                <i class="fab fa-twitter text-xl"></i>
            </a>
        </div>
        @endif

        <a href="{{ route('contact') }}" class="inline-block bg-white text-dotech-blue font-semibold px-8 py-3.5 rounded-xl hover:bg-blue-50 transition-colors">
            Hubungi Kami →
        </a>
    </div>
</section>

@endsection

{{-- Optional: Add custom CSS for Font Awesome jika belum ada di layout --}}
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    /* Additional utility classes */
    .stat-card {
        transition: transform 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-5px);
    }
    .service-card {
        transition: all 0.3s ease;
    }
    .service-card:hover {
        transform: translateY(-4px);
    }
    .lazy {
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .lazy.loaded {
        opacity: 1;
    }
</style>
@endpush

@push('scripts')
<script>
    // Simple lazy loading
    document.addEventListener('DOMContentLoaded', function() {
        const lazyImages = document.querySelectorAll('.lazy');
        if ('IntersectionObserver' in window) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.classList.add('loaded');
                        observer.unobserve(img);
                    }
                });
            });
            lazyImages.forEach(img => observer.observe(img));
        } else {
            lazyImages.forEach(img => img.classList.add('loaded'));
        }
    });
</script>
@endpush

@push('styles')
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
    @keyframes slide-down {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes scroll-down {
        0% { opacity: 1; transform: translateY(0); }
        100% { opacity: 0; transform: translateY(15px); }
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
    .animate-slide-down { animation: slide-down 0.6s ease-out forwards; opacity: 0; }
    .animate-scroll-down { animation: scroll-down 1.5s ease-in-out infinite; }
    .animate-bounce-slow { animation: bounce 2s ease-in-out infinite; }
    .animation-delay-200 { animation-delay: 0.2s; }
    .animation-delay-400 { animation-delay: 0.4s; }
    .animation-delay-600 { animation-delay: 0.6s; }
</style>
@endpush
