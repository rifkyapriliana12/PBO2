-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jul 2023 pada 18.32
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpenjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenisbarang`
--

CREATE TABLE `jenisbarang` (
  `id_jenis` int(11) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `macam_barang` enum('Kayu','Besi','Cat','Paku','Palaron') NOT NULL DEFAULT 'Kayu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenisbarang`
--

INSERT INTO `jenisbarang` (`id_jenis`, `kode`, `macam_barang`) VALUES
(1, '2001', 'Kayu'),
(2, '2002', 'Besi'),
(3, '2003', 'Cat'),
(4, '2004', 'Paku'),
(6, '2005', 'Palaron');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `unik` (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenisbarang`
--
ALTER TABLE `jenisbarang`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
