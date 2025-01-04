-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 03:52 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` bigint(20) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `kelas` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama`, `kelas`) VALUES
(20230050053, 'muhammad aksyael', 12),
(20230050054, 'abdull', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(150) NOT NULL,
  `tahun_terbit` varchar(4) NOT NULL,
  `isbn` varchar(25) NOT NULL,
  `jumlah_buku` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jumlah_buku`) VALUES
(1, 'Harry Potter', 'J.K. Rowling', 'Blomsbury', '1997', '9796558513', 2),
(17, 'ipa kelas 10', 'saya', 'saya', '2024', '1', 10),
(18, 'ipa kelas 11', 'saya', 'saya', '2024', '2', 10),
(19, 'ipa kelas 12', 'saya', 'saya', '2024', '3', 10),
(20, 'ips kelas 10', 'saya', 'saya', '2024', '', 10),
(21, 'ips kelas 11', 'saya', 'saya', '2024', '', 10),
(22, 'ips kelas 12', 'saya', 'saya', '2024', '', 10),
(23, ' matematika kelas 11', 'saya', 'saya', '2011', '1', 10),
(24, 'Bahasa indonesia kelas 10', 'Joshua mangkusi', 'Gramedia', '2024', '123456', 20),
(25, 'matematika kelas 12', 'saya', 'saya', '2013', '', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id`, `username`, `password`, `level`) VALUES
(1, 'aksyael', '123', 'admin'),
(2, 'dinda', '321', 'admin'),
(9, 'darwis', '321', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(10) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `nis` varchar(20) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal_pinjam` varchar(30) NOT NULL,
  `tanggal_kembali` varchar(30) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `judul`, `nis`, `nama`, `tanggal_pinjam`, `tanggal_kembali`, `status`) VALUES
(55, 'Harry Potter', '20230050054', 'muhammad aksyael', '20-11-2024', '27-11-2024', 'pinjam'),
(56, 'Harry Potter', '20230050057', 'abdull', '29-11-2024', '27-12-2024', 'kembali'),
(57, 'ipa kelas 10', '20230050054', 'muhammad aksyael', '08-12-2024', '15-12-2024', 'kembali'),
(58, 'ipa kelas 10', '2323', 'zahra', '09-12-2024', '16-12-2024', 'kembali'),
(59, 'ipa kelas 10', '2023005', 'taupik hidayat', '09-12-2024', '16-12-2024', 'kembali'),
(60, 'ipa kelas 10', '2023005', 'taupik hidayat', '09-12-2024', '16-12-2024', 'kembali');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
