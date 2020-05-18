-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2020 at 03:03 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digiscam`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `accountId` int(11) NOT NULL,
  `FullName` varchar(200) DEFAULT NULL,
  `UserName` varchar(12) DEFAULT NULL,
  `UserEmail` varchar(200) DEFAULT NULL,
  `UserMobileNumber` varchar(10) DEFAULT NULL,
  `LoginPassword` varchar(255) DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `Role` varchar(255) NOT NULL,
  `validation_key` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`accountId`, `FullName`, `UserName`, `UserEmail`, `UserMobileNumber`, `LoginPassword`, `RegDate`, `Role`, `validation_key`, `is_active`) VALUES
(10, 'podanari', 'podanari12', 'podanari@gmail.com', '1111111111', '0e2b53d8c30f3d59c7430c11e386b26dd43b5487e9f3c17797d945f9f1af8e8b', '2020-04-29 10:47:52', 'admin', '', 0),
(12, 'tester', 'tester3', 'test@gmail.com', '11111111', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-05-01 10:39:50', '', '', 0),
(18, 'tester', 'tester', 'tester@gmail.com', '11111111', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-05-09 04:01:07', '', '', 0),
(57, 'testpdate', 'pdate11', 'albinappu699@gmail.com', '11111111', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-05-18 12:47:57', '', 'YjQwNjQzNTY0ODA2N2Y3YTkwNTUyNDMz', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`accountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
