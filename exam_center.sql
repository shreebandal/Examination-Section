-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2019 at 04:28 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `exam_center`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(9) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `query` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `reply` varchar(500) DEFAULT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `query`, `description`, `reply`, `exam`, `year`) VALUES
(27, '10303320181124510018', 'I have a query related to exams', 'Exam related problems.', NULL, 'winter', '2016'),
(32, '10303320181124510018', 'Wrong subject selected during formfilling', 'as', NULL, 'winter', '2016'),
(33, '10303320181124510018', 'Formfilling form is not desplaying', 'asd', NULL, 'summer', '2017'),
(34, '10303320181124510018', 'Wrong subject selected during formfilling', 'wertyuioaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa asdasd asdasd  casa sd', 'Solved', 'summer', '2016'),
(35, '10303320181124510018', 'Exam name is not Desplaying', 'adasda asd asd as', NULL, 'remedial', '2018'),
(36, '10303320181124510018', 'Wrong subject selected during formfilling', 'asdasd', NULL, 'winter', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `fee`
--

CREATE TABLE `fee` (
  `id` int(9) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `query` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `reply` varchar(500) DEFAULT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee`
--

INSERT INTO `fee` (`id`, `name`, `query`, `description`, `reply`, `exam`, `year`) VALUES
(1, '10303320181124510018', 'Amount Deducted but status is pending', 'Testing', NULL, 'winter', '2016'),
(2, '10303320181124510018', 'Amount Deducted but status is pending', 'asdas as das', NULL, 'remedial', '2018');

-- --------------------------------------------------------

--
-- Table structure for table `other`
--

CREATE TABLE `other` (
  `id` int(9) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `query` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `reply` varchar(500) DEFAULT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other`
--

INSERT INTO `other` (`id`, `name`, `query`, `description`, `reply`, `exam`, `year`) VALUES
(1, '10303320181124510018', 'testing', 'asdas', NULL, 'winter', '2017'),
(2, '10303320181124510018', 'testing', 'is it working?', 'yes it does work\r\n', 'remedial', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(9) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `query` varchar(300) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `reply` varchar(500) DEFAULT NULL,
  `exam` varchar(100) DEFAULT NULL,
  `year` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `name`, `query`, `description`, `reply`, `exam`, `year`) VALUES
(1, '10303320181124510018', 'Though I was present, It shows absent', 'Testing', NULL, 'winter', '2016');

-- --------------------------------------------------------

--
-- Table structure for table `setupdate`
--

CREATE TABLE `setupdate` (
  `id` int(9) NOT NULL,
  `setupdate` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setupdate`
--

INSERT INTO `setupdate` (`id`, `setupdate`) VALUES
(36, 'This is the third update'),
(37, 'This is the new update'),
(38, 'PREVIOUS UPDATE -This is the new update'),
(39, 'This is the new update'),
(41, 'latest update\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `prn` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `year` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `firstname`, `middlename`, `lastname`, `prn`, `branch`, `year`, `number`, `email`, `password`) VALUES
(1, 'Amol', 'Bhimrav', 'Ambkar', '10303320181124510018', 'Computer Engineering', 'Second Year(Sem-3)', '8600700549', 'vikesh.patil8340@gmail.com', '$2y$10$cybF4IdCtJucr.5g4X6xIuSiqWne0eXNprKC2s8RG1Sy015lNm0CK');

-- --------------------------------------------------------

--
-- Table structure for table `studentblock`
--

CREATE TABLE `studentblock` (
  `prn` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentblock`
--

INSERT INTO `studentblock` (`prn`) VALUES
('10303320181124510011');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`username`, `password`) VALUES
('examinationsection', '$2y$10$6sswm3pUSsKb7kMv8fwQi.vJNso2PovKx/23Q.NKKV7HqtJyjsBqi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee`
--
ALTER TABLE `fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other`
--
ALTER TABLE `other`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setupdate`
--
ALTER TABLE `setupdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `studentblock`
--
ALTER TABLE `studentblock`
  ADD PRIMARY KEY (`prn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `fee`
--
ALTER TABLE `fee`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `other`
--
ALTER TABLE `other`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `setupdate`
--
ALTER TABLE `setupdate`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
