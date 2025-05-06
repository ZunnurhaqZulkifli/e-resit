-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2023 at 03:34 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deploy_resit`
--

-- --------------------------------------------------------

--
-- Table structure for table `ajk`
--

CREATE TABLE `ajk` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `ajk` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ajk`
--

INSERT INTO `ajk` (`id`, `name`, `ajk`, `password`) VALUES
(1, 'faris', '112233', '123'),
(2, 'faris', 'ajk', '123'),
(3, 'faris', 'ajk', '123'),
(4, 'faris', 'ajk', '123'),
(5, 'faris', 'ajk', '123'),
(6, 'faris', 'ajk', '123'),
(7, 'faris', 'ajk', '123'),
(8, 'faris', 'ajk', '123'),
(9, 'faris', 'ajk', '123'),
(10, 'faris', 'ajk', '123'),
(11, 'faris', 'ajk', '123');

-- --------------------------------------------------------

--
-- Table structure for table `resit`
--

CREATE TABLE `resit` (
  `id` int NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `bahagian` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ndp` varchar(255) NOT NULL,
  `sesi` varchar(255) NOT NULL,
  `semester` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ksk1` varchar(255) NOT NULL,
  `ksk2` varchar(255) NOT NULL,
  `total1` varchar(255) NOT NULL,
  `total2` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `resit`
--

INSERT INTO `resit` (`id`, `jabatan`, `bahagian`, `name`, `ndp`, `sesi`, `semester`, `ksk1`, `ksk2`, `total1`, `total2`, `total`) VALUES
(6, 'elektrik & elektrikal', 'diploma teknologi automotif', 'akmal', '1612344', '2/23', 'Semester 1', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(7, 'mekanikal & pengeluaran', 'diploma teknologi automotif', 'saiful amin', '1649156', '2/24', 'Semester 1', 'Senarai Pelajar Latihan dan Asrama', '-', 'RM 451.00', '-', 'RM 451.00'),
(8, 'mekanikal & pengeluaran', 'diploma teknologi automotif', 'azam manan', '165465', '2/24', 'Semester 1', '-', 'Dobi + Buku Outing', '-', 'RM 81.00', 'RM 81.00'),
(9, 'elektrik & elektrikal', 'diploma teknologi mekatronik', 'hazimi bin safwan', '16565', '2/23', 'Semester 2', '-', 'Dobi + Buku Outing', '-', 'RM 81.00', 'RM 81.00'),
(10, 'elektrik & elektrikal', 'diploma teknologi automotif', 'hazim bin jasan', '16765', '2/23', 'Semester 2', 'Senarai Pelajar Latihan dan Asrama', '-', 'RM 451.00', '-', 'RM 451.00'),
(11, 'mekanikal & pengeluaran', 'diploma teknologi automotif', 'sadan bin danan', '164896', '2/24', 'Semester 1', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(12, 'mekanikal & pengeluaran', 'diploma teknologi telekomunikasi', 'fariq bin hasim', '164966', '2/25', 'Semester 1', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(13, 'mekanikal & pengeluaran', 'diploma teknologi telekomunikasi', 'fariq bin farid', '167857', '2/25', 'Semester 1', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(14, 'elektrik & elektrikal', 'diploma teknologi telekomunikasi', 'hafis bin sadim', '167956', '2/25', 'Semester 1', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(15, 'elektrik & elektrikal', 'diploma teknologi komputer', 'hasan bin munas', '162329', '2/24', 'Semester 2', 'Senarai Pelajar Latihan dan Asrama', '-', 'RM 451.00', '-', 'RM 451.00'),
(16, 'mekanikal & pengeluaran', 'diploma teknologi automotif', 'hamid bin kamal', '145826', '2/24', 'Semester 2', 'Senarai Pelajar Latihan dan Asrama', '-', 'RM 451.00', '-', 'RM 451.00'),
(17, 'mekanikal & pengeluaran', 'diploma teknologi automotif', 'ika binti hassan', '1612358', '2/23', 'Semester 2', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(18, 'mekanikal & pengeluaran', 'diploma teknologi automotif', 'hanim binti daah', '161458', '2/24', 'Semester 2', '-', 'Dobi + Buku Outing', '-', 'RM 81.00', 'RM 81.00'),
(19, 'elektrik & elektrikal', 'diploma teknologi komputer', 'munib danial ', '16123456', '2/24', 'Semester 2', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(20, 'elektrik & elektrikal', 'diploma teknologi komputer', 'faris ilyas', '1612389', '2/25', 'Semester 2', 'Senarai Pelajar Latihan dan Asrama', 'Dobi + Buku Outing', 'RM 451.00', 'RM 81.00', 'RM 532.00'),
(21, 'mekanikal & pengeluaran', 'diploma teknologi komputer', 'danial hasim', '161235', '2/24', 'Semester 1', '-', 'Dobi + Buku Outing', '-', 'RM 81.00', 'RM 81.00');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `ajk`
--
ALTER TABLE `ajk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resit`
--
ALTER TABLE `resit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ajk`
--
ALTER TABLE `ajk`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `resit`
--
ALTER TABLE `resit`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
