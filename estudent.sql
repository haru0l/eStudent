-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 11:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `stuIC` varchar(50) NOT NULL,
  `marksBM` varchar(2) NOT NULL,
  `marksBI` varchar(2) NOT NULL,
  `marksMath` varchar(2) NOT NULL,
  `marksSains` varchar(2) NOT NULL,
  `marksSeni` varchar(2) NOT NULL,
  `marksPI` varchar(2) NOT NULL,
  `marksBA` varchar(2) NOT NULL,
  `marksTasmik` varchar(2) NOT NULL,
  `marksMusik` varchar(2) NOT NULL,
  `marksRBT` varchar(2) NOT NULL,
  `marksSejarah` varchar(2) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`stuIC`, `marksBM`, `marksBI`, `marksMath`, `marksSains`, `marksSeni`, `marksPI`, `marksBA`, `marksTasmik`, `marksMusik`, `marksRBT`, `marksSejarah`, `remarks`, `year`) VALUES
('020822050567', 'A', 'B', 'C', 'D', 'E', 'F', 'A', 'B', '', '', '', 'good', 2022),
('4', 'A', 'A', '', 'D', 'A', '', '', '', '', '', 'A', '', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `stuIC` int(12) NOT NULL,
  `subName` int(11) NOT NULL,
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

INSERT INTO `student` (`icNum`, `stuName`, `stuGender`, `date_of_birth`, `stuAddress`, `stu_phoneNum`, `stuPassword`, `class`, `cocurricular`) VALUES
('020822050567', 'Adam', 'Male', '22/08/22', 'Address', '0149454863', 'adam', '1 Bijak', 'cocurricular'),
('4', 'test 4b', 'Male', '4', '4', '4', '', '4 Bijak', '4');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `login_id` varchar(12) NOT NULL,
  `teacherPassword` varchar(100) NOT NULL,
  `teacherName` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `teacherEmail` varchar(30) NOT NULL,
  `teacher_phoneNum` varchar(12) NOT NULL,
  `teacher_Address` varchar(50) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `acaQualification` varchar(20) NOT NULL,
  `teacherType` varchar(50) NOT NULL,
  `teacherSub1` varchar(50) NOT NULL,
  `teacherSub2` varchar(50) NOT NULL,
  `teacherSub3` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`login_id`, `teacherPassword`, `teacherName`, `gender`, `teacherEmail`, `teacher_phoneNum`, `teacher_Address`, `date_of_birth`, `acaQualification`, `teacherType`, `teacherSub1`, `teacherSub2`, `teacherSub3`) VALUES
('020822050567', '1234', 'eqals', 'Male', '123', 'semalam', '020822050567', '0208220505', '020822050567', 'Guru kelas', 'Bahasa Melayu', 'Bahasa Inggeris', 'Bahasa Inggeris'),
('1234', '1234', 'adam', 'Male', '', '', '', '', '', 'Guru subjek', 'Bahasa Inggeris', '', ''),
('4567', '4567', '', 'Male', '', '', '', '', '', 'Guru kelas', 'Sains', 'Pendidikan Seni Visual', ''),
('admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`stuIC`),
  ADD KEY `stuID` (`stuIC`),
  ADD KEY `stuIC_2` (`stuIC`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `icNum` (`stuIC`),
  ADD KEY `subID` (`subName`),
  ADD KEY `teacherName` (`teacherName`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`icNum`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`login_id`),
  ADD KEY `teacherName` (`teacherName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
