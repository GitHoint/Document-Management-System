-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2023 at 08:14 PM
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
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'testadmin', 'system.kwh@gmail.com', 'testpassword');

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
(4, 'just a document', 1, 'rando', 'low', '2023-03-17 12:11:22', '641458ea9df09.pdf'),
(7, 'name', 2, 'transaction', 'medium', '2023-03-20 10:46:58', 'name641839a250bbc.pdf'),
(8, '124124', 5, 'transaction', 'medium', '2023-03-22 16:37:26', '124124641b2ec623303.pdf'),
(10, 'test doc213124', 2, 'transaction', 'high', '2023-03-23 20:06:09', 'test doc213124641cbd5fcc957.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `documentaccess`
--

CREATE TABLE `documentaccess` (
  `id` int(10) NOT NULL,
  `employeeId` int(6) NOT NULL,
  `documentId` int(6) NOT NULL,
  `accessDate` datetime NOT NULL DEFAULT current_timestamp(),
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `documentaccess`
--

INSERT INTO `documentaccess` (`id`, `employeeId`, `documentId`, `accessDate`, `action`) VALUES
(13, 2, 4, '2023-03-24 13:01:04', 'view'),
(14, 2, 4, '2023-03-24 13:05:59', 'download'),
(15, 2, 4, '2023-03-24 13:06:09', 'view'),
(16, 2, 4, '2023-03-24 13:10:58', 'view'),
(17, 2, 4, '2023-03-24 13:12:31', 'view'),
(18, 2, 4, '2023-03-24 13:13:02', 'view'),
(19, 2, 4, '2023-03-24 13:22:38', 'view'),
(20, 2, 4, '2023-03-24 13:22:44', 'view'),
(21, 2, 4, '2023-03-24 13:23:00', 'view'),
(22, 2, 4, '2023-03-24 13:23:35', 'view'),
(23, 2, 4, '2023-03-24 13:24:31', 'view'),
(24, 2, 4, '2023-03-24 13:25:21', 'view'),
(25, 2, 4, '2023-03-24 13:28:09', 'view'),
(26, 2, 8, '2023-03-24 13:43:34', 'view'),
(27, 2, 8, '2023-03-24 13:43:36', 'download'),
(28, 2, 8, '2023-03-24 13:49:54', 'view'),
(29, 2, 4, '2023-03-24 13:49:59', 'view');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(6) NOT NULL,
  `adminId` int(6) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `department` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `adminId`, `username`, `email`, `password`, `department`, `active`) VALUES
(1, 1, 'testemployee', 'system.kwh@gmail.com', 'testpassword', 'Test Department', 1),
(2, 1, 'test1', 'test1@gmail.com', 'test1', 'First Department', 0),
(3, 1, 'test2', 'test2@gmail.com', 'test2test2', 'new department', 0),
(5, 1, 'test3', 'test3@gmail.com', '$2y$10$s5s9A02O59iSP4QkjoB.u.BoX/.cd4LsCgCuIjukzXw.XlPXh3OvC', 'tes3dep', 0),
(6, 1, 'test4', 'test4@gmail.com', '$2y$10$uznVLa659yz4O.BkQ0gOHOkt8lFSP1xphfn25rjCfqiTK160nUDba', 'tes4dep', 0),
(10, 1, 'Farshad', 'Farshad389@gmail.com', '$2y$10$HwoZULvXrRNrind7L32cTevGKW6FpF4.WkrD7CadYIJMpH7t/whqC', 'Developer', 1);

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
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `documentaccess`
--
ALTER TABLE `documentaccess`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
