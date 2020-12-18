-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2020 at 12:06 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `punyakuid`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_hilang`
--

CREATE TABLE `barang_hilang` (
  `id_bh` int(5) NOT NULL,
  `id_ktg_barang` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `admin_acc` int(5) NOT NULL,
  `nama_bh` varchar(50) NOT NULL,
  `merk_bh` varchar(20) NOT NULL,
  `tgl_bh` date NOT NULL,
  `lokasi_bh` varchar(50) NOT NULL,
  `penyebab_bh` varchar(50) NOT NULL,
  `pencari_bh` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `pesan_bh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(5) NOT NULL,
  `id_ktg_info` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `judul_info` varchar(100) NOT NULL,
  `isi_info` text NOT NULL,
  `tgl_info` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_ktg_barang` int(5) NOT NULL,
  `ktg_barang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_ktg_barang`, `ktg_barang`) VALUES
(1, 'elektronik'),
(2, 'aksesoris'),
(3, 'fashion');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_info`
--

CREATE TABLE `kategori_info` (
  `id_ktg_info` int(5) NOT NULL,
  `ktg_info` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_info`
--

INSERT INTO `kategori_info` (`id_ktg_info`, `ktg_info`) VALUES
(1, 'tips'),
(2, 'kriminal'),
(3, 'hiburan'),
(8, 'teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(1, 'Yogyakarta'),
(2, 'Solo'),
(3, 'Klaten'),
(4, 'Purworejo');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_user` int(5) NOT NULL,
  `isi_pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id_status` int(11) NOT NULL,
  `ket_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id_status`, `ket_status`) VALUES
(1, 'MENUNGGU PERSETUJUAN'),
(2, 'DITOLAK'),
(3, 'TERBIT'),
(4, 'TERSELESAIKAN');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(15) NOT NULL,
  `gambar_user` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `level`, `gambar_user`) VALUES
(31, 'budi', 'budi@gmail.com', 'budi', '$2y$10$ltovs2nRJUWn9n0yH0XYKO5eJNp293ZE0tX7hyE1xqVv1McKsyiy.', 'user', 'user_dummy.png'),
(32, 'admin', 'admin@gmail.com', 'admin', '$2y$10$V8UWQwyf4ofEH.XggHT2QePDWT0an56UUwT4R3CNLT/jr.tM50doe', 'admin', 'user_dummy.png'),
(34, 'admin2', 'admin2@gmail.com', 'admin2', '$2y$10$TocOw8bN.Qyk8JNWU31h2eUQkI3NFuIb/fgjnOGv5RAWZphOdHrUe', 'admin', '701-zoom bg.jpg'),
(35, 'user', 'user@gmail.com', 'user', '$2y$10$50sW29iKferGCAMmT0qijeq21gMb4t620k2Q.EmG6dXVoUYm/17cK', 'user', 'user_dummy.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD PRIMARY KEY (`id_bh`),
  ADD KEY `id_kategori_barang` (`id_ktg_barang`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kota_on_barang_hilang` (`id_kota`),
  ADD KEY `id_status_on_barang_hilang` (`id_status`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori_info_on_info` (`id_ktg_info`);

--
-- Indexes for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_ktg_barang`);

--
-- Indexes for table `kategori_info`
--
ALTER TABLE `kategori_info`
  ADD PRIMARY KEY (`id_ktg_info`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `id_user_on_pesan` (`id_user`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  MODIFY `id_bh` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_ktg_barang` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_info`
--
ALTER TABLE `kategori_info`
  MODIFY `id_ktg_info` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_hilang`
--
ALTER TABLE `barang_hilang`
  ADD CONSTRAINT `id_kategori_barang` FOREIGN KEY (`id_ktg_barang`) REFERENCES `kategori_barang` (`id_ktg_barang`),
  ADD CONSTRAINT `id_kota_on_barang_hilang` FOREIGN KEY (`id_kota`) REFERENCES `kota` (`id_kota`),
  ADD CONSTRAINT `id_status_on_barang_hilang` FOREIGN KEY (`id_status`) REFERENCES `status` (`id_status`),
  ADD CONSTRAINT `id_user_on_barang_hilang` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `id_kategori_info_on_info` FOREIGN KEY (`id_ktg_info`) REFERENCES `kategori_info` (`id_ktg_info`),
  ADD CONSTRAINT `id_user_on_info` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `id_user_on_pesan` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
