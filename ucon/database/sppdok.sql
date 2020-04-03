-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2020 at 09:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sppd`
--

-- --------------------------------------------------------

--
-- Table structure for table `akses`
--

CREATE TABLE `akses` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akses`
--

INSERT INTO `akses` (`id`, `name`) VALUES
(1, 'Pejabat'),
(2, 'Bendahara'),
(3, 'Kepala Bagian  Bina ');

-- --------------------------------------------------------

--
-- Table structure for table `angkutan`
--

CREATE TABLE `angkutan` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `jenis_sppd_id` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `angkutan`
--

INSERT INTO `angkutan` (`id`, `name`, `jenis_sppd_id`) VALUES
(1, 'Kendaraan Roda 4 (Mobil)/Pesawat Terbang/Kendaraan Roda 4 (Mobil)', NULL),
(2, 'Kendaraan Roda 4 (Mobil)/Kapal Laut/Kendaraan Roda 4 (Mobil)', NULL),
(3, 'Kendaraan Roda 4 (Bus)', NULL),
(4, 'Kendaraan Roda 4 (Mobil)', NULL),
(5, 'Kendaraan Roda 2 (Motor)', NULL),
(6, 'Kreta', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `kopsurat` varchar(225) DEFAULT NULL,
  `kopsurat2` varchar(255) DEFAULT NULL,
  `lokasi` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `name`, `kopsurat`, `kopsurat2`, `lokasi`) VALUES
(1, 'Unit di Lingkungan Asda III', 'PEMERINTAH KABUPATEN SERANG', 'SEKRETARIAT DAERAH', 'Jl. Veteran No. 1 Telp. (0254) 200953 - 200252 - 200737 Fax. (0254) 201952 Serang - Banten'),
(2, 'Tata Usaha dan Protokol', 'PEMERINTAH KABUPATEN SERANG', 'SEKRETARIAT DAERAH', 'Jl. Veteran No. 1 Telp. (0254) 200953 - 200252 - 200737 Fax. (0254) 201952 Serang - Banten'),
(3, 'Keuangan', 'PEMERINTAH KABUPATEN SERANG', 'SEKRETARIAT DAERAH', 'Jl. Veteran No. 1 Telp. (0254) 200953 - 200252 - 200737 Fax. (0254) 201952 Serang - Banten');

-- --------------------------------------------------------

--
-- Table structure for table `detail_surat_tugas`
--

CREATE TABLE `detail_surat_tugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `surat_tugas_id` int(10) DEFAULT NULL,
  `pegawai_id` int(10) DEFAULT NULL,
  `transportasi` bigint(20) DEFAULT NULL,
  `uang_harian` bigint(20) DEFAULT NULL,
  `uang_representasi` bigint(20) DEFAULT NULL,
  `uang_penginapan` bigint(20) DEFAULT NULL,
  `urut` int(5) DEFAULT NULL,
  `hasil` text DEFAULT NULL,
  `rencana` text DEFAULT NULL,
  `nomor_tiket` varchar(100) DEFAULT NULL,
  `harga_berangkat` bigint(20) DEFAULT NULL,
  `harga_kembali` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_surat_tugas`
--

INSERT INTO `detail_surat_tugas` (`id`, `surat_tugas_id`, `pegawai_id`, `transportasi`, `uang_harian`, `uang_representasi`, `uang_penginapan`, `urut`, `hasil`, `rencana`, `nomor_tiket`, `harga_berangkat`, `harga_kembali`) VALUES
(9, 245, 80, 600000, 700000, 500000, 500000, 0, NULL, NULL, 'dddd', 1000000, 1000000),
(10, 245, 79, 1000000, 1000000, 1000000, 1000000, 1, NULL, NULL, 'sssss', 1000000, 1000000),
(11, 246, 80, 500000, 500000, 500000, 500000, 0, NULL, NULL, NULL, NULL, NULL),
(12, 246, 79, 1000000, 1000000, 1000000, 1000000, 1, NULL, NULL, NULL, NULL, NULL),
(13, 246, 83, 10000, 10000, 10000, 500000, 2, NULL, NULL, NULL, NULL, NULL),
(17, 245, 78, 200000, 200000, 200000, 200000, 2, NULL, NULL, 'dddddd', 2000000, 2000000),
(18, 247, 80, 100000, 500000, 500000, 600000, 0, NULL, NULL, 'ssss', 1000000, 1000000),
(19, 247, 79, 1000000, 1000000, 1000000, 1000000, 1, NULL, NULL, 'cccc', 20000000, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `domlak`
--

CREATE TABLE `domlak` (
  `id` int(10) UNSIGNED NOT NULL,
  `jenis_sppd_id` int(10) DEFAULT NULL,
  `golongan_id` int(10) DEFAULT NULL,
  `angkutan_id` int(5) DEFAULT NULL,
  `transportasi` bigint(20) DEFAULT NULL,
  `uang_harian` bigint(20) DEFAULT NULL,
  `uang_reresentasi` bigint(20) DEFAULT NULL,
  `uang_penginapan` bigint(20) DEFAULT NULL,
  `tujuan_sppd_id` int(10) DEFAULT NULL,
  `uang_representasi` bigint(20) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `domlak`
--

INSERT INTO `domlak` (`id`, `jenis_sppd_id`, `golongan_id`, `angkutan_id`, `transportasi`, `uang_harian`, `uang_reresentasi`, `uang_penginapan`, `tujuan_sppd_id`, `uang_representasi`, `role_id`) VALUES
(1, 1, 28, 4, 500000, 500000, NULL, 500000, 3601, 500000, NULL),
(2, 1, 29, 4, 1000000, 1000000, NULL, 1000000, 3601, 1000000, NULL),
(3, 1, 30, 4, 200000, 200000, NULL, 200000, 3601, 200000, NULL),
(4, 2, 29, 3, 1000000, 50000, NULL, 500000, 1101, 50000, NULL),
(5, 1, 33, 4, 10000, 10000, NULL, 500000, 3601, 10000, NULL),
(6, 2, 28, 4, 20000, 10000, NULL, 400000, 1102, 10000, NULL),
(7, 2, 28, 4, 10000, 10000, NULL, 20000, 1115, 10000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employe`
--

CREATE TABLE `employe` (
  `id` int(5) NOT NULL,
  `akses` varchar(20) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL,
  `jabatan_id` int(5) DEFAULT NULL,
  `pangkat` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employe`
--

INSERT INTO `employe` (`id`, `akses`, `name`, `nip`, `role_id`, `bidang_id`, `jabatan_id`, `pangkat`) VALUES
(1, NULL, 'HJ. Ratu Atut', '19879 98799 2323', NULL, NULL, 1, 'Bupati Kabupaten Serang'),
(2, NULL, 'PANDJI TIRTAYASA', '19650307 198902 1 005', NULL, NULL, 2, 'Pembina Utama Muda'),
(3, NULL, 'Drs. H. TB. ENTUS MAHMUD', '19640825 198503 1 012', NULL, NULL, 3, 'Pembina Utama Muda'),
(4, NULL, 'Drs. H. ASEP SAEPUDIN M, MM', '19600330 198103 1 005', NULL, NULL, 4, 'Pembina Utama Muda'),
(5, NULL, 'ADJAT GUNAWAN, ST MM', '19610609 199003 1 006', NULL, NULL, 5, 'Pembina Utama Muda'),
(6, NULL, 'Kuasa Bendahara', '19790401 20022 1 006', NULL, NULL, 6, 'Penata Muda Tk.I III/b'),
(7, NULL, 'Sri Mulyana', '1232313 234324 432', NULL, NULL, 7, 'Bendahara Sekda'),
(8, NULL, 'Pejabat memberi Perintah', '19691228 199203 1 002', NULL, NULL, 8, 'Pembina Tingkat I  / IVb');

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `golongan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `golongan`, `role_id`) VALUES
(8, 'I/d', NULL),
(7, 'I/c', NULL),
(6, 'I/b', NULL),
(5, 'I/a', NULL),
(9, 'II/a', NULL),
(10, 'II/b', NULL),
(11, 'II/c', NULL),
(12, 'II/d', NULL),
(13, 'III/a', NULL),
(14, 'III/b', NULL),
(15, 'III/c', NULL),
(16, 'III/d', NULL),
(17, 'IV/a', NULL),
(18, 'Non PNS', NULL),
(34, 'IV/b', NULL),
(33, 'IV/c', NULL),
(28, 'Wakil Bupati', NULL),
(29, 'Bupati', NULL),
(30, 'Eselon II/b', NULL),
(31, 'Eselon III', NULL),
(32, 'Eselon IV', NULL),
(35, 'Eselon II/a', NULL),
(36, 'Eselon II/c', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `has_role`
--

CREATE TABLE `has_role` (
  `id` int(10) NOT NULL,
  `role_id` int(10) DEFAULT NULL,
  `route_id` int(5) DEFAULT NULL,
  `permision_id` int(5) DEFAULT NULL,
  `akses` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `has_role`
--

INSERT INTO `has_role` (`id`, `role_id`, `route_id`, `permision_id`, `akses`) VALUES
(610, 1, 1, 1, 1),
(611, 1, 2, 1, 1),
(612, 1, 3, 1, 1),
(613, 1, 4, 1, 1),
(686, 3, 1, 3, 1),
(687, 3, 2, 3, 1),
(688, 3, 3, 3, 1),
(689, 3, 4, 3, 1),
(690, 3, 6, 3, 1),
(691, 3, 7, 3, 0),
(692, 3, 8, 3, 0),
(693, 3, 9, 3, 0),
(694, 3, 10, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `name`) VALUES
(1, 'Bupati'),
(2, 'Wakil Bupati'),
(3, 'Sekretaris Daerah'),
(4, 'Asda'),
(5, 'Asda II'),
(6, 'Kuasa Bendahara'),
(7, 'Bendahara'),
(8, 'Koordinasi PPTK');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_perjalanan`
--

CREATE TABLE `jasa_perjalanan` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `icon_gambar` varchar(100) DEFAULT '',
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jasa_perjalanan`
--

INSERT INTO `jasa_perjalanan` (`id`, `name`, `icon_gambar`, `keterangan`) VALUES
(1, 'Traveloka', 'traveloka.jpg', 'perusahaan yang menyediakan layanan pemesanan tiket pesawat dan hotel secara daring dengan fokus perjalanan domestik di Indonesia.'),
(2, 'Mandiri', 'mandiri.png', NULL),
(3, 'BeliBeli', NULL, 'belibeli.com dongs');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sppd`
--

CREATE TABLE `jenis_sppd` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_sppd`
--

INSERT INTO `jenis_sppd` (`id`, `name`) VALUES
(1, 'Perjalanan Dinas Dalam Daerah'),
(2, 'Perjalanan DInas Luar Daerah'),
(3, 'Perjalanan Dinas Luar Negeri');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sct_id` int(10) UNSIGNED DEFAULT 0,
  `active` int(1) DEFAULT 0,
  `title` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `jumlah` varchar(65) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(65) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kode_rekening` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bidang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `users_id` int(10) DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `sct_id`, `active`, `title`, `jumlah`, `author`, `kode_rekening`, `bidang`, `users_id`, `role_id`, `bidang_id`) VALUES
(16, 6, 1, 'Penyediaan Aplikasi SPPDg', '2', 'bidang_pertama', '34324', 'Bidang Pertama', 33333, 1, NULL),
(17, 6, 1, 'Perjalanan Dinas  ke Jawa timur', '3', 'ustman', '34324', 'Bidang Kedua', 33333, 1, NULL),
(20, 6, 1, 'Koordinasi dan Konsultasi  Keluar Daerah', '3', 'admin', '34324', 'Administrator', 33333, 1, NULL),
(21, 6, 1, 'Koordinasi dan Konsultasi  Dalam Daerah', '2', 'admin', '34324', 'Administrator', 33333, 1, NULL),
(22, 6, 1, 'Perjalanan Dinas Luar Daerah', '2', 'eniyuningsih', '34324', 'Bidang Pertama', 33333, 1, NULL),
(23, 6, 1, 'Perjalanan Dinas Dalam Daerah', '3', 'eniyuningsih', '34324', 'Bidang Pertama', 33333, 1, NULL),
(24, 6, 1, 'Capaian Indikator 2018-2022', '2', 'ryan', '34324', 'bidang kesatu', 33333, 1, NULL),
(25, 6, 1, 'kegiatan tes lebih dari 15 orang', '20', 'admin', '34324', 'Administrator', 33333, 1, NULL),
(26, 6, 1, 'ppemesanan', '10', 'admin', '888888888', 'Administrator', 33333, 1, NULL),
(27, 6, 1, 'test kegiatan sss', '12', 'admin', '12321213213', 'Administrator', 33333, 1, NULL),
(29, 0, 0, 'Penyediaan Aplikasi SPPDgsss', '5', NULL, '34324', NULL, 33333, 1, NULL);

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
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `sct_id` int(10) UNSIGNED DEFAULT 0,
  `active` int(1) DEFAULT 0,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `nip` varchar(25) COLLATE utf8_unicode_ci DEFAULT '',
  `pangkat` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `golongan` varchar(15) COLLATE utf8_unicode_ci DEFAULT '',
  `jabatan` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `nomor_rekening` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `bidang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `sct_id`, `active`, `nama`, `nip`, `pangkat`, `golongan`, `jabatan`, `nomor_rekening`, `status`, `bidang`, `role_id`, `bidang_id`) VALUES
(80, 2, 1, 'Drsf. H. Imam Rana Hardiana, M.Si', '19680816 198803 1 004', 'Pembina Tk.I', 'Wakil Bupati', 'SAW Bidang SDM dan Kesejahteraan Rakyat', '1212', 1, 'Administrator', 1, 1),
(79, 2, 1, 'Drs. Heri Hadi', '19700518 199006 1 001', 'Pembina Utama Muda', 'Bupati', 'Staf Ahli Bidang Pemerintahan Hukum dan Politik Setda', '121', NULL, 'Administrator', 1, 1),
(78, 2, 1, 'Ahmad Saifullah, S.Pd, M.Si', '19720517 199803 1 008', 'Pembina', 'Eselon II/b', 'Kabag Umum dan Perlengkapan', '111', NULL, 'Administrator', 1, 1),
(76, 2, 1, 'Drs. Komarudin, Ak, MM', '19620303 199102 1 001', 'Pembina Utama Muda', 'IV/c', 'Asisten Administrasi Umum', '123', NULL, 'Administrator', 1, 1),
(83, 2, 1, 'Dr. H. TB. Urip Henus S, S.Pd, M.Si', '19661019 199112 1 001', 'Pembina Utama Muda', 'IV/c', 'Sekretaris Daerah', '1218', NULL, 'Administrator', 1, 1),
(81, 2, 1, 'Sumardi, SE', '19651205 198602 1 006', 'Penata Tk. I', 'III/d', 'Kasubag Pemeliharaan Setda', '1112', NULL, 'Administrator', 1, 1),
(82, 2, 1, 'Ir. H. Joko Sutrisno, MT', '19600323 199003 1 002', 'Pembina Utama Muda', 'IV/c', 'Asisten Ekonomi Pembangunan', '12121', NULL, 'Administrator', 1, 1),
(84, 2, 1, 'H. SYAFRUDIN, S.Sos, M.Si', '1', 'Walikota', 'Walikota', 'Walikota', '1', NULL, 'Administrator', 1, 1),
(85, 2, 1, 'H. SUBADRI USULUDIN, SH', '2', 'Wakil Walikota', 'Wakil Walikota', 'Wakil Walikota', '2', NULL, 'Administrator', 1, 1),
(86, 2, 1, 'Imammudin, S.Kom', '19791020 201001 1 011', 'Penata', 'III/c', 'Kasubag Perlengkapan Setda', '111', NULL, 'Administrator', 1, 1),
(87, 2, 1, 'Leni Puspasuri Sesunan, MM', '19780921 200902 2 003', 'Penata', 'III/c', 'Kasubag Rumah Tangga', '112', NULL, 'Administrator', 1, 1),
(88, 2, 1, 'Neneng Nurmaesih', '19720511 200212 2 004', 'Penata Muda', 'III/a', 'Pelaksana', '113', NULL, 'Administrator', 1, 1),
(89, 2, 1, 'Drs. Budi Martono, M.Si', '19690317 198903 1 004', 'Pembina Tk.I', 'IV/b', 'Kabag TU dan Protokol', '114', NULL, 'Administrator', 1, 1),
(90, 2, 1, 'Rusma, SE', '19670727 199003 1 016', 'Penata', 'III/c', 'Kasubag TU dan Publikasi Pimpinan', '115', NULL, 'Administrator', 1, 1),
(91, 2, 1, 'Eko Agung Baskoro, A.Md, Pem', '19700504 199102 1 001', 'Penata Tk. I', 'III/d', 'Kasubag Protokol', '116', NULL, 'Administrator', 1, 1),
(92, 2, 1, 'Sri Astuti, S.Kom', '19820423 201101 2 002', 'Penata', 'III/c', 'Kasubag TU dan Kepegawaian', '117', NULL, 'Administrator', 1, 1),
(93, 2, 1, 'Akbar, A.Md. Gz', '19760704 200902 1 002', 'Penata Muda Tk.I', 'III/c', 'Pelaksana', '118', NULL, 'Administrator', 1, 1),
(94, 2, 1, 'Dra. Hj. Fatmawati, M.Si', 'Pembina Tk.I', 'Pembina Tk.I', 'IV/b', 'Kabag Keuangan', '119', NULL, 'Administrator', 1, 1),
(95, 2, 1, 'Dra. Hermayantie Purnamasari, MM', '19670211 200604 2 006', 'Penata Tk. I', 'III/d', 'Kasubag Perbendaharaan', '119', NULL, 'Administrator', 1, 1),
(96, 2, 1, 'Iis Lisnawati, SE, M.Si', '19770509 200902 2 002', 'Penata', 'III/c', 'Kasubag Akuntansi Keuangan', '200', NULL, 'Administrator', 1, 1),
(97, 2, 1, 'Encep Juweni, SE', '19671009 198603 1 002', 'Penata Tk.I', 'III/d', 'Kasubag PEP Setda', '201', NULL, 'Administrator', 1, 1),
(98, 2, 1, 'Ida Narwidah', '19680928 200701 2 012', 'Pengatur Tk.I', 'II/d', 'Pelaksana Perbendaharaan', '202', NULL, 'Administrator', 1, 1),
(99, 2, 1, 'Ade Johaedi', '19660424 198803 1 012', 'Pengatur Tk.I', 'II/d', 'Pelaksana Perbendaharaan', '203', NULL, 'Administrator', 1, 1),
(100, 2, 1, 'Drs. H. Ahmad Yani, MM', '19670107 199603 1 002', 'Pembina ', 'IV/a', 'Kabag Ekbang', '204', NULL, 'Administrator', 1, 1),
(101, 2, 1, 'Yulia Hidayat, ST, M.Si', '19770705 200312 2 006', 'Pembina', 'IV/a', 'Kasubag Administrasi Pembangunan', '205', NULL, 'Administrator', 1, 1),
(102, 2, 1, 'Dionisio Fernandes Dos Santos, S.STP, M.Si', '19790211 199810 1 002', 'Pembina', 'IV/a', 'Kasubag Perumusan Kebijakan Ekonomi Daerah', '206', NULL, 'Administrator', 1, 1),
(103, 2, 1, 'Eka Surya Miharja, ST.MM', '19780927 201001 1 008', 'Penata', 'III/c', 'Kasubag Bina Ekonomi Kreatif', '206', NULL, 'Administrator', 1, 1),
(104, 2, 1, 'Dr. Hudori KA, M.Pd', '19640229 198803 1 007', 'Pembina Tk.I', 'IV/b', 'Kabag Administrasi Kesra', '207', NULL, 'Administrator', 1, 1),
(105, 2, 1, 'Drs. Pansuri Ritonga, MH', '19660202 199303 1 002', 'Pembina Tk.I', 'IV/b', 'Kasubag Keagamaan', '208', NULL, 'Administrator', 1, 1),
(106, 2, 1, 'Moh. Rahmatullah, S.Pd, M.Si', '19641128 198410 1 003', 'Pembina', 'IV/a', 'Kasubag Kelembagaan Keagamaan', '209', NULL, 'Administrator', 1, 1),
(107, 2, 1, 'H. Sarif Ahmad, S.Sos, M.Si', '19680214 199010 1 001', 'Pembina', 'IV/a', 'Kasubag Kemasyarakatan', '210', NULL, 'Administrator', 1, 1),
(108, 2, 1, 'Tendian, S.Pd, SH, MH', '19651110 199302 1 003', 'Pembina Tk.I', 'IV/b', 'Kabag Kerjasama dan Investasi Daerah', '211', NULL, 'Administrator', 1, 1),
(109, 2, 1, 'Achmad Sujai Zakaria, S.Sos', '19630424 198603 1 018', 'Penata Tk. I', 'III/d', 'Kasubag Kerjasama Daerah', '212', NULL, 'Administrator', 1, 1),
(110, 2, 1, 'RD. Santi Lestari, S.Sos', '19761227 199803 2 005', 'Penata Tk. I', 'III/d', 'Kasubag Promosi', '213', NULL, 'Administrator', 1, 1),
(111, 2, 1, 'Irwan Kurnia, SE', '19810316 200902 1 002', 'Penata', 'III/c', 'Kasubag Investasi', '214', NULL, 'Administrator', 1, 1),
(112, 2, 1, 'Anthon Gunawan, S.Sos, M.Si', '19690712 199010 1 001', 'Pembina Tk.I', 'IV/b', 'Kabag Organisasi dan Reformasi Birokrasi', '215', NULL, 'Administrator', 1, 1),
(113, 2, 1, 'Leni Marlinah, SH, M.Si', '19820216 201001 2 007', 'Penata', 'III/c', 'Kasubag Ketatalaksanaan dan Pelayanan Publik', '216', NULL, 'Administrator', 1, 1),
(114, 2, 1, 'Havid, S.IP, M.Si', '19840914 200502 1 001', 'Penata', 'III/c', 'Kasubag Akuntabilitas Kinerja dan Reformasi Birokrasi', '216', NULL, 'Administrator', 1, 1),
(115, 2, 1, 'Mokh. Nafis Hani, SH', 'Penata', 'Penata', 'III/c', 'Kasubag Kelembagaan dan Analisa Formasi Jabatan', '217', NULL, 'Administrator', 1, 1),
(116, 2, 1, 'Tedi Kusnadi, S.STP, M.Si', '19760610 199701 1 001', 'Pembina Tk.I', 'IV/b', 'Kabag Pemerintah', '218', NULL, 'Administrator', 1, 1),
(117, 2, 1, 'Mokhamad Tohir, S.Sos, M.Si', '19680907 199304 1 001', 'Pembina', 'IV/a', 'Kasubag Bina Kecamatan', '219', NULL, 'Administrator', 1, 1),
(118, 2, 1, 'Dicky Suprayoga, SH, M.Si', '19830103 201101 1 002', 'Penata Tk. I', 'III/d', 'Kasubag Otonomi Daerah Setda', '217', NULL, 'Administrator', 1, 1),
(119, 2, 1, 'Trisno Budi Prastyo, S.STP', '19800329 199810 1 001', 'Penata', 'III/c', 'Kasubag Pemerintahan Umum', '218', NULL, 'Administrator', 1, 1),
(120, 2, 1, 'Drs. Subagyo, M.Si', '19740910 199303 1 002', 'Pembina Tk.I', 'IV/b', 'Kabag Hukum', '220', NULL, 'Administrator', 1, 1),
(121, 2, 1, 'Lily Mushlihat, SH, M.Si', '19740428 200112 2 003', 'Pembina', 'IV/a', 'Kasubag Pengaturan', '221', NULL, 'Administrator', 1, 1),
(122, 2, 1, 'Marta Satria Subing, SH', '19860310 201101 1 002', 'Penata', 'III/c', 'Kasubag Bantuan Hukum dan HAM', '222', NULL, 'Administrator', 1, 1),
(123, 2, 1, 'Madiyah, SH', '19820705 201001 2 008', 'Penata', 'III/c', 'Kasubag Penetapan dan Dokumentasi Hukum', '223', NULL, 'Administrator', 1, 1),
(124, 2, 1, 'Tisna Hari Adi', '001', '-', 'Non PNS', 'Pengawal KDH/WKDH', '224', NULL, 'Administrator', 1, 1),
(125, 2, 1, 'Handriansyah', '002', '-', 'Non PNS', 'Pengawal KDH/WKDH', '226', NULL, 'Administrator', 1, 1),
(126, 2, 1, 'Firman Maulana, S.STP', '003', '-', 'Non PNS', 'Pengawal KDH/WKDH', '228', NULL, 'Administrator', 1, 1),
(127, 2, 1, 'Lili Apriliani', '004', '-', 'Non PNS', 'Sekretaris Walikota', '229', NULL, 'Administrator', 1, 1),
(128, 2, 1, 'Mas Syukurullah', '005', '-', 'Non PNS', 'Sekretaris Walikota', '229', NULL, 'Administrator', 1, 1),
(129, 2, 1, 'Ayu Novita Anggraeni', '006', '-', 'Non PNS', 'Sekretaris Walikota', '230', NULL, 'Administrator', 1, 1),
(130, 2, 1, 'Nuraida', '007', '-', 'Non PNS', 'Sekretaris Walikota', '231', NULL, 'Administrator', 1, 1),
(131, 2, 1, 'Adis Fuad', '008', '-', 'Non PNS', 'Supir Walikota', '232', NULL, 'Administrator', 1, 1),
(132, 2, 1, 'Hasan Basri', '009', '-', 'Non PNS', 'Supir Walikota', '233', NULL, 'Administrator', 1, 1),
(133, 2, 1, 'Septi Zulian', '010', '-', 'Non PNS', 'Supir Walikota', '234', NULL, 'Administrator', 1, 1),
(134, 2, 1, 'Zulkifli', '011', '-', 'Non PNS', 'Pengawal KDH/WKDH', '235', NULL, 'Administrator', 1, 1),
(135, 2, 1, 'Yudi Rengga', '012', '-', 'Non PNS', 'Pengawal KDH/WKDH', '237', NULL, 'Administrator', 1, 1),
(136, 2, 1, 'Agung Miftah Sobarojana', '013', '-', 'Non PNS', 'Pengawal KDH/WKDH', '237', NULL, 'Administrator', 1, 1),
(137, 2, 1, 'Andi Septian Pamungkas', '014', '-', 'Non PNS', 'Pengawal KDH/WKDH', '238', NULL, 'Administrator', 1, 1),
(138, 2, 1, 'Muadi', '015', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '239', NULL, 'Administrator', 1, 1),
(139, 2, 1, 'Megawati', '016', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '239', NULL, 'Administrator', 1, 1),
(140, 2, 1, 'Ermy Mutiara', '017', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '239', NULL, 'Administrator', 1, 1),
(141, 2, 1, 'Aldi Syahbana', '018', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '240', NULL, 'Administrator', 1, 1),
(142, 2, 1, 'Ira Rahayu', '019', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '241', NULL, 'Administrator', 1, 1),
(143, 2, 1, 'H. Saefudin', '020', '-', 'Non PNS', 'Supir Wakil Walikota', '242', NULL, 'Administrator', 1, 1),
(144, 2, 1, 'Ewang', '021', '-', 'Non PNS', 'Supir Wakil Walikota', '244', NULL, 'Administrator', 1, 1),
(145, 2, 1, 'Satibi', '022', '-', 'Non PNS', 'Supir Wakil Walikota', '245', NULL, 'Administrator', NULL, NULL),
(146, 0, 0, 'gfdgffdg', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL),
(147, 0, 0, 'gdfgfdg', '4332324234', 'dfgfdgdg', 'Bupati', 'fgdgdfgdfg', '4354354345', 1, NULL, NULL, NULL),
(148, 0, 0, 'Seosilo', '32133', 'cxzczc', 'IV/a', 'dasdsd', '43244', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permision`
--

CREATE TABLE `permision` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permision`
--

INSERT INTO `permision` (`id`, `name`) VALUES
(1, 'View'),
(2, 'Create'),
(3, 'All');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_sppd`
--

CREATE TABLE `riwayat_sppd` (
  `id` int(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `pegawai_id` int(10) DEFAULT NULL,
  `surat_tugas_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_sppd`
--

INSERT INTO `riwayat_sppd` (`id`, `tanggal`, `pegawai_id`, `surat_tugas_id`) VALUES
(43, '2020-03-04', 80, 249),
(44, '2020-03-05', 80, 249),
(45, '2020-03-06', 80, 249),
(46, '2020-03-07', 80, 249),
(47, '2020-03-08', 80, 249),
(48, '2020-03-09', 80, 249),
(49, '2020-03-10', 80, 249),
(50, '2020-03-04', 79, 249),
(51, '2020-03-05', 79, 249),
(52, '2020-03-06', 79, 249),
(53, '2020-03-07', 79, 249),
(54, '2020-03-08', 79, 249),
(55, '2020-03-09', 79, 249),
(56, '2020-03-10', 79, 249),
(57, '2020-03-04', 78, 249),
(58, '2020-03-05', 78, 249),
(59, '2020-03-06', 78, 249),
(60, '2020-03-07', 78, 249),
(61, '2020-03-08', 78, 249),
(62, '2020-03-09', 78, 249),
(63, '2020-03-10', 78, 249),
(84, '2020-03-28', 80, 247),
(85, '2020-03-29', 80, 247),
(86, '2020-03-30', 80, 247),
(87, '2020-03-31', 80, 247),
(88, '2020-03-28', 79, 247),
(89, '2020-03-29', 79, 247),
(90, '2020-03-30', 79, 247),
(91, '2020-03-31', 79, 247),
(92, '2020-03-07', 80, 245),
(93, '2020-03-08', 80, 245),
(94, '2020-03-09', 80, 245),
(95, '2020-03-10', 80, 245),
(96, '2020-03-11', 80, 245),
(97, '2020-03-07', 79, 245),
(98, '2020-03-08', 79, 245),
(99, '2020-03-09', 79, 245),
(100, '2020-03-10', 79, 245),
(101, '2020-03-11', 79, 245),
(102, '2020-03-07', 78, 245),
(103, '2020-03-08', 78, 245),
(104, '2020-03-09', 78, 245),
(105, '2020-03-10', 78, 245),
(106, '2020-03-11', 78, 245),
(107, '2020-03-02', 80, 246),
(108, '2020-03-02', 79, 246),
(109, '2020-03-02', 83, 246);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Bendahara'),
(2, 'Admin'),
(3, 'SuperAdmin'),
(4, 'Operator');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `menu` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`id`, `name`, `link`, `icon`, `menu`) VALUES
(1, 'Pegawai', '/pegawai', 'group', 1),
(2, 'Surat Tugas', '/surat_tugas', 'envelope-o', 1),
(3, 'Kwitansi', '/surat_tugas/kwitansi/ok', 'clone', 1),
(4, 'Kegiatan', '/kegiatan', 'th', 1),
(6, 'Master', '#', 'th', 1),
(7, 'Bidang', '/bidang', 'check', 0),
(8, 'Golongan', '/golongan', 'check', 0),
(9, 'SSH', '/domlak', 'check', 0),
(10, 'Jasa Perjalanan', '/jasa', 'check', 0),
(11, 'Pengaturan Umum', '/employe', 'check', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sts` int(5) DEFAULT NULL,
  `color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`, `sts`, `color`) VALUES
(1, 'New', 1, 'red'),
(2, 'Nota Dinas', 2, 'blue');

-- --------------------------------------------------------

--
-- Table structure for table `surat_tugas`
--

CREATE TABLE `surat_tugas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nomor_surat` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `judul_surat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomor_sppd` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kegiatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `kegiatan_id` int(10) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `filelampiran` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `date_mulai` date DEFAULT NULL,
  `date_sampai` date DEFAULT NULL,
  `date_surat` date DEFAULT NULL,
  `jenis_sppd_id` int(5) DEFAULT NULL,
  `pejabat_id` int(5) DEFAULT NULL,
  `filedokumen` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `tujuan_sppd_id` int(5) DEFAULT NULL,
  `angkutan_id` int(5) DEFAULT NULL,
  `selisih` int(5) DEFAULT NULL,
  `sts` int(5) DEFAULT NULL,
  `tujuan` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `kunjungan` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dasar` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `jasa_angkutan_id` int(5) DEFAULT NULL,
  `catatan` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `maksud` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `jasa_perjalanan_id` int(5) DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `jurusan` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_berangkat` date DEFAULT NULL,
  `date_kembali` date DEFAULT NULL,
  `pesawat` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL,
  `date_kwitansi` date DEFAULT NULL,
  `date_terima` date DEFAULT NULL,
  `nomor_kwitansi` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nomor_rekening` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `surat_tugas`
--

INSERT INTO `surat_tugas` (`id`, `nomor_surat`, `judul_surat`, `nomor_sppd`, `kegiatan`, `kegiatan_id`, `jumlah`, `filelampiran`, `date_mulai`, `date_sampai`, `date_surat`, `jenis_sppd_id`, `pejabat_id`, `filedokumen`, `tujuan_sppd_id`, `angkutan_id`, `selisih`, `sts`, `tujuan`, `kunjungan`, `dasar`, `jasa_angkutan_id`, `catatan`, `maksud`, `jasa_perjalanan_id`, `role_id`, `jurusan`, `date_berangkat`, `date_kembali`, `pesawat`, `bidang_id`, `date_kwitansi`, `date_terima`, `nomor_kwitansi`, `nomor_rekening`) VALUES
(245, '244/001-SETDA/2020', '244/001-SETDA/2020', '4432432423', '', 23, 3, '244/001-SETDA/2020', '2020-03-06', '2020-03-10', '2020-02-04', 1, 7, '244/001-SETDA/2020', 3601, 1, 5, 2, 'Cafe anyer', 'Rapat', 'SPT/SSS/TT', NULL, NULL, 'Menggapai BIntnatng', 1, NULL, 'Lombok', '2020-03-11', '2020-03-13', 'Batik', 2, NULL, NULL, NULL, NULL),
(246, '245/001-SETDA/2020', 'TES1', 'NOMOR1', '', 17, 3, '245/001-SETDA/2020', '2020-03-01', '2020-03-01', '2020-03-01', 1, 4, '245/001-SETDA/2020', 3601, 4, 1, 2, 'MERAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL),
(247, '246/001-SETDA/2020', 'TES2', 'NOMOR2', '', 16, 2, '246/001-SETDA/2020', '2020-03-27', '2020-03-30', '2020-03-02', 1, 7, '246/001-SETDA/2020', 3601, 1, 4, 2, 'ACEH', 'xxsddasd', 'sdasds', NULL, NULL, 'asdasdasd', 1, NULL, 'Lombok', '2020-03-11', '2020-03-13', 'Batik', 1, '2020-03-01', '2020-03-14', '22222222', '33333333');

-- --------------------------------------------------------

--
-- Table structure for table `tblsiswa`
--

CREATE TABLE `tblsiswa` (
  `id` int(11) NOT NULL,
  `nim` bigint(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblsiswa`
--

INSERT INTO `tblsiswa` (`id`, `nim`, `nama`, `email`) VALUES
(1, 44444, 'uconn', '4444@gmail.com'),
(2, 55555, 'cccc', '55555@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_sppd`
--

CREATE TABLE `tujuan_sppd` (
  `id` int(10) UNSIGNED NOT NULL,
  `ket` char(2) NOT NULL,
  `name` tinytext NOT NULL,
  `jenis_sppd_id` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tujuan_sppd`
--

INSERT INTO `tujuan_sppd` (`id`, `ket`, `name`, `jenis_sppd_id`) VALUES
(1101, '11', 'Kab. Aceh Selatan', 2),
(1102, '11', 'Kab. Aceh Tenggara', 2),
(1103, '11', 'Kab. Aceh Timur', 2),
(1104, '11', 'Kab. Aceh Tengah', 2),
(1105, '11', 'Kab. Aceh Barat', 2),
(1106, '11', 'Kab. Aceh Besar', 2),
(1107, '11', 'Kab. Pidie', 2),
(1108, '11', 'Kab. Aceh Utara', 2),
(1109, '11', 'Kab. Simeulue', 2),
(1110, '11', 'Kab. Aceh Singkil', 2),
(1111, '11', 'Kab. Bireuen', 2),
(1112, '11', 'Kab. Aceh Barat Daya', 2),
(1113, '11', 'Kab. Gayo Lues', 2),
(1114, '11', 'Kab. Aceh Jaya', 2),
(1115, '11', 'Kab. Nagan Raya', 2),
(1116, '11', 'Kab. Aceh Tamiang', 2),
(1117, '11', 'Kab. Bener Meriah', 2),
(1118, '11', 'Kab. Pidie Jaya', 2),
(1171, '11', 'Kota Banda Aceh', 2),
(1172, '11', 'Kota Sabang', 2),
(1173, '11', 'Kota Lhokseumawe', 2),
(1174, '11', 'Kota Langsa', 2),
(1175, '11', 'Kota Subulussalam', 2),
(1201, '12', 'Kab. Tapanuli Tengah', 2),
(1202, '12', 'Kab. Tapanuli Utara', 2),
(1203, '12', 'Kab. Tapanuli Selatan', 2),
(1204, '12', 'Kab. Nias', 2),
(1205, '12', 'Kab. Langkat', 2),
(1206, '12', 'Kab. Karo', 2),
(1207, '12', 'Kab. Deli Serdang', 2),
(1208, '12', 'Kab. Simalungun', 2),
(1209, '12', 'Kab. Asahan', 2),
(1210, '12', 'Kab. Labuhanbatu', 2),
(1211, '12', 'Kab. Dairi', 2),
(1212, '12', 'Kab. Toba Samosir', 2),
(1213, '12', 'Kab. Mandailing Natal', 2),
(1214, '12', 'Kab. Nias Selatan', 2),
(1215, '12', 'Kab. Pakpak Bharat', 2),
(1216, '12', 'Kab. Humbang Hasundutan', 2),
(1217, '12', 'Kab. Samosir', 2),
(1218, '12', 'Kab. Serdang Bedagai', 2),
(1219, '12', 'Kab. Batu Bara', 2),
(1220, '12', 'Kab. Padang Lawas Utara', 2),
(1221, '12', 'Kab. Padang Lawas', 2),
(1222, '12', 'Kab. Labuhanbatu Selatan', 2),
(1223, '12', 'Kab. Labuhanbatu Utara', 2),
(1224, '12', 'Kab. Nias Utara', 2),
(1225, '12', 'Kab. Nias Barat', 2),
(1271, '12', 'Kota Medan', 2),
(1272, '12', 'Kota Pematang Siantar', 2),
(1273, '12', 'Kota Sibolga', 2),
(1274, '12', 'Kota Tanjung Balai', 2),
(1275, '12', 'Kota Binjai', 2),
(1276, '12', 'Kota Tebing Tinggi', 2),
(1277, '12', 'Kota Padangsidimpuan', 2),
(1278, '12', 'Kota Gunungsitoli', 2),
(1301, '13', 'Kab. Pesisir Selatan', 2),
(1302, '13', 'Kab. Solok', 2),
(1303, '13', 'Kab. Sijunjung', 2),
(1304, '13', 'Kab. Tanah Datar', 2),
(1305, '13', 'Kab. Padang Pariaman', 2),
(1306, '13', 'Kab. Agam', 2),
(1307, '13', 'Kab. Lima Puluh Kota', 2),
(1308, '13', 'Kab. Pasaman', 2),
(1309, '13', 'Kab. Kepulauan Mentawai', 2),
(1310, '13', 'Kab. Dharmasraya', 2),
(1311, '13', 'Kab. Solok Selatan', 2),
(1312, '13', 'Kab. Pasaman Barat', 2),
(1371, '13', 'Kota Padang', 2),
(1372, '13', 'Kota Solok', 2),
(1373, '13', 'Kota Sawahlunto', 2),
(1374, '13', 'Kota Padang Panjang', 2),
(1375, '13', 'Kota Bukittinggi', 2),
(1376, '13', 'Kota Payakumbuh', 2),
(1377, '13', 'Kota Pariaman', 2),
(1401, '14', 'Kab. Kampar', 2),
(1402, '14', 'Kab. Indragiri Hulu', 2),
(1403, '14', 'Kab. Bengkalis', 2),
(1404, '14', 'Kab. Indragiri Hilir', 2),
(1405, '14', 'Kab. Pelalawan', 2),
(1406, '14', 'Kab. Rokan Hulu', 2),
(1407, '14', 'Kab. Rokan Hilir', 2),
(1408, '14', 'Kab. Siak', 2),
(1409, '14', 'Kab. Kuantan Singingi', 2),
(1410, '14', 'Kab. Kepulauan Meranti', 2),
(1471, '14', 'Kota Pekanbaru', 2),
(1472, '14', 'Kota Dumai', 2),
(1501, '15', 'Kab. Kerinci', 2),
(1502, '15', 'Kab. Merangin', 2),
(1503, '15', 'Kab. Sarolangun', 2),
(1504, '15', 'Kab. Batanghari', 2),
(1505, '15', 'Kab. Muaro Jambi', 2),
(1506, '15', 'Kab. Tanjung Jabung Barat', 2),
(1507, '15', 'Kab. Tanjung Jabung Timur', 2),
(1508, '15', 'Kab. Bungo', 2),
(1509, '15', 'Kab. Tebo', 2),
(1571, '15', 'Kota Jambi', 2),
(1572, '15', 'Kota Sungai Penuh', 2),
(1601, '16', 'Kab. Ogan Komering Ulu', 2),
(1602, '16', 'Kab. Ogan Komering Ilir', 2),
(1603, '16', 'Kab. Muara Enim', 2),
(1604, '16', 'Kab. Lahat', 2),
(1605, '16', 'Kab. Musi Rawas', 2),
(1606, '16', 'Kab. Musi Banyuasin', 2),
(1607, '16', 'Kab. Banyuasin', 2),
(1608, '16', 'Kab. Ogan Komering Ulu Timur', 2),
(1609, '16', 'Kab. Ogan Komering Ulu Selatan', 2),
(1610, '16', 'Kab. Ogan Ilir', 2),
(1611, '16', 'Kab. Empat Lawang', 2),
(1612, '16', 'Kab. Penukal Abab Lematang Ilir', 2),
(1613, '16', 'Kab. Musi Rawas Utara', 2),
(1671, '16', 'Kota Palembang', 2),
(1672, '16', 'Kota Pagar Alam', 2),
(1673, '16', 'Kota Lubuk Linggau', 2),
(1674, '16', 'Kota Prabumulih', 2),
(1701, '17', 'Kab. Bengkulu Selatan', 2),
(1702, '17', 'Kab. Rejang Lebong', 2),
(1703, '17', 'Kab. Bengkulu Utara', 2),
(1704, '17', 'Kab. Kaur', 2),
(1705, '17', 'Kab. Seluma', 2),
(1706, '17', 'Kab. Muko Muko', 2),
(1707, '17', 'Kab. Lebong', 2),
(1708, '17', 'Kab. Kepahiang', 2),
(1709, '17', 'Kab. Bengkulu Tengah', 2),
(1771, '17', 'Kota Bengkulu', 2),
(1801, '18', 'Kab. Lampung Selatan', 2),
(1802, '18', 'Kab. Lampung Tengah', 2),
(1803, '18', 'Kab. Lampung Utara', 2),
(1804, '18', 'Kab. Lampung Barat', 2),
(1805, '18', 'Kab. Tulang Bawang', 2),
(1806, '18', 'Kab. Tanggamus', 2),
(1807, '18', 'Kab. Lampung Timur', 2),
(1808, '18', 'Kab. Way Kanan', 2),
(1809, '18', 'Kab. Pesawaran', 2),
(1810, '18', 'Kab. Pringsewu', 2),
(1811, '18', 'Kab. Mesuji', 2),
(1812, '18', 'Kab. Tulang Bawang Barat', 2),
(1813, '18', 'Kab. Pesisir Barat', 2),
(1871, '18', 'Kota Bandar Lampung', 2),
(1872, '18', 'Kota Metro', 2),
(1901, '19', 'Kab. Bangka', 2),
(1902, '19', 'Kab. Belitung', 2),
(1903, '19', 'Kab. Bangka Selatan', 2),
(1904, '19', 'Kab. Bangka Tengah', 2),
(1905, '19', 'Kab. Bangka Barat', 2),
(1906, '19', 'Kab. Belitung Timur', 2),
(1971, '19', 'Kota Pangkal Pinang', 2),
(2101, '21', 'Kab. Bintan', 2),
(2102, '21', 'Kab. Karimun', 2),
(2103, '21', 'Kab. Natuna', 2),
(2104, '21', 'Kab. Lingga', 2),
(2105, '21', 'Kab. Kepulauan Anambas', 2),
(2171, '21', 'Kota Batam', 2),
(2172, '21', 'Kota Tanjung Pinang', 2),
(3101, '31', 'Kab. Adm. Kep. Seribu', 2),
(3171, '31', 'Kota Adm. Jakarta Pusat', 2),
(3172, '31', 'Kota Adm. Jakarta Utara', 2),
(3173, '31', 'Kota Adm. Jakarta Barat', 2),
(3174, '31', 'Kota Adm. Jakarta Selatan', 2),
(3175, '31', 'Kota Adm. Jakarta Timur', 2),
(3201, '32', 'Kab. Bogor', 2),
(3202, '32', 'Kab. Sukabumi', 2),
(3203, '32', 'Kab. Cianjur', 2),
(3204, '32', 'Kab. Bandung', 2),
(3205, '32', 'Kab. Garut', 2),
(3206, '32', 'Kab. Tasikmalaya', 2),
(3207, '32', 'Kab. Ciamis', 2),
(3208, '32', 'Kab. Kuningan', 2),
(3209, '32', 'Kab. Cirebon', 2),
(3210, '32', 'Kab. Majalengka', 2),
(3211, '32', 'Kab. Sumedang', 2),
(3212, '32', 'Kab. Indramayu', 2),
(3213, '32', 'Kab. Subang', 2),
(3214, '32', 'Kab. Purwakarta', 2),
(3215, '32', 'Kab. Karawang', 2),
(3216, '32', 'Kab. Bekasi', 2),
(3217, '32', 'Kab. Bandung Barat', 2),
(3218, '32', 'Kab. Pangandaran', 2),
(3271, '32', 'Kota Bogor', 2),
(3272, '32', 'Kota Sukabumi', 2),
(3273, '32', 'Kota Bandung', 2),
(3274, '32', 'Kota Cirebon', 2),
(3275, '32', 'Kota Bekasi', 2),
(3276, '32', 'Kota Depok', 2),
(3277, '32', 'Kota Cimahi', 2),
(3278, '32', 'Kota Tasikmalaya', 2),
(3279, '32', 'Kota Banjar', 2),
(3301, '33', 'Kab. Cilacap', 2),
(3302, '33', 'Kab. Banyumas', 2),
(3303, '33', 'Kab. Purbalingga', 2),
(3304, '33', 'Kab. Banjarnegara', 2),
(3305, '33', 'Kab. Kebumen', 2),
(3306, '33', 'Kab. Purworejo', 2),
(3307, '33', 'Kab. Wonosobo', 2),
(3308, '33', 'Kab. Magelang', 2),
(3309, '33', 'Kab. Boyolali', 2),
(3310, '33', 'Kab. Klaten', 2),
(3311, '33', 'Kab. Sukoharjo', 2),
(3312, '33', 'Kab. Wonogiri', 2),
(3313, '33', 'Kab. Karanganyar', 2),
(3314, '33', 'Kab. Sragen', 2),
(3315, '33', 'Kab. Grobogan', 2),
(3316, '33', 'Kab. Blora', 2),
(3317, '33', 'Kab. Rembang', 2),
(3318, '33', 'Kab. Pati', 2),
(3319, '33', 'Kab. Kudus', 2),
(3320, '33', 'Kab. Jepara', 2),
(3321, '33', 'Kab. Demak', 2),
(3322, '33', 'Kab. Semarang', 2),
(3323, '33', 'Kab. Temanggung', 2),
(3324, '33', 'Kab. Kendal', 2),
(3325, '33', 'Kab. Batang', 2),
(3326, '33', 'Kab. Pekalongan', 2),
(3327, '33', 'Kab. Pemalang', 2),
(3328, '33', 'Kab. Tegal', 2),
(3329, '33', 'Kab. Brebes', 2),
(3371, '33', 'Kota Magelang', 2),
(3372, '33', 'Kota Surakarta', 2),
(3373, '33', 'Kota Salatiga', 2),
(3374, '33', 'Kota Semarang', 2),
(3375, '33', 'Kota Pekalongan', 2),
(3376, '33', 'Kota Tegal', 2),
(3401, '34', 'Kab. Kulon Progo', 2),
(3402, '34', 'Kab. Bantul', 2),
(3403, '34', 'Kab. Gunung Kidul', 2),
(3404, '34', 'Kab. Sleman', 2),
(3471, '34', 'Kota Yogyakarta', 2),
(3501, '35', 'Kab. Pacitan', 2),
(3502, '35', 'Kab. Ponorogo', 2),
(3503, '35', 'Kab. Trenggalek', 2),
(3504, '35', 'Kab. Tulungagung', 2),
(3505, '35', 'Kab. Blitar', 2),
(3506, '35', 'Kab. Kediri', 2),
(3507, '35', 'Kab. Malang', 2),
(3508, '35', 'Kab. Lumajang', 2),
(3509, '35', 'Kab. Jember', 2),
(3510, '35', 'Kab. Banyuwangi', 2),
(3511, '35', 'Kab. Bondowoso', 2),
(3512, '35', 'Kab. Situbondo', 2),
(3513, '35', 'Kab. Probolinggo', 2),
(3514, '35', 'Kab. Pasuruan', 2),
(3515, '35', 'Kab. Sidoarjo', 2),
(3516, '35', 'Kab. Mojokerto', 2),
(3517, '35', 'Kab. Jombang', 2),
(3518, '35', 'Kab. Nganjuk', 2),
(3519, '35', 'Kab. Madiun', 2),
(3520, '35', 'Kab. Magetan', 2),
(3521, '35', 'Kab. Ngawi', 2),
(3522, '35', 'Kab. Bojonegoro', 2),
(3523, '35', 'Kab. Tuban', 2),
(3524, '35', 'Kab. Lamongan', 2),
(3525, '35', 'Kab. Gresik', 2),
(3526, '35', 'Kab. Bangkalan', 2),
(3527, '35', 'Kab. Sampang', 2),
(3528, '35', 'Kab. Pamekasan', 2),
(3529, '35', 'Kab. Sumenep', 2),
(3571, '35', 'Kota Kediri', 2),
(3572, '35', 'Kota Blitar', 2),
(3573, '35', 'Kota Malang', 2),
(3574, '35', 'Kota Probolinggo', 2),
(3575, '35', 'Kota Pasuruan', 2),
(3576, '35', 'Kota Mojokerto', 2),
(3577, '35', 'Kota Madiun', 2),
(3578, '35', 'Kota Surabaya', 2),
(3579, '35', 'Kota Batu', 2),
(3601, '36', 'Kab. Pandeglang', 1),
(3602, '36', 'Kab. Lebak', 1),
(3603, '36', 'Kab. Tangerang', 1),
(3604, '36', 'Kab. Serang', 1),
(3671, '36', 'Kota Tangerang', 1),
(3672, '36', 'Kota Cilegon', 1),
(3673, '36', 'Kota Serang', 1),
(3674, '36', 'Kota Tangerang Selatan', 1),
(5101, '51', 'Kab. Jembrana', 2),
(5102, '51', 'Kab. Tabanan', 2),
(5103, '51', 'Kab. Badung', 2),
(5104, '51', 'Kab. Gianyar', 2),
(5105, '51', 'Kab. Klungkung', 2),
(5106, '51', 'Kab. Bangli', 2),
(5107, '51', 'Kab. Karangasem', 2),
(5108, '51', 'Kab. Buleleng', 2),
(5171, '51', 'Kota Denpasar', 2),
(5201, '52', 'Kab. Lombok Barat', 2),
(5202, '52', 'Kab. Lombok Tengah', 2),
(5203, '52', 'Kab. Lombok Timur', 2),
(5204, '52', 'Kab. Sumbawa', 2),
(5205, '52', 'Kab. Dompu', 2),
(5206, '52', 'Kab. Bima', 2),
(5207, '52', 'Kab. Sumbawa Barat', 2),
(5208, '52', 'Kab. Lombok Utara', 2),
(5271, '52', 'Kota Mataram', 2),
(5272, '52', 'Kota Bima', 2),
(5301, '53', 'Kab. Kupang', 2),
(5302, '53', 'Kab Timor Tengah Selatan', 2),
(5303, '53', 'Kab. Timor Tengah Utara', 2),
(5304, '53', 'Kab. Belu', 2),
(5305, '53', 'Kab. Alor', 2),
(5306, '53', 'Kab. Flores Timur', 2),
(5307, '53', 'Kab. Sikka', 2),
(5308, '53', 'Kab. Ende', 2),
(5309, '53', 'Kab. Ngada', 2),
(5310, '53', 'Kab. Manggarai', 2),
(5311, '53', 'Kab. Sumba Timur', 2),
(5312, '53', 'Kab. Sumba Barat', 2),
(5313, '53', 'Kab. Lembata', 2),
(5314, '53', 'Kab. Rote Ndao', 2),
(5315, '53', 'Kab. Manggarai Barat', 2),
(5316, '53', 'Kab. Nagekeo', 2),
(5317, '53', 'Kab. Sumba Tengah', 2),
(5318, '53', 'Kab. Sumba Barat Daya', 2),
(5319, '53', 'Kab. Manggarai Timur', 2),
(5320, '53', 'Kab. Sabu Raijua', 2),
(5321, '53', 'Kab. Malaka', 2),
(5371, '53', 'Kota Kupang', 2),
(6101, '61', 'Kab. Sambas', 2),
(6102, '61', 'Kab. Mempawah', 2),
(6103, '61', 'Kab. Sanggau', 2),
(6104, '61', 'Kab. Ketapang', 2),
(6105, '61', 'Kab. Sintang', 2),
(6106, '61', 'Kab. Kapuas Hulu', 2),
(6107, '61', 'Kab. Bengkayang', 2),
(6108, '61', 'Kab. Landak', 2),
(6109, '61', 'Kab. Sekadau', 2),
(6110, '61', 'Kab. Melawi', 2),
(6111, '61', 'Kab. Kayong Utara', 2),
(6112, '61', 'Kab. Kubu Raya', 2),
(6171, '61', 'Kota Pontianak', 2),
(6172, '61', 'Kota Singkawang', 2),
(6201, '62', 'Kab. Kotawaringin Barat', 2),
(6202, '62', 'Kab. Kotawaringin Timur', 2),
(6203, '62', 'Kab. Kapuas', 2),
(6204, '62', 'Kab. Barito Selatan', 2),
(6205, '62', 'Kab. Barito Utara', 2),
(6206, '62', 'Kab. Katingan', 2),
(6207, '62', 'Kab. Seruyan', 2),
(6208, '62', 'Kab. Sukamara', 2),
(6209, '62', 'Kab. Lamandau', 2),
(6210, '62', 'Kab. Gunung Mas', 2),
(6211, '62', 'Kab. Pulang Pisau', 2),
(6212, '62', 'Kab. Murung Raya', 2),
(6213, '62', 'Kab. Barito Timur', 2),
(6271, '62', 'Kota Palangkaraya', 2),
(6301, '63', 'Kab. Tanah Laut', 2),
(6302, '63', 'Kab. Kotabaru', 2),
(6303, '63', 'Kab. Banjar', 2),
(6304, '63', 'Kab. Barito Kuala', 2),
(6305, '63', 'Kab. Tapin', 2),
(6306, '63', 'Kab. Hulu Sungai Selatan', 2),
(6307, '63', 'Kab. Hulu Sungai Tengah', 2),
(6308, '63', 'Kab. Hulu Sungai Utara', 2),
(6309, '63', 'Kab. Tabalong', 2),
(6310, '63', 'Kab. Tanah Bumbu', 2),
(6311, '63', 'Kab. Balangan', 2),
(6371, '63', 'Kota Banjarmasin', 2),
(6372, '63', 'Kota Banjarbaru', 2),
(6401, '64', 'Kab. Paser', 2),
(6402, '64', 'Kab. Kutai Kartanegara', 2),
(6403, '64', 'Kab. Berau', 2),
(6407, '64', 'Kab. Kutai Barat', 2),
(6408, '64', 'Kab. Kutai Timur', 2),
(6409, '64', 'Kab. Penajam Paser Utara', 2),
(6411, '64', 'Kab. Mahakam Ulu', 2),
(6471, '64', 'Kota Balikpapan', 2),
(6472, '64', 'Kota Samarinda', 2),
(6474, '64', 'Kota Bontang', 2),
(6501, '65', 'Kab. Bulungan', 2),
(6502, '65', 'Kab. Malinau', 2),
(6503, '65', 'Kab. Nunukan', 2),
(6504, '65', 'Kab. Tana Tidung', 2),
(6571, '65', 'Kota Tarakan', 2),
(7101, '71', 'Kab. Bolaang Mongondow', 2),
(7102, '71', 'Kab. Minahasa', 2),
(7103, '71', 'Kab. Kepulauan Sangihe', 2),
(7104, '71', 'Kab. Kepulauan Talaud', 2),
(7105, '71', 'Kab. Minahasa Selatan', 2),
(7106, '71', 'Kab. Minahasa Utara', 2),
(7107, '71', 'Kab. Minahasa Tenggara', 2),
(7108, '71', 'Kab. Bolaang Mongondow Utara', 2),
(7109, '71', 'Kab. Kep. Siau Tagulandang Biaro', 2),
(7110, '71', 'Kab. Bolaang Mongondow Timur', 2),
(7111, '71', 'Kab. Bolaang Mongondow Selatan', 2),
(7171, '71', 'Kota Manado', 2),
(7172, '71', 'Kota Bitung', 2),
(7173, '71', 'Kota Tomohon', 2),
(7174, '71', 'Kota Kotamobagu', 2),
(7201, '72', 'Kab. Banggai', 2),
(7202, '72', 'Kab. Poso', 2),
(7203, '72', 'Kab. Donggala', 2),
(7204, '72', 'Kab. Toli Toli', 2),
(7205, '72', 'Kab. Buol', 2),
(7206, '72', 'Kab. Morowali', 2),
(7207, '72', 'Kab. Banggai Kepulauan', 2),
(7208, '72', 'Kab. Parigi Moutong', 2),
(7209, '72', 'Kab. Tojo Una Una', 2),
(7210, '72', 'Kab. Sigi', 2),
(7211, '72', 'Kab. Banggai Laut', 2),
(7212, '72', 'Kab. Morowali Utara', 2),
(7271, '72', 'Kota Palu', 2),
(7301, '73', 'Kab. Kepulauan Selayar', 2),
(7302, '73', 'Kab. Bulukumba', 2),
(7303, '73', 'Kab. Bantaeng', 2),
(7304, '73', 'Kab. Jeneponto', 2),
(7305, '73', 'Kab. Takalar', 2),
(7306, '73', 'Kab. Gowa', 2),
(7307, '73', 'Kab. Sinjai', 2),
(7308, '73', 'Kab. Bone', 2),
(7309, '73', 'Kab. Maros', 2),
(7310, '73', 'Kab. Pangkajene Kepulauan', 2),
(7311, '73', 'Kab. Barru', 2),
(7312, '73', 'Kab. Soppeng', 2),
(7313, '73', 'Kab. Wajo', 2),
(7314, '73', 'Kab. Sidenreng Rappang', 2),
(7315, '73', 'Kab. Pinrang', 2),
(7316, '73', 'Kab. Enrekang', 2),
(7317, '73', 'Kab. Luwu', 2),
(7318, '73', 'Kab. Tana Toraja', 2),
(7322, '73', 'Kab. Luwu Utara', 2),
(7324, '73', 'Kab. Luwu Timur', 2),
(7326, '73', 'Kab. Toraja Utara', 2),
(7371, '73', 'Kota Makassar', 2),
(7372, '73', 'Kota Pare Pare', 2),
(7373, '73', 'Kota Palopo', 2),
(7401, '74', 'Kab. Kolaka', 2),
(7402, '74', 'Kab. Konawe', 2),
(7403, '74', 'Kab. Muna', 2),
(7404, '74', 'Kab. Buton', 2),
(7405, '74', 'Kab. Konawe Selatan', 2),
(7406, '74', 'Kab. Bombana', 2),
(7407, '74', 'Kab. Wakatobi', 2),
(7408, '74', 'Kab. Kolaka Utara', 2),
(7409, '74', 'Kab. Konawe Utara', 2),
(7410, '74', 'Kab. Buton Utara', 2),
(7411, '74', 'Kab. Kolaka Timur', 2),
(7412, '74', 'Kab. Konawe Kepulauan', 2),
(7413, '74', 'Kab. Muna Barat', 2),
(7414, '74', 'Kab. Buton Tengah', 2),
(7415, '74', 'Kab. Buton Selatan', 2),
(7471, '74', 'Kota Kendari', 2),
(7472, '74', 'Kota Bau Bau', 2),
(7501, '75', 'Kab. Gorontalo', 2),
(7502, '75', 'Kab. Boalemo', 2),
(7503, '75', 'Kab. Bone Bolango', 2),
(7504, '75', 'Kab. Pahuwato', 2),
(7505, '75', 'Kab. Gorontalo Utara', 2),
(7571, '75', 'Kota Gorontalo', 2),
(7601, '76', 'Kab. Mamuju Utara', 2),
(7602, '76', 'Kab. Mamuju', 2),
(7603, '76', 'Kab. Mamasa', 2),
(7604, '76', 'Kab. Polewali Mandar', 2),
(7605, '76', 'Kab. Majene', 2),
(7606, '76', 'Kab. Mamuju Tengah', 2),
(8101, '81', 'Kab. Maluku Tengah', 2),
(8102, '81', 'Kab. Maluku Tenggara', 2),
(8103, '81', 'Kab Maluku Tenggara Barat', 2),
(8104, '81', 'Kab. Buru', 2),
(8105, '81', 'Kab. Seram Bagian Timur', 2),
(8106, '81', 'Kab. Seram Bagian Barat', 2),
(8107, '81', 'Kab. Kepulauan Aru', 2),
(8108, '81', 'Kab. Maluku Barat Daya', 2),
(8109, '81', 'Kab. Buru Selatan', 2),
(8171, '81', 'Kota Ambon', 2),
(8172, '81', 'Kota Tual', 2),
(8201, '82', 'Kab. Halmahera Barat', 2),
(8202, '82', 'Kab. Halmahera Tengah', 2),
(8203, '82', 'Kab. Halmahera Utara', 2),
(8204, '82', 'Kab. Halmahera Selatan', 2),
(8205, '82', 'Kab. Kepulauan Sula', 2),
(8206, '82', 'Kab. Halmahera Timur', 2),
(8207, '82', 'Kab. Pulau Morotai', 2),
(8208, '82', 'Kab. Pulau Taliabu', 2),
(8271, '82', 'Kota Ternate', 2),
(8272, '82', 'Kota Tidore Kepulauan', 2),
(9101, '91', 'Kab. Merauke', 2),
(9102, '91', 'Kab. Jayawijaya', 2),
(9103, '91', 'Kab. Jayapura', 2),
(9104, '91', 'Kab. Nabire', 2),
(9105, '91', 'Kab. Kepulauan Yapen', 2),
(9106, '91', 'Kab. Biak Numfor', 2),
(9107, '91', 'Kab. Puncak Jaya', 2),
(9108, '91', 'Kab. Paniai', 2),
(9109, '91', 'Kab. Mimika', 2),
(9110, '91', 'Kab. Sarmi', 2),
(9111, '91', 'Kab. Keerom', 2),
(9112, '91', 'Kab Pegunungan Bintang', 2),
(9113, '91', 'Kab. Yahukimo', 2),
(9114, '91', 'Kab. Tolikara', 2),
(9115, '91', 'Kab. Waropen', 2),
(9116, '91', 'Kab. Boven Digoel', 2),
(9117, '91', 'Kab. Mappi', 2),
(9118, '91', 'Kab. Asmat', 2),
(9119, '91', 'Kab. Supiori', 2),
(9120, '91', 'Kab. Mamberamo Raya', 2),
(9121, '91', 'Kab. Mamberamo Tengah', 2),
(9122, '91', 'Kab. Yalimo', 2),
(9123, '91', 'Kab. Lanny Jaya', 2),
(9124, '91', 'Kab. Nduga', 2),
(9125, '91', 'Kab. Puncak', 2),
(9126, '91', 'Kab. Dogiyai', 2),
(9127, '91', 'Kab. Intan Jaya', 2),
(9128, '91', 'Kab. Deiyai', 2),
(9171, '91', 'Kota Jayapura', 2),
(9201, '92', 'Kab. Sorong', 2),
(9202, '92', 'Kab. Manokwari', 2),
(9203, '92', 'Kab. Fak Fak', 2),
(9204, '92', 'Kab. Sorong Selatan', 2),
(9205, '92', 'Kab. Raja Ampat', 2),
(9206, '92', 'Kab. Teluk Bintuni', 2),
(9207, '92', 'Kab. Teluk Wondama', 2),
(9208, '92', 'Kab. Kaimana', 2),
(9209, '92', 'Kab. Tambrauw', 2),
(9210, '92', 'Kab. Maybrat', 2),
(9211, '92', 'Kab. Manokwari Selatan', 2),
(9212, '92', 'Kab. Pegunungan Arfak', 2),
(9271, '92', 'Kota Sorong', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tujuan_ssppd`
--

CREATE TABLE `tujuan_ssppd` (
  `id` int(5) UNSIGNED NOT NULL,
  `tujuan` varchar(40) DEFAULT NULL,
  `ket` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` bigint(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` int(5) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bidang_id` int(5) DEFAULT NULL,
  `screate` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `role_id`, `created_at`, `updated_at`, `bidang_id`, `screate`, `username`) VALUES
(3, 33333, 'Andes', 'fayolla@gmail.com', NULL, '$2y$10$D4FrOJZmX82BhFc9RNGNJut86SdValYjs5s6wxvSn8jYaEnSZlWVa', '3PNVC1LYuTGfWcUEnGgVKDpTe79M8oj8bQ3EGIUthIK5pkeoTNLwW1mpQGKl', 3, '2020-03-23 08:24:03', '2020-04-02 09:15:58', 1, 'admin', 'betonucon'),
(9, NULL, 'Furkon Fajri', 'uconbeton@gmail.com', NULL, '$2y$10$HW3.MQ5mU7UNREuFUqpWEeL68ICv6YsvkcuQ5XG3If5o9eRKM3iim', NULL, 3, '2020-04-02 08:38:25', '2020-04-02 08:38:25', 1, 'admin', 'uconbeton'),
(10, NULL, 'Mr. Beton', 'betonucon@gmail.com', NULL, '$2y$10$lUlytjhF4djckwf0tCDZFe1BrRL2vY/x7qTondEvaGBQk6MGlCU5O', 'BdcSSm5T3oLzSwesZ06Nq49KavvwARS2fhl2AmHHpM926TPXwgcbOQ2EyZ0n', 2, '2020-04-02 08:39:07', '2020-04-02 08:39:07', 1, 'admin', 'betonucon');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `angkutan`
--
ALTER TABLE `angkutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_surat_tugas`
--
ALTER TABLE `detail_surat_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `domlak`
--
ALTER TABLE `domlak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`golongan`);

--
-- Indexes for table `has_role`
--
ALTER TABLE `has_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa_perjalanan`
--
ALTER TABLE `jasa_perjalanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_sppd`
--
ALTER TABLE `jenis_sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sct_id` (`sct_id`),
  ADD KEY `active` (`active`),
  ADD KEY `title` (`title`),
  ADD KEY `jumlah` (`jumlah`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sct_id` (`sct_id`),
  ADD KEY `active` (`active`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nip` (`nip`),
  ADD KEY `golongan` (`golongan`);

--
-- Indexes for table `permision`
--
ALTER TABLE `permision`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_sppd`
--
ALTER TABLE `riwayat_sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tblsiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `tblsiswa_email_unique` (`email`);

--
-- Indexes for table `tujuan_sppd`
--
ALTER TABLE `tujuan_sppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tujuan_ssppd`
--
ALTER TABLE `tujuan_ssppd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akses`
--
ALTER TABLE `akses`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `angkutan`
--
ALTER TABLE `angkutan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_surat_tugas`
--
ALTER TABLE `detail_surat_tugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `domlak`
--
ALTER TABLE `domlak`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employe`
--
ALTER TABLE `employe`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `has_role`
--
ALTER TABLE `has_role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=695;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jasa_perjalanan`
--
ALTER TABLE `jasa_perjalanan`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jenis_sppd`
--
ALTER TABLE `jenis_sppd`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT for table `permision`
--
ALTER TABLE `permision`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `riwayat_sppd`
--
ALTER TABLE `riwayat_sppd`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_tugas`
--
ALTER TABLE `surat_tugas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `tblsiswa`
--
ALTER TABLE `tblsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tujuan_sppd`
--
ALTER TABLE `tujuan_sppd`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9272;

--
-- AUTO_INCREMENT for table `tujuan_ssppd`
--
ALTER TABLE `tujuan_ssppd`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
