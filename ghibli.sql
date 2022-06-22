-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Apr 2022 pada 08.06
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sait_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ghibli`
--

CREATE TABLE `ghibli` (
  `Id_film` int(20) NOT NULL,
  `Judul` varchar(50) NOT NULL,
  `Genre` varchar(50) NOT NULL,
  `Rilis` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ghibli`
--

INSERT INTO `ghibli` (`Id_film`, `Judul`, `Genre`, `Rilis`) VALUES
(1, 'Sen to Chihiro no Kamikakushi', 'Adventure, Award Winning, Supernatural', '2001-07-20'),
(2, 'Tonari no Totoro', 'Adventure, Supernatural', '1988-04-16'),
(3, 'Mononoke Hime', 'Action, Adventure, Fantasy', '1997-07-12'),
(4, 'Howl no Ugoku Shiro', 'Adventure, Drama, Fantasy, Romance', '2004-11-20');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ghibli`
--
ALTER TABLE `ghibli`
  ADD PRIMARY KEY (`Id_film`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
