<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Beranda;
use App\Models\Kegiatan;
use App\Models\Struktur;

use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ===== SUPER ADMIN USER =====
        User::firstOrCreate(
            ['email' => 'superadmin@hima-logistik.ac.id'],
            [
                'name'              => 'Super Admin HIMA',
                'email'             => 'superadmin@hima-logistik.ac.id',
                'password'          => Hash::make('admin123'),
                'role'              => 'super_admin',
                'email_verified_at' => now(),
            ]
        );

        // ===== ADMIN USER =====
        User::firstOrCreate(
            ['email' => 'admin@hima-logistik.ac.id'],
            [
                'name'              => 'Admin HIMA',
                'email'             => 'admin@hima-logistik.ac.id',
                'password'          => Hash::make('admin123'),
                'role'              => 'admin',
                'email_verified_at' => now(),
            ]
        );

        // ===== SITE SETTINGS =====
        Setting::firstOrCreate(
            ['key' => 'is_website_open'],
            ['value' => 'true']
        );

        // ===== BERANDA =====
        Beranda::firstOrCreate(
            ['title' => 'Bersama Maju, Bersama Berkarya'],
            [
                'title'        => 'Bersama Maju, Bersama Berkarya',
                'subtitle'     => 'HIMA Logistik Bisnis adalah wadah pengembangan diri, kepemimpinan, dan solidaritas mahasiswa untuk mewujudkan generasi logistik yang unggul.',
                'description'  => 'Mari bergabung dan jadilah bagian dari komunitas mahasiswa logistik yang aktif, kreatif, dan berprestasi. Bersama kita wujudkan mimpi dan tujuan besar.',
                'welcome_text' => 'Jadilah Bagian dari Keluarga HIMA',
                'hero_image'   => null,
                'is_active'    => true,
            ]
        );

        // ===== KEGIATAN =====
        $kegiatan = [
            [
                'title'       => 'Pelantikan Pengurus HIMA 2025',
                'description' => 'Pelantikan resmi pengurus baru HIMA Logistik Bisnis periode 2025-2026. Kegiatan ini dihadiri oleh seluruh civitas akademika jurusan Logistik Bisnis dan menandai dimulainya masa bakti kepengurusan baru yang penuh semangat dan dedikasi.',
                'event_date'  => '2025-02-15',
                'location'    => 'Aula Kampus Logistik Bisnis',
                'category'    => 'Organisasi',
                'image'       => null,
            ],
            [
                'title'       => 'Seminar Logistik Nasional 2025',
                'description' => 'Seminar bertema "Transformasi Logistik Digital di Era 5.0" menghadirkan pembicara-pembicara terkemuka dari industri logistik nasional. Peserta mendapatkan wawasan terkini tentang perkembangan teknologi logistik dan peluang karir di bidang ini.',
                'event_date'  => '2025-03-20',
                'location'    => 'Gedung Serbaguna Kampus',
                'category'    => 'Akademik',
                'image'       => null,
            ],
            [
                'title'       => 'Bakti Sosial & Donor Darah',
                'description' => 'Kegiatan bakti sosial dan donor darah dalam rangka memperingati hari jadi HIMA. Kami berhasil mengumpulkan 120 kantong darah dan memberikan bantuan kepada masyarakat sekitar kampus.',
                'event_date'  => '2025-04-05',
                'location'    => 'Kampus & Lingkungan Sekitar',
                'category'    => 'Sosial',
                'image'       => null,
            ],
        ];

        foreach ($kegiatan as $k) {
            Kegiatan::firstOrCreate(['title' => $k['title']], $k);
        }

        // ===== STRUKTUR =====
        $strukturs = [
            // Pengurus Inti
            ['name' => 'Andi Pratama', 'position' => 'Ketua Umum', 'division' => 'Pengurus Inti', 'order' => 1],
            ['name' => 'Siti Rahayu', 'position' => 'Wakil Ketua', 'division' => 'Pengurus Inti', 'order' => 2],
            ['name' => 'Budi Santoso', 'position' => 'Sekretaris Umum', 'division' => 'Pengurus Inti', 'order' => 3],
            ['name' => 'Dewi Kartika', 'position' => 'Bendahara Umum', 'division' => 'Pengurus Inti', 'order' => 4],
            // Divisi Akademik
            ['name' => 'Rizky Firmansyah', 'position' => 'Kepala Divisi', 'division' => 'Divisi Akademik & Prestasi', 'order' => 10],
            ['name' => 'Putri Handayani', 'position' => 'Anggota', 'division' => 'Divisi Akademik & Prestasi', 'order' => 11],
            // Divisi Kemahasiswaan
            ['name' => 'Muhammad Fauzi', 'position' => 'Kepala Divisi', 'division' => 'Divisi Kemahasiswaan', 'order' => 20],
            ['name' => 'Laila Nurjanah', 'position' => 'Anggota', 'division' => 'Divisi Kemahasiswaan', 'order' => 21],
            // Divisi Humas
            ['name' => 'Kevin Adrianto', 'position' => 'Kepala Divisi', 'division' => 'Divisi Humas & Media', 'order' => 30],
            ['name' => 'Aulia Fitri', 'position' => 'Anggota', 'division' => 'Divisi Humas & Media', 'order' => 31],
        ];

        foreach ($strukturs as $s) {
            Struktur::firstOrCreate(
                ['name' => $s['name'], 'division' => $s['division']],
                array_merge($s, ['photo' => null, 'instagram' => null])
            );
        }
    }
}
