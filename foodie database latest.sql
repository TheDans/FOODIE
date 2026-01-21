-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 16, 2025 at 03:24 PM
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
-- Database: `foodie`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `adminID` char(5) NOT NULL,
  `adminName` varchar(200) NOT NULL,
  `adminGender` char(1) NOT NULL,
  `adminPhoneNo` varchar(20) NOT NULL,
  `username` varchar(12) NOT NULL,
  `adminIcNo` char(12) NOT NULL,
  `adminEmail` varchar(50) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `adminImage` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `buildingID` char(5) NOT NULL,
  `buildingName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`buildingID`, `buildingName`) VALUES
('BD001', 'Mat Kilau'),
('BD002', 'Tun Teja 1'),
('BD003', 'Tun Teja 2');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `detailID` char(5) NOT NULL,
  `quantity` varchar(2) NOT NULL,
  `orderID` char(5) NOT NULL,
  `prodID` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`detailID`, `quantity`, `orderID`, `prodID`) VALUES
('DT014', '2', 'OR362', 'PD002'),
('DT045', '1', 'OR697', 'PD730'),
('DT058', '1', 'OR671', 'PD005'),
('DT062', '1', 'OR250', 'PD610'),
('DT097', '1', 'OR681', 'PD852'),
('DT104', '3', 'OR284', 'PD610'),
('DT139', '1', 'OR317', 'PD536'),
('DT143', '3', 'OR108', 'PD315'),
('DT167', '1', 'OR823', 'PD852'),
('DT194', '1', 'OR467', 'PD315'),
('DT203', '1', 'OR570', 'PD002'),
('DT236', '1', 'OR523', 'PD852'),
('DT238', '1', 'OR284', 'PD002'),
('DT261', '1', 'OR015', 'PD610'),
('DT279', '1', 'OR542', 'PD003'),
('DT283', '1', 'OR370', 'PD035'),
('DT293', '1', 'OR846', 'PD002'),
('DT307', '4', 'OR701', 'PD730'),
('DT324', '1', 'OR924', 'PD536'),
('DT340', '1', 'OR632', 'PD852'),
('DT371', '1', 'OR963', 'PD610'),
('DT382', '1', 'OR430', 'PD852'),
('DT384', '10', 'OR924', 'PD004'),
('DT386', '5', 'OR096', 'PD005'),
('DT396', '1', 'OR104', 'PD821'),
('DT405', '1', 'OR652', 'PD730'),
('DT408', '6', 'OR701', 'PD610'),
('DT429', '4', 'OR908', 'PD002'),
('DT430', '1', 'OR879', 'PD852'),
('DT438', '1', 'OR631', 'PD610'),
('DT461', '1', 'OR749', 'PD852'),
('DT478', '1', 'OR794', 'PD005'),
('DT479', '1', 'OR375', 'PD005'),
('DT489', '1', 'OR048', 'PD852'),
('DT518', '1', 'OR104', 'PD852'),
('DT519', '1', 'OR652', 'PD005'),
('DT537', '1', 'OR640', 'PD852'),
('DT561', '1', 'OR908', 'PD315'),
('DT563', '1', 'OR710', 'PD507'),
('DT569', '1', 'OR346', 'PD610'),
('DT613', '4', 'OR765', 'PD610'),
('DT615', '1', 'OR736', 'PD852'),
('DT623', '1', 'OR265', 'PD852'),
('DT629', '3', 'OR570', 'PD610'),
('DT654', '1', 'OR673', 'PD852'),
('DT680', '10', 'OR461', 'PD852'),
('DT681', '2', 'OR362', 'PD005'),
('DT687', '1', 'OR697', 'PD610'),
('DT693', '1', 'OR108', 'PD002'),
('DT697', '1', 'OR285', 'PD005'),
('DT703', '3', 'OR401', 'PD730'),
('DT708', '1', 'OR320', 'PD507'),
('DT714', '1', 'OR025', 'PD002'),
('DT718', '1', 'OR097', 'PD852'),
('DT724', '1', 'OR295', 'PD536'),
('DT726', '1', 'OR468', 'PD852'),
('DT765', '3', 'OR908', 'PD610'),
('DT768', '1', 'OR436', 'PD852'),
('DT791', '1', 'OR975', 'PD035'),
('DT794', '1', 'OR083', 'PD730'),
('DT814', '1', 'OR765', 'PD002'),
('DT815', '1', 'OR851', 'PD315'),
('DT827', '1', 'OR710', 'PD852'),
('DT836', '1', 'OR875', 'PD005'),
('DT850', '1', 'OR362', 'PD003'),
('DT852', '1', 'OR381', 'PD002'),
('DT861', '1', 'OR546', 'PD610'),
('DT913', '3', 'OR083', 'PD610'),
('DT931', '1', 'OR851', 'PD610'),
('DT932', '1', 'OR486', 'PD002'),
('DT934', '1', 'OR109', 'PD002'),
('DT938', '1', 'OR875', 'PD730'),
('DT945', '10', 'OR410', 'PD852'),
('DT963', '1', 'OR560', 'PD005'),
('DT964', '2', 'OR401', 'PD610'),
('DT967', '1', 'OR851', 'PD002'),
('DT975', '1', 'OR730', 'PD610'),
('DT978', '1', 'OR260', 'PD852'),
('DT983', '1', 'OR257', 'PD852'),
('DT984', '1', 'OR401', 'PD003');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` char(5) NOT NULL,
  `orderDate` date NOT NULL,
  `deliveryDate` date NOT NULL,
  `dormLevel` varchar(2) NOT NULL,
  `dormNo` varchar(2) NOT NULL,
  `buildingID` char(5) NOT NULL,
  `studID` int(11) NOT NULL,
  `adminID` char(5) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `orderDate`, `deliveryDate`, `dormLevel`, `dormNo`, `buildingID`, `studID`, `adminID`, `status`) VALUES
('OR015', '2021-07-11', '2021-07-30', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR025', '2021-07-11', '2021-07-22', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR034', '2025-11-09', '2025-11-09', '1', '1', 'BD001', 24, 'ADM01', ''),
('OR048', '2025-11-09', '2025-11-09', '1', '1', 'BD001', 24, 'ADM01', ''),
('OR083', '2021-07-12', '2021-07-21', '6', '3', 'BD002', 1261, 'ADM01', ''),
('OR096', '2025-11-19', '2025-11-20', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR097', '2025-11-11', '2025-11-15', '2', '4', 'BD003', 1, 'ADM02', ''),
('OR104', '2025-11-17', '2025-11-18', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR108', '2021-07-11', '2021-07-12', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR109', '2021-07-11', '2021-07-29', '2', '3', 'BD002', 1261, 'ADM01', ''),
('OR164', '2021-07-11', '2021-07-22', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR201', '2025-11-09', '2025-11-09', '1', '1', 'BD001', 24, 'ADM01', ''),
('OR250', '2025-11-10', '2025-11-12', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR257', '2025-11-09', '2025-11-13', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR260', '2025-11-09', '2025-11-21', '', '', 'BD001', 24, 'ADM04', ''),
('OR265', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR275', '2021-07-11', '2021-07-21', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR284', '2021-07-11', '2021-08-06', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR285', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR295', '2025-11-17', '2025-11-18', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR317', '2025-11-18', '2025-11-19', '1', '11', 'BD001', 24, 'ADM04', ''),
('OR320', '2025-11-10', '2025-11-11', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR346', '2021-07-11', '2021-07-13', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR362', '2025-11-19', '2025-11-21', '1', '12', 'BD001', 24, 'ADM04', ''),
('OR370', '2025-11-09', '2025-11-10', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR375', '2021-07-11', '2021-07-14', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR381', '2021-07-11', '2021-07-12', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR401', '2021-07-11', '2021-07-13', '3', '1', 'BD001', 1261, 'ADM03', ''),
('OR408', '2021-07-11', '2021-07-13', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR410', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR430', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR436', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR461', '2025-11-17', '2025-11-18', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR467', '2021-07-11', '2021-07-13', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR468', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR486', '2025-11-19', '2025-11-22', '1', '12', 'BD001', 24, 'ADM04', ''),
('OR519', '2021-07-11', '2021-07-29', '5', '3', 'BD002', 1261, 'ADM01', ''),
('OR523', '2025-11-16', '2025-11-18', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR542', '2025-11-18', '2025-11-19', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR546', '2021-07-11', '2021-07-15', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR560', '2021-07-11', '2021-07-28', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR570', '2021-07-12', '2021-07-21', '3', '8', 'BD003', 1261, 'ADM02', ''),
('OR614', '2021-07-11', '2021-07-14', '1', '1', 'BD001', 1261, 'ADM03', ''),
('OR631', '2021-07-11', '2021-07-29', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR632', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR635', '2021-07-11', '2021-07-21', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR640', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR652', '2021-07-11', '2021-07-20', '6', '1', 'BD002', 1261, 'ADM01', ''),
('OR671', '2025-12-09', '2025-12-10', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR673', '2025-11-17', '2025-11-25', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR681', '2025-11-18', '2025-11-20', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR697', '2021-07-11', '2021-07-22', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR701', '2021-07-11', '2021-07-21', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR710', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR730', '2021-07-11', '2021-07-20', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR736', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR749', '2025-11-11', '2025-11-12', '3', '32', 'BD001', 24, 'ADM04', ''),
('OR765', '2021-07-11', '2021-07-29', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR794', '2025-11-17', '2025-11-17', '1', '1', 'BD001', 24, 'ADM01', ''),
('OR823', '2025-11-17', '2025-11-18', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR846', '2021-07-11', '2021-07-13', '1', '1', 'BD003', 1261, 'ADM02', ''),
('OR851', '2021-07-11', '2021-07-28', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR875', '2025-08-25', '2025-08-26', '1', '1', 'BD001', 1, 'ADM03', ''),
('OR879', '2025-11-16', '2025-11-17', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR908', '2021-07-12', '2021-07-22', '5', '9', 'BD002', 1261, 'ADM01', ''),
('OR924', '2025-11-17', '2025-11-18', '1', '1', 'BD001', 24, 'ADM04', ''),
('OR926', '2021-07-11', '2021-07-28', '1', '1', 'BD002', 1261, 'ADM01', ''),
('OR963', '2025-10-07', '2025-10-07', '1', '1', 'BD001', 24, 'ADM01', ''),
('OR973', '2025-11-09', '2025-11-09', '1', '1', 'BD001', 24, 'ADM01', ''),
('OR975', '2025-11-09', '2025-11-09', '1', '1', 'BD001', 24, 'ADM01', '');

-- --------------------------------------------------------

--
-- Table structure for table `prodtypes`
--

CREATE TABLE `prodtypes` (
  `typeID` char(5) NOT NULL,
  `typeName` varchar(45) NOT NULL,
  `typeDesc` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodtypes`
--

INSERT INTO `prodtypes` (`typeID`, `typeName`, `typeDesc`) VALUES
('PT001', 'Instants', 'Convenience foods which require minimal prep'),
('PT002', 'Sweets', 'Sugar-based products'),
('PT003', 'Biscuits', 'Flour-based baked food products');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` char(5) NOT NULL,
  `prodName` varchar(45) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `prodDesc` varchar(45) NOT NULL,
  `typeID` char(5) NOT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `images` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodID`, `prodName`, `price`, `prodDesc`, `typeID`, `is_active`, `images`) VALUES
('PD002', 'Meggi Tomyam', 3.80, 'Perisa Sup toye', 'PT001', 1, 'admin__29330.jpeg'),
('PD003', 'Meggi Kari', 3.50, 'Perisa Kari', 'PT001', 1, 'maggi kari.jpeg'),
('PD004', 'Beryl\'s Chocolate', 4.30, 'Almond Dark Chocolate ', 'PT002', 1, 'choc bery;s.jpeg'),
('PD005', 'Meggi Ayam', 2.30, '', 'PT001', 1, 'ayam.jpeg'),
('PD035', 'rrrrrrrr', 1.00, '', 'PT002', 0, NULL),
('PD162', 'yyyyyyyyy', 1.00, '', 'PT002', 0, NULL),
('PD315', 'uwu', 5.30, '', 'PT002', 0, NULL),
('PD507', 'cookie skibiodi', 1.40, '', 'PT003', 1, 'OIP.jpeg'),
('PD536', 'Bubur Nestle', 2.10, 'bubur instant', 'PT001', 1, 'bubur nestle.jpg'),
('PD610', 'fffffff', 1.00, '', 'PT001', 0, NULL),
('PD716', 'chocolate chip cookies', 4.50, 'chocolate with chips', 'PT003', 1, NULL),
('PD730', 'khai', 5.60, '', 'PT003', 0, NULL),
('PD750', 'Haziq skibidi', 2.60, 'Perisa Sup Ayam', 'PT002', 0, NULL),
('PD821', 'Bubur Mamee', 2.00, 'bubur mamee sedap', 'PT001', 0, NULL),
('PD852', 'Nasi kakwok', 1.00, 'afiq beli dia qr', 'PT001', 0, 'kakwok.png');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studID` int(11) NOT NULL,
  `studName` varchar(200) NOT NULL,
  `studGender` char(1) NOT NULL,
  `studPhoneNo` varchar(20) DEFAULT NULL,
  `MatricNo` char(10) NOT NULL,
  `studIcNo` char(12) NOT NULL,
  `studEmail` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--



--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`buildingID`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`detailID`),
  ADD KEY `orderID` (`orderID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`),
  ADD KEY `buildingID` (`buildingID`),
  ADD KEY `studID` (`studID`),
  ADD KEY `adminID` (`adminID`);

--
-- Indexes for table `prodtypes`
--
ALTER TABLE `prodtypes`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodID`),
  ADD KEY `typeID` (`typeID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3695;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `orderID` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  ADD CONSTRAINT `prodID` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `adminID` FOREIGN KEY (`adminID`) REFERENCES `admins` (`adminID`),
  ADD CONSTRAINT `buildingID` FOREIGN KEY (`buildingID`) REFERENCES `buildings` (`buildingID`),
  ADD CONSTRAINT `studID` FOREIGN KEY (`studID`) REFERENCES `students` (`studID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `typeID` FOREIGN KEY (`typeID`) REFERENCES `prodtypes` (`typeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
