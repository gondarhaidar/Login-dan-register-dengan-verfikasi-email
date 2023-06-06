-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2023 at 06:25 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `verifikasi-email`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `kode` varchar(8) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `kode`, `status`) VALUES
(13, 'gondarahmadhaidar@gmail.com', '$2y$10$.BT89q56YsdX8Jil/asGTupU1FWLHvM2Muw0rHDKf3CwyfKpC9fOy', '047062', 0),
(14, 'gondarhaidar@gmail.com', '$2y$10$lycHkGthhivy/XMc0m4M7uURX/qAr8KoELk82y4sBpbpcy35AiE2G', '071037', 1),
(15, 'gondarsb@gmail.com', '$2y$10$b0a6SZuCyw8Gcru6kLsLRuAlH9ae/0X1FNa7ZqpIQlZazzamgoG3G', '309587', 1),
(16, 'henrysetiawan805@gmail.com', '$2y$10$JjzN4G1HDJyADRMp76qgoeqRa9Z33fymZAv.gzQdRoBla8aihDbl.', '699451', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
