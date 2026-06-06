@php
    $contact     = \App\Models\ContactInformation::where('is_active', true)->first();
    $socialLinks = \App\Models\SocialLink::active()->get();
    $services    = \App\Models\Service::active()->limit(6)->get();
@endphp

<footer class="bg-dotech-dark text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            {{-- Brand --}}
            <div class="lg:col-span-2">
                <img src="{{ asset('images/logo_dotech.png') }}" alt="PT Dotech" class="h-14 mb-4">
                <p class="text-gray-400 leading-relaxed mb-6">
                    Solusi teknologi digital terpercaya untuk bisnis Anda. Web Development, Mobile App, Cloud Solution, dan IT Consulting.
                </p>
                {{-- Social Links --}}
                @if($socialLinks->isNotEmpty())
                <div class="flex gap-3">
                    @foreach($socialLinks as $social)
                    <a href="{{ $social->url }}" target="_blank" rel="noopener noreferrer"
                       class="w-10 h-10 rounded-lg bg-white/10 hover:bg-dotech-blue flex items-center justify-center transition-colors duration-200"
                       title="{{ $social->platform }}">
                        {!! $social->icon !!}
                    </a>
                    @endforeach
                </div>
                @endif
            </div>

            {{-- Services --}}
            <div>
                <h4 class="font-semibold text-white mb-4">Layanan Kami</h4>
                <ul class="space-y-2">
                    @foreach($services as $service)
                    <li>
                        <a href="{{ route('about') }}#services" class="text-gray-400 hover:text-dotech-blue transition-colors text-sm">
                            {{ $service->title }}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- Contact --}}
            <div>
                <h4 class="font-semibold text-white mb-4">Kontak</h4>
                @if($contact)
                <ul class="space-y-3 text-sm text-gray-400">
                    @if($contact->email)
                    <li class="flex gap-2">
                        <svg class="w-4 h-4 text-dotech-blue flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                        <a href="mailto:{{ $contact->email }}" class="hover:text-dotech-blue">{{ $contact->email }}</a>
                    </li>
                    @endif
                    @if($contact->whatsapp)
                    <li class="flex gap-2">
                        <svg class="w-4 h-4 text-green-400 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            <path d="M11.999 0C5.373 0 0 5.373 0 12c0 2.117.554 4.107 1.523 5.842L.057 23.88l6.204-1.626A11.95 11.95 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 11.999 0zm.001 21.818a9.823 9.823 0 01-5.011-1.371l-.359-.214-3.722.976 1.001-3.626-.235-.373A9.829 9.829 0 012.182 12c0-5.424 4.394-9.818 9.818-9.818 5.424 0 9.818 4.394 9.818 9.818 0 5.424-4.394 9.818-9.818 9.818z"/>
                        </svg>
                        <a href="{{ $contact->whatsapp_url }}" target="_blank" class="hover:text-green-400">{{ $contact->whatsapp }}</a>
                    </li>
                    @endif
                    @if($contact->address)
                    <li class="flex gap-2">
                        <svg class="w-4 h-4 text-dotech-blue flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                        <span>{{ $contact->address }}</span>
                    </li>
                    @endif
                </ul>
                @endif
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/10 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-3 text-sm text-gray-500">
            <p>&copy; {{ date('Y') }} PT Dotech Digital Solution. All rights reserved.</p>
            <div class="flex gap-4">
                <a href="{{ route('privacy') }}" class="hover:text-dotech-blue">Privacy Policy</a>
                <a href="{{ route('terms') }}" class="hover:text-dotech-blue">Terms & Conditions</a>
            </div>
        </div>
    </div>
</footer>
