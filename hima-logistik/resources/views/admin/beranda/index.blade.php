@extends('layouts.admin')

@section('title', 'Kelola Beranda')
@section('page-title', 'Kelola Beranda')
@section('breadcrumb')<span class="text-white">Beranda</span>@endsection

@section('content')
<div class="flex items-center justify-between mb-6">
    <p class="text-dark-400 text-sm">Kelola konten hero section dan teks sambutan halaman beranda.</p>
    <a href="{{ route('admin.beranda.create') }}" class="btn-primary text-sm">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Tambah Beranda
    </a>
</div>

@if($berandas->isNotEmpty())
<div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
    @foreach($berandas as $b)
    <div class="card">
        @if($b->hero_image)
            <img src="{{ asset('storage/' . $b->hero_image) }}" alt="{{ $b->title }}" class="w-full h-40 object-cover rounded-xl mb-4">
        @endif
        <div class="flex items-start justify-between gap-4 mb-3">
            <h3 class="text-white font-bold text-lg leading-tight">{{ $b->title }}</h3>
            <span class="badge {{ $b->is_active ? 'bg-green-500/10 text-green-400' : 'bg-dark-600 text-dark-400' }} flex-shrink-0">
                {{ $b->is_active ? 'Aktif' : 'Nonaktif' }}
            </span>
        </div>
        @if($b->subtitle)
            <p class="text-dark-300 text-sm mb-4 line-clamp-2">{{ $b->subtitle }}</p>
        @endif
        <div class="flex items-center gap-2 pt-4 border-t border-dark-700">
            <a href="{{ route('admin.beranda.edit', $b) }}" class="btn-outline text-xs py-1.5 px-4">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
                Edit
            </a>
            <form method="POST" action="{{ route('admin.beranda.destroy', $b) }}" onsubmit="return confirm('Yakin ingin menghapus konten ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn-danger text-xs py-1.5 px-4">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                    Hapus
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="card text-center py-14">
    <svg class="w-14 h-14 text-dark-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
    <p class="text-dark-400 mb-4">Belum ada konten beranda. Tambahkan sekarang!</p>
    <a href="{{ route('admin.beranda.create') }}" class="btn-primary">+ Tambah Konten Beranda</a>
</div>
@endif
@endsection
