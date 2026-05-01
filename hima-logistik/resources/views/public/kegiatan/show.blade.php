@extends('layouts.public')

@section('title', $kegiatan->title . ' — HIMA Logistik Bisnis')

@section('content')

<div class="pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Back Button --}}
        <a href="{{ route('kegiatan.index') }}" class="inline-flex items-center gap-2 text-dark-400 hover:text-primary-400 transition-colors mb-8 group">
            <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Kembali ke Kegiatan
        </a>

        {{-- Badge & Meta --}}
        <div class="flex flex-wrap items-center gap-3 mb-5">
            <span class="badge-primary">{{ $kegiatan->category }}</span>
            <span class="text-dark-400 text-sm flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $kegiatan->formatted_date }}
            </span>
            @if($kegiatan->location)
            <span class="text-dark-400 text-sm flex items-center gap-1.5">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                {{ $kegiatan->location }}
            </span>
            @endif
        </div>

        {{-- Title --}}
        <h1 class="text-3xl md:text-4xl font-black text-white mb-8 leading-tight">
            {{ $kegiatan->title }}
        </h1>

        {{-- Hero Image --}}
        @if($kegiatan->image)
        <div class="relative rounded-3xl overflow-hidden mb-10 aspect-video bg-dark-800">
            <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="{{ $kegiatan->title }}"
                 class="w-full h-full object-cover">
        </div>
        @endif

        {{-- Content --}}
        <div class="prose prose-invert prose-lg max-w-none">
            <div class="text-dark-200 leading-relaxed whitespace-pre-line text-lg">
                {{ $kegiatan->description }}
            </div>
        </div>
    </div>

    {{-- Related Kegiatan --}}
    @if($kegiatanLain->isNotEmpty())
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-20">
        <div class="border-t border-dark-700 pt-14">
            <h2 class="text-2xl font-bold text-white mb-8">Kegiatan Lainnya</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($kegiatanLain as $k)
                <article class="card-hover group">
                    <a href="{{ route('kegiatan.show', $k) }}" class="block">
                        <div class="relative overflow-hidden rounded-xl mb-4 bg-dark-700 aspect-video">
                            @if($k->image)
                                <img src="{{ asset('storage/' . $k->image) }}" alt="{{ $k->title }}"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <svg class="w-10 h-10 text-dark-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                        </div>
                        <span class="badge-primary mb-2">{{ $k->category }}</span>
                        <h3 class="text-white font-bold mt-2 mb-1 line-clamp-2 group-hover:text-primary-400 transition-colors">{{ $k->title }}</h3>
                        <p class="text-dark-400 text-xs">{{ $k->formatted_date }}</p>
                    </a>
                </article>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>

@endsection
