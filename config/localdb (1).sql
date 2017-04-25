-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2017 at 05:04 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `localdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assements`
--

CREATE TABLE `assements` (
  `UID` int(5) NOT NULL,
  `GID` int(5) DEFAULT NULL,
  `Proj_ID` int(5) DEFAULT NULL,
  `Score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `GID` int(1) NOT NULL,
  `Group_Name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`GID`, `Group_Name`) VALUES
(1, 'Alpha'),
(2, 'Mech');

-- --------------------------------------------------------

--
-- Table structure for table `pressfoward`
--

CREATE TABLE `pressfoward` (
  `passID` int(5) NOT NULL,
  `Username` varchar(16) NOT NULL,
  `Paswd` varchar(16) NOT NULL,
  `User_type` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pressfoward`
--

INSERT INTO `pressfoward` (`passID`, `Username`, `Paswd`, `User_type`) VALUES
(1, 'pkin', 'pkin1', 1),
(2, 'chim', 'kalu1', 2),
(4, 'user', 'mouse1', 2),
(6, 'user', 'flask1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `Proj_ID` int(5) NOT NULL,
  `Proj_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`Proj_ID`, `Proj_name`) VALUES
(1, 'Alpha'),
(3, 'Beta');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `UID` int(5) NOT NULL,
  `PeerID` int(5) DEFAULT NULL,
  `GID` int(1) DEFAULT NULL,
  `feedback` varchar(75) DEFAULT NULL,
  `mark` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`UID`, `PeerID`, `GID`, `feedback`, `mark`) VALUES
(2, NULL, 2, NULL, NULL),
(4, NULL, 2, NULL, NULL),
(6, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UID` int(5) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `Surname` varchar(15) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `user_type` int(1) NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `Name`, `Surname`, `Email`, `user_type`) VALUES
(1, 'king', 'Man', 'kingsman@gmail.com', 1),
(2, 'Chima', 'Kalu', 'kal@gmail.com', 2),
(4, 'mike', 'flask', 'mf@gmail.com', 2),
(6, 'bottle', 'mouse', 'bmouse@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assements`
--
ALTER TABLE `assements`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `acessfk2` (`GID`),
  ADD KEY `acess3fk` (`Proj_ID`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`GID`);

--
-- Indexes for table `pressfoward`
--
ALTER TABLE `pressfoward`
  ADD PRIMARY KEY (`passID`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`Proj_ID`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `PeerID` (`PeerID`),
  ADD KEY `GID` (`GID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assements`
--
ALTER TABLE `assements`
  ADD CONSTRAINT `acess3fk` FOREIGN KEY (`Proj_ID`) REFERENCES `projects` (`Proj_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acessfk` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acessfk2` FOREIGN KEY (`GID`) REFERENCES `groups` (`GID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assements_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`),
  ADD CONSTRAINT `assements_ibfk_2` FOREIGN KEY (`GID`) REFERENCES `groups` (`GID`),
  ADD CONSTRAINT `assements_ibfk_3` FOREIGN KEY (`Proj_ID`) REFERENCES `projects` (`Proj_ID`);

--
-- Constraints for table `pressfoward`
--
ALTER TABLE `pressfoward`
  ADD CONSTRAINT `pressfk` FOREIGN KEY (`passID`) REFERENCES `users` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pressfoward_ibfk_1` FOREIGN KEY (`passID`) REFERENCES `users` (`UID`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`UID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`PeerID`) REFERENCES `users` (`UID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `results_ibfk_3` FOREIGN KEY (`GID`) REFERENCES `groups` (`GID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
