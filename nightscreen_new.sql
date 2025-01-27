-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 192.168.0.100
-- Generation Time: Jan 26, 2025 at 04:16 PM
-- Server version: 8.0.36-28
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nightscr_nightscreen_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `First_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Last_Name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(75) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `Phone_number` int NOT NULL,
  `id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`First_Name`, `Last_Name`, `Email`, `Password`, `Phone_number`, `id`) VALUES
('Ahmad', 'Alqam', 'ahmad@gmail.com', 'aaa', 123, 1),
('Khalid', 'Omari', 'khalid@gmail.com', 'kkk', 321, 2),
('Yaman ', 'Abu-Laban', 'yaman@gmail.com', 'yyy', 145, 3),
('Husam', 'Amara', 'husam@gmail.com', 'hhh', 231, 4),
('Hashem ', 'Aldous ', 'HASHEMALDOUS@gmail.com', 'HASHEMNEEMO', 792036737, 8),
('Hashem ', 'Aldous ', 'HASHEMALDOUS@gmail.com', 'HASHEMNEEMO', 792036737, 9),
('kk', 'k', 'lo@gmail.com', '321', 6785475, 10),
('kk', 'k', 'lo@gmail.com', '1234', 6785475, 11),
('Malak', 'Awad', 'malakawad@gmail.com', '1234567', 2147483647, 12);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
