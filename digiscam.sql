-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 09:32 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

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
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `title` text NOT NULL,
  `content` longtext NOT NULL,
  `category` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postId`, `accountId`, `title`, `content`, `category`) VALUES
(29, 75, 'scam1', 'scam 1', 'Apple Scam'),
(30, 75, 'scam 2', 'scam 2', 'Apple Scam'),
(31, 75, 'scam 3', 'scam 3', 'Credit Card Scam'),
(32, 75, 'scam 4', 'scam 4', 'Love Scam'),
(33, 75, 'scam 5', 'scam 5', 'Apple Scam'),
(34, 75, 'scam 6', 'scam 6', 'Credit Card Scam'),
(35, 75, 'scam 3', 'scam 3', 'Apple Scam'),
(36, 75, 'scam 3', 'scam 3', 'Apple Scam'),
(38, 75, 'Other Scams', 'Other Scams', 'Other Online Scams'),
(39, 75, 'Nigerian Love Scam', 'Be careful of tinder profiles ', 'Love Scam'),
(40, 75, 'DBS Credit Card', 'DBS staff will not call for credit card replacement', 'Credit Card Scam');

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
(10, 'podanari', 'podanari12', 'tester@gmail.com', '1111111111', '0e2b53d8c30f3d59c7430c11e386b26dd43b5487e9f3c17797d945f9f1af8e8b', '2020-04-29 10:47:52', 'admin', '', 1),
(75, 'armond kuriakose ', 'armond12', 'albinappu699@gmail.com', '6583629442', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-05-29 04:53:30', '', 'ODg1NDNhYzY1YTFjZWQyOTgzZGU3M2Yy', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voting`
--

CREATE TABLE `voting` (
  `voteId` int(11) NOT NULL,
  `accountId` int(11) NOT NULL,
  `postId` int(11) NOT NULL,
  `vote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting`
--

INSERT INTO `voting` (`voteId`, `accountId`, `postId`, `vote`) VALUES
(1, 75, 29, 1),
(2, 75, 30, 0),
(3, 75, 31, 0),
(5, 75, 32, 0),
(6, 75, 33, 0),
(29, 75, 38, 0),
(30, 75, 39, 0),
(31, 75, 40, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `accountId` (`accountId`);

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`accountId`);

--
-- Indexes for table `voting`
--
ALTER TABLE `voting`
  ADD PRIMARY KEY (`voteId`),
  ADD KEY `accountId` (`accountId`),
  ADD KEY `postId` (`postId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `voteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `userdata` (`accountId`);

--
-- Constraints for table `voting`
--
ALTER TABLE `voting`
  ADD CONSTRAINT `voting_ibfk_1` FOREIGN KEY (`accountId`) REFERENCES `userdata` (`accountId`),
  ADD CONSTRAINT `voting_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `post` (`postId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
