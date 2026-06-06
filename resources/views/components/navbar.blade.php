<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PT Dotech Digital Solution')</title>
    <meta name="description" content="@yield('meta_description', 'PT Dotech Digital Solution - Web Development, Mobile Development, Cloud Solution, IT Consulting')">
    <meta name="keywords" content="@yield('meta_keywords', 'IT solution, web development, mobile development, cloud solution, Yogyakarta')">
    <meta property="og:title" content="@yield('title', 'PT Dotech Digital Solution')">
    <meta property="og:description" content="@yield('meta_description', 'PT Dotech Digital Solution')">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="bg-white text-gray-900 font-jakarta antialiased">

    {{-- Navigation --}}
    @include('components.navbar')

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    {{-- Flash Messages --}}
    @if(session('success'))
    <div id="toast" class="fixed bottom-6 right-6 z-50 bg-green-600 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 animate-slide-up">
        <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
        </svg>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @endif

    @stack('scripts')
    <script>
        // Auto-dismiss toast
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) toast.style.display = 'none';
        }, 5000);
    </script>
</body>
</html>
```

### resources/views/components/navbar.blade.php
```html
<nav x-data="{ open: false, scrolled: false }"
     x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
     :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-md' : 'bg-transparent'"
     class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo_dotech.png') }}" alt="PT Dotech" class="h-10 w-auto">
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-8">
                <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
                <a href="{{ route('projects.index') }}" class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}">Proyek</a>
                <a href="{{ route('contact') }}" class="btn-primary text-sm px-5 py-2.5">Hubungi Kami</a>
            </div>

            {{-- Mobile Hamburger --}}
            <button @click="open = !open" class="lg:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition class="lg:hidden pb-4 border-t border-gray-100">
            <div class="flex flex-col gap-2 pt-4">
                <a href="{{ route('home') }}" class="mobile-nav-link">Beranda</a>
                <a href="{{ route('about') }}" class="mobile-nav-link">Tentang Kami</a>
                <a href="{{ route('projects.index') }}" class="mobile-nav-link">Proyek</a>
                <a href="{{ route('contact') }}" class="btn-primary text-center mt-2">Hubungi Kami</a>
            </div>
        </div>
    </div>
</nav>
