@extends('layouts.admin')
@section('title', 'Edit Layanan')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-0">
        <form method="POST" action="{{ route('admin.services.update', $service) }}" class="space-y-6" autocomplete="off">
            @csrf
            @method('PUT')

            {{-- Header --}}
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-2xl font-bold bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent">
                        Edit Layanan</h1>
                    <p class="text-sm text-gray-500 mt-1">Perbarui informasi layanan yang ditawarkan</p>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('admin.services.index') }}"
                        class="px-5 py-2.5 bg-gray-100 hover:bg-gray-200 text-gray-700 text-sm font-medium rounded-xl transition-all">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-5 py-2.5 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-medium rounded-xl shadow-lg shadow-blue-500/25 transition-all duration-200 transform hover:scale-[1.02]">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Update Layanan
                    </button>
                </div>
            </div>

            {{-- Form Content --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Main Content --}}
                <div class="lg:col-span-2 space-y-6">
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                            <div class="w-8 h-8 bg-blue-50 rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800">Informasi Layanan</h3>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Judul Layanan <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="title" value="{{ old('title', $service->title) }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                                placeholder="Masukkan judul layanan" required>
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Layanan <span
                                    class="text-red-500">*</span></label>
                            <textarea name="description" rows="6"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all resize-none"
                                placeholder="Tulis deskripsi lengkap layanan..." required>{{ old('description', $service->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <div class="flex justify-between items-center mt-1">
                                <p class="text-xs text-gray-400">Deskripsi lengkap tentang layanan yang ditawarkan</p>
                                <p class="text-xs text-gray-400" id="charCount">
                                    {{ strlen(old('description', $service->description)) }} karakter</p>
                            </div>
                        </div>

                        {{-- Update: Ikon Layanan dengan FontAwesome Picker --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Ikon Layanan</label>
                            <div class="relative" id="iconPickerContainer">
                                <div class="flex items-center gap-2">
                                    <div class="relative flex-1">
                                        <input type="text" name="icon" id="iconInput"
                                            value="{{ old('icon', $service->icon) }}"
                                            class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all font-mono"
                                            placeholder="Cari atau pilih ikon... (cth: fas fa-rocket)">
                                        <div class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 cursor-pointer p-1 hover:text-blue-500 transition-colors"
                                            id="toggleIconPicker">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 9l-7 7-7-7" />
                                            </svg>
                                        </div>
                                    </div>
                                    {{-- Mini Preview Box --}}
                                    <div class="w-[50px] h-[50px] flex items-center justify-center bg-gray-50 border border-gray-200 rounded-xl text-xl text-gray-700"
                                        id="smallIconPreview">
                                        <i class="{{ old('icon', $service->icon) ?: 'fas fa-cogs' }}"></i>
                                    </div>
                                </div>

                                {{-- Dropdown Modal Picker --}}
                                <div id="iconPickerDropdown"
                                    class="absolute z-10 left-0 top-full mt-2 w-full bg-white border border-gray-200 rounded-xl shadow-lg hidden overflow-hidden">
                                    <div class="p-3 border-b border-gray-100 bg-gray-50">
                                        <input type="text" id="iconSearch"
                                            class="w-full px-3 py-2 bg-white border border-gray-200 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"
                                            placeholder="Cari ikon (cth: laptop, user, chart)...">
                                    </div>
                                    <div class="p-3 grid grid-cols-6 sm:grid-cols-8 gap-2 max-h-60 overflow-y-auto"
                                        id="iconGrid">
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-400 mt-2">Pilih ikon dari daftar atau ketik class FontAwesome secara
                                manual</p>
                            @error('icon')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Sidebar --}}
                <div class="space-y-6">
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-5 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                            <div class="w-8 h-8 bg-indigo-50 rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800">Pengaturan</h3>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <div class="relative">
                                <select name="is_active"
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all appearance-none cursor-pointer">
                                    <option value="1"
                                        {{ old('is_active', $service->is_active) == '1' ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="0"
                                        {{ old('is_active', $service->is_active) == '0' ? 'selected' : '' }}>Nonaktif
                                    </option>
                                </select>
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Layanan aktif akan ditampilkan di website</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Urutan Tampil</label>
                            <input type="number" name="sort_order"
                                value="{{ old('sort_order', $service->sort_order) }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 focus:bg-white transition-all"
                                placeholder="0">
                            <p class="text-xs text-gray-400 mt-1">Semakin kecil angka, semakin atas posisinya</p>
                        </div>

                        {{-- <div
                            class="flex items-center justify-between p-3 bg-gradient-to-r from-amber-50 to-yellow-50 rounded-xl">
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.363 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.363-1.118l-2.8-2.034c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                            </div>
                            {{-- <div class="relative inline-block w-10 mr-2 align-middle select-none">
                                <input type="checkbox" name="is_featured" id="is_featured" value="1"
                                    {{ old('is_featured', $service->is_featured) ? 'checked' : '' }}
                                    class="toggle-checkbox absolute block w-5 h-5 rounded-full bg-white border-4 appearance-none cursor-pointer">
                                <label for="is_featured"
                                    class="toggle-label block overflow-hidden h-5 rounded-full bg-gray-300 cursor-pointer"></label>
                            </div> --}}
                        {{-- </div> --}}
                    </div>

                    {{-- Preview Card --}}
                    <div
                        class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 space-y-4 hover:shadow-md transition-shadow">
                        <div class="flex items-center gap-3 pb-4 border-b border-gray-100">
                            <div class="w-8 h-8 bg-purple-50 rounded-xl flex items-center justify-center">
                                <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h3 class="font-semibold text-gray-800">Preview Layanan</h3>
                        </div>

                        <div class="p-4 bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl" id="previewCard">
                            <div class="text-center space-y-3">
                                <div class="text-5xl text-blue-600" id="previewIcon">
                                    <i class="{{ old('icon', $service->icon) ?: 'fas fa-cogs' }}"></i>
                                </div>
                                <h4 class="font-bold text-gray-800" id="previewTitle">
                                    {{ old('title', $service->title) ?: 'Judul Layanan' }}</h4>
                                <p class="text-sm text-gray-600 line-clamp-3" id="previewDescription">
                                    {{ old('description', Str::limit($service->description, 100)) ?: 'Deskripsi layanan akan muncul di sini...' }}
                                </p>
                            </div>
                        </div>
                        <p class="text-xs text-gray-400 text-center">Preview akan berubah saat Anda mengedit</p>
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

            .toggle-checkbox:checked+.toggle-label {
                background-color: #4f46e5;
            }

            .toggle-checkbox {
                right: 0;
                transition: all 0.3s ease;
            }

            .toggle-label {
                transition: background-color 0.3s ease;
            }

            .line-clamp-3 {
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
                overflow: hidden;
            }
        </style>
    @endpush

    @push('scripts')
        <script>
            // Elements Reference
            const titleInput = document.querySelector('input[name="title"]');
            const descriptionInput = document.querySelector('textarea[name="description"]');
            const iconInput = document.getElementById('iconInput');
            const previewTitle = document.getElementById('previewTitle');
            const previewDescription = document.getElementById('previewDescription');
            const previewIcon = document.getElementById('previewIcon');
            const smallIconPreview = document.getElementById('smallIconPreview');
            const charCount = document.getElementById('charCount');

            // Fallback default values
            const defaultTitle = @json($service->title);
            const defaultDesc = @json(Str::limit($service->description, 100));

            // --- 1. LIVE PREVIEW LOGIC ---
            function updatePreview() {
                previewTitle.textContent = titleInput.value || defaultTitle || 'Judul Layanan';
                previewDescription.textContent = descriptionInput.value || defaultDesc ||
                    'Deskripsi layanan akan muncul di sini...';

                const iconClass = iconInput.value.trim() || 'fas fa-cogs';

                // Update large preview
                previewIcon.innerHTML = `<i class="${iconClass}"></i>`;
                // Update mini box preview
                smallIconPreview.innerHTML = `<i class="${iconClass}"></i>`;
            }

            titleInput.addEventListener('input', updatePreview);
            descriptionInput.addEventListener('input', updatePreview);
            iconInput.addEventListener('input', updatePreview);

            // --- 2. CHARACTER COUNTER ---
            descriptionInput.addEventListener('input', function() {
                const count = this.value.length;
                charCount.textContent = count + ' karakter';
                if (count > 500) {
                    charCount.classList.add('text-red-500');
                    charCount.classList.remove('text-gray-400');
                } else {
                    charCount.classList.remove('text-red-500');
                    charCount.classList.add('text-gray-400');
                }
            });

            // --- 3. CUSTOM FONTAWESOME ICON PICKER ---
            const iconPickerContainer = document.getElementById('iconPickerContainer');
            const iconPickerDropdown = document.getElementById('iconPickerDropdown');
            const toggleIconPicker = document.getElementById('toggleIconPicker');
            const iconSearch = document.getElementById('iconSearch');
            const iconGrid = document.getElementById('iconGrid');

            // Koleksi Ikon FontAwesome
            const faIcons = [
                'fas fa-cogs', 'fas fa-rocket', 'fas fa-laptop', 'fas fa-mobile-alt', 'fas fa-desktop',
                'fas fa-code', 'fas fa-chart-line', 'fas fa-chart-bar', 'fas fa-bullhorn',
                'fas fa-envelope', 'fas fa-comments', 'fas fa-users', 'fas fa-user-tie',
                'fas fa-cog', 'fas fa-wrench', 'fas fa-shield-alt', 'fas fa-lock',
                'fas fa-server', 'fas fa-database', 'fas fa-cloud', 'fas fa-headset',
                'fas fa-camera', 'fas fa-video', 'fas fa-music', 'fas fa-globe',
                'fas fa-map-marker-alt', 'fas fa-truck', 'fas fa-store', 'fas fa-shopping-cart',
                'fas fa-credit-card', 'fas fa-wallet', 'fas fa-briefcase', 'fas fa-paint-brush',
                'fas fa-pen', 'fas fa-book', 'fas fa-graduation-cap', 'fas fa-heart',
                'fas fa-star', 'fas fa-check-circle', 'fas fa-info-circle', 'fas fa-leaf',
                'fas fa-bolt', 'fas fa-fire', 'fas fa-home', 'fas fa-building'
            ];

            function renderIcons(filterText = '') {
                iconGrid.innerHTML = '';
                const filtered = faIcons.filter(icon => icon.includes(filterText.toLowerCase()));

                if (filtered.length === 0) {
                    iconGrid.innerHTML =
                        '<p class="text-xs text-gray-500 col-span-full text-center py-4">Ikon tidak ditemukan</p>';
                    return;
                }

                filtered.forEach(icon => {
                    const btn = document.createElement('button');
                    btn.type = 'button';
                    btn.className =
                        'flex items-center justify-center p-3 text-gray-600 bg-gray-50 hover:bg-blue-50 hover:text-blue-600 rounded-lg transition-all border border-transparent hover:border-blue-200 focus:outline-none focus:ring-2 focus:ring-blue-500 transform hover:scale-110';
                    btn.innerHTML = `<i class="${icon} text-xl"></i>`;
                    btn.title = icon;
                    btn.onclick = () => {
                        iconInput.value = icon;
                        iconPickerDropdown.classList.add('hidden');
                        updatePreview();
                    };
                    iconGrid.appendChild(btn);
                });
            }

            // Initilize Picker
            renderIcons();

            // Toggle Dropdown Events
            toggleIconPicker.addEventListener('click', () => {
                iconPickerDropdown.classList.toggle('hidden');
                if (!iconPickerDropdown.classList.contains('hidden')) {
                    iconSearch.focus();
                }
            });

            iconInput.addEventListener('click', () => {
                iconPickerDropdown.classList.remove('hidden');
            });

            // Search Filter Event
            iconSearch.addEventListener('input', (e) => {
                renderIcons(e.target.value);
            });

            // Close Dropdown when clicking outside
            document.addEventListener('click', (e) => {
                if (!iconPickerContainer.contains(e.target)) {
                    iconPickerDropdown.classList.add('hidden');
                }
            });

            // Trigger initial state on load
            updatePreview();
        </script>
    @endpush
@endsection
