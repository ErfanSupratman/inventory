-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2015 at 10:04 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
  `IDBARANG` int(11) NOT NULL AUTO_INCREMENT,
  `IDKONDISI` int(11) DEFAULT NULL,
  `IDMERK` int(11) DEFAULT NULL,
  `IDSUMBER` int(11) DEFAULT NULL,
  `IDLOKASI` int(11) DEFAULT NULL,
  `KODEBARANG` varchar(256) NOT NULL,
  `NAMABARANG` varchar(256) NOT NULL,
  `JUMLAHBARANG` int(11) NOT NULL,
  `HARGABARANG` int(11) NOT NULL,
  `TANGGALMASUK` date NOT NULL,
  PRIMARY KEY (`IDBARANG`),
  KEY `FK_ASAL` (`IDSUMBER`),
  KEY `FK_BERADA_PADA` (`IDLOKASI`),
  KEY `fk_IDKONDISI_kondisi_IDKONDISI` (`IDKONDISI`),
  KEY `fk_IDMERK_merk_IDMERK` (`IDMERK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IDBARANG`, `IDKONDISI`, `IDMERK`, `IDSUMBER`, `IDLOKASI`, `KODEBARANG`, `NAMABARANG`, `JUMLAHBARANG`, `HARGABARANG`, `TANGGALMASUK`) VALUES
(1, 1, 1, 1, 1, '3.10.01.02.001', 'Komputer PC', 40, 3000000, '2015-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE IF NOT EXISTS `kondisi` (
  `IDKONDISI` int(11) NOT NULL AUTO_INCREMENT,
  `KODEKONDISI` varchar(10) NOT NULL,
  `NAMAKONDISI` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDKONDISI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

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
  `IDLOKASI` int(11) NOT NULL AUTO_INCREMENT,
  `KODELOKASI` varchar(10) NOT NULL,
  `NAMALOKASI` varchar(256) NOT NULL,
  `LANTAILOKASI` int(11) NOT NULL,
  PRIMARY KEY (`IDLOKASI`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `IDMERK` int(11) NOT NULL AUTO_INCREMENT,
  `NAMAMERK` varchar(256) NOT NULL,
  PRIMARY KEY (`IDMERK`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

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
  `IDSUMBER` int(11) NOT NULL AUTO_INCREMENT,
  `KODESUMBER` varchar(10) NOT NULL,
  `NAMASUMBER` varchar(256) NOT NULL,
  PRIMARY KEY (`IDSUMBER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sumber`
--

INSERT INTO `sumber` (`IDSUMBER`, `KODESUMBER`, `NAMASUMBER`) VALUES
(1, 'EXT', 'Ekstensi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `IDUSERS` int(11) NOT NULL AUTO_INCREMENT,
  `NAMAUSER` varchar(128) NOT NULL,
  `PASSUSER` varchar(256) NOT NULL,
  PRIMARY KEY (`IDUSERS`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`IDUSERS`, `NAMAUSER`, `PASSUSER`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'jumali', '6716faae96ea7e1a17bce13e44d4e112');

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
