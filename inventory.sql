-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.6.14 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for inventory
CREATE DATABASE IF NOT EXISTS `inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventory`;


-- Dumping structure for table inventory.barang
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
  `TANGGALSPJ` date NOT NULL,
  `TIPEBARANG` varchar(128) DEFAULT NULL,
  `MERKBARANG` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`IDBARANG`),
  KEY `FK_ASAL` (`IDSUMBER`),
  KEY `FK_BERADA_PADA` (`IDLOKASI`),
  KEY `fk_IDKONDISI_kondisi_IDKONDISI` (`IDKONDISI`),
  KEY `fk_IDMERK_merk_IDMERK` (`IDMERK`),
  CONSTRAINT `FK_ASAL` FOREIGN KEY (`IDSUMBER`) REFERENCES `sumber` (`IDSUMBER`),
  CONSTRAINT `FK_BERADA_PADA` FOREIGN KEY (`IDLOKASI`) REFERENCES `lokasi` (`IDLOKASI`),
  CONSTRAINT `fk_IDKONDISI_kondisi_IDKONDISI` FOREIGN KEY (`IDKONDISI`) REFERENCES `kondisi` (`IDKONDISI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_IDMERK_merk_IDMERK` FOREIGN KEY (`IDMERK`) REFERENCES `merk` (`IDMERK`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table inventory.barang: ~2 rows (approximately)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
REPLACE INTO `barang` (`IDBARANG`, `IDKONDISI`, `IDMERK`, `IDSUMBER`, `IDLOKASI`, `KODEBARANG`, `NAMABARANG`, `JUMLAHBARANG`, `HARGABARANG`, `TANGGALMASUK`, `TANGGALSPJ`, `TIPEBARANG`, `MERKBARANG`) VALUES
	(12, 1, NULL, 2, 1, '2.2.2002.2.3', 'Kursi', 100, 500000, '2015-03-16', '2015-03-16', 'barang', 'Chitose'),
	(13, 1, NULL, 2, 1, '2.2.2002.2.2', 'PC', 10, 1500000, '2015-03-16', '2015-03-16', 'Lenovo', 'Lenovo');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;


-- Dumping structure for table inventory.kondisi
CREATE TABLE IF NOT EXISTS `kondisi` (
  `IDKONDISI` int(11) NOT NULL AUTO_INCREMENT,
  `KODEKONDISI` varchar(10) NOT NULL,
  `NAMAKONDISI` varchar(1024) NOT NULL,
  PRIMARY KEY (`IDKONDISI`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table inventory.kondisi: ~3 rows (approximately)
/*!40000 ALTER TABLE `kondisi` DISABLE KEYS */;
REPLACE INTO `kondisi` (`IDKONDISI`, `KODEKONDISI`, `NAMAKONDISI`) VALUES
	(1, 'B', 'Baik'),
	(2, 'RR', 'Rusak Ringan'),
	(3, 'RB', 'Rusak Berat');
/*!40000 ALTER TABLE `kondisi` ENABLE KEYS */;


-- Dumping structure for table inventory.lokasi
CREATE TABLE IF NOT EXISTS `lokasi` (
  `IDLOKASI` int(11) NOT NULL AUTO_INCREMENT,
  `KODELOKASI` varchar(10) NOT NULL,
  `NAMALOKASI` varchar(256) NOT NULL,
  `LANTAILOKASI` int(11) NOT NULL,
  `PJ` varchar(50) NOT NULL,
  `NIP_PJ` varchar(50) NOT NULL,
  PRIMARY KEY (`IDLOKASI`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table inventory.lokasi: ~1 rows (approximately)
/*!40000 ALTER TABLE `lokasi` DISABLE KEYS */;
REPLACE INTO `lokasi` (`IDLOKASI`, `KODELOKASI`, `NAMALOKASI`, `LANTAILOKASI`, `PJ`, `NIP_PJ`) VALUES
	(1, 'IF312', 'Laboratorium Alpro', 3, 'Ir. Fx. Arunanto, M.Sc.', '19570101 1983 1 004');
/*!40000 ALTER TABLE `lokasi` ENABLE KEYS */;


-- Dumping structure for table inventory.merk
CREATE TABLE IF NOT EXISTS `merk` (
  `IDMERK` int(11) NOT NULL AUTO_INCREMENT,
  `NAMAMERK` varchar(256) NOT NULL,
  PRIMARY KEY (`IDMERK`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table inventory.merk: ~0 rows (approximately)
/*!40000 ALTER TABLE `merk` DISABLE KEYS */;
REPLACE INTO `merk` (`IDMERK`, `NAMAMERK`) VALUES
	(1, 'Acer');
/*!40000 ALTER TABLE `merk` ENABLE KEYS */;


-- Dumping structure for table inventory.sumber
CREATE TABLE IF NOT EXISTS `sumber` (
  `IDSUMBER` int(11) NOT NULL AUTO_INCREMENT,
  `KODESUMBER` varchar(10) NOT NULL,
  `NAMASUMBER` varchar(256) NOT NULL,
  PRIMARY KEY (`IDSUMBER`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table inventory.sumber: ~4 rows (approximately)
/*!40000 ALTER TABLE `sumber` DISABLE KEYS */;
REPLACE INTO `sumber` (`IDSUMBER`, `KODESUMBER`, `NAMASUMBER`) VALUES
	(2, 'BLU S1', 'BLU S1'),
	(3, 'BLU S2', 'BLU S2'),
	(4, 'BLU S3', 'BLU S3'),
	(5, 'HIBAH', 'HIBAH');
/*!40000 ALTER TABLE `sumber` ENABLE KEYS */;


-- Dumping structure for table inventory.users
CREATE TABLE IF NOT EXISTS `users` (
  `IDUSERS` int(11) NOT NULL AUTO_INCREMENT,
  `NAMAUSER` varchar(128) NOT NULL,
  `PASSUSER` varchar(256) NOT NULL,
  PRIMARY KEY (`IDUSERS`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table inventory.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`IDUSERS`, `NAMAUSER`, `PASSUSER`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
