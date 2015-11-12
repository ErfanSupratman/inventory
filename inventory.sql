-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18 Agu 2015 pada 16.29
-- Versi Server: 5.6.25
-- PHP Version: 5.5.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`IDBARANG`, `IDKONDISI`, `IDMERK`, `IDSUMBER`, `IDLOKASI`, `KODEBARANG`, `NAMABARANG`, `JUMLAHBARANG`, `HARGABARANG`, `TANGGALMASUK`, `TANGGALSPJ`, `TIPEBARANG`, `MERKBARANG`) VALUES
(12, 2, NULL, 3, 2, '2.2.2002.2.3', 'Kursi', 20, 500000, '2015-03-16', '2015-03-03', 'barang', 'Chitose'),
(13, 1, NULL, 2, 1, '2.2.2002.2.2', 'PC', 10, 1500000, '2015-05-30', '2015-05-30', 'Lenovo', 'Lenovo'),
(14, 1, NULL, 2, 1, '12341242', 'PC', 10, 2000000, '2015-08-05', '2015-08-10', 'ACER', 'ACER'),
(15, 1, NULL, 2, 1, '12341242', 'PC', 1, 2000000, '2015-08-10', '2015-08-10', 'ACER', 'ACER'),
(16, 3, NULL, 5, 1, '11111111', 'PC', 1, 2000000, '2015-08-10', '2015-08-03', 'ACER', 'ACER');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kondisi`
--

CREATE TABLE IF NOT EXISTS `kondisi` (
  `IDKONDISI` int(11) NOT NULL,
  `KODEKONDISI` varchar(10) NOT NULL,
  `NAMAKONDISI` varchar(1024) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kondisi`
--

INSERT INTO `kondisi` (`IDKONDISI`, `KODEKONDISI`, `NAMAKONDISI`) VALUES
(1, 'B', 'Baik'),
(2, 'RR', 'Rusak Ringan'),
(3, 'RB', 'Rusak Berat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE IF NOT EXISTS `lokasi` (
  `IDLOKASI` int(11) NOT NULL,
  `IDPEJE` int(11) DEFAULT NULL,
  `KODELOKASI` varchar(10) NOT NULL,
  `NAMALOKASI` varchar(256) NOT NULL,
  `LANTAILOKASI` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`IDLOKASI`, `IDPEJE`, `KODELOKASI`, `NAMALOKASI`, `LANTAILOKASI`) VALUES
(1, 1, 'IF312', 'Laboratorium Alpro', 1),
(2, 1, 'IF307', 'AJK', 3),
(3, 2, 'IF302', 'NCC', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE IF NOT EXISTS `merk` (
  `IDMERK` int(11) NOT NULL,
  `NAMAMERK` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`IDMERK`, `NAMAMERK`) VALUES
(1, 'Acer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peje`
--

CREATE TABLE IF NOT EXISTS `peje` (
  `IDPEJE` int(11) NOT NULL,
  `NAMAPEJE` varchar(50) NOT NULL,
  `NIPPEJE` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peje`
--

INSERT INTO `peje` (`IDPEJE`, `NAMAPEJE`, `NIPPEJE`) VALUES
(1, 'Ir. Fx. Arunanto, M.Sc.', '19570101 1983 1 004'),
(2, 'Mas Jum', '51000000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sumber`
--

CREATE TABLE IF NOT EXISTS `sumber` (
  `IDSUMBER` int(11) NOT NULL,
  `KODESUMBER` varchar(10) NOT NULL,
  `NAMASUMBER` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sumber`
--

INSERT INTO `sumber` (`IDSUMBER`, `KODESUMBER`, `NAMASUMBER`) VALUES
(2, 'BLU S1', 'BLU S1'),
(3, 'BLU S2', 'BLU S2'),
(4, 'BLU S3', 'BLU S3'),
(5, 'HIBAH', 'HIBAH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `IDUSERS` int(11) NOT NULL,
  `NAMAUSER` varchar(128) NOT NULL,
  `PASSUSER` varchar(256) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
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
  ADD PRIMARY KEY (`IDBARANG`),
  ADD KEY `FK_ASAL` (`IDSUMBER`),
  ADD KEY `FK_BERADA_PADA` (`IDLOKASI`),
  ADD KEY `fk_IDKONDISI_kondisi_IDKONDISI` (`IDKONDISI`),
  ADD KEY `fk_IDMERK_merk_IDMERK` (`IDMERK`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`IDKONDISI`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`IDLOKASI`),
  ADD KEY `IDPEJE` (`IDPEJE`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`IDMERK`);

--
-- Indexes for table `peje`
--
ALTER TABLE `peje`
  ADD PRIMARY KEY (`IDPEJE`);

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
  MODIFY `IDBARANG` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `IDKONDISI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `IDLOKASI` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `IDMERK` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `peje`
--
ALTER TABLE `peje`
  MODIFY `IDPEJE` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_ASAL` FOREIGN KEY (`IDSUMBER`) REFERENCES `sumber` (`IDSUMBER`),
  ADD CONSTRAINT `FK_BERADA_PADA` FOREIGN KEY (`IDLOKASI`) REFERENCES `lokasi` (`IDLOKASI`),
  ADD CONSTRAINT `fk_IDKONDISI_kondisi_IDKONDISI` FOREIGN KEY (`IDKONDISI`) REFERENCES `kondisi` (`IDKONDISI`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_IDMERK_merk_IDMERK` FOREIGN KEY (`IDMERK`) REFERENCES `merk` (`IDMERK`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD CONSTRAINT `FK_PEJE` FOREIGN KEY (`IDPEJE`) REFERENCES `peje` (`IDPEJE`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
