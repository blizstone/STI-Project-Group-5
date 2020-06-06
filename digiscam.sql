-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2020 at 04:58 PM
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
-- Table structure for table `compare`
--

CREATE TABLE `compare` (
  `scams` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(3, 12, '', 'content testing 3', 'Love Scam'),
(4, 12, '', 'content testing 4', 'Love Scam'),
(5, 12, '', 'content testing 5', 'Apple Scam'),
(6, 12, '', 'content testing 6', 'Love Scam'),
(7, 12, '', 'content testing 7', 'Love Scam'),
(8, 12, '', 'content testing 8', 'Credit Card Scam'),
(9, 12, '', 'content testing 9', 'Credit Card Scam'),
(10, 12, '123', '456', 'Apple Scam'),
(11, 12, '1234', '45689798', 'Apple Scam'),
(13, 18, '65345634', '5345345', 'Apple Scam'),
(14, 18, 'dsfsdf', 'dfsdfs', 'Apple Scam'),
(15, 63, 'tester', 'tester', 'Love Scam'),
(16, 63, 'tester', 'tester', 'Love Scam'),
(17, 63, 'tester', 'tester', 'Love Scam'),
(18, 63, 'tester', 'tester', 'Love Scam'),
(19, 63, 'tester', 'tester', 'Credit Card Scam'),
(20, 63, 'tester', 'tester', 'Credit Card Scam'),
(21, 63, 'tester', 'tester', 'Love Scam'),
(22, 63, 'tester', 'tester', 'Apple Scam'),
(23, 63, 'tester', 'tester', 'Apple Scam'),
(24, 63, '1321231', '1324654', 'Apple Scam'),
(25, 63, '1321231', '1324654', 'Apple Scam'),
(35, 63, 'fgdfgfxb', 'fgdfgxfxc', 'Love Scam'),
(36, 63, 'fgdfgfxb', 'fgdfgxfxc', 'Credit Card Scam'),
(37, 63, 'fgdfgfxb', 'testing edit list', 'Love Scam'),
(38, 63, 'jdshfjk', 'djfshjdakl', 'jklfsjdkljalk'),
(39, 63, 'kelly', '', ''),
(40, 63, 'kelly', 'kelly', 'jdfksld;'),
(41, 63, 'fhjasmk', 'jdfs;ksa;', 'jdfsjalasjd'),
(42, 63, 'dhfjsdkla', 'dfsjdlksdfdhfusdkljsdjifdjiojsadiofdsjdiofdufhuddfudofidhfadfsd', 'Credit Card Scam'),
(43, 63, 'ausdhsuha', 'djflsdioffksdklsdjfklsdj', 'Apple Scam'),
(44, 63, 'testet tstet as', 'this content is fake\r\n\r\n', 'Apple Scam'),
(45, 63, 'tester12233231', 'fake content', 'Apple Scam'),
(47, 65, 'tester4 no1', 'tester 4 no1 update\r\n', 'Apple Scam'),
(48, 63, 'test post display', 'test post display\r\n', 'Apple Scam'),
(49, 63, 'testing 123', 'testing 123\r\n', 'Apple Scam'),
(50, 65, 'tester 4', 'fsfdfs', 'Apple Scam'),
(51, 65, 'tester4', 'kelly is friend', 'Apple Scam'),
(52, 65, 'tester 4 remove test', 'testing remove block\r\n', 'Apple Scam'),
(53, 65, 'tester 4 add test ', 'add test', 'Apple Scam'),
(54, 62, 'Rising Trend Singapore', 'Other Online Scams using sophisticated methods have been a rising trend in Singapore', 'Other Online Scams'),
(55, 62, 'Nigerian Love Scam', 'Nigerian Love Scam', 'Love Scam');

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
(10, 'podanari', 'podanari12', 'podanari@gmail.com', '1111111111', '0e2b53d8c30f3d59c7430c11e386b26dd43b5487e9f3c17797d945f9f1af8e8b', '2020-04-29 10:47:52', 'admin', '', 1),
(12, 'tester', 'tester3', 'test@gmail.com', '11111111', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-05-01 10:39:50', '', '', 1),
(18, 'tester', 'tester', 'tester@gmail.com', '11111111', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-05-09 04:01:07', '', '', 1),
(62, 'armondkurian', 'armondkurian', 'armondkjoy@gmail.com', '11111111', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2020-05-18 14:32:42', '', 'MjA1NTMzZDhjN2VlMGVmM2M4MWFmYWIz', 1),
(63, 'tester', 'tester2', 'tester2@test.com', '12345678', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2020-05-24 05:38:28', '', 'MjZlMTJkNzM1NGIyYTBiMTdjYzQ2Y2Zl', 1),
(64, 'admin', 'admin1', 'admin@test.com', '12354654', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2020-05-25 06:42:34', 'admin', 'Y2UzZDJmZDMyNjBhYTU5MmY2ZDcyNTIz', 1),
(65, 'tester', 'tester4', 'tester@email.com', '56546487', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5', '2020-05-25 06:50:32', '', 'ZDljOWJkYmExMTc5YWIzMzM5ZTQ1MGM3', 1);

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
(2, 63, 36, 0),
(3, 63, 37, 0),
(4, 63, 38, 0),
(5, 63, 39, 0),
(6, 63, 40, 0),
(7, 63, 42, 0),
(8, 63, 43, 0),
(9, 63, 44, 0),
(10, 65, 45, 0),
(12, 63, 47, 0),
(13, 63, 48, 0),
(14, 65, 49, 0),
(15, 65, 50, 0),
(16, 65, 51, 1),
(17, 65, 52, 0),
(18, 65, 48, -1),
(19, 62, 54, 0),
(20, 62, 55, 0);

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
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `voting`
--
ALTER TABLE `voting`
  MODIFY `voteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
