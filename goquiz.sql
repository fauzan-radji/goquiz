-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Okt 2022 pada 00.28
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

DROP TABLE IF EXISTS `history`;
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
(1, 2, 20, '1664855484922'),
(2, 2, 30, '1664855585430'),
(3, 2, 0, '1664855769787'),
(4, 2, 20, '1664883644414'),
(5, 2, 30, '1664885312000'),
(6, 2, 10, '1664885560501'),
(7, 2, 10, '1664887424434'),
(8, 2, 10, '1664887473434'),
(9, 2, 0, '1664887504796'),
(10, 2, 10, '1664887574552'),
(11, 2, 20, '1664888325221'),
(12, 2, 20, '1664889278953'),
(13, 2, 10, '1664890190315'),
(14, 2, 30, '1664891032826'),
(15, 2, 0, '1664891479343'),
(16, 2, 20, '1665059457223'),
(17, 2, 20, '1665059940910'),
(18, 2, 0, '1665258321330'),
(19, 2, 20, '1665258448703'),
(20, 2, 20, '1665259293355'),
(26, 2, 20, '1665261031210'),
(27, 2, 20, '1665261400836'),
(28, 2, 30, '1665261579063'),
(29, 4, 30, '1665262710247'),
(30, 4, 30, '1665262720530'),
(31, 4, 20, '1665262738070'),
(32, 4, 20, '1665262750036'),
(33, 4, 0, '1665262757852'),
(34, 4, 20, '1665263019585'),
(35, 4, 20, '1665266072495'),
(36, 4, 30, '1665266259187'),
(37, 4, 20, '1665266462070'),
(38, 4, 20, '1665267429225'),
(39, 4, 30, '1665267932245'),
(40, 4, 20, '1665268000001');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(10) NOT NULL,
  `profile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id_profile`, `nama`, `username`, `password`, `profile`) VALUES
(1, 'Admin', 'admin', '12345', 'default.svg'),
(2, 'Fauzan Radji', 'fauzan', '12345', 'ghj.svg'),
(3, 'Agung Saputra', 'agung', '12345', 'jkl.svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `question`
--

DROP TABLE IF EXISTS `question`;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
