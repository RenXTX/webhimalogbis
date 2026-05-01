@extends('layouts.public')

@section('title', 'Tentang — HIMA Logistik Bisnis')

@section('content')

{{-- PAGE HEADER --}}
<section class="relative pt-32 pb-16 bg-grid overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-dark-950 to-dark-900"></div>
    <div class="absolute top-20 right-10 w-64 h-64 bg-primary-400/5 rounded-full blur-3xl"></div>
    <div class="relative z-10 max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="section-tag mx-auto justify-center">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Profil Organisasi
        </span>
        <h1 class="section-title text-5xl">Tentang Kami</h1>
        <div class="divider-yellow mx-auto"></div>
        <p class="section-desc mx-auto">Mengenal lebih dekat HIMA Logistik Bisnis — sejarah, visi, dan misi organisasi kami.</p>
    </div>
</section>

{{-- SEJARAH --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">
            <div class="animate-on-scroll">
                <span class="section-tag">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    Latar Belakang
                </span>
                <h2 class="text-3xl font-bold text-white mb-4">Sejarah Singkat</h2>
                <div class="divider-yellow"></div>
                <div class="text-dark-300 leading-relaxed space-y-4">
                    <p>
                        HIMA Logistik Bisnis berdiri sebagai wadah resmi bagi mahasiswa Jurusan Logistik Bisnis.
                        Didirikan dengan semangat untuk menghimpun, mengembangkan, dan memberdayakan seluruh
                        mahasiswa agar menjadi individu yang kompeten, berkarakter, dan berdaya saing tinggi.
                    </p>
                    <p>
                        Sejak awal berdiri, HIMA Logistik Bisnis telah menjalankan berbagai program kerja
                        yang meliputi pengembangan akademik, soft skills, kepemimpinan, dan sosial kemasyarakatan.
                    </p>
                    <p>
                        Dengan semangat kebersamaan dan profesionalisme, kami terus berkomitmen untuk memberikan
                        kontribusi terbaik bagi mahasiswa dan institusi.
                    </p>
                </div>
            </div>

            <div class="animate-on-scroll animate-delay-200">
                <div class="relative">
                    <div class="glass p-8 rounded-3xl">
                        <div class="grid grid-cols-2 gap-4">
                            @foreach([
                                ['icon' => '🎓', 'label' => 'Visi Akademik', 'desc' => 'Mendorong prestasi mahasiswa dalam bidang logistik'],
                                ['icon' => '🤝', 'label' => 'Solidaritas', 'desc' => 'Membangun rasa kebersamaan dan kepedulian sosial'],
                                ['icon' => '🚀', 'label' => 'Inovasi', 'desc' => 'Mendorong kreativitas dan ide-ide segar mahasiswa'],
                                ['icon' => '🌟', 'label' => 'Kepemimpinan', 'desc' => 'Mencetak pemimpin logistik masa depan'],
                            ] as $item)
                            <div class="bg-dark-800 rounded-2xl p-5 border border-dark-700 hover:border-primary-400/30 transition-colors">
                                <div class="text-3xl mb-3">{{ $item['icon'] }}</div>
                                <h3 class="text-white font-semibold text-sm mb-1">{{ $item['label'] }}</h3>
                                <p class="text-dark-400 text-xs leading-relaxed">{{ $item['desc'] }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-primary-400/10 rounded-full blur-xl"></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- VISI & MISI --}}
<section class="py-20 bg-dark-800 border-y border-dark-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 animate-on-scroll">
            <span class="section-tag mx-auto justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                Tujuan Organisasi
            </span>
            <h2 class="section-title">Visi & Misi</h2>
            <div class="divider-yellow mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- VISI --}}
            <div class="card border-l-4 border-primary-400 animate-on-scroll">
                <div class="flex items-center gap-3 mb-5">
                    <div class="stat-icon bg-primary-400/10 text-primary-400">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Visi</h3>
                </div>
                <div class="bg-dark-700 rounded-xl p-5 border border-dark-600">
                    <p class="text-dark-200 leading-relaxed italic text-lg">
                        "Menjadi himpunan mahasiswa yang unggul, inovatif, dan berdaya saing dalam bidang logistik
                        bisnis serta mampu berkontribusi nyata bagi masyarakat dan dunia industri."
                    </p>
                </div>
            </div>

            {{-- MISI --}}
            <div class="card border-l-4 border-dark-600 animate-on-scroll animate-delay-200">
                <div class="flex items-center gap-3 mb-5">
                    <div class="stat-icon bg-dark-700 text-dark-300">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/></svg>
                    </div>
                    <h3 class="text-2xl font-bold text-white">Misi</h3>
                </div>
                <ul class="space-y-3">
                    @foreach([
                        'Menyelenggarakan kegiatan akademik dan non-akademik yang berkualitas',
                        'Mengembangkan potensi dan kreativitas mahasiswa di bidang logistik bisnis',
                        'Membangun karakter mahasiswa yang jujur, bertanggung jawab, dan profesional',
                        'Menjalin sinergi dengan stakeholder industri dan dunia kerja',
                        'Menciptakan lingkungan organisasi yang inklusif dan demokratis',
                    ] as $i => $m)
                    <li class="flex items-start gap-3 text-dark-300">
                        <span class="w-6 h-6 bg-primary-400/20 text-primary-400 rounded-full flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">{{ $i+1 }}</span>
                        <span class="leading-relaxed">{{ $m }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>

{{-- NILAI-NILAI --}}
<section class="py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-14 animate-on-scroll">
            <span class="section-tag mx-auto justify-center">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                Nilai Inti
            </span>
            <h2 class="section-title">Nilai-Nilai Organisasi</h2>
            <div class="divider-yellow mx-auto"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-5">
            @foreach([
                ['icon' => '🎯', 'value' => 'Integritas', 'color' => 'text-yellow-400'],
                ['icon' => '💡', 'value' => 'Inovasi', 'color' => 'text-blue-400'],
                ['icon' => '🤝', 'value' => 'Kolaborasi', 'color' => 'text-green-400'],
                ['icon' => '🌱', 'value' => 'Pertumbuhan', 'color' => 'text-emerald-400'],
                ['icon' => '⚡', 'value' => 'Profesional', 'color' => 'text-orange-400'],
            ] as $i => $v)
            <div class="card-hover text-center animate-on-scroll" style="animation-delay: {{ $i * 80 }}ms">
                <div class="text-4xl mb-4">{{ $v['icon'] }}</div>
                <h3 class="text-white font-bold text-sm">{{ $v['value'] }}</h3>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
