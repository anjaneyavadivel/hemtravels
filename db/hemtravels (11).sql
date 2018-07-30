-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 08:29 AM
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon_code_master_history`
--

CREATE TABLE IF NOT EXISTS `coupon_code_master_history` (
  `id` int(11) NOT NULL,
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
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faq_master`
--

CREATE TABLE IF NOT EXISTS `faq_master` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL DEFAULT '0' COMMENT '0 - admin common FAQ',
  `question` tinytext NOT NULL,
  `answer` tinytext NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `my_transaction`
--

CREATE TABLE IF NOT EXISTS `my_transaction` (
  `id` int(11) NOT NULL,
  `book_pay_id` int(11) NOT NULL DEFAULT '0',
  `book_pay_details_id` int(11) NOT NULL DEFAULT '0',
  `pnr_no` varchar(150) NOT NULL,
  `userid` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL DEFAULT '0',
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `transaction_short_details` varchar(200) NOT NULL,
  `transaction_details` tinytext NOT NULL,
  `withdrawals` float(8,2) NOT NULL,
  `deposits` float(8,2) NOT NULL,
  `balance` float(8,2) NOT NULL,
  `b2b_pay_account_info` int(11) NOT NULL DEFAULT '0',
  `withdrawal_request_amt` float(8,2) NOT NULL,
  `withdrawal_paid_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL COMMENT '0 - new, 1 - InProgress, 2 -  Executed'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `location` varchar(20) NOT NULL,
  `landmark` varchar(200) NOT NULL,
  `time` varchar(150) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(2, 1, 'kerala', '2018-07-28 09:29:21', 0, '0000-00-00 00:00:00', 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip_book_pay`
--

CREATE TABLE IF NOT EXISTS `trip_book_pay` (
  `id` int(11) NOT NULL,
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
  `total_trip_price` float(8,2) NOT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `discount_price` float(8,2) NOT NULL,
  `gst_percentage` float(8,2) NOT NULL,
  `gst_amt` float(8,2) NOT NULL,
  `net_price` float(8,2) NOT NULL,
  `date_of_trip` date NOT NULL,
  `time_of_trip` time NOT NULL,
  `pick_up_location_id` int(11) NOT NULL,
  `booked_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL COMMENT '1 - Pendding, 2- booked, 3 - cancelled',
  `payment_type` int(1) NOT NULL COMMENT '1 - net, 2 - credit, 3 - debit',
  `payment_status` int(1) NOT NULL COMMENT '0 - Pendding,1 - sucess,2 - failed',
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip_book_pay_details`
--

CREATE TABLE IF NOT EXISTS `trip_book_pay_details` (
  `id` int(11) NOT NULL,
  `book_pay_id` int(11) NOT NULL,
  `parent_trip_id` int(11) NOT NULL DEFAULT '0',
  `trip_id` int(11) NOT NULL,
  `from_user_id` int(11) NOT NULL,
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
  `total_trip_price` float(8,2) NOT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `discount_price` float(8,2) NOT NULL,
  `net_price` float(8,2) NOT NULL,
  `vendor_amt` float(8,2) NOT NULL,
  `your_amt` float(8,2) NOT NULL,
  `net_transaction_amount` float(8,2) NOT NULL,
  `servicecharge_amt` float(8,2) NOT NULL,
  `gst_percentage` float(8,2) NOT NULL,
  `gst_amt` float(8,2) NOT NULL,
  `your_final_amt` float(8,2) NOT NULL,
  `date_of_trip` date NOT NULL,
  `time_of_trip` time NOT NULL,
  `pick_up_location_id` int(11) NOT NULL,
  `booked_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL COMMENT '1 - Pendding, 2- booked, 3 - cancelled',
  `payment_type` int(1) NOT NULL COMMENT '1 - net, 2 - credit, 3 - debit',
  `payment_status` int(1) NOT NULL COMMENT '0 - Pendding,1 - sucess,2 - failed',
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip_category`
--

CREATE TABLE IF NOT EXISTS `trip_category` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL,
  `isactive` int(11) NOT NULL COMMENT '0 - Deactive, 1 - Active'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trip_category`
--

INSERT INTO `trip_category` (`id`, `name`, `created_on`, `created_by`, `updated_on`, `updated_by`, `isactive`) VALUES
(1, 'Attraction Visit', '2018-07-28 11:48:01', 0, '0000-00-00 00:00:00', 0, 1),
(6, 'Boating', '2018-07-28 12:57:46', 0, '0000-00-00 00:00:00', 0, 1),
(7, 'Cycling', '2018-07-28 14:30:07', 0, '0000-00-00 00:00:00', 0, 1),
(8, 'Wildlife', '2018-07-28 14:42:43', 0, '0000-00-00 00:00:00', 0, 1),
(9, 'Trekking', '2018-07-28 18:09:26', 0, '0000-00-00 00:00:00', 0, 1);

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
  `isactive` int(1) NOT NULL DEFAULT '1'
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip_inclusions_map`
--

CREATE TABLE IF NOT EXISTS `trip_inclusions_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `inclusions_id` int(11) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `trip_shared_id` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `trip_category_id` int(11) NOT NULL,
  `trip_name` varchar(200) NOT NULL,
  `trip_url` varchar(250) NOT NULL,
  `trip_img_name` varchar(200) NOT NULL,
  `parent_trip_id` int(11) NOT NULL DEFAULT '0',
  `address1` varchar(150) NOT NULL,
  `address2` int(150) NOT NULL,
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
  `brief_description` text NOT NULL,
  `other_inclusions` tinytext NOT NULL,
  `exclusions` tinytext NOT NULL,
  `languages` tinytext NOT NULL,
  `meal` tinytext NOT NULL,
  `transport` tinytext NOT NULL,
  `things_to_carry` tinytext NOT NULL,
  `advisory` tinytext NOT NULL,
  `tour_type` tinytext NOT NULL,
  `cancellation_policy` tinytext NOT NULL,
  `confirmation_policy` tinytext NOT NULL,
  `refund_policy` tinytext NOT NULL,
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
  `other_setting` int(1) NOT NULL DEFAULT '0' COMMENT '1 - Set Offer Specific Day, 2 - Set Trip Close Specific Day',
  `other_from_date` timestamp NULL DEFAULT NULL,
  `other_to_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `other_no_of_traveller` int(5) NOT NULL DEFAULT '0',
  `other_no_of_min_booktraveller` int(3) NOT NULL DEFAULT '0',
  `other_no_of_max_booktraveller` int(3) NOT NULL DEFAULT '0',
  `other_price_to_adult` float NOT NULL,
  `other_price_to_child` float NOT NULL,
  `other_price_to_infan` float NOT NULL,
  `is_shared` int(1) NOT NULL DEFAULT '0' COMMENT '0- non shared, 1 - shared',
  `isactive` int(1) NOT NULL DEFAULT '1' COMMENT '0 - Deactive, 1 - Active',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trip_shared`
--

CREATE TABLE IF NOT EXISTS `trip_shared` (
  `id` int(11) NOT NULL,
  `code` varchar(100) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `shared_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `to_user_mail` varchar(150) NOT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL COMMENT '1 - Pendding, 2- approved, 3 - cancelled',
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
(17, 'Places To Stay In', '2018-07-28 07:17:13', 0, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_tag_map`
--

CREATE TABLE IF NOT EXISTS `trip_tag_map` (
  `id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `isactive` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_type`, `email`, `password`, `user_fullname`, `dob`, `gender`, `phone`, `alt_phone`, `emergency_contact_person`, `emergency_contact_no`, `activation_code`, `activation_code_time`, `about_me`, `profile_pic`, `balance_amt`, `unclear_amt`, `social_network`, `auth_id`, `login_via`, `created_on`, `last_visit`, `isactive`) VALUES
(1, 'CU', 'customer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Customer', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(2, 'SA', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Admin', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(3, 'VA', 'vendor@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country_master`
--
ALTER TABLE `country_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `coupon_code_master`
--
ALTER TABLE `coupon_code_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `coupon_code_master_history`
--
ALTER TABLE `coupon_code_master_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `faq_master`
--
ALTER TABLE `faq_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `my_transaction`
--
ALTER TABLE `my_transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `state_master`
--
ALTER TABLE `state_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `trip_avilable`
--
ALTER TABLE `trip_avilable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_book_pay`
--
ALTER TABLE `trip_book_pay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_book_pay_details`
--
ALTER TABLE `trip_book_pay_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_category`
--
ALTER TABLE `trip_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `trip_comment`
--
ALTER TABLE `trip_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_gallery`
--
ALTER TABLE `trip_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_inclusions`
--
ALTER TABLE `trip_inclusions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_inclusions_map`
--
ALTER TABLE `trip_inclusions_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_itinerary`
--
ALTER TABLE `trip_itinerary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_master`
--
ALTER TABLE `trip_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_shared`
--
ALTER TABLE `trip_shared`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_tags`
--
ALTER TABLE `trip_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `trip_tag_map`
--
ALTER TABLE `trip_tag_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
