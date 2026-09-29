-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2026 at 05:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `activity`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admins.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `home_tasks`
--

CREATE TABLE `home_tasks` (
  `home_id` int(11) NOT NULL,
  `user_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `tdate` date NOT NULL,
  `dtime` text NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `home_tasks`
--

INSERT INTO `home_tasks` (`home_id`, `user_no`, `name`, `activity`, `tdate`, `dtime`, `status`) VALUES
(44, 22, 'ALvin Gumatay', 'ddcd', '2022-04-15', '4:57:pm', '1'),
(59, 21, 'ALvin Gumatay', 'd', '2022-04-18', '6:41:pm', '1'),
(60, 21, 'ALvin Gumatay', 'c', '2022-04-18', '10:24:pm', '1'),
(63, 21, 'fausto', 'limpieza de enseres', '2025-12-05', '11:11:am', '1'),
(64, 21, 'fausto', 'limpieza de muebles', '2025-12-05', '11:11:am', '1'),
(65, 21, 'fausto', 'limpieza de sillas', '2025-12-10', '1:07:am', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_no` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_no`, `image`, `name`, `password`, `email`, `address`, `mobile`, `status`) VALUES
(21, '7615-403509.jpg', 'fausto', '123', 'ortega13@gmail.com', 'sauces', '0945678765', '1'),
(23, '8614-3.jpg', 'ronnini', '123', 'hiwagaalias@gmail.com', 'ier0i0eriere', '090902092', '1'),
(25, '4545-504652.png', 'bruhos bruhos', '123', 'bruhos@gmail.com', 'dvdvvdvd', '09467556581', '0'),
(26, '7328-SEXTO-repaso de actividades de la semana del ', 'Rosano vallejo', '12345', 'rosano13@gmail.com', 'alborada', '0987876767', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `home_tasks`
--
ALTER TABLE `home_tasks`
  ADD PRIMARY KEY (`home_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_no`),
  ADD UNIQUE KEY `user_no` (`user_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_tasks`
--
ALTER TABLE `home_tasks`
  MODIFY `home_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
