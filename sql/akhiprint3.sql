-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 07:23 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akhiprint`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_id`, `user_name`, `admin_name`, `admin_address`, `admin_password`) VALUES
(2, 'A100', 'Rayhan1234', 'Rayhan', 'Duptara', '12345'),
(5, 'A101', 'Chisty1234', 'Chisty', 'Banasri', '12345'),
(9, 'A106', 'Bhuiya1234', 'Rayhan', 'Araihazar', '123456'),
(10, 'A109', 'Rayhan22', 'Rayhan', 'Narayangonj', '123456'),
(11, 'A110', 'RayhanAiub', 'RAYHAN', 'DUPTARA', '01622927278'),
(12, 'A111', 'RayhanAiub', 'RAYHAN', 'DUPTARA', '01622927278');

-- --------------------------------------------------------

--
-- Table structure for table `admin_phone`
--

CREATE TABLE `admin_phone` (
  `id` int(11) NOT NULL,
  `admin_id` varchar(5) NOT NULL,
  `phone_number` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_phone`
--

INSERT INTO `admin_phone` (`id`, `admin_id`, `phone_number`) VALUES
(1, 'A100', 1956370113),
(2, 'A110', 1622927278);

-- --------------------------------------------------------

--
-- Table structure for table `filetracker`
--

CREATE TABLE `filetracker` (
  `Id` int(11) NOT NULL,
  `file_Id` varchar(30) NOT NULL,
  `file_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `productName` varchar(30) NOT NULL,
  `productPrice` varchar(30) NOT NULL,
  `productQualityType` varchar(30) NOT NULL,
  `productId` varchar(30) NOT NULL,
  `dyingName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `productName`, `productPrice`, `productQualityType`, `productId`, `dyingName`) VALUES
(3, ' Power', ' 610', ' Bp', 'P1001', ' Roni'),
(4, ' Vowel', ' 450', ' vowel', 'P1002', ' Five and five'),
(5, ' Vowel Plus', ' 440', ' vowel', 'P1003', ' Five and five'),
(6, ' Selfi', ' 530', 'BP', 'P1004', 'Rony dying'),
(7, ' Talash', ' 430', 'vowel', 'P1005', 'Rony dying'),
(8, 'Pakhi', ' 435', 'BP', 'P1006', 'Rony dying'),
(9, 'Rong', '390', 'BP', 'P1007', 'Shapla dying'),
(10, 'Deu', '350', 'BP', 'P1008', 'Nurani dying'),
(11, ' Pakhi', ' 430', ' without Bp', 'P1009', ' Roni'),
(12, ' Rong', ' 385', ' without Bp', 'P1010', ' Roni');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_id` (`admin_id`);

--
-- Indexes for table `admin_phone`
--
ALTER TABLE `admin_phone`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `filetracker`
--
ALTER TABLE `filetracker`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `file_Id` (`file_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `upi` (`productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `admin_phone`
--
ALTER TABLE `admin_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `filetracker`
--
ALTER TABLE `filetracker`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
