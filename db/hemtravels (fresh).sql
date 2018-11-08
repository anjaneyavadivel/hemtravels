-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2018 at 05:05 AM
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
(1, 3, 'HDFC', 'Vendor', '123654789', 'HDFC0000111', 'goa Branch', 'goa Address', 0, '2018-10-15 15:50:18', 0, '0000-00-00 00:00:00', 0, 1),
(2, 37, 'HDFC', 'customer', '12345678910', 'HDFC0000111', 'goa Branch', 'goa Address', 1, '2018-10-16 16:17:17', 0, '0000-00-00 00:00:00', 0, 1),
(3, 3, 'HDFC', 'Vendor', '987456321', 'HDFC0000111', 'goa Branch', 'goa Address', 1, '2018-10-17 14:51:48', 0, '0000-00-00 00:00:00', 0, 1),
(4, 4, 'ICICI', 'VENDOR TWO', '1234652248', 'ICIC00113213', 'CBE BRANCH', 'COIMABAGORE', 1, '2018-10-17 15:01:06', 0, '0000-00-00 00:00:00', 0, 1),
(5, 52, 'HDFC', 'VINOD VELAPPAN CANCELLATION REFUND', '1234652248', 'HDFC0000111', 'goa Branch', 'S-16, HIGHLAND HOLIDAY HOMES, NEAR CANDOLIM PANCHAYAT', 1, '2018-10-25 09:44:20', 0, '0000-00-00 00:00:00', 0, 1),
(6, 55, 'HDFC', 'VINOD VELAPPAN', '1234652248', 'ICIC00113213', 'goa Branch', 'S-16, HIGHLAND HOLIDAY HOMES, NEAR CANDOLIM PANCHAYAT', 0, '2018-10-27 11:40:37', 0, '0000-00-00 00:00:00', 0, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 0, 'Who can register as Vendor', 'All the tour operators who condut tour or sell tour and have got a fixed inventory and price to sell online can register. He should be woking as per the applicable government rules.', '2018-08-22 17:55:22', 0, '0000-00-00 00:00:00', 0, 1),
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
  `location` varchar(200) NOT NULL,
  `landmark` varchar(200) NOT NULL,
  `time` varchar(150) NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

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
(19, 7, 8, 'Candolim', 'Axis bank', '08:20', 1),
(20, 7, 8, 'Sinquerim', 'Bus Stand', '8:00', 1),
(21, 7, 8, 'Calangute', 'Temple', '08:45', 1),
(22, 7, 8, 'Baga', 'CCD', '09:15', 1),
(23, 7, 8, 'parra', 'parra junc', '10:00', 1),
(24, 8, 7, 'Sun Kissed Plaza Hotel', 'Opp Calangute Mall', '07:00', 1),
(25, 9, 0, 'Coco Beach', 'Beach Parking', '9:30', 1),
(26, 9, 0, 'Baga', 'CCD', '08:30', 1),
(27, 9, 0, 'Calangute', 'Temple', '09:00', 1),
(28, 9, 0, 'Candolim', 'Axis Bank', '9:15', 1),
(29, 10, 10, 'Coco Beach', 'Beach Parking', '9:30', 1),
(30, 10, 10, 'Baga', 'CCD', '08:30', 1),
(31, 10, 10, 'Calangute', 'Temple', '09:00', 1),
(32, 10, 10, 'Candolim', 'Axis Bank', '9:15', 1),
(33, 11, 0, 'Dodamarg', 'Earthern Pot', '8:30', 1),
(34, 12, 11, 'Calangute', 'Dolphin circle', '6:30', 1),
(35, 12, 11, 'Candolim', 'AXIS BANK', '06:00', 1),
(36, 12, 11, 'BAGA', 'CCD', '07:00', 1),
(37, 13, 7, 'CANDOLIM', 'AXIS BANK', '09:00', 1),
(38, 14, 12, 'CALANGUTE', 'DOLPHIN CIRCLE', '15:00', 1),
(39, 15, 7, 'calangute', 'dolphin circle', '08:35', 1),
(40, 15, 7, 'CANDOLIM', 'AXIS BANK', '09:00', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

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
(15, 'Boat Trips', NULL, '2018-10-14 07:36:42', 3, '0000-00-00 00:00:00', 0, 1);

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
  `user_id` int(11) DEFAULT '0',
  `to_user_mail` varchar(150) DEFAULT NULL,
  `coupon_history_id` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1' COMMENT '1 - new, 2- maked, 3 - cancelled',
  `isactive` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

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
(29, '    adventure', '2018-10-31 08:41:20', 57, '0000-00-00 00:00:00', 0, 1);

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
  `profile_pic` text,
  `balance_amt` float(8,2) NOT NULL,
  `unclear_amt` float(8,2) NOT NULL,
  `social_network` text,
  `auth_id` text,
  `login_via` tinyint(1) DEFAULT '1' COMMENT '1->login,2->fb,3->google',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` timestamp NULL DEFAULT NULL,
  `isactive` tinyint(1) NOT NULL DEFAULT '2' COMMENT '0->de active, 1->active,2->not activated'
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`id`, `user_type`, `email`, `password`, `user_fullname`, `dob`, `gender`, `phone`, `alt_phone`, `emergency_contact_person`, `emergency_contact_no`, `activation_code`, `activation_code_time`, `about_me`, `profile_pic`, `balance_amt`, `unclear_amt`, `social_network`, `auth_id`, `login_via`, `created_on`, `last_visit`, `isactive`) VALUES
(1, 'CU', 'customer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Customer', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(2, 'SA', 'admin@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Admin', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(3, 'VA', 'vendor@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor1', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
(4, 'VA', 'vendor2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor2', '2018-06-22', '1', '9688079118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, '', '', 1, '2018-06-30 13:20:09', NULL, 1),
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
(26, 'GU', 'vtnlmn@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vt Nljlkj', NULL, NULL, '7778889994', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-01 08:05:18', NULL, 2),
(27, 'VA', 'vendor3@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor Three', NULL, NULL, NULL, NULL, NULL, NULL, 'c90b3169120e16506865bd2d22969dae', NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-01 08:38:56', NULL, 2),
(28, 'GU', 'v1@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'V1 Off Bo', NULL, NULL, '7788994411', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-01 09:03:31', NULL, 2),
(29, 'GU', 'lkjflkdsjf@d.com', '14e1b600b1fd579f47433b88e8d85291', 'Dfaldfkj', NULL, NULL, '7778889994', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-01 10:42:49', NULL, 2),
(30, 'VA', 'vendor4@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Velappan Rekandi Jamnagarwala', NULL, NULL, '8887779994', NULL, NULL, NULL, '5fade682e4d9e5948476467f275d67c7', NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-02 10:46:43', NULL, 2),
(31, 'GU', 'lkjlk@kjhbk.okjo', '14e1b600b1fd579f47433b88e8d85291', 'Kjkj Pkll;', NULL, NULL, '8887779994', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-02 12:00:07', NULL, 2),
(32, 'GU', 'vt1@dd.com', '14e1b600b1fd579f47433b88e8d85291', 'Test1', NULL, NULL, '7788994455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-05 11:43:41', NULL, 2),
(33, 'GU', 'fsd@dfds.c', '14e1b600b1fd579f47433b88e8d85291', 'Vdsv', NULL, NULL, '1234567897', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-05 12:49:46', NULL, 2),
(34, 'GU', 'vv@m.com', '14e1b600b1fd579f47433b88e8d85291', 'Vinod Velappan From Calangute', NULL, NULL, '1144778855', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-08 07:01:31', NULL, 2),
(35, 'GU', 'anch@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Anch', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-14 11:01:21', NULL, 2),
(36, 'GU', 'offbooking@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Office Vendor1 Booking', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-15 08:37:26', NULL, 2),
(37, 'GU', 'v2offbooking@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor 2  Off Bookin', NULL, NULL, '1112223334', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-15 08:50:42', NULL, 2),
(38, 'GU', 'bal@m.com', '14e1b600b1fd579f47433b88e8d85291', 'Balance Checking', NULL, NULL, '4546654621', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-17 18:04:51', NULL, 2),
(39, 'GU', 'customer3@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Customer3', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-20 05:05:03', NULL, 2),
(40, 'GU', 'test101@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Test 101', NULL, NULL, '2233445566', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-20 05:48:56', NULL, 2),
(41, 'GU', 'test102@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Test 102', NULL, NULL, '7788994455', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-20 05:53:46', NULL, 2),
(42, 'GU', 'test103@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Test 103', NULL, NULL, '5522335698', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-20 06:13:25', NULL, 2),
(43, 'GU', 'v2@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor 2 Off Booking', NULL, NULL, '2244556677', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-23 11:19:12', NULL, 2),
(44, 'GU', 'test1@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Test 1', NULL, NULL, '2244335511', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-23 14:42:33', NULL, 2),
(45, 'GU', 'test2@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Test 2', NULL, NULL, '4455887755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-23 14:56:10', NULL, 2),
(46, 'GU', 'test3@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'TEST 3', NULL, NULL, '2244889966', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-23 15:02:33', NULL, 2),
(47, 'GU', 'test@mai.com', '14e1b600b1fd579f47433b88e8d85291', 'Test', NULL, NULL, '1122334477', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-24 09:19:36', NULL, 2),
(48, 'GU', 'tv2@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Test V2', NULL, NULL, '1155997755', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-24 15:36:28', NULL, 2),
(49, 'GU', 'test@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'TEST', NULL, NULL, '6665554441', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-24 15:49:55', NULL, 2),
(50, 'GU', 'test101@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'TEST101', NULL, NULL, '2224445551', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-24 15:56:22', NULL, 2),
(51, 'GU', 'test@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Test', NULL, NULL, '1115559997', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-25 08:44:19', NULL, 2),
(52, 'GU', 'cancel@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Cancel', NULL, NULL, '2244889911', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-25 09:41:12', NULL, 2),
(53, 'GU', 'v2@mai.com', '14e1b600b1fd579f47433b88e8d85291', 'Vendor 2 Off Bookin', NULL, NULL, '2223334445', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-26 09:53:37', NULL, 2),
(54, 'GU', 'lkjl@ma.com', '14e1b600b1fd579f47433b88e8d85291', 'Dfaldkjf', NULL, NULL, '1321323213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-26 10:48:40', NULL, 2),
(55, 'GU', 'ft2@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Finod Test', NULL, NULL, '4445556661', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-27 11:28:20', NULL, 2),
(56, 'VA', 'chaitesh@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, '1dfb89769e2da0a1fc38c5401b79a300', NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-30 14:35:54', NULL, 2),
(57, 'VA', 'v_inod_v@yahoo.com', '14e1b600b1fd579f47433b88e8d85291', 'Chaitesh', NULL, NULL, NULL, NULL, NULL, NULL, 'ca4c2d856034d17cd55f02ba8abd6218', NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 05:49:49', NULL, 1),
(58, 'GU', 'customer@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'CUSTOMER1', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 08:06:00', NULL, 2),
(59, 'GU', 'inf@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'INFANT CUSTOMER', NULL, NULL, '2224445551', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 08:54:19', NULL, 2),
(60, 'GU', 'cv@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Cash Vendor', NULL, NULL, '2225558881', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 13:54:34', NULL, 2),
(61, 'GU', 'mb@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Mobile Book', NULL, NULL, '1221221220', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 15:26:29', NULL, 2),
(62, 'GU', 'wa@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Wats App', NULL, NULL, '6667778889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-10-31 15:35:07', NULL, 2),
(63, 'GU', 'mcbtc@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Mobile Vendor1 B2c', NULL, NULL, '1234567890', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-01 07:23:48', NULL, 2),
(64, 'GU', 'cv@maip.com', '14e1b600b1fd579f47433b88e8d85291', 'Check Vendor', NULL, NULL, '9992228883', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-01 09:18:36', NULL, 2),
(65, 'GU', 'vh@mail.com', '14e1b600b1fd579f47433b88e8d85291', 'Cash Book / Vinod Hem', NULL, NULL, '5558887774', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-03 10:48:41', NULL, 2),
(66, 'GU', 'customer@gmail.com', '14e1b600b1fd579f47433b88e8d85291', 'Customer', NULL, NULL, '7373112889', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.00, 0.00, NULL, NULL, 1, '2018-11-08 03:45:55', NULL, 2);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `trip_specific_day`
--
ALTER TABLE `trip_specific_day`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `trip_tags`
--
ALTER TABLE `trip_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
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
-- AUTO_INCREMENT for table `user_bank_master`
--
ALTER TABLE `user_bank_master`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `user_wishlist`
--
ALTER TABLE `user_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
