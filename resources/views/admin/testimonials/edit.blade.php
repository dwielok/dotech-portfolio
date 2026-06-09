@extends('layouts.admin')
@section('title', 'Edit Testimonial')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-0">
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">Edit Testimonial</h1>
                <p class="text-sm text-gray-500 mt-1">Perbarui informasi testimonial dari klien Anda</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.testimonials.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-medium rounded-xl shadow-lg shadow-blue-500/25 transition-all duration-200 transform hover:scale-[1.02]">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Testimonial
                </button>
            </div>
        </div>

        {{-- Form Content --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Informasi Testimonial</h3>
                    </div>

                    {{-- Client Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Klien <span class="text-red-500">*</span></label>
                        <input type="text" name="client_name" value="{{ old('client_name', $testimonial->client_name) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               placeholder="Masukkan nama klien" required>
                        @error('client_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Position --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Posisi / Job Title</label>
                        <input type="text" name="position" value="{{ old('position', $testimonial->position) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               placeholder="Contoh: CEO, Marketing Manager, dll">
                        @error('position')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Company Name --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama Perusahaan</label>
                        <input type="text" name="company_name" value="{{ old('company_name', $testimonial->company_name) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               placeholder="Nama perusahaan klien">
                        @error('company_name')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    {{-- Testimonial Content --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Testimonial <span class="text-red-500">*</span></label>
                        <textarea name="testimonial" rows="5"
                                  class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all resize-none"
                                  placeholder="Tulis testimonial dari klien..." required>{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                        @error('testimonial')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                        <p class="text-xs text-gray-400 mt-2">Maksimal 500 karakter</p>
                    </div>

                    {{-- Rating --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Rating <span class="text-red-500">*</span></label>
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2" id="ratingStars">
                                @for($i = 1; $i <= 5; $i++)
                                <button type="button" data-rating="{{ $i }}" class="rating-star text-3xl focus:outline-none transition-all duration-200 hover:scale-110">
                                    <svg class="w-8 h-8 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                </button>
                                @endfor
                            </div>
                            <input type="hidden" name="rating" id="ratingValue" value="{{ old('rating', $testimonial->rating) }}">
                            <span id="ratingText" class="text-sm text-gray-600 font-medium"></span>
                        </div>
                        @error('rating')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Status & Order --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-indigo-50 rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Pengaturan</h3>
                    </div>

                    {{-- Status --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="relative">
                            <select name="is_active" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all appearance-none cursor-pointer">
                                <option value="1" {{ old('is_active', $testimonial->is_active) == '1' ? 'selected' : '' }}>Aktif</option>
                                <option value="0" {{ old('is_active', $testimonial->is_active) == '0' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 mt-1">Testimonial aktif akan ditampilkan di website</p>
                    </div>

                    {{-- Sort Order --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                        <input type="number" name="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               placeholder="0">
                        <p class="text-xs text-gray-400 mt-1">Semakin kecil angka, semakin atas posisinya</p>
                    </div>
                </div>

                {{-- Photo Upload --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-green-50 rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Foto Profil</h3>
                    </div>

                    {{-- Current Photo --}}
                    @if($testimonial->photo)
                    <div class="p-4 bg-gray-50 rounded-xl">
                        <p class="text-xs font-medium text-gray-600 mb-2">Foto Saat Ini:</p>
                        <div class="flex items-center gap-3">
                            <img src="{{ $testimonial->photo_url }}" alt="{{ $testimonial->client_name }}"
                                 class="w-16 h-16 rounded-full object-cover shadow-sm">
                            <div class="flex-1">
                                <p class="text-sm text-gray-600">{{ $testimonial->client_name }}</p>
                                <label class="inline-flex items-center gap-2 mt-2 text-xs text-red-600 cursor-pointer">
                                    <input type="checkbox" name="remove_photo" value="1" class="rounded border-gray-300">
                                    <span>Hapus foto ini</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- Upload New Photo --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            {{ $testimonial->photo ? 'Ganti Foto' : 'Upload Foto' }}
                        </label>
                        <div class="mt-1">
                            <label class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-gray-200 rounded-xl cursor-pointer hover:border-indigo-500 hover:bg-indigo-50/20 transition-all duration-200 bg-gray-50/30" id="photoLabel">
                                <svg class="w-12 h-12 text-gray-400 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm text-gray-500 font-medium">{{ $testimonial->photo ? 'Klik untuk mengganti foto' : 'Klik untuk upload foto' }}</span>
                                <span class="text-xs text-gray-400 mt-1">PNG, JPG, JPEG (max 2MB)</span>
                                <span class="text-xs text-gray-400">Rekomendasi: 400x400px</span>
                                <div id="photoPreviewContainer" class="hidden mt-3">
                                    <img id="photoPreview" class="w-24 h-24 rounded-full object-cover mx-auto shadow-lg">
                                </div>
                                <input type="file" name="photo" accept="image/*" class="hidden" id="photoInput">
                            </label>
                        </div>
                        @error('photo')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
<style>
    .rating-star {
        transition: all 0.2s ease;
    }

    .rating-star:hover svg {
        transform: scale(1.1);
    }

    .rating-star.active svg {
        fill: #fbbf24;
        color: #fbbf24;
    }
</style>
@endpush

@push('scripts')
<script>
// Rating Stars
const stars = document.querySelectorAll('.rating-star');
const ratingInput = document.getElementById('ratingValue');
const ratingText = document.getElementById('ratingText');

const ratingMessages = {
    1: '1/5 - Very Poor',
    2: '2/5 - Poor',
    3: '3/5 - Average',
    4: '4/5 - Good',
    5: '5/5 - Excellent'
};

function setRating(value) {
    ratingInput.value = value;
    ratingText.textContent = ratingMessages[value] || ratingMessages[5];

    stars.forEach((star, index) => {
        const starRating = parseInt(star.dataset.rating);
        const svg = star.querySelector('svg');
        if (starRating <= value) {
            star.classList.add('active');
            svg.classList.add('text-yellow-400');
            svg.classList.remove('text-gray-300');
        } else {
            star.classList.remove('active');
            svg.classList.remove('text-yellow-400');
            svg.classList.add('text-gray-300');
        }
    });
}

stars.forEach(star => {
    star.addEventListener('click', () => {
        const rating = parseInt(star.dataset.rating);
        setRating(rating);
    });

    star.addEventListener('mouseenter', () => {
        const rating = parseInt(star.dataset.rating);
        stars.forEach((s, index) => {
            const starRating = parseInt(s.dataset.rating);
            const svg = s.querySelector('svg');
            if (starRating <= rating) {
                svg.classList.add('text-yellow-400');
                svg.classList.remove('text-gray-300');
            } else {
                svg.classList.remove('text-yellow-400');
                svg.classList.add('text-gray-300');
            }
        });
    });

    star.addEventListener('mouseleave', () => {
        const currentRating = parseInt(ratingInput.value);
        stars.forEach(s => {
            const starRating = parseInt(s.dataset.rating);
            const svg = s.querySelector('svg');
            if (starRating <= currentRating) {
                svg.classList.add('text-yellow-400');
                svg.classList.remove('text-gray-300');
            } else {
                svg.classList.remove('text-yellow-400');
                svg.classList.add('text-gray-300');
            }
        });
    });
});

// Initialize with existing rating
setRating(parseInt(ratingInput.value) || 5);

// Photo Preview
document.getElementById('photoInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;

    if (!file.type.match('image.*')) {
        alert('Hanya file gambar yang diperbolehkan!');
        return;
    }

    if (file.size > 2 * 1024 * 1024) {
        alert('Ukuran file maksimal 2MB!');
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        const preview = document.getElementById('photoPreview');
        const container = document.getElementById('photoPreviewContainer');
        const label = document.getElementById('photoLabel');

        preview.src = e.target.result;
        container.classList.remove('hidden');
        label.style.borderColor = '#4f46e5';
        label.style.backgroundColor = '#eef2ff';
    };
    reader.readAsDataURL(file);
});
</script>
@endpush
@endsection
