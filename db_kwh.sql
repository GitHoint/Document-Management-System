-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 01:55 PM
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
  `uploadDate` datetime NOT NULL DEFAULT current_timestamp(),
  `filePath` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`id`, `name`, `ownerId`, `type`, `criticality`, `uploadDate`, `filePath`) VALUES
(4, 'just a document', 1, 'rando', 'low', '2023-03-17 12:11:22', '641458ea9df09.pdf');

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
  `department` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `adminId`, `username`, `email`, `password`, `department`, `active`) VALUES
(1, 1, 'testemployee', 'testemployee@kwh.com', 'testpassword', 'Test Department', 0),
(2, 1, 'test1', 'test1@gmail.com', 'test1', 'First Department', 0),
(3, 1, 'test2', 'test2@gmail.com', 'test2test2', 'new department', 0);

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
  ADD KEY `document` (`documentId`),
  ADD KEY `user` (`employeeId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin` (`adminId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `documentaccess`
--
ALTER TABLE `documentaccess`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `admin` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
