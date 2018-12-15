-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Des 2018 pada 07.16
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.0.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppn`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `korban` mediumtext NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `judul`, `isi`, `korban`, `lokasi`, `tanggal`) VALUES
(2, 2, 'Gempa Palu', 'Sebagian penduduk sedang sibuk mempersiapkan festival di pantai untuk merayakan hari ulang tahun Kota Palu. Lapak-lapak pedagang sudah berjajar di sepanjang pantai, siap menjual beragam penganan, mulai dari camilan gorengan hingga mi. Di antara mereka adalah putri Irma yang menitipkan anak-anaknya ke sang nenek sehingga dia bisa menikmati perayaan malam itu.\r\n\r\nMatahari mulai tenggelam sehingga teriknya perlahan pudar, berganti dengan sejuknya malam.', 'Korban Luka : 219\r\nHilang : 12\r\nlansia : 11\r\n', 'Donggala, palu', '2018-10-08'),
(3, 3, 'Sulteng Diterpa Tsunami', 'Sekitar 16 kilometer sebelah selatan dari pesisir Kota Palu, para remaja dari sekolah menengah atas asal Kecamatan Sigi Biromaru sedang berada di Gereja Jono Oge untuk mengikuti kajian Alkitab.\r\n\r\nRencananya malam itu mereka akan bersantap bersama, mengadakan permaianan kelompok, dan menonton film sebelum pergi tidur.\r\n\r\nDi Kelurahan Petobo, Ersa Fiona yang berusia 21 bulan sedang bermain dengan kakaknya, Chandra Irawan, 11, sementara sang ibu sedang sibuk mengurus adik mereka yang paling kecil.', 'Hilang = 1000\r\nAnak = 100\r\n', 'Palu', '2018-11-18'),
(4, 2, 'coba coba', 'cilukba', 'luka = 1 ', 'jogjakarta', '2018-12-12'),
(5, 2, 'sibaben', 'uji coba program', 'luka-luka : 0', 'lombok', '2018-08-13'),
(6, 2, 'terserag=', 'APA AJA', 'sedikit 1 aja', 'entah', '2015-09-13'),
(7, 3, 'test123', 'coba tambah', 'meninggal = 10', 'bantul', '2018-12-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(5) NOT NULL,
  `id_berita` int(5) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `jml_donasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `id_berita`, `nama_lengkap`, `total`, `email`, `no_hp`, `metode_pembayaran`, `jml_donasi`) VALUES
(4, 2, 'asd', 50000, 'asd@gmail.com', '6260', 'BCA', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `level` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `user`, `pass`, `level`) VALUES
(1, 'Theodora Mega Novena Prayogo', 'veven', 'veven', 'admin'),
(2, 'Rina Widiana Sari', 'rina', 'rina', 'donatur'),
(3, 'Verina Kristanti Wiyono', 'verina', 'verina', 'pengawas'),
(4, 'widiana', 'widiana', 'widiana', 'donatur'),
(5, 'theodora', 'theodora', 'theodora', 'pengawas'),
(6, 'verinak', 'verinak', 'verinak', 'admin'),
(7, 'kristanti', 'kristanti', 'kristanti', 'admin'),
(8, 'satu', 'satu', 'satu', 'admin'),
(9, 'sari', 'sari', 'sari', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_donatur_berita`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_donatur_berita` (
`id_berita` int(5)
,`judul` varchar(100)
,`jml_donasi` int(10)
,`total` int(10)
,`nama_lengkap` varchar(100)
,`email` varchar(100)
,`no_hp` varchar(13)
,`metode_pembayaran` varchar(100)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_donatur_berita`
--
DROP TABLE IF EXISTS `view_donatur_berita`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_donatur_berita`  AS  select `b`.`id_berita` AS `id_berita`,`b`.`judul` AS `judul`,`d`.`jml_donasi` AS `jml_donasi`,`d`.`total` AS `total`,`d`.`nama_lengkap` AS `nama_lengkap`,`d`.`email` AS `email`,`d`.`no_hp` AS `no_hp`,`d`.`metode_pembayaran` AS `metode_pembayaran` from (`berita` `b` join `donatur` `d`) where (`b`.`id_berita` = `d`.`id_berita`) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `fk_berita_user` (`id_user`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`),
  ADD KEY `fk_donatur_berita` (`id_berita`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_berita_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `donatur`
--
ALTER TABLE `donatur`
  ADD CONSTRAINT `fk_donatur_berita` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
