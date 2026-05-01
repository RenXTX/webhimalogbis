@extends('layouts.admin')

@section('title', 'Tambah Anggota')
@section('page-title', 'Tambah Anggota Struktur')
@section('breadcrumb')
    <a href="{{ route('admin.struktur.index') }}" class="hover:text-primary-400 transition-colors">Struktur</a>
    <span>/</span><span class="text-white">Tambah</span>
@endsection

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="card space-y-5">
            <h2 class="text-white font-bold text-lg border-b border-dark-700 pb-4">Informasi Anggota</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Nama Lengkap <span class="text-red-400">*</span></label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-input" placeholder="Nama anggota..." required>
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Jabatan <span class="text-red-400">*</span></label>
                    <input type="text" name="position" value="{{ old('position') }}" class="form-input" placeholder="Ketua, Wakil, Sekretaris, dll." required>
                    @error('position')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Divisi</label>
                    <input type="text" name="division" value="{{ old('division') }}" class="form-input" placeholder="Pengurus Inti, Kemahasiswaan, dll.">
                    @error('division')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', 0) }}" class="form-input" min="0" placeholder="0">
                    <p class="text-dark-500 text-xs mt-1">Angka lebih kecil = tampil lebih dulu</p>
                    @error('order')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="form-label">Instagram</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-dark-400 font-medium">@</span>
                    <input type="text" name="instagram" value="{{ old('instagram') }}" class="form-input pl-8" placeholder="username_instagram">
                </div>
                @error('instagram')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Foto Profil</label>
                <div class="flex items-start gap-6">
                    <div class="flex-1">
                        <div class="upload-zone" onclick="document.getElementById('photo').click()">
                            <img id="img-preview" class="hidden w-full h-44 object-cover rounded-xl mb-3" alt="Preview">
                            <div class="upload-placeholder">
                                <svg class="w-10 h-10 text-dark-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                <p class="text-dark-400 font-medium">Upload foto profil</p>
                                <p class="text-dark-500 text-xs mt-1">JPG, PNG, WebP — Maks. 2MB</p>
                            </div>
                        </div>
                        <input type="file" id="photo" name="photo" class="hidden" accept="image/*" data-preview="img-preview">
                    </div>
                </div>
                @error('photo')<p class="form-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Anggota
            </button>
            <a href="{{ route('admin.struktur.index') }}" class="btn-ghost">Batal</a>
        </div>
    </form>
</div>
@endsection
