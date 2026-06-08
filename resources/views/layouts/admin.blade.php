<!DOCTYPE html>
<html lang="id" class="h-full bg-gradient-to-br from-gray-50 to-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Dotech Panel</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="h-full font-jakarta antialiased" x-data="{ sidebarOpen: false }">

<div class="flex h-full">
    {{-- ── Sidebar ── --}}
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-[#0A1128] via-[#0F1A3A] to-[#0A1128] text-white flex flex-col
                  lg:relative lg:translate-x-0 transition-all duration-300 shadow-2xl">

        {{-- Brand with gradient accent --}}
        <div class="flex items-center gap-3 px-6 h-20 border-b border-white/10 flex-shrink-0 bg-gradient-to-r from-dotech-blue/20 to-transparent">
            <div class="w-10 h-10 bg-gradient-to-br from-dotech-blue to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                <i class="fas fa-code text-white text-lg"></i>
            </div>
            <div>
                <img src="{{ asset('images/logo_dotech.png') }}" alt="Dotech" class="h-7 w-auto brightness-200">
                <p class="text-[10px] text-blue-300/70 mt-0.5">Admin Panel</p>
            </div>
        </div>

        {{-- Navigation --}}
        <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
            @php
            $navItems = [
                ['route' => 'admin.dashboard',      'icon' => 'fas fa-chart-pie', 'label' => 'Dashboard', 'badge' => false],
                ['route' => 'admin.hero-sections.index', 'icon' => 'fas fa-display', 'label' => 'Hero Section', 'badge' => false],
                ['route' => 'admin.about-us.index', 'icon' => 'fas fa-building', 'label' => 'About Us', 'badge' => false],
                ['route' => 'admin.projects.index', 'icon' => 'fas fa-folder-tree', 'label' => 'Proyek', 'badge' => false],
                ['route' => 'admin.services.index', 'icon' => 'fas fa-cogs', 'label' => 'Layanan', 'badge' => false],
                ['route' => 'admin.testimonials.index', 'icon' => 'fas fa-star', 'label' => 'Testimonial', 'badge' => false],
                ['route' => 'admin.contact-info.index', 'icon' => 'fas fa-address-card', 'label' => 'Kontak Info', 'badge' => false],
                ['route' => 'admin.social-links.index', 'icon' => 'fas fa-share-alt', 'label' => 'Social Links', 'badge' => false],
                ['route' => 'admin.messages.index', 'icon' => 'fas fa-envelope', 'label' => 'Pesan Masuk', 'badge' => true],
                ['route' => 'admin.users.index',   'icon' => 'fas fa-users', 'label' => 'Users', 'badge' => false],
            ];
            @endphp

            @foreach($navItems as $item)
            @php
                $active = request()->routeIs($item['route'] . '*');
                $unread = $item['badge'] ? \App\Models\ContactMessage::unread()->count() : 0;
            @endphp
            <a href="{{ route($item['route']) }}"
               class="{{ $active ? 'bg-gradient-to-r from-dotech-blue to-blue-700 text-white shadow-lg' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}
                      flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group">
                <i class="{{ $item['icon'] }} text-base w-5 {{ $active ? 'text-white' : 'text-gray-400 group-hover:text-white transition' }}"></i>
                <span class="flex-1">{{ $item['label'] }}</span>
                @if($unread > 0)
                <span class="bg-red-500 text-white text-xs font-bold rounded-full min-w-[20px] h-5 px-1.5 flex items-center justify-center shadow-md">
                    {{ $unread > 9 ? '9+' : $unread }}
                </span>
                @endif
            </a>
            @endforeach
        </nav>

        {{-- User info with gradient --}}
        <div class="px-4 py-5 border-t border-white/10 flex-shrink-0 bg-gradient-to-t from-blue-900/20 to-transparent">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-dotech-blue to-blue-600 flex items-center justify-center text-sm font-bold flex-shrink-0 shadow-lg">
                    <i class="fas fa-user-cog text-white text-sm"></i>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</div>
                    <div class="text-xs text-blue-300 truncate flex items-center gap-1">
                        <i class="fas fa-envelope text-[10px]"></i>
                        {{ auth()->user()->email }}
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-8 h-8 rounded-lg bg-white/10 hover:bg-red-500/80 text-gray-400 hover:text-white transition-all duration-200 flex items-center justify-center" title="Logout">
                        <i class="fas fa-sign-out-alt text-sm"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Overlay --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/60 backdrop-blur-sm z-40 lg:hidden" x-transition></div>

    {{-- ── Main Content ── --}}
    <div class="flex-1 flex flex-col min-h-screen min-w-0 bg-gradient-to-br from-gray-50 to-gray-100">

        {{-- Top Bar --}}
        <header class="h-16 bg-white/80 backdrop-blur-md border-b border-gray-200 flex items-center px-6 gap-4 flex-shrink-0 sticky top-0 z-30 shadow-sm">
            <button @click="sidebarOpen = true" class="lg:hidden w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition flex items-center justify-center">
                <i class="fas fa-bars text-sm"></i>
            </button>

            <div class="flex-1">
                <div class="flex items-center gap-2">
                    <i class="fas fa-tachometer-alt text-dotech-blue text-sm"></i>
                    <h1 class="text-lg font-bold text-gray-800">@yield('title', 'Dashboard')</h1>
                </div>
            </div>

            <div class="flex items-center gap-3">
                {{-- Quick Actions Dropdown --}}
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition flex items-center justify-center">
                        <i class="fas fa-plus text-sm"></i>
                    </button>
                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50" x-cloak>
                        <a href="{{ route('admin.projects.create') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-folder-open text-dotech-blue text-xs w-4"></i> Tambah Proyek
                        </a>
                        <a href="{{ route('admin.services.create') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-cog text-emerald-500 text-xs w-4"></i> Tambah Layanan
                        </a>
                        <a href="{{ route('admin.testimonials.create') }}" class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                            <i class="fas fa-star text-amber-500 text-xs w-4"></i> Tambah Testimoni
                        </a>
                    </div>
                </div>

                {{-- Notification Bell --}}
                @php $unreadMessages = \App\Models\ContactMessage::unread()->count(); @endphp
                <a href="{{ route('admin.messages.index') }}" class="relative w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition flex items-center justify-center">
                    <i class="fas fa-bell text-sm"></i>
                    @if($unreadMessages > 0)
                    <span class="absolute -top-1 -right-1 w-4 h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center shadow-md">
                        {{ $unreadMessages > 9 ? '9+' : $unreadMessages }}
                    </span>
                    @endif
                </a>

                {{-- View Website --}}
                <a href="{{ route('home') }}" target="_blank"
                   class="text-sm text-gray-600 hover:text-dotech-blue flex items-center gap-1.5 transition-colors px-3 py-1.5 rounded-lg hover:bg-gray-100">
                    <i class="fas fa-external-link-alt text-xs"></i>
                    <span class="hidden sm:inline">Lihat Website</span>
                </a>
            </div>
        </header>

        {{-- Breadcrumb & Page Content --}}
        <main class="flex-1 p-6 overflow-auto">
            {{-- Breadcrumb Navigation --}}
            <div class="mb-5 flex items-center gap-2 text-sm">
                <i class="fas fa-home text-gray-400 text-xs"></i>
                <span class="text-gray-400">/</span>
                <span class="text-gray-600 font-medium">@yield('title', 'Dashboard')</span>
            </div>

            {{-- Flash Messages with Icons --}}
            @if(session('success'))
            <div class="mb-5 bg-green-50 border-l-4 border-green-500 text-green-700 px-5 py-3.5 rounded-r-xl flex items-center gap-3 text-sm shadow-sm">
                <i class="fas fa-check-circle text-green-500 text-lg"></i>
                <span>{{ session('success') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-green-500 hover:text-green-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            @if(session('error'))
            <div class="mb-5 bg-red-50 border-l-4 border-red-500 text-red-700 px-5 py-3.5 rounded-r-xl flex items-center gap-3 text-sm shadow-sm">
                <i class="fas fa-exclamation-triangle text-red-500 text-lg"></i>
                <span>{{ session('error') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-red-500 hover:text-red-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

<style>
    /* Smooth transitions and custom scrollbar */
    [x-cloak] { display: none !important; }

    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb {
        background: #c1c1c1;
        border-radius: 10px;
    }
    ::-webkit-scrollbar-thumb:hover {
        background: #a8a8a8;
    }

    /* Sidebar custom scroll */
    nav.overflow-y-auto::-webkit-scrollbar {
        width: 3px;
    }
    nav.overflow-y-auto::-webkit-scrollbar-track {
        background: rgba(255,255,255,0.05);
    }
    nav.overflow-y-auto::-webkit-scrollbar-thumb {
        background: rgba(255,255,255,0.2);
    }

    /* Animation for sidebar items */
    nav a {
        position: relative;
        overflow: hidden;
    }
    nav a::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 0;
        height: 100%;
        background: linear-gradient(90deg, rgba(59,130,246,0.1), transparent);
        transition: width 0.3s ease;
    }
    nav a:hover::before {
        width: 100%;
    }
</style>

@stack('scripts')
</body>
</html>
