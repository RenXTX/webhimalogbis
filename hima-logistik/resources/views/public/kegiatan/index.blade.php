@extends('layouts.public')

@section('title', 'Kegiatan — HIMA Logistik Bisnis')

@section('content')

{{-- PAGE HEADER --}}
<section class="relative pt-32 pb-16 bg-grid overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-dark-950 to-dark-900"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="section-tag mx-auto justify-center">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Aktivitas Organisasi
        </span>
        <h1 class="section-title text-5xl">Kegiatan HIMA</h1>
        <div class="divider-yellow mx-auto"></div>
        <p class="section-desc mx-auto">Berbagai program kerja dan kegiatan yang kami selenggarakan untuk mahasiswa.</p>
    </div>
</section>

{{-- FILTER & GRID --}}
<section class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Category Filter --}}
        @if($categories->isNotEmpty())
        <div class="flex flex-wrap gap-2 mb-10 justify-center animate-on-scroll" x-data>
            <a href="{{ route('kegiatan.index') }}"
               class="{{ !request('kategori') ? 'bg-primary-400 text-dark-900' : 'bg-dark-700 text-dark-300 hover:bg-dark-600 hover:text-white' }} px-4 py-2 rounded-full text-sm font-semibold transition-all duration-200">
                Semua
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('kegiatan.index', ['kategori' => $cat]) }}"
               class="{{ request('kategori') === $cat ? 'bg-primary-400 text-dark-900' : 'bg-dark-700 text-dark-300 hover:bg-dark-600 hover:text-white' }} px-4 py-2 rounded-full text-sm font-semibold transition-all duration-200">
                {{ $cat }}
            </a>
            @endforeach
        </div>
        @endif

        {{-- Grid --}}
        @if($kegiatan->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kegiatan as $i => $k)
            <article class="card-hover group animate-on-scroll" style="animation-delay: {{ ($i % 3) * 100 }}ms">
                <a href="{{ route('kegiatan.show', $k) }}" class="block">
                    <div class="relative overflow-hidden rounded-xl mb-5 bg-dark-700 aspect-video">
                        @if($k->image)
                            <img src="{{ asset('storage/' . $k->image) }}" alt="{{ $k->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-dark-700 to-dark-600">
                                <svg class="w-12 h-12 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3">
                            <span class="badge-primary">{{ $k->category }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 text-dark-400 text-xs mb-3">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            {{ $k->formatted_date }}
                        </span>
                        @if($k->location)
                        <span>·</span>
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            {{ $k->location }}
                        </span>
                        @endif
                    </div>

                    <h2 class="text-white font-bold text-lg leading-snug mb-2 group-hover:text-primary-400 transition-colors line-clamp-2">
                        {{ $k->title }}
                    </h2>
                    <p class="text-dark-400 text-sm line-clamp-3 leading-relaxed">{{ $k->description }}</p>

                    <div class="mt-4 flex items-center text-primary-400 text-sm font-semibold">
                        Selengkapnya
                        <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-12 flex justify-center">
            {{ $kegiatan->links('vendor.pagination.custom') }}
        </div>

        @else
        <div class="text-center py-24 animate-on-scroll">
            <div class="w-20 h-20 bg-dark-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-dark-300 mb-2">Belum Ada Kegiatan</h3>
            <p class="text-dark-500 text-sm">Kegiatan akan segera diumumkan. Pantau terus!</p>
        </div>
        @endif
    </div>
</section>

@endsection
