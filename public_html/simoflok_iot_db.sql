-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 12 Sep 2023 pada 10.11
-- Versi server: 10.5.20-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simoflok_iot_db`
--
CREATE DATABASE IF NOT EXISTS `simoflok_iot_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `simoflok_iot_db`; 
-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ikan`
--

CREATE TABLE IF NOT EXISTS `data_ikan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_awal` timestamp NULL DEFAULT NULL,
  `tanggal_akhir` timestamp NULL DEFAULT NULL,
  `pakan_ikan` varchar(12) NOT NULL,
  `kematian_ikan` varchar(12) NOT NULL,
  `hari` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `data_ikan`
--

INSERT INTO `data_ikan` (`id`, `tanggal_awal`, `tanggal_akhir`, `pakan_ikan`, `kematian_ikan`, `hari`) VALUES
(3, '2023-08-31 00:00:00', '2023-08-31 23:59:59', 'Pelet', '5', 'Kamis'),
(4, '2023-09-01 00:00:00', '2023-09-01 23:59:59', 'Cacing', '0', 'Jumat');


-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_data_sensor`
--

CREATE TABLE IF NOT EXISTS `tb_data_sensor` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pH` decimal(10,2) NOT NULL,
  `suhu` decimal(10,2) NOT NULL,
  `o2` decimal(11,0) NOT NULL,
  `aerator` text NOT NULL,
  `amoniak` decimal(11,2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_data_sensor`
--

INSERT INTO `tb_data_sensor` (`ID`, `pH`, `suhu`, `o2`, `aerator`, `amoniak`, `date`) VALUES
(1, 13.60, 17.00, 88, 'mantap', 0.50, '2023-08-26 10:24:17'),
(2, 13.60, 17.00, 88, 'mantap', 0.50, '2023-08-26 10:24:59'),
(3, 13.60, 17.00, 88, 'Ok', 0.50, '2023-08-26 10:35:31'),
(4, 13.60, 17.00, 88, 'Masalah', 0.50, '2023-08-26 10:35:47'),
(5, 13.60, 17.00, 88, 'warning', 0.50, '2023-08-26 10:47:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('Admin','User') NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(38, 'admin1234', '$2y$10$WKy12.16F5lahzinpOZNX.JP196A7hgGSlphKGp0wOnoTpKsOq.Mi', 'Admin'),
(39, 'Habibs17', '$2y$10$ZyRFBP2I3BLdDFWWzlq5nOabHgUyB5AVC9mj7bRow.E.s7SKhPcia', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_ikan`
--
ALTER TABLE `data_ikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_data_sensor`
--
ALTER TABLE `tb_data_sensor`
  ADD PRIMARY KEY (`ID`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_ikan`
--
ALTER TABLE `data_ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_data_sensor`
--
ALTER TABLE `tb_data_sensor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
