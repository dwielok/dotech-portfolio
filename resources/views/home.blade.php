@extends('layouts.app')

@section('title', 'PT Dotech Digital Solution - IT Solutions Terpercaya')

@section('content')

{{-- ─── HERO SECTION ─── --}}
<section class="relative min-h-screen flex items-center overflow-hidden bg-gradient-to-br from-dotech-dark via-blue-950 to-dotech-dark">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>
    {{-- Floating Blobs --}}
    <div class="absolute top-1/4 right-1/4 w-96 h-96 bg-dotech-blue/20 rounded-full blur-3xl animate-pulse-slow"></div>
    <div class="absolute bottom-1/4 left-1/4 w-64 h-64 bg-blue-400/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay:2s"></div>

    @if($hero && $hero->background_image)
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ $hero->background_image_url }}')"></div>
    @endif

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32 lg:py-0">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 bg-dotech-blue/20 border border-dotech-blue/30 rounded-full px-4 py-1.5 mb-6">
                <span class="w-2 h-2 bg-dotech-blue rounded-full animate-ping"></span>
                <span class="text-blue-300 text-sm font-medium">Digital Solution Partner</span>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-white leading-tight mb-6">
                @if($hero)
                    {!! nl2br(e($hero->headline)) !!}
                @else
                    Solusi Digital <span class="text-dotech-blue">Terpercaya</span> untuk Bisnis Anda
                @endif
            </h1>
            <p class="text-lg text-gray-300 mb-8 leading-relaxed max-w-2xl">
                {{ $hero?->description ?? 'Kami membantu bisnis Anda berkembang dengan teknologi modern. Web, Mobile, Cloud & IT Consulting.' }}
            </p>
            <div class="flex flex-wrap gap-4">
                @if($hero?->cta_primary_text)
                <a href="{{ $hero->cta_primary_url ?? route('contact') }}" class="btn-primary text-base px-8 py-3.5">
                    {{ $hero->cta_primary_text }}
                </a>
                @else
                <a href="{{ route('contact') }}" class="btn-primary text-base px-8 py-3.5">Konsultasi Gratis</a>
                @endif
                @if($hero?->cta_secondary_text)
                <a href="{{ $hero->cta_secondary_url ?? route('projects.index') }}" class="btn-secondary text-base px-8 py-3.5">
                    {{ $hero->cta_secondary_text }}
                </a>
                @else
                <a href="{{ route('projects.index') }}" class="btn-secondary text-base px-8 py-3.5">Lihat Proyek</a>
                @endif
            </div>
        </div>
    </div>

    {{-- Scroll indicator --}}
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1 text-gray-400">
        <span class="text-xs">Scroll</span>
        <div class="w-px h-8 bg-gradient-to-b from-gray-400 to-transparent animate-bounce"></div>
    </div>
</section>

{{-- ─── STATS / INTRO ─── --}}
@if($about)
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-3 gap-8 text-center">
            <div class="stat-card">
                <div class="stat-number">{{ $about->years_experience }}+</div>
                <div class="stat-label">Tahun Pengalaman</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $about->projects_completed }}+</div>
                <div class="stat-label">Proyek Selesai</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">{{ $about->happy_clients }}+</div>
                <div class="stat-label">Klien Puas</div>
            </div>
        </div>
    </div>
</section>
@endif

{{-- ─── SERVICES ─── --}}
@if($services->isNotEmpty())
<section id="services" class="py-24 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <span class="section-badge">Layanan Kami</span>
            <h2 class="section-title">Solusi Digital Lengkap</h2>
            <p class="section-subtitle">Kami menyediakan berbagai layanan teknologi untuk mendorong pertumbuhan bisnis Anda</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
            @foreach($services as $service)
            <div class="service-card group">
                <div class="service-icon" style="background-color: {{ $service->color }}22; color: {{ $service->color }}">
                    {!! $service->icon !!}
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2 group-hover:text-dotech-blue transition-colors">
                    {{ $service->title }}
                </h3>
                <p class="text-gray-600 text-sm leading-relaxed">{{ $service->description }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ─── FEATURED PROJECTS ─── --}}
@if($projects->isNotEmpty())
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header">
            <span class="section-badge">Portfolio</span>
            <h2 class="section-title">Proyek Terbaru Kami</h2>
            <p class="section-subtitle">Beberapa karya terbaik yang telah kami kerjakan untuk klien</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mt-12">
            @foreach($projects as $project)
            <a href="{{ route('projects.show', $project->slug) }}" class="project-card group">
                <div class="relative overflow-hidden rounded-xl aspect-video bg-gray-100">
                    <img src="{{ $project->featured_image_url }}"
                         alt="{{ $project->title }}"
                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 lazy"
                         loading="lazy">
                    @if($project->category)
                    <span class="absolute top-3 left-3 bg-dotech-blue text-white text-xs font-medium px-2.5 py-1 rounded-full">
                        {{ $project->category }}
                    </span>
                    @endif
                </div>
                <div class="p-5">
                    <h3 class="font-semibold text-gray-900 mb-1 group-hover:text-dotech-blue transition-colors">{{ $project->title }}</h3>
                    <p class="text-sm text-gray-500 line-clamp-2">{{ $project->short_description }}</p>
                    @if($project->client_name)
                    <p class="text-xs text-gray-400 mt-2">Klien: {{ $project->client_name }}</p>
                    @endif
                </div>
            </a>
            @endforeach
        </div>
        <div class="text-center mt-12">
            <a href="{{ route('projects.index') }}" class="btn-outline">Lihat Semua Proyek →</a>
        </div>
    </div>
</section>
@endif

{{-- ─── TESTIMONIALS ─── --}}
@if($testimonials->isNotEmpty())
<section class="py-24 bg-dotech-dark text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="section-header text-center">
            <span class="section-badge-light">Testimonial</span>
            <h2 class="text-3xl lg:text-4xl font-bold text-white mt-2">Apa Kata Klien Kami</h2>
            <p class="text-gray-400 mt-3">Kepercayaan klien adalah prioritas utama kami</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-12">
            @foreach($testimonials->take(3) as $testimonial)
            <div class="testimonial-card">
                {{-- Stars --}}
                <div class="flex gap-1 mb-4">
                    @for($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $testimonial->rating ? 'text-yellow-400' : 'text-gray-600' }}" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                    @endfor
                </div>
                <p class="text-gray-300 text-sm leading-relaxed mb-6 italic">"{{ $testimonial->testimonial }}"</p>
                <div class="flex items-center gap-3">
                    <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}"
                         class="w-10 h-10 rounded-full object-cover" loading="lazy">
                    <div>
                        <div class="font-semibold text-sm">{{ $testimonial->client_name }}</div>
                        @if($testimonial->company_name)
                        <div class="text-xs text-gray-400">{{ $testimonial->position ? $testimonial->position . ' at ' : '' }}{{ $testimonial->company_name }}</div>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ─── CONTACT CTA ─── --}}
<section class="py-24 bg-gradient-to-r from-dotech-blue to-blue-700 text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl lg:text-4xl font-bold mb-4">Siap Memulai Proyek Anda?</h2>
        <p class="text-blue-100 text-lg mb-8">Konsultasikan kebutuhan digital Anda dengan tim ahli kami. Gratis, tanpa komitmen.</p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="{{ route('contact') }}" class="bg-white text-dotech-blue font-semibold px-8 py-3.5 rounded-xl hover:bg-blue-50 transition-colors">
                Hubungi Kami Sekarang
            </a>
            @php $contact = \App\Models\ContactInformation::where('is_active', true)->first(); @endphp
            @if($contact?->whatsapp)
            <a href="{{ $contact->whatsapp_url }}" target="_blank" class="bg-green-500 hover:bg-green-600 text-white font-semibold px-8 py-3.5 rounded-xl transition-colors flex items-center gap-2">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                    <path d="M11.999 0C5.373 0 0 5.373 0 12c0 2.117.554 4.107 1.523 5.842L.057 23.88l6.204-1.626A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 11.999 0z"/>
                </svg>
                WhatsApp
            </a>
            @endif
        </div>
    </div>
</section>

@endsection
