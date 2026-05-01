-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Apr 2026 pada 22.07
-- Versi server: 8.0.30
-- Versi PHP: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_himalogbis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berandas`
--

CREATE TABLE `berandas` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `welcome_text` text COLLATE utf8mb4_unicode_ci,
  `hero_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stat_anggota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '200',
  `stat_kegiatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '50',
  `stat_divisi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '10',
  `stat_periode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '2025'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berandas`
--

INSERT INTO `berandas` (`id`, `title`, `subtitle`, `description`, `welcome_text`, `hero_image`, `is_active`, `created_at`, `updated_at`, `stat_anggota`, `stat_kegiatan`, `stat_divisi`, `stat_periode`) VALUES
(1, 'Bersama Maju, Bersama Berkarya', 'HIMA Logistik Bisnis adalah wadah pengembangan diri, kepemimpinan, dan solidaritas mahasiswa untuk mewujudkan generasi logistik yang unggul.', 'Mari bergabung dan jadilah bagian dari komunitas mahasiswa logistik yang aktif, kreatif, dan berprestasi. Bersama kita wujudkan mimpi dan tujuan besar.', 'Jadilah Bagian dari Keluarga HIMA', 'beranda/ZuVgd4S324mzZq3o9kHh9QHaF4Dl3PgGYS1xb6Kt.png', 1, '2026-04-29 23:30:12', '2026-04-30 12:30:44', '10', '0', '7', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('hima-logistik-bisnis-cache-admin@hima-logbis.ac.id|127.0.0.1', 'i:3;', 1777540586),
('hima-logistik-bisnis-cache-admin@hima-logbis.ac.id|127.0.0.1:timer', 'i:1777540586;', 1777540586);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatans`
--

CREATE TABLE `kegiatans` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Umum',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kegiatans`
--

INSERT INTO `kegiatans` (`id`, `title`, `description`, `event_date`, `location`, `category`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Pelantikan Pengurus HIMA 2025', 'Pelantikan resmi pengurus baru HIMA Logistik Bisnis periode 2025-2026. Kegiatan ini dihadiri oleh seluruh civitas akademika jurusan Logistik Bisnis dan menandai dimulainya masa bakti kepengurusan baru yang penuh semangat dan dedikasi.', '2025-02-15', 'Aula Kampus Logistik Bisnis', 'Organisasi', NULL, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(2, 'Seminar Logistik Nasional 2025', 'Seminar bertema \"Transformasi Logistik Digital di Era 5.0\" menghadirkan pembicara-pembicara terkemuka dari industri logistik nasional. Peserta mendapatkan wawasan terkini tentang perkembangan teknologi logistik dan peluang karir di bidang ini.', '2025-03-20', 'Gedung Serbaguna Kampus', 'Akademik', NULL, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(3, 'Bakti Sosial & Donor Darah', 'Kegiatan bakti sosial dan donor darah dalam rangka memperingati hari jadi HIMA. Kami berhasil mengumpulkan 120 kantong darah dan memberikan bantuan kepada masyarakat sekitar kampus.', '2025-04-05', 'Kampus & Lingkungan Sekitar', 'Sosial', NULL, '2026-04-29 23:30:12', '2026-04-29 23:30:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_30_042925_create_berandas_table', 1),
(5, '2026_04_30_042926_create_kegiatans_table', 1),
(6, '2026_04_30_042926_create_strukturs_table', 1),
(7, '2026_04_30_192252_add_stats_to_berandas_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('XbEm9GxuJqPZe74zvzKNZkXnFymm6EOMWAGZBU1Z', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIwTlgwVzQ5U21IT0x0b1Rnd3FIcHNGRzFxd0xRdlltbzk0cFlMWmtIIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvbG9jYWxob3N0OjgwMDBcL2tvbnRhayIsInJvdXRlIjoia29udGFrIn19', 1777578957);

-- --------------------------------------------------------

--
-- Struktur dari tabel `strukturs`
--

CREATE TABLE `strukturs` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `strukturs`
--

INSERT INTO `strukturs` (`id`, `name`, `position`, `division`, `photo`, `instagram`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Nabilah Nur Maulida', 'Ketua HIMA Logistik Bisnis', 'Pengurus Inti', 'struktur/Cl40f9LZT1L1dpYnkG7Qk9NeldvIJqD1sKplPbPf.png', 'nabilanurrm', 1, '2026-04-29 23:30:12', '2026-04-30 04:46:58'),
(2, 'Siti Rahayu', 'Wakil Ketua', 'Pengurus Inti', NULL, NULL, 2, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(3, 'Budi Santoso', 'Sekretaris Umum', 'Pengurus Inti', NULL, NULL, 3, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(4, 'Dewi Kartika', 'Bendahara Umum', 'Pengurus Inti', NULL, NULL, 4, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(5, 'Rizky Firmansyah', 'Kepala Divisi', 'Divisi Akademik & Prestasi', NULL, NULL, 10, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(6, 'Putri Handayani', 'Anggota', 'Divisi Akademik & Prestasi', NULL, NULL, 11, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(7, 'Muhammad Fauzi', 'Kepala Divisi', 'Divisi Kemahasiswaan', NULL, NULL, 20, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(8, 'Laila Nurjanah', 'Anggota', 'Divisi Kemahasiswaan', NULL, NULL, 21, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(9, 'Kevin Adrianto', 'Kepala Divisi', 'Divisi Humas & Media', NULL, NULL, 30, '2026-04-29 23:30:12', '2026-04-29 23:30:12'),
(10, 'Aulia Fitri', 'Anggota', 'Divisi Humas & Media', NULL, NULL, 31, '2026-04-29 23:30:12', '2026-04-29 23:30:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin HIMA', 'admin@hima-logistik.ac.id', '2026-04-29 23:30:12', '$2y$12$.updPXuDlNdwd30hDKhSJONxhHSYd2uSm63zqDPZOqTXIcEmwqDK.', NULL, '2026-04-29 23:30:12', '2026-04-29 23:30:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berandas`
--
ALTER TABLE `berandas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `strukturs`
--
ALTER TABLE `strukturs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berandas`
--
ALTER TABLE `berandas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatans`
--
ALTER TABLE `kegiatans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `strukturs`
--
ALTER TABLE `strukturs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
