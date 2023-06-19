-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 11:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamhi`
--

-- --------------------------------------------------------

--
-- Table structure for table `diagnosis`
--

CREATE TABLE `diagnosis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konsultasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nomor_rekam_psikolog` varchar(255) DEFAULT NULL,
  `hasil_diagnosis` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `jam` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komponen_nilai`
--

CREATE TABLE `komponen_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_komponen` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `psikolog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keluhan` varchar(255) NOT NULL,
  `booked_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_konsultasi` date NOT NULL,
  `jadwal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('booking','batal','selesai') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `user_id`, `pekerjaan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, NULL, '2023-06-19 20:35:16', '2023-06-19 20:35:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_06_03_122455_create_psikolog_table', 1),
(6, '2023_06_03_124203_create_member_table', 1),
(7, '2023_06_06_181410_create_jadwal_table', 1),
(8, '2023_06_06_181411_create_konsultasi_table', 1),
(9, '2023_06_06_181420_create_psikotes_table', 1),
(10, '2023_06_06_181506_create_pembayaran_table', 1),
(11, '2023_06_06_181523_create_diagnosis_table', 1),
(12, '2023_06_06_183400_create_komponen_nilai_table', 1),
(13, '2023_06_06_183409_create_nilai_psikotes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_psikotes`
--

CREATE TABLE `nilai_psikotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `komponen_nilai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `psikotes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` double(15,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `konsultasi_id` bigint(20) UNSIGNED DEFAULT NULL,
  `psikotes_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nominal` double(8,2) DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psikolog`
--

CREATE TABLE `psikolog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_keahlian` varchar(100) DEFAULT 'text',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `psikotes`
--

CREATE TABLE `psikotes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `booked_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_psikotes` date NOT NULL,
  `jenis_psikotes` varchar(255) DEFAULT NULL,
  `kebutuhan` varchar(255) DEFAULT NULL,
  `jadwal_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('booking','batal','selesai') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member','psikolog') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `tanggal_lahir`, `no_hp`, `jenis_kelamin`, `alamat`, `email_verified_at`, `password`, `role`, `foto`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Zitha', 'zitha@gmail.com', 'zitha', '2023-06-19', '0123456789', 'Perempuan', 'Bandung', NULL, '$2y$10$qrIsnAlJp00GDgsPi/q0peU/chupibQT9U7QhabDzmBycIzYq0ZYu', 'admin', 'foto-profil/OxImynHEbiDCx9B34DVzHPHRgm0m5pmEEmrLbOOx.png', NULL, '2023-06-19 09:39:59', '2023-06-19 09:39:59', NULL),
(2, 'Derisa', 'derisa@gmail.com', 'derisa', '2023-06-20', '0812345678', 'Perempuan', 'Bandung', NULL, '$2y$10$CIGXB6Q9cssEOKZ2VSURmO894npXcLb40lCbHu0jtWVQZFT9yycPK', 'member', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-19 13:32:50', '2023-06-19 13:32:50', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diagnosis_konsultasi_id_foreign` (`konsultasi_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `konsultasi_member_id_foreign` (`member_id`),
  ADD KEY `konsultasi_psikolog_id_foreign` (`psikolog_id`),
  ADD KEY `konsultasi_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_psikotes`
--
ALTER TABLE `nilai_psikotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilai_psikotes_komponen_nilai_id_foreign` (`komponen_nilai_id`),
  ADD KEY `nilai_psikotes_psikotes_id_foreign` (`psikotes_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_konsultasi_id_foreign` (`konsultasi_id`),
  ADD KEY `pembayaran_psikotes_id_foreign` (`psikotes_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `psikolog`
--
ALTER TABLE `psikolog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `psikolog_user_id_foreign` (`user_id`);

--
-- Indexes for table `psikotes`
--
ALTER TABLE `psikotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `psikotes_member_id_foreign` (`member_id`),
  ADD KEY `psikotes_jadwal_id_foreign` (`jadwal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diagnosis`
--
ALTER TABLE `diagnosis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `komponen_nilai`
--
ALTER TABLE `komponen_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `nilai_psikotes`
--
ALTER TABLE `nilai_psikotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `psikolog`
--
ALTER TABLE `psikolog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `psikotes`
--
ALTER TABLE `psikotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `diagnosis_konsultasi_id_foreign` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `konsultasi_psikolog_id_foreign` FOREIGN KEY (`psikolog_id`) REFERENCES `psikolog` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `nilai_psikotes`
--
ALTER TABLE `nilai_psikotes`
  ADD CONSTRAINT `nilai_psikotes_komponen_nilai_id_foreign` FOREIGN KEY (`komponen_nilai_id`) REFERENCES `komponen_nilai` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_psikotes_psikotes_id_foreign` FOREIGN KEY (`psikotes_id`) REFERENCES `psikotes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_konsultasi_id_foreign` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_psikotes_id_foreign` FOREIGN KEY (`psikotes_id`) REFERENCES `psikotes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `psikolog`
--
ALTER TABLE `psikolog`
  ADD CONSTRAINT `psikolog_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `psikotes`
--
ALTER TABLE `psikotes`
  ADD CONSTRAINT `psikotes_jadwal_id_foreign` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `psikotes_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
