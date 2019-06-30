-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 30, 2019 at 05:40 PM
-- Server version: 5.7.26-0ubuntu0.16.04.1
-- PHP Version: 7.2.19-1+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nitc-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `admin_type` varchar(10) NOT NULL DEFAULT 'admin',
  `profile_image` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `name`, `admin_type`, `profile_image`, `status`, `created`, `updated`) VALUES
(1, 'dilipyadav@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Dilip yadav', 'admin', '1561406874it-transformation-with-aws-21-638.jpg', 'active', '2019-06-24 20:06:59', '2019-06-24 20:07:54');

-- --------------------------------------------------------

--
-- Table structure for table `student-detail`
--

CREATE TABLE `student-detail` (
  `std_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_num` bigint(20) NOT NULL,
  `certificate_num` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `institute_name` varchar(200) NOT NULL,
  `std_image` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'No',
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student-detail`
--

INSERT INTO `student-detail` (`std_id`, `name`, `email`, `phone_num`, `certificate_num`, `father_name`, `dob`, `course_name`, `institute_name`, `std_image`, `status`, `create_time`, `update_time`) VALUES
(14, 'Dilip yadav', 'abc@gmail.com', 7899999, '123456@gmi', 'riilip', '2019-06-13', 'javac', '', '1561267085273105.jpg', 'Yes', '2019-06-22 11:51:53', '2019-06-22 11:51:53'),
(18, 'DIlip yadav', 'abc@gmail.com', 7867676787, 'nitc12741018', 'bff', '2019-06-20', 'Java', '', '1561262706273105.jpg', 'Yes', '2019-06-23 04:05:07', '2019-06-23 04:05:07'),
(25, 'Dilip kumar yadav', 'abc@gmail.com', 7905854106, 'nitc15397725', 'Bk yadav', '2019-06-20', 'Java and c ', '', '1561294776dgwp.png', 'Yes', '2019-06-23 04:44:34', '2019-06-23 04:44:34'),
(32, 'Dilip yadav rrr', 'abc@gmail.com', 7905854106, 'nitc13485632', 'bk yadav', '2019-06-12', 'Java', '', '1561294197devops-drives-cloud1.png', 'Yes', '2019-06-23 12:49:58', '2019-06-23 12:49:58'),
(33, 'Dilip', 'abc@gmail.com', 43657, '', 'vnkas', '2019-06-19', 'jacdee', '', '1561294323download_(1).png', 'No', '2019-06-23 12:52:03', '2019-06-23 12:52:03'),
(34, 'Dilip yadav', 'fky@gmail.com', 987654, 'nitc18243834', 'bk yadav', '2019-06-19', 'yuu', '', '1561294422Cloud-and-DevOps-Complements-Each-Other.jpg', 'Yes', '2019-06-23 12:53:42', '2019-06-23 12:53:42'),
(35, 'dilip', 'abc@gmail.com', 234567888, '', 'gtt', '2019-06-12', 'java', '', '1561309111download.png', 'No', '2019-06-23 16:58:31', '2019-06-23 16:58:31'),
(37, 'Dilip yadav', 'abc@gmail.com', 7905854106, 'nitc17608637', 'nitc', '2019-06-20', 'java', 'nitc', '1561407406devops-drives-cloud1.png', 'Yes', '2019-06-24 20:16:46', '2019-06-24 20:16:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student-detail`
--
ALTER TABLE `student-detail`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student-detail`
--
ALTER TABLE `student-detail`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
