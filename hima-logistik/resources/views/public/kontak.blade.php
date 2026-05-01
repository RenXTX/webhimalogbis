@extends('layouts.public')

@section('title', 'Kontak — HIMA Logistik Bisnis')

@section('content')

{{-- PAGE HEADER --}}
<section class="relative pt-32 pb-16 bg-grid overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-dark-950 to-dark-900"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="section-tag mx-auto justify-center">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
            Hubungi Kami
        </span>
        <h1 class="section-title text-5xl">Kontak</h1>
        <div class="divider-yellow mx-auto"></div>
        <p class="section-desc mx-auto">Jangan ragu untuk menghubungi kami. Kami siap membantu kamu.</p>
    </div>
</section>

{{-- KONTAK INFO --}}
<section class="py-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-16">
            {{-- Email --}}
            <div class="card-hover text-center animate-on-scroll">
                <div class="w-14 h-14 bg-primary-400/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Email</h3>
                <p class="text-dark-400 text-sm mb-4">Kirim pesan ke email kami</p>
                <a href="mailto:himalogbis@polbis.ac.id" class="text-primary-400 font-semibold hover:text-primary-300 transition-colors text-sm">
                    himalogbis@polbis.ac.id
                </a>
            </div>

            {{-- Instagram --}}
            <div class="card-hover text-center animate-on-scroll animate-delay-100">
                <div class="w-14 h-14 bg-pink-400/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-pink-400" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Instagram</h3>
                <p class="text-dark-400 text-sm mb-4">Follow akun resmi kami</p>
                <a href="https://instagram.com/hima.logbis" target="_blank" class="text-pink-400 font-semibold hover:text-pink-300 transition-colors text-sm">
                    @hima.logbis
                </a>
            </div>

            {{-- Alamat --}}
            <div class="card-hover text-center animate-on-scroll animate-delay-200">
                <div class="w-14 h-14 bg-blue-400/10 rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <svg class="w-7 h-7 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-white font-bold text-lg mb-2">Alamat</h3>
                <p class="text-dark-400 text-sm mb-4">Kunjungi sekretariat kami</p>
                <a href="https://maps.google.com/?q=Politeknik+Bisnis+Digital+Indonesia" target="_blank" rel="noopener noreferrer" class="inline-block text-blue-400 font-semibold text-sm hover:text-blue-300 transition-colors">
                    HIMA LOGBIS<br>Politeknik Bisnis Digital Indonesia
                </a>
            </div>
        </div>

        {{-- Info Card --}}
        <div class="glass p-8 rounded-3xl text-center animate-on-scroll">
            <div class="text-4xl mb-4">💬</div>
            <h2 class="text-2xl font-bold text-white mb-3">Jam Operasional Sekretariat</h2>
            <p class="text-dark-300 mb-6">Kami siap melayani kamu di waktu-waktu berikut:</p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-md mx-auto">
                <div class="bg-dark-700 rounded-xl p-4">
                    <div class="text-primary-400 font-semibold text-sm mb-1">Senin – Jumat</div>
                    <div class="text-white font-bold">08.00 – 17.00 WIB</div>
                </div>
                <div class="bg-dark-700 rounded-xl p-4">
                    <div class="text-primary-400 font-semibold text-sm mb-1">Sabtu</div>
                    <div class="text-white font-bold">09.00 – 13.00 WIB</div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
