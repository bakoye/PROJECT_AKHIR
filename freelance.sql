-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 12:26 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `freelance`
--

-- --------------------------------------------------------

--
-- Table structure for table `buat_lowongan`
--

CREATE TABLE `buat_lowongan` (
  `perusahaan_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `bidang_pekerjaan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `persyaratan` varchar(255) NOT NULL,
  `gaji` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buat_lowongan`
--

INSERT INTO `buat_lowongan` (`perusahaan_id`, `nama_perusahaan`, `judul`, `kota`, `provinsi`, `alamat`, `bidang_pekerjaan`, `deskripsi`, `persyaratan`, `gaji`) VALUES
(1, 'Bakoye corp', 'Konsultan IT', 'Bandung', 'Jawa Barat', 'jl. BBC 107B, Sukapra', 'Industri kreatif', 'memang beda, ', 'yang penting yakin', ''),
(2, 'Telkom Indonesia Tbk', 'Konsultan IT', 'Bandung', 'Jawa Barat', 'Jl.Dipatiukur', 'Konsultan IT', 'dibutuhkan Segera', 'Laki-laki / perempuan min usia 25\r\nminimal SMA/SMK sederajat', '1500000'),
(3, 'kesultanan IT', 'Programmer IT', 'indramayu', 'Jawa Barat', 'Jl.Letnan Joni', 'Programmer IT', 'Dibutuhkan segra', 'Minimal bisa 3 bahasa pemrograman', '2000000'),
(4, 'Sistem informasi', 'Programmer IT', 'Bandung', 'Jawa Barat', 'Jl.BBC', 'System Analyst', 'Dibutuhkan', 'Mnimal lulus SMA/SMK', '2000000');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `bidang perusahaan` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `Email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'slamet setiadi riyanto', 'slamet@gmail.com', 'default.jpg', '$2y$10$S9P32OWtowLmwDR6FAQUUOgCwLwOI.SvfnhkxRPKDxgbLTDU3VBRm', 2, 1, 1585647041),
(3, 'sumail', 'dotaimba@gmail.com', 'default.jpg', '$2y$10$zVAWqVpOJlknBnkwvy7QZO6wrMjI8Lb3MBTlvt0JSSU1Xwk2gHdOe', 2, 1, 1585647272),
(4, 'slamet', 'bakoye@gmail.com', 'default.jpg', '$2y$10$FJxBgQxqfXvsM4T2n0Kg9uagi.IVKi39ikLu1vlPZ0W8luIoGQxUi', 2, 1, 1585647614),
(5, 'Fajar Riadi', 'fajar42@gmail.com', 'default.jpg', '$2y$10$C3C4DZ1AUU.p1DpWwALD1eWIoY3V.VgpHwJxmVkZ0v4KnFFTB1SJ2', 2, 1, 1585647956);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'freelance'),
(3, 'perusahaan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buat_lowongan`
--
ALTER TABLE `buat_lowongan`
  ADD PRIMARY KEY (`perusahaan_id`);

--
-- Indexes for table `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buat_lowongan`
--
ALTER TABLE `buat_lowongan`
  MODIFY `perusahaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
