@extends('layouts.public')

@section('title', 'Sedang dalam Pemeliharaan — HIMA Logistik Bisnis')

@section('content')
<div class="min-h-screen bg-grid flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative overflow-hidden">
    {{-- Background elements --}}
    <div class="absolute inset-0 bg-gradient-to-br from-dark-950 via-dark-900 to-dark-800 -z-10"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-400/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-primary-400/10 rounded-full blur-2xl animate-float -z-10"></div>

    <div class="sm:mx-auto sm:w-full sm:max-w-2xl animate-fade-up text-center">
        <div class="w-24 h-24 bg-primary-400/10 rounded-3xl flex items-center justify-center mx-auto mb-8 animate-float">
            <svg class="w-12 h-12 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        
        <h1 class="text-4xl sm:text-5xl font-black text-white mb-6 tracking-tight">
            Kami Sedang <span class="text-primary-400">Bersiap!</span>
        </h1>
        
        <p class="text-dark-300 text-lg sm:text-xl max-w-xl mx-auto mb-10 leading-relaxed">
            Website HIMA Logistik Bisnis sedang dalam masa pemeliharaan rutin atau pembaruan sistem. Kami akan segera kembali dengan pengalaman yang lebih baik. Terima kasih atas kesabarannya!
        </p>

        <div class="inline-flex items-center gap-3 bg-dark-800/80 border border-dark-700 backdrop-blur-sm px-6 py-3 rounded-full text-sm text-dark-400">
            <span class="relative flex h-3 w-3">
              <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary-400 opacity-75"></span>
              <span class="relative inline-flex rounded-full h-3 w-3 bg-primary-500"></span>
            </span>
            Sistem Sedang Ditingkatkan
        </div>
    </div>
</div>

<script>
    // Sembunyikan navbar & footer di halaman 503 secara otomatis
    document.addEventListener('DOMContentLoaded', function() {
        const navbar = document.getElementById('navbar');
        const footer = document.querySelector('footer');
        if (navbar) navbar.style.display = 'none';
        if (footer) footer.style.display = 'none';
    });
</script>
@endsection
