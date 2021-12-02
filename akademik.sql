-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2021 at 11:27 AM
-- Server version: 10.3.31-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.2.34-28+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `nama`, `jenis_kelamin`, `prodi`, `no_hp`, `created_at`, `updated_at`) VALUES
(2, 'Adit', 'Laki-laki', 'sfs', 'hwkhfwkhfw', NULL, NULL),
(3, 'wwwfefw', 'Laki-laki', 'fwfw', 'fwfwf', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ggdgd', 'Laki-laki', 'gdgdgd', 'gdgdgd', '2021-11-30 08:54:08', '2021-11-30 08:54:08'),
(5, 'fsfsfsfsf', 'Laki-laki', 'fsj', 'fhsdjfsjk', '2021-11-30 08:55:49', '2021-11-30 08:55:49');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `IdMhsw` int(11) NOT NULL,
  `Nama` varchar(150) DEFAULT NULL,
  `prodi_id` int(10) UNSIGNED NOT NULL,
  `JenisKelamin` varchar(20) DEFAULT NULL,
  `Alamat` text DEFAULT NULL,
  `Agama` varchar(30) DEFAULT NULL,
  `NoHp` varchar(15) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`IdMhsw`, `Nama`, `prodi_id`, `JenisKelamin`, `Alamat`, `Agama`, `NoHp`, `Email`) VALUES
(3, 'fsdfsdfs', 5, 'Laki-laki', 'sfsfs', 'Islam', '75385738453', 'fdgfhg@f.com'),
(4, 'Abu Langit', 4, 'Laki-laki', 'Bandung', 'Islam', '6573657836', 'abulangit@g.com'),
(5, 'Muhammad', 2, 'Laki-laki', 'Cilacap', 'Islam', '0889489238492', 'muhammad@g.com'),
(6, 'ffwefwewe', 3, 'Laki-laki', 'fefefe', 'Islam', '357837593', 'etjej@h.co'),
(8, 'fahana', 3, 'Perempuan', 'Cilacap', 'Islam', '09898989890', 'fahana@g.com');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(2, 'Matematika', '2021-12-01 03:37:11', '2021-12-01 03:37:11'),
(3, 'Teknik Informatika', '2021-12-01 03:37:46', '2021-12-01 03:37:46'),
(4, 'Sistem Informasi', '2021-12-01 03:48:17', '2021-12-01 03:48:17'),
(5, 'Bimbingan Konseling', '2021-12-01 04:24:29', '2021-12-01 04:24:29'),
(7, 'Pendidikan Agama Islam', '2021-12-02 03:37:28', '2021-12-02 03:37:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`IdMhsw`),
  ADD KEY `relasi_prodi` (`prodi_id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `IdMhsw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `relasi_prodi` FOREIGN KEY (`prodi_id`) REFERENCES `prodi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
