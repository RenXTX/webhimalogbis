<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $description ?? 'Website Resmi HIMA Logistik Bisnis' }}">
    <title>@yield('title', 'HIMA Logistik Bisnis')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark-900 text-white font-sans min-h-screen">

    <!-- NAVBAR -->
    <nav id="navbar" class="fixed top-0 left-0 right-0 z-50 bg-transparent transition-all duration-300"
         x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="{{ route('beranda') }}" class="flex items-center gap-3 group">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo HIMA" class="w-20 h-20 object-contain group-hover:scale-105 transition-transform" onerror="this.onerror=null; this.outerHTML='<div class=\'w-10 h-10 bg-primary-400 rounded-xl flex items-center justify-center font-black text-dark-900 text-lg group-hover:scale-105 transition-transform\'>H</div>';">
                    <div class="hidden sm:block">
                        <div class="font-bold text-white text-base leading-tight">HIMA</div>
                        <div class="text-primary-400 text-xs font-medium leading-tight">Logistik Bisnis</div>
                    </div>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center gap-1">
                    @foreach([['route' => 'beranda', 'label' => 'Beranda'], ['route' => 'tentang', 'label' => 'Tentang'], ['route' => 'kegiatan.index', 'label' => 'Kegiatan'], ['route' => 'struktur', 'label' => 'Struktur'], ['route' => 'kontak', 'label' => 'Kontak']] as $menu)
                    <a href="{{ route($menu['route']) }}"
                       class="relative px-4 py-2 rounded-lg font-medium transition-colors duration-200 {{ request()->routeIs(str_replace('.index','',$menu['route']).'*') ? 'text-primary-400' : 'text-dark-300 hover:text-yellow-400' }}">
                        {{ $menu['label'] }}
                        @if(request()->routeIs(str_replace('.index','',$menu['route']).'*'))
                            <span class="absolute bottom-0 left-4 right-4 h-0.5 bg-primary-400 rounded-full"></span>
                        @endif
                    </a>
                    @endforeach
                </div>

                <!-- Auth Button -->
                <!-- <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="btn-primary text-sm py-2 px-4">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
                            Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn-outline text-sm py-2 px-4">Login Admin</a>
                    @endauth
                </div> -->

                <!-- Hamburger -->
                <button @click="open = !open" class="md:hidden p-2 rounded-lg text-dark-300 hover:text-white hover:bg-dark-700 transition-colors">
                    <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                    <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
             class="md:hidden bg-dark-800/95 backdrop-blur-md border-b border-dark-700">
            <div class="px-4 py-4 space-y-1">
                <a href="{{ route('beranda') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('beranda') ? 'bg-primary-400/10 text-primary-400' : 'text-dark-300 hover:text-white hover:bg-dark-700' }} transition-colors font-medium">Beranda</a>
                <a href="{{ route('tentang') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('tentang') ? 'bg-primary-400/10 text-primary-400' : 'text-dark-300 hover:text-white hover:bg-dark-700' }} transition-colors font-medium">Tentang</a>
                <a href="{{ route('kegiatan.index') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('kegiatan*') ? 'bg-primary-400/10 text-primary-400' : 'text-dark-300 hover:text-white hover:bg-dark-700' }} transition-colors font-medium">Kegiatan</a>
                <a href="{{ route('struktur') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('struktur') ? 'bg-primary-400/10 text-primary-400' : 'text-dark-300 hover:text-white hover:bg-dark-700' }} transition-colors font-medium">Struktur</a>
                <a href="{{ route('kontak') }}" class="block px-4 py-3 rounded-xl {{ request()->routeIs('kontak') ? 'bg-primary-400/10 text-primary-400' : 'text-dark-300 hover:text-white hover:bg-dark-700' }} transition-colors font-medium">Kontak</a>
                <div class="pt-2 border-t border-dark-700">
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="block text-center px-4 py-3 rounded-xl bg-primary-400 text-dark-900 font-semibold">Admin Panel</a>
                    @else
                        <!-- <a href="{{ route('login') }}" class="block text-center px-4 py-3 rounded-xl border border-primary-400 text-primary-400 font-semibold">Login Admin</a> -->
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main>@yield('content')</main>

    <!-- FOOTER -->
    <footer class="bg-dark-950 border-t border-dark-700 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div>
                    <a href="{{ route('beranda') }}" class="flex items-center gap-3 mb-5 group">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo HIMA" class="w-20 h-20 object-contain group-hover:scale-105 transition-transform" onerror="this.onerror=null; this.outerHTML='<div class=\'w-10 h-10 bg-primary-400 rounded-xl flex items-center justify-center font-black text-dark-900 text-lg\'>H</div>';">
                        <div>
                            <div class="font-bold text-white group-hover:text-primary-400 transition-colors">HIMA Logistik Bisnis</div>
                            <div class="text-dark-400 text-xs">Himpunan Mahasiswa</div>
                        </div>
                    </a>
                    <p class="text-dark-400 text-sm leading-relaxed">
                        Wadah pengembangan diri, kepemimpinan, dan solidaritas mahasiswa Logistik Bisnis.
                    </p>
                    
                    <div class="mt-8">
                        <p class="text-dark-600 text-[10px] mb-3 uppercase tracking-widest font-bold">Bagian dari:</p>
                        <a href="https://polbis.ac.id" target="_blank" rel="noopener noreferrer" class="flex items-center gap-4 group" title="Kunjungi Website Kampus POLBIS">
                            <img src="{{ asset('images/logo_kampus.png') }}" alt="Logo Kampus POLBIS" class="h-12 w-auto object-contain opacity-80 group-hover:opacity-100 transition-all duration-300" onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name=POLBIS&background=0D8ABC&color=fff';">
                            <div class="flex flex-col">
                                <span class="text-white font-bold text-sm tracking-tight group-hover:text-primary-400 transition-colors">Politeknik Bisnis Digital Indonesia</span>
                                <span class="text-primary-400 font-extrabold text-xs uppercase tracking-wider">POLBIS</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-5">Navigasi</h3>
                    <ul class="space-y-3">
                        <li><a href="{{ route('beranda') }}" class="text-dark-400 hover:text-primary-400 text-sm transition-colors">Beranda</a></li>
                        <li><a href="{{ route('tentang') }}" class="text-dark-400 hover:text-primary-400 text-sm transition-colors">Tentang Kami</a></li>
                        <li><a href="{{ route('kegiatan.index') }}" class="text-dark-400 hover:text-primary-400 text-sm transition-colors">Kegiatan</a></li>
                        <li><a href="{{ route('struktur') }}" class="text-dark-400 hover:text-primary-400 text-sm transition-colors">Struktur Organisasi</a></li>
                        <li><a href="{{ route('kontak') }}" class="text-dark-400 hover:text-primary-400 text-sm transition-colors">Kontak</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-semibold mb-5">Hubungi Kami</h3>
                    <ul class="space-y-3 text-dark-400 text-sm">
                        <li>
                            <a href="mailto:himalogbis@polbis.ac.id" class="flex items-center gap-3 hover:text-primary-400 transition-colors">
                                <svg class="w-4 h-4 text-primary-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                himalogbis@email.com
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/hima.logbis" target="_blank" rel="noopener noreferrer" class="flex items-center gap-3 hover:text-primary-400 transition-colors">
                                <svg class="w-4 h-4 text-primary-400 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                @hima.logbis
                            </a>
                        </li>
                        <li>
                            <a href="https://maps.google.com/?q=Politeknik+Bisnis+Digital+Indonesia" target="_blank" rel="noopener noreferrer" class="flex items-start gap-3 hover:text-primary-400 transition-colors">
                                <svg class="w-4 h-4 text-primary-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                Politeknik Bisnis Digital Indonesia
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mt-10 pt-6 border-t border-dark-700 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-dark-500 text-sm">&copy; {{ date('Y') }} HIMA Logistik Bisnis. Semua hak dilindungi.</p>
                <p class="text-dark-500 text-xs">Dibuat dengan <span class="text-primary-400">♥</span> oleh Tim HIMA TRPL</p>
            </div>
        </div>
    </footer>
</body>
</html>
