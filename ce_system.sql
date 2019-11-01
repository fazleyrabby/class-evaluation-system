-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2019 at 08:13 PM
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
-- Table structure for table `assign_class`
--

CREATE TABLE `assign_class` (
  `id` bigint(20) NOT NULL,
  `assign_teacher_id` bigint(20) DEFAULT NULL COMMENT 'this id is from assign teacher table',
  `number_of_class` bigint(20) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_class`
--

INSERT INTO `assign_class` (`id`, `assign_teacher_id`, `number_of_class`, `created_at`, `updated_at`) VALUES
(1, 2, 12, '2019-10-08 11:55:26', '2019-10-08 05:55:26'),
(2, 6, 5, '2019-10-08 23:12:25', '2019-10-08 17:12:25'),
(3, 7, 7, '2019-10-09 21:38:31', '2019-10-09 15:38:31'),
(5, 4, 6, '2019-10-11 21:46:50', '2019-10-11 15:46:50'),
(6, 1, 6, '2019-10-12 00:30:08', '2019-10-11 18:30:08'),
(7, 5, 7, '2019-10-12 00:30:13', '2019-10-11 18:30:13'),
(8, 8, 10, '2019-10-17 14:54:22', '2019-10-17 08:54:22'),
(9, 9, 7, '2019-10-29 01:20:07', '2019-10-28 19:20:07'),
(10, 10, 5, '2019-11-02 00:18:52', '2019-11-01 18:18:52'),
(11, 3, 4, '2019-11-02 00:54:16', '2019-11-01 18:54:16'),
(12, 11, 4, '2019-11-02 01:02:38', '2019-11-01 19:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `assign_subject_student`
--

CREATE TABLE `assign_subject_student` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `student_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `request_status` tinyint(4) DEFAULT '0' COMMENT '0=pending, 1=accepted, 2=rejected, 3=Cancelled by student',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_subject_student`
--

INSERT INTO `assign_subject_student` (`id`, `subject_id`, `student_id`, `request_status`, `created_at`, `updated_at`) VALUES
(1, 6, 'EEE0987654321', 1, '2019-11-01 00:21:39', '2019-11-01 18:59:17'),
(2, 7, 'EEE0987654321', 1, '2019-11-01 00:31:22', '2019-11-01 15:28:04'),
(3, 6, 'CSE09999876', 1, '2019-11-01 20:32:26', '2019-11-01 15:28:16'),
(4, 7, 'CSE09999876', 1, '2019-11-01 21:35:41', '2019-11-01 16:20:48');

-- --------------------------------------------------------

--
-- Table structure for table `assign_teacher`
--

CREATE TABLE `assign_teacher` (
  `id` int(11) NOT NULL,
  `teacher_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,2=will take class, 0=will not take any class',
  `created_at` datetime DEFAULT NULL,
  `udpated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `assign_teacher`
--

INSERT INTO `assign_teacher` (`id`, `teacher_id`, `session_id`, `subject_id`, `section_id`, `status`, `created_at`, `udpated_at`) VALUES
(1, 'CSET1234567890', 1, 6, 1, 2, '2019-09-07 00:09:49', '2019-09-06 18:09:49'),
(2, 'EEET0987654321', 1, 6, 2, 2, '2019-09-10 20:45:35', '2019-09-10 14:45:35'),
(3, 'CSET0987654321', 2, 4, 1, 2, '2019-09-10 21:44:43', '2019-09-10 15:44:43'),
(4, 'EEE0989898777', 4, 4, 2, 2, '2019-09-17 20:43:40', '2019-09-17 14:43:40'),
(5, 'CSET1234567890', 2, 3, 2, 2, '2019-09-28 01:17:54', '2019-09-27 19:17:54'),
(6, 'EEET0987654321', 3, 2, 1, 2, '2019-09-30 22:20:39', '2019-09-30 16:20:39'),
(7, 'EEET0987654321', 4, 1, 1, 2, '2019-10-08 23:11:50', '2019-10-08 17:11:50'),
(8, 'CSET0987654321', 3, 3, 2, 2, '2019-10-17 14:51:25', '2019-10-17 08:51:25'),
(9, 'EEET0987654321', 3, 2, 2, 2, '2019-10-29 01:18:01', '2019-10-28 19:18:01'),
(10, 'EEE0989898777', 1, 7, 2, 2, '2019-11-02 00:08:16', '2019-11-01 18:08:16'),
(11, 'EEE0989898777', 1, 7, 1, 2, '2019-11-02 01:00:02', '2019-11-01 19:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `class_review`
--

CREATE TABLE `class_review` (
  `id` bigint(20) NOT NULL,
  `daily_class_lecture_id` int(11) DEFAULT NULL COMMENT 'this id from daily class lecture',
  `rating` float DEFAULT NULL,
  `comment` longtext COLLATE utf8_unicode_ci,
  `student_id` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_review`
--

INSERT INTO `class_review` (`id`, `daily_class_lecture_id`, `rating`, `comment`, `student_id`, `status`, `created_at`, `updated_at`) VALUES
(11, 1, 3.5, 'done!', 'CSE09999876', 1, '2019-11-02 00:52:42', '2019-11-01 18:52:42'),
(12, 2, 5, 'good', 'CSE09999876', 1, '2019-11-02 00:52:51', '2019-11-01 18:52:51'),
(13, 11, 5, 'good\r\n', 'CSE09999876', 1, '2019-11-02 00:53:05', '2019-11-01 18:53:05'),
(14, 16, 4.5, 'class 1 done!', 'EEE0987654321', 1, '2019-11-02 00:54:51', '2019-11-01 18:54:51'),
(15, 17, 4, 'class 1 successfully done!', 'EEE0987654321', 1, '2019-11-02 01:03:13', '2019-11-01 19:03:13');

-- --------------------------------------------------------

--
-- Table structure for table `course_outline`
--

CREATE TABLE `course_outline` (
  `id` int(11) NOT NULL,
  `assign_class_id` int(11) DEFAULT NULL COMMENT 'from assign class',
  `course_outline` text COLLATE utf8_unicode_ci,
  `class_no` int(11) DEFAULT NULL COMMENT 'from assign class',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_outline`
--

INSERT INTO `course_outline` (`id`, `assign_class_id`, `course_outline`, `class_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'class 1\r\nmath done', 1, 1, '2019-10-09 00:17:55', NULL),
(2, 1, 'hey this is class 2 \r\nmath done\r\n', 2, 1, '2019-10-09 00:19:32', NULL),
(3, 1, 'new topic for class 3', 3, 0, '2019-10-09 00:58:36', NULL),
(4, 1, 'class 3\r\nmath done', 3, 1, '2019-10-10 00:02:02', NULL),
(5, 3, 'dsfdsf', 1, 1, '2019-10-10 00:22:40', NULL),
(6, 1, 'dfsdfsdaf', 1, 0, '2019-10-10 01:47:16', NULL),
(7, 2, 'fadsfsdf', 1, 1, '2019-10-11 20:59:11', NULL),
(8, 2, 'sadfdsf', 2, 1, '2019-10-11 20:59:14', NULL),
(9, 2, 'asdfasfdfa', 3, 1, '2019-10-11 20:59:17', NULL),
(10, 2, 'sadfsfsd', 4, 1, '2019-10-11 20:59:19', NULL),
(11, 2, 'asdfsdf', 5, 1, '2019-10-11 20:59:24', NULL),
(12, 5, 'fdsdgdfgd', 1, 1, '2019-10-11 21:47:04', NULL),
(13, 6, 'class 1 topics for Discrete Mathematics', 1, 1, '2019-10-12 00:30:27', NULL),
(14, 7, 'class 1 topics for calculus', 1, 1, '2019-10-12 00:30:48', NULL),
(15, 8, 'first class', 1, 1, '2019-10-17 14:54:45', NULL),
(16, 9, 'first class section b physics 1', 1, 1, '2019-10-29 01:20:40', NULL),
(17, 9, 'class 2 \r\n', 2, 1, '2019-10-29 01:20:59', NULL),
(18, 9, 'class 3 ', 3, 1, '2019-10-29 01:21:03', NULL),
(19, 10, 'class 1 topics', 1, 1, '2019-11-02 00:19:00', NULL),
(20, 11, 'class 1 topic selected', 1, 1, '2019-11-02 00:54:24', NULL),
(21, 12, 'class 1 topic selected for calculus', 1, 1, '2019-11-02 01:02:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `daily_class_lecture`
--

CREATE TABLE `daily_class_lecture` (
  `id` int(11) NOT NULL,
  `assign_class_id` int(11) DEFAULT NULL COMMENT 'this id from assign class table',
  `course_outline` longtext COLLATE utf8_unicode_ci,
  `class_no` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `daily_class_lecture`
--

INSERT INTO `daily_class_lecture` (`id`, `assign_class_id`, `course_outline`, `class_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'dfdsfsfdsgsadasdasd', 1, 1, '2019-10-10 01:48:38', '2019-10-09 19:52:31'),
(2, 1, 'adaddadasdasdasasddasdd', 2, 1, '2019-10-10 01:52:40', '2019-10-09 19:52:44'),
(3, 2, 'physics 1 class 1 done', 1, 1, '2019-10-10 01:52:51', '2019-10-11 18:28:29'),
(4, 2, 'physics 1 class 2 done', 2, 1, '2019-10-10 01:52:56', '2019-10-11 18:28:38'),
(5, 2, 'physics 1 class 3 done', 3, 1, '2019-10-10 01:52:58', '2019-10-11 18:28:47'),
(6, 2, 'physics 1 class 4\r\n done', 4, 1, '2019-10-10 01:53:00', '2019-10-11 18:28:57'),
(7, 1, 'gffdgdfgdf', 3, 1, '2019-10-10 01:54:31', '2019-10-09 19:55:11'),
(8, 1, 'sdasddddsdasdasdasdasdssss', 4, 1, '2019-10-10 01:55:29', '2019-10-09 19:57:11'),
(9, 1, 'rgfsdgdf', 5, 1, '2019-10-10 01:57:22', '2019-10-09 19:57:22'),
(10, 3, 'Class one done ', 1, 1, '2019-10-10 01:57:31', '2019-10-11 18:27:59'),
(11, 7, 'class 1 done by 50%', 1, 1, '2019-10-12 00:31:37', '2019-10-11 18:31:37'),
(12, 6, 'Discrete Mathematics Class 1 done by 70%', 1, 1, '2019-10-12 00:31:55', '2019-10-11 18:31:55'),
(13, 8, 'first class taken!', 1, 1, '2019-10-17 14:55:20', '2019-10-17 08:55:20'),
(14, 9, 'class 1 completely taken! ', 1, 1, '2019-10-29 01:27:30', '2019-10-28 19:27:30'),
(15, 10, 'first class done!', 1, 1, '2019-11-02 00:19:21', '2019-11-01 18:19:21'),
(16, 11, 'class 1 taken !!!', 1, 1, '2019-11-02 00:54:35', '2019-11-01 18:54:35'),
(17, 12, 'class 1 done!!', 1, 1, '2019-11-02 01:02:56', '2019-11-01 19:02:56');

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
(2, 2, 'tarek', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-03 00:34:06', '2019-09-02 18:34:06'),
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
  `section` int(11) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `authentication` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0=inactive/pending,1=active,2=rejected',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `member_id`, `login_id`, `email`, `name`, `department`, `section`, `semester`, `authentication`, `created_at`, `updated_at`) VALUES
(1, 'CSET1234567890', 2, 'tarek2019@gmail.com', 'Md. Tarek Uddin', 1, 2, NULL, 1, '2019-09-03 00:34:08', '2019-09-02 18:34:08'),
(2, 'CSET0987654321', 3, 's@gmail.com', 'Md. Saiful Islam', 2, 2, NULL, 1, '2019-09-10 17:14:26', '2019-09-10 11:14:26'),
(3, 'EEET0987654321', 4, 'emam@gmail.com', 'Emam Hossain', 2, 1, NULL, 1, '2019-09-10 19:00:57', '2019-09-10 13:00:57'),
(4, 'EEE0989898777', 5, 'kb@gmail.com', 'Kabir Ahmed', 1, 1, NULL, 1, '2019-09-14 23:33:16', '2019-09-14 17:33:16'),
(7, 'CSE09999876', 8, 'naeem@gmail.com', 'Naeem Uddin', 1, 2, 1, 1, '2019-09-17 20:11:49', '2019-09-17 14:11:49'),
(9, 'EEE0987654321', 10, 'ashik@gmail.com', 'Ashikul Islam  ', 1, 1, 1, 1, '2019-09-17 20:21:48', '2019-09-17 14:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `section_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1' COMMENT '1=active,0=inactive',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'A', 1, '2019-09-28 01:09:31', NULL),
(2, 'B', 1, '2019-09-30 20:55:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `semester_no` int(11) DEFAULT NULL,
  `semester_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `semester_no`, `semester_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1st Semester', 1, '2019-10-10 22:51:39', '2019-10-10 16:51:39'),
(2, 2, '2nd Semester', 1, '2019-10-10 22:54:13', '2019-10-10 16:54:13'),
(3, 3, '3rd Semester', 1, '2019-10-10 23:18:56', '2019-10-10 17:18:56'),
(4, 4, '4th Semester', 1, '2019-10-10 23:19:04', '2019-10-10 17:19:04'),
(5, 5, '5th Semester', 1, '2019-10-10 23:19:15', '2019-10-10 17:19:15'),
(6, 6, '6th Semester', 1, '2019-10-10 23:19:23', '2019-10-10 17:19:23'),
(7, 7, '7th Semester', 1, '2019-10-10 23:19:34', '2019-10-10 17:19:34'),
(8, 8, '8th Semester', 1, '2019-10-10 23:19:42', '2019-10-10 17:19:42');

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
  `semester` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active,0=inactive',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_id`, `subject_name`, `semester`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CSE 111', 'Introduction of computer Science', 1, 1, '2019-09-03 13:48:44', '2019-09-03 07:48:44'),
(2, 'physics101', 'Physics 1', 1, 1, '2019-09-03 18:23:37', '2019-09-03 12:23:37'),
(3, 'MATH 111', 'Math-I (Differential Calculus & Co-ordinate Geom.)', 1, 1, '2019-09-06 21:25:48', '2019-09-06 15:25:48'),
(4, 'CSE 121', 'Structural Programming Language', 1, 1, '2019-09-06 21:26:03', '2019-09-06 15:26:03'),
(5, 'CSE 135', 'Object Oriented Programming', 1, 1, '2019-09-06 21:26:20', '2019-09-06 15:26:20'),
(6, 'CSE 215', 'Discrete Mathematics', 2, 1, '2019-09-06 21:26:40', '2019-09-06 15:26:40'),
(7, 'MATH 211', 'Calculus ', 2, 1, '2019-09-06 22:33:00', '2019-09-06 16:33:00');

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
-- Indexes for table `assign_class`
--
ALTER TABLE `assign_class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_subject_student`
--
ALTER TABLE `assign_subject_student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_review`
--
ALTER TABLE `class_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_outline`
--
ALTER TABLE `course_outline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_class_lecture`
--
ALTER TABLE `daily_class_lecture`
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
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
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
-- AUTO_INCREMENT for table `assign_class`
--
ALTER TABLE `assign_class`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `assign_subject_student`
--
ALTER TABLE `assign_subject_student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `assign_teacher`
--
ALTER TABLE `assign_teacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `class_review`
--
ALTER TABLE `class_review`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_outline`
--
ALTER TABLE `course_outline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `daily_class_lecture`
--
ALTER TABLE `daily_class_lecture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
