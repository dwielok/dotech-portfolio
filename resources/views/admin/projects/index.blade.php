@extends('layouts.admin')
@section('title', 'Manajemen Proyek')

@section('content')
<div class="space-y-4">
    <div class="flex items-center justify-between">
        <div></div>
        <a href="{{ route('admin.projects.create') }}" class="btn-admin">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Tambah Proyek
        </a>
    </div>

    <div class="admin-card">
        {{-- Search & Filter --}}
        <div class="p-4 border-b border-gray-100">
            <form method="GET" class="flex gap-3">
                <input type="text" name="search" value="{{ request('search') }}"
                       placeholder="Cari proyek..." class="form-input max-w-xs">
                <select name="status" class="form-input max-w-[140px]">
                    <option value="">Semua Status</option>
                    <option value="published" {{ request('status') === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="draft" {{ request('status') === 'draft' ? 'selected' : '' }}>Draft</option>
                </select>
                <button type="submit" class="btn-admin">Filter</button>
                @if(request()->hasAny(['search','status']))
                <a href="{{ route('admin.projects.index') }}" class="btn-admin bg-gray-500 hover:bg-gray-600">Reset</a>
                @endif
            </form>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="table-th">Proyek</th>
                        <th class="table-th">Klien</th>
                        <th class="table-th">Kategori</th>
                        <th class="table-th">Status</th>
                        <th class="table-th">Featured</th>
                        <th class="table-th">Tanggal</th>
                        <th class="table-th">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr class="table-tr">
                        <td class="table-td">
                            <div class="flex items-center gap-3">
                                @if($project->featured_image)
                                <img src="{{ $project->featured_image_url }}" alt=""
                                     class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                                @else
                                <div class="w-10 h-10 rounded-lg bg-gray-100 flex-shrink-0"></div>
                                @endif
                                <div>
                                    <p class="font-medium text-gray-800">{{ $project->title }}</p>
                                    <p class="text-xs text-gray-400 font-mono">/{{ $project->slug }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="table-td text-gray-500">{{ $project->client_name ?? '—' }}</td>
                        <td class="table-td">
                            @if($project->category)
                            <span class="badge-info">{{ $project->category }}</span>
                            @else —
                            @endif
                        </td>
                        <td class="table-td">
                            <span class="{{ $project->status === 'published' ? 'badge-success' : 'badge-warning' }}">
                                {{ $project->status === 'published' ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td class="table-td">
                            <span class="{{ $project->is_featured ? 'badge-success' : 'badge-warning' }}">
                                {{ $project->is_featured ? 'Ya' : 'Tidak' }}
                            </span>
                        </td>
                        <td class="table-td text-gray-400 text-xs">
                            {{ $project->project_date?->format('d M Y') ?? '—' }}
                        </td>
                        <td class="table-td">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('projects.show', $project->slug) }}" target="_blank"
                                   class="text-gray-400 hover:text-blue-600 transition-colors" title="Lihat">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('admin.projects.edit', $project) }}"
                                   class="text-gray-400 hover:text-yellow-600 transition-colors" title="Edit">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <form method="POST" action="{{ route('admin.projects.destroy', $project) }}"
                                      onsubmit="return confirm('Hapus proyek ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-gray-400 hover:text-red-600 transition-colors" title="Hapus">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="7" class="text-center py-12 text-gray-400">Belum ada proyek</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($projects->hasPages())
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $projects->links() }}
        </div>
        @endif
    </div>
</div>
@endsection
