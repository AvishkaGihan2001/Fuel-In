-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 08:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuel_in`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_vehicle`
--

CREATE TABLE `add_vehicle` (
  `email` varchar(255) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `vehicle_no` varchar(10) NOT NULL,
  `chasse_no` varchar(30) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_vehicle`
--

INSERT INTO `add_vehicle` (`email`, `vehicle_id`, `vehicle_no`, `chasse_no`, `vehicle_type`) VALUES
('xagihan13@gmail.com', 5, 'BG-7274', '100020000', 'Bike'),
('xagihan13@gmail.com', 6, 'BG-10000', '5555666666', 'Van'),
('chathuranga.karunarathne0508@gmail.com', 7, 'BG-5000', '40156211000', 'Car'),
('xagihan13@gmail.com', 11, 'Abc123', '10030000', 'Three wheel'),
('admin@mail.com', 12, 'Abc1234', '100020000', 'Car'),
('xagihan13@gmail.com', 13, 'AS-7274', '40156211000', 'Three wheel');

-- --------------------------------------------------------

--
-- Table structure for table `customermsg`
--

CREATE TABLE `customermsg` (
  `CusnotId` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `Fuel_type` varchar(50) NOT NULL,
  `fuel_amount` int(11) NOT NULL,
  `fuel_price` decimal(10,2) NOT NULL,
  `totalamount` decimal(10,2) NOT NULL,
  `date` varchar(60) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customermsg`
--

INSERT INTO `customermsg` (`CusnotId`, `email`, `status`, `Fuel_type`, `fuel_amount`, `fuel_price`, `totalamount`, `date`, `message`) VALUES
(1, 'xagihan13@gmail.com', 'Approval', 'diesel', 10, '405.00', '4050.00', '22-02-23 12:43:38', 'Your request is approval please process the payment'),
(2, 'chathuranga.karunarathne0508@gmail.com', 'Approval', 'petrol', 10, '400.00', '4000.00', '23-02-23 01:47:21', 'Your request is approval please process the payment');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nic` varchar(50) NOT NULL,
  `type` varchar(20) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `nic`, `type`, `tel`, `email`, `username`, `password`) VALUES
(1, 'Avishka Gamini', '2011111', 'Admin', '0766449511', 'xagihan13@gmail.com', 'admin', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `fuelrequest`
--

CREATE TABLE `fuelrequest` (
  `frid` int(11) NOT NULL,
  `servicestationname` varchar(255) NOT NULL,
  `fueltype` enum('p','d') NOT NULL,
  `reqQty` varchar(255) NOT NULL,
  `reqDate` date NOT NULL,
  `resdate` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuelrequest`
--

INSERT INTO `fuelrequest` (`frid`, `servicestationname`, `fueltype`, `reqQty`, `reqDate`, `resdate`, `status`) VALUES
(1, 'Maradana', 'p', '100', '2023-02-24', '2023-02-23', ' Approval'),
(2, 'Ja ela', 'd', '122', '2023-02-17', NULL, 'pending'),
(3, 'Ja ela', 'p', '122', '2023-02-17', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `fuelstation`
--

CREATE TABLE `fuelstation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contactno` varchar(20) NOT NULL,
  `capacity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fuelstation`
--

INSERT INTO `fuelstation` (`id`, `name`, `address`, `contactno`, `capacity`) VALUES
(1, 'IOC', 'Galle', '0766449511', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `fueltype`
--

CREATE TABLE `fueltype` (
  `id` int(11) NOT NULL,
  `fuaname` varchar(50) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fueltype`
--

INSERT INTO `fueltype` (`id`, `fuaname`, `price`) VALUES
(1, 'Petrol', '400.00'),
(3, 'Diesel', '405.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `SID` int(11) NOT NULL,
  `INVOICE_NO` int(11) NOT NULL,
  `INVOICE_DATE` date NOT NULL,
  `CNAME` varchar(50) NOT NULL,
  `CADDRESS` varchar(150) NOT NULL,
  `CCITY` varchar(50) NOT NULL,
  `GRAND_TOTAL` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`SID`, `INVOICE_NO`, `INVOICE_DATE`, `CNAME`, `CADDRESS`, `CCITY`, `GRAND_TOTAL`) VALUES
(1, 11, '2023-02-22', 'Avishka Gihan', 'No.30 , Archbishop lane , Tudella  , ja ela', 'Ja ela', 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_products`
--

CREATE TABLE `invoice_products` (
  `ID` int(11) NOT NULL,
  `SID` int(11) NOT NULL,
  `PNAME` varchar(100) NOT NULL,
  `PRICE` double(10,2) NOT NULL,
  `QTY` int(11) NOT NULL,
  `TOTAL` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice_products`
--

INSERT INTO `invoice_products` (`ID`, `SID`, `PNAME`, `PRICE`, `QTY`, `TOTAL`) VALUES
(1, 1, 'Patrol ', 10000.00, 2, 20000.00);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nic` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `full_name`, `nic`, `email`, `password`, `status`) VALUES
(2, 'Gamini gayan', '200110401030', 'Hubman2001@gmail.com', '$2y$10$9a0acn/7X4R.lKKlmWK38e3iZPdgbU3Jsr/h65tDm69n4CEf8abI2', 1),
(4, 'Chathuranga', '0011111111', 'chathuranga.karunarathne0508@gmail.com', '$2y$10$nJV0FWWCDP417GubFVz7.ej5EZPuAWp4QkAn/zZwJu9Gp73Ot5tTu', 1),
(5, 'Avishka Gihan', '200110401030', 'xagihan13@gmail.com', '$2y$10$6si3nQn3pvTnzIUM0nV0De2sD6My48lEmg/mgZ/P1I08VuZ/0SRwG', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pay_amount` varchar(255) NOT NULL,
  `pay_method` varchar(255) NOT NULL,
  `img_url` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `email`, `pay_amount`, `pay_method`, `img_url`, `status`) VALUES
(13, 'xagihan13@gmail.com', '20000', 'Bank transfer', 'pic/WhatsApp Image 2023-01-30 at 11.48.32.jpeg', 'Pending'),
(24, 'xagihan13@gmail.com', '20000', 'Bank transfer', 'pic/Screenshot (39).png', 'Approved'),
(25, 'xagihan13@gmail.com', '20000', 'Bank transfer', 'pic/Screenshot_20230131_042641.png', 'Pending'),
(26, 'xagihan13@gmail.com', '4050', 'Bank transfer', 'pic/Screenshot_20230202_092114.png', 'Approved'),
(29, 'chathuranga.karunarathne0508@gmail.com', '4000', 'Bank transfer', 'pic/Screenshot_20230131_042459.png', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `req_fuel`
--

CREATE TABLE `req_fuel` (
  `req_id` int(11) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nic` varchar(15) DEFAULT NULL,
  `fuel_amount` varchar(100) DEFAULT NULL,
  `fuel_type` varchar(255) NOT NULL,
  `station` varchar(255) DEFAULT NULL,
  `date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `req_fuel`
--

INSERT INTO `req_fuel` (`req_id`, `full_name`, `email`, `nic`, `fuel_amount`, `fuel_type`, `station`, `date`, `status`) VALUES
(11, 'Avishka Gihan', 'xagihan13@gmail.com', '200110401030', '10', 'diesel', 'Gampaha', '2023-02-21', 'Approval'),
(12, 'Avishka Gihan', 'xagihan13@gmail.com', '200110401030', '10', 'diesel', 'Matale', '2023-02-22', 'Approved'),
(13, 'Avishka Gihan', 'xagihan13@gmail.com', '200110401030', '10', 'diesel', 'Matale', '2023-02-22', 'Pending'),
(14, 'Chathuranga', 'chathuranga.karunarathne0508@gmail.com', '0011111111', '10', 'petrol', 'Kalutara', '2023-02-24', 'Approval');

-- --------------------------------------------------------

--
-- Table structure for table `smlogin`
--

CREATE TABLE `smlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `smlogin`
--

INSERT INTO `smlogin` (`id`, `username`, `email`, `password`) VALUES
(1, 'john', '', '123'),
(2, 'Nishadi', 'Nishadi@gmail.com', 'abc123');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stockid` int(11) NOT NULL,
  `fueltype` varchar(100) NOT NULL,
  `Qty` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stockid`, `fueltype`, `Qty`) VALUES
(1, 'Petrol', '300L'),
(2, 'Diesel', '600L');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_vehicle`
--
ALTER TABLE `add_vehicle`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- Indexes for table `customermsg`
--
ALTER TABLE `customermsg`
  ADD PRIMARY KEY (`CusnotId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fuelrequest`
--
ALTER TABLE `fuelrequest`
  ADD PRIMARY KEY (`frid`);

--
-- Indexes for table `fuelstation`
--
ALTER TABLE `fuelstation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fueltype`
--
ALTER TABLE `fueltype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `invoice_products`
--
ALTER TABLE `invoice_products`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `req_fuel`
--
ALTER TABLE `req_fuel`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `smlogin`
--
ALTER TABLE `smlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stockid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_vehicle`
--
ALTER TABLE `add_vehicle`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `customermsg`
--
ALTER TABLE `customermsg`
  MODIFY `CusnotId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fuelrequest`
--
ALTER TABLE `fuelrequest`
  MODIFY `frid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fuelstation`
--
ALTER TABLE `fuelstation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fueltype`
--
ALTER TABLE `fueltype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoice_products`
--
ALTER TABLE `invoice_products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `req_fuel`
--
ALTER TABLE `req_fuel`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `smlogin`
--
ALTER TABLE `smlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stockid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
