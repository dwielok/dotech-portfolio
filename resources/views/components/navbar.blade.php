<nav x-data="{ open: false, scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 20 })"
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
                <a href="{{ route('home') }}"
                    class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('about') }}"
                    class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang Kami</a>
                <a href="{{ route('projects.index') }}"
                    class="nav-link {{ request()->routeIs('projects*') ? 'active' : '' }}">Proyek</a>
                <a href="{{ route('contact') }}" class="btn-primary text-sm px-5 py-2.5">Hubungi Kami</a>
            </div>

            {{-- Mobile Hamburger --}}
            <button @click="open = !open" class="lg:hidden p-2 rounded-lg text-gray-700 hover:bg-gray-100">
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
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
