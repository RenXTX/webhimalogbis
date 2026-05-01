@extends('layouts.public')

@section('title', 'Login Admin — HIMA Logistik Bisnis')

@section('content')
<div class="min-h-screen bg-grid flex flex-col justify-center py-12 sm:px-6 lg:px-8 relative overflow-hidden">
    {{-- Background elements --}}
    <div class="absolute inset-0 bg-gradient-to-br from-dark-950 via-dark-900 to-dark-800 -z-10"></div>
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-primary-400/5 rounded-full blur-3xl -z-10"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-primary-400/10 rounded-full blur-2xl animate-float -z-10"></div>

    <div class="sm:mx-auto sm:w-full sm:max-w-md animate-fade-up animate-fill-both">
        <div class="text-center">
            <span class="inline-flex items-center gap-2 bg-primary-400/10 border border-primary-400/30 text-primary-400 text-sm font-semibold px-4 py-2 rounded-full mb-6">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                Secure Admin Access
            </span>
            <h2 class="text-3xl font-black text-white text-center mb-2">
                Masuk ke Panel
            </h2>
            <p class="text-dark-400 text-sm">HIMA Logistik Bisnis</p>
        </div>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md animate-fade-up animate-fill-both animate-delay-100">
        <div class="glass py-8 px-4 sm:rounded-3xl sm:px-10 border border-dark-700 shadow-2xl relative overflow-hidden">
            {{-- Decorative top border --}}
            <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-primary-500 via-primary-300 to-primary-500"></div>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-dark-300 mb-1">
                        Alamat Email
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/></svg>
                        </div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                            class="form-input block w-full pl-10 sm:text-sm bg-dark-800 border-dark-600 rounded-xl focus:ring-primary-400 focus:border-primary-400 text-white placeholder-dark-500 transition-colors"
                            placeholder="Masukan User Email">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-sm" />
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-dark-300 mb-1">
                        Kata Sandi
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-dark-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/></svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="form-input block w-full pl-10 sm:text-sm bg-dark-800 border-dark-600 rounded-xl focus:ring-primary-400 focus:border-primary-400 text-white placeholder-dark-500 transition-colors"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-sm" />
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="remember" id="remember_me" class="sr-only peer">
                            <div class="w-9 h-5 bg-dark-600 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-primary-400"></div>
                        </label>
                        <span class="ml-2 text-sm text-dark-400">Ingat Saya</span>
                    </div>

                    @if (Route::has('password.request'))
                        <div class="text-sm">
                            <a href="{{ route('password.request') }}" class="font-medium text-primary-400 hover:text-primary-300 transition-colors">
                                Lupa sandi?
                            </a>
                        </div>
                    @endif
                </div>

                <div>
                    <button type="submit" class="w-full btn-primary flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-sm text-sm font-bold focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-dark-900 focus:ring-primary-500 group">
                        Masuk Sekarang
                        <svg class="ml-2 w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </button>
                </div>
            </form>

            <div class="mt-6 text-center">
                <a href="{{ url('/') }}" class="text-sm font-medium text-dark-500 hover:text-dark-300 transition-colors inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
