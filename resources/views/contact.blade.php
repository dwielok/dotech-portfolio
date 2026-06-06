@extends('layouts.app')
@section('title', 'Hubungi Kami — PT Dotech Digital Solution')

@section('content')
<div class="pt-20">
    <div class="bg-gradient-to-br from-dotech-dark to-blue-950 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold">Hubungi Kami</h1>
            <p class="text-gray-300 mt-3">Kami siap membantu mewujudkan ide digital Anda menjadi kenyataan</p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-12">

            {{-- Contact Form --}}
            <div class="lg:col-span-3">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-6">Kirim Pesan</h2>

                    <form method="POST" action="{{ route('contact.store') }}" class="space-y-5">
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="form-label">Nama <span class="text-red-500">*</span></label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                       class="form-input @error('name') border-red-400 @enderror" required>
                                @error('name')<p class="form-error">{{ $message }}</p>@enderror
                            </div>
                            <div>
                                <label class="form-label">Telepon</label>
                                <input type="tel" name="phone" value="{{ old('phone') }}" class="form-input">
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-input @error('email') border-red-400 @enderror" required>
                            @error('email')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Subjek <span class="text-red-500">*</span></label>
                            <input type="text" name="subject" value="{{ old('subject') }}"
                                   class="form-input @error('subject') border-red-400 @enderror" required>
                            @error('subject')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label class="form-label">Pesan <span class="text-red-500">*</span></label>
                            <textarea name="message" rows="5"
                                      class="form-input @error('message') border-red-400 @enderror" required>{{ old('message') }}</textarea>
                            @error('message')<p class="form-error">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" class="btn-primary w-full justify-center py-3.5">
                            Kirim Pesan →
                        </button>
                    </form>
                </div>
            </div>

            {{-- Contact Info --}}
            <div class="lg:col-span-2 space-y-6">
                @if($contact)
                <div class="space-y-4">
                    @if($contact->email)
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-dotech-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Email</p>
                            <a href="mailto:{{ $contact->email }}" class="text-dotech-blue text-sm hover:underline">{{ $contact->email }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact->whatsapp)
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 bg-green-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">WhatsApp</p>
                            <a href="{{ $contact->whatsapp_url }}" target="_blank" class="text-green-600 text-sm hover:underline">{{ $contact->whatsapp }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact->address)
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-dotech-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Alamat</p>
                            <p class="text-gray-500 text-sm">{{ $contact->address }}</p>
                        </div>
                    </div>
                    @endif
                    @if($contact->office_hours)
                    <div class="flex gap-4 items-start">
                        <div class="w-10 h-10 bg-blue-100 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 text-dotech-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Jam Operasional</p>
                            <p class="text-gray-500 text-sm">{{ $contact->office_hours }}</p>
                        </div>
                    </div>
                    @endif
                </div>
                @if($contact->google_maps_embed)
                <div class="rounded-2xl overflow-hidden border border-gray-100">
                    {!! $contact->google_maps_embed !!}
                </div>
                @endif
                @endif

                {{-- Social Links --}}
                @if($socialLinks->isNotEmpty())
                <div>
                    <h3 class="font-semibold text-gray-800 mb-3 text-sm">Ikuti Kami</h3>
                    <div class="flex gap-3">
                        @foreach($socialLinks as $social)
                        <a href="{{ $social->url }}" target="_blank"
                           class="w-10 h-10 bg-gray-100 hover:bg-dotech-blue hover:text-white rounded-xl flex items-center justify-center text-gray-600 transition-all duration-200">
                            {!! $social->icon !!}
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
