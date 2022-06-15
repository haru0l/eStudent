-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 03:22 AM
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
  `year` year(4) NOT NULL,
  `test` varchar(50) NOT NULL,
  `bandBM` varchar(2) NOT NULL,
  `bandBI` varchar(2) NOT NULL,
  `bandMath` varchar(2) NOT NULL,
  `bandSains` varchar(2) NOT NULL,
  `bandSeni` varchar(2) NOT NULL,
  `bandPI` varchar(2) NOT NULL,
  `bandBA` varchar(2) NOT NULL,
  `bandTasmik` varchar(2) NOT NULL,
  `bandMusik` varchar(2) NOT NULL,
  `bandRBT` varchar(2) NOT NULL,
  `bandSejarah` varchar(2) NOT NULL,
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

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`stuIC`, `marksBM`, `marksBI`, `marksMath`, `marksSains`, `marksSeni`, `marksPI`, `marksBA`, `marksTasmik`, `marksMusik`, `marksRBT`, `marksSejarah`, `year`, `test`, `bandBM`, `bandBI`, `bandMath`, `bandSains`, `bandSeni`, `bandPI`, `bandBA`, `bandTasmik`, `bandMusik`, `bandRBT`, `bandSejarah`, `remarksBM`, `remarksBI`, `remarksMath`, `remarksSains`, `remarksSeni`, `remarksPI`, `remarksBA`, `remarksTaskmik`, `remarksMusik`, `remarksRBT`, `remarksSejarah`) VALUES
('020822050567', '77', '66', '', '33', '67', '', '', '', '', '', '', 2022, 'PepAwal', '1', '1', '', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('020822050567', '', '', '', '', '23', '', '', '', '', '', '', 2022, 'PepAkhir', '', '', '', '1', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

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
  `year` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`stuIC`, `attitude`, `attendance`, `comment`, `teacherName`, `class`, `cocurricular`, `rankingClass`, `rankingWhole`, `year`) VALUES
('4', 'among', 12, 'among us', '1234', '4 Bijak', '', '', '', 2022),
('020822050567', 'amongus', 1, 'amongus', 'amongus', 'amongus', 'amongus', 'amongus', 'amongus', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `tableID` int(1) NOT NULL,
  `icNum` varchar(14) NOT NULL,
  `stuName` varchar(60) NOT NULL,
  `stuGender` varchar(10) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `stuAddress` varchar(200) NOT NULL,
  `stu_phoneNum` varchar(15) NOT NULL,
  `stuPassword` varchar(20) NOT NULL,
  `class` varchar(20) NOT NULL,
  `cocurricular` varchar(20) NOT NULL,
  `year` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`tableID`, `icNum`, `stuName`, `stuGender`, `date_of_birth`, `stuAddress`, `stu_phoneNum`, `stuPassword`, `class`, `cocurricular`, `year`) VALUES
(1, '020822050567', 'Adam', 'Male', '22/08/22', 'Address', '0149454863', 'adam', '1 Bijak', 'cocurricular', '2022'),
(2, '4', 'test 4b', 'Male', '4', '4', '4', 'amongus', '4 Bijak', '4', ''),
(3, '9999', 'hi', 'Male', '', '', '', '', '1 Bijak', '', ''),
(24, '2323', 'bangkai meow', 'Male', '23', '', 'meow', '', '1 Bijak', '', '');

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
  `teacher_Address` varchar(50) NOT NULL,
  `date_of_birth` varchar(10) NOT NULL,
  `acaQualification` varchar(20) NOT NULL,
  `teacherType` varchar(50) NOT NULL,
  `teacherSub1` varchar(50) NOT NULL,
  `teacherSub2` varchar(50) NOT NULL,
  `teacherSub3` varchar(50) NOT NULL,
  `class` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`tableID`, `login_id`, `teacherPassword`, `teacherName`, `gender`, `teacherEmail`, `teacher_phoneNum`, `teacher_Address`, `date_of_birth`, `acaQualification`, `teacherType`, `teacherSub1`, `teacherSub2`, `teacherSub3`, `class`) VALUES
(1, '020822050567', '1234', '', 'MALE', '123', 'semalam', '020822050567', '0208220505', '020822050567', 'Guru kelas', 'Bahasa Melayu', '', '', '1 Bijak'),
(2, '1234', '1234', '', 'Male', '', '', '', '', '', 'Guru subjek', 'Bahasa Inggeris', '', '', '4 Bijak'),
(3, '4567', '4567', '', 'Male', '', '', '', '', '', 'Guru subjek', 'Sains', '', '', '1 Bijak'),
(4, 'admin', 'admin', '', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', 'admin', ''),
(5, '222', 'meow', 'MEOW', 'MALE', '', '', '', '22', '', 'Guru kelas', 'Bahasa Melayu', '', '', '1 Bijak');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD KEY `icNum` (`stuIC`),
  ADD KEY `teacherName` (`teacherName`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`tableID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`tableID`),
  ADD KEY `teacherName` (`teacherName`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `tableID` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
