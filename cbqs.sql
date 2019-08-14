-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2019 at 08:40 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cbqs`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `date`) VALUES
(21, 'MCS', '2019-06-14 19:02:29'),
(22, 'BSCS', '2019-06-14 19:02:33'),
(23, 'BSIT', '2019-06-14 19:02:37'),
(24, 'BSSE', '2019-06-14 19:02:41'),
(25, 'MSCS', '2019-06-14 19:02:45'),
(26, 'BSCE', '2019-06-14 19:02:49'),
(27, 'MSIS', '2019-06-14 19:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(30) NOT NULL,
  `tid` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `ttime` varchar(10) NOT NULL,
  `ins` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `tid`, `name`, `subject`, `class`, `ttime`, `ins`) VALUES
(23, 4, 'QUIZ1', 'Visual', 'MCS', '5', 'cajdbvlab'),
(24, 4, 'QUIZ X', 'OOP', 'MCS', '20', 'hkfkwefb');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `marks` int(30) NOT NULL,
  `question` varchar(200) NOT NULL,
  `opt1` varchar(50) NOT NULL,
  `opt2` varchar(50) NOT NULL,
  `opt3` varchar(50) NOT NULL,
  `opt4` varchar(50) NOT NULL,
  `ans` varchar(30) NOT NULL,
  `hint` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `subject`, `marks`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `ans`, `hint`) VALUES
(10, 'OOP', 5, 'OOP Stands For?', 'Object Oriented Programming', 'Object Oriented Program', 'Orient Object Program', 'Orient Object Programming', 'Object Oriented Programming', 'NA'),
(11, 'OOP', 5, 'How many private member functions are allowed in a class ?', 'Only 1', 'Only 7', 'Only 255', 'As many as required', 'As many as required', 'na'),
(12, 'OOP', 5, 'Can main() function be made private?', 'Yes, always', 'Yes, if program doesnâ€™t contain any classes', 'No, never', 'No, because main function is user defined', 'No, never', 'na'),
(13, 'OOP', 5, 'Which was the first purely object oriented programming language developed?', 'Java', 'C++', 'SmallTalk', 'C#', 'SmallTalk', ''),
(14, 'OOP', 5, 'Which of the following best defines a class?', 'Parent of an object', 'Instance of an object', 'Blueprint of an object', 'Scope of an object', 'Blueprint of an object', 'na'),
(15, 'OOP', 5, 'Which is not feature of OOP in general definitions?', 'Code reusability', 'Modularity', 'Duplicate/Redundant data', 'Efficient Code', 'Duplicate/Redundant data', 'na'),
(16, 'OOP', 5, 'How many classes can be defined in a single program?', 'Only 1', 'As many as you want', 'Only 999', 'Only 100', 'As many as you want', 'na'),
(17, 'OOP', 5, 'Which concept of OOP is false for C++?', 'Code must contain at least one class', 'Code can be written without using classes', 'A class must have member functions', 'At least one object should be declared in code', 'Code must contain at least one', 'na'),
(18, 'OOP', 5, 'Which definition best describes an object?', 'Instance of a class', 'Instance of itself', 'Child of a class', ' Overview of a class', 'Instance of a class', 'na'),
(19, 'OOP', 5, 'The object canâ€™t be:', 'Passed by reference', 'Passed by value', 'Passed by copy', 'Passed as function', 'Passed as function', 'na'),
(20, 'Visual', 3, 'Which of the following is the correct syntax of including a user defined header files in C++?', '#include <userdefined.h>', '#include <userdefined>', '#include â€œuserdefinedâ€', ' #include [userdefined] ', '#include â€œuserdefinedâ€', 'na');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `tname` varchar(30) NOT NULL,
  `sid` varchar(30) NOT NULL,
  `marks` int(11) NOT NULL,
  `class` varchar(30) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `per` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `tid`, `tname`, `sid`, `marks`, `class`, `subject`, `per`, `status`) VALUES
(376, 23, 'QUIZ1', 'student', 3, 'MCS', 'Visual', '100', 'Pass'),
(377, 24, 'QUIZ X', 'student', 0, 'MCS', 'OOP', '0', 'Fail');

-- --------------------------------------------------------

--
-- Table structure for table `squestions`
--

CREATE TABLE `squestions` (
  `id` int(30) NOT NULL,
  `eid` int(30) NOT NULL,
  `qid` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `squestions`
--

INSERT INTO `squestions` (`id`, `eid`, `qid`) VALUES
(7, 10, 7),
(8, 11, 7),
(9, 11, 8),
(10, 12, 7),
(11, 12, 8),
(12, 12, 9),
(13, 13, 7),
(14, 13, 8),
(15, 13, 9),
(16, 15, 7),
(17, 15, 8),
(18, 15, 9),
(19, 16, 7),
(20, 16, 8),
(21, 17, 7),
(22, 17, 8),
(23, 17, 9),
(24, 18, 10),
(25, 18, 11),
(26, 18, 12),
(27, 18, 13),
(28, 18, 14),
(29, 18, 15),
(30, 18, 16),
(31, 18, 17),
(32, 18, 18),
(33, 18, 19),
(34, 21, 20),
(35, 21, 20),
(36, 23, 20),
(37, 24, 10),
(38, 24, 11),
(39, 24, 12),
(40, 24, 13),
(41, 24, 14),
(42, 24, 15);

-- --------------------------------------------------------

--
-- Table structure for table `ssubject`
--

CREATE TABLE `ssubject` (
  `id` int(11) NOT NULL,
  `student` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ssubject`
--

INSERT INTO `ssubject` (`id`, `student`, `subject`) VALUES
(8, 'mcs1220016', 'DSA'),
(9, 'mcs1220016', 'cc'),
(10, 'mxcs213', 'DSA'),
(14, 'jhvjh', 'SE'),
(15, 'student', 'DSA'),
(16, 'student', 'DLD'),
(17, 'it151023', 'DSA'),
(18, 'it151023', 'DLD');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `regno` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `course` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `regno`, `pass`, `course`) VALUES
(12, 'student', 'student', 'student', 'MCS'),
(13, 'Ameer Hamza', 'it151023', 'admin', 'BSCS');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `date`) VALUES
(2, 'DSA', '2019-06-14 19:03:08'),
(4, 'DLD', '2019-06-14 19:03:41'),
(5, 'cc', '2019-06-14 19:05:32'),
(6, 'SE', '2019-06-14 19:05:42'),
(7, 'OOP', '2019-06-14 19:05:53'),
(8, 'Visual Programming', '2019-06-14 20:05:08'),
(9, 'Compiler Construction', '2019-06-14 20:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `regno` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `regno`, `pass`, `role`) VALUES
(3, 'admin', 'admin', 'admin', 'admin'),
(4, 'teacher', 'teacher', 'teacher', 'teacher'),
(5, 'Safdar Hussain', 'cs1717', 'admin', 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `squestions`
--
ALTER TABLE `squestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ssubject`
--
ALTER TABLE `ssubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `squestions`
--
ALTER TABLE `squestions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `ssubject`
--
ALTER TABLE `ssubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
