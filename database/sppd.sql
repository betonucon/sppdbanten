-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Mar 2020 pada 17.30
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

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
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sct_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 0,
  `golongan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(65) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id`, `sct_id`, `active`, `golongan`, `author`) VALUES
(8, 9, 1, 'I/d', 'admin'),
(7, 9, 1, 'I/c', 'admin'),
(6, 9, 1, 'I/b', 'admin'),
(5, 9, 1, 'I/a', 'admin'),
(9, 9, 1, 'II/a', 'admin'),
(10, 9, 1, 'II/b', 'admin'),
(11, 9, 1, 'II/c', 'admin'),
(12, 9, 1, 'II/d', 'admin'),
(13, 9, 1, 'III/a', 'admin'),
(14, 9, 1, 'III/b', 'admin'),
(15, 9, 1, 'III/c', 'admin'),
(16, 9, 1, 'III/d', 'admin'),
(17, 9, 1, 'IV/a', 'admin'),
(18, 9, 1, 'Non PNS', 'admin'),
(34, 9, 1, 'IV/b', 'admin'),
(33, 9, 1, 'IV/c', 'admin'),
(28, 9, 1, 'Wakil Bupati', 'admin'),
(29, 9, 1, 'Bupati', 'admin'),
(30, 9, 1, 'Eselon II/b', 'admin'),
(31, 9, 1, 'Eselon III', 'admin'),
(32, 9, 1, 'Eselon IV', 'admin'),
(35, 9, 1, 'Eselon II/a', 'admin'),
(36, 9, 1, 'Eselon II/c', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
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
  `bidang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `sct_id`, `active`, `nama`, `nip`, `pangkat`, `golongan`, `jabatan`, `nomor_rekening`, `status`, `bidang`) VALUES
(80, 2, 1, 'Drsf. H. Imam Rana Hardiana, M.Si', '19680816 198803 1 004', 'Pembina Tk.I', 'IV/b', 'SAW Bidang SDM dan Kesejahteraan Rakyat', '1212', 1, 'Administrator'),
(79, 2, 1, 'Drs. Heri Hadi', '19700518 199006 1 001', 'Pembina Utama Muda', 'IV/c', 'Staf Ahli Bidang Pemerintahan Hukum dan Politik Setda', '121', NULL, 'Administrator'),
(78, 2, 1, 'Ahmad Saifullah, S.Pd, M.Si', '19720517 199803 1 008', 'Pembina', 'IV/a', 'Kabag Umum dan Perlengkapan', '111', NULL, 'Administrator'),
(76, 2, 1, 'Drs. Komarudin, Ak, MM', '19620303 199102 1 001', 'Pembina Utama Muda', 'IV/c', 'Asisten Administrasi Umum', '123', NULL, 'Administrator'),
(83, 2, 1, 'Dr. H. TB. Urip Henus S, S.Pd, M.Si', '19661019 199112 1 001', 'Pembina Utama Muda', 'IV/c', 'Sekretaris Daerah', '1218', NULL, 'Administrator'),
(81, 2, 1, 'Sumardi, SE', '19651205 198602 1 006', 'Penata Tk. I', 'III/d', 'Kasubag Pemeliharaan Setda', '1112', NULL, 'Administrator'),
(82, 2, 1, 'Ir. H. Joko Sutrisno, MT', '19600323 199003 1 002', 'Pembina Utama Muda', 'IV/c', 'Asisten Ekonomi Pembangunan', '12121', NULL, 'Administrator'),
(84, 2, 1, 'H. SYAFRUDIN, S.Sos, M.Si', '1', 'Walikota', 'Walikota', 'Walikota', '1', NULL, 'Administrator'),
(85, 2, 1, 'H. SUBADRI USULUDIN, SH', '2', 'Wakil Walikota', 'Wakil Walikota', 'Wakil Walikota', '2', NULL, 'Administrator'),
(86, 2, 1, 'Imammudin, S.Kom', '19791020 201001 1 011', 'Penata', 'III/c', 'Kasubag Perlengkapan Setda', '111', NULL, 'Administrator'),
(87, 2, 1, 'Leni Puspasuri Sesunan, MM', '19780921 200902 2 003', 'Penata', 'III/c', 'Kasubag Rumah Tangga', '112', NULL, 'Administrator'),
(88, 2, 1, 'Neneng Nurmaesih', '19720511 200212 2 004', 'Penata Muda', 'III/a', 'Pelaksana', '113', NULL, 'Administrator'),
(89, 2, 1, 'Drs. Budi Martono, M.Si', '19690317 198903 1 004', 'Pembina Tk.I', 'IV/b', 'Kabag TU dan Protokol', '114', NULL, 'Administrator'),
(90, 2, 1, 'Rusma, SE', '19670727 199003 1 016', 'Penata', 'III/c', 'Kasubag TU dan Publikasi Pimpinan', '115', NULL, 'Administrator'),
(91, 2, 1, 'Eko Agung Baskoro, A.Md, Pem', '19700504 199102 1 001', 'Penata Tk. I', 'III/d', 'Kasubag Protokol', '116', NULL, 'Administrator'),
(92, 2, 1, 'Sri Astuti, S.Kom', '19820423 201101 2 002', 'Penata', 'III/c', 'Kasubag TU dan Kepegawaian', '117', NULL, 'Administrator'),
(93, 2, 1, 'Akbar, A.Md. Gz', '19760704 200902 1 002', 'Penata Muda Tk.I', 'III/c', 'Pelaksana', '118', NULL, 'Administrator'),
(94, 2, 1, 'Dra. Hj. Fatmawati, M.Si', 'Pembina Tk.I', 'Pembina Tk.I', 'IV/b', 'Kabag Keuangan', '119', NULL, 'Administrator'),
(95, 2, 1, 'Dra. Hermayantie Purnamasari, MM', '19670211 200604 2 006', 'Penata Tk. I', 'III/d', 'Kasubag Perbendaharaan', '119', NULL, 'Administrator'),
(96, 2, 1, 'Iis Lisnawati, SE, M.Si', '19770509 200902 2 002', 'Penata', 'III/c', 'Kasubag Akuntansi Keuangan', '200', NULL, 'Administrator'),
(97, 2, 1, 'Encep Juweni, SE', '19671009 198603 1 002', 'Penata Tk.I', 'III/d', 'Kasubag PEP Setda', '201', NULL, 'Administrator'),
(98, 2, 1, 'Ida Narwidah', '19680928 200701 2 012', 'Pengatur Tk.I', 'II/d', 'Pelaksana Perbendaharaan', '202', NULL, 'Administrator'),
(99, 2, 1, 'Ade Johaedi', '19660424 198803 1 012', 'Pengatur Tk.I', 'II/d', 'Pelaksana Perbendaharaan', '203', NULL, 'Administrator'),
(100, 2, 1, 'Drs. H. Ahmad Yani, MM', '19670107 199603 1 002', 'Pembina ', 'IV/a', 'Kabag Ekbang', '204', NULL, 'Administrator'),
(101, 2, 1, 'Yulia Hidayat, ST, M.Si', '19770705 200312 2 006', 'Pembina', 'IV/a', 'Kasubag Administrasi Pembangunan', '205', NULL, 'Administrator'),
(102, 2, 1, 'Dionisio Fernandes Dos Santos, S.STP, M.Si', '19790211 199810 1 002', 'Pembina', 'IV/a', 'Kasubag Perumusan Kebijakan Ekonomi Daerah', '206', NULL, 'Administrator'),
(103, 2, 1, 'Eka Surya Miharja, ST.MM', '19780927 201001 1 008', 'Penata', 'III/c', 'Kasubag Bina Ekonomi Kreatif', '206', NULL, 'Administrator'),
(104, 2, 1, 'Dr. Hudori KA, M.Pd', '19640229 198803 1 007', 'Pembina Tk.I', 'IV/b', 'Kabag Administrasi Kesra', '207', NULL, 'Administrator'),
(105, 2, 1, 'Drs. Pansuri Ritonga, MH', '19660202 199303 1 002', 'Pembina Tk.I', 'IV/b', 'Kasubag Keagamaan', '208', NULL, 'Administrator'),
(106, 2, 1, 'Moh. Rahmatullah, S.Pd, M.Si', '19641128 198410 1 003', 'Pembina', 'IV/a', 'Kasubag Kelembagaan Keagamaan', '209', NULL, 'Administrator'),
(107, 2, 1, 'H. Sarif Ahmad, S.Sos, M.Si', '19680214 199010 1 001', 'Pembina', 'IV/a', 'Kasubag Kemasyarakatan', '210', NULL, 'Administrator'),
(108, 2, 1, 'Tendian, S.Pd, SH, MH', '19651110 199302 1 003', 'Pembina Tk.I', 'IV/b', 'Kabag Kerjasama dan Investasi Daerah', '211', NULL, 'Administrator'),
(109, 2, 1, 'Achmad Sujai Zakaria, S.Sos', '19630424 198603 1 018', 'Penata Tk. I', 'III/d', 'Kasubag Kerjasama Daerah', '212', NULL, 'Administrator'),
(110, 2, 1, 'RD. Santi Lestari, S.Sos', '19761227 199803 2 005', 'Penata Tk. I', 'III/d', 'Kasubag Promosi', '213', NULL, 'Administrator'),
(111, 2, 1, 'Irwan Kurnia, SE', '19810316 200902 1 002', 'Penata', 'III/c', 'Kasubag Investasi', '214', NULL, 'Administrator'),
(112, 2, 1, 'Anthon Gunawan, S.Sos, M.Si', '19690712 199010 1 001', 'Pembina Tk.I', 'IV/b', 'Kabag Organisasi dan Reformasi Birokrasi', '215', NULL, 'Administrator'),
(113, 2, 1, 'Leni Marlinah, SH, M.Si', '19820216 201001 2 007', 'Penata', 'III/c', 'Kasubag Ketatalaksanaan dan Pelayanan Publik', '216', NULL, 'Administrator'),
(114, 2, 1, 'Havid, S.IP, M.Si', '19840914 200502 1 001', 'Penata', 'III/c', 'Kasubag Akuntabilitas Kinerja dan Reformasi Birokrasi', '216', NULL, 'Administrator'),
(115, 2, 1, 'Mokh. Nafis Hani, SH', 'Penata', 'Penata', 'III/c', 'Kasubag Kelembagaan dan Analisa Formasi Jabatan', '217', NULL, 'Administrator'),
(116, 2, 1, 'Tedi Kusnadi, S.STP, M.Si', '19760610 199701 1 001', 'Pembina Tk.I', 'IV/b', 'Kabag Pemerintah', '218', NULL, 'Administrator'),
(117, 2, 1, 'Mokhamad Tohir, S.Sos, M.Si', '19680907 199304 1 001', 'Pembina', 'IV/a', 'Kasubag Bina Kecamatan', '219', NULL, 'Administrator'),
(118, 2, 1, 'Dicky Suprayoga, SH, M.Si', '19830103 201101 1 002', 'Penata Tk. I', 'III/d', 'Kasubag Otonomi Daerah Setda', '217', NULL, 'Administrator'),
(119, 2, 1, 'Trisno Budi Prastyo, S.STP', '19800329 199810 1 001', 'Penata', 'III/c', 'Kasubag Pemerintahan Umum', '218', NULL, 'Administrator'),
(120, 2, 1, 'Drs. Subagyo, M.Si', '19740910 199303 1 002', 'Pembina Tk.I', 'IV/b', 'Kabag Hukum', '220', NULL, 'Administrator'),
(121, 2, 1, 'Lily Mushlihat, SH, M.Si', '19740428 200112 2 003', 'Pembina', 'IV/a', 'Kasubag Pengaturan', '221', NULL, 'Administrator'),
(122, 2, 1, 'Marta Satria Subing, SH', '19860310 201101 1 002', 'Penata', 'III/c', 'Kasubag Bantuan Hukum dan HAM', '222', NULL, 'Administrator'),
(123, 2, 1, 'Madiyah, SH', '19820705 201001 2 008', 'Penata', 'III/c', 'Kasubag Penetapan dan Dokumentasi Hukum', '223', NULL, 'Administrator'),
(124, 2, 1, 'Tisna Hari Adi', '001', '-', 'Non PNS', 'Pengawal KDH/WKDH', '224', NULL, 'Administrator'),
(125, 2, 1, 'Handriansyah', '002', '-', 'Non PNS', 'Pengawal KDH/WKDH', '226', NULL, 'Administrator'),
(126, 2, 1, 'Firman Maulana, S.STP', '003', '-', 'Non PNS', 'Pengawal KDH/WKDH', '228', NULL, 'Administrator'),
(127, 2, 1, 'Lili Apriliani', '004', '-', 'Non PNS', 'Sekretaris Walikota', '229', NULL, 'Administrator'),
(128, 2, 1, 'Mas Syukurullah', '005', '-', 'Non PNS', 'Sekretaris Walikota', '229', NULL, 'Administrator'),
(129, 2, 1, 'Ayu Novita Anggraeni', '006', '-', 'Non PNS', 'Sekretaris Walikota', '230', NULL, 'Administrator'),
(130, 2, 1, 'Nuraida', '007', '-', 'Non PNS', 'Sekretaris Walikota', '231', NULL, 'Administrator'),
(131, 2, 1, 'Adis Fuad', '008', '-', 'Non PNS', 'Supir Walikota', '232', NULL, 'Administrator'),
(132, 2, 1, 'Hasan Basri', '009', '-', 'Non PNS', 'Supir Walikota', '233', NULL, 'Administrator'),
(133, 2, 1, 'Septi Zulian', '010', '-', 'Non PNS', 'Supir Walikota', '234', NULL, 'Administrator'),
(134, 2, 1, 'Zulkifli', '011', '-', 'Non PNS', 'Pengawal KDH/WKDH', '235', NULL, 'Administrator'),
(135, 2, 1, 'Yudi Rengga', '012', '-', 'Non PNS', 'Pengawal KDH/WKDH', '237', NULL, 'Administrator'),
(136, 2, 1, 'Agung Miftah Sobarojana', '013', '-', 'Non PNS', 'Pengawal KDH/WKDH', '237', NULL, 'Administrator'),
(137, 2, 1, 'Andi Septian Pamungkas', '014', '-', 'Non PNS', 'Pengawal KDH/WKDH', '238', NULL, 'Administrator'),
(138, 2, 1, 'Muadi', '015', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '239', NULL, 'Administrator'),
(139, 2, 1, 'Megawati', '016', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '239', NULL, 'Administrator'),
(140, 2, 1, 'Ermy Mutiara', '017', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '239', NULL, 'Administrator'),
(141, 2, 1, 'Aldi Syahbana', '018', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '240', NULL, 'Administrator'),
(142, 2, 1, 'Ira Rahayu', '019', '-', 'Non PNS', 'Sekretaris Wakil Walikota', '241', NULL, 'Administrator'),
(143, 2, 1, 'H. Saefudin', '020', '-', 'Non PNS', 'Supir Wakil Walikota', '242', NULL, 'Administrator'),
(144, 2, 1, 'Ewang', '021', '-', 'Non PNS', 'Supir Wakil Walikota', '244', NULL, 'Administrator'),
(145, 2, 1, 'Satibi', '022', '-', 'Non PNS', 'Supir Wakil Walikota', '245', NULL, 'Administrator'),
(146, 0, 0, 'gfdgffdg', NULL, NULL, NULL, NULL, NULL, 1, NULL),
(147, 0, 0, 'gdfgfdg', '4332324234', 'dfgfdgdg', 'Bupati', 'fgdgdfgdfg', '4354354345', 1, NULL),
(148, 0, 0, 'Seosilo', '32133', 'cxzczc', 'IV/a', 'dasdsd', '43244', 1, NULL),
(149, 0, 0, 'dfdssdfsdfsdfsd', 'rtrtret', 'bcbb', 'IV/c', 'vcbbc', 'vbcvb', 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role_id` int(5) DEFAULT NULL,
  `nim` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tblsiswa`
--

CREATE TABLE `tblsiswa` (
  `id` int(11) NOT NULL,
  `nim` bigint(10) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tblsiswa`
--

INSERT INTO `tblsiswa` (`id`, `nim`, `nama`, `email`) VALUES
(1, 44444, 'uconn', '4444@gmail.com'),
(2, 55555, 'cccc', '55555@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nim` bigint(10) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nim`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 11111, 'lista', 'uconbeton@gmail.com', NULL, '$2y$10$Y2HXXT3mnP2WLu039Beg9Ogu/RHsjZCC2QWB0bh.gLldNDRDMBJDC', 'wt2uJPSzOMorPf3Qq80S22zlrds2P7xd0O4MOg6RAs8ljnTRnhBeWDQLPqP2', '2020-03-23 08:19:25', '2020-03-23 08:19:25'),
(2, 22222, 'ola', 'betonucon@gmail.com', NULL, '$2y$10$9EI307ha/fKIqfasJPMAeupKMIH.mrkLQNcy.qIr57I30MW8BcUAy', 'hrNnhmhpoKWR1iftYFJiAEoW1EdxaCUInnVOtgGukeCtdy7997tYCHOKk8OA', '2020-03-23 08:20:58', '2020-03-23 08:20:58'),
(3, 33333, 'fayolla', 'fayolla@gmail.com', NULL, '$2y$10$iMQtf52tkwpqnF8lbjmrKOlnu2Uw2Tmhvgb6V3yv13GDwCEPwgt56', 'CVH9EZWAJtbnCcr8zrlDQXUV4Rq4FvIzT21Y2ONIyDLUOD6pCkHGdqf1P8VO', '2020-03-23 08:24:03', '2020-03-23 08:24:03'),
(4, 55555, 'cccc', '55555@gmail.com', NULL, '$2y$10$s70ADOIc9QkXkUJJK9yX1ubEXBT0kPFk6abCnNZRg4550N3JKsyky', 'qnJVJz3yUddwfNTMwjEhfsaiH9K9TRoLrOV1tluORM6xgcH80BH7TwkVWh7b', '2020-03-23 08:27:55', '2020-03-23 08:27:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sct_id` (`sct_id`),
  ADD KEY `active` (`active`),
  ADD KEY `title` (`golongan`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sct_id` (`sct_id`),
  ADD KEY `active` (`active`),
  ADD KEY `nama` (`nama`),
  ADD KEY `nip` (`nip`),
  ADD KEY `golongan` (`golongan`);

--
-- Indeks untuk tabel `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tblsiswa`
--
ALTER TABLE `tblsiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tblsiswa_nim_unique` (`nim`),
  ADD UNIQUE KEY `tblsiswa_email_unique` (`email`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nim_unique` (`nim`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT untuk tabel `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tblsiswa`
--
ALTER TABLE `tblsiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
