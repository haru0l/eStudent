-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2022 at 07:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estudent`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login_id` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `subID` varchar(10) NOT NULL,
  `stuID` int(10) NOT NULL,
  `marks` varchar(10) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `stuID` int(12) NOT NULL,
  `subID` int(11) NOT NULL,
  `attitude` varchar(10) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `cocurricular` varchar(20) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stuID` int(10) NOT NULL,
  `icNum` varchar(14) NOT NULL,
  `stuName` varchar(60) NOT NULL,
  `stuGender` varchar(10) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `stuAddress` varchar(200) NOT NULL,
  `stu_phoneNum` varchar(15) NOT NULL,
  `stuPassword` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `cocurricular` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stuID`, `icNum`, `stuName`, `stuGender`, `date_of_birth`, `stuAddress`, `stu_phoneNum`, `stuPassword`, `class`, `cocurricular`) VALUES
(1, '33', 'Adam', 'Male', '33', '33', '33', '', '1 Bijak', '33'),
(2, '4', 'test 4b', 'Male', '4', '4', '4', '', '4 Bijak', '4');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `login_id` int(11) NOT NULL,
  `teacherPassword` varchar(100) NOT NULL,
  `teacherName` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `teacherEmail` varchar(30) NOT NULL,
  `teacher_phoneNum` varchar(12) NOT NULL,
  `teacher_Address` varchar(50) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `acaQualification` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`login_id`, `teacherPassword`, `teacherName`, `gender`, `teacherEmail`, `teacher_phoneNum`, `teacher_Address`, `date_of_birth`, `acaQualification`) VALUES
(1, 'test', 'Adam', 'Male', 'test@example.com', '0123456789', 'UTHM', '22/08/2002', 'Pro'),
(10, 'syaz', 'SYAZ', 'Male', 'test@example.com', '0123456789', 'UTHM', '22/08/2002', 'Pro');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`subID`),
  ADD KEY `stuID` (`stuID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `icNum` (`stuID`),
  ADD KEY `subID` (`subID`),
  ADD KEY `teacherName` (`teacherName`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stuID`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `teacherName` (`teacherName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stuID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
