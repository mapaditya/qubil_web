-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 12:41 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdamzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` varchar(12) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `username`, `password`, `nama`) VALUES
('B1', 'yudhistiraby', '11111111', 'Bayu'),
('B2', 'galiham', '123456', 'Galih');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(12) NOT NULL,
  `no_pelanggan` int(12) NOT NULL,
  `no_rumah` int(4) NOT NULL,
  `no_kk` int(16) NOT NULL,
  `alamat` varchar(32) NOT NULL,
  `no_telp_rmh` int(12) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `no_pelanggan`, `no_rumah`, `no_kk`, `alamat`, `no_telp_rmh`, `nama`, `username`, `password`, `status`) VALUES
('A1', 1, 1, 301098, 'Garut', 541077, 'Aditya', 'mapaditya', '11111111', 'Rumah'),
('A2', 2, 2, 180799, 'Bandung', 541023, 'Dwiki', 'dwikiray', '11111111', 'Kantor'),
('A3', 3, 3, 100699, 'Padang', 541030, 'Tri', 'trisetya', '11111111', 'Industri'),
('A4', 4, 4, 10199, 'Jakarta', 541001, 'Henny', 'hennytyas', '11111111', 'Rumah');

-- --------------------------------------------------------

--
-- Table structure for table `tarif`
--

CREATE TABLE `tarif` (
  `id_pelanggan` varchar(12) NOT NULL,
  `batasbawahm3` int(4) NOT NULL,
  `batasatasm3` int(4) NOT NULL,
  `tarif_per_m3` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tarif`
--

INSERT INTO `tarif` (`id_pelanggan`, `batasbawahm3`, `batasatasm3`, `tarif_per_m3`) VALUES
('A1', 1, 10, 10000),
('A2', 11, 20, 13000),
('A3', 21, 30, 15000),
('A4', 1, 10, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi_dtl` varchar(16) NOT NULL,
  `id_pelanggan` varchar(12) NOT NULL,
  `id_transaksi` varchar(16) NOT NULL,
  `jmlbln_lalu` int(8) NOT NULL,
  `jmlbln_ini` int(8) NOT NULL,
  `harga_satuanm3` int(8) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `status_bayar` varchar(12) NOT NULL,
  `jumlah_bayar` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi_dtl`, `id_pelanggan`, `id_transaksi`, `jmlbln_lalu`, `jmlbln_ini`, `harga_satuanm3`, `tgl_bayar`, `status_bayar`, `jumlah_bayar`) VALUES
('A1A01', 'A1', 'A01', 0, 20000, 10000, '2019-06-02', 'Sudah Bayar', 30000),
('A2A02', 'A2', 'A02', 13000, 26000, 13000, '2019-06-03', 'Belum Lunas', 39000),
('A3A03', 'A3', 'A03', 15000, 30000, 15000, '2019-06-03', 'Belum Lunas', 45000),
('A4A04', 'A4', 'A04', 20000, 30000, 10000, '2019-06-02', 'Lunas', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_m`
--

CREATE TABLE `transaksi_m` (
  `id_transaksi` varchar(16) NOT NULL,
  `id_operator` varchar(12) NOT NULL,
  `tgl_gen` date NOT NULL,
  `periode` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_m`
--

INSERT INTO `transaksi_m` (`id_transaksi`, `id_operator`, `tgl_gen`, `periode`) VALUES
('A01', 'B1', '2019-05-10', '2019-06-01'),
('A02', 'B2', '2019-05-15', '2019-06-01'),
('A03', 'B2', '2019-05-20', '2019-06-01'),
('A04', 'B1', '2019-05-10', '2019-06-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi_dtl`),
  ADD UNIQUE KEY `id_pelanggan` (`id_pelanggan`),
  ADD UNIQUE KEY `id_transaksi` (`id_transaksi`);

--
-- Indexes for table `transaksi_m`
--
ALTER TABLE `transaksi_m`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_operator` (`id_operator`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi_m` (`id_transaksi`);

--
-- Constraints for table `transaksi_m`
--
ALTER TABLE `transaksi_m`
  ADD CONSTRAINT `transaksi_m_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
