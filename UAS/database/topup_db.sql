-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jun 2025 pada 20.34
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `topup_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup_history`
--

CREATE TABLE `topup_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product` varchar(100) NOT NULL,
  `target` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `topup_history`
--

INSERT INTO `topup_history` (`id`, `user_id`, `product`, `target`, `amount`, `method`, `created_at`) VALUES
(2, 1, 'Mobile Legends', '12345678', 1000, 'Gopay', '2025-06-13 12:39:43'),
(3, 1, 'Mobile Legends', '12345678', 1000, 'Dana', '2025-06-13 12:45:46'),
(4, 1, 'Mobile Legends', '12345678', 1001, 'OVO', '2025-06-13 13:06:09'),
(5, 1, 'Free Fire', '12345678', 1000, 'Gopay', '2025-06-13 13:15:38'),
(6, 1, 'Mobile Legends', '12345678', 1000, 'OVO', '2025-06-13 13:18:06'),
(7, 1, 'Free Fire', '12345678', 1000, 'OVO', '2025-06-13 13:23:32'),
(8, 1, 'Mobile Legends', '12345678', 50000, 'Dana', '2025-06-13 21:48:50'),
(9, 1, 'PUBG Mobile', '12345678', 50000, 'Transfer Bank', '2025-06-13 21:54:32'),
(11, 2, 'Mobile Legends', 'refi', 100000, 'Gopay', '2025-06-13 23:50:46'),
(12, 2, 'PUBG Mobile', '12', 100000, 'Gopay', '2025-06-14 00:55:08'),
(13, 2, 'PUBG Mobile', '23', 60000, 'OVO', '2025-06-14 01:11:37'),
(15, 2, 'Mobile Legends', '12', 900000, 'OVO', '2025-06-14 01:14:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `balance` double DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `balance`) VALUES
(2, 'Refi', '$2y$10$Rwlx7NTlYzsDPzK2Sm/vKeid4M2oG/kywm.ItOWn4WjN.RbpUysde', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `topup_history`
--
ALTER TABLE `topup_history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `topup_history`
--
ALTER TABLE `topup_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `riwayat`
--
ALTER TABLE `riwayat`
  ADD CONSTRAINT `riwayat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
