-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 28, 2026 at 10:45 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kotak_saran`
--

-- --------------------------------------------------------

--
-- Table structure for table `komplains`
--

CREATE TABLE `komplains` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('saran','keluhan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'saran',
  `isi_pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('belum_ditindaklanjuti','sudah_ditindaklanjuti') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'belum_ditindaklanjuti',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komplains`
--

INSERT INTO `komplains` (`id`, `nama`, `email`, `jenis`, `isi_pesan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Fauzi', 'ahmad.fauzi@example.com', 'saran', 'Sebaiknya jam istirahat ditambah 10 menit agar siswa tidak terburu-buru.', 'belum_ditindaklanjuti', '2026-09-20 18:13:46', '2026-09-20 18:13:46'),
(2, 'Siti Nurhaliza', 'siti.nur@example.com', 'keluhan', 'AC di ruang lab komputer sering mati, mohon segera diperbaiki.', 'sudah_ditindaklanjuti', '2026-09-20 18:13:46', '2026-09-20 18:13:46'),
(3, 'Budi Santoso', 'budi.santoso@example.com', 'keluhan', 'Wifi sekolah sangat lambat saat jam praktik, menghambat proses belajar.', 'belum_ditindaklanjuti', '2026-09-20 18:13:46', '2026-09-20 18:13:46'),
(4, 'Dewi Lestari', 'dewi.lestari@example.com', 'saran', 'Mohon disediakan tempat sampah tambahan di area kantin.', 'sudah_ditindaklanjuti', '2026-09-20 18:13:46', '2026-09-20 18:13:46'),
(5, 'Rizky Ramadhan', 'rizky.r@example.com', 'saran', 'Perpustakaan sebaiknya buka lebih pagi supaya bisa dipakai sebelum jam pelajaran.', 'belum_ditindaklanjuti', '2026-09-20 18:13:46', '2026-09-20 18:13:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `komplains`
--
ALTER TABLE `komplains`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `komplains`
--
ALTER TABLE `komplains`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
