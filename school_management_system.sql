-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2025 at 12:57 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes_table`
--

CREATE TABLE `classes_table` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `class_capacity` int(11) NOT NULL,
  `class_teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parents_table`
--

CREATE TABLE `parents_table` (
  `parent_id` int(11) NOT NULL,
  `parent_name` varchar(50) NOT NULL,
  `parent_address` text NOT NULL,
  `parent_email` varchar(50) NOT NULL,
  `parent_phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pupils_parents_table`
--

CREATE TABLE `pupils_parents_table` (
  `pupil_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pupils_table`
--

CREATE TABLE `pupils_table` (
  `pupil_id` int(11) NOT NULL,
  `pupil_name` varchar(50) NOT NULL,
  `pupil_address` text NOT NULL,
  `pupil_medical_info` text NOT NULL,
  `pupil_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers_table`
--

CREATE TABLE `teachers_table` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(50) NOT NULL,
  `teacher_address` text NOT NULL,
  `teacher_phone` varchar(20) NOT NULL,
  `teacher_salary` float NOT NULL,
  `teacher_background_check` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes_table`
--
ALTER TABLE `classes_table`
  ADD PRIMARY KEY (`class_id`),
  ADD UNIQUE KEY `class_teacher_id` (`class_teacher_id`);

--
-- Indexes for table `parents_table`
--
ALTER TABLE `parents_table`
  ADD PRIMARY KEY (`parent_id`);

--
-- Indexes for table `pupils_parents_table`
--
ALTER TABLE `pupils_parents_table`
  ADD PRIMARY KEY (`pupil_id`,`parent_id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `pupils_table`
--
ALTER TABLE `pupils_table`
  ADD PRIMARY KEY (`pupil_id`),
  ADD KEY `class_id` (`pupil_class_id`);

--
-- Indexes for table `teachers_table`
--
ALTER TABLE `teachers_table`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classes_table`
--
ALTER TABLE `classes_table`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parents_table`
--
ALTER TABLE `parents_table`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pupils_table`
--
ALTER TABLE `pupils_table`
  MODIFY `pupil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers_table`
--
ALTER TABLE `teachers_table`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes_table`
--
ALTER TABLE `classes_table`
  ADD CONSTRAINT `teacher_id` FOREIGN KEY (`class_teacher_id`) REFERENCES `teachers_table` (`teacher_id`);

--
-- Constraints for table `pupils_parents_table`
--
ALTER TABLE `pupils_parents_table`
  ADD CONSTRAINT `pupils_parents_table_ibfk_1` FOREIGN KEY (`pupil_id`) REFERENCES `pupils_table` (`pupil_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pupils_parents_table_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parents_table` (`parent_id`) ON DELETE CASCADE;

--
-- Constraints for table `pupils_table`
--
ALTER TABLE `pupils_table`
  ADD CONSTRAINT `class_id` FOREIGN KEY (`pupil_class_id`) REFERENCES `classes_table` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
