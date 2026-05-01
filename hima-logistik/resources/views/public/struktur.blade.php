@extends('layouts.public')

@section('title', 'Struktur Organisasi — HIMA Logistik Bisnis')

@section('content')

{{-- PAGE HEADER --}}
<section class="relative pt-32 pb-16 bg-grid overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-dark-950 to-dark-900"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="section-tag mx-auto justify-center">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            Kepengurusan
        </span>
        <h1 class="section-title text-5xl">Struktur Organisasi</h1>
        <div class="divider-yellow mx-auto"></div>
        <p class="section-desc mx-auto">Kepengurusan HIMA Logistik Bisnis yang berdedikasi untuk kemajuan bersama.</p>
    </div>
</section>

{{-- STRUKTUR --}}
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($strukturs->isNotEmpty())
            @foreach($strukturs as $division => $members)

            <div class="mb-16 animate-on-scroll">
                {{-- Division Header --}}
                <div class="flex items-center gap-4 mb-8">
                    <div class="h-px flex-1 bg-gradient-to-r from-transparent to-dark-700"></div>
                    <h2 class="text-lg font-bold text-primary-400 px-4 py-2 bg-primary-400/10 border border-primary-400/30 rounded-full whitespace-nowrap">
                        {{ $division }}
                    </h2>
                    <div class="h-px flex-1 bg-gradient-to-l from-transparent to-dark-700"></div>
                </div>

                {{-- Members Grid --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-5">
                    @foreach($members as $i => $m)
                    <div class="card-hover text-center group animate-on-scroll" style="animation-delay: {{ $i * 80 }}ms">
                        {{-- Photo --}}
                        <div class="relative w-20 h-20 mx-auto mb-4">
                            @if($m->photo)
                                <img src="{{ asset('storage/' . $m->photo) }}" alt="{{ $m->name }}"
                                     class="w-full h-full rounded-2xl object-cover border-2 border-dark-600 group-hover:border-primary-400 transition-colors duration-300">
                            @else
                                <div class="w-full h-full rounded-2xl bg-gradient-to-br from-primary-400/20 to-dark-700 border-2 border-dark-600 group-hover:border-primary-400 flex items-center justify-center transition-colors duration-300">
                                    <span class="text-2xl font-black text-primary-400">
                                        {{ strtoupper(substr($m->name, 0, 1)) }}
                                    </span>
                                </div>
                            @endif
                            {{-- Online dot --}}
                            <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-primary-400 rounded-full border-2 border-dark-800"></div>
                        </div>

                        <h3 class="text-white font-bold text-sm leading-tight mb-1 line-clamp-2">{{ $m->name }}</h3>
                        <p class="text-primary-400 text-xs font-semibold mb-2 leading-tight line-clamp-2">{{ $m->position }}</p>

                        @if($m->instagram)
                        <a href="https://instagram.com/{{ ltrim($m->instagram, '@') }}" target="_blank"
                           class="inline-flex items-center gap-1 text-dark-400 hover:text-pink-400 text-xs transition-colors">
                            <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            {{ $m->instagram }}
                        </a>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>

            @endforeach
        @else
        <div class="text-center py-24 animate-on-scroll">
            <div class="w-20 h-20 bg-dark-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <svg class="w-10 h-10 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            </div>
            <h3 class="text-xl font-bold text-dark-300 mb-2">Struktur Belum Tersedia</h3>
            <p class="text-dark-500 text-sm">Data struktur organisasi akan segera diperbarui.</p>
        </div>
        @endif

    </div>
</section>

@endsection
