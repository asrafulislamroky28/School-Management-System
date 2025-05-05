-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 10:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `class6_routine`
--

CREATE TABLE `class6_routine` (
  `id` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `exam_time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class6_routine`
--

INSERT INTO `class6_routine` (`id`, `exam_date`, `subject`, `exam_time`) VALUES
(1, '2025-05-05', 'Math', '10:00 AM - 12:00 PM'),
(2, '2025-05-07', 'English', '10:00 AM - 12:00 PM'),
(3, '2025-05-09', 'Science', '10:00 AM - 12:00 PM'),
(4, '2025-05-11', 'Bangla', '10:00 AM - 12:00 PM'),
(5, '2025-05-13', 'Religion', '10:00 AM - 12:00 PM'),
(6, '2025-05-15', 'ICT', '10:00 AM - 12:00 PM'),
(7, '2025-05-17', 'Social Science', '10:00 AM - 12:00 PM'),
(8, '2025-05-19', 'General Knowledge', '10:00 AM - 12:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(100) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `course_id` varchar(20) DEFAULT NULL,
  `contact_info` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `teacher_name`, `course_name`, `course_id`, `contact_info`) VALUES
(1, 'Israt Jahan', 'software', 'CSC 449', 'anmhjfdk11@gamil.com'),
(2, 'Dr. John Doe', 'Mathematics', 'MATH101', 'john.doe@email.com'),
(3, 'Prof. Jane Smith', 'Physics', 'PHYS102', 'jane.smith@email.com'),
(4, 'Dr. Michael Johnson', 'Chemistry', 'CHEM103', 'michael.johnson@email.com'),
(5, 'Prof. Emily Brown', 'Biology', 'BIOL104', 'emily.brown@email.com'),
(6, 'Dr. James Davis', 'Computer Science', 'CS105', 'james.davis@email.com'),
(7, 'Prof. Sarah Martinez', 'History', 'HIST106', 'sarah.martinez@email.com'),
(8, 'Dr. David Rodriguez', 'Literature', 'LIT107', 'david.rodriguez@email.com'),
(9, 'Prof. Amanda Wilson', 'Economics', 'ECON108', 'amanda.wilson@email.com'),
(10, 'Dr. Christopher Moore', 'Psychology', 'PSY109', 'christopher.moore@email.com'),
(11, 'Prof. Samantha Taylor', 'Philosophy', 'PHIL110', 'samantha.taylor@email.com'),
(12, 'Dr. Matthew Anderson', 'Sociology', 'SOC111', 'matthew.anderson@email.com'),
(13, 'Prof. Olivia Thomas', 'Political Science', 'POL112', 'olivia.thomas@email.com'),
(14, 'Dr. Daniel Jackson', 'Law', 'LAW113', 'daniel.jackson@email.com'),
(15, 'Prof. Sophia White', 'Business Administration', 'BUS114', 'sophia.white@email.com'),
(16, 'Dr. Jacob Harris', 'Engineering', 'ENG115', 'jacob.harris@email.com'),
(17, 'Prof. Mia Clark', 'Architecture', 'ARCH116', 'mia.clark@email.com'),
(18, 'Dr. Ethan Lewis', 'Medicine', 'MED117', 'ethan.lewis@email.com'),
(19, 'Prof. Isabella Walker', 'Environmental Science', 'ENV118', 'isabella.walker@email.com'),
(21, 'Prof. Avery Allen', 'Statistics', 'STAT120', 'avery.allen@email.com');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `dob`, `gender`, `username`, `password`, `created_at`) VALUES
(1, 'Asraful Islam', 'Roky ', '2025-04-16', 'Male', 'asraful', '12345', '2025-04-16 02:59:47'),
(2, 'Asraful ', 'Islam', '2025-01-01', 'Male', 'admin', '$2y$10$jSw2aWOiBvaoYgVY.c98be0p5jxVKlxaUvIdPF5gwNgtDY1ui5Vua', '2025-04-16 03:08:04'),
(3, 'Elam', 'mredu', '2025-04-01', 'Female', 'elma', '$2y$10$T6Sye1qVwIV.nnC2gpKKNePxmutDC8QkkuaTbIkS537YxIU4N0R4C', '2025-04-16 03:10:41'),
(4, 'Nusrat Jahan ', 'Srabone', '2016-02-02', 'Female', 'srabone', '$2y$10$pPslGBBG3B2510PG3id2OOiJ6JJgeazLuVcPTvxjwQ4b60xoz3ymW', '2025-04-17 04:48:00'),
(5, 'John', 'Doe', '2000-01-15', 'Male', 'john_doe', 'password123', '2025-04-17 05:20:06'),
(6, 'Jane', 'Smith', '1999-04-10', 'Female', 'jane_smith', 'password123', '2025-04-17 05:20:06'),
(7, 'Michael', 'Johnson', '1998-03-20', 'Male', 'michael_johnson', 'password123', '2025-04-17 05:20:06'),
(8, 'Emily', 'Brown', '2001-07-30', 'Female', 'emily_brown', 'password123', '2025-04-17 05:20:06'),
(9, 'James', 'Davis', '1997-02-25', 'Male', 'james_davis', 'password123', '2025-04-17 05:20:06'),
(10, 'Sarah', 'Martinez', '2000-06-18', 'Female', 'sarah_martinez', 'password123', '2025-04-17 05:20:06'),
(11, 'David', 'Rodriguez', '1998-11-05', 'Male', 'david_rodriguez', 'password123', '2025-04-17 05:20:06'),
(12, 'Amanda', 'Wilson', '2001-09-12', 'Female', 'amanda_wilson', 'password123', '2025-04-17 05:20:06'),
(13, 'Christopher', 'Moore', '1999-05-22', 'Male', 'christopher_moore', 'password123', '2025-04-17 05:20:06'),
(14, 'Samantha', 'Taylor', '2000-08-14', 'Female', 'samantha_taylor', 'password123', '2025-04-17 05:20:06'),
(15, 'Matthew', 'Anderson', '1997-10-03', 'Male', 'matthew_anderson', 'password123', '2025-04-17 05:20:06'),
(16, 'Olivia', 'Thomas', '1999-01-28', 'Female', 'olivia_thomas', 'password123', '2025-04-17 05:20:06'),
(17, 'Daniel', 'Jackson', '2000-12-09', 'Male', 'daniel_jackson', 'password123', '2025-04-17 05:20:06'),
(18, 'Sophia', 'White', '2001-04-15', 'Female', 'sophia_white', 'password123', '2025-04-17 05:20:06'),
(19, 'Jacob', 'Harris', '1998-02-11', 'Male', 'jacob_harris', 'password123', '2025-04-17 05:20:06'),
(20, 'Mia', 'Clark', '2000-03-17', 'Female', 'mia_clark', 'password123', '2025-04-17 05:20:06'),
(21, 'Ethan', 'Lewis', '1997-06-24', 'Male', 'ethan_lewis', 'password123', '2025-04-17 05:20:06'),
(22, 'Isabella', 'Walker', '2001-05-08', 'Female', 'isabella_walker', 'password123', '2025-04-17 05:20:06'),
(23, 'Benjamin', 'Young', '1999-12-01', 'Male', 'benjamin_young', 'password123', '2025-04-17 05:20:06'),
(24, 'Avery', 'Allen', '2000-10-27', 'Female', 'avery_allen', 'password123', '2025-04-17 05:20:06'),
(25, 'Asraful Islam', 'ROKY', '2002-04-28', 'Male', 'roky', '$2y$10$oO97.s6qWkIbVMDhOISZ6eyBUF4LikiBoOyw5/6VqmDdQ3P5pSQH6', '2025-04-17 11:14:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class6_routine`
--
ALTER TABLE `class6_routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class6_routine`
--
ALTER TABLE `class6_routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
