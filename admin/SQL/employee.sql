-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2023 at 05:15 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuelin`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `nic`, `type`, `tel`, `email`, `username`, `password`) VALUES
(4, 'gihan', '971290456V', 'Admin', '077628574', 'gihan@gmail.com', 'assd', '1233'),
(3, 'Poshitha Karunaratne', '971280421V', 'Dispatch Office', '0344444444', 'chathuranga.karunarathne0508@gmail.com', 'admin', 'admin@12345'),
(5, 'dfdvdv', '971290456V', 'Dispatch Office', '0344444444', 'tharindu@gmail.com', 'assd', '1233'),
(6, 'Sithrai', '906670194V', 'Dispatch Office', '0767929543', 'Sithrai@gmail.com', 'Sithrai', 'sithrai@12345'),
(7, 'rajith', '7898574625', 'station manger', '7784895199', 'rajith@gmail.com', 'rajith', 'rajith@12345'),
(8, 'Chathuranga Karunarathne', '971280441V', 'Admin', '0776270417', 'chathuranga.karunarathne0508@gmail.com', 'admin', 'admin@12345');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
