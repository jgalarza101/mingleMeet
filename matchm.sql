-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2018 at 04:52 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matchm`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_ID` int(11) NOT NULL,
  `city` varchar(20) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_ID` int(11) NOT NULL,
  `user1_ID` varchar(20) NOT NULL,
  `user2_ID` varchar(20) NOT NULL,
  `match_status` int(1) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_ID` int(11) NOT NULL,
  `sender_user_ID` varchar(20) NOT NULL,
  `receiver_user_ID` varchar(20) NOT NULL,
  `content` varchar(140) NOT NULL,
  `date_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reportUser`
--

CREATE TABLE `reportUser` (
  `case_ID` int(11) NOT NULL,
  `reported_user_ID` varchar(20) NOT NULL,
  `reportee_user_ID` varchar(20) NOT NULL,
  `cause_report` varchar(140) NOT NULL,
  `date_time` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_ID` varchar(20) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `user_age` int(3) DEFAULT NULL,
  `user_email` varchar(100) DEFAULT NULL,
  `password` text,
  `picture` longblob,
  `about_me` varchar(400) DEFAULT NULL,
  `interests` varchar(400) DEFAULT NULL,
  `gender` char(8) DEFAULT NULL,
  `location_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_ID`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_ID`),
  ADD KEY `user1_ID` (`user1_ID`),
  ADD KEY `user2_ID` (`user2_ID`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_ID`),
  ADD KEY `sender_user_ID` (`sender_user_ID`),
  ADD KEY `receiver_user_ID` (`receiver_user_ID`);

--
-- Indexes for table `reportUser`
--
ALTER TABLE `reportUser`
  ADD PRIMARY KEY (`case_ID`),
  ADD KEY `reported_user_ID` (`reported_user_ID`,`reportee_user_ID`),
  ADD KEY `reportee_user_ID` (`reportee_user_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `location_ID` (`location_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reportUser`
--
ALTER TABLE `reportUser`
  MODIFY `case_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `matches_ibfk_1` FOREIGN KEY (`user1_ID`) REFERENCES `user` (`user_ID`),
  ADD CONSTRAINT `matches_ibfk_2` FOREIGN KEY (`user2_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`sender_user_ID`) REFERENCES `user` (`user_ID`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`receiver_user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `reportUser`
--
ALTER TABLE `reportUser`
  ADD CONSTRAINT `reportUser_ibfk_1` FOREIGN KEY (`reported_user_ID`) REFERENCES `user` (`user_ID`),
  ADD CONSTRAINT `reportUser_ibfk_2` FOREIGN KEY (`reportee_user_ID`) REFERENCES `user` (`user_ID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`location_ID`) REFERENCES `location` (`location_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
