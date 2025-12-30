-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 30, 2025 at 08:50 AM
-- Server version: 8.0.30
-- PHP Version: 8.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `belajarphp`
--
CREATE DATABASE IF NOT EXISTS `belajarphp` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `belajarphp`;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nrp` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nrp`, `email`, `jurusan`, `gambar`, `alamat`) VALUES
(5, 'yuda hadi', '25200830', 'yudahp363@gmail.com', 'mesin', 'contoh.jpg', 'tangerang'),
(6, 'desy juliati', '25200919', 'desy36@gmail.com', 'rpl', 'gambar.png', 'bandung'),
(9, 'rayhan', '25200820', 'rayhan34@gmail.com', 'rpl', 'makan.png', 'jatiuwung'),
(10, 'abil', '25200919', 'abil35@gmail.com', 'industri', 'gambar.png', 'tangerang'),
(18, 'hana', '25200908', 'hana36@gmail.com', 'RPL', '6949f09bd1538.png', 'Cipondoh');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'yudaaja', 'hadi12@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'weihp', 'yudahp363@gmail.com', '$2y$10$g8sRlpFkbG0jIH6Mq7QTbOyWRVhIKDxJ97g0u1W.3SU9ALo3ooHk6'),
(3, 'yuda', 'yudahp363@gmail.com', '$2y$10$bfN/w7Hz/1SbVGcWRxnh.uJJXLmwkJLAWO9MPdz5poi41fRDeblVu'),
(4, 'desy', 'desy31@gmail.com', '$2y$10$o7tOe6h6TXFjZrLYmoboauA3Tw3RPC5giUPTrUpd8fTRW.FYWPovi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nrp` (`nrp`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Database: `mahasiswa`
--
CREATE DATABASE IF NOT EXISTS `mahasiswa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `mahasiswa`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
