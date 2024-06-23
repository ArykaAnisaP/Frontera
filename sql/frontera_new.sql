-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Feb 2023 pada 02.00
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frontera_new`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_delivery_cost`
--

CREATE TABLE `tb_delivery_cost` (
  `id_delivery_cost` int(11) NOT NULL,
  `place` varchar(255) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_delivery_cost`
--

INSERT INTO `tb_delivery_cost` (`id_delivery_cost`, `place`, `price`) VALUES
(1, 'Sarijadi', 5000),
(3, 'Setia Budi', 10000),
(4, 'Pasteur', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order`
--

CREATE TABLE `tb_order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_delivery_cost` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(30) NOT NULL,
  `notes` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_order`
--

INSERT INTO `tb_order` (`id_order`, `id_user`, `id_delivery_cost`, `created_at`, `status`, `notes`, `image`) VALUES
(9, 12, 1, '2023-02-06 23:49:17', 'didaftarkan', 'Anjing warna oren', 'uploads/image_pet/dog11.jfif'),
(10, 11, 1, '2023-02-07 00:57:48', 'didaftarkan', 'Kucing galak', 'uploads/image_pet/cat2.jfif'),
(11, 13, 4, '2023-02-07 01:04:12', 'didaftarkan', 'Kucing', 'uploads/image_pet/cat31.jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `id_order_detail` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_package_grooming_pet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`id_order_detail`, `id_order`, `id_package_grooming_pet`) VALUES
(1, 1, 2),
(2, 1, 5),
(3, 2, 7),
(4, 2, 5),
(5, 3, 3),
(6, 3, 5),
(7, 4, 11),
(8, 4, 15),
(9, 5, 4),
(10, 6, 5),
(11, 7, 5),
(12, 7, 5),
(13, 7, 19),
(14, 8, 8),
(15, 9, 2),
(16, 10, 9),
(17, 11, 5),
(18, 11, 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_package_grooming`
--

CREATE TABLE `tb_package_grooming` (
  `id_package_grooming` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_package_grooming`
--

INSERT INTO `tb_package_grooming` (`id_package_grooming`, `image`, `title`) VALUES
(1, 'uploads/package_grooming/grooming-premium1.png', 'Grooming Premium'),
(2, 'uploads/package_grooming/JamurPre.png', 'Grooming Jamur Premium'),
(3, 'uploads/package_grooming/Basic.png', 'Grooming Basic'),
(4, 'uploads/package_grooming/Jamur.png', 'Grooming Jamur'),
(5, 'uploads/package_grooming/SB.png', 'Shampoo Basic'),
(6, 'uploads/package_grooming/SJ.png', 'Shampoo Jamur'),
(7, 'uploads/package_grooming/PK.png', 'Potong Kuku'),
(8, 'uploads/package_grooming/BT.png', 'Bersihkan Telinga');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_package_grooming_pet`
--

CREATE TABLE `tb_package_grooming_pet` (
  `id_package_grooming_pet` int(11) NOT NULL,
  `id_package_grooming` int(11) NOT NULL,
  `id_pet` int(11) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_package_grooming_pet`
--

INSERT INTO `tb_package_grooming_pet` (`id_package_grooming_pet`, `id_package_grooming`, `id_pet`, `price`) VALUES
(2, 1, 1, 70000),
(3, 1, 2, 65000),
(4, 2, 1, 70000),
(5, 2, 2, 65000),
(6, 3, 1, 55000),
(7, 3, 2, 50000),
(8, 4, 1, 65000),
(9, 4, 2, 60000),
(10, 5, 1, 30000),
(11, 5, 2, 25000),
(12, 6, 1, 35000),
(13, 6, 2, 30000),
(14, 7, 1, 20000),
(15, 7, 2, 15000),
(18, 8, 1, 20000),
(19, 8, 2, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pet`
--

CREATE TABLE `tb_pet` (
  `id_pet` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_pet`
--

INSERT INTO `tb_pet` (`id_pet`, `name`) VALUES
(1, 'Anjing'),
(2, 'Kucing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(255) NOT NULL,
  `nama_tengah` varchar(255) NOT NULL,
  `nama_belakang` varchar(255) NOT NULL,
  `no_hp` char(16) NOT NULL,
  `address` text NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_depan`, `nama_tengah`, `nama_belakang`, `no_hp`, `address`, `avatar`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '', '', '0', '', '', 'admin@gmail.com', '$2a$08$ZBOXGim0pdmhv1.pyB7hWOn53uJq4XZ0yMOrqvquoNky3NFHQUPnS', 'admin', '2023-01-02 21:02:22'),
(11, 'Nashwa', 'Shihab', '', '083293739', 'Jl. Sarijadi no 50 (https://www.google.com/maps/dir/Jl.+Sarijadi+Raya+No.50,+Sukarasa,+Kec.+Sukasari,+Kota+Bandung,+Jawa+Barat+40151/Frontera+Pet+Mart+Sarimanah,+Jl.+Sarimanah+No.22,+Sarijadi,+Sukasari,+Bandung+City,+West+Java+40151/@-6.8771514,107.5762199,17z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e68e69b8a549a6b:0x3873462e49d692d5!2m2!1d107.5802806!2d-6.8741749!1m5!1m1!1s0x2e68e73c53a20f79:0x1d39669446165365!2m2!1d107.5766353!2d-6.8801459?hl=id)', '', 'nashwa@gmail.com', '$2a$08$8iJEun1lZlV7V1rh5ifD0uzC5OkNhnjQoZADp4cd82Y9h41Op8Iu2', 'user', '2023-02-06 23:42:30'),
(12, 'Al', 'Novianti', 'Ramadhani', '0865425686', 'Jl. Soekarno Hatta (https://www.google.com/maps/dir/Jl.+Sarijadi+Raya+No.50,+Sukarasa,+Kec.+Sukasari,+Kota+Bandung,+Jawa+Barat+40151/Frontera+Pet+Mart+Sarimanah,+Jl.+Sarimanah+No.22,+Sarijadi,+Sukasari,+Bandung+City,+West+Java+40151/@-6.8771514,107.5762199,17z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e68e69b8a549a6b:0x3873462e49d692d5!2m2!1d107.5802806!2d-6.8741749!1m5!1m1!1s0x2e68e73c53a20f79:0x1d39669446165365!2m2!1d107.5766353!2d-6.8801459?hl=id)', '', 'alnovi@gmail.com', '$2a$08$qo30EGB0bFDA68U8z30ebe.O4KAPyLJ.4TxiX.LEhoVQhByU1qy1e', 'user', '2023-02-06 23:43:18'),
(13, 'Aryka', 'Anisa', 'Pertiwi', '0872654792', 'Jl. Jendral Sudirman (https://www.google.com/maps/dir/Jl.+Sarijadi+Raya+No.50,+Sukarasa,+Kec.+Sukasari,+Kota+Bandung,+Jawa+Barat+40151/Frontera+Pet+Mart+Sarimanah,+Jl.+Sarimanah+No.22,+Sarijadi,+Sukasari,+Bandung+City,+West+Java+40151/@-6.8771514,107.5762199,17z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e68e69b8a549a6b:0x3873462e49d692d5!2m2!1d107.5802806!2d-6.8741749!1m5!1m1!1s0x2e68e73c53a20f79:0x1d39669446165365!2m2!1d107.5766353!2d-6.8801459?hl=id)', '', 'aryka@gmail.com', '$2a$08$U4ZTNE.IenFSwqEeXepG9efnocOlLldMV6b.kTz8D26.4BaOHoNfW', 'user', '2023-02-06 23:44:09'),
(14, 'Aldi', 'Rahman', 'Wahyu', '086628735', 'Jl. Sarijadi no 46 (https://www.google.com/maps/dir/Rumah+jati,+Komp,+Jl.+Sarimanah+No.46,+Sarijadi,+Sukasari,+Bandung+City,+West+Java+40151/Frontera+Pet+Mart+Sarimanah,+Jl.+Sarimanah+No.22,+Sarijadi,+Sukasari,+Bandung+City,+West+Java+40151/@-6.8792625,107.5736669,17z/data=!3m1!4b1!4m13!4m12!1m5!1m1!1s0x2e68e7fb20f26041:0x28f7bfef6e1f2345!2m2!1d107.5749534!2d-6.8783805!1m5!1m1!1s0x2e68e73c53a20f79:0x1d39669446165365!2m2!1d107.5766353!2d-6.8801459?hl=id)', '', 'aldi@gmail.com', '$2a$08$/97W/jjrtGrlO7ruR1.93ukSabdkbTS17axt74Gco/YMBiczyuHcy', 'user', '2023-02-07 07:37:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_delivery_cost`
--
ALTER TABLE `tb_delivery_cost`
  ADD PRIMARY KEY (`id_delivery_cost`);

--
-- Indeks untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`id_order_detail`);

--
-- Indeks untuk tabel `tb_package_grooming`
--
ALTER TABLE `tb_package_grooming`
  ADD PRIMARY KEY (`id_package_grooming`);

--
-- Indeks untuk tabel `tb_package_grooming_pet`
--
ALTER TABLE `tb_package_grooming_pet`
  ADD PRIMARY KEY (`id_package_grooming_pet`);

--
-- Indeks untuk tabel `tb_pet`
--
ALTER TABLE `tb_pet`
  ADD PRIMARY KEY (`id_pet`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_delivery_cost`
--
ALTER TABLE `tb_delivery_cost`
  MODIFY `id_delivery_cost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `id_order_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tb_package_grooming`
--
ALTER TABLE `tb_package_grooming`
  MODIFY `id_package_grooming` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_package_grooming_pet`
--
ALTER TABLE `tb_package_grooming_pet`
  MODIFY `id_package_grooming_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_pet`
--
ALTER TABLE `tb_pet`
  MODIFY `id_pet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
