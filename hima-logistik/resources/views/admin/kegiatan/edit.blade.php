@extends('layouts.admin')

@section('title', 'Edit Kegiatan')
@section('page-title', 'Edit Kegiatan')
@section('breadcrumb')
    <a href="{{ route('admin.kegiatan.index') }}" class="hover:text-primary-400 transition-colors">Kegiatan</a>
    <span>/</span><span class="text-white">Edit</span>
@endsection

@section('content')
<div class="max-w-3xl">
    <form action="{{ route('admin.kegiatan.update', $kegiatan) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf @method('PATCH')
        <div class="card space-y-5">
            <h2 class="text-white font-bold text-lg border-b border-dark-700 pb-4">Edit Kegiatan</h2>

            <div>
                <label class="form-label">Judul Kegiatan <span class="text-red-400">*</span></label>
                <input type="text" name="title" value="{{ old('title', $kegiatan->title) }}" class="form-input" required>
                @error('title')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="form-label">Tanggal Kegiatan <span class="text-red-400">*</span></label>
                    <input type="date" name="event_date" value="{{ old('event_date', $kegiatan->event_date->format('Y-m-d')) }}" class="form-input" required>
                    @error('event_date')<p class="form-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="form-label">Kategori</label>
                    <input type="text" name="category" value="{{ old('category', $kegiatan->category) }}" class="form-input">
                    @error('category')<p class="form-error">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="form-label">Lokasi</label>
                <input type="text" name="location" value="{{ old('location', $kegiatan->location) }}" class="form-input">
                @error('location')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Deskripsi Kegiatan <span class="text-red-400">*</span></label>
                <textarea name="description" class="form-textarea" rows="6" required>{{ old('description', $kegiatan->description) }}</textarea>
                @error('description')<p class="form-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="form-label">Foto Kegiatan</label>
                @if($kegiatan->image)
                <div class="relative mb-3">
                    <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="Foto saat ini" class="w-full h-48 object-cover rounded-xl">
                    <span class="absolute top-2 left-2 badge-primary text-xs">Foto saat ini</span>
                </div>
                @endif
                <div class="upload-zone" onclick="document.getElementById('image').click()">
                    <img id="img-preview" class="hidden w-full h-40 object-cover rounded-xl mb-3" alt="Preview baru">
                    <div class="upload-placeholder">
                        <svg class="w-8 h-8 text-dark-500 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        <p class="text-dark-400 text-sm font-medium">Upload foto baru (opsional)</p>
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
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.kegiatan.index') }}" class="btn-ghost">Batal</a>
        </div>
    </form>
</div>
@endsection
