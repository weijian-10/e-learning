-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2020 at 09:39 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp_wj_tq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_username` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_image` text NOT NULL,
  `course_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_image`, `course_desc`) VALUES
(1, 'Progamming', 'pic/images (2).jpg', 'Computer programmers write code to create software programs. They turn the program designs created by software developers and engineers into instructions that a computer can follow. Programmers must debug the programs—that is, test them to ensure that they produce the expected results.'),
(2, 'Networking', 'pic/abstract_networks_thinkstock_881604844-100749945-large.jpg', ''),
(3, 'Multimedia', 'pic/download (1).jpg', ''),
(5, 'Business&Accounting', 'pic/download (3).jpg', ''),
(6, 'Electronic', 'pic/download (4).jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(255) NOT NULL,
  `question_id` varchar(255) NOT NULL,
  `datetime` varchar(225) NOT NULL,
  `time_duration` varchar(6) NOT NULL,
  `tutorial_id` int(255) NOT NULL,
  `c_correct_num` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `answered_question` varchar(255) NOT NULL,
  `mark` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `question_id`, `datetime`, `time_duration`, `tutorial_id`, `c_correct_num`, `user_id`, `answered_question`, `mark`) VALUES
(3, '34,35,36,37', '2019-12-13 06:38:59', '00:08', 21, 0, 9, 'd,d,d,d', 0),
(4, '38', '2019-12-16 07:47:30', '00:04', 22, 0, 19, 'b', 0),
(5, '23,24,25', '2019-12-17 02:41:39', '00:03', 13, 0, 1, 'd,d,d', 0),
(6, '23,24,25', '2019-12-17 02:41:47', '00:04', 13, 2, 1, 'c,c,d', 67),
(7, '23,24,25', '2019-12-17 04:31:55', '00:04', 13, 1, 1, 'd,c,c', 33),
(8, '23,24,25', '2019-12-17 06:06:41', '00:04', 13, 0, 1, 'd,d,d', 0),
(9, '23,24,25', '2019-12-17 09:23:19', '00:05', 13, 0, 28, 'd,d,d', 0),
(10, '23,24,25', '2019-12-18 02:35:59', '00:06', 13, 2, 1, 'd,c,b', 67),
(11, '23,24,25', '2019-12-18 02:36:07', '00:04', 13, 3, 1, 'c,c,b', 100),
(12, '41,42,43', '2019-12-18 02:41:16', '00:04', 26, 1, 28, 'd,b,c', 33),
(13, '41,42,43', '2019-12-18 02:41:32', '00:05', 26, 1, 28, 'a,a,b', 33),
(14, '41,42,43', '2019-12-18 02:41:43', '00:04', 26, 2, 28, 'a,b,c', 67),
(15, '41,42,43', '2019-12-18 02:41:52', '00:04', 26, 3, 28, 'a,b,a', 100),
(16, '44,45,46', '2019-12-18 02:52:13', '00:04', 9, 2, 29, 'd,d,d', 67),
(17, '44,45,46', '2019-12-18 02:52:28', '00:08', 9, 3, 29, 'd,d,b', 100),
(18, '44,45,46', '2019-12-18 02:52:35', '00:03', 9, 2, 29, 'd,d,d', 67),
(19, '44,45,46', '2019-12-18 02:52:42', '00:03', 9, 2, 29, 'd,d,d', 67),
(20, '47,48,49', '2019-12-18 03:08:50', '00:04', 27, 2, 30, 'a,a,b', 67),
(21, '47,48,49', '2019-12-18 03:09:01', '00:05', 27, 2, 30, 'a,b,a', 67),
(22, '47,48,49', '2019-12-18 03:09:11', '00:05', 27, 2, 30, 'a,b,a', 67),
(23, '50,51,52', '2019-12-18 03:22:01', '00:07', 28, 3, 31, 'b,b,c', 100),
(24, '50,51,52', '2019-12-18 03:22:11', '00:05', 28, 1, 31, 'b,d,b', 33),
(25, '', '2019-12-18 03:22:11', '00:05', 28, 0, 31, '', 0),
(26, '50,51,52', '2019-12-18 03:22:23', '00:04', 28, 1, 31, 'd,d,c', 33),
(27, '53,54,55', '2019-12-18 03:35:43', '00:06', 29, 0, 32, 'd,d,c', 0),
(28, '53,54,55', '2019-12-18 03:35:55', '00:04', 29, 3, 32, 'b,c,a', 100),
(29, '53,54,55', '2019-12-18 03:36:01', '00:03', 29, 2, 32, 'b,c,d', 67),
(30, '53,54,55', '2019-12-18 03:36:09', '00:04', 29, 2, 32, 'b,c,b', 67);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(255) NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `question_title` varchar(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `tutorial_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `correct_answer`, `question_title`, `subject_id`, `tutorial_id`) VALUES
(62, 'a', 'How To Write Dom in javascript?', 21, 30),
(71, 'a', '&lt;p=&quot;Hi&quot;&gt;hi&lt;/p&gt;What is the correct answer?', 21, 30),
(72, 'c', '&lt;p id=&quot;hi&quot;&gt;Hi&lt;/p&gt; How to change the text using javascript?', 21, 30);

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `qa_id` int(255) NOT NULL,
  `question_id` int(255) NOT NULL,
  `qa_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`qa_id`, `question_id`, `qa_answer`) VALUES
(242, 62, 'document.getElementById'),
(243, 62, 'Document.getElementByID'),
(244, 62, 'Document.GetElementByid'),
(245, 62, 'Document.GetElementbyid'),
(278, 71, 'document.getElementById(&quot;Hi&quot;)'),
(279, 71, 'document.getElementBYId(&quot;Hi&quot;)'),
(280, 71, 'Document.getElementById(&quot;Hi&quot;)'),
(281, 71, 'document.GetElementById(&quot;Hi&quot;)'),
(282, 72, 'document.getElementById(&quot;hi&quot;).ChangeHTML=&quot;Hi2&quot;'),
(283, 72, 'document.getElementById(&quot;hi&quot;).INnerHTML=&quot;Hi2&quot;'),
(284, 72, 'document.getElementById(&quot;hi&quot;).innerHTML=&quot;Hi2&quot;'),
(285, 72, 'document.getElementById(&quot;hi&quot;).innerText=&quot;Hi2&quot;');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rate_id` int(11) NOT NULL,
  `rate_topic_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rate_id`, `rate_topic_id`, `user_id`) VALUES
(28, 11, 9),
(30, 10, 10),
(31, 11, 10),
(32, 12, 10),
(33, 14, 19),
(34, 10, 28),
(35, 15, 28),
(36, 16, 28),
(37, 17, 28);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(255) NOT NULL,
  `question_id` int(255) NOT NULL,
  `result_choose` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `tutorial_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `subject_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `course_id`, `subject_name`) VALUES
(21, 1, 'Javascript'),
(24, 1, 'Vb.net'),
(25, 1, 'C Sharp'),
(26, 2, 'Introduction of Networking'),
(27, 3, ' Introduction to Multimedia'),
(29, 6, 'Introduction of Elecctronic'),
(30, 5, 'Introduction of Business'),
(31, 2, 'Data Center'),
(32, 2, 'Network management'),
(33, 3, 'Animation'),
(34, 3, 'Designing a template'),
(35, 5, 'Business law'),
(36, 5, 'Banking '),
(37, 6, 'Motor control'),
(38, 6, 'Digital electronics');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(255) NOT NULL,
  `teacher_username` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `course_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_username`, `teacher_password`, `course_id`) VALUES
(1, 'teacher_n', '123', 2),
(6, 'teacher_P', '123', 1),
(7, 'teacher_m', '123', 3);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(255) NOT NULL,
  `topic_question_id` int(255) NOT NULL,
  `topic_datetime` varchar(255) NOT NULL,
  `topic_comment` varchar(255) NOT NULL,
  `topic_user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_question_id`, `topic_datetime`, `topic_comment`, `topic_user_id`) VALUES
(10, 23, '2019-12-12 02:47:48', 'wj comment', 1),
(11, 23, '2019-12-12 02:48:10', 'asd comment', 9),
(12, 24, '2019-12-12 03:56:19', 'asdasd', 10),
(13, 23, '2019-12-12 06:01:41', 'adasd', 10),
(14, 38, '2019-12-16 07:47:37', 'cwqcqwc', 19),
(15, 23, '2019-12-17 09:23:42', 'wj why u so handsome why why wh', 28),
(16, 23, '2019-12-17 09:23:42', 'wj why u so handsome why why wh', 28),
(17, 23, '2019-12-17 09:24:03', 'ting quan why u so fat', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorial_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `tutorial_filepath` text NOT NULL,
  `tutorial_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorial_id`, `subject_id`, `tutorial_filepath`, `tutorial_name`) VALUES
(30, 21, 'upload/Js Introduction.pdf', 'introduction of Dom Method'),
(31, 21, 'upload/JS Syntax.pdf', 'syntax'),
(32, 21, 'upload/JS Variables.pdf', 'variables'),
(33, 24, 'upload/Adding a Splash of Colour 7.pdf', 'started'),
(34, 24, 'upload/A VB.NET Menu Project 5.pdf', 'adding menu'),
(35, 24, 'upload/Breakpoints and Debugging Tools 6.pdf', 'debugging'),
(36, 25, 'upload/A C# MessageBox 9.pdf', 'Messagebox'),
(37, 25, 'upload/C# and Loops 1.pdf', 'Loop'),
(38, 25, 'upload/Add, Update, Delete a Record 9.pdf', 'Database Crud'),
(42, 26, 'upload/introductiontonetworking.pdf', 'introduction'),
(46, 31, 'upload/Rethinking.pdf', 'data center'),
(47, 32, 'upload/network-management.pdf', 'Network management'),
(48, 27, 'upload/1-Introduction-What-is-Multimedia-ioenotes.pdf', 'introduction'),
(49, 33, 'upload/dm_104.01_p_animation.pdf', 'animation'),
(50, 34, 'upload/SCI2001_Pak_Tsang_Cerpa_Jamieson.pdf', 'design template'),
(51, 30, 'upload/bba-104.pdf', 'introduction'),
(52, 35, 'upload/LawrenceR_Web15_7_.pdf', 'buisness law'),
(53, 36, 'upload/ME_20150205154803311.pdf', 'banking and invesment'),
(54, 29, 'upload/TT107.pdf', 'introduction'),
(55, 37, 'upload/Implementation_of_an_ESC_for_BLDC_motors.pdf', 'motor control'),
(56, 38, 'upload/Digital_Electronics_pdf.pdf', 'digital_Electronic');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `course_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `age`, `address`, `gender`, `course_id`, `name`, `email`, `phone`, `image`) VALUES
(1, 'wj', '123', '20', '3,lorong taman saujana permai', 'Male', 1, 'weijian', 'ongweijiaN@outlook.com', '01740158792', ''),
(22, 'sdsdsdsd', 'sdf', 'dfdfs', 'sdf', 'Male', 1, 'sdf', 'dfs', 'fds', ''),
(25, 'w', 'w', 'w', 'w', 'Female', 4, 'wewe', 'ongweijian@outlook.com', 'w', 'upload/credit-card-logos.png'),
(28, 'student_m', '123', '', '', '', 0, '', '', '', ''),
(29, 'student_n', '123', '', '', '', 0, '', '', '', ''),
(30, 'student_a', '123', '', '', '', 0, '', '', '', ''),
(31, 'Student_b', '123', '', '', '', 0, '', '', '', ''),
(32, 'student_e', '123', '', '', '', 0, '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`qa_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `qa_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1059;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorial_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `fk_question_subjectid` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_question_tutorialid` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`tutorial_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD CONSTRAINT `fk_question_id` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `fk_courseid` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `fk_subjectid` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
