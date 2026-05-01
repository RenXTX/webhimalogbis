@extends('layouts.admin')

@section('title', 'Edit Anggota')
@section('page-title', 'Edit Anggota Struktur')
@section('breadcrumb')
    <a href="{{ route('admin.struktur.index') }}" class="hover:text-primary-400 transition-colors">Struktur</a>
    <span>/</span><span class="text-white">Edit</span>
@endsection

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.struktur.update', $struktur) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PATCH')
        <div class="card space-y-5">
            <h2 class="text-white font-bold text-lg border-b border-dark-700 pb-4">Edit Anggota Struktur</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Nama Lengkap <span class="text-red-400">*</span></label>
                    <input type="text" name="name" value="{{ old('name', $struktur->name) }}" class="form-input" required>
                    @error('name')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Jabatan <span class="text-red-400">*</span></label>
                    <input type="text" name="position" value="{{ old('position', $struktur->position) }}" class="form-input" required>
                    @error('position')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Divisi</label>
                    <input type="text" name="division" value="{{ old('division', $struktur->division) }}" class="form-input">
                    @error('division')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Urutan Tampil</label>
                    <input type="number" name="order" value="{{ old('order', $struktur->order) }}" class="form-input" min="0">
                    @error('order')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="form-label">Instagram</label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-dark-400 font-medium">@</span>
                    <input type="text" name="instagram" value="{{ old('instagram', ltrim($struktur->instagram ?? '', '@')) }}" class="form-input pl-8" placeholder="username_instagram">
                </div>
                @error('instagram')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Foto Profil</label>
                @if($struktur->photo)
                    <div class="flex items-center gap-4 mb-3 p-3 bg-dark-700 rounded-xl">
                        <img src="{{ asset('storage/' . $struktur->photo) }}" alt="{{ $struktur->name }}" class="w-16 h-16 rounded-xl object-cover">
                        <div>
                            <p class="text-white text-sm font-medium">Foto saat ini</p>
                            <p class="text-dark-400 text-xs">Upload foto baru untuk mengganti</p>
                        </div>
                    </div>
                @endif
                <div class="upload-zone" onclick="document.getElementById('photo').click()">
                    <img id="img-preview" class="hidden w-full h-40 object-cover rounded-xl mb-3" alt="Preview baru">
                    <div class="upload-placeholder">
                        <svg class="w-8 h-8 text-dark-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        <p class="text-dark-400 text-sm font-medium">Upload foto baru (opsional)</p>
                        <p class="text-dark-500 text-xs mt-1">JPG, PNG, WebP — Maks. 2MB</p>
                    </div>
                </div>
                <input type="file" id="photo" name="photo" class="hidden" accept="image/*" data-preview="img-preview">
                @error('photo')<p class="form-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.struktur.index') }}" class="btn-ghost">Batal</a>
        </div>
    </form>
</div>
@endsection
