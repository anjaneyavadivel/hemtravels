-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2019 at 04:00 PM
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
(12, 2, 'SIOLIM', '2018-10-31 08:03:05', 57, '0000-00-00 00:00:00', 0, 1),
(13, 2, 'SOUTH GOA', '2019-01-18 17:23:29', 109, '0000-00-00 00:00:00', 0, 1);

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
(1, 102, 1, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-01', '2019-04-30', ' PAYMENT WILL BE SETTELED IN CASH', 0, 0.00, 0.00, 0.00, '2019-01-01 10:54:12', 1),
(2, 79, 4, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-01', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH ', 0, 0.00, 0.00, 0.00, '2019-01-01 16:21:53', 1),
(3, 81, 9, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-09', '2019-03-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2019-01-09 14:22:34', 1),
(4, 102, 10, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-13', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2019-01-12 12:54:19', 1),
(5, 109, 12, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-18', '2019-03-31', ' ', 0, 0.00, 0.00, 0.00, '2019-01-18 11:56:20', 1),
(6, 109, 12, 2, 'DIS10', 'VENDOR DISC 10%', 2, 10.00, '2019-01-18', '2019-03-31', '10% DISCOUNT IS OFFERED TO THE VENDOR BALANCE WILL BE PAID BY THE CLIENT ONLINE AT THE TIME OF BOOKING.', 0, 0.00, 0.00, 0.00, '2019-01-18 11:58:35', 1);

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
(1, 102, 1, 1, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-01', '2019-04-30', ' PAYMENT WILL BE SETTELED IN CASH', 0, 0.00, 0.00, 0.00, '2019-01-01 10:54:12', 1),
(2, 79, 2, 4, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-01', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH ', 0, 0.00, 0.00, 0.00, '2019-01-01 16:21:53', 1),
(3, 81, 3, 9, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-09', '2019-03-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2019-01-09 14:22:34', 1),
(4, 102, 4, 10, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-13', '2019-04-30', ' PAYMENT WILL BE SETTLED IN CASH', 0, 0.00, 0.00, 0.00, '2019-01-12 12:54:19', 1),
(5, 109, 5, 12, 2, 'CASH', 'PAYMENT IN CASH', 2, 100.00, '2019-01-18', '2019-03-31', ' ', 0, 0.00, 0.00, 0.00, '2019-01-18 11:56:20', 1),
(6, 109, 6, 12, 2, 'DIS10', 'VENDOR DISC 10%', 2, 10.00, '2019-01-18', '2019-03-31', '10% DISCOUNT IS OFFERED TO THE VENDOR BALANCE WILL BE PAID BY THE CLIENT ONLINE AT THE TIME OF BOOKING.', 0, 0.00, 0.00, 0.00, '2019-01-18 11:58:35', 1);

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
(1, 0, 0, 'PNR27OQBABR', -1, 0, 81, 0, '2019-01-01 16:27:31', 'Withdrawal: Trip has been booked PNR27OQBABR', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR27OQBABR', '0000-00-00 00:00:00', 2),
(2, 0, 0, 'PNR27OQBABR', 81, -1, 0, 0, '2019-01-01 16:27:31', 'Deposit: Trip has been booked PNR27OQBABR', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR27OQBABR', '0000-00-00 00:00:00', 2),
(3, 2, 0, 'PNR27OQBABR', -1, 0, 81, 5, '2019-01-01 16:27:31', 'Withdrawal: Trip has been booked PNR27OQBABR / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(4, 2, 0, 'PNR27OQBABR', 81, -1, 0, 5, '2019-01-01 16:27:31', 'Deposit: Trip has been booked PNR27OQBABR / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(5, 0, 0, 'PNR815YVXSG', -1, 0, 81, 0, '2019-01-03 15:07:39', 'Withdrawal: Trip has been booked PNR815YVXSG', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR815YVXSG', '0000-00-00 00:00:00', 2),
(6, 0, 0, 'PNR815YVXSG', 81, -1, 0, 0, '2019-01-03 15:07:39', 'Deposit: Trip has been booked PNR815YVXSG', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR815YVXSG', '0000-00-00 00:00:00', 2),
(7, 4, 0, 'PNR815YVXSG', -1, 0, 81, 5, '2019-01-03 15:07:39', 'Withdrawal: Trip has been booked PNR815YVXSG / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(8, 4, 0, 'PNR815YVXSG', 81, -1, 0, 5, '2019-01-03 15:07:39', 'Deposit: Trip has been booked PNR815YVXSG / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(9, 2, 3, 'PNR27OQBABR', -1, 79, 0, 4, '2019-01-04 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR27OQBABR (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 20.00, 0.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(10, 2, 3, 'PNR27OQBABR', 0, -1, 79, 4, '2019-01-04 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR27OQBABR (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 0.00, 20.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(11, 2, 3, 'PNR27OQBABR', -1, 0, 79, 4, '2019-01-04 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR27OQBABR (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 20.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(12, 2, 3, 'PNR27OQBABR', 79, -1, 0, 4, '2019-01-04 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR27OQBABR (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 0.00, 20.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(13, 2, 3, 'PNR27OQBABR', -1, 79, 0, 4, '2019-01-04 01:00:01', 'Withdrawal: Trip booking amount for PNR No PNR27OQBABR (TRIPs8Exlad / WATERFALLS ( ABH RUS )). Include GST and Service Charge.', -20.00, 0.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(14, 2, 3, 'PNR27OQBABR', 0, -1, 79, 4, '2019-01-04 01:00:01', 'Deposit: Trip booking amount for PNR No PNR27OQBABR (TRIPs8Exlad / WATERFALLS ( ABH RUS )). Include GST and Service Charge.', 0.00, -20.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(15, 2, 4, 'PNR27OQBABR', -1, 81, 0, 5, '2019-01-04 01:00:09', 'Withdrawal: Trip booking amount for PNR No PNR27OQBABR (TRIPpcBPK3J / WATERFALLS ( ABH RUS )).', 0.00, 0.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(16, 2, 4, 'PNR27OQBABR', 0, -1, 81, 5, '2019-01-04 01:00:09', 'Deposit: Trip booking amount for PNR No PNR27OQBABR (TRIPpcBPK3J / WATERFALLS ( ABH RUS )).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(17, 4, 7, 'PNR815YVXSG', -1, 79, 0, 4, '2019-01-06 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR815YVXSG (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 20.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(18, 4, 7, 'PNR815YVXSG', 0, -1, 79, 4, '2019-01-06 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR815YVXSG (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 0.00, 20.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(19, 4, 7, 'PNR815YVXSG', -1, 0, 79, 4, '2019-01-06 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR815YVXSG (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 20.00, 0.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(20, 4, 7, 'PNR815YVXSG', 79, -1, 0, 4, '2019-01-06 01:00:01', 'Deposit: Trip booking servicecharge amount for PNR No PNR815YVXSG (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 0.00, 20.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(21, 4, 7, 'PNR815YVXSG', -1, 79, 0, 4, '2019-01-06 01:00:01', 'Withdrawal: Trip booking amount for PNR No PNR815YVXSG (TRIPs8Exlad / WATERFALLS ( ABH RUS )). Include GST and Service Charge.', -20.00, 0.00, 40.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(22, 4, 7, 'PNR815YVXSG', 0, -1, 79, 4, '2019-01-06 01:00:01', 'Deposit: Trip booking amount for PNR No PNR815YVXSG (TRIPs8Exlad / WATERFALLS ( ABH RUS )). Include GST and Service Charge.', 0.00, -20.00, -40.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(23, 4, 8, 'PNR815YVXSG', -1, 81, 0, 5, '2019-01-06 01:00:08', 'Withdrawal: Trip booking amount for PNR No PNR815YVXSG (TRIPpcBPK3J / WATERFALLS ( ABH RUS )).', 0.00, 0.00, 40.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(24, 4, 8, 'PNR815YVXSG', 0, -1, 81, 5, '2019-01-06 01:00:08', 'Deposit: Trip booking amount for PNR No PNR815YVXSG (TRIPpcBPK3J / WATERFALLS ( ABH RUS )).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(25, 0, 0, 'PNR680BOGKA', -1, 0, 102, 0, '2019-01-08 13:58:34', 'Withdrawal: Trip has been booked PNR680BOGKA', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR680BOGKA', '0000-00-00 00:00:00', 2),
(26, 0, 0, 'PNR680BOGKA', 102, -1, 0, 0, '2019-01-08 13:58:34', 'Deposit: Trip has been booked PNR680BOGKA', 0.00, 0.00, 40.00, 0, 0, 0.00, 'Office Booking PNRPNR680BOGKA', '0000-00-00 00:00:00', 2),
(27, 5, 0, 'PNR680BOGKA', -1, 0, 81, 8, '2019-01-08 13:58:34', 'Withdrawal: Trip has been booked PNR680BOGKA / TRIPLsy1ZFk / NORTH GOA SIGHTSEEING AT 350/-', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(28, 5, 0, 'PNR680BOGKA', 81, -1, 0, 8, '2019-01-08 13:58:34', 'Deposit: Trip has been booked PNR680BOGKA / TRIPLsy1ZFk / NORTH GOA SIGHTSEEING AT 350/-', 0.00, 0.00, 40.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(29, 0, 0, 'PNR16GIAS5P', -1, -1, 81, 0, '2019-01-10 05:46:24', 'Deposit: Cash Deposited', 0.00, 1600.00, 1600.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(30, 0, 0, 'PNR16GIAS5P', -1, 0, 81, 0, '2019-01-10 05:46:24', 'Withdrawal: Trip has been booked PNR16GIAS5P', 1600.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR16GIAS5P', '0000-00-00 00:00:00', 2),
(31, 0, 0, 'PNR16GIAS5P', 81, -1, 0, 0, '2019-01-10 05:46:24', 'Deposit: Trip has been booked PNR16GIAS5P', 0.00, 1600.00, 1640.00, 0, 0, 0.00, 'Office Booking PNRPNR16GIAS5P', '0000-00-00 00:00:00', 2),
(32, 5, 9, 'PNR680BOGKA', -1, 81, 0, 8, '2019-01-12 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR680BOGKA (TRIPLsy1ZFk / NORTH GOA SIGHTSEEING AT 350/-).', 0.00, 0.00, 1640.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(33, 5, 9, 'PNR680BOGKA', 0, -1, 81, 8, '2019-01-12 01:00:02', 'Deposit: Trip booking amount for PNR No PNR680BOGKA (TRIPLsy1ZFk / NORTH GOA SIGHTSEEING AT 350/-).', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(34, 0, 0, 'PNR67VMZWLM', -1, -1, 57, 0, '2019-01-13 02:45:33', 'Deposit: Cash Deposited', 0.00, 700.00, 700.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(35, 0, 0, 'PNR67VMZWLM', -1, 0, 57, 0, '2019-01-13 02:45:33', 'Withdrawal: Trip has been booked PNR67VMZWLM', 700.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR67VMZWLM', '0000-00-00 00:00:00', 2),
(36, 0, 0, 'PNR67VMZWLM', 57, -1, 0, 0, '2019-01-13 02:45:33', 'Deposit: Trip has been booked PNR67VMZWLM', 0.00, 700.00, 2340.00, 0, 0, 0.00, 'Office Booking PNRPNR67VMZWLM', '0000-00-00 00:00:00', 2),
(37, 0, 0, 'PNR26KFYGNU', -1, 0, 81, 0, '2019-01-14 16:30:17', 'Withdrawal: Trip has been booked PNR26KFYGNU', 0.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR26KFYGNU', '0000-00-00 00:00:00', 2),
(38, 0, 0, 'PNR26KFYGNU', 81, -1, 0, 0, '2019-01-14 16:30:17', 'Deposit: Trip has been booked PNR26KFYGNU', 0.00, 0.00, 2340.00, 0, 0, 0.00, 'Office Booking PNRPNR26KFYGNU', '0000-00-00 00:00:00', 2),
(39, 9, 0, 'PNR26KFYGNU', -1, 0, 81, 5, '2019-01-14 16:30:17', 'Withdrawal: Trip has been booked PNR26KFYGNU / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(40, 9, 0, 'PNR26KFYGNU', 81, -1, 0, 5, '2019-01-14 16:30:17', 'Deposit: Trip has been booked PNR26KFYGNU / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 2340.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(41, 7, 11, 'PNR16GIAS5P', -1, 81, 0, 9, '2019-01-15 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR16GIAS5P (TRIPX3IrdDW / SPECIAL PKG).', 32.00, 0.00, 2308.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(42, 7, 11, 'PNR16GIAS5P', 0, -1, 81, 9, '2019-01-15 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR16GIAS5P (TRIPX3IrdDW / SPECIAL PKG).', 0.00, 32.00, 32.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(43, 7, 11, 'PNR16GIAS5P', -1, 0, 81, 9, '2019-01-15 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR16GIAS5P (TRIPX3IrdDW / SPECIAL PKG).', 32.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(44, 7, 11, 'PNR16GIAS5P', 81, -1, 0, 9, '2019-01-15 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR16GIAS5P (TRIPX3IrdDW / SPECIAL PKG).', 0.00, 32.00, 2340.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(45, 7, 11, 'PNR16GIAS5P', -1, 81, 0, 9, '2019-01-15 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR16GIAS5P (TRIPX3IrdDW / SPECIAL PKG). Include GST and Service Charge.', 1568.00, 0.00, 772.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(46, 7, 11, 'PNR16GIAS5P', 0, -1, 81, 9, '2019-01-15 01:00:03', 'Deposit: Trip booking amount for PNR No PNR16GIAS5P (TRIPX3IrdDW / SPECIAL PKG). Include GST and Service Charge.', 0.00, 1568.00, 1568.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(47, 0, 0, 'PNR47FOQPDR', -1, -1, 108, 0, '2019-01-15 06:53:55', 'Deposit: Cash Deposited', 0.00, 1600.00, 1600.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(48, 0, 0, 'PNR47FOQPDR', -1, 0, 108, 0, '2019-01-15 06:53:55', 'Withdrawal: Trip has been booked PNR47FOQPDR', 1600.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR47FOQPDR', '0000-00-00 00:00:00', 2),
(49, 0, 0, 'PNR47FOQPDR', 108, -1, 0, 0, '2019-01-15 06:53:55', 'Deposit: Trip has been booked PNR47FOQPDR', 0.00, 1600.00, 2372.00, 0, 0, 0.00, 'Office Booking PNRPNR47FOQPDR', '0000-00-00 00:00:00', 2),
(50, 8, 12, 'PNR67VMZWLM', -1, 81, 0, 7, '2019-01-16 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR67VMZWLM (TRIPkbvFjAP / SOUTH GOA SIGHTSEEING AT 350).', 20.00, 0.00, 2352.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(51, 8, 12, 'PNR67VMZWLM', 0, -1, 81, 7, '2019-01-16 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR67VMZWLM (TRIPkbvFjAP / SOUTH GOA SIGHTSEEING AT 350).', 0.00, 20.00, 1588.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(52, 8, 12, 'PNR67VMZWLM', -1, 0, 81, 7, '2019-01-16 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR67VMZWLM (TRIPkbvFjAP / SOUTH GOA SIGHTSEEING AT 350).', 20.00, 0.00, 1568.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(53, 8, 12, 'PNR67VMZWLM', 81, -1, 0, 7, '2019-01-16 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR67VMZWLM (TRIPkbvFjAP / SOUTH GOA SIGHTSEEING AT 350).', 0.00, 20.00, 2372.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(54, 8, 12, 'PNR67VMZWLM', -1, 81, 0, 7, '2019-01-16 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR67VMZWLM (TRIPkbvFjAP / SOUTH GOA SIGHTSEEING AT 350). Include GST and Service Charge.', 680.00, 0.00, 1692.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(55, 8, 12, 'PNR67VMZWLM', 0, -1, 81, 7, '2019-01-16 01:00:02', 'Deposit: Trip booking amount for PNR No PNR67VMZWLM (TRIPkbvFjAP / SOUTH GOA SIGHTSEEING AT 350). Include GST and Service Charge.', 0.00, 680.00, 2248.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(56, 0, 0, 'PNR57D5B92Q', -1, -1, 110, 0, '2019-01-18 14:00:42', 'Deposit: Cash Deposited', 0.00, 1200.00, 1200.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(57, 0, 0, 'PNR57D5B92Q', -1, 0, 110, 0, '2019-01-18 14:00:42', 'Withdrawal: Trip has been booked PNR57D5B92Q', 1200.00, 0.00, 0.00, 0, 0, 0.00, 'Office Booking PNRPNR57D5B92Q', '0000-00-00 00:00:00', 2),
(58, 0, 0, 'PNR57D5B92Q', 110, -1, 0, 0, '2019-01-18 14:00:42', 'Deposit: Trip has been booked PNR57D5B92Q', 0.00, 1200.00, 2892.00, 0, 0, 0.00, 'Office Booking PNRPNR57D5B92Q', '0000-00-00 00:00:00', 2),
(59, 11, 17, 'PNR47FOQPDR', -1, 81, 0, 9, '2019-01-19 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPX3IrdDW / SPECIAL PKG).', 32.00, 0.00, 2860.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(60, 11, 17, 'PNR47FOQPDR', 0, -1, 81, 9, '2019-01-19 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPX3IrdDW / SPECIAL PKG).', 0.00, 32.00, 2280.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(61, 11, 17, 'PNR47FOQPDR', -1, 0, 81, 9, '2019-01-19 01:00:03', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPX3IrdDW / SPECIAL PKG).', 32.00, 0.00, 2248.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(62, 11, 17, 'PNR47FOQPDR', 81, -1, 0, 9, '2019-01-19 01:00:03', 'Deposit: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPX3IrdDW / SPECIAL PKG).', 0.00, 32.00, 2892.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(63, 11, 17, 'PNR47FOQPDR', -1, 81, 0, 9, '2019-01-19 01:00:03', 'Withdrawal: Trip booking amount for PNR No PNR47FOQPDR (TRIPX3IrdDW / SPECIAL PKG). Include GST and Service Charge.', 1568.00, 0.00, 1324.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(64, 11, 17, 'PNR47FOQPDR', 0, -1, 81, 9, '2019-01-19 01:00:03', 'Deposit: Trip booking amount for PNR No PNR47FOQPDR (TRIPX3IrdDW / SPECIAL PKG). Include GST and Service Charge.', 0.00, 1568.00, 3816.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(65, 11, 18, 'PNR47FOQPDR', -1, 108, 0, 11, '2019-01-19 01:00:10', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPsDXE1Qp / VELER the beach front restaurant).', 20.00, 0.00, 1304.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(66, 11, 18, 'PNR47FOQPDR', 0, -1, 108, 11, '2019-01-19 01:00:10', 'Deposit: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPsDXE1Qp / VELER the beach front restaurant).', 0.00, 20.00, 20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(67, 11, 18, 'PNR47FOQPDR', -1, 0, 108, 11, '2019-01-19 01:00:10', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPsDXE1Qp / VELER the beach front restaurant).', 20.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(68, 11, 18, 'PNR47FOQPDR', 108, -1, 0, 11, '2019-01-19 01:00:10', 'Deposit: Trip booking servicecharge amount for PNR No PNR47FOQPDR (TRIPsDXE1Qp / VELER the beach front restaurant).', 0.00, 20.00, 1324.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(69, 11, 18, 'PNR47FOQPDR', -1, 108, 0, 11, '2019-01-19 01:00:10', 'Withdrawal: Trip booking amount for PNR No PNR47FOQPDR (TRIPsDXE1Qp / VELER the beach front restaurant). Include GST and Service Charge.', -20.00, 0.00, 1344.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(70, 11, 18, 'PNR47FOQPDR', 0, -1, 108, 11, '2019-01-19 01:00:10', 'Deposit: Trip booking amount for PNR No PNR47FOQPDR (TRIPsDXE1Qp / VELER the beach front restaurant). Include GST and Service Charge.', 0.00, -20.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(71, 0, 0, 'PNR05AMZ2GC', -1, 0, 81, 0, '2019-01-19 15:30:23', 'Withdrawal: Trip has been booked PNR05AMZ2GC', 0.00, 0.00, 3816.00, 0, 0, 0.00, 'Office Booking PNRPNR05AMZ2GC', '0000-00-00 00:00:00', 2),
(72, 0, 0, 'PNR05AMZ2GC', 81, -1, 0, 0, '2019-01-19 15:30:23', 'Deposit: Trip has been booked PNR05AMZ2GC', 0.00, 0.00, 1344.00, 0, 0, 0.00, 'Office Booking PNRPNR05AMZ2GC', '0000-00-00 00:00:00', 2),
(73, 14, 0, 'PNR05AMZ2GC', -1, 0, 111, 13, '2019-01-19 15:30:23', 'Withdrawal: Trip has been booked PNR05AMZ2GC / TRIPJ5AimzW / COLA BEACH TENT (PETER\'S)', 0.00, 0.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(74, 14, 0, 'PNR05AMZ2GC', 111, -1, 0, 13, '2019-01-19 15:30:23', 'Deposit: Trip has been booked PNR05AMZ2GC / TRIPJ5AimzW / COLA BEACH TENT (PETER\'S)', 0.00, 0.00, 1344.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(75, 9, 13, 'PNR26KFYGNU', -1, 79, 0, 4, '2019-01-20 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR26KFYGNU (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 20.00, 0.00, 1324.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(76, 9, 13, 'PNR26KFYGNU', 0, -1, 79, 4, '2019-01-20 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR26KFYGNU (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 0.00, 20.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(77, 9, 13, 'PNR26KFYGNU', -1, 0, 79, 4, '2019-01-20 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR26KFYGNU (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 20.00, 0.00, -40.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(78, 9, 13, 'PNR26KFYGNU', 79, -1, 0, 4, '2019-01-20 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR26KFYGNU (TRIPs8Exlad / WATERFALLS ( ABH RUS )).', 0.00, 20.00, 1344.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(79, 9, 13, 'PNR26KFYGNU', -1, 79, 0, 4, '2019-01-20 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR26KFYGNU (TRIPs8Exlad / WATERFALLS ( ABH RUS )). Include GST and Service Charge.', -20.00, 0.00, 1364.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(80, 9, 13, 'PNR26KFYGNU', 0, -1, 79, 4, '2019-01-20 01:00:02', 'Deposit: Trip booking amount for PNR No PNR26KFYGNU (TRIPs8Exlad / WATERFALLS ( ABH RUS )). Include GST and Service Charge.', 0.00, -20.00, -60.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(81, 9, 14, 'PNR26KFYGNU', -1, 81, 0, 5, '2019-01-20 01:00:09', 'Withdrawal: Trip booking amount for PNR No PNR26KFYGNU (TRIPpcBPK3J / WATERFALLS ( ABH RUS )).', 0.00, 0.00, 1364.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(82, 9, 14, 'PNR26KFYGNU', 0, -1, 81, 5, '2019-01-20 01:00:09', 'Deposit: Trip booking amount for PNR No PNR26KFYGNU (TRIPpcBPK3J / WATERFALLS ( ABH RUS )).', 0.00, 0.00, 3816.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(83, 13, 21, 'PNR57D5B92Q', -1, 81, 0, 9, '2019-01-24 01:00:01', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPX3IrdDW / SPECIAL PKG).', 24.00, 0.00, 1340.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(84, 13, 21, 'PNR57D5B92Q', 0, -1, 81, 9, '2019-01-24 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPX3IrdDW / SPECIAL PKG).', 0.00, 24.00, 3840.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(85, 13, 21, 'PNR57D5B92Q', -1, 0, 81, 9, '2019-01-24 01:00:02', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPX3IrdDW / SPECIAL PKG).', 24.00, 0.00, 3816.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(86, 13, 21, 'PNR57D5B92Q', 81, -1, 0, 9, '2019-01-24 01:00:02', 'Deposit: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPX3IrdDW / SPECIAL PKG).', 0.00, 24.00, 1364.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(87, 13, 21, 'PNR57D5B92Q', -1, 81, 0, 9, '2019-01-24 01:00:02', 'Withdrawal: Trip booking amount for PNR No PNR57D5B92Q (TRIPX3IrdDW / SPECIAL PKG). Include GST and Service Charge.', 1176.00, 0.00, 188.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(88, 13, 21, 'PNR57D5B92Q', 0, -1, 81, 9, '2019-01-24 01:00:02', 'Deposit: Trip booking amount for PNR No PNR57D5B92Q (TRIPX3IrdDW / SPECIAL PKG). Include GST and Service Charge.', 0.00, 1176.00, 4992.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(89, 13, 22, 'PNR57D5B92Q', -1, 108, 0, 11, '2019-01-24 01:00:07', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPsDXE1Qp / VELER the beach front restaurant).', 20.00, 0.00, 168.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(90, 13, 22, 'PNR57D5B92Q', 0, -1, 108, 11, '2019-01-24 01:00:07', 'Deposit: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPsDXE1Qp / VELER the beach front restaurant).', 0.00, 20.00, 0.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(91, 13, 22, 'PNR57D5B92Q', -1, 0, 108, 11, '2019-01-24 01:00:07', 'Withdrawal: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPsDXE1Qp / VELER the beach front restaurant).', 20.00, 0.00, -20.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(92, 13, 22, 'PNR57D5B92Q', 108, -1, 0, 11, '2019-01-24 01:00:07', 'Deposit: Trip booking servicecharge amount for PNR No PNR57D5B92Q (TRIPsDXE1Qp / VELER the beach front restaurant).', 0.00, 20.00, 188.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(93, 13, 22, 'PNR57D5B92Q', -1, 108, 0, 11, '2019-01-24 01:00:07', 'Withdrawal: Trip booking amount for PNR No PNR57D5B92Q (TRIPsDXE1Qp / VELER the beach front restaurant). Include GST and Service Charge.', -20.00, 0.00, 208.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(94, 13, 22, 'PNR57D5B92Q', 0, -1, 108, 11, '2019-01-24 01:00:07', 'Deposit: Trip booking amount for PNR No PNR57D5B92Q (TRIPsDXE1Qp / VELER the beach front restaurant). Include GST and Service Charge.', 0.00, -20.00, -40.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(95, 0, 0, 'PNR42YX1UWD', -1, 0, 81, 0, '2019-01-24 07:59:58', 'Withdrawal: Trip has been booked PNR42YX1UWD', 0.00, 0.00, 4992.00, 0, 0, 0.00, 'Office Booking PNRPNR42YX1UWD', '0000-00-00 00:00:00', 2),
(96, 0, 0, 'PNR42YX1UWD', 81, -1, 0, 0, '2019-01-24 07:59:58', 'Deposit: Trip has been booked PNR42YX1UWD', 0.00, 0.00, 208.00, 0, 0, 0.00, 'Office Booking PNRPNR42YX1UWD', '0000-00-00 00:00:00', 2),
(97, 15, 0, 'PNR42YX1UWD', -1, 0, 81, 14, '2019-01-24 07:59:58', 'Withdrawal: Trip has been booked PNR42YX1UWD / TRIPvOXFsfJ / CROCODILE TRIP', 0.00, 0.00, 4992.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(98, 15, 0, 'PNR42YX1UWD', 81, -1, 0, 14, '2019-01-24 07:59:58', 'Deposit: Trip has been booked PNR42YX1UWD / TRIPvOXFsfJ / CROCODILE TRIP', 0.00, 0.00, 208.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(99, 0, 0, 'PNR69FYN8UZ', -1, 0, 81, 0, '2019-01-24 08:09:56', 'Withdrawal: Trip has been booked PNR69FYN8UZ', 0.00, 0.00, 4992.00, 0, 0, 0.00, 'Office Booking PNRPNR69FYN8UZ', '0000-00-00 00:00:00', 2),
(100, 0, 0, 'PNR69FYN8UZ', 81, -1, 0, 0, '2019-01-24 08:09:56', 'Deposit: Trip has been booked PNR69FYN8UZ', 0.00, 0.00, 208.00, 0, 0, 0.00, 'Office Booking PNRPNR69FYN8UZ', '0000-00-00 00:00:00', 2),
(101, 16, 0, 'PNR69FYN8UZ', -1, 0, 81, 5, '2019-01-24 08:09:56', 'Withdrawal: Trip has been booked PNR69FYN8UZ / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 4992.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(102, 16, 0, 'PNR69FYN8UZ', 81, -1, 0, 5, '2019-01-24 08:09:56', 'Deposit: Trip has been booked PNR69FYN8UZ / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 208.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(103, 0, 0, 'PNR91LYVKGE', -1, 0, 81, 0, '2019-01-24 08:11:46', 'Withdrawal: Trip has been booked PNR91LYVKGE', 0.00, 0.00, 4992.00, 0, 0, 0.00, 'Office Booking PNRPNR91LYVKGE', '0000-00-00 00:00:00', 2),
(104, 0, 0, 'PNR91LYVKGE', 81, -1, 0, 0, '2019-01-24 08:11:46', 'Deposit: Trip has been booked PNR91LYVKGE', 0.00, 0.00, 208.00, 0, 0, 0.00, 'Office Booking PNRPNR91LYVKGE', '0000-00-00 00:00:00', 2),
(105, 17, 0, 'PNR91LYVKGE', -1, 0, 81, 5, '2019-01-24 08:11:46', 'Withdrawal: Trip has been booked PNR91LYVKGE / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 4992.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2),
(106, 17, 0, 'PNR91LYVKGE', 81, -1, 0, 5, '2019-01-24 08:11:46', 'Deposit: Trip has been booked PNR91LYVKGE / TRIPpcBPK3J / WATERFALLS ( ABH RUS )', 0.00, 0.00, 208.00, 0, 0, 0.00, '', '0000-00-00 00:00:00', 2);

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
(1, 1, 11, 'CALANGUTE', '', '8:00', 1),
(2, 1, 11, 'BAGA, RONILS', '', '8:30', 1),
(3, 1, 11, 'CALAGNUTE - NEAR INFANTARIA', '', '8:45', 1),
(4, 1, 11, 'CALANGUTE - PIZZA HUT', '', '9:00', 1),
(5, 1, 11, 'CANDOLIM-AXIS BAND', '', '9:15', 1),
(6, 1, 11, 'sIQUERIM - BUS STAND', '', '9:15', 1),
(7, 2, 11, 'HEM TRAVELS CANDOLIM', '', '9:15', 1),
(8, 2, 11, 'CALANGUTE', '', '8:00', 1),
(9, 2, 11, 'BAGA, RONILS', '', '8:30', 1),
(10, 2, 11, 'CALAGNUTE - NEAR INFANTARIA', '', '8:45', 1),
(11, 2, 11, 'CALANGUTE - PIZZA HUT', '', '9:00', 1),
(12, 2, 11, 'CANDOLIM-AXIS BAND', '', '9:15', 1),
(13, 2, 11, 'sIQUERIM - BUS STAND', '', '9:15', 1),
(14, 3, 11, 'avm baga', '', '08:30', 1),
(15, 3, 11, 'CALANGUTE', '', '8:00', 1),
(16, 3, 11, 'BAGA, RONILS', '', '8:30', 1),
(17, 3, 11, 'CALAGNUTE - NEAR INFANTARIA', '', '8:45', 1),
(18, 3, 11, 'CALANGUTE - PIZZA HUT', '', '9:00', 1),
(19, 3, 11, 'CANDOLIM-AXIS BAND', '', '9:15', 1),
(20, 3, 11, 'sIQUERIM - BUS STAND', '', '9:15', 1),
(21, 4, 11, 'CALANGUTE', '', '06:00', 1),
(22, 4, 11, 'BAGA RONIL', '', '6:00', 1),
(23, 4, 11, 'CALANGUTE INFANTARIA', '', '6:10', 1),
(24, 4, 11, 'CANDOLIM AXIS BANK', '', '6:20', 1),
(25, 5, 11, 'HEM TRAVELS CANDOLIM', '', '6:15', 1),
(26, 5, 11, 'CALANGUTE', '', '06:00', 1),
(27, 5, 11, 'BAGA RONIL', '', '6:00', 1),
(28, 5, 11, 'CALANGUTE INFANTARIA', '', '6:10', 1),
(29, 5, 11, 'CANDOLIM AXIS BANK', '', '6:20', 1),
(30, 6, 7, 'CANDOLIM', '', '06:00', 1),
(31, 6, 7, 'DELPHINO SUPER MARKET  CANDOLIM', '', '6:00', 1),
(32, 6, 7, 'CALANGUTE', '', '06:00', 1),
(33, 6, 7, 'BAGA', '', '06:00', 1),
(34, 7, 11, 'CALANGUTE', '', '08:30', 1),
(35, 7, 11, 'BAGA NEAR RONIL', '', '8:15', 1),
(36, 7, 11, 'CALANGUTE CIRCLE', '', '8:30', 1),
(37, 7, 11, 'CANDOLIM', '', '09:00', 1),
(38, 8, 11, 'BAGA CCD', '', '8:30', 1),
(39, 8, 11, 'CALANGUTE CIRCEL', '', '8:45', 1),
(40, 8, 11, 'CANDOLIM AXIS BANK', '', '9:00', 1),
(41, 9, 11, 'CALANGUTE', '', '09:00', 1),
(42, 10, 11, 'CALANGUTE', '', '8:30', 1),
(43, 10, 11, 'Baga', '', '8:00', 1),
(44, 10, 11, 'CANDOLIM', '', '9:00', 1),
(45, 10, 11, 'SINQUERIN', '', '9:15', 1),
(46, 11, 11, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '08:15', 1),
(47, 11, 11, 'CALANGUTE', '', '09:00', 1),
(48, 12, 13, 'COLA BEACH', '', '10:00', 1),
(49, 12, 13, 'BAGA CCD', '', '7:45', 1),
(50, 12, 13, 'CALANGUTE INFANTERIA', '', '8:00', 1),
(51, 12, 13, 'CANDOLIM AXIS BANK', '', '8:15', 1),
(52, 13, 13, 'HEM TRAVELS CANDOLIM', '', '8:30', 1),
(53, 13, 13, 'COLA BEACH', '', '10:00', 1),
(54, 13, 13, 'BAGA CCD', '', '7:45', 1),
(55, 13, 13, 'CALANGUTE INFANTERIA', '', '8:00', 1),
(56, 13, 13, 'CANDOLIM AXIS BANK', '', '8:15', 1),
(57, 14, 11, 'HEM TRAVELS CANDOLIM', '', '8:00', 1);

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
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-01 10:52:01', 0, '0000-00-00 00:00:00', 0),
(2, 2, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-01 10:58:29', 0, '0000-00-00 00:00:00', 0),
(3, 3, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-01 15:57:15', 0, '0000-00-00 00:00:00', 0),
(4, 4, 1, 1, 1, 1, 1, 1, 0, 1, '2019-01-01 16:20:14', 0, '0000-00-00 00:00:00', 0),
(5, 5, 1, 1, 1, 1, 1, 1, 0, 1, '2019-01-01 16:25:41', 0, '0000-00-00 00:00:00', 0),
(6, 6, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-03 15:38:29', 0, '0000-00-00 00:00:00', 0),
(7, 7, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-05 15:39:47', 0, '0000-00-00 00:00:00', 0),
(8, 8, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-08 12:57:45', 0, '0000-00-00 00:00:00', 0),
(9, 9, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-09 13:43:08', 0, '0000-00-00 00:00:00', 0),
(10, 10, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-12 12:47:26', 0, '0000-00-00 00:00:00', 0),
(11, 11, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-15 06:23:27', 0, '0000-00-00 00:00:00', 0),
(12, 12, 0, 1, 0, 0, 1, 0, 0, 1, '2019-01-18 11:53:29', 0, '0000-00-00 00:00:00', 0),
(13, 13, 0, 1, 0, 0, 1, 0, 0, 1, '2019-01-19 15:28:33', 0, '0000-00-00 00:00:00', 0),
(14, 14, 1, 1, 1, 1, 1, 1, 1, 1, '2019-01-24 07:54:37', 0, '0000-00-00 00:00:00', 0);

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
  `booked_comment` text,
  `booked_type` int(2) NOT NULL DEFAULT '1',
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

INSERT INTO `trip_book_pay` (`id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `gst_percentage`, `gst_amt`, `round_off`, `net_price`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `booked_to`, `booked_email`, `booked_phone_no`, `booked_comment`, `booked_type`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `isactive`) VALUES
(1, 1, 81, 2, 107, 'PNR31MGVRXD', 1, 1500.00, 1500.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, '2019-01-02', '2019-01-02', '09:15:00', 7, 'HEM TRAVELS CANDOLIM', '', '2019-01-01 13:56:41', 107, 'Vinod', 'vinod@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(2, 4, 81, 5, 81, 'PNR27OQBABR', 4, 3000.00, 3000.00, 0.00, 4, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 0.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-02', '2019-01-02', '06:20:00', 29, 'CANDOLIM AXIS BANK', '', '2019-01-01 16:27:31', 81, 'MS ANNA, SEA BREEZE-28, AT RECEPTION AT 6:15', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-04', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(3, 1, 91, 3, 81, 'PNR987WIEQS', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3000.00, '2019-03-01', '2019-03-01', '08:30:00', 14, 'avm baga', '', '2019-01-01 16:35:45', 81, 'Vinod', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(4, 4, 81, 5, 81, 'PNR815YVXSG', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-04', '2019-01-04', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-03 15:07:39', 81, 'Ms OLGA, ALOR GRAND - 344 AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-06', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(5, 0, 81, 8, 102, 'PNR680BOGKA', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 350.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-10', '2019-01-10', '08:45:00', 39, 'CALANGUTE CIRCEL', '', '2019-01-08 13:58:34', 102, 'Test Vinod', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-12', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(6, 0, 81, 8, 81, 'PNR90VXI5A6', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 350.00, '2019-01-10', '2019-01-10', '08:45:00', 39, 'CALANGUTE CIRCEL', '', '2019-01-08 13:59:37', 81, 'Amitabh Bachchan', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(7, 0, 81, 9, 81, 'PNR16GIAS5P', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, '2019-01-11', '2019-01-13', '09:00:00', 41, 'CALANGUTE', '', '2019-01-10 05:45:29', 81, 'VINOD PAYMENT TEST', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-15', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(8, 0, 81, 7, 57, 'PNR67VMZWLM', 2, 350.00, 350.00, 0.00, 2, 0, 0, 700.00, 0.00, 0.00, 700.00, 700.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 700.00, '2019-01-14', '2019-01-14', '08:30:00', 34, 'CALANGUTE', '', '2019-01-13 02:44:10', 57, 'VINOD KHANNA', 'v_inod_v@yahoo.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-16', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(9, 4, 81, 5, 81, 'PNR26KFYGNU', 4, 3000.00, 3000.00, 0.00, 4, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 0.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-18', '2019-01-18', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-14 16:30:17', 81, 'Mr Andre, Sea Breeze - 18, At Reception At 6:00, +7 9277069063', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-20', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(10, 9, 108, 11, 108, 'PNR25L6KSRW', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 06:37:55', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(11, 9, 108, 11, 108, 'PNR47FOQPDR', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 06:49:53', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 5, 1, 1, 1, '2019-01-19', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(12, 9, 108, 11, 108, 'PNR91MK1RLT', 6, 1000.00, 500.00, 100.00, 2, 2, 2, 2000.00, 1000.00, 200.00, 3200.00, 3200.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3200.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 07:04:08', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(13, 9, 108, 11, 110, 'PNR57D5B92Q', 4, 1000.00, 500.00, 100.00, 0, 2, 2, 0.00, 1000.00, 200.00, 1200.00, 1200.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1200.00, '2019-01-20', '2019-01-22', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-18 13:57:27', 110, 'Girish Kumar', 'girishkumar4273@hotmail.com', '9822786660', NULL, 1, 5, 1, 1, 1, '2019-01-24', 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(14, 12, 81, 13, 111, 'PNR05AMZ2GC', 2, 5500.00, 5500.00, 0.00, 2, 0, 0, 11000.00, 0.00, 0.00, 11000.00, 11000.00, 0, 0, '', 0.00, 0.00, 11000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-24', '2019-01-26', '08:30:00', 52, 'HEM TRAVELS CANDOLIM', '', '2019-01-19 15:30:23', 81, 'Amitabh Bachchan', 'ab@gmail.com', '1234567890', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(15, 0, 81, 14, 81, 'PNR42YX1UWD', 2, 1700.00, 1700.00, 0.00, 2, 0, 0, 3400.00, 0.00, 0.00, 3400.00, 3400.00, 0, 0, '', 0.00, 0.00, 3400.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-25', '2019-01-25', '08:00:00', 57, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 07:59:58', 81, 'MR TAYLOR, DOUBLE TREE HILTON, AT RECEPTION AT 8:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(16, 4, 81, 5, 81, 'PNR69FYN8UZ', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-25', '2019-01-25', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 08:09:56', 81, 'MS IRENA, ALOR GRNADE-366, AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1),
(17, 4, 81, 5, 81, 'PNR91LYVKGE', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-25', '2019-01-25', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 08:11:46', 81, 'MS MARINA, BIG DADDY\'S INN-205, AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1);

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
  `booked_comment` text,
  `booked_type` int(2) NOT NULL DEFAULT '1',
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

INSERT INTO `trip_book_pay_details` (`id`, `book_pay_id`, `parent_trip_id`, `trip_user_id`, `trip_id`, `from_user_id`, `from_trip_id`, `user_id`, `pnr_no`, `number_of_persons`, `price_to_adult`, `price_to_child`, `price_to_infan`, `no_of_adult`, `no_of_child`, `no_of_infan`, `total_adult_price`, `total_child_price`, `total_infan_price`, `subtotal_trip_price`, `total_trip_price`, `coupon_history_id`, `specific_coupon_history_id`, `specific_coupon_code`, `discount_percentage`, `discount_price`, `discount_your_price`, `offer_amt`, `net_price`, `vendor_amt`, `vendor_offer_amt`, `vendor_cash_amt`, `your_amt`, `servicecharge_amt`, `gst_percentage`, `gst_amt`, `round_off`, `your_final_amt`, `date_of_trip`, `date_of_trip_to`, `time_of_trip`, `pick_up_location_id`, `pick_up_location`, `pick_up_location_landmark`, `booked_on`, `booked_by`, `booked_to`, `booked_email`, `booked_phone_no`, `booked_comment`, `booked_type`, `status`, `payment_type`, `payment_status`, `b2b_payment_status`, `b2b_payment_on`, `refund_percentage`, `cancelled_on`, `account_info_id`, `return_paid_amt`, `return_notes`, `my_transaction_id`, `return_on`, `return_paid_status`, `pay_details_id`, `isactive`) VALUES
(1, 1, 0, 102, 1, 107, 2, 102, 'PNR31MGVRXD', 1, 1500.00, 1500.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 1500.00, 0.00, 0.00, 0.00, 1470.00, 30.00, 0.00, 0.00, 0.00, 1470.00, '2019-01-02', '2019-01-02', '09:15:00', 7, 'HEM TRAVELS CANDOLIM', '', '2019-01-01 13:56:41', 107, 'Vinod', 'vinod@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 2, 1),
(2, 1, 1, 81, 2, 107, 2, 81, 'PNR31MGVRXD', 1, 1500.00, 1500.00, 0.00, 1, 0, 0, 1500.00, 0.00, 0.00, 1500.00, 1500.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 1500.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-02', '2019-01-02', '09:15:00', 7, 'HEM TRAVELS CANDOLIM', '', '2019-01-01 13:56:41', 107, 'Vinod', 'vinod@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 1, 1),
(3, 2, 0, 79, 4, 81, 5, 79, 'PNR27OQBABR', 4, 3000.00, 3000.00, 0.00, 4, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 2, 0, '', 100.00, 0.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-02', '2019-01-02', '06:20:00', 29, 'CANDOLIM AXIS BANK', '', '2019-01-01 16:27:31', 81, 'MS ANNA, SEA BREEZE-28, AT RECEPTION AT 6:15', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-04', 0, NULL, 0, NULL, NULL, 14, NULL, 1, 4, 1),
(4, 2, 4, 81, 5, 81, 5, 81, 'PNR27OQBABR', 4, 3000.00, 3000.00, 0.00, 4, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 100.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-02', '2019-01-02', '06:20:00', 29, 'CANDOLIM AXIS BANK', '', '2019-01-01 16:27:31', 81, 'MS ANNA, SEA BREEZE-28, AT RECEPTION AT 6:15', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-04', 0, NULL, 0, NULL, NULL, 16, NULL, 1, 3, 1),
(5, 3, 0, 102, 1, 81, 3, 102, 'PNR987WIEQS', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 2940.00, 60.00, 0.00, 0.00, 0.00, 2940.00, '2019-03-01', '2019-03-01', '08:30:00', 14, 'avm baga', '', '2019-01-01 16:35:45', 81, 'Vinod', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 6, 1),
(6, 3, 1, 91, 3, 81, 3, 91, 'PNR987WIEQS', 2, 1500.00, 1500.00, 0.00, 2, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-03-01', '2019-03-01', '08:30:00', 14, 'avm baga', '', '2019-01-01 16:35:45', 81, 'Vinod', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 5, 1),
(7, 4, 0, 79, 4, 81, 5, 79, 'PNR815YVXSG', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 2, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-04', '2019-01-04', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-03 15:07:39', 81, 'Ms OLGA, ALOR GRAND - 344 AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-06', 0, NULL, 0, NULL, NULL, 22, NULL, 1, 8, 1),
(8, 4, 4, 81, 5, 81, 5, 81, 'PNR815YVXSG', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 100.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-04', '2019-01-04', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-03 15:07:39', 81, 'Ms OLGA, ALOR GRAND - 344 AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-06', 0, NULL, 0, NULL, NULL, 24, NULL, 1, 7, 1),
(9, 5, 0, 81, 8, 102, 8, 81, 'PNR680BOGKA', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 350.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-10', '2019-01-10', '08:45:00', 39, 'CALANGUTE CIRCEL', '', '2019-01-08 13:58:34', 102, 'Test Vinod', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-12', 0, NULL, 0, NULL, NULL, 33, NULL, 1, 9, 1),
(10, 6, 0, 81, 8, 81, 8, 81, 'PNR90VXI5A6', 1, 350.00, 350.00, 0.00, 1, 0, 0, 350.00, 0.00, 0.00, 350.00, 350.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 350.00, 0.00, 0.00, 0.00, 330.00, 20.00, 0.00, 0.00, 0.00, 330.00, '2019-01-10', '2019-01-10', '08:45:00', 39, 'CALANGUTE CIRCEL', '', '2019-01-08 13:59:37', 81, 'Amitabh Bachchan', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 10, 1),
(11, 7, 0, 81, 9, 81, 9, 81, 'PNR16GIAS5P', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 1600.00, 0.00, 0.00, 0.00, 1568.00, 32.00, 0.00, 0.00, 0.00, 1568.00, '2019-01-11', '2019-01-13', '09:00:00', 41, 'CALANGUTE', '', '2019-01-10 05:45:29', 81, 'VINOD PAYMENT TEST', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-15', 0, NULL, 0, NULL, NULL, 46, NULL, 1, 11, 1),
(12, 8, 0, 81, 7, 57, 7, 81, 'PNR67VMZWLM', 2, 350.00, 350.00, 0.00, 2, 0, 0, 700.00, 0.00, 0.00, 700.00, 700.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 700.00, 0.00, 0.00, 0.00, 680.00, 20.00, 0.00, 0.00, 0.00, 680.00, '2019-01-14', '2019-01-14', '08:30:00', 34, 'CALANGUTE', '', '2019-01-13 02:44:10', 57, 'VINOD KHANNA', 'v_inod_v@yahoo.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-16', 0, NULL, 0, NULL, NULL, 55, NULL, 1, 12, 1),
(13, 9, 0, 79, 4, 81, 5, 79, 'PNR26KFYGNU', 4, 3000.00, 3000.00, 0.00, 4, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 2, 0, '', 100.00, 0.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-18', '2019-01-18', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-14 16:30:17', 81, 'Mr Andre, Sea Breeze - 18, At Reception At 6:00, +7 9277069063', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-20', 0, NULL, 0, NULL, NULL, 80, NULL, 1, 14, 1),
(14, 9, 4, 81, 5, 81, 5, 81, 'PNR26KFYGNU', 4, 3000.00, 3000.00, 0.00, 4, 0, 0, 12000.00, 0.00, 0.00, 12000.00, 12000.00, 0, 0, '', 100.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 12000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-18', '2019-01-18', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-14 16:30:17', 81, 'Mr Andre, Sea Breeze - 18, At Reception At 6:00, +7 9277069063', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 5, 1, 1, 1, '2019-01-20', 0, NULL, 0, NULL, NULL, 82, NULL, 1, 13, 1),
(15, 10, 0, 81, 9, 108, 11, 81, 'PNR25L6KSRW', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 1600.00, 0.00, 0.00, 0.00, 1568.00, 32.00, 0.00, 0.00, 0.00, 1568.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 06:37:55', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 16, 1),
(16, 10, 9, 108, 11, 108, 11, 108, 'PNR25L6KSRW', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 06:37:55', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 15, 1),
(17, 11, 0, 81, 9, 108, 11, 81, 'PNR47FOQPDR', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 1600.00, 0.00, 0.00, 0.00, 1568.00, 32.00, 0.00, 0.00, 0.00, 1568.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 06:49:53', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 5, 1, 1, 1, '2019-01-19', 0, NULL, 0, NULL, NULL, 64, NULL, 1, 18, 1),
(18, 11, 9, 108, 11, 108, 11, 108, 'PNR47FOQPDR', 3, 1000.00, 500.00, 100.00, 1, 1, 1, 1000.00, 500.00, 100.00, 1600.00, 1600.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 1600.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 06:49:53', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 5, 1, 1, 1, '2019-01-19', 0, NULL, 0, NULL, NULL, 70, NULL, 1, 17, 1),
(19, 12, 0, 81, 9, 108, 11, 81, 'PNR91MK1RLT', 6, 1000.00, 500.00, 100.00, 2, 2, 2, 2000.00, 1000.00, 200.00, 3200.00, 3200.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 3200.00, 0.00, 0.00, 0.00, 3136.00, 64.00, 0.00, 0.00, 0.00, 3136.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 07:04:08', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 20, 1),
(20, 12, 9, 108, 11, 108, 11, 108, 'PNR91MK1RLT', 6, 1000.00, 500.00, 100.00, 2, 2, 2, 2000.00, 1000.00, 200.00, 3200.00, 3200.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 3200.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-15', '2019-01-17', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-15 07:04:08', 108, 'Girish Kumar', 'girishkumargoa@gmail.com', '9822786660', NULL, 1, 1, 0, 0, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 19, 1),
(21, 13, 0, 81, 9, 110, 11, 81, 'PNR57D5B92Q', 4, 1000.00, 500.00, 100.00, 0, 2, 2, 0.00, 1000.00, 200.00, 1200.00, 1200.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 1200.00, 0.00, 0.00, 0.00, 1176.00, 24.00, 0.00, 0.00, 0.00, 1176.00, '2019-01-20', '2019-01-22', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-18 13:57:27', 110, 'Girish Kumar', 'girishkumar4273@hotmail.com', '9822786660', NULL, 1, 5, 1, 1, 1, '2019-01-24', 0, NULL, 0, NULL, NULL, 88, NULL, 1, 22, 1),
(22, 13, 9, 108, 11, 110, 11, 108, 'PNR57D5B92Q', 4, 1000.00, 500.00, 100.00, 0, 2, 2, 0.00, 1000.00, 200.00, 1200.00, 1200.00, 0, 0, '', 0.00, 0.00, 0.00, 0.00, 0.00, 1200.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-20', '2019-01-22', '08:15:00', 46, 'VELER the beachfront restaurant ', 'VELER the beachfront restaurant ', '2019-01-18 13:57:27', 110, 'Girish Kumar', 'girishkumar4273@hotmail.com', '9822786660', NULL, 1, 5, 1, 1, 1, '2019-01-24', 0, NULL, 0, NULL, NULL, 94, NULL, 1, 21, 1),
(23, 14, 0, 109, 12, 111, 13, 109, 'PNR05AMZ2GC', 2, 5500.00, 5500.00, 0.00, 2, 0, 0, 11000.00, 0.00, 0.00, 11000.00, 11000.00, 5, 0, '', 100.00, 0.00, 0.00, 11000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-24', '2019-01-26', '08:30:00', 52, 'HEM TRAVELS CANDOLIM', '', '2019-01-19 15:30:23', 81, 'Amitabh Bachchan', 'ab@gmail.com', '1234567890', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 24, 1),
(24, 14, 12, 81, 13, 111, 13, 81, 'PNR05AMZ2GC', 2, 5500.00, 5500.00, 0.00, 2, 0, 0, 11000.00, 0.00, 0.00, 11000.00, 11000.00, 0, 0, '', 100.00, 0.00, 11000.00, 0.00, 0.00, 0.00, 11000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-24', '2019-01-26', '08:30:00', 52, 'HEM TRAVELS CANDOLIM', '', '2019-01-19 15:30:23', 81, 'Amitabh Bachchan', 'ab@gmail.com', '1234567890', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 23, 1),
(25, 15, 0, 81, 14, 81, 14, 81, 'PNR42YX1UWD', 2, 1700.00, 1700.00, 0.00, 2, 0, 0, 3400.00, 0.00, 0.00, 3400.00, 3400.00, 0, 0, '', 0.00, 0.00, 3400.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-25', '2019-01-25', '08:00:00', 57, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 07:59:58', 81, 'MR TAYLOR, DOUBLE TREE HILTON, AT RECEPTION AT 8:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 25, 1),
(26, 16, 0, 79, 4, 81, 5, 79, 'PNR69FYN8UZ', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 2, 0, '', 100.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-25', '2019-01-25', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 08:09:56', 81, 'MS IRENA, ALOR GRNADE-366, AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 27, 1),
(27, 16, 4, 81, 5, 81, 5, 81, 'PNR69FYN8UZ', 2, 3000.00, 3000.00, 0.00, 2, 0, 0, 6000.00, 0.00, 0.00, 6000.00, 6000.00, 0, 0, '', 100.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 6000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-25', '2019-01-25', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 08:09:56', 81, 'MS IRENA, ALOR GRNADE-366, AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 26, 1),
(28, 17, 0, 79, 4, 81, 5, 79, 'PNR91LYVKGE', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 2, 0, '', 100.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, -20.00, 20.00, 0.00, 0.00, 0.00, -20.00, '2019-01-25', '2019-01-25', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 08:11:46', 81, 'MS MARINA, BIG DADDY\'S INN-205, AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 29, 1),
(29, 17, 4, 81, 5, 81, 5, 81, 'PNR91LYVKGE', 1, 3000.00, 3000.00, 0.00, 1, 0, 0, 3000.00, 0.00, 0.00, 3000.00, 3000.00, 0, 0, '', 100.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 3000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '2019-01-25', '2019-01-25', '06:15:00', 25, 'HEM TRAVELS CANDOLIM', '', '2019-01-24 08:11:46', 81, 'MS MARINA, BIG DADDY\'S INN-205, AT RECEPTION AT 6:00', 'goahemtravels@gmail.com', '9822153576', NULL, 1, 2, 1, 1, 0, NULL, 0, NULL, 0, NULL, NULL, 0, NULL, 1, 28, 1);

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
(14, 'Sightseeing', 'sightseeing.jpg', '2018-09-20 09:22:20', 3, '0000-00-00 00:00:00', 0, 1),
(15, 'Boat Trips', 'boat0-sm.jpg', '2018-10-14 07:36:42', 3, '0000-00-00 00:00:00', 0, 1),
(16, 'MURDESHWAR', 'maxresdefault.jpg', '2018-11-10 06:35:15', 57, '0000-00-00 00:00:00', 0, 1),
(17, 'TRANSFERS', 'pearson-airport.jpg', '2018-11-20 08:05:17', 80, '0000-00-00 00:00:00', 0, 1),
(18, 'Nature', 'Nature.jpg', '2019-01-01 16:20:14', 79, '0000-00-00 00:00:00', 0, 1),
(19, 'Diving', 'sd_1506905331t.jpg', '2019-01-12 12:47:26', 102, '0000-00-00 00:00:00', 0, 1),
(20, 'VELER the beachfront restaurant', 'veler.jpg', '2019-01-15 06:23:27', 108, '0000-00-00 00:00:00', 0, 1),
(21, 'Beach', 'goaresortlead-866x487.jpg', '2019-01-18 11:53:29', 109, '0000-00-00 00:00:00', 0, 1),
(22, 'Adventure', NULL, '2019-01-24 07:54:37', 81, '0000-00-00 00:00:00', 0, 1);

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
(1, 1, '1546339820_Image191.jpg', 1),
(2, 1, '1546339847_Image1581.jpg', 1),
(3, 1, '1546339863_Image1621.jpg', 1),
(4, 4, '1546359480_Dudhsagar_waterfalls.jpg', 1),
(5, 4, '1546359498_dudhsagar2.jpg', 1),
(6, 6, '1546529695_Dudhsagar_waterfalls.jpg', 1),
(7, 6, '1546529696_dudhsagar2.jpg', 1),
(8, 6, '1546529696_falls.jpg', 1),
(9, 7, '1546702416_cacp2v8t.jpg', 1),
(10, 8, '1546948630_bagabeach.jpg', 1),
(11, 10, '1547297129_23559608_1631390016922410_3208747960118569332_n.jpg', 1),
(12, 12, '1547811982_beach.jpg', 1),
(13, 12, '1547811988_Beach_tent.PNG', 1),
(14, 14, '1548316380_images.jpg', 1),
(15, 14, '1548316380_images_(5).jpg', 1);

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
(5, 2, 1, 0),
(6, 2, 2, 0),
(7, 2, 3, 0),
(8, 2, 4, 0),
(9, 2, 1, 1),
(10, 2, 2, 1),
(11, 2, 3, 1),
(12, 2, 4, 1),
(13, 3, 1, 1),
(14, 3, 2, 1),
(15, 3, 3, 1),
(16, 3, 4, 1),
(17, 4, 1, 0),
(18, 4, 2, 0),
(19, 4, 3, 0),
(20, 4, 4, 0),
(21, 4, 5, 0),
(22, 4, 1, 1),
(23, 4, 2, 1),
(24, 4, 3, 1),
(25, 4, 4, 1),
(26, 4, 5, 1),
(27, 5, 1, 1),
(28, 5, 2, 1),
(29, 5, 3, 1),
(30, 5, 4, 1),
(31, 5, 5, 1),
(32, 6, 1, 1),
(33, 6, 2, 1),
(34, 6, 3, 1),
(35, 7, 2, 1),
(36, 7, 3, 1),
(37, 8, 2, 1),
(38, 8, 3, 1),
(39, 12, 1, 0),
(40, 12, 2, 0),
(41, 12, 3, 0),
(42, 12, 6, 0),
(43, 12, 1, 1),
(44, 12, 2, 1),
(45, 12, 3, 1),
(46, 12, 6, 1),
(47, 13, 1, 1),
(48, 13, 2, 1),
(49, 13, 3, 1),
(50, 13, 6, 1),
(51, 14, 2, 1),
(52, 14, 3, 1);

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
(1, 'TRIPgIzTx0e', 102, 15, 'ISLAND TRIP', 'island-trip', '1546339820_Image191.jpg', 0, NULL, NULL, 11, 2, 0, 1500, 1500, 0, 1, 0, 0, 0, 0, 8, 'A BEAUTIFUL BOAT RIDE TO THE GRAND ISLAND WHERE YOU CAN SEE THE DOLPHINS ON THE WAY TO THE ISLAND. NEAR THE ISLAND YOU WILL BE PROVIDED WITH SNORKELING MASKS FOR. YOU CAN ENJOY THE EXPERIENCE OF SNORKELING IN SEA NEAR THE ISLAND. YOU WILL ALSO BE PROVIDED WITH THE FISHING LINE, HOOK AND BAITS. YOU CAN TRY FISHING. FROM THE BOAT.', 'LUNCH,&lt;br&gt;SOFT DRINKS AND BEERS&lt;br&gt;FISHING&nbsp;&lt;br&gt;DOLPHIN SPOTTING&lt;br&gt;SNORKELING', NULL, '', 'LUNCH AND DRINKS', 'ALL TRANSFERS AND BOAT RIDE.', 'SUNGLASSES, HAT AND TOWELS&amp;nbsp;', NULL, 'THIS IS A GROUP TOUR', '100% REFUND IF CANCELLED 3 DAYS BEFORE&lt;br&gt;50% IF CANCELLED 2 DAYS BEFORE&lt;br&gt;0% IF CANCELLED IN 2 DAYS OR LESS', 'GENERATION OF PNR AND THE RECEIPT OF THE PAYMENT.', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS', 'CALANGUTE', '8:00', 20, 1, 20, 1, 1, 2, 0, 12, 4, 0, 0, 0.0, 0, 2, 1, '2019-01-01 16:22:01', 102, '0000-00-00 00:00:00', 0),
(2, 'TRIPZfKu2QU', 81, 15, 'ISLAND TRIP', 'island-trip', '', 1, NULL, NULL, 11, 2, 0, 1500, 1500, 0, 1, 0, 0, 0, 0, 8, 'A BEAUTIFUL BOAT RIDE TO THE GRAND ISLAND WHERE YOU CAN SEE THE DOLPHINS ON THE WAY TO THE ISLAND. NEAR THE ISLAND YOU WILL BE PROVIDED WITH SNORKELING MASKS FOR. YOU CAN ENJOY THE EXPERIENCE OF SNORKELING IN SEA NEAR THE ISLAND. YOU WILL ALSO BE PROVIDED WITH THE FISHING LINE, HOOK AND BAITS. YOU CAN TRY FISHING. FROM THE BOAT.', 'LUNCH,&lt;br&gt;SOFT DRINKS AND BEERS&lt;br&gt;FISHING&nbsp;&lt;br&gt;DOLPHIN SPOTTING&lt;br&gt;SNORKELING', NULL, '', 'LUNCH AND DRINKS', 'ALL TRANSFERS AND BOAT RIDE.', 'SUNGLASSES, HAT AND TOWELS&amp;nbsp;', NULL, 'THIS IS A GROUP TOUR', '100% REFUND IF CANCELLED 3 DAYS BEFORE&lt;br&gt;50% IF CANCELLED 2 DAYS BEFORE&lt;br&gt;0% IF CANCELLED IN 2 DAYS OR LESS', 'GENERATION OF PNR AND THE RECEIPT OF THE PAYMENT.', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS', 'HEM TRAVELS CANDOLIM', '9:15', 20, 1, 20, 1, 1, 2, 0, 12, 4, 0, 1, 0.0, 0, 1, 1, '2019-01-01 16:28:29', 81, '2019-01-01 19:20:08', 81),
(3, 'TRIPB946fU8', 91, 15, 'ISLAND TRIP', 'island-trip', '', 1, NULL, NULL, 11, 2, 0, 1500, 1500, 0, 1, 0, 0, 0, 0, 8, 'A BEAUTIFUL BOAT RIDE TO THE GRAND ISLAND WHERE YOU CAN SEE THE DOLPHINS ON THE WAY TO THE ISLAND. NEAR THE ISLAND YOU WILL BE PROVIDED WITH SNORKELING MASKS FOR. YOU CAN ENJOY THE EXPERIENCE OF SNORKELING IN SEA NEAR THE ISLAND. YOU WILL ALSO BE PROVIDED WITH THE FISHING LINE, HOOK AND BAITS. YOU CAN TRY FISHING. FROM THE BOAT.', 'LUNCH,&lt;br&gt;SOFT DRINKS AND BEERS&lt;br&gt;FISHING&nbsp;&lt;br&gt;DOLPHIN SPOTTING&lt;br&gt;SNORKELING', NULL, '', 'LUNCH AND DRINKS', 'ALL TRANSFERS AND BOAT RIDE.', 'SUNGLASSES, HAT AND TOWELS&amp;nbsp;', NULL, 'THIS IS A GROUP TOUR', '100% REFUND IF CANCELLED 3 DAYS BEFORE&lt;br&gt;50% IF CANCELLED 2 DAYS BEFORE&lt;br&gt;0% IF CANCELLED IN 2 DAYS OR LESS', 'GENERATION OF PNR AND THE RECEIPT OF THE PAYMENT.', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS', 'avm baga', '08:30', 20, 1, 20, 1, 1, 2, 0, 12, 4, 1, 2, 0.0, 0, 2, 1, '2019-01-01 21:27:15', 91, '0000-00-00 00:00:00', 0),
(4, 'TRIPs8Exlad', 79, 18, 'WATERFALLS ( ABH RUS )', 'waterfalls-abh-rus-', '1546359480_Dudhsagar_waterfalls.jpg', 0, NULL, NULL, 11, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES THE DUDHSAGAR WATERFALL WITH JEEP SAFARI, ENTRY FEES AND LIFE JACKET. AFTER THAT WE GO TO THE SPICE PLANTATION WHICH INCLUDES ENTRY FEES, LUNCH AND GUIDED TOUR IN THE SPICE PLANTATION. AFTER THAT ON THE WAY BACK VISIT THE OLD GOA CHURCH AND TEMPLE. &lt;br&gt;', NULL, 'BREAKFAST&lt;br&gt;', '', 'LUNCH', '&lt;div&gt;AC BUS TRANSFERS&lt;/div&gt;&lt;div&gt;NON AC JEEP TRANSFERS&lt;br&gt;&lt;/div&gt;', NULL, NULL, 'THIS IS A GROUP TOUR&lt;br&gt;', '&lt;div&gt;100% IF CANCELLED 3 DAYS BEFORE THE TRIP&lt;/div&gt;&lt;div&gt;500% IF CANCELLED 2 DAYS BEFORE THE TRIP&lt;/div&gt;&lt;div&gt;0% IF CANCELLED IN 2 DAYS OR LESS&lt;/div&gt;&lt;br&gt;&lt;br&gt;', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR&lt;br&gt;', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS&lt;br&gt;', 'CALANGUTE', '06:00', 20, 1, 7, 1, 1, 2, 0, 10, 5, 0, 0, 0.0, 0, 2, 1, '2019-01-01 21:50:14', 79, '2019-01-01 21:52:39', 79),
(5, 'TRIPpcBPK3J', 81, 18, 'WATERFALLS ( ABH RUS )', 'waterfalls-abh-rus-', '', 4, NULL, NULL, 11, 2, 0, 3000, 3000, 0, 1, 0, 0, 0, 0, 10, 'THIS INCLUDES THE DUDHSAGAR WATERFALL WITH JEEP SAFARI, ENTRY FEES AND LIFE JACKET. AFTER THAT WE GO TO THE SPICE PLANTATION WHICH INCLUDES ENTRY FEES, LUNCH AND GUIDED TOUR IN THE SPICE PLANTATION. AFTER THAT ON THE WAY BACK VISIT THE OLD GOA CHURCH AND TEMPLE. &lt;br&gt;', NULL, 'BREAKFAST&lt;br&gt;', '', 'LUNCH', '&lt;div&gt;AC BUS TRANSFERS&lt;/div&gt;&lt;div&gt;NON AC JEEP TRANSFERS&lt;br&gt;&lt;/div&gt;', NULL, NULL, 'THIS IS A GROUP TOUR&lt;br&gt;', '&lt;div&gt;100% IF CANCELLED 3 DAYS BEFORE THE TRIP&lt;/div&gt;&lt;div&gt;500% IF CANCELLED 2 DAYS BEFORE THE TRIP&lt;/div&gt;&lt;div&gt;0% IF CANCELLED IN 2 DAYS OR LESS&lt;/div&gt;&lt;br&gt;&lt;br&gt;', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR&lt;br&gt;', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS&lt;br&gt;', 'HEM TRAVELS CANDOLIM', '6:15', 20, 1, 7, 1, 1, 2, 0, 10, 5, 1, 3, 0.0, 13, 2, 1, '2019-01-01 21:55:41', 81, '0000-00-00 00:00:00', 0),
(6, 'TRIPU1GypjQ', 81, 14, 'DUDHSAGAR WATERFALLS', 'dudhsagar-waterfalls', '1546529695_Dudhsagar_waterfalls.jpg', 0, NULL, NULL, 7, 2, 0, 1800, 1800, 0, 1, 0, 0, 0, 0, 8, 'THIS INCLUDES THE DUDHSAGAR WATERFALL WITH JEEP SAFARI, ENTRY FEES AND LIFE JACKET. AFTER THAT WE GO TO THE SPICE PLANTATION WHICH INCLUDES ENTRY FEES, LUNCH AND GUIDED TOUR IN THE SPICE PLANTATION. AFTER THAT YOU RETURN AND DROP BACK.&lt;br&gt;', NULL, 'BREAKFAST,&amp;nbsp;', '', 'LUNCH', 'AC BUS AND JEEP SAFARI', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED 3 DAYS BEFORE&lt;br&gt;50% IF CANCELLED 2 DAYS BEFORE&lt;br&gt;0% IF CANCELLED IN 2 OR LESS DAYS.&lt;br&gt;&lt;br&gt;', 'CONFIRMATION ON THE 100% PAYMENT AND GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS.', 'CANDOLIM', '06:00', 21, 1, 7, 1, 1, 2, 0, 10, 12, 0, 0, 0.0, 0, 1, 1, '2019-01-03 21:08:29', 81, '0000-00-00 00:00:00', 0),
(7, 'TRIPkbvFjAP', 81, 14, 'SOUTH GOA SIGHTSEEING AT 350', 'south-goa-sightseeing-at-350', '1546702416_cacp2v8t.jpg', 0, NULL, NULL, 11, 2, 0, 350, 350, 0, 1, 0, 0, 0, 0, 9, 'THIS IS FULL DAY TOUR OF THE POPULAR PLACES SOUTH GOA. THIS INCLUDES OLD GOA CHURCH, MUSEUM, MANGUESHI TEMPLE, DONA PAULA AND MIRAMAR BEACH. IN THE EVENING WE WILL STOP AT THE POINT OF BOAT CRUISE. THOSE WHO ARE INTERESTED CAN GO FOR BOAT CRUISE AND OTHERS CAN DO SHOPPING. AFTER THAT EVERYONE WILL BE PICKED UP AND DROPPED BACK.&amp;nbsp;', NULL, 'NO MEALS', '', '', 'AC BUS', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED 4 DAYS BEFORE&lt;br&gt;50% IF CANCELLED 2 DAYS BEFORE&lt;br&gt;0% IF CANCELLED IN 2 DAYS OR LESS.', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 4 WORKING DAY.', 'CALANGUTE', '08:30', 20, 1, 20, 1, 1, 1, 1, 0, 12, 0, 0, 0.0, 2, 1, 1, '2019-01-05 21:09:47', 81, '0000-00-00 00:00:00', 0),
(8, 'TRIPLsy1ZFk', 81, 14, 'NORTH GOA SIGHTSEEING AT 350/-', 'north-goa-sightseeing-at-350-', '1546948630_bagabeach.jpg', 0, NULL, NULL, 11, 2, 0, 350, 350, 0, 1, 0, 0, 0, 0, 10, 'THIS TRIPS COVERS THE POPULAR PLACES OF NORTH GOA. IT STARTS AT 8:30 AND ENDS BY 18:00. THIS TRIP COVERS FORT AGUADA, CALANGUTE /&amp;nbsp; BAGA BEACH, ANJUNA BEACH AND VAGATOR BEACH.', NULL, 'MEALS IS NOT INCLUDED&amp;nbsp;', '', '', NULL, NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED 5 DAYS BEFORE&amp;nbsp;&lt;br&gt;50% IF CANCELLED 2 DAYS BEFORE&lt;br&gt;0% IF CANCELLED IN 2 OR LEST DAYS.', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS.', 'BAGA CCD', '8:30', 20, 1, 20, 1, 1, 1, 1, 0, 5, 0, 0, 0.0, 1, 1, 1, '2019-01-08 18:27:45', 81, '0000-00-00 00:00:00', 0),
(9, 'TRIPX3IrdDW', 81, 14, 'SPECIAL PKG', 'special-pkg', '', 0, NULL, NULL, 11, 2, 0, 1000, 500, 100, 2, 2, 1, 3, 0, 0, 'THIS IS PAYMENT COLLECTION FOR THE CUSTOMISED TOURS. ALL THE DETAILS OF THE TOUR WILL WILL BE AS PER YOUR PERSONAL COVERSATION BY EMAIL PHONE OR ANY OTHER MEDIUM. THIS TRIP CONTENT DOES NOT VALIDATE ANY CONTENT OF THE ACTUAL TRIP THAT IS BOOKED AN PAYED FOR. THIS LINK IS USED ONLY FOR THE PAYMENT OF THE CUSTOMIZED TRIP DISCUSSED AND AGREED UPON BY BOTH.', NULL, NULL, '', '', NULL, NULL, NULL, NULL, 'REFUND WILL BE DONE DIRECTLY BY THE BOOKED/TRAVEL AGENT/ OPERATOR AS PER YOUR AGREED TERMS AND CONDITIONS. BYT IS NOT RESPONSIBLE FOR ANY REFUND.', 'CONFIRMATION IS ON 100% PAYMENT AND THE GENERATION OF PNR', 'REFUND WILL NOT BE PROCESSED BY BYT. REFUND WILL BE DONE DIRECTLY BY THE BOOKED/TRAVEL AGENT/ OPERATOR AS PER YOUR AGREED TERMS AND CONDITIONS. BYT IS NOT RESPONSIBLE FOR ANY REFUND.', 'CALANGUTE', '09:00', 100, 1, 100, 1, 1, 2, 0, 1, 12, 0, 0, 0.0, 3, 2, 1, '2019-01-09 19:13:08', 81, '2019-01-15 12:31:41', 81),
(10, 'TRIP4x5dYju', 102, 19, 'Diving', 'diving', '1547297129_23559608_1631390016922410_3208747960118569332_n.jpg', 0, NULL, NULL, 11, 2, 0, 2800, 2800, 2800, 1, 0, 0, 0, 0, 8, 'A BEAUTIFUL BOAT RIDE TO THE GRAND ISLAND WHERE YOU WILL BE ANCHORED AND YOU WILL&amp;nbsp; BE GOING FOR THE DIVING,&amp;nbsp; VIEWING THE BEAUTIFUL MARINE LIFE IN ITS CLEAR WATERS.', 'PICKUP AND DROP&lt;br&gt;PRE TRAINING&lt;br&gt;VIDEOS&nbsp;&lt;br&gt;SHALLOW WATER DIVE&lt;br&gt;DIVING EQUIPMENTS&lt;br&gt;BOAT TRIP&lt;br&gt;INSTRUCTIONS&lt;br&gt;PHOTOGRAPHY&lt;br&gt;LUNCH&lt;br&gt;SNACKS&lt;br&gt;SOFT DRINKS&lt;br&gt;MINERAL WATER&lt;br&gt;&lt;br&gt;', NULL, '', '', 'ALL TRANSFERS', NULL, NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED 5 DAYS BEFORE&lt;br&gt;50% IF 3 DAYS BEFORE&lt;br&gt;0% IF CANCELLED IN 2 OR LESS DAYS', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR&lt;br&gt;&lt;br&gt;', 'REFUND WILL BE PROCESS IN 4 WORKING DAYS', 'CALANGUTE', '8:30', 20, 1, 5, 1, 1, 2, 0, 12, 12, 0, 0, 0.0, 0, 2, 1, '2019-01-12 18:17:26', 102, '0000-00-00 00:00:00', 0),
(11, 'TRIPsDXE1Qp', 108, 20, 'VELER the beach front restaurant', 'veler-the-beach-front-restaurant', '', 9, NULL, NULL, 11, 2, 0, 1000, 500, 100, 2, 2, 1, 3, 0, 0, 'THIS IS PAYMENT COLLECTION FOR THE CUSTOMISED TOURS. ALL THE DETAILS OF THE TOUR WILL WILL BE AS PER YOUR PERSONAL COVERSATION BY EMAIL PHONE OR ANY OTHER MEDIUM. THIS TRIP CONTENT DOES NOT VALIDATE ANY CONTENT OF THE ACTUAL TRIP THAT IS BOOKED AN PAYED FOR. THIS LINK IS USED ONLY FOR THE PAYMENT OF THE CUSTOMIZED TRIP DISCUSSED AND AGREED UPON BY BOTH.', NULL, NULL, '', '', NULL, NULL, NULL, NULL, 'REFUND WILL BE DONE DIRECTLY BY THE BOOKED/TRAVEL AGENT/ OPERATOR AS PER YOUR AGREED TERMS AND CONDITIONS. BYT IS NOT RESPONSIBLE FOR ANY REFUND.', 'CONFIRMATION IS ON 100% PAYMENT AND THE GENERATION OF PNR', 'REFUND WILL NOT BE PROCESSED BY BYT. REFUND WILL BE DONE DIRECTLY BY THE BOOKED/TRAVEL AGENT/ OPERATOR AS PER YOUR AGREED TERMS AND CONDITIONS. BYT IS NOT RESPONSIBLE FOR ANY REFUND.', 'VELER the beachfront restaurant ', '08:15', 100, 2, 3, 1, 1, 2, 0, 1, 12, 1, 13, 0.0, 7, 1, 1, '2019-01-15 11:53:27', 108, '0000-00-00 00:00:00', 0),
(12, 'TRIP30tLMxj', 109, 21, 'COLA BEACH TENT (PETER\'S)', 'cola-beach-tent-peters', '1547811982_beach.jpg', 0, NULL, NULL, 13, 2, 0, 5500, 5500, 0, 2, 2, 1, 3, 0, 0, 'ENJOY THE STAY IN THE RUSTIC LUXURY OF RAJASTHANI STYLE TENTS. THIS STAY IS AN EXPERIENCE OF THE QUITE UNSPOILT BEACH OF GOA WHICH OFFERS YOU A BREAKOUT FROM THE HUSTLE AND BUSTLE OF THE CITY LIFE AND THE CROWDED BEACH.', 'LUNCH&lt;br&gt;DINNER&lt;br&gt;BREAKFAST&lt;br&gt;TRANSFERS', 'WATER OR ANY DRINKS', '', '', 'PICK UP AND DROP', NULL, NULL, 'THIS IS A GROUP TRANSFERS BUT PRIVATE TENTS FOR OVERNIGHT ACCOMODATION', '100% REFUND IF CANCELLED 10 DAYS BEFORE&lt;br&gt;50% REFUND IF CANCELLED 5 DAYS BEFORE&lt;br&gt;20% REFUND IF CANCELLED 3 DAYS BEFORE&lt;br&gt;0% REFUND IF CANCELLED IN 3 DAYS OR LESS&lt;br&gt;', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS', 'COLA BEACH', '10:00', 14, 2, 3, 1, 1, 1, 0, 0, 3, 0, 0, 0.0, 0, 2, 1, '2019-01-18 17:23:29', 109, '2019-01-19 20:52:16', 109),
(13, 'TRIPJ5AimzW', 81, 21, 'COLA BEACH TENT (PETER\'S)', 'cola-beach-tent-peters', '', 12, NULL, NULL, 13, 2, 0, 5500, 5500, 0, 2, 2, 1, 3, 0, 0, 'ENJOY THE STAY IN THE RUSTIC LUXURY OF RAJASTHANI STYLE TENTS. THIS STAY IS AN EXPERIENCE OF THE QUITE UNSPOILT BEACH OF GOA WHICH OFFERS YOU A BREAKOUT FROM THE HUSTLE AND BUSTLE OF THE CITY LIFE AND THE CROWDED BEACH.', 'LUNCH&lt;br&gt;DINNER&lt;br&gt;BREAKFAST&lt;br&gt;TRANSFERS', 'WATER OR ANY DRINKS', '', '', 'PICK UP AND DROP', NULL, NULL, 'THIS IS A GROUP TRANSFERS BUT PRIVATE TENTS FOR OVERNIGHT ACCOMODATION', '100% REFUND IF CANCELLED 10 DAYS BEFORE&lt;br&gt;50% REFUND IF CANCELLED 5 DAYS BEFORE&lt;br&gt;20% REFUND IF CANCELLED 3 DAYS BEFORE&lt;br&gt;0% REFUND IF CANCELLED IN 3 DAYS OR LESS&lt;br&gt;', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS', 'HEM TRAVELS CANDOLIM', '8:30', 14, 2, 3, 1, 1, 1, 0, 0, 3, 1, 16, 0.0, 2, 2, 1, '2019-01-19 20:58:33', 81, '0000-00-00 00:00:00', 0),
(14, 'TRIPvOXFsfJ', 81, 22, 'CROCODILE TRIP', 'crocodile-trip', '1548316380_images.jpg', 0, NULL, NULL, 11, 2, 0, 1700, 1700, 0, 1, 0, 0, 0, 0, 5, 'ENJOY A BOAT RIDE THROUGH THE BACKWATERS OF GOA AND SPOT THE CROCODLIES WHILE PASSING THROUGH ITS MANGROVES. YOU CAN ALSO WATCH A VARIETY OF BIRD LIFE ALONG THE SMOOTH SAIL.', 'SNACKS&lt;br&gt;SOFT DRINKS AND BEERS&lt;br&gt;TRANSFERS&lt;br&gt;BOAT CHARGES', NULL, 'ENGLISH, HINDI', 'SNACKS', 'TRANSFERS', 'CAMERA, SUNGLASES, HAT', NULL, 'THIS IS A GROUP TOUR', '100% IF CANCELLED 5 DAY BEFORE&lt;br&gt;50 % IF CANCELLED 2 DAYS BEFORE&lt;br&gt;0 % IF CANCELLED IN 2 DAYS OR LESS', 'CONFIRMATION ON 100% PAYMENT AND GENERATION OF PNR', 'REFUND WILL BE PROCESSED IN 4 WORKING DAYS', 'HEM TRAVELS CANDOLIM', '8:00', 20, 2, 20, 1, 1, 2, 0, 12, 3, 0, 0, 0.0, 2, 1, 1, '2019-01-24 13:24:37', 81, '0000-00-00 00:00:00', 0);

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
(1, 'SHARE2kO5b', 1, 102, 81, NULL, 1, 2, 1),
(2, 'SHAREdTsiF', 1, 102, 91, NULL, 1, 2, 1),
(3, 'SHAREo5cnP', 4, 79, 81, NULL, 2, 2, 1),
(4, 'SHARE3cCql', 2, 81, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(5, 'SHAREFRMbU', 1, 102, NULL, 'anjaneyavadivel@gmail.com', 0, 1, 1),
(6, 'SHAREbycDL', 1, 102, 105, NULL, 0, 3, 1),
(7, 'SHAREIQxEu', 7, 81, 81, NULL, 0, 3, 1),
(8, 'SHAREHX8kd', 7, 81, 105, NULL, 0, 1, 1),
(9, 'SHAREbDW0l', 1, 102, 105, NULL, 0, 1, 1),
(10, 'SHARErUp9Z', 9, 81, 108, '', 3, 1, 1),
(11, 'SHAREcx4SU', 1, 102, NULL, 'fernandestravel@gmail.com', 1, 1, 1),
(12, 'SHAREFLfju', 9, 81, 108, '', 0, 3, 1),
(13, 'SHAREDN9rd', 9, 81, 108, '', 3, 2, 1),
(14, 'SHARE7MzSP', 7, 81, 3, NULL, 0, 1, 1),
(15, 'SHARECGYOv', 12, 109, 81, NULL, 5, 1, 1),
(16, 'SHARE13C5i', 12, 109, 81, NULL, 5, 2, 1),
(17, 'SHAREmQIRC', 12, 109, NULL, 'viksonfernandes@yahoo.com', 6, 1, 1),
(18, 'SHARE9sEwH', 12, 109, NULL, 'viksonfernandes@yahoo.com', 6, 1, 1),
(19, 'SHAREZFvuH', 12, 109, NULL, 'viksonfernandes@yahoo.com', 6, 1, 1);

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
(68, '      TREKING', '2018-12-17 15:09:43', 81, '0000-00-00 00:00:00', 0, 1),
(69, 'massage ayurveda foot', '2018-12-22 15:24:19', 105, '0000-00-00 00:00:00', 0, 1),
(70, ' snorkeling', '2019-01-01 16:22:01', 102, '0000-00-00 00:00:00', 0, 1),
(71, '  snorkeling', '2019-01-01 16:28:29', 81, '0000-00-00 00:00:00', 0, 1),
(72, '  dolphin', '2019-01-01 16:28:29', 81, '0000-00-00 00:00:00', 0, 1),
(73, '   snorkeling', '2019-01-01 19:20:08', 81, '0000-00-00 00:00:00', 0, 1),
(74, '   dolphin', '2019-01-01 19:20:08', 81, '0000-00-00 00:00:00', 0, 1),
(75, 'DUDHSAGAR WATERFALLS', '2019-01-01 21:50:14', 79, '0000-00-00 00:00:00', 0, 1),
(76, ' JUNGLE TRIP', '2019-01-01 21:50:14', 79, '0000-00-00 00:00:00', 0, 1),
(77, '  JUNGLE TRIP', '2019-01-01 21:52:39', 79, '0000-00-00 00:00:00', 0, 1),
(78, '   JUNGLE TRIP', '2019-01-01 21:55:41', 81, '0000-00-00 00:00:00', 0, 1),
(79, ' dudhsagar waterfalls', '2019-01-03 21:08:29', 81, '0000-00-00 00:00:00', 0, 1),
(80, ' diving', '2019-01-12 18:17:26', 102, '0000-00-00 00:00:00', 0, 1),
(81, ' Sea trip', '2019-01-12 18:17:26', 102, '0000-00-00 00:00:00', 0, 1),
(82, 'beachs', '2019-01-18 17:23:29', 109, '0000-00-00 00:00:00', 0, 1),
(83, ' BEACH TENT', '2019-01-18 17:23:29', 109, '0000-00-00 00:00:00', 0, 1),
(84, ' BARBEQUE', '2019-01-18 17:23:29', 109, '0000-00-00 00:00:00', 0, 1),
(85, '  BEACH TENT', '2019-01-19 20:52:16', 109, '0000-00-00 00:00:00', 0, 1),
(86, '  BARBEQUE', '2019-01-19 20:52:16', 109, '0000-00-00 00:00:00', 0, 1),
(87, '   BEACH TENT', '2019-01-19 20:58:33', 81, '0000-00-00 00:00:00', 0, 1),
(88, '   BARBEQUE', '2019-01-19 20:58:33', 81, '0000-00-00 00:00:00', 0, 1),
(89, 'CROCODILE', '2019-01-24 13:24:37', 81, '0000-00-00 00:00:00', 0, 1),
(90, ' BIRD WATCHING', '2019-01-24 13:24:37', 81, '0000-00-00 00:00:00', 0, 1);

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
(1, 1, 25, 1),
(2, 1, 70, 1),
(3, 1, 21, 1),
(4, 1, 22, 1),
(5, 1, 18, 1),
(6, 2, 25, 1),
(7, 2, 71, 0),
(8, 2, 63, 0),
(9, 2, 72, 0),
(10, 2, 27, 0),
(11, 2, 73, 1),
(12, 2, 66, 1),
(13, 2, 74, 1),
(14, 2, 28, 1),
(15, 3, 25, 1),
(16, 3, 71, 1),
(17, 3, 63, 1),
(18, 3, 72, 1),
(19, 3, 27, 1),
(20, 4, 75, 1),
(21, 4, 18, 0),
(22, 4, 76, 0),
(23, 4, 27, 1),
(24, 4, 77, 1),
(25, 5, 75, 1),
(26, 5, 28, 1),
(27, 5, 78, 1),
(28, 6, 1, 1),
(29, 6, 18, 1),
(30, 6, 76, 1),
(31, 6, 79, 1),
(32, 7, 1, 1),
(33, 8, 1, 1),
(34, 8, 43, 1),
(35, 9, 1, 1),
(36, 10, 2, 1),
(37, 10, 80, 1),
(38, 10, 81, 1),
(39, 11, 1, 1),
(40, 12, 82, 1),
(41, 12, 83, 0),
(42, 12, 84, 0),
(43, 12, 85, 1),
(44, 12, 86, 1),
(45, 13, 82, 1),
(46, 13, 87, 1),
(47, 13, 88, 1),
(48, 14, 89, 1),
(49, 14, 18, 1),
(50, 14, 20, 1),
(51, 14, 90, 1);

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
(2, 'SA', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Admin', '2018-06-22', '1', '9688079118', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1545809922.jpg', 208.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(3, 'VA', 'vendor@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor1', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(4, 'VA', 'vendor2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor2', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(16, 'CU', 'anjaneyavadivel@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Anjaneya vadivelu', NULL, NULL, NULL, NULL, NULL, NULL, '359343', '2018-12-10 06:44:14', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-09-20 12:40:25', '2018-09-20 12:40:58', 1),
(27, 'VA', 'vendor3@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor Three', NULL, NULL, NULL, NULL, NULL, NULL, 'c90b3169120e16506865bd2d22969dae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-01 08:38:56', NULL, 1),
(30, 'VA', 'vendor4@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Velappan Rekandi Jamnagarwala', NULL, NULL, '8887779994', NULL, NULL, NULL, '5fade682e4d9e5948476467f275d67c7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-02 10:46:43', NULL, 1),
(56, 'VA', 'chaitesh@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, '1dfb89769e2da0a1fc38c5401b79a300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-30 14:35:54', NULL, 2),
(57, 'VA', 'v_inod_v@yahoo.com', '14e1b600b1fd579f47433b88e8d85291', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 05:49:49', NULL, 1),
(76, 'VA', 'vinod@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'VINOD VELAPPAN', NULL, NULL, NULL, NULL, NULL, NULL, '1e8660445a37dce4eaba75f48281e3ab', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-14 08:06:45', NULL, 2),
(79, 'VA', 'naikabhy@gmail.com', '557689058657fe132eed86ad34c56317', 'Abhinay Naik', NULL, NULL, '9822124005', '', '', '', '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, '1542989288.PNG', 0.00, 0.00, NULL, NULL, 1, '2018-11-15 15:46:24', NULL, 1),
(80, 'VA', 'teambookyourtrips@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Team Bookyourtrips', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-15 16:06:49', '2018-11-15 04:12:32', 1),
(81, 'VA', 'goahemtravels@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'HEM TRAVELS', NULL, NULL, '9822153576', '', '', '', '698166', '2018-12-10 15:53:23', NULL, 'PULIYAKULAM ROAD', 641045, 'Coimbatore', 'Tamil Nadu', '1545817790.PNG', 4992.00, 0.00, NULL, NULL, 1, '2018-11-16 10:02:34', '2018-11-16 10:05:06', 1),
(91, 'VA', 'avmtoursandtravels@gmail.com', 'aa4f3cf9f3944a475f7bdb712e3ec60b', 'AVM TOURS AND TRAVELS', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-24 09:51:35', '2018-11-24 09:52:00', 1),
(98, 'GU', 'gust@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Gust', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-26 17:13:05', NULL, 2),
(99, 'GU', 'karthikraja.ckr@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Karthi', NULL, NULL, '9942493382', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-30 17:11:06', NULL, 2),
(100, 'VA', 'sharukhkalas@gmail.com', 'bc415f1f176f92b96c90f1a59f97df28', 'Sharukh H Kalas', NULL, NULL, NULL, NULL, NULL, NULL, 'aab77b6f26a90003865005ae4bcd5787', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-01 15:51:06', NULL, 2),
(101, 'GU', 'anjaneya.developer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Ravi', NULL, NULL, '7373112889', NULL, NULL, NULL, '618147', '2018-12-09 15:14:45', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-03 09:32:32', NULL, 1),
(102, 'VA', 'anjali.shetgaonkar@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'HARI OM TATSAT', NULL, NULL, NULL, NULL, NULL, NULL, '', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-04 13:25:31', NULL, 1),
(103, 'GU', 'goahemtravels@gmailc.om', '14e1b600b1fd579f47433b88e8d85291', 'Mr Alexander, Ave Maria-101, At Reception At 15:00 Hrs', NULL, NULL, '9616341565', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-06 15:46:35', NULL, 2),
(104, 'CU', 'karthikraja.ckr@gmail.com', '', 'karthik raja', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0.00, 0.00, 'gmail', '111766378079349807447', 1, '2018-12-16 15:54:52', NULL, 2),
(105, 'VA', 'reijualex@gmail.com', '4335010e6f5f1bbf7e7b7a0d68044e3d', 'Reiju Alex', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, '', 0, '', '', NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-22 09:00:07', '2018-12-22 02:32:43', 1),
(106, 'GU', 'sinurju@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Sinu', NULL, NULL, '9890449719', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-12-22 09:23:04', NULL, 2),
(107, 'GU', 'vinod@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod', NULL, NULL, '9822153576', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2019-01-01 13:56:41', NULL, 2),
(108, 'VA', 'girishkumargoa@gmail.com', 'cacc83eda57cd05661198fca8077caeb', 'Girishkumar ', NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2019-01-15 06:04:49', '2019-01-15 11:35:20', 1),
(109, 'VA', 'colabeach@hotmail.com', '14e1b600b1fd579f47433b88e8d85291', 'PETER\'S COLA BEACH TENTS', NULL, NULL, '9822154570', '', 'vikson', '9822061223', '', NULL, NULL, NULL, NULL, NULL, NULL, '1547788304.JPG', 0.00, 0.00, NULL, NULL, 1, '2019-01-17 12:17:26', '2019-01-18 10:30:31', 1),
(110, 'GU', 'girishkumar4273@hotmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Girish Kumar', NULL, NULL, '9822786660', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2019-01-18 13:57:27', NULL, 2),
(111, 'GU', 'ab@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Amitabh Bachchan', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2019-01-19 15:30:23', NULL, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `faq_master`
--
ALTER TABLE `faq_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `my_transaction`
--
ALTER TABLE `my_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trip_avilable`
--
ALTER TABLE `trip_avilable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trip_book_pay`
--
ALTER TABLE `trip_book_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `trip_book_pay_details`
--
ALTER TABLE `trip_book_pay_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `trip_category`
--
ALTER TABLE `trip_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `trip_comment`
--
ALTER TABLE `trip_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `trip_inclusions`
--
ALTER TABLE `trip_inclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `trip_inclusions_map`
--
ALTER TABLE `trip_inclusions_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `trip_itinerary`
--
ALTER TABLE `trip_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_master`
--
ALTER TABLE `trip_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `trip_shared`
--
ALTER TABLE `trip_shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `trip_specific_day`
--
ALTER TABLE `trip_specific_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trip_tags`
--
ALTER TABLE `trip_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `trip_tag_map`
--
ALTER TABLE `trip_tag_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
