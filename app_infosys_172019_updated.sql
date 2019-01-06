-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2019 at 08:10 PM
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
-- Table structure for table `encoded_grade`
--

CREATE TABLE `encoded_grade` (
  `id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `enroll_id` int(11) NOT NULL,
  `quarter_one` varchar(10) DEFAULT NULL,
  `quarter_two` varchar(10) DEFAULT NULL,
  `quarter_three` varchar(10) DEFAULT NULL,
  `quarter_four` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `encoded_grade`
--

INSERT INTO `encoded_grade` (`id`, `school_year_id`, `section_id`, `subject_id`, `enroll_id`, `quarter_one`, `quarter_two`, `quarter_three`, `quarter_four`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 3, '90', '85', '75', '63', '2019-01-06 16:46:35', '2019-01-06 16:58:13');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_data`
--

CREATE TABLE `enroll_data` (
  `id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `grade_level` int(11) NOT NULL,
  `raw_data` text NOT NULL,
  `is_drop` int(11) DEFAULT NULL,
  `is_withdraw` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll_data`
--

INSERT INTO `enroll_data` (`id`, `section_id`, `school_year_id`, `grade_level`, `raw_data`, `is_drop`, `is_withdraw`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 7, 'a:35:{s:10:\"section_id\";s:1:\"2\";s:2:\"sy\";s:1:\"1\";s:5:\"grade\";s:1:\"7\";s:12:\"student_type\";s:11:\"Old Student\";s:3:\"lrn\";s:5:\"dasda\";s:3:\"esc\";s:5:\"sdasd\";s:8:\"lastname\";s:9:\"dasdasdas\";s:9:\"firstname\";s:5:\"asdas\";s:10:\"middlename\";s:6:\"dasdas\";s:3:\"sex\";s:1:\"M\";s:3:\"age\";s:2:\"11\";s:3:\"dob\";s:10:\"10-11-1992\";s:3:\"pob\";s:6:\"dasdas\";s:8:\"religion\";s:6:\"dasdas\";s:13:\"mother_tounge\";s:7:\"dasdasd\";s:11:\"nationality\";s:7:\"sdasdas\";s:7:\"address\";s:5:\"asdas\";s:9:\"disablity\";s:7:\"dasdasd\";s:6:\"school\";a:5:{i:1;a:1:{i:0;s:3:\"das\";}i:2;a:1:{i:0;s:12:\"asdasdasddas\";}i:3;a:1:{i:0;s:6:\"asdasd\";}i:4;a:1:{i:0;s:5:\"asdas\";}i:5;a:1:{i:0;s:6:\"dasdas\";}}s:8:\"location\";a:5:{i:1;a:1:{i:0;s:4:\"dasd\";}i:2;a:1:{i:0;s:6:\"asdasd\";}i:3;a:1:{i:0;s:5:\"asdas\";}i:4;a:1:{i:0;s:4:\"dasd\";}i:5;a:1:{i:0;s:8:\"asdasdas\";}}s:11:\"school_year\";a:5:{i:1;a:1:{i:0;s:5:\"asdas\";}i:2;a:1:{i:0;s:3:\"sad\";}i:3;a:1:{i:0;s:3:\"asd\";}i:4;a:1:{i:0;s:6:\"asdasd\";}i:5;a:1:{i:0;s:8:\"asdasdas\";}}s:15:\"grade_completed\";s:6:\"asdasd\";s:11:\"father_name\";s:6:\"dasdas\";s:11:\"mother_name\";s:9:\"dasdasdsa\";s:17:\"father_occupation\";s:6:\"dasdas\";s:17:\"mother_occupation\";s:8:\"asdasdas\";s:14:\"father_contact\";s:11:\"09171576436\";s:14:\"mother_contact\";s:11:\"09171576436\";s:14:\"parent_address\";s:8:\"asdasdas\";s:12:\"gurdian_name\";s:8:\"sdasdasd\";s:16:\"guardian_contact\";s:11:\"09171576436\";s:19:\"guardian_occupation\";s:7:\"dasdasd\";s:14:\"emergency_name\";s:8:\"dadasdas\";s:17:\"emergency_contact\";s:11:\"09171576436\";s:18:\"contact_reciepient\";s:6:\"mother\";}', 0, 0, '2019-01-05 18:59:07', '2019-01-06 02:53:42'),
(3, 2, 1, 7, 'a:36:{s:9:\"enroll_id\";s:1:\"3\";s:10:\"section_id\";s:1:\"2\";s:2:\"sy\";s:1:\"1\";s:5:\"grade\";s:1:\"7\";s:12:\"student_type\";s:11:\"New Student\";s:3:\"lrn\";s:12:\"Sample LRN21\";s:3:\"esc\";s:8:\"sdasdasd\";s:8:\"lastname\";s:6:\"asdasd\";s:9:\"firstname\";s:4:\"dasd\";s:10:\"middlename\";s:4:\"sdas\";s:3:\"sex\";s:1:\"M\";s:3:\"age\";s:2:\"12\";s:3:\"dob\";s:10:\"10-11-1992\";s:3:\"pob\";s:5:\"dasda\";s:8:\"religion\";s:8:\"asdasdas\";s:13:\"mother_tounge\";s:5:\"sdasd\";s:11:\"nationality\";s:5:\"sdasd\";s:7:\"address\";s:9:\"asdasdasd\";s:9:\"disablity\";s:9:\"dasdasdsa\";s:6:\"school\";a:5:{i:1;a:1:{i:0;s:7:\"dasdasd\";}i:2;a:1:{i:0;s:9:\"dasdasdas\";}i:3;a:1:{i:0;s:13:\"dasdasdasdasd\";}i:4;a:1:{i:0;s:11:\"asdasdasdas\";}i:5;a:1:{i:0;s:9:\"asdasdasd\";}}s:8:\"location\";a:5:{i:1;a:1:{i:0;s:6:\"asdasd\";}i:2;a:1:{i:0;s:6:\"asdasd\";}i:3;a:1:{i:0;s:6:\"asdasd\";}i:4;a:1:{i:0;s:8:\"asdasdsa\";}i:5;a:1:{i:0;s:6:\"dasdas\";}}s:11:\"school_year\";a:5:{i:1;a:1:{i:0;s:8:\"asdasdas\";}i:2;a:1:{i:0;s:4:\"dasd\";}i:3;a:1:{i:0;s:5:\"asdas\";}i:4;a:1:{i:0;s:7:\"dasdasd\";}i:5;a:1:{i:0;s:6:\"dasdas\";}}s:15:\"grade_completed\";a:5:{i:1;a:1:{i:0;s:4:\"dsad\";}i:2;a:1:{i:0;s:4:\"dasd\";}i:3;a:1:{i:0;s:5:\"asdas\";}i:4;a:1:{i:0;s:6:\"dasdas\";}i:5;a:1:{i:0;s:9:\"dasdsadas\";}}s:11:\"father_name\";s:6:\"dasdas\";s:11:\"mother_name\";s:6:\"dasdas\";s:17:\"father_occupation\";s:6:\"dasdas\";s:17:\"mother_occupation\";s:7:\"dasdasd\";s:14:\"father_contact\";s:11:\"09171576848\";s:14:\"mother_contact\";s:11:\"09171576848\";s:14:\"parent_address\";s:8:\"dasdasda\";s:12:\"gurdian_name\";s:11:\"asdasdas123\";s:16:\"guardian_contact\";s:11:\"09171576848\";s:19:\"guardian_occupation\";s:11:\"09171576848\";s:14:\"emergency_name\";s:13:\"dasdasdasd121\";s:17:\"emergency_contact\";s:11:\"09171576848\";s:18:\"contact_reciepient\";s:6:\"mother\";}', NULL, NULL, '2019-01-06 09:20:18', '2019-01-06 12:54:28');

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
(3, 1, 2, 7, 1, '2019-01-06 13:14:30', '0000-00-00 00:00:00'),
(5, 1, 2, 8, 4, '2019-01-06 13:16:05', '2019-01-06 14:29:36');

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
(9, 'faculty3', '42f749ade7f9e195bf475f37a44cafcb', 'Faculty3', 'Faculty', 'Faculty', '2', 1, '2019-01-01 13:15:08', '0000-00-00 00:00:00'),
(10, 'registrar1', '42f749ade7f9e195bf475f37a44cafcb', 'Registrar', 'Sample', 'Account', '3', 1, '2019-01-06 17:07:03', '0000-00-00 00:00:00');

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
(6, 9, 2, '2019-01-01 13:15:08', '0000-00-00 00:00:00'),
(7, 10, 3, '2019-01-06 17:07:03', '0000-00-00 00:00:00');

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
-- Indexes for table `encoded_grade`
--
ALTER TABLE `encoded_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_data`
--
ALTER TABLE `enroll_data`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `encoded_grade`
--
ALTER TABLE `encoded_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `enroll_data`
--
ALTER TABLE `enroll_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_department`
--
ALTER TABLE `user_department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_department_details`
--
ALTER TABLE `user_department_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
