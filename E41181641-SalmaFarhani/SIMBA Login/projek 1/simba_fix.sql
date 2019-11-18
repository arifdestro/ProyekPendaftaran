-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2019 at 11:05 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simba_fix`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID_ADMIN` varchar(2) NOT NULL,
  `NAMA_ADMIN` varchar(40) NOT NULL,
  `PASSWORD_ADMIN` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID_ADMIN`, `NAMA_ADMIN`, `PASSWORD_ADMIN`) VALUES
('A1', 'Salma', '397125ab'),
('A2', 'Nuhadi', '2a5a6ed9');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `ID_BAYAR` char(21) NOT NULL,
  `TGL_BAYAR` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`ID_BAYAR`, `TGL_BAYAR`) VALUES
('B000001', '2019-11-18 13:12:14'),
('B000002', '2019-11-18 15:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `ID_DAFTAR` char(20) NOT NULL,
  `ID_BAYAR` char(21) NOT NULL,
  `ID_JENIS_LOMBA` varchar(3) NOT NULL,
  `ID_RAYON` varchar(3) DEFAULT NULL,
  `ID_USER` varchar(5) NOT NULL,
  `ID_ADMIN` varchar(2) NOT NULL,
  `TGL` date NOT NULL,
  `STATUS` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`ID_DAFTAR`, `ID_BAYAR`, `ID_JENIS_LOMBA`, `ID_RAYON`, `ID_USER`, `ID_ADMIN`, `TGL`, `STATUS`) VALUES
('DAF000001', 'B000001', 'J1', 'R1', 'U0001', 'A1', '2019-11-18', NULL),
('DAF000002', 'B000002', 'J1', 'R1', 'U0001', 'A2', '2019-11-18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail`
--

CREATE TABLE `detail` (
  `ID_DAFTAR` char(20) NOT NULL,
  `NISN` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail`
--

INSERT INTO `detail` (`ID_DAFTAR`, `NISN`) VALUES
('DAF000001', '0056123456'),
('DAF000001', '0060987127');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_lomba`
--

CREATE TABLE `jenis_lomba` (
  `ID_JENIS_LOMBA` varchar(3) NOT NULL,
  `NAMA_LOMBA` varchar(15) NOT NULL,
  `BIAYA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_lomba`
--

INSERT INTO `jenis_lomba` (`ID_JENIS_LOMBA`, `NAMA_LOMBA`, `BIAYA`) VALUES
('J1', 'Olimpiade', 75000),
('J2', 'Science Product', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `ID_KECAMATAN` char(3) NOT NULL,
  `ID_KOTA` char(3) DEFAULT NULL,
  `NAMA_KECAMATAN` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`ID_KECAMATAN`, `ID_KOTA`, `NAMA_KECAMATAN`) VALUES
('D01', 'K01', 'Gumukmas'),
('D02', 'K01', 'Kaliwates'),
('D03', 'K01', 'Tanggul');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `ID_KOTA` char(3) NOT NULL,
  `NAMA_KOTA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`ID_KOTA`, `NAMA_KOTA`) VALUES
('K01', 'Jember'),
('K02', 'Probolinggo'),
('K03', 'Banyuwangi'),
('K04', 'Pasuruan'),
('K05', 'Bondowoso'),
('K06', 'Lumajang'),
('K07', 'Situbondo');

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `ID_RAYON` varchar(3) NOT NULL,
  `NAMA_RAYON` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`ID_RAYON`, `NAMA_RAYON`) VALUES
('R1', 'Jember'),
('R2', 'Probolinggo'),
('R3', 'Banyuwangi');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `NPSN` char(8) NOT NULL,
  `ID_KECAMATAN` char(3) NOT NULL,
  `NAMA_SEKOLAH` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`NPSN`, `ID_KECAMATAN`, `NAMA_SEKOLAH`) VALUES
('88823112', 'D01', 'SMPN 1 Jember'),
('88845009', 'D01', 'MTSN 2 Jember'),
('88856987', 'D01', 'MTSN 1 Jember'),
('88895421', 'D01', 'SMPN 2 Jember');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NISN` char(10) NOT NULL,
  `NPSN` char(8) NOT NULL,
  `NAMA_SISWA` varchar(40) NOT NULL,
  `JENIS_KELAMIN` char(1) NOT NULL,
  `TEMPAT_LAHIR` varchar(20) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `ALAMAT` varchar(30) NOT NULL,
  `SURAT_REKOM` varchar(20) NOT NULL,
  `FILE_ABSTRAK` varchar(20) DEFAULT NULL,
  `FOTO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NISN`, `NPSN`, `NAMA_SISWA`, `JENIS_KELAMIN`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `ALAMAT`, `SURAT_REKOM`, `FILE_ABSTRAK`, `FOTO`) VALUES
('0056123456', '88895421', 'Muhammad Arif Annaili F.', 'L', 'Banyuwangi', '2005-04-08', 'Banyuwangi', '', NULL, ''),
('0060987127', '88856987', 'Dinda Ayu Nafisyah', 'P', 'Jember', '2006-11-11', 'Jember', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` varchar(5) NOT NULL,
  `NAMA_USER` varchar(40) NOT NULL,
  `_EMAIL_USER` varchar(30) NOT NULL,
  `PASSWORD_USER` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA_USER`, `_EMAIL_USER`, `PASSWORD_USER`) VALUES
('U0001', 'arif_arif', 'arlopaz.uye121299@gmail.com', '7110eda4'),
('U0002', 'Nur Hadi', 'nurhadi99@gmail.com', 'hadi123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`);

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`ID_BAYAR`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`ID_DAFTAR`),
  ADD KEY `FK_MEMBAYAR` (`ID_BAYAR`),
  ADD KEY `FK_MEMILIH_JENIS_LOMBA` (`ID_JENIS_LOMBA`),
  ADD KEY `FK_MEMILIH_RAYON` (`ID_RAYON`),
  ADD KEY `FK_MEMVERIVIKASI` (`ID_ADMIN`),
  ADD KEY `FK_MENDAFTAR` (`ID_USER`);

--
-- Indexes for table `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`ID_DAFTAR`,`NISN`),
  ADD KEY `FK_MELAKUKAN2` (`NISN`);

--
-- Indexes for table `jenis_lomba`
--
ALTER TABLE `jenis_lomba`
  ADD PRIMARY KEY (`ID_JENIS_LOMBA`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`ID_KECAMATAN`),
  ADD KEY `FK_MEMILIKI_KOTA` (`ID_KOTA`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`ID_KOTA`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`ID_RAYON`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`NPSN`),
  ADD KEY `FK_MEMILIKI_KECAMATAN` (`ID_KECAMATAN`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`NISN`),
  ADD KEY `FK_MEMILIKI` (`NPSN`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `FK_MEMBAYAR` FOREIGN KEY (`ID_BAYAR`) REFERENCES `bayar` (`ID_BAYAR`),
  ADD CONSTRAINT `FK_MEMILIH_JENIS_LOMBA` FOREIGN KEY (`ID_JENIS_LOMBA`) REFERENCES `jenis_lomba` (`ID_JENIS_LOMBA`),
  ADD CONSTRAINT `FK_MEMILIH_RAYON` FOREIGN KEY (`ID_RAYON`) REFERENCES `rayon` (`ID_RAYON`),
  ADD CONSTRAINT `FK_MEMVERIVIKASI` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `FK_MENDAFTAR` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_DAFTAR`) REFERENCES `daftar` (`ID_DAFTAR`),
  ADD CONSTRAINT `FK_MELAKUKAN2` FOREIGN KEY (`NISN`) REFERENCES `siswa` (`NISN`);

--
-- Constraints for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `FK_MEMILIKI_KOTA` FOREIGN KEY (`ID_KOTA`) REFERENCES `kota` (`ID_KOTA`);

--
-- Constraints for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD CONSTRAINT `FK_MEMILIKI_KECAMATAN` FOREIGN KEY (`ID_KECAMATAN`) REFERENCES `kecamatan` (`ID_KECAMATAN`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`NPSN`) REFERENCES `sekolah` (`NPSN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
