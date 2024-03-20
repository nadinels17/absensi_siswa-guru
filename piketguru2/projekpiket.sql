-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 10:00 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projekpiket`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_guru`
--

CREATE TABLE `absensi_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` bigint(18) NOT NULL,
  `keterangan` enum('sakit','izin','alfa') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_guru`
--

INSERT INTO `absensi_guru` (`id`, `nama`, `nip`, `keterangan`, `tanggal`) VALUES
(1, 'Tarkus', 909090, 'alfa', '2023-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `absensi_murid`
--

CREATE TABLE `absensi_murid` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `keterangan` enum('sakit','izin','alfa') NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi_murid`
--

INSERT INTO `absensi_murid` (`id`, `nama`, `kelas`, `keterangan`, `tanggal`) VALUES
(1, 'Riski Darmawan', 'XI RPL 1', 'alfa', '2023-06-15'),
(2, 'Riski Darmawan', 'XI RPL 2', 'alfa', '2023-06-15'),
(3, 'NUrfitri', '', '', '0000-00-00'),
(4, '', '', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru`
--

CREATE TABLE `data_guru` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` bigint(18) NOT NULL,
  `email` varchar(255) NOT NULL,
  `id_hari` int(11) DEFAULT NULL,
  `jurusan` enum('Umum','Akuntansi','Rekayasa Perangkat Lunak','Otomatisasi Tata Kelola Perkantoran','Bisnis Daring Pemasaran') NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_guru`
--

INSERT INTO `data_guru` (`id`, `nama`, `nip`, `email`, `id_hari`, `jurusan`, `foto`) VALUES
(1, 'irwan ', 1298120910, 'irwaone@gmail.com', 1, 'Rekayasa Perangkat Lunak', 'logobaju2_64d32babe198e.jpg'),
(3, 'Sinung Kalimo Nugroho', 2020202, 'sinungkn@gmail.com', 1, 'Umum', 'logobaju2_64d2ecfb23852.jpg'),
(18, 'pak toripp', 7812317899812448, 'torippak@gmail.com', 3, 'Rekayasa Perangkat Lunak', 'logobaju2_64c9c929699a8.jpg'),
(19, 'septibu', 312789, 'septi@gmail.com', 3, 'Akuntansi', 'logobaju3_64c9c971d80c4.png'),
(20, 'anggapak', 12345, 'angga@gmail.com', 4, 'Rekayasa Perangkat Lunak', 'logobaju3_64c9c99a6c633.png'),
(21, 'Septi Mutiara', 317202345, 'septi29@gmail.com', 5, 'Rekayasa Perangkat Lunak', 'logobaju3_64c9cecf4cfdf.png'),
(22, 'Badrun', 8907655, 'badrun@gmail.com', 2, 'Otomatisasi Tata Kelola Perkantoran', 'logobaju3_64c9cf968e5c4.png'),
(23, 'hgjgjjujb', 89978686768, 'khukhukh7@gmail.com', 2, 'Rekayasa Perangkat Lunak', 'logobaju3_64c9e82081451.png');

-- --------------------------------------------------------

--
-- Table structure for table `data_siswa`
--

CREATE TABLE `data_siswa` (
  `id` int(11) NOT NULL,
  `id_kodekelas` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_siswa`
--

INSERT INTO `data_siswa` (`id`, `id_kodekelas`, `nama`, `username`) VALUES
(18, 2, 'angga dwi woi', 'korpolairud'),
(20, 1, 'septi', 'woyyyyyyyyyy'),
(22, 4, 'Daffa Aditya putra ellya', 'korpolairud'),
(25, 5, 'Abdildo Mukhti', 'paok'),
(26, 4, 'Daffa Aditya putra ellyas', 'korpolairud');

-- --------------------------------------------------------

--
-- Table structure for table `kode_hari`
--

CREATE TABLE `kode_hari` (
  `id_hari` int(11) NOT NULL,
  `hari` text NOT NULL,
  `kode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_hari`
--

INSERT INTO `kode_hari` (`id_hari`, `hari`, `kode`) VALUES
(1, 'senin', '55607'),
(2, 'selasa', '020202'),
(3, 'rabu', '030303'),
(4, 'kamis', '040404'),
(5, 'jum\'at', '050505');

-- --------------------------------------------------------

--
-- Table structure for table `kode_kelas`
--

CREATE TABLE `kode_kelas` (
  `id_kodekelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `kode_kelas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kode_kelas`
--

INSERT INTO `kode_kelas` (`id_kodekelas`, `nama_kelas`, `kode_kelas`) VALUES
(1, 'XII RPL 1', '11rpl1'),
(2, 'XII RPL 2', '12rpl1'),
(3, 'XII OTKP 1', '12rpl2'),
(4, 'XII OTKP 2', '10rpl1'),
(5, 'XII AKL 1', '12akl1');

-- --------------------------------------------------------

--
-- Table structure for table `regis_admin`
--

CREATE TABLE `regis_admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regis_admin`
--

INSERT INTO `regis_admin` (`id`, `nama`, `password`, `email`) VALUES
(1, 'administrator', 'dubesjaya', 'duabelas12@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `absensi_murid`
--
ALTER TABLE `absensi_murid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_hari` (`id_hari`);

--
-- Indexes for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kodekelas` (`id_kodekelas`);

--
-- Indexes for table `kode_hari`
--
ALTER TABLE `kode_hari`
  ADD PRIMARY KEY (`id_hari`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `kode_kelas`
--
ALTER TABLE `kode_kelas`
  ADD PRIMARY KEY (`id_kodekelas`);

--
-- Indexes for table `regis_admin`
--
ALTER TABLE `regis_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_guru`
--
ALTER TABLE `absensi_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `absensi_murid`
--
ALTER TABLE `absensi_murid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_guru`
--
ALTER TABLE `data_guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `data_siswa`
--
ALTER TABLE `data_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `kode_hari`
--
ALTER TABLE `kode_hari`
  MODIFY `id_hari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kode_kelas`
--
ALTER TABLE `kode_kelas`
  MODIFY `id_kodekelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `regis_admin`
--
ALTER TABLE `regis_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_guru`
--
ALTER TABLE `data_guru`
  ADD CONSTRAINT `data_guru_ibfk_1` FOREIGN KEY (`id_hari`) REFERENCES `kode_hari` (`id_hari`) ON UPDATE CASCADE;

--
-- Constraints for table `data_siswa`
--
ALTER TABLE `data_siswa`
  ADD CONSTRAINT `data_siswa_ibfk_1` FOREIGN KEY (`id_kodekelas`) REFERENCES `kode_kelas` (`id_kodekelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
