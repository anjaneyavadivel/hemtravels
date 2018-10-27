-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 05:35 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_info`
--

INSERT INTO `account_info` (`id`, `user_id`, `bank_name`, `account_holder_name`, `account_number`, `ifsc_code`, `branch`, `address`, `is_primary`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(2, 4, 'SBI', 'Customer', '123456789', 'SBI0000695', 'Goa', 'PULIYAKULAM ROAD', 1, '2018-10-14 05:32:29', 0, '0000-00-00 00:00:00', 0, 1),
(3, 3, 'HDFC', 'Vendor', '123456789', 'HDFC0000111', 'goa Branch', 'goa Address', 1, '2018-10-14 15:11:26', 0, '0000-00-00 00:00:00', 0, 1),
(6, 26, 'HDFC', 'customer', '12345678910', 'HDFC0000111', 'goa Branch', 'goa Address', 1, '2018-10-16 16:40:45', 0, '0000-00-00 00:00:00', 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`id`, `state_id`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 2, 'Domlur', '2018-08-01 02:28:52', 0, '0000-00-00 00:00:00', 0, 1),
(2, 2, 'Indiranagar', '2018-08-01 02:28:52', 0, '0000-00-00 00:00:00', 0, 1),
(5, 1, 'Coimbatore', '2018-08-15 03:13:22', 0, '0000-00-00 00:00:00', 0, 1),
(6, 1, 'Chennai', '2018-08-15 03:13:42', 0, '0000-00-00 00:00:00', 0, 1),
(7, 2, 'CALANGUTE', '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0, 1),
(8, 2, 'Candolim', '2018-09-20 09:22:20', 3, '0000-00-00 00:00:00', 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code_master`
--

INSERT INTO `coupon_code_master` (`id`, `user_id`, `trip_id`, `type`, `coupon_code`, `coupon_name`, `offer_type`, `percentage_amount`, `validity_from`, `validity_to`, `comment`, `category_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `created_on`, `isactive`) VALUES
(1, 3, 1, 2, 'B2BDIS50', 'B2B discount 50', 1, 50.00, '2018-10-10', '2018-11-30', ' ', 0, 0.00, 0.00, 0.00, '2018-08-05 14:19:13', 1),
(2, 2, 0, 3, 'ADMINDIS5P', 'Admin discount 5%', 2, 5.00, '2018-08-06', '2018-09-15', ' ', 6, 10.00, 10.00, 10.00, '2018-08-05 14:19:13', 1),
(3, 2, 2, 1, 'B2CDIS5', 'B2C discount 5%', 2, 5.00, '2018-08-06', '2018-09-15', ' ', 0, 0.00, 0.00, 0.00, '2018-08-05 14:19:13', 1),
(4, 2, 0, 3, 'ADMINDIS7', 'ADMINDIS7', 2, 7.00, '2018-08-15', '2018-09-12', ' ', 1, 10.00, 10.00, 10.00, '2018-08-15 06:32:12', 1),
(5, 2, 0, 3, 'ADMINOFFER10%', 'ADMINOFFER10%', 2, 10.00, '2018-08-16', '2018-09-06', ' this admin offer', 7, 15.00, 15.00, 15.00, '2018-08-16 14:57:16', 1),
(6, 4, 7, 1, 'SEPDISCOUNT10', 'September offer', 2, 10.00, '2018-10-16', '2018-11-30', ' ', 0, 0.00, 0.00, 0.00, '2018-09-22 15:28:24', 1),
(7, 3, 6, 2, 'SEP TRIP VENDOR', 'SEP150', 1, 300.00, '2018-09-28', '2018-10-31', ' ', 0, 0.00, 0.00, 0.00, '2018-09-28 07:14:18', 1),
(8, 3, 6, 1, 'SEP TRIP CUSTOMER', 'SEPCUS', 1, 75.00, '2018-09-28', '2018-10-31', ' ', 0, 0.00, 0.00, 0.00, '2018-09-29 12:25:35', 1),
(9, 3, 2, 4, 'COUPONOFFER2PER', 'Coupon Offer 2%', 2, 2.00, '2018-10-06', '2018-10-27', ' Coupon Offer 2%', 0, 0.00, 0.00, 0.00, '2018-10-06 06:21:09', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupon_code_master_history`
--

INSERT INTO `coupon_code_master_history` (`id`, `user_id`, `coupon_code_id`, `trip_id`, `type`, `coupon_code`, `coupon_name`, `offer_type`, `percentage_amount`, `validity_from`, `validity_to`, `comment`, `category_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `created_on`, `isactive`) VALUES
(1, 3, 1, 1, 2, 'B2BDIS50', 'B2C discount 50', 1, 50.00, '2018-08-06', '2018-09-15', ' ', 0, 0.00, 0.00, 0.00, '2018-08-05 08:49:13', 1),
(2, 2, 2, 0, 3, 'ADMINDIS5P', 'Admin discount 5%', 2, 5.00, '2018-08-06', '2018-09-15', ' ', 6, 10.00, 10.00, 0.00, '2018-08-05 08:49:13', 1),
(3, 2, 3, 1, 1, 'B2CDIS5', 'B2C discount 5%', 2, 5.00, '2018-08-06', '2018-09-15', ' ', 0, 0.00, 0.00, 0.00, '2018-08-05 08:49:13', 1),
(4, 2, 4, 0, 3, 'ADMINDIS7', 'ADMINDIS7', 2, 7.00, '2018-09-16', '2018-10-31', ' ', 1, 10.00, 10.00, 10.00, '2018-08-15 06:32:12', 1),
(5, 2, 5, 0, 3, 'ADMINOFFER100', 'ADMINOFFER10%', 1, 10.00, '2018-08-16', '2018-09-06', ' this admin offer', 7, 15.00, 15.00, 15.00, '2018-08-16 14:57:16', 0),
(6, 2, 3, 1, 1, 'B2CDIS50', 'B2C discount 50', 1, 50.00, '2018-08-06', '2018-09-15', ' ', 0, 0.00, 0.00, 0.00, '2018-08-05 08:49:13', 0),
(7, 4, 6, 7, 1, 'SEPDISCOUNT10', 'September offer', 2, 10.00, '2018-09-23', '2018-09-30', 'Closing week Offer of September', 0, 0.00, 0.00, 0.00, '2018-09-22 15:28:24', 1),
(8, 3, 7, 6, 2, 'SEP TRIP VENDOR', 'SEP150', 1, 150.00, '2018-09-28', '2018-10-31', ' ', 0, 0.00, 0.00, 0.00, '2018-09-28 07:14:18', 1),
(9, 3, 7, 6, 2, 'SEP TRIP VENDOR', 'SEP150', 1, 300.00, '2018-09-28', '2018-10-31', ' ', 0, 0.00, 0.00, 0.00, '2018-09-29 10:34:52', 1),
(10, 3, 8, 6, 1, 'SEP TRIP CUSTOMER', 'SEPCUS', 1, 75.00, '2018-09-28', '2018-10-31', ' ', 0, 0.00, 0.00, 0.00, '2018-09-29 12:25:35', 1),
(11, 3, 9, 2, 4, 'COUPONOFFER2PER', 'Coupon Offer 2%', 2, 2.00, '2018-10-06', '2018-10-27', ' Coupon Offer 2%', 0, 0.00, 0.00, 0.00, '2018-10-06 06:21:09', 1),
(12, 3, 1, 1, 2, 'B2BDIS50', 'B2B discount 50', 1, 50.00, '2018-10-10', '2018-11-30', ' ', 0, 0.00, 0.00, 0.00, '2018-10-10 16:55:37', 1),
(13, 4, 6, 7, 1, 'SEPDISCOUNT10', 'September offer', 2, 10.00, '2018-10-16', '2018-11-30', ' ', 0, 0.00, 0.00, 0.00, '2018-10-15 18:26:47', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq_master`
--

INSERT INTO `faq_master` (`id`, `trip_id`, `question`, `answer`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 0, 'What is this faq?', 'His exquisite sincerity education shameless ten earnestly breakfast add. So we me unknown as improve hastily sitting forming. Especially favorable compliment but thoroughly unreserved saw she themselves. <br>Sufficient impossible him may ten insensible put continuing. Oppose exeter income simple few joy cousin but twenty. Scale began quiet up short wrong in in. Sportsmen shy forfeited <a target="_blank" rel="nofollow">engrossed may</a> can.', '2018-08-22 17:55:22', 0, '0000-00-00 00:00:00', 0, 1),
(2, 0, 'How does this faq work?', '<p>He do subjects prepared bachelor juvenile ye oh. He feelings removing informed he as ignorant we prepared. Evening do forming observe spirits is in. Country hearted be of justice sending. On so they as with room cold ye. Be call four my went mean. Celebrated if remarkably especially an. Going eat set she books found met aware.</p><ul><li>Sing long her way size. Waited end mutual missed myself the little sister one.</li><li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li><li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li><li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.<ul><li>Sing long her way size. Waited end mutual missed myself the little sister one.</li><li>So in pointed or chicken cheered neither spirits invited. Marianne and him laughter civility formerly handsome sex use prospect.</li><li>Hence we doors is given rapid scale above am. Difficult ye mr delivered behaviour by an.</li><li>If their woman could do wound on. You folly taste hoped their above are and but.</li></ul></li><li>If their woman could do wound on. You folly taste hoped their above are and but.</li><li>rote water woman of heart it total other.</li><li>By in entirely securing suitable graceful at families improved. Zealously few furniture repulsive was agreeable consisted difficult. Are melancholy appearance stimulated occasional entreaties end.</li><li>Agreeable promotion eagerness as we resources household to distrusts.</li><li>If their woman could do wound on. You folly taste hoped their above are and but.</li></ul><p>Lose eyes get fat shew. Winter can indeed letter oppose way change tended now. So is improve my charmed picture exposed adapted demands. Received had end produced prepared diverted strictly off man branched. Known ye money so large decay voice there to. Preserved be mr cordially incommode as an. He doors quick child an point at. Had share vexed front least style off why him.</p>', '2018-08-22 18:04:10', 0, '0000-00-00 00:00:00', 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `my_transaction`
--

INSERT INTO `my_transaction` (`id`, `book_pay_id`, `book_pay_details_id`, `pnr_no`, `from_userid`, `to_userid`, `userid`, `trip_id`, `date_time`, `transaction_notes`, `withdrawals`, `deposits`, `balance`, `b2b_pay_account_info`, `withdrawal_request_id`, `withdrawal_request_amt`, `withdrawal_notes`, `withdrawal_paid_on`, `status`) VALUES
(1, 0, 0, '', -1, -1, 21, 0, '2018-09-26 10:31:07', 'Deposit: Cash Deposited', 0.00, 13500.00, 13500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(2, 1, 0, 'PNR56JCRBJ3', -1, 0, 21, 7, '2018-09-26 10:31:07', 'Withdrawal: Trip has been booked PNR56JCRBJ3 / TRIPL6Ye9PK / September2 trip2', 13500.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(3, 1, 0, 'PNR56JCRBJ3', 21, -1, 0, 7, '2018-09-26 10:31:07', 'Deposit: Trip has been booked PNR56JCRBJ3 / TRIPL6Ye9PK / September2 trip2', 0.00, 13500.00, 13500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(4, 0, 0, '', -1, -1, 22, 0, '2018-09-26 10:49:52', 'Deposit: Cash Deposited', 0.00, 15000.00, 15000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(5, 2, 0, 'PNR25YN1OOQ', -1, 0, 22, 7, '2018-09-26 10:49:52', 'Withdrawal: Trip has been booked PNR25YN1OOQ / TRIPL6Ye9PK / September2 trip2', 15000.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(6, 2, 0, 'PNR25YN1OOQ', 22, -1, 0, 7, '2018-09-26 10:49:52', 'Deposit: Trip has been booked PNR25YN1OOQ / TRIPL6Ye9PK / September2 trip2', 0.00, 15000.00, 28500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(7, 0, 0, '', -1, -1, 23, 0, '2018-09-26 11:05:07', 'Deposit: Cash Deposited', 0.00, 10000.00, 10000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(8, 3, 0, 'PNR35JHDDI5', -1, 0, 23, 6, '2018-09-26 11:05:07', 'Withdrawal: Trip has been booked PNR35JHDDI5 / TRIPpZe0LIb / September trip', 10000.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(9, 3, 0, 'PNR35JHDDI5', 23, -1, 0, 6, '2018-09-26 11:05:07', 'Deposit: Trip has been booked PNR35JHDDI5 / TRIPpZe0LIb / September trip', 0.00, 10000.00, 38500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(10, 0, 0, '', -1, -1, 24, 0, '2018-09-26 11:42:52', 'Deposit: Cash Deposited', 0.00, 4500.00, 4500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(11, 4, 0, 'PNR32XVNVK3', -1, 0, 24, 7, '2018-09-26 11:42:52', 'Withdrawal: Trip has been booked PNR32XVNVK3 / TRIPL6Ye9PK / September2 trip2', 4500.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(12, 4, 0, 'PNR32XVNVK3', 24, -1, 0, 7, '2018-09-26 11:42:52', 'Deposit: Trip has been booked PNR32XVNVK3 / TRIPL6Ye9PK / September2 trip2', 0.00, 4500.00, 43000.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(13, 0, 0, '', -1, -1, 25, 0, '2018-09-29 11:58:53', 'Deposit: Cash Deposited', 0.00, 13500.00, 13500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(14, 5, 0, 'PNR41T9RZMI', -1, 0, 25, 7, '2018-09-29 11:58:53', 'Withdrawal: Trip has been booked PNR41T9RZMI / TRIPL6Ye9PK / September2 trip2', 13500.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(15, 5, 0, 'PNR41T9RZMI', 25, -1, 0, 7, '2018-09-29 11:58:53', 'Deposit: Trip has been booked PNR41T9RZMI / TRIPL6Ye9PK / September2 trip2', 0.00, 13500.00, 56500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(16, 1, 1, 'PNR56JCRBJ3', -1, 3, 0, 6, '2018-09-30 03:50:04', 'Withdrawal: Trip has been booked PNR56JCRBJ3 / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 9310.00, 0.00, 47190.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(17, 1, 1, 'PNR56JCRBJ3', 0, -1, 3, 6, '2018-09-30 03:50:04', 'Deposit: Trip has been booked PNR56JCRBJ3 / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 0.00, 9310.00, 9310.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(18, 1, 2, 'PNR56JCRBJ3', -1, 4, 0, 7, '2018-09-30 03:50:07', 'Withdrawal: Trip has been booked PNR56JCRBJ3 / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 3920.00, 0.00, 43270.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(19, 1, 2, 'PNR56JCRBJ3', 0, -1, 4, 7, '2018-09-30 03:50:07', 'Deposit: Trip has been booked PNR56JCRBJ3 / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 0.00, 3920.00, 3920.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(20, 2, 3, 'PNR25YN1OOQ', -1, 3, 0, 6, '2018-09-30 03:50:08', 'Withdrawal: Trip has been booked PNR25YN1OOQ / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 9800.00, 0.00, 33470.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(21, 2, 3, 'PNR25YN1OOQ', 0, -1, 3, 6, '2018-09-30 03:50:08', 'Deposit: Trip has been booked PNR25YN1OOQ / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 0.00, 9800.00, 19110.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(22, 2, 4, 'PNR25YN1OOQ', -1, 4, 0, 7, '2018-09-30 03:50:08', 'Withdrawal: Trip has been booked PNR25YN1OOQ / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 4900.00, 0.00, 28570.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(23, 2, 4, 'PNR25YN1OOQ', 0, -1, 4, 7, '2018-09-30 03:50:08', 'Deposit: Trip has been booked PNR25YN1OOQ / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 0.00, 4900.00, 8820.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(24, 3, 5, 'PNR35JHDDI5', -1, 3, 0, 6, '2018-09-30 03:50:09', 'Withdrawal: Trip has been booked PNR35JHDDI5 / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 9800.00, 0.00, 18770.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(25, 3, 5, 'PNR35JHDDI5', 0, -1, 3, 6, '2018-09-30 03:50:09', 'Deposit: Trip has been booked PNR35JHDDI5 / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 0.00, 9800.00, 28910.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(26, 4, 6, 'PNR32XVNVK3', -1, 3, 0, 6, '2018-09-30 03:50:09', 'Withdrawal: Trip has been booked PNR32XVNVK3 / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 2940.00, 0.00, 15830.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(27, 4, 6, 'PNR32XVNVK3', 0, -1, 3, 6, '2018-09-30 03:50:09', 'Deposit: Trip has been booked PNR32XVNVK3 / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 0.00, 2940.00, 31850.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(28, 4, 7, 'PNR32XVNVK3', -1, 4, 0, 7, '2018-09-30 03:50:10', 'Withdrawal: Trip has been booked PNR32XVNVK3 / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 1470.00, 0.00, 14360.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(29, 4, 7, 'PNR32XVNVK3', 0, -1, 4, 7, '2018-09-30 03:50:10', 'Deposit: Trip has been booked PNR32XVNVK3 / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 0.00, 1470.00, 10290.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(30, 5, 8, 'PNR41T9RZMI', -1, 3, 0, 6, '2018-09-30 03:50:10', 'Withdrawal: Trip has been booked PNR41T9RZMI / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 6860.00, 0.00, 7500.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(31, 5, 8, 'PNR41T9RZMI', 0, -1, 3, 6, '2018-09-30 03:50:10', 'Deposit: Trip has been booked PNR41T9RZMI / TRIPpZe0LIb / September trip. Include GST and Service Charge.', 0.00, 6860.00, 38710.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(32, 5, 9, 'PNR41T9RZMI', -1, 4, 0, 7, '2018-09-30 03:50:11', 'Withdrawal: Trip has been booked PNR41T9RZMI / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 6370.00, 0.00, 1130.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(33, 5, 9, 'PNR41T9RZMI', 0, -1, 4, 7, '2018-09-30 03:50:11', 'Deposit: Trip has been booked PNR41T9RZMI / TRIPL6Ye9PK / September2 trip2. Include GST and Service Charge.', 0.00, 6370.00, 16660.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(40, 0, 0, 'PNR38907CAY', -1, 26, 3, 0, '2018-10-06 16:13:59', 'Withdrawal: Cash Deposited for PNR38907CAY', 1500.00, 0.00, 37210.00, 0, 0, 0.00, 'Office Booking PNRPNR38907CAY', '0000-00-00 00:00:00', 2),
(41, 0, 0, 'PNR38907CAY', 3, -1, 26, 0, '2018-10-06 16:13:59', 'Deposit: Cash Deposited for PNR38907CAY', 0.00, 1500.00, 1500.00, 0, 0, 0.00, 'Office Booking PNRPNR38907CAY', '0000-00-00 00:00:00', 2),
(42, 9, 0, 'PNR38907CAY', -1, 0, 26, 2, '2018-10-06 16:13:59', 'Withdrawal: Trip has been booked PNR38907CAY / TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa', 1500.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(43, 9, 0, 'PNR38907CAY', 26, -1, 0, 2, '2018-10-06 16:13:59', 'Deposit: Trip has been booked PNR38907CAY / TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa', 0.00, 1500.00, 2630.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(44, 0, 0, 'PNR17PK1FHV', -1, 26, 3, 0, '2018-10-06 16:20:21', 'Withdrawal: Cash Deposited for PNR17PK1FHV', 1500.00, 0.00, 35710.00, 0, 0, 0.00, 'Office Booking PNRPNR17PK1FHV', '0000-00-00 00:00:00', 2),
(45, 0, 0, 'PNR17PK1FHV', 3, -1, 26, 0, '2018-10-06 16:20:21', 'Deposit: Cash Deposited for PNR17PK1FHV', 0.00, 1500.00, 1500.00, 0, 0, 0.00, 'Office Booking PNRPNR17PK1FHV', '0000-00-00 00:00:00', 2),
(46, 10, 0, 'PNR17PK1FHV', -1, 0, 26, 2, '2018-10-06 16:20:21', 'Withdrawal: Trip has been booked PNR17PK1FHV / TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa', 1500.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(47, 10, 0, 'PNR17PK1FHV', 26, -1, 0, 2, '2018-10-06 16:20:21', 'Deposit: Trip has been booked PNR17PK1FHV / TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa', 0.00, 1500.00, 4130.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(48, 0, 0, '', -1, -1, 26, 0, '2018-10-07 05:56:57', 'Deposit: Cash Deposited', 0.00, 1470.00, 1470.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(49, 11, 0, 'PNR100VCNHF', -1, 0, 26, 2, '2018-10-07 05:56:57', 'Withdrawal: Trip has been booked PNR100VCNHF / TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa', 1470.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(50, 11, 0, 'PNR100VCNHF', 26, -1, 0, 2, '2018-10-07 05:56:57', 'Deposit: Trip has been booked PNR100VCNHF / TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa', 0.00, 1470.00, 5600.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(71, 11, 0, 'PNR100VCNHF', -1, 26, 0, 2, '2018-10-13 12:01:28', 'Withdrawal: Trip cancelled/refund amount for PNR No PNR100VCNHF (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid to your bank in NEFT', 735.00, 0.00, 4865.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(72, 11, 0, 'PNR100VCNHF', 0, -1, 26, 2, '2018-10-13 12:01:28', 'Deposit: Trip cancelled/refund amount for PNR No PNR100VCNHF (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid to your bank in NEFT', 0.00, 735.00, 735.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(73, 11, 15, 'PNR100VCNHF', -1, 3, 0, 2, '2018-10-13 12:01:28', 'Withdrawal: Trip cancelled/refund amount for PNR No PNR100VCNHF (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid to your bank in NEFT Include GST and Service Charge.', 720.50, 0.00, 4145.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(74, 11, 15, 'PNR100VCNHF', 0, -1, 3, 2, '2018-10-13 12:01:28', 'Deposit: Trip cancelled/refund amount for PNR No PNR100VCNHF (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid to your bank in NEFT Include GST and Service Charge.', 0.00, 720.50, 36430.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(75, 0, 0, '', -1, -2, 3, 0, '2018-10-14 15:11:26', 'Withdrawal Request: Cash Withdrawal Request', 0.00, 0.00, 36430.00, 3, 0, 1000.00, '', '0000-00-00 00:00:00', 0),
(76, 0, 0, '', -1, -2, 3, 0, '2018-10-14 15:21:30', 'Withdrawal Request: Cash Withdrawal Request', 0.00, 0.00, 36430.00, 3, 0, 1500.00, '', '0000-00-00 00:00:00', 0),
(77, 0, 0, '', -1, -2, 3, 0, '2018-10-15 15:47:56', 'Withdrawal Request: Cash Withdrawal Request', 0.00, 0.00, 36430.00, 3, 0, 2000.00, '', '0000-00-00 00:00:00', 3),
(84, 0, 0, '', -1, -1, 3, 0, '2018-10-15 16:33:00', 'Withdrawal: Cash Withdrawal: Amount for withdrawal request, Paid on 15-10-18', 2000.00, 0.00, 34430.00, 3, 0, 0.00, 'Paid on 15-10-18', '2018-10-14 18:30:00', 2),
(85, 10, 0, 'PNR17PK1FHV', -1, 26, 0, 2, '2018-10-16 15:28:10', 'Withdrawal: Trip cancelled/refund amount for PNR No PNR17PK1FHV (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid on 16-10-18', 750.00, 0.00, 3395.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(86, 10, 0, 'PNR17PK1FHV', 0, -1, 26, 2, '2018-10-16 15:28:10', 'Deposit: Trip cancelled/refund amount for PNR No PNR17PK1FHV (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid on 16-10-18', 0.00, 750.00, 1485.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(87, 10, 14, 'PNR17PK1FHV', -1, 3, 0, 2, '2018-10-16 15:28:11', 'Withdrawal: Trip cancelled/refund amount for PNR No PNR17PK1FHV (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid on 16-10-18 Include GST and Service Charge.', 735.00, 0.00, 2660.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(88, 10, 14, 'PNR17PK1FHV', 0, -1, 3, 2, '2018-10-16 15:28:12', 'Deposit: Trip cancelled/refund amount for PNR No PNR17PK1FHV (TRIP3dnxM91 / Luxury Stay At Mayfair Resorts, Goa).<br>Paid on 16-10-18 Include GST and Service Charge.', 0.00, 735.00, 35165.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(89, 0, 0, 'PNR07HFCMNO', -1, 26, 4, 0, '2018-10-20 03:44:59', 'Withdrawal: Trip has been booked PNR07HFCMNO', 2000.00, 0.00, 14660.00, 0, 0, 0.00, 'Office Booking PNRPNR07HFCMNO', '0000-00-00 00:00:00', 2),
(90, 0, 0, 'PNR07HFCMNO', 4, -1, 26, 0, '2018-10-20 03:44:59', 'Deposit: Trip has been booked PNR07HFCMNO', 0.00, 2000.00, 3485.00, 0, 0, 0.00, 'Office Booking PNRPNR07HFCMNO', '0000-00-00 00:00:00', 2),
(91, 11, 0, 'PNR07HFCMNO', -1, 0, 26, 3, '2018-10-20 03:44:59', 'Withdrawal: Trip has been booked PNR07HFCMNO / TRIP3dnx100 / Mayfair Resorts Shared Trip, Goa', 1520.00, 0.00, 1965.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(92, 11, 0, 'PNR07HFCMNO', 26, -1, 0, 3, '2018-10-20 03:44:59', 'Deposit: Trip has been booked PNR07HFCMNO / TRIP3dnx100 / Mayfair Resorts Shared Trip, Goa', 0.00, 1520.00, 4180.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pick_up_location_map`
--

INSERT INTO `pick_up_location_map` (`id`, `trip_id`, `city_id`, `location`, `landmark`, `time`, `isactive`) VALUES
(1, 1, 2, 'Calangute,Goa', '', '07:10', 1),
(2, 1, 2, 'Baga, Goa', '', '08:10', 1),
(3, 3, 2, 'Candolim, Goa', '', '09:10', 1),
(4, 3, 2, 'Arpora, Goa', '', '10:10', 1),
(5, 2, 2, 'Baga, Goa', 'Skywalk', '08:25', 1),
(6, 2, 2, 'Candolim, Goa', 'Candolim', '09:10', 1),
(7, 4, 1, 'CANDOLIM', 'AXIS BANK', '08:00', 1),
(8, 4, 1, 'CALANGUTE', 'DOLPHIN CIRCLE', '08:30', 1),
(9, 4, 1, 'BAGA', 'CCD', '09:00', 1),
(10, 4, 1, 'ARPORA', 'CHAPEL', '09:15', 1),
(11, 5, 0, 'CALANGUTE', 'DOLPHIN CIRCLE', '08:00', 1),
(12, 5, 0, 'BAGA', 'CCD', '08:15', 1),
(13, 5, 0, 'CANDOLIM', 'AXIS BANK', '08:30', 1),
(14, 5, 0, 'SIQUERIM', 'BUS STAND', '09:00', 1),
(15, 6, 0, 'Candolim', 'Axis bank', '08:20', 1),
(16, 6, 0, 'Sinquerim', 'Bus Stand', '8:00', 1),
(17, 6, 0, 'Calangute', 'Temple', '08:45', 1),
(18, 6, 0, 'Baga', 'CCD', '09:15', 1),
(19, 7, 0, 'Candolim', 'Axis bank', '08:20', 1),
(20, 7, 0, 'Sinquerim', 'Bus Stand', '8:00', 1),
(21, 7, 0, 'Calangute', 'Temple', '08:45', 1),
(22, 7, 0, 'Baga', 'CCD', '09:15', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_avilable`
--

INSERT INTO `trip_avilable` (`id`, `trip_id`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 1, 1, 1, 1, 0, 1, 1, 1, 1, '2018-08-01 02:37:45', 0, '0000-00-00 00:00:00', 0),
(2, 3, 1, 1, 0, 1, 0, 1, 1, 1, '2018-08-01 02:37:45', 0, '0000-00-00 00:00:00', 0),
(3, 1, 1, 1, 1, 0, 1, 1, 1, 1, '2018-08-20 15:52:34', 0, '0000-00-00 00:00:00', 0),
(4, 2, 1, 1, 1, 0, 0, 1, 1, 1, '2018-08-23 12:41:10', 0, '0000-00-00 00:00:00', 0),
(5, 4, 1, 1, 1, 1, 1, 1, 1, 1, '2018-08-25 15:54:48', 0, '0000-00-00 00:00:00', 0),
(6, 5, 1, 1, 1, 1, 1, 1, 1, 1, '2018-08-28 11:58:23', 0, '0000-00-00 00:00:00', 0),
(7, 6, 1, 1, 1, 1, 1, 1, 1, 1, '2018-09-20 09:22:20', 0, '0000-00-00 00:00:00', 0),
(8, 7, 1, 1, 1, 1, 1, 1, 1, 1, '2018-09-21 07:32:36', 0, '0000-00-00 00:00:00', 0);

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

INSERT INTO `trip_book_pay` (`id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `gst_percentage`, `gst_amt`, `round_off`, `net_price`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `isactive`) VALUES
(1, 6, 4, 7, 21, 'PNR56JCRBJ3', 11, 1500.00, 1500.00, 1000.00, 6, 2, 3, 9000.00, 3000.00, 3000.00, 15000.00, 13500.00, 7, 0, NULL, 10.00, 0.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 13500.00, '2018-09-30', '2018-09-30', '08:20:00', 19, 'Candolim', 'Axis bank', '2018-09-26 10:31:07', 21, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(2, 6, 4, 7, 22, 'PNR25YN1OOQ', 10, 1500.00, 1500.00, 1000.00, 10, 0, 0, 15000.00, 0.00, 0.00, 15000.00, 15000.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15000.00, '2018-09-30', '2018-09-30', '08:45:00', 21, 'Calangute', 'Temple', '2018-09-26 10:49:52', 4, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(3, 0, 3, 6, 23, 'PNR35JHDDI5', 10, 1000.00, 1000.00, 500.00, 10, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10000.00, '2018-09-30', '2018-09-30', '09:15:00', 18, 'Baga', 'CCD', '2018-09-26 11:05:07', 23, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(4, 6, 4, 7, 24, 'PNR32XVNVK3', 3, 1500.00, 1500.00, 1000.00, 3, 0, 0, 4500.00, 0.00, 0.00, 4500.00, 4500.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4500.00, '2018-10-01', '2018-10-01', '08:00:00', 20, 'Sinquerim', 'Bus Stand', '2018-09-26 11:42:52', 4, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(5, 6, 4, 7, 25, 'PNR41T9RZMI', 10, 1500.00, 1500.00, 1000.00, 10, 0, 0, 15000.00, 0.00, 0.00, 15000.00, 13500.00, 7, 0, NULL, 10.00, 0.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 13500.00, '2018-09-30', '2018-09-30', '08:20:00', 19, 'Candolim', 'Axis bank', '2018-09-29 11:58:53', 25, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(9, 0, 3, 2, 26, 'PNR38907CAY', 1, 1500.00, 1000.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, '2018-10-12', '2018-10-14', '08:25:00', 5, 'Baga, Goa', 'Skywalk', '2018-10-06 16:13:59', 3, 3, 1, 1, 1, NULL, NULL, '2018-10-16 00:00:00', 6, NULL, NULL, 0, NULL, 1, 1),
(10, 0, 3, 2, 26, 'PNR17PK1FHV', 1, 1500.00, 1000.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, '2018-10-16', '2018-10-18', '09:10:00', 6, 'Candolim, Goa', 'Candolim', '2018-10-06 16:20:21', 3, 3, 1, 1, 1, '2018-10-16', 50, '2018-10-14 00:00:00', 2, 750.00, 'Paid on 16-10-18', 86, '2018-10-15 18:30:00', 3, 1),
(11, 2, 4, 3, 26, 'PNR07HFCMNO', 1, 2000.00, 1500.00, 0.00, 1, 0, 0, 2000.00, 0.00, 0.00, 2000.00, 2000.00, 0, 0, '', 0.00, 0.00, 480.00, 0.00, 0.00, 0.00, 0.00, 1520.00, '2018-10-22', '2018-10-24', '09:10:00', 3, 'Candolim, Goa', '', '2018-10-20 03:44:58', 4, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_book_pay_details`
--

INSERT INTO `trip_book_pay_details` (`id`, `book_pay_id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `from_user_id`, `from_trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `net_price`, `vendor_amt`, `your_amt`, `servicecharge_amt`, `gst_percentage`, `gst_amt`, `round_off`, `your_final_amt`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `pay_details_id`, `isactive`) VALUES
(1, 1, 0, 3, 6, 21, 7, 3, 'PNR56JCRBJ3', 11, 1000.00, 1000.00, 500.00, 6, 2, 3, 6000.00, 2000.00, 1500.00, 9500.00, 9500.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 9500.00, 0.00, 9310.00, 190.00, 0.00, 0.00, 0.00, 9310.00, '2018-09-30', '2018-09-30', '08:20:00', 19, 'Candolim', 'Axis bank', '2018-09-26 04:54:24', 21, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 17, NULL, 1, 2, 1),
(2, 1, 6, 4, 7, 21, 7, 4, 'PNR56JCRBJ3', 11, 1500.00, 1500.00, 1000.00, 6, 2, 3, 9000.00, 3000.00, 3000.00, 15000.00, 13500.00, 7, 0, NULL, 10.00, 0.00, 0.00, 1500.00, 4000.00, 9500.00, 3920.00, 80.00, 0.00, 0.00, 0.00, 3920.00, '2018-09-30', '2018-09-30', '08:20:00', 19, 'Candolim', 'Axis bank', '2018-09-26 10:31:07', 21, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 19, NULL, 1, 1, 1),
(3, 2, 0, 3, 6, 22, 7, 3, 'PNR25YN1OOQ', 10, 1000.00, 1000.00, 500.00, 10, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 9800.00, 200.00, 0.00, 0.00, 0.00, 9800.00, '2018-09-30', '2018-09-30', '08:45:00', 21, 'Calangute', 'Temple', '2018-09-26 10:49:52', 4, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 21, NULL, 1, 4, 1),
(4, 2, 6, 4, 7, 22, 7, 4, 'PNR25YN1OOQ', 10, 1500.00, 1500.00, 1000.00, 10, 0, 0, 15000.00, 0.00, 0.00, 15000.00, 15000.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 5000.00, 10000.00, 4900.00, 100.00, 0.00, 0.00, 0.00, 4900.00, '2018-09-30', '2018-09-30', '08:45:00', 21, 'Calangute', 'Temple', '2018-09-26 10:49:52', 4, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 23, NULL, 1, 3, 1),
(5, 3, 0, 3, 6, 23, 6, 3, 'PNR35JHDDI5', 10, 1000.00, 1000.00, 500.00, 10, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 10000.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 10000.00, 0.00, 9800.00, 200.00, 0.00, 0.00, 0.00, 9800.00, '2018-09-30', '2018-09-30', '09:15:00', 18, 'Baga', 'CCD', '2018-09-26 11:05:07', 23, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 25, NULL, 1, 5, 1),
(6, 4, 0, 3, 6, 24, 7, 3, 'PNR32XVNVK3', 3, 1000.00, 1000.00, 500.00, 3, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 2940.00, 60.00, 0.00, 0.00, 0.00, 2940.00, '2018-10-01', '2018-10-01', '08:00:00', 20, 'Sinquerim', 'Bus Stand', '2018-09-26 11:42:52', 4, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 27, NULL, 1, 7, 1),
(7, 4, 6, 4, 7, 24, 7, 4, 'PNR32XVNVK3', 3, 1500.00, 1500.00, 1000.00, 3, 0, 0, 4500.00, 0.00, 0.00, 4500.00, 4500.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 1500.00, 3000.00, 1470.00, 30.00, 0.00, 0.00, 0.00, 1470.00, '2018-10-01', '2018-10-01', '08:00:00', 20, 'Sinquerim', 'Bus Stand', '2018-09-26 11:42:52', 4, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 29, NULL, 1, 6, 1),
(8, 5, 0, 3, 6, 25, 7, 3, 'PNR41T9RZMI', 10, 1000.00, 1000.00, 500.00, 10, 0, 0, 10000.00, 0.00, 0.00, 10000.00, 7000.00, 9, 0, NULL, 0.00, 300.00, 0.00, 3000.00, 7000.00, 0.00, 6860.00, 140.00, 0.00, 0.00, 0.00, 6860.00, '2018-09-30', '2018-09-30', '08:20:00', 19, 'Candolim', 'Axis bank', '2018-09-29 11:58:53', 25, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 31, NULL, 1, 9, 1),
(9, 5, 6, 4, 7, 25, 7, 4, 'PNR41T9RZMI', 10, 1500.00, 1500.00, 1000.00, 10, 0, 0, 15000.00, 0.00, 0.00, 15000.00, 13500.00, 7, 0, NULL, 10.00, 0.00, 0.00, 1500.00, 6500.00, 7000.00, 6370.00, 130.00, 0.00, 0.00, 0.00, 6370.00, '2018-09-30', '2018-09-30', '08:20:00', 19, 'Candolim', 'Axis bank', '2018-09-29 11:58:53', 25, 5, 1, 1, 1, '2018-09-30', NULL, NULL, 0, NULL, NULL, 33, NULL, 1, 8, 1),
(13, 9, 0, 3, 2, 26, 2, 3, 'PNR38907CAY', 1, 1500.00, 1000.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 1500.00, 0.00, 1470.00, 30.00, 0.00, 0.00, 0.00, 1470.00, '2018-10-12', '2018-10-14', '08:25:00', 5, 'Baga, Goa', 'Skywalk', '2018-10-06 16:13:59', 3, 3, 1, 1, 1, NULL, NULL, '2018-10-16 00:00:00', 6, NULL, NULL, 0, NULL, 1, 13, 1),
(14, 10, 0, 3, 2, 26, 2, 3, 'PNR17PK1FHV', 1, 1500.00, 1000.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, NULL, 0.00, 0.00, 0.00, 0.00, 1500.00, 0.00, 1470.00, 30.00, 0.00, 0.00, 0.00, 1470.00, '2018-10-16', '2018-10-18', '09:10:00', 6, 'Candolim, Goa', 'Candolim', '2018-10-06 16:20:21', 3, 3, 1, 1, 1, '2018-10-16', 50, '2018-10-14 00:00:00', 2, 735.00, 'Paid on 16-10-18', 88, '2018-10-15 18:30:00', 3, 14, 1),
(15, 11, 0, 3, 2, 26, 3, 3, 'PNR07HFCMNO', 1, 1500.00, 1000.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 1500.00, 0.00, 1470.00, 30.00, 0.00, 0.00, 0.00, 1470.00, '2018-10-22', '2018-10-24', '09:10:00', 3, 'Candolim, Goa', '', '2018-10-20 03:44:58', 4, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 16, 1),
(16, 11, 2, 4, 3, 26, 3, 4, 'PNR07HFCMNO', 1, 2000.00, 1500.00, 0.00, 1, 0, 0, 2000.00, 0.00, 0.00, 2000.00, 2000.00, 0, 0, '', 0.00, 0.00, 480.00, 0.00, 500.00, 1500.00, 480.00, 20.00, 0.00, 0.00, 0.00, 0.00, '2018-10-22', '2018-10-24', '09:10:00', 3, 'Candolim, Goa', '', '2018-10-20 03:44:58', 4, 2, 1, 1, 1, '2018-10-20', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 15, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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
(14, 'Sightseeing', NULL, '2018-09-20 09:22:20', 3, '0000-00-00 00:00:00', 0, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_gallery`
--

INSERT INTO `trip_gallery` (`id`, `trip_id`, `file_name`, `isactive`) VALUES
(1, 1, '1533090838_01.jpg', 1),
(2, 1, '1533090838_05.jpg', 1),
(3, 1, '1534779603_033.jpg', 1),
(4, 1, '1534779603_032.jpg', 1),
(5, 1, '1534779603_035.jpg', 1),
(6, 2, '1535027789_b2.jpg', 1),
(7, 2, '1535027789_br.jpg', 1),
(8, 2, '1535027790_trekking1.jpg', 1),
(9, 2, '1535027790_goa-river-rafting.jpg', 1),
(10, 4, '1535210694_cacp2v8t.jpg', 1),
(11, 4, '1535210695_316872030_a4d1050732.jpg', 1),
(12, 4, '1535210695_mangueshi-temple.jpg', 1),
(13, 5, '1535456738_download.jpg', 1),
(14, 5, '1535456743_Image1581.jpg', 1),
(15, 5, '1535456744_DSC00351.JPG', 1),
(16, 6, '1537434002_Mae-De-Deus-Church-at-night-Saligaon.jpg', 1),
(17, 6, '1537434006_mangeshi.jpg', 1),
(18, 7, '1537434002_Mae-De-Deus-Church-at-night-Saligaon.jpg', 1),
(19, 7, '1537434006_mangeshi.jpg', 1),
(20, 7, '1537515148_costacoffee-150x150.jpg', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_inclusions_map`
--

INSERT INTO `trip_inclusions_map` (`id`, `trip_id`, `inclusions_id`, `isactive`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 1, 3, 1),
(4, 1, 4, 1),
(5, 2, 1, 1),
(6, 2, 3, 1),
(7, 2, 6, 1),
(8, 4, 2, 1),
(9, 4, 3, 1),
(10, 4, 5, 1),
(11, 5, 1, 1),
(12, 5, 2, 1),
(13, 5, 3, 1),
(14, 5, 4, 1),
(15, 6, 2, 1),
(16, 6, 3, 1),
(17, 7, 2, 0),
(18, 7, 3, 0),
(19, 7, 2, 1),
(20, 7, 3, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_itinerary`
--

INSERT INTO `trip_itinerary` (`id`, `trip_id`, `title`, `from_time`, `to_time`, `short_description`, `brief_description`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 1, 'first day trip', '10:10', '21:10', 'Trip Starting From: North Goa', '<ul><li>Embark on this amazing sightseeing tour in North Goa and get a chance to explore the stunning beauty of this region.</li><li>Start your trip after getting picked up from the hotel at around 08:30 AM by bus.</li></ul>', 1, '2018-08-20 15:52:34', 0, '0000-00-00 00:00:00', 0),
(2, 2, 'Compliment interested discretion estimating', '09:05', '20:05', 'Experience a luxurious stay at the Mayfair Resorts, Goa with friends and family for an unparalleled experience.', '', 1, '2018-08-23 12:41:10', 0, '0000-00-00 00:00:00', 0),
(3, 4, 'Day trip of North Goa', '08:00', '17:30', 'Full day sightseeing of north goa', 'ALL THE MAJOR PLACES OF NORTH GOA AND COME BACK IN THE EVENING AND DROPPED AT THE SAME PLACE.', 1, '2018-08-25 15:54:48', 0, '0000-00-00 00:00:00', 0),
(4, 5, '1 DAY TRIP', '08:00', '16:30', 'FULL DAY EXCITING BOAT TRIP', '', 1, '2018-08-28 11:58:23', 0, '0000-00-00 00:00:00', 0),
(5, 6, '1 DAY TRIP', '08:30', '17:30', '', '', 1, '2018-09-20 09:22:20', 0, '0000-00-00 00:00:00', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_master`
--

INSERT INTO `trip_master` (`id`, `trip_code`, `user_id`, `trip_category_id`, `trip_name`, `trip_url`, `trip_img_name`, `parent_trip_id`, `address1`, `address2`, `city_id`, `state_id`, `country_id`, `price_to_adult`, `price_to_child`, `price_to_infan`, `trip_duration`, `how_many_days`, `how_many_nights`, `total_days`, `how_many_time`, `how_many_hours`, `brief_description`, `other_inclusions`, `exclusions`, `languages`, `meal`, `transport`, `things_to_carry`, `advisory`, `tour_type`, `cancellation_policy`, `confirmation_policy`, `refund_policy`, `meeting_point`, `meeting_time`, `no_of_traveller`, `no_of_min_booktraveller`, `no_of_max_booktraveller`, `status`, `is_terms_accpet`, `booking_cut_of_time_type`, `booking_cut_of_day`, `booking_cut_of_time`, `booking_max_cut_of_month`, `is_shared`, `trip_shared_id`, `total_rating`, `total_booking`, `view_to`, `isactive`, `created_on`, `created_by`, `updated_on`, `updated_by`) VALUES
(1, 'TRIPFGSbgNw', 3, 7, 'North Goa Sightseeing Full Day Tour', 'north-goa-sightseeing-full-day-tour', '1534779603_033.jpg', 0, NULL, NULL, 2, 2, 0, 500, 400, 0, 2, 1, 1, 2, 0, 0, '&lt;ul&gt;&lt;li&gt;Embark on this amazing sightseeing tour in North Goa and get a chance to explore the stunning beauty of this region.&lt;/li&gt;&lt;li&gt;Start your trip after getting picked up from the hotel at around 08:30 AM by bus.&lt;/li&gt;&lt;li&gt;Explore some of the most favourite tourist spots of this region with the beautiful sights.&lt;/li&gt;&lt;li&gt;This tour includes a visit to the famous Fort Aguada, Anjuna Beach, Vagator Beach, Calangute beach, Morjim Beach &amp; Ashvem Beach.&lt;/li&gt;&lt;li&gt;Enjoy the cool sea breeze while at the beaches and the breath taking sunset&lt;/li&gt;&lt;li&gt;Conclude your tour after you are dropped back to the hotel at around 05:00 PM. by car and 4:30 PM by bus.&lt;/li&gt;&lt;/ul&gt;', NULL, NULL, 'english', 'Non-veg, veg', '&lt;ul&gt;&lt;li&gt;Pick up and drop from hotel in an A/C bus.&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;Sunscreen&lt;/li&gt;&lt;li&gt;Sunglasses&lt;/li&gt;&lt;li&gt;Hat&lt;/li&gt;&lt;li&gt;Camera&lt;/li&gt;&lt;/ul&gt;', NULL, '&lt;ul&gt;&lt;li&gt;This is a group tour&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;If cancellations are made 15 days before the start date of the trip, 25% of total tour cost will be charged as cancellation fees&lt;/li&gt;&lt;li&gt;If cancellations are made 7-15 days before the start date of the trip, 50% of total tour cost will be charged as cancellation fees.&lt;/li&gt;&lt;li&gt;If cancellations are made within 0-7 days before the start date of the trip, 100% of total tour cost will be charged as cancellation fees.&lt;/li&gt;&lt;li&gt;In case of unforeseen weather conditions or government restrictions, certain activities may be cancelled and in such cases the operator will try his best to provide an alternate feasible activity. However no refund will be provided for the same.&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;The customer receives a confirmation voucher via email within 24 hours of successful booking&lt;/li&gt;&lt;li&gt;In case the preferred slots are unavailable, an alternate schedule of the customer&rsquo;s preference will be arranged and a new confirmation voucher will be sent via email.&lt;/li&gt;&lt;li&gt;Alternatively, the customer may choose to cancel their booking and a full refund will be processed.&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;The applicable refund amount will be processed within 10 business days&lt;/li&gt;&lt;/ul&gt;', 'Calangute,Goa', '07:10', 20, 1, 2, 1, 1, 1, 0, 0, 12, 0, 0, 4.0, 0, 1, 1, '2018-08-20 12:22:34', 3, '2018-08-23 10:57:57', 3),
(2, 'TRIP3dnxM91', 3, 11, 'Luxury Stay At Mayfair Resorts, Goa', 'luxury-stay-at-mayfair-resorts-goa', '1535027789_b2.jpg', 0, NULL, NULL, 2, 2, 0, 1500, 1000, 0, 2, 2, 1, 3, 0, 0, '&lt;li&gt;Experience a luxurious stay at the Mayfair Resorts, Goa with friends and family for an unparalleled experience.&lt;/li&gt;&lt;li&gt;While at Mayfair Resorts, apart from the relaxing stay you will be taken out for an enthralling sightseeing tour to Mangeshi Temple, Old Goa Church and Miramar Beach.&lt;/li&gt;&lt;li&gt;You can relax with a couple massage or a candle light dinner with a bottle of wine with your partner.&lt;/li&gt;&lt;li&gt;The resort has special packages for luxurious and honeymoon stays.&lt;/li&gt;&lt;li&gt;Complimentary Goa Airport / Madgaon railway station transfer by sharing on fixed departures.&lt;br&gt;&lt;/li&gt;&lt;li&gt;Meals are also provided in this package&lt;br&gt;&lt;/li&gt;&lt;li&gt;The stay is available at Double Occupancy&lt;/li&gt;', '&lt;ul&gt;&lt;li&gt;Non-alcoholic Welcome Drink&lt;/li&gt;&lt;li&gt;Two bottles of packaged drinking water.&lt;/li&gt;&lt;li&gt;Swimming Pool and fitness centre facilities.&lt;/li&gt;&lt;/ul&gt;', NULL, '', 'Vegetarian and Non-Vegetarian - Breakfast, Lunch, Dinner', NULL, '&lt;ul&gt;&lt;li&gt;Camera&lt;/li&gt;&lt;li&gt;Extra Set of clothes&lt;/li&gt;&lt;li&gt;Bathing Suit&lt;/li&gt;&lt;li&gt;Sunscreen&lt;/li&gt;&lt;li&gt;Sunglasses&lt;/li&gt;&lt;/ul&gt;', NULL, 'family', '&lt;ul&gt;&lt;li&gt;The customer receives a confirmation voucher via email within 24 hours of successful booking&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;The customer receives a confirmation voucher via email within 24 hours of successful booking&lt;/li&gt;&lt;li&gt;In case the preferred slots are unavailable, an alternate schedule of the customer&rsquo;s preference will be arranged and a new confirmation voucher will be sent via email.&lt;/li&gt;&lt;li&gt;Alternatively, the customer may choose to cancel their booking and a full refund will be processed.&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;The applicable refund amount will be processed within 15 business days&lt;/li&gt;&lt;/ul&gt;', 'Baga, Goa', '08:25', 10, 1, 5, 1, 1, 1, 15, 0, 12, 0, 0, 2.0, 0, 1, 1, '2018-08-23 09:11:10', 3, '0000-00-00 00:00:00', 0),
(3, 'TRIP3dnx100', 4, 6, 'Mayfair Resorts Shared Trip, Goa', 'mayfair-resorts-shared-trip-goa', '1535027789_b2.jpg', 2, NULL, NULL, 2, 2, 0, 2000, 1500, 0, 2, 2, 1, 3, 0, 0, '&lt;li&gt;Experience a luxurious stay at the Mayfair Resorts, Goa with friends and family for an unparalleled experience.&lt;/li&gt;&lt;li&gt;While at Mayfair Resorts, apart from the relaxing stay you will be taken out for an enthralling sightseeing tour to Mangeshi Temple, Old Goa Church and Miramar Beach.&lt;/li&gt;&lt;li&gt;You can relax with a couple massage or a candle light dinner with a bottle of wine with your partner.&lt;/li&gt;&lt;li&gt;The resort has special packages for luxurious and honeymoon stays.&lt;/li&gt;&lt;li&gt;Complimentary Goa Airport / Madgaon railway station transfer by sharing on fixed departures.&lt;br&gt;&lt;/li&gt;&lt;li&gt;Meals are also provided in this package&lt;br&gt;&lt;/li&gt;&lt;li&gt;The stay is available at Double Occupancy&lt;/li&gt;', '&lt;ul&gt;&lt;li&gt;Non-alcoholic Welcome Drink&lt;/li&gt;&lt;li&gt;Two bottles of packaged drinking water.&lt;/li&gt;&lt;li&gt;Swimming Pool and fitness centre facilities.&lt;/li&gt;&lt;/ul&gt;', NULL, '', 'Vegetarian and Non-Vegetarian - Breakfast, Lunch, Dinner', NULL, '&lt;ul&gt;&lt;li&gt;Camera&lt;/li&gt;&lt;li&gt;Extra Set of clothes&lt;/li&gt;&lt;li&gt;Bathing Suit&lt;/li&gt;&lt;li&gt;Sunscreen&lt;/li&gt;&lt;li&gt;Sunglasses&lt;/li&gt;&lt;/ul&gt;', NULL, 'family', '&lt;ul&gt;&lt;li&gt;The customer receives a confirmation voucher via email within 24 hours of successful booking&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;The customer receives a confirmation voucher via email within 24 hours of successful booking&lt;/li&gt;&lt;li&gt;In case the preferred slots are unavailable, an alternate schedule of the customer&rsquo;s preference will be arranged and a new confirmation voucher will be sent via email.&lt;/li&gt;&lt;li&gt;Alternatively, the customer may choose to cancel their booking and a full refund will be processed.&lt;/li&gt;&lt;/ul&gt;', '&lt;ul&gt;&lt;li&gt;The applicable refund amount will be processed within 15 business days&lt;/li&gt;&lt;/ul&gt;', 'Baga, Goa', '08:25', 10, 1, 5, 1, 1, 1, 15, 0, 12, 1, 1, 0.0, 1, 1, 1, '2018-08-23 09:11:10', 3, '0000-00-00 00:00:00', 0),
(4, 'TRIPH8sJmz9', 3, 1, 'NORTH GOA SIGHTSEEING', 'north-goa-sightseeing', '1535210694_cacp2v8t.jpg', 0, NULL, NULL, 1, 2, 0, 350, 350, 0, 1, 0, 0, 0, 0, 8, 'All the popular places of north goa which includes Calangute Beach, Fort Aguada, Anjuna beach, Chapora fort and Vagator beach', 'TRANSFERS ONLY', 'ENTRY FEES, MEALS, AND ALL EXPENSES OF PERSONAL NATURE.', 'ENGLISH AND HINDI', 'NOT APPLICABLE', 'PICK UP AND DROP FROM ITS POINTS AND ALL TRANSFERS INCLUDED.', 'CAMERA AND WATER BOTTLE', NULL, 'THIS IS A GROUP TOUR BY BUS', 'IF CANCELLED 30 DAYS BEFORE 100% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 15 DAYS BEFORE 75% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 10 DAYS BEFORE 50% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 5 DAYS BEFORE 25% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 3 DAYS BEFORE 0% WILL BE REFUNDED&lt;br&gt;', 'A booking will be confirmed after 100% payment and a confirmed pnr.', 'The cancellation refund will be processed in 10-15 working days after the day of cancellation depending on the cancellation policy.', 'CANDOLIM', '08:00', 50, 2, 50, 1, 1, 1, 1, 0, 12, 0, 0, 0.0, 0, 1, 1, '2018-08-25 15:54:48', 3, '0000-00-00 00:00:00', 0),
(5, 'TRIP7waPKFz', 3, 6, 'ISLAND TOUR', 'island-tour', '1535456738_download.jpg', 0, NULL, NULL, 7, 2, 0, 1200, 1200, 0, 1, 0, 0, 0, 0, 8, 'TRIP TO ISLAND WHICH INCLUDES FISHING, DOLPHIN, SNOERKLING AND LUNCH.', 'FISHING, DOLPHIN, SNOERKLING AND LUNCH AND DRINKS', NULL, 'HINDI AND ENGLISH', 'VEG AND NON VEG', 'ALL TRANSFERS AND BOAT CHARGES', 'TOWELS, DRESS TO CHANGE AND SUN CREAM', NULL, 'THIS IS A GROUP TOUR', 'IF CANCELLED 30 DAYS BEFORE 100% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 15 DAYS BEFORE 75% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 10 DAYS BEFORE 50% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 5 DAYS BEFORE 25% WILL BE REFUNDED&lt;br&gt;IF CANCELLED 3 DAYS BEFORE 0% WILL BE REFUNDED&lt;br&gt;', 'AFTER 100% PAYMENT', 'The cancellation refund will be processed in 10-15 working days after the day of cancellation depending on the cancellation policy.&lt;br&gt;', 'CALANGUTE', '08:00', 25, 2, 25, 1, 1, 1, 0, 0, 12, 0, 0, 0.0, 0, 1, 1, '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0),
(6, 'TRIPpZe0LIb', 3, 14, 'September trip', 'september-trip', '1537434002_Mae-De-Deus-Church-at-night-Saligaon.jpg', 0, NULL, NULL, 8, 2, 0, 1000, 1000, 500, 1, 0, 0, 0, 0, 8, 'It is a sightseeing trip started from September. It is a sightseeing trip started from September. It is a sightseeing trip started from September', 'Only Transfers', NULL, '', '', 'All transfers by Ac bus.&amp;nbsp;', NULL, NULL, 'This is group tour', 'Refund:&lt;br&gt;100% if Cancelled 10 days before&lt;br&gt;50% if Cancelled 5 days before&lt;br&gt;25% if Cancelled 3 days before&lt;br&gt;0% if Cancelled within 3 days before', 'Confirmation on 100% payment and the generation of PNR', 'Refund will be processed in 10-15 working days.', 'Candolim', '08:20', 50, 1, 2, 1, 1, 1, 1, 0, 5, 0, 0, 0.0, 10, 1, 1, '2018-09-20 09:22:20', 3, '0000-00-00 00:00:00', 0),
(7, 'TRIPL6Ye9PK', 4, 14, 'September2 trip2', 'september2-trip2', '1537434002_Mae-De-Deus-Church-at-night-Saligaon.jpg', 6, NULL, NULL, 8, 2, 0, 1500, 1500, 1000, 1, 0, 0, 0, 0, 8, 'It is a sightseeing trip started from September with LUNCH . It is a sightseeing trip started from September with LUNCH. It is a sightseeing trip started from September with LUNCH', 'Only Transfers and lunch', NULL, '', '', 'All transfers by Ac bus WITH LUNCH', NULL, NULL, 'This is group tour', 'Refund:&lt;br&gt;100% if Cancelled 10 days before&lt;br&gt;50% if Cancelled 5 days before&lt;br&gt;25% if Cancelled 3 days before&lt;br&gt;0% if Cancelled within 3 days before', 'Confirmation on 100% payment and the generation of PNR', 'Refund will be processed in 10-15 working days.', 'Candolim', '08:20', 50, 1, 2, 1, 1, 1, 0, 0, 5, 1, 2, 0.0, 42, 1, 1, '2018-09-21 07:32:36', 4, '2018-09-21 07:41:22', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_shared`
--

INSERT INTO `trip_shared` (`id`, `code`, `trip_id`, `shared_user_id`, `user_id`, `to_user_mail`, `coupon_history_id`, `status`, `isactive`) VALUES
(1, 'SHARE52431', 2, 3, 4, '', 0, 2, 1),
(2, 'SHARE365217', 6, 3, 4, '', 0, 2, 1),
(5, 'SHAREnz1xM', 1, 3, 4, '', 12, 1, 1),
(23, 'SHAREBQpH5', 5, 3, NULL, 'sdsd@sd.df', 0, 1, 1),
(24, 'SHAREBQpH5', 5, 3, NULL, 'dfdf@fs.ddf', 0, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_specific_day`
--

INSERT INTO `trip_specific_day` (`id`, `trip_id`, `type`, `title`, `from_date`, `to_date`, `no_of_traveller`, `no_of_min_booktraveller`, `no_of_max_booktraveller`, `offer_type`, `price_to_adult`, `price_to_child`, `price_to_infan`, `isactive`) VALUES
(1, 1, 2, 'For rain due', '2018-08-17', '2018-08-24', 0, 0, 0, 0, 0.00, 0.00, 0.00, 0),
(2, 1, 1, 'Dwali offer', '2018-08-17', '2018-08-31', 50, 1, 5, 1, 1100.00, 900.00, 0.00, 1),
(3, 2, 1, 'Dwali offer', '2018-08-17', '2018-08-31', 0, 0, 0, 2, 10.00, 10.00, 10.00, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

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
(23, ' snoerkling', '2018-08-28 11:58:23', 3, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_tag_map`
--

CREATE TABLE IF NOT EXISTS `trip_tag_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_tag_map`
--

INSERT INTO `trip_tag_map` (`id`, `trip_id`, `tag_id`, `isactive`) VALUES
(1, 1, 1, 1),
(2, 2, 9, 1),
(3, 2, 18, 1),
(4, 2, 19, 1),
(5, 4, 1, 1),
(6, 5, 1, 1),
(7, 5, 20, 1),
(8, 5, 21, 1),
(9, 5, 22, 1),
(10, 5, 23, 1),
(11, 6, 1, 1),
(12, 7, 1, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_bank_master`
--

INSERT INTO `user_bank_master` (`bank_id`, `user_id`, `bank_name`, `account_holder_name`, `account_number`, `ifsc_code`, `branch_name`, `address`, `is_primary`, `added_on`, `added_by`, `updated_on`, `updated_by`, `bank_master_status`) VALUES
(1, 4, 'HDFC BANK', 'VENDOR', '123456789', 'HDFC0000001', 'goa branch', 'goa Address', 1, '2018-10-14 08:33:31', 4, NULL, NULL, 1);

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
  `profile_pic` text,
  `balance_amt` float(8,2) NOT NULL,
  `unclear_amt` float(8,2) NOT NULL,
  `social_network` text,
  `auth_id` text,
  `login_via` tinyint(1) DEFAULT '1' COMMENT '1->login,2->fb,3->google',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` timestamp NULL DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0->de active, 1->active,2->not activated'
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_type`, `email`, `password`, `user_fullname`, `dob`, `gender`, `phone`, `alt_phone`, `emergency_contact_person`, `emergency_contact_no`, `activation_code`, `activation_code_time`, `about_me`, `profile_pic`, `balance_amt`, `unclear_amt`, `social_network`, `auth_id`, `login_via`, `created_on`, `last_visit`, `isactive`) VALUES
(1, 'CU', 'customer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Customer', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(2, 'SA', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Admin', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4180.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(3, 'VA', 'vendor@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor1', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32665.00, 2500.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(4, 'VA', 'vendor2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor2', '2018-06-22', '1', '9688079118', '', '', '', NULL, NULL, NULL, NULL, 16660.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(5, 'GU', 'gucustomer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'gust', NULL, NULL, '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-08-20 16:03:49', NULL, 2),
(7, 'GU', 'customer2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'gust2', NULL, NULL, '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-08-23 15:42:04', NULL, 2),
(8, 'GU', 'r@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'reiju', NULL, NULL, '9123456789', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-08-26 10:32:45', NULL, 2),
(9, 'GU', 'r2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'reiju2', NULL, NULL, '9345678912', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-08-26 10:35:10', NULL, 2),
(10, 'GU', 'v@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'vinod', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-08-28 10:43:07', NULL, 2),
(11, 'GU', 'v2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'vinod', NULL, NULL, '1234546666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-08-28 10:47:02', NULL, 2),
(12, 'GU', 'vt@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Test', NULL, NULL, '8322489218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-08-28 12:24:07', NULL, 2),
(13, 'GU', 'vinod4@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'vinod four', NULL, NULL, '4567812349', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-01 17:35:53', NULL, 2),
(14, 'GU', 'vt@maiol.com', '14e1b600b1fd579f47433b88e8d85291', 'vinod test', NULL, NULL, '8322489218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-20 10:13:13', NULL, 2),
(16, 'CU', 'anjaneyavadivel@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Anjaneya vadivelu', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-20 12:40:25', '2018-09-20 12:40:58', 1),
(17, 'GU', 'VT@GMAIL.COM', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Test', NULL, NULL, '8322489218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-21 07:00:03', NULL, 2),
(18, 'GU', 'VT@GMAIL.COM', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Test', NULL, NULL, '9822153576', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-21 07:03:19', NULL, 2),
(19, 'GU', 'vt2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vin2 Test2', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-21 10:12:39', NULL, 2),
(20, 'GU', 'goahemtravels@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vin Test22', NULL, NULL, '8322489218', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-22 13:03:35', NULL, 2),
(21, 'GU', 'vt3@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-26 10:31:07', NULL, 2),
(22, 'GU', 'ob@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Off Book', NULL, NULL, '1112223334', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-26 10:49:52', NULL, 2),
(23, 'GU', 'vt3@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Test', NULL, NULL, '1112223334', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-26 11:05:07', NULL, 2),
(24, 'GU', 'ob@mai.com', '14e1b600b1fd579f47433b88e8d85291', 'Off Book', NULL, NULL, '2223334445', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-26 11:42:52', NULL, 2),
(25, 'GU', 'vt3@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vin Test3', NULL, NULL, '2223334445', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-29 11:58:53', NULL, 2),
(26, 'GU', 'customer3@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'customer3', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-06 15:44:19', NULL, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city_master`
--
ALTER TABLE `city_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `coupon_code_master_history`
--
ALTER TABLE `coupon_code_master_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `faq_master`
--
ALTER TABLE `faq_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `my_transaction`
--
ALTER TABLE `my_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trip_avilable`
--
ALTER TABLE `trip_avilable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `trip_book_pay`
--
ALTER TABLE `trip_book_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `trip_book_pay_details`
--
ALTER TABLE `trip_book_pay_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `trip_category`
--
ALTER TABLE `trip_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `trip_comment`
--
ALTER TABLE `trip_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `trip_inclusions`
--
ALTER TABLE `trip_inclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trip_inclusions_map`
--
ALTER TABLE `trip_inclusions_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `trip_itinerary`
--
ALTER TABLE `trip_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `trip_master`
--
ALTER TABLE `trip_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `trip_shared`
--
ALTER TABLE `trip_shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `trip_specific_day`
--
ALTER TABLE `trip_specific_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trip_tags`
--
ALTER TABLE `trip_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `trip_tag_map`
--
ALTER TABLE `trip_tag_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_bank_master`
--
ALTER TABLE `user_bank_master`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
