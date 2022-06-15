-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 06:59 PM
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
  `stuIC` varchar(12) NOT NULL,
  `marksBM` varchar(3) NOT NULL,
  `marksBI` varchar(3) NOT NULL,
  `marksMath` varchar(3) NOT NULL,
  `marksSains` varchar(3) NOT NULL,
  `marksSeni` varchar(3) NOT NULL,
  `marksPI` varchar(3) NOT NULL,
  `marksBA` varchar(3) NOT NULL,
  `marksTasmik` varchar(3) NOT NULL,
  `marksMusik` varchar(3) NOT NULL,
  `marksRBT` varchar(3) NOT NULL,
  `marksSejarah` varchar(3) NOT NULL,
  `year` year(4) NOT NULL,
  `test` varchar(50) NOT NULL,
  `bandBM` varchar(3) NOT NULL,
  `bandBI` varchar(3) NOT NULL,
  `bandMath` varchar(3) NOT NULL,
  `bandSains` varchar(3) NOT NULL,
  `bandSeni` varchar(3) NOT NULL,
  `bandPI` varchar(3) NOT NULL,
  `bandBA` varchar(3) NOT NULL,
  `bandTasmik` varchar(3) NOT NULL,
  `bandMusik` varchar(3) NOT NULL,
  `bandRBT` varchar(3) NOT NULL,
  `bandSejarah` varchar(3) NOT NULL,
  `remarksBM` varchar(50) NOT NULL,
  `remarksBI` varchar(50) NOT NULL,
  `remarksMath` varchar(50) NOT NULL,
  `remarksSains` varchar(50) NOT NULL,
  `remarksSeni` varchar(50) NOT NULL,
  `remarksPI` varchar(50) NOT NULL,
  `remarksBA` varchar(50) NOT NULL,
  `remarksTaskmik` varchar(50) NOT NULL,
  `remarksMusik` varchar(50) NOT NULL,
  `remarksRBT` varchar(50) NOT NULL,
  `remarksSejarah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `stuIC` varchar(12) NOT NULL,
  `attitude` varchar(10) NOT NULL,
  `attendance` int(11) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `class` varchar(20) NOT NULL,
  `cocurricular` varchar(20) NOT NULL,
  `rankingClass` varchar(20) NOT NULL,
  `rankingWhole` varchar(20) NOT NULL,
  `test` varchar(50) NOT NULL,
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `tableID` int(1) NOT NULL,
  `icNum` varchar(12) NOT NULL,
  `stuName` varchar(60) NOT NULL,
  `stuGender` varchar(10) NOT NULL,
  `stuPassword` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`tableID`, `icNum`, `stuName`, `stuGender`, `stuPassword`, `class`, `year`) VALUES
(2, '050104121427', 'XU YOO WEI', 'Lelaki', '', '1 Bijak', '2022'),
(3, '050230503423', 'SYED AIMAN HASADI BIN CHE ZAINI', 'Lelaki', '', '1 Bijak', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `tableID` int(11) NOT NULL,
  `login_id` varchar(12) NOT NULL,
  `teacherPassword` varchar(100) NOT NULL,
  `teacherName` varchar(60) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `teacherEmail` varchar(30) NOT NULL,
  `teacher_phoneNum` varchar(12) NOT NULL,
  `teacherType` varchar(50) NOT NULL,
  `teacherSub1` varchar(50) NOT NULL,
  `teacherSub2` varchar(50) NOT NULL,
  `teacherSub3` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`tableID`, `login_id`, `teacherPassword`, `teacherName`, `gender`, `teacherEmail`, `teacher_phoneNum`, `teacherType`, `teacherSub1`, `teacherSub2`, `teacherSub3`, `class`) VALUES
(1, 'admin', 'admin123', 'Admin SK Kota Raja', '', 'JBB5038@moe.edu.my', '069737536', 'admin', '', '', '', ''),
(2, '020822050567', 'adam123', 'ADAM MIRZAN BIN AHMAD RIDZUAN', 'LELAKI', 'mirzan53@gmail.com', '0149454863', 'Guru kelas', 'Bahasa Inggeris', 'Matematik', '', '1 Bijak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`tableID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`tableID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `tableID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
