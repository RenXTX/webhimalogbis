@extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('title', 'Dashboard Admin — HIMA Logistik Bisnis')

@section('content')

{{-- STATS --}}
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
    <div class="stat-card animate-on-scroll">
        <div class="stat-icon bg-primary-400/10 text-primary-400">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        </div>
        <div>
            <div class="text-dark-400 text-sm font-medium">Total Kegiatan</div>
            <div class="text-3xl font-black text-white" data-count="{{ $totalKegiatan }}">0</div>
        </div>
    </div>

    <div class="stat-card animate-on-scroll animate-delay-100">
        <div class="stat-icon bg-blue-400/10 text-blue-400">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div>
            <div class="text-dark-400 text-sm font-medium">Total Anggota</div>
            <div class="text-3xl font-black text-white" data-count="{{ $totalAnggota }}">0</div>
        </div>
    </div>

    <div class="stat-card animate-on-scroll animate-delay-200">
        <div class="stat-icon bg-green-400/10 text-green-400">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <div class="text-dark-400 text-sm font-medium">Status Website</div>
            <div class="text-lg font-bold text-green-400">Online</div>
        </div>
    </div>
</div>

{{-- QUICK ACTIONS --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mb-8">
    <a href="{{ route('admin.beranda.index') }}" class="card-hover group flex items-center gap-4 animate-on-scroll">
        <div class="w-12 h-12 bg-primary-400/10 rounded-xl flex items-center justify-center text-primary-400 group-hover:bg-primary-400 group-hover:text-dark-900 transition-all duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
        </div>
        <div>
            <div class="text-white font-semibold">Kelola Beranda</div>
            <div class="text-dark-400 text-sm">Edit konten & hero image</div>
        </div>
    </a>

    <a href="{{ route('admin.kegiatan.create') }}" class="card-hover group flex items-center gap-4 animate-on-scroll animate-delay-100">
        <div class="w-12 h-12 bg-blue-400/10 rounded-xl flex items-center justify-center text-blue-400 group-hover:bg-blue-400 group-hover:text-white transition-all duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        </div>
        <div>
            <div class="text-white font-semibold">Tambah Kegiatan</div>
            <div class="text-dark-400 text-sm">Upload foto & info kegiatan</div>
        </div>
    </a>

    <a href="{{ route('admin.struktur.create') }}" class="card-hover group flex items-center gap-4 animate-on-scroll animate-delay-200">
        <div class="w-12 h-12 bg-green-400/10 rounded-xl flex items-center justify-center text-green-400 group-hover:bg-green-400 group-hover:text-white transition-all duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        </div>
        <div>
            <div class="text-white font-semibold">Tambah Anggota</div>
            <div class="text-dark-400 text-sm">Perbarui struktur organisasi</div>
        </div>
    </a>
</div>

{{-- KEGIATAN TERBARU --}}
<div class="card animate-on-scroll">
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-lg font-bold text-white">Kegiatan Terbaru</h2>
        <a href="{{ route('admin.kegiatan.index') }}" class="text-primary-400 text-sm font-medium hover:text-primary-300 transition-colors">
            Lihat Semua →
        </a>
    </div>

    @if($kegiatanTerbaru->isNotEmpty())
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead>
                <tr class="border-b border-dark-700">
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider pb-3">Judul</th>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider pb-3 hidden sm:table-cell">Kategori</th>
                    <th class="text-left text-dark-400 text-xs font-semibold uppercase tracking-wider pb-3 hidden md:table-cell">Tanggal</th>
                    <th class="text-right text-dark-400 text-xs font-semibold uppercase tracking-wider pb-3">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-dark-700">
                @foreach($kegiatanTerbaru as $k)
                <tr class="hover:bg-dark-700/30 transition-colors">
                    <td class="py-3.5">
                        <div class="flex items-center gap-3">
                            @if($k->image)
                                <img src="{{ asset('storage/' . $k->image) }}" alt="" class="w-10 h-10 rounded-lg object-cover flex-shrink-0">
                            @else
                                <div class="w-10 h-10 bg-dark-700 rounded-lg flex items-center justify-center flex-shrink-0">
                                    <svg class="w-5 h-5 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            <span class="text-white text-sm font-medium line-clamp-1">{{ $k->title }}</span>
                        </div>
                    </td>
                    <td class="py-3.5 hidden sm:table-cell">
                        <span class="badge-primary">{{ $k->category }}</span>
                    </td>
                    <td class="py-3.5 text-dark-400 text-sm hidden md:table-cell">{{ $k->formatted_date }}</td>
                    <td class="py-3.5 text-right">
                        <a href="{{ route('admin.kegiatan.edit', $k) }}" class="text-primary-400 hover:text-primary-300 text-sm font-medium transition-colors">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <div class="text-center py-10 text-dark-500">
        <p class="mb-3">Belum ada kegiatan</p>
        <a href="{{ route('admin.kegiatan.create') }}" class="btn-primary text-sm">+ Tambah Kegiatan</a>
    </div>
    @endif
</div>

@endsection
