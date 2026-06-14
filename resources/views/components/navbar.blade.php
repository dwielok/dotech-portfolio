@php
    $siteIdentity = \App\Models\SiteIdentity::getInstance();
@endphp

<nav x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
    :class="scrolled ? 'bg-white/95 backdrop-blur-md shadow-md' : 'bg-transparent'"
    class="fixed top-0 left-0 right-0 z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 lg:h-20">

            {{-- Logo with conditional based on scroll --}}
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                {{-- Logo Dark (for scrolled/light background) --}}
                <img x-show="scrolled"
                    src="{{ $siteIdentity && $siteIdentity->logo_dark_url ? $siteIdentity->logo_dark_url : asset('images/logo_dotech.png') }}"
                    alt="{{ $siteIdentity->logo_alt ?? ($siteIdentity->site_name ?? 'Logo') }}" class="h-10 w-auto"
                    style="display: none;">

                {{-- Logo Light (for transparent/white background) --}}
                <img x-show="!scrolled"
                    src="{{ $siteIdentity && $siteIdentity->logo_light_url ? $siteIdentity->logo_light_url : asset('images/logo_dotech_white.png') }}"
                    alt="{{ $siteIdentity->logo_alt ?? ($siteIdentity->site_name ?? 'Logo') }}" class="h-10 w-auto"
                    style="display: none;">

                {{-- Site Name --}}
                @if ($siteIdentity && $siteIdentity->site_name)
                    <span :class="scrolled ? 'text-gray-800' : 'text-white'"
                        class="font-bold text-xl hidden sm:inline transition-colors duration-300">
                        {{ $siteIdentity->site_name }}
                    </span>
                @endif
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden lg:flex items-center gap-8">
                @php
                    $navbarLinks = collect($siteIdentity->formatted_navbar_links ?? []);

                    $navbarLinksWithoutContact = $navbarLinks->reject(function ($link) {
                        return strtolower($link['label'] ?? '') === 'contact' ||
                            strtolower($link['label'] ?? '') === 'kontak';
                    });
                @endphp

                @foreach ($navbarLinksWithoutContact as $link)
                    @if ($link['is_active'])
                        <a href="{{ $link['url'] }}" target="{{ $link['target'] }}"
                            :class="scrolled ? 'text-gray-700 hover:text-dotech-blue' : 'text-white hover:text-blue-200'"
                            class="nav-link transition-colors duration-300 {{ request()->url() === $link['url'] || request()->routeIs($link['route_name'] ?? '') ? 'active' : '' }}">
                            {{ $link['label'] }}
                        </a>
                    @endif
                @endforeach

                {{-- Special Contact Button (if exists in navbar or as separate CTA) --}}
                @php
                    $contactLink = $navbarLinks->first(function ($link) {
                        return strtolower($link['label'] ?? '') === 'contact' ||
                            strtolower($link['label'] ?? '') === 'kontak';
                    });
                @endphp

                @if ($contactLink && $contactLink['is_active'])
                    <a href="{{ $contactLink['url'] }}" target="{{ $contactLink['target'] }}"
                        class="btn-primary text-sm px-5 py-2.5 inline-flex items-center gap-2">
                        <i class="fas fa-headset text-sm"></i>
                        {{ $contactLink['label'] }}
                    </a>
                @else
                    <a href="{{ route('contact') }}"
                        class="btn-primary text-sm px-5 py-2.5 inline-flex items-center gap-2">
                        <i class="fas fa-headset text-sm"></i>
                        Hubungi Kami
                    </a>
                @endif
            </div>

            {{-- Search Button (Optional) --}}
            @if ($siteIdentity && $siteIdentity->show_search)
                <button @click="$dispatch('open-search')"
                    :class="scrolled ? 'text-gray-600 hover:bg-gray-100' : 'text-white hover:bg-white/10'"
                    class="hidden lg:flex items-center justify-center w-9 h-9 rounded-lg transition-all duration-200">
                    <i class="fas fa-search text-sm"></i>
                </button>
            @endif

            {{-- Mobile Hamburger Button --}}
            <button @click="open = !open"
                :class="scrolled ? 'text-gray-700 hover:bg-gray-100' : 'text-white hover:bg-white/10'"
                class="lg:hidden p-2 rounded-lg transition-all duration-200">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="open" x-transition class="lg:hidden pb-4 border-t border-gray-100" style="display: none;">
            <div class="flex flex-col gap-2 pt-4">
                @foreach ($navbarLinks as $link)
                    @if ($link['is_active'])
                        <a href="{{ $link['url'] }}" target="{{ $link['target'] }}"
                            class="mobile-nav-link {{ request()->url() === $link['url'] ? 'active' : '' }}
                                  {{ $link['target'] === '_blank' ? 'inline-flex items-center gap-2' : '' }}"
                            @click="open = false">
                            @if ($link['icon'])
                                <i class="{{ $link['icon'] }} text-sm w-5"></i>
                            @endif
                            {{ $link['label'] }}
                            @if ($link['target'] === '_blank')
                                <i class="fas fa-external-link-alt text-xs opacity-70"></i>
                            @endif
                        </a>
                    @endif
                @endforeach

                {{-- Search in mobile (if enabled) --}}
                @if ($siteIdentity && $siteIdentity->show_search)
                    <button @click="$dispatch('open-search'); open = false"
                        class="mobile-nav-link text-left inline-flex items-center gap-2">
                        <i class="fas fa-search w-5"></i>
                        Cari
                    </button>
                @endif

                {{-- Contact Button in Mobile --}}
                @php
                    $contactLink = $navbarLinks->first(function ($link) {
                        return strtolower($link['label'] ?? '') === 'contact' ||
                            strtolower($link['label'] ?? '') === 'kontak';
                    });
                @endphp
                @if ($contactLink && $contactLink['is_active'])
                    <a href="{{ $contactLink['url'] }}" target="{{ $contactLink['target'] }}"
                        class="btn-primary text-center mt-2 inline-flex items-center justify-center gap-2"
                        @click="open = false">
                        <i class="fas fa-headset text-sm"></i>
                        {{ $contactLink['label'] }}
                    </a>
                @else
                    <a href="{{ route('contact') }}" class="btn-primary text-center mt-2" @click="open = false">
                        Hubungi Kami
                    </a>
                @endif
            </div>
        </div>
    </div>
</nav>

{{-- Additional CSS for nav-link styling --}}
<style>
    .nav-link {
        @apply transition-all duration-200 font-medium relative py-2;
    }

    .nav-link.active {
        @apply text-dotech-blue;
    }

    /* When scrolled, active state has underline */
    .nav-link.active::after {
        content: '';
        @apply absolute bottom-0 left-0 right-0 h-0.5 bg-gradient-to-r from-dotech-blue to-blue-600 rounded-full;
        animation: slideIn 0.3s ease-out;
    }

    .mobile-nav-link {
        @apply block px-4 py-3 text-gray-700 hover:bg-gray-50 hover:text-dotech-blue rounded-xl transition-all duration-200;
    }

    .mobile-nav-link.active {
        @apply bg-blue-50 text-dotech-blue font-medium;
    }

    @keyframes slideIn {
        from {
            transform: scaleX(0);
            opacity: 0;
        }

        to {
            transform: scaleX(1);
            opacity: 1;
        }
    }

    .btn-primary {
        @apply bg-gradient-to-r from-dotech-blue to-blue-600 hover:from-blue-700 hover:to-blue-700 text-white font-semibold px-6 py-2.5 rounded-xl transition-all duration-200 shadow-md hover:shadow-lg hover:-translate-y-0.5;
    }
</style>

@push('scripts')
    <script>
        // Handle active state for dynamic routes
        document.addEventListener('DOMContentLoaded', function() {
            const currentUrl = window.location.pathname;
            document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(link => {
                const href = link.getAttribute('href');
                if (href && href !== '#' && href !== '/') {
                    if (currentUrl === href || (href !== '/' && currentUrl.startsWith(href))) {
                        link.classList.add('active');
                    }
                } else if (href === '/' && currentUrl === '/') {
                    link.classList.add('active');
                }
            });
        });
    </script>
@endpush
