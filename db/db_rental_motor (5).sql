-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jun 2023 pada 15.07
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
(100, 'aditya', '057829fa5a65fc1ace408f490be486ac', 'Aditya ', 'Pria', 'Sario', '0823273821'),
(101, 'rizaldy21', '38fa51d6d63ea1e16e0853fb6e9ae496', 'Mustakim', 'Pria', 'Kleak', '1121232323'),
(104, 'cela123', '42bc352460e9ad5c8badc00730a73bec', 'Gracella Kolondam', 'Wanita', 'Bahu', '081218213231');

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
(84, 'DB 2124 OA', 'Matic', 'Vario 150', 'vario.webp', '100000', '1'),
(85, 'DB 9822 VS', 'Matic', 'NMAX 2023', '2572610460.webp', '150000', ''),
(86, 'DB 8202 XY', 'Matic', 'X-Ride', 'Yamaha-X-ride-attractive-red.webp', '100000', '1'),
(87, 'DB 3013 ND', 'Manual', 'Sonic 150', 'main-blue.png', '100000', '1'),
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
  `status` varchar(30) NOT NULL,
  `denda` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_sewa`
--

INSERT INTO `tb_sewa` (`id_sewa`, `id_customer`, `id_motor`, `tgl_pinjam`, `tgl_kembali`, `jaminan`, `metode_pembayaran`, `total_bayar`, `status`, `denda`) VALUES
(113, 84, 85, '2023-05-25', '2023-05-31', 'KTP/SIM', 'Tunai', '900000', 'Sudah Kembali', '900000'),
(114, 87, 86, '2023-06-16', '2023-06-18', 'KTP/SIM', 'Tunai', '200000', 'Sudah Kembali', '0'),
(115, 87, 85, '2023-06-16', '2023-06-17', 'Deposit Tunai', 'Tunai', '150000', 'Sudah Kembali', '50000'),
(117, 85, 85, '2023-06-16', '2023-06-17', 'Deposit Tunai', 'Tunai', '200000', 'Sudah Kembali', '50000'),
(118, 85, 88, '2023-05-26', '2023-05-28', 'KTP/SIM', 'Tunai', '1220000', 'Sudah Kembali', '1050000'),
(124, 84, 84, '2023-06-19', '2023-06-20', 'KTP/SIM', 'Transfer Bank', '100000', 'Sudah Kembali', '0'),
(125, 99, 86, '2023-06-19', '2023-06-21', 'KTP/SIM', 'Transfer Bank', '200000', 'Sudah Kembali', '0'),
(126, 92, 84, '2023-05-29', '2023-05-31', 'KTP/SIM', 'Tunai', '1150000', 'Sudah Kembali', '950000'),
(127, 85, 84, '2023-06-19', '2023-06-21', 'KTP/SIM', 'Transfer Bank', '200000', 'Sudah Kembali', '0'),
(129, 84, 84, '2023-06-19', '2023-06-20', 'KTP/SIM', 'Transfer Bank', '100000', 'Sudah Kembali', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_sewa` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `konfirmasi` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_sewa`, `gambar`, `deskripsi`, `konfirmasi`) VALUES
(10, 124, 'Screenshot_2022-01-19-11-22-28-981_com.indodana.app_-e1643105258853.jpg', 'sadsad', 'Sudah Dikonfirmasi'),
(11, 125, 'WhatsApp Image 2023-06-13 at 21.21.25.jpeg', 'Lunas', 'Sudah Dikonfirmasi'),
(12, 127, 'nk0zwc4ubm518tbnqt9j.png', 'Lunas ya bang', 'Sudah Dikonfirmasi'),
(13, 129, 'Sebuah-Seni-Untuk-Bersikap-Bodo-Amat.jpg', 'Lunas', 'Sudah Dikonfirmasi');

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
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_sewa` (`id_sewa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_customer`
--
ALTER TABLE `tb_customer`
  MODIFY `id_customer` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

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
  MODIFY `id_sewa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
