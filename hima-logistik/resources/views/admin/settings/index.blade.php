@extends('layouts.admin')

@section('title', 'Pengaturan Situs')
@section('header', 'Pengaturan Situs')

@section('content')
<div class="bg-dark-800 rounded-2xl p-6 md:p-8 border border-dark-700 shadow-xl max-w-3xl mx-auto">
    <div class="mb-6 flex items-start gap-4">
        <div class="w-12 h-12 bg-primary-400/10 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-white mb-1">Akses Website Publik</h2>
            <p class="text-dark-400 text-sm">Gunakan fitur ini untuk menutup sementara akses website dari publik (Maintenance Mode). Saat website ditutup, hanya admin yang bisa mengakses halaman login dan panel ini.</p>
        </div>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" class="bg-dark-900/50 p-6 rounded-xl border border-dark-700">
        @csrf
        
        <div class="flex items-center justify-between">
            <div>
                <div class="text-white font-medium mb-1">Status Website Saat Ini</div>
                @if($isOpen)
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-400/10 text-green-400 border border-green-400/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-400 animate-pulse"></span>
                        Terbuka untuk Publik
                    </span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-red-400/10 text-red-400 border border-red-400/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                        Ditutup (Maintenance)
                    </span>
                @endif
            </div>

            <div class="flex items-center">
                <input type="hidden" name="is_website_open" value="0">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_website_open" value="1" class="sr-only peer" {{ $isOpen ? 'checked' : '' }} onchange="this.form.submit()">
                    <div class="w-14 h-7 bg-dark-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-primary-400"></div>
                </label>
            </div>
        </div>
    </form>
</div>
@endsection
