@extends('layouts.app')

@section('title', 'Hubungi Kami — PT Dotech Digital Solution')

@section('content')
    <div class="pt-20">
        {{-- Hero Section with Animations --}}
        <div class="relative bg-gradient-to-br from-dotech-dark via-blue-900 to-blue-950 text-white overflow-hidden">
            {{-- Animated Background Grid --}}
            <div class="absolute inset-0 opacity-10">
                <div class="absolute inset-0"
                    style="background-image: radial-gradient(circle at 2px 2px, rgba(255,255,255,0.3) 1px, transparent 0); background-size: 40px 40px;">
                </div>
            </div>

            {{-- Animated Gradient Orbs --}}
            <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-blue-500/30 rounded-full blur-3xl animate-pulse-slow"></div>
            <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-indigo-500/20 rounded-full blur-3xl animate-pulse-slower"
                style="animation-delay: 2s;"></div>
            <div
                class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-cyan-500/10 rounded-full blur-3xl animate-float">
            </div>

            {{-- Floating Tech Icons --}}
            <div class="absolute top-20 left-10 opacity-20 animate-float-slow hidden lg:block">
                <i class="fab fa-whatsapp text-6xl text-green-400"></i>
            </div>
            <div class="absolute bottom-20 right-10 opacity-20 animate-float-reverse hidden lg:block">
                <i class="fas fa-envelope text-6xl text-blue-400"></i>
            </div>
            <div class="absolute top-1/3 right-20 opacity-15 animate-pulse-slow hidden lg:block">
                <i class="fab fa-instagram text-5xl text-pink-400"></i>
            </div>
            <div class="absolute bottom-1/3 left-20 opacity-15 animate-float hidden lg:block">
                <i class="fab fa-linkedin text-5xl text-blue-500"></i>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 lg:py-28">
                <div class="text-center">
                    {{-- Animated Badge --}}
                    <div
                        class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm border border-white/20 rounded-full px-4 py-1.5 mb-6 animate-slide-down">
                        <span class="relative flex h-2 w-2">
                            <span
                                class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                        </span>
                        <i class="fas fa-headset text-xs text-blue-300"></i>
                        <span class="text-blue-200 text-sm font-medium tracking-wide">Konsultasi Gratis</span>
                        <span class="text-blue-300/50 text-xs">✦ 24/7 Support</span>
                    </div>

                    {{-- Main Heading --}}
                    <h1
                        class="text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-extrabold text-white leading-tight mb-6 animate-fade-in-up">
                        <span
                            class="bg-gradient-to-r from-blue-400 via-cyan-400 to-blue-500 bg-clip-text text-transparent">Hubungi</span>
                        Kami
                    </h1>

                    <p
                        class="text-lg md:text-xl text-blue-100 max-w-2xl mx-auto leading-relaxed animate-fade-in-up animation-delay-200">
                        Kami siap membantu mewujudkan ide digital Anda menjadi kenyataan. Konsultasikan kebutuhan Anda
                        sekarang!
                    </p>

                    {{-- Stats Row --}}
                    <div class="flex flex-wrap justify-center gap-8 mt-10 animate-fade-in-up animation-delay-400">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-blue-500/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-clock text-blue-400 text-sm"></i>
                            </div>
                            <div>
                                <span class="text-white font-bold">24/7</span>
                                <span class="text-gray-400 text-xs block">Support</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-green-500/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-hourglass-half text-green-400 text-sm"></i>
                            </div>
                            <div>
                                <span class="text-white font-bold">&lt; 24 Jam</span>
                                <span class="text-gray-400 text-xs block">Respon Cepat</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 bg-purple-500/20 rounded-full flex items-center justify-center">
                                <i class="fas fa-handshake text-purple-400 text-sm"></i>
                            </div>
                            <div>
                                <span class="text-white font-bold">100%</span>
                                <span class="text-gray-400 text-xs block">Gratis Konsultasi</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Scroll Indicator --}}
            <div
                class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-400 animate-bounce-slow">
                <span class="text-[10px] tracking-wider uppercase">Scroll</span>
                <div class="w-5 h-8 border border-gray-500 rounded-full flex justify-center">
                    <div class="w-1 h-2 bg-gray-400 rounded-full mt-1 animate-scroll-down"></div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

                {{-- Contact Form Section --}}
                <div class="lg:col-span-3">
                    <div
                        class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 hover:shadow-2xl transition-shadow duration-300">
                        <div class="flex items-center gap-3 mb-6 pb-3 border-b border-gray-100">
                            <div class="w-10 h-10 bg-dotech-blue/10 rounded-xl flex items-center justify-center">
                                <i class="fas fa-envelope text-dotech-blue text-lg"></i>
                            </div>
                            <div>
                                <h2 class="text-xl font-bold text-gray-900">Kirim Pesan</h2>
                                <p class="text-xs text-gray-400">Isi form di bawah ini untuk menghubungi kami</p>
                            </div>
                        </div>

                        @if (session('success'))
                            <div
                                class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl text-green-700 flex items-start gap-3">
                                <i class="fas fa-check-circle text-green-500 mt-0.5 text-lg"></i>
                                <div class="flex-1">{{ session('success') }}</div>
                                <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif

                        @if (session('error'))
                            <div
                                class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 flex items-start gap-3">
                                <i class="fas fa-exclamation-circle text-red-500 mt-0.5 text-lg"></i>
                                <div class="flex-1">{{ session('error') }}</div>
                                <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="form-label block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fas fa-user text-gray-400 mr-1"></i> Nama <span
                                            class="text-red-500">*</span>
                                    </label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-dotech-blue focus:ring-2 focus:ring-dotech-blue/20 transition outline-none @error('name') border-red-400 @enderror"
                                        placeholder="Nama lengkap Anda" required>
                                    @error('name')
                                        <p class="form-error text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label class="form-label block text-sm font-semibold text-gray-700 mb-1">
                                        <i class="fas fa-phone text-gray-400 mr-1"></i> Telepon
                                    </label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                        class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-dotech-blue focus:ring-2 focus:ring-dotech-blue/20 transition outline-none"
                                        placeholder="Nomor telepon">
                                    @error('phone')
                                        <p class="form-error text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <label class="form-label block text-sm font-semibold text-gray-700 mb-1">
                                    <i class="fas fa-envelope text-gray-400 mr-1"></i> Email <span
                                        class="text-red-500">*</span>
                                </label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-dotech-blue focus:ring-2 focus:ring-dotech-blue/20 transition outline-none @error('email') border-red-400 @enderror"
                                    placeholder="email@example.com" required>
                                @error('email')
                                    <p class="form-error text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label block text-sm font-semibold text-gray-700 mb-1">
                                    <i class="fas fa-tag text-gray-400 mr-1"></i> Subjek <span
                                        class="text-red-500">*</span>
                                </label>
                                <input type="text" name="subject" value="{{ old('subject') }}"
                                    class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-dotech-blue focus:ring-2 focus:ring-dotech-blue/20 transition outline-none @error('subject') border-red-400 @enderror"
                                    placeholder="Judul pesan Anda" required>
                                @error('subject')
                                    <p class="form-error text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label class="form-label block text-sm font-semibold text-gray-700 mb-1">
                                    <i class="fas fa-comment text-gray-400 mr-1"></i> Pesan <span
                                        class="text-red-500">*</span>
                                </label>
                                <textarea name="message" rows="5"
                                    class="form-input w-full px-4 py-3 border border-gray-200 rounded-xl focus:border-dotech-blue focus:ring-2 focus:ring-dotech-blue/20 transition outline-none resize-none @error('message') border-red-400 @enderror"
                                    placeholder="Ceritakan kebutuhan Anda...">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="form-error text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit"
                                class="btn-primary w-full justify-center py-3.5 flex items-center gap-2 text-base font-semibold group">
                                <i class="fas fa-paper-plane text-sm"></i>
                                <span>Kirim Pesan</span>
                                <i class="fas fa-arrow-right text-sm group-hover:translate-x-1 transition-transform"></i>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Contact Info Sidebar --}}
                <div class="lg:col-span-2 space-y-6">
                    @if ($contact)
                        {{-- Contact Information Card --}}
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition">
                            <div class="flex items-center gap-3 mb-5 pb-3 border-b border-gray-100">
                                <div class="w-10 h-10 bg-dotech-blue/10 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-address-card text-dotech-blue text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800">Informasi Kontak</h3>
                                    <p class="text-xs text-gray-400">Hubungi kami melalui berbagai channel</p>
                                </div>
                            </div>

                            <div class="space-y-5">
                                @if ($contact->email)
                                    <div class="flex gap-4 items-start group">
                                        <div
                                            class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-dotech-blue transition-colors duration-300">
                                            <i
                                                class="fas fa-envelope text-dotech-blue text-lg group-hover:text-white transition-colors"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">Email</p>
                                            <a href="mailto:{{ $contact->email }}"
                                                class="text-dotech-blue text-sm hover:underline break-all">{{ $contact->email }}</a>
                                        </div>
                                    </div>
                                @endif

                                @if ($contact->whatsapp)
                                    <div class="flex gap-4 items-start group">
                                        <div
                                            class="w-11 h-11 bg-green-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-green-500 transition-colors duration-300">
                                            <i
                                                class="fab fa-whatsapp text-green-600 text-lg group-hover:text-white transition-colors"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">WhatsApp</p>
                                            <a href="{{ $contact->whatsapp_url }}" target="_blank"
                                                class="text-green-600 text-sm hover:underline">{{ $contact->whatsapp }}</a>
                                        </div>
                                    </div>
                                @endif

                                @if ($contact->phone)
                                    <div class="flex gap-4 items-start group">
                                        <div
                                            class="w-11 h-11 bg-blue-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-dotech-blue transition-colors duration-300">
                                            <i
                                                class="fas fa-phone-alt text-dotech-blue text-lg group-hover:text-white transition-colors"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">Telepon</p>
                                            <a href="tel:{{ $contact->phone }}"
                                                class="text-gray-600 text-sm hover:text-dotech-blue">{{ $contact->phone }}</a>
                                        </div>
                                    </div>
                                @endif

                                @if ($contact->address)
                                    <div class="flex gap-4 items-start group">
                                        <div
                                            class="w-11 h-11 bg-red-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-red-500 transition-colors duration-300">
                                            <i
                                                class="fas fa-map-marker-alt text-red-500 text-lg group-hover:text-white transition-colors"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">Alamat</p>
                                            <p class="text-gray-500 text-sm leading-relaxed">{{ $contact->address }}</p>
                                        </div>
                                    </div>
                                @endif

                                @if ($contact->office_hours)
                                    <div class="flex gap-4 items-start group">
                                        <div
                                            class="w-11 h-11 bg-purple-50 rounded-xl flex items-center justify-center flex-shrink-0 group-hover:bg-purple-500 transition-colors duration-300">
                                            <i
                                                class="fas fa-clock text-purple-500 text-lg group-hover:text-white transition-colors"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800 text-sm">Jam Operasional</p>
                                            <p class="text-gray-500 text-sm">{{ $contact->office_hours }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Google Maps --}}
                        @if ($contact->google_maps_embed)
                            <div
                                class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-xl transition">
                                {!! $contact->google_maps_embed !!}
                            </div>
                        @endif
                    @endif

                    {{-- Social Links Card --}}
                    @if ($socialLinks->isNotEmpty())
                        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition">
                            <div class="flex items-center gap-3 mb-4 pb-3 border-b border-gray-100">
                                <div
                                    class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-xl flex items-center justify-center">
                                    <i class="fas fa-share-alt text-white text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800">Ikuti Kami</h3>
                                    <p class="text-xs text-gray-400">Terhubung dengan kami di media sosial</p>
                                </div>
                            </div>
                            <div class="flex flex-wrap gap-3">
                                @foreach ($socialLinks as $social)
                                    <a href="{{ $social->url }}" target="_blank"
                                        class="w-11 h-11 bg-gray-100 hover:bg-gradient-to-br hover:from-dotech-blue hover:to-blue-700 rounded-xl flex items-center justify-center text-gray-600 hover:text-white transition-all duration-300 transform hover:-translate-y-1">
                                        <i class="{{ $social->icon }}"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- FAQ Quick Link Card --}}
                    <div
                        class="bg-gradient-to-br from-gray-50 to-white rounded-2xl shadow-lg border border-gray-100 p-6 hover:shadow-xl transition">
                        <div class="flex items-center gap-3 mb-4 pb-3 border-b border-gray-100">
                            <div class="w-10 h-10 bg-amber-100 rounded-xl flex items-center justify-center">
                                <i class="fas fa-question-circle text-amber-500 text-lg"></i>
                            </div>
                            <div>
                                <h3 class="font-bold text-gray-800">Butuh Bantuan?</h3>
                                <p class="text-xs text-gray-400">Pertanyaan yang sering diajukan</p>
                            </div>
                        </div>
                        <p class="text-gray-500 text-sm mb-4">Kunjungi halaman FAQ untuk pertanyaan yang sering diajukan
                            seputar layanan kami.</p>
                        <a href="{{ route('home') ?? '#' }}"
                            class="inline-flex items-center gap-2 text-dotech-blue text-sm font-medium hover:gap-3 transition-all group">
                            <span>Lihat FAQ</span>
                            <i class="fas fa-arrow-right text-xs group-hover:translate-x-1 transition"></i>
                        </a>
                    </div>

                    {{-- Quick Response Card --}}
                    <div
                        class="bg-gradient-to-r from-dotech-blue to-blue-700 text-white rounded-2xl p-6 text-center hover:shadow-xl transition transform hover:-translate-y-1">
                        <div
                            class="inline-flex items-center justify-center w-14 h-14 bg-white/20 rounded-full mb-4 animate-pulse">
                            <i class="fas fa-clock text-2xl text-white"></i>
                        </div>
                        <h3 class="font-bold text-xl mb-2">Respon Cepat</h3>
                        <p class="text-blue-100 text-sm leading-relaxed">Tim kami akan merespon pesan Anda dalam <strong
                                class="font-bold">kurang dari 24 jam kerja</strong></p>
                        <div class="mt-4 pt-3 border-t border-white/20">
                            <p class="text-xs text-blue-200">
                                <i class="fas fa-phone-alt mr-1"></i> Atau hubungi langsung:
                                <strong>{{ $contact->phone ?? '+62 812 3456 7890' }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            @keyframes pulse-slow {

                0%,
                100% {
                    opacity: 0.3;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.6;
                    transform: scale(1.05);
                }
            }

            @keyframes pulse-slower {

                0%,
                100% {
                    opacity: 0.2;
                    transform: scale(1);
                }

                50% {
                    opacity: 0.5;
                    transform: scale(1.1);
                }
            }

            @keyframes float {

                0%,
                100% {
                    transform: translate(-50%, -50%) translateY(0px);
                }

                50% {
                    transform: translate(-50%, -50%) translateY(-20px);
                }
            }

            @keyframes float-slow {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(-15px) translateX(10px);
                }
            }

            @keyframes float-reverse {

                0%,
                100% {
                    transform: translateY(0px) translateX(0px);
                }

                50% {
                    transform: translateY(15px) translateX(-10px);
                }
            }

            @keyframes fade-in-up {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes slide-down {
                from {
                    opacity: 0;
                    transform: translateY(-20px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes scroll-down {
                0% {
                    opacity: 1;
                    transform: translateY(0);
                }

                100% {
                    opacity: 0;
                    transform: translateY(15px);
                }
            }

            @keyframes bounce {

                0%,
                100% {
                    transform: translateY(0);
                }

                50% {
                    transform: translateY(5px);
                }
            }

            .animate-pulse-slow {
                animation: pulse-slow 4s ease-in-out infinite;
            }

            .animate-pulse-slower {
                animation: pulse-slower 6s ease-in-out infinite;
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            .animate-float-slow {
                animation: float-slow 8s ease-in-out infinite;
            }

            .animate-float-reverse {
                animation: float-reverse 7s ease-in-out infinite;
            }

            .animate-fade-in-up {
                animation: fade-in-up 0.8s ease-out forwards;
                opacity: 0;
            }

            .animate-slide-down {
                animation: slide-down 0.6s ease-out forwards;
                opacity: 0;
            }

            .animate-scroll-down {
                animation: scroll-down 1.5s ease-in-out infinite;
            }

            .animate-bounce-slow {
                animation: bounce 2s ease-in-out infinite;
            }

            .animation-delay-200 {
                animation-delay: 0.2s;
            }

            .animation-delay-400 {
                animation-delay: 0.4s;
            }

            /* Custom form focus styles */
            .form-input:focus {
                border-color: #2563EB;
                box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            }

            /* Smooth transitions */
            .btn-primary {
                transition: all 0.3s ease;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 10px 20px -5px rgba(37, 99, 235, 0.3);
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Auto-hide success/error messages after 5 seconds
                const successMsg = document.querySelector('.bg-green-50');
                const errorMsg = document.querySelector('.bg-red-50');

                if (successMsg) {
                    setTimeout(() => {
                        successMsg.style.opacity = '0';
                        setTimeout(() => successMsg.remove(), 300);
                    }, 5000);
                }

                if (errorMsg) {
                    setTimeout(() => {
                        errorMsg.style.opacity = '0';
                        setTimeout(() => errorMsg.remove(), 300);
                    }, 5000);
                }

                console.log('Contact page loaded with enhanced animations');
            });
        </script>
    @endpush
@endsection
