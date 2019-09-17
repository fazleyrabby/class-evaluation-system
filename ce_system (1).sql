-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2019 at 04:54 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ce_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_teacher`
--

CREATE TABLE `assign_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `subject_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `udpated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_teacher`
--

INSERT INTO `assign_teacher` (`id`, `teacher_id`, `session_id`, `subject_id`, `status`, `created_at`, `udpated_at`) VALUES
(1, 'CSET1234567890', 1, '3', 1, '2019-09-07 00:09:49', '2019-09-06 18:09:49'),
(2, 'EEET0987654321', 1, '6', 1, '2019-09-10 20:45:35', '2019-09-10 14:45:35'),
(3, 'CSET0987654321', 2, '4,5', 1, '2019-09-10 21:44:43', '2019-09-10 15:44:43'),
(4, 'EEE0989898777', 4, '5', 1, '2019-09-17 20:43:40', '2019-09-17 14:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '0=inactive,1=active',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSE', 1, '2019-09-06 22:23:51', '2019-09-06 16:23:51'),
(2, 'EEE', 1, '2019-09-06 22:23:51', '2019-09-06 16:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=admin,2=teacher,3=student',
  `username` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `user_type`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-03 00:15:16', '2019-09-02 18:15:16'),
(2, 2, 'tarek2019', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-03 00:34:06', '2019-09-02 18:34:06'),
(3, 2, 'saiful_islam', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-10 17:14:26', '2019-09-10 11:14:26'),
(4, 2, 'emam', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-10 19:00:57', '2019-09-10 13:00:57'),
(5, 2, 'kbahmed', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-14 23:33:16', '2019-09-14 17:33:16'),
(8, 3, 'naeem', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-17 20:11:49', '2019-09-17 14:11:49'),
(10, 3, 'ashik', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-17 20:21:47', '2019-09-17 14:21:47');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `member_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `login_id` int(11) DEFAULT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `authentication` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=inactive/pending,1=active,2=rejected',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `member_id`, `login_id`, `email`, `name`, `department`, `authentication`, `created_at`, `updated_at`) VALUES
(1, 'CSET1234567890', 2, 'tarek2019@gmail.com', 'Md. Tarek Uddin', 1, 1, '2019-09-03 00:34:08', '2019-09-02 18:34:08'),
(2, 'CSET0987654321', 3, 's@gmail.com', 'Md. Saiful Islam', 2, 1, '2019-09-10 17:14:26', '2019-09-10 11:14:26'),
(3, 'EEET0987654321', 4, 'emam@gmail.com', 'Emam Hossain', 2, 1, '2019-09-10 19:00:57', '2019-09-10 13:00:57'),
(4, 'EEE0989898777', 5, 'kb@gmail.com', 'Kabir Ahmed', 1, 1, '2019-09-14 23:33:16', '2019-09-14 17:33:16'),
(7, 'CSE09999876', 8, 'naeem@gmail.com', 'Naeem Uddin', 1, 1, '2019-09-17 20:11:49', '2019-09-17 14:11:49'),
(9, 'EEE0987654321', 10, 'ashik@gmail.com', 'Ashikul Islam  ', 1, 1, '2019-09-17 20:21:48', '2019-09-17 14:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE `session` (
  `id` int(11) NOT NULL,
  `session_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `year` year(4) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session_name`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jan-jun', 2019, 1, '2019-09-04 00:52:12', '2019-09-03 18:52:12'),
(2, 'july-dec', 2019, 1, '2019-09-04 00:52:21', '2019-09-03 18:52:21'),
(3, 'jan-jun', 2020, 1, '2019-09-04 01:12:09', '2019-09-03 19:12:09'),
(4, 'july-dec', 2020, 1, '2019-09-04 01:14:28', '2019-09-03 19:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `student_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'same as member id',
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=active,0=inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `student_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSE09999876', 'Naeem Uddin', 1, '2019-09-17 20:11:49', '2019-09-17 14:11:49'),
(3, 'EEE0987654321', 'Ashikul Islam  ', 1, '2019-09-17 20:28:54', '2019-09-17 14:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_id`, `subject_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSE 111', 'Introduction of computer Science', 1, '2019-09-03 13:48:44', '2019-09-03 07:48:44'),
(2, 'physics101', 'Physics 1', 0, '2019-09-03 18:23:37', '2019-09-03 12:23:37'),
(3, 'MATH 111', 'Math-I (Differential Calculus & Co-ordinate Geom.)', 1, '2019-09-06 21:25:48', '2019-09-06 15:25:48'),
(4, 'CSE 121', 'Structural Programming Language', 1, '2019-09-06 21:26:03', '2019-09-06 15:26:03'),
(5, 'CSE 135', 'Object Oriented Programming', 1, '2019-09-06 21:26:20', '2019-09-06 15:26:20'),
(6, 'CSE 215', 'Discrete Mathematics', 1, '2019-09-06 21:26:40', '2019-09-06 15:26:40'),
(7, NULL, 'New', 0, '2019-09-06 22:33:00', '2019-09-06 16:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'same as member id',
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `teacher_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSET1234567890', 'Md. Tarek Uddin', 1, '2019-09-06 22:18:43', '2019-09-06 16:18:43'),
(2, 'CSET0987654321', 'Md. Saiful Islam', 1, '2019-09-10 18:24:26', '2019-09-10 12:24:26'),
(4, 'EEET0987654321', 'Emam Hossain', 1, '2019-09-10 19:01:19', '2019-09-10 13:01:19'),
(5, 'EEE0989898777', 'Kabir Ahmed', 1, '2019-09-14 23:33:16', '2019-09-14 17:33:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
