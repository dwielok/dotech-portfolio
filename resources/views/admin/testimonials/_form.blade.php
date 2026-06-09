{{-- Informasi Testimonial --}}
<div class="space-y-5">
    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
        <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center">
            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
        </div>
        <h3 class="font-semibold text-gray-800">Informasi Testimonial</h3>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Klien <span class="text-red-500">*</span></label>
        <input type="text" name="client_name" value="{{ old('client_name') }}"
               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
               placeholder="Masukkan nama klien" required>
        @error('client_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Posisi / Job Title</label>
        <input type="text" name="position" value="{{ old('position') }}"
               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
               placeholder="Contoh: CEO, Marketing Manager, dll">
        @error('position')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Perusahaan</label>
        <input type="text" name="company_name" value="{{ old('company_name') }}"
               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
               placeholder="Nama perusahaan klien">
        @error('company_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial <span class="text-red-500">*</span></label>
        <textarea name="testimonial" rows="5"
                  class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all resize-none"
                  placeholder="Tulis testimonial dari klien..." required>{{ old('testimonial') }}</textarea>
        @error('testimonial')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
        <p class="text-xs text-gray-400 mt-2">Maksimal 500 karakter</p>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Rating <span class="text-red-500">*</span></label>
        <div class="flex items-center gap-4">
            <div class="flex items-center gap-2" id="ratingStars">
                @for($i = 1; $i <= 5; $i++)
                <button type="button" data-rating="{{ $i }}" class="rating-star text-3xl focus:outline-none transition-all duration-200 hover:scale-110">
                    <svg class="w-8 h-8 text-gray-300 hover:text-yellow-400 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                    </svg>
                </button>
                @endfor
            </div>
            <input type="hidden" name="rating" id="ratingValue" value="{{ old('rating', 5) }}">
            <span id="ratingText" class="text-sm text-gray-600 font-medium">5/5 - Excellent</span>
        </div>
        @error('rating')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
    </div>
</div>
