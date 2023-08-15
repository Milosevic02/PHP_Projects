-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 08:15 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ssluzba`
--

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `programs_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ECTS` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `profesor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `programs_id`, `name`, `ECTS`, `year`, `profesor`) VALUES
(1, 1, 'Introduction to Computer Science', 10, 1, ''),
(2, 1, 'Programming Fundamentals', 15, 1, ''),
(3, 1, 'Mathematics for Computer Science', 15, 1, ''),
(4, 1, 'Digital Logic', 10, 1, ''),
(5, 1, 'Data Structures and Algorithms', 10, 1, ''),
(6, 1, 'Object-Oriented Programming', 15, 2, ''),
(7, 1, 'Computer Networks', 10, 2, ''),
(8, 1, 'Operating Systems', 10, 2, ''),
(9, 1, 'Discrete Mathematics', 10, 2, ''),
(10, 1, 'Web Development', 15, 2, ''),
(11, 1, 'Database Systems', 10, 3, ''),
(12, 1, 'Software Engineering', 15, 3, ''),
(13, 1, 'Algorithms and Complexity', 10, 3, ''),
(14, 1, 'Artificial Intelligence', 10, 3, ''),
(15, 1, 'Computer Graphics', 15, 3, ''),
(16, 1, 'Advanced Topics in Machine Learning', 10, 4, ''),
(17, 1, 'Distributed Systems', 10, 4, ''),
(18, 1, 'Cybersecurity', 10, 4, ''),
(19, 1, 'Natural Language Processing', 10, 4, ''),
(20, 1, 'Cloud Computing', 20, 4, ''),
(21, 2, 'Software Design Fundamentals', 12, 1, ''),
(22, 2, 'Programming Principles', 12, 1, ''),
(23, 2, 'Mathematics for Software Engineering', 12, 1, ''),
(24, 2, 'Introduction to Algorithms', 12, 1, ''),
(25, 2, 'English for Technical Communication', 12, 1, ''),
(26, 2, 'Object-Oriented Programming', 12, 2, ''),
(27, 2, 'Database Systems', 12, 2, ''),
(28, 2, 'Web Development Technologies', 12, 2, ''),
(29, 2, 'Software Testing and Quality Assurance', 12, 2, ''),
(30, 2, 'Operating Systems', 12, 2, ''),
(31, 2, 'Software Architecture', 12, 3, ''),
(32, 2, 'Data Structures and Algorithms', 12, 3, ''),
(33, 2, 'User Interface Design', 12, 3, ''),
(34, 2, 'Software Project Management', 12, 3, ''),
(35, 2, 'Ethical and Legal Issues in Software Engineering', 12, 3, ''),
(36, 2, 'Advanced Software Engineering Topics', 12, 4, ''),
(37, 2, 'Cloud Computing Technologies', 12, 4, ''),
(38, 2, 'Machine Learning and Artificial Intelligence', 12, 4, ''),
(39, 2, 'Cybersecurity for Software Systems', 12, 4, ''),
(40, 2, 'Distributed Systems', 12, 4, ''),
(52, 5, 'Introduction to Artificial Intelligence', 12, 1, ''),
(53, 5, 'Machine Learning Fundamentals', 12, 1, ''),
(54, 5, 'Mathematics for AI', 12, 1, ''),
(55, 5, 'Data Preprocessing Techniques', 12, 1, ''),
(56, 5, 'English for AI Professionals', 12, 1, ''),
(57, 5, 'Neural Networks and Deep Learning', 12, 2, ''),
(58, 5, 'Natural Language Processing', 12, 2, ''),
(59, 5, 'Computer Vision', 12, 2, ''),
(60, 5, 'Reinforcement Learning', 12, 2, ''),
(61, 5, 'Probability and Statistics for AI', 12, 2, ''),
(62, 5, 'Advanced Machine Learning', 12, 3, ''),
(63, 5, 'Ethics in AI and Bias Mitigation', 12, 3, ''),
(64, 5, 'AI Model Interpretability', 12, 3, ''),
(65, 5, 'AI in Healthcare', 12, 3, ''),
(66, 5, 'AI-based Recommender Systems', 12, 3, ''),
(67, 5, 'Generative Adversarial Networks (GANs)', 12, 4, ''),
(68, 5, 'AI for Robotics', 12, 4, ''),
(69, 5, 'AI in Finance', 12, 4, ''),
(70, 5, 'AI-based Creative Arts', 12, 4, ''),
(71, 5, 'AI Research Project', 12, 4, '');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `date` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `student_id`, `exam_id`, `date`) VALUES
(70, 54, 1, '17:23:05'),
(71, 54, 2, '17:23:11'),
(72, 54, 3, '17:23:16'),
(73, 54, 4, '17:23:20'),
(74, 54, 5, '17:23:33'),
(75, 54, 1, '17:23:41'),
(76, 54, 2, '17:23:48'),
(77, 54, 3, '17:23:56'),
(78, 54, 5, '17:24:01'),
(79, 54, 3, '17:24:05'),
(80, 54, 3, '17:24:09'),
(81, 54, 5, '17:24:17'),
(82, 54, 6, '17:24:38'),
(83, 55, 21, '19:49:05'),
(84, 55, 23, '19:53:13'),
(85, 55, 22, '19:53:17'),
(86, 55, 25, '19:53:20'),
(87, 55, 23, '19:53:34'),
(88, 55, 24, '19:53:38'),
(89, 55, 22, '19:53:41'),
(90, 55, 23, '19:54:49'),
(91, 55, 24, '19:54:53');

-- --------------------------------------------------------

--
-- Table structure for table `passed_exams`
--

CREATE TABLE `passed_exams` (
  `passed_exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `ECTS` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `try_attempts` int(11) NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passed_exams`
--

INSERT INTO `passed_exams` (`passed_exam_id`, `student_id`, `exam_id`, `ECTS`, `year`, `grade`, `try_attempts`, `pass`) VALUES
(201, 54, 1, 10, 1, 6, 0, 1),
(202, 54, 2, 15, 1, 10, 0, 1),
(203, 54, 3, 15, 1, 10, 0, 1),
(204, 54, 4, 10, 1, 7, 0, 1),
(205, 54, 5, 10, 1, 8, 0, 1),
(206, 54, 6, 15, 2, 6, 0, 1),
(207, 54, 7, 10, 2, 0, 0, 0),
(208, 54, 8, 10, 2, 0, 0, 0),
(209, 54, 9, 10, 2, 0, 0, 0),
(210, 54, 10, 15, 2, 0, 0, 0),
(211, 55, 21, 12, 1, 7, 0, 1),
(212, 55, 22, 12, 1, 6, 0, 1),
(213, 55, 23, 12, 1, 7, 0, 1),
(214, 55, 24, 12, 1, 6, 0, 1),
(215, 55, 25, 12, 1, 10, 0, 1),
(216, 56, 52, 12, 1, 0, 0, 0),
(217, 56, 53, 12, 1, 0, 0, 0),
(218, 56, 54, 12, 1, 0, 0, 0),
(219, 56, 55, 12, 1, 0, 0, 0),
(220, 56, 56, 12, 1, 0, 0, 0),
(221, 57, 52, 12, 1, 0, 0, 0),
(222, 57, 53, 12, 1, 0, 0, 0),
(223, 57, 54, 12, 1, 0, 0, 0),
(224, 57, 55, 12, 1, 0, 0, 0),
(225, 57, 56, 12, 1, 0, 0, 0),
(226, 58, 1, 10, 1, 0, 0, 0),
(227, 58, 2, 15, 1, 0, 0, 0),
(228, 58, 3, 15, 1, 0, 0, 0),
(229, 58, 4, 10, 1, 0, 0, 0),
(230, 58, 5, 10, 1, 0, 0, 0),
(231, 55, 26, 12, 2, 0, 0, 0),
(232, 55, 27, 12, 2, 0, 0, 0),
(233, 55, 28, 12, 2, 0, 0, 0),
(234, 55, 29, 12, 2, 0, 0, 0),
(235, 55, 30, 12, 2, 0, 0, 0),
(236, -1, 1, 10, 1, 0, 0, 0),
(237, -1, 2, 15, 1, 0, 0, 0),
(238, -1, 3, 15, 1, 0, 0, 0),
(239, -1, 4, 10, 1, 0, 0, 0),
(240, -1, 5, 10, 1, 0, 0, 0),
(241, -1, 52, 12, 1, 0, 0, 0),
(242, -1, 53, 12, 1, 0, 0, 0),
(243, -1, 54, 12, 1, 0, 0, 0),
(244, -1, 55, 12, 1, 0, 0, 0),
(245, -1, 56, 12, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `programs_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`programs_id`, `name`, `tag`) VALUES
(1, 'Computer Science', 'CS'),
(2, 'Software Engineering', 'SE'),
(5, 'Artificial Intelligence', 'AI');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `program` varchar(255) NOT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birth_place` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `accademic_year` int(11) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `program`, `photo_path`, `password`, `email`, `birth_place`, `phone_number`, `accademic_year`, `is_admin`) VALUES
(55, 'Dragan Milosevic', 'SE', '360_F_243123463_zTooub557xEWABDLk0jJklDyLSGl2jrr.jpg', '$2y$10$hvrAFHjq8DQ7rSadi3K14ek/W/omL.5KNha4Z7C54FLJTb2CwGhHe', 'milosevicdragan022@gmail.com', '', '6432434623', 2, 0),
(56, 'Luka Zbucko', 'AI', NULL, '$2y$10$5mb.se7P3rwnkAyuDzc/QugxXVjuV/Fq8Aac4HpPXsF75OC0lGeEO', 'zbucko@gmail.com', '', '', 1, 0),
(58, 'Marta Terek', 'CS', NULL, '$2y$10$Db1ysEKbttiY8yFrFxE5uuPfrNA.NZypBdfoMseEDtTZZ3a572wza', 'terek@gmail.com', '', '', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `passed_exams`
--
ALTER TABLE `passed_exams`
  ADD PRIMARY KEY (`passed_exam_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`programs_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `passed_exams`
--
ALTER TABLE `passed_exams`
  MODIFY `passed_exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=246;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `programs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
