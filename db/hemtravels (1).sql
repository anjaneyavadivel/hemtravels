-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 06:04 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

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
-- Table structure for table `account_info`
--

CREATE TABLE IF NOT EXISTS `account_info` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(150) NOT NULL,
  `account_holder_name` varchar(150) NOT NULL,
  `account_number` varchar(150) NOT NULL,
  `ifsc_code` varchar(50) NOT NULL,
  `branch` varchar(150) NOT NULL,
  `address` varchar(150) NOT NULL,
  `is_primary` int(1) NOT NULL DEFAULT '0' COMMENT '0 - not primary, 1 - primary',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `state_id`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 2, 'Domlur', '2018-08-01 02:28:52', 0, '0000-00-00 00:00:00', 0, 1),
(2, 2, 'Indiranagar', '2018-08-01 02:28:52', 0, '0000-00-00 00:00:00', 0, 1),
(5, 1, 'Coimbatore', '2018-08-15 03:13:22', 0, '0000-00-00 00:00:00', 0, 1),
(6, 1, 'Chennai', '2018-08-15 03:13:42', 0, '0000-00-00 00:00:00', 0, 1),
(7, 2, 'CALANGUTE', '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0, 1),
(8, 2, 'Candolim', '2018-09-20 09:22:20', 3, '0000-00-00 00:00:00', 0, 1),
(9, 2, 'Baga', '2018-10-03 12:01:46', 0, '0000-00-00 00:00:00', 0, 1),
(10, 2, 'Sinquerim', '2018-10-14 07:36:42', 3, '0000-00-00 00:00:00', 0, 1),
(11, 2, 'North Goa', '2018-10-15 09:43:01', 3, '0000-00-00 00:00:00', 0, 1),
(12, 2, 'SIOLIM', '2018-10-31 08:03:05', 57, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` tinytext NOT NULL,
  `message` tinytext NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0' COMMENT '0 - not read, 1 - read',
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `is_read`, `isactive`, `created_on`) VALUES
(1, 'Anjaneya', 'anjaneyavadivel@gmail.com', 'this is mail test', 'this is mail test', 0, 1, '2018-08-26 17:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`id`, `name`, `isactive`) VALUES
(1, 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code_master`
--

CREATE TABLE IF NOT EXISTS `coupon_code_master` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 - Customer / 2 - Vendor/ 3 - super admin/ 4 - Specific Customer Offer',
  `coupon_code` varchar(100) NOT NULL,
  `coupon_name` varchar(150) NOT NULL,
  `offer_type` int(1) NOT NULL COMMENT '1 - Fixed / 2 -Percentage',
  `percentage_amount` float(8,2) NOT NULL,
  `validity_from` date NOT NULL,
  `validity_to` date NOT NULL,
  `comment` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `price_to_adult` float(8,2) NOT NULL,
  `price_to_child` float(8,2) NOT NULL,
  `price_to_infan` float(8,2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code_master`
--

INSERT INTO `coupon_code_master` (`id`, `user_id`, `trip_id`, `type`, `coupon_code`, `coupon_name`, `offer_type`, `percentage_amount`, `validity_from`, `validity_to`, `comment`, `category_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `created_on`, `isactive`) VALUES
(1, 79, 17, 2, 'CASH', 'PAYMENT IN CASH', 1, 0.00, '2018-11-27', '2018-12-31', ' PAYMENT IN CASH', 0, 0.00, 0.00, 0.00, '2018-11-27 06:15:40', 1),
(2, 79, 1, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-02', '2019-01-31', ' payment in cash', 0, 0.00, 0.00, 0.00, '2018-12-01 15:59:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code_master_history`
--

CREATE TABLE IF NOT EXISTS `coupon_code_master_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `coupon_code_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 - Customer / 2 - Vendor/ 3 - super admin',
  `coupon_code` varchar(100) NOT NULL,
  `coupon_name` varchar(150) NOT NULL,
  `offer_type` int(1) NOT NULL COMMENT '1 - Fixed / 2 -Percentage',
  `percentage_amount` float(8,2) NOT NULL,
  `validity_from` date NOT NULL,
  `validity_to` date NOT NULL,
  `comment` varchar(200) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '0',
  `price_to_adult` float(8,2) NOT NULL,
  `price_to_child` float(8,2) NOT NULL,
  `price_to_infan` float(8,2) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code_master_history`
--

INSERT INTO `coupon_code_master_history` (`id`, `user_id`, `coupon_code_id`, `trip_id`, `type`, `coupon_code`, `coupon_name`, `offer_type`, `percentage_amount`, `validity_from`, `validity_to`, `comment`, `category_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `created_on`, `isactive`) VALUES
(1, 79, 1, 17, 2, 'CASH', 'PAYMENT IN CASH', 1, 0.00, '2018-11-27', '2018-12-31', ' PAYMENT IN CASH', 0, 0.00, 0.00, 0.00, '2018-11-27 06:15:40', 1),
(2, 79, 2, 1, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-02', '2019-01-31', ' payment in cash', 0, 0.00, 0.00, 0.00, '2018-12-01 15:59:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_master`
--

CREATE TABLE IF NOT EXISTS `faq_master` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL DEFAULT '0' COMMENT '0 - admin common FAQ',
  `question` tinytext NOT NULL,
  `answer` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_master`
--

INSERT INTO `faq_master` (`id`, `trip_id`, `question`, `answer`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 0, 'Who can register as Vendor', 'All the tour operators who condut tour or sell tour and have got a fixed inventory and price to sell online can register. He should be woking as per the applicable government rules.', '2018-08-22 17:55:22', 0, '0000-00-00 00:00:00', 0, 1),
(2, 0, 'How to log in to register my trips', '<p></p><p>If you are first time user\r\nthen you have to sign up as a vendor / business. After that you can log in and\r\nenter your trips.</p><br><p></p>', '2018-08-22 18:04:10', 0, '0000-00-00 00:00:00', 0, 1),
(3, 0, 'Can I accept online payment', '<p>Yes by registering with BYT\r\nyou can display your trips and also send the booking link of your trips to your\r\ncustomers and accept online payment.</p>', '2018-11-29 09:57:19', 0, '0000-00-00 00:00:00', 0, 1),
(4, 0, 'How many trips can I sell', '<p>There is no limit to the\r\nnumber of trips to sell online. You have to go to your login and make new trip\r\nfor which ever trips you are operating.</p>', '2018-11-29 09:57:54', 0, '0000-00-00 00:00:00', 0, 1),
(5, 0, 'How does a vendor know when the booking is done.', '<p>If a customer does a\r\nbooking then the vendor and the customer gets the email confirmation of the\r\nbooking with its details. A vendor can also log into his account and see the\r\nbooking list which will give the list of all the bookings</p>', '2018-11-29 09:58:55', 0, '0000-00-00 00:00:00', 0, 1),
(6, 0, 'How do I know the list of trips going for the trip tomorrow.', '<p>On the dash board of the vendor login there\r\nis button ‘ Tomorrow’s Trip’. You can get the list of trips that has been\r\nbooked which are to be executed on the specific day. This list can also be exported ot excel\r\nfile for&nbsp; your office administration\r\npurporse</p>', '2018-11-29 10:02:16', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `my_transaction`
--

CREATE TABLE IF NOT EXISTS `my_transaction` (
  `id` int(11) NOT NULL,
  `book_pay_id` int(11) NOT NULL DEFAULT '0',
  `book_pay_details_id` int(11) NOT NULL DEFAULT '0',
  `pnr_no` varchar(150) DEFAULT NULL,
  `from_userid` int(11) NOT NULL DEFAULT '-1',
  `to_userid` int(11) NOT NULL DEFAULT '-1',
  `userid` int(11) NOT NULL DEFAULT '-1',
  `trip_id` int(11) NOT NULL DEFAULT '0',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_notes` text NOT NULL,
  `withdrawals` float(8,2) NOT NULL,
  `deposits` float(8,2) NOT NULL,
  `balance` float(8,2) NOT NULL,
  `b2b_pay_account_info` int(11) NOT NULL DEFAULT '0',
  `withdrawal_request_id` int(11) NOT NULL DEFAULT '0',
  `withdrawal_request_amt` float(8,2) NOT NULL,
  `withdrawal_notes` text NOT NULL,
  `withdrawal_paid_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL COMMENT '0 - new, 1 - InProgress, 2 -  Executed, 3- Sent'
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_transaction`
--

INSERT INTO `my_transaction` (`id`, `book_pay_id`, `book_pay_details_id`, `pnr_no`, `from_userid`, `to_userid`, `userid`, `trip_id`, `date_time`, `transaction_notes`, `withdrawals`, `deposits`, `balance`, `b2b_pay_account_info`, `withdrawal_request_id`, `withdrawal_request_amt`, `withdrawal_notes`, `withdrawal_paid_on`, `status`) VALUES
(1, 0, 0, '', -1, -1, 98, 0, '2018-11-26 17:13:05', 'Deposit: Cash Deposited', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(2, 1, 0, 'PNR74FRVCUH', -1, 0, 98, 3, '2018-11-26 17:13:05', 'Withdrawal: Trip has been booked PNR74FRVCUH / TRIPQysIwpd / RAFTING', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(3, 1, 0, 'PNR74FRVCUH', 98, -1, 0, 3, '2018-11-26 17:13:05', 'Deposit: Trip has been booked PNR74FRVCUH / TRIPQysIwpd / RAFTING', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(4, 0, 0, '', -1, -1, 81, 0, '2018-11-27 13:34:22', 'Deposit: Cash Deposited', 0.00, 18000.00, 18000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(5, 2, 0, 'PNR14CPLFR1', -1, 0, 81, 2, '2018-11-27 13:34:22', 'Withdrawal: Trip has been booked PNR14CPLFR1 / TRIPB3ZP4dW / WATERFALLS (R)', 18000.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(6, 2, 0, 'PNR14CPLFR1', 81, -1, 0, 2, '2018-11-27 13:34:22', 'Deposit: Trip has been booked PNR14CPLFR1 / TRIPB3ZP4dW / WATERFALLS (R)', 0.00, 18000.00, 18000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(7, 0, 0, '', -1, -1, 81, 0, '2018-11-27 13:48:30', 'Deposit: Cash Deposited', 0.00, 3000.00, 3000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(8, 3, 0, 'PNR12B4IPZR', -1, 0, 81, 2, '2018-11-27 13:48:30', 'Withdrawal: Trip has been booked PNR12B4IPZR / TRIPB3ZP4dW / WATERFALLS (R)', 3000.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(9, 3, 0, 'PNR12B4IPZR', 81, -1, 0, 2, '2018-11-27 13:48:30', 'Deposit: Trip has been booked PNR12B4IPZR / TRIPB3ZP4dW / WATERFALLS (R)', 0.00, 3000.00, 21000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(10, 1, 1, 'PNR74FRVCUH', -1, 80, 0, 3, '2018-11-29 01:00:01', 'Withdrawal: Trip booking amount for PNR No PNR74FRVCUH (TRIPQysIwpd / RAFTING).', 0.00, 0.00, 21000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(11, 1, 1, 'PNR74FRVCUH', 0, -1, 80, 3, '2018-11-29 01:00:01', 'Deposit: Trip booking amount for PNR No PNR74FRVCUH (TRIPQysIwpd / RAFTING).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(12, 2, 2, 'PNR14CPLFR1', -1, 79, 0, 1, '2018-11-30 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR14CPLFR1 (TRIPyb7ZpaY / WATERFALLS (R)).', 360.00, 0.00, 20640.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(13, 2, 2, 'PNR14CPLFR1', 0, -1, 79, 1, '2018-11-30 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR14CPLFR1 (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 360.00, 360.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(14, 2, 2, 'PNR14CPLFR1', -1, 0, 79, 1, '2018-11-30 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR14CPLFR1 (TRIPyb7ZpaY / WATERFALLS (R)).', 360.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(15, 2, 2, 'PNR14CPLFR1', 79, -1, 0, 1, '2018-11-30 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR14CPLFR1 (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 360.00, 21000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(16, 2, 2, 'PNR14CPLFR1', -1, 79, 0, 1, '2018-11-30 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR14CPLFR1 (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', 17640.00, 0.00, 3360.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(17, 2, 2, 'PNR14CPLFR1', 0, -1, 79, 1, '2018-11-30 01:00:02', 'Deposit: Trip booking amount for PNR No PNR14CPLFR1 (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', 0.00, 17640.00, 17640.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(18, 2, 3, 'PNR14CPLFR1', -1, 81, 0, 2, '2018-11-30 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR14CPLFR1 (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 3360.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(19, 2, 3, 'PNR14CPLFR1', 0, -1, 81, 2, '2018-11-30 01:00:02', 'Deposit: Trip booking amount for PNR No PNR14CPLFR1 (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(20, 3, 4, 'PNR12B4IPZR', -1, 79, 0, 1, '2018-11-30 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR12B4IPZR (TRIPyb7ZpaY / WATERFALLS (R)).', 60.00, 0.00, 3300.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(21, 3, 4, 'PNR12B4IPZR', 0, -1, 79, 1, '2018-11-30 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR12B4IPZR (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 60.00, 17700.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(22, 3, 4, 'PNR12B4IPZR', -1, 0, 79, 1, '2018-11-30 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR12B4IPZR (TRIPyb7ZpaY / WATERFALLS (R)).', 60.00, 0.00, 17640.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(23, 3, 4, 'PNR12B4IPZR', 79, -1, 0, 1, '2018-11-30 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR12B4IPZR (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 60.00, 3360.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(24, 3, 4, 'PNR12B4IPZR', -1, 79, 0, 1, '2018-11-30 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR12B4IPZR (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', 2940.00, 0.00, 420.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(25, 3, 4, 'PNR12B4IPZR', 0, -1, 79, 1, '2018-11-30 01:00:02', 'Deposit: Trip booking amount for PNR No PNR12B4IPZR (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', 0.00, 2940.00, 20580.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(26, 3, 5, 'PNR12B4IPZR', -1, 81, 0, 2, '2018-11-30 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR12B4IPZR (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 420.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(27, 3, 5, 'PNR12B4IPZR', 0, -1, 81, 2, '2018-11-30 01:00:03', 'Deposit: Trip booking amount for PNR No PNR12B4IPZR (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(28, 0, 0, '', -1, -1, 81, 0, '2018-11-30 13:36:34', 'Deposit: Cash Deposited', 0.00, 6000.00, 6000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(29, 4, 0, 'PNR592LUHNX', -1, 0, 81, 2, '2018-11-30 13:36:34', 'Withdrawal: Trip has been booked PNR592LUHNX / TRIPB3ZP4dW / WATERFALLS (R)', 6000.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(30, 4, 0, 'PNR592LUHNX', 81, -1, 0, 2, '2018-11-30 13:36:34', 'Deposit: Trip has been booked PNR592LUHNX / TRIPB3ZP4dW / WATERFALLS (R)', 0.00, 6000.00, 6420.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(31, 0, 0, '', -1, -1, 81, 0, '2018-11-30 15:04:26', 'Deposit: Cash Deposited', 0.00, 5000.00, 5000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(32, 5, 0, 'PNR12IH2EPM', -1, 0, 81, 13, '2018-11-30 15:04:26', 'Withdrawal: Trip has been booked PNR12IH2EPM / TRIPSq7bUTr / MURDESHWAR (R)', 5000.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(33, 5, 0, 'PNR12IH2EPM', 81, -1, 0, 13, '2018-11-30 15:04:26', 'Deposit: Trip has been booked PNR12IH2EPM / TRIPSq7bUTr / MURDESHWAR (R)', 0.00, 5000.00, 11420.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(34, 0, 0, '', -1, -1, 99, 0, '2018-11-30 17:11:06', 'Deposit: Cash Deposited', 0.00, 350.00, 350.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(35, 0, 0, 'PNR84IADW4R', -1, -1, 99, 0, '2018-11-30 17:11:06', 'Deposit: Trip has been booked PNR84IADW4R', 0.00, 350.00, 700.00, 0, 0, 0.00, 'Office Booking PNRPNR84IADW4R', '0000-00-00 00:00:00', 2),
(36, 6, 0, 'PNR84IADW4R', -1, 0, 99, 8, '2018-11-30 17:11:06', 'Withdrawal: Trip has been booked PNR84IADW4R / TRIPF6uRheb / AIRPORT TRANSFER', 350.00, 0.00, 350.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(37, 6, 0, 'PNR84IADW4R', 99, -1, 0, 8, '2018-11-30 17:11:06', 'Deposit: Trip has been booked PNR84IADW4R / TRIPF6uRheb / AIRPORT TRANSFER', 0.00, 350.00, 11770.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(38, 6, 10, 'PNR84IADW4R', -1, 80, 0, 7, '2018-12-02 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPuNaDr56 / AIRPORT TRANSFER).', 20.00, 0.00, 11750.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(39, 6, 10, 'PNR84IADW4R', 0, -1, 80, 7, '2018-12-02 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPuNaDr56 / AIRPORT TRANSFER).', 0.00, 20.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(40, 6, 10, 'PNR84IADW4R', -1, 0, 80, 7, '2018-12-02 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPuNaDr56 / AIRPORT TRANSFER).', 20.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(41, 6, 10, 'PNR84IADW4R', 80, -1, 0, 7, '2018-12-02 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPuNaDr56 / AIRPORT TRANSFER).', 0.00, 20.00, 11770.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(42, 6, 10, 'PNR84IADW4R', -1, 80, 0, 7, '2018-12-02 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR84IADW4R (TRIPuNaDr56 / AIRPORT TRANSFER). Include GST and Service Charge.', 280.00, 0.00, 11490.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(43, 6, 10, 'PNR84IADW4R', 0, -1, 80, 7, '2018-12-02 01:00:02', 'Deposit: Trip booking amount for PNR No PNR84IADW4R (TRIPuNaDr56 / AIRPORT TRANSFER). Include GST and Service Charge.', 0.00, 280.00, 280.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(44, 6, 11, 'PNR84IADW4R', -1, 3, 0, 8, '2018-12-02 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPF6uRheb / AIRPORT TRANSFER).', 20.00, 0.00, 11470.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(45, 6, 11, 'PNR84IADW4R', 0, -1, 3, 8, '2018-12-02 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPF6uRheb / AIRPORT TRANSFER).', 0.00, 20.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(46, 6, 11, 'PNR84IADW4R', -1, 0, 3, 8, '2018-12-02 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPF6uRheb / AIRPORT TRANSFER).', 20.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(47, 6, 11, 'PNR84IADW4R', 3, -1, 0, 8, '2018-12-02 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR84IADW4R (TRIPF6uRheb / AIRPORT TRANSFER).', 0.00, 20.00, 11490.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(48, 6, 11, 'PNR84IADW4R', -1, 3, 0, 8, '2018-12-02 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR84IADW4R (TRIPF6uRheb / AIRPORT TRANSFER). Include GST and Service Charge.', 30.00, 0.00, 11460.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(49, 6, 11, 'PNR84IADW4R', 0, -1, 3, 8, '2018-12-02 01:00:02', 'Deposit: Trip booking amount for PNR No PNR84IADW4R (TRIPF6uRheb / AIRPORT TRANSFER). Include GST and Service Charge.', 0.00, 30.00, 30.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(50, 0, 0, 'PNR48MIWVIB', -1, 0, 81, 0, '2018-12-14 16:24:56', 'Withdrawal: Trip has been booked PNR48MIWVIB', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR48MIWVIB', '0000-00-00 00:00:00', 2),
(51, 0, 0, 'PNR48MIWVIB', 81, -1, 0, 0, '2018-12-14 16:24:56', 'Deposit: Trip has been booked PNR48MIWVIB', 0.00, 0.00, 11460.00, 0, 0, 0.00, 'Office Booking PNRPNR48MIWVIB', '0000-00-00 00:00:00', 2),
(52, 11, 0, 'PNR48MIWVIB', -1, 0, 101, 1, '2018-12-14 16:24:56', 'Withdrawal: Trip has been booked PNR48MIWVIB / TRIPyb7ZpaY / WATERFALLS (R)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(53, 11, 0, 'PNR48MIWVIB', 101, -1, 0, 1, '2018-12-14 16:24:56', 'Deposit: Trip has been booked PNR48MIWVIB / TRIPyb7ZpaY / WATERFALLS (R)', 0.00, 0.00, 11460.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `recipient_id` int(11) NOT NULL,
  `message` tinytext NOT NULL,
  `notified` int(1) NOT NULL DEFAULT '0' COMMENT '0 - not read, 1 - read',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pick_up_location`
--

CREATE TABLE IF NOT EXISTS `pick_up_location` (
  `id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pick_up_location_map`
--

CREATE TABLE IF NOT EXISTS `pick_up_location_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `landmark` varchar(200) NOT NULL,
  `time` varchar(150) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pick_up_location_map`
--

INSERT INTO `pick_up_location_map` (`id`, `trip_id`, `city_id`, `location`, `landmark`, `time`, `isactive`) VALUES
(1, 1, 7, 'CALANGUTE', 'KFC', '05:45', 1),
(2, 1, 7, 'CANDOLIM', 'AXIS BANK', '06:00', 1),
(3, 1, 7, 'SINQUERIM', 'BUS STAND', '06:00', 1),
(4, 1, 7, 'BAGA', 'CCD', '05:45', 1),
(5, 2, 7, 'HEM TRAVELS CANDOLIM', 'HEM TRAVELS OFFICE', '06:00', 1),
(6, 2, 7, 'CALANGUTE', 'KFC', '05:45', 1),
(7, 2, 7, 'CANDOLIM', 'AXIS BANK', '06:00', 1),
(8, 2, 7, 'SINQUERIM', 'BUS STAND', '06:20', 1),
(9, 2, 7, 'BAGA', 'CCD', '05:45', 1),
(10, 3, 7, 'CALANGUTE', 'DOLPHIN CIRCLE', '07:00', 1),
(11, 4, 7, 'CALANGUTE', 'TEMPLE', '06:45', 1),
(12, 4, 7, 'CALANGUTE', 'DOLPHIN CIRCLE', '07:00', 1),
(13, 5, 8, 'CANDOLIM', 'AXIS BANK', '15:00', 1),
(14, 6, 8, 'CANDOLIM', 'AXIS BANK', '15:00', 1),
(15, 6, 8, 'CANDOLIM', 'AXIS BANK', '15:00', 1),
(16, 7, 7, 'CALANGUTE', 'DOLPHIN CIRCLE', '05:00', 1),
(17, 8, 7, 'calangute', 'dolphin circle', '05:05', 1),
(18, 8, 7, 'CALANGUTE', 'DOLPHIN CIRCLE', '05:00', 1),
(19, 5, 8, 'CALANGUTE', 'KFC', '15:15', 1),
(20, 5, 8, 'ARPORA', 'ARPORA CHAPEL', '15:30', 1),
(21, 1, 7, 'MORJIM', 'BUS STAND', '5:00', 1),
(22, 9, 8, 'CALANGUTE', 'DOLPHIN CIRCLE', '4:45', 1),
(23, 9, 8, 'CANDOLIM', 'AXIS BANK', '5:00', 1),
(24, 9, 8, 'APORA', 'ARPORA CHAPEL', '4:45', 1),
(25, 9, 8, 'MORJIM', 'BUS STAND', '5:20', 1),
(26, 10, 7, 'CANDOLIM', 'AXIS BANK', '5:00', 1),
(27, 10, 7, 'CALANGUTE', 'KFC', '4:45', 1),
(28, 10, 7, 'BAGA', 'CCD', '4:45', 1),
(29, 10, 7, 'MORJIM', 'BUS STAND', '4:20', 1),
(30, 11, 8, 'CALANGUTE', 'KFC', '8:30', 1),
(31, 11, 8, 'CANDOLIM', 'AXIS BANK', '8:30', 1),
(32, 12, 8, 'CANDOLIM', 'AXIS BANK', '8:30', 1),
(33, 12, 8, 'CALANGUTE', 'KFC', '8:30', 1),
(34, 13, 8, 'CALANGUTE', 'DOLPHIN CIRCLE', '4:45', 1),
(35, 13, 8, 'CANDOLIM', 'AXIS BANK', '5:00', 1),
(36, 13, 8, 'APORA', 'ARPORA CHAPEL', '4:45', 1),
(37, 13, 8, 'MORJIM', 'BUS STAND', '5:20', 1),
(38, 14, 7, 'CANDOLIM', 'AXIS BANK', '5:00', 1),
(39, 14, 7, 'CALANGUTE', 'KFC', '4:45', 1),
(40, 14, 7, 'BAGA', 'CCD', '4:45', 1),
(41, 14, 7, 'MORJIM', 'BUS STAND', '4:20', 1),
(42, 15, 7, 'BAGA', 'AVM OFFICE', '05:45', 1),
(43, 15, 7, 'CALANGUTE', 'KFC', '05:45', 1),
(44, 15, 7, 'CANDOLIM', 'AXIS BANK', '06:00', 1),
(45, 15, 7, 'SINQUERIM', 'BUS STAND', '06:00', 1),
(46, 15, 7, 'BAGA', 'CCD', '05:45', 1),
(47, 15, 7, 'MORJIM', 'BUS STAND', '5:00', 1),
(48, 16, 8, 'CANDOLIM', 'HEM TRAVELS', '15:30', 1),
(49, 16, 8, 'CANDOLIM', 'AXIS BANK', '15:00', 1),
(50, 16, 8, 'CALANGUTE', 'KFC', '15:15', 1),
(51, 16, 8, 'ARPORA', 'ARPORA CHAPEL', '15:30', 1),
(52, 17, 8, 'CANDOLIM', 'AXIS BANK', '05:00', 1),
(53, 18, 8, 'CANDOLIM', 'HEMTRAVELS OFF', '05:00', 1),
(54, 18, 8, 'CANDOLIM', 'AXIS BANK', '05:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`id`, `country_id`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 1, 'Tamil Nadu', '2018-07-28 09:29:21', 0, '0000-00-00 00:00:00', 0, 1),
(2, 1, 'Goa', '2018-07-28 09:29:21', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_avilable`
--

CREATE TABLE IF NOT EXISTS `trip_avilable` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `sunday` int(1) NOT NULL DEFAULT '0',
  `monday` int(1) NOT NULL DEFAULT '0',
  `tuesday` int(1) NOT NULL DEFAULT '0',
  `wednesday` int(1) NOT NULL DEFAULT '0',
  `thursday` int(1) NOT NULL DEFAULT '0',
  `friday` int(1) NOT NULL DEFAULT '0',
  `saturday` int(1) NOT NULL DEFAULT '0',
  `isactive` int(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_avilable`
--

INSERT INTO `trip_avilable` (`id`, `trip_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 0, 1, '2018-11-16 09:54:00', 0, '0000-00-00 00:00:00', 0),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-16 10:10:37', 0, '0000-00-00 00:00:00', 0),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-16 14:40:41', 0, '0000-00-00 00:00:00', 0),
(4, 4, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-16 14:55:37', 0, '0000-00-00 00:00:00', 0),
(5, 5, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-19 16:10:31', 0, '0000-00-00 00:00:00', 0),
(6, 6, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-19 16:36:23', 0, '0000-00-00 00:00:00', 0),
(7, 7, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-20 08:05:17', 0, '0000-00-00 00:00:00', 0),
(8, 8, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-23 08:56:31', 0, '0000-00-00 00:00:00', 0),
(9, 9, 0, 1, 1, 0, 1, 0, 0, 1, '2018-11-23 14:14:13', 0, '0000-00-00 00:00:00', 0),
(10, 10, 0, 1, 1, 0, 1, 0, 0, 1, '2018-11-23 14:34:34', 0, '0000-00-00 00:00:00', 0),
(11, 11, 0, 0, 1, 0, 0, 1, 0, 1, '2018-11-23 14:48:57', 0, '0000-00-00 00:00:00', 0),
(12, 12, 0, 0, 1, 0, 0, 1, 0, 1, '2018-11-23 15:48:23', 0, '0000-00-00 00:00:00', 0),
(13, 13, 0, 1, 1, 0, 1, 0, 0, 1, '2018-11-23 15:50:59', 0, '0000-00-00 00:00:00', 0),
(14, 14, 0, 1, 1, 0, 1, 0, 0, 1, '2018-11-23 16:01:16', 0, '0000-00-00 00:00:00', 0),
(15, 15, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-24 10:02:59', 0, '0000-00-00 00:00:00', 0),
(16, 16, 1, 1, 1, 1, 1, 1, 1, 1, '2018-11-24 11:25:28', 0, '0000-00-00 00:00:00', 0),
(17, 17, 0, 0, 0, 1, 1, 0, 0, 1, '2018-11-26 11:56:15', 0, '0000-00-00 00:00:00', 0),
(18, 18, 0, 0, 0, 1, 1, 0, 0, 1, '2018-11-26 12:11:30', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trip_book_pay`
--

CREATE TABLE IF NOT EXISTS `trip_book_pay` (
  `id` int(11) NOT NULL,
  `parent_trip_id` int(11) NOT NULL DEFAULT '0',
  `trip_user_id` int(11) NOT NULL DEFAULT '0',
  `trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pnr_no` varchar(150) NOT NULL,
  `number_of_persons` int(11) NOT NULL DEFAULT '0',
  `price_to_adult` float(8,2) NOT NULL,
  `price_to_child` float(8,2) NOT NULL,
  `price_to_infan` float(8,2) NOT NULL,
  `no_of_adult` int(5) NOT NULL DEFAULT '0',
  `no_of_child` int(5) NOT NULL DEFAULT '0',
  `no_of_infan` int(5) NOT NULL DEFAULT '0',
  `total_adult_price` float(8,2) NOT NULL,
  `total_child_price` float(8,2) NOT NULL,
  `total_infan_price` float(8,2) NOT NULL,
  `subtotal_trip_price` float(8,2) NOT NULL,
  `total_trip_price` float(8,2) NOT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `specific_coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `specific_coupon_code` varchar(200) DEFAULT NULL,
  `discount_percentage` float(8,2) NOT NULL,
  `discount_price` float(8,2) NOT NULL,
  `discount_your_price` float(8,2) NOT NULL DEFAULT '0.00',
  `offer_amt` float(8,2) NOT NULL,
  `gst_percentage` float(8,2) NOT NULL,
  `gst_amt` float(8,2) NOT NULL,
  `round_off` float(8,2) NOT NULL,
  `net_price` float(8,2) NOT NULL,
  `date_of_trip` date NOT NULL,
  `date_of_trip_to` date DEFAULT NULL,
  `time_of_trip` time NOT NULL,
  `pick_up_location_id` int(11) NOT NULL,
  `pick_up_location` varchar(150) NOT NULL,
  `pick_up_location_landmark` varchar(150) NOT NULL,
  `booked_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booked_by` int(11) NOT NULL,
  `booked_to` varchar(150) DEFAULT NULL,
  `booked_email` varchar(200) DEFAULT NULL,
  `booked_phone_no` varchar(120) DEFAULT NULL,
  `status` int(1) NOT NULL COMMENT '1 - Pendding, 2- booked, 3 - cancelled, 4 - confirmed, 5 -Completed',
  `payment_type` int(1) NOT NULL COMMENT '1 - net, 2 - credit, 3 - debit',
  `payment_status` int(1) NOT NULL DEFAULT '0' COMMENT '0 - Pendding,1 - sucess,2 - failed',
  `b2b_payment_status` int(2) NOT NULL DEFAULT '0' COMMENT '0 - Pendding,1 - sucess,2 - failed',
  `b2b_payment_on` date DEFAULT NULL,
  `refund_percentage` int(11) DEFAULT '0',
  `cancelled_on` datetime DEFAULT NULL,
  `account_info_id` int(11) NOT NULL DEFAULT '0',
  `return_paid_amt` float(8,2) DEFAULT NULL,
  `return_notes` text,
  `my_transaction_id` int(11) NOT NULL DEFAULT '0',
  `return_on` timestamp NULL DEFAULT NULL,
  `return_paid_status` tinyint(2) DEFAULT '1' COMMENT '1 - New, 2 - InProgress, 3 - Paid',
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_book_pay`
--

INSERT INTO `trip_book_pay` (`id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `gst_percentage`, `gst_amt`, `round_off`, `net_price`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `booked_to`, `booked_email`, `booked_phone_no`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `isactive`) VALUES
(1, 0, 80, 3, 98, 'PNR74FRVCUH', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-27', '2018-11-27', '07:00:00', 10, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-26 17:13:05', 80, 'Gust', 'gust@gmail.com', '7373112889', 5, 1, 1, 1, '2018-11-29', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(2, 1, 81, 2, 81, 'PNR14CPLFR1', 6, 2000.00, 2000.00, 0.00, 6, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 0.00, 0.00, 0.00, -6000.00, 0.00, 0.00, 0.00, 18000.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:34:22', 81, 'Ms Gala, Sea Shell Villas, At Reception At 6:00', 'goahemtravels@gmail.com', '9257027473', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(3, 1, 81, 2, 81, 'PNR12B4IPZR', 1, 2000.00, 2000.00, 0.00, 1, 0, 0, 2000.00, 0.00, 0.00, 2000.00, 2000.00, 0, 0, '', 0.00, 0.00, 0.00, -1000.00, 0.00, 0.00, 0.00, 3000.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:48:30', 81, 'Mr Nicolai, Acacia -328, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(4, 1, 81, 2, 81, 'PNR592LUHNX', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 0.00, -2000.00, 0.00, 0.00, 0.00, 6000.00, '2018-12-01', '2018-12-01', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-30 13:36:34', 81, 'Mr Valerie, Alor Grand-403, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(5, 9, 81, 13, 81, 'PNR12IH2EPM', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5000.00, '2018-12-01', '2018-12-01', '04:45:00', 34, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-30 15:04:25', 81, 'Ms Ekaterina, Princess De Goa -A108, At Reception At 5:00 Hrs', 'goahemtravels@gmail.com', '9607335096', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(6, 7, 3, 8, 99, 'PNR84IADW4R', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-30', '2018-11-30', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-11-30 17:11:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(7, 1, 81, 2, 81, 'PNR325UK8ME', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-02 13:15:19', 81, 'Raja', 'raja@mail.com', '9876543210', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(8, 0, 79, 1, 101, 'PNR01CP9JKQ', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:05:57', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(9, 0, 79, 1, 101, 'PNR743SOIAF', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:09:04', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(10, 0, 79, 1, 101, 'PNR707HTBGF', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:22:16', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(11, 0, 79, 1, 101, 'PNR48MIWVIB', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:24:56', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_book_pay_details`
--

CREATE TABLE IF NOT EXISTS `trip_book_pay_details` (
  `id` int(11) NOT NULL,
  `book_pay_id` int(11) NOT NULL,
  `parent_trip_id` int(11) NOT NULL DEFAULT '0',
  `trip_user_id` int(11) NOT NULL DEFAULT '0',
  `trip_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `from_trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pnr_no` varchar(150) NOT NULL,
  `number_of_persons` int(11) NOT NULL DEFAULT '0',
  `price_to_adult` float(8,2) NOT NULL,
  `price_to_child` float(8,2) NOT NULL,
  `price_to_infan` float(8,2) NOT NULL,
  `no_of_adult` int(5) NOT NULL DEFAULT '0',
  `no_of_child` int(5) NOT NULL DEFAULT '0',
  `no_of_infan` int(5) NOT NULL DEFAULT '0',
  `total_adult_price` float(8,2) NOT NULL,
  `total_child_price` float(8,2) NOT NULL,
  `total_infan_price` float(8,2) NOT NULL,
  `subtotal_trip_price` float(8,2) NOT NULL,
  `total_trip_price` float(8,2) NOT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `specific_coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `specific_coupon_code` varchar(200) DEFAULT NULL,
  `discount_percentage` float(8,2) NOT NULL,
  `discount_price` float(8,2) NOT NULL,
  `discount_your_price` float(8,2) NOT NULL DEFAULT '0.00',
  `offer_amt` float(8,2) NOT NULL,
  `net_price` float(8,2) NOT NULL,
  `vendor_amt` float(8,2) NOT NULL,
  `vendor_offer_amt` float(8,2) DEFAULT '0.00',
  `vendor_cash_amt` float(8,2) NOT NULL DEFAULT '0.00',
  `your_amt` float(8,2) NOT NULL,
  `servicecharge_amt` float(8,2) NOT NULL,
  `gst_percentage` float(8,2) NOT NULL,
  `gst_amt` float(8,2) NOT NULL,
  `round_off` float(8,2) NOT NULL,
  `your_final_amt` float(8,2) NOT NULL,
  `date_of_trip` date NOT NULL,
  `date_of_trip_to` date DEFAULT NULL,
  `time_of_trip` time NOT NULL,
  `pick_up_location_id` int(11) NOT NULL,
  `pick_up_location` varchar(150) NOT NULL,
  `pick_up_location_landmark` varchar(150) NOT NULL,
  `booked_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `booked_by` int(11) NOT NULL,
  `booked_to` varchar(150) DEFAULT NULL,
  `booked_email` varchar(200) DEFAULT NULL,
  `booked_phone_no` varchar(120) DEFAULT NULL,
  `status` int(1) NOT NULL COMMENT '1 - Pending, 2- booked, 3 - cancelled, 4 - confirmed, 5 - Completed',
  `payment_type` int(1) NOT NULL COMMENT '1 - net, 2 - credit, 3 - debit',
  `payment_status` int(1) NOT NULL COMMENT '0 - Pendding,1 - sucess,2 - failed',
  `b2b_payment_status` int(2) NOT NULL DEFAULT '0' COMMENT '0 - Pendding,1 - sucess,2 - failed',
  `b2b_payment_on` date DEFAULT NULL,
  `refund_percentage` int(11) DEFAULT '0',
  `cancelled_on` datetime DEFAULT NULL,
  `account_info_id` int(11) NOT NULL DEFAULT '0',
  `return_paid_amt` float(8,2) DEFAULT NULL,
  `return_notes` text,
  `my_transaction_id` int(11) NOT NULL DEFAULT '0',
  `return_on` timestamp NULL DEFAULT NULL,
  `return_paid_status` tinyint(2) DEFAULT '1' COMMENT '1 - New, 2 - InProgress, 3 - Paid',
  `pay_details_id` int(11) NOT NULL DEFAULT '0',
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_book_pay_details`
--

INSERT INTO `trip_book_pay_details` (`id`, `book_pay_id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `from_user_id`, `from_trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `net_price`, `vendor_amt`, `vendor_offer_amt`, `vendor_cash_amt`, `your_amt`, `servicecharge_amt`, `gst_percentage`, `gst_amt`, `round_off`, `your_final_amt`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `booked_to`, `booked_email`, `booked_phone_no`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `pay_details_id`, `isactive`) VALUES
(1, 1, 0, 80, 3, 98, 3, 80, 'PNR74FRVCUH', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-27', '2018-11-27', '07:00:00', 10, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-26 17:13:05', 80, 'Gust', 'gust@gmail.com', '7373112889', 5, 1, 1, 1, '2018-11-29', 0, NULL, 0, NULL, NULL, 11, NULL, 1, 1, 1),
(2, 2, 0, 79, 1, 81, 2, 79, 'PNR14CPLFR1', 6, 3000.00, 3000.00, 0.00, 6, 0, 0, 18000.00, 0.00, 0.00, 18000.00, 18000.00, 1, 0, '', 0.00, 0.00, 0.00, 0.00, 18000.00, 0.00, 0.00, 0.00, 17640.00, 360.00, 0.00, 0.00, 0.00, 17640.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:34:22', 81, 'Ms Gala, Sea Shell Villas, At Reception At 6:00', 'goahemtravels@gmail.com', '9257027473', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 17, NULL, 1, 3, 1),
(3, 2, 1, 81, 2, 81, 2, 81, 'PNR14CPLFR1', 6, 2000.00, 2000.00, 0.00, 6, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 0.00, 0.00, 0.00, -6000.00, 0.00, 18000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:34:22', 81, 'Ms Gala, Sea Shell Villas, At Reception At 6:00', 'goahemtravels@gmail.com', '9257027473', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 19, NULL, 1, 2, 1),
(4, 3, 0, 79, 1, 81, 2, 79, 'PNR12B4IPZR', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 1, 0, '', 0.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 2940.00, 60.00, 0.00, 0.00, 0.00, 2940.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:48:30', 81, 'Mr Nicolai, Acacia -328, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 25, NULL, 1, 5, 1),
(5, 3, 1, 81, 2, 81, 2, 81, 'PNR12B4IPZR', 1, 2000.00, 2000.00, 0.00, 1, 0, 0, 2000.00, 0.00, 0.00, 2000.00, 2000.00, 0, 0, '', 0.00, 0.00, 0.00, -1000.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:48:30', 81, 'Mr Nicolai, Acacia -328, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 27, NULL, 1, 4, 1),
(6, 4, 0, 79, 1, 81, 2, 79, 'PNR592LUHNX', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 1, 0, '', 0.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 5880.00, 120.00, 0.00, 0.00, 0.00, 5880.00, '2018-12-01', '2018-12-01', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-30 13:36:34', 81, 'Mr Valerie, Alor Grand-403, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 7, 1),
(7, 4, 1, 81, 2, 81, 2, 81, 'PNR592LUHNX', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 0.00, -2000.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-01', '2018-12-01', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-30 13:36:34', 81, 'Mr Valerie, Alor Grand-403, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 6, 1),
(8, 5, 0, 79, 9, 81, 13, 79, 'PNR12IH2EPM', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 4900.00, 100.00, 0.00, 0.00, 0.00, 4900.00, '2018-12-01', '2018-12-01', '04:45:00', 34, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-30 15:04:25', 81, 'Ms Ekaterina, Princess De Goa -A108, At Reception At 5:00 Hrs', 'goahemtravels@gmail.com', '9607335096', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 9, 1),
(9, 5, 9, 81, 13, 81, 13, 81, 'PNR12IH2EPM', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-01', '2018-12-01', '04:45:00', 34, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-30 15:04:26', 81, 'Ms Ekaterina, Princess De Goa -A108, At Reception At 5:00 Hrs', 'goahemtravels@gmail.com', '9607335096', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 8, 1),
(10, 6, 0, 80, 7, 99, 8, 80, 'PNR84IADW4R', 1, 300.00, 300.00, 0.00, 1, 0, 0, 300.00, 0.00, 0.00, 300.00, 300.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 280.00, 20.00, 0.00, 0.00, 0.00, 280.00, '2018-11-30', '2018-11-30', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-11-30 17:11:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-02', 0, NULL, 0, NULL, NULL, 43, NULL, 1, 11, 1),
(11, 6, 7, 3, 8, 99, 8, 3, 'PNR84IADW4R', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 50.00, 300.00, 0.00, 0.00, 30.00, 20.00, 0.00, 0.00, 0.00, 30.00, '2018-11-30', '2018-11-30', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-11-30 17:11:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-02', 0, NULL, 0, NULL, NULL, 49, NULL, 1, 10, 1),
(12, 7, 0, 79, 1, 81, 2, 79, 'PNR325UK8ME', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 2, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-02 13:15:19', 81, 'Raja', 'raja@mail.com', '9876543210', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 13, 1),
(13, 7, 1, 81, 2, 81, 2, 81, 'PNR325UK8ME', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 100.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-02 13:15:19', 81, 'Raja', 'raja@mail.com', '9876543210', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 12, 1),
(14, 8, 0, 79, 1, 101, 1, 79, 'PNR01CP9JKQ', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:05:57', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 14, 1),
(15, 9, 0, 79, 1, 101, 1, 79, 'PNR743SOIAF', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:09:05', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 15, 1),
(16, 10, 0, 79, 1, 101, 1, 79, 'PNR707HTBGF', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:22:16', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 16, 1),
(17, 11, 0, 79, 1, 101, 1, 79, 'PNR48MIWVIB', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 3, 'SINQUERIM', 'BUS STAND', '2018-12-14 16:24:56', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 17, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_category`
--

CREATE TABLE IF NOT EXISTS `trip_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img_name` varchar(200) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_category`
--

INSERT INTO `trip_category` (`id`, `name`, `img_name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 'Attraction Visit', 'india-travel-sm.jpg', '2018-07-28 11:48:01', 0, '0000-00-00 00:00:00', 0, 1),
(6, 'Boating', 'boat0-sm.jpg', '2018-07-28 12:57:46', 0, '0000-00-00 00:00:00', 0, 1),
(7, 'Cycling', 'cycling-travel-experience1-sm.jpg', '2018-07-28 14:30:07', 0, '0000-00-00 00:00:00', 0, 1),
(8, 'Wildlife', 'tigres-blancs-guillaume-bonnaud-sm.jpg', '2018-07-28 14:42:43', 0, '0000-00-00 00:00:00', 0, 1),
(9, 'Trekking', 'Trekking-sm.jpg', '2018-07-28 18:09:26', 0, '0000-00-00 00:00:00', 0, 1),
(10, 'Rafting', 'River-Rafting-at-Beas-river-Kullu-Manali-himachal-pradesh-himalayas-travelhi5-sm.jpg', '2018-08-22 06:28:00', 0, '0000-00-00 00:00:00', 0, 1),
(11, 'Camping', 'ti_725_69592403632641-sm.jpg', '2018-08-22 06:28:00', 0, '0000-00-00 00:00:00', 0, 1),
(12, 'Walking', 'trekking-india-1402309802-sm.jpg', '2018-08-22 06:28:18', 0, '0000-00-00 00:00:00', 0, 1),
(13, 'Water Rides', 'ws.jpg', '2018-08-22 06:28:18', 0, '0000-00-00 00:00:00', 0, 1),
(14, 'Sightseeing', NULL, '2018-09-20 09:22:20', 3, '0000-00-00 00:00:00', 0, 1),
(15, 'Boat Trips', NULL, '2018-10-14 07:36:42', 3, '0000-00-00 00:00:00', 0, 1),
(16, 'MURDESHWAR', NULL, '2018-11-10 06:35:15', 57, '0000-00-00 00:00:00', 0, 1),
(17, 'TRANSFERS', NULL, '2018-11-20 08:05:17', 80, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_comment`
--

CREATE TABLE IF NOT EXISTS `trip_comment` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `message` tinytext NOT NULL,
  `rating` int(1) NOT NULL DEFAULT '0',
  `isactive` int(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip_gallery`
--

CREATE TABLE IF NOT EXISTS `trip_gallery` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_gallery`
--

INSERT INTO `trip_gallery` (`id`, `trip_id`, `file_name`, `isactive`) VALUES
(1, 6, '1543429916_handstand-544373_1920.jpg', 1),
(2, 5, '1543469096_Scenic_Fishing_Alaska_Crab_8_1024x1024.jpg', 1),
(3, 1, '1543469425_925692944s.jpg', 1),
(4, 1, '1543469430_DUDHSAGAR_(1).jpg', 1),
(5, 1, '1543469436_DUDHSAGAR_(3).jpg', 1),
(6, 11, '1543469547_Palolem_beach.jpg', 1),
(7, 11, '1543469554_palolem-beach.jpg', 1),
(8, 11, '1543469559_87700833-palolem-beach-south-goa-india-one-of-the-best-beaches-in-goa-colorful-beach-huts-and-palm-trees-on-t.jpg', 1),
(9, 9, '1543469722_medium_murdeshwar-shiv-temple_814.jpg', 1),
(10, 10, '1543469862_hampi.jpg', 1),
(11, 10, '1543469870_images_(34)_1509367239m.jpg', 1),
(12, 17, '1543470007_12dfb3b07020bbde2b44bec8b5459ab4.jpg', 1),
(13, 17, '1543470020_feature-image-ranthambore.png', 1),
(14, 17, '1543470022_jungle_safari_in_bandhavgarh.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_inclusions`
--

CREATE TABLE IF NOT EXISTS `trip_inclusions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_inclusions`
--

INSERT INTO `trip_inclusions` (`id`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 'Meals', '2018-08-01 02:59:11', 0, '0000-00-00 00:00:00', 0, 1),
(2, 'Transport', '2018-08-01 02:59:11', 0, '0000-00-00 00:00:00', 0, 1),
(3, 'Pick-Up & Drop', '2018-08-01 02:59:27', 0, '0000-00-00 00:00:00', 0, 1),
(4, 'Activities', '2018-08-01 02:59:27', 0, '0000-00-00 00:00:00', 0, 1),
(5, 'Guide', '2018-08-01 02:59:46', 0, '0000-00-00 00:00:00', 0, 1),
(6, 'Accommodation', '2018-08-01 02:59:46', 0, '0000-00-00 00:00:00', 0, 1),
(7, 'Round trip airfare', '2018-08-01 02:59:55', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_inclusions_map`
--

CREATE TABLE IF NOT EXISTS `trip_inclusions_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `inclusions_id` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_inclusions_map`
--

INSERT INTO `trip_inclusions_map` (`id`, `trip_id`, `inclusions_id`, `isactive`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 1, 5, 1),
(6, 2, 1, 0),
(7, 2, 2, 0),
(8, 2, 3, 0),
(9, 2, 4, 0),
(10, 2, 5, 0),
(11, 5, 1, 0),
(12, 5, 2, 0),
(13, 5, 3, 0),
(14, 5, 4, 0),
(15, 6, 1, 0),
(16, 6, 2, 0),
(17, 6, 3, 0),
(18, 6, 4, 0),
(19, 7, 2, 1),
(20, 8, 2, 0),
(21, 8, 2, 1),
(22, 5, 1, 0),
(23, 5, 2, 0),
(24, 5, 3, 0),
(25, 5, 4, 0),
(26, 5, 1, 0),
(27, 5, 2, 0),
(28, 5, 3, 0),
(29, 5, 4, 0),
(30, 9, 2, 0),
(31, 9, 3, 0),
(32, 9, 5, 0),
(33, 10, 2, 0),
(34, 10, 3, 0),
(35, 10, 5, 0),
(36, 9, 2, 0),
(37, 9, 3, 0),
(38, 9, 5, 0),
(39, 11, 1, 0),
(40, 11, 2, 0),
(41, 11, 3, 0),
(42, 12, 1, 0),
(43, 12, 2, 0),
(44, 12, 3, 0),
(45, 13, 2, 0),
(46, 13, 3, 0),
(47, 13, 5, 0),
(48, 14, 2, 0),
(49, 14, 3, 0),
(50, 14, 5, 0),
(51, 15, 1, 1),
(52, 15, 2, 1),
(53, 15, 3, 1),
(54, 15, 4, 1),
(55, 15, 5, 1),
(56, 16, 1, 0),
(57, 16, 2, 0),
(58, 16, 3, 0),
(59, 16, 4, 0),
(60, 5, 1, 0),
(61, 5, 2, 0),
(62, 5, 3, 0),
(63, 5, 4, 0),
(64, 5, 1, 0),
(65, 5, 2, 0),
(66, 5, 3, 0),
(67, 5, 4, 0),
(68, 6, 1, 0),
(69, 6, 2, 0),
(70, 6, 3, 0),
(71, 6, 4, 0),
(72, 2, 1, 0),
(73, 2, 2, 0),
(74, 2, 3, 0),
(75, 2, 4, 0),
(76, 2, 5, 0),
(77, 16, 1, 1),
(78, 16, 2, 1),
(79, 16, 3, 1),
(80, 16, 4, 1),
(81, 12, 1, 1),
(82, 12, 2, 1),
(83, 12, 3, 1),
(84, 13, 2, 1),
(85, 13, 3, 1),
(86, 13, 5, 1),
(87, 14, 2, 1),
(88, 14, 3, 1),
(89, 14, 5, 1),
(90, 17, 2, 0),
(91, 17, 3, 0),
(92, 17, 4, 0),
(93, 17, 5, 0),
(94, 17, 6, 0),
(95, 18, 2, 1),
(96, 18, 3, 1),
(97, 18, 4, 1),
(98, 18, 5, 1),
(99, 18, 6, 1),
(100, 6, 1, 0),
(101, 6, 2, 0),
(102, 6, 3, 0),
(103, 6, 4, 0),
(104, 6, 1, 1),
(105, 6, 2, 1),
(106, 6, 3, 1),
(107, 6, 4, 1),
(108, 5, 1, 0),
(109, 5, 2, 0),
(110, 5, 3, 0),
(111, 5, 4, 0),
(112, 5, 1, 1),
(113, 5, 2, 1),
(114, 5, 3, 1),
(115, 5, 4, 1),
(116, 11, 1, 1),
(117, 11, 2, 1),
(118, 11, 3, 1),
(119, 9, 2, 1),
(120, 9, 3, 1),
(121, 9, 5, 1),
(122, 10, 2, 1),
(123, 10, 3, 1),
(124, 10, 5, 1),
(125, 17, 2, 1),
(126, 17, 3, 1),
(127, 17, 4, 1),
(128, 17, 5, 1),
(129, 17, 6, 1),
(130, 2, 1, 0),
(131, 2, 2, 0),
(132, 2, 3, 0),
(133, 2, 4, 0),
(134, 2, 5, 0),
(135, 2, 1, 1),
(136, 2, 2, 1),
(137, 2, 3, 1),
(138, 2, 4, 1),
(139, 2, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_itinerary`
--

CREATE TABLE IF NOT EXISTS `trip_itinerary` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `from_time` varchar(150) NOT NULL,
  `to_time` varchar(150) NOT NULL,
  `short_description` tinytext NOT NULL,
  `brief_description` tinytext NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip_master`
--

CREATE TABLE IF NOT EXISTS `trip_master` (
  `id` int(11) NOT NULL,
  `trip_code` varchar(150) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_category_id` int(11) NOT NULL,
  `trip_name` varchar(200) NOT NULL,
  `trip_url` varchar(250) NOT NULL,
  `trip_img_name` varchar(200) NOT NULL,
  `parent_trip_id` int(11) NOT NULL DEFAULT '0',
  `address1` varchar(150) DEFAULT NULL,
  `address2` int(150) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `price_to_adult` float NOT NULL,
  `price_to_child` float NOT NULL,
  `price_to_infan` float NOT NULL,
  `trip_duration` int(1) NOT NULL COMMENT '1 - Hours / minutes, 2 - Day / hours',
  `how_many_days` int(2) NOT NULL DEFAULT '0',
  `how_many_nights` int(2) NOT NULL DEFAULT '0',
  `total_days` int(3) NOT NULL DEFAULT '0',
  `how_many_time` int(2) NOT NULL DEFAULT '0',
  `how_many_hours` int(2) NOT NULL DEFAULT '0',
  `brief_description` longtext,
  `other_inclusions` text,
  `exclusions` text,
  `languages` tinytext,
  `meal` tinytext,
  `transport` text,
  `things_to_carry` text,
  `advisory` text,
  `tour_type` tinytext,
  `cancellation_policy` text,
  `confirmation_policy` text,
  `refund_policy` text,
  `meeting_point` varchar(150) NOT NULL,
  `meeting_time` varchar(100) NOT NULL,
  `no_of_traveller` int(5) NOT NULL DEFAULT '0',
  `no_of_min_booktraveller` int(3) NOT NULL DEFAULT '0',
  `no_of_max_booktraveller` int(3) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '0-Closed, 1 - Open',
  `is_terms_accpet` int(1) NOT NULL DEFAULT '0',
  `booking_cut_of_time_type` int(1) NOT NULL DEFAULT '0' COMMENT '1 - Days /  2 -Hours',
  `booking_cut_of_day` int(5) NOT NULL,
  `booking_cut_of_time` int(5) NOT NULL,
  `booking_max_cut_of_month` int(5) NOT NULL DEFAULT '12',
  `is_shared` int(1) NOT NULL DEFAULT '0' COMMENT '0- non shared, 1 - shared',
  `trip_shared_id` int(11) NOT NULL DEFAULT '0',
  `total_rating` float(2,1) NOT NULL DEFAULT '0.0',
  `total_booking` int(11) unsigned NOT NULL DEFAULT '0',
  `view_to` int(1) DEFAULT '1' COMMENT '1- Customer & Vendor,2-Vendor',
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_master`
--

INSERT INTO `trip_master` (`id`, `trip_code`, `user_id`, `trip_category_id`, `trip_name`, `trip_url`, `trip_img_name`, `parent_trip_id`, `address1`, `address2`, `city_id`, `state_id`, `country_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `trip_duration`, `how_many_days`, `how_many_nights`, `total_days`, `how_many_time`, `how_many_hours`, `brief_description`, `other_inclusions`, `exclusions`, `languages`, `meal`, `transport`, `things_to_carry`, `advisory`, `tour_type`, `cancellation_policy`, `confirmation_policy`, `refund_policy`, `meeting_point`, `meeting_time`, `no_of_traveller`, `no_of_min_booktraveller`, `no_of_max_booktraveller`, `status`, `is_terms_accpet`, `booking_cut_of_time_type`, `booking_cut_of_day`, `booking_cut_of_time`, `booking_max_cut_of_month`, `is_shared`, `trip_shared_id`, `total_rating`, `total_booking`, `view_to`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'TRIPyb7ZpaY', 79, 14, 'WATERFALLS (R)', 'waterfalls-r', '1543469425_925692944s.jpg', 0, NULL, NULL, 7, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES DUDHSAGAR WATERFALLS, JEEP SAFARI, ENTRY FEES, LIFE JACKETS. IT ALSO INCLUDES ENTRY TO THE SPICE PLANTATION, ITS TOUR AND LUNCH AT THE PLANTATION. AFTER THAT YOU VISIT THE OLD GOA CHURCH AND THE TEMPLE.', 'AC TRANSFERS&lt;br&gt;JEEP SAFARI,&lt;br&gt;ENTRY FEES&lt;br&gt;LUNCH&lt;br&gt;SPICE PLANTATION TOUR', 'ANY EXPENSES WHICH NOT MENTIONED IN INCLUSIONS', '', 'VEG AND NON VEG', 'IT IS GROUP TOUR BY AN AIR CONDITIONED VEHICLE. BUT THE JEEP AT THE WATERFALLS IS NOT AIR CONDITIONED.', NULL, NULL, NULL, '100% IF CANCELLED 5 DAYS BEFORE&lt;br&gt;50% BETWEEN 5-2 DAYS&lt;br&gt;0 % IF CANCELLED IN 2 DAYS BEFORE&amp;nbsp;', 'ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '05:45', 20, 1, 10, 1, 1, 2, 0, 10, 1, 0, 0, 0.0, 1, 2, 1, '2018-11-16 09:54:00', 79, '2018-12-01 05:43:28', 79),
(2, 'TRIPB3ZP4dW', 81, 14, 'WATERFALLS (R)', 'waterfalls-r', '', 1, NULL, NULL, 7, 2, 0, 2000, 2000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES DUDHSAGAR WATERFALLS, JEEP SAFARI, ENTRY FEES, LIFE JACKETS. IT ALSO INCLUDES ENTRY TO THE SPICE PLANTATION, ITS TOUR AND LUNCH AT THE PLANTATION. AFTER THAT YOU VISIT THE OLD GOA CHURCH AND THE TEMPLE.', 'AC TRANSFERS&lt;br&gt;JEEP SAFARI,&lt;br&gt;ENTRY FEES&lt;br&gt;LUNCH&lt;br&gt;SPICE PLANTATION TOUR', 'ANY EXPENSES WHICH NOT MENTIONED IN INCLUSIONS', '', 'VEG AND NON VEG', 'IT IS GROUP TOUR BY AN AIR CONDITIONED VEHICLE. BUT THE JEEP AT THE WATERFALLS IS NOT AIR CONDITIONED.', NULL, NULL, NULL, '100% IF CANCELLED 5 DAYS BEFORE&lt;br&gt;50% BETWEEN 5-2 DAYS&lt;br&gt;0 % IF CANCELLED IN 2 DAYS BEFORE&amp;nbsp;', 'ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'DELPHINO CANDOLIM', '06:00', 20, 1, 10, 1, 1, 2, 0, 10, 1, 0, 1, 0.0, 18, 1, 1, '2018-11-16 10:10:37', 81, '2018-12-01 05:54:18', 81),
(3, 'TRIPQysIwpd', 80, 13, 'RAFTING', 'rafting', '', 0, NULL, NULL, 7, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 8, 'IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 2 DAYS BEFORE&lt;br&gt;0% 1 DAY BEFORE', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '07:00', 7, 1, 7, 1, 1, 1, 1, 0, 12, 0, 0, 0.0, 1, 2, 1, '2018-11-16 14:40:41', 80, '0000-00-00 00:00:00', 0),
(4, 'TRIP3YKwgtQ', 81, 13, 'RAFTING', 'rafting', '', 3, NULL, NULL, 7, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 8, 'IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 2 DAYS BEFORE&lt;br&gt;0% 1 DAY BEFORE', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '06:45', 7, 1, 7, 1, 1, 1, 0, 0, 12, 0, 2, 0.0, 13, 1, 1, '2018-11-16 14:55:37', 81, '2018-11-27 06:52:05', 81),
(5, 'TRIPOhVNBAC', 79, 6, 'CRAB CATCHING', 'crab-catching', '1543469096_Scenic_Fishing_Alaska_Crab_8_1024x1024.jpg', 0, NULL, NULL, 8, 2, 0, 2500, 2500, 0, 1, 0, 0, 0, 0, 5, 'THIS TRIP IS BEAUTIFUL BOAT TRIP. YOU CAN CATCH CRABS. AFTER THAT PROCEED FOR DINNER. THIS INCLUDES THE DRINKS ON THE BOAT. YOU WILL BE PICK UP FROM YOUR HOTEL AND DROPPED BACK AT THE SAME PLACE AFTER THE TRIP.&amp;nbsp;', 'DINNER AND DRINKS ON BOAT', 'DRINKS AT THE RESTAURANT AT DINNER.', '', 'DINNER', 'TRANSFERS, &lt;br&gt;BOAT CHARGE, &lt;br&gt;DINNER&amp;nbsp;&lt;br&gt;DRINKS ON THE BOAT&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS GROUP TOUR.', '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 3 DAYS BEFORE&lt;br&gt;0% 2 DAY BEFORE', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS.', 'CANDOLIM', '15:00', 10, 1, 10, 1, 1, 2, 0, 4, 12, 0, 0, 0.0, 0, 2, 1, '2018-11-19 16:10:31', 79, '2018-11-29 05:27:57', 79),
(6, 'TRIPX6IgUQf', 81, 6, 'CRAB CATCHING', 'crab-catching', '1543429916_handstand-544373_1920.jpg', 5, NULL, NULL, 8, 2, 0, 1500, 1500, 0, 1, 0, 0, 0, 0, 5, 'THIS TRIP IS BEAUTIFUL BOAT TRIP. YOU CAN CATCH CRABS. AFTER THAT PROCEED FOR DINNER. THIS INLCUDES THE DRINKS ON THE BOAT.', 'DINNER AND DRINKS ON BOAT', NULL, '', 'VEG AND NON VEG', 'TRANSFERS, BOAT CHARGE, DINNER&amp;nbsp;', NULL, NULL, 'THIS IS GROUP TOUR.', '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 3 DAYS BEFORE&lt;br&gt;0% 2 DAY BEFORE', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS.', 'CANDOLIM', '15:00', 10, 1, 5, 1, 1, 2, 0, 4, 12, 0, 3, 0.0, 0, 1, 1, '2018-11-19 16:36:23', 81, '2018-11-28 18:32:00', 81),
(7, 'TRIPuNaDr56', 80, 17, 'AIRPORT TRANSFER', 'airport-transfer', '', 0, NULL, NULL, 7, 2, 0, 300, 300, 0, 1, 0, 0, 0, 0, 1, 'THIS IS A DROP TO THE AIRPORT EVERY DAY AT 5:00HRS, 10:00 HRS, 15:00 HRS', NULL, NULL, '', '', 'INCLUDES ONLY THE TRANSPORT', NULL, NULL, 'THIS IS A GROUP TRANSFER', '100% 5 DAYS BEFORE&lt;br&gt;50% 5-3 DAYS BEFORE&lt;br&gt;0% WITHIN 2 DAYS', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '05:00', 40, 1, 10, 1, 1, 2, 0, 2, 1, 0, 0, 0.0, 0, 2, 1, '2018-11-20 08:05:17', 80, '0000-00-00 00:00:00', 0),
(8, 'TRIPF6uRheb', 3, 17, 'AIRPORT TRANSFER', 'airport-transfer', '', 7, NULL, NULL, 7, 2, 0, 350, 350, 0, 1, 0, 0, 0, 0, 1, 'THIS IS A DROP TO THE AIRPORT EVERY DAY AT 5:00HRS, 10:00 HRS, 15:00 HRS', NULL, NULL, '', '', 'INCLUDES ONLY THE TRANSPORT', NULL, NULL, 'THIS IS A GROUP TRANSFER', '100% 5 DAYS BEFORE&lt;br&gt;50% 5-3 DAYS BEFORE&lt;br&gt;0% WITHIN 2 DAYS', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'calangute', '05:05', 40, 1, 10, 1, 1, 2, 0, 2, 1, 0, 10, 0.0, 5, 1, 1, '2018-11-23 08:56:31', 3, '2018-11-23 08:57:06', 3),
(9, 'TRIPw2JaE8v', 79, 14, 'MURDESHWAR (R)', 'murdeshwar', '1543469722_medium_murdeshwar-shiv-temple_814.jpg', 0, NULL, NULL, 8, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 14, 'IN THIS TRIP IT IS VISIT TO MURDESHWAR TEMPLE OF LORD SHIVA. IN THAT TRIP YOU VISIT THE GOKARNA TEMPLE AND THE OM BEACH.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS&lt;br&gt;BREAKFAST&lt;br&gt;ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0 % IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '4:45', 20, 1, 5, 1, 1, 2, 0, 10, 1, 0, 0, 0.0, 0, 2, 1, '2018-11-23 14:14:13', 79, '2018-11-29 05:35:45', 79),
(10, 'TRIP9JElZfK', 79, 14, '1 NIGHT HAMPI (R)', '1-night-hampi-r', '1543469862_hampi.jpg', 0, NULL, NULL, 7, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'TRIP TO HAMPI WITH A GUIDE AND VISIT ALL THE ARCHEALOGICAL SITES. THIS IS A 1 NIGHT AND 2 DAYS TRIP IN A GROUP.', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMMODATION&lt;br&gt;ALL ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0% IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESS IN 5 WORKING DAYS', 'CANDOLIM', '5:00', 20, 1, 10, 1, 1, 2, 0, 10, 1, 0, 0, 0.0, 3, 2, 1, '2018-11-23 14:34:34', 79, '2018-11-29 05:38:00', 79),
(11, 'TRIPwAaZ6tO', 79, 14, 'SOUTH GOA (R)', 'south-goa-r', '1543469547_Palolem_beach.jpg', 0, NULL, NULL, 8, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 12, 'THIS IS TRIP FOR SOUTH GOA PLACES - PALOLEM BEACH, AGONDA BEACH, CABO DE RAMA FORT, BOAT RIDE TO VISIT THE BUTTERFLY ISLAND AND INCLUDES LUNCH.', NULL, NULL, '', 'LUNCH', 'ALL TRANSFER,&lt;br&gt;LUNCH,&lt;br&gt;BOAT RIDE', NULL, NULL, 'THIS IS GROUP TOUR', '100% REFUND ON CANCELLATION BEFORE 5 DAYS&lt;br&gt;50% REFUND ON CANCELLATION BEFORE 3 DAYS&lt;br&gt;0% REFUND ON CANCELLATION BEFORE 2 DAYS&lt;br&gt;', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESS WITHIN 5 WORKING DAYS', 'CALANGUTE', '8:30', 20, 1, 10, 1, 1, 2, 0, 12, 12, 0, 0, 0.0, 0, 2, 1, '2018-11-23 14:48:57', 79, '2018-11-29 05:32:45', 79),
(12, 'TRIPev2nutW', 81, 14, 'SOUTH GOA (R)', 'south-goa-r', '', 11, NULL, NULL, 8, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 12, 'THIS IS TRIP FOR SOUTH GOA PLACES - PALOLEM BEACH, AGONDA BEACH, CABO DE RAMA FORT, BOAT RIDE TO VISIT THE BUTTERFLY ISLAND AND INCLUDES LUNCH.', NULL, NULL, '', 'LUNCH', 'ALL TRANSFER,&lt;br&gt;LUNCH,&lt;br&gt;BOAT RIDE', NULL, NULL, 'THIS IS GROUP TOUR', '100% REFUND ON CANCELLATION BEFORE 5 DAYS&lt;br&gt;50% REFUND ON CANCELLATION BEFORE 3 DAYS&lt;br&gt;0% REFUND ON CANCELLATION BEFORE 2 DAYS&lt;br&gt;', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESS WITHIN 5 WORKING DAYS', 'CANDOLIM', '8:30', 20, 1, 10, 1, 1, 2, 0, 12, 12, 0, 11, 0.0, 0, 1, 1, '2018-11-23 15:48:23', 81, '2018-11-26 09:21:03', 81),
(13, 'TRIPSq7bUTr', 81, 14, 'MURDESHWAR (R)', 'murdeshwar-r', '', 9, NULL, NULL, 8, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 14, 'IN THIS TRIP IT IS VISIT TO MURDESHWAR TEMPLE OF LORD SHIVA. IN THAT TRIP YOU VISIT THE GOKARNA TEMPLE AND THE OM BEACH.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS&lt;br&gt;BREAKFAST&lt;br&gt;ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0 % IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '4:45', 20, 1, 5, 1, 1, 2, 0, 10, 1, 0, 12, 0.0, 1, 1, 1, '2018-11-23 15:50:59', 81, '2018-11-26 09:25:42', 81),
(14, 'TRIPmoEOUez', 81, 14, '1 NIGHT HAMPI (R)', '1-night-hampi-r', '', 10, NULL, NULL, 7, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'TRIP TO HAMPI WITH A GUIDE AND VISIT ALL THE ARCHEALOGICAL SITES. THIS IS A 1 NIGHT AND 2 DAYS TRIP IN A GROUP.', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMMODATION&lt;br&gt;ALL ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0% IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESS IN 5 WORKING DAYS', 'CANDOLIM', '5:00', 20, 1, 10, 1, 1, 2, 0, 10, 1, 0, 13, 0.0, 0, 1, 1, '2018-11-23 16:01:16', 81, '2018-11-26 09:27:17', 81),
(15, 'TRIP8ueGZmL', 91, 14, 'WATERFALLS (R)', 'waterfalls-r', '', 1, NULL, NULL, 7, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES DUDHSAGAR WATERFALLS, JEEP SAFARI, ENTRY FEES, LIFE JACKETS. IT ALSO INCLUDES ENTRY TO THE SPICE PLANTATION, ITS TOUR AND LUNCH AT THE PLANTATION. AFTER THAT YOU VISIT THE OLD GOA CHURCH AND THE TEMPLE.', 'AC TRANSFERS&lt;br&gt;JEEP SAFARI,&lt;br&gt;ENTRY FEES&lt;br&gt;LUNCH&lt;br&gt;SPICE PLANTATION TOUR', 'ANY EXPENSES WHICH NOT MENTIONED IN INCLUSIONS', '', 'VEG AND NON VEG', 'IT IS GROUP TOUR BY AN AIR CONDITIONED VEHICLE. BUT THE JEEP AT THE WATERFALLS IS NOT AIR CONDITIONED.', NULL, NULL, NULL, '100% IF CANCELLED 5 DAYS BEFORE&lt;br&gt;50% BETWEEN 5-2 DAYS&lt;br&gt;0 % IF CANCELLED IN 2 DAYS BEFORE&amp;nbsp;', 'ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'BAGA', '05:45', 20, 1, 10, 1, 1, 2, 0, 10, 1, 1, 15, 0.0, 0, 2, 1, '2018-11-24 10:02:59', 91, '0000-00-00 00:00:00', 0),
(16, 'TRIPb0BK5Xh', 81, 6, 'CRAB CATCHING', 'crab-catching', '', 5, NULL, NULL, 8, 2, 0, 2500, 2500, 0, 1, 0, 0, 0, 0, 5, 'THIS TRIP IS BEAUTIFUL BOAT TRIP. YOU CAN CATCH CRABS. AFTER THAT PROCEED FOR DINNER. THIS INCLUDES THE DRINKS ON THE BOAT. YOU WILL BE PICK UP FROM YOUR HOTEL AND DROPPED BACK AT THE SAME PLACE AFTER THE TRIP.&amp;nbsp;', 'DINNER AND DRINKS ON BOAT', 'DRINKS AT THE RESTAURANT AT DINNER.', '', 'DINNER', 'TRANSFERS, &lt;br&gt;BOAT CHARGE, &lt;br&gt;DINNER&amp;nbsp;&lt;br&gt;DRINKS ON THE BOAT&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS GROUP TOUR.', '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 3 DAYS BEFORE&lt;br&gt;0% 2 DAY BEFORE', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS.', 'CANDOLIM', '15:30', 10, 1, 10, 1, 1, 2, 0, 4, 12, 0, 20, 0.0, 0, 1, 1, '2018-11-24 11:25:28', 81, '2018-11-26 09:20:32', 81),
(17, 'TRIPYZwVWzL', 79, 8, 'TIGER TRIP', 'tiger-trip', '1543470007_12dfb3b07020bbde2b44bec8b5459ab4.jpg', 0, NULL, NULL, 8, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'THIS IS A TRIP TO THE TIGER RESERVE NEAR SHIMOGA. WE ALSO VISIT THE ELEPHANT TRAINING CAMP.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMODATION&emsp;&lt;br&gt;ENTRY FEES', NULL, NULL, NULL, '100% REFUND IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% REFUND IF CANCELLED BEFORE 2 DAYS&lt;br&gt;0% REFUND IF CANCELLED IN LESS THAN 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 DAYS', 'CANDOLIM', '05:00', 15, 1, 10, 1, 1, 2, 0, 10, 12, 0, 0, 0.0, 0, 2, 1, '2018-11-26 11:56:15', 79, '2018-11-29 05:40:31', 79),
(18, 'TRIPdstVNLg', 81, 8, 'TIGER TRIP', 'tiger-trip', '', 17, NULL, NULL, 8, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'THIS IS A TRIP TO THE TIGER RESERVE NEAR SHIMOGA. WE ALSO VISIT THE ELEPHANT TRAINING CAMP.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMODATION&emsp;&lt;br&gt;ENTRY FEES', NULL, NULL, NULL, '100% REFUND IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% REFUND IF CANCELLED BEFORE 2 DAYS&lt;br&gt;0% REFUND IF CANCELLED IN LESS THAN 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 DAYS', 'CANDOLIM', '05:00', 15, 1, 10, 1, 1, 2, 0, 10, 12, 1, 21, 0.0, 2, 2, 1, '2018-11-26 12:11:30', 81, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trip_shared`
--

CREATE TABLE IF NOT EXISTS `trip_shared` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `shared_user_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `to_user_mail` varchar(150) DEFAULT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 - new, 2- maked, 3 - cancelled',
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_shared`
--

INSERT INTO `trip_shared` (`id`, `code`, `trip_id`, `shared_user_id`, `user_id`, `to_user_mail`, `coupon_history_id`, `status`, `isactive`) VALUES
(1, 'SHAREBDsE2', 1, 79, 81, '', 1, 2, 1),
(2, 'SHAREVp2Lk', 3, 80, 81, NULL, 2, 2, 1),
(3, 'SHARE7mGk3', 5, 79, 81, NULL, 3, 2, 1),
(4, 'SHAREZxMac', 7, 80, 81, NULL, 4, 3, 1),
(5, 'SHAREtCyV4', 6, 81, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(6, 'SHAREB1Dyl', 7, 80, 81, NULL, 4, 1, 1),
(7, 'SHAREUvn0d', 6, 81, 80, NULL, 5, 1, 1),
(8, 'SHARESupqV', 2, 81, NULL, 'anjaneyavadivel@gmail.com', 6, 1, 1),
(9, 'SHAREeswW6', 7, 80, NULL, 'vinishthomas@gmail.com', 4, 1, 1),
(10, 'SHARE9rAs1', 7, 80, 3, NULL, 0, 2, 1),
(11, 'SHARE3oT5x', 11, 79, 81, NULL, 10, 2, 1),
(12, 'SHAREuAvhM', 9, 79, 81, NULL, 7, 2, 1),
(13, 'SHARECq0mZ', 10, 79, 81, NULL, 8, 2, 1),
(14, 'SHARE92kXO', 1, 79, NULL, 'vinishthomas@gmail.com', 1, 3, 1),
(15, 'SHAREfi8RX', 1, 79, 91, NULL, 1, 2, 1),
(16, 'SHAREEUTVF', 9, 79, 91, NULL, 7, 1, 1),
(17, 'SHAREbYTOR', 10, 79, 91, NULL, 8, 1, 1),
(18, 'SHAREGKEot', 11, 79, 91, NULL, 10, 1, 1),
(19, 'SHAREeMglr', 5, 79, 91, NULL, 3, 1, 1),
(20, 'SHAREZg2Y0', 5, 79, 81, NULL, 3, 2, 1),
(21, 'SHAREKweJR', 17, 79, 81, NULL, 11, 2, 1),
(22, 'SHARE0YvWa', 17, 79, 100, '', 0, 1, 1),
(23, 'SHAREMHeS4', 17, 79, 100, '', 0, 1, 1),
(24, 'SHAREIbm4q', 17, 79, 100, '', 1, 3, 1),
(25, 'SHAREPXrmj', 17, 79, 91, NULL, 1, 1, 1),
(26, 'SHARERdvkQ', 17, 79, NULL, 'info@atlantiswatersports.com', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_specific_day`
--

CREATE TABLE IF NOT EXISTS `trip_specific_day` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0' COMMENT '1 - Set Offer Specific Day, 2 - Set Trip Close Specific Day',
  `title` varchar(250) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `no_of_traveller` int(5) NOT NULL,
  `no_of_min_booktraveller` int(5) NOT NULL,
  `no_of_max_booktraveller` int(5) NOT NULL,
  `offer_type` int(2) NOT NULL DEFAULT '0' COMMENT '1 - Fixed / 2 -Percentage',
  `price_to_adult` float(8,2) NOT NULL,
  `price_to_child` float(8,2) NOT NULL,
  `price_to_infan` float(8,2) NOT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_specific_day`
--

INSERT INTO `trip_specific_day` (`id`, `trip_id`, `type`, `title`, `from_date`, `to_date`, `no_of_traveller`, `no_of_min_booktraveller`, `no_of_max_booktraveller`, `offer_type`, `price_to_adult`, `price_to_child`, `price_to_infan`, `isactive`) VALUES
(1, 13, 3, 'Add trip', '2018-12-01', '2018-12-01', 20, 1, 5, 0, 0.00, 0.00, 0.00, 1),
(2, 9, 3, 'Extra Trip', '2018-12-07', '2018-12-07', 20, 1, 5, 0, 0.00, 0.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_tags`
--

CREATE TABLE IF NOT EXISTS `trip_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_tags`
--

INSERT INTO `trip_tags` (`id`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 'Sightseeing', '2018-07-28 07:14:30', 0, '0000-00-00 00:00:00', 0, 1),
(2, 'Adventure', '2018-07-28 07:14:30', 0, '0000-00-00 00:00:00', 0, 1),
(3, 'Day Outs', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(4, 'Cruises & Sailing', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(5, 'Nature and Wildlife', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(6, 'Arts & Culture', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(7, 'Couples & Romance', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(8, 'Water Sports', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(9, 'Food & Drinks', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(10, 'Walking & Biking', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(11, 'Workshops & Classes', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(12, 'Theme Parks', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(13, 'Luxury & Exclusive', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(14, 'Shopping', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(15, 'Transfers', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(16, 'Events', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(17, 'Places To Stay In', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1),
(18, ' adventure', '2018-08-23 09:11:10', 3, '0000-00-00 00:00:00', 0, 1),
(19, ' nature and wildlife', '2018-08-23 09:11:10', 3, '0000-00-00 00:00:00', 0, 1),
(20, ' Boating', '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0, 1),
(21, ' fishing', '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0, 1),
(22, ' dolphin', '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0, 1),
(23, ' snoerkling', '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0, 1),
(24, 'Diving', '2018-10-05 06:48:00', 3, '0000-00-00 00:00:00', 0, 1),
(25, 'boating', '2018-10-14 07:36:42', 3, '0000-00-00 00:00:00', 0, 1),
(26, 'Rafting', '2018-10-15 09:43:01', 3, '0000-00-00 00:00:00', 0, 1),
(27, '  adventure', '2018-10-31 07:55:55', 57, '0000-00-00 00:00:00', 0, 1),
(28, '   adventure', '2018-10-31 08:38:57', 57, '0000-00-00 00:00:00', 0, 1),
(29, '    adventure', '2018-10-31 08:41:20', 57, '0000-00-00 00:00:00', 0, 1),
(30, 'MURDESHWAR', '2018-11-10 06:35:15', 57, '0000-00-00 00:00:00', 0, 1),
(31, ' TEMPLE', '2018-11-10 06:35:15', 57, '0000-00-00 00:00:00', 0, 1),
(32, '  TEMPLE', '2018-11-10 13:34:34', 57, '0000-00-00 00:00:00', 0, 1),
(33, '   TEMPLE', '2018-11-10 13:37:06', 57, '0000-00-00 00:00:00', 0, 1),
(34, '    TEMPLE', '2018-11-10 13:44:05', 3, '0000-00-00 00:00:00', 0, 1),
(35, '     TEMPLE', '2018-11-10 13:55:59', 3, '0000-00-00 00:00:00', 0, 1),
(36, ' TREKING', '2018-11-16 09:54:00', 79, '0000-00-00 00:00:00', 0, 1),
(37, '  TREKING', '2018-11-16 10:10:37', 81, '0000-00-00 00:00:00', 0, 1),
(38, ' CRAB CATCHING', '2018-11-19 16:10:31', 79, '0000-00-00 00:00:00', 0, 1),
(39, '  CRAB CATCHING', '2018-11-19 16:36:23', 81, '0000-00-00 00:00:00', 0, 1),
(40, '   TREKING', '2018-11-23 13:42:15', 79, '0000-00-00 00:00:00', 0, 1),
(41, '   CRAB CATCHING', '2018-11-23 13:44:16', 79, '0000-00-00 00:00:00', 0, 1),
(42, ' MONUMENTS', '2018-11-23 14:34:34', 79, '0000-00-00 00:00:00', 0, 1),
(43, ' BEACHS', '2018-11-23 14:48:57', 79, '0000-00-00 00:00:00', 0, 1),
(44, '  BEACHS', '2018-11-23 15:48:23', 81, '0000-00-00 00:00:00', 0, 1),
(45, '  MONUMENTS', '2018-11-23 16:01:16', 81, '0000-00-00 00:00:00', 0, 1),
(46, '    CRAB CATCHING', '2018-11-24 11:25:28', 81, '0000-00-00 00:00:00', 0, 1),
(47, '     adventure', '2018-11-25 15:14:32', 79, '0000-00-00 00:00:00', 0, 1),
(48, '     CRAB CATCHING', '2018-11-25 15:14:32', 79, '0000-00-00 00:00:00', 0, 1),
(49, '   BEACHS', '2018-11-26 09:21:03', 81, '0000-00-00 00:00:00', 0, 1),
(50, ' murdeshwar', '2018-11-26 09:25:42', 81, '0000-00-00 00:00:00', 0, 1),
(51, ' HAMPI', '2018-11-26 09:27:17', 81, '0000-00-00 00:00:00', 0, 1),
(52, ' TIGER', '2018-11-26 11:56:15', 79, '0000-00-00 00:00:00', 0, 1),
(53, '  TIGER', '2018-11-26 12:11:30', 81, '0000-00-00 00:00:00', 0, 1),
(54, '      adventure', '2018-11-29 05:23:57', 79, '0000-00-00 00:00:00', 0, 1),
(55, '      CRAB CATCHING', '2018-11-29 05:23:57', 79, '0000-00-00 00:00:00', 0, 1),
(56, '       adventure', '2018-11-29 05:27:57', 79, '0000-00-00 00:00:00', 0, 1),
(57, '       CRAB CATCHING', '2018-11-29 05:27:57', 79, '0000-00-00 00:00:00', 0, 1),
(58, '    TREKING', '2018-11-29 05:30:42', 79, '0000-00-00 00:00:00', 0, 1),
(59, '     TREKING', '2018-12-01 05:43:28', 79, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_tag_map`
--

CREATE TABLE IF NOT EXISTS `trip_tag_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_tag_map`
--

INSERT INTO `trip_tag_map` (`id`, `trip_id`, `tag_id`, `isactive`) VALUES
(1, 1, 1, 1),
(2, 1, 18, 0),
(3, 1, 36, 0),
(4, 2, 1, 1),
(5, 2, 27, 0),
(6, 2, 37, 0),
(7, 3, 2, 1),
(8, 4, 2, 1),
(9, 5, 25, 1),
(10, 5, 18, 0),
(11, 5, 38, 0),
(12, 6, 25, 1),
(13, 6, 27, 0),
(14, 6, 39, 0),
(15, 7, 15, 1),
(16, 8, 15, 1),
(17, 5, 27, 0),
(18, 5, 39, 0),
(19, 1, 27, 0),
(20, 1, 37, 0),
(21, 1, 28, 0),
(22, 1, 40, 0),
(23, 5, 28, 0),
(24, 5, 41, 0),
(25, 9, 1, 1),
(26, 10, 1, 1),
(27, 10, 42, 0),
(28, 11, 1, 1),
(29, 11, 43, 0),
(30, 12, 1, 1),
(31, 12, 44, 0),
(32, 13, 1, 1),
(33, 14, 1, 1),
(34, 14, 45, 0),
(35, 15, 1, 1),
(36, 16, 25, 1),
(37, 16, 29, 0),
(38, 16, 46, 0),
(39, 5, 29, 0),
(40, 5, 46, 0),
(41, 5, 47, 0),
(42, 5, 48, 0),
(43, 6, 28, 0),
(44, 6, 41, 0),
(45, 2, 28, 0),
(46, 2, 40, 0),
(47, 16, 47, 1),
(48, 16, 48, 1),
(49, 12, 49, 1),
(50, 13, 50, 1),
(51, 14, 42, 1),
(52, 14, 51, 1),
(53, 17, 5, 1),
(54, 17, 52, 0),
(55, 18, 5, 1),
(56, 18, 53, 1),
(57, 6, 29, 0),
(58, 6, 46, 0),
(59, 6, 47, 1),
(60, 6, 48, 1),
(61, 5, 54, 0),
(62, 5, 55, 0),
(63, 5, 56, 1),
(64, 5, 57, 1),
(65, 1, 29, 0),
(66, 1, 58, 0),
(67, 11, 44, 1),
(68, 10, 45, 1),
(69, 17, 53, 1),
(70, 1, 47, 1),
(71, 1, 59, 1),
(72, 2, 29, 0),
(73, 2, 58, 0),
(74, 2, 47, 1),
(75, 2, 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address1` varchar(150) NOT NULL,
  `address2` varchar(150) NOT NULL,
  `street` varchar(150) NOT NULL,
  `landmark` varchar(150) NOT NULL,
  `city_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `zip_code` int(8) NOT NULL,
  `country_id` int(11) NOT NULL,
  `is_primary` int(1) NOT NULL DEFAULT '0' COMMENT '0 - not primary, 1 - primary',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_bank_master`
--

CREATE TABLE IF NOT EXISTS `user_bank_master` (
  `bank_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bank_name` varchar(500) NOT NULL,
  `account_holder_name` varchar(700) NOT NULL,
  `account_number` varchar(200) NOT NULL,
  `ifsc_code` varchar(12) NOT NULL,
  `branch_name` varchar(250) NOT NULL,
  `address` text,
  `is_primary` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1->primary,',
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `added_by` int(11) NOT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `bank_master_status` int(11) NOT NULL DEFAULT '1' COMMENT '1->active,0->de active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE IF NOT EXISTS `user_master` (
  `id` int(11) NOT NULL,
  `user_type` varchar(2) NOT NULL DEFAULT 'CU' COMMENT 'SA - super admin, VA - Vendor, CU - Customer, GU - Guest, OB - Office booking',
  `email` varchar(60) DEFAULT NULL,
  `password` varchar(300) NOT NULL,
  `user_fullname` varchar(250) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(1) DEFAULT NULL COMMENT '1->male,2->female',
  `phone` varchar(10) DEFAULT NULL,
  `alt_phone` varchar(10) DEFAULT NULL,
  `emergency_contact_person` varchar(250) DEFAULT NULL,
  `emergency_contact_no` varchar(10) DEFAULT NULL,
  `activation_code` varchar(250) DEFAULT NULL,
  `activation_code_time` timestamp NULL DEFAULT NULL,
  `about_me` text,
  `address` varchar(150) DEFAULT NULL,
  `zip_code` int(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `profile_pic` text,
  `balance_amt` float(8,2) NOT NULL,
  `unclear_amt` float(8,2) NOT NULL,
  `social_network` text,
  `auth_id` text,
  `login_via` tinyint(1) DEFAULT '1' COMMENT '1->login,2->fb,3->google',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` timestamp NULL DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0->de active, 1->active,2->not activated'
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_type`, `email`, `password`, `user_fullname`, `dob`, `gender`, `phone`, `alt_phone`, `emergency_contact_person`, `emergency_contact_no`, `activation_code`, `activation_code_time`, `about_me`, `address`, `zip_code`, `city`, `state`, `profile_pic`, `balance_amt`, `unclear_amt`, `social_network`, `auth_id`, `login_via`, `created_on`, `last_visit`, `isactive`) VALUES
(1, 'CU', 'customer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Customer', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(2, 'SA', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Admin', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 11770.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(3, 'VA', 'vendor@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor1', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(4, 'VA', 'vendor2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor2', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(16, 'CU', 'anjaneyavadivel@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Anjaneya vadivelu', NULL, NULL, NULL, NULL, NULL, NULL, '423749', '2018-11-12 04:23:32', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-20 12:40:25', '2018-09-20 12:40:58', 1),
(27, 'VA', 'vendor3@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor Three', NULL, NULL, NULL, NULL, NULL, NULL, 'c90b3169120e16506865bd2d22969dae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-01 08:38:56', NULL, 1),
(30, 'VA', 'vendor4@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Velappan Rekandi Jamnagarwala', NULL, NULL, '8887779994', NULL, NULL, NULL, '5fade682e4d9e5948476467f275d67c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-02 10:46:43', NULL, 1),
(56, 'VA', 'chaitesh@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, '1dfb89769e2da0a1fc38c5401b79a300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-30 14:35:54', NULL, 2),
(57, 'VA', 'v_inod_v@yahoo.com', '73812f2b9a460ff9b3873fbcf717b5f7', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 05:49:49', NULL, 1),
(76, 'VA', 'vinod@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'VINOD VELAPPAN', NULL, NULL, NULL, NULL, NULL, NULL, '1e8660445a37dce4eaba75f48281e3ab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-14 08:06:45', NULL, 2),
(79, 'VA', 'naikabhy@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Abhinay Naik', NULL, NULL, '9822124005', '', '', '', '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '1542989288.PNG', 20580.00, 0.00, NULL, NULL, 1, '2018-11-15 15:46:24', NULL, 1),
(80, 'VA', 'teambookyourtrips@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Team Bookyourtrips', NULL, NULL, '9822124005', NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-15 16:06:49', '2018-11-15 04:12:32', 1),
(81, 'VA', 'goahemtravels@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'HEM TRAVELS', NULL, NULL, '9822124005', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-16 10:02:34', '2018-11-16 10:05:06', 1),
(91, 'VA', 'avmtoursandtravels@gmail.com', 'aa4f3cf9f3944a475f7bdb712e3ec60b', 'AVM TOURS AND TRAVELS', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-24 09:51:35', '2018-11-24 09:52:00', 1),
(98, 'GU', 'gust@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Gust', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-26 17:13:05', NULL, 2),
(99, 'GU', 'karthikraja.ckr@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Karthi', NULL, NULL, '9942493382', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-30 17:11:06', NULL, 2),
(100, 'VA', 'sharukhkalas@gmail.com', 'bc415f1f176f92b96c90f1a59f97df28', 'Sharukh H Kalas', NULL, NULL, NULL, NULL, NULL, NULL, 'aab77b6f26a90003865005ae4bcd5787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-01 15:51:06', NULL, 2),
(101, 'GU', 'anjaneya.developer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Jaky', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-14 16:05:56', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE IF NOT EXISTS `user_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_info`
--
ALTER TABLE `account_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city_master`
--
ALTER TABLE `city_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_master`
--
ALTER TABLE `country_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code_master`
--
ALTER TABLE `coupon_code_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon_code_master_history`
--
ALTER TABLE `coupon_code_master_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_master`
--
ALTER TABLE `faq_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_transaction`
--
ALTER TABLE `my_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_up_location`
--
ALTER TABLE `pick_up_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pick_up_location_map`
--
ALTER TABLE `pick_up_location_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_master`
--
ALTER TABLE `state_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_avilable`
--
ALTER TABLE `trip_avilable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_book_pay`
--
ALTER TABLE `trip_book_pay`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_book_pay_details`
--
ALTER TABLE `trip_book_pay_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_category`
--
ALTER TABLE `trip_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_comment`
--
ALTER TABLE `trip_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_inclusions`
--
ALTER TABLE `trip_inclusions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_inclusions_map`
--
ALTER TABLE `trip_inclusions_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_itinerary`
--
ALTER TABLE `trip_itinerary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_master`
--
ALTER TABLE `trip_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_shared`
--
ALTER TABLE `trip_shared`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_specific_day`
--
ALTER TABLE `trip_specific_day`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_tags`
--
ALTER TABLE `trip_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_tag_map`
--
ALTER TABLE `trip_tag_map`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_bank_master`
--
ALTER TABLE `user_bank_master`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_info`
--
ALTER TABLE `account_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coupon_code_master`
--
ALTER TABLE `coupon_code_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `coupon_code_master_history`
--
ALTER TABLE `coupon_code_master_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faq_master`
--
ALTER TABLE `faq_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `my_transaction`
--
ALTER TABLE `my_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pick_up_location`
--
ALTER TABLE `pick_up_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pick_up_location_map`
--
ALTER TABLE `pick_up_location_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trip_avilable`
--
ALTER TABLE `trip_avilable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `trip_book_pay`
--
ALTER TABLE `trip_book_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `trip_book_pay_details`
--
ALTER TABLE `trip_book_pay_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `trip_category`
--
ALTER TABLE `trip_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `trip_comment`
--
ALTER TABLE `trip_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `trip_inclusions`
--
ALTER TABLE `trip_inclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trip_inclusions_map`
--
ALTER TABLE `trip_inclusions_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=140;
--
-- AUTO_INCREMENT for table `trip_itinerary`
--
ALTER TABLE `trip_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_master`
--
ALTER TABLE `trip_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `trip_shared`
--
ALTER TABLE `trip_shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `trip_specific_day`
--
ALTER TABLE `trip_specific_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trip_tags`
--
ALTER TABLE `trip_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `trip_tag_map`
--
ALTER TABLE `trip_tag_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_bank_master`
--
ALTER TABLE `user_bank_master`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
