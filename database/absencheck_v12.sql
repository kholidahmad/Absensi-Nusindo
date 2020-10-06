-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2020 pada 07.33
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

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
-- Struktur dari tabel `absensi_karyawan`
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
  `shift` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `absensi_karyawan`
--

INSERT INTO `absensi_karyawan` (`id`, `nik`, `hadir`, `datang_tepat`, `datang_terlambat`, `pulang_awal`, `pulang_tepat`, `pulang_terlambat`, `shift`) VALUES
(38, '333', 1, 0, 1, 0, 0, 0, 0),
(42, '222', 1, 0, 1, 1, 0, 0, 0),
(44, '111', 1, 0, 1, 0, 0, 0, 0),
(45, '444', 1, 0, 1, 0, 0, 0, 2),
(57, '555', 0, 0, 0, 0, 0, 0, 0),
(58, '666', 0, 0, 0, 0, 0, 0, 0),
(59, '777', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `alasan_karyawan`
--

CREATE TABLE `alasan_karyawan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alasan` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alasan_karyawan`
--

INSERT INTO `alasan_karyawan` (`id`, `nama`, `alasan`, `tanggal`) VALUES
(1, 'Muhammad Julfansa', 'Izin cuti mengikuti seminar di jakarta.', '08/04/2019'),
(2, 'Ilham Mantiqi', 'Medical Check Up', '15/09/2019'),
(3, 'Larasati Hartawan', 'Holiday', '15/09/2019'),
(4, 'Ilham Mantiqi', 'Sakit', '15/09/2019'),
(5, 'Robby Takdirillah', 'sakit', '21/10/2019'),
(6, 'Travis Barker', 'mencret', '22/04/2020'),
(7, 'Euis Gumelis', 'meteng', '25/04/2020'),
(8, 'Rama Rey', 'aaa', '30/04/2020'),
(9, 'Rama Rey', 'pergi', '30/04/2020'),
(10, 'Wahyu Wir', 'pergi jauhhh', '30/04/2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `backup_data_absen`
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
  `pulang_terlambat` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `backup_data_absen`
--

INSERT INTO `backup_data_absen` (`id`, `nik`, `periode`, `name`, `bagian`, `hadir`, `datang_tepat`, `datang_terlambat`, `pulang_awal`, `pulang_tepat`, `pulang_terlambat`) VALUES
(1, '333', '2020-04-27 02:10:43', 'Wahyu Wiryono', 'Trading Agro Consumer', 22, 20, 2, 1, 21, 0),
(2, '222', '2020-04-27 02:10:43', 'Napis Afwazn', 'Total Laboratorium Solution', 20, 20, 0, 0, 20, 0),
(3, '111', '2020-04-27 02:10:43', 'Kholid Ahmad', 'Pengembangan Teknologi Informasi', 20, 20, 0, 1, 19, 0),
(4, '444', '2020-04-27 02:10:43', 'Seno Suseno', 'Pengembangan Teknologi Informasi', 21, 20, 1, 0, 21, 0),
(5, '555', '2020-04-27 02:10:43', 'Abdul Mutolib', 'Pemeriksa Operasional', 22, 18, 4, 0, 20, 2),
(6, '666', '2020-04-27 02:10:43', 'Beenee Wahyudi', 'Keuangan', 22, 18, 4, 0, 20, 2),
(7, '777', '2020-04-27 02:10:43', 'Caca Marica hehe', 'Pemeriksa Operasional', 22, 18, 4, 0, 20, 2),
(57, '333', '2020-05-28 17:50:26', 'Wahyu Wiryono', 'Trading Agro Consumer', 20, 15, 5, 0, 20, 0),
(58, '222', '2020-05-28 17:50:26', 'Napis Afwazn', 'Total Laboratorium Solution', 20, 15, 5, 0, 20, 0),
(59, '111', '2020-05-28 17:50:26', 'Kholid Ahmad', 'Pengembangan Teknologi Informasi', 20, 15, 5, 0, 20, 0),
(60, '444', '2020-05-28 17:50:26', 'Seno Suseno', 'Pengembangan Teknologi Informasi', 20, 15, 5, 0, 20, 0),
(61, '555', '2020-05-28 17:50:26', 'Abdul Mutolib', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0),
(62, '666', '2020-05-28 17:50:26', 'Beenee Wahyudi', 'Keuangan', 20, 20, 0, 0, 20, 0),
(63, '777', '2020-05-28 17:50:26', 'Caca Marica hehe', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0),
(64, '333', '2020-06-29 14:05:45', 'Wahyu Wiryono', 'Trading Agro Consumer', 20, 20, 0, 0, 20, 0),
(65, '222', '2020-06-29 14:05:45', 'Napis Afwazn', 'Total Laboratorium Solution', 20, 20, 0, 0, 20, 0),
(66, '111', '2020-06-29 14:05:45', 'Kholid Ahmad', 'Pengembangan Teknologi Informasi', 20, 20, 0, 0, 20, 0),
(67, '444', '2020-06-29 14:05:45', 'Seno Suseno', 'Pengembangan Teknologi Informasi', 20, 20, 0, 0, 20, 0),
(68, '555', '2020-06-29 14:05:45', 'Abdul Mutolib', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0),
(69, '666', '2020-06-29 14:05:45', 'Beenee Wahyudi', 'Keuangan', 20, 20, 0, 0, 20, 0),
(70, '777', '2020-06-29 14:05:45', 'Caca Marica hehe', 'Pemeriksa Operasional', 20, 20, 0, 0, 20, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_karyawan`
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
-- Dumping data untuk tabel `data_karyawan`
--

INSERT INTO `data_karyawan` (`id`, `nik`, `name`, `cabang`, `divisi`, `bagian`, `email`, `handphone`, `tentang`, `image_name`) VALUES
(1, '123', 'admin', 'Kantor Pusat', 'Akuntansi', 'Komisaris', '', '', '', 'Capture4.JPG'),
(16, '111', 'Kholid Ahmad', 'Kantor Pusat', 'TEKNOLOGI INFORMASI', 'Pengembangan Teknologi Informasi', 'kholllidahmad@gmail.com', '081226204029', '																					Senior Web Developer ', 'k2.jpg'),
(17, '222', 'Napis Afwazn', 'Cabang Madya', 'E-COMMERCE', 'Total Laboratorium Solution', 'abdul@gmail.com', '0899999', 'iam a WEB DEVELOPPER', 'n21.png'),
(44, '333', 'Wahyu Wiryono', 'Cabang Utama', 'AGRO INDUSTRI', 'Trading Agro Consumer', 'wir@gmail.com', '08667576576', '																								                                                                                        Data Scientys of Universitas Muhammadiyah Surakarta  ', 'w2.png'),
(45, '444', 'Seno Suseno', 'Cabang Perintis', 'Akuntansi', 'Pengembangan Teknologi Informasi', 'sam@gamail.com', '0812121212', '                                                                                        																								                                                                                                                                    											', 's2.png'),
(83, '555', 'Abdul Mutolib', 'Cabang Perintis', 'DISTRIBUSI AGRO INDUSTRI & CONSUMER', 'Pemeriksa Operasional', '', '', '																																																																																																', 'default.png'),
(84, '666', 'Beenee Wahyudi', 'Kantor Pusat', 'DISTRIBUSI HC', 'Keuangan', '', '', '																																																', 'default.png'),
(85, '777', 'Caca Marica hehe', 'Cabang Perdana', 'AKUNTANSI & KEUANGAN \r\n', 'Pemeriksa Operasional', '', '', '																																																', 'output-onlinepngtools_(1)1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
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
-- Struktur dari tabel `hari_absen`
--

CREATE TABLE `hari_absen` (
  `id` int(11) NOT NULL,
  `hari` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `hari_absen`
--

INSERT INTO `hari_absen` (`id`, `hari`) VALUES
(0, 'Monday,Thuesday,Wednesday,Thursday,Friday');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_karyawan`
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
-- Dumping data untuk tabel `history_karyawan`
--

INSERT INTO `history_karyawan` (`id`, `nik`, `nama`, `info`, `hari`, `bulan`, `tahun`, `tanggal`, `jam`, `lokasi`, `status_absen`) VALUES
(1, '111', 'Kholid Ahmad', 'Absen Datang', 'Thursday', 'April', '2020', '25 April 2020', '11:40:36 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(2, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'April', '2020', '25 April 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(4, '111', 'Kholid Ahmad', 'Absen Datang', 'Thursday', 'April', '2020', '1 April 2020', '07:40:36 AM', '-7.150975 110.14025939999999', 'tepat waktu'),
(5, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'April', '2020', '1 April 2020', '17:00:07 PM', '-7.150975 110.14025939999999', 'tepat waktu'),
(6, '111', 'Kholid Ahmad', 'Absen Datang', 'Thursday', 'May', '2020', '25 May 2020', '11:40:36 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(7, '444', 'Seno Suseno', 'Absen Pulang', 'Thursday', 'May', '2020', '25 May 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'diluar waktu'),
(8, '444', 'Seno Suseno', 'Absen Datang', 'Thursday', 'May', '2020', '1 May 2020', '07:40:36 AM', '-7.150975 110.14025939999999', 'tepat waktu'),
(9, '444', 'Seno Suseno', 'Absen Pulang', 'Thursday', 'May', '2020', '1 May 2020', '17:00:07 PM', '-7.150975 110.14025939999999', 'tepat waktu'),
(10, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'May', '2020', '25 May 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'lebih awal'),
(11, '111', 'Kholid Ahmad', 'Absen Pulang', 'Thursday', 'May', '2020', '1 May 2020', '17:00:07 PM', '-7.150975 110.14025939999999', 'lebih awal'),
(12, '444', 'Seno Suseno', 'Absen Pulang', 'Thursday', 'May', '2020', '25 May 2020', '11:41:07 PM', '-7.150975 110.14025939999999', 'lebih awal'),
(16, '111', 'Kholid Ahmad', 'Absen Datang', 'Monday', 'June', '2020', '29 June 2020', '04:34:35 PM', '', 'diluar waktu'),
(17, '111', 'Kholid Ahmad', 'Absen Pulang', 'Monday', 'June', '2020', '29 June 2020', '04:35:10 PM', '-7.2432 112.7413', 'lebih awal'),
(18, '444', 'Seno Suseno', 'Absen Datang', 'Monday', 'June', '2020', '29 June 2020', '04:35:59 PM', '-7.2432 112.7413', 'diluar waktu'),
(19, '444', 'Seno Suseno', 'Absen Pulang', 'Monday', 'June', '2020', '29 June 2020', '04:36:03 PM', '-7.2432 112.7413', 'lebih awal'),
(20, '111', 'Kholid Ahmad', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:00:06 AM', '-7.2432 112.7413', 'diluar waktu'),
(21, '333', 'Wahyu Wiryono', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:00:35 AM', '-7.2432 112.7413', 'diluar waktu'),
(22, '444', 'Seno Suseno', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:01:12 AM', '-7.2432 112.7413', 'diluar waktu'),
(23, '222', 'Napis Afwazn', 'Absen Datang', 'Wednesday', 'July', '2020', '01 July 2020', '11:01:27 AM', '-7.2432 112.7413', 'diluar waktu'),
(24, '222', 'Napis Afwazn', 'Absen Pulang', 'Wednesday', 'July', '2020', '01 July 2020', '11:01:31 AM', '-7.2432 112.7413', 'lebih awal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_reset_user`
--

CREATE TABLE `history_reset_user` (
  `id` int(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `info` varchar(50) NOT NULL,
  `tgl_reset` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `history_reset_user`
--

INSERT INTO `history_reset_user` (`id`, `nik`, `nama`, `info`, `tgl_reset`) VALUES
(37, '123', 'admin', 'Reset', '2020-06'),
(39, '123', 'admin', 'Reset', '2020-06'),
(40, '123', 'admin', 'Reset', '2020-06'),
(41, '111', 'Kholid Ahmad', 'Reset', '2020-07'),
(42, '333', 'Wahyu Wiryono', 'Reset', '2020-07'),
(43, '444', 'Seno Suseno', 'Reset', '2020-07'),
(44, '222', 'Napis Afwazn', 'Reset', '2020-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `history_shift`
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
-- Struktur dari tabel `izin`
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
-- Dumping data untuk tabel `izin`
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
(72, 'fi2yngja', '555', '19Jun20', '22Jun20', '4', 'libur', 'liburan', 'bukti_checkup19.pdf', 'approved', 'belum'),
(73, 'qwo8hr4n', '666', '22Jun20', '26Jun20', '5', 'tahunan', 'Cuti Awal Tahun', 'bukti_checkup25.pdf', 'approved', 'belum'),
(74, 'vr4tq3at', '222', '19Jun20', '22Jun20', '4', 'sakit', 'Sakit demam', 'Report_Absensi.pdf', 'approved', 'selesai'),
(78, 'ozi74pw4', '777', '22Jun20', '23Jun20', '2', 'sakit', 'Sakit demam', 'absen.xlsx', 'approved', 'selesai'),
(82, 'v58tw3gt', '333', '25Jun20', '26Jun20', '2', 'sakit', 'Sakit Demam', 'Report_Absensi3.pdf', 'rejected', 'selesai'),
(86, '3pe3rvw0', '222', '25Jun20', '25Jun20', '1', 'sakit', 'Sakit Demam', 'bukti_checkup27.pdf', 'rejected', 'belum'),
(87, '76avnswr', '333', '25Jun20', '26Jun20', '2', 'sakit', 'Sakit Demam', '', 'rejected', 'selesai'),
(91, 'nhgh9t5r', '333', '25Jun20', '29Jun20', '5', 'sakit', 'Sakit Demam', 'bukti_checkup26.pdf', 'approved', 'selesai'),
(92, '9fqzv04x', '444', '25Jun20', '25Jun20', '1', 'sakit', 'Opname sakit tifus', 'bukti_checkup28.pdf', 'approved', 'selesai'),
(93, 'bx3s706s', '111', '26Jun20', '30Jun20', '5', 'sakit', 'Opname sakit tifus', 'bukti_checkup29.pdf', 'rejected', 'belum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `izin_karyawan`
--

CREATE TABLE `izin_karyawan` (
  `id_izin_kar` int(11) NOT NULL,
  `kode_izin` varchar(255) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `from_tgl` varchar(20) NOT NULL,
  `to_tgl` varchar(20) NOT NULL,
  `lama` int(20) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `keterangan_izin` text NOT NULL,
  `lampiran_izin` varchar(50) NOT NULL,
  `status_izin` varchar(20) NOT NULL,
  `sisa` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `izin_karyawan`
--

INSERT INTO `izin_karyawan` (`id_izin_kar`, `kode_izin`, `nik`, `from_tgl`, `to_tgl`, `lama`, `tipe`, `keterangan_izin`, `lampiran_izin`, `status_izin`, `sisa`) VALUES
(18, '5lh8nhv5', '444', '8Jun20', '12Jun20', 5, 'sakit', 'Sakit demam', 'bukti_checkup14.pdf', 'approved', 'selesai'),
(35, 't92ri621', '333', '14Jun20', '16Jun20', 3, 'tahunan', 'Libur ', '', 'approved', 'selesai'),
(36, 'xkq8fkow', '333', '18Jun20', '19Jun20', 2, 'libur', 'liburan', '', 'approved', 'selesai'),
(38, '9lfuw852', '222', '17Jun20', '17Jun20', 1, 'pribadi', 'Acara keluarga', '', 'approved', 'selesai'),
(39, 'vr7cv6vl', '222', '18Jun20', '18Jun20', 1, 'pribadi', 'Menjenguk nenek', '', 'approved', 'selesai'),
(41, 'lavph26w', '111', '17Jun20', '17Jun20', 1, 'sakit', 'Sakit Demam', '', 'approved', 'selesai'),
(42, 'vy7gnnnx', '111', '18Jun20', '18Jun20', 1, 'libur', 'liburan', '', 'approved', 'selesai'),
(43, 'nrtk04xc', '444', '18Jun20', '19Jun20', 2, 'sakit', 'sakit gigi', 'bukti_checkup16.pdf', 'approved', 'selesai'),
(44, 'fi2yngja', '555', '19Jun20', '22Jun20', 4, 'libur', 'liburan', 'bukti_checkup19.pdf', 'approved', 'belum'),
(45, 'qwo8hr4n', '666', '22Jun20', '26Jun20', 5, 'tahunan', 'Cuti Awal Tahun', 'bukti_checkup25.pdf', 'approved', 'belum'),
(46, 'vr4tq3at', '222', '19Jun20', '22Jun20', 4, 'sakit', 'Sakit demam', 'Report_Absensi.pdf', 'approved', 'selesai'),
(50, 'ozi74pw4', '777', '22Jun20', '23Jun20', 2, 'sakit', 'Sakit demam', 'absen.xlsx', 'approved', 'selesai'),
(52, 'smsephf4', '111', '25Jun20', '26Jun20', 2, 'sakit', 'Sakit Demam', 'Report_Absensi1.pdf', 'approved', 'belum'),
(57, 'qvnns6ts', '444', '25Jun20', '25Jun20', 1, 'sakit', 'Sakit Demam', 'bukti_checkup26.pdf', 'approved', 'selesai'),
(58, '3pe3rvw0', '222', '25Jun20', '25Jun20', 1, 'sakit', 'Sakit Demam', 'bukti_checkup27.pdf', 'on progress', 'belum'),
(59, '76avnswr', '333', '25Jun20', '26Jun20', 2, 'sakit', 'Sakit Demam', '', 'rejected', 'selesai'),
(60, 's517luys', '333', '29Jun20', '29Jun20', 1, 'sakit', 'Sakit Demam', '', 'on progress', 'selesai'),
(61, 'x8uf4hqn', '333', '25Jun20', '29Jun20', 5, 'sakit', 'Sakit Demam', 'bukti_checkup26.pdf', 'approved', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `master_bagian`
--

CREATE TABLE `master_bagian` (
  `id` int(11) NOT NULL,
  `nama_bagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_bagian`
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
-- Struktur dari tabel `master_cabang`
--

CREATE TABLE `master_cabang` (
  `id` int(11) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master_cabang`
--

INSERT INTO `master_cabang` (`id`, `nama_cabang`) VALUES
(1, 'Kantor Pusat'),
(2, 'Cabang Perintis'),
(3, 'Cabang Perdana'),
(4, 'Cabang Madya'),
(5, 'Cabang Utama');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_absensi`
--

CREATE TABLE `setting_absensi` (
  `id` int(11) NOT NULL,
  `mulai_absen` varchar(255) NOT NULL,
  `selesai_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting_absensi`
--

INSERT INTO `setting_absensi` (`id`, `mulai_absen`, `selesai_absen`) VALUES
(1, '06:00', '08:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting_pulang`
--

CREATE TABLE `setting_pulang` (
  `id` int(11) NOT NULL,
  `mulai_absen` varchar(255) NOT NULL,
  `selesai_absen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `setting_pulang`
--

INSERT INTO `setting_pulang` (`id`, `mulai_absen`, `selesai_absen`) VALUES
(1, '17:00', '18:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tgl_libur`
--

CREATE TABLE `tgl_libur` (
  `id` int(255) NOT NULL,
  `tgl` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tgl_libur`
--

INSERT INTO `tgl_libur` (`id`, `tgl`, `keterangan`) VALUES
(18, '17Aug20', 'Hari Kemerdekaan RI'),
(19, '25Mar20', 'Hari Raya Nyepi'),
(20, '1May20', 'Hari Buruh Nasional'),
(21, '26May20', 'Cuti Bersama'),
(22, '1Jun20', 'Hari Lahir Pancasila');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_karyawan`
--

CREATE TABLE `users_karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `usercode` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_karyawan`
--

INSERT INTO `users_karyawan` (`id`, `nik`, `usercode`, `password`, `level`) VALUES
(1, '123', '123', '123', 'admin'),
(16, '111', 'kholid', '123', 'Karyawan'),
(17, '222', 'napis', '123', 'Karyawan'),
(40, '333', 'Wahyu', '123', 'Karyawan'),
(41, '444', 'seno', '123', 'Karyawan'),
(53, '555', 'tolib', '123', 'Karyawan'),
(54, '666', 'b', '123', 'Karyawan'),
(55, '777', 'c', '123', 'Karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `alasan_karyawan`
--
ALTER TABLE `alasan_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `backup_data_absen`
--
ALTER TABLE `backup_data_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nik` (`nik`),
  ADD KEY `divisi` (`divisi`),
  ADD KEY `name` (`name`);

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_divisi` (`nama_divisi`);

--
-- Indeks untuk tabel `hari_absen`
--
ALTER TABLE `hari_absen`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history_karyawan`
--
ALTER TABLE `history_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `history_reset_user`
--
ALTER TABLE `history_reset_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `nama` (`nama`);

--
-- Indeks untuk tabel `history_shift`
--
ALTER TABLE `history_shift`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `izin`
--
ALTER TABLE `izin`
  ADD PRIMARY KEY (`id_izin`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `izin_karyawan`
--
ALTER TABLE `izin_karyawan`
  ADD PRIMARY KEY (`id_izin_kar`),
  ADD KEY `nik` (`nik`);

--
-- Indeks untuk tabel `master_bagian`
--
ALTER TABLE `master_bagian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `master_cabang`
--
ALTER TABLE `master_cabang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_absensi`
--
ALTER TABLE `setting_absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting_pulang`
--
ALTER TABLE `setting_pulang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tgl_libur`
--
ALTER TABLE `tgl_libur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users_karyawan`
--
ALTER TABLE `users_karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nik` (`nik`),
  ADD KEY `usercode` (`usercode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `alasan_karyawan`
--
ALTER TABLE `alasan_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `backup_data_absen`
--
ALTER TABLE `backup_data_absen`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT untuk tabel `data_karyawan`
--
ALTER TABLE `data_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `history_karyawan`
--
ALTER TABLE `history_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `history_reset_user`
--
ALTER TABLE `history_reset_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT untuk tabel `history_shift`
--
ALTER TABLE `history_shift`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `izin`
--
ALTER TABLE `izin`
  MODIFY `id_izin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `izin_karyawan`
--
ALTER TABLE `izin_karyawan`
  MODIFY `id_izin_kar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `master_bagian`
--
ALTER TABLE `master_bagian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `master_cabang`
--
ALTER TABLE `master_cabang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `setting_absensi`
--
ALTER TABLE `setting_absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `setting_pulang`
--
ALTER TABLE `setting_pulang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tgl_libur`
--
ALTER TABLE `tgl_libur`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `users_karyawan`
--
ALTER TABLE `users_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absensi_karyawan`
--
ALTER TABLE `absensi_karyawan`
  ADD CONSTRAINT `absensi_karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `history_reset_user`
--
ALTER TABLE `history_reset_user`
  ADD CONSTRAINT `history_reset_user_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_reset_user_ibfk_2` FOREIGN KEY (`nama`) REFERENCES `data_karyawan` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `izin`
--
ALTER TABLE `izin`
  ADD CONSTRAINT `izin_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `izin_karyawan`
--
ALTER TABLE `izin_karyawan`
  ADD CONSTRAINT `izin_karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users_karyawan`
--
ALTER TABLE `users_karyawan`
  ADD CONSTRAINT `users_karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
