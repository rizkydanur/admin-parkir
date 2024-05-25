-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 25 Bulan Mei 2024 pada 04.53
-- Versi server: 5.7.39
-- Versi PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminParkir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akumulasi_parkirs`
--

CREATE TABLE `akumulasi_parkirs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_kendaraan` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `akumulasi_parkirs`
--

INSERT INTO `akumulasi_parkirs` (`id`, `total_kendaraan`, `created_at`, `updated_at`) VALUES
(2, 6, '2024-05-25 04:19:27', '2024-05-25 04:45:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_11_065335_add_type_to_users_table', 1),
(6, '2014_10_12_100000_create_password_resets_table', 2),
(7, '2024_05_14_100405_create_parkir_masuk_table', 2),
(8, '2024_05_14_100450_create_parkir_keluar_table', 2),
(9, '2024_05_15_015415_create_parkir_masuks_table', 3),
(10, '2024_05_15_015746_create_parkir_keluars_table', 4),
(11, '2016_06_01_000001_create_oauth_auth_codes_table', 5),
(12, '2016_06_01_000002_create_oauth_access_tokens_table', 5),
(13, '2016_06_01_000003_create_oauth_refresh_tokens_table', 5),
(14, '2016_06_01_000004_create_oauth_clients_table', 5),
(15, '2016_06_01_000005_create_oauth_personal_access_clients_table', 5),
(16, '2024_05_23_000234_create_akumulasi_parkir_table', 6),
(17, '2024_05_23_011011_create_akumulasi_parkirs_table', 7),
(18, '2024_05_23_011222_create_akumulasi_parkirs_table', 8),
(19, '2024_05_23_040745_add_last_activity_to_users_table', 9),
(20, '2024_05_25_110242_modify_akumulasi_parkirs_table', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parkir_keluars`
--

CREATE TABLE `parkir_keluars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_polisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kartu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_keluar` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parkir_keluars`
--

INSERT INTO `parkir_keluars` (`id`, `no_polisi`, `id_kartu`, `jam_keluar`, `created_at`, `updated_at`) VALUES
(4, 'B222CCC', '8765', '2024-05-20 10:25:00', '2024-05-15 02:12:58', '2024-05-15 02:12:58'),
(5, 'B000FFF', '123567', '2024-05-23 10:25:00', '2024-05-15 20:22:34', '2024-05-15 20:22:34'),
(6, 'B1234CD', '1234567890', '2024-05-16 10:25:00', '2024-05-15 22:05:35', '2024-05-15 22:05:35'),
(7, 'B1234CD', '1234567890', '2024-05-16 10:25:00', '2024-05-15 22:53:46', '2024-05-15 22:53:46'),
(8, 'D123XYT', '3214567', '2024-05-16 10:25:00', '2024-05-15 23:15:34', '2024-05-15 23:15:34'),
(9, 'D321ZZT', '1234565', '2024-05-22 10:25:00', '2024-05-21 21:24:30', '2024-05-21 21:24:30'),
(10, 'B1234sas', '21313', '2024-05-23 14:00:00', '2024-05-22 22:57:38', '2024-05-22 22:57:38'),
(11, 'B1234sas', '21313', '2024-05-23 14:00:00', '2024-05-22 22:59:16', '2024-05-22 22:59:16'),
(12, 'B1234zzzz', '21313', '2024-05-23 14:00:00', '2024-05-22 22:59:24', '2024-05-22 22:59:24'),
(13, 'B1234zzzz', '21313', '2024-05-23 14:00:00', '2024-05-22 22:59:45', '2024-05-22 22:59:45'),
(14, 'B990ZYV', '21313', '2024-05-23 15:00:00', '2024-05-23 19:55:32', '2024-05-23 19:55:32'),
(15, 'B990DXY', '21313', '2024-05-24 15:00:00', '2024-05-23 20:15:41', '2024-05-24 16:44:06'),
(16, 'B723XYZ', '42356', '2024-05-25 10:00:00', '2024-05-24 16:38:25', '2024-05-24 16:38:25'),
(17, 'B321XUZ', '21313', '2024-05-25 15:00:00', '2024-05-24 16:49:07', '2024-05-24 16:49:07'),
(18, 'B321XUZ', '21313', '2024-05-25 07:52:31', '2024-05-25 00:46:55', '2024-05-25 00:46:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `parkir_masuks`
--

CREATE TABLE `parkir_masuks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_polisi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kartu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_masuk` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parkir_masuks`
--

INSERT INTO `parkir_masuks` (`id`, `no_polisi`, `id_kartu`, `jam_masuk`, `created_at`, `updated_at`) VALUES
(13, 'BA123HYS', '992203', '2024-05-17 10:25:00', '2024-05-16 23:44:13', '2024-05-16 23:44:13'),
(14, 'BA123HYS', '992203', '2024-05-17 10:25:00', '2024-05-16 23:45:01', '2024-05-16 23:45:01'),
(15, 'BA123HYS', '992203', '2024-05-17 10:25:00', '2024-05-16 23:47:32', '2024-05-16 23:47:32'),
(16, 'BA123HYS', '992203', '2024-05-17 10:25:00', '2024-05-16 23:49:39', '2024-05-16 23:49:39'),
(17, 'BD123YYH', '773245', '2024-05-19 10:25:00', '2024-05-19 03:00:21', '2024-05-19 03:00:21'),
(18, 'BD123YYH', '773245', '2024-05-19 10:25:00', '2024-05-19 03:17:34', '2024-05-19 03:17:34'),
(19, 'BD333YYH', '33333', '2024-05-22 10:25:00', '2024-05-21 21:24:02', '2024-05-21 21:24:02'),
(20, 'B123FYC', '213467', '2024-05-22 12:00:00', '2024-05-21 22:05:41', '2024-05-21 22:05:41'),
(21, 'B1234XYZ', 'KARTU123', '2024-05-23 14:00:00', '2024-05-22 22:40:06', '2024-05-22 22:40:06'),
(22, 'B1234XYZ', 'KARTU123', '2024-05-23 14:00:00', '2024-05-22 22:40:18', '2024-05-22 22:40:18'),
(23, 'B1234XYZ', 'KARTU123', '2024-05-23 14:00:00', '2024-05-22 22:40:45', '2024-05-22 22:40:45'),
(24, 'B1234sas', '21313', '2024-05-23 14:00:00', '2024-05-22 22:43:27', '2024-05-22 22:43:27'),
(25, 'B1234sas', '21313', '2024-05-23 14:00:00', '2024-05-22 22:56:48', '2024-05-22 22:56:48'),
(26, 'B321FYV', '21313', '2024-05-24 14:00:00', '2024-05-23 19:37:18', '2024-05-23 19:37:18'),
(27, 'B990TXY', '98767', '2024-05-24 14:00:00', '2024-05-23 19:37:37', '2024-05-24 16:41:49'),
(28, 'B990ZYX', '21313', '2024-05-24 15:00:00', '2024-05-23 19:55:23', '2024-05-24 16:40:19'),
(29, 'B321XUZ', '21313', '2024-05-25 15:00:00', '2024-05-25 16:47:54', '2024-05-24 17:00:00'),
(30, 'B990ZYV', '21313', '2024-05-25 08:03:33', '2024-05-25 01:01:57', '2024-05-25 01:01:57'),
(31, 'B990ZYV', '21313', '2024-05-25 00:00:00', '2024-05-25 01:02:03', '2024-05-25 01:02:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `last_activity`, `type`) VALUES
(9, 'Admin User', 'admin@parkir.com', NULL, '$2y$12$r0AIgJGWVyMkEsu/8.xEJ.9f1xs9nYwAf7BMMiUOuMMnWkMcHzMYu', NULL, '2024-05-13 23:07:30', '2024-05-22 21:54:22', '2024-05-22 21:54:22', 1),
(17, 'user', 'user@parkir.com', NULL, '$2y$12$L4e.sppAtWkLBZhDH8CVAOYKVc.QqbO4Brkh93cyGYqKXm/4SOaCy', NULL, '2024-05-14 21:24:18', '2024-05-14 23:14:47', NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akumulasi_parkirs`
--
ALTER TABLE `akumulasi_parkirs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parkir_keluars`
--
ALTER TABLE `parkir_keluars`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parkir_masuks`
--
ALTER TABLE `parkir_masuks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `akumulasi_parkirs`
--
ALTER TABLE `akumulasi_parkirs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `parkir_keluars`
--
ALTER TABLE `parkir_keluars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `parkir_masuks`
--
ALTER TABLE `parkir_masuks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
