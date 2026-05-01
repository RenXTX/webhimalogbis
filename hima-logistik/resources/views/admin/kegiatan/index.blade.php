@extends('layouts.admin')

@section('title', 'Kelola Kegiatan')
@section('page-title', 'Kelola Kegiatan')
@section('breadcrumb')<span class="text-white">Kegiatan</span>@endsection

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-dark-400 text-sm">{{ $kegiatan->total() }} kegiatan terdaftar.</p>
    <a href="{{ route('admin.kegiatan.create') }}" class="btn-primary text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Kegiatan
    </a>
</div>

<div class="card overflow-hidden">
    @if($kegiatan->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-dark-700/50">
                <tr>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3">Kegiatan</th>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Kategori</th>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3 hidden md:table-cell">Tanggal</th>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3 hidden lg:table-cell">Lokasi</th>
                    <th class="text-right text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-dark-700">
                @foreach($kegiatan as $k)
                <tr class="hover:bg-dark-700/30 transition-colors">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if($k->image)
                                <img src="{{ asset('storage/' . $k->image) }}" alt="" class="w-12 h-12 rounded-xl object-cover flex-shrink-0">
                            @else
                                <div class="w-12 h-12 bg-dark-700 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            <div class="min-w-0">
                                <p class="text-white font-medium text-sm line-clamp-1">{{ $k->title }}</p>
                                <p class="text-dark-400 text-xs line-clamp-1 mt-0.5">{{ Str::limit($k->description, 60) }}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 hidden sm:table-cell"><span class="badge-primary">{{ $k->category }}</span></td>
                    <td class="px-4 py-3 text-dark-300 text-sm hidden md:table-cell">{{ $k->formatted_date }}</td>
                    <td class="px-4 py-3 text-dark-400 text-sm hidden lg:table-cell">{{ $k->location ?? '—' }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.kegiatan.edit', $k) }}" class="btn-outline text-xs py-1.5 px-3">Edit</a>
                            <form method="POST" action="{{ route('admin.kegiatan.destroy', $k) }}" onsubmit="return confirm('Yakin hapus kegiatan ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn-danger text-xs py-1.5 px-3">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="px-4 py-4 border-t border-dark-700">
        {{ $kegiatan->links('vendor.pagination.custom') }}
    </div>
    @else
    <div class="text-center py-14">
        <svg class="w-14 h-14 text-dark-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        <p class="text-dark-400 mb-4">Belum ada kegiatan. Tambahkan sekarang!</p>
        <a href="{{ route('admin.kegiatan.create') }}" class="btn-primary">+ Tambah Kegiatan</a>
    </div>
    @endif
</div>
@endsection
