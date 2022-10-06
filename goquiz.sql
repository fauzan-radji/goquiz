-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2022 at 02:17 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

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
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`id`, `id_user`, `point`) VALUES
(1, 2, 8),
(2, 2, 5),
(3, 2, 10),
(4, 2, 5),
(5, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `kyu` int(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(10) NOT NULL,
  `profile` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id_profile`, `nama`, `jenis_kelamin`, `role`, `kyu`, `username`, `password`, `profile`) VALUES
(2, 'fauzan', '', '', 0, 'fauzan', '12345', ''),
(3, 'fauzan', '', '', 0, 'fauzan', '456', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer_a` varchar(50) NOT NULL,
  `answer_b` varchar(50) NOT NULL,
  `answer_c` varchar(50) NOT NULL,
  `answer_d` varchar(50) NOT NULL,
  `is_correct` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `answer_a`, `answer_b`, `answer_c`, `answer_d`, `is_correct`) VALUES
(1, 'Yang manakah merupakan bahasa daerah gorontalo dari \"Makan\"?', 'O\'ato', 'Malita', 'Monga', 'Landingalo', 'c'),
(3, 'Arti \"Membajak\" jika di terjemahkan kedalam bahasa daerah Gorontalo adalah ...', 'Momade\'o', 'Ta\'apo', 'Mohalingo', 'Mowali', 'a'),
(4, '\"Ponula\" jika di terjemahkan kedalam bahasa Indonesia adalah ...', 'Ayam', 'Manusia', 'Raja', 'Ikan', 'd'),
(5, 'Wolo tugasi li pak Polisi?', 'Belajar', 'Makan', 'Menilang', 'Pungli', 'c'),
(6, '\"Patodu\" jika di terjemahkan kedalam bahasa indonesia adalah ...', 'Tebu', 'Daun pandan', 'Motor', 'Sepeda', 'a'),
(7, 'Tembe jika di terjemahkan kedalam bahasa gorontalo merupakan ...', 'Pinang', 'Sirih', 'Ikan ', 'Tembaga', 'b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
