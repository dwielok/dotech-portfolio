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
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
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
    @if (session('success'))
        <div id="toast"
            class="fixed bottom-6 right-6 z-50 bg-green-600 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 animate-slide-up">
            <svg class="w-5 h-5 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
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
