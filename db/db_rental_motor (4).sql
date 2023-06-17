-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2023 pada 07.45
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
-- Database: `db_rental_motor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_hp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_customer`
--

INSERT INTO `tb_customer` (`id_customer`, `username`, `password`, `nama_customer`, `jenis_kelamin`, `alamat`, `no_hp`) VALUES
(84, 'alfa23', '7199f9f3f85b6610e3d52b01b02f0a18', 'Alfa Sean', 'Pria', 'Bahu, Manado', '082296624873'),
(85, 'gri123', 'c8e15d62325d31ce6dd7bc47c9991342', 'grimonia', 'Wanita', 'Manado', '081234567892');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id_karyawan` int(10) NOT NULL,
  `nama_karyawan` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `jenis_kelamin`, `no_hp`, `username`, `password`) VALUES
(1, 'Alfa', 'Malalayang', 'Laki-Laki', '08123456789', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan_karyawan`
--

CREATE TABLE `tb_laporan_karyawan` (
  `id_laporan` int(10) NOT NULL,
  `id_pembayaran` int(10) NOT NULL,
  `tgl_laporan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_motor`
--

CREATE TABLE `tb_motor` (
  `id_motor` int(10) NOT NULL,
  `no_plat` varchar(15) NOT NULL,
  `jenis_motor` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `harga` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_motor`
--

INSERT INTO `tb_motor` (`id_motor`, `no_plat`, `jenis_motor`, `merk`, `gambar`, `harga`, `status`) VALUES
(84, 'DB 2124 OA', 'Matic', 'Vario 150', 'vario 1.png', '100000', 'Tidak Tersedia'),
(85, 'DB 9822 VS', 'Matic', 'NMAX 2023', '2572610460.webp', '150000', 'Tersedia'),
(86, 'DB 8202 XY', 'Matic', 'Yamaha X-Ride', 'Yamaha-X-ride-attractive-red.webp', '100000', 'Tersedia'),
(87, 'DB 3013 ND', 'Manual', 'Sonic 150', 'main-blue.png', '100000', 'Tersedia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengembalian_motor`
--

CREATE TABLE `tb_pengembalian_motor` (
  `id_pengembalian` int(10) NOT NULL,
  `denda` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sewa`
--

CREATE TABLE `tb_sewa` (
  `id_sewa` int(10) NOT NULL,
  `id_customer` int(10) NOT NULL,
  `id_motor` int(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `jaminan` varchar(30) NOT NULL,
  `metode_pembayaran` varchar(30) NOT NULL,
  `total_bayar` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id_sewa`, `id_customer`, `id_motor`, `tgl_pinjam`, `tgl_kembali`, `jaminan`, `metode_pembayaran`, `total_bayar`) VALUES
(51, 84, 84, '2023-06-17', '2023-06-18', 'KTP/SIM', 'Tunai', '100000'),
(53, 85, 85, '2023-06-17', '2023-06-18', 'KTP/SIM', 'Tunai', '150000');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `tb_laporan_karyawan`
--
ALTER TABLE `tb_laporan_karyawan`
  ADD PRIMARY KEY (`id_laporan`),
  ADD UNIQUE KEY `id_pembayaran` (`id_pembayaran`);

--
-- Indeks untuk tabel `tb_motor`
--
ALTER TABLE `tb_motor`
  ADD PRIMARY KEY (`id_motor`);

--
-- Indeks untuk tabel `tb_pengembalian_motor`
--
ALTER TABLE `tb_pengembalian_motor`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indeks untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  ADD PRIMARY KEY (`id_sewa`),
  ADD UNIQUE KEY `id_customer` (`id_customer`),
  ADD UNIQUE KEY `id_motor` (`id_motor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan_karyawan`
--
ALTER TABLE `tb_laporan_karyawan`
  MODIFY `id_laporan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_motor`
--
ALTER TABLE `tb_motor`
  MODIFY `id_motor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tb_pengembalian_motor`
--
ALTER TABLE `tb_pengembalian_motor`
  MODIFY `id_pengembalian` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id_sewa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
