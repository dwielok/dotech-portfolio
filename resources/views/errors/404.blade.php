<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: linear-gradient(135deg,
                    #f8fafc 0%,
                    #f1f5f9 100%);
        }
    </style>
</head>

<body>

    <div class="min-h-screen flex items-center justify-center px-6">

        <div class="max-w-2xl mx-auto text-center">

            {{-- Icon --}}
            <div class="flex justify-center mb-8">
                <div class="w-28 h-28 rounded-full bg-red-50 flex items-center justify-center shadow-sm">

                    <svg class="w-14 h-14 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v3.75m0 3.75h.008v.008H12v-.008zm9-3.758a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>

                </div>
            </div>

            {{-- 404 --}}
            <h1 class="text-8xl md:text-9xl font-black text-gray-200 tracking-tight">
                404
            </h1>

            <h2 class="mt-4 text-3xl md:text-4xl font-bold text-gray-900">
                Halaman Tidak Ditemukan
            </h2>

            <p class="mt-4 text-lg text-gray-500 leading-relaxed max-w-xl mx-auto">
                Maaf, halaman yang Anda cari tidak tersedia,
                telah dipindahkan, atau URL yang dimasukkan tidak benar.
            </p>

            {{-- Buttons --}}
            <div class="mt-10 flex flex-col sm:flex-row justify-center gap-4">

                <a href="{{ url('/') }}"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-blue-600 text-white font-medium hover:bg-blue-700 transition shadow-sm">

                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955a1.125 1.125 0 011.591 0L21.75 12M4.5 9.75V19.5A1.5 1.5 0 006 21h4.5v-4.875A1.125 1.125 0 0111.625 15h.75A1.125 1.125 0 0113.5 16.125V21H18a1.5 1.5 0 001.5-1.5V9.75" />
                    </svg>

                    Kembali ke Beranda
                </a>

                <button onclick="history.back()"
                    class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-white border border-gray-200 text-gray-700 font-medium hover:bg-gray-50 transition shadow-sm">

                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor">

                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>

                    Halaman Sebelumnya
                </button>

            </div>

            {{-- Quick Links --}}
            <div class="mt-14 border-t border-gray-200 pt-8">

                <p class="text-sm text-gray-400 mb-4">
                    Atau kunjungi halaman berikut:
                </p>

                <div class="flex flex-wrap justify-center gap-3">

                    <a href="/"
                        class="px-4 py-2 rounded-lg bg-white border border-gray-200 hover:border-blue-500 hover:text-blue-600 transition">
                        Beranda
                    </a>

                    <a href="/services"
                        class="px-4 py-2 rounded-lg bg-white border border-gray-200 hover:border-blue-500 hover:text-blue-600 transition">
                        Layanan
                    </a>

                    <a href="/projects"
                        class="px-4 py-2 rounded-lg bg-white border border-gray-200 hover:border-blue-500 hover:text-blue-600 transition">
                        Proyek
                    </a>

                    <a href="/contact"
                        class="px-4 py-2 rounded-lg bg-white border border-gray-200 hover:border-blue-500 hover:text-blue-600 transition">
                        Kontak
                    </a>

                </div>

            </div>

            {{-- Footer --}}
            <div class="mt-12 text-sm text-gray-400">
                © {{ date('Y') }} {{ config('app.name') }}
            </div>

        </div>

    </div>

</body>

</html>
