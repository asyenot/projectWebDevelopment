-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 02, 2024 at 03:17 PM
-- Server version: 8.2.0
-- PHP Version: 8.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facilitydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_ref` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '',
  `customerId` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_res` date DEFAULT NULL,
  `res_by` char(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `date_rent_start` date DEFAULT NULL,
  `date_rent_end` date DEFAULT NULL,
  `rental_period` smallint DEFAULT NULL,
  `facilityId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `amount_paid` double DEFAULT NULL,
  `paid` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bookingStatus` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_ref`, `customerId`, `date_res`, `res_by`, `date_rent_start`, `date_rent_end`, `rental_period`, `facilityId`, `amount_paid`, `paid`, `bookingStatus`) VALUES
('abcA12024-04-02', 'abc', '2024-04-02', 'abc', '2024-04-02', '2024-04-12', 10, 'A1', 1595.3, NULL, NULL),
('abcA12024-04-27', 'abc', '2024-04-01', 'abc', '2024-04-27', '2024-05-07', 10, 'A1', 1595.3, NULL, NULL),
('abcA32024-04-02', 'abc', '2024-04-02', 'abc', '2024-04-02', '2024-04-03', 1, 'A3', 159.53, NULL, NULL),
('izzulA22024-04-02', 'izzul', '2024-04-02', 'izzul', '2024-04-02', '2024-04-03', 1, 'A2', 159.53, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customerId` varchar(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `custName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phoneNumber` char(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customerId`, `custName`, `phoneNumber`, `email`) VALUES
('CS1', 'Alan', '123456789', 'abc@gmail.com'),
('CS2', 'Walker', '011323232', 'walk@gmail.com'),
('CS3', 'Farihin Saleh', '01110604522', 'farihinsaleh@gmail.com'),
('izzul', 'izzulhamzie', '0124569312', 'izzul@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--

CREATE TABLE `facility` (
  `facilityId` varchar(20) NOT NULL,
  `facilityName` varchar(40) NOT NULL,
  `type` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `capacity` int NOT NULL,
  `ratePerDay` decimal(6,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`facilityId`, `facilityName`, `type`, `capacity`, `ratePerDay`, `status`) VALUES
('A1', 'Makmal Komputer 1', 'Computer Lab', 40, 150.50, 'Available'),
('A2', 'Makmal Komputer 2', 'Computer Lab', 40, 150.50, 'Available'),
('A3', 'Makmal Komputer 3', 'Computer Lab', 40, 150.50, 'Not Available'),
('sad', 'sdas', 'sdffg', 3, 234.00, 'fdfd');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffId` varchar(6) NOT NULL,
  `staffName` varchar(50) NOT NULL,
  `phoneNumber` char(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffId`, `staffName`, `phoneNumber`, `email`) VALUES
('s1', 'farihin', '23424', 'farihinsaleh@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Password` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `Email` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `userType` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Password`, `Email`, `userType`) VALUES
('admin', 'admin', '', 'ADMIN'),
('S1', 'S1', '', 'STAFF'),
('faris', 'wewq', NULL, 'CUSTOMER'),
('izzul', '0089', NULL, 'CUSTOMER'),
('abc', 'abc', NULL, 'CUSTOMER'),
('Ex1', 'ex1', NULL, 'STAFF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_ref`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customerId`);

--
-- Indexes for table `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`facilityId`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
