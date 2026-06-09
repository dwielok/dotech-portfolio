@extends('layouts.admin')
@section('title', 'Edit Proyek')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-0">
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        {{-- Header --}}
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">Edit Proyek</h1>
                <p class="text-sm text-gray-500 mt-1">Perbarui informasi detail proyek Anda</p>
            </div>
            <div class="flex gap-3">
                <a href="{{ route('admin.projects.index') }}" class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                    Batal
                </a>
                <button type="submit" class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-medium rounded-xl shadow-lg shadow-blue-500/25 transition-all duration-200 transform hover:scale-[1.02]">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    Update Proyek
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-6">
                {{-- Informasi Proyek --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Informasi Proyek</h3>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Judul Proyek <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title', $project->title) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               placeholder="Masukkan judul proyek" required>
                        @error('title')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Slug</label>
                        <input type="text" name="slug" value="{{ old('slug', $project->slug) }}"
                               class="w-full px-4 py-2.5 bg-gray-100 border border-gray-200 rounded-xl text-gray-500 cursor-not-allowed"
                               readonly disabled>
                        <p class="text-xs text-gray-400 mt-1">Slug otomatis berdasarkan judul</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Singkat <span class="text-red-500">*</span></label>
                        <textarea name="short_description" rows="2"
                                  class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all resize-none"
                                  placeholder="Tulis deskripsi singkat proyek..." required>{{ old('short_description', $project->short_description) }}</textarea>
                        @error('short_description')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Lengkap</label>
                        <textarea name="full_description" rows="8"
                                  class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                                  id="editor">{{ old('full_description', $project->full_description) }}</textarea>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Klien</label>
                            <input type="text" name="client_name" value="{{ old('client_name', $project->client_name) }}"
                                   class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                                   placeholder="Nama klien atau perusahaan">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Proyek</label>
                            <input type="date" name="project_date" value="{{ old('project_date', $project->project_date?->format('Y-m-d')) }}"
                                   class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">URL Proyek</label>
                            <input type="url" name="project_url" value="{{ old('project_url', $project->project_url) }}"
                                   class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                                   placeholder="https://example.com">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Kategori</label>
                            <input type="text" name="category" value="{{ old('category', $project->category) }}"
                                   class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                                   placeholder="Web App, Mobile, Branding">
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Teknologi yang Digunakan</label>
                        <input type="text" name="technologies_input" id="techInput"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               placeholder="Ketik teknologi lalu tekan Enter...">
                        <div id="techTags" class="flex flex-wrap gap-2 mt-3"></div>
                        <div id="techHiddenInputs"></div>
                        <p class="text-xs text-gray-400 mt-2">Contoh: Laravel, React, Tailwind CSS</p>
                    </div>
                </div>

                {{-- SEO --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-purple-50 rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Optimasi SEO</h3>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                        <input type="text" name="meta_title" value="{{ old('meta_title', $project->meta_title) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               maxlength="60">
                        <p class="text-xs text-gray-400 mt-1">Maksimal 60 karakter</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                        <textarea name="meta_description" rows="2"
                                  class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all resize-none"
                                  maxlength="160">{{ old('meta_description', $project->meta_description) }}</textarea>
                        <p class="text-xs text-gray-400 mt-1">Maksimal 160 karakter</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords', $project->meta_keywords) }}"
                               class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                               placeholder="web development, ui/ux, branding">
                        <p class="text-xs text-gray-400 mt-1">Pisahkan dengan koma (,)</p>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-6">
                {{-- Pengaturan --}}
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

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <select name="status" class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all appearance-none cursor-pointer">
                                <option value="draft" {{ old('status', $project->status) === 'draft' ? 'selected' : '' }}>Draft</option>
                                <option value="published" {{ old('status', $project->status) === 'published' ? 'selected' : '' }}>Published</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between p-3 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-xl">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                            </svg>
                            <label for="is_featured" class="text-sm font-medium text-gray-700 cursor-pointer">Tampilkan di Beranda</label>
                        </div>
                        <div class="relative inline-block w-10 mr-2 align-middle select-none">
                            <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                   {{ old('is_featured', $project->is_featured) ? 'checked' : '' }}
                                   class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer">
                            <label for="is_featured" class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Featured Image</label>
                        @if($project->featured_image)
                        <div class="mb-3 p-3 bg-gray-50 rounded-xl">
                            <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                            <img src="{{ $project->featured_image_url }}" alt="Current featured image" class="w-full h-32 object-cover rounded-lg">
                            <label class="inline-flex items-center gap-2 mt-2 text-sm text-red-600 cursor-pointer">
                                <input type="checkbox" name="remove_featured_image" value="1" class="rounded border-gray-300">
                                <span>Hapus gambar ini</span>
                            </label>
                        </div>
                        @endif

                        <div class="mt-1">
                            <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-200 rounded-xl cursor-pointer hover:border-indigo-500 hover:bg-indigo-50/20 transition-all duration-200 bg-gray-50/30" id="imgLabel">
                                <svg class="w-10 h-10 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm text-gray-500">Klik untuk mengganti gambar</span>
                                <span class="text-xs text-gray-400 mt-1">PNG, JPG, WEBP (max 2MB)</span>
                                <img id="imgPreview" class="hidden max-h-32 rounded-lg mt-2 object-cover">
                                <input type="file" name="featured_image" accept="image/*" class="hidden" id="imgInput">
                            </label>
                        </div>
                        @error('featured_image')<p class="text-red-500 text-xs mt-1">{{ $message }}</p>@enderror
                    </div>
                </div>

                {{-- Galeri Foto --}}
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4 hover:shadow-md transition-shadow">
                    <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                        <div class="w-8 h-8 bg-green-50 rounded-xl flex items-center justify-center">
                            <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <h3 class="font-semibold text-gray-800">Galeri Foto</h3>
                    </div>

                    @if($project->images && $project->images->count() > 0)
                    <div class="space-y-3">
                        <p class="text-sm font-medium text-gray-700">Foto yang sudah ada:</p>
                        <div class="grid grid-cols-2 gap-3">
                            @foreach($project->images as $image)
                            <div class="relative group">
                                <img src="{{ Storage::url($image->image) }}" alt="Gallery image" class="w-full h-24 object-cover rounded-lg">
                                <label class="absolute top-1 right-1 bg-red-500 text-white p-1 rounded-lg opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                                    <input type="checkbox" name="remove_images[]" value="{{ $image->id }}" class="hidden">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </label>
                            </div>
                            @endforeach
                        </div>
                        <p class="text-xs text-amber-600">Centang pada gambar untuk menghapus</p>
                    </div>
                    @endif

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tambah Foto Baru</label>
                        <input type="file" name="images[]" multiple accept="image/*"
                               class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all cursor-pointer">
                        <p class="text-xs text-gray-400 mt-2">Upload beberapa foto sekaligus (jpg, png, webp)</p>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@push('styles')
<style>
    .toggle-checkbox:checked {
        right: 0;
        border-color: #4f46e5;
    }
    .toggle-checkbox:checked + .toggle-label {
        background-color: #4f46e5;
    }
    .toggle-checkbox {
        right: 0;
        transition: all 0.3s ease;
    }
    .toggle-label {
        transition: background-color 0.3s ease;
    }
</style>
@endpush

@push('scripts')
<script>
// Image Preview for featured image
document.getElementById('imgInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (e) => {
        const preview = document.getElementById('imgPreview');
        preview.src = e.target.result;
        preview.classList.remove('hidden');

        const label = document.getElementById('imgLabel');
        label.style.borderColor = '#4f46e5';
        label.style.backgroundColor = '#eef2ff';
    };
    reader.readAsDataURL(file);
});

// Tech Tags
const existingTechnologies = @json($project->technologies ?? []);
const techInput = document.getElementById('techInput');
const techTags = document.getElementById('techTags');
const hidden = document.getElementById('techHiddenInputs');
let techs = [...existingTechnologies];

// Render existing technologies
function renderTags() {
    techTags.innerHTML = '';
    hidden.innerHTML = '';
    techs.forEach((t, i) => {
        techTags.innerHTML += `<span class="inline-flex items-center gap-1.5 bg-gradient-to-r from-blue-50 to-indigo-50 text-indigo-700 text-xs font-medium px-3 py-1.5 rounded-full border border-indigo-100 shadow-sm">
            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
            </svg>
            ${escapeHtml(t)}
            <button type="button" onclick="removeTech(${i})" class="ml-1 text-indigo-400 hover:text-red-500 transition-colors">&times;</button>
        </span>`;
        hidden.innerHTML += `<input type="hidden" name="technologies[]" value="${escapeHtml(t)}">`;
    });
}

function escapeHtml(str) {
    return str.replace(/[&<>]/g, function(m) {
        if (m === '&') return '&amp;';
        if (m === '<') return '&lt;';
        if (m === '>') return '&gt;';
        return m;
    });
}

techInput.addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const val = techInput.value.trim();
        if (val && !techs.includes(val)) {
            techs.push(val);
            renderTags();
        }
        techInput.value = '';
    }
});

function removeTech(i) {
    techs.splice(i, 1);
    renderTags();
}

// Initialize tags on page load
renderTags();

// Optional: Auto-generate slug from title (if you want to allow slug editing)
const titleInput = document.querySelector('input[name="title"]');
const slugInput = document.querySelector('input[name="slug"]');
if (titleInput && slugInput) {
    titleInput.addEventListener('blur', function() {
        if (!slugInput.value || slugInput.value === '') {
            const slug = this.value.toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/^-+|-+$/g, '');
            slugInput.value = slug;
        }
    });
}
</script>
@endpush
@endsection
