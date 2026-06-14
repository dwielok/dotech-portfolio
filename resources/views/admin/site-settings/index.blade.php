@extends('layouts.admin')
@section('title', 'Site Settings')

@section('content')
    <div class="space-y-6">
        {{-- Header --}}
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-800">Site Settings</h1>
                <p class="text-sm text-gray-500 mt-0.5">Kelola pengaturan website Anda</p>
            </div>
        </div>

        {{-- Tabs Navigation --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="border-b border-gray-100">
                <nav class="flex space-x-1 px-4 pt-3">
                    <button onclick="switchTab('hero')" id="tab-hero-btn"
                        class="tab-btn px-5 py-2.5 rounded-t-xl text-sm font-medium transition-all duration-200 flex items-center gap-2 bg-gradient-to-r from-dotech-blue to-blue-600 text-white shadow-md">
                        <i class="fas fa-tv text-sm"></i>
                        <span>Hero Section</span>
                    </button>
                    <button onclick="switchTab('about')" id="tab-about-btn"
                        class="tab-btn px-5 py-2.5 rounded-t-xl text-sm font-medium transition-all duration-200 flex items-center gap-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-building text-sm"></i>
                        <span>About Us</span>
                    </button>
                    <button onclick="switchTab('contact')" id="tab-contact-btn"
                        class="tab-btn px-5 py-2.5 rounded-t-xl text-sm font-medium transition-all duration-200 flex items-center gap-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-address-card text-sm"></i>
                        <span>Kontak Info</span>
                    </button>
                    <button onclick="switchTab('social')" id="tab-social-btn"
                        class="tab-btn px-5 py-2.5 rounded-t-xl text-sm font-medium transition-all duration-200 flex items-center gap-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-share-alt text-sm"></i>
                        <span>Social Links</span>
                    </button>
                    <button onclick="switchTab('teams')" id="tab-teams-btn"
                        class="tab-btn px-5 py-2.5 rounded-t-xl text-sm font-medium transition-all duration-200 flex items-center gap-2 text-gray-500 hover:text-gray-700 hover:bg-gray-50">
                        <i class="fas fa-users text-sm"></i>
                        <span>Teams</span>
                    </button>
                </nav>
            </div>

            <div class="p-6">
                {{-- Hero Section Tab --}}
                <div id="tab-hero" class="tab-content">
                    <form action="{{ route('admin.site-settings.hero.update') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">Hero Section</h2>
                                <p class="text-sm text-gray-500 mt-0.5">Atur konten hero section di halaman depan</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                                    {{ $hero->is_active ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-dotech-blue">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">Aktif</span>
                            </label>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Headline</label>
                                <input type="text" name="headline" value="{{ old('headline', $hero->headline) }}"
                                    placeholder="Solusi Digital <span class='bg-gradient-to-r...'>Terpercaya</span> untuk Bisnis Anda"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                <p class="text-xs text-gray-400 mt-1">Support HTML tags untuk gradient text</p>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Subheadline</label>
                                <input type="text" name="subheadline"
                                    value="{{ old('subheadline', $hero->subheadline) }}"
                                    placeholder="Digital Solution Partner"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                            <textarea name="description" id="hero-description" rows="4"
                                placeholder="Kami membantu bisnis Anda berkembang dengan teknologi modern..."
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">{{ old('description', $hero->description) }}</textarea>
                            <p class="text-xs text-gray-400 mt-1">Support HTML tags untuk formatting teks</p>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            {{-- CTA Primary --}}
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">CTA Primary Button</label>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs text-gray-500 mb-1">Text</label>
                                        <input type="text" name="cta_primary_text"
                                            value="{{ old('cta_primary_text', $hero->cta_primary_text) }}"
                                            placeholder="Konsultasi Gratis"
                                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-500 mb-1">URL / Route</label>
                                        <div class="flex gap-2">
                                            <input type="text" name="cta_primary_url" id="cta_primary_url"
                                                value="{{ old('cta_primary_url', $hero->cta_primary_url) }}"
                                                placeholder="{{ route('contact') }}"
                                                class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                            <button type="button" onclick="openRouteSelector('primary')"
                                                class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                                                <i class="fas fa-link text-gray-600"></i>
                                            </button>
                                        </div>
                                        <p class="text-xs text-gray-400 mt-1">Contoh: /contact, /projects, atau route name
                                        </p>
                                    </div>
                                </div>
                            </div>

                            {{-- CTA Secondary --}}
                            <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                <label class="block text-sm font-semibold text-gray-700 mb-3">CTA Secondary Button</label>
                                <div class="space-y-3">
                                    <div>
                                        <label class="block text-xs text-gray-500 mb-1">Text</label>
                                        <input type="text" name="cta_secondary_text"
                                            value="{{ old('cta_secondary_text', $hero->cta_secondary_text) }}"
                                            placeholder="Lihat Proyek"
                                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                    </div>
                                    <div>
                                        <label class="block text-xs text-gray-500 mb-1">URL / Route</label>
                                        <div class="flex gap-2">
                                            <input type="text" name="cta_secondary_url" id="cta_secondary_url"
                                                value="{{ old('cta_secondary_url', $hero->cta_secondary_url) }}"
                                                placeholder="{{ route('projects.index') }}"
                                                class="flex-1 px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                            <button type="button" onclick="openRouteSelector('secondary')"
                                                class="px-3 py-2 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                                                <i class="fas fa-link text-gray-600"></i>
                                            </button>
                                        </div>
                                        <p class="text-xs text-gray-400 mt-1">Contoh: /contact, /projects, atau route name
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Background Image</label>
                            @if ($hero->background_image_url)
                                <div id="currentImageContainer"
                                    class="mb-3 p-3 bg-gray-50 rounded-xl flex items-center gap-3">
                                    <img src="{{ $hero->background_image_url }}" alt="Current" id="currentImagePreview"
                                        class="w-20 h-20 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-600">Current image</p>
                                        <button type="button" onclick="confirmDeleteImage()"
                                            class="text-xs text-red-600 hover:text-red-700 mt-1 flex items-center gap-1">
                                            <i class="fas fa-trash-alt"></i> Hapus gambar
                                        </button>
                                    </div>
                                </div>
                                <input type="hidden" name="remove_image" id="remove_image" value="0">
                            @endif
                            <input type="file" name="background_image" id="background_image" accept="image/*"
                                onchange="previewImage(this)"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <div id="newImagePreview" class="mt-3 hidden">
                                <div class="p-3 bg-gray-50 rounded-xl flex items-center gap-3">
                                    <img id="newPreviewImg" src="" alt="Preview"
                                        class="w-20 h-20 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-600">New image preview</p>
                                        <button type="button" onclick="clearNewImage()"
                                            class="text-xs text-red-600 hover:text-red-700 mt-1">Batal</button>
                                    </div>
                                </div>
                            </div>
                            <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, WEBP. Max: 5MB. Rekomendasi:
                                1920x1080px</p>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Route Selector Modal --}}
                <div id="routeModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                        <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75"
                            onclick="closeRouteModal()"></div>
                        <div
                            class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-6 pt-6 pb-4">
                                <h3 class="text-xl font-bold text-gray-900 mb-4">Pilih Route</h3>
                                <div class="space-y-3">
                                    <div class="relative">
                                        <i
                                            class="fas fa-search absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                                        <input type="text" id="routeSearch" placeholder="Cari route..."
                                            class="w-full pl-9 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                    </div>
                                    <div class="max-h-96 overflow-y-auto space-y-2">
                                        @php
                                            $routes = [
                                                ['name' => 'Homepage', 'url' => '/', 'route' => 'home'],
                                                [
                                                    'name' => 'Projects',
                                                    'url' => '/projects',
                                                    'route' => 'projects.index',
                                                ],
                                                [
                                                    'name' => 'Project Detail',
                                                    'url' => '/projects/{slug}',
                                                    'route' => 'projects.show',
                                                    'dynamic' => true,
                                                ],
                                                [
                                                    'name' => 'Services',
                                                    'url' => '/services',
                                                    'route' => 'services.index',
                                                ],
                                                ['name' => 'Contact', 'url' => '/contact', 'route' => 'contact'],
                                                ['name' => 'About Us', 'url' => '/about', 'route' => 'about'],
                                            ];
                                        @endphp
                                        @foreach ($routes as $route)
                                            <button type="button" onclick="selectRoute('{{ $route['url'] }}')"
                                                class="route-item w-full text-left px-4 py-3 hover:bg-gray-50 rounded-lg transition border border-gray-100"
                                                data-name="{{ $route['name'] }}" data-url="{{ $route['url'] }}">
                                                <div class="font-medium text-gray-800">{{ $route['name'] }}</div>
                                                <div class="text-xs text-gray-500 mt-0.5">{{ $route['url'] }}</div>
                                            </button>
                                        @endforeach
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">Atau masukkan URL
                                            kustom</label>
                                        <input type="text" id="customUrl" placeholder="/custom-url"
                                            class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                                <button type="button" onclick="closeRouteModal()"
                                    class="px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                                    Batal
                                </button>
                                <button type="button" onclick="applyRoute()"
                                    class="px-5 py-2.5 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition">
                                    <i class="fas fa-check mr-2"></i>Pilih
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- About Us Tab --}}
                <div id="tab-about" class="tab-content" style="display: none;">
                    <form action="{{ route('admin.site-settings.about.update') }}" method="POST"
                        enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">About Us</h2>
                                <p class="text-sm text-gray-500 mt-0.5">Atur konten about us section</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                                    {{ $about->is_active ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-dotech-blue">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">Aktif</span>
                            </label>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Title</label>
                                <input type="text" name="title" value="{{ old('title', $about->title) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Subtitle</label>
                                <input type="text" name="subtitle" value="{{ old('subtitle', $about->subtitle) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                            <textarea name="description" id="about-description" rows="8" class="rich-editor">{{ old('description', $about->description) }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Visi</label>
                                <textarea name="vision" id="about-vision" rows="6" class="rich-editor">{{ old('vision', $about->vision) }}</textarea>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Misi</label>
                                <textarea name="mission" id="about-mission" rows="6" class="rich-editor">{{ old('mission', $about->mission) }}</textarea>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Years Experience</label>
                                <input type="number" name="years_experience"
                                    value="{{ old('years_experience', $about->years_experience) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Projects Completed</label>
                                <input type="number" name="projects_completed"
                                    value="{{ old('projects_completed', $about->projects_completed) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Happy Clients</label>
                                <input type="number" name="happy_clients"
                                    value="{{ old('happy_clients', $about->happy_clients) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Image</label>
                            @if ($about->image_url)
                                <div class="mb-3 p-3 bg-gray-50 rounded-xl flex items-center gap-3">
                                    <img src="{{ $about->image_url }}" alt="Current"
                                        class="w-20 h-20 object-cover rounded-lg">
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-600">Current image</p>
                                        <button type="button"
                                            onclick="document.getElementById('remove_about_image').value='1'"
                                            class="text-xs text-red-600 hover:text-red-700 mt-1">Hapus gambar</button>
                                    </div>
                                </div>
                                <input type="hidden" name="remove_about_image" id="remove_about_image" value="0">
                            @endif
                            <input type="file" name="image" accept="image/*"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                            <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, WEBP. Max: 5MB</p>
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Contact Info Tab (sama seperti sebelumnya) --}}
                <div id="tab-contact" class="tab-content" style="display: none;">
                    <!-- Same as before -->
                    <form action="{{ route('admin.site-settings.contact.update') }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">Kontak Informasi</h2>
                                <p class="text-sm text-gray-500 mt-0.5">Atur informasi kontak perusahaan</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer"
                                    {{ $contact->is_active ? 'checked' : '' }}>
                                <div
                                    class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-dotech-blue">
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">Aktif</span>
                            </label>
                        </div>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Company Name</label>
                                <input type="text" name="company_name"
                                    value="{{ old('company_name', $contact->company_name) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                <input type="email" name="email" value="{{ old('email', $contact->email) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone', $contact->phone) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">WhatsApp</label>
                                <input type="text" name="whatsapp" value="{{ old('whatsapp', $contact->whatsapp) }}"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                <p class="text-xs text-gray-400 mt-1">Contoh: 628123456789</p>
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Alamat</label>
                            <textarea name="address" rows="3"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">{{ old('address', $contact->address) }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Google Maps Embed Code</label>
                            <textarea name="google_maps_embed" rows="4"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition font-mono text-sm">{{ old('google_maps_embed', $contact->google_maps_embed) }}</textarea>
                            <p class="text-xs text-gray-400 mt-1">Tempelkan kode embed Google Maps di sini</p>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Office Hours</label>
                            <input type="text" name="office_hours"
                                value="{{ old('office_hours', $contact->office_hours) }}"
                                placeholder="Senin - Jumat, 09:00 - 17:00"
                                class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                        </div>

                        <div class="flex justify-end pt-4">
                            <button type="submit"
                                class="px-6 py-2.5 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all">
                                <i class="fas fa-save mr-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Social Links Tab (sama seperti sebelumnya) --}}
                <div id="tab-social" class="tab-content" style="display: none;">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">Social Links</h2>
                                <p class="text-sm text-gray-500 mt-0.5">Kelola tautan media sosial</p>
                            </div>
                            <button type="button" onclick="openAddSocialModal()"
                                class="px-4 py-2 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all flex items-center gap-2">
                                <i class="fas fa-plus"></i>
                                <span>Tambah Social Link</span>
                            </button>
                        </div>

                        <div class="space-y-3" id="socialLinksList">
                            @forelse($socialLinks as $link)
                                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between group"
                                    data-id="{{ $link->id }}">
                                    <div class="flex items-center gap-4 flex-1">
                                        <div class="cursor-move text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>
                                        <div
                                            class="w-10 h-10 rounded-xl bg-white flex items-center justify-center shadow-sm">
                                            @if ($link->icon)
                                                <i class="{{ $link->icon }} text-xl"></i>
                                            @else
                                                <i class="fas fa-share-alt text-gray-400"></i>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2">
                                                <h4 class="font-semibold text-gray-800">{{ $link->platform }}</h4>
                                                @if (!$link->is_active)
                                                    <span
                                                        class="text-xs px-2 py-0.5 rounded-full bg-gray-200 text-gray-600">Tidak
                                                        Aktif</span>
                                                @endif
                                            </div>
                                            <a href="{{ $link->url }}" target="_blank"
                                                class="text-sm text-dotech-blue hover:underline break-all">
                                                {{ Str::limit($link->url, 50) }}
                                            </a>
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="toggle-social sr-only peer"
                                                data-id="{{ $link->id }}" {{ $link->is_active ? 'checked' : '' }}>
                                            <div
                                                class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-dotech-blue">
                                            </div>
                                        </label>
                                        <button
                                            onclick="editSocialLink({{ $link->id }}, '{{ $link->platform }}', '{{ $link->url }}', '{{ $link->icon }}', {{ $link->sort_order }})"
                                            class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteSocialLink({{ $link->id }})"
                                            class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <div
                                        class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-share-alt text-gray-400 text-2xl"></i>
                                    </div>
                                    <p class="text-gray-500">Belum ada social link</p>
                                    <p class="text-sm text-gray-400 mt-1">Klik tombol "Tambah Social Link" untuk
                                        menambahkan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                {{-- Teams Tab --}}
                <div id="tab-teams" class="tab-content" style="display: none;">
                    <div class="space-y-6">
                        <div class="flex items-center justify-between pb-4 border-b border-gray-100">
                            <div>
                                <h2 class="text-lg font-semibold text-gray-800">Team Members</h2>
                                <p class="text-sm text-gray-500 mt-0.5">Kelola anggota tim perusahaan</p>
                            </div>
                            <button type="button" onclick="openAddTeamModal()"
                                class="px-4 py-2 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition-all flex items-center gap-2">
                                <i class="fas fa-plus"></i>
                                <span>Tambah Member</span>
                            </button>
                        </div>

                        <div class="space-y-3" id="teamsList">
                            @forelse($teams as $team)
                                <div class="bg-gray-50 rounded-xl p-4 flex items-center justify-between group"
                                    data-id="{{ $team->id }}">
                                    <div class="flex items-center gap-4 flex-1">
                                        <div class="cursor-move text-gray-400 hover:text-gray-600">
                                            <i class="fas fa-grip-vertical"></i>
                                        </div>
                                        <div
                                            class="w-14 h-14 rounded-xl bg-white flex items-center justify-center shadow-sm overflow-hidden">
                                            @if ($team->image_url)
                                                <img src="{{ $team->image_url }}" alt="{{ $team->name }}"
                                                    class="w-full h-full object-cover">
                                            @else
                                                <i class="fas fa-user text-gray-400 text-2xl"></i>
                                            @endif
                                        </div>
                                        <div class="flex-1">
                                            <div class="flex items-center gap-2">
                                                <h4 class="font-semibold text-gray-800">{{ $team->name }}</h4>
                                                <span
                                                    class="text-xs px-2 py-0.5 rounded-full bg-blue-100 text-blue-600">{{ $team->title }}</span>
                                                @if ($team->is_featured)
                                                    <span
                                                        class="text-xs px-2 py-0.5 rounded-full bg-yellow-100 text-yellow-600">
                                                        <i class="fas fa-star text-xs mr-1"></i>Featured
                                                    </span>
                                                @endif
                                                @if (!$team->is_active)
                                                    <span
                                                        class="text-xs px-2 py-0.5 rounded-full bg-gray-200 text-gray-600">Tidak
                                                        Aktif</span>
                                                @endif
                                            </div>
                                            <div class="flex items-center gap-3 mt-1">
                                                @if ($team->email)
                                                    <a href="mailto:{{ $team->email }}"
                                                        class="text-xs text-gray-500 hover:text-dotech-blue">
                                                        <i class="fas fa-envelope"></i> {{ $team->email }}
                                                    </a>
                                                @endif
                                                @if ($team->experience_years)
                                                    <span class="text-xs text-gray-500">
                                                        <i class="fas fa-calendar-alt"></i> {{ $team->experience_years }}
                                                        tahun
                                                    </span>
                                                @endif
                                            </div>
                                            @if ($team->expertise && count($team->expertise_list) > 0)
                                                <div class="flex items-center gap-1 mt-2 flex-wrap">
                                                    @foreach ($team->expertise_list as $skill)
                                                        <span
                                                            class="text-xs px-2 py-0.5 rounded-full bg-gray-200 text-gray-600">{{ $skill }}</span>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input type="checkbox" class="toggle-team sr-only peer"
                                                data-id="{{ $team->id }}" {{ $team->is_active ? 'checked' : '' }}>
                                            <div
                                                class="w-9 h-5 bg-gray-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-dotech-blue">
                                            </div>
                                        </label>
                                        <button onclick="editTeamMember({{ $team->id }})"
                                            class="p-2 text-gray-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                        <button onclick="deleteTeamMember({{ $team->id }})"
                                            class="p-2 text-gray-400 hover:text-red-600 hover:bg-red-50 rounded-lg transition">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-12">
                                    <div
                                        class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i class="fas fa-users text-gray-400 text-2xl"></i>
                                    </div>
                                    <p class="text-gray-500">Belum ada team member</p>
                                    <p class="text-sm text-gray-400 mt-1">Klik tombol "Tambah Member" untuk menambahkan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Add/Edit Social Link Modal --}}
    <div id="socialModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeSocialModal()"></div>
            <div
                class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <form id="socialForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="_method" id="formMethod" value="POST">
                    <input type="hidden" name="id" id="socialId">

                    <div class="bg-white px-6 pt-6 pb-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-4" id="modalTitle">Tambah Social Link</h3>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Platform</label>
                                <select name="platform" id="platform" required
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                    <option value="">Pilih Platform</option>
                                    <option value="Facebook">Facebook</option>
                                    <option value="Instagram">Instagram</option>
                                    <option value="Twitter">Twitter</option>
                                    <option value="LinkedIn">LinkedIn</option>
                                    <option value="YouTube">YouTube</option>
                                    <option value="TikTok">TikTok</option>
                                    <option value="GitHub">GitHub</option>
                                    <option value="WhatsApp">WhatsApp</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">URL</label>
                                <input type="url" name="url" id="url" required
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Icon Class (Optional)</label>
                                <input type="text" name="icon" id="icon" placeholder="fab fa-facebook"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                <p class="text-xs text-gray-400 mt-1">Contoh: fab fa-facebook, fab fa-instagram</p>
                            </div>

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
                                <input type="number" name="sort_order" id="sort_order" value="0"
                                    class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                            </div>

                            <label class="flex items-center gap-2 cursor-pointer">
                                <input type="checkbox" name="is_active" id="is_active" value="1" checked
                                    class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                <span class="text-sm text-gray-700">Aktif</span>
                            </label>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                        <button type="button" onclick="closeSocialModal()"
                            class="px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Add/Edit Team Member Modal --}}
    <div id="teamModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" onclick="closeTeamModal()"></div>
            <div
                class="inline-block align-bottom bg-white rounded-2xl text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full">
                <form id="teamForm" method="POST" action="" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" id="teamFormMethod" value="POST">
                    <input type="hidden" name="id" id="teamId">

                    <div class="bg-white px-6 pt-6 pb-4">
                        <h3 class="text-xl font-bold text-gray-900 mb-4" id="teamModalTitle">Tambah Team Member</h3>

                        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                            {{-- Left Column --}}
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nama Lengkap *</label>
                                    <input type="text" name="name" id="team_name" required
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Jabatan / Title *</label>
                                    <input type="text" name="title" id="team_title" required
                                        placeholder="CEO, Creative Director, dll"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Foto Profil *</label>
                                    <div id="team_image_preview" class="mb-3 hidden">
                                        <div class="p-3 bg-gray-50 rounded-xl flex items-center gap-3">
                                            <img id="team_image_preview_img" src="" alt="Preview"
                                                class="w-20 h-20 object-cover rounded-lg">
                                            <div class="flex-1">
                                                <p class="text-sm text-gray-600">Current image</p>
                                                <button type="button"
                                                    onclick="document.getElementById('team_image').value=''; document.getElementById('team_image_preview').classList.add('hidden');"
                                                    class="text-xs text-red-600 hover:text-red-700 mt-1">Hapus
                                                    gambar</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="file" name="image" id="team_image" accept="image/*"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                    <p class="text-xs text-gray-400 mt-1">Format: JPG, PNG, WEBP. Max: 5MB. Rekomendasi:
                                        400x400px</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Alt Text untuk
                                        Foto</label>
                                    <input type="text" name="image_alt" id="team_image_alt"
                                        placeholder="Deskripsi foto untuk SEO"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                    <input type="email" name="email" id="team_email"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone</label>
                                    <input type="text" name="phone" id="team_phone"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Tahun Pengalaman</label>
                                    <input type="number" name="experience_years" id="team_experience_years"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>
                            </div>

                            {{-- Right Column --}}
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Bio / Deskripsi</label>
                                    <textarea name="bio" id="team_bio" rows="4" placeholder="Ceritakan tentang anggota tim..."
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"></textarea>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Keahlian (pisahkan dengan
                                        koma)</label>
                                    <input type="text" name="expertise_input" id="team_expertise_input"
                                        placeholder="UI/UX Design, Frontend Development, Project Management"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                    <p class="text-xs text-gray-400 mt-1">Pisahkan setiap keahlian dengan koma</p>
                                </div>

                                <div class="border-t border-gray-200 pt-4">
                                    <label class="block text-sm font-semibold text-gray-700 mb-3">Social Media
                                        Links</label>

                                    <div class="space-y-3">
                                        <div class="flex items-center gap-2">
                                            <i class="fab fa-facebook text-blue-600 w-6"></i>
                                            <input type="url" name="facebook" id="team_facebook"
                                                placeholder="https://facebook.com/username"
                                                class="flex-1 px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <i class="fab fa-instagram text-pink-600 w-6"></i>
                                            <input type="url" name="instagram" id="team_instagram"
                                                placeholder="https://instagram.com/username"
                                                class="flex-1 px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <i class="fab fa-linkedin text-blue-700 w-6"></i>
                                            <input type="url" name="linkedin" id="team_linkedin"
                                                placeholder="https://linkedin.com/in/username"
                                                class="flex-1 px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                        </div>

                                        <div class="flex items-center gap-2">
                                            <i class="fab fa-twitter text-blue-400 w-6"></i>
                                            <input type="url" name="twitter" id="team_twitter"
                                                placeholder="https://twitter.com/username"
                                                class="flex-1 px-4 py-2 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Title (SEO)</label>
                                    <input type="text" name="meta_title" id="team_meta_title"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Meta Description
                                        (SEO)</label>
                                    <textarea name="meta_description" id="team_meta_description" rows="2"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition"></textarea>
                                </div>

                                <div class="flex items-center gap-4">
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="is_active" id="team_is_active" value="1"
                                            checked
                                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700">Aktif</span>
                                    </label>

                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="is_featured" id="team_is_featured" value="1"
                                            class="w-4 h-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="text-sm text-gray-700">Featured (Tampil di Homepage)</span>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Sort Order</label>
                                    <input type="number" name="sort_order" id="team_sort_order" value="0"
                                        class="w-full px-4 py-2.5 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gray-50 px-6 py-4 flex gap-3 justify-end">
                        <button type="button" onclick="closeTeamModal()"
                            class="px-5 py-2.5 bg-white border border-gray-300 rounded-xl text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-5 py-2.5 bg-gradient-to-r from-dotech-blue to-blue-600 text-white text-sm font-medium rounded-xl hover:shadow-lg transition">
                            <i class="fas fa-save mr-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('styles')
        <style>
            .tab-content {
                transition: all 0.3s ease;
            }

            /* Drag and drop styles */
            .dragging {
                opacity: 0.5;
                cursor: grabbing;
            }

            .drag-over {
                border-top: 2px solid #3b82f6;
            }

            /* TinyMCE custom styling */
            .tox-tinymce {
                border-radius: 0.75rem !important;
                border-color: #e5e7eb !important;
            }

            .tox:not(.tox-tinymce-inline) .tox-editor-header {
                border-top-left-radius: 0.75rem !important;
                border-top-right-radius: 0.75rem !important;
            }
        </style>
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js"></script>
        <script>
            // Tab switching function
            function switchTab(tabName) {
                const url = new URL(window.location.href);
                url.searchParams.set('tab', tabName);
                window.history.pushState({}, '', url);

                document.querySelectorAll('.tab-content').forEach(content => {
                    content.style.display = 'none';
                });

                document.querySelectorAll('.tab-btn').forEach(btn => {
                    btn.classList.remove('bg-gradient-to-r', 'from-dotech-blue', 'to-blue-600', 'text-white',
                        'shadow-md');
                    btn.classList.add('text-gray-500', 'hover:text-gray-700', 'hover:bg-gray-50');
                });

                const selectedTab = document.getElementById(`tab-${tabName}`);
                if (selectedTab) {
                    selectedTab.style.display = 'block';
                }

                const activeBtn = document.getElementById(`tab-${tabName}-btn`);
                if (activeBtn) {
                    activeBtn.classList.remove('text-gray-500', 'hover:text-gray-700', 'hover:bg-gray-50');
                    activeBtn.classList.add('bg-gradient-to-r', 'from-dotech-blue', 'to-blue-600', 'text-white', 'shadow-md');
                }
            }

            // Initialize TinyMCE Rich Text Editors
            function initRichEditors() {
                // Only initialize if not already initialized
                if (typeof tinymce !== 'undefined') {
                    // Destroy existing instances
                    if (tinymce.get('about-description')) tinymce.get('about-description').remove();
                    if (tinymce.get('about-vision')) tinymce.get('about-vision').remove();
                    if (tinymce.get('about-mission')) tinymce.get('about-mission').remove();

                    // Common configuration
                    const commonConfig = {
                        height: 300,
                        menubar: true,
                        plugins: [
                            'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                            'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                            'insertdatetime', 'media', 'table', 'help', 'wordcount', 'emoticons'
                        ],
                        toolbar: 'undo redo | blocks | ' +
                            'bold italic backcolor | alignleft aligncenter ' +
                            'alignright alignjustify | bullist numlist outdent indent | ' +
                            'removeformat | link image media | help | fullscreen | code',
                        content_style: 'body { font-family:Plus Jakarta Sans, Helvetica, Arial, sans-serif; font-size:14px }',
                        images_upload_url: '{{ route('admin.site-settings.upload-image') }}',
                        images_upload_handler: function(blobInfo, progress) {
                            return new Promise((resolve, reject) => {
                                const xhr = new XMLHttpRequest();
                                xhr.withCredentials = false;
                                xhr.open('POST', '{{ route('admin.site-settings.upload-image') }}');

                                xhr.upload.onprogress = function(e) {
                                    progress(e.loaded / e.total * 100);
                                };

                                xhr.onload = function() {
                                    if (xhr.status === 200) {
                                        const json = JSON.parse(xhr.responseText);
                                        resolve(json.location);
                                    } else {
                                        reject('HTTP Error: ' + xhr.status);
                                    }
                                };

                                const formData = new FormData();
                                formData.append('file', blobInfo.blob(), blobInfo.filename());
                                formData.append('_token', '{{ csrf_token() }}');
                                xhr.send(formData);
                            });
                        }
                    };

                    // Initialize editors
                    tinymce.init({
                        selector: '#about-description',
                        ...commonConfig,
                        height: 400
                    });

                    tinymce.init({
                        selector: '#about-vision',
                        ...commonConfig,
                        height: 350
                    });

                    tinymce.init({
                        selector: '#about-mission',
                        ...commonConfig,
                        height: 350
                    });
                }
            }

            // Check URL parameter on load
            document.addEventListener('DOMContentLoaded', function() {
                const urlParams = new URLSearchParams(window.location.search);
                const activeTab = urlParams.get('tab');
                if (activeTab && ['hero', 'about', 'contact', 'social', 'teams'].includes(activeTab)) {
                    switchTab(activeTab);
                } else {
                    switchTab('hero');
                }

                // Initialize rich text editors when about tab is shown
                initRichEditors();
            });

            // Re-initialize editors when about tab is clicked
            const originalSwitchTab = switchTab;
            window.switchTab = function(tabName) {
                originalSwitchTab(tabName);
                if (tabName === 'about') {
                    setTimeout(() => {
                        initRichEditors();
                    }, 100);
                }
            };

            // Sortable for social links
            const socialList = document.getElementById('socialLinksList');
            if (socialList && socialList.children.length > 0) {
                new Sortable(socialList, {
                    animation: 150,
                    handle: '.cursor-move',
                    ghostClass: 'dragging',
                    dragClass: 'drag-over',
                    onEnd: function() {
                        const items = document.querySelectorAll('#socialLinksList > div');
                        const orders = [];
                        items.forEach((item, index) => {
                            orders.push(item.dataset.id);
                        });

                        fetch('{{ route('admin.site-settings.social-links.reorder') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    orders: orders
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    showToast('Urutan berhasil diupdate', 'success');
                                }
                            });
                    }
                });
            }

            // Social Link Functions
            function openAddSocialModal() {
                document.getElementById('modalTitle').innerText = 'Tambah Social Link';
                document.getElementById('socialForm').action = '{{ route('admin.site-settings.social-links.store') }}';
                document.getElementById('formMethod').value = 'POST';
                document.getElementById('socialId').value = '';
                document.getElementById('platform').value = '';
                document.getElementById('url').value = '';
                document.getElementById('icon').value = '';
                document.getElementById('sort_order').value = '0';
                document.getElementById('is_active').checked = true;
                document.getElementById('socialModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function editSocialLink(id, platform, url, icon, sortOrder) {
                document.getElementById('modalTitle').innerText = 'Edit Social Link';
                document.getElementById('socialForm').action = `/admin/site-settings/social-links/${id}`;
                document.getElementById('formMethod').value = 'PUT';
                document.getElementById('socialId').value = id;
                document.getElementById('platform').value = platform;
                document.getElementById('url').value = url;
                document.getElementById('icon').value = icon || '';
                document.getElementById('sort_order').value = sortOrder || 0;
                document.getElementById('is_active').checked = true;
                document.getElementById('socialModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function deleteSocialLink(id) {
                if (confirm('Apakah Anda yakin ingin menghapus social link ini?')) {
                    fetch(`/admin/site-settings/social-links/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            }
                        });
                }
            }

            function closeSocialModal() {
                document.getElementById('socialModal').classList.add('hidden');
                document.body.style.overflow = '';
            }

            // Team Functions
            function openAddTeamModal() {
                document.getElementById('teamModalTitle').innerText = 'Tambah Team Member';
                document.getElementById('teamForm').action = '{{ route('admin.site-settings.teams.store') }}';
                document.getElementById('teamFormMethod').value = 'POST';
                document.getElementById('teamId').value = '';

                // Reset form
                document.getElementById('team_name').value = '';
                document.getElementById('team_title').value = '';
                document.getElementById('team_image').value = '';
                document.getElementById('team_image_alt').value = '';
                document.getElementById('team_email').value = '';
                document.getElementById('team_phone').value = '';
                document.getElementById('team_bio').value = '';
                document.getElementById('team_expertise_input').value = '';
                document.getElementById('team_experience_years').value = '';
                document.getElementById('team_facebook').value = '';
                document.getElementById('team_instagram').value = '';
                document.getElementById('team_linkedin').value = '';
                document.getElementById('team_twitter').value = '';
                document.getElementById('team_meta_title').value = '';
                document.getElementById('team_meta_description').value = '';
                document.getElementById('team_is_active').checked = true;
                document.getElementById('team_is_featured').checked = false;
                document.getElementById('team_sort_order').value = '0';

                document.getElementById('team_image_preview').classList.add('hidden');
                document.getElementById('teamModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }

            function editTeamMember(id) {
                // Fetch team data via AJAX
                fetch(`/admin/site-settings/teams/${id}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('teamModalTitle').innerText = 'Edit Team Member';
                        document.getElementById('teamForm').action = `/admin/site-settings/teams/${id}`;
                        document.getElementById('teamFormMethod').value = 'PUT';
                        document.getElementById('teamId').value = id;

                        document.getElementById('team_name').value = data.name;
                        document.getElementById('team_title').value = data.title;
                        document.getElementById('team_image_alt').value = data.image_alt || '';
                        document.getElementById('team_email').value = data.email || '';
                        document.getElementById('team_phone').value = data.phone || '';
                        document.getElementById('team_bio').value = data.bio || '';
                        document.getElementById('team_expertise_input').value = data.expertise ? data.expertise.join(', ') :
                            '';
                        document.getElementById('team_experience_years').value = data.experience_years || '';
                        document.getElementById('team_facebook').value = data.social_links?.facebook?.url || '';
                        document.getElementById('team_instagram').value = data.social_links?.instagram?.url || '';
                        document.getElementById('team_linkedin').value = data.social_links?.linkedin?.url || '';
                        document.getElementById('team_twitter').value = data.social_links?.twitter?.url || '';
                        document.getElementById('team_meta_title').value = data.meta_title || '';
                        document.getElementById('team_meta_description').value = data.meta_description || '';
                        document.getElementById('team_is_active').checked = data.is_active;
                        document.getElementById('team_is_featured').checked = data.is_featured;
                        document.getElementById('team_sort_order').value = data.sort_order || 0;

                        if (data.image_url) {
                            document.getElementById('team_image_preview_img').src = data.image_url;
                            document.getElementById('team_image_preview').classList.remove('hidden');
                        } else {
                            document.getElementById('team_image_preview').classList.add('hidden');
                        }

                        document.getElementById('teamModal').classList.remove('hidden');
                        document.body.style.overflow = 'hidden';
                    });
            }

            function deleteTeamMember(id) {
                if (confirm('Apakah Anda yakin ingin menghapus team member ini?')) {
                    fetch(`/admin/site-settings/teams/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            }
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                location.reload();
                            }
                        });
                }
            }

            function closeTeamModal() {
                document.getElementById('teamModal').classList.add('hidden');
                document.body.style.overflow = '';
            }

            // Sortable for teams
            const teamsList = document.getElementById('teamsList');
            if (teamsList && teamsList.children.length > 0) {
                new Sortable(teamsList, {
                    animation: 150,
                    handle: '.cursor-move',
                    ghostClass: 'dragging',
                    dragClass: 'drag-over',
                    onEnd: function() {
                        const items = document.querySelectorAll('#teamsList > div');
                        const orders = [];
                        items.forEach((item, index) => {
                            orders.push(item.dataset.id);
                        });

                        fetch('{{ route('admin.site-settings.teams.reorder') }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Content-Type': 'application/json'
                                },
                                body: JSON.stringify({
                                    orders: orders
                                })
                            }).then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    showToast('Urutan berhasil diupdate', 'success');
                                }
                            });
                    }
                });
            }

            // Toggle team active status
            document.querySelectorAll('.toggle-team').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const id = this.dataset.id;
                    const isActive = this.checked ? 1 : 0;

                    fetch(`/admin/site-settings/teams/${id}`, {
                            method: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                is_active: isActive
                            })
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showToast('Status berhasil diupdate', 'success');
                            }
                        });
                });
            });

            // Toggle social link active status
            document.querySelectorAll('.toggle-social').forEach(toggle => {
                toggle.addEventListener('change', function() {
                    const id = this.dataset.id;
                    const isActive = this.checked ? 1 : 0;

                    const parentDiv = this.closest('.bg-gray-50');
                    const platform = parentDiv.querySelector('h4').innerText;
                    const url = parentDiv.querySelector('a').href;

                    fetch(`/admin/site-settings/social-links/${id}`, {
                            method: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                platform: platform,
                                url: url,
                                is_active: isActive
                            })
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                showToast('Status berhasil diupdate', 'success');
                            }
                        });
                });
            });

            function showToast(message, type = 'success') {
                const toast = document.createElement('div');
                toast.className = `fixed bottom-4 right-4 px-4 py-2 rounded-lg shadow-lg z-50 transition-all transform translate-y-0 ${
        type === 'success' ? 'bg-green-500' : 'bg-red-500'
    } text-white text-sm font-medium`;
                toast.innerHTML =
                    `<i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle'} mr-2"></i>${message}`;
                document.body.appendChild(toast);
                setTimeout(() => toast.remove(), 3000);
            }
        </script>
    @endpush

    @push('scripts')
        <script>
            // Image handling
            function previewImage(input) {
                const newPreview = document.getElementById('newImagePreview');
                const newPreviewImg = document.getElementById('newPreviewImg');

                if (input.files && input.files[0]) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        newPreviewImg.src = e.target.result;
                        newPreview.classList.remove('hidden');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function clearNewImage() {
                const fileInput = document.getElementById('background_image');
                const newPreview = document.getElementById('newImagePreview');
                fileInput.value = '';
                newPreview.classList.add('hidden');
            }

            function confirmDeleteImage() {
                if (confirm('Apakah Anda yakin ingin menghapus gambar background ini?')) {
                    document.getElementById('remove_image').value = '1';
                    document.getElementById('currentImageContainer').style.display = 'none';
                    showToast('Gambar akan dihapus saat menyimpan', 'info');
                }
            }

            // Route selector variables
            let currentTarget = null;
            let currentInputId = null;

            function openRouteSelector(target) {
                currentTarget = target;
                currentInputId = target === 'primary' ? 'cta_primary_url' : 'cta_secondary_url';
                document.getElementById('routeModal').classList.remove('hidden');
                document.body.style.overflow = 'hidden';

                // Reset search
                document.getElementById('routeSearch').value = '';
                filterRoutes('');
            }

            function closeRouteModal() {
                document.getElementById('routeModal').classList.add('hidden');
                document.body.style.overflow = '';
                currentTarget = null;
                currentInputId = null;
            }

            function selectRoute(url) {
                document.getElementById('customUrl').value = url;
            }

            function applyRoute() {
                const customUrl = document.getElementById('customUrl').value;
                if (customUrl && currentInputId) {
                    document.getElementById(currentInputId).value = customUrl;
                    closeRouteModal();
                    showToast('URL berhasil dipilih', 'success');
                }
            }

            // Filter routes
            function filterRoutes(searchTerm) {
                const routeItems = document.querySelectorAll('.route-item');
                routeItems.forEach(item => {
                    const name = item.dataset.name.toLowerCase();
                    const url = item.dataset.url.toLowerCase();
                    const search = searchTerm.toLowerCase();
                    if (name.includes(search) || url.includes(search)) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            }

            // Search input handler
            document.getElementById('routeSearch')?.addEventListener('input', function(e) {
                filterRoutes(e.target.value);
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeRouteModal();
                }
            });
        </script>
    @endpush
@endsection
