@extends('layouts.admin')

@section('title', 'Tambah Kegiatan')
@section('page-title', 'Tambah Kegiatan')
@section('breadcrumb')
    <a href="{{ route('admin.kegiatan.index') }}" class="hover:text-primary-400 transition-colors">Kegiatan</a>
    <span>/</span><span class="text-white">Tambah</span>
@endsection

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        <div class="card space-y-5">
            <h2 class="text-white font-bold text-lg border-b border-dark-700 pb-4">Informasi Kegiatan</h2>

            <div>
                <label class="form-label">Judul Kegiatan <span class="text-red-400">*</span></label>
                <input type="text" name="title" value="{{ old('title') }}" class="form-input" placeholder="Nama kegiatan..." required>
                @error('title')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Tanggal Kegiatan <span class="text-red-400">*</span></label>
                    <input type="date" name="event_date" value="{{ old('event_date') }}" class="form-input" required>
                    @error('event_date')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', 'Umum') }}" class="form-input" placeholder="Umum, Akademik, Sosial, dll.">
                    @error('category')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="form-label">Lokasi</label>
                <input type="text" name="location" value="{{ old('location') }}" class="form-input" placeholder="Tempat pelaksanaan kegiatan...">
                @error('location')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Deskripsi Kegiatan <span class="text-red-400">*</span></label>
                <textarea name="description" class="form-textarea" rows="6" placeholder="Ceritakan detail kegiatan ini..." required>{{ old('description') }}</textarea>
                @error('description')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Foto Kegiatan</label>
                <div class="upload-zone" onclick="document.getElementById('image').click()">
                    <img id="img-preview" class="hidden w-full h-52 object-cover rounded-xl mb-4" alt="Preview">
                    <div class="upload-placeholder">
                        <svg class="w-10 h-10 text-dark-500 mx-auto mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-dark-400 font-medium">Klik untuk upload foto kegiatan</p>
                        <p class="text-dark-500 text-xs mt-1">JPG, PNG, WebP — Maks. 3MB</p>
                    </div>
                </div>
                <input type="file" id="image" name="image" class="hidden" accept="image/*" data-preview="img-preview">
                @error('image')<p class="form-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="flex items-center gap-3">
            <button type="submit" class="btn-primary">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Simpan Kegiatan
            </button>
            <a href="{{ route('admin.kegiatan.index') }}" class="btn-ghost">Batal</a>
        </div>
    </form>
</div>
@endsection
