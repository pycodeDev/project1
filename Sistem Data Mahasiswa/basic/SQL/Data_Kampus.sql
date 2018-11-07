-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 20, 2018 at 05:31 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Data_Kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Fakultas`
--

CREATE TABLE `Tb_Fakultas` (
  `kode_fak` int(3) NOT NULL,
  `Fakultas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tb_Fakultas`
--

INSERT INTO `Tb_Fakultas` (`kode_fak`, `Fakultas`) VALUES
(1, 'Fakultas Tarbiyah dan Keguruan'),
(2, 'Fakultas Syariah dan Hukum'),
(3, 'Fakultas Ushludin'),
(4, 'Fakultas Dakwah dan Komunikasi'),
(5, 'Fakultas Sains dan Teknologi'),
(6, 'Fakultas psikologi'),
(7, 'Fakultas Ekonomi dan Ilmu Sosial'),
(8, 'Fakultas Pertanian dan Peternakan');

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Jurusan`
--

CREATE TABLE `Tb_Jurusan` (
  `id` int(3) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `kode_fak` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tb_Jurusan`
--

INSERT INTO `Tb_Jurusan` (`id`, `Jurusan`, `kode_fak`) VALUES
(1, 'program Studi Pendidikan Agama Islam', 1),
(2, 'program Studi Pendidikan Bahasa Arab', 1),
(3, 'program Studi Manajemen Pendidikan Islam', 1),
(4, 'program Studi Pendidikan Bahasa Inggris', 1),
(5, 'program Studi Pendidikan Matematika', 1),
(6, 'program Studi Pendidikan Ekonomi', 1),
(7, 'program Studi Pendidikan Kimia', 1),
(8, 'program Studi Pendidikan Guru Madrasah Ibtidaiyah', 1),
(9, 'program Studi Pendidikan Guru Raudhatul Athfal', 1),
(10, 'program Studi Tadris IPA', 1),
(11, 'Program Studi Hukum Keluarga', 2),
(12, 'Program Studi Hukum Ekonomi Syariah', 2),
(13, 'Program Studi Perbandingan Madzhab dan Hukum', 2),
(14, 'program Studi Hukum Tata Negara', 2),
(15, 'program Studi Ekonomi Syari\'ah', 2),
(16, 'program Studi Perbankan Syariah', 2),
(17, 'program Studi Ilmu Hukum', 2),
(18, 'program Studi Aqidah dan Filsafat Islam', 3),
(19, 'program Studi Ilmu Al-Quran dan Tafsir', 3),
(20, 'program Studi Agama-Agama', 3),
(21, 'program Studi ilmu Hadist', 3),
(22, 'program Studi pengembangan Massyarakat Islam', 4),
(23, 'program Studi Bimbingan dan Konseling Islam', 4),
(24, 'program Studi Manajemen Dakwah', 4),
(25, 'program Studi manajemen Zakat dan Wakaf', 4),
(26, 'program Studi Ilmu Komunikasi', 4),
(27, 'program Studi Teknik Informatika', 5),
(28, 'program Studi Teknik Industri', 5),
(29, 'program Studi Sistem Informasi', 5),
(30, 'program Studi Matematika', 5),
(31, 'program Studi Teknik Elektro', 5),
(32, 'program Studi Psikologi', 6),
(33, 'program Studi Manajemen', 7),
(34, 'program Studi Manajemen', 7),
(35, 'program Studi S1 AKuntansi', 7),
(36, 'program Studi Ilmu Administrasi Negara', 7),
(37, 'program Studi Manajemen Perusahaan D3', 7),
(38, 'program Studi Akuntansi D3', 7),
(39, 'program Studi Administrasi Perpajakan D3', 7),
(40, 'program Studi Peternakan', 8),
(41, 'program Studi Agroteknologi', 8);

-- --------------------------------------------------------

--
-- Table structure for table `Tb_Mahasiswa`
--

CREATE TABLE `Tb_Mahasiswa` (
  `NIM` varchar(15) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Semester` varchar(3) NOT NULL,
  `Fakultas` varchar(50) NOT NULL,
  `Jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Tb_Fakultas`
--
ALTER TABLE `Tb_Fakultas`
  ADD PRIMARY KEY (`kode_fak`);

--
-- Indexes for table `Tb_Jurusan`
--
ALTER TABLE `Tb_Jurusan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_fak` (`kode_fak`);

--
-- Indexes for table `Tb_Mahasiswa`
--
ALTER TABLE `Tb_Mahasiswa`
  ADD PRIMARY KEY (`NIM`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Tb_Jurusan`
--
ALTER TABLE `Tb_Jurusan`
  ADD CONSTRAINT `Tb_Jurusan_ibfk_1` FOREIGN KEY (`kode_fak`) REFERENCES `Tb_Fakultas` (`kode_fak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
