-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jan 2025 pada 07.34
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iphone`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `iphone`
--

CREATE TABLE `iphone` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `spesifikasi` text DEFAULT NULL,
  `harga` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `iphone`
--

INSERT INTO `iphone` (`id`, `nama`, `spesifikasi`, `harga`) VALUES
(1, 'iPhone 14', 'Layar: 6.1\" Super Retina XDR, Chipset: A15 Bionic, Kamera: 12MP + 12MP, Penyimpanan: 128GB/256GB/512GB, RAM: 6GB', 10000),
(2, 'iPhone 15', 'Layar: 6.1\" Super Retina XDR, Chipset: A16 Bionic, Kamera: 48MP + 12MP, Penyimpanan: 128GB/256GB/512GB, RAM: 6GB', 12000),
(3, 'iPhone 16', 'Layar: 6.1\" Super Retina XDR, Chipset: A18 Bionic, Kamera: 48MP + 12MP, Penyimpanan: 128GB/256GB/512GB, RAM: 6GB', 15000),
(5, 'aaaaa', 'aaaaaaaaaaaaaaaaaaaa', 4000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderan`
--

CREATE TABLE `orderan` (
  `id` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor_hp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `harga_total` int(10) NOT NULL,
  `lama_sewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orderan`
--

INSERT INTO `orderan` (`id`, `id_barang`, `nama`, `nomor_hp`, `alamat`, `harga_total`, `lama_sewa`) VALUES
(1, 1, 'Nanda Lemon', '123', 'aaaaaaaa', 0, 3),
(2, 2, 'Rio Kurniawan', '123', '2222222222', 0, 24),
(3, 3, 'aaaaaaaaaaa', '99999999999', 'AAAAAAAAAAAAAA', 90000, 6),
(4, 1, 'Sukirman', '222222222', '22aaaa', 10000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `pesan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `pesan`) VALUES
(2, 'aaaa', '121@hh', 'aaaaaaaaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `iphone`
--
ALTER TABLE `iphone`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orderan`
--
ALTER TABLE `orderan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `iphone`
--
ALTER TABLE `iphone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `orderan`
--
ALTER TABLE `orderan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
