-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2021 at 12:38 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_masjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_akun`
--

CREATE TABLE `tbl_akun` (
  `id_admin` int(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_akun`
--

INSERT INTO `tbl_akun` (`id_admin`, `username`, `password`) VALUES
(1, 'rehan', '$2y$10$OjVcGLju2zhoR8r91gjpv.loU7mPkCaXomAicPsW9nCgWTtmHRMfO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keuangan`
--

CREATE TABLE `tbl_keuangan` (
  `id_keuangan` int(30) NOT NULL,
  `id_admin` int(30) NOT NULL,
  `tipe_organisasi` varchar(30) NOT NULL,
  `tipe_pencatatan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `nominal` int(30) NOT NULL,
  `berkas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  ADD PRIMARY KEY (`id_keuangan`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_akun`
--
ALTER TABLE `tbl_akun`
  MODIFY `id_admin` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  MODIFY `id_keuangan` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  ADD CONSTRAINT `tbl_keuangan_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `tbl_akun` (`id_admin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
