@extends('layouts.admin')
@section('title', 'Tambah Proyek')

@section('content')
<div class="max-w-4xl">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Main Content --}}
            <div class="lg:col-span-2 space-y-5">
                <div class="admin-card p-6 space-y-5">
                    <h3 class="font-semibold text-gray-700 border-b pb-3">Informasi Proyek</h3>

                    <div>
                        <label class="form-label">Judul Proyek <span class="text-red-500">*</span></label>
                        <input type="text" name="title" value="{{ old('title') }}" class="form-input" required>
                        @error('title')<p class="form-error">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Deskripsi Singkat <span class="text-red-500">*</span></label>
                        <textarea name="short_description" rows="2" class="form-input" required>{{ old('short_description') }}</textarea>
                        @error('short_description')<p class="form-error">{{ $message }}</p>@enderror
                    </div>

                    <div>
                        <label class="form-label">Deskripsi Lengkap</label>
                        <textarea name="full_description" rows="8" class="form-input" id="editor">{{ old('full_description') }}</textarea>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label">Nama Klien</label>
                            <input type="text" name="client_name" value="{{ old('client_name') }}" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">Tanggal Proyek</label>
                            <input type="date" name="project_date" value="{{ old('project_date') }}" class="form-input">
                        </div>
                        <div>
                            <label class="form-label">URL Proyek</label>
                            <input type="url" name="project_url" value="{{ old('project_url') }}" class="form-input" placeholder="https://...">
                        </div>
                        <div>
                            <label class="form-label">Kategori</label>
                            <input type="text" name="category" value="{{ old('category') }}" class="form-input" placeholder="Web App, Mobile, dll">
                        </div>
                    </div>

                    <div>
                        <label class="form-label">Teknologi yang Digunakan</label>
                        <input type="text" name="technologies_input" id="techInput" class="form-input"
                               placeholder="Ketik dan tekan Enter...">
                        <div id="techTags" class="flex flex-wrap gap-2 mt-2"></div>
                        <div id="techHiddenInputs"></div>
                    </div>
                </div>

                {{-- SEO --}}
                <div class="admin-card p-6 space-y-4">
                    <h3 class="font-semibold text-gray-700 border-b pb-3">SEO</h3>
                    <div>
                        <label class="form-label">Meta Title <span class="text-xs text-gray-400">(max 60 karakter)</span></label>
                        <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="form-input" maxlength="60">
                    </div>
                    <div>
                        <label class="form-label">Meta Description <span class="text-xs text-gray-400">(max 160 karakter)</span></label>
                        <textarea name="meta_description" rows="2" class="form-input" maxlength="160">{{ old('meta_description') }}</textarea>
                    </div>
                    <div>
                        <label class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" value="{{ old('meta_keywords') }}" class="form-input" placeholder="keyword1, keyword2, ...">
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="space-y-5">
                <div class="admin-card p-6 space-y-4">
                    <h3 class="font-semibold text-gray-700 border-b pb-3">Pengaturan</h3>

                    <div>
                        <label class="form-label">Status <span class="text-red-500">*</span></label>
                        <select name="status" class="form-input">
                            <option value="draft" {{ old('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="published" {{ old('status') === 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-3">
                        <input type="checkbox" name="is_featured" id="is_featured" value="1"
                               {{ old('is_featured') ? 'checked' : '' }}
                               class="w-4 h-4 text-dotech-blue rounded border-gray-300">
                        <label for="is_featured" class="text-sm text-gray-700">Tampilkan di Beranda</label>
                    </div>

                    <div>
                        <label class="form-label">Featured Image</label>
                        <div class="mt-1">
                            <label class="flex flex-col items-center justify-center w-full h-40 border-2 border-dashed border-gray-200 rounded-xl cursor-pointer hover:border-dotech-blue transition-colors bg-gray-50" id="imgLabel">
                                <svg class="w-8 h-8 text-gray-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span class="text-sm text-gray-400">Klik untuk upload</span>
                                <img id="imgPreview" class="hidden max-h-36 rounded-lg mt-2">
                                <input type="file" name="featured_image" accept="image/*" class="hidden" id="imgInput">
                            </label>
                        </div>
                        @error('featured_image')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                </div>

                <div class="admin-card p-6 space-y-4">
                    <h3 class="font-semibold text-gray-700 border-b pb-3">Galeri Foto</h3>
                    <input type="file" name="images[]" multiple accept="image/*" class="form-input text-xs">
                    <p class="text-xs text-gray-400">Upload beberapa foto sekaligus (jpg, png, webp)</p>
                </div>

                <div class="flex gap-3">
                    <a href="{{ route('admin.projects.index') }}" class="btn-admin bg-gray-500 hover:bg-gray-600 flex-1 justify-center">
                        Batal
                    </a>
                    <button type="submit" class="btn-admin flex-1 justify-center">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
// Image Preview
document.getElementById('imgInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = (e) => {
        const preview = document.getElementById('imgPreview');
        preview.src = e.target.result;
        preview.classList.remove('hidden');
    };
    reader.readAsDataURL(file);
});

// Tech Tags
const techInput = document.getElementById('techInput');
const techTags  = document.getElementById('techTags');
const hidden    = document.getElementById('techHiddenInputs');
let techs = [];

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

function renderTags() {
    techTags.innerHTML = '';
    hidden.innerHTML = '';
    techs.forEach((t, i) => {
        techTags.innerHTML += `<span class="inline-flex items-center gap-1 bg-blue-100 text-blue-700 text-xs font-medium px-2.5 py-1 rounded-full">
            ${t}<button type="button" onclick="removeTech(${i})" class="text-blue-400 hover:text-red-500">×</button></span>`;
        hidden.innerHTML += `<input type="hidden" name="technologies[]" value="${t}">`;
    });
}
function removeTech(i) { techs.splice(i, 1); renderTags(); }
</script>
@endpush
@endsection
