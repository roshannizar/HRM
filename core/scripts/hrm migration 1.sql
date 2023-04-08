-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2023 at 04:39 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(2, 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(65) NOT NULL,
  `firstname` varchar(65) NOT NULL,
  `middlename` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `departmentId` int NOT NULL,
  `positionId` int NOT NULL,
  `projectId` int NOT NULL,
  `hourlyRate` decimal(10,0) NOT NULL,
  `baseSalary` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_UserId` (`userId`),
  KEY `FK_Department` (`departmentId`),
  KEY `FK_Position` (`positionId`),
  KEY `FK_Project` (`projectId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

DROP TABLE IF EXISTS `features`;
CREATE TABLE IF NOT EXISTS `features` (
  `id` int NOT NULL AUTO_INCREMENT,
  `featurename` varchar(65) NOT NULL,
  `code` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `featurename`, `code`) VALUES
(1, 'Dashboard', 'dashboard'),
(2, 'Employee', 'employee'),
(3, 'Create Employee', 'cemployee'),
(4, 'Update Employee', 'uemployee'),
(5, 'Delete Employee', 'demployee'),
(6, 'Attendance', 'attendance'),
(7, 'Create Attendance', 'cattendance'),
(8, 'Update Attendance', 'uattendance'),
(9, 'Delete Attendance', 'dattendance'),
(10, 'Payroll', 'payroll'),
(11, 'Create Payroll', 'cpayroll'),
(12, 'Update Payroll', 'upayroll'),
(13, 'Delete Payroll', 'dpayroll'),
(14, 'User', 'user'),
(15, 'Create User', 'cuser'),
(16, 'Update User', 'uuser'),
(17, 'Delete User', 'duser'),
(18, 'Settings', 'settings');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(2, 'Associate Technical Lead');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employeeId` int NOT NULL,
  `name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `firstname` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(65) NOT NULL,
  `role` tinyint NOT NULL,
  `contactno` int DEFAULT NULL,
  `gender` tinyint(1) NOT NULL,
  `changed` tinyint(1) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`firstname`, `lastname`, `email`, `password`, `role`, `contactno`, `gender`, `changed`) VALUES
('Riyasha', 'Nizar', 'riyasha.nizar98@gmail.com', '$2y$10$Xy1o6Ki5Z.gzLyZ/oc8EiOuscU4.m0uDEmAZnCg/DfrhAxSSmIwqa', 1, 778527419, 0, 0),
('Roshan', 'Nizar', 'rnizar@gmail.com', '$2y$10$soJ0uPla0Dhqrb7t34CCz.XtwkuQUqgoI7BHvwYUZz0EYy9UtoMSu', 0, 774185277, 0, 1),
('Paula', 'Lopez', 'lopex@mail.com', '$2y$10$RgOk3NvXRUcw5Hv6Td1M6u..yAdDeN03EPRUvWs6CmjZCg3kF9HpK', 1, 774185272, 1, 0),
('Hello', 'World', 'helloworld@gmail.com', '$2y$10$HLOU1NQnlxXG.7FTqy1isO9pPrg5wwsWWnPYi8qIP9mvRECJ0kA7K', 0, 777894561, 0, 0),
('Admin', 'PC', 'admin@gmail.com', '$2y$10$x8.8VeWq2DET/oLYmU8D2.gSZyeHIIDOeSIxPVMVnSbRO7FIG3wfi', 0, 74185236, 0, 1),
('Shimra', 'Hanan', 'shimrahanan@gmail.com', '$2y$10$alJaH9B///lFc1ChewuYCO1qyH2aZM686LkUmyJvwMsC9t2uXFk4S', 0, 771234567, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userpermission`
--

DROP TABLE IF EXISTS `userpermission`;
CREATE TABLE IF NOT EXISTS `userpermission` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(65) NOT NULL,
  `dashboard` tinyint(1) NOT NULL,
  `employee` tinyint(1) NOT NULL,
  `cemployee` tinyint(1) NOT NULL,
  `uemployee` tinyint(1) NOT NULL,
  `demployee` tinyint(1) NOT NULL,
  `attendance` tinyint(1) NOT NULL,
  `cattendance` tinyint(1) NOT NULL,
  `uattendance` tinyint(1) NOT NULL,
  `dattendance` tinyint(1) NOT NULL,
  `payroll` tinyint(1) NOT NULL,
  `cpayroll` tinyint(1) NOT NULL,
  `upayroll` tinyint(1) NOT NULL,
  `dpayroll` tinyint(1) NOT NULL,
  `user` tinyint(1) NOT NULL,
  `cuser` tinyint(1) NOT NULL,
  `uuser` tinyint(1) NOT NULL,
  `duser` tinyint(1) NOT NULL,
  `settings` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_UserId` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userpermission`
--

INSERT INTO `userpermission` (`id`, `userId`, `dashboard`, `employee`, `cemployee`, `uemployee`, `demployee`, `attendance`, `cattendance`, `uattendance`, `dattendance`, `payroll`, `cpayroll`, `upayroll`, `dpayroll`, `user`, `cuser`, `uuser`, `duser`, `settings`) VALUES
(1, 'rnizar@gmail.com', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 'admin@gmail.com', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1),
(7, 'shimrahanan@gmail.com', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
