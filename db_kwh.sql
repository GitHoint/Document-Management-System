-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 03:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kwh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(26) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'testadmin', 'testadmin@kwh.com', 'testpassword');

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `ownerId` int(6) NOT NULL,
  `type` varchar(50) NOT NULL,
  `criticality` varchar(7) NOT NULL,
  `uploadDate` datetime NOT NULL,
  `filePath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `name`, `ownerId`, `type`, `criticality`, `uploadDate`, `filePath`) VALUES
(1, 'Test Document 1', 1, 'Test type 1', 'low', '2023-03-10 14:36:51', 'files/testfile.pdf'),
(2, 'Test Document 2', 1, 'Test type 2', 'high', '2023-03-10 14:36:51', 'files/testfile2.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `documentaccess`
--

CREATE TABLE `documentaccess` (
  `id` int(10) NOT NULL,
  `employeeId` int(6) NOT NULL,
  `documentId` int(6) NOT NULL,
  `accessDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(6) NOT NULL,
  `adminId` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(26) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `adminId`, `username`, `email`, `password`, `department`) VALUES
(1, 1, 'testemployee', 'testemployee@kwh.com', 'testpassword', 'Test Department');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner` (`ownerId`);

--
-- Indexes for table `documentaccess`
--
ALTER TABLE `documentaccess`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`employeeId`),
  ADD KEY `document` (`documentId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee` (`adminId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `document`
--
ALTER TABLE `document`
  ADD CONSTRAINT `owner` FOREIGN KEY (`ownerId`) REFERENCES `employee` (`id`);

--
-- Constraints for table `documentaccess`
--
ALTER TABLE `documentaccess`
  ADD CONSTRAINT `document` FOREIGN KEY (`documentId`) REFERENCES `document` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`employeeId`) REFERENCES `employee` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
