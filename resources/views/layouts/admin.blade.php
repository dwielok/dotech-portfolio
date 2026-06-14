<!DOCTYPE html>
<html lang="id" class="h-full bg-gradient-to-br from-gray-50 to-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin') — Dotech Panel</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin">
    </script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <style>
        /* Line clamp for notification content */
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Smooth notification item transitions */
        .notification-item {
            position: relative;
            transition: all 0.2s ease;
        }

        /* Custom scrollbar for notifications dropdown */
        .max-h-\[480px\]::-webkit-scrollbar {
            width: 4px;
        }

        .max-h-\[480px\]::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }

        .max-h-\[480px\]::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 10px;
        }

        .max-h-\[480px\]::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Pulse animation for unread indicator */
        @keyframes pulse-ring {
            0% {
                transform: scale(0.33);
            }

            80%,
            100% {
                opacity: 0;
            }
        }

        .animate-ping {
            animation: pulse-ring 1.25s cubic-bezier(0.215, 0.61, 0.355, 1) infinite;
        }

        /* Toast animation */
        @keyframes slideInRight {
            from {
                transform: translateX(100%);
                opacity: 0;
            }

            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .toast-slide-in {
            animation: slideInRight 0.3s ease-out;
        }
    </style>
</head>

<body class="h-full font-jakarta antialiased" x-data="{ sidebarOpen: false }">

    <div class="flex h-full">
        {{-- ── Sidebar ── --}}
        <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-[#0A1128] via-[#0F1A3A] to-[#0A1128] text-white flex flex-col
                  lg:relative lg:translate-x-0 transition-all duration-300 shadow-2xl">

            {{-- Brand with gradient accent --}}
            <div
                class="flex items-center gap-3 px-6 h-20 border-b border-white/10 flex-shrink-0 bg-gradient-to-r from-dotech-blue/20 to-transparent">
                <div
                    class="w-10 h-10 bg-gradient-to-br from-dotech-blue to-blue-600 rounded-xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-code text-white text-lg"></i>
                </div>
                <div>
                    <h1 class="text-large font-extrabold tracking-tight text-white">
                        Dotech
                    </h1>
                    <p class="text-[10px] text-blue-300/70 mt-0.5">Admin Panel</p>
                </div>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-6 space-y-1.5 overflow-y-auto">
                @php
                    $navItems = [
                        [
                            'route' => 'admin.dashboard',
                            'icon' => 'fas fa-chart-pie',
                            'label' => 'Dashboard',
                            'badge' => false,
                        ],
                        [
                            'route' => 'admin.projects.index',
                            'icon' => 'fas fa-folder-tree',
                            'label' => 'Proyek',
                            'badge' => false,
                        ],
                        [
                            'route' => 'admin.services.index',
                            'icon' => 'fas fa-cogs',
                            'label' => 'Layanan',
                            'badge' => false,
                        ],
                        [
                            'route' => 'admin.testimonials.index',
                            'icon' => 'fas fa-star',
                            'label' => 'Testimonial',
                            'badge' => false,
                        ],
                        [
                            'route' => 'admin.messages.index',
                            'icon' => 'fas fa-envelope',
                            'label' => 'Pesan Masuk',
                            'badge' => \App\Models\ContactMessage::unread()->count(),
                        ],
                        [
                            'route' => 'admin.users.index',
                            'icon' => 'fas fa-users',
                            'label' => 'Users',
                            'badge' => false,
                        ],
                        // Merged Site Settings inside navItems
                        // [
                        //     'icon' => 'fas fa-cog',
                        //     'label' => 'Site Settings',
                        //     'badge' => false,
                        //     'children' => [
                        //         [
                        //             'route' => 'admin.hero-sections.index',
                        //             'icon' => 'fas fa-tv',
                        //             'label' => 'Hero Section',
                        //         ],
                        //         ['route' => 'admin.about-us.index', 'icon' => 'fas fa-building', 'label' => 'About Us'],
                        //         [
                        //             'route' => 'admin.contact-info.index',
                        //             'icon' => 'fas fa-address-card',
                        //             'label' => 'Kontak Info',
                        //         ],
                        //         [
                        //             'route' => 'admin.social-links.index',
                        //             'icon' => 'fas fa-share-alt',
                        //             'label' => 'Social Links',
                        //         ],
                        //     ],
                        // ],
                        // Replace the Site Settings dropdown section with:
                        [
                            'route' => 'admin.site-settings.index',
                            'icon' => 'fas fa-code',
                            'label' => 'Pengaturan Website',
                            'badge' => false,
                        ],
                    ];
                @endphp

                @foreach ($navItems as $item)
                    @if (isset($item['children']))
                        {{-- Dropdown Group --}}
                        @php
                            // Check if any child route is currently active
                            $isGroupActive = collect($item['children'])->contains(function ($child) {
                                return request()->routeIs($child['route'] . '*');
                            });
                        @endphp

                        <div x-data="{ open: {{ $isGroupActive ? 'true' : 'false' }} }" class="mt-1">
                            {{-- Dropdown Toggle Button --}}
                            <button @click="open = !open"
                                class="w-full flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group {{ $isGroupActive ? 'text-white' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}">
                                <i
                                    class="{{ $item['icon'] }} text-base w-5 {{ $isGroupActive ? 'text-white' : 'text-gray-400 group-hover:text-white transition' }}"></i>
                                <span class="flex-1 text-left">{{ $item['label'] }}</span>
                                <i class="fas fa-chevron-down text-xs transition-transform duration-200"
                                    :class="{ 'rotate-180': open }"></i>
                            </button>

                            {{-- Dropdown Menu Items --}}
                            <div x-show="open" x-cloak x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform -translate-y-2"
                                x-transition:enter-end="opacity-100 transform translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform translate-y-0"
                                x-transition:leave-end="opacity-0 transform -translate-y-2"
                                class="ml-4 mt-1 space-y-1 border-l border-white/10 pl-3">

                                @foreach ($item['children'] as $child)
                                    @php
                                        $active = request()->routeIs($child['route'] . '*');
                                    @endphp
                                    <a href="{{ route($child['route']) }}"
                                        class="{{ $active ? 'bg-gradient-to-r from-dotech-blue to-blue-700 text-white shadow-lg' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}
                            flex items-center gap-3 px-4 py-2.5 rounded-lg text-sm font-medium transition-all duration-200 group">
                                        <i
                                            class="{{ $child['icon'] }} text-sm w-5 {{ $active ? 'text-white' : 'text-gray-400 group-hover:text-white transition' }}"></i>
                                        <span class="flex-1">{{ $child['label'] }}</span>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @else
                        {{-- Standard Nav Link --}}
                        @php
                            $active = request()->routeIs($item['route'] . '*');
                            $badge = $item['badge'] ?: 0;
                        @endphp
                        <a href="{{ route($item['route']) }}"
                            class="{{ $active ? 'bg-gradient-to-r from-dotech-blue to-blue-700 text-white shadow-lg' : 'text-gray-400 hover:bg-white/10 hover:text-white' }}
                flex items-center gap-3 px-4 py-3 rounded-xl text-sm font-medium transition-all duration-200 group">
                            <i
                                class="{{ $item['icon'] }} text-base w-5 {{ $active ? 'text-white' : 'text-gray-400 group-hover:text-white transition' }}"></i>
                            <span class="flex-1">{{ $item['label'] }}</span>
                            @if ($badge > 0)
                                <span
                                    class="bg-red-500 text-white text-xs font-bold rounded-full min-w-[20px] h-5 px-1.5 flex items-center justify-center shadow-md">
                                    {{ $badge > 9 ? '9+' : $badge }}
                                </span>
                            @endif
                        </a>
                    @endif
                @endforeach
            </nav>

            {{-- User info with gradient --}}
            <div
                class="px-4 py-5 border-t border-white/10 flex-shrink-0 bg-gradient-to-t from-blue-900/20 to-transparent">
                <div class="flex items-center gap-3">
                    <div
                        class="w-10 h-10 rounded-xl bg-gradient-to-br from-dotech-blue to-blue-600 flex items-center justify-center text-sm font-bold flex-shrink-0 shadow-lg">
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
                        <button type="submit"
                            class="w-8 h-8 rounded-lg bg-white/10 hover:bg-red-500/80 text-gray-400 hover:text-white transition-all duration-200 flex items-center justify-center"
                            title="Logout">
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
            <header
                class="h-16 bg-white/80 backdrop-blur-md border-b border-gray-200 flex items-center px-6 gap-4 flex-shrink-0 sticky !top-0 z-30 shadow-sm">
                <button @click="sidebarOpen = true"
                    class="lg:hidden w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition flex items-center justify-center">
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
                        <button @click="open = !open"
                            class="w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition flex items-center justify-center">
                            <i class="fas fa-plus text-sm"></i>
                        </button>
                        <div x-show="open" @click.away="open = false"
                            class="absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg border border-gray-100 py-2 z-50"
                            x-cloak>
                            <a href="{{ route('admin.projects.create') }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-folder-open text-dotech-blue text-xs w-4"></i> Tambah Proyek
                            </a>
                            <a href="{{ route('admin.services.create') }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-cog text-emerald-500 text-xs w-4"></i> Tambah Layanan
                            </a>
                            <a href="{{ route('admin.testimonials.create') }}"
                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                <i class="fas fa-star text-amber-500 text-xs w-4"></i> Tambah Testimoni
                            </a>
                        </div>
                    </div>

                    {{-- Real Notification Bell with Dropdown --}}
                    @php
                        $notifications = App\Models\Notification::whereNull('user_id')
                            ->orWhere('user_id', auth()->id())
                            ->latest()
                            ->take(10)
                            ->get();
                        $unreadCount = App\Models\Notification::whereNull('user_id')
                            ->orWhere('user_id', auth()->id())
                            ->unread()
                            ->count();
                    @endphp

                    <div x-data="{ open: false }" class="relative">
                        {{-- Notification Bell Button --}}
                        <button @click="open = !open" @click.away="open = false"
                            class="relative w-9 h-9 rounded-lg bg-gray-100 hover:bg-gray-200 text-gray-600 transition flex items-center justify-center focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <i class="fas fa-bell text-sm"></i>
                            @if ($unreadCount > 0)
                                <span
                                    class="absolute -top-1 -right-1 min-w-[16px] h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center px-1 shadow-md">
                                    {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                                </span>
                            @endif
                        </button>

                        {{-- Dropdown Panel --}}
                        <div x-show="open" x-transition:enter="transition ease-out duration-200"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100 transform translate-y-0"
                            x-transition:leave-end="opacity-0 transform -translate-y-2"
                            class="absolute right-0 mt-2 w-96 bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden z-50"
                            style="display: none;">

                            {{-- Header --}}
                            <div
                                class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-gradient-to-r from-gray-50 to-white">
                                <div class="flex items-center gap-2">
                                    <div class="w-7 h-7 bg-blue-100 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-bell text-blue-600 text-xs"></i>
                                    </div>
                                    <h3 class="font-semibold text-gray-800">Notifikasi</h3>
                                </div>
                                @if ($unreadCount > 0)
                                    <button onclick="markAllNotificationsAsRead()"
                                        class="text-xs text-dotech-blue hover:text-blue-700 font-medium transition-colors">
                                        Tandai semua dibaca
                                    </button>
                                @endif
                            </div>

                            {{-- Notifications List --}}
                            <div class="max-h-[480px] overflow-y-auto divide-y divide-gray-50">
                                @forelse($notifications as $notification)
                                    <div class="notification-item group {{ is_null($notification->read_at) ? 'bg-blue-50/20' : 'hover:bg-gray-50' }}"
                                        data-id="{{ $notification->id }}">
                                        <a href="{{ $notification->route_url ?? 'javascript:void(0)' }}"
                                            class="flex items-start gap-3 px-5 py-4 transition-colors block"
                                            onclick="markNotificationAsRead({{ $notification->id }})">
                                            {{-- Icon --}}
                                            <div class="flex-shrink-0">
                                                <div
                                                    class="w-10 h-10 rounded-xl {{ $notification->bg_color }} flex items-center justify-center">
                                                    <i
                                                        class="{{ $notification->icon }} {{ $notification->icon_color }} text-sm"></i>
                                                </div>
                                            </div>

                                            {{-- Content --}}
                                            <div class="flex-1 min-w-0">
                                                <div class="flex items-start justify-between gap-2">
                                                    <div class="flex-1">
                                                        <p
                                                            class="text-sm font-semibold {{ is_null($notification->read_at) ? 'text-gray-900' : 'text-gray-800' }}">
                                                            {{ $notification->title }}
                                                        </p>
                                                        <p class="text-xs text-gray-500 mt-0.5 line-clamp-2">
                                                            {{ $notification->content }}
                                                        </p>
                                                        <div class="flex items-center gap-2 mt-2">
                                                            <p class="text-xs text-gray-400">
                                                                {{ $notification->created_at->diffForHumans() }}
                                                            </p>
                                                            @if ($notification->priority === 'high')
                                                                <span
                                                                    class="text-[10px] px-1.5 py-0.5 rounded-full bg-red-100 text-red-600">
                                                                    Penting
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if (is_null($notification->read_at))
                                                        <div class="flex-shrink-0">
                                                            <span class="relative flex h-2 w-2 mt-1">
                                                                <span
                                                                    class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                                                                <span
                                                                    class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                                                            </span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </a>

                                        {{-- Actions on hover --}}
                                        @if (is_null($notification->read_at))
                                            <div
                                                class="absolute right-3 top-1/2 -translate-y-1/2 opacity-0 group-hover:opacity-100 transition-opacity">
                                                <button onclick="markNotificationAsRead({{ $notification->id }})"
                                                    class="p-1.5 text-gray-400 hover:text-blue-600 rounded-lg hover:bg-blue-50 transition-colors"
                                                    title="Tandai dibaca">
                                                    <i class="fas fa-check text-xs"></i>
                                                </button>
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <div class="flex flex-col items-center justify-center py-12 text-center">
                                        <div
                                            class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mb-3">
                                            <i class="fas fa-bell-slash text-gray-400 text-2xl"></i>
                                        </div>
                                        <p class="text-sm text-gray-500 font-medium">Tidak ada notifikasi</p>
                                        <p class="text-xs text-gray-400 mt-1">Notifikasi baru akan muncul di sini</p>
                                    </div>
                                @endforelse
                            </div>

                            {{-- Footer (if there are notifications) --}}
                            @if ($notifications->count() > 0)
                                <div class="border-t border-gray-100 px-5 py-3 bg-gray-50/50">
                                    <a href="{{ route('admin.notifications.index') }}"
                                        class="text-xs text-center block text-gray-500 hover:text-dotech-blue transition-colors">
                                        Lihat semua notifikasi
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>

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
                @if (session('success'))
                    <div
                        class="mb-5 bg-green-50 border-l-4 border-green-500 text-green-700 px-5 py-3.5 rounded-r-xl flex items-center gap-3 text-sm shadow-sm">
                        <i class="fas fa-check-circle text-green-500 text-lg"></i>
                        <span>{{ session('success') }}</span>
                        <button onclick="this.parentElement.remove()"
                            class="ml-auto text-green-500 hover:text-green-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif

                @if (session('error'))
                    <div
                        class="mb-5 bg-red-50 border-l-4 border-red-500 text-red-700 px-5 py-3.5 rounded-r-xl flex items-center gap-3 text-sm shadow-sm">
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
        [x-cloak] {
            display: none !important;
        }

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
            background: rgba(255, 255, 255, 0.05);
        }

        nav.overflow-y-auto::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
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
            background: linear-gradient(90deg, rgba(59, 130, 246, 0.1), transparent);
            transition: width 0.3s ease;
        }

        nav a:hover::before {
            width: 100%;
        }
    </style>

    @stack('scripts')
    <script>
        // Real notification functions
        function markNotificationAsRead(notificationId) {
            fetch(`/admin/notifications/${notificationId}/mark-as-read`, {
                    method: 'PATCH',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update UI
                        const notification = document.querySelector(`.notification-item[data-id="${notificationId}"]`);
                        if (notification) {
                            const unreadBadge = notification.querySelector('.relative.flex.h-2.w-2');
                            if (unreadBadge) {
                                unreadBadge.remove();
                            }
                            notification.classList.remove('bg-blue-50/20');
                            notification.classList.add('hover:bg-gray-50');

                            // Update text color
                            const titleElement = notification.querySelector('.text-sm.font-semibold');
                            if (titleElement) {
                                titleElement.classList.remove('text-gray-900');
                                titleElement.classList.add('text-gray-800');
                            }
                        }

                        // Update unread count
                        updateNotificationCount(-1);

                        // Show success toast
                        showToast('Notifikasi ditandai sebagai dibaca', 'success');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Terjadi kesalahan, silakan coba lagi', 'error');
                });
        }

        function markAllNotificationsAsRead() {
            fetch('{{ route('admin.notifications.mark-all-read') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Update all unread notifications in UI
                        const unreadNotifications = document.querySelectorAll(
                            '.notification-item .relative.flex.h-2.w-2');
                        unreadNotifications.forEach(badge => {
                            const notification = badge.closest('.notification-item');
                            if (notification) {
                                badge.remove();
                                notification.classList.remove('bg-blue-50/20');
                                notification.classList.add('hover:bg-gray-50');

                                const titleElement = notification.querySelector('.text-sm.font-semibold');
                                if (titleElement) {
                                    titleElement.classList.remove('text-gray-900');
                                    titleElement.classList.add('text-gray-800');
                                }
                            }
                        });

                        // Remove badge or update count to 0
                        const bellBadge = document.querySelector('.relative.w-9.h-9 .absolute');
                        if (bellBadge) {
                            bellBadge.remove();
                        }

                        showToast('Semua notifikasi telah ditandai sebagai dibaca', 'success');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Terjadi kesalahan, silakan coba lagi', 'error');
                });
        }

        function updateNotificationCount(change) {
            const bellBadge = document.querySelector('.relative.w-9.h-9 .absolute');
            if (bellBadge) {
                let currentCount = parseInt(bellBadge.textContent) || 0;
                let newCount = currentCount + change;

                if (newCount <= 0) {
                    bellBadge.remove();
                } else {
                    bellBadge.textContent = newCount > 9 ? '9+' : newCount;
                }
            }
        }

        // Toast notification helper
        function showToast(message, type = 'info') {
            // Remove existing toasts
            const existingToasts = document.querySelectorAll('.custom-toast');
            existingToasts.forEach(toast => toast.remove());

            const toast = document.createElement('div');
            toast.className = `custom-toast fixed bottom-4 right-4 px-4 py-3 rounded-xl shadow-lg z-50 toast-slide-in ${
                type === 'success' ? 'bg-green-500' : type === 'error' ? 'bg-red-500' : 'bg-blue-500'
            } text-white text-sm font-medium flex items-center gap-2`;

            const icon = type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' :
                'fa-info-circle';
            toast.innerHTML = `<i class="fas ${icon}"></i><span>${message}</span>`;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                toast.style.transition = 'all 0.3s ease-out';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Auto-refresh notifications count every 30 seconds
        setInterval(() => {
            fetch('{{ route('admin.notifications.unread-count') }}', {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    const bellBadge = document.querySelector('.relative.w-9.h-9 .absolute');
                    if (data.count > 0) {
                        if (bellBadge) {
                            bellBadge.textContent = data.count > 9 ? '9+' : data.count;
                        } else {
                            // Re-add badge if not exists
                            const bellButton = document.querySelector('.relative.w-9.h-9');
                            if (bellButton) {
                                const badge = document.createElement('span');
                                badge.className =
                                    'absolute -top-1 -right-1 min-w-[16px] h-4 bg-red-500 text-white text-[9px] font-bold rounded-full flex items-center justify-center px-1 shadow-md';
                                badge.textContent = data.count > 9 ? '9+' : data.count;
                                bellButton.appendChild(badge);
                            }
                        }
                    } else if (bellBadge) {
                        bellBadge.remove();
                    }
                })
                .catch(error => console.error('Error fetching notification count:', error));
        }, 30000);
    </script>
</body>

</html>
