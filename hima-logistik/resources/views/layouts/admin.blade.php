<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — HIMA Logistik Bisnis</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-dark-900 font-sans text-white min-h-screen" x-data="{ sidebarOpen: window.innerWidth >= 1024 }">

<div class="flex min-h-screen">
    <!-- ===== SIDEBAR ===== -->
    <aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
           class="fixed lg:relative lg:translate-x-0 inset-y-0 left-0 z-50 w-64 bg-dark-800 border-r border-dark-700 flex flex-col transition-transform duration-300 ease-in-out">

        <!-- Logo -->
        <div class="flex items-center gap-3 p-6 border-b border-dark-700">
            <div class="w-10 h-10 bg-primary-400 rounded-xl flex items-center justify-center font-black text-dark-900 text-lg">H</div>
            <div>
                <div class="font-bold text-white text-sm">HIMA Admin</div>
                <div class="text-primary-400 text-xs">Logistik Bisnis</div>
            </div>
        </div>

        <!-- Nav Links -->
        <nav class="flex-1 p-4 space-y-1 overflow-y-auto">
            <p class="text-dark-500 text-xs font-semibold uppercase tracking-widest px-4 pt-2 pb-3">Menu Utama</p>

            <a href="{{ route('admin.dashboard') }}"
               class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'sidebar-link-active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/></svg>
                Dashboard
            </a>

            <p class="text-dark-500 text-xs font-semibold uppercase tracking-widest px-4 pt-4 pb-3">Kelola Konten</p>

            <a href="{{ route('admin.beranda.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.beranda*') ? 'sidebar-link-active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Beranda
            </a>

            <a href="{{ route('admin.kegiatan.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.kegiatan*') ? 'sidebar-link-active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                Kegiatan
            </a>

            <a href="{{ route('admin.struktur.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.struktur*') ? 'sidebar-link-active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Struktur Organisasi
            </a>

            @if(auth()->check() && auth()->user()->isSuperAdmin())
            <p class="text-dark-500 text-xs font-semibold uppercase tracking-widest px-4 pt-4 pb-3">Super Admin</p>
            <a href="{{ route('admin.settings.index') }}"
               class="sidebar-link {{ request()->routeIs('admin.settings*') ? 'sidebar-link-active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Pengaturan Situs
            </a>
            @endif

            <p class="text-dark-500 text-xs font-semibold uppercase tracking-widest px-4 pt-4 pb-3">Aksi</p>

            <!-- <a href="{{ route('admin.profile.edit') }}"
               class="sidebar-link {{ request()->routeIs('admin.profile*') ? 'sidebar-link-active' : '' }}">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                Profil Saya
            </a> -->

            <a href="{{ route('beranda') }}" class="sidebar-link" target="_blank">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                Lihat Website
            </a>
        </nav>

        <!-- User & Logout -->
        <div class="p-4 border-t border-dark-700">
            <div class="flex items-center gap-3 mb-3">
                <div class="w-9 h-9 bg-primary-400/20 border border-primary-400/30 rounded-full flex items-center justify-center text-primary-400 font-bold text-sm">
                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="flex-1 min-w-0">
                    <div class="text-white text-sm font-medium truncate">{{ auth()->user()->name ?? 'Admin' }}</div>
                    <div class="text-dark-400 text-xs truncate">{{ auth()->user()->email ?? '' }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center gap-2 px-3 py-2 rounded-lg text-dark-400 hover:text-red-400 hover:bg-red-400/10 transition-all duration-200 text-sm font-medium">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                    Keluar
                </button>
            </form>
        </div>
    </aside>

    <!-- Overlay mobile -->
    <div x-show="sidebarOpen && window.innerWidth < 1024"
         @click="sidebarOpen = false"
         class="fixed inset-0 bg-black/60 z-40 lg:hidden"></div>

    <!-- ===== MAIN AREA ===== -->
    <div class="flex-1 flex flex-col min-w-0">
        <!-- Topbar -->
        <header class="sticky top-0 z-30 bg-dark-800/95 backdrop-blur-md border-b border-dark-700 px-6 py-4 flex items-center gap-4">
            <button @click="sidebarOpen = !sidebarOpen"
                    class="p-2 rounded-lg text-dark-400 hover:text-white hover:bg-dark-700 transition-colors lg:hidden">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>

            <div class="flex-1">
                <h1 class="text-white font-semibold text-lg">@yield('page-title', 'Dashboard')</h1>
                <nav class="text-dark-400 text-sm flex items-center gap-1.5 mt-0.5">
                    <a href="{{ route('admin.dashboard') }}" class="hover:text-primary-400 transition-colors">Admin</a>
                    @hasSection('breadcrumb')
                        <span>/</span>
                        @yield('breadcrumb')
                    @endif
                </nav>
            </div>

            <div class="text-dark-400 text-sm hidden sm:block">
                {{ now()->translatedFormat('l, d F Y') }}
            </div>
        </header>

        <!-- Flash Messages -->
        <div class="px-6 pt-4">
            @if(session('success'))
                <div class="alert-success mb-4" data-flash>
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert-error mb-4" data-flash>
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ session('error') }}
                </div>
            @endif
        </div>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</div>

</body>
</html>
