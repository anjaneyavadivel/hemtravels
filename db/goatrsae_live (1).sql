-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 21, 2018 at 04:39 PM
-- Server version: 5.5.61-38.13-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goatrsae_live`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_info`
--

CREATE TABLE `account_info` (
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

CREATE TABLE `city_master` (
  `id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `subject` tinytext NOT NULL,
  `message` tinytext NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0' COMMENT '0 - not read, 1 - read',
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `subject`, `message`, `is_read`, `isactive`, `created_on`) VALUES
(1, 'Anjaneya', 'anjaneyavadivel@gmail.com', 'this is mail test', 'this is mail test', 0, 1, '2018-08-26 17:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE `country_master` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`id`, `name`, `isactive`) VALUES
(1, 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code_master`
--

CREATE TABLE `coupon_code_master` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code_master`
--

INSERT INTO `coupon_code_master` (`id`, `user_id`, `trip_id`, `type`, `coupon_code`, `coupon_name`, `offer_type`, `percentage_amount`, `validity_from`, `validity_to`, `comment`, `category_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `created_on`, `isactive`) VALUES
(1, 79, 17, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-11-27', '2018-12-31', ' ', 0, 0.00, 0.00, 0.00, '2018-11-27 06:15:40', 1),
(2, 79, 1, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-02', '2019-01-31', ' ', 0, 0.00, 0.00, 0.00, '2018-12-01 15:59:34', 1),
(3, 102, 19, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-11', '2019-01-31', ' PAYMENT WILL BE SETTLED IN CASH.', 0, 0.00, 0.00, 0.00, '2018-12-11 11:09:37', 1),
(4, 79, 9, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-19', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2018-12-19 12:06:56', 1),
(5, 79, 10, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-19', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2018-12-19 12:19:28', 1),
(6, 79, 5, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-19', '2019-04-30', ' PAYMENT IN CASH', 0, 0.00, 0.00, 0.00, '2018-12-19 12:22:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code_master_history`
--

CREATE TABLE `coupon_code_master_history` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code_master_history`
--

INSERT INTO `coupon_code_master_history` (`id`, `user_id`, `coupon_code_id`, `trip_id`, `type`, `coupon_code`, `coupon_name`, `offer_type`, `percentage_amount`, `validity_from`, `validity_to`, `comment`, `category_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `created_on`, `isactive`) VALUES
(1, 79, 1, 17, 2, 'CASH', 'PAYMENT IN CASH', 1, 0.00, '2018-11-27', '2018-12-31', ' PAYMENT IN CASH', 0, 0.00, 0.00, 0.00, '2018-11-27 06:15:40', 1),
(2, 79, 2, 1, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-02', '2019-01-31', ' payment in cash', 0, 0.00, 0.00, 0.00, '2018-12-01 15:59:34', 1),
(3, 79, 1, 17, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-11-27', '2018-12-31', ' ', 0, 0.00, 0.00, 0.00, '2018-12-07 14:23:34', 1),
(4, 79, 2, 1, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-02', '2019-01-31', ' ', 0, 0.00, 0.00, 0.00, '2018-12-07 14:23:58', 1),
(5, 102, 3, 19, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-11', '2019-01-31', ' PAYMENT WILL BE SETTLED IN CASH.', 0, 0.00, 0.00, 0.00, '2018-12-11 11:09:37', 1),
(6, 79, 4, 9, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-19', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2018-12-19 12:06:56', 1),
(7, 79, 5, 10, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-19', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2018-12-19 12:19:28', 1),
(8, 79, 6, 5, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2018-12-19', '2019-04-30', ' PAYMENT IN CASH', 0, 0.00, 0.00, 0.00, '2018-12-19 12:22:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faq_master`
--

CREATE TABLE `faq_master` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL DEFAULT '0' COMMENT '0 - admin common FAQ',
  `question` tinytext NOT NULL,
  `answer` text NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `my_transaction` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(50, 0, 0, '', -1, -1, 99, 0, '2018-12-02 13:47:41', 'Deposit: Cash Deposited', 0.00, 350.00, 700.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(51, 0, 0, 'PNR06HCVQIT', -1, -1, 99, 0, '2018-12-02 13:47:41', 'Deposit: Trip has been booked PNR06HCVQIT', 0.00, 350.00, 1050.00, 0, 0, 0.00, 'Office Booking PNRPNR06HCVQIT', '0000-00-00 00:00:00', 2),
(52, 7, 0, 'PNR06HCVQIT', -1, 0, 99, 8, '2018-12-02 13:47:41', 'Withdrawal: Trip has been booked PNR06HCVQIT / TRIPF6uRheb / AIRPORT TRANSFER', 350.00, 0.00, 700.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(53, 7, 0, 'PNR06HCVQIT', 99, -1, 0, 8, '2018-12-02 13:47:41', 'Deposit: Trip has been booked PNR06HCVQIT / TRIPF6uRheb / AIRPORT TRANSFER', 0.00, 350.00, 11810.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(54, 0, 0, '', -1, -1, 99, 0, '2018-12-02 14:10:07', 'Deposit: Cash Deposited', 0.00, 350.00, 1050.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(55, 0, 0, 'PNR58K0A1TZ', -1, -1, 99, 0, '2018-12-02 14:10:07', 'Deposit: Trip has been booked PNR58K0A1TZ', 0.00, 350.00, 1400.00, 0, 0, 0.00, 'Office Booking PNRPNR58K0A1TZ', '0000-00-00 00:00:00', 2),
(56, 8, 0, 'PNR58K0A1TZ', -1, 0, 99, 8, '2018-12-02 14:10:07', 'Withdrawal: Trip has been booked PNR58K0A1TZ / TRIPF6uRheb / AIRPORT TRANSFER', 350.00, 0.00, 1050.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(57, 8, 0, 'PNR58K0A1TZ', 99, -1, 0, 8, '2018-12-02 14:10:07', 'Deposit: Trip has been booked PNR58K0A1TZ / TRIPF6uRheb / AIRPORT TRANSFER', 0.00, 350.00, 12160.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(58, 4, 6, 'PNR592LUHNX', -1, 79, 0, 1, '2018-12-03 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR592LUHNX (TRIPyb7ZpaY / WATERFALLS (R)).', 120.00, 0.00, 12040.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(59, 4, 6, 'PNR592LUHNX', 0, -1, 79, 1, '2018-12-03 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR592LUHNX (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 120.00, 20700.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(60, 4, 6, 'PNR592LUHNX', -1, 0, 79, 1, '2018-12-03 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR592LUHNX (TRIPyb7ZpaY / WATERFALLS (R)).', 120.00, 0.00, 20580.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(61, 4, 6, 'PNR592LUHNX', 79, -1, 0, 1, '2018-12-03 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR592LUHNX (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 120.00, 12160.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(62, 4, 6, 'PNR592LUHNX', -1, 79, 0, 1, '2018-12-03 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR592LUHNX (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', 5880.00, 0.00, 6280.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(63, 4, 6, 'PNR592LUHNX', 0, -1, 79, 1, '2018-12-03 01:00:02', 'Deposit: Trip booking amount for PNR No PNR592LUHNX (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', 0.00, 5880.00, 26460.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(64, 4, 7, 'PNR592LUHNX', -1, 81, 0, 2, '2018-12-03 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR592LUHNX (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 6280.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(65, 4, 7, 'PNR592LUHNX', 0, -1, 81, 2, '2018-12-03 01:00:03', 'Deposit: Trip booking amount for PNR No PNR592LUHNX (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(66, 5, 8, 'PNR12IH2EPM', -1, 79, 0, 9, '2018-12-03 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR12IH2EPM (TRIPw2JaE8v / MURDESHWAR (R)).', 100.00, 0.00, 6180.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(67, 5, 8, 'PNR12IH2EPM', 0, -1, 79, 9, '2018-12-03 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR12IH2EPM (TRIPw2JaE8v / MURDESHWAR (R)).', 0.00, 100.00, 26560.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(68, 5, 8, 'PNR12IH2EPM', -1, 0, 79, 9, '2018-12-03 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR12IH2EPM (TRIPw2JaE8v / MURDESHWAR (R)).', 100.00, 0.00, 26460.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(69, 5, 8, 'PNR12IH2EPM', 79, -1, 0, 9, '2018-12-03 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR12IH2EPM (TRIPw2JaE8v / MURDESHWAR (R)).', 0.00, 100.00, 6280.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(70, 5, 8, 'PNR12IH2EPM', -1, 79, 0, 9, '2018-12-03 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR12IH2EPM (TRIPw2JaE8v / MURDESHWAR (R)). Include GST and Service Charge.', 4900.00, 0.00, 1380.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(71, 5, 8, 'PNR12IH2EPM', 0, -1, 79, 9, '2018-12-03 01:00:03', 'Deposit: Trip booking amount for PNR No PNR12IH2EPM (TRIPw2JaE8v / MURDESHWAR (R)). Include GST and Service Charge.', 0.00, 4900.00, 31360.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(72, 5, 9, 'PNR12IH2EPM', -1, 81, 0, 13, '2018-12-03 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR12IH2EPM (TRIPSq7bUTr / MURDESHWAR (R)).', 0.00, 0.00, 1380.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(73, 5, 9, 'PNR12IH2EPM', 0, -1, 81, 13, '2018-12-03 01:00:03', 'Deposit: Trip booking amount for PNR No PNR12IH2EPM (TRIPSq7bUTr / MURDESHWAR (R)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(74, 0, 0, 'PNR51BZMIR9', -1, -1, 81, 0, '2018-12-03 14:19:50', 'Deposit: Cash Deposited', 0.00, 2500.00, 2500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(75, 0, 0, 'PNR51BZMIR9', -1, 0, 81, 0, '2018-12-03 14:19:50', 'Withdrawal: Trip has been booked PNR51BZMIR9', 2500.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR51BZMIR9', '0000-00-00 00:00:00', 2),
(76, 0, 0, 'PNR51BZMIR9', 81, -1, 0, 0, '2018-12-03 14:19:50', 'Deposit: Trip has been booked PNR51BZMIR9', 0.00, 2500.00, 3880.00, 0, 0, 0.00, 'Office Booking PNRPNR51BZMIR9', '0000-00-00 00:00:00', 2),
(77, 7, 12, 'PNR06HCVQIT', -1, 80, 0, 7, '2018-12-04 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPuNaDr56 / AIRPORT TRANSFER).', 20.00, 0.00, 3860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(78, 7, 12, 'PNR06HCVQIT', 0, -1, 80, 7, '2018-12-04 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPuNaDr56 / AIRPORT TRANSFER).', 0.00, 20.00, 300.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(79, 7, 12, 'PNR06HCVQIT', -1, 0, 80, 7, '2018-12-04 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPuNaDr56 / AIRPORT TRANSFER).', 20.00, 0.00, 280.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(80, 7, 12, 'PNR06HCVQIT', 80, -1, 0, 7, '2018-12-04 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPuNaDr56 / AIRPORT TRANSFER).', 0.00, 20.00, 3880.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(81, 7, 12, 'PNR06HCVQIT', -1, 80, 0, 7, '2018-12-04 01:00:01', 'Withdrawal: Trip booking amount for PNR No PNR06HCVQIT (TRIPuNaDr56 / AIRPORT TRANSFER). Include GST and Service Charge.', 280.00, 0.00, 3600.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(82, 7, 12, 'PNR06HCVQIT', 0, -1, 80, 7, '2018-12-04 01:00:01', 'Deposit: Trip booking amount for PNR No PNR06HCVQIT (TRIPuNaDr56 / AIRPORT TRANSFER). Include GST and Service Charge.', 0.00, 280.00, 560.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(83, 7, 13, 'PNR06HCVQIT', -1, 3, 0, 8, '2018-12-04 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPF6uRheb / AIRPORT TRANSFER).', 20.00, 0.00, 3580.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(84, 7, 13, 'PNR06HCVQIT', 0, -1, 3, 8, '2018-12-04 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPF6uRheb / AIRPORT TRANSFER).', 0.00, 20.00, 50.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(85, 7, 13, 'PNR06HCVQIT', -1, 0, 3, 8, '2018-12-04 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPF6uRheb / AIRPORT TRANSFER).', 20.00, 0.00, 30.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(86, 7, 13, 'PNR06HCVQIT', 3, -1, 0, 8, '2018-12-04 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR06HCVQIT (TRIPF6uRheb / AIRPORT TRANSFER).', 0.00, 20.00, 3600.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(87, 7, 13, 'PNR06HCVQIT', -1, 3, 0, 8, '2018-12-04 01:00:01', 'Withdrawal: Trip booking amount for PNR No PNR06HCVQIT (TRIPF6uRheb / AIRPORT TRANSFER). Include GST and Service Charge.', 30.00, 0.00, 3570.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(88, 7, 13, 'PNR06HCVQIT', 0, -1, 3, 8, '2018-12-04 01:00:01', 'Deposit: Trip booking amount for PNR No PNR06HCVQIT (TRIPF6uRheb / AIRPORT TRANSFER). Include GST and Service Charge.', 0.00, 30.00, 60.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(89, 8, 14, 'PNR58K0A1TZ', -1, 80, 0, 7, '2018-12-04 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPuNaDr56 / AIRPORT TRANSFER).', 20.00, 0.00, 3550.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(90, 8, 14, 'PNR58K0A1TZ', 0, -1, 80, 7, '2018-12-04 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPuNaDr56 / AIRPORT TRANSFER).', 0.00, 20.00, 580.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(91, 8, 14, 'PNR58K0A1TZ', -1, 0, 80, 7, '2018-12-04 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPuNaDr56 / AIRPORT TRANSFER).', 20.00, 0.00, 560.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(92, 8, 14, 'PNR58K0A1TZ', 80, -1, 0, 7, '2018-12-04 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPuNaDr56 / AIRPORT TRANSFER).', 0.00, 20.00, 3570.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(93, 8, 14, 'PNR58K0A1TZ', -1, 80, 0, 7, '2018-12-04 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR58K0A1TZ (TRIPuNaDr56 / AIRPORT TRANSFER). Include GST and Service Charge.', 280.00, 0.00, 3290.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(94, 8, 14, 'PNR58K0A1TZ', 0, -1, 80, 7, '2018-12-04 01:00:02', 'Deposit: Trip booking amount for PNR No PNR58K0A1TZ (TRIPuNaDr56 / AIRPORT TRANSFER). Include GST and Service Charge.', 0.00, 280.00, 840.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(95, 8, 15, 'PNR58K0A1TZ', -1, 3, 0, 8, '2018-12-04 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPF6uRheb / AIRPORT TRANSFER).', 20.00, 0.00, 3270.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(96, 8, 15, 'PNR58K0A1TZ', 0, -1, 3, 8, '2018-12-04 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPF6uRheb / AIRPORT TRANSFER).', 0.00, 20.00, 80.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(97, 8, 15, 'PNR58K0A1TZ', -1, 0, 3, 8, '2018-12-04 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPF6uRheb / AIRPORT TRANSFER).', 20.00, 0.00, 60.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(98, 8, 15, 'PNR58K0A1TZ', 3, -1, 0, 8, '2018-12-04 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR58K0A1TZ (TRIPF6uRheb / AIRPORT TRANSFER).', 0.00, 20.00, 3290.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(99, 8, 15, 'PNR58K0A1TZ', -1, 3, 0, 8, '2018-12-04 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR58K0A1TZ (TRIPF6uRheb / AIRPORT TRANSFER). Include GST and Service Charge.', 30.00, 0.00, 3260.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(100, 8, 15, 'PNR58K0A1TZ', 0, -1, 3, 8, '2018-12-04 01:00:02', 'Deposit: Trip booking amount for PNR No PNR58K0A1TZ (TRIPF6uRheb / AIRPORT TRANSFER). Include GST and Service Charge.', 0.00, 30.00, 90.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(101, 0, 0, 'PNR04R3E8LS', -1, -1, 81, 0, '2018-12-04 11:22:22', 'Deposit: Cash Deposited', 0.00, 10000.00, 10000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(102, 0, 0, 'PNR04R3E8LS', -1, 0, 81, 0, '2018-12-04 11:22:22', 'Withdrawal: Trip has been booked PNR04R3E8LS', 10000.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR04R3E8LS', '0000-00-00 00:00:00', 2),
(103, 0, 0, 'PNR04R3E8LS', 81, -1, 0, 0, '2018-12-04 11:22:22', 'Deposit: Trip has been booked PNR04R3E8LS', 0.00, 10000.00, 13260.00, 0, 0, 0.00, 'Office Booking PNRPNR04R3E8LS', '0000-00-00 00:00:00', 2),
(104, 0, 0, 'PNR101DVUET', -1, -1, 81, 0, '2018-12-05 09:10:17', 'Deposit: Cash Deposited', 0.00, 10000.00, 10000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(105, 0, 0, 'PNR101DVUET', -1, 0, 81, 0, '2018-12-05 09:10:17', 'Withdrawal: Trip has been booked PNR101DVUET', 10000.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR101DVUET', '0000-00-00 00:00:00', 2),
(106, 0, 0, 'PNR101DVUET', 81, -1, 0, 0, '2018-12-05 09:10:17', 'Deposit: Trip has been booked PNR101DVUET', 0.00, 10000.00, 23260.00, 0, 0, 0.00, 'Office Booking PNRPNR101DVUET', '0000-00-00 00:00:00', 2),
(107, 11, 20, 'PNR51BZMIR9', -1, 79, 0, 5, '2018-12-06 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR51BZMIR9 (TRIPOhVNBAC / CRAB CATCHING).', 50.00, 0.00, 23210.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(108, 11, 20, 'PNR51BZMIR9', 0, -1, 79, 5, '2018-12-06 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR51BZMIR9 (TRIPOhVNBAC / CRAB CATCHING).', 0.00, 50.00, 31410.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(109, 11, 20, 'PNR51BZMIR9', -1, 0, 79, 5, '2018-12-06 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR51BZMIR9 (TRIPOhVNBAC / CRAB CATCHING).', 50.00, 0.00, 31360.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(110, 11, 20, 'PNR51BZMIR9', 79, -1, 0, 5, '2018-12-06 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR51BZMIR9 (TRIPOhVNBAC / CRAB CATCHING).', 0.00, 50.00, 23260.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(111, 11, 20, 'PNR51BZMIR9', -1, 79, 0, 5, '2018-12-06 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR51BZMIR9 (TRIPOhVNBAC / CRAB CATCHING). Include GST and Service Charge.', 2450.00, 0.00, 20810.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(112, 11, 20, 'PNR51BZMIR9', 0, -1, 79, 5, '2018-12-06 01:00:02', 'Deposit: Trip booking amount for PNR No PNR51BZMIR9 (TRIPOhVNBAC / CRAB CATCHING). Include GST and Service Charge.', 0.00, 2450.00, 33810.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(113, 11, 21, 'PNR51BZMIR9', -1, 81, 0, 6, '2018-12-06 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR51BZMIR9 (TRIPX6IgUQf / CRAB CATCHING).', 0.00, 0.00, 20810.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(114, 11, 21, 'PNR51BZMIR9', 0, -1, 81, 6, '2018-12-06 01:00:02', 'Deposit: Trip booking amount for PNR No PNR51BZMIR9 (TRIPX6IgUQf / CRAB CATCHING).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(115, 15, 28, 'PNR04R3E8LS', -1, 79, 0, 9, '2018-12-08 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR04R3E8LS (TRIPw2JaE8v / MURDESHWAR (R)).', 200.00, 0.00, 20610.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(116, 15, 28, 'PNR04R3E8LS', 0, -1, 79, 9, '2018-12-08 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR04R3E8LS (TRIPw2JaE8v / MURDESHWAR (R)).', 0.00, 200.00, 34010.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(117, 15, 28, 'PNR04R3E8LS', -1, 0, 79, 9, '2018-12-08 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR04R3E8LS (TRIPw2JaE8v / MURDESHWAR (R)).', 200.00, 0.00, 33810.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(118, 15, 28, 'PNR04R3E8LS', 79, -1, 0, 9, '2018-12-08 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR04R3E8LS (TRIPw2JaE8v / MURDESHWAR (R)).', 0.00, 200.00, 20810.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(119, 15, 28, 'PNR04R3E8LS', -1, 79, 0, 9, '2018-12-08 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR04R3E8LS (TRIPw2JaE8v / MURDESHWAR (R)). Include GST and Service Charge.', 9800.00, 0.00, 11010.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(120, 15, 28, 'PNR04R3E8LS', 0, -1, 79, 9, '2018-12-08 01:00:03', 'Deposit: Trip booking amount for PNR No PNR04R3E8LS (TRIPw2JaE8v / MURDESHWAR (R)). Include GST and Service Charge.', 0.00, 9800.00, 43610.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(121, 15, 29, 'PNR04R3E8LS', -1, 81, 0, 13, '2018-12-08 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR04R3E8LS (TRIPSq7bUTr / MURDESHWAR (R)).', 0.00, 0.00, 11010.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(122, 15, 29, 'PNR04R3E8LS', 0, -1, 81, 13, '2018-12-08 01:00:03', 'Deposit: Trip booking amount for PNR No PNR04R3E8LS (TRIPSq7bUTr / MURDESHWAR (R)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(123, 0, 0, 'PNR183JIZFH', -1, -1, 81, 0, '2018-12-10 00:43:42', 'Deposit: Cash Deposited', 0.00, 2500.00, 2500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(124, 0, 0, 'PNR183JIZFH', -1, 0, 81, 0, '2018-12-10 00:43:42', 'Withdrawal: Trip has been booked PNR183JIZFH', 2500.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR183JIZFH', '0000-00-00 00:00:00', 2),
(125, 0, 0, 'PNR183JIZFH', 81, -1, 0, 0, '2018-12-10 00:43:42', 'Deposit: Trip has been booked PNR183JIZFH', 0.00, 2500.00, 13510.00, 0, 0, 0.00, 'Office Booking PNRPNR183JIZFH', '0000-00-00 00:00:00', 2),
(126, 16, 30, 'PNR101DVUET', -1, 79, 0, 17, '2018-12-10 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR101DVUET (TRIPYZwVWzL / TIGER TRIP).', 200.00, 0.00, 13310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(127, 16, 30, 'PNR101DVUET', 0, -1, 79, 17, '2018-12-10 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR101DVUET (TRIPYZwVWzL / TIGER TRIP).', 0.00, 200.00, 43810.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(128, 16, 30, 'PNR101DVUET', -1, 0, 79, 17, '2018-12-10 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR101DVUET (TRIPYZwVWzL / TIGER TRIP).', 200.00, 0.00, 43610.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(129, 16, 30, 'PNR101DVUET', 79, -1, 0, 17, '2018-12-10 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR101DVUET (TRIPYZwVWzL / TIGER TRIP).', 0.00, 200.00, 13510.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(130, 16, 30, 'PNR101DVUET', -1, 79, 0, 17, '2018-12-10 01:00:01', 'Withdrawal: Trip booking amount for PNR No PNR101DVUET (TRIPYZwVWzL / TIGER TRIP). Include GST and Service Charge.', 9800.00, 0.00, 3710.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(131, 16, 30, 'PNR101DVUET', 0, -1, 79, 17, '2018-12-10 01:00:01', 'Deposit: Trip booking amount for PNR No PNR101DVUET (TRIPYZwVWzL / TIGER TRIP). Include GST and Service Charge.', 0.00, 9800.00, 53410.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(132, 16, 31, 'PNR101DVUET', -1, 81, 0, 18, '2018-12-10 01:00:08', 'Withdrawal: Trip booking amount for PNR No PNR101DVUET (TRIPdstVNLg / TIGER TRIP).', 0.00, 0.00, 3710.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(133, 16, 31, 'PNR101DVUET', 0, -1, 81, 18, '2018-12-10 01:00:08', 'Deposit: Trip booking amount for PNR No PNR101DVUET (TRIPdstVNLg / TIGER TRIP).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(134, 0, 0, 'PNR95VGQENS', -1, -1, 81, 0, '2018-12-10 05:56:54', 'Deposit: Cash Deposited', 0.00, 10000.00, 10000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(135, 0, 0, 'PNR95VGQENS', -1, 0, 81, 0, '2018-12-10 05:56:54', 'Withdrawal: Trip has been booked PNR95VGQENS', 10000.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR95VGQENS', '0000-00-00 00:00:00', 2),
(136, 0, 0, 'PNR95VGQENS', 81, -1, 0, 0, '2018-12-10 05:56:54', 'Deposit: Trip has been booked PNR95VGQENS', 0.00, 10000.00, 13710.00, 0, 0, 0.00, 'Office Booking PNRPNR95VGQENS', '0000-00-00 00:00:00', 2),
(137, 0, 0, 'PNR83UOCJ9T', -1, -1, 81, 0, '2018-12-10 17:39:10', 'Deposit: Cash Deposited', 0.00, 2500.00, 2500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(138, 0, 0, 'PNR83UOCJ9T', -1, 0, 81, 0, '2018-12-10 17:39:10', 'Withdrawal: Trip has been booked PNR83UOCJ9T', 2500.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR83UOCJ9T', '0000-00-00 00:00:00', 2),
(139, 0, 0, 'PNR83UOCJ9T', 81, -1, 0, 0, '2018-12-10 17:39:10', 'Deposit: Trip has been booked PNR83UOCJ9T', 0.00, 2500.00, 16210.00, 0, 0, 0.00, 'Office Booking PNRPNR83UOCJ9T', '0000-00-00 00:00:00', 2),
(140, 20, 38, 'PNR183JIZFH', -1, 79, 0, 5, '2018-12-13 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR183JIZFH (TRIPOhVNBAC / CRAB CATCHING).', 50.00, 0.00, 16160.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(141, 20, 38, 'PNR183JIZFH', 0, -1, 79, 5, '2018-12-13 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR183JIZFH (TRIPOhVNBAC / CRAB CATCHING).', 0.00, 50.00, 53460.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(142, 20, 38, 'PNR183JIZFH', -1, 0, 79, 5, '2018-12-13 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR183JIZFH (TRIPOhVNBAC / CRAB CATCHING).', 50.00, 0.00, 53410.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(143, 20, 38, 'PNR183JIZFH', 79, -1, 0, 5, '2018-12-13 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR183JIZFH (TRIPOhVNBAC / CRAB CATCHING).', 0.00, 50.00, 16210.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(144, 20, 38, 'PNR183JIZFH', -1, 79, 0, 5, '2018-12-13 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR183JIZFH (TRIPOhVNBAC / CRAB CATCHING). Include GST and Service Charge.', 2450.00, 0.00, 13760.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(145, 20, 38, 'PNR183JIZFH', 0, -1, 79, 5, '2018-12-13 01:00:02', 'Deposit: Trip booking amount for PNR No PNR183JIZFH (TRIPOhVNBAC / CRAB CATCHING). Include GST and Service Charge.', 0.00, 2450.00, 55860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(146, 20, 39, 'PNR183JIZFH', -1, 81, 0, 16, '2018-12-13 01:00:09', 'Withdrawal: Trip booking amount for PNR No PNR183JIZFH (TRIPb0BK5Xh / CRAB CATCHING).', 0.00, 0.00, 13760.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(147, 20, 39, 'PNR183JIZFH', 0, -1, 81, 16, '2018-12-13 01:00:09', 'Deposit: Trip booking amount for PNR No PNR183JIZFH (TRIPb0BK5Xh / CRAB CATCHING).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(148, 22, 42, 'PNR83UOCJ9T', -1, 79, 0, 5, '2018-12-13 01:00:14', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR83UOCJ9T (TRIPOhVNBAC / CRAB CATCHING).', 50.00, 0.00, 13710.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(149, 22, 42, 'PNR83UOCJ9T', 0, -1, 79, 5, '2018-12-13 01:00:14', 'Deposit: Trip booking servicecharge amount for PNR No PNR83UOCJ9T (TRIPOhVNBAC / CRAB CATCHING).', 0.00, 50.00, 55910.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(150, 22, 42, 'PNR83UOCJ9T', -1, 0, 79, 5, '2018-12-13 01:00:14', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR83UOCJ9T (TRIPOhVNBAC / CRAB CATCHING).', 50.00, 0.00, 55860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(151, 22, 42, 'PNR83UOCJ9T', 79, -1, 0, 5, '2018-12-13 01:00:14', 'Deposit: Trip booking servicecharge amount for PNR No PNR83UOCJ9T (TRIPOhVNBAC / CRAB CATCHING).', 0.00, 50.00, 13760.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(152, 22, 42, 'PNR83UOCJ9T', -1, 79, 0, 5, '2018-12-13 01:00:14', 'Withdrawal: Trip booking amount for PNR No PNR83UOCJ9T (TRIPOhVNBAC / CRAB CATCHING). Include GST and Service Charge.', 2450.00, 0.00, 11310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(153, 22, 42, 'PNR83UOCJ9T', 0, -1, 79, 5, '2018-12-13 01:00:14', 'Deposit: Trip booking amount for PNR No PNR83UOCJ9T (TRIPOhVNBAC / CRAB CATCHING). Include GST and Service Charge.', 0.00, 2450.00, 58310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(154, 22, 43, 'PNR83UOCJ9T', -1, 81, 0, 16, '2018-12-13 01:00:20', 'Withdrawal: Trip booking amount for PNR No PNR83UOCJ9T (TRIPb0BK5Xh / CRAB CATCHING).', 0.00, 0.00, 11310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(155, 22, 43, 'PNR83UOCJ9T', 0, -1, 81, 16, '2018-12-13 01:00:20', 'Deposit: Trip booking amount for PNR No PNR83UOCJ9T (TRIPb0BK5Xh / CRAB CATCHING).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(156, 21, 40, 'PNR95VGQENS', -1, 80, 0, 3, '2018-12-14 01:00:07', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR95VGQENS (TRIPQysIwpd / RAFTING).', 200.00, 0.00, 11110.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(157, 21, 40, 'PNR95VGQENS', 0, -1, 80, 3, '2018-12-14 01:00:07', 'Deposit: Trip booking servicecharge amount for PNR No PNR95VGQENS (TRIPQysIwpd / RAFTING).', 0.00, 200.00, 1040.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(158, 21, 40, 'PNR95VGQENS', -1, 0, 80, 3, '2018-12-14 01:00:07', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR95VGQENS (TRIPQysIwpd / RAFTING).', 200.00, 0.00, 840.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(159, 21, 40, 'PNR95VGQENS', 80, -1, 0, 3, '2018-12-14 01:00:07', 'Deposit: Trip booking servicecharge amount for PNR No PNR95VGQENS (TRIPQysIwpd / RAFTING).', 0.00, 200.00, 11310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(160, 21, 40, 'PNR95VGQENS', -1, 80, 0, 3, '2018-12-14 01:00:07', 'Withdrawal: Trip booking amount for PNR No PNR95VGQENS (TRIPQysIwpd / RAFTING). Include GST and Service Charge.', 9800.00, 0.00, 1510.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(161, 21, 40, 'PNR95VGQENS', 0, -1, 80, 3, '2018-12-14 01:00:07', 'Deposit: Trip booking amount for PNR No PNR95VGQENS (TRIPQysIwpd / RAFTING). Include GST and Service Charge.', 0.00, 9800.00, 10640.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(162, 21, 41, 'PNR95VGQENS', -1, 81, 0, 4, '2018-12-14 01:00:13', 'Withdrawal: Trip booking amount for PNR No PNR95VGQENS (TRIP3YKwgtQ / RAFTING).', 0.00, 0.00, 1510.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(163, 21, 41, 'PNR95VGQENS', 0, -1, 81, 4, '2018-12-14 01:00:13', 'Deposit: Trip booking amount for PNR No PNR95VGQENS (TRIP3YKwgtQ / RAFTING).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(164, 0, 0, 'PNR51ZPETC7', -1, 0, 81, 0, '2018-12-14 16:29:19', 'Withdrawal: Trip has been booked PNR51ZPETC7', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR51ZPETC7', '0000-00-00 00:00:00', 2),
(165, 0, 0, 'PNR51ZPETC7', 81, -1, 0, 0, '2018-12-14 16:29:19', 'Deposit: Trip has been booked PNR51ZPETC7', 0.00, 0.00, 1510.00, 0, 0, 0.00, 'Office Booking PNRPNR51ZPETC7', '0000-00-00 00:00:00', 2),
(166, 25, 0, 'PNR51ZPETC7', -1, 0, 101, 1, '2018-12-14 16:29:19', 'Withdrawal: Trip has been booked PNR51ZPETC7 / TRIPyb7ZpaY / WATERFALLS (R)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(167, 25, 0, 'PNR51ZPETC7', 101, -1, 0, 1, '2018-12-14 16:29:19', 'Deposit: Trip has been booked PNR51ZPETC7 / TRIPyb7ZpaY / WATERFALLS (R)', 0.00, 0.00, 1510.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(168, 0, 0, 'PNR19K2URA5', -1, 0, 81, 0, '2018-12-17 09:42:18', 'Withdrawal: Trip has been booked PNR19K2URA5', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR19K2URA5', '0000-00-00 00:00:00', 2),
(169, 0, 0, 'PNR19K2URA5', 81, -1, 0, 0, '2018-12-17 09:42:18', 'Deposit: Trip has been booked PNR19K2URA5', 0.00, 0.00, 1510.00, 0, 0, 0.00, 'Office Booking PNRPNR19K2URA5', '0000-00-00 00:00:00', 2),
(170, 28, 0, 'PNR19K2URA5', -1, 0, 81, 2, '2018-12-17 09:42:18', 'Withdrawal: Trip has been booked PNR19K2URA5 / TRIPB3ZP4dW / WATERFALLS (R)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(171, 28, 0, 'PNR19K2URA5', 81, -1, 0, 2, '2018-12-17 09:42:18', 'Deposit: Trip has been booked PNR19K2URA5 / TRIPB3ZP4dW / WATERFALLS (R)', 0.00, 0.00, 1510.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(172, 0, 0, 'PNR54CP6OBC', -1, 0, 81, 0, '2018-12-17 11:53:41', 'Withdrawal: Trip has been booked PNR54CP6OBC', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR54CP6OBC', '0000-00-00 00:00:00', 2),
(173, 0, 0, 'PNR54CP6OBC', 81, -1, 0, 0, '2018-12-17 11:53:41', 'Deposit: Trip has been booked PNR54CP6OBC', 0.00, 0.00, 1510.00, 0, 0, 0.00, 'Office Booking PNRPNR54CP6OBC', '0000-00-00 00:00:00', 2),
(174, 29, 0, 'PNR54CP6OBC', -1, 0, 81, 20, '2018-12-17 11:53:41', 'Withdrawal: Trip has been booked PNR54CP6OBC / TRIPtKWijuC / ISLAND TRIP (H)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(175, 29, 0, 'PNR54CP6OBC', 81, -1, 0, 20, '2018-12-17 11:53:41', 'Deposit: Trip has been booked PNR54CP6OBC / TRIPtKWijuC / ISLAND TRIP (H)', 0.00, 0.00, 1510.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(176, 0, 0, 'PNR98D8QXRL', -1, 0, 81, 0, '2018-12-17 11:55:45', 'Withdrawal: Trip has been booked PNR98D8QXRL', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR98D8QXRL', '0000-00-00 00:00:00', 2),
(177, 0, 0, 'PNR98D8QXRL', 81, -1, 0, 0, '2018-12-17 11:55:45', 'Deposit: Trip has been booked PNR98D8QXRL', 0.00, 0.00, 1510.00, 0, 0, 0.00, 'Office Booking PNRPNR98D8QXRL', '0000-00-00 00:00:00', 2),
(178, 30, 0, 'PNR98D8QXRL', -1, 0, 81, 20, '2018-12-17 11:55:45', 'Withdrawal: Trip has been booked PNR98D8QXRL / TRIPtKWijuC / ISLAND TRIP (H)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(179, 30, 0, 'PNR98D8QXRL', 81, -1, 0, 20, '2018-12-17 11:55:45', 'Deposit: Trip has been booked PNR98D8QXRL / TRIPtKWijuC / ISLAND TRIP (H)', 0.00, 0.00, 1510.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(180, 0, 0, 'PNR43GMVEM9', -1, -1, 81, 0, '2018-12-17 12:17:14', 'Deposit: Cash Deposited', 0.00, 350.00, 350.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(181, 0, 0, 'PNR43GMVEM9', -1, 0, 81, 0, '2018-12-17 12:17:14', 'Withdrawal: Trip has been booked PNR43GMVEM9', 350.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR43GMVEM9', '0000-00-00 00:00:00', 2),
(182, 0, 0, 'PNR43GMVEM9', 81, -1, 0, 0, '2018-12-17 12:17:14', 'Deposit: Trip has been booked PNR43GMVEM9', 0.00, 350.00, 1860.00, 0, 0, 0.00, 'Office Booking PNRPNR43GMVEM9', '0000-00-00 00:00:00', 2),
(183, 25, 48, 'PNR51ZPETC7', -1, 79, 0, 1, '2018-12-18 01:00:01', 'Withdrawal: Trip booking amount for PNR No PNR51ZPETC7 (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 0.00, 1860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(184, 25, 48, 'PNR51ZPETC7', 0, -1, 79, 1, '2018-12-18 01:00:01', 'Deposit: Trip booking amount for PNR No PNR51ZPETC7 (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 0.00, 58310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(185, 0, 0, 'PNR80FZ7D63', -1, 0, 81, 0, '2018-12-19 12:15:53', 'Withdrawal: Trip has been booked PNR80FZ7D63', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR80FZ7D63', '0000-00-00 00:00:00', 2),
(186, 0, 0, 'PNR80FZ7D63', 81, -1, 0, 0, '2018-12-19 12:15:53', 'Deposit: Trip has been booked PNR80FZ7D63', 0.00, 0.00, 1860.00, 0, 0, 0.00, 'Office Booking PNRPNR80FZ7D63', '0000-00-00 00:00:00', 2),
(187, 35, 0, 'PNR80FZ7D63', -1, 0, 81, 22, '2018-12-19 12:15:53', 'Withdrawal: Trip has been booked PNR80FZ7D63 / TRIPTwH7DgP / MURDESHWAR (R)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(188, 35, 0, 'PNR80FZ7D63', 81, -1, 0, 22, '2018-12-19 12:15:53', 'Deposit: Trip has been booked PNR80FZ7D63 / TRIPTwH7DgP / MURDESHWAR (R)', 0.00, 0.00, 1860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(189, 0, 0, 'PNR43JUR9ZQ', -1, -1, 81, 0, '2018-12-19 17:28:30', 'Deposit: Cash Deposited', 0.00, 3000.00, 3000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(190, 0, 0, 'PNR43JUR9ZQ', -1, 0, 81, 0, '2018-12-19 17:28:30', 'Withdrawal: Trip has been booked PNR43JUR9ZQ', 3000.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR43JUR9ZQ', '0000-00-00 00:00:00', 2),
(191, 0, 0, 'PNR43JUR9ZQ', 81, -1, 0, 0, '2018-12-19 17:28:30', 'Deposit: Trip has been booked PNR43JUR9ZQ', 0.00, 3000.00, 4860.00, 0, 0, 0.00, 'Office Booking PNRPNR43JUR9ZQ', '0000-00-00 00:00:00', 2),
(192, 28, 53, 'PNR19K2URA5', -1, 79, 0, 1, '2018-12-20 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR19K2URA5 (TRIPyb7ZpaY / WATERFALLS (R)).', 20.00, 0.00, 4840.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(193, 28, 53, 'PNR19K2URA5', 0, -1, 79, 1, '2018-12-20 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR19K2URA5 (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 20.00, 58330.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(194, 28, 53, 'PNR19K2URA5', -1, 0, 79, 1, '2018-12-20 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR19K2URA5 (TRIPyb7ZpaY / WATERFALLS (R)).', 20.00, 0.00, 58310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(195, 28, 53, 'PNR19K2URA5', 79, -1, 0, 1, '2018-12-20 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR19K2URA5 (TRIPyb7ZpaY / WATERFALLS (R)).', 0.00, 20.00, 4860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(196, 28, 53, 'PNR19K2URA5', -1, 79, 0, 1, '2018-12-20 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR19K2URA5 (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', -20.00, 0.00, 4880.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(197, 28, 53, 'PNR19K2URA5', 0, -1, 79, 1, '2018-12-20 01:00:02', 'Deposit: Trip booking amount for PNR No PNR19K2URA5 (TRIPyb7ZpaY / WATERFALLS (R)). Include GST and Service Charge.', 0.00, -20.00, 58290.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(198, 28, 54, 'PNR19K2URA5', -1, 81, 0, 2, '2018-12-20 01:00:08', 'Withdrawal: Trip booking amount for PNR No PNR19K2URA5 (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 4880.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(199, 28, 54, 'PNR19K2URA5', 0, -1, 81, 2, '2018-12-20 01:00:08', 'Deposit: Trip booking amount for PNR No PNR19K2URA5 (TRIPB3ZP4dW / WATERFALLS (R)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(200, 29, 55, 'PNR54CP6OBC', -1, 102, 0, 19, '2018-12-20 01:00:14', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR54CP6OBC (TRIPDcSK5QO / ISLAND TRIP (H)).', 20.00, 0.00, 4860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(201, 29, 55, 'PNR54CP6OBC', 0, -1, 102, 19, '2018-12-20 01:00:14', 'Deposit: Trip booking servicecharge amount for PNR No PNR54CP6OBC (TRIPDcSK5QO / ISLAND TRIP (H)).', 0.00, 20.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(202, 29, 55, 'PNR54CP6OBC', -1, 0, 102, 19, '2018-12-20 01:00:14', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR54CP6OBC (TRIPDcSK5QO / ISLAND TRIP (H)).', 20.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(203, 29, 55, 'PNR54CP6OBC', 102, -1, 0, 19, '2018-12-20 01:00:14', 'Deposit: Trip booking servicecharge amount for PNR No PNR54CP6OBC (TRIPDcSK5QO / ISLAND TRIP (H)).', 0.00, 20.00, 4880.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(204, 29, 55, 'PNR54CP6OBC', -1, 102, 0, 19, '2018-12-20 01:00:14', 'Withdrawal: Trip booking amount for PNR No PNR54CP6OBC (TRIPDcSK5QO / ISLAND TRIP (H)). Include GST and Service Charge.', -20.00, 0.00, 4900.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(205, 29, 55, 'PNR54CP6OBC', 0, -1, 102, 19, '2018-12-20 01:00:14', 'Deposit: Trip booking amount for PNR No PNR54CP6OBC (TRIPDcSK5QO / ISLAND TRIP (H)). Include GST and Service Charge.', 0.00, -20.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(206, 29, 56, 'PNR54CP6OBC', -1, 81, 0, 20, '2018-12-20 01:00:20', 'Withdrawal: Trip booking amount for PNR No PNR54CP6OBC (TRIPtKWijuC / ISLAND TRIP (H)).', 0.00, 0.00, 4900.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(207, 29, 56, 'PNR54CP6OBC', 0, -1, 81, 20, '2018-12-20 01:00:20', 'Deposit: Trip booking amount for PNR No PNR54CP6OBC (TRIPtKWijuC / ISLAND TRIP (H)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(208, 0, 0, 'PNR50ZKAUFX', -1, 0, 81, 0, '2018-12-20 14:48:42', 'Withdrawal: Trip has been booked PNR50ZKAUFX', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR50ZKAUFX', '0000-00-00 00:00:00', 2),
(209, 0, 0, 'PNR50ZKAUFX', 81, -1, 0, 0, '2018-12-20 14:48:42', 'Deposit: Trip has been booked PNR50ZKAUFX', 0.00, 0.00, 4900.00, 0, 0, 0.00, 'Office Booking PNRPNR50ZKAUFX', '0000-00-00 00:00:00', 2),
(210, 39, 0, 'PNR50ZKAUFX', -1, 0, 81, 20, '2018-12-20 14:48:42', 'Withdrawal: Trip has been booked PNR50ZKAUFX / TRIPtKWijuC / ISLAND TRIP (H)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(211, 39, 0, 'PNR50ZKAUFX', 81, -1, 0, 20, '2018-12-20 14:48:42', 'Deposit: Trip has been booked PNR50ZKAUFX / TRIPtKWijuC / ISLAND TRIP (H)', 0.00, 0.00, 4900.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(212, 30, 57, 'PNR98D8QXRL', -1, 102, 0, 19, '2018-12-21 01:00:04', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR98D8QXRL (TRIPDcSK5QO / ISLAND TRIP (H)).', 20.00, 0.00, 4880.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(213, 30, 57, 'PNR98D8QXRL', 0, -1, 102, 19, '2018-12-21 01:00:04', 'Deposit: Trip booking servicecharge amount for PNR No PNR98D8QXRL (TRIPDcSK5QO / ISLAND TRIP (H)).', 0.00, 20.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(214, 30, 57, 'PNR98D8QXRL', -1, 0, 102, 19, '2018-12-21 01:00:04', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR98D8QXRL (TRIPDcSK5QO / ISLAND TRIP (H)).', 20.00, 0.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(215, 30, 57, 'PNR98D8QXRL', 102, -1, 0, 19, '2018-12-21 01:00:04', 'Deposit: Trip booking servicecharge amount for PNR No PNR98D8QXRL (TRIPDcSK5QO / ISLAND TRIP (H)).', 0.00, 20.00, 4900.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(216, 30, 57, 'PNR98D8QXRL', -1, 102, 0, 19, '2018-12-21 01:00:04', 'Withdrawal: Trip booking amount for PNR No PNR98D8QXRL (TRIPDcSK5QO / ISLAND TRIP (H)). Include GST and Service Charge.', -20.00, 0.00, 4920.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(217, 30, 57, 'PNR98D8QXRL', 0, -1, 102, 19, '2018-12-21 01:00:04', 'Deposit: Trip booking amount for PNR No PNR98D8QXRL (TRIPDcSK5QO / ISLAND TRIP (H)). Include GST and Service Charge.', 0.00, -20.00, -40.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(218, 30, 58, 'PNR98D8QXRL', -1, 81, 0, 20, '2018-12-21 01:00:11', 'Withdrawal: Trip booking amount for PNR No PNR98D8QXRL (TRIPtKWijuC / ISLAND TRIP (H)).', 0.00, 0.00, 4920.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(219, 30, 58, 'PNR98D8QXRL', 0, -1, 81, 20, '2018-12-21 01:00:11', 'Deposit: Trip booking amount for PNR No PNR98D8QXRL (TRIPtKWijuC / ISLAND TRIP (H)).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
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

CREATE TABLE `pick_up_location` (
  `id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `city_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pick_up_location_map`
--

CREATE TABLE `pick_up_location_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `landmark` varchar(200) NOT NULL,
  `time` varchar(150) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(54, 18, 8, 'BAGA', 'CCD', '05:00', 1),
(55, 19, 7, 'CALANGUTE', 'KFC', '09:00', 1),
(56, 19, 7, 'CANDOLIM', 'AXIS BANK', '9:15', 1),
(57, 19, 7, 'BAGA', 'CCD', '08:30', 1),
(58, 19, 7, 'SINQUERIM', 'BUS STAND', '9:30', 1),
(59, 20, 7, 'CANDOLIM HEM TRAVELS', 'CANDOLIM', '09:15', 1),
(60, 20, 7, 'CALANGUTE', 'KFC', '09:00', 1),
(61, 20, 7, 'CANDOLIM', 'AXIS BANK', '9:15', 1),
(62, 20, 7, 'BAGA', 'CCD', '08:30', 1),
(63, 20, 7, 'SINQUERIM', 'BUS STAND', '9:30', 1),
(64, 21, 8, 'candolim newton', 'candolim', '05.00', 1),
(65, 21, 8, 'calangute kfc', 'calangute', '04.45', 1),
(66, 22, 8, 'HEM TRAVELS CANDOLIM', '', '5:00', 1),
(67, 22, 8, 'CALANGUTE', 'DOLPHIN CIRCLE', '4:45', 1),
(68, 22, 8, 'CANDOLIM', 'AXIS BANK', '5:00', 1),
(69, 22, 8, 'APORA', 'ARPORA CHAPEL', '4:45', 1),
(70, 22, 8, 'MORJIM', 'BUS STAND', '5:20', 1),
(71, 23, 8, 'CANDOLIM', '', '09:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE `state_master` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `trip_avilable` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 18, 0, 0, 0, 1, 1, 0, 0, 1, '2018-11-26 12:11:30', 0, '0000-00-00 00:00:00', 0),
(19, 19, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-11 11:06:21', 0, '0000-00-00 00:00:00', 0),
(20, 20, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-11 11:14:32', 0, '0000-00-00 00:00:00', 0),
(21, 21, 1, 0, 1, 0, 1, 1, 0, 1, '2018-12-14 05:31:12', 0, '0000-00-00 00:00:00', 0),
(22, 22, 0, 1, 1, 0, 1, 0, 0, 1, '2018-12-19 12:11:35', 0, '0000-00-00 00:00:00', 0),
(23, 23, 1, 1, 1, 1, 1, 1, 1, 1, '2018-12-20 14:15:40', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trip_book_pay`
--

CREATE TABLE `trip_book_pay` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_book_pay`
--

INSERT INTO `trip_book_pay` (`id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `gst_percentage`, `gst_amt`, `round_off`, `net_price`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `booked_to`, `booked_email`, `booked_phone_no`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `isactive`) VALUES
(1, 0, 80, 3, 98, 'PNR74FRVCUH', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-27', '2018-11-27', '07:00:00', 10, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-26 17:13:05', 80, 'Gust', 'gust@gmail.com', '7373112889', 5, 1, 1, 1, '2018-11-29', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(2, 1, 81, 2, 81, 'PNR14CPLFR1', 6, 2000.00, 2000.00, 0.00, 6, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 0.00, 0.00, 0.00, -6000.00, 0.00, 0.00, 0.00, 18000.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:34:22', 81, 'Ms Gala, Sea Shell Villas, At Reception At 6:00', 'goahemtravels@gmail.com', '9257027473', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(3, 1, 81, 2, 81, 'PNR12B4IPZR', 1, 2000.00, 2000.00, 0.00, 1, 0, 0, 2000.00, 0.00, 0.00, 2000.00, 2000.00, 0, 0, '', 0.00, 0.00, 0.00, -1000.00, 0.00, 0.00, 0.00, 3000.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:48:30', 81, 'Mr Nicolai, Acacia -328, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(4, 1, 81, 2, 81, 'PNR592LUHNX', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 0.00, -2000.00, 0.00, 0.00, 0.00, 6000.00, '2018-12-01', '2018-12-01', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-30 13:36:34', 81, 'Mr Valerie, Alor Grand-403, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-03', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(5, 9, 81, 13, 81, 'PNR12IH2EPM', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5000.00, '2018-12-01', '2018-12-01', '04:45:00', 34, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-30 15:04:25', 81, 'Ms Ekaterina, Princess De Goa -A108, At Reception At 5:00 Hrs', 'goahemtravels@gmail.com', '9607335096', 5, 1, 1, 1, '2018-12-03', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(6, 7, 3, 8, 99, 'PNR84IADW4R', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 350.00, '2018-11-30', '2018-11-30', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-11-30 17:11:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-03', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(7, 7, 3, 8, 99, 'PNR06HCVQIT', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 350.00, '2018-12-02', '2018-12-02', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-02 13:47:41', 99, 'Karthik', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-04', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(8, 7, 3, 8, 99, 'PNR58K0A1TZ', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 350.00, '2018-12-02', '2018-12-02', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-02 14:10:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-04', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(9, 5, 81, 6, 101, 'PNR15EZWIOB', 1, 1500.00, 1500.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, '', 0.00, 0.00, 0.00, -1000.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-04', '2018-12-04', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-03 09:32:32', 81, 'Ravi', 'ravi@mail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(10, 1, 81, 2, 81, 'PNR36DPWF4W', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-04', '2018-12-04', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-03 10:57:28', 81, 'Ms Ekaterina, Luva Nova-F1, Baga, At Reception At 5:45', 'goahemtravels@gmail.com', '7757829687', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(11, 5, 81, 6, 101, 'PNR51BZMIR9', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-04', '2018-12-04', '15:00:00', 14, 'CANDOLIM', 'AXIS BANK', '2018-12-03 13:04:51', 81, 'Ravi', 'ravi@mail.com', '7373112889', 5, 1, 1, 1, '2018-12-06', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(12, 5, 81, 16, 101, 'PNR05TWZVMD', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-04', '2018-12-04', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-03 14:30:44', 81, 'Ravi', 'ravi@mail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(13, 1, 81, 2, 81, 'PNR20ZVCHWV', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:08:10', 81, 'Ms Natalia, Hotel Sea Breeze - 20, At Reception, At 5:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(14, 1, 81, 2, 81, 'PNR356DIE5Y', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:12:10', 81, 'Mr Nicolai, Perolo Do Mar-108, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(15, 9, 81, 13, 81, 'PNR04R3E8LS', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, '2018-12-06', '2018-12-06', '05:00:00', 35, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:15:25', 81, 'Ms Natalia, Sea Breeze-20, At Reception At 5:00', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-08', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(16, 17, 81, 18, 81, 'PNR101DVUET', 1, 10000.00, 10000.00, 0.00, 1, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, '2018-12-06', '2018-12-08', '05:00:00', 54, 'BAGA', 'CCD', '2018-12-05 09:08:38', 81, 'Ms Ekaterina, Hotel Luvo Nova-F1, Baga, At Reception At 5:00', 'goahemtravels@gmail.com', '7757829687', 5, 1, 1, 1, '2018-12-10', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(17, 5, 81, 16, 103, 'PNR61F7HQRX', 2, 2500.00, 2500.00, 0.00, 2, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5000.00, '2018-12-07', '2018-12-07', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-06 15:46:35', 81, 'Mr Alexander, Ave Maria-101, At Reception At 15:00 Hrs', 'goahemtravels@gmailc.om', '9616341565', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(18, 1, 81, 2, 81, 'PNR20NX950E', 3, 2000.00, 2000.00, 0.00, 3, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-09', '2018-12-09', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-08 14:32:41', 81, 'Ms Irene, Ave Maria - 102, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(19, 5, 81, 16, 101, 'PNR19UHRXCO', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-11', '2018-12-11', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-10 00:17:58', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(20, 5, 81, 16, 101, 'PNR183JIZFH', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-11', '2018-12-11', '15:15:00', 50, 'CALANGUTE', 'KFC', '2018-12-10 00:28:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-13', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(21, 3, 81, 4, 57, 'PNR95VGQENS', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, '2018-12-12', '2018-12-12', '06:45:00', 11, 'CALANGUTE', 'TEMPLE', '2018-12-10 05:55:15', 81, 'Vinod Test', 'v_inod_v@yahoo.com', '9822153576', 5, 1, 1, 1, '2018-12-14', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(22, 5, 81, 16, 101, 'PNR83UOCJ9T', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-11', '2018-12-11', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-10 17:01:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-13', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(23, 5, 81, 6, 101, 'PNR7681KOIL', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-11', '2018-12-11', '15:00:00', 14, 'CANDOLIM', 'AXIS BANK', '2018-12-10 17:40:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(24, 19, 81, 20, 81, 'PNR83PAZQMD', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-12', '2018-12-12', '09:15:00', 59, 'CANDOLIM HEM TRAVELS', 'CANDOLIM', '2018-12-11 11:17:40', 81, 'TEST BOOKING, AT DELHINO SUPERMARKET', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(25, 0, 79, 1, 101, 'PNR51ZPETC7', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 2, 'CANDOLIM', 'AXIS BANK', '2018-12-14 16:29:19', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-18', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(26, 5, 81, 6, 101, 'PNR84GJH80R', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-15', '2018-12-15', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-14 17:23:54', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(27, 5, 81, 6, 101, 'PNR06AYXTI4', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 0.00, 0.00, 2500.00, '2018-12-15', '2018-12-15', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-14 17:26:28', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(28, 1, 81, 2, 81, 'PNR19K2URA5', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-18', '2018-12-18', '06:00:00', 5, 'HEM TRAVELS CANDOLIM', 'HEM TRAVELS OFFICE', '2018-12-17 09:42:18', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-12-20', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(29, 19, 81, 20, 81, 'PNR54CP6OBC', 4, 1500.00, 1500.00, 0.00, 4, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-18', '2018-12-18', '09:15:00', 59, 'CANDOLIM HEM TRAVELS', 'CANDOLIM', '2018-12-17 11:53:41', 81, 'Test Vinod', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-20', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(30, 19, 81, 20, 81, 'PNR98D8QXRL', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-19', '2018-12-19', '09:15:00', 61, 'CANDOLIM', 'AXIS BANK', '2018-12-17 11:55:45', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-12-21', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(31, 7, 3, 8, 81, 'PNR43GMVEM9', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 350.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-17 12:03:01', 81, 'Vinod', 'goahemtravels@gmail.com', '9822153576', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(32, 7, 3, 8, 81, 'PNR81UB1C3U', 2, 350.00, 350.00, 0.00, 2, 0, 0, 700.00, 0.00, 0.00, 700.00, 700.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 700.00, '2018-12-19', '2018-12-19', '05:00:00', 18, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-12-18 15:12:42', 81, 'Test Vinod', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(33, 7, 3, 8, 81, 'PNR985AIZEG', 2, 350.00, 350.00, 0.00, 2, 0, 0, 700.00, 0.00, 0.00, 700.00, 700.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 700.00, '2018-12-20', '2018-12-20', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 11:10:41', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(34, 9, 81, 13, 81, 'PNR845LZJG3', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, '2018-12-20', '2018-12-20', '05:00:00', 35, 'CANDOLIM', 'AXIS BANK', '2018-12-19 11:26:47', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 5:00', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(35, 9, 81, 22, 81, 'PNR80FZ7D63', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-20', '2018-12-20', '05:00:00', 68, 'CANDOLIM', 'AXIS BANK', '2018-12-19 12:15:53', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 5:00', 'goahemtravels@gmail.com', '8322489218', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(36, 7, 3, 8, 81, 'PNR57HQ9X3S', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 350.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 13:14:27', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(37, 7, 3, 8, 81, 'PNR69PDZIGH', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 50.00, 0.00, 0.00, 0.00, 0.00, 300.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 13:47:51', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(38, 11, 81, 12, 101, 'PNR43JUR9ZQ', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3000.00, '2018-12-21', '2018-12-21', '08:30:00', 33, 'CALANGUTE', 'KFC', '2018-12-19 17:27:16', 81, 'Jaks', 'anjaneya.developer@gmail.com', '7373112889', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(39, 19, 81, 20, 81, 'PNR50ZKAUFX', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-21', '2018-12-21', '09:00:00', 60, 'CALANGUTE', 'KFC', '2018-12-20 14:48:42', 81, 'Mr Gaurav Kaushik, At KFC Main Gate At 8:45', 'goahemtravels@gmail.com', '9654406897', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_book_pay_details`
--

CREATE TABLE `trip_book_pay_details` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_book_pay_details`
--

INSERT INTO `trip_book_pay_details` (`id`, `book_pay_id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `from_user_id`, `from_trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `net_price`, `vendor_amt`, `vendor_offer_amt`, `vendor_cash_amt`, `your_amt`, `servicecharge_amt`, `gst_percentage`, `gst_amt`, `round_off`, `your_final_amt`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `booked_to`, `booked_email`, `booked_phone_no`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `pay_details_id`, `isactive`) VALUES
(1, 1, 0, 80, 3, 98, 3, 80, 'PNR74FRVCUH', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-27', '2018-11-27', '07:00:00', 10, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-26 17:13:05', 80, 'Gust', 'gust@gmail.com', '7373112889', 5, 1, 1, 1, '2018-11-29', 0, NULL, 0, NULL, NULL, 11, NULL, 1, 1, 1),
(2, 2, 0, 79, 1, 81, 2, 79, 'PNR14CPLFR1', 6, 3000.00, 3000.00, 0.00, 6, 0, 0, 18000.00, 0.00, 0.00, 18000.00, 18000.00, 1, 0, '', 0.00, 0.00, 0.00, 0.00, 18000.00, 0.00, 0.00, 0.00, 17640.00, 360.00, 0.00, 0.00, 0.00, 17640.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:34:22', 81, 'Ms Gala, Sea Shell Villas, At Reception At 6:00', 'goahemtravels@gmail.com', '9257027473', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 17, NULL, 1, 3, 1),
(3, 2, 1, 81, 2, 81, 2, 81, 'PNR14CPLFR1', 6, 2000.00, 2000.00, 0.00, 6, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 0.00, 0.00, 0.00, -6000.00, 0.00, 18000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:34:22', 81, 'Ms Gala, Sea Shell Villas, At Reception At 6:00', 'goahemtravels@gmail.com', '9257027473', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 19, NULL, 1, 2, 1),
(4, 3, 0, 79, 1, 81, 2, 79, 'PNR12B4IPZR', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 1, 0, '', 0.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 2940.00, 60.00, 0.00, 0.00, 0.00, 2940.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:48:30', 81, 'Mr Nicolai, Acacia -328, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 25, NULL, 1, 5, 1),
(5, 3, 1, 81, 2, 81, 2, 81, 'PNR12B4IPZR', 1, 2000.00, 2000.00, 0.00, 1, 0, 0, 2000.00, 0.00, 0.00, 2000.00, 2000.00, 0, 0, '', 0.00, 0.00, 0.00, -1000.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-11-28', '2018-11-28', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-27 13:48:30', 81, 'Mr Nicolai, Acacia -328, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-11-30', 0, NULL, 0, NULL, NULL, 27, NULL, 1, 4, 1),
(6, 4, 0, 79, 1, 81, 2, 79, 'PNR592LUHNX', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 1, 0, '', 0.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 5880.00, 120.00, 0.00, 0.00, 0.00, 5880.00, '2018-12-01', '2018-12-01', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-30 13:36:34', 81, 'Mr Valerie, Alor Grand-403, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-03', 0, NULL, 0, NULL, NULL, 63, NULL, 1, 7, 1),
(7, 4, 1, 81, 2, 81, 2, 81, 'PNR592LUHNX', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 0.00, 0.00, 0.00, -2000.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-01', '2018-12-01', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-11-30 13:36:34', 81, 'Mr Valerie, Alor Grand-403, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-03', 0, NULL, 0, NULL, NULL, 65, NULL, 1, 6, 1),
(8, 5, 0, 79, 9, 81, 13, 79, 'PNR12IH2EPM', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 4900.00, 100.00, 0.00, 0.00, 0.00, 4900.00, '2018-12-01', '2018-12-01', '04:45:00', 34, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-30 15:04:25', 81, 'Ms Ekaterina, Princess De Goa -A108, At Reception At 5:00 Hrs', 'goahemtravels@gmail.com', '9607335096', 5, 1, 1, 1, '2018-12-03', 0, NULL, 0, NULL, NULL, 71, NULL, 1, 9, 1),
(9, 5, 9, 81, 13, 81, 13, 81, 'PNR12IH2EPM', 1, 5000.00, 5000.00, 0.00, 1, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-01', '2018-12-01', '04:45:00', 34, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-11-30 15:04:26', 81, 'Ms Ekaterina, Princess De Goa -A108, At Reception At 5:00 Hrs', 'goahemtravels@gmail.com', '9607335096', 5, 1, 1, 1, '2018-12-03', 0, NULL, 0, NULL, NULL, 73, NULL, 1, 8, 1),
(10, 6, 0, 80, 7, 99, 8, 80, 'PNR84IADW4R', 1, 300.00, 300.00, 0.00, 1, 0, 0, 300.00, 0.00, 0.00, 300.00, 300.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 280.00, 20.00, 0.00, 0.00, 0.00, 280.00, '2018-11-30', '2018-11-30', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-11-30 17:11:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-02', 0, NULL, 0, NULL, NULL, 43, NULL, 1, 11, 1),
(11, 6, 7, 3, 8, 99, 8, 3, 'PNR84IADW4R', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 50.00, 300.00, 0.00, 0.00, 30.00, 20.00, 0.00, 0.00, 0.00, 30.00, '2018-11-30', '2018-11-30', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-11-30 17:11:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-02', 0, NULL, 0, NULL, NULL, 49, NULL, 1, 10, 1),
(12, 7, 0, 80, 7, 99, 8, 80, 'PNR06HCVQIT', 1, 300.00, 300.00, 0.00, 1, 0, 0, 300.00, 0.00, 0.00, 300.00, 300.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 280.00, 20.00, 0.00, 0.00, 0.00, 280.00, '2018-12-02', '2018-12-02', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-02 13:47:41', 99, 'Karthik', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-04', 0, NULL, 0, NULL, NULL, 82, NULL, 1, 13, 1),
(13, 7, 7, 3, 8, 99, 8, 3, 'PNR06HCVQIT', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 50.00, 300.00, 0.00, 0.00, 30.00, 20.00, 0.00, 0.00, 0.00, 30.00, '2018-12-02', '2018-12-02', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-02 13:47:41', 99, 'Karthik', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-04', 0, NULL, 0, NULL, NULL, 88, NULL, 1, 12, 1),
(14, 8, 0, 80, 7, 99, 8, 80, 'PNR58K0A1TZ', 1, 300.00, 300.00, 0.00, 1, 0, 0, 300.00, 0.00, 0.00, 300.00, 300.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 280.00, 20.00, 0.00, 0.00, 0.00, 280.00, '2018-12-02', '2018-12-02', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-02 14:10:06', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-04', 0, NULL, 0, NULL, NULL, 94, NULL, 1, 15, 1),
(15, 8, 7, 3, 8, 99, 8, 3, 'PNR58K0A1TZ', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 50.00, 300.00, 0.00, 0.00, 30.00, 20.00, 0.00, 0.00, 0.00, 30.00, '2018-12-02', '2018-12-02', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-02 14:10:07', 99, 'Karthi', 'karthikraja.ckr@gmail.com', '9942493382', 5, 1, 1, 1, '2018-12-04', 0, NULL, 0, NULL, NULL, 100, NULL, 1, 14, 1),
(16, 9, 0, 79, 5, 101, 6, 79, 'PNR15EZWIOB', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-04', '2018-12-04', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-03 09:32:32', 81, 'Ravi', 'ravi@mail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 17, 1),
(17, 9, 5, 81, 6, 101, 6, 81, 'PNR15EZWIOB', 1, 1500.00, 1500.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, '', 0.00, 0.00, 0.00, -1000.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-04', '2018-12-04', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-03 09:32:32', 81, 'Ravi', 'ravi@mail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 16, 1),
(18, 10, 0, 79, 1, 81, 2, 79, 'PNR36DPWF4W', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 2, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-04', '2018-12-04', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-03 10:57:28', 81, 'Ms Ekaterina, Luva Nova-F1, Baga, At Reception At 5:45', 'goahemtravels@gmail.com', '7757829687', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 19, 1),
(19, 10, 1, 81, 2, 81, 2, 81, 'PNR36DPWF4W', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 100.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-04', '2018-12-04', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-03 10:57:28', 81, 'Ms Ekaterina, Luva Nova-F1, Baga, At Reception At 5:45', 'goahemtravels@gmail.com', '7757829687', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 18, 1),
(20, 11, 0, 79, 5, 101, 6, 79, 'PNR51BZMIR9', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-04', '2018-12-04', '15:00:00', 14, 'CANDOLIM', 'AXIS BANK', '2018-12-03 13:04:51', 81, 'Ravi', 'ravi@mail.com', '7373112889', 5, 1, 1, 1, '2018-12-06', 0, NULL, 0, NULL, NULL, 112, NULL, 1, 21, 1),
(21, 11, 5, 81, 6, 101, 6, 81, 'PNR51BZMIR9', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-04', '2018-12-04', '15:00:00', 14, 'CANDOLIM', 'AXIS BANK', '2018-12-03 13:04:51', 81, 'Ravi', 'ravi@mail.com', '7373112889', 5, 1, 1, 1, '2018-12-06', 0, NULL, 0, NULL, NULL, 114, NULL, 1, 20, 1),
(22, 12, 0, 79, 5, 101, 16, 79, 'PNR05TWZVMD', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-04', '2018-12-04', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-03 14:30:44', 81, 'Ravi', 'ravi@mail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 23, 1),
(23, 12, 5, 81, 16, 101, 16, 81, 'PNR05TWZVMD', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-04', '2018-12-04', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-03 14:30:44', 81, 'Ravi', 'ravi@mail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 22, 1),
(24, 13, 0, 79, 1, 81, 2, 79, 'PNR20ZVCHWV', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 2, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:08:10', 81, 'Ms Natalia, Hotel Sea Breeze - 20, At Reception, At 5:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 25, 1),
(25, 13, 1, 81, 2, 81, 2, 81, 'PNR20ZVCHWV', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 100.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:08:10', 81, 'Ms Natalia, Hotel Sea Breeze - 20, At Reception, At 5:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 24, 1),
(26, 14, 0, 79, 1, 81, 2, 79, 'PNR356DIE5Y', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 2, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:12:10', 81, 'Mr Nicolai, Perolo Do Mar-108, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 27, 1),
(27, 14, 1, 81, 2, 81, 2, 81, 'PNR356DIE5Y', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 100.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-05', '2018-12-05', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:12:10', 81, 'Mr Nicolai, Perolo Do Mar-108, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 26, 1),
(28, 15, 0, 79, 9, 81, 13, 79, 'PNR04R3E8LS', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 9800.00, 200.00, 0.00, 0.00, 0.00, 9800.00, '2018-12-06', '2018-12-06', '05:00:00', 35, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:15:25', 81, 'Ms Natalia, Sea Breeze-20, At Reception At 5:00', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-08', 0, NULL, 0, NULL, NULL, 120, NULL, 1, 29, 1),
(29, 15, 9, 81, 13, 81, 13, 81, 'PNR04R3E8LS', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-06', '2018-12-06', '05:00:00', 35, 'CANDOLIM', 'AXIS BANK', '2018-12-04 11:15:25', 81, 'Ms Natalia, Sea Breeze-20, At Reception At 5:00', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-08', 0, NULL, 0, NULL, NULL, 122, NULL, 1, 28, 1),
(30, 16, 0, 79, 17, 81, 18, 79, 'PNR101DVUET', 1, 10000.00, 10000.00, 0.00, 1, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 1, 0, '', 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 9800.00, 200.00, 0.00, 0.00, 0.00, 9800.00, '2018-12-06', '2018-12-08', '05:00:00', 54, 'BAGA', 'CCD', '2018-12-05 09:08:38', 81, 'Ms Ekaterina, Hotel Luvo Nova-F1, Baga, At Reception At 5:00', 'goahemtravels@gmail.com', '7757829687', 5, 1, 1, 1, '2018-12-10', 0, NULL, 0, NULL, NULL, 131, NULL, 1, 31, 1),
(31, 16, 17, 81, 18, 81, 18, 81, 'PNR101DVUET', 1, 10000.00, 10000.00, 0.00, 1, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-06', '2018-12-08', '05:00:00', 54, 'BAGA', 'CCD', '2018-12-05 09:08:38', 81, 'Ms Ekaterina, Hotel Luvo Nova-F1, Baga, At Reception At 5:00', 'goahemtravels@gmail.com', '7757829687', 5, 1, 1, 1, '2018-12-10', 0, NULL, 0, NULL, NULL, 133, NULL, 1, 30, 1),
(32, 17, 0, 79, 5, 103, 16, 79, 'PNR61F7HQRX', 2, 2500.00, 2500.00, 0.00, 2, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 4900.00, 100.00, 0.00, 0.00, 0.00, 4900.00, '2018-12-07', '2018-12-07', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-06 15:46:35', 81, 'Mr Alexander, Ave Maria-101, At Reception At 15:00 Hrs', 'goahemtravels@gmailc.om', '9616341565', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 33, 1),
(33, 17, 5, 81, 16, 103, 16, 81, 'PNR61F7HQRX', 2, 2500.00, 2500.00, 0.00, 2, 0, 0, 5000.00, 0.00, 0.00, 5000.00, 5000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 5000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-07', '2018-12-07', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-06 15:46:35', 81, 'Mr Alexander, Ave Maria-101, At Reception At 15:00 Hrs', 'goahemtravels@gmailc.om', '9616341565', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 32, 1),
(34, 18, 0, 79, 1, 81, 2, 79, 'PNR20NX950E', 3, 3000.00, 3000.00, 0.00, 3, 0, 0, 9000.00, 0.00, 0.00, 9000.00, 9000.00, 2, 0, '', 100.00, 0.00, 0.00, 9000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-09', '2018-12-09', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-08 14:32:41', 81, 'Ms Irene, Ave Maria - 102, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 35, 1),
(35, 18, 1, 81, 2, 81, 2, 81, 'PNR20NX950E', 3, 2000.00, 2000.00, 0.00, 3, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 100.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 9000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-09', '2018-12-09', '06:00:00', 7, 'CANDOLIM', 'AXIS BANK', '2018-12-08 14:32:41', 81, 'Ms Irene, Ave Maria - 102, At Reception At 6:00', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 34, 1),
(36, 19, 0, 79, 5, 101, 16, 79, 'PNR19UHRXCO', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-11', '2018-12-11', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-10 00:17:58', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 37, 1),
(37, 19, 5, 81, 16, 101, 16, 81, 'PNR19UHRXCO', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-11', '2018-12-11', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-10 00:17:58', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 36, 1),
(38, 20, 0, 79, 5, 101, 16, 79, 'PNR183JIZFH', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-11', '2018-12-11', '15:15:00', 50, 'CALANGUTE', 'KFC', '2018-12-10 00:28:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-13', 0, NULL, 0, NULL, NULL, 145, NULL, 1, 39, 1),
(39, 20, 5, 81, 16, 101, 16, 81, 'PNR183JIZFH', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-11', '2018-12-11', '15:15:00', 50, 'CALANGUTE', 'KFC', '2018-12-10 00:28:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-13', 0, NULL, 0, NULL, NULL, 147, NULL, 1, 38, 1),
(40, 21, 0, 80, 3, 57, 4, 80, 'PNR95VGQENS', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 9800.00, 200.00, 0.00, 0.00, 0.00, 9800.00, '2018-12-12', '2018-12-12', '06:45:00', 11, 'CALANGUTE', 'TEMPLE', '2018-12-10 05:55:15', 81, 'Vinod Test', 'v_inod_v@yahoo.com', '9822153576', 5, 1, 1, 1, '2018-12-14', 0, NULL, 0, NULL, NULL, 161, NULL, 1, 41, 1),
(41, 21, 3, 81, 4, 57, 4, 81, 'PNR95VGQENS', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-12', '2018-12-12', '06:45:00', 11, 'CALANGUTE', 'TEMPLE', '2018-12-10 05:55:15', 81, 'Vinod Test', 'v_inod_v@yahoo.com', '9822153576', 5, 1, 1, 1, '2018-12-14', 0, NULL, 0, NULL, NULL, 163, NULL, 1, 40, 1),
(42, 22, 0, 79, 5, 101, 16, 79, 'PNR83UOCJ9T', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-11', '2018-12-11', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-10 17:01:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-13', 0, NULL, 0, NULL, NULL, 153, NULL, 1, 43, 1),
(43, 22, 5, 81, 16, 101, 16, 81, 'PNR83UOCJ9T', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-11', '2018-12-11', '15:00:00', 49, 'CANDOLIM', 'AXIS BANK', '2018-12-10 17:01:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-13', 0, NULL, 0, NULL, NULL, 155, NULL, 1, 42, 1),
(44, 23, 0, 79, 5, 101, 6, 79, 'PNR7681KOIL', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-11', '2018-12-11', '15:00:00', 14, 'CANDOLIM', 'AXIS BANK', '2018-12-10 17:40:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 45, 1),
(45, 23, 5, 81, 6, 101, 6, 81, 'PNR7681KOIL', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-11', '2018-12-11', '15:00:00', 14, 'CANDOLIM', 'AXIS BANK', '2018-12-10 17:40:26', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 44, 1),
(46, 24, 0, 102, 19, 81, 20, 102, 'PNR83PAZQMD', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 5, 0, '', 100.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-12', '2018-12-12', '09:15:00', 59, 'CANDOLIM HEM TRAVELS', 'CANDOLIM', '2018-12-11 11:17:40', 81, 'TEST BOOKING, AT DELHINO SUPERMARKET', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 47, 1),
(47, 24, 19, 81, 20, 81, 20, 81, 'PNR83PAZQMD', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 100.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-12', '2018-12-12', '09:15:00', 59, 'CANDOLIM HEM TRAVELS', 'CANDOLIM', '2018-12-11 11:17:40', 81, 'TEST BOOKING, AT DELHINO SUPERMARKET', 'goahemtravels@gmail.com', '9822153576', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 46, 1),
(48, 25, 0, 79, 1, 101, 1, 79, 'PNR51ZPETC7', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-16', '2018-12-16', '06:00:00', 2, 'CANDOLIM', 'AXIS BANK', '2018-12-14 16:29:19', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 5, 1, 1, 1, '2018-12-18', 0, NULL, 0, NULL, NULL, 184, NULL, 1, 48, 1),
(49, 26, 0, 79, 5, 101, 6, 79, 'PNR84GJH80R', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-15', '2018-12-15', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-14 17:23:54', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 50, 1),
(50, 26, 5, 81, 6, 101, 6, 81, 'PNR84GJH80R', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-15', '2018-12-15', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-14 17:23:54', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 49, 1),
(51, 27, 0, 79, 5, 101, 6, 79, 'PNR06AYXTI4', 1, 2500.00, 2500.00, 0.00, 1, 0, 0, 2500.00, 0.00, 0.00, 2500.00, 2500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 2450.00, 50.00, 0.00, 0.00, 0.00, 2450.00, '2018-12-15', '2018-12-15', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-14 17:26:28', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 52, 1),
(52, 27, 5, 81, 6, 101, 6, 81, 'PNR06AYXTI4', 1, 3500.00, 3500.00, 0.00, 1, 0, 0, 3500.00, 0.00, 0.00, 3500.00, 3500.00, 0, 0, '', 0.00, 0.00, 1000.00, 0.00, 0.00, 2500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-15', '2018-12-15', '15:00:00', 15, 'CANDOLIM', 'AXIS BANK', '2018-12-14 17:26:28', 81, 'Jaky', 'anjaneya.developer@gmail.com', '7373112889', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 51, 1),
(53, 28, 0, 79, 1, 81, 2, 79, 'PNR19K2URA5', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 2, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-18', '2018-12-18', '06:00:00', 5, 'HEM TRAVELS CANDOLIM', 'HEM TRAVELS OFFICE', '2018-12-17 09:42:18', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-12-20', 0, NULL, 0, NULL, NULL, 197, NULL, 1, 54, 1),
(54, 28, 1, 81, 2, 81, 2, 81, 'PNR19K2URA5', 2, 2000.00, 2000.00, 0.00, 2, 0, 0, 4000.00, 0.00, 0.00, 4000.00, 4000.00, 0, 0, '', 100.00, 0.00, 4000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-18', '2018-12-18', '06:00:00', 5, 'HEM TRAVELS CANDOLIM', 'HEM TRAVELS OFFICE', '2018-12-17 09:42:18', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 6:00', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-12-20', 0, NULL, 0, NULL, NULL, 199, NULL, 1, 53, 1),
(55, 29, 0, 102, 19, 81, 20, 102, 'PNR54CP6OBC', 4, 1500.00, 1500.00, 0.00, 4, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 5, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-18', '2018-12-18', '09:15:00', 59, 'CANDOLIM HEM TRAVELS', 'CANDOLIM', '2018-12-17 11:53:41', 81, 'Test Vinod', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-20', 0, NULL, 0, NULL, NULL, 205, NULL, 1, 56, 1),
(56, 29, 19, 81, 20, 81, 20, 81, 'PNR54CP6OBC', 4, 1500.00, 1500.00, 0.00, 4, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 100.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-18', '2018-12-18', '09:15:00', 59, 'CANDOLIM HEM TRAVELS', 'CANDOLIM', '2018-12-17 11:53:41', 81, 'Test Vinod', 'goahemtravels@gmail.com', '9822153576', 5, 1, 1, 1, '2018-12-20', 0, NULL, 0, NULL, NULL, 207, NULL, 1, 55, 1),
(57, 30, 0, 102, 19, 81, 20, 102, 'PNR98D8QXRL', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 5, 0, '', 100.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-19', '2018-12-19', '09:15:00', 61, 'CANDOLIM', 'AXIS BANK', '2018-12-17 11:55:45', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-12-21', 0, NULL, 0, NULL, NULL, 217, NULL, 1, 58, 1),
(58, 30, 19, 81, 20, 81, 20, 81, 'PNR98D8QXRL', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 100.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-19', '2018-12-19', '09:15:00', 61, 'CANDOLIM', 'AXIS BANK', '2018-12-17 11:55:45', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 5, 1, 1, 1, '2018-12-21', 0, NULL, 0, NULL, NULL, 219, NULL, 1, 57, 1),
(59, 31, 0, 80, 7, 81, 8, 80, 'PNR43GMVEM9', 1, 300.00, 300.00, 0.00, 1, 0, 0, 300.00, 0.00, 0.00, 300.00, 300.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 280.00, 20.00, 0.00, 0.00, 0.00, 280.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-17 12:03:01', 81, 'Vinod', 'goahemtravels@gmail.com', '9822153576', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 60, 1),
(60, 31, 7, 3, 8, 81, 8, 3, 'PNR43GMVEM9', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 50.00, 300.00, 0.00, 0.00, 30.00, 20.00, 0.00, 0.00, 0.00, 30.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-17 12:03:01', 81, 'Vinod', 'goahemtravels@gmail.com', '9822153576', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 59, 1),
(61, 32, 0, 80, 7, 81, 8, 80, 'PNR81UB1C3U', 2, 300.00, 300.00, 0.00, 2, 0, 0, 600.00, 0.00, 0.00, 600.00, 600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 600.00, 0.00, 0.00, 0.00, 580.00, 20.00, 0.00, 0.00, 0.00, 580.00, '2018-12-19', '2018-12-19', '05:00:00', 18, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-12-18 15:12:42', 81, 'Test Vinod', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 62, 1),
(62, 32, 7, 3, 8, 81, 8, 3, 'PNR81UB1C3U', 2, 350.00, 350.00, 0.00, 2, 0, 0, 700.00, 0.00, 0.00, 700.00, 700.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 100.00, 600.00, 0.00, 0.00, 80.00, 20.00, 0.00, 0.00, 0.00, 80.00, '2018-12-19', '2018-12-19', '05:00:00', 18, 'CALANGUTE', 'DOLPHIN CIRCLE', '2018-12-18 15:12:42', 81, 'Test Vinod', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 61, 1),
(63, 33, 0, 80, 7, 81, 8, 80, 'PNR985AIZEG', 2, 300.00, 300.00, 0.00, 2, 0, 0, 600.00, 0.00, 0.00, 600.00, 600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 600.00, 0.00, 0.00, 0.00, 580.00, 20.00, 0.00, 0.00, 0.00, 580.00, '2018-12-20', '2018-12-20', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 11:10:41', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 64, 1),
(64, 33, 7, 3, 8, 81, 8, 3, 'PNR985AIZEG', 2, 350.00, 350.00, 0.00, 2, 0, 0, 700.00, 0.00, 0.00, 700.00, 700.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 100.00, 600.00, 0.00, 0.00, 80.00, 20.00, 0.00, 0.00, 0.00, 80.00, '2018-12-20', '2018-12-20', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 11:10:41', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 63, 1),
(65, 34, 0, 79, 9, 81, 13, 79, 'PNR845LZJG3', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 9800.00, 200.00, 0.00, 0.00, 0.00, 9800.00, '2018-12-20', '2018-12-20', '05:00:00', 35, 'CANDOLIM', 'AXIS BANK', '2018-12-19 11:26:47', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 5:00', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 66, 1),
(66, 34, 9, 81, 13, 81, 13, 81, 'PNR845LZJG3', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-20', '2018-12-20', '05:00:00', 35, 'CANDOLIM', 'AXIS BANK', '2018-12-19 11:26:47', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 5:00', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 65, 1),
(67, 35, 0, 79, 9, 81, 22, 79, 'PNR80FZ7D63', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 6, 0, '', 100.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-20', '2018-12-20', '05:00:00', 68, 'CANDOLIM', 'AXIS BANK', '2018-12-19 12:15:53', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 5:00', 'goahemtravels@gmail.com', '8322489218', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 68, 1),
(68, 35, 9, 81, 22, 81, 22, 81, 'PNR80FZ7D63', 2, 5000.00, 5000.00, 0.00, 2, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, '', 100.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-20', '2018-12-20', '05:00:00', 68, 'CANDOLIM', 'AXIS BANK', '2018-12-19 12:15:53', 81, 'Mr Sergey, Per Avel - 5A, At Reception At 5:00', 'goahemtravels@gmail.com', '8322489218', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 67, 1),
(69, 36, 0, 80, 7, 81, 8, 80, 'PNR57HQ9X3S', 1, 300.00, 300.00, 0.00, 1, 0, 0, 300.00, 0.00, 0.00, 300.00, 300.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 280.00, 20.00, 0.00, 0.00, 0.00, 280.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 13:14:27', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 70, 1),
(70, 36, 7, 3, 8, 81, 8, 3, 'PNR57HQ9X3S', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 50.00, 300.00, 0.00, 0.00, 30.00, 20.00, 0.00, 0.00, 0.00, 30.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 13:14:27', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 69, 1),
(71, 37, 0, 80, 7, 81, 8, 80, 'PNR69PDZIGH', 1, 300.00, 300.00, 0.00, 1, 0, 0, 300.00, 0.00, 0.00, 300.00, 300.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 280.00, 20.00, 0.00, 0.00, 0.00, 280.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 13:47:51', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 72, 1),
(72, 37, 7, 3, 8, 81, 8, 3, 'PNR69PDZIGH', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 50.00, 0.00, 0.00, 300.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-21', '2018-12-21', '05:05:00', 17, 'calangute', 'dolphin circle', '2018-12-19 13:47:51', 81, 'Test Vinod, At Delphino Super Market, At 9:15', 'goahemtravels@gmail.com', '8322489218', 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 71, 1),
(73, 38, 0, 79, 11, 101, 12, 79, 'PNR43JUR9ZQ', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 2940.00, 60.00, 0.00, 0.00, 0.00, 2940.00, '2018-12-21', '2018-12-21', '08:30:00', 33, 'CALANGUTE', 'KFC', '2018-12-19 17:27:16', 81, 'Jaks', 'anjaneya.developer@gmail.com', '7373112889', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 74, 1),
(74, 38, 11, 81, 12, 101, 12, 81, 'PNR43JUR9ZQ', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-21', '2018-12-21', '08:30:00', 33, 'CALANGUTE', 'KFC', '2018-12-19 17:27:16', 81, 'Jaks', 'anjaneya.developer@gmail.com', '7373112889', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 73, 1),
(75, 39, 0, 102, 19, 81, 20, 102, 'PNR50ZKAUFX', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 5, 0, '', 100.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2018-12-21', '2018-12-21', '09:00:00', 60, 'CALANGUTE', 'KFC', '2018-12-20 14:48:42', 81, 'Mr Gaurav Kaushik, At KFC Main Gate At 8:45', 'goahemtravels@gmail.com', '9654406897', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 76, 1),
(76, 39, 19, 81, 20, 81, 20, 81, 'PNR50ZKAUFX', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 100.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2018-12-21', '2018-12-21', '09:00:00', 60, 'CALANGUTE', 'KFC', '2018-12-20 14:48:42', 81, 'Mr Gaurav Kaushik, At KFC Main Gate At 8:45', 'goahemtravels@gmail.com', '9654406897', 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_category`
--

CREATE TABLE `trip_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `img_name` varchar(200) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `trip_comment` (
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

CREATE TABLE `trip_gallery` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(14, 17, '1543470022_jungle_safari_in_bandhavgarh.jpg', 1),
(15, 21, '1544766278_maxresdefault.jpg', 1),
(16, 21, '1544766291_c7h3vxckppckdrd6ylx8.jpg', 1),
(17, 21, '1544766299_dandeli-camping_h0o6vy.jpg', 1),
(18, 21, '1544766323_img_3f32ac3d13c99057f3397069661398b0_1524067228293_original.jpg', 1),
(19, 21, '1544766349_smallheader4.jpg', 1),
(20, 21, '1544766355_trekking.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_inclusions`
--

CREATE TABLE `trip_inclusions` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `trip_inclusions_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `inclusions_id` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(95, 18, 2, 0),
(96, 18, 3, 0),
(97, 18, 4, 0),
(98, 18, 5, 0),
(99, 18, 6, 0),
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
(135, 2, 1, 0),
(136, 2, 2, 0),
(137, 2, 3, 0),
(138, 2, 4, 0),
(139, 2, 5, 0),
(140, 18, 2, 1),
(141, 18, 3, 1),
(142, 18, 4, 1),
(143, 18, 5, 1),
(144, 18, 6, 1),
(145, 19, 1, 1),
(146, 19, 2, 1),
(147, 19, 3, 1),
(148, 19, 4, 1),
(149, 20, 1, 0),
(150, 20, 2, 0),
(151, 20, 3, 0),
(152, 20, 4, 0),
(153, 21, 1, 0),
(154, 21, 2, 0),
(155, 21, 3, 0),
(156, 21, 4, 0),
(157, 21, 5, 0),
(158, 21, 6, 0),
(159, 21, 1, 1),
(160, 21, 2, 1),
(161, 21, 3, 1),
(162, 21, 4, 1),
(163, 21, 5, 1),
(164, 21, 6, 1),
(165, 20, 1, 1),
(166, 20, 2, 1),
(167, 20, 3, 1),
(168, 20, 4, 1),
(169, 2, 1, 1),
(170, 2, 2, 1),
(171, 2, 3, 1),
(172, 2, 4, 1),
(173, 2, 5, 1),
(174, 22, 2, 1),
(175, 22, 3, 1),
(176, 22, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_itinerary`
--

CREATE TABLE `trip_itinerary` (
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

CREATE TABLE `trip_master` (
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
  `total_booking` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `view_to` int(1) DEFAULT '1' COMMENT '1- Customer & Vendor,2-Vendor',
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_master`
--

INSERT INTO `trip_master` (`id`, `trip_code`, `user_id`, `trip_category_id`, `trip_name`, `trip_url`, `trip_img_name`, `parent_trip_id`, `address1`, `address2`, `city_id`, `state_id`, `country_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `trip_duration`, `how_many_days`, `how_many_nights`, `total_days`, `how_many_time`, `how_many_hours`, `brief_description`, `other_inclusions`, `exclusions`, `languages`, `meal`, `transport`, `things_to_carry`, `advisory`, `tour_type`, `cancellation_policy`, `confirmation_policy`, `refund_policy`, `meeting_point`, `meeting_time`, `no_of_traveller`, `no_of_min_booktraveller`, `no_of_max_booktraveller`, `status`, `is_terms_accpet`, `booking_cut_of_time_type`, `booking_cut_of_day`, `booking_cut_of_time`, `booking_max_cut_of_month`, `is_shared`, `trip_shared_id`, `total_rating`, `total_booking`, `view_to`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'TRIPyb7ZpaY', 79, 14, 'WATERFALLS (R)', 'waterfalls-r', '1543469425_925692944s.jpg', 0, NULL, NULL, 7, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES DUDHSAGAR WATERFALLS, JEEP SAFARI, ENTRY FEES, LIFE JACKETS. IT ALSO INCLUDES ENTRY TO THE SPICE PLANTATION, ITS TOUR AND LUNCH AT THE PLANTATION. AFTER THAT YOU VISIT THE OLD GOA CHURCH AND THE TEMPLE.', 'AC TRANSFERS&lt;br&gt;JEEP SAFARI,&lt;br&gt;ENTRY FEES&lt;br&gt;LUNCH&lt;br&gt;SPICE PLANTATION TOUR', 'ANY EXPENSES WHICH NOT MENTIONED IN INCLUSIONS', '', 'VEG AND NON VEG', 'IT IS GROUP TOUR BY AN AIR CONDITIONED VEHICLE. BUT THE JEEP AT THE WATERFALLS IS NOT AIR CONDITIONED.', NULL, NULL, NULL, '100% IF CANCELLED 5 DAYS BEFORE&lt;br&gt;50% BETWEEN 5-2 DAYS&lt;br&gt;0 % IF CANCELLED IN 2 DAYS BEFORE&amp;nbsp;', 'ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '05:45', 20, 1, 10, 1, 1, 2, 0, 10, 1, 0, 0, 0.0, 1, 2, 1, '2018-11-16 09:54:00', 79, '2018-12-01 05:43:28', 79),
(2, 'TRIPB3ZP4dW', 81, 14, 'WATERFALLS (R)', 'waterfalls-r', '', 1, NULL, NULL, 7, 2, 0, 2000, 2000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES DUDHSAGAR WATERFALLS, JEEP SAFARI, ENTRY FEES, LIFE JACKETS. IT ALSO INCLUDES ENTRY TO THE SPICE PLANTATION, ITS TOUR AND LUNCH AT THE PLANTATION. AFTER THAT YOU VISIT THE OLD GOA CHURCH AND THE TEMPLE.', 'AC TRANSFERS&lt;br&gt;JEEP SAFARI,&lt;br&gt;ENTRY FEES&lt;br&gt;LUNCH&lt;br&gt;SPICE PLANTATION TOUR', 'ANY EXPENSES WHICH NOT MENTIONED IN INCLUSIONS', '', 'VEG AND NON VEG', 'IT IS GROUP TOUR BY AN AIR CONDITIONED VEHICLE. BUT THE JEEP AT THE WATERFALLS IS NOT AIR CONDITIONED.', NULL, NULL, NULL, '', 'ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'DELPHINO CANDOLIM', '06:00', 20, 1, 10, 1, 1, 2, 0, 10, 2, 0, 1, 0.0, 20, 1, 1, '2018-11-16 10:10:37', 81, '2018-12-17 15:09:43', 81),
(3, 'TRIPQysIwpd', 80, 13, 'RAFTING', 'rafting', '', 0, NULL, NULL, 7, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 8, 'IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 2 DAYS BEFORE&lt;br&gt;0% 1 DAY BEFORE', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '07:00', 7, 1, 7, 1, 1, 1, 1, 0, 12, 0, 0, 0.0, 1, 2, 1, '2018-11-16 14:40:41', 80, '0000-00-00 00:00:00', 0),
(4, 'TRIP3YKwgtQ', 81, 13, 'RAFTING', 'rafting', '', 3, NULL, NULL, 7, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 8, 'IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.&emsp;IT IS A RAFTING TRIP WHICH INCLUDE THE TRANSFERS THE EQUIPMENTS AND RAFTING GEARS.', NULL, NULL, '', '', NULL, NULL, NULL, NULL, '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 2 DAYS BEFORE&lt;br&gt;0% 1 DAY BEFORE', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '06:45', 7, 1, 7, 1, 1, 1, 0, 0, 12, 0, 2, 0.0, 15, 1, 1, '2018-11-16 14:55:37', 81, '2018-11-27 06:52:05', 81),
(5, 'TRIPOhVNBAC', 79, 6, 'CRAB CATCHING', 'crab-catching', '1543469096_Scenic_Fishing_Alaska_Crab_8_1024x1024.jpg', 0, NULL, NULL, 8, 2, 0, 2500, 2500, 0, 1, 0, 0, 0, 0, 5, 'THIS TRIP IS BEAUTIFUL BOAT TRIP. YOU CAN CATCH CRABS. AFTER THAT PROCEED FOR DINNER. THIS INCLUDES THE DRINKS ON THE BOAT. YOU WILL BE PICK UP FROM YOUR HOTEL AND DROPPED BACK AT THE SAME PLACE AFTER THE TRIP.&amp;nbsp;', 'DINNER AND DRINKS ON BOAT', 'DRINKS AT THE RESTAURANT AT DINNER.', '', 'DINNER', 'TRANSFERS, &lt;br&gt;BOAT CHARGE, &lt;br&gt;DINNER&amp;nbsp;&lt;br&gt;DRINKS ON THE BOAT&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS GROUP TOUR.', '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 3 DAYS BEFORE&lt;br&gt;0% 2 DAY BEFORE', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS.', 'CANDOLIM', '15:00', 10, 1, 10, 1, 1, 2, 0, 4, 12, 0, 0, 0.0, 0, 2, 1, '2018-11-19 16:10:31', 79, '2018-11-29 05:27:57', 79),
(6, 'TRIPX6IgUQf', 81, 6, 'CRAB CATCHING', 'crab-catching', '1543429916_handstand-544373_1920.jpg', 5, NULL, NULL, 8, 2, 0, 3500, 3500, 0, 1, 0, 0, 0, 0, 5, 'THIS TRIP IS BEAUTIFUL BOAT TRIP. YOU CAN CATCH CRABS. AFTER THAT PROCEED FOR DINNER. THIS INLCUDES THE DRINKS ON THE BOAT.', 'DINNER AND DRINKS ON BOAT', NULL, '', 'VEG AND NON VEG', 'TRANSFERS, BOAT CHARGE, DINNER&amp;nbsp;', NULL, NULL, 'THIS IS GROUP TOUR.', '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 3 DAYS BEFORE&lt;br&gt;0% 2 DAY BEFORE', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS.', 'CANDOLIM', '15:00', 10, 1, 5, 1, 1, 2, 0, 4, 12, 0, 3, 0.0, 1, 1, 1, '2018-11-19 16:36:23', 81, '2018-11-28 18:32:00', 81),
(7, 'TRIPuNaDr56', 80, 17, 'AIRPORT TRANSFER', 'airport-transfer', '', 0, NULL, NULL, 7, 2, 0, 300, 300, 0, 1, 0, 0, 0, 0, 1, 'THIS IS A DROP TO THE AIRPORT EVERY DAY AT 5:00HRS, 10:00 HRS, 15:00 HRS', NULL, NULL, '', '', 'INCLUDES ONLY THE TRANSPORT', NULL, NULL, 'THIS IS A GROUP TRANSFER', '100% 5 DAYS BEFORE&lt;br&gt;50% 5-3 DAYS BEFORE&lt;br&gt;0% WITHIN 2 DAYS', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '05:00', 40, 1, 10, 1, 1, 2, 0, 2, 1, 0, 0, 0.0, 0, 2, 1, '2018-11-20 08:05:17', 80, '0000-00-00 00:00:00', 0),
(8, 'TRIPF6uRheb', 3, 17, 'AIRPORT TRANSFER', 'airport-transfer', '', 7, NULL, NULL, 7, 2, 0, 350, 350, 0, 1, 0, 0, 0, 0, 1, 'THIS IS A DROP TO THE AIRPORT EVERY DAY AT 5:00HRS, 10:00 HRS, 15:00 HRS', NULL, NULL, '', '', 'INCLUDES ONLY THE TRANSPORT', NULL, NULL, 'THIS IS A GROUP TRANSFER', '100% 5 DAYS BEFORE&lt;br&gt;50% 5-3 DAYS BEFORE&lt;br&gt;0% WITHIN 2 DAYS', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'calangute', '05:05', 40, 1, 10, 1, 1, 2, 0, 2, 1, 0, 10, 0.0, 8, 1, 1, '2018-11-23 08:56:31', 3, '2018-11-23 08:57:06', 3),
(9, 'TRIPw2JaE8v', 79, 14, 'MURDESHWAR (R)', 'murdeshwar', '1543469722_medium_murdeshwar-shiv-temple_814.jpg', 0, NULL, NULL, 8, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 14, 'IN THIS TRIP IT IS VISIT TO MURDESHWAR TEMPLE OF LORD SHIVA. IN THAT TRIP YOU VISIT THE GOKARNA TEMPLE AND THE OM BEACH.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS&lt;br&gt;BREAKFAST&lt;br&gt;ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0 % IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '4:45', 20, 1, 5, 1, 1, 2, 0, 10, 1, 0, 0, 0.0, 0, 2, 1, '2018-11-23 14:14:13', 79, '2018-11-29 05:35:45', 79),
(10, 'TRIP9JElZfK', 79, 14, '1 NIGHT HAMPI (R)', '1-night-hampi-r', '1543469862_hampi.jpg', 0, NULL, NULL, 7, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'TRIP TO HAMPI WITH A GUIDE AND VISIT ALL THE ARCHEALOGICAL SITES. THIS IS A 1 NIGHT AND 2 DAYS TRIP IN A GROUP.', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMMODATION&lt;br&gt;ALL ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0% IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESS IN 5 WORKING DAYS', 'CANDOLIM', '5:00', 20, 1, 10, 1, 1, 2, 0, 10, 1, 0, 0, 0.0, 3, 2, 1, '2018-11-23 14:34:34', 79, '2018-11-29 05:38:00', 79),
(11, 'TRIPwAaZ6tO', 79, 14, 'SOUTH GOA (R)', 'south-goa-r', '1543469547_Palolem_beach.jpg', 0, NULL, NULL, 8, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 12, 'THIS IS TRIP FOR SOUTH GOA PLACES - PALOLEM BEACH, AGONDA BEACH, CABO DE RAMA FORT, BOAT RIDE TO VISIT THE BUTTERFLY ISLAND AND INCLUDES LUNCH.', NULL, NULL, '', 'LUNCH', 'ALL TRANSFER,&lt;br&gt;LUNCH,&lt;br&gt;BOAT RIDE', NULL, NULL, 'THIS IS GROUP TOUR', '100% REFUND ON CANCELLATION BEFORE 5 DAYS&lt;br&gt;50% REFUND ON CANCELLATION BEFORE 3 DAYS&lt;br&gt;0% REFUND ON CANCELLATION BEFORE 2 DAYS&lt;br&gt;', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESS WITHIN 5 WORKING DAYS', 'CALANGUTE', '8:30', 20, 1, 10, 1, 1, 2, 0, 12, 12, 0, 0, 0.0, 0, 2, 1, '2018-11-23 14:48:57', 79, '2018-11-29 05:32:45', 79),
(12, 'TRIPev2nutW', 81, 14, 'SOUTH GOA (R)', 'south-goa-r', '', 11, NULL, NULL, 8, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 12, 'THIS IS TRIP FOR SOUTH GOA PLACES - PALOLEM BEACH, AGONDA BEACH, CABO DE RAMA FORT, BOAT RIDE TO VISIT THE BUTTERFLY ISLAND AND INCLUDES LUNCH.', NULL, NULL, '', 'LUNCH', 'ALL TRANSFER,&lt;br&gt;LUNCH,&lt;br&gt;BOAT RIDE', NULL, NULL, 'THIS IS GROUP TOUR', '100% REFUND ON CANCELLATION BEFORE 5 DAYS&lt;br&gt;50% REFUND ON CANCELLATION BEFORE 3 DAYS&lt;br&gt;0% REFUND ON CANCELLATION BEFORE 2 DAYS&lt;br&gt;', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESS WITHIN 5 WORKING DAYS', 'CANDOLIM', '8:30', 20, 1, 10, 1, 1, 2, 0, 12, 12, 0, 11, 0.0, 1, 1, 1, '2018-11-23 15:48:23', 81, '2018-11-26 09:21:03', 81),
(13, 'TRIPSq7bUTr', 81, 14, 'MURDESHWAR (R)', 'murdeshwar-r', '', 9, NULL, NULL, 8, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 14, 'IN THIS TRIP IT IS VISIT TO MURDESHWAR TEMPLE OF LORD SHIVA. IN THAT TRIP YOU VISIT THE GOKARNA TEMPLE AND THE OM BEACH.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS&lt;br&gt;BREAKFAST&lt;br&gt;ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0 % IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'CALANGUTE', '4:45', 20, 1, 5, 1, 1, 2, 0, 10, 1, 0, 12, 0.0, 3, 1, 0, '2018-11-23 15:50:59', 81, '2018-11-26 09:25:42', 81),
(14, 'TRIPmoEOUez', 81, 14, '1 NIGHT HAMPI (R)', '1-night-hampi-r', '', 10, NULL, NULL, 7, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'TRIP TO HAMPI WITH A GUIDE AND VISIT ALL THE ARCHEALOGICAL SITES. THIS IS A 1 NIGHT AND 2 DAYS TRIP IN A GROUP.', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMMODATION&lt;br&gt;ALL ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0% IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESS IN 5 WORKING DAYS', 'CANDOLIM', '5:00', 20, 1, 10, 1, 1, 2, 0, 10, 1, 0, 13, 0.0, 0, 1, 1, '2018-11-23 16:01:16', 81, '2018-11-26 09:27:17', 81),
(15, 'TRIP8ueGZmL', 91, 14, 'WATERFALLS (R)', 'waterfalls-r', '', 1, NULL, NULL, 7, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES DUDHSAGAR WATERFALLS, JEEP SAFARI, ENTRY FEES, LIFE JACKETS. IT ALSO INCLUDES ENTRY TO THE SPICE PLANTATION, ITS TOUR AND LUNCH AT THE PLANTATION. AFTER THAT YOU VISIT THE OLD GOA CHURCH AND THE TEMPLE.', 'AC TRANSFERS&lt;br&gt;JEEP SAFARI,&lt;br&gt;ENTRY FEES&lt;br&gt;LUNCH&lt;br&gt;SPICE PLANTATION TOUR', 'ANY EXPENSES WHICH NOT MENTIONED IN INCLUSIONS', '', 'VEG AND NON VEG', 'IT IS GROUP TOUR BY AN AIR CONDITIONED VEHICLE. BUT THE JEEP AT THE WATERFALLS IS NOT AIR CONDITIONED.', NULL, NULL, NULL, '100% IF CANCELLED 5 DAYS BEFORE&lt;br&gt;50% BETWEEN 5-2 DAYS&lt;br&gt;0 % IF CANCELLED IN 2 DAYS BEFORE&amp;nbsp;', 'ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'BAGA', '05:45', 20, 1, 10, 1, 1, 2, 0, 10, 1, 1, 15, 0.0, 0, 2, 1, '2018-11-24 10:02:59', 91, '0000-00-00 00:00:00', 0),
(16, 'TRIPb0BK5Xh', 81, 6, 'CRAB CATCHING', 'crab-catching', '', 5, NULL, NULL, 8, 2, 0, 2500, 2500, 0, 1, 0, 0, 0, 0, 5, 'THIS TRIP IS BEAUTIFUL BOAT TRIP. YOU CAN CATCH CRABS. AFTER THAT PROCEED FOR DINNER. THIS INCLUDES THE DRINKS ON THE BOAT. YOU WILL BE PICK UP FROM YOUR HOTEL AND DROPPED BACK AT THE SAME PLACE AFTER THE TRIP.&amp;nbsp;', 'DINNER AND DRINKS ON BOAT', 'DRINKS AT THE RESTAURANT AT DINNER.', '', 'DINNER', 'TRANSFERS, &lt;br&gt;BOAT CHARGE, &lt;br&gt;DINNER&amp;nbsp;&lt;br&gt;DRINKS ON THE BOAT&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS GROUP TOUR.', '100% 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% 3 DAYS BEFORE&lt;br&gt;0% 2 DAY BEFORE', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS.', 'CANDOLIM', '15:30', 10, 1, 10, 1, 1, 2, 0, 4, 12, 0, 20, 0.0, 2, 1, 1, '2018-11-24 11:25:28', 81, '2018-11-26 09:20:32', 81),
(17, 'TRIPYZwVWzL', 79, 8, 'TIGER TRIP', 'tiger-trip', '1543470007_12dfb3b07020bbde2b44bec8b5459ab4.jpg', 0, NULL, NULL, 8, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'THIS IS A TRIP TO THE TIGER RESERVE NEAR SHIMOGA. WE ALSO VISIT THE ELEPHANT TRAINING CAMP.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMODATION&emsp;&lt;br&gt;ENTRY FEES', NULL, NULL, NULL, '100% REFUND IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% REFUND IF CANCELLED BEFORE 2 DAYS&lt;br&gt;0% REFUND IF CANCELLED IN LESS THAN 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 DAYS', 'CANDOLIM', '05:00', 15, 1, 10, 1, 1, 2, 0, 10, 12, 0, 0, 0.0, 0, 2, 1, '2018-11-26 11:56:15', 79, '2018-11-29 05:40:31', 79),
(18, 'TRIPdstVNLg', 81, 8, 'TIGER TRIP', 'tiger-trip', '', 17, NULL, NULL, 8, 2, 0, 10000, 10000, 0, 2, 2, 1, 3, 0, 0, 'THIS IS A TRIP TO THE TIGER RESERVE NEAR SHIMOGA. WE ALSO VISIT THE ELEPHANT TRAINING CAMP.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'TRANSFERS,&lt;br&gt;BREAKFAST&lt;br&gt;1 NIGHT ACCOMODATION&emsp;&lt;br&gt;ENTRY FEES', NULL, NULL, NULL, '100% REFUND IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% REFUND IF CANCELLED BEFORE 2 DAYS&lt;br&gt;0% REFUND IF CANCELLED IN LESS THAN 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 DAYS', 'CANDOLIM', '05:00', 15, 1, 10, 1, 1, 2, 0, 10, 12, 0, 21, 0.0, 3, 2, 1, '2018-11-26 12:11:30', 81, '2018-12-05 09:06:41', 81),
(19, 'TRIPDcSK5QO', 102, 6, 'ISLAND TRIP (H)', 'island-trip-h', '', 0, NULL, NULL, 7, 2, 0, 1500, 1500, 0, 1, 0, 0, 0, 0, 8, 'A BEAUTIFUL BOAT RIDE TO THE ISLAND WHERE YOU CAN SEE THE DOLPHINS PASSING BY AND SNORKEL IN THE SECLUDED BEACH. YOU WILL BE PROVIDED WITH THE SNORKELING GEARS. YOU CAN TRY YOU HAND AT FISHING EXPERIENCE AND YOU WILL BE PROVIDED WITH HOOK AND BAITS. ENJOY THE LUNCH AND DRINKS ON THE TRIP.', 'TRANSFERS&lt;br&gt;BOAT CHARGES&lt;br&gt;LUNCH&lt;br&gt;DRINKS&lt;br&gt;FISHING&lt;br&gt;SNORKELING&lt;br&gt;DOLPHIN', NULL, '', 'VEG AND NON VEG', 'ALL TRANSFERS&lt;br&gt;BOAT CHARGES', 'SUN GLASSES, HAT, SUN CREAM.', NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 4 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 4-2 DAYS&lt;br&gt;0% IF CANCELLED LESS THAN 2 DAYS&lt;br&gt;', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESS IN 5 WORKING DAYS', 'CALANGUTE', '09:00', 20, 1, 10, 1, 1, 2, 0, 14, 12, 0, 0, 0.0, 0, 2, 1, '2018-12-11 16:36:21', 102, '0000-00-00 00:00:00', 0),
(20, 'TRIPtKWijuC', 81, 6, 'ISLAND TRIP (H)', 'island-trip-h', '', 19, NULL, NULL, 7, 2, 0, 1500, 1500, 0, 1, 0, 0, 0, 0, 8, 'A BEAUTIFUL BOAT RIDE TO THE ISLAND WHERE YOU CAN SEE THE DOLPHINS PASSING BY AND SNORKEL IN THE SECLUDED BEACH. YOU WILL BE PROVIDED WITH THE SNORKELING GEARS. YOU CAN TRY YOU HAND AT FISHING EXPERIENCE AND YOU WILL BE PROVIDED WITH HOOK AND BAITS. ENJOY THE LUNCH AND DRINKS ON THE TRIP.', 'TRANSFERS&lt;br&gt;BOAT CHARGES&lt;br&gt;LUNCH&lt;br&gt;DRINKS&lt;br&gt;FISHING&lt;br&gt;SNORKELING&lt;br&gt;DOLPHIN', NULL, '', 'VEG AND NON VEG', 'ALL TRANSFERS&lt;br&gt;BOAT CHARGES', 'SUN GLASSES, HAT, SUN CREAM.', NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 4 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 4-2 DAYS&lt;br&gt;0% IF CANCELLED LESS THAN 2 DAYS&lt;br&gt;', 'CONFIRMATION ON GENERATION OF PNR', 'REFUND WILL BE PROCESS IN 5 WORKING DAYS', 'CANDOLIM HEM TRAVELS', '09:15', 20, 1, 10, 1, 1, 2, 0, 14, 2, 0, 29, 0.0, 8, 2, 1, '2018-12-11 16:44:32', 81, '2018-12-17 15:09:02', 81),
(21, 'TRIPuX2UJKr', 79, 11, 'Adventure Night Camp and Jungke Safari', 'adventure-night-camp-and-jungke-safari', '1544766278_maxresdefault.jpg', 0, NULL, NULL, 8, 2, 0, 12000, 10000, 0, 2, 2, 1, 3, 0, 0, 'Dandeli adventure place includes night camp and also include jungle safari, water rides, jungle stay , kayaking ,&lt;br&gt;&nbsp;buffing ,&nbsp;&nbsp;', NULL, NULL, 'english', 'both', 'all transport charge&amp;nbsp; include', 'carry anything you want', NULL, 'its a adventure place in this jungle have a 90 type of Horn bill birds and also animals &lt;br&gt;', 'refund will be in 3 days', 'confirm before 1 day', 'refund will be process in 3 -5 days', 'candolim newton', '05.00', 13, 1, 5, 1, 1, 2, 0, 2, 6, 0, 0, 0.0, 0, 2, 1, '2018-12-14 11:01:12', 79, '2018-12-14 11:18:25', 79),
(22, 'TRIPTwH7DgP', 81, 14, 'MURDESHWAR (R)', 'murdeshwar-r', '', 9, NULL, NULL, 8, 2, 0, 5000, 5000, 0, 1, 0, 0, 0, 0, 14, 'IN THIS TRIP IT IS VISIT TO MURDESHWAR TEMPLE OF LORD SHIVA. IN THAT TRIP YOU VISIT THE GOKARNA TEMPLE AND THE OM BEACH.&amp;nbsp;', NULL, NULL, '', 'BREAKFAST', 'ALL TRANSFERS&lt;br&gt;BREAKFAST&lt;br&gt;ENTRY FEES&lt;br&gt;&lt;br&gt;', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED BEFORE 5 DAYS&lt;br&gt;50% IF CANCELLED BEFORE 3 DAYS&lt;br&gt;0 % IF CANCELLED BEFORE 2 DAYS', 'CONFIRMATION ON THE GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 5 WORKING DAYS', 'HEM TRAVELS CANDOLIM', '5:00', 20, 1, 5, 1, 1, 2, 0, 10, 1, 1, 30, 0.0, 2, 2, 1, '2018-12-19 17:41:35', 81, '0000-00-00 00:00:00', 0),
(23, 'TRIP6BhKvMe', 81, 14, 'SPECIAL PKG', 'special-pkg', '', 0, NULL, NULL, 8, 2, 0, 1000, 500, 100, 2, 2, 1, 3, 0, 0, 'THIS IS TOUR IS A CUSTOMISED TOURS WHICH ARE NOT SOLD ON REGULAR BASIS. THIS IS PLANNED AS PER THE REQUIREMENTS GIVEN BY THE CUSTOMERS. SO ALL THE DETAILS WILL BE COMMUNICATED BY THE GUEST THROUGH MAIL AND THIS FACILITY WILL BE USED TO DO THE PAYMENT OF THE AMOUNT AGREED ON THE MAIL CONFIRMATION. PLEASE NOTE THAT THIS IS JUST A PAYMENT GATE WAY FACILITY USED BY OUR TRAVEL AGENCY FOR ACCEPTING THE PAYMENT OF OUR TRIPS ONLINE. WE DO NOT COMMIT ANY THING OTHER THAT ACCEPTANCE OF THE PAYMENT AFTER YOU BOOK AND PAY FOR THIS TRIP.', 'PLEASE NOTE THAT YOU ARE BOOKING THIS TRIP AFTER UNDERSTANDING ALL THE POINTS MENTIONED HERE&lt;br&gt;', 'PLEASE NOTE THAT YOU ARE BOOKING THIS TRIP AFTER UNDERSTANDING ALL THE POINTS MENTIONED HERE&lt;br&gt;', '', '', 'AS DISCUSSED IN THE MAIL CORRESPONDENCE', NULL, NULL, NULL, 'THE STANDARD CANCELLATION POLICY IS NOT APPLICABLE ON THIS TOUR AS IT IS DESIGNED AS PER THE SPECIAL REQUESTS BY THE CUSTOMER. SO THE GUEST WILL HAVE TO DISCUSS THE CANCELLATION POLICY ON ONE TO ONE BASIS WITH THE TRAVEL AGENT.', 'CONFIRMATION WILL BE ON THE RECEIPT OF THE PAYMENT AND THE GENERATION ON THE PNR. HOWEVER THIS IS JUST THE PAYMENT STATUS CONFIRATION. IT DOES NOT CONFIRM ANY TRIP RELATED DETAILS. THOSE DETAILS HAS TO BE CONFIRMED BY THE TRAVEL AGENT TO THE GUEST ON MAIL ON ONE TO ONE BASIS.', 'IN THESE TYPE OF SPECIAL TRIPS WE DO NOT GIVE ANY REFUND ONLINE. WE WILL BE GIVING YOU THE REFUND IF ANY ONLY AFTER PROPER&amp;nbsp; DISCUSSION ON ONE TO ONE BASIS. THE REFUND POLICY SHOULD BE FINALISED ON THE MAIL BEFORE THE BOOKING OF THE TRIP. PLEASE NOTE THAT YOU ARE BOOKING THIS TRIP AFTER UNDERSTANDING ALL THE POINTS MENTIONED ABOVE', 'CANDOLIM', '09:00', 100, 1, 100, 1, 1, 2, 0, 1, 2, 0, 0, 0.0, 0, 2, 1, '2018-12-20 19:45:40', 81, '2018-12-20 19:51:19', 81);

-- --------------------------------------------------------

--
-- Table structure for table `trip_shared`
--

CREATE TABLE `trip_shared` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `shared_user_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT '0',
  `to_user_mail` varchar(150) DEFAULT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 - new, 2- maked, 3 - cancelled',
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(26, 'SHARERdvkQ', 17, 79, NULL, 'info@atlantiswatersports.com', 1, 1, 1),
(27, 'SHARErzpe2', 1, 79, NULL, 'info@atlantiswaterspoprts.com', 2, 1, 1),
(28, 'SHAREfrQxn', 16, 81, 4, NULL, 0, 1, 1),
(29, 'SHARERN5Bd', 19, 102, 81, NULL, 5, 2, 1),
(30, 'SHAREVtZpo', 9, 79, 81, NULL, 6, 2, 1),
(31, 'SHAREgXelL', 23, 81, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(32, 'SHAREGCWTa', 23, 81, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(33, 'SHARErpCi2', 23, 81, 57, NULL, 0, 1, 1),
(34, 'SHARESGHWI', 12, 81, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(35, 'SHAREBoFsY', 12, 81, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(36, 'SHARETINYd', 16, 81, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(37, 'SHAREKvc8T', 19, 102, 57, NULL, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_specific_day`
--

CREATE TABLE `trip_specific_day` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `trip_tags` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(59, '     TREKING', '2018-12-01 05:43:28', 79, '0000-00-00 00:00:00', 0, 1),
(60, '   TIGER', '2018-12-05 09:06:41', 81, '0000-00-00 00:00:00', 0, 1),
(61, 'SNORKELING', '2018-12-11 16:36:21', 102, '0000-00-00 00:00:00', 0, 1),
(62, '  Boating', '2018-12-11 16:44:32', 81, '0000-00-00 00:00:00', 0, 1),
(63, '  fishing', '2018-12-11 16:44:32', 81, '0000-00-00 00:00:00', 0, 1),
(64, '  snoerkling', '2018-12-11 16:44:32', 81, '0000-00-00 00:00:00', 0, 1),
(65, '   Boating', '2018-12-17 15:09:02', 81, '0000-00-00 00:00:00', 0, 1),
(66, '   fishing', '2018-12-17 15:09:02', 81, '0000-00-00 00:00:00', 0, 1),
(67, '   snoerkling', '2018-12-17 15:09:02', 81, '0000-00-00 00:00:00', 0, 1),
(68, '      TREKING', '2018-12-17 15:09:43', 81, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_tag_map`
--

CREATE TABLE `trip_tag_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(56, 18, 53, 0),
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
(74, 2, 47, 0),
(75, 2, 59, 0),
(76, 18, 60, 1),
(77, 19, 61, 1),
(78, 19, 20, 1),
(79, 19, 21, 1),
(80, 19, 23, 1),
(81, 20, 61, 1),
(82, 20, 62, 0),
(83, 20, 63, 0),
(84, 20, 64, 0),
(85, 21, 2, 1),
(86, 20, 65, 1),
(87, 20, 66, 1),
(88, 20, 67, 1),
(89, 2, 54, 1),
(90, 2, 68, 1),
(91, 22, 1, 1),
(92, 23, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
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

CREATE TABLE `user_bank_master` (
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

CREATE TABLE `user_master` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_type`, `email`, `password`, `user_fullname`, `dob`, `gender`, `phone`, `alt_phone`, `emergency_contact_person`, `emergency_contact_no`, `activation_code`, `activation_code_time`, `about_me`, `address`, `zip_code`, `city`, `state`, `profile_pic`, `balance_amt`, `unclear_amt`, `social_network`, `auth_id`, `login_via`, `created_on`, `last_visit`, `isactive`) VALUES
(1, 'CU', 'customer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Customer', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(2, 'SA', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Admin', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4920.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(3, 'VA', 'vendor@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor1', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(4, 'VA', 'vendor2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor2', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(16, 'CU', 'anjaneyavadivel@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Anjaneya vadivelu', NULL, NULL, NULL, NULL, NULL, NULL, '359343', '2018-12-10 06:44:14', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-20 12:40:25', '2018-09-20 12:40:58', 1),
(27, 'VA', 'vendor3@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor Three', NULL, NULL, NULL, NULL, NULL, NULL, 'c90b3169120e16506865bd2d22969dae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-01 08:38:56', NULL, 1),
(30, 'VA', 'vendor4@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Velappan Rekandi Jamnagarwala', NULL, NULL, '8887779994', NULL, NULL, NULL, '5fade682e4d9e5948476467f275d67c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-02 10:46:43', NULL, 1),
(56, 'VA', 'chaitesh@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, '1dfb89769e2da0a1fc38c5401b79a300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-30 14:35:54', NULL, 2),
(57, 'VA', 'v_inod_v@yahoo.com', '14e1b600b1fd579f47433b88e8d85291', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 05:49:49', NULL, 1),
(76, 'VA', 'vinod@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'VINOD VELAPPAN', NULL, NULL, NULL, NULL, NULL, NULL, '1e8660445a37dce4eaba75f48281e3ab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-14 08:06:45', NULL, 2),
(79, 'VA', 'naikabhy@gmail.com', '557689058657fe132eed86ad34c56317', 'Abhinay Naik', NULL, NULL, '9822124005', '', '', '', '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '1542989288.PNG', 58310.00, 0.00, NULL, NULL, 1, '2018-11-15 15:46:24', NULL, 1),
(80, 'VA', 'teambookyourtrips@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Team Bookyourtrips', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 10640.00, 0.00, NULL, NULL, 1, '2018-11-15 16:06:49', '2018-11-15 04:12:32', 1),
(81, 'VA', 'goahemtravels@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'HEM TRAVELS', NULL, NULL, NULL, NULL, NULL, NULL, '698166', '2018-12-10 15:53:23', NULL, 'PULIYAKULAM ROAD', 641045, 'Coimbatore', 'Tamil Nadu', NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-16 10:02:34', '2018-11-16 10:05:06', 1),
(91, 'VA', 'avmtoursandtravels@gmail.com', 'aa4f3cf9f3944a475f7bdb712e3ec60b', 'AVM TOURS AND TRAVELS', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-24 09:51:35', '2018-11-24 09:52:00', 1),
(98, 'GU', 'gust@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Gust', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-26 17:13:05', NULL, 2),
(99, 'GU', 'karthikraja.ckr@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Karthi', NULL, NULL, '9942493382', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-30 17:11:06', NULL, 2),
(100, 'VA', 'sharukhkalas@gmail.com', 'bc415f1f176f92b96c90f1a59f97df28', 'Sharukh H Kalas', NULL, NULL, NULL, NULL, NULL, NULL, 'aab77b6f26a90003865005ae4bcd5787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-01 15:51:06', NULL, 2),
(101, 'GU', 'anjaneya.developer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Ravi', NULL, NULL, '7373112889', NULL, NULL, NULL, '618147', '2018-12-09 15:14:45', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-03 09:32:32', NULL, 1),
(102, 'VA', 'anjali.shetgaonkar@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'HARI OM TATSAT', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, -40.00, 0.00, NULL, NULL, 1, '2018-12-04 13:25:31', NULL, 1),
(103, 'GU', 'goahemtravels@gmailc.om', '14e1b600b1fd579f47433b88e8d85291', 'Mr Alexander, Ave Maria-101, At Reception At 15:00 Hrs', NULL, NULL, '9616341565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-06 15:46:35', NULL, 2),
(104, 'CU', 'karthikraja.ckr@gmail.com', '', 'karthik raja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0.00, 0.00, 'gmail', '111766378079349807447', 1, '2018-12-16 15:54:52', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_wishlist`
--

CREATE TABLE `user_wishlist` (
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coupon_code_master`
--
ALTER TABLE `coupon_code_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coupon_code_master_history`
--
ALTER TABLE `coupon_code_master_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `faq_master`
--
ALTER TABLE `faq_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `my_transaction`
--
ALTER TABLE `my_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trip_avilable`
--
ALTER TABLE `trip_avilable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trip_book_pay`
--
ALTER TABLE `trip_book_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `trip_book_pay_details`
--
ALTER TABLE `trip_book_pay_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `trip_category`
--
ALTER TABLE `trip_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trip_comment`
--
ALTER TABLE `trip_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `trip_inclusions`
--
ALTER TABLE `trip_inclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trip_inclusions_map`
--
ALTER TABLE `trip_inclusions_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `trip_itinerary`
--
ALTER TABLE `trip_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_master`
--
ALTER TABLE `trip_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `trip_shared`
--
ALTER TABLE `trip_shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `trip_specific_day`
--
ALTER TABLE `trip_specific_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trip_tags`
--
ALTER TABLE `trip_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `trip_tag_map`
--
ALTER TABLE `trip_tag_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
