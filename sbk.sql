-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2019 pada 20.13
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sbk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbk_bukti`
--

CREATE TABLE `sbk_bukti` (
  `bukti_id` int(11) NOT NULL,
  `bukti_gambar` text,
  `bukti_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbk_bukti`
--

INSERT INTO `sbk_bukti` (`bukti_id`, `bukti_gambar`, `bukti_date_created`) VALUES
(4, 'every_poison_pokemon_wallpaper__by_dragonsdenda-d5opbm7.jpg', '2019-06-28 00:59:39'),
(5, 'every_normal_pokemon_wallpaper_by_dragonsdenda-d5n3rq1.jpg', '2019-06-28 00:59:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbk_laporan`
--

CREATE TABLE `sbk_laporan` (
  `laporan_id` varchar(20) NOT NULL,
  `laporan_nisn` varchar(20) NOT NULL,
  `laporan_tanggal` date NOT NULL,
  `laporan_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbk_laporan`
--

INSERT INTO `sbk_laporan` (`laporan_id`, `laporan_nisn`, `laporan_tanggal`, `laporan_date_created`) VALUES
('LAP-14462', '12345', '2019-05-16', '2019-05-21 11:54:22'),
('LAP-77114', '14314311', '2018-12-12', '2019-04-25 14:25:14'),
('LAP-78176', '11651103377', '2019-01-15', '2019-04-18 16:02:56'),
('LAP-80470', '116511034577', '2019-04-18', '2019-04-25 15:21:10'),
('LAP-80531', '11651103377', '2019-04-08', '2019-04-25 15:22:11'),
('LAP-80660', '14314311', '2019-04-12', '2019-04-25 15:24:20'),
('LAP-98254', '116511034577', '0000-00-00', '2019-05-03 22:44:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbk_laporan_detail`
--

CREATE TABLE `sbk_laporan_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_laporan_id` varchar(20) NOT NULL,
  `detail_pelanggaran_id` int(11) NOT NULL,
  `detail_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbk_laporan_detail`
--

INSERT INTO `sbk_laporan_detail` (`detail_id`, `detail_laporan_id`, `detail_pelanggaran_id`, `detail_date_created`) VALUES
(1, 'LAP-78176', 58, '2019-04-18 16:02:56'),
(2, 'LAP-78176', 57, '2019-04-18 16:02:56'),
(3, 'LAP-78176', 56, '2019-04-18 16:02:56'),
(4, 'LAP-77114', 17, '2019-04-25 14:25:14'),
(5, 'LAP-77114', 16, '2019-04-25 14:25:14'),
(6, 'LAP-80470', 39, '2019-04-25 15:21:10'),
(7, 'LAP-80470', 38, '2019-04-25 15:21:10'),
(8, 'LAP-80531', 58, '2019-04-25 15:22:11'),
(9, 'LAP-80531', 57, '2019-04-25 15:22:11'),
(10, 'LAP-80531', 56, '2019-04-25 15:22:11'),
(11, 'LAP-80660', 58, '2019-04-25 15:24:20'),
(12, 'LAP-80660', 54, '2019-04-25 15:24:20'),
(13, 'LAP-80660', 35, '2019-04-25 15:24:20'),
(14, 'LAP-80660', 34, '2019-04-25 15:24:20'),
(15, 'LAP-80660', 15, '2019-04-25 15:24:20'),
(16, 'LAP-80660', 14, '2019-04-25 15:24:20'),
(17, 'LAP-98254', 58, '2019-05-03 22:44:14'),
(18, 'LAP-98254', 48, '2019-05-03 22:44:14'),
(25, 'LAP-98254', 7, '2019-05-21 05:59:37'),
(26, 'LAP-98254', 6, '2019-05-21 05:59:37'),
(27, 'LAP-98254', 8, '2019-05-21 06:09:05'),
(28, 'LAP-98254', 9, '2019-05-21 06:09:31'),
(29, 'LAP-14462', 58, '2019-05-21 11:54:22'),
(30, 'LAP-80470', 35, '2019-06-15 23:06:40'),
(31, 'LAP-80470', 37, '2019-06-15 23:07:32'),
(32, 'LAP-80470', 36, '2019-06-15 23:07:32'),
(33, 'LAP-80470', 34, '2019-06-15 23:07:32'),
(34, 'LAP-77114', 13, '2019-06-15 23:23:18'),
(35, 'LAP-77114', 12, '2019-06-15 23:23:18'),
(36, 'LAP-77114', 11, '2019-06-15 23:23:18'),
(37, 'LAP-77114', 10, '2019-06-15 23:23:18'),
(38, 'LAP-77114', 9, '2019-06-15 23:23:18'),
(39, 'LAP-77114', 8, '2019-06-15 23:23:18'),
(40, 'LAP-77114', 7, '2019-06-15 23:23:18'),
(41, 'LAP-77114', 6, '2019-06-15 23:23:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbk_pelanggaran`
--

CREATE TABLE `sbk_pelanggaran` (
  `pelanggaran_id` int(11) NOT NULL,
  `pelanggaran_bentuk` enum('Ringan','Sedang','Berat') NOT NULL,
  `pelanggaran_poin` int(11) NOT NULL,
  `pelanggaran_keterangan` text NOT NULL,
  `pelanggaran_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbk_pelanggaran`
--

INSERT INTO `sbk_pelanggaran` (`pelanggaran_id`, `pelanggaran_bentuk`, `pelanggaran_poin`, `pelanggaran_keterangan`, `pelanggaran_date_created`) VALUES
(6, 'Ringan', 1, 'Terlambat', '2019-04-18 11:26:29'),
(7, 'Ringan', 1, 'Tidak memakai label lokasi sekolah', '2019-04-18 11:27:02'),
(8, 'Ringan', 1, 'Tidak membawa buku Tata Tertib', '2019-04-18 11:28:13'),
(9, 'Ringan', 1, 'Tidak memakai lambang', '2019-04-18 11:28:34'),
(10, 'Ringan', 1, 'Tanpa nama/ memakai nama lain', '2019-04-18 11:28:55'),
(11, 'Ringan', 1, 'Tidak memakai sepatu hitam', '2019-04-18 11:29:11'),
(12, 'Ringan', 1, 'Tidak memakai topi', '2019-04-18 11:29:29'),
(13, 'Ringan', 1, 'Tidak memakai ikat pinggang hitam', '2019-04-18 11:29:50'),
(14, 'Ringan', 1, 'Tidak memakai kaus kaki/ belang', '2019-04-18 11:30:18'),
(15, 'Ringan', 1, 'Tidak membawa tas Taruna', '2019-04-18 11:30:56'),
(16, 'Ringan', 1, 'Menggunakan tali sepatu belang', '2019-04-18 11:31:23'),
(17, 'Ringan', 1, 'Baju keluar', '2019-04-18 11:32:01'),
(18, 'Ringan', 1, 'Lengan baju digulung', '2019-04-18 11:32:19'),
(19, 'Ringan', 1, 'Tidak pakai singlet/rok dalam', '2019-04-18 11:32:45'),
(20, 'Ringan', 1, 'Tidak melaksanakan tugas piket', '2019-04-18 11:33:05'),
(21, 'Ringan', 1, 'Membuang sampah sembarangan', '2019-04-18 11:33:24'),
(22, 'Ringan', 1, 'Celana Cobra/tidak dijahit', '2019-04-18 11:33:47'),
(23, 'Ringan', 1, 'Tidak memakai pakaian olah raga', '2019-04-18 11:34:20'),
(24, 'Sedang', 2, ' Terlambat', '2019-04-18 11:34:53'),
(25, 'Sedang', 2, ' Tidak mengikuti upacara', '2019-04-18 11:35:16'),
(26, 'Sedang', 2, ' Tidak melaksanakan tugas PR', '2019-04-18 11:35:36'),
(27, 'Sedang', 2, 'Keluar pada jam KBM/Cabut', '2019-04-18 11:37:25'),
(28, 'Sedang', 2, 'Rok pendek/diatas lutut/ketat', '2019-04-18 11:37:56'),
(29, 'Sedang', 2, 'Membawa Komik, novel, roman', '2019-04-18 11:38:31'),
(30, 'Sedang', 2, 'Merokok', '2019-04-18 11:38:45'),
(31, 'Sedang', 2, 'Berambut panjang, bercat', '2019-04-18 11:39:26'),
(32, 'Sedang', 2, 'Keluar pekarangan pada jam KBM', '2019-04-18 11:39:53'),
(33, 'Sedang', 2, 'Duduk - duduk di kendaraan yang sedang parkir', '2019-04-18 11:40:37'),
(34, 'Sedang', 2, 'Tidak memakai pakaian seragam', '2019-04-18 11:41:01'),
(35, 'Sedang', 2, 'Tidak melaksanakan piket kelas', '2019-04-18 11:41:26'),
(36, 'Sedang', 2, 'Pria pakaian subang, gelang, cincin', '2019-04-18 11:42:00'),
(37, 'Sedang', 2, 'Wanita pakai subang ganda', '2019-04-18 11:42:24'),
(38, 'Sedang', 2, 'Tidak mengikuti senam', '2019-04-18 11:42:43'),
(39, 'Sedang', 2, 'Ukuran rambut melebihi ketentuan', '2019-04-18 11:43:31'),
(40, 'Berat', 5, 'Berada / Mejeng di plaza', '2019-04-18 11:44:26'),
(41, 'Berat', 5, 'Menulis/ Mencoret meja, kursi, pagar', '2019-04-18 11:45:04'),
(42, 'Berat', 5, 'Menganggu KBM', '2019-04-18 11:45:22'),
(43, 'Berat', 5, 'Tidak menyampaikan Surat peringatan kepada Orang- tua / wali', '2019-04-18 11:46:07'),
(44, 'Berat', 5, 'Berkelahi/Tawuran', '2019-04-18 11:46:29'),
(45, 'Berat', 5, 'Membawa/ memiliki senjata tajam', '2019-04-18 11:46:58'),
(46, 'Berat', 5, 'Berkendaraan bising/ knalpot dibuka', '2019-04-18 11:47:38'),
(47, 'Berat', 5, 'Pelanggaran susila/kesopanan', '2019-04-18 11:48:18'),
(48, 'Berat', 5, 'Membawa mobil tanpa izin', '2019-04-18 11:51:03'),
(49, 'Berat', 10, ' Melawan/ Menghina Guru/ Instruktur/ Karyawan', '2019-04-18 11:51:49'),
(50, 'Berat', 10, 'Pencurian, Penipuan, dan sejenisnya', '2019-04-18 11:52:45'),
(51, 'Berat', 10, 'Perkosaan', '2019-04-18 11:52:58'),
(52, 'Berat', 10, 'Penculikan/ Penyanderaan', '2019-04-18 11:53:14'),
(53, 'Berat', 10, 'Penganiayaan, perjudian, pemerasan', '2019-04-18 11:53:37'),
(54, 'Berat', 10, 'Pengedar/ Pemakai Narkoba', '2019-04-18 11:54:14'),
(55, 'Berat', 10, 'Pengeroyokan/ Pemukulan', '2019-04-18 11:54:41'),
(56, 'Berat', 10, ' Membawa / membaca bacaan gambar porno', '2019-04-18 11:55:09'),
(57, 'Berat', 10, 'Mencemarkan nama baik Sekolah', '2019-04-18 11:55:32'),
(58, 'Berat', 10, 'Melakukan pelanggaran berat diluar lingkungan sekolah', '2019-04-18 11:56:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbk_siswa`
--

CREATE TABLE `sbk_siswa` (
  `siswa_nisn` varchar(20) NOT NULL,
  `siswa_nama` varchar(50) NOT NULL,
  `siswa_alamat` text NOT NULL,
  `siswa_jurusan` enum('Teknik Elektronika','Teknik Geomatika','Teknik Informatika','Teknik Kendaraan ringan','Teknik dan bisnis sepeda motor') NOT NULL,
  `siswa_kelas` int(11) NOT NULL,
  `siswa_agama` enum('Islam','Kristen','Hindu','Budha','Katholik') NOT NULL,
  `siswa_jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `siswa_orang_tua` varchar(100) NOT NULL,
  `siswa_alamat_ortu` varchar(100) NOT NULL,
  `siswa_nohp_ortu` varchar(15) NOT NULL,
  `siswa_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbk_siswa`
--

INSERT INTO `sbk_siswa` (`siswa_nisn`, `siswa_nama`, `siswa_alamat`, `siswa_jurusan`, `siswa_kelas`, `siswa_agama`, `siswa_jenis_kelamin`, `siswa_orang_tua`, `siswa_alamat_ortu`, `siswa_nohp_ortu`, `siswa_date_created`) VALUES
('11651103377', 'Muhammad khairy Dzaky', 'JL. TANJUNG JATI,NO.14', 'Teknik Elektronika', 12, 'Islam', 'Laki-Laki', '', '', '', '2019-04-07 15:51:47'),
('116511034577', 'Muhammad Rizki', 'Jl. Garuda sakti, no.98', 'Teknik Informatika', 12, 'Islam', 'Laki-Laki', 'Muhammad Nazaruddin', 'Jl. Mustamindo', '085833318272', '2019-04-25 12:23:34'),
('12345', 'Bagus', 'disana', 'Teknik Elektronika', 10, 'Islam', 'Laki-Laki', 'adi', 'diasna juga', '1231241', '2019-05-21 11:53:52'),
('14314311', 'Muhammad asyraf muttaqin', 'Jl. MELATI, NO .50', 'Teknik dan bisnis sepeda motor', 11, 'Islam', 'Laki-Laki', 'Muhammad alfaris', 'Jl. Perumahan cipta karya', '082127896792', '2019-04-07 18:13:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sbk_user`
--

CREATE TABLE `sbk_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_nip_nisn` varchar(20) NOT NULL,
  `user_hak_akses` enum('Guru BK','Siswa') NOT NULL,
  `user_date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sbk_user`
--

INSERT INTO `sbk_user` (`user_id`, `user_name`, `user_pass`, `user_nip_nisn`, `user_hak_akses`, `user_date_created`) VALUES
(1, 'Muhammad khairy dzaky', 'e10adc3949ba59abbe56e057f20f883e', '11651103377', 'Guru BK', '2019-05-01 15:10:46'),
(2, 'Jihad', '21232f297a57a5a743894a0e4a801fc3', '11551102648', 'Guru BK', '2019-05-19 12:49:15'),
(3, 'Bagus', 'bcd724d15cde8c47650fda962968f102', '12345', 'Siswa', '2019-05-19 13:02:47');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `sbk_bukti`
--
ALTER TABLE `sbk_bukti`
  ADD PRIMARY KEY (`bukti_id`);

--
-- Indeks untuk tabel `sbk_laporan`
--
ALTER TABLE `sbk_laporan`
  ADD PRIMARY KEY (`laporan_id`),
  ADD KEY `nisn` (`laporan_nisn`);

--
-- Indeks untuk tabel `sbk_laporan_detail`
--
ALTER TABLE `sbk_laporan_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `laporan_id` (`detail_laporan_id`);

--
-- Indeks untuk tabel `sbk_pelanggaran`
--
ALTER TABLE `sbk_pelanggaran`
  ADD PRIMARY KEY (`pelanggaran_id`);

--
-- Indeks untuk tabel `sbk_siswa`
--
ALTER TABLE `sbk_siswa`
  ADD PRIMARY KEY (`siswa_nisn`);

--
-- Indeks untuk tabel `sbk_user`
--
ALTER TABLE `sbk_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `sbk_bukti`
--
ALTER TABLE `sbk_bukti`
  MODIFY `bukti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sbk_laporan_detail`
--
ALTER TABLE `sbk_laporan_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `sbk_pelanggaran`
--
ALTER TABLE `sbk_pelanggaran`
  MODIFY `pelanggaran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `sbk_user`
--
ALTER TABLE `sbk_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
