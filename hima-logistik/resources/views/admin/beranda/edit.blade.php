@extends('layouts.admin')

@section('title', 'Edit Beranda')
@section('page-title', 'Edit Konten Beranda')
@section('breadcrumb')
    <a href="{{ route('admin.beranda.index') }}" class="hover:text-primary-400 transition-colors">Beranda</a>
    <span>/</span>
    <span class="text-white">Edit</span>
@endsection

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.beranda.update', $beranda) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PATCH')

        <div class="card space-y-5">
            <h2 class="text-white font-bold text-lg border-b border-dark-700 pb-4">Edit Informasi Beranda</h2>

            <div>
                <label class="form-label">Judul Hero <span class="text-red-400">*</span></label>
                <input type="text" name="title" value="{{ old('title', $beranda->title) }}" class="form-input" required>
                @error('title')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Subjudul / Tagline</label>
                <textarea name="subtitle" class="form-textarea" rows="2">{{ old('subtitle', $beranda->subtitle) }}</textarea>
                @error('subtitle')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Deskripsi Sambutan</label>
                <textarea name="description" class="form-textarea" rows="4">{{ old('description', $beranda->description) }}</textarea>
                @error('description')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Teks Welcome Section</label>
                <textarea name="welcome_text" class="form-textarea" rows="2">{{ old('welcome_text', $beranda->welcome_text) }}</textarea>
                @error('welcome_text')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="border-t border-dark-700 pt-5 mt-5">
                <h3 class="text-white font-bold text-md mb-4">Statistik Organisasi</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="form-label">Jumlah Anggota Aktif</label>
                        <input type="text" name="stat_anggota" value="{{ old('stat_anggota', $beranda->stat_anggota) }}" class="form-input">
                        @error('stat_anggota')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Kegiatan Diselenggarakan</label>
                        <input type="text" name="stat_kegiatan" value="{{ old('stat_kegiatan', $beranda->stat_kegiatan) }}" class="form-input">
                        @error('stat_kegiatan')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Divisi Kerja</label>
                        <input type="text" name="stat_divisi" value="{{ old('stat_divisi', $beranda->stat_divisi) }}" class="form-input">
                        @error('stat_divisi')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="form-label">Periode Kepengurusan</label>
                        <input type="text" name="stat_periode" value="{{ old('stat_periode', $beranda->stat_periode) }}" class="form-input">
                        @error('stat_periode')<p class="form-error">{{ $message }}</p>@enderror
                    </div>
                </div>
            </div>

            <div class="border-t border-dark-700 pt-5 mt-5">
                <label class="form-label">Foto Hero</label>
                @if($beranda->hero_image)
                    <div class="mb-3 relative">
                        <img src="{{ asset('storage/' . $beranda->hero_image) }}" alt="Hero saat ini" class="w-full h-48 object-cover rounded-xl">
                        <span class="absolute top-2 left-2 badge-primary text-xs">Foto saat ini</span>
                    </div>
                @endif
                <div class="upload-zone" onclick="document.getElementById('hero_image').click()">
                    <img id="img-preview" class="hidden w-full h-40 object-cover rounded-xl mb-3" alt="Preview baru">
                    <div class="upload-placeholder">
                        <svg class="w-8 h-8 text-dark-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-dark-400 text-sm font-medium">Upload foto baru (opsional)</p>
                        <p class="text-dark-500 text-xs mt-1">JPG, PNG, WebP — Maks. 3MB</p>
                    </div>
                </div>
                <input type="file" id="hero_image" name="hero_image" class="hidden" accept="image/*" data-preview="img-preview">
                @error('hero_image')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ old('is_active', $beranda->is_active) ? 'checked' : '' }}>
                    <div class="w-11 h-6 bg-dark-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-400"></div>
                </label>
                <span class="text-dark-300 text-sm font-medium">Aktifkan sebagai konten utama beranda</span>
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.beranda.index') }}" class="btn-ghost">Batal</a>
        </div>
    </form>
</div>
@endsection
