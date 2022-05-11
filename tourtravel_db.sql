-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2022 at 02:26 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourtravel_db`
--

-- --------------------------------------------------------
CREATE DATABASE tourtravel_db;

USE tourtravel_db;
--
-- Table structure for table `guider`
--

CREATE TABLE `guider` (
  `id_guider` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(30) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `price` int(11) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `users_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `id_guirder` varchar(255) NOT NULL,
  `in` date NOT NULL,
  `out` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_wisata`
--

CREATE TABLE `tempat_wisata` (
  `nama_tempat` varchar(225) NOT NULL,
  `foto_tempat` varchar(225) NOT NULL,
  `alamat_lokasi` varchar(225) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(40) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `jenis_kelamin`, `email`, `no_telp`, `password`) VALUES
(1215723, 'Ryan', 'Laki-laki', 'ryan@gmail.com', 2142719, 'ryan1123'),
(1215724, 'Lyam', 'Laki-laki', 'yanyan@gmail.com', 23411234, 'heihooa'),
(1215725, 'asfaj', 'Laki-laki', 'adkaap@gmail.com', 89170391, 'afsahska'),
(1215726, 'galih', 'Laki-laki', 'gailihp@gmail.com', 89170391, 'arsyqsj'),
(1215727, 'ruska', 'Perempuan', 'faysiaosa@gmail.com', 971061, 'fsahja');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1215728;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
