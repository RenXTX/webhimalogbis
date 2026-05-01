@extends('layouts.public')

@section('title', 'Beranda — HIMA Logistik Bisnis')

@section('content')

{{-- ===== HERO SECTION ===== --}}
<section class="relative min-h-screen flex items-center justify-center overflow-hidden bg-grid">
    {{-- Background gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-dark-950 via-dark-900 to-dark-800"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-400/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-primary-400/10 rounded-full blur-2xl animate-float"></div>

    {{-- Hero Image (jika ada) --}}
    @if($beranda && $beranda->hero_image)
        <div class="absolute inset-0">
            <img src="{{ asset('storage/' . $beranda->hero_image) }}" alt="Hero" class="w-full h-full object-cover opacity-20">
            <div class="absolute inset-0 bg-gradient-to-b from-dark-900/60 via-dark-900/80 to-dark-900"></div>
        </div>
    @endif

    <div class="relative z-10 max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 text-center pt-24 pb-16">
        <div class="animate-fade-up animate-fill-both">
            <span class="inline-flex items-center gap-2 bg-primary-400/10 border border-primary-400/30 text-primary-400 text-sm font-semibold px-4 py-2 rounded-full mb-6">
                <span class="w-2 h-2 bg-primary-400 rounded-full animate-pulse-slow"></span>
                Himpunan Mahasiswa Logistik Bisnis
            </span>
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black text-white leading-tight mb-6 animate-fade-up animate-fill-both animate-delay-100">
            @if($beranda)
                {!! nl2br(e($beranda->title)) !!}
            @else
                Bersama Maju,<br>
                <span class="text-gradient">Bersama Berkarya</span>
            @endif
        </h1>

        <p class="text-lg sm:text-xl text-dark-300 max-w-2xl mx-auto mb-10 leading-relaxed animate-fade-up animate-fill-both animate-delay-200">
            {{ $beranda->subtitle ?? 'HIMA Logistik Bisnis adalah wadah pengembangan diri, kepemimpinan, dan solidaritas mahasiswa untuk mewujudkan generasi logistik yang unggul.' }}
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 animate-fade-up animate-fill-both animate-delay-300">
            <a href="{{ route('tentang') }}" class="btn-primary text-base px-8 py-4">
                Kenali Kami
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
            <a href="{{ route('kegiatan.index') }}" class="btn-outline text-base px-8 py-4">
                Lihat Kegiatan
            </a>
        </div>

        {{-- Scroll indicator --}}
        <div class="mt-16 animate-bounce animate-delay-500">
            <div class="w-6 h-10 border-2 border-dark-600 rounded-full mx-auto flex items-start justify-center pt-1.5">
                <div class="w-1 h-2.5 bg-primary-400 rounded-full"></div>
            </div>
        </div>
    </div>
</section>

{{-- ===== STATS SECTION ===== --}}
<section class="py-16 bg-dark-800 border-y border-dark-700">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            @php
                $stats = [
                    ['count' => $beranda->stat_anggota ?? '200', 'label' => 'Anggota Aktif', 'icon' => '👥'],
                    ['count' => $beranda->stat_kegiatan ?? '50', 'label' => 'Kegiatan Diselenggarakan', 'icon' => '📅'],
                    ['count' => $beranda->stat_divisi ?? '10', 'label' => 'Divisi Kerja', 'icon' => '🏢'],
                    ['count' => $beranda->stat_periode ?? '2025', 'label' => 'Priode', 'icon' => '📈'],
                ];
            @endphp

            @foreach($stats as $stat)
            <div class="animate-on-scroll">
                <div class="text-4xl mb-3">{{ $stat['icon'] }}</div>
                <div class="text-3xl md:text-4xl font-black text-primary-400" data-count="{{ $stat['count'] }}">0</div>
                <div class="text-dark-400 text-sm font-medium mt-1">{{ $stat['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ===== KEGIATAN TERBARU ===== --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12 animate-on-scroll">
            <span class="section-tag">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                Terbaru
            </span>
            <h2 class="section-title">Kegiatan Terbaru</h2>
            <div class="divider-yellow mx-auto"></div>
            <p class="section-desc mx-auto">Ikuti berbagai kegiatan seru dan bermanfaat bersama HIMA Logistik Bisnis.</p>
        </div>

        @if($kegiatanTerbaru->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($kegiatanTerbaru as $i => $k)
            <article class="card-hover group animate-on-scroll animate-delay-{{ ($i+1)*100 }}" style="animation-delay: {{ $i * 100 }}ms">
                <a href="{{ route('kegiatan.show', $k) }}" class="block">
                    <div class="relative overflow-hidden rounded-xl mb-5 bg-dark-700 aspect-video">
                        @if($k->image)
                            <img src="{{ asset('storage/' . $k->image) }}" alt="{{ $k->title }}"
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-14 h-14 text-dark-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            </div>
                        @endif
                        <div class="absolute top-3 left-3">
                            <span class="badge-primary">{{ $k->category }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 text-dark-400 text-xs mb-3">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                        {{ $k->formatted_date }}
                        @if($k->location)
                            <span>·</span>
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>
                            {{ $k->location }}
                        @endif
                    </div>

                    <h3 class="text-white font-bold text-lg leading-snug mb-2 group-hover:text-primary-400 transition-colors line-clamp-2">
                        {{ $k->title }}
                    </h3>
                    <p class="text-dark-400 text-sm line-clamp-2 leading-relaxed">{{ $k->description }}</p>

                    <div class="mt-4 flex items-center text-primary-400 text-sm font-semibold">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 ml-1.5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </div>
                </a>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-10 animate-on-scroll">
            <a href="{{ route('kegiatan.index') }}" class="btn-outline">
                Semua Kegiatan
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
        @else
        <div class="text-center py-16 text-dark-500">
            <svg class="w-16 h-16 mx-auto mb-4 opacity-30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <p class="text-lg font-medium">Belum ada kegiatan yang ditambahkan</p>
        </div>
        @endif
    </div>
</section>

{{-- ===== WELCOME / CTA SECTION ===== --}}
<section class="py-20 bg-dark-800 border-y border-dark-700">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center animate-on-scroll">
        <span class="section-tag mx-auto justify-center mb-4">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
            Bergabung Bersama Kami
        </span>
        <h2 class="section-title">
            {!! $beranda ? nl2br(e($beranda->welcome_text)) : 'Jadilah Bagian dari<br><span class="text-gradient">Keluarga HIMA</span>' !!}
        </h2>
        <div class="divider-yellow mx-auto"></div>
        <p class="section-desc mx-auto mb-8">
            {{ $beranda->description ?? 'Mari bergabung dan jadilah bagian dari komunitas mahasiswa logistik yang aktif, kreatif, dan berprestasi. Bersama kita wujudkan mimpi dan tujuan besar.' }}
        </p>
        <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
            <a href="{{ route('struktur') }}" class="btn-primary">
                Lihat Struktur Organisasi
            </a>
            <a href="{{ route('kontak') }}" class="btn-ghost text-dark-300 hover:text-white">
                Hubungi Kami
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>

@endsection
