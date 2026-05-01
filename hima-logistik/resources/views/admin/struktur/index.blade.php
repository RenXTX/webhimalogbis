@extends('layouts.admin')

@section('title', 'Kelola Struktur')
@section('page-title', 'Kelola Struktur Organisasi')
@section('breadcrumb')<span class="text-white">Struktur</span>@endsection

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-dark-400 text-sm">{{ $strukturs->count() }} anggota terdaftar.</p>
    <a href="{{ route('admin.struktur.create') }}" class="btn-primary text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Anggota
    </a>
</div>

<div class="card overflow-hidden">
    @if($strukturs->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-dark-700/50">
                <tr>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3">Anggota</th>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3 hidden sm:table-cell">Jabatan</th>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3 hidden md:table-cell">Divisi</th>
                    <th class="text-center text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3 hidden lg:table-cell">Urutan</th>
                    <th class="text-right text-dark-400 text-xs font-semibold uppercase tracking-wider px-4 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-dark-700">
                @foreach($strukturs as $s)
                <tr class="hover:bg-dark-700/30 transition-colors">
                    <td class="px-4 py-3">
                        <div class="flex items-center gap-3">
                            @if($s->photo)
                                <img src="{{ asset('storage/' . $s->photo) }}" alt="{{ $s->name }}" class="w-10 h-10 rounded-xl object-cover flex-shrink-0">
                            @else
                                <div class="w-10 h-10 bg-primary-400/20 rounded-xl flex items-center justify-center flex-shrink-0">
                                    <span class="text-primary-400 font-bold text-sm">{{ strtoupper(substr($s->name, 0, 1)) }}</span>
                                </div>
                            @endif
                            <div>
                                <p class="text-white font-medium text-sm">{{ $s->name }}</p>
                                @if($s->instagram)
                                    <p class="text-dark-400 text-xs">{{ $s->instagram }}</p>
                                @endif
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-dark-300 text-sm hidden sm:table-cell">{{ $s->position }}</td>
                    <td class="px-4 py-3 hidden md:table-cell">
                        <span class="badge-gray">{{ $s->division ?? 'Pengurus Inti' }}</span>
                    </td>
                    <td class="px-4 py-3 text-center text-dark-400 text-sm hidden lg:table-cell">{{ $s->order }}</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center justify-end gap-2">
                            <a href="{{ route('admin.struktur.edit', $s) }}" class="btn-outline text-xs py-1.5 px-3">Edit</a>
                            <form method="POST" action="{{ route('admin.struktur.destroy', $s) }}" onsubmit="return confirm('Yakin hapus anggota ini?')">
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
    @else
    <div class="text-center py-14">
        <svg class="w-14 h-14 text-dark-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        <p class="text-dark-400 mb-4">Belum ada anggota struktur.</p>
        <a href="{{ route('admin.struktur.create') }}" class="btn-primary">+ Tambah Anggota</a>
    </div>
    @endif
</div>
@endsection
