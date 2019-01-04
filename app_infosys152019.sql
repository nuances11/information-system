-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2019 at 09:41 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `app_infosys`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty_designation`
--

CREATE TABLE `faculty_designation` (
  `id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty_designation`
--

INSERT INTO `faculty_designation` (`id`, `school_year_id`, `user_id`, `grade`, `section_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, 7, 0, '2019-01-02 13:30:19', '0000-00-00 00:00:00'),
(2, 1, 7, 7, 2, '2019-01-02 16:45:25', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `id` int(11) NOT NULL,
  `year` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`id`, `year`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '2019-2020', 1, '2019-01-01 08:59:33', '2019-01-01 13:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `grade`, `section_name`, `created_at`, `updated_at`) VALUES
(2, 7, 'Sample Section', '2019-01-02 16:41:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `grade_level`, `created_at`, `updated_at`) VALUES
(1, 'Sample Subject', 7, '2019-01-01 06:37:54', '2019-01-01 07:17:50'),
(4, 'samle subject 3', 7, '2019-01-01 13:53:46', '0000-00-00 00:00:00'),
(5, 'Sample Subject 3', 7, '2019-01-01 13:54:02', '0000-00-00 00:00:00'),
(6, 'Sample Subject 4', 8, '2019-01-01 13:54:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subject_designation`
--

CREATE TABLE `subject_designation` (
  `id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject_designation`
--

INSERT INTO `subject_designation` (`id`, `school_year_id`, `section_id`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 7, 1, '2019-01-04 18:12:55', '0000-00-00 00:00:00'),
(2, 1, 2, 7, 4, '2019-01-04 19:51:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `first_name`, `middle_name`, `last_name`, `department`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'infosys_admin', '42f749ade7f9e195bf475f37a44cafcb', 'Admin', 'Admin', 'Admin', '1', 1, '2018-12-27 14:14:29', '0000-00-00 00:00:00'),
(7, 'faculty1', '42f749ade7f9e195bf475f37a44cafcb', 'Faculty1', 'Faculty', 'Faculty', '2', 1, '2019-01-01 13:13:19', '0000-00-00 00:00:00'),
(8, 'faculty2', '42f749ade7f9e195bf475f37a44cafcb', 'Faculty2', 'Faculty', 'Faculty', '2', 1, '2019-01-01 13:14:50', '0000-00-00 00:00:00'),
(9, 'faculty3', '42f749ade7f9e195bf475f37a44cafcb', 'Faculty3', 'Faculty', 'Faculty', '2', 1, '2019-01-01 13:15:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_department`
--

CREATE TABLE `user_department` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_detail_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_department`
--

INSERT INTO `user_department` (`id`, `user_id`, `department_detail_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-12-27 14:16:22', '2018-12-27 14:28:18'),
(2, 5, 2, '2018-12-27 14:39:53', '2018-12-31 02:14:35'),
(3, 6, 2, '2018-12-28 14:19:36', '0000-00-00 00:00:00'),
(4, 7, 2, '2019-01-01 13:13:19', '0000-00-00 00:00:00'),
(5, 8, 2, '2019-01-01 13:14:50', '0000-00-00 00:00:00'),
(6, 9, 2, '2019-01-01 13:15:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_department_details`
--

CREATE TABLE `user_department_details` (
  `id` int(11) NOT NULL,
  `department_detail` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_department_details`
--

INSERT INTO `user_department_details` (`id`, `department_detail`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2018-12-20 14:36:23', '0000-00-00 00:00:00'),
(2, 'Faculty', '2018-12-20 14:36:23', '0000-00-00 00:00:00'),
(3, 'Registrar', '2018-12-20 14:36:23', '0000-00-00 00:00:00'),
(4, 'Accounting', '2018-12-20 14:36:23', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty_designation`
--
ALTER TABLE `faculty_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_designation`
--
ALTER TABLE `subject_designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_department`
--
ALTER TABLE `user_department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_department_details`
--
ALTER TABLE `user_department_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty_designation`
--
ALTER TABLE `faculty_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subject_designation`
--
ALTER TABLE `subject_designation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_department`
--
ALTER TABLE `user_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_department_details`
--
ALTER TABLE `user_department_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
