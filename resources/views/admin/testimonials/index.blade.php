@extends('layouts.admin')
@section('title', 'Manajemen Testimonial')

@section('content')
    <div class="space-y-4">

        <div class="flex justify-end">
            <a href="{{ route('admin.testimonials.create') }}" class="btn-admin">
                Tambah Testimonial
            </a>
        </div>

        <div class="admin-card">

            <div class="p-4 border-b">
                <form method="GET" class="flex gap-3">

                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari testimonial..."
                        class="form-input max-w-xs">

                    <select name="is_active" class="form-input max-w-[160px]">

                        <option value="">Semua Status</option>

                        <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>
                            Aktif
                        </option>

                        <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>
                            Nonaktif
                        </option>

                    </select>

                    <button class="btn-admin">
                        Filter
                    </button>

                </form>
            </div>

            <div class="overflow-x-auto">

                <table class="w-full">

                    <thead>
                        <tr>
                            <th class="table-th">Foto</th>
                            <th class="table-th">Nama</th>
                            <th class="table-th">Perusahaan</th>
                            <th class="table-th">Rating</th>
                            <th class="table-th">Status</th>
                            <th class="table-th">Urutan</th>
                            <th class="table-th">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($testimonials as $testimonial)
                            <tr class="table-tr">

                                <td class="table-td">
                                    <img src="{{ $testimonial->photo_url }}" class="w-12 h-12 rounded-full object-cover">
                                </td>

                                <td class="table-td">
                                    {{ $testimonial->client_name }}
                                </td>

                                <td class="table-td">
                                    {{ $testimonial->company_name }}
                                </td>

                                <td class="table-td">
                                    ⭐ {{ $testimonial->rating }}/5
                                </td>

                                <td class="table-td">
                                    <span class="{{ $testimonial->is_active ? 'badge-success' : 'badge-warning' }}">
                                        {{ $testimonial->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </td>

                                <td class="table-td">
                                    {{ $testimonial->sort_order }}
                                </td>

                                <td class="table-td">
                                    <div class="flex gap-2">

                                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}">
                                            Edit
                                        </a>

                                        <form method="POST"
                                            action="{{ route('admin.testimonials.destroy', $testimonial) }}"
                                            onsubmit="return confirm('Hapus testimonial ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit">
                                                Hapus
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-10">
                                    Belum ada testimonial
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="p-4">
                {{ $testimonials->links() }}
            </div>

        </div>
    </div>
@endsection
