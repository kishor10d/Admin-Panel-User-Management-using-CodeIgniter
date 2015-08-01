-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2015 at 05:47 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cias`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE IF NOT EXISTS `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'login password md5',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@codeinsect.com', '21232f297a57a5a743894a0e4a801fc3', 'Kishor Mali', '8698368846', 1, 0, 0, '2015-07-01 18:56:49', 1, '2015-07-26 13:39:01'),
(2, 'avinashkashid1@gmail.com', 'a208e5837519309129fa466b0c68396b', 'Avinash Kashid', '9130833933', 2, 0, 0, '0000-00-00 00:00:00', 1, '2015-07-26 11:28:38'),
(3, 'metevinod@gmail.com', 'd2c51c9cde1f15b718296c99ae362fb1', 'Vinod Mete', '9822298222', 3, 0, 0, '0000-00-00 00:00:00', 1, '2015-07-26 11:29:38'),
(4, 'pjayle7@gmail.com', 'af948f0b6334c5d6e822c9bc8cf24034', 'Prashant Jayle', '8149163760', 2, 0, 0, '2015-07-02 11:32:09', 1, '2015-07-26 11:34:06'),
(5, 'pimplesushant@gmail.com', 'dea5687d7786d43266cf55d7be014530', 'Sushant Pimple', '9561091140', 3, 0, 1, '2015-07-02 11:35:47', 1, '2015-07-26 11:37:01'),
(6, 'pankaj@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Pankaj Saboo', '9503891007', 3, 1, 1, '2015-07-02 11:41:34', 1, '2015-07-03 12:03:47'),
(7, 'mahesh@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Mahesh Patil', '8600387646', 2, 1, 1, '2015-07-02 12:10:21', 1, '2015-07-03 12:04:11'),
(8, 'yogesh.8488@gmail.com', 'fff35ff9f95f0bf058dd5b3988c06080', 'Balasaheb Mule', '9960848002', 2, 0, 1, '2015-07-02 12:17:13', 1, '2015-07-26 11:38:09'),
(9, 'landesachin14@gmail.com', '15285722f9def45c091725aee9c387cb', 'Sachin Lande', '8275004225', 3, 0, 1, '2015-07-02 12:20:11', 1, '2015-07-26 11:39:51'),
(10, 'skcomputerworld@rediffmail.com', 'cea16606bde1d20889b8b3ddafe5ca1d', 'Sachin Kalane', '9730414046', 3, 0, 1, '2015-07-02 12:30:03', 1, '2015-07-26 11:41:24'),
(11, 'pravin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Pravin Survase', '9898989898', 3, 0, 1, '2015-07-02 12:41:10', NULL, NULL),
(12, 'harshghotkar1@gmail.com', 'd4e3730e8cba214f85cddae5f9331d74', 'Harsh Ghotkar', '9665676869', 2, 0, 1, '2015-07-02 14:13:16', 1, '2015-07-26 11:30:52'),
(13, 'suraj.nipane999@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Suraj Nipane', '9021909119', 2, 0, 1, '2015-07-03 10:25:59', 1, '2015-07-26 13:01:34'),
(14, 'quazisalahuddin4@gmail.com', '037e133114db31a4586b8e59f604e89e', 'Salahuddin Quazi', '8446814088', 2, 0, 1, '2015-07-03 10:37:06', 1, '2015-07-26 11:42:55'),
(15, 'dms10xxx@gmail.com', '57a2f49b78040585ce96aeb70617ef67', 'Dipak Salunke', '8149556559', 2, 0, 1, '2015-07-08 13:25:40', 1, '2015-07-26 11:44:15'),
(16, 'employee@codeinsect.com', '6024bb4b0cdaeeb3fffd6e7c920ca30e', 'Employee', '9822098220', 3, 0, 1, '2015-07-28 14:58:13', NULL, NULL),
(17, 'manager@codeinsect.com', '6024bb4b0cdaeeb3fffd6e7c920ca30e', 'Manager', '9860098600', 2, 0, 1, '2015-07-28 14:58:42', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
