-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2018 at 03:22 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hemtravels`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `id` int(11) NOT NULL,
  `user_type` varchar(2) NOT NULL DEFAULT 'CU' COMMENT 'SA - super admin, VA - Vendor, CU - Customer, GU - Guest, OB - Office booking',
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `user_fullname` varchar(250) DEFAULT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL COMMENT '1->male,2->female',
  `phone` varchar(10) DEFAULT NULL,
  `alt_phone` varchar(10) DEFAULT NULL,
  `emergency_contact_person` varchar(250) DEFAULT NULL,
  `emergency_contact_no` varchar(10) DEFAULT NULL,
  `activation_code` varchar(250) DEFAULT NULL,
  `activation_code_time` datetime DEFAULT NULL,
  `about_me` text,
  `profile_pic` text,
  `fb_id` text,
  `google_id` text,
  `login_via` tinyint(1) DEFAULT '1' COMMENT '1->login,2->fb,3->google',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` datetime DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0->de active, 1->active,2->not activated'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_type`, `email`, `password`, `user_fullname`, `dob`, `gender`, `phone`, `alt_phone`, `emergency_contact_person`, `emergency_contact_no`, `activation_code`, `activation_code_time`, `about_me`, `profile_pic`, `fb_id`, `google_id`, `login_via`, `created_on`, `last_visit`, `isactive`) VALUES
(1, 'CU', 'kumar@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'karthi', '2018-06-22 00:00:00', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', 1, '2018-06-30 18:50:09', NULL, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
