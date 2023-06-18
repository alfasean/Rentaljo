-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2023 pada 23.37
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
(85, 'gri123', 'c8e15d62325d31ce6dd7bc47c9991342', 'grimonia', 'Wanita', 'Manado', '081234567892'),
(86, 'ida123', '20109c34b74835948021a33af204553c', 'Ida Bagus', 'Pria', 'Bahu, Manado', '0818232321'),
(87, 'andra123', '3727986f3e78114b05a3cb5c957ccc77', 'Andra Kida', 'Pria', 'Manado', '08121231'),
(88, 'kevin123', 'd2e7a2105d0fb461fe6f2858cc33942f', 'Kevin Ngantung', 'Pria', 'Kleak', '0821232371'),
(90, 'endrue123', 'f4b9076693c306a0ba35d5787d3503f7', 'Endrue Manarisip', 'Pria', 'Kleak', '08136274821'),
(91, 'sharon123', '01c638e077c3b28e1632207e4f188225', 'Sharo Sulung', 'Wanita', 'Tuminting', '08124739342'),
(92, 'stepa123', '0f5adca3c99efeb08d8450e92427ab47', 'Stepanie Raintung', 'Wanita', 'Kleak', '08124739342'),
(93, 'sumangkut123', '24379d2cc01a81754872b3ec375b5d40', 'Sumangkut', 'Pria', 'Malalayang', '0822873621'),
(94, 'omganggita', '7be5e026d8fbb211220e811834d9e6b1', 'Omega Anggita', 'Wanita', 'Bahu', '08129384321'),
(99, 'josh123', '689e064e6a5ff0dc90387bdaa52f2fba', 'Josua ', 'Pria', 'Bahu', '082173289218'),
(100, 'aditya', '057829fa5a65fc1ace408f490be486ac', 'Aditya ', 'Pria', 'Sario', '0823273821');

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
-- Struktur dari tabel `tb_motor`
--

CREATE TABLE `tb_motor` (
  `id_motor` int(10) NOT NULL,
  `no_plat` varchar(15) NOT NULL,
  `jenis_motor` varchar(20) NOT NULL,
  `merk` varchar(20) NOT NULL,
  `gambar` text NOT NULL,
  `harga` varchar(25) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_motor`
--

INSERT INTO `tb_motor` (`id_motor`, `no_plat`, `jenis_motor`, `merk`, `gambar`, `harga`, `status`) VALUES
(84, 'DB 2124 OA', 'Matic', 'Vario 150', 'vario 1.png', '100000', '1'),
(85, 'DB 9822 VS', 'Matic', 'NMAX 2023', '2572610460.webp', '150000', '1'),
(86, 'DB 8202 XY', 'Matic', 'Yamaha X-Ride', 'Yamaha-X-ride-attractive-red.webp', '100000', '1'),
(87, 'DB 3013 ND', 'Manual', 'Sonic 150', 'main-blue.png', '100000', ''),
(88, 'DB 9266 AV', 'Matic', 'Beat 2023', 'beat-sporty.webp', '85000', '1');

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
  `total_bayar` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id_sewa`, `id_customer`, `id_motor`, `tgl_pinjam`, `tgl_kembali`, `jaminan`, `metode_pembayaran`, `total_bayar`, `status`) VALUES
(78, 85, 85, '2023-05-25', '2023-05-29', 'Deposit Tunai', 'Tunai', '600000', 'Sudah Kembali'),
(79, 100, 87, '2023-06-13', '2023-06-15', 'Deposit Tunai', 'Tunai', '200000', 'Sudah Kembali'),
(82, 92, 84, '2023-06-07', '2023-06-13', 'KTP/SIM', 'Tunai', '600000', 'Sudah Kembali');

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
-- Indeks untuk tabel `tb_motor`
--
ALTER TABLE `tb_motor`
  ADD PRIMARY KEY (`id_motor`);

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
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT untuk tabel `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id_karyawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_motor`
--
ALTER TABLE `tb_motor`
  MODIFY `id_motor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `tb_sewa`
--
ALTER TABLE `tb_sewa`
  MODIFY `id_sewa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
