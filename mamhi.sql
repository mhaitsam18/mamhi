-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2023 at 11:16 AM
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
  `ruangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hari` varchar(255) DEFAULT NULL,
  `jam_mulai` time DEFAULT NULL,
  `jam_selesai` time DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `psikolog_id`, `ruangan_id`, `hari`, `jam_mulai`, `jam_selesai`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, NULL, 'Selasa', '08:00:00', '08:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(2, 6, NULL, 'Selasa', '08:00:00', '09:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(3, 6, NULL, 'Selasa', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(4, 5, NULL, 'Selasa', '10:00:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(5, 3, NULL, 'Selasa', '11:00:00', '11:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(6, 5, NULL, 'Selasa', '13:00:00', '13:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(7, 1, NULL, 'Selasa', '13:30:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(8, 5, NULL, 'Selasa', '14:00:00', '14:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(9, 1, NULL, 'Selasa', '15:00:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(10, 5, NULL, 'Selasa', '15:00:00', '15:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(11, 7, NULL, 'Selasa', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(12, 7, NULL, 'Selasa', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(13, 7, NULL, 'Selasa', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(14, 7, NULL, 'Selasa', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(15, 7, NULL, 'Selasa', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(16, 1, NULL, 'Kamis', '13:30:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(17, 1, NULL, 'Kamis', '15:00:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(18, 1, NULL, 'Sabtu', '08:00:00', '09:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(19, 1, NULL, 'Sabtu', '09:20:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(20, 1, NULL, 'Sabtu', '13:30:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(21, 1, NULL, 'Sabtu', '15:00:00', '16:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(22, 2, NULL, 'Rabu', '10:00:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(23, 2, NULL, 'Rabu', '11:00:00', '11:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(24, 2, NULL, 'Jumat', '09:00:00', '09:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(25, 2, NULL, 'Jumat', '10:00:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(26, 2, NULL, 'Jumat', '14:00:00', '14:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(27, 2, NULL, 'Jumat', '15:00:00', '16:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(28, 2, NULL, 'Sabtu', '10:00:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(29, 2, NULL, 'Sabtu', '11:00:00', '11:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(30, 3, NULL, 'Kamis', '11:00:00', '11:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(31, 3, NULL, 'Kamis', '15:00:00', '15:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(32, 3, NULL, 'Jumat', '10:00:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(33, 3, NULL, 'Jumat', '11:00:00', '11:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(34, 3, NULL, 'Jumat', '13:30:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(35, 3, NULL, 'Jumat', '15:00:00', '16:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(36, 4, NULL, 'Kamis', '09:30:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(37, 4, NULL, 'Kamis', '11:00:00', '12:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(38, 4, NULL, 'Kamis', '15:00:00', '16:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(39, 4, NULL, 'Jumat', '08:00:00', '09:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(40, 4, NULL, 'Jumat', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(41, 4, NULL, 'Jumat', '15:00:00', '16:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(42, 4, NULL, 'Sabtu', '08:00:00', '09:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(43, 4, NULL, 'Sabtu', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(44, 5, NULL, 'Rabu', '09:00:00', '09:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(45, 5, NULL, 'Rabu', '10:00:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(46, 5, NULL, 'Rabu', '13:00:00', '13:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(47, 5, NULL, 'Rabu', '14:00:00', '14:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(48, 5, NULL, 'Kamis', '15:00:00', '15:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(49, 6, NULL, 'Rabu', '08:00:00', '09:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(50, 6, NULL, 'Rabu', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(51, 7, NULL, 'Kamis', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(52, 7, NULL, 'Kamis', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(53, 7, NULL, 'Kamis', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(54, 7, NULL, 'Kamis', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(55, 7, NULL, 'Kamis', '09:30:00', '10:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(56, 8, NULL, 'Kamis', '09:00:00', '09:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(57, 8, NULL, 'Kamis', '10:00:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(58, 8, NULL, 'Kamis', '13:00:00', '13:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(59, 8, NULL, 'Kamis', '14:00:00', '14:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(60, 8, NULL, 'Jumat', '09:00:00', '09:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(61, 8, NULL, 'Jumat', '11:00:00', '11:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(62, 8, NULL, 'Jumat', '13:00:00', '13:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(63, 8, NULL, 'Jumat', '14:00:00', '14:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(64, 9, NULL, 'Sabtu', '09:30:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(65, 9, NULL, 'Sabtu', '11:00:00', '12:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(66, 9, NULL, 'Sabtu', '13:30:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(67, 9, NULL, 'Sabtu', '15:00:00', '16:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(68, 10, NULL, 'Sabtu', '08:00:00', '09:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(69, 10, NULL, 'Sabtu', '09:30:00', '10:55:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(70, 10, NULL, 'Sabtu', '13:30:00', '14:50:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(71, 10, NULL, 'Sabtu', '15:00:00', '16:20:00', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL);

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
(1, 2, 'Mahasiswa', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL);

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
(5, '2023_06_03_080041_create_ruangan_table', 1),
(6, '2023_06_03_122455_create_psikolog_table', 1),
(7, '2023_06_03_124203_create_member_table', 1),
(8, '2023_06_06_181410_create_jadwal_table', 1),
(9, '2023_06_06_181411_create_konsultasi_table', 1),
(10, '2023_06_06_181420_create_psikotes_table', 1),
(11, '2023_06_06_181506_create_pembayaran_table', 1),
(12, '2023_06_06_181523_create_diagnosis_table', 1),
(13, '2023_06_06_183400_create_komponen_nilai_table', 1),
(14, '2023_06_06_183409_create_nilai_psikotes_table', 1),
(15, '2023_06_20_200808_create_temporary_files_table', 1);

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
  `kode_psikolog` varchar(255) DEFAULT NULL,
  `jenis_keahlian` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `psikolog`
--

INSERT INTO `psikolog` (`id`, `user_id`, `kode_psikolog`, `jenis_keahlian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'ISA', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(2, 4, 'FDA', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(3, 5, 'MQA', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(4, 6, 'YUI', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(5, 7, 'MIA', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(6, 8, 'PRS', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(7, 9, 'LND', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(8, 10, 'ICA', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(9, 11, 'IDR', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(10, 12, 'WLN', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(11, 13, 'NMU', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(12, 14, 'WID', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(13, 15, 'DRK', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(14, 16, 'LKL', 'Psikolog', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL);

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
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ruangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id`, `ruangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Ruang Fajar', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(2, 'Ruang Senja', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(3, 'Kelas Matahari', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(4, 'Kelas Bulan', '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_files`
--

CREATE TABLE `temporary_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `folder` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'Zitha', 'zitha@gmail.com', 'zitha', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$47oboW74iDj7mjnaMlJ7iOTrHyvtFpaZB3WZx6bwFZLNvSECntSdK', 'admin', 'foto-profil/OxImynHEbiDCx9B34DVzHPHRgm0m5pmEEmrLbOOx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(2, 'Derisa', 'derisa@gmail.com', 'derisa', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$x3fWpFd0V1wqM/h5Zey7revOga8ejHVtVqEdUzrFwHaGaQ2J4lVn2', 'member', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(3, 'Inheke', 'inheke@gmail.com', 'inheke', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$qY/50YRFHy0CKQn23R4pWObXhQaWsJ85GDUniMi7ZyucD1jb7g4Wq', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(4, 'K Dyka', 'kdyka@gmail.com', 'kdyka', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$P8rrscp7JdhL6GdfDcZUxe3Q8E0YrRW8iKivoBWs8KonAWy0ckZIq', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(5, 'Bunis', 'bunis@gmail.com', 'bunis', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$kL83PH4NQAxjOx7UYB8w7.xhM67aEcaNfb7nZKA4TdNcivPmlxa/a', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(6, 'Yui', 'yui@gmail.com', 'yui', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$5.NrhjqK1C1iLHRjekPhbOHnZAfaUoNWMfY4VGXBZTeY1NOEbmMO.', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(7, 'Mia', 'mia@gmail.com', 'mia', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$9vc/bpcxXqLnQxpbMRmyXuPGkBjpg110IglK5wsqAa3xlKOOJR4Zm', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(8, 'Prast', 'prast@gmail.com', 'prast', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$fO24/QdvCyHpQv0JTJZOTOPJeQI228EFIbISIgH6U1B57HMGkLeGG', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:36', '2023-06-23 02:16:36', NULL),
(9, 'Linda', 'linda@gmail.com', 'linda', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$6ZtDn0AAve4zLMs67X3ot.2KyrvgT9I4HOU8Er94vfq3Z7ZDb8E3W', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(10, 'Ica', 'ica@gmail.com', 'ica', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$E6YPPdgB1rOuQC4tN5Rc4.JXfwYlNuAfezrfgsVBmC5DSRXF9g1Hu', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(11, 'T Dyah', 'tdyah@gmail.com', 'tdyah', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$zB2B2xLZEXp8zk5Ejtz.SO7I/DtvMQYblR2Y/iYw2XCCEBhwvRgLW', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(12, 'Wulan', 'wulan@gmail.com', 'wulan', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$eatcIaK/FWT6QXvE9//hAOnwzqzdJp4.ExfbtG7UTW/vM1iFBXtO2', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(13, 'psikolog', 'psikolog1@gmail.com', 'psikolog1', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$i4jx/JT5xWZIAmExXweEFOP/2kjgn9ZlJBgpGaxiM.CqRpSGMOcNa', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(14, 'psikolog', 'psikolog2@gmail.com', 'psikolog2', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$V3eQB8xmVsiDEJXtnAfWR.H7ipjliG4V4kMmdh8ltvJ0RYP1vH28K', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(15, 'psikolog', 'psikolog3@gmail.com', 'psikolog3', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$9HSLjd5louLczaFmWfpWQeCMW/z7lNRW144S.3SSSPneEgCMgXQli', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL),
(16, 'psikolog', 'psikolog4@gmail.com', 'psikolog4', '2022-02-18', '+62 813-8087-6176', 'Perempuan', 'Bandung', NULL, '$2y$10$MVAQX265br/gY5pgBOM6HOKty9fvp6GE4lLUIi7CcKldfiDuT4QWe', 'psikolog', 'foto-profil/DgGChffO4u3V7dJ79MTakaEBRvKif6WbFljemwnx.png', NULL, '2023-06-23 02:16:37', '2023-06-23 02:16:37', NULL);

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
  ADD KEY `jadwal_psikolog_id_foreign` (`psikolog_id`),
  ADD KEY `jadwal_ruangan_id_foreign` (`ruangan_id`);

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
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temporary_files`
--
ALTER TABLE `temporary_files`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `psikotes`
--
ALTER TABLE `psikotes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temporary_files`
--
ALTER TABLE `temporary_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  ADD CONSTRAINT `jadwal_psikolog_id_foreign` FOREIGN KEY (`psikolog_id`) REFERENCES `psikolog` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_ruangan_id_foreign` FOREIGN KEY (`ruangan_id`) REFERENCES `ruangan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
