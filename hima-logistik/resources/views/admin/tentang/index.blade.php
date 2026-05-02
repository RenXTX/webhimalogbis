@extends('layouts.admin')

@section('title', 'Kelola Tentang Kami')
@section('page-title', 'Kelola Tentang Kami')
@section('breadcrumb', 'Tentang')

@section('content')
<div class="bg-dark-800 rounded-2xl p-6 md:p-8 border border-dark-700 shadow-xl max-w-4xl mx-auto">
    <div class="mb-6 flex items-start gap-4">
        <div class="w-12 h-12 bg-primary-400/10 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-white mb-1">Profil Organisasi</h2>
            <p class="text-dark-400 text-sm">Sesuaikan konten Sejarah, Visi, dan Misi yang akan tampil di halaman publik Tentang Kami.</p>
        </div>
    </div>

    <form action="{{ route('admin.tentang.update') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <label class="form-label">Latar Belakang / Sejarah Singkat</label>
            <p class="text-dark-500 text-xs mb-2">Gunakan tombol Enter untuk memisahkan paragraf.</p>
            <textarea name="sejarah" class="form-textarea" rows="6" placeholder="Ketikkan sejarah singkat organisasi...">{{ old('sejarah', $tentang->sejarah) }}</textarea>
            @error('sejarah')<p class="form-error">{{ $message }}</p>@enderror
        </div>

        <div class="border-t border-dark-700 pt-6 mt-6">
            <h3 class="text-lg font-bold text-white mb-4">Visi & Misi</h3>
            
            <div class="space-y-6">
                <div>
                    <label class="form-label">Visi</label>
                    <textarea name="visi" class="form-textarea" rows="3" placeholder="Visi organisasi...">{{ old('visi', $tentang->visi) }}</textarea>
                    @error('visi')<p class="form-error">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="form-label">Misi</label>
                    <p class="text-dark-500 text-xs mb-2">Gunakan tombol Enter untuk membuat poin misi baru. Setiap baris akan otomatis dijadikan list bernomor di halaman publik.</p>
                    <textarea name="misi" class="form-textarea" rows="6" placeholder="Poin misi pertama&#10;Poin misi kedua&#10;Poin misi ketiga...">{{ old('misi', $tentang->misi) }}</textarea>
                    @error('misi')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>
        </div>

        <div class="pt-6 mt-6 border-t border-dark-700 flex justify-end">
            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
