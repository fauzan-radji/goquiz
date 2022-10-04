-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2022 pada 15.17
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goquiz`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `finish_time` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `id_user`, `point`, `finish_time`) VALUES
(1, 2, 8, ''),
(2, 2, 5, ''),
(3, 2, 10, ''),
(4, 2, 5, ''),
(5, 2, 3, ''),
(6, 2, 10, '1664855484922'),
(7, 2, 10, '1664855585430'),
(8, 2, 10, '1664855769787'),
(9, 2, 0, '1664883644414'),
(10, 2, 10, '1664885312000'),
(11, 2, 20, '1664885560501'),
(12, 2, 20, '1664887424434'),
(13, 2, 10, '1664887473434'),
(14, 2, 30, '1664887504796'),
(15, 2, 0, '1664887574552'),
(16, 2, 20, '1664888325221'),
(17, 2, 20, '1664889278953');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `exp` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(10) NOT NULL,
  `profile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `nama`, `jenis_kelamin`, `role`, `exp`, `username`, `password`, `profile`) VALUES
(2, 'fauzan', '', '', 150, 'fauzan', '12345', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer_a` varchar(100) NOT NULL,
  `answer_b` varchar(100) NOT NULL,
  `answer_c` varchar(100) NOT NULL,
  `answer_d` varchar(100) NOT NULL,
  `is_correct` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `question`
--

INSERT INTO `question` (`id_question`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `is_correct`) VALUES
(1, 'Yang manakah merupakan bahasa daerah gorontalo dari \"Makan\"?', 'O\'ato', 'Malita', 'Monga', 'Landingalo', 'c'),
(3, 'Kata \"Membajak\" jika di terjemahkan kedalam bahasa daerah Gorontalo berarti ...', 'Momade\'o', 'Ta\'apo', 'Mohalingo', 'Mowali', 'a'),
(4, 'Kata \"Ponula\" jika di terjemahkan kedalam bahasa Indonesia', 'Ayam', 'Manusia', 'Raja', 'Ikan', 'd'),
(5, 'Wolo tugasi li pak Polisi?', 'Belajar', 'Makan', 'Menilang', 'Pungli', 'c'),
(6, 'Kata \"Patodu\" jika di terjemahkan kedalam bahasa Indonesia adalah ...', 'Tebu', 'Daun pandan', 'Motor', 'Sepeda', 'a'),
(7, '\"Tembe\" jika di terjemahkan kedalam bahasa gorontalo berarti ...', 'Pinang', 'Sirih', 'Ikan ', 'Tembaga', 'b');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indeks untuk tabel `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
