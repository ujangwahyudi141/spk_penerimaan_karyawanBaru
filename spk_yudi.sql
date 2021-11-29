-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 24 Jun 2021 pada 11.03
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_yudi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `kode_alternatif` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `c1` double NOT NULL,
  `c2` double NOT NULL,
  `c3` double NOT NULL,
  `c4` double NOT NULL,
  `c5` double NOT NULL,
  `c6` double NOT NULL,
  `c7` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`kode_alternatif`, `nama`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`) VALUES
('A1', 'Gilang', 3, 4, 2, 4, 3, 3, 3),
('A2', 'Huda', 5, 5, 4, 3, 3, 2, 4),
('A3', 'Jumadi', 4, 3, 3, 4, 2, 4, 4),
('A4', 'Jaja', 2, 3, 3, 4, 1, 3, 4),
('A5', 'Masri', 3, 3, 4, 4, 1, 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_karyawan`
--

CREATE TABLE `calon_karyawan` (
  `id` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calon_karyawan`
--

INSERT INTO `calon_karyawan` (`id`, `nama`, `alamat`, `tgl_lahir`, `email`) VALUES
('12312', 'Gilang', 'sukaharja', '2021-05-22', 'gilang@gmail.com'),
('231231434', 'Jumadi', 'Pakis jaya', '2002-02-02', 'Jumadi@gmail.com'),
('42397453', 'Jaja', 'Perum Terang sari Klari', '2008-07-16', 'jaja@gmail.com'),
('4361752342', 'Huda', 'Cilamaya', '2000-08-15', 'mhuda5428@mail.com'),
('63571234', 'Masri', 'Batujaya', '1995-06-15', 'jarot@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `kode_kriteria` varchar(10) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `keterangan`, `bobot`) VALUES
('C1', 'Hasil Tes Tulis', 30),
('C2', 'Wawancara', 10),
('C3', 'Hasil tes kesehatan', 20),
('C4', 'usia', 10),
('C5', 'pengalaman kerja', 20),
('C6', 'Jarak dari perusahaan', 5),
('C7', 'Nilai Rapor/IPK', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `nik` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengguna`
--

INSERT INTO `pengguna` (`nik`, `nama`, `password`, `akses`) VALUES
(123456, 'bambang', '123456', 'Admin'),
(1323432, 'asd', 'sad', 'Manager');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`kode_alternatif`);

--
-- Indeks untuk tabel `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`kode_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
