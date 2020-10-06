-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2020 at 08:03 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absencheck`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi_karyawan`
--

CREATE TABLE `absensi_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `hadir` int(100) NOT NULL,
  `datang_tepat` int(100) NOT NULL,
  `datang_terlambat` int(100) NOT NULL,
  `pulang_awal` int(100) NOT NULL,
  `pulang_tepat` int(100) NOT NULL,
  `pulang_terlambat` int(100) NOT NULL,
  `tidak_hadir` int(100) NOT NULL,
  `shift` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi_karyawan`
--

INSERT INTO `absensi_karyawan` (`id`, `nik`, `hadir`, `datang_tepat`, `datang_terlambat`, `pulang_awal`, `pulang_tepat`, `pulang_terlambat`, `tidak_hadir`, `shift`) VALUES
(38, '333', 0, 0, 0, 0, 0, 0, 0, 0),
(42, '222', 0, 0, 0, 0, 0, 0, 0, 0),
(44, '111', 0, 0, 0, 0, 0, 0, 0, 0),
(45, '444', 0, 0, 0, 0, 0, 0, 0, 2),
(57, '555', 0, 0, 0, 0, 0, 0, 1, 0),
(58, '666', 0, 0, 0, 0, 0, 0, 0, 0),
(59, '777', 0, 0, 0, 0, 0, 0, 0, 0),
(64, '1001', 0, 0, 0, 0, 0, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `backup_data_absen`
--

CREATE TABLE `backup_data_absen` (
  `id` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `periode` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(200) NOT NULL,
  `bagian` varchar(100) NOT NULL,
  `hadir` int(50) NOT NULL,
  `datang_tepat` int(50) NOT NULL,
  `datang_terlambat` int(50) NOT NULL,
  `pulang_awal` int(50) NOT NULL,
  `pulang_tepat` int(50) NOT NULL,
  `pulang_terlambat` int(50) NOT NULL,
  `tidak_hadir` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `backup_data_absen`
--

INSERT INTO `backup_data_absen` (`id`, `nik`, `periode`, `name`, `bagian`, `hadir`, `datang_tepat`, `datang_terlambat`, `pulang_awal`, `pulang_tepat`, `pulang_terlambat`, `tidak_hadir`) VALUES
(1, '333', '2020-04-27 02:10:43', 'Wahyu Wiryono', 'Trading Agro Consumer', 22, 20, 2, 1, 21, 0, 0),
(2, '222', '2020-04-27 02:10:43', 'Napis Afwazn', 'Total Laboratorium Solution', 20, 20, 0, 0, 20, 0, 0),
(3, '111', '2020-04-27 02:10:43', 'Kholid Ahmad', 'Pengembangan Teknologi Informasi', 20, 20, 0, 1, 19, 0, 0),
(4, '444', '2020-04-27 02:10:43', 'Seno Suseno', 'Pengembangan Teknologi Informasi', 21, 20, 1, 0, 21, 0, 0),
(5, '555', '2020-04-27 02:10:43', 'Abdul Mutolib', 'Pemeriksa Operasional', 22, 18, 4, 0, 20, 2, 0),
(6, '666', '2020-04-27 02:10:43', 'Beenee Wahyudi', 'Keuangan', 22, 18, 4, 0, 20, 2, 0),
(7, '777', '2020-04-27 02:10:43', 'Caca Marica hehe', 'Pemeriksa Operasional', 22, 18, 4, 0, 20, 2, 0),
(57, '333', '2020-05-28 17:50:26', 'Wahyu Wiryono', 'Trading Agro Consumer', 20, 15, 5, 0, 20, 0, 0),
(58, '222', '2020-05-28 17:50:26', 'Napis Afwazn', 'Total Laboratorium Solution', 20, 15, 5, 0, 20, 0, 0),
(59, '111', '2020-05-28 17:50:26', 'Kholid Ahmad', 'Pengembangan Teknologi Informasi', 20, 15, 5, 0, 20, 0, 0),
(60, '444', '2020-05-28 17:50:26', 'Seno Suseno', 'Pengembangan Teknologi Informasi', 20, 15, 5, 0, 20, 0, 0),
(61, '555', '2020-05-28 17:50:26', 'Abdul Mutolib', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0, 0),
(62, '666', '2020-05-28 17:50:26', 'Beenee Wahyudi', 'Keuangan', 20, 20, 0, 0, 20, 0, 0),
(63, '777', '2020-05-28 17:50:26', 'Caca Marica hehe', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0, 0),
(64, '333', '2020-06-29 14:05:45', 'Wahyu Wiryono', 'Trading Agro Consumer', 20, 20, 0, 0, 20, 0, 0),
(65, '222', '2020-06-29 14:05:45', 'Napis Afwazn', 'Total Laboratorium Solution', 20, 20, 0, 0, 20, 0, 0),
(66, '111', '2020-06-29 14:05:45', 'Kholid Ahmad', 'Pengembangan Teknologi Informasi', 20, 20, 0, 0, 20, 0, 0),
(67, '444', '2020-06-29 14:05:45', 'Seno Suseno', 'Pengembangan Teknologi Informasi', 20, 20, 0, 0, 20, 0, 0),
(68, '555', '2020-06-29 14:05:45', 'Abdul Mutolib', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0, 0),
(69, '666', '2020-06-29 14:05:45', 'Beenee Wahyudi', 'Keuangan', 20, 20, 0, 0, 20, 0, 0),
(70, '777', '2020-06-29 14:05:45', 'Caca Marica hehe', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0, 0),
(71, '333', '2020-07-01 21:49:09', 'Wahyu Wiryono', 'Trading Agro Consumer', 18, 17, 1, 0, 18, 0, 0),
(72, '222', '2020-07-01 21:49:09', 'Napis Afwazn', 'Total Laboratorium Solution', 17, 16, 1, 1, 16, 0, 0),
(73, '111', '2020-07-01 21:49:09', 'Kholid Ahmad', 'Pengembangan Teknologi Informasi', 22, 21, 1, 0, 22, 0, 0),
(74, '444', '2020-07-01 21:49:09', 'Seno Suseno', 'Pengembangan Teknologi Informasi', 15, 14, 1, 0, 15, 0, 0),
(75, '555', '2020-07-01 21:49:09', 'Abdul Mutolib', 'Pemeriksa Operasional', 15, 14, 1, 0, 15, 0, 0),
(76, '666', '2020-07-01 21:49:09', 'Beenee Wahyudi', 'Keuangan', 20, 19, 1, 0, 20, 0, 0),
(77, '777', '2020-07-01 21:49:09', 'Caca Marica hehe', 'Pemeriksa Operasional', 15, 14, 1, 0, 15, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_karyawan`
--

CREATE TABLE `data_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `cabang` varchar(255) NOT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `bagian` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `handphone` varchar(255) NOT NULL,
  `tentang` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nik`, `name`, `cabang`, `divisi`, `bagian`, `email`, `handphone`, `tentang`, `image_name`) VALUES
(1, '3324121307980001', 'admin', '', '', '', 'admin@gmail.com', '081226204029', '', 'khld11.PNG'),
(16, '111', 'Kholid Ahmad', 'Kantor Pusat', 'TEKNOLOGI INFORMASI', 'Pengembangan Teknologi Informasi', 'kholllidahmad@gmail.com', '081226204029', '																					Senior Web Developer ', 'k2.jpg'),
(17, '222', 'Napis Afwazn', 'Cabang Madya', 'E-COMMERCE', 'Total Laboratorium Solution', 'napisa@gmail.com', '0899999', 'iam a WEB DEVELOPPER', 'n21.png'),
(44, '333', 'Wahyu Wiryono', 'Cabang Utama', 'AGRO INDUSTRI', 'Trading Agro Consumer', 'wir@gmail.com', '08667576576', 'b', 'w2.png'),
(45, '444', 'Senooooo', 'Cabang Perintis', 'Akuntansi', 'Pengembangan Teknologi Informasi', 'sam@gamail.com', '0812121212', '                                                                                                                                                                                                                      																								                 ', 's2.png'),
(83, '555', 'Abdul Mutolib', 'Cabang Perintis', 'SEKRETARIS KORPORASI', 'Pemeriksa Operasional', '', '', '																																																																																																																					', 'default.png'),
(84, '666', 'Beenee Wahyudi', 'Kantor Pusat', 'DISTRIBUSI HC', 'Keuangan', '', '', '																																																', '2.jpg'),
(85, '777', 'Mar', 'Cabang Perdana', 'AKUNTANSI & KEUANGAN \r\n', 'Pemeriksa Operasional', '', '', '                                                                                                                                                                                                                                                               ', '3.jpg'),
(90, '1001', 'Ahmad Ronaldo', 'Kantor Pusat', 'AGRO INDUSTRI', 'Akuntansi', '', '', '', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama_divisi`) VALUES
(18, 'AGRO INDUSTRI'),
(1, 'Akuntansi'),
(12, 'AKUNTANSI & KEUANGAN \r\n'),
(8, 'Direksi'),
(19, 'DISTRIBUSI AGRO INDUSTRI & CONSUMER'),
(16, 'DISTRIBUSI HC'),
(20, 'E-COMMERCE'),
(7, 'Komisaris'),
(6, 'Marketing HC'),
(11, 'PENGEMBANGAN \r\n'),
(14, 'PENGEMBANGAN SDM'),
(15, 'PERSONALIA & UMUM'),
(2, 'SDM'),
(10, 'SEKRETARIS KORPORASI'),
(9, 'SPI'),
(13, 'TEKNOLOGI INFORMASI'),
(21, 'TOTAL LABORATORIUM SOLUTION'),
(17, 'TRADING AGRO CONSUMER');

-- --------------------------------------------------------

--
-- Table structure for table `hari_absen`
--

CREATE TABLE `hari_absen` (
  `id` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari_absen`
--

INSERT INTO `hari_absen` (`id`, `hari`) VALUES
(0, 'Monday,Thuesday,Wednesday,Thursday,Friday');

-- --------------------------------------------------------

--
-- Table structure for table `history_karyawan`
--

CREATE TABLE `history_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `info` varchar(255) NOT NULL,
  `hari` varchar(255) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `lokasi` varchar(200) NOT NULL,
  `status_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_karyawan`
--

INSERT INTO `history_karyawan` (`id`, `nik`, `nama`, `info`, `hari`, `bulan`, `tahun`, `tanggal`, `jam`, `lokasi`, `status_absen`) VALUES
(1, '111', 'Kholid Ahmad', 'Absen Datang', 'Thursday', 'April', '2020', '25 April 2020', '11:40:36 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(2, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'April', '2020', '25 April 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(4, '111', 'Kholid Ahmad', 'Absen Datang', 'Thursday', 'April', '2020', '1 April 2020', '07:40:36 AM', '-7.150975 110.14025939999999', 'tepat waktu'),
(5, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'April', '2020', '1 April 2020', '17:00:07 PM', '-7.150975 110.14025939999999', 'tepat waktu'),
(6, '111', 'Kholid Ahmad', 'Absen Datang', 'Thursday', 'May', '2020', '25 May 2020', '11:40:36 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(7, '444', 'Senooooo', 'Absen Pulang', 'Thursday', 'May', '2020', '25 May 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(8, '444', 'Senooooo', 'Absen Datang', 'Thursday', 'May', '2020', '1 May 2020', '07:40:36 AM', '-7.150975 110.14025939999999', 'tepat waktu'),
(9, '444', 'Senooooo', 'Absen Pulang', 'Thursday', 'May', '2020', '1 May 2020', '17:00:07 PM', '-7.150975 110.14025939999999', 'tepat waktu'),
(10, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'May', '2020', '25 May 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'lebih awal'),
(11, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'May', '2020', '1 May 2020', '17:00:07 PM', '-7.150975 110.14025939999999', 'lebih awal'),
(12, '444', 'Senooooo', 'Absen Pulang', 'Thursday', 'May', '2020', '25 May 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'lebih awal'),
(16, '111', 'Kholid Ahmad', 'Absen Datang', 'Monday', 'June', '2020', '29 June 2020', '04:34:35 PM', '', 'diluar waktu'),
(17, '111', 'Kholid Ahmad', 'Absen Pulang', 'Monday', 'June', '2020', '29 June 2020', '04:35:10 PM', '-7.2432 112.7413', 'lebih awal'),
(18, '444', 'Senooooo', 'Absen Datang', 'Monday', 'June', '2020', '29 June 2020', '04:35:59 PM', '-7.2432 112.7413', 'diluar waktu'),
(19, '444', 'Senooooo', 'Absen Pulang', 'Monday', 'June', '2020', '29 June 2020', '04:36:03 PM', '-7.2432 112.7413', 'lebih awal'),
(20, '111', 'Kholid Ahmad', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:00:06 AM', '-7.2432 112.7413', 'diluar waktu'),
(21, '333', 'Wahyu Wiryono', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:00:35 AM', '-7.2432 112.7413', 'diluar waktu'),
(22, '444', 'Senooooo', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:01:12 AM', '-7.2432 112.7413', 'diluar waktu'),
(23, '222', 'Napis Afwazn', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:01:27 AM', '-7.2432 112.7413', 'diluar waktu'),
(24, '222', 'Napis Afwazn', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '11:01:31 AM', '-7.2432 112.7413', 'lebih awal'),
(25, '555', 'Abdul Mutolib', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '12:36:41 PM', '-7.5360639 112.2384017', 'diluar waktu'),
(26, '666', 'Beenee Wahyudi', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '12:37:23 PM', '-7.5360639 112.2384017', 'diluar waktu'),
(27, '111', 'Kholid Ahmad', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '05:04:05 PM', '-7.2432 112.7413', 'tepat waktu'),
(28, '333', 'Wahyu Wiryono', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '05:04:26 PM', '-7.2432 112.7413', 'tepat waktu'),
(29, '444', 'Senooooo', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '05:04:45 PM', '-7.2432 112.7413', 'tepat waktu'),
(30, '999', 'Senooooo', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '05:05:29 PM', '-7.2432 112.7413', 'diluar waktu'),
(31, '999', 'Senooooo', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '05:05:33 PM', '-7.2432 112.7413', 'tepat waktu'),
(32, '555', 'Abdul Mutolib', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '05:06:03 PM', '-7.2432 112.7413', 'tepat waktu'),
(33, '666', 'Beenee Wahyudi', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '05:06:55 PM', '-7.2432 112.7413', 'tepat waktu'),
(34, '111', 'Kholid Ahmad', 'Absen Datang', 'Thursday', 'July', '2020', '02 July 2020', '07:54:09 AM', '-7.2432 112.7413', 'tepat waktu'),
(35, '222', 'Napis Afwazn', 'Absen Datang', 'Thursday', 'July', '2020', '02 July 2020', '07:57:40 AM', '', 'tepat waktu'),
(36, '444', 'Senooooo', 'Absen Datang', 'Thursday', 'July', '2020', '02 July 2020', '07:58:06 AM', '', 'tepat waktu'),
(37, '333', 'Wahyu Wiryono', 'Absen Datang', 'Thursday', 'July', '2020', '02 July 2020', '07:58:36 AM', '-7.2432 112.7413', 'tepat waktu'),
(38, '999', 'Senooooo', 'Absen Datang', 'Thursday', 'July', '2020', '02 July 2020', '07:59:17 AM', '-7.2432 112.7413', 'tepat waktu'),
(39, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'July', '2020', '02 July 2020', '05:45:19 PM', '-7.5360639 112.2384017', 'tepat waktu'),
(40, '222', 'Napis Afwazn', 'Absen Pulang', 'Thursday', 'July', '2020', '02 July 2020', '05:45:41 PM', '-7.5360639 112.2384017', 'tepat waktu'),
(41, '333', 'Wahyu Wiryono', 'Absen Pulang', 'Thursday', 'July', '2020', '02 July 2020', '05:45:52 PM', '-7.5360639 112.2384017', 'tepat waktu'),
(42, '444', 'Senooooo', 'Absen Pulang', 'Thursday', 'July', '2020', '02 July 2020', '05:46:07 PM', '-7.5360639 112.2384017', 'tepat waktu'),
(43, '999', 'Senooooo', 'Absen Pulang', 'Thursday', 'July', '2020', '02 July 2020', '05:46:49 PM', '', 'tepat waktu'),
(44, '333', 'Wahyu Wiryono', 'Tidak Hadir', 'Saturday', 'July', '2020', '04 July 2020', '09:21:16 AM', '', ''),
(45, '333', 'Wahyu Wiryono', 'Tidak Hadir', 'Saturday', 'July', '2020', '04 July 2020', '09:25:47 AM', '', ''),
(46, '333', 'Wahyu Wiryono', 'Tidak Hadir', 'Saturday', 'July', '2020', '04 July 2020', '09:26:07 AM', '', ''),
(47, '666', 'Beenee Wahyudi', 'Tidak Hadir', 'Saturday', 'July', '2020', '04 July 2020', '09:27:47 AM', '', ''),
(48, '555', 'Abdul Mutolib', 'Tidak Hadir', 'Saturday', 'July', '2020', '04 July 2020', '11:47:47 PM', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `history_reset_user`
--

CREATE TABLE `history_reset_user` (
  `id` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `info` varchar(50) NOT NULL,
  `tgl_reset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_reset_user`
--

INSERT INTO `history_reset_user` (`id`, `nik`, `nama`, `info`, `tgl_reset`) VALUES
(37, '3324121307980001', 'admin', 'Reset', '2020-06'),
(39, '3324121307980001', 'admin', 'Reset', '2020-06'),
(40, '3324121307980001', 'admin', 'Reset', '2020-06'),
(41, '111', 'Kholid Ahmad', 'Reset', '2020-07'),
(42, '333', 'Wahyu Wiryono', 'Reset', '2020-07'),
(43, '444', 'Senooooo', 'Reset', '2020-07'),
(44, '222', 'Napis Afwazn', 'Reset', '2020-07'),
(45, '555', 'Abdul Mutolib', 'Reset', '2020-07'),
(46, '666', 'Beenee Wahyudi', 'Reset', '2020-07'),
(47, '777', 'Mar', 'Reset', '2020-07'),
(48, '3324121307980001', 'admin', 'Reset', '2020-07'),
(49, '3324121307980001', 'admin', 'Reset', '2020-07');

-- --------------------------------------------------------

--
-- Table structure for table `history_shift`
--

CREATE TABLE `history_shift` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `info_shift` varchar(50) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `izin`
--

CREATE TABLE `izin` (
  `id_izin` int(11) NOT NULL,
  `kode_izin` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `from_tgl` varchar(20) NOT NULL,
  `to_tgl` varchar(255) NOT NULL,
  `lama` varchar(255) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `keterangan_izin` text NOT NULL,
  `lampiran_izin` varchar(50) NOT NULL,
  `status_izin` varchar(20) NOT NULL,
  `sisa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `izin`
--

INSERT INTO `izin` (`id_izin`, `kode_izin`, `nik`, `from_tgl`, `to_tgl`, `lama`, `tipe`, `keterangan_izin`, `lampiran_izin`, `status_izin`, `sisa`) VALUES
(48, '5lh8nhv5', '444', '8Jun20', '12Jun20', '5', 'sakit', 'Sakit demam', 'bukti_checkup14.pdf', 'approved', 'selesai'),
(63, 't92ri621', '333', '14Jun20', '16Jun20', '3', 'tahunan', 'Libur ', '', 'approved', 'selesai'),
(64, 'xkq8fkow', '333', '18Jun20', '19Jun20', '2', 'libur', 'liburan', '', 'approved', 'selesai'),
(66, '9lfuw852', '222', '17Jun20', '', '1', 'pribadi', 'Acara keluarga', '', 'approved', 'selesai'),
(67, 'vr7cv6vl', '222', '18Jun20', '18Jun20', '1', 'pribadi', 'Menjenguk nenek', '', 'approved', 'selesai'),
(69, 'lavph26w', '111', '17Jun20', '17Jun20', '1', 'sakit', 'Sakit Demam', '', 'approved', 'selesai'),
(70, 'vy7gnnnx', '111', '18Jun20', '18Jun20', '1', 'libur', 'liburan', '', 'approved', 'selesai'),
(71, 'nrtk04xc', '444', '18Jun20', '19Jun20', '2', 'sakit', 'sakit gigi', 'bukti_checkup16.pdf', 'approved', 'selesai'),
(72, 'fi2yngja', '555', '19Jun20', '22Jun20', '4', 'libur', 'liburan', 'bukti_checkup19.pdf', 'approved', 'selesai'),
(73, 'qwo8hr4n', '666', '22Jun20', '26Jun20', '5', 'tahunan', 'Cuti Awal Tahun', 'bukti_checkup25.pdf', 'approved', 'selesai'),
(74, 'vr4tq3at', '222', '19Jun20', '22Jun20', '4', 'sakit', 'Sakit demam', 'Report_Absensi.pdf', 'approved', 'selesai'),
(78, 'ozi74pw4', '777', '22Jun20', '23Jun20', '2', 'sakit', 'Sakit demam', 'absen.xlsx', 'approved', 'selesai'),
(82, 'v58tw3gt', '333', '25Jun20', '26Jun20', '2', 'sakit', 'Sakit Demam', 'Report_Absensi3.pdf', 'rejected', 'selesai'),
(86, '3pe3rvw0', '222', '25Jun20', '25Jun20', '1', 'sakit', 'Sakit Demam', 'bukti_checkup27.pdf', 'rejected', 'belum'),
(87, '76avnswr', '333', '25Jun20', '26Jun20', '2', 'sakit', 'Sakit Demam', '', 'rejected', 'selesai'),
(91, 'nhgh9t5r', '333', '25Jun20', '29Jun20', '5', 'sakit', 'Sakit Demam', 'bukti_checkup26.pdf', 'approved', 'selesai'),
(92, '9fqzv04x', '444', '25Jun20', '25Jun20', '1', 'sakit', 'Opname sakit tifus', 'bukti_checkup28.pdf', 'approved', 'selesai'),
(93, 'bx3s706s', '111', '26Jun20', '30Jun20', '5', 'sakit', 'Opname sakit tifus', 'bukti_checkup29.pdf', 'rejected', 'belum'),
(94, 'vbqjyesn', '111', '6Jul20', '7Jul20', '2', 'pribadi', 'Acara hajatan', 'bukti_checkup30.pdf', 'approved', 'belum'),
(96, 'lvqhl72s', '222', '6Jul20', '8Jul20', '3', 'pribadi', 'acara keluarga', '', 'approved', 'belum'),
(97, 'jziq9ecp', '444', '8Jul20', '9Jul20', '2', 'tahunan', 'Liburan', 'bukti_checkup31.pdf', 'rejected', 'belum'),
(98, '3xb0spd9', '333', '6Jul20', '6Jul20', '1', 'sakit', 'Opname sakit tifus', 'bukti_checkup32.pdf', 'approved', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `master_bagian`
--

CREATE TABLE `master_bagian` (
  `id` int(11) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_bagian`
--

INSERT INTO `master_bagian` (`id`, `nama_bagian`) VALUES
(1, 'Komisaris'),
(2, 'Direksi'),
(3, 'Pemeriksa Operasional'),
(4, 'Pemeriksa Non Operasional'),
(5, 'BOD SUPPORT'),
(6, 'Sekertaris Koporasi'),
(7, 'Legal & GCG'),
(8, 'Pengembangan Bisnis'),
(9, 'Akuntansi & Keuangan'),
(10, 'Perpajakan'),
(11, 'Akuntansi'),
(12, 'Keuangan'),
(13, 'Pengembangan Teknologi Informasi'),
(14, 'Teknologi Informasi'),
(15, 'Pengelolaan Data'),
(16, 'Pengembangan Kompetensi'),
(17, 'Personalia'),
(18, 'Personalia & Umum'),
(19, 'Umum & Aset'),
(20, 'Marketing HC'),
(21, 'Health Care'),
(22, 'Teknisi'),
(23, 'Medical Equipment'),
(24, 'Medical Dispossible'),
(25, 'Institusi'),
(26, 'LAB.Diagnostik'),
(27, 'Distribusi HC'),
(28, 'Logistik HC'),
(29, 'E-Catalog'),
(30, 'Trading Agro Consumer'),
(31, 'Trading Agro Bisnis'),
(32, 'Trading Agro Consumer'),
(33, 'Project'),
(34, 'Trading Perkebunan'),
(35, 'Distribusi Food'),
(36, 'Distribusi Non Food'),
(37, 'E-Commerce'),
(38, 'Total Laboratorium Solution');

-- --------------------------------------------------------

--
-- Table structure for table `master_cabang`
--

CREATE TABLE `master_cabang` (
  `id` int(11) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_cabang`
--

INSERT INTO `master_cabang` (`id`, `nama_cabang`) VALUES
(1, 'Kantor Pusat'),
(2, 'Cabang Perintis'),
(3, 'Cabang Perdana'),
(4, 'Cabang Madya'),
(5, 'Cabang Utama');

-- --------------------------------------------------------

--
-- Table structure for table `setting_absensi`
--

CREATE TABLE `setting_absensi` (
  `id` int(11) NOT NULL,
  `mulai_absen` varchar(255) NOT NULL,
  `selesai_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_absensi`
--

INSERT INTO `setting_absensi` (`id`, `mulai_absen`, `selesai_absen`) VALUES
(1, '06:00', '08:00');

-- --------------------------------------------------------

--
-- Table structure for table `setting_pulang`
--

CREATE TABLE `setting_pulang` (
  `id` int(11) NOT NULL,
  `mulai_absen` varchar(255) NOT NULL,
  `selesai_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_pulang`
--

INSERT INTO `setting_pulang` (`id`, `mulai_absen`, `selesai_absen`) VALUES
(1, '17:00', '18:00');

-- --------------------------------------------------------

--
-- Table structure for table `tgl_libur`
--

CREATE TABLE `tgl_libur` (
  `id` int(255) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgl_libur`
--

INSERT INTO `tgl_libur` (`id`, `tgl`, `keterangan`) VALUES
(18, '17Aug20', 'Hari Kemerdekaan RI'),
(19, '25Mar20', 'Hari Raya Nyepi'),
(20, '1May20', 'Hari Buruh Nasional');

-- --------------------------------------------------------

--
-- Table structure for table `users_karyawan`
--

CREATE TABLE `users_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `usercode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_karyawan`
--

INSERT INTO `users_karyawan` (`id`, `nik`, `usercode`, `password`, `level`) VALUES
(1, '3324121307980001', 'admin', '123', 'admin'),
(16, '111', 'kholid', '123', 'Karyawan'),
(17, '222', 'napis', '123', 'Karyawan'),
(40, '333', 'Wahyu', '123', 'Karyawan'),
(41, '444', 'seno', '123', 'Karyawan'),
(53, '555', 'tolib', '123', 'Karyawan'),
(54, '666', 'b', '123', 'Karyawan'),
(55, '777', 'mardiyah', '123', 'Karyawan'),
(60, '1001', 'u_ic2yxt3i', '202cb962ac59075b964b07152d234b70', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `backup_data_absen`
--
ALTER TABLE `backup_data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_divisi` (`nama_divisi`);

--
-- Indexes for table `hari_absen`
--
ALTER TABLE `hari_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_karyawan`
--
ALTER TABLE `history_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `history_reset_user`
--
ALTER TABLE `history_reset_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `nama` (`nama`);

--
-- Indexes for table `history_shift`
--
ALTER TABLE `history_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `nik` (`nik`);

--
-- Indexes for table `master_bagian`
--
ALTER TABLE `master_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `master_cabang`
--
ALTER TABLE `master_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_absensi`
--
ALTER TABLE `setting_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_pulang`
--
ALTER TABLE `setting_pulang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tgl_libur`
--
ALTER TABLE `tgl_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_karyawan`
--
ALTER TABLE `users_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `usercode` (`usercode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `backup_data_absen`
--
ALTER TABLE `backup_data_absen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `history_karyawan`
--
ALTER TABLE `history_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `history_reset_user`
--
ALTER TABLE `history_reset_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `history_shift`
--
ALTER TABLE `history_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `master_bagian`
--
ALTER TABLE `master_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `master_cabang`
--
ALTER TABLE `master_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `setting_absensi`
--
ALTER TABLE `setting_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setting_pulang`
--
ALTER TABLE `setting_pulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tgl_libur`
--
ALTER TABLE `tgl_libur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_karyawan`
--
ALTER TABLE `users_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD CONSTRAINT `absensi_karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history_reset_user`
--
ALTER TABLE `history_reset_user`
  ADD CONSTRAINT `history_reset_user_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_reset_user_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `data_karyawan` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_karyawan`
--
ALTER TABLE `users_karyawan`
  ADD CONSTRAINT `users_karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
