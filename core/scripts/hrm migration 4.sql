-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 15, 2023 at 06:00 PM
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
-- Table structure for table `attendance`
--

DROP TABLE IF EXISTS `attendance`;
CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employeeId` int NOT NULL,
  `logtype` tinyint NOT NULL,
  `datetimelog` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateupdatedlog` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_EmployeeId` (`employeeId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `employeeId`, `logtype`, `datetimelog`, `dateupdatedlog`) VALUES
(2, 1, 2, '2023-04-08 21:04:05', '2023-04-08 21:14:27'),
(3, 1, 2, '2023-04-21 03:22:37', '2023-04-21 03:22:37'),
(4, 2, 2, '2023-05-15 23:22:04', '2023-05-15 23:22:04');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(2, 'Delivery'),
(4, 'Technology'),
(5, 'Internal');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userId` varchar(65) NOT NULL,
  `employeeno` varchar(65) NOT NULL,
  `firstname` varchar(65) NOT NULL,
  `middlename` varchar(65) NOT NULL,
  `lastname` varchar(65) NOT NULL,
  `departmentId` int NOT NULL,
  `positionId` int NOT NULL,
  `projectId` int NOT NULL,
  `hourlyRate` decimal(10,0) NOT NULL,
  `baseSalary` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employeeno` (`employeeno`),
  KEY `FK_UserId` (`userId`),
  KEY `FK_Department` (`departmentId`),
  KEY `FK_Position` (`positionId`),
  KEY `FK_Project` (`projectId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `userId`, `employeeno`, `firstname`, `middlename`, `lastname`, `departmentId`, `positionId`, `projectId`, `hourlyRate`, `baseSalary`) VALUES
(1, 'shimrahanan@gmail.com', 'E2023-0301', 'Shimra', '', 'Hanan', 2, 2, 1, '1000', '25000'),
(2, 'rnizar@gmail.com', 'E2023-0446', 'Roshan', '', 'Nizar', 4, 3, 1, '500', '200000');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`) VALUES
(1, 'How long does it take to shortlist resume?', 'within 2 weeks');

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
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
(18, 'Settings', 'settings'),
(19, 'Project', 'project'),
(20, 'Create Project', 'cproject'),
(21, 'Update Project', 'uproject'),
(22, 'Delete Project', 'dproject'),
(23, 'Department', 'department'),
(24, 'Create Department', 'cdepartment'),
(25, 'Update Department', 'udepartment'),
(26, 'Delete Department', 'ddepartment'),
(27, 'Position', 'position'),
(28, 'Create Position', 'cposition'),
(29, 'Update Position', 'uposition'),
(30, 'Delete Position', 'dposition'),
(31, 'Timesheet', 'timesheet'),
(32, 'Create Timesheet', 'ctimesheet'),
(33, 'Update Timesheet', 'utimesheet'),
(34, 'Delete Timesheet', 'dtimesheet');

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

DROP TABLE IF EXISTS `payroll`;
CREATE TABLE IF NOT EXISTS `payroll` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employeeid` int NOT NULL,
  `projectid` int NOT NULL,
  `basesalary` decimal(10,0) NOT NULL,
  `allowance` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Employee` (`employeeid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`id`, `employeeid`, `projectid`, `basesalary`, `allowance`) VALUES
(2, 1, 1, '100000', '2500');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
CREATE TABLE IF NOT EXISTS `positions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`) VALUES
(3, 'Associate Technical Lead'),
(2, 'Software Engineer Trainee');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(65) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `name`) VALUES
(1, 'CSGI'),
(2, 'Car Wash');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

DROP TABLE IF EXISTS `task`;
CREATE TABLE IF NOT EXISTS `task` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `name`) VALUES
(2, 'Daily Scrum');

-- --------------------------------------------------------

--
-- Table structure for table `timesheet`
--

DROP TABLE IF EXISTS `timesheet`;
CREATE TABLE IF NOT EXISTS `timesheet` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employeeId` int NOT NULL,
  `projectId` int NOT NULL,
  `taskId` int NOT NULL,
  `description` varchar(255) NOT NULL,
  `hours` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ProjectId` (`projectId`),
  KEY `FK_TaskId` (`taskId`),
  KEY `FK_EmployeeId` (`employeeId`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `timesheet`
--

INSERT INTO `timesheet` (`id`, `employeeId`, `projectId`, `taskId`, `description`, `hours`) VALUES
(1, 1, 2, 2, 'Testing', '20'),
(3, 1, 1, 2, 'Testing', '16');

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
('Roshan', 'Nizar', 'rnizar@gmail.com', '$2y$10$soJ0uPla0Dhqrb7t34CCz.XtwkuQUqgoI7BHvwYUZz0EYy9UtoMSu', 1, 774185277, 0, 1),
('Paula', 'Lopez', 'lopex@mail.com', '$2y$10$RgOk3NvXRUcw5Hv6Td1M6u..yAdDeN03EPRUvWs6CmjZCg3kF9HpK', 1, 774185272, 1, 0),
('Hello', 'World', 'helloworld@gmail.com', '$2y$10$HLOU1NQnlxXG.7FTqy1isO9pPrg5wwsWWnPYi8qIP9mvRECJ0kA7K', 0, 777894561, 0, 0),
('Admin', 'PC', 'admin@gmail.com', '$2y$10$x8.8VeWq2DET/oLYmU8D2.gSZyeHIIDOeSIxPVMVnSbRO7FIG3wfi', 0, 74185236, 0, 1),
('Shimra', 'Hanan', 'shimrahanan@gmail.com', '$2y$10$Rd5OuH3Zz5ZH9NHA4bSe9uMT6XGnq88RtWTw8Wu6fW7Pp7iTbKmPu', 0, 771234567, 1, 1);

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
  `project` tinyint(1) NOT NULL,
  `cproject` tinyint(1) NOT NULL,
  `uproject` tinyint(1) NOT NULL,
  `dproject` tinyint(1) NOT NULL,
  `department` tinyint(1) NOT NULL,
  `cdepartment` tinyint(1) NOT NULL,
  `udepartment` tinyint(1) NOT NULL,
  `ddepartment` tinyint(1) NOT NULL,
  `position` tinyint(1) NOT NULL,
  `cposition` tinyint(1) NOT NULL,
  `uposition` tinyint(1) NOT NULL,
  `dposition` tinyint(1) NOT NULL,
  `timesheet` tinyint(1) NOT NULL,
  `ctimesheet` tinyint(1) NOT NULL,
  `utimesheet` tinyint(1) NOT NULL,
  `dtimesheet` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_UserId` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userpermission`
--

INSERT INTO `userpermission` (`id`, `userId`, `dashboard`, `employee`, `cemployee`, `uemployee`, `demployee`, `attendance`, `cattendance`, `uattendance`, `dattendance`, `payroll`, `cpayroll`, `upayroll`, `dpayroll`, `user`, `cuser`, `uuser`, `duser`, `settings`, `project`, `cproject`, `uproject`, `dproject`, `department`, `cdepartment`, `udepartment`, `ddepartment`, `position`, `cposition`, `uposition`, `dposition`, `timesheet`, `ctimesheet`, `utimesheet`, `dtimesheet`) VALUES
(1, 'rnizar@gmail.com', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'admin@gmail.com', 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'shimrahanan@gmail.com', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
