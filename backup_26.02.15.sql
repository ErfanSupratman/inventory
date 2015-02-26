-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2015 at 02:59 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
`IDBARANG` int(11) NOT NULL,
  `IDKONDISI` int(11) DEFAULT NULL,
  `IDMERK` int(11) DEFAULT NULL,
  `IDSUMBER` int(11) DEFAULT NULL,
  `IDLOKASI` int(11) DEFAULT NULL,
  `KODEBARANG` varchar(256) NOT NULL,
  `NAMABARANG` varchar(256) NOT NULL,
  `JUMLAHBARANG` int(11) NOT NULL,
  `HARGABARANG` int(11) NOT NULL,
  `TANGGALMASUK` date NOT NULL,
  `TANGGALSPJ` date NOT NULL,
  `TIPEBARANG` varchar(128) DEFAULT NULL,
  `MERKBARANG` varchar(128) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IDBARANG`, `IDKONDISI`, `IDMERK`, `IDSUMBER`, `IDLOKASI`, `KODEBARANG`, `NAMABARANG`, `JUMLAHBARANG`, `HARGABARANG`, `TANGGALMASUK`, `TANGGALSPJ`, `TIPEBARANG`, `MERKBARANG`) VALUES
(11, 1, NULL, 4, 1, '612354676456', 'Meja Komputer', 11, 1000000, '2015-02-20', '2015-02-22', 'Good', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE IF NOT EXISTS `kondisi` (
`IDKONDISI` int(11) NOT NULL,
  `KODEKONDISI` varchar(10) NOT NULL,
  `NAMAKONDISI` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`IDKONDISI`, `KODEKONDISI`, `NAMAKONDISI`) VALUES
(1, 'B', 'Baik'),
(2, 'RR', 'Rusak Ringan'),
(3, 'RB', 'Rusak Berat');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
`IDLOKASI` int(11) NOT NULL,
  `KODELOKASI` varchar(10) NOT NULL,
  `NAMALOKASI` varchar(256) NOT NULL,
  `LANTAILOKASI` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`IDLOKASI`, `KODELOKASI`, `NAMALOKASI`, `LANTAILOKASI`) VALUES
(1, 'IF307', 'Laboratorium AJK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
`IDMERK` int(11) NOT NULL,
  `NAMAMERK` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`IDMERK`, `NAMAMERK`) VALUES
(1, 'Acer');

-- --------------------------------------------------------

--
-- Table structure for table `sumber`
--

CREATE TABLE IF NOT EXISTS `sumber` (
`IDSUMBER` int(11) NOT NULL,
  `KODESUMBER` varchar(10) NOT NULL,
  `NAMASUMBER` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`IDSUMBER`, `KODESUMBER`, `NAMASUMBER`) VALUES
(2, 'BLU S1', 'BLU S1'),
(3, 'BLU S2', 'BLU S2'),
(4, 'BLU S3', 'BLU S3'),
(5, 'HIBAH', 'HIBAH');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`IDUSERS` int(11) NOT NULL,
  `NAMAUSER` varchar(128) NOT NULL,
  `PASSUSER` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IDUSERS`, `NAMAUSER`, `PASSUSER`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
 ADD PRIMARY KEY (`IDBARANG`), ADD KEY `FK_ASAL` (`IDSUMBER`), ADD KEY `FK_BERADA_PADA` (`IDLOKASI`), ADD KEY `fk_IDKONDISI_kondisi_IDKONDISI` (`IDKONDISI`), ADD KEY `fk_IDMERK_merk_IDMERK` (`IDMERK`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
 ADD PRIMARY KEY (`IDKONDISI`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
 ADD PRIMARY KEY (`IDLOKASI`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
 ADD PRIMARY KEY (`IDMERK`);

--
-- Indexes for table `sumber`
--
ALTER TABLE `sumber`
 ADD PRIMARY KEY (`IDSUMBER`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`IDUSERS`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
MODIFY `IDBARANG` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
MODIFY `IDKONDISI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
MODIFY `IDLOKASI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
MODIFY `IDMERK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sumber`
--
ALTER TABLE `sumber`
MODIFY `IDSUMBER` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `IDUSERS` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
ADD CONSTRAINT `FK_ASAL` FOREIGN KEY (`IDSUMBER`) REFERENCES `sumber` (`IDSUMBER`),
ADD CONSTRAINT `FK_BERADA_PADA` FOREIGN KEY (`IDLOKASI`) REFERENCES `lokasi` (`IDLOKASI`),
ADD CONSTRAINT `fk_IDKONDISI_kondisi_IDKONDISI` FOREIGN KEY (`IDKONDISI`) REFERENCES `kondisi` (`IDKONDISI`) ON DELETE NO ACTION ON UPDATE CASCADE,
ADD CONSTRAINT `fk_IDMERK_merk_IDMERK` FOREIGN KEY (`IDMERK`) REFERENCES `merk` (`IDMERK`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
