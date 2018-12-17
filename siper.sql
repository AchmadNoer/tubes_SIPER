-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2018 at 03:22 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siper`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlhr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggallhr` date NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noHP` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keahlian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL,
  `histori_b` int(10) UNSIGNED DEFAULT NULL,
  `histori_t` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `nama`, `alamat`, `tempatlhr`, `tanggallhr`, `gender`, `noHP`, `email`, `password`, `keahlian`, `kompetensi`, `status`, `histori_b`, `histori_t`) VALUES
(0, 'Admin', 'Admin', 'Admin', '1111-11-11', 'Pria', 'Admin', 'Admin', 'admin123', 'Admin', 1, 1, NULL, NULL),
(1, 'Achmad Noer Aziz', 'Ngaglik, Sleman, Yogyakarta', 'Pati', '1999-08-08', 'Pria', '081285731046', '17523001@students.uii.ac.id', '12345678', 'Coding', 1, 1, 1, 1),
(3, 'A', 'A', 'A', '2018-12-15', 'Wanita', '081185731046', 'a@a.com', 'aaaaaa', 'aaaaaa', 0, 1, NULL, NULL),
(4, 'B', 'B', 'B', '2018-12-15', 'Pria', '081385731046', 'b@b.com', 'bbbbbb', 'bbbbbb', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bencana`
--

CREATE TABLE `bencana` (
  `id_bencana` int(10) UNSIGNED NOT NULL,
  `tgl_bencana` date NOT NULL,
  `lokasi` int(10) UNSIGNED NOT NULL,
  `jenis_bencana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bencana`
--

INSERT INTO `bencana` (`id_bencana`, `tgl_bencana`, `lokasi`, `jenis_bencana`, `deskripsi`) VALUES
(1, '2018-04-24', 15, 'Angin Puting Beliung', 'Angin puting beliung melanda sebagian wilayah Daerah Istimewa Yogyakarta (DIY). Peristiwa yang terjadi pukul 14.05 WIB tadi berlangsung selama 22 menit. Sebagian warga di sekitar Kecamatan Gondokusuman, Kota Yogyakarta dan Banguntapan Bantul yang letaknya berbatasan melihat angin kencang tersebut mirip tornado. Angin tersebut bergerak dari arah barat menuju timur dan kemudian ke arah tenggara. Tidak lama setelah ada angin kencang atau puting beliung itu kemudian turun hujan deras di wilayah Yogyakarta.'),
(2, '2018-09-28', 27, 'Gempa Bumi', 'Gempa bumi tektonik telah terjadi di Kabupaten Donggala, Sulawesi Tengah pada hari Jumat, 28 September 2018, jam 17.02.44 WIB dengan M 7.4 Lokasi 0.18 LS dan 119.85BT dan jarak 26 km dari Utara Donggala Sulawesi Tengah, dengan kedalaman 10 km. Berdasarkan hasil pemodelan tsunami dengan level tertinggi siaga (0.5m-3m) di Palu dan estimasi waktu tiba jam 17.22 WIB sehingga BMKG mengeluarkan potensi tsunami.');

-- --------------------------------------------------------

--
-- Table structure for table `historib`
--

CREATE TABLE `historib` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_relawan` int(10) UNSIGNED NOT NULL,
  `id_bencana` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historib`
--

INSERT INTO `historib` (`id`, `id_relawan`, `id_bencana`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `historit`
--

CREATE TABLE `historit` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_relawan` int(10) UNSIGNED DEFAULT NULL,
  `id_training` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historit`
--

INSERT INTO `historit` (`id`, `id_relawan`, `id_training`) VALUES
(1, 1, 1),
(2, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2018_12_01_100947_provinsi', 1),
(5, '2018_12_02_020626_training', 2),
(19, '2018_12_01_102655_bencana', 5),
(20, '2018_12_11_104118_akun', 6),
(22, '2018_12_15_073044_historib', 7),
(23, '2018_12_16_014441_historit', 8);

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(10) UNSIGNED NOT NULL,
  `nama_provinsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama_provinsi`) VALUES
(1, 'Aceh'),
(2, 'Sumatera Utara'),
(3, 'Sumatera Barat'),
(4, 'Riau'),
(5, 'Kepulauan Riau'),
(6, 'Jambi'),
(7, 'Sumatera Selatan'),
(8, 'Bangka Belitung'),
(9, 'Bengkulu'),
(10, 'Lampung'),
(11, 'Jakarta'),
(12, 'Jawa Barat'),
(13, 'Banten'),
(14, 'Jawa Tengah'),
(15, 'Yogyakarta'),
(16, 'Jawa Timur'),
(17, 'Bali'),
(18, 'Nusa Tenggara Barat'),
(19, 'Nusa Tenggara Timur'),
(20, 'Kalimantan Barat'),
(21, 'Kalimantan Tengah'),
(22, 'Kalimantan Selatan'),
(23, 'Kalimantan Timur'),
(24, 'Kalimantan Utara'),
(25, 'Sulawesi Utara'),
(26, 'Sulawesi Barat'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Tenggara'),
(29, 'Sulawesi Selatan'),
(30, 'Gorontalo'),
(31, 'Maluku'),
(32, 'Maluku Utara'),
(33, 'Papua Barat'),
(34, 'Papua'),
(35, 'Internasional');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id_training` int(10) UNSIGNED NOT NULL,
  `tgl_training` date NOT NULL,
  `lokasi` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id_training`, `tgl_training`, `lokasi`, `keterangan`) VALUES
(1, '2018-12-19', 15, 'Expo...'),
(2, '2018-12-31', 11, 'Cuti Bersama');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `akun_nohp_unique` (`noHP`),
  ADD UNIQUE KEY `akun_email_unique` (`email`),
  ADD KEY `akun_histori_b_foreign` (`histori_b`),
  ADD KEY `akun_histori_t_foreign` (`histori_t`);

--
-- Indexes for table `bencana`
--
ALTER TABLE `bencana`
  ADD PRIMARY KEY (`id_bencana`),
  ADD KEY `bencana_lokasi_foreign` (`lokasi`);

--
-- Indexes for table `historib`
--
ALTER TABLE `historib`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historib_id_relawan_foreign` (`id_relawan`),
  ADD KEY `historib_id_bencana_foreign` (`id_bencana`);

--
-- Indexes for table `historit`
--
ALTER TABLE `historit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historit_id_relawan_foreign` (`id_relawan`),
  ADD KEY `historit_id_training_foreign` (`id_training`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id_training`),
  ADD KEY `training_lokasi_foreign` (`lokasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bencana`
--
ALTER TABLE `bencana`
  MODIFY `id_bencana` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historib`
--
ALTER TABLE `historib`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `historit`
--
ALTER TABLE `historit`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id_provinsi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id_training` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_histori_b_foreign` FOREIGN KEY (`histori_b`) REFERENCES `bencana` (`id_bencana`),
  ADD CONSTRAINT `akun_histori_t_foreign` FOREIGN KEY (`histori_t`) REFERENCES `training` (`id_training`);

--
-- Constraints for table `bencana`
--
ALTER TABLE `bencana`
  ADD CONSTRAINT `bencana_lokasi_foreign` FOREIGN KEY (`lokasi`) REFERENCES `provinsi` (`id_provinsi`);

--
-- Constraints for table `historib`
--
ALTER TABLE `historib`
  ADD CONSTRAINT `historib_id_bencana_foreign` FOREIGN KEY (`id_bencana`) REFERENCES `bencana` (`id_bencana`),
  ADD CONSTRAINT `historib_id_relawan_foreign` FOREIGN KEY (`id_relawan`) REFERENCES `akun` (`id`);

--
-- Constraints for table `historit`
--
ALTER TABLE `historit`
  ADD CONSTRAINT `historit_id_relawan_foreign` FOREIGN KEY (`id_relawan`) REFERENCES `akun` (`id`),
  ADD CONSTRAINT `historit_id_training_foreign` FOREIGN KEY (`id_training`) REFERENCES `training` (`id_training`);

--
-- Constraints for table `training`
--
ALTER TABLE `training`
  ADD CONSTRAINT `training_lokasi_foreign` FOREIGN KEY (`lokasi`) REFERENCES `provinsi` (`id_provinsi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
