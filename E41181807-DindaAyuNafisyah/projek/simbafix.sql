-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2019 at 11:31 AM
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
-- Database: `simbafix`
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
('a1', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `ID_BAYAR` char(21) NOT NULL,
  `ID_DAFTAR` char(20) NOT NULL,
  `TGL_BAYAR` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `ID_DAFTAR` char(20) NOT NULL,
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

INSERT INTO `daftar` (`ID_DAFTAR`, `ID_JENIS_LOMBA`, `ID_RAYON`, `ID_USER`, `ID_ADMIN`, `TGL`, `STATUS`) VALUES
('d1', 'jl1', 'r01', 'u0001', 'a1', '2019-11-01', NULL),
('d2', 'jl1', 'r01', 'u0002', 'a1', '2019-11-01', NULL),
('d3', 'jl2', 'r01', 'u0002', 'a1', '2019-11-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_daftar`
--

CREATE TABLE `detail_daftar` (
  `ID_DAFTAR` char(20) NOT NULL,
  `NISN` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('jl1', 'Olimpiade', 75000),
('jl2', 'Sains Produk', 100000);

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
('r01', 'Jember'),
('r02', 'Banyuwangi'),
('r03', 'Probolinggo');

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `NPSN` char(8) NOT NULL,
  `NAMA_SEKOLAH` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`NPSN`, `NAMA_SEKOLAH`) VALUES
(' 2045014', 'SMP NEGERI 3 SRONO SATU ATAP'),
(' 2052001', 'SMP BUDI UTOMO'),
(' 2052004', 'SMP NEGERI 1 PAJARAKAN'),
(' 2052373', 'SMP 11 MA ARIF BANGSALSARI'),
(' 2052374', 'SMP AL MUTTAQIN'),
(' 2052376', 'SMP KRISTEN ALETHEIA'),
(' 2052377', 'SMP KRISTEN CAHAYA'),
(' 2052378', 'SMP ASY SYAFAAH'),
(' 2052379', 'SMP ISLAM AL HIDAYAH'),
(' 2052385', 'SMPN 2 JEMBER'),
(' 2052386', 'SMPN 1 SUMBERJAMBE'),
(' 2052387', 'SMPN 2 SUKOWONO'),
(' 2052388', 'SMPN 10 JEMBER'),
(' 2052389', 'SMPN 7 JEMBER'),
(' 2052390', 'SMPN 4 JEMBER'),
(' 2052391', 'SMPS PGRI 2 PATRANG JEMBER'),
(' 2052392', 'SMP MOCH. SROEDJI JEMBER'),
(' 2052393', 'SMP MUHAMMADIYAH 1 JEMBER'),
(' 2052394', 'SMP SATYA DHARMA'),
(' 2052395', 'SMPN 1 JELBUK'),
(' 2052396', 'SMP PLUS DARUS SHOLAH'),
(' 2052553', 'SMP MUHAMMADIYAH 5 SILIRAGUNG'),
(' 2052554', 'SMP KOSGORO KALIPURO'),
(' 2052556', 'SMP KOSGORO SRAGI'),
(' 2052557', 'SMP PLUS DARUSSALAM'),
(' 2052558', 'SMP HARAPAN 2 GENTENG'),
(' 2052561', 'SMP DARUL HUDA WONGSOREJO'),
(' 2052563', 'SMP NEGERI 2 SILIRAGUNG'),
(' 2052564', 'SMP NEGERI 2 TEGALSARI'),
(' 2052565', 'SMP NEGERI 2 KALIPURO'),
(' 2052568', 'SMP NEGERI 3 KALIPURO'),
(' 2052570', 'SMP KATOLIK YOS SUDARSO'),
(' 2052571', 'SMP NEGERI 1 SILIRAGUNG'),
(' 2052572', 'SMP NEGERI 1 TEGALSARI'),
(' 2052573', 'SMP NEGERI 1 LICIN'),
(' 2053939', 'SMP KARTIKA IV-7 SILIRAGUNG'),
(' 2053940', 'SMP WALI SONGO'),
(' 2054011', 'SMP IBRAHIMY WONGSOREJO'),
(' 2054013', 'SMP NEGERI 3 SILIRAGUNG SATU A'),
(' 2054014', 'SMP NURUL FALAH'),
(' 2054015', 'SMP WAHID HASYIM'),
(' 2054646', 'SMP NEGERI 2 GADING'),
(' 2054676', 'SMP ZAINUL HASAN 1'),
(' 2054677', 'SMP ISLAM AL HASYIMI'),
(' 2054679', 'SMP ISLAM RIYADLUS SHOLIHIN'),
(' 2054680', 'SMP MUHAMMADIYAH 3 GENDING'),
(' 2054681', 'SMP NEGERI 3 SUMBERASIH SATU A'),
(' 2054682', 'SMP NEGERI 1 GENDING'),
(' 2054683', 'SMP NEGERI 1 MARON'),
(' 2054684', 'SMP NEGERI 1 SUMBERASIH'),
(' 2054685', 'SMP NEGERI 2 SUMBERASIH'),
(' 2054686', 'SMP NEGERI 2 TONGAS'),
(' 2054723', 'SMP PLUS AL MASHDUQIAH'),
(' 2054724', 'SMP NEGERI 3 KRAKSAAN'),
(' 2054833', 'SMP TAMAN DEWASA'),
(' 2054834', 'SMPN 3 SUMBERJAMBE'),
(' 2054876', 'SMP BAHAGIA'),
(' 2054877', 'SMPI MIFTAHUL HASANAIN'),
(' 2054879', 'SMPN 14 JEMBER'),
(' 2054892', 'SMPS INKLUSI TPA JEMBER'),
(' 2054893', 'SMP S PLUS BAHRUL ULUM'),
(' 2054908', 'SMP ISLAM PLUS MIFTAHUL WARITS'),
(' 2054949', 'SMP PLUS AL AZIIZ'),
(' 2054962', 'SMPN 4 KALISAT'),
(' 2054965', 'SMPS BAITURROHMAH'),
(' 2054971', 'SMP PLUS NURINA BANGSALSARI'),
(' 2054989', 'SMPN 13 JEMBER'),
(' 2055169', 'SMP ISLAM BUSTANUL ULUM'),
(' 2055173', 'SMPS PLUS MAMBAUL ULUM PALERAN'),
(' 2055200', 'SMP SUNAN KALIJAGA'),
(' 2055322', 'SMP Raudlatul Jannah'),
(' 2055323', 'SMP ISLAM ALIMUDDIN'),
(' 2055387', 'SMP ISLAM AS-SALAM'),
(' 2055404', 'SMPS ISLAM YANABIUL ULUM'),
(' 2055414', 'SMP ISLAM TERPADU SYARIF HIDAY'),
(' 2055418', 'SMP DARUL HIKMAH'),
(' 2055419', 'SMP PLUS DARUL HIKMAH'),
(' 2055420', 'SMPS PLUS AL AMIEN AMBULU'),
(' 2055421', 'SMP ISLAM NURUL MUKMININ'),
(' 2055424', 'SMPN 4 SUMBERJAMBE'),
(' 2055425', 'SMP NEGERI 2 LECES'),
(' 2055431', 'SMP PLUS AL QALAM'),
(' 2055432', 'SMP PLUS MAMBAUL ULUM'),
(' 2055434', 'SMPN 3 LEDOKOMBO'),
(' 2055435', 'SMPN 5 SILO'),
(' 2055449', 'SMP NEGERI 1 BLIMBINGSARI SATU'),
(' 2055481', 'SMPS PLUS RAUDLOTUL MUQORROBIN'),
(' 2055482', 'SMP NURUL FALAH'),
(' 2055486', 'SMPS AL BAITUL AMIEN JEMBER'),
(' 2055487', 'SMP NASIRUL ULUM'),
(' 2055493', 'SMP ISLAM AL BAITUR ROHMAH'),
(' 2055539', 'SMP ISLAM MUNCAR'),
(' 2055545', 'SMP PLUS DARUL HIKMAH II WULUH'),
(' 2055546', 'SMP PLUS SUNAN DRAJAT'),
(' 2055565', 'SMPS PLUS MODAL BANGSA ABUL AB'),
(' 2055568', 'SMP AN-NUUR AL-FADHOL'),
(' 2055583', 'SMP FULL DAY SUNAN AMPEL'),
(' 2055610', 'SMP ISLAM TERPADU AL-GHOZALI J'),
(' 2055617', 'SMP ISLAM WALI SONGO'),
(' 2055721', 'SMP PLUS SIRAJUL ANWAR'),
(' 2055845', 'SMPN 2 MUMBULSARI'),
(' 2055846', 'SMP NEGERI 4 SILIRAGUNG'),
(' 2056008', 'SMP NEGERI 5 KALIBARU SATU ATA'),
(' 2056014', 'SMP NEGERI 4 WONGSOREJO SATU A'),
(' 2056220', 'SMP NEGERI 4 WONOMERTO SATU AT'),
(' 2056221', 'SMPN 2 Sumber'),
(' 2056446', 'SMP AL BADRI'),
(' 2056566', 'SMP ISLAM AL MURSYIDIYAH'),
(' 2056608', 'SMP NEGERI 4 TONGAS SATU ATAP'),
(' 2056626', 'SMP Nurul Hasyimi'),
(' 2056629', 'SMP 20 MA ARIF AS SALAFI'),
(' 2056642', 'SMPS ISLAM ANNUR'),
(' 2056710', 'SMP ADZ DZIKIR'),
(' 2056711', 'SMP ISLAM MIFTAHUL ULUM'),
(' 2056774', 'SMP ISLAM MIFTAHUL ULUM'),
(' 2056829', 'SMP Plus Al Munawaroh'),
(' 2057046', 'SMP DARUL LUGHAH WAL KAROMAH'),
(' 2057047', 'SMPN 5 TANGGUL'),
(' 2057067', 'SMP NURUN NAJAH SUKOWONO'),
(' 2057074', 'SMP MAQNA UL ULUM'),
(' 2057089', 'SMP MUKHTAR SYAFAAT'),
(' 2057090', 'SMP ISLAM MINHAJUTTHULAB'),
(' 2057091', 'SMP An Nur Karomatul Hasan'),
(' 2057092', 'SMP ISLAM ULUL ALBAB'),
(' 2057096', 'SMP AL KAUTSAR'),
(' 2057097', 'SMP AR-RAUDLAH'),
(' 2057100', 'SMP ISLAM AL-MULTAZAM'),
(' 2057103', 'SMP Al Barokah Mahmudiyah'),
(' 2057104', 'SMP Ar Rohmah'),
(' 2057108', 'SMP Islam Nurut Tholibin'),
(' 2057125', 'SMP Arrahmah'),
(' 2057137', 'SMP Bahjatul Ulum'),
(' 2057147', 'SMP Darus Salam'),
(' 2057159', 'SMP Al Barokah'),
(' 2057160', 'SMP Ihyauddiniyah'),
(' 2057162', 'SMPS Islam Terpadu Ibnu Sina W'),
(' 2057202', 'SMP Mamba ul Islam'),
(' 2057443', 'SMP NEGERI 4 KRAKSAAN'),
(' 2057447', 'SMP Islam Tarbiyatul Ihsan'),
(' 2057449', 'SMP Islam Alhikmah'),
(' 2057454', 'SMP AL-MIFTAH SILO'),
(' 2057461', 'SMP NURUL ABROR ARROBANIYIIN'),
(' 2057472', 'SMP Negeri 3 Wonomerto'),
(' 2057608', 'SMP ISLAM AL ATIQ'),
(' 2057613', 'SMP NEGERI 4 Sumberasih'),
(' 2057620', 'SMP ASY-SYUJA I'),
(' 2057639', 'SMP ISLAM SUNAN KALI JAGA'),
(' 2057646', 'SMP Islam Terpadu Al Amri'),
(' 2057707', 'SMP AL AZHAR MUNCAR'),
(' 2057708', 'SMP Nurul Istiqomah'),
(' 2057713', 'SMP HIDAYATUL MUTAALLIMIN'),
(' 2057715', 'SMP Islam Hidayatul Amin'),
(' 2057718', 'SMP ISLAM DARUL ARIFIN'),
(' 2057724', 'SMP AL-HASANY'),
(' 2057725', 'SMP MIFTAHUL HUDA'),
(' 2057738', 'SMP SIROJUT THOLIBIN'),
(' 2057746', 'SMP Nuriddahlani'),
(' 2057747', 'SMP Plus Al-Kholiliyah'),
(' 2057748', 'SMP Darus Salam As Sakdiah'),
(' 2057753', 'SMP DARUNNAJAH'),
(' 2057771', 'SMP NEGERI 5 LUMBANG SATU ATAP'),
(' 2057772', 'SMPN 8 Sukapura Satap'),
(' 2057776', 'MTSS NURUS SA`ADAH'),
(' 2057929', 'MTSS MIFTAHUSSALAM'),
(' 2057988', 'MTSS RAUDLATUL HASANIYAH'),
(' 2058143', 'MTSS TRIBAKTI'),
(' 2058144', 'MTSS FATHUS SALAFI'),
(' 2058145', 'MTSS SA SA`ADATUL KHOLILI'),
(' 2058146', 'MTSS SYAMSUL ARIFIN BANGSALSAR'),
(' 2058147', 'MTSS SA AL - HIDAYAH'),
(' 2058148', 'MTSS SA NURUS SHOLAH'),
(' 2058149', 'MTSS RAUDLATUL AKBAR'),
(' 2058150', 'MTSS ASHRI'),
(' 2058151', 'MTSS NURUL ALI'),
(' 2058152', 'MTSS UNGGULAN NURURRAHMAN'),
(' 2058153', 'MTSS RAUDLATUL MUTAALLIM'),
(' 2058154', 'MTSS NURUL HIKMAH'),
(' 2058155', 'MTSS NURUL HUDA'),
(' 2058156', 'MTSS KHOLID BIN WALID'),
(' 2058157', 'MTSS SA MIFTAHUL ULUM'),
(' 2058158', 'MTSS RAUDLATUL MUTAALLIMIN'),
(' 2058159', 'MTSS UNGGULAN NURIS'),
(' 2058160', 'MTSS TANGGUL 01'),
(' 2058161', 'MTSS WALISONGO'),
(' 2058162', 'MTSN 5 BANYUWANGI'),
(' 2058163', 'MTSS NURUL HUDA'),
(' 2058164', 'MTSS SA ALAWIYAH'),
(' 2058165', 'MTSS SYAMSUL HUDA'),
(' 2058166', 'MTSS NAHDLATUTH THULLAAB'),
(' 2058167', 'MTSS UNGGULAN AL-ISHLAH'),
(' 2058168', 'MTSS KING ABDUL AZIZ'),
(' 2058169', 'MTSS DIPONEGORO'),
(' 2058170', 'MTSS SALAFIYAH'),
(' 2058188', 'MTSS NURUL HIKMAH'),
(' 2058189', 'MTSS WALISONGO 3'),
(' 2058190', 'MTSS ZAHROTUL ISLAM'),
(' 2058191', 'MTSS WALISONGO II'),
(' 2058192', 'MTSS TARBIYATUL ISLAM'),
(' 2058193', 'MTSS SUNAN AMPEL KAMALKUNING'),
(' 2058194', 'MTSS ZAINUL ANWAR'),
(' 2058195', 'MTSS RAUDLATUS SHOLIHIN'),
(' 2058196', 'MTSS ZAINUL IRSYAD'),
(' 2058197', 'MTSS DARUS SHOLIHIN'),
(' 2058198', 'MTSS ZAINAL ABIDIN'),
(' 2058199', 'MTSS TARBIYATUL ISLAMIYAH'),
(' 2058200', 'MTSS ZAINUL HASAN GENGGONG'),
(' 2058201', 'MTSS WALI SONGO'),
(' 2058202', 'MTSS RIYADLUS SHOLIHIN'),
(' 2058203', 'MTSS DARUSSALAM TONGAS'),
(' 2058204', 'MTSS MIFTAHUL HUDA'),
(' 2058390', 'SMP AL MUBAROK'),
(' 2058391', 'SMPN 15 JEMBER'),
(' 2058405', 'SMP HIDAYATUN NAJAH'),
(' 2058500', 'MTSS AINUL YAQIN'),
(' 6072473', 'SMPN 3 Kuripan Satap'),
(' 6072657', 'SMP NUHUUDLIYYAH'),
(' 6072745', 'MTSS MIFTAHUL JADID'),
(' 6072747', 'MTSS MASYITHOH'),
(' 6072748', 'MTSS NURUL ISLAM'),
(' 6072851', 'SMPS MITRA PATRANG'),
(' 6072861', 'MTSS AS SHOBIER'),
(' 6072876', 'MTS ZAIDUL ALI'),
(' 6972545', 'MTSS ASY SYAFIIYAH'),
(' 6972586', 'SMPN 5 Sumber Satap'),
(' 6972631', 'MTSS ULIL ALBAB'),
(' 6972640', 'MTSS MIFTAHUL ULUM'),
(' 6972671', 'MTSS DARUL MUTA ALLIMIN'),
(' 6972764', 'MTSS NURUL ISTIFADAH'),
(' 6972807', 'MTSS IHYAUL IMAN'),
(' 6973385', 'SMP BUSTANUL ULUM'),
(' 6975326', 'SMPS ISLAM RAUDLATUL ULUM'),
(' 6975393', 'SMPS MAMBAUL ULUM SUMBERBARU'),
(' 6975394', 'SMP SWASTA ISLAM HUBBUL QURAN'),
(' 6975597', 'SMPS MIFTAHUL ULUM SUMBERBARU'),
(' 6975689', 'SMP ISLAM ZAINAL ABIDIN'),
(' 6975752', 'SMPS ISLAM DARUSSALAM SUMBERJA'),
(' 6975793', 'SMP SWASTA AKBAR GUNUNGSARI UM'),
(' 6975811', 'SMP ISLAM DARUL ULUM BANTARAN'),
(' 6975812', 'SMPS ISLAM FATHUL BARRIYAH'),
(' 6975893', 'SMPS AS - SYAFI I'),
(' 6975898', 'SMP AINUL YAQIN'),
(' 6975905', 'SMPS ISLAM BUSTANUL ARIFIN'),
(' 6975906', 'SMP Darus Salam'),
(' 6975923', 'SMPS HAYATUL ISLAM'),
(' 6975929', 'SMP Islam Anugrah'),
(' 6976067', 'SMP AL-ARIFIN'),
(' 6976190', 'SMPS RAUDLATUL HASANIYAH'),
(' 6976502', 'SMP ISLAM IRSYADUL MUBTADIIN'),
(' 6976829', 'SMPS HIDAYATUL ISLAMIYAH'),
(' 6977356', 'SMPS PELITA HATI NATIONAL PLUS'),
(' 6977485', 'SMP ISLAM BABUS SHOLIHIN'),
(' 6977488', 'SMPS MIFTAHUL FALAH'),
(' 6978645', 'SMPS ISLAM AL HASANIYAH'),
(' 6978688', 'SMP ISLAM RAUDLATUL ULUM BANYU'),
(' 6978689', 'SMP ISLAM DARUL ULUM'),
(' 6978746', 'SMP PLUS BUSTANUL MAARIF GUMUK'),
(' 6978828', 'MTsS BUSTANUL ULUM'),
(' 6978835', 'MTSS RAUDLATUS SYABAB'),
(' 6978837', 'MTsS RAUDLATUL HIDAYAH'),
(' 6978838', 'MTsS MADINATUL ILMI'),
(' 6981452', 'SMPS NIDHOMIYYAH'),
(' 6982330', 'SMP AL QURAN MINHAJUT THULLAB'),
(' 6982483', 'MTSS Al-Achyar'),
(' 6982763', 'SMPS AL HIDAYAH'),
(' 6984942', 'SMP ISLAM ANNIDHOMIYAH'),
(' 6985186', 'SMP ISLAM NURUL HIKMAH AS-SHOL'),
(' 6985336', 'MtsS Miftahul Ulum'),
(' 6985337', 'Fatahillah'),
(' 6985359', 'MTSS NU Banjarsari'),
(' 6986796', 'SMPS ISLAM ZAINUL HASAN'),
(' 6987354', 'SMP AL-IRSYAD'),
(' 6987720', 'SMPS ISLAM NURUL ULUM MUMBULSA'),
(' 6988167', 'MTSS Ibnu Hasan'),
(' 6988232', 'SMPS ISLAM MIFTAHUL HASAN'),
(' 6988233', 'SMPS ASH SHIDDIQI'),
(' 6988235', 'SMP NU BAITUSSALAM'),
(' 6988332', 'MTSS MIFTAHUL ULUM AT TAUFIQ'),
(' 6988345', 'MTSS HASBUNALLAH'),
(' 6988622', 'MTSS RAUDLATUL ULUM'),
(' 6988641', 'MTSS Nurul Anwar'),
(' 6988645', 'SMP ISLAM AR ROFIIYAH'),
(' 6988840', 'SMPS AL BAITUR ROHIM'),
(' 6988842', 'SMPS MIFTAHUL ULUM RAMBIPUJI'),
(' 6988852', 'SMP SABILUTTAIBIN'),
(' 6988904', 'SMPS ISLAM AL MIZAN'),
(' 6989228', 'SMPS ISLAM AL HADI JOMBANG'),
(' 6989495', 'SMPS ISLAM DARUL MUTA ALLIMIN'),
(' 6989513', 'MTS AL-QODIRI VIII'),
(' 6989514', 'NABATUSSALAM'),
(' 6989515', 'Hidayatul Islam'),
(' 6989538', 'SMPS ISLAM DARUL ISTIQOMAH'),
(' 6989678', 'SMPS NURUL ISLAM TANGGUL'),
(' 6989930', 'SMP NU AL ISLAMI'),
(' 6990008', 'SMP NU SHAFIYAH'),
(' 6990033', 'SMP HATI Bilingual Boarding Sc'),
(' 6990333', 'SMPS MASLAHATUL IKHWAN RAMBIPU'),
(' 6990396', 'SMP DARUL FALAH'),
(' 6990413', 'SMPS ISLAM DARUL ISTIQOMAH SUM'),
(' 6990770', 'SMP Taruna Islam Al - Kautsar'),
(' 6990977', 'SMPS NURUL CHOTIB'),
(' 6992482', 'SMPS PLUS TANWIRUL ULUM'),
(' 6992739', 'MTsSSirojul Hasan'),
(' 6992800', 'MTsSSyarief Hidayatullah'),
(' 6992915', 'SMPS SHOFA MARWA PAKUSARI'),
(' 6992918', 'SMPS AL KHOLILI KALISAT'),
(' 6992933', 'SMPS ADH DHUHA'),
(' 6992982', 'SMPS ISLAM GARDEN SCHOOL'),
(' 6993182', 'SMPS SALAFIYAH SYAFI IYAH'),
(' 6993282', 'SMP NU AL ISLAH'),
(' 6993429', 'SMPS AL HASAN PANTI'),
(' 6993431', 'SMP BAHRUL ULUM'),
(' 6993853', 'SMPS 21 NAHDLATUL ULAMA SYAMSU'),
(' 6993962', 'SMP AHMAD SYARIFUDDIN'),
(' 6994148', 'MTsS Assalafi Darun Najah'),
(' 6994149', 'MTsS Al Fatah'),
(' 6994438', 'SMP ISLAM WALI SONGO'),
(' 6994496', 'SMP AMANATULLOH'),
(' 6994527', 'SMP PROGRESIF KHAIRO UMMAH'),
(' 6994638', 'SMP ISLAM AL HAQIQY'),
(' 6994646', 'SMP AL QURAN AL MUBAROK'),
(' 6994853', 'SMP NURUT TAQWA'),
(' 6994884', 'SMP ISLAM TERPADU INSAN CENDEK'),
(' 6994976', 'SMP PLUS CORDOVA'),
(' 6995057', 'SMP NU AS SYAMSURI'),
(' 6995069', 'SMP NU DARUL MAGHFUR'),
(' 6995086', 'SMP ISLAM NURUL FALAH'),
(' 6995246', 'SMP DARUSSYAFAAH'),
(' 6995403', 'SMP ISLAM AL IDRISIYAH'),
(' 6995471', 'SMP HASANIYAH'),
(' 6995472', 'SMP ISLAM ABD. WAHID'),
(' 6995545', 'SMPS AL - MUTHOHHIRIN'),
(' 6995598', 'Integrasi Nurul Hikmah'),
(' 6995639', 'Muadalah Al-Mashduqiah'),
(' 6995679', 'SMPS DARUNNAJAH'),
(' 6995689', 'SMPS UNGGULAN ASTRA NAWA'),
(' 6995731', 'SMPS ISLAM SUNAN BONANG SUMBER'),
(' 6995738', 'SMPS MUHAMMADIYAH 4 TANGGUL'),
(' 6995843', 'SMPS AL BUKHORI'),
(' 6995908', 'SMPS PLUS NURUL WAFA MUMBULSAR'),
(' 6995910', 'SMP ISLAM TERPADU PERMATA'),
(' 6995916', 'SMP ROUDLOTUSSALAM'),
(' 6995981', 'SMPS NURUSSALAM AMBULU'),
(' 6996041', 'SMP DARUL FALAH'),
(' 6996054', 'SMPS NURUL FALAH'),
(' 6996240', 'SMPS BANY KARIM BALUNG'),
(' 6996347', 'Darul Hikam'),
(' 6996348', 'Darussalam Tongas'),
(' 6996483', 'SMP ISLAM KABAT'),
(' 6996692', 'SMP TARBIYATUL MUHIBBIN'),
(' 6996793', 'SMP ISLAM SUNAN GUNUNG JATI'),
(' 6996845', 'SMPS NURUS SALAM WULUHAN'),
(' 6996888', 'SMPS PLUS ISTIQOMAH'),
(' 6996903', 'SMPI TARBIYATUL ISLAM'),
(' 6996923', 'SMP ISLAM NURUL IMAN'),
(' 6997034', 'SMP ISLAM EXCELLENT NURUL ADZI'),
(' 6997181', 'SMP MAARIF NU KRAKSAAN'),
(' 6997186', 'SMP QUEEN IBNU SINA'),
(' 6997260', 'SMP NU AL AMNAN'),
(' 6997412', 'SMP MANDALA'),
(' 6997579', 'MTS DARUL HIKMAH AL-ISLAMY'),
(' 6997775', 'MTS SUNAN AMPEL'),
(' 6997776', 'MTS RIYADHOTUL UQUL'),
(' 6997892', 'SMPS ISLAM NURUL ISTI`DAD'),
(' 6997895', 'MTsN 10 JEMBER'),
(' 6997906', 'SMPS ISLAM MANHADLUL UBBAD'),
(' 6997924', 'SMPS Tahfidz Al Azhar'),
(' 6997965', 'SMP TAHFIDZUL QURAN SUBULUSSAL'),
(' 6997982', 'SMP SUNAN KALIJOGO'),
(' 6998012', 'SMPS DARUSSA`ADAH'),
(' 6998038', 'SMPS PLUS ROYATUL ISLAM'),
(' 6998062', 'SMP ASTRANAWA'),
(' 6998273', 'SMPS AS SUNNIYYAH AL JAUHARI'),
(' 6998319', 'MTSS DARUS SYAFA`AH'),
(' 6998324', 'MTSS MAMBA`UL HUDA'),
(' 6998327', 'MTSS NURUL AMIN'),
(' 6998330', 'MTSS PLUS BAITUSSALAM'),
(' 6998334', 'MTSS TAHFIDZ DARUL MUKHTAR'),
(' 6998392', 'SMP DARUL MUSTHOFA'),
(' 6998557', 'SMP ISLAM MISBAHUL ULUM'),
(' 6998620', 'SMP ISLAM NURUS SYAMSI'),
(' 6998689', 'MTsN 11 Jember'),
(' 6998735', 'SMP KRISTEN BENIH HARAPAN'),
(' 6998847', 'SMP ISLAM AT TANWIR'),
(' 6998923', 'SMP DAARUL QURAN'),
(' 6998947', 'SMP KANZUS SHOLAWAT'),
(' 6998968', 'SMPS NURUL YAQIN'),
(' 6999004', 'SMPS UNGGULAN AL HIKMAH'),
(' 6999005', 'SMP AL QURAN SAFINDA BANYUWANG'),
(' 6999013', 'SMPS PLUS AL QODIRI'),
(' 6999025', 'SMPS BAITUR RAHMAN'),
(' 6999086', 'SMP BALDATUSSHIDDIQ');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `NISN` char(10) NOT NULL,
  `NPSN` char(8) NOT NULL,
  `NAMA_SISWA` varchar(40) NOT NULL,
  `TEMPAT_LAHIR` varchar(20) NOT NULL,
  `TANGGAL_LAHIR` date NOT NULL,
  `JENIS_KELAMIN` enum('Laki-Laki','Perempuan') NOT NULL,
  `ALAMAT` varchar(50) NOT NULL,
  `SURAT_REKOM` varchar(20) NOT NULL,
  `FILE_ABSTRAK` varchar(20) DEFAULT NULL,
  `FOTO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NISN`, `NPSN`, `NAMA_SISWA`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `ALAMAT`, `SURAT_REKOM`, `FILE_ABSTRAK`, `FOTO`) VALUES
('0000000000', ' 2045014', 'Dinda', 'Jember', '2019-11-01', 'Perempuan', 'Jember', 'rekom.pdf', NULL, 'foto.jpeg'),
('0000000001', ' 2045014', 'Salma', 'Jember', '2019-11-02', 'Perempuan', 'Jember', 'rek.pdf', NULL, 'foto.pdf'),
('0000000003', ' 2052001', 'Arif', 'Banyuwangi', '2019-11-09', 'Laki-Laki', 'Banyuwangi', 'rekom.jpeg', NULL, 'foto.pdf'),
('0000000005', ' 2052001', 'Nur Hadi', 'Jember', '2019-11-08', 'Laki-Laki', 'Jember', 'gg.pdf', 'abd.pdf', 'ft.jpeg'),
('0001821614', ' 2052001', 'Wildan', 'Banyuwangi', '2019-11-03', 'Laki-Laki', 'Banyuwangi', 'rekom.pdf', NULL, 'foto.pdf'),
('9991821612', ' 2045014', 'Tika', 'Jember', '2019-11-01', 'Perempuan', 'Jember', 'rekom.pdf', NULL, 'foto.jpeg'),
('9991821613', ' 2045014', 'Lita', 'Jember', '2019-11-02', 'Perempuan', 'Jember', 'rekom.jpg', NULL, 'foto.jpg'),
('9991821615', ' 2052001', 'Dika', 'Banyuwangi', '2019-11-06', 'Laki-Laki', 'Banyuwangi', 'rr.jpg', 'Abstrakku.pdf', 'ft.jpeg');

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
('u0001', 'User1', 'emailuser1@gmail.com', 'User1'),
('u0002', 'User2', 'emailuser2@gmail.com', 'User2'),
('u0003', 'User3', 'emailuser3@gmail.com', 'User3'),
('u0004', 'User4', 'emailuser4@gmail.com', 'User4'),
('u0005', 'User5', 'emailuser5@gmail.com', 'User5'),
('u0006', 'User6', 'emailuser6@gmail.com', 'User6'),
('u0007', 'User7', 'emailuser7@gmail.com', 'User7'),
('u0008', 'User8', 'emailuser8@gmail.com', 'User8'),
('u0009', 'User9', 'emailuser9@gmail.com', 'User9'),
('u0010', 'User10', 'emailuser10@gmail.com', 'User10');

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
  ADD PRIMARY KEY (`ID_BAYAR`),
  ADD KEY `FK_MEMBAYAR` (`ID_DAFTAR`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`ID_DAFTAR`),
  ADD KEY `FK_MEMILIH_JENIS_LOMBA` (`ID_JENIS_LOMBA`),
  ADD KEY `FK_MEMILIH_RAYON` (`ID_RAYON`),
  ADD KEY `FK_MEMVERIVIKASI` (`ID_ADMIN`),
  ADD KEY `FK_MENDAFTAR` (`ID_USER`);

--
-- Indexes for table `detail_daftar`
--
ALTER TABLE `detail_daftar`
  ADD PRIMARY KEY (`ID_DAFTAR`,`NISN`),
  ADD KEY `FK_MELAKUKAN2` (`NISN`);

--
-- Indexes for table `jenis_lomba`
--
ALTER TABLE `jenis_lomba`
  ADD PRIMARY KEY (`ID_JENIS_LOMBA`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`ID_RAYON`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`NPSN`);

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
-- Constraints for table `bayar`
--
ALTER TABLE `bayar`
  ADD CONSTRAINT `FK_MEMBAYAR` FOREIGN KEY (`ID_DAFTAR`) REFERENCES `daftar` (`ID_DAFTAR`);

--
-- Constraints for table `daftar`
--
ALTER TABLE `daftar`
  ADD CONSTRAINT `FK_MEMILIH_JENIS_LOMBA` FOREIGN KEY (`ID_JENIS_LOMBA`) REFERENCES `jenis_lomba` (`ID_JENIS_LOMBA`),
  ADD CONSTRAINT `FK_MEMILIH_RAYON` FOREIGN KEY (`ID_RAYON`) REFERENCES `rayon` (`ID_RAYON`),
  ADD CONSTRAINT `FK_MEMVERIVIKASI` FOREIGN KEY (`ID_ADMIN`) REFERENCES `admin` (`ID_ADMIN`),
  ADD CONSTRAINT `FK_MENDAFTAR` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`);

--
-- Constraints for table `detail_daftar`
--
ALTER TABLE `detail_daftar`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_DAFTAR`) REFERENCES `daftar` (`ID_DAFTAR`),
  ADD CONSTRAINT `FK_MELAKUKAN2` FOREIGN KEY (`NISN`) REFERENCES `siswa` (`NISN`);

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `FK_MEMILIKI` FOREIGN KEY (`NPSN`) REFERENCES `sekolah` (`NPSN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
