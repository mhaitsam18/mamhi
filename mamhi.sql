-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 07:39 AM
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
  `psikolog_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `psikolog_id`, `hari`, `jam_mulai`, `jam_selesai`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Selasa', '13:30:00', '14:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(2, 1, 'Selasa', '15:00:00', '14:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(3, 1, 'Kamis', '13:30:00', '14:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(4, 1, 'Kamis', '15:00:00', '14:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(5, 1, 'Sabtu', '08:00:00', '09:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(6, 1, 'Sabtu', '09:20:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(7, 1, 'Sabtu', '13:30:00', '14:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(8, 1, 'Sabtu', '15:00:00', '16:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(9, 2, 'Rabu', '10:00:00', '10:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(10, 2, 'Rabu', '11:00:00', '11:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(11, 2, 'Jumat', '09:00:00', '09:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(12, 2, 'Jumat', '10:00:00', '10:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(13, 2, 'Jumat', '14:00:00', '14:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(14, 2, 'Jumat', '15:00:00', '16:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(15, 2, 'Sabtu', '10:00:00', '10:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(16, 2, 'Sabtu', '11:00:00', '11:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(17, 3, 'Selasa', '08:00:00', '08:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(18, 3, 'Selasa', '11:00:00', '11:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(19, 3, 'Kamis', '11:00:00', '11:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(20, 3, 'Kamis', '15:00:00', '15:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(21, 3, 'Jumat', '10:00:00', '10:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(22, 3, 'Jumat', '11:00:00', '11:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(23, 3, 'Jumat', '13:30:00', '14:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(24, 3, 'Jumat', '15:00:00', '16:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(25, 4, 'Kamis', '09:30:00', '10:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(26, 4, 'Kamis', '11:00:00', '12:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(27, 4, 'Kamis', '15:00:00', '16:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(28, 4, 'Jumat', '08:00:00', '09:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(29, 4, 'Jumat', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(30, 4, 'Jumat', '15:00:00', '16:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(31, 4, 'Sabtu', '08:00:00', '09:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(32, 4, 'Sabtu', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(33, 5, 'Selasa', '10:00:00', '10:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(34, 5, 'Selasa', '13:00:00', '13:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(35, 5, 'Selasa', '14:00:00', '14:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(36, 5, 'Selasa', '15:00:00', '15:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(37, 5, 'Rabu', '09:00:00', '09:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(38, 5, 'Rabu', '10:00:00', '10:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(39, 5, 'Rabu', '13:00:00', '13:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(40, 5, 'Rabu', '14:00:00', '14:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(41, 5, 'Kamis', '15:00:00', '15:55:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(42, 6, 'Selasa', '08:00:00', '09:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(43, 6, 'Selasa', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(44, 6, 'Rabu', '08:00:00', '09:20:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(45, 6, 'Rabu', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(46, 7, 'Selasa', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(47, 7, 'Selasa', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(48, 7, 'Selasa', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(49, 7, 'Selasa', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(50, 7, 'Selasa', '09:30:00', '10:50:00', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(51, 7, 'Kamis', '09:30:00', '10:50:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(52, 7, 'Kamis', '09:30:00', '10:50:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(53, 7, 'Kamis', '09:30:00', '10:50:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(54, 7, 'Kamis', '09:30:00', '10:50:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(55, 7, 'Kamis', '09:30:00', '10:50:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(56, 8, 'Kamis', '09:00:00', '09:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(57, 8, 'Kamis', '10:00:00', '10:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(58, 8, 'Kamis', '13:00:00', '13:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(59, 8, 'Kamis', '14:00:00', '14:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(60, 8, 'Jumat', '09:00:00', '09:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(61, 8, 'Jumat', '11:00:00', '11:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(62, 8, 'Jumat', '13:00:00', '13:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(63, 8, 'Jumat', '14:00:00', '14:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(64, 9, 'Sabtu', '09:30:00', '10:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(65, 9, 'Sabtu', '11:00:00', '12:20:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(66, 9, 'Sabtu', '13:30:00', '14:50:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(67, 9, 'Sabtu', '15:00:00', '16:20:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(68, 10, 'Sabtu', '08:00:00', '09:20:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(69, 10, 'Sabtu', '09:30:00', '10:55:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(70, 10, 'Sabtu', '13:30:00', '14:50:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL),
(71, 10, 'Sabtu', '15:00:00', '16:20:00', '2023-06-20 11:00:38', '2023-06-20 11:00:38', NULL);

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
(1, 2, 'Mahasiswa', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL);

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

--
-- Dumping data for table `psikolog`
--

INSERT INTO `psikolog` (`id`, `user_id`, `jenis_keahlian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(2, 4, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(3, 5, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(4, 6, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(5, 7, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(6, 8, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(7, 9, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(8, 10, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(9, 11, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(10, 12, 'Psikolog', '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL);

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
(1, 'Zitha', 'zitha@gmail.com', 'zitha', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$v2l2TzAzxXRfksSxfdnYaOB.iM.aqeavy6ssQmFgrq.o5X7ZVCedW', 'admin', 'foto-profil/OxImynHEbiDCx9B34DVzHPHRgm0m5pmEEmrLbOOx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(2, 'Derisa', 'derisa@gmail.com', 'derisa', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$NUOYRRkKPC9x2ElxYvkYHud4ksRgrXTT40CK2Zlvd0tNz5/EvfFJu', 'member', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(3, 'Inheke', 'inheke@gmail.com', 'inheke', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$MlYoWNyosB/9pTFo7mzelu./D41YdhRYXBJU14tII4QX1atvx/eZ.', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(4, 'K Dyka', 'kdyka@gmail.com', 'kdyka', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$GBRVYli0XggfUlHOQxfhWeimjDYSBV.bqlDha9Cuiz5qezqUYYK8O', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(5, 'Bunis', 'bunis@gmail.com', 'bunis', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$ec6n228nojSHkwdT3SQ/yeavZtbiZu9tAWKOEtglNCM49b5XS1gdO', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(6, 'Yui', 'yui@gmail.com', 'yui', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$reeaGHtSlyKdkfVb2RwBcuTky6pUKap4dONR9CCoHbUDTD0q5FEy.', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(7, 'Mia', 'mia@gmail.com', 'mia', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$0NrW31yVX8ldSdYxd5xJze0QIk7MSu3IdZoqeEp4m1cTiFM1lmZ2.', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(8, 'Prast', 'prast@gmail.com', 'prast', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$UDP.IqWphzj.yvoAfbynzuhlKoxobNN3l3TP4.L5PJExFy439.Qru', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(9, 'Linda', 'linda@gmail.com', 'linda', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$4YvxMS/jjdMZblMyjBZzsuHYScmlzJWrLRtoE6cxwtOIfdUROW3Lq', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(10, 'Ica', 'ica@gmail.com', 'ica', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$ceKKGvQDQEZYwfziZQ8Ije6mX2t1svJOtkjaAS4VZTywIduwdedn2', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(11, 'T Dyah', 'tdyah@gmail.com', 'tdyah', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$DV/P9h.lPh4VfeNBI1WPaO9QDKGcm.b6ETq5ugPjE1NOrbxezCTum', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL),
(12, 'Wulan', 'wulan@gmail.com', 'wulan', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$TLE99pRZc2SMQco2t8CIOeui0k3D4krdU5C7KV.bxxRU7U4hMK3Mi', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-20 11:00:37', '2023-06-20 11:00:37', NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_psikolog_id_foreign` (`psikolog_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `psikotes`
--
ALTER TABLE `psikotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `diagnosis`
--
ALTER TABLE `diagnosis`
  ADD CONSTRAINT `diagnosis_konsultasi_id_foreign` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_psikolog_id_foreign` FOREIGN KEY (`psikolog_id`) REFERENCES `psikolog` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
