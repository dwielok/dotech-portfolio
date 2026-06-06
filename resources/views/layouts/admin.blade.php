<!DOCTYPE html>
<html lang="id" class="h-full bg-gray-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Dotech Panel</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full font-jakarta" x-data="{ sidebarOpen: false }">

<div class="flex h-full">
    {{-- ── Sidebar ── --}}
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed inset-y-0 left-0 z-50 w-64 bg-dotech-dark text-white flex flex-col
                  lg:relative lg:translate-x-0 transition-transform duration-300">

        {{-- Brand --}}
        <div class="flex items-center gap-3 px-6 h-16 border-b border-white/10 flex-shrink-0">
            <img src="{{ asset('images/logo_dotech.png') }}" alt="Dotech" class="h-8 w-auto brightness-200">
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 space-y-1 overflow-y-auto">
            @php
            $navItems = [
                ['route' => 'admin.dashboard',      'icon' => '📊', 'label' => 'Dashboard'],
                ['route' => 'admin.hero-sections.index', 'icon' => '🖼️', 'label' => 'Hero Section'],
                ['route' => 'admin.about-us.index', 'icon' => 'ℹ️', 'label' => 'About Us'],
                ['route' => 'admin.projects.index', 'icon' => '🗂️', 'label' => 'Proyek'],
                ['route' => 'admin.services.index', 'icon' => '⚙️', 'label' => 'Layanan'],
                ['route' => 'admin.testimonials.index', 'icon' => '💬', 'label' => 'Testimonial'],
                ['route' => 'admin.contact-info.index', 'icon' => '📍', 'label' => 'Kontak Info'],
                ['route' => 'admin.social-links.index', 'icon' => '🔗', 'label' => 'Social Links'],
                ['route' => 'admin.messages.index', 'icon' => '✉️', 'label' => 'Pesan Masuk'],
                ['route' => 'admin.users.index',   'icon' => '👥', 'label' => 'Users'],
            ];
            @endphp

            @foreach($navItems as $item)
            @php $active = request()->routeIs($item['route'] . '*'); @endphp
            <a href="{{ route($item['route']) }}"
               class="{{ $active ? 'bg-dotech-blue text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}
                      flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200">
                <span class="text-base">{{ $item['icon'] }}</span>
                <span>{{ $item['label'] }}</span>
                @if($item['route'] === 'admin.messages.index')
                @php $unread = \App\Models\ContactMessage::unread()->count(); @endphp
                @if($unread > 0)
                <span class="ml-auto bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">
                    {{ $unread > 9 ? '9+' : $unread }}
                </span>
                @endif
                @endif
            </a>
            @endforeach
        </nav>

        {{-- User info --}}
        <div class="px-4 py-4 border-t border-white/10 flex-shrink-0">
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 rounded-full bg-dotech-blue flex items-center justify-center text-sm font-bold flex-shrink-0">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-gray-400 truncate">{{ auth()->user()->email }}</div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-400 transition-colors" title="Logout">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Overlay --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/50 z-40 lg:hidden" x-transition></div>

    {{-- ── Main ── --}}
    <div class="flex-1 flex flex-col min-h-screen min-w-0">

        {{-- Top Bar --}}
        <header class="h-16 bg-white border-b border-gray-100 flex items-center px-6 gap-4 flex-shrink-0">
            <button @click="sidebarOpen = true" class="lg:hidden p-2 -ml-2 text-gray-500 hover:text-gray-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>
            <div class="flex-1">
                <h1 class="text-lg font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
            </div>
            <a href="{{ route('home') }}" target="_blank"
               class="text-sm text-gray-500 hover:text-dotech-blue flex items-center gap-1.5 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                </svg>
                Lihat Website
            </a>
        </header>

        {{-- Breadcrumb & Page Content --}}
        <main class="flex-1 p-6 overflow-auto">

            {{-- Flash Messages --}}
            @if(session('success'))
            <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl flex items-center gap-2 text-sm">
                ✅ {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl flex items-center gap-2 text-sm">
                ❌ {{ session('error') }}
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
