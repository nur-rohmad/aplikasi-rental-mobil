-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 04:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(15) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `foto` varchar(60) DEFAULT NULL,
  `role` enum('admin','pengguna') NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id`, `nama`, `username`, `password`, `foto`, `role`, `deleted_at`) VALUES
(4, 'Administrator', 'admin', '$2y$10$tf2VKfD.kjhXFc16fbaNY.EvtMhvhb8iYFWvHVr5MURTg443VwmIm', 'administrator-1579273408.png', 'admin', NULL),
(5, 'Fakhrul Fanani Nugroho', 'nugrohoff', '$2y$10$MzYgUN41HVHtmLixc40jxuBwXbstCYqeCxMTitlUsTcEIO8KdN.Su', 'fakhrul-fanani-nugroho-1579279638.jpg', 'admin', '2022-06-16 08:39:17'),
(6, 'rohmad', 'rohmad', '$2y$10$tf2VKfD.kjhXFc16fbaNY.EvtMhvhb8iYFWvHVr5MURTg443VwmIm', 'administrator-1579273408.png', 'pengguna', '2022-06-16 08:39:21'),
(12, 'hendrik', 'hendrik', '$2y$10$tf2VKfD.kjhXFc16fbaNY.EvtMhvhb8iYFWvHVr5MURTg443VwmIm', 'administrator-1579273408.png', 'pengguna', '2022-06-16 08:39:25'),
(15, 'bagus', 'bagus', '$2y$10$Vz4noA7H3DA/qXeT7DoVRuaV3WwZGwE642qAdxeAC6fHAkshk1VZa', 'default.png', 'pengguna', '2022-06-16 08:39:29'),
(16, 'admin', 'admin2', '$2y$10$ooPzs7U2cyQDPzgzKLWk/eBHJZQ9Rh0n0iQv.xJjJ/QFKausDZ7Ta', 'default.png', 'admin', NULL),
(17, 'nando', 'nando', '$2y$10$7nro1nwP/Cxufje8Wzs.euEoNy5WgiWHP6IUGlwLOXldN4DMlyp5W', 'default.png', 'pengguna', '2022-06-16 08:39:37'),
(18, 'heiho', 'heiho', '$2y$10$VSPuvKf/rn/O/xK6Q7DKpe4/dZHE6qOskVzNVpHhXDpEtzQeeml6K', 'default.png', 'pengguna', '2022-06-16 08:39:41'),
(19, 'baru123', 'baru', '$2y$10$TTIAjS8FUnuuQSZy7g4wA.w1LVMzygzXI6WOQ7qURxIcwrNVpJeqC', 'default.png', 'pengguna', '2022-06-16 08:39:47'),
(20, 'sembarang', 'sembarang', '$2y$10$dJ0L0KwdDxL.RN3qBhreXOgAVD2vwzhdkXokjcwuVdK6V1IDLqrLa', 'default.png', 'pengguna', '2022-06-16 04:10:55'),
(21, 'Nando', 'nando123', '$2y$10$UptieqZxmsIxZsKJKoijbeJlxlhVvopHoB8DsB1VAOP4uzhsAzJ76', 'default.png', 'pengguna', NULL),
(22, 'contoh111', 'contoh111', '$2y$10$LVWDlBh/BHchvFGElBr.wOUq9tBL3AtlgBcuwNyKEDA2tep585Kpy', 'default.png', 'pengguna', NULL),
(23, 'Nanang Junaedi', 'nanang', '$2y$10$yjaAuw62Vxk4KQAWBIbZvuMTEyWOWuO3x8PBkSTf95k7J6DROGFUW', 'default.png', 'pengguna', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_merk`
--

CREATE TABLE `tbl_merk` (
  `id_merek` int(11) NOT NULL,
  `merk` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_merk`
--

INSERT INTO `tbl_merk` (`id_merek`, `merk`) VALUES
(8, 'Toyota'),
(9, 'Daihatzu'),
(12, 'Honda'),
(13, 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id` int(11) NOT NULL,
  `nama_mobil` varchar(30) DEFAULT NULL,
  `warna` varchar(20) DEFAULT NULL,
  `no_polisi` varchar(10) DEFAULT NULL,
  `jumlah_kursi` int(1) DEFAULT NULL,
  `tahun_beli` int(4) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_merk` int(11) DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `denda` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id`, `nama_mobil`, `warna`, `no_polisi`, `jumlah_kursi`, `tahun_beli`, `gambar`, `id_merk`, `harga`, `denda`) VALUES
(14, 'Toyota Kijang Innova', 'Hitam', 'AG 1980 KS', 7, 2020, '14-1655361227.png', 8, 650000, 5000),
(17, ' Toyota Avanza', 'Hitam', 'AG 1501 PP', 7, 2019, '17-1655361276.jpg', 8, 350000, 35000),
(18, 'Daihatsu GrandMax', 'Silver', 'AG 2264 BS', 6, 2017, '18-1655361359.jpg', 9, 250000, 50000),
(19, 'Daihatsu GrandMax PickUp', 'Hitam', 'AG 7588 OP', 3, 2015, '19-1655361426.jpg', 9, 300000, 20000),
(20, 'APV', 'Hitam', 'AG 2345 JJ', 7, 2017, '20-1658800706.jpg', 13, 150, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pemesan`
--

CREATE TABLE `tbl_pemesan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `nama_pemesan` varchar(50) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `foto_ktp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pemesan`
--

INSERT INTO `tbl_pemesan` (`id`, `id_user`, `nama_pemesan`, `alamat`, `jenis_kelamin`, `foto`, `foto_ktp`) VALUES
(1, NULL, 'Heru Sukajan t', 'Desa Papar', 'L', '1-1659443943.jpg', 'ktp-1-1659446988.png'),
(17, 21, 'Nando', 'Kediri', 'L', '17-1660101577.png', 'ktp-17-1659444779.jpg'),
(18, 22, 'contoh111', 'aspal', 'L', 'default.png', ''),
(19, NULL, 'Bagas', 'madiun', 'L', '19-1658800840.png', ''),
(20, 23, 'Nanang Junaedi', 'madiun', 'L', 'default.png', 'ktp-20-1659448836.jpg'),
(21, NULL, 'desi', 'madiun', 'L', '21-1658802938.jpg', ''),
(22, NULL, 'asasasa', 'asdsa', 'L', '22-1658804918.jpg', ''),
(23, NULL, 'Paijo', 'ngawi', 'P', '23-1659445980.jpg', 'ktp-23-1659446134.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pesanan`
--

CREATE TABLE `tbl_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `no_pesanan` varchar(15) NOT NULL,
  `tgl_pinjam` datetime DEFAULT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `id_pemesan` int(11) DEFAULT NULL,
  `id_mobil` int(11) DEFAULT NULL,
  `total_harga` int(11) NOT NULL,
  `harga_sewa` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `status_sewa` enum('selesai','belum selesai') DEFAULT 'belum selesai',
  `tujuan` varchar(200) DEFAULT NULL,
  `perihal` varchar(150) DEFAULT NULL,
  `lama_keterlambatan` int(11) DEFAULT NULL,
  `jumlah_denda` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `tgl_pengembalian` datetime DEFAULT NULL,
  `status_sopir` enum('tanpa_sopir','dengan_sopir') DEFAULT NULL,
  `sopir_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_pesanan`
--

INSERT INTO `tbl_pesanan` (`id_pesanan`, `no_pesanan`, `tgl_pinjam`, `tgl_kembali`, `id_pemesan`, `id_mobil`, `total_harga`, `harga_sewa`, `lama_sewa`, `status_sewa`, `tujuan`, `perihal`, `lama_keterlambatan`, `jumlah_denda`, `total_bayar`, `tgl_pengembalian`, `status_sopir`, `sopir_by`) VALUES
(43, 'BR-0208223972', '2022-08-02 22:10:00', '2022-08-02 23:10:00', 1, 17, 350000, 350000, 6, 'belum selesai', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'BR-0208227322', '2022-08-01 10:00:00', '2022-08-03 10:00:00', 17, 14, 5200000, 650000, 48, 'selesai', NULL, NULL, 11, 55000, 5255000, '2022-08-03 20:37:00', NULL, NULL),
(45, 'BR-0308225557', '2022-08-07 09:24:00', '2022-08-08 09:24:00', 17, 14, 2600000, 650000, 24, 'selesai', 'Ngawi', 'mantenan', 10, 50000, 2650000, '2022-08-08 19:49:00', NULL, NULL),
(46, 'BR-0308229847', '2022-08-03 19:28:00', '2022-08-04 19:28:00', 1, 17, 1400000, 350000, 24, 'selesai', 'Madiun', 'Wissata', 15, 525000, 1925000, '2022-08-05 10:51:00', NULL, NULL),
(47, 'BR-0408228061', '2022-08-05 21:50:00', '2022-08-06 21:50:00', 17, 18, 1200000, 250000, 24, 'selesai', 'kediri', 'Mantenan', 1, 50000, 1250000, '2022-08-06 22:22:00', 'dengan_sopir', 2),
(49, 'BR-0408228693', '2022-08-04 22:41:00', '2022-08-13 22:41:00', 17, 19, 12600000, 300000, 216, 'belum selesai', 'Sumatra', 'Wisata', NULL, NULL, NULL, NULL, 'dengan_sopir', 1),
(50, 'BR-0508221669', '2022-08-05 10:23:00', '2022-08-06 10:23:00', 17, 17, 1600000, 350000, 24, 'belum selesai', 'asdad', 'sdsds', NULL, NULL, NULL, NULL, 'dengan_sopir', 2),
(51, 'BR-0508227977', '2022-08-28 10:50:00', '2022-08-29 10:50:00', 17, 19, 1400000, 300000, 24, 'belum selesai', 'ngawi', 'wisata', NULL, NULL, NULL, NULL, 'dengan_sopir', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sopir`
--

CREATE TABLE `tbl_sopir` (
  `id_sopir` int(11) NOT NULL,
  `nama_sopir` varchar(100) DEFAULT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `no_hp` varchar(13) DEFAULT NULL,
  `alamat_sopir` varchar(50) DEFAULT NULL,
  `foto_sopir` varchar(100) DEFAULT NULL,
  `foto_ktp` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sopir`
--

INSERT INTO `tbl_sopir` (`id_sopir`, `nama_sopir`, `jenis_kelamin`, `no_hp`, `alamat_sopir`, `foto_sopir`, `foto_ktp`) VALUES
(1, 'supriadi', 'L', '56464646456', 'ngawi ', 'sp-24-1659540121.png', 'ktp-1-1660100925.png'),
(2, 'bambang', 'L', '2323', 'madiun', 'sp-2-1659540458.png', 'ktp-2-1660100639.png'),
(3, 'baba', 'L', '0877662332', 'ngawi', 'sp-3-1659670384.png', NULL),
(4, 'Bagus', 'L', '90770997069', 'Ngawi', 'sp-4-1660100887.png', 'ktp-4-1660100887.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tbl_mobil_ibfk_2` (`id_merk`);

--
-- Indexes for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pemesan` (`id_pemesan`),
  ADD KEY `id_mobil` (`id_mobil`);

--
-- Indexes for table `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  ADD PRIMARY KEY (`id_sopir`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_merk`
--
ALTER TABLE `tbl_merk`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `tbl_sopir`
--
ALTER TABLE `tbl_sopir`
  MODIFY `id_sopir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD CONSTRAINT `tbl_mobil_ibfk_2` FOREIGN KEY (`id_merk`) REFERENCES `tbl_merk` (`id_merek`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tbl_pemesan`
--
ALTER TABLE `tbl_pemesan`
  ADD CONSTRAINT `tbl_pemesan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_akun` (`id`);

--
-- Constraints for table `tbl_pesanan`
--
ALTER TABLE `tbl_pesanan`
  ADD CONSTRAINT `tbl_pesanan_ibfk_1` FOREIGN KEY (`id_pemesan`) REFERENCES `tbl_pemesan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_pesanan_ibfk_2` FOREIGN KEY (`id_mobil`) REFERENCES `tbl_mobil` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
