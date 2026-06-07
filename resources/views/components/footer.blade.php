@php
    $contact     = \App\Models\ContactInformation::where('is_active', true)->first();
    $socialLinks = \App\Models\SocialLink::active()->get();
    $services    = \App\Models\Service::active()->limit(6)->get();
@endphp

<footer class="bg-gradient-to-br from-dotech-dark via-blue-950 to-dotech-dark text-white">
    {{-- Main Footer --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 lg:gap-12">

            {{-- Brand Column --}}
            <div class="lg:col-span-2">
                {{-- @if($logo = \App\Models\SiteSetting::where('key', 'footer_logo')->first())
                    <img src="{{ $logo->value }}" alt="PT Dotech" class="h-12 mb-4">
                @else --}}
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-8 h-8 bg-dotech-blue rounded-lg flex items-center justify-center">
                            <i class="fas fa-code text-white text-sm"></i>
                        </div>
                        <span class="text-xl font-bold bg-gradient-to-r from-white to-blue-300 bg-clip-text text-transparent">Dotech Digital</span>
                    </div>
                {{-- @endif --}}
                <p class="text-gray-400 leading-relaxed mb-5 text-sm max-w-md">
                    Solusi teknologi digital terpercaya untuk bisnis Anda. Web Development, Mobile App, Cloud Solution, dan IT Consulting.
                </p>
                <div class="flex flex-wrap items-center gap-2 text-xs text-gray-500 mb-4">
                    <span class="flex items-center gap-1"><i class="fas fa-check-circle text-green-500 text-xs"></i> 150+ Klien</span>
                    <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                    <span class="flex items-center gap-1"><i class="fas fa-check-circle text-green-500 text-xs"></i> 8+ Tahun</span>
                    <span class="w-1 h-1 bg-gray-600 rounded-full"></span>
                    <span class="flex items-center gap-1"><i class="fas fa-check-circle text-green-500 text-xs"></i> 250+ Proyek</span>
                </div>
                {{-- Social Links --}}
                @if($socialLinks->isNotEmpty())
                <div class="flex gap-2">
                    @foreach($socialLinks as $social)
                    <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                       class="w-9 h-9 rounded-lg bg-white/5 hover:bg-dotech-blue hover:scale-110 flex items-center justify-center transition-all duration-200 group"
                       title="{{ $social->platform }}">
                        <span class="text-gray-400 group-hover:text-white transition-colors">
                            {!! $social->icon !!}
                        </span>
                    </a>
                    @endforeach
                </div>
                @else
                <div class="flex gap-2">
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-dotech-blue hover:scale-110 flex items-center justify-center transition-all">
                        <i class="fab fa-facebook-f text-gray-400 hover:text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-dotech-blue hover:scale-110 flex items-center justify-center transition-all">
                        <i class="fab fa-instagram text-gray-400 hover:text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-dotech-blue hover:scale-110 flex items-center justify-center transition-all">
                        <i class="fab fa-linkedin-in text-gray-400 hover:text-white text-sm"></i>
                    </a>
                    <a href="#" class="w-9 h-9 rounded-lg bg-white/5 hover:bg-dotech-blue hover:scale-110 flex items-center justify-center transition-all">
                        <i class="fab fa-twitter text-gray-400 hover:text-white text-sm"></i>
                    </a>
                </div>
                @endif
            </div>

            {{-- Quick Links / Services Column --}}
            <div>
                <div class="flex items-center gap-2 mb-5">
                    <i class="fas fa-cubes text-dotech-blue text-sm"></i>
                    <h4 class="font-bold text-white text-base">Layanan Kami</h4>
                </div>
                <ul class="space-y-2.5">
                    @foreach($services as $service)
                    <li>
                        <a href="{{ route('about') }}#services" class="text-gray-400 hover:text-dotech-blue transition-colors text-sm flex items-center gap-2 group">
                            <i class="fas fa-chevron-right text-[10px] text-gray-500 group-hover:text-dotech-blue transition"></i>
                            {{ $service->title }}
                        </a>
                    </li>
                    @endforeach
                    @if($services->isEmpty())
                    <li><a href="#" class="text-gray-400 hover:text-dotech-blue text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Web Development</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-dotech-blue text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Mobile Apps</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-dotech-blue text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> Cloud Solutions</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-dotech-blue text-sm flex items-center gap-2"><i class="fas fa-chevron-right text-[10px]"></i> IT Consulting</a></li>
                    @endif
                </ul>
            </div>

            {{-- Contact Column --}}
            <div>
                <div class="flex items-center gap-2 mb-5">
                    <i class="fas fa-headset text-dotech-blue text-sm"></i>
                    <h4 class="font-bold text-white text-base">Hubungi Kami</h4>
                </div>
                @if($contact)
                <ul class="space-y-3 text-sm">
                    @if($contact->email)
                    <li class="flex gap-3 items-start">
                        <i class="fas fa-envelope text-dotech-blue text-sm mt-0.5"></i>
                        <div>
                            <p class="text-gray-500 text-xs">Email</p>
                            <a href="mailto:{{ $contact->email }}" class="text-gray-400 hover:text-dotech-blue transition">{{ $contact->email }}</a>
                        </div>
                    </li>
                    @endif
                    @if($contact->whatsapp)
                    <li class="flex gap-3 items-start">
                        <i class="fab fa-whatsapp text-green-400 text-sm mt-0.5"></i>
                        <div>
                            <p class="text-gray-500 text-xs">WhatsApp</p>
                            <a href="{{ $contact->whatsapp_url }}" target="_blank" class="text-gray-400 hover:text-green-400 transition">{{ $contact->whatsapp }}</a>
                        </div>
                    </li>
                    @endif
                    @if($contact->phone)
                    <li class="flex gap-3 items-start">
                        <i class="fas fa-phone-alt text-blue-400 text-sm mt-0.5"></i>
                        <div>
                            <p class="text-gray-500 text-xs">Telepon</p>
                            <a href="tel:{{ $contact->phone }}" class="text-gray-400 hover:text-dotech-blue transition">{{ $contact->phone }}</a>
                        </div>
                    </li>
                    @endif
                    @if($contact->address)
                    <li class="flex gap-3 items-start">
                        <i class="fas fa-map-marker-alt text-red-400 text-sm mt-0.5"></i>
                        <div>
                            <p class="text-gray-500 text-xs">Alamat</p>
                            <p class="text-gray-400 text-sm leading-relaxed">{{ $contact->address }}</p>
                        </div>
                    </li>
                    @endif
                    @if($contact->office_hours)
                    <li class="flex gap-3 items-start">
                        <i class="fas fa-clock text-purple-400 text-sm mt-0.5"></i>
                        <div>
                            <p class="text-gray-500 text-xs">Jam Operasional</p>
                            <p class="text-gray-400 text-sm">{{ $contact->office_hours }}</p>
                        </div>
                    </li>
                    @endif
                </ul>
                @else
                <ul class="space-y-3 text-sm">
                    <li class="flex gap-3"><i class="fas fa-envelope text-dotech-blue"></i><a href="mailto:hello@dotech.com" class="text-gray-400 hover:text-dotech-blue">hello@dotech.com</a></li>
                    <li class="flex gap-3"><i class="fab fa-whatsapp text-green-400"></i><a href="#" class="text-gray-400 hover:text-green-400">+62 812 3456 7890</a></li>
                    <li class="flex gap-3"><i class="fas fa-map-marker-alt text-red-400"></i><span class="text-gray-400">Jakarta, Indonesia</span></li>
                </ul>
                @endif
            </div>
        </div>
    </div>

    {{-- Newsletter & Bottom Bar --}}
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="flex flex-col md:flex-row justify-between items-center gap-6">
                {{-- Copyright --}}
                <div class="text-sm text-gray-500 flex items-center gap-2">
                    <i class="far fa-copyright text-xs"></i>
                    <span>{{ date('Y') }} PT Dotech Digital Solution. All rights reserved.</span>
                </div>

                {{-- Newsletter (optional) --}}
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <span class="text-xs text-gray-400 flex items-center gap-1">
                        <i class="fas fa-paper-plane text-dotech-blue"></i>
                        Subscribe newsletter
                    </span>
                    <form action="{{ route('home') ?? '#' }}" method="POST" class="flex">
                        @csrf
                        <input type="email" name="email" placeholder="Email address"
                               class="bg-white/5 border border-white/10 rounded-l-lg px-3 py-1.5 text-sm text-white placeholder-gray-500 focus:outline-none focus:border-dotech-blue w-48">
                        <button type="submit" class="bg-dotech-blue hover:bg-blue-700 rounded-r-lg px-3 py-1.5 text-sm transition">
                            <i class="fas fa-arrow-right"></i>
                        </button>
                    </form>
                </div>
            </div>

            {{-- Legal Links --}}
            <div class="flex flex-wrap justify-center md:justify-between items-center gap-4 mt-5 pt-5 border-t border-white/5 text-xs text-gray-500">
                <div class="flex gap-4">
                    <a href="{{ route('privacy') }}" class="hover:text-dotech-blue transition flex items-center gap-1">
                        <i class="fas fa-shield-alt text-[10px]"></i>
                        Privacy Policy
                    </a>
                    <span class="text-gray-700">|</span>
                    <a href="{{ route('terms') }}" class="hover:text-dotech-blue transition flex items-center gap-1">
                        <i class="fas fa-file-contract text-[10px]"></i>
                        Terms & Conditions
                    </a>
                    <span class="text-gray-700">|</span>
                    <a href="#" class="hover:text-dotech-blue transition flex items-center gap-1">
                        <i class="fas fa-cookie-bite text-[10px]"></i>
                        Cookie Policy
                    </a>
                </div>
                <div class="flex items-center gap-1">
                    <i class="fas fa-globe text-[10px]"></i>
                    <span>Made with <i class="fas fa-heart text-red-400 text-[10px]"></i> in Indonesia</span>
                </div>
            </div>
        </div>
    </div>
</footer>

{{-- Back to Top Button --}}
<button id="backToTop" class="fixed bottom-6 right-6 w-11 h-11 bg-dotech-blue hover:bg-blue-700 rounded-full shadow-lg flex items-center justify-center text-white transition-all duration-300 opacity-0 invisible hover:scale-110 z-40">
    <i class="fas fa-arrow-up text-sm"></i>
</button>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
    footer a {
        transition: all 0.2s ease;
    }

    #backToTop {
        cursor: pointer;
    }

    #backToTop.show {
        opacity: 1;
        visibility: visible;
    }

    /* Smooth hover effects */
    footer .hover\:text-dotech-blue:hover {
        color: #3b82f6;
    }
</style>
@endpush

@push('scripts')
<script>
    // Back to Top Button functionality
    document.addEventListener('DOMContentLoaded', function() {
        const backToTopBtn = document.getElementById('backToTop');

        if (backToTopBtn) {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 300) {
                    backToTopBtn.classList.add('show');
                } else {
                    backToTopBtn.classList.remove('show');
                }
            });

            backToTopBtn.addEventListener('click', function() {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        }
    });
</script>
@endpush
