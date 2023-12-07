-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2023 at 01:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chologureberai`
--

-- --------------------------------------------------------

--
-- Table structure for table `businesslist`
--

CREATE TABLE `businesslist` (
  `bId` int(11) NOT NULL,
  `businessName` varchar(16) NOT NULL,
  `location` varchar(16) NOT NULL,
  `catagory` varchar(10) NOT NULL,
  `userName` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `businesslist`
--

INSERT INTO `businesslist` (`bId`, `businessName`, `location`, `catagory`, `userName`) VALUES
(1, 'admin', 'admin', 'admin', 'admin'),
(6, 'VL Lounge', 'Savar', 'hotel', 'sonjon'),
(7, 'VL Cupboard', 'Savar', 'food', 'sonjon'),
(8, 'VL WatchTower', 'Savar', 'fun', 'sonjon');

-- --------------------------------------------------------

--
-- Table structure for table `groupinfo`
--

CREATE TABLE `groupinfo` (
  `gCode` int(11) NOT NULL,
  `username` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `groupinfo`
--

INSERT INTO `groupinfo` (`gCode`, `username`) VALUES
(2, 'fuad');

-- --------------------------------------------------------

--
-- Table structure for table `grouplist`
--

CREATE TABLE `grouplist` (
  `gCode` int(11) NOT NULL,
  `gName` varchar(16) NOT NULL,
  `loi` varchar(16) NOT NULL,
  `minBudget` int(6) NOT NULL,
  `maxBudget` int(6) NOT NULL,
  `nom` int(2) NOT NULL,
  `etd` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grouplist`
--

INSERT INTO `grouplist` (`gCode`, `gName`, `loi`, `minBudget`, `maxBudget`, `nom`, `etd`) VALUES
(2, 'TARC', 'Savar', 20, 100, 6, 1),
(4, 'Enter Group name', 'Enter Location o', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoiceID` int(3) NOT NULL,
  `username` int(16) NOT NULL,
  `number` int(16) NOT NULL,
  `trx` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoiceID`, `username`, `number`, `trx`) VALUES
(1, 0, 2147483647, '12345678901DGF'),
(2, 0, 2147483647, '12345678901DGF');

-- --------------------------------------------------------

--
-- Table structure for table `pendingapplication`
--

CREATE TABLE `pendingapplication` (
  `bId` int(3) NOT NULL,
  `businessName` varchar(16) NOT NULL,
  `location` varchar(16) NOT NULL,
  `catagory` varchar(16) NOT NULL,
  `username` varchar(16) NOT NULL,
  `status` varchar(16) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pendingapplication`
--

INSERT INTO `pendingapplication` (`bId`, `businessName`, `location`, `catagory`, `username`, `status`) VALUES
(5, 'VL Lounge', 'Savar', 'hotel', 'sonjon', 'Accepted'),
(6, 'VL Cupboard', 'Savar', 'food', 'sonjon', 'Accepted'),
(7, 'VL WatchTower', 'Savar', 'fun', 'sonjon', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `servicelist`
--

CREATE TABLE `servicelist` (
  `sId` int(3) NOT NULL,
  `bId` int(3) NOT NULL,
  `serviceName` varchar(16) NOT NULL,
  `price` int(6) NOT NULL,
  `discount` int(2) NOT NULL DEFAULT 0,
  `negotiate` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicelist`
--

INSERT INTO `servicelist` (`sId`, `bId`, `serviceName`, `price`, `discount`, `negotiate`) VALUES
(8, 6, 'Single Bed', 500, 0, 0),
(9, 6, '4 Bed', 1800, 0, 0),
(11, 7, 'Chocolate', 1200, 0, 0),
(12, 7, 'Fruits', 1400, 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usercart`
--

CREATE TABLE `usercart` (
  `username` varchar(16) NOT NULL,
  `sId` int(3) NOT NULL,
  `serviceName` varchar(16) NOT NULL,
  `price` int(6) NOT NULL,
  `discount` int(2) NOT NULL,
  `quantity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `name` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`name`, `password`, `mail`, `type`) VALUES
('admin', 'admin', 'fuadislam098@gmail.com', 'admin'),
('', '', '', ''),
('fuad', 'fuad', 'fuad@gmail.com', 'customer'),
('sonjon', 'sonjon', 'sonjon@gmail.com', 'business'),
('rexm', 'rexm', 'rexm@gmail.com', 'customer'),
('kaus', 'kaus', 'kaus@gmail.com', 'business'),
('zaki', 'zaki', 'zaki@gmail.com', 'customer'),
('elite', 'elite', 'elite@gmail.com', 'business');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `businesslist`
--
ALTER TABLE `businesslist`
  ADD PRIMARY KEY (`bId`);

--
-- Indexes for table `grouplist`
--
ALTER TABLE `grouplist`
  ADD PRIMARY KEY (`gCode`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoiceID`);

--
-- Indexes for table `pendingapplication`
--
ALTER TABLE `pendingapplication`
  ADD PRIMARY KEY (`bId`);

--
-- Indexes for table `servicelist`
--
ALTER TABLE `servicelist`
  ADD PRIMARY KEY (`sId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `businesslist`
--
ALTER TABLE `businesslist`
  MODIFY `bId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `grouplist`
--
ALTER TABLE `grouplist`
  MODIFY `gCode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoiceID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendingapplication`
--
ALTER TABLE `pendingapplication`
  MODIFY `bId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `servicelist`
--
ALTER TABLE `servicelist`
  MODIFY `sId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
