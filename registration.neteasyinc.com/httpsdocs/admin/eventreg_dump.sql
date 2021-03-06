-- phpMyAdmin SQL Dump
-- version 3.2.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 04, 2010 at 09:58 AM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eventreg`
--

-- --------------------------------------------------------

--
-- Table structure for table `continuing_ed_event_mapping`
--

CREATE TABLE IF NOT EXISTS `continuing_ed_event_mapping` (
  `ceu_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  KEY `ceu_id` (`ceu_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `continuing_ed_event_mapping`
--


-- --------------------------------------------------------

--
-- Table structure for table `continuing_ed_item`
--

CREATE TABLE IF NOT EXISTS `continuing_ed_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `ceu_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `units` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
  `location` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `instructor` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `url` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `information` longtext CHARACTER SET ucs2,
  `accrediting_organization_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `accrediting_organization_id` varchar(30) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `continuing_ed_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `event_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `location_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `location_description` longtext CHARACTER SET ucs2,
  `location_addressline1` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `location_addressline2` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `location_city` varchar(40) CHARACTER SET ucs2 DEFAULT NULL,
  `location_state` varchar(30) CHARACTER SET ucs2 DEFAULT NULL,
  `location_postalcode` varchar(10) CHARACTER SET ucs2 DEFAULT NULL,
  `location_country` varchar(2) CHARACTER SET ucs2 DEFAULT NULL,
  `location_phone` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
  `location_fax` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
  `location_url` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  `location_email` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  `lodging_info` longtext CHARACTER SET ucs2,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `event_description` longtext CHARACTER SET ucs2,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `site_id`, `event_name`, `creation_date`, `location_name`, `location_description`, `location_addressline1`, `location_addressline2`, `location_city`, `location_state`, `location_postalcode`, `location_country`, `location_phone`, `location_fax`, `location_url`, `location_email`, `lodging_info`, `start_date`, `end_date`, `event_description`) VALUES
(1, 1, '2009 Annual APA Virginia Conference', '2009-02-09 14:06:19', 'Williamsburg Lodge', '', '', '', 'Williamsburg', 'VA', '', 'US', '804-754-4120', '', '', 'office@apavirginia.org', 'Room rate is $189/night must be booked by March 4th.', '2009-03-27 00:00:00', '2009-03-29 00:00:00', 'GREEN COMMUNITIES VIRGINIA - Planning for Environmental, Economic, and Cultural Sustainability in the Commonwealth'),
(2, 1, 'ECO3 Eastern Shore Symposium 2009', '2009-07-24 14:51:09', 'Chincoteague Community Center', '', '6155 Community Drive', '', 'Chincoteague', 'VA', '23336', 'US', '(757) 466-9622', '', 'http://www.chincoteaguecenter.org', '', '', '2009-10-16 00:00:00', '2009-10-17 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `registration_options`
--

CREATE TABLE IF NOT EXISTS `registration_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `registrationperiod_id` int(11) DEFAULT NULL,
  `option_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `registrationperiod_id` (`registrationperiod_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `registration_options`
--

INSERT INTO `registration_options` (`id`, `site_id`, `registrationperiod_id`, `option_name`, `price`) VALUES
(1, 1, 1, 'Member - Wednesday, Thursday, and Friday', '295.00'),
(2, 1, 1, 'Member - Wednesday and Thursday', '250.00'),
(3, 1, 1, 'Member - Thursday and Friday', '225.00'),
(4, 1, 1, 'Wednesday', '150.00'),
(5, 1, 1, 'Thursday', '150.00'),
(6, 1, 1, 'Friday', '125.00'),
(7, 1, 1, 'Non-member - Wednesday, Thursday, and Friday', '345.00'),
(8, 1, 1, 'Non-member - Wednesday and Thursday', '300.00'),
(9, 1, 1, 'Non-member - Thursday and Friday', '275.00'),
(13, 1, 2, 'Non-member, Wednesday, Thursday, and Friday', '395.00'),
(14, 1, 2, 'Non-member, Wednesday and Thursday', '350.00'),
(15, 1, 2, 'Non-member, Thursday and Friday', '275.00'),
(16, 1, 2, 'Wednesday', '175.00'),
(17, 1, 2, 'Thursday', '175.00'),
(18, 1, 2, 'Friday', '150.00'),
(19, 1, 3, 'Speakers - Wednesday, Thursday and Friday', '170.00'),
(20, 1, 3, 'Speakers - Wednesday and Thursday', '125.00'),
(21, 1, 3, 'Speakers - Thursday and Friday', '100.00'),
(22, 1, 2, 'Member, Wednesday, Thursday, and Friday', '345.00'),
(23, 1, 2, 'Member, Wednesday and Thursday', '300.00'),
(24, 1, 2, 'Member,Thursday and Friday', '275.00'),
(25, 1, 4, 'Regular Registration', '35.00'),
(26, 1, 5, 'Regular Registration', '45.00'),
(27, 1, 6, 'Regular Registration', '50.00'),
(28, 1, 7, 'Student', '35.00'),
(29, 1, 7, 'Speaker', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `registration_period`
--

CREATE TABLE IF NOT EXISTS `registration_period` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `period_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `online_allowed` tinyint(1) DEFAULT NULL,
  `inperson_allowed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `registration_period`
--

INSERT INTO `registration_period` (`id`, `site_id`, `event_id`, `period_name`, `start_date`, `end_date`, `online_allowed`, `inperson_allowed`) VALUES
(1, 1, 1, 'Early Registration', '2009-02-01 00:00:00', '2009-03-11 00:00:00', 1, 1),
(2, 1, 1, 'Late Registration', '2009-03-11 00:00:00', '2009-03-25 00:00:00', 1, 1),
(3, 1, 1, 'Speaker registration', '2009-02-01 00:00:00', '2009-03-25 00:00:00', 1, 1),
(4, 1, 2, 'Early Registration', '2009-07-24 14:55:24', '2009-08-31 23:59:00', 1, 0),
(5, 1, 2, 'Regular Registration', '2009-08-31 23:59:00', '2009-10-01 23:59:00', 1, 0),
(6, 1, 2, 'Regular Registration', '2009-10-01 23:59:00', '2009-09-12 23:59:00', 1, 0),
(7, 1, 2, 'Special Registrations', '2009-07-24 15:02:43', '2009-10-01 23:59:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `name`) VALUES
(1, 'VA Planning');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `topic_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `topics`
--


-- --------------------------------------------------------

--
-- Table structure for table `topic_ceu_mapping`
--

CREATE TABLE IF NOT EXISTS `topic_ceu_mapping` (
  `topic_id` int(11) DEFAULT NULL,
  `ceu_id` int(11) DEFAULT NULL,
  KEY `topic_id` (`topic_id`),
  KEY `ceu_id` (`ceu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_ceu_mapping`
--


-- --------------------------------------------------------

--
-- Table structure for table `topic_event_mapping`
--

CREATE TABLE IF NOT EXISTS `topic_event_mapping` (
  `topic_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  KEY `topic_id` (`topic_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic_event_mapping`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `user_password` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `security_question_text` varchar(150) CHARACTER SET ucs2 DEFAULT NULL,
  `security_question_answer` varchar(150) CHARACTER SET ucs2 DEFAULT NULL,
  `title` varchar(5) CHARACTER SET ucs2 DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  `middle_initial` varchar(1) CHARACTER SET ucs2 DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  `suffix` varchar(5) CHARACTER SET ucs2 DEFAULT NULL,
  `badge_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `employer` varchar(100) DEFAULT NULL,
  `aicp` varchar(3) DEFAULT NULL,
  `address_1` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `address_2` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  `city` varchar(30) CHARACTER SET ucs2 DEFAULT NULL,
  `state` varchar(10) CHARACTER SET ucs2 DEFAULT NULL,
  `zip` varchar(10) CHARACTER SET ucs2 DEFAULT NULL,
  `country` varchar(2) CHARACTER SET ucs2 DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
  `fax` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  `alt_email` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=382 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `site_id`, `created_date`, `user_password`, `security_question_text`, `security_question_answer`, `title`, `first_name`, `middle_initial`, `last_name`, `suffix`, `badge_name`, `employer`, `aicp`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `phone`, `fax`, `email`, `alt_email`) VALUES
(1, 1, '2009-02-10 11:05:59', '', '', '', '', 'A', 'a', 'A', '', '', NULL, NULL, '123', '', 'Ci', 'St', '12345', 'US', '123', '123', 'a@b.co', ''),
(2, 1, '2009-02-10 11:47:32', '', '', '', '', 'Earl', 'W', 'Anderson', '', '', NULL, NULL, 'P.O. Box 532', '224 Ballard Street', 'Yorktown', 'VA', '23185', 'US', '757-890-3497', '757-890-4077', 'andersone@yorkcounty.gov', ''),
(3, 1, '2009-02-10 11:58:34', '', '', '', 'Mr.', 'Kirby', 'R', 'Knight', '', 'Kirby R. Knight', NULL, NULL, '4103 Whitford Cir ', 'Apt 701', 'Glen Allen', 'VA', '23060-4150', 'Un', '804-370-6481', '', 'kirby@kirbyknight.com', ''),
(4, 1, '2009-02-10 12:00:17', '', '', '', 'Mr.', 'Kirby', 'R', 'Knight', '', 'Kirby R. Knight', NULL, NULL, '4103 Whitford Cir ', 'Apt 701', 'Glen Allen', 'VA', '23060-4150', 'Un', '804-370-6481', '', 'kirby@kirbyknight.com', ''),
(5, 1, '2009-02-10 12:02:56', '', '', '', 'Mr.', 'Joe', '', 'Test', '', 'Joe', NULL, NULL, '1234', '', 'richmond', 'va', '23233', 'us', '', '', 'vaplanning@comcast.net', ''),
(6, 1, '2009-02-10 12:23:52', '', '', '', 'Mr.', 'Kirby', 'R', 'Knight', '', 'Kirby R. Knight', NULL, NULL, '4103 Whitford Cir', '', 'Glen Allen', 'VA', '23060-4150', 'Un', '804-370-6481', '', 'kirby@kirbyknight.com', ''),
(7, 1, '2009-02-10 15:46:39', '', '', '', 'Mr.', 'Kirby', 'R', 'Knight', '', '', NULL, NULL, '4103 Whitford Cir Apt 701', '', 'Glen Allen', 'VA', '23060-4150', 'Un', '804-370-6481', '', 'kirby@kirbyknight.com', 'kirby@kirbyknight.com'),
(8, 1, '2009-02-10 17:16:48', '', '', '', 'Mr.', 'Testy', 'A', 'McTest', 'Jr.', '"Chesty" McTest', NULL, NULL, '123 Any St', '', 'Richmond', 'VA', '22222', 'US', '804-555-1212', '', 'sales@neteasyinc.com', ''),
(9, 1, '2009-02-11 08:52:18', '', '', '', 'Mr.', 'Joseph', 'P', 'Lassus', 'AICP', 'Joe Lassus AICP', NULL, NULL, 'City of Brentwood', '5211 Maryland Way', 'Brentwood', 'TN', '37027', 'US', '615-948-6154', '615-371-2233', 'lassusj@brentwood-tn.org', ''),
(10, 1, '2009-02-11 09:51:15', '', '', '', 'Mr.', 'Earl', 'W', 'Anderson', '', 'Earl W. Anderson, AICP', NULL, NULL, 'PO Box 532', '224 Ballard Street', 'Yorktown', 'VA', '23690', 'US', '757-890-3497', '757-890-4077', 'andersone@yorkcounty.gov', ''),
(11, 1, '2009-02-11 10:29:49', '', '', '', 'Mr.', 'Timothy', 'C', 'Cross', '', 'Tim', NULL, NULL, 'York County Planning Division', 'PO Box 532', 'Yorktown', 'VA', '23690', 'US', '757-890-3496', '757-890-4029', 'tcross@yorkcounty.gov', ''),
(12, 1, '2009-02-11 10:48:35', '', '', '', 'Mr.', 'Brian', 'P', 'Henshaw', '', 'Brian ', NULL, NULL, 'PO Box 250', '1033 Locust Street', 'Stephens City', 'VA', '22655', 'US', '5408693087', '5408696166', 'bhenshaw@stephenscityva.us', 'vthenshaw@comcast.net'),
(13, 1, '2009-02-11 12:19:38', '', '', '', 'Mr.', 'Kevin', '', 'Byrd', '', 'Kevin Byrd', NULL, NULL, '755 Roanoke Street', 'Suite 2A', 'Christiansburg', 'VA', '24073', 'US', '540-394-2148', '540-381-8897', 'byrdkr@montgomerycountyva.gov', ''),
(14, 1, '2009-02-11 12:46:12', '', '', '', 'Mr.', 'James', 'M', 'McGowan', '', 'Jim', NULL, NULL, 'PO Box 686', '', 'Accomac', 'VA', '23301', 'US', '757-787-5726', '757-789-3116', 'jmcgowan@co.accomack.va.us', ''),
(15, 1, '2009-02-11 13:34:19', '', '', '', 'Mr.', 'Eddie', '', 'Wells', '', 'Eddie Wells', NULL, NULL, 'Roanoke Valley-Alleghany Regional Commission', 'PO Box 2569', 'Roanoke', 'VA', '24010', 'US', '540-343-4417', '540-343-4416', 'ewells@rvarc.org', ''),
(16, 1, '2009-02-11 13:34:28', '', '', '', 'Mr.', 'Eddie', '', 'Wells', '', 'Eddie Wells', NULL, NULL, 'Roanoke Valley-Alleghany Regional Commission', 'PO Box 2569', 'Roanoke', 'VA', '24010', 'US', '540-343-4417', '540-343-4416', 'ewells@rvarc.org', ''),
(17, 1, '2009-02-11 15:33:43', '', '', '', 'Ms.', 'Amy', 'M', 'Parker', '', 'Amy Parker', NULL, NULL, 'York County Planning Division', 'P.O. Box 532', 'Yorktown', 'VA', '23690', 'US', '757 890-3495', '', 'aparker@yorkcounty.gov', ''),
(18, 1, '2009-02-11 15:40:16', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(19, 1, '2009-02-11 19:01:14', '', '', '', 'Mr.', 'James', 'M', 'McGowan', '', 'Jim ', NULL, NULL, 'PO Box 686', '', 'Accomac', 'VA', '23301', 'US', '757-787-5726', '757-789-3116', 'jmcgowan@co.accomack.va.us', ''),
(20, 1, '2009-02-12 11:42:29', '', '', '', 'Ms.', 'Judith', 'C', 'Wiegand', '', 'Judy', NULL, NULL, 'PO Box 2403', '', 'Staunton', 'VA', '24402', 'US', '434-296-5832, x.3438', '', 'jwiegand@albemarle.org', 'judithwiegand@aol.com'),
(21, 1, '2009-02-12 12:30:52', '', '', '', 'Mrs.', 'Karen', '', 'Shaffer', '', 'Karen', NULL, NULL, 'Department of Planning', 'P.O.Box 15225', 'Chesapeake', 'VA', '23328', 'US', '757-382-6176', '757-382-6406', 'kshaffer@cityofchesapeake.net', ''),
(22, 1, '2009-02-12 12:32:08', '', '', '', 'Mrs.', 'Karen', '', 'Shaffer', '', 'Karen', NULL, NULL, 'Department of Planning', 'P.O.Box 15225', 'Chesapeake', 'VA', '23328', 'US', '757-382-6176', '757-382-6406', 'kshaffer@cityofchesapeake.net', ''),
(23, 1, '2009-02-12 16:02:54', '', '', '', 'Mr.', 'Chris', '', 'DeWitt', 'AICP', 'Chris', NULL, NULL, '351 McLaws Circle', 'Suite 3', 'Williamsburg', 'VA', '23185', 'US', '', '', 'cdewitt@vhb.com', ''),
(24, 1, '2009-02-12 16:48:32', '', '', '', 'Mr.', 'William', 'T', 'Martin', '', 'Tom Martin, AICP', NULL, NULL, '900 Church Street', '', 'Lynchburg', 'VA', '24504', 'US', '4344553909', '4348457630', 'tom.martin@lynchburgva.gov', ''),
(25, 1, '2009-02-13 13:58:17', '', '', '', 'Mrs.', 'Jeryl', 'R', 'Phillips', '', 'Jeryl R. Phillips, AICP', NULL, NULL, '810 Union Street', 'Suite 508', 'Norfolk', 'VA', '23510', 'US', '757-664-6771', '757-441-1569', 'jeryl.phillips@norfolk.gov', 'jerylphillips@cox.net'),
(26, 1, '2009-02-13 19:15:48', '', '', '', 'Mr.', 'Kevin', 'A', 'Walters', '', 'Kevin Walters', NULL, NULL, 'Practical Feng Shui', '4826 E Seminary Ave', 'Richmond', 'VA', '23227', 'US', '804-266-8530', '804-266-8320', 'WaltersKevin@msn.com', ''),
(27, 1, '2009-02-16 09:27:28', '', '', '', 'Mr.', 'Brian', '', 'Solis', '', 'Brian Solis', NULL, NULL, 'Va Beach P&R', '2408 Courthouse Drive', 'Virginia Beach', 'VA', '23456', 'US', '7573851109', '7573851130', 'bsolis@vbgov.com', ''),
(28, 1, '2009-02-17 08:00:20', '', '', '', 'Mr.', 'Raymond', 'E', 'Utz', '', 'Ray Utz', NULL, NULL, '5 County Complex Ct.', 'Suite 210', 'Prince William', 'VA', '22192-9201', 'US', '703-792-6846', '703-792-4401', 'rutz@pwcgov.org', ''),
(29, 1, '2009-02-17 08:50:34', '', '', '', 'Mr.', 'Charles', 'C', 'Carrington, AICP', '', 'Charles Carrington, Marstel-Day, LLC', NULL, NULL, '6913 Bloomsbury Lane', '', 'Spotsylvania ', 'VA', '22553', 'US', '540 371-3338', '540 371-3323', 'cc@marstel-day.com', ''),
(30, 1, '2009-02-17 08:56:17', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(31, 1, '2009-02-17 14:51:02', '', '', '', 'Mrs.', 'Vanessa', '', 'Watson', '', 'Vanessa Watson', NULL, NULL, 'City Hall', 'One Park Center Court', 'Manassas Park', 'VA', '20111', 'US', '703.335.8820', '', 'v.watson@manassasparkva.gov', ''),
(32, 1, '2009-02-17 14:59:14', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(33, 1, '2009-02-17 17:58:12', '', '', '', 'Ms.', 'Pamela', 'K', 'Thompson', '', 'Pamela Thompson', NULL, NULL, 'Post Office Box 68', '', 'Prince George', 'VA', '23875', 'US', '804-722-8600', '804-732-3604', 'pthompson@princegeorgeva.org', 'agleason@princegeorgeva.org'),
(34, 1, '2009-02-18 09:18:20', '', '', '', 'Mr.', 'Barry', '', 'Frankenfield', '', 'Barry', NULL, NULL, 'VB Parks and Recreation', '2408 Courthouse Drive', 'Virginia Beach', 'VA', '23456', 'US', '7573851104', '7573851130', 'bfranken@vbgov.com', ''),
(35, 1, '2009-02-18 10:05:44', '', '', '', 'Ms.', 'Diane', 'B', 'Ferrall', '', 'Diane B. Ferrall, AICP, CZA', NULL, NULL, 'Loudoun County B&D Zoning Administration MSC#60', 'One Harrison Street, SE, 3rd Floor', 'Leesburg', 'VA', '20177', 'US', '(703) 777-0397 X8657', '', 'Diane.Ferrall@Loudoun.gov', ''),
(36, 1, '2009-02-18 11:31:19', '', '', '', 'Mrs.', 'Taryn', 'G', 'Logan', '', 'Taryn Logan', NULL, NULL, '220 N. Commerce Ave.', '', 'Front Royal', 'VA', '22630', 'US', '5406363354', '', 'tlogan@warrencountyva.net', ''),
(37, 1, '2009-02-18 11:31:19', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(38, 1, '2009-02-18 12:41:18', '', '', '', 'Mrs.', 'Ashby', '', 'Moss', '', 'Ashby Moss', NULL, NULL, 'Planning Department', '2405 Courthouse Drive, Room 115', 'Virginia Beach', 'VA', '23456', 'US', '757-385-8573', '757-385-5667', 'amoss@vbgov.com', ''),
(39, 1, '2009-02-18 13:22:03', '', '', '', 'Mr.', 'Christopher', 'C', 'Sterling', '', 'Chris Sterling', NULL, NULL, '1840 West Broad Street', 'Suite 200', 'Richmond', 'VA', '23220', 'US', '804-349-6258', '804-343-1043', 'csterling@vacdc.org', 'chriscsterling@gmail.com'),
(40, 1, '2009-02-18 14:36:28', '', '', '', 'Mrs.', 'Elizabeth', '', 'McCarty', '', 'Elizabeth McCarty', NULL, NULL, '112 MacTanly Place', '', 'Staunton', 'VA', '24401', 'US', '540-885-5174', '540-885-2687', 'elizabeth@cspdc.org', ''),
(41, 1, '2009-02-19 09:13:16', '', '', '', 'Mrs.', 'Juanita', '', 'Bearer', '', 'Nita', NULL, NULL, '140 Kinross Drive', '', 'Winchester', 'VA', '22602', 'US', '571-258-3197', '', 'nita.bearer@loudoun.gov', ''),
(42, 1, '2009-02-20 11:59:24', '', '', '', 'Dr.', 'John', 'J', 'Accordino', 'PhD, ', 'John Accordino', NULL, NULL, 'VA Commonwealth University', '923 W. Franklin Street', 'Richmond', 'VA', '23284-2028', 'US', '804-827-0525', '', 'jaccordi@vcu.edu', ''),
(43, 1, '2009-02-20 14:56:19', '', '', '', 'Mrs.', 'Christine', 'H', 'Fix', '', 'Christine', NULL, NULL, '2727 Enterprise Drive', 'Suite 203', 'Richmond', 'VA', '23294', 'US', '804-935-7162', '804-935-7161', 'cfix@hwlochner.com', ''),
(44, 1, '2009-02-20 15:31:44', '', '', '', 'Mr.', 'John ', 'D', 'Hendrickson ', 'II', 'John Hendrickson', NULL, NULL, '6161 Kempsville Circle', 'Ste 110', '23502', 'VA', '', 'US', '757-466-9655', '757-466-1493', 'hendrickson@pbworld.com', ''),
(45, 1, '2009-02-20 16:15:05', '', '', '', 'Mr.', 'Gregory', 'J', 'Bokan', '', 'Greg Bokan', NULL, NULL, '9027 Center Street', 'PO Box 560', 'Manassas', 'VA', '20108', 'US', '703-257-8225', '703-257-5117', 'gbokan@ci.manassas.va.us', 'gbokan@vt.edu'),
(46, 1, '2009-02-20 16:18:53', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(47, 1, '2009-02-22 15:53:20', '', '', '', 'Mr.', 'Marvin', '', 'Sowers', '', 'Marv', NULL, NULL, '116 Jameswood', '', 'Williamsburg', 'VA', '23185', 'US', '757-784-5534', '757 220-8184', 'sobxbeachbum@gmail.com', 'goatboater@verizon.net'),
(48, 1, '2009-02-23 09:06:03', '', '', '', 'Ms.', 'Sharon', 'D', 'Williams', '', 'Sharon', NULL, NULL, 'P.O. Box 68', '', 'Prince George', 'VA', '23875', 'US', '804-722-8678', '804-732-2119', 'swilliams@princegeorgeva.org', ''),
(49, 1, '2009-02-23 11:34:44', '', '', '', 'Ms.', 'Patricia', 'S', 'Baker', '', 'Trish Baker', NULL, NULL, '1 Harrison St., SE', 'P.O. Box 7000', 'Leesburg', 'VA', '20177', 'US', '703-771-5745', '703-771-5522', 'tricia.baker@loudoun.gov', 'bakeracr@gmail.com'),
(50, 1, '2009-02-23 11:40:54', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(51, 1, '2009-02-23 11:43:54', '', '', '', 'Ms.', 'Diana', '', 'Larson', '', 'Diana Larson', NULL, NULL, '1 Harrison St., SE', 'P.O. Box 7000', 'Leesburg', 'VA', '20177', 'US', '703-771-5345', '703-771-5522', 'diana.y.larson@loudoun.gov', 'nsc68@comcast.net'),
(52, 1, '2009-02-23 11:49:52', '', '', '', 'Ms.', 'Donna', 'A', 'Shores', '', 'Donna Shores', NULL, NULL, '1 Harrison St., SE', 'P.O. Box 7000', 'Leesburg', 'VA', '20177', 'US', '703-777-0554', '703-771-5522', 'donna.shores@loudoun.gov', ''),
(53, 1, '2009-02-23 13:05:18', '', '', '', 'Mr.', 'William', 'L', 'McKay', 'Jr', 'Bill McKay', NULL, NULL, '2 Jonquil Lane', '', 'Newport News', 'VA', '23606', 'US', '757 218-3026', '757 382-6406', 'bmckay@cityofchesapeake.com', 'bmckayhokeye@yahoo.com'),
(54, 1, '2009-02-23 14:40:53', '', '', '', 'Mr.', 'John', '', 'Merrithew', '', 'John Merrithew', NULL, NULL, '1 Harrison Str, 3rd Flr', 'PO Box 7000', 'Leesburg', 'VA', '20175', 'US', '703-777-0246', '703-777-0441', 'john.merrithew@loudoun.gov', ''),
(55, 1, '2009-02-23 14:41:53', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(56, 1, '2009-02-23 15:26:49', '', '', '', 'Ms.', 'Sandra', '', 'Chaloux', '', 'Sandra Chaloux', NULL, NULL, '1 Harrison Str 3rd Flr ', 'PO Box 7000', 'Leesburg', 'VA', '20175', 'US', '703-777-0246', '703-777-0441', 'sandra.chaloux@loudoun.gov', ''),
(57, 1, '2009-02-23 15:35:34', '', '', '', 'Ms.', 'Sandra', '', 'Chaloux', '', 'Sandra Chaloux', NULL, NULL, '1 Harrison Str 3rd Flr', 'PO Box  7000', 'Leesburg', 'VA', '20175', 'US', '703-777-0246', '703-777-0441', 'sandra.chaloux@loudoun.gov', ''),
(58, 1, '2009-02-23 16:25:59', '', '', '', 'Mr.', 'Charles', 'C', 'Mothersead', '', 'Chris Mothersead', NULL, NULL, '509 Blue Ridge Avenue', '', 'Culpeper', 'VA', '22701', 'US', '540-347-2405', '540-349-2414', 'cmothersead@warrentonva.gov', ''),
(59, 1, '2009-02-23 17:44:50', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(60, 1, '2009-02-24 08:30:44', '', '', '', 'Mr.', 'Douglas', '', 'Miles', '', 'Douglas Miles', NULL, NULL, 'P.O. Box 68', 'County of Prince George', 'Prince George', 'VA', '23875', 'US', '804-722-8672', '804-722-0702', 'dmiles@princegeorgeva.org', ''),
(61, 1, '2009-02-24 09:07:19', '', '', '', 'Mr.', 'Douglas', '', 'Miles', '', 'Douglas Miles', NULL, NULL, 'P. O. Box 68', 'County of Prince George', 'Prince George', 'VA', '23875', 'US', '807-722-8672', '804-722-0702', 'dmiles@princegeorgeva.org', ''),
(62, 1, '2009-02-24 09:42:27', '', '', '', 'Mr.', 'John', '', 'Merrithew', '', 'John', NULL, NULL, '', '', '', 'VA', '', 'US', '', '', 'john.merrithew@loudoun.gov', ''),
(63, 1, '2009-02-24 09:52:43', '', '', '', 'Ms.', 'Mary', 'A', 'Zirkle', '', 'Mary A Zirkle', NULL, NULL, 'Bedford County', '122 E Main St, Ste G-03', 'Bedford', 'VA', '24523', 'US', '540-586-7616', '540-586-2059', 'm.zirkle@co.bedford.va.us', ''),
(64, 1, '2009-02-24 12:40:52', '', '', '', 'Mr.', 'Charles', 'C', 'Mothersead', '', 'Chris Mothersead', NULL, NULL, '509 Blue Ridge Avenue', '', 'Culpeper', 'VA', '22701', 'US', '540-347-2405', '540-349-2414', 'cmothersead@warrentonva.gov', ''),
(65, 1, '2009-02-24 14:04:24', '', '', '', 'Mr.', 'Alvin', 'V', 'Poller', '', 'Vaughn', NULL, NULL, '224 Ballard St', '', 'Yorktown', 'VA', '23690', 'US', '757.890.3885', '757.890.4100', 'vaughn.poller@yorkcounty.gov', ''),
(66, 1, '2009-02-24 14:57:10', '', '', '', 'Mr.', 'Joseph ', 'E', 'Feest ', '', 'Joe Feest ', NULL, NULL, 'Chesterfield County Planning Department ', 'P.O. Box 40', 'Chesterfield ', 'VA', '23832', 'US', '804-748-1967', '804-717-6295', 'johnsonbr@chesterfield.gov', ''),
(67, 1, '2009-02-24 16:18:05', '', '', '', 'Ms.', 'Cyrena', 'C', 'Eitler', '', 'Cyrena', NULL, NULL, '400 Army Navy Drive', 'Suite 200', 'Arlington', 'VA', '22202', 'US', '703.604.5139', '703.604.5843', 'cyrena.eitler@wso.whs.mil', ''),
(68, 1, '2009-02-24 17:05:46', '', '', '', 'Mr.', 'Brian', '', 'Ballard', '', 'Brian Ballard', NULL, NULL, 'P.O. Box 15225', '', 'Chesapeake', 'VA', '23328', 'US', '382-6176', '382-6406', 'bballard@cityofchesapeake.net', ''),
(69, 1, '2009-02-25 08:43:32', '', '', '', 'Mr.', 'Robert', 'F', 'Hale', 'Jr.', 'Bob Hale', NULL, NULL, '18 Court St.', '', 'Warrenton', 'VA', '20188', 'US', '540-347-6279', '540-349-2414', 'rhale@warrentonva.gov', ''),
(70, 1, '2009-02-25 10:59:44', '', '', '', 'Mr.', 'John', 'J', 'Zeugner', '', 'John J Zeugner, AICP', NULL, NULL, '6408 Roselawn Rd', '', 'Richmond ', 'VA', '23226', 'US', '804-288-5005', 'NA', 'jjzeugner@comcast.net', ''),
(71, 1, '2009-02-25 11:20:51', '', '', '', 'Mr.', 'Stephen', '', 'Thomas', '', 'Steve', NULL, NULL, '115 South 15th Street', 'Suite 200', 'Richmond', 'VA', '23219', 'US', '(804) 363-4422', '(804) 343-1713', 'sthomas@vhb.com', 'jparker@vhb.com'),
(72, 1, '2009-02-25 11:53:30', '', '', '', 'Mr.', 'James', 'P', 'Gilmer', 'III', 'Jake Gilmer', NULL, NULL, 'PO Box 2569', '', 'Roanoke', 'VA', '24016', 'US', '540-343-4417', '540-343-4416', 'jgilmer@rvarc.org', ''),
(73, 1, '2009-02-25 13:31:07', '', '', '', 'Mr.', 'Mark', '', 'Stultz', '', 'Mark Stultz', NULL, NULL, '108 Cloverdale Court', '', 'Winchester', 'VA', '22602', 'US', '703-771-5394', '703-771-5215', 'Mark.Stultz@loudoun.gov', 'markstultz@verizon.net'),
(74, 1, '2009-02-25 15:07:24', '', '', '', 'Mr.', 'Jared', 'B', 'Anderson', '', 'Jared', NULL, NULL, '6150 Community Drive', '', 'Chincoteague', 'VA', '23336', 'US', '757-336-6519', '757-336-1965', 'jared@chincoteague-va.gov', ''),
(75, 1, '2009-02-25 15:38:41', '', '', '', 'Mr.', 'Charles', '', 'Johnston', '', 'Chuck', NULL, NULL, '102 N. Church St.', '', 'Berryville', 'VA', '', 'US', '(540) 955-5130', '', 'cjohnston@clarkecounty.gov', ''),
(76, 1, '2009-02-25 16:51:45', '', '', '', 'Ms.', 'Victoria', '', 'Gussman', '', 'Tory Gussman', NULL, NULL, 'PO Box 1776', '', 'Williamsburg', 'VA', '23187', 'US', '757-220-7159', '757-565-8042', 'vgussman@cwf.org', 'klevy@cwf.org'),
(77, 1, '2009-02-25 17:14:04', '', '', '', 'Ms.', 'ELIZABETH', 'S', 'PERRY', '', 'ELIZABETH', NULL, NULL, '300 PARK AVENUE', 'G-CORRIDOR', 'FALLS CHURCH', 'VA', '22046', 'US', '703-248-5104', '', 'EPERRY@FALLSCHURCHVA.GOV', ''),
(78, 1, '2009-02-26 06:58:22', '', '', '', 'Mr.', 'Frank', '', 'Kaleba', '', 'Frank Kaleba', NULL, NULL, '6446 Honey Tree Ct', '', 'Burke', 'VA', '', 'US', '703-644-5480', '', 'fjkaleba@verizon.net', 'fkaleba@rkeng.com'),
(79, 1, '2009-02-26 07:02:53', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(80, 1, '2009-02-26 08:27:21', '', '', '', 'Mr.', 'Gregory', 'M', 'Hembree', 'AICP', 'Greg Hembree', NULL, NULL, '127 Center Street, South', '', 'Vienna', 'VA', '22180', 'US', '703-255-6341', '703-255-5729', 'ghembree@viennava.gov', 'dpz@viennava.gov'),
(81, 1, '2009-02-26 09:17:30', '', '', '', 'Ms.', 'Victoria', '', 'Gussman', '', 'Tory Gussman', NULL, NULL, 'PO Box 1776', '', 'Williamsburg', 'VA', '23187', 'US', '757-220-7159', '757-565-8042', 'vgussman@cwf.org', 'klevy@cwf.org'),
(82, 1, '2009-02-26 10:03:52', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(83, 1, '2009-02-26 14:23:58', '', '', '', 'Mrs.', 'Shana', 'R', 'Johnson', '', 'Shana Johnson', NULL, NULL, '6005 Mersey Oaks Way', 'Unit A', 'Alexandria', 'VA', '22315', 'US', '703.746.8365', '', 'shana.johnson@gmail.com', ''),
(84, 1, '2009-02-26 16:25:04', '', '', '', 'Mr.', 'William', 'T', 'Hopkins', '', 'Bill Hopkins', NULL, NULL, 'PO Box 246', '', 'Smithfield', 'VA', '23431', 'US', '757-365-4233', '', 'bhopkins@smithfieldva.gov', ''),
(85, 1, '2009-02-26 23:42:38', '', '', '', 'Ms.', 'Sara', 'S', 'Hollberg', '', 'Sara', NULL, NULL, '24 Church St', '', 'Staunton', 'VA', '24401', 'US', '540.885.1921', '', 'hollberg@ntelos.net', ''),
(86, 1, '2009-02-26 23:47:07', '', '', '', 'Ms.', 'Sara', 'S', 'Hollberg', '', 'Sara', NULL, NULL, '24 Church Street', '', 'Staunton', 'VA', '24401', 'US', '540.885.1921', '', 'hollberg@ntelos.net', ''),
(87, 1, '2009-02-27 08:27:49', '', '', '', 'Mr.', 'Paul', 'F', 'Berge', '', 'Paul', NULL, NULL, '31144 Bunting Point Road', '', 'Melfa', 'VA', '23410', 'US', '757-787-3844', '', 'eulaland@verizon.net', ''),
(88, 1, '2009-02-27 08:41:06', '', '', '', 'Mr.', 'Makayah', '', 'Royal', '', 'Makayah', NULL, NULL, '21400 Ridgetop Circle', '', 'Sterling', 'VA', '20166', 'US', '703-948-1405', '571-434-1550', 'makayah.royal@fhwa.dot.gov', 'makayah.royal@fhwa.dot.gov'),
(89, 1, '2009-02-27 09:08:52', '', '', '', 'Mrs.', 'Emily', 'J', 'Gibson', '', 'Emily Gibson', NULL, NULL, 'P O Box 329', '', 'Gloucester', 'VA', '23061', 'US', '8046933301', '8046937037', 'egibson@gloucesterva.info', ''),
(90, 1, '2009-02-27 09:15:33', '', '', '', 'Mrs.', 'Anne', '', 'Ducey-Ortiz', '', 'Anne', NULL, NULL, 'P O Box 329', '', 'Gloucester', 'VA', '23061', 'US', '8046931224', '8046937037', 'aducey@gloucesterva.info', ''),
(91, 1, '2009-02-27 09:26:04', '', '', '', 'Mrs.', 'Elaine', 'K', 'Echols', '', 'Elaine Echols', NULL, NULL, 'Albemarle County', '401 McIntire Road', 'Charlottesville', 'VA', '22905', 'US', '434-296-5823 x 3252', '434-972-4126', 'eechols@albemarle.org', 'jeechols@verizon.net'),
(92, 1, '2009-02-27 10:50:10', '', '', '', 'Ms.', 'Susan', 'E', 'McCulloch', '', 'Susan McCulloch', NULL, NULL, 'PO Box 1112', '', 'Martinsville', 'VA', '24114', 'US', '276-403-5156', '', 'smcculloch@ci.martinsville.va.us', 'smcculloch4@gmail.com'),
(93, 1, '2009-02-28 16:05:15', '', '', '', 'Ms.', 'Elaine', 'Z', 'Pugh', '', 'Elaine Pugh', NULL, NULL, '9526 Clematis Street', '', 'Manassas', 'VA', '20110', 'US', '703-787-7380', '703-481-5280', 'elaine.pugh@herndon-va.gov', 'elaine@insightwealth.com'),
(94, 1, '2009-02-28 20:22:41', '', '', '', 'Mr.', 'Terry', '', 'O''Neill', '', 'Terry', NULL, NULL, '33 Channel Ln', '', 'Hampton', 'VA', '23664', 'US', '757 850-3946', '', 'toneill@hampton.gov', 'ksodesign@cox.net'),
(95, 1, '2009-03-01 21:28:07', '', '', '', 'Mr.', 'Jeffrey', 'A', 'Harvey', '', 'Jeff Harvey', NULL, NULL, '10100 Brookrun Court', '', 'Spotsylvania', 'VA', '22553', 'US', '540-786-7344', '540-658-6824', 'jharvey@co.stafford.va.us', 'jameks@comcast.net'),
(96, 1, '2009-03-02 08:46:06', '', '', '', 'Mr.', 'Carl', 'E', 'Jackson', 'III', 'Carl Jackson', NULL, NULL, '2400 Washington Ave.', '', 'Newport News', 'VA', '23607', 'US', '757-926-3834', '757-926-3639', 'cejackson@nngov.com', 'thirdintl@yahoo.com'),
(97, 1, '2009-03-02 10:17:46', '', '', '', 'Mr.', 'Rory', 'L', 'Toth', '', 'Rory Toth', NULL, NULL, '1 Harrison Street, SE', 'PO Box 7000', 'Leesburg', 'VA', '20177-7000', 'US', '703-737-8211', '', 'rory.toth@loudoun.gov', ''),
(98, 1, '2009-03-02 10:40:45', '', '', '', 'Mr.', 'Douglas', 'H', 'Moseley', 'III', 'Doug', NULL, NULL, '4229 Lafayette Center Drive', 'Suite 1850', 'Chantilly', 'VA', '20151', 'US', '703.870.7000', '703.870.7039', 'dmoseley@gky.com', 'dhmoseley@verizon.net'),
(99, 1, '2009-03-02 11:14:06', '', '', '', 'Ms.', 'Ursula', 'M', 'Lemanski', '', 'Ursula Lemanski', NULL, NULL, 'National Park Service , NER-RTCA', '200 Chestnut Street, 3rd Floor', 'Philadelphia', 'PA', '19106', 'US', '703-431-7728', '', 'ursula_lemanski@nps.gov', ''),
(100, 1, '2009-03-02 12:11:20', '', '', '', 'Ms.', 'Elizabeth', 'S', 'Via', '', 'Liz Via', NULL, NULL, 'City of Manassas', '9027 Center Street, Rm 202', 'Manassas', 'VA', '20110', 'US', '703-257-8224', '703-257-5117', 'evia@ci.manassas.va.us', ''),
(101, 1, '2009-03-02 13:44:45', '', '', '', 'Mr.', 'William ', 'D', 'Fritz', '', 'Bill Fritz', NULL, NULL, '401 McIntire Road', '', 'Charlottesville', 'VA', '22902', 'US', '434-296-5823 ext 324', '', 'bfritz@albemarle.org', ''),
(102, 1, '2009-03-02 14:18:46', '', '', '', 'Mr.', 'Frank', 'M', 'Duke', '', 'Frank', NULL, NULL, '810 Union Street', 'Suite 508', 'Norfolk', 'VA', '23510', 'US', '757-664-4747', '', 'frank.duke@norfolk.gov', ''),
(103, 1, '2009-03-02 14:44:37', '', '', '', 'Mr.', 'David', '', 'Morris', '', 'Dave Morris', NULL, NULL, '700 Town Center Drive', 'Suite 400', 'NEWPORT NEWS', 'VA', '23606', 'US', '757-926-1096', '757-926-1168', 'dmorris@nngov.com', 'lowens@nngov.com'),
(104, 1, '2009-03-02 14:52:18', '', '', '', 'Mr.', 'Donald', 'P', 'Rice', '', 'Donald Rice', NULL, NULL, '700 Town Center Drive', 'Suite 400', 'NEWPORT NEWS', 'VA', '23606', 'US', '757-926-1095', '757-926-1168', 'drice@nngov.com', 'lowens@nngov.com'),
(105, 1, '2009-03-02 14:59:25', '', '', '', 'Ms.', 'Amelia', 'G', 'McCulley', '', 'Amelia McCulley', NULL, NULL, '395 Pine Needles Lane', '', 'Afton', 'VA', '22920', 'US', '434-989-1042', '', 'amcculle@albemarle.org', 'agmplanit@gmail.com'),
(106, 1, '2009-03-02 15:30:07', '', '', '', 'Ms.', 'Hannah', '', 'Twaddell', '', 'Hannah', NULL, NULL, 'Renaissance Planning Group', '200 Sixth St NE', 'Charlottesville', 'VA', '22902', 'US', '434-296-2554 x 306', '434-295-2543', 'htwaddell@citiesthatwork.com', ''),
(107, 1, '2009-03-02 15:35:50', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(108, 1, '2009-03-02 15:40:04', '', '', '', 'Mr.', 'William', 'G', 'Saunders', 'IV', 'William', NULL, NULL, '310 Institute Street', 'P. O. Box 246', 'Smithfield', 'VA', '23431', 'US', '757-365-4266', '757-357-9933', 'wsaunders@smithfieldva.gov', ''),
(109, 1, '2009-03-02 16:12:10', '', '', '', 'Ms.', 'Sheila', 'W', 'McAllister', '', 'Sheila W. McAllister', NULL, NULL, '2400 Washington Avenue', '2nd Fl Planning Dept', 'Newport News', 'VA', '23607', 'US', '7579263832', '7579263639', 'smcallister@nngov.com', ''),
(110, 1, '2009-03-02 16:31:34', '', '', '', 'Mrs.', 'Cathie', 'E', 'Freeman', '', 'Cathie Freeman', NULL, NULL, '205 Academy Drive', '', 'Abingdon', 'VA', '24210', 'US', '276-525-1390', '276-525-1309', 'cfreeman@washcova.com', ''),
(111, 1, '2009-03-02 17:39:13', '', '', '', 'Mr.', 'John', 'G', 'Williams', '', 'John Gray Williams', NULL, NULL, '', '', '', 'VA', '', 'US', '', '', 'johngraywilliams@gmail.com', 'jwilliams@campbell-paris.com'),
(112, 1, '2009-03-02 18:35:52', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(113, 1, '2009-03-03 09:00:33', '', '', '', 'Ms.', 'Stephanie', 'K', 'Golon', '', 'Stephanie K. Golon', NULL, NULL, '40 Celt Road', 'P.O. Box 358', 'Stanardsville', 'VA', '22973', 'US', '434-985-5282', '434-985-1459', 'sgolon@gcva.us', 'planning@gcva.us'),
(114, 1, '2009-03-03 09:05:23', '', '', '', 'Mr.', 'Shawn', 'B', 'Leake', '', 'Shawn B. Leake', NULL, NULL, 'P.O. Box 358', '40 Celt Road', 'Stanardsville', 'VA', '22973', 'US', '434-985-5282', '434-985-1459', 'sleake@gcva.us', 'planning@gcva.us'),
(115, 1, '2009-03-03 09:50:09', '', '', '', 'Ms.', 'Kathy', 'E', 'James-Webb', '', 'Kathy James-Webb', NULL, NULL, 'Department of Planning', '2400 Washington Ave.', 'Newport News', 'VA', '23607', 'US', '', '', 'kjames-webb@nngov.com', ''),
(116, 1, '2009-03-03 10:01:01', '', '', '', 'Ms.', 'Kathy', '', 'James-Webb', '', 'Kathy James-Webb', NULL, NULL, 'City of Newport News', '2400 Washington Ave.', 'Newport News', 'VA', '23607', 'US', '757-926-8075', '757-926-3639', 'kjames-webb@nngov.com', ''),
(117, 1, '2009-03-03 10:07:31', '', '', '', 'Mr.', 'Saul', '', 'Gleiser', 'Mr', 'Saul Gleiser', NULL, NULL, 'Dept. of Planning, City of Newport News', '2400 Washington Avenue, 2nd Floor', 'Newport News', 'VA', '23607', 'US', '(757) 926 8076', '(757) 926 3639', 'sgleiser@nngov.com', ''),
(118, 1, '2009-03-03 10:13:16', '', '', '', 'Mr.', 'Wade', '', 'Burkholder', '', 'Wade', NULL, NULL, 'Town of Leesburg', '25 West Market St', 'Leesburg', 'VA', '20176', 'US', '703-771-2758', '703-771-2724', 'wburkholder@leesburgva.gov', ''),
(119, 1, '2009-03-03 10:20:11', '', '', '', 'Mr.', 'Bryan', '', 'David', '', 'Bryan David', NULL, NULL, 'Region 2000 EDC', '828 Main Street, 12th Floor', 'Lynchburg', 'VA', '24504', 'US', '4348471447', '4348471455', 'bdavid@region2000.org', ''),
(120, 1, '2009-03-03 10:35:40', '', '', '', 'Mr.', 'Robert', 'W', 'Bolich', '', 'Rob Bolich, AICP', NULL, NULL, '324 Southport Circle', 'Suite 103', 'Virginia Beach', 'VA', '23452', 'US', '757-456-5356', '', 'rbolich@ene.com', ''),
(121, 1, '2009-03-03 10:43:23', '', '', '', 'Dr.', 'Meghan', 'Z', 'Gough', '', 'Meghan Z. Gough', NULL, NULL, '923 West Franklin Street', '', 'Richmond', 'VA', '23284', 'US', '804-827-0869', '804-827-1275', 'mzgough@vcu.edu', ''),
(122, 1, '2009-03-03 10:49:55', '', '', '', 'Ms.', 'Claire', '', 'Jones', '', 'Claire', NULL, NULL, '723 Woodlake Dr.', '', 'Chesapeake ', 'VA', '23320', 'US', '757-420-8300', '757-523-4881', 'cjones@hrpdcva.gov', ''),
(123, 1, '2009-03-03 10:51:07', '', '', '', 'Mr.', 'Robert', 'E', 'Kinsley', 'Jr.', 'Rob Kinsley', NULL, NULL, 'P.O. Box 36', '', 'Round Hill', 'VA', '20142', 'US', '540-338-7878', '540-338-1680', 'rkinsley@roundhillva.org', ''),
(124, 1, '2009-03-03 11:01:43', '', '', '', 'Mr.', 'Wade', '', 'Burkholder', '', 'Wade Burkholder', NULL, NULL, '18379 Sierra Springs Square', '', 'Leesburg', 'VA', '20176', 'US', '703.771.2758', '703.771.2724', 'wburkholder@leesburgva.gov', 'wadeburke@hotmail.com'),
(125, 1, '2009-03-03 11:03:51', '', '', '', 'Mr.', 'David', 'F', 'Watson', '', 'David Watson, AICP', NULL, NULL, 'Newport News Dept of Planning', '2400 Washington Ave.', 'Newport News', 'VA', '23607', 'US', '757 926 3833', '757 926 3639', 'dwatson@nngov.com', ''),
(126, 1, '2009-03-03 11:54:07', '', '', '', 'Mrs.', 'Karla', 'R', 'Triggle', '', 'Karla', NULL, NULL, '22 Lincoln Street', '', 'Hampton', 'VA', '23669', 'US', '757 728-2067', '757 727-6074', 'ktriggle@hampton.gov', 'kartri757@aol.com'),
(127, 1, '2009-03-03 12:01:00', '', '', '', 'Dr.', 'John', 'W', 'Epling, ', 'D.P.A', 'John', NULL, NULL, 'P. O. Box 266', '', 'Philomont', 'VA', '20131', 'US', '540-338-7841', '', 'epcorp@earthlink.net', ''),
(128, 1, '2009-03-03 13:06:23', '', '', '', 'Mr.', 'Bruce', '', 'Beard', '', 'Bruce Beard', NULL, NULL, '1225 South Clark Steet', 'Suite 1500', 'Arlington', 'VA', '22202', 'US', '703-604-0521', '', 'Bruce.Beard@osd.mil', ''),
(129, 1, '2009-03-03 14:32:02', '', '', '', 'Mr.', 'Darren', 'K', 'Coffey', '', 'Darren Coffey', NULL, NULL, '132 Main Street', '', 'Palmyra', 'VA', '22963', 'US', '434-591-1910', '434-591-1911', 'dcoffey@co.fluvanna.va.us', ''),
(130, 1, '2009-03-03 14:47:39', '', '', '', 'Mr.', 'Bryant', '', 'Phillips', '', 'Bryant Phillips', NULL, NULL, '132 Main Street', '', 'Palmyra', 'VA', '22963', 'US', '434-591-1910', '434-591-1911', 'bphillips@co.fluvanna.va.us', ''),
(131, 1, '2009-03-03 14:56:30', '', '', '', 'Mr.', 'Bryant', '', 'Phillips', '', 'Bryant Phillips', NULL, NULL, '132 Main Street', '', 'Palmyra', 'VA', '22963', 'US', '434-591-1910', '434-591-1911', 'bphillips@co.fluvanna.va.us', ''),
(132, 1, '2009-03-03 15:57:19', '', '', '', 'Mr.', 'Goerge', 'M', 'Homewood', '', 'George Homewood', NULL, NULL, 'PO Box 50', '12007 Courthouse Circle', 'New Kent', 'VA', '23124-0050', 'US', '(804) 966-5630', '(804) 966-8531', 'gmhomewood@co.newkent.state.va.us', 'anfinn@co.newkent.state.va.us'),
(133, 1, '2009-03-03 16:11:47', '', '', '', 'Mr.', 'David', 'B', 'Grover', 'AICP', 'David Grover, AICP', NULL, NULL, '7725 Robert E. Lee Drive', '', 'Spotsylvania', 'VA', '22551', 'US', '(540) 582-6102', '(540) 672-0164', 'dgrover@orangecountyva.gov', 'harmonie555@aol.com'),
(134, 1, '2009-03-03 16:22:34', '', '', '', 'Mr.', 'Steven ', 'B', 'Hall', '', '', NULL, NULL, '201 South Main Street', 'Post Office Box 511', 'Emporia', 'VA', '23847', 'US', '434-634-3332', '434-634-0003', 'shall@ci.emporia.va.us', ''),
(135, 1, '2009-03-03 17:24:41', '', '', '', 'Mr.', 'Greg', '', 'Dudash', '', 'Greg Dudash', NULL, NULL, 'Town of Blacksburg', '300 South Main Street', 'Blacksburg', 'VA', '24060', 'US', '540-961-1833', '540-951-0672', 'gdudash@blacksburg.gov', ''),
(136, 1, '2009-03-04 09:08:52', '', '', '', 'Ms.', 'Mary Joy', '', 'Scala', '', 'Mary Joy', NULL, NULL, 'City of Charlottesville', 'P.O. Box 911', 'Charlottesville', 'VA', '22902', 'US', '434.970.3182', '434.970.3359', 'scala@charlottesville.org', ''),
(137, 1, '2009-03-04 09:12:16', '', '', '', 'Mr.', 'Missy', '', 'Creasy', '', 'Missy', NULL, NULL, 'Neighborhood Dev Services', 'PO Box 911', 'Charlottesville', 'VA', '22902', 'US', '434-970-3182', '434-970-3359', 'creasym@charlottesville.org', ''),
(138, 1, '2009-03-04 10:00:58', '', '', '', 'Ms.', 'Ursula', 'M', 'Lemanski', '', 'Ursula Lemanski', NULL, NULL, 'National Park Service NER-RTCA', '200 Chestnut Street, 3rd Floor', 'Philadelphia', 'PA', '19106', 'US', '703-431-7728', '', 'ursula_lemanski@nps.gov', ''),
(139, 1, '2009-03-04 11:02:46', '', '', '', 'Mr.', 'Craig', 'E', 'Gossman', '', 'CRAIG GOSSMAN, AIA', NULL, NULL, '27 West 7th Street', '', 'Covington', 'KY', '41011', 'US', '859-957-0957', '859-957-0950', 'cgossman@kkgstudios.com', ''),
(140, 1, '2009-03-04 11:16:53', '', '', '', 'Mr.', 'Alexander ', '', 'Long ', 'IV', 'Alex ', NULL, NULL, 'P.O. Box 270', '', 'Port Royal ', 'VA', '22535', 'US', '8047425612', '', 'along@ccim.net', ''),
(141, 1, '2009-03-04 11:18:18', '', '', '', 'Mr.', 'Aaron', 'K', 'Klibaner', '', 'Aaron Klibaner', NULL, NULL, '3201 Landover Street', 'Apt. 518', 'Alexandria', 'VA', '22305', 'US', '703-324-1497', '703-324-3056', 'aaronklibaner@comcast.net', 'akliba@fairfaxcounty.gov'),
(142, 1, '2009-03-04 11:53:50', '', '', '', 'Mr.', 'Garrett', '', 'Jackson', '', 'Garrett Jackson', NULL, NULL, 'p.o. box 789', '', 'abingdon', 'VA', '24212', 'US', '2766283167', '2766983412', 'gjackson@abingdon.com', 'wgarrettjackson@gmail.com'),
(143, 1, '2009-03-04 11:59:01', '', '', '', 'Mr.', 'sean ', '', 'taylor', '', 'Sean Taylor', NULL, NULL, 'p.o. box 789', '', 'abingdon', 'VA', '24212', 'US', '2766283167', '2766983412', 'sctaylor@abingdon.com', ''),
(144, 1, '2009-03-04 13:00:16', '', '', '', 'Mr.', 'Brad', '', 'Strader', '', 'Brad Strader', NULL, NULL, '306 S. Washington Ave', 'Suite 400', 'Royal Oak', 'MI', '48067', 'US', '248-586-0505', '248-586-0501', 'strader@lslplanning.com', 'cheeseman@lslplanning.com'),
(145, 1, '2009-03-04 14:33:31', '', '', '', 'Mr.', 'Kevin', 'F', 'Byrnes', '', 'Kevin F Byrnes, AICP', NULL, NULL, 'GWRC', '406 Princess Anne St', 'Fredericksburg', 'VA', '22401', 'US', '540-373-2890', '540-899-4808', 'byrnes@gwregion.org', 'kfbyrnes@verizon.net'),
(146, 1, '2009-03-04 15:19:30', '', '', '', 'Mr.', 'Riutort', 'A', 'Orlando', '', 'Al Riutort, AICP', NULL, NULL, 'Dept of Planning', '2400 Washington Av', 'Newport News', 'VA', '23607', 'US', '757-926-8761', '757-926-3639', 'ariutort@nngov.com', ''),
(147, 1, '2009-03-04 16:58:13', '', '', '', 'Mr.', 'J.', 'D', 'COENEN', 'JR', 'J. DOUGLAS COENEN, JR', NULL, NULL, '2400 WASHINGTON AVENUE', '2ND FLOOR - PLANNING', 'NEWPORT NEWS', 'VA', '23607', 'US', '7579268761', '7579263639', 'dmrichardson@nngov.com', 'doug.coenen@phra.com'),
(148, 1, '2009-03-04 17:04:48', '', '', '', 'Ms.', 'SHARYN', 'L', 'FOX', '', 'SHARYN L. FOX', NULL, NULL, '2400 WASHINGTON AVENUE', '2ND FLOOR - PLANNING', 'NEWPORT NEWS', 'VA', '23607', 'US', '7579268761', '7579263639', 'dmrichardson@nngov.com', 'sfox@wrallp.com'),
(149, 1, '2009-03-04 17:15:01', '', '', '', 'Mr.', 'Timothy', 'A', 'Youmans', '', 'Tim', NULL, NULL, '15 N Cameron St', 'Suite 318 City Hall', 'Winchester', 'VA', '22601', 'US', '540 667-1815', '', 'tyoumans@ci.winchester.va.us', ''),
(150, 1, '2009-03-04 17:15:50', '', '', '', 'Mr.', 'Nicholas', 'A', 'Rogers', '', 'Nick', NULL, NULL, '610 East Market Street', '', 'Charlottesville', 'VA', '22902', 'US', '434-970-3091', '434-970-3359', 'rogersn@charlottesville.org', 'nickrogers02@hotmail.com'),
(151, 1, '2009-03-04 18:51:53', '', '', '', 'Mr.', 'James', '', 'Gahres', '', 'Jim', NULL, NULL, '8116 Glenhurst Dr.', '', 'Fairfax Station', 'VA', '22039', 'US', '703-792-5505', '', 'jgahres@pwcgov.org', ''),
(152, 1, '2009-03-05 08:47:35', '', '', '', 'Mr.', 'Robert', 'W', 'Bolich', '', 'Rob Bolich, AICP', NULL, NULL, '324 Southport Circle', 'Suite 103', 'Virginia Beach', 'VA', '23452', 'US', '757-456-5356', '757-456-5356', 'rbolich@ene.com', ''),
(153, 1, '2009-03-05 09:03:21', '', '', '', 'Mrs.', 'Deborah', '', 'Kendall', '', 'Debbie Kendall', NULL, NULL, '112 W. Main Street', 'P.O. Box 111', 'Orange', 'VA', '22960', 'US', '5406723313', '', 'dkendall@orangecountyva.gov', 'dkendall@orangecountyva.gov'),
(154, 1, '2009-03-05 09:46:01', '', '', '', 'Mrs.', 'Michelle', 'W', 'Gibson', '', 'Michelle Gibson', NULL, NULL, 'P. O. Box 216', '', 'Warm Springs', 'VA', '24484', 'US', '540-839-7236', '540-839-7297', 'chele.gibson@bathcountyva.org', 'useachele@hotmail.com'),
(155, 1, '2009-03-05 09:55:47', '', '', '', 'Mrs.', 'Sherry', 'J', 'Ryder', '', 'Sherry Ryder', NULL, NULL, 'P. O. Box 216', '', 'Warm Springs,', 'VA', '24484', 'US', '540-839-7236', '540-839-7297', 'bathbpz@tds.net', 'sjryder66@yahoo.com;'),
(156, 1, '2009-03-05 09:59:40', '', '', '', 'Ms.', 'Angela ', 'Y', 'Hopkins', '', 'Angela Y. Hopkins', NULL, NULL, '2400 Washington Avenue', '', 'Newport News', 'VA', '23607', 'US', '(757) 926-8761', '(757) 926-3639', 'ahopkins@nngov.com', ''),
(157, 1, '2009-03-05 10:03:01', '', '', '', 'Mr.', 'Brian ', 'S', 'Parsons', '', 'Brian Parsons, AICP', NULL, NULL, '8226 Bell Lane', '', 'Vienna', 'VA', '22182', 'US', '703-207-9276', '703-803-6372', 'brian.parsons@fairfaxcounty.gov', 'parsons01@cox.net'),
(158, 1, '2009-03-05 10:44:11', '', '', '', 'Mr.', 'Joe', '', 'Lerch', '', 'Joe Lerch', NULL, NULL, '1511 Greycourt Avenue', '', 'Richmond', 'VA', '23227', 'US', '804-523-8530', '', 'jlerch@vml.org', ''),
(159, 1, '2009-03-05 10:50:01', '', '', '', 'Mr.', 'Matthew', 'G', 'Bolster', 'AICP', 'Matt', NULL, NULL, 'DHCD', '501 N. 2nd St.', 'Richmond', 'VA', '23219', 'US', '804-371-8010', '804-371-7090', 'matthew.bolster@dhcd.virginia.gov', 'mgbolster@yahoo.com'),
(160, 1, '2009-03-05 11:33:00', '', '', '', 'Mrs.', 'Amy', 'B', 'Jordan', '', 'Amy B Jordan', NULL, NULL, '1 Franklin Street', 'Ste 600', 'Hampton', 'VA', '23669', 'US', '757-728-5147', '', 'ajordan@hampton.gov', 'amybutl@msn.com'),
(161, 1, '2009-03-05 11:33:13', '', '', '', 'Ms.', 'Sandra', '', 'Marks', '', 'Sandra Marks', NULL, NULL, '2900 Business Center Drive', '', 'Alexandria', 'VA', '22314', 'US', '703-838-4411', '', 'sandra.marks@alexandriava.gov', ''),
(162, 1, '2009-03-05 13:50:51', '', '', '', 'Mr.', 'James', 'C', 'Uzel', '', 'Jim Uzel', NULL, NULL, '3345 pointe Dr', '', 'Quinton', 'VA', '23141', 'US', '804-501-7471', '', 'uze04@co.henrico.va.us', ''),
(163, 1, '2009-03-05 15:51:03', '', '', '', 'Mr.', 'Patrick', 'J', 'Mulhern', '', 'Patrick', NULL, NULL, '14111 Aspen Tree Lane', '', 'Nokesville', 'VA', '20181', 'US', '703-915-7946', '703-507-7445', 'Patrick.Mulhern4@gmail.com', 'Pmulhern@Spotsylvania.va.us'),
(164, 1, '2009-03-05 16:29:40', '', '', '', 'Mr.', 'Kenneth', 'W', 'Poore', '', 'Ken', NULL, NULL, '318 Willway Drive', '', 'Manakin-Sabot', 'VA', '23103', 'US', '(804) 204-1022', '(804) 204-1024', 'kpoore@kwpoore.com', ''),
(165, 1, '2009-03-06 09:14:20', '', '', '', 'Mr.', 'Jeff', '', 'Werner', '', 'Jeff Werner', NULL, NULL, '410 E. Water Street', 'Suite 700', 'Charlottesville', 'VA', '22902', 'US', '434-977-2033', '434-977-6306', 'jwerner@pecva.org', ''),
(166, 1, '2009-03-06 09:17:09', '', '', '', 'Mr.', 'Istiaque', '', 'Hassan', '', 'Istiaque', NULL, NULL, '1106 W Franklin St', 'Apt#208', 'Richmond', 'VA', '23220', 'US', '804-503-2128', '', 'hassani@vcu.edu', ''),
(167, 1, '2009-03-06 10:30:00', '', '', '', 'Mrs.', 'Donna', 'M', 'Hoke', '', 'Donna ', NULL, NULL, '101 South Court Street', '', 'Luray', 'VA', '22835', 'US', '540 743-6674', '540 743 1419', 'dhoke@pagecounty.virginia.gov', 'ntshade90@msn.com'),
(168, 1, '2009-03-06 10:39:41', '', '', '', 'Ms.', 'Sheila', 'W', 'McAllister', '', 'Sheila W. McAllister', NULL, NULL, '2400 Washington Avenue', '2nd fl Planning Dept', 'Newport News', 'VA', '23607', 'US', '757-926-3832', '757-926-3639', 'smcallister@nngov.com', ''),
(169, 1, '2009-03-06 10:56:38', '', '', '', 'Miss', 'Tracy', 'L', 'Clatterbuck', '', 'Tracy', NULL, NULL, '101 South Court Street', '', 'Luray', 'VA', '22835', 'US', '540 743 1324', '540 743 1419', 'tclatterbuck@pagecounty.virginia.gov', 'squirrel346@msn.com'),
(170, 1, '2009-03-06 10:59:43', '', '', '', 'Ms.', 'Cayce', 'R', 'Dagenhart', '', 'Cayce Dagenhart', NULL, NULL, '828 Main Street', 'Floor 12', 'Lynchburg', 'VA', '24504', 'US', '434-845-5678', '', 'cdagenhart@gmail.com', 'cayce.campbell@gmail.com'),
(171, 1, '2009-03-06 12:18:44', '', '', '', 'Ms.', 'Debrarae', '', 'Karnes', '', 'Debrarae Karnes, AICP', NULL, NULL, 'Leming & Healy', '233 Garrisonville Road Suite 204', 'Stafford', 'VA', '22554', 'US', '(540) 659-5155', '(540) 659-1651', 'debrarae@aol.com', 'lemingandhealy1@msn.com'),
(172, 1, '2009-03-06 14:16:24', '', '', '', 'Mr.', 'Greg ', '', 'Grootendorst', '', 'Greg Grootendorst', NULL, NULL, '723 Woodlake Drive', '', 'Chesapeake', 'VA', '23320', 'US', '', '', 'ggrootendorst@hrpdcva.gov', ''),
(173, 1, '2009-03-06 14:44:30', '', '', '', 'Ms.', 'Claudette', '', 'Grant', '', 'Claudette Grant', NULL, NULL, '909 St. Charles Ave.', '', 'Charlottesville', 'VA', '22901', 'US', '434 2965832 ext. 325', '434 9724126', 'cgrant@albemarle.org', 'grantwade@embarqmail.com'),
(174, 1, '2009-03-06 15:01:03', '', '', '', 'Mr.', 'Gretchen', 'W', 'Biernot', '', 'Gretchen ', NULL, NULL, '7516 County Complex road', 'P.O. Box 470', 'Hanover', 'VA', '23069', 'US', '804-365-6171', '804-365-6540', 'gwbiernot@co.hanover.va.us', 'gwbiernot@co.hanover.va.us'),
(175, 1, '2009-03-06 15:30:46', '', '', '', 'Mr.', 'Joseph', 'M', 'Drexler', '', 'Joseph', NULL, NULL, '2400 Washington Avenue', '', 'Newport News', 'VA', '23606', 'US', '757-926-8055', '757-926-8311', 'jdrexler@nngov.com', ''),
(176, 1, '2009-03-06 15:34:31', '', '', '', 'Mrs.', 'Carolyn', '', 'Adkins', '', 'Carolyn Adkins', NULL, NULL, '8510 Springfield Oaks Drive', '', 'Springfield', 'VA', '22153', 'US', '703-455-2919', '', 'carolyn_adkins@cox.net', ''),
(177, 1, '2009-03-06 15:58:32', '', '', '', 'Mr.', 'Megan ', 'M', 'Dalaell', '', 'Megan', NULL, NULL, '7516 County Complex Road', 'P.O. Box 470', 'Hanover', 'VA', '23069', 'US', '804-365-6171', '804-365-6540', 'mdalzell@co.hanover.va.us', ''),
(178, 1, '2009-03-06 16:10:18', '', '', '', 'Mr.', 'Andrew', 'D', 'Williams', '', 'Drew Williams', NULL, NULL, '320 East Mosby Road', '', 'Harrisonburg', 'VA', '22801', 'US', '540/434.5928.', '540/434.2695.', 'dreww@harrisonburgva.gov', ''),
(179, 1, '2009-03-09 10:07:14', '', '', '', 'Mr.', 'David', 'M', 'Moss', '', 'David Moss', NULL, NULL, '5 County Complex Court', 'Planning Office', 'Prince William', 'VA', '22192', 'US', '(703)792-6934', '', 'dmoss@pwcgov.org', ''),
(180, 1, '2009-03-09 10:50:18', '', '', '', 'Ms.', 'Meredith', '', 'Judy', '', 'Meredith Judy', NULL, NULL, '3101 Wilson Blvd.', 'Suite 400', 'Arlington', 'VA', '22201', 'US', '(703) 682-5017', '(703) 682-5001', 'meredith.judy@aecom.com', ''),
(181, 1, '2009-03-09 11:07:37', '', '', '', 'Mr.', 'John', '', 'Horne', '', 'John Horne', NULL, NULL, '113 Tewning Rd', '', 'Williamsburg', 'VA', '23188', 'US', '757-259-4127', '757-258-1528', 'jtphorne@james-city.va.us', ''),
(182, 1, '2009-03-09 11:25:18', '', '', '', 'Ms.', 'Patricia', 'C', 'Saternye', '', 'Paty Saternye', NULL, NULL, '92 Ballenger Lane', '', 'Palmyra', 'VA', '22963', 'US', '434-589-9258', '434-978-1444', 'psaternye@wwassociates.net', 'pcsaternye@hotmail.com'),
(183, 1, '2009-03-09 11:37:37', '', '', '', 'Ms.', 'Ebony', '', 'Walden', '', 'Ebony Walden', NULL, NULL, 'P.O. Box 911', '610 East Market Street', 'Charlottesville', 'VA', '', 'US', '434-970-3636', '(434) 970 - 3359', 'walden@charlottesville.org', 'ebony.walden@gmail.com'),
(184, 1, '2009-03-09 11:44:03', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(185, 1, '2009-03-09 11:45:47', '', '', '', 'Mr.', 'George', 'E', 'McCormack', 'Jr.', 'Ted', NULL, NULL, 'VACo', '1001 E. Broad St., LL 20', 'Richmond', 'VA', '23219', 'US', '804-343-2506', '804-788-0083', 'tmccormack@vaco.org', ''),
(186, 1, '2009-03-09 12:07:30', '', '', '', 'Mr.', 'Steve', 'M', 'Hundley', '', 'Steve Hundley', NULL, NULL, '112 Ashlawn Ct', '', 'Locust Grove', 'VA', '22508', 'US', '(718) 909-5033', '(540) 507-7445', 'shundley@spotsylvania.va.us', 'stevehundley7@gmail.com'),
(187, 1, '2009-03-09 12:59:06', '', '', '', 'Ms.', 'Sandra', 'G', 'Benson', '', 'Sandra Benson', NULL, NULL, 'P. O. Box 1196', '', 'Eastville', 'VA', '23347', 'US', '757-678-0443', '757-678-0483', 'sbenson@co.northampton.va.us', 's3benson@verizon.net'),
(188, 1, '2009-03-09 13:38:12', '', '', '', 'Mrs.', 'Christine', '', 'Mignogna', '', 'Christine Mignogna', NULL, NULL, '2400', 'Washington Avenue', 'Newport News', 'VA', '23607', 'US', '757 926-8689', '757 926-8311', 'chmignogna@nngov.com', ''),
(189, 1, '2009-03-09 13:55:08', '', '', '', 'Mr.', 'Harold', '', 'Roach', 'L', 'Harold  L. Roach', NULL, NULL, '2400 Washington Avenue', '', 'Newport News', 'VA', '23607', 'US', '757 926-8053', '757 926-8311', 'hroach@nngov.com', ''),
(190, 1, '2009-03-09 14:00:37', '', '', '', 'Mr.', 'Joe', '', 'Ellis', '', 'Joe Ellis', NULL, NULL, '2400 Washington Avenue', '', 'Newport News', 'VA', '23607', 'US', '757 926-8689', '757 926-8311', 'jellis@nngov.com', ''),
(191, 1, '2009-03-09 14:23:14', '', '', '', 'Mr.', 'William', 'T', 'Frazier', '', 'Bill Frazier, AICP', NULL, NULL, 'Frazier Associates', '213 North Augusta Street', 'Staunton', 'VA', '24401', 'US', '540-886-6230', '540-886-8629', 'bfrazier@frazierassociates.com', ''),
(192, 1, '2009-03-09 14:23:57', '', '', '', 'Mr.', 'James', 'B', 'Carpenter', 'Mr.', 'Barry Carpenter', NULL, NULL, 'Sympoetica', '137 S. Main Street', 'Woodstock', 'VA', '22664', 'US', '540-459-9590', '540-459-9591', 'barryc@sympoetica.net', ''),
(193, 1, '2009-03-09 14:25:30', '', '', '', 'Mr.', 'James', 'B', 'Carpenter', 'Mr.', 'Barry Carpenter', NULL, NULL, 'Sympoetica', '137 S. Main Street', 'Woodstock', 'VA', '22664', 'US', '540-459-9590', '540-459-9591', 'barryc@sympoetica.net', ''),
(194, 1, '2009-03-09 15:05:09', '', '', '', 'Mrs.', 'Elizabeth', 'L', 'McCarty', '', 'Elizabeth', NULL, NULL, '112 MacTanly Place', '', 'Staunton', 'VA', '24401', 'US', '540-885-5174', '540-885-2687', 'elizabeth@cspdc.org', ''),
(195, 1, '2009-03-09 15:12:54', '', '', '', 'Mr.', 'David', 'P', 'Fuller', '', 'David', NULL, NULL, 'PO Box 88', '', 'Leesburg', 'VA', '20178', 'US', '703-771-2775', '703-771-2776', 'dfuller@leesburgva.gov', 'dpfuller.aicp@gmail.com'),
(196, 1, '2009-03-09 15:44:56', '', '', '', 'Mr.', 'Raymond', 'P', 'Ocel', 'Jr ', 'Ray Ocel', NULL, NULL, '1426 Cellar Creek Way', '', 'Herndon', 'VA', '20170', 'US', '540-372-1179', '540-372-6412', 'rocel@fredericksburgva.gov', ''),
(197, 1, '2009-03-09 16:05:22', '', '', '', 'Mr.', 'Read', '', 'Brodhead', '', 'Read Brodhead', NULL, NULL, 'PO Box 911', '', 'charlottesville', 'VA', '22902', 'US', '434-970-3995', '434-970-3359', 'brodhead@charlottesville.com', ''),
(198, 1, '2009-03-09 16:19:42', '', '', '', 'Mr.', 'Benjamin', 'J', 'McFarlane', '', 'Ben McFarlane', NULL, NULL, 'Hampton Roads Planning District Commission', '723 Woodlake Drive', 'Chesapeake', 'VA', '23320', 'US', '757-420-8300', '', 'bmcfarlane@hrpdcva.gov', 'benjamin.mcfarlane@gmail.com'),
(199, 1, '2009-03-09 17:00:57', '', '', '', 'Mr.', 'Greg', '', 'Baka', '', 'Greg', NULL, NULL, '9802 Fort King Rd', '', 'Richmond', 'VA', '23229', 'US', '8046512081', '', 'gbaka@verizon.net', ''),
(200, 1, '2009-03-09 17:48:54', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(201, 1, '2009-03-09 17:57:42', '', '', '', 'Mrs.', 'Anne', 'B', 'Barwell', '', 'Brooks', NULL, NULL, '407 Yale Drive', '', 'Alexandria', 'VA', '22314', 'US', '703.212.9494', '', 'brooksbarwell@gmail.com', ''),
(202, 1, '2009-03-09 19:52:59', '', '', '', 'Ms.', 'Jennifer', 'O', 'Privette', '', 'Jennifer', NULL, NULL, '1204 Jolly Pond Road', '', 'James City County', 'VA', '23188', 'US', '757-565-4000', '757-565-1947', 'privette@james-city.va.us', ''),
(203, 1, '2009-03-09 22:29:54', '', '', '', 'Mr.', 'Greg ', '', 'Baka', '', 'Greg Baka - Viewshed Consulting', NULL, NULL, '9802 Fort King Rd', '', 'Richmond', 'VA', '23229', 'US', '8046512081', '', 'gbaka@verizon.net', ''),
(204, 1, '2009-03-10 05:47:30', '', '', '', 'Mrs.', 'Tish ', 'A', 'Weichmann-Morris', '', 'Tish Weichmann-Morris', NULL, NULL, '1515 S Arlington Ridge Road  #605', '', 'Arlington', 'VA', '22202', 'US', '202-447-3622', '', 'patricia.weichmann@hq.dhs.gov', ''),
(205, 1, '2009-03-10 09:19:13', '', '', '', 'Mrs.', 'Carol', '', 'Rizzio', '', 'Carol Rizzio', NULL, NULL, '3645 Nottaway St', '', 'Norfolk', 'VA', '23513', 'US', '757-858-8585', '757-858-2070', 'crizzio@landstudiopc.com', ''),
(206, 1, '2009-03-10 09:43:51', '', '', '', 'Mr.', 'Joseph', 'L', 'Curtis', 'Jr', 'Joseph Curtis, AICP', NULL, NULL, '6161 Kempsville Circle', 'Suite 110', 'Norfolk', 'VA', '23502', 'US', '7574669622', '7574661493', 'curtisj@pbworld.com', 'jcurtisjr@gmail.com'),
(207, 1, '2009-03-10 09:56:58', '', '', '', 'Ms.', 'Evelyn', 'A', 'Slone', '', 'Evie Slone', NULL, NULL, 'Hill Studio', '120 West Campbell Avenue', 'Roanoke', 'VA', '24011', 'US', '540-342-5263', '540-345-5625', 'eslone@hillstudio.com', ''),
(208, 1, '2009-03-10 10:12:15', '', '', '', 'Mr.', 'John', '', 'Rogerson', '', 'John', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '7572536685', '7572536822', 'planning@james-city.va.us', ''),
(209, 1, '2009-03-10 10:19:50', '', '', '', 'Mr.', 'Leanne', '', 'Reidenbach', '', 'Leanne', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6685', 'planning@james-city.va.us', ''),
(210, 1, '2009-03-10 10:32:48', '', '', '', 'Mr.', 'Allen', '', 'Murphy', '', 'Allen', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'planning@james-city.va.us', ''),
(211, 1, '2009-03-10 10:40:41', '', '', '', 'Mr.', 'Edward', '', 'Pollard', '', 'Eddie', NULL, NULL, '7924 Vermont Road', '', 'West Point', 'VA', '23181', 'US', '804-843-2022', '804-966-8531', 'anfinn@co.newkent.state.va.us', ''),
(212, 1, '2009-03-10 10:50:47', '', '', '', 'Mr.', 'William', 'S', 'Smith', '', 'Scott Smith', NULL, NULL, '828 Main Street', '12th Floor', 'Lynchburg', 'VA', '24504', 'US', '434-845-3491', '434-845-3493', 'ssmith@region2000.org', ''),
(213, 1, '2009-03-10 11:02:17', '', '', '', 'Mr.', 'Patrick', 'M', 'Hughes', '', 'Patrick Hughes', NULL, NULL, '2134 Berkley Ave SW', '', 'Roanoke', 'VA', '24015', 'US', '540-580-0133', '', 'phughes@hillstudio.com', 'patrickmhughes@yahoo.com'),
(214, 1, '2009-03-10 12:25:58', '', '', '', 'Ms.', 'Kathryn', '', 'Crandall', '', 'Kathryn Crandall', NULL, NULL, '3200 Inlet Shore Ct', '', 'Virginia Beach', 'VA', '23451', 'US', '757-636-6952', '', 'kathryn.a.crandall@navy.mil', '');
INSERT INTO `user` (`id`, `site_id`, `created_date`, `user_password`, `security_question_text`, `security_question_answer`, `title`, `first_name`, `middle_initial`, `last_name`, `suffix`, `badge_name`, `employer`, `aicp`, `address_1`, `address_2`, `city`, `state`, `zip`, `country`, `phone`, `fax`, `email`, `alt_email`) VALUES
(215, 1, '2009-03-10 12:28:06', '', '', '', 'Mr.', 'Brandon', 'P', 'Davis', '', 'Brandon P. Davis', NULL, NULL, '600 N. Main St.', 'Suite 107', 'Woodstock', 'VA', '22664', 'US', '5404596190', '', 'bdavis@shenandoahcountyva.us', ''),
(216, 1, '2009-03-10 12:42:27', '', '', '', 'Ms.', 'Jessica', 'L', 'Forbes', '', 'Jessica Forbes', NULL, NULL, '4112 Shoreline Circle', 'Apartment 187', 'Virginia Beach', 'VA', '23452', 'US', '304-261-7762', '', 'jforbes@ene.com', ''),
(217, 1, '2009-03-10 13:37:25', '', '', '', 'Mr.', 'Chad', 'M', 'Adkins, AICP', '', 'Chad- Hill Studio', NULL, NULL, '120 W Campbell Ave', '', 'Roanoke', 'VA', '24011', 'US', '540-342-5263', '', 'cadkins@hillstudio.com', ''),
(218, 1, '2009-03-10 13:55:20', '', '', '', 'Mrs.', 'Sharon', '', 'Hill', '', 'Sharon Hill', NULL, NULL, '1431 Daniel Avenue', '', 'Norfolk', 'VA', '23505', 'us', '757-271-5859', '757-322-4835', 'sharon.w.hill@navy.mil', ''),
(219, 1, '2009-03-10 14:15:23', '', '', '', 'Mr.', 'Steven', 'W', 'Hicks', '', 'Steven W. Hicks', NULL, NULL, 'P.O. Box 8784', '', 'James City County', 'VA', '23187', 'US', '7572536674', '7572536671', 'steven.hicks@james-city.va.us', ''),
(220, 1, '2009-03-10 14:37:50', '', '', '', 'Ms.', 'Ellen', '', 'Cook', '', 'Ellen', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'planning@james-city.va.us', ''),
(221, 1, '2009-03-10 14:41:33', '', '', '', 'Mr.', 'Luke', '', 'Vinciguerra', '', 'Luke', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'planning@james-city.va.us', ''),
(222, 1, '2009-03-10 14:47:41', '', '', '', 'Mr.', 'Jose', '', 'Ribeiro', '', 'Jose', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'planning@james-city.va.us', ''),
(223, 1, '2009-03-10 14:50:42', '', '', '', 'Ms.', 'Tammy', '', 'Rosario', '', 'Tammy', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'planning@james-city.va.us', ''),
(224, 1, '2009-03-10 14:54:33', '', '', '', 'Mr.', 'David', '', 'German', '', 'Dave', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'planning@james-city.va.us', ''),
(225, 1, '2009-03-10 15:00:07', '', '', '', 'Mr.', 'Zachary', 'L', 'Robbins', '', 'Zack', NULL, NULL, '101 Thompson St', 'PO Box 1600', 'Ashland', 'VA', '23005', 'US', '804-798-1073', '804-798-4892', 'zrobbins@town.ashland.va.us', ''),
(226, 1, '2009-03-10 15:38:13', '', '', '', 'Mr.', 'Michael', 'J', 'Zuraf', '', 'Mike Zuraf', NULL, NULL, '1300 Courthouse Road', 'P.O. Box 339', 'Stafford', 'VA', '22555', 'US', '(540)658-8671', '(540)658-6824', 'mzuraf@co.stafford.va.us', ''),
(227, 1, '2009-03-10 15:44:35', '', '', '', 'Mr.', 'Patrick', 'A', 'Gough', '', 'Patrick', NULL, NULL, '', '', 'Arlington', 'VA', '', 'US', '', '', 'patrick.gough@aecom.com', ''),
(228, 1, '2009-03-10 15:56:44', '', '', '', 'Mr.', 'Robert', 'E', 'Cosby', 'III', 'Bob Cosby', NULL, NULL, '5248 Olde Towne Rd.', '', 'Williamsburg', 'VA', '23188', 'US', '757-253-0040', '757-220-8994', 'bob.cosby@aesva.com', 'gwen.schatzman@aesva.com'),
(229, 1, '2009-03-10 16:01:55', '', '', '', 'Mr.', 'James', 'S', 'Peters', '', 'James Peters', NULL, NULL, '5248 Olde Towne Rd.', '', 'Williamsburg', 'VA', '23188', 'US', '757-253-0040', '757-220-8994', 'james.peters@aesva.com', 'gwen.schatzman@aesva.com'),
(230, 1, '2009-03-10 16:30:40', '', '', '', 'Dr.', 'Judith', 'A', 'Meany', '', 'Judith', NULL, NULL, '38897 John Wolford Rd.', '', 'Waterford', 'VA', '20197', 'US', '703-926-8643', '540-882-3258', 'jmeany@lozierpartners.com', 'judem@rstarmail.com'),
(231, 1, '2009-03-10 17:13:33', '', '', '', 'Ms.', 'Susan', 'B', 'Hill', '', 'Susan Berry Hill', NULL, NULL, '25 W. Market Street  ', '', 'Leesburg', 'VA', '20176', 'US', '703-771-2770', '703-737-7065', 'sberryhill@leesburgva.gov', ''),
(232, 1, '2009-03-10 17:25:58', '', '', '', 'Ms.', 'Amy', '', 'Probsdorfer', '', 'Amy', NULL, NULL, 'NAVFAC (ARE)', '9742 Maryland Ave', 'Norfolk', 'VA', '23511-3095', 'US', '757-322-3011', '', 'amy.probsdorfer@navy.mil', ''),
(233, 1, '2009-03-10 18:00:57', '', '', '', 'Dr.', 'Judith', 'A', 'Meany', '', 'Judith', NULL, NULL, '38897 John Wolford Rd.', '', 'Waterford', 'VA', '20197', 'US', '703-926-8643', '540-882-3258', 'jmeany@lozierpartners.com', 'judem@rstarmail.com'),
(234, 1, '2009-03-10 18:51:40', '', '', '', 'Mr.', 'Andrew', 'F', 'Cronan', '', 'Andrew F. Cronan AIA, LEED AP', NULL, NULL, '4350 New Town Ave.', 'Suite 101', 'Williamsburg', 'VA', '23188', 'US', '757-220-0220', '757-221-0457', 'afcronan@guernseytingle.com', 'afcronan@azalumni.com'),
(235, 1, '2009-03-10 20:03:51', '', '', '', 'Mr.', 'Richard', 'W', 'Krapf', '', 'Rich Krapf', NULL, NULL, '2404 Forge Road', '', 'Toano', 'VA', '23168', 'US', '757-220-7615', '757-565-8965', 'rkrapf@james-city.va.us', 'rkrapf@cwf.org'),
(236, 1, '2009-03-10 23:05:24', '', '', '', 'Ms.', 'Sara', '', 'Woolfenden', '', 'Sara Woolfenden', NULL, NULL, '104 E. Spring St', '', 'Alexandria', 'VA', '22301', 'US', '540-658-5126', '', 'swoolfenden@co.stafford.va.us', ''),
(237, 1, '2009-03-10 23:10:48', '', '', '', 'Dr.', 'Judith', 'A', 'Meany', '', 'Judith', NULL, NULL, '38897 John Wolford Rd.', '', 'Waterford', 'VA', '20197', 'US', '540-882-3200', '540-882-3258', 'jmeany@lozierpartners.com', 'judem@rstarmail.com'),
(238, 1, '2009-03-10 23:58:15', '', '', '', 'Mr.', 'Jason', 'L', 'Mumford', '', 'Jason Mumford', NULL, NULL, '3101 Wilson Blvd.', '4th Floor', 'Arlington', 'VA', '22201', 'US', '703-682-5023', '', 'jason.mumford@aecom.com', ''),
(239, 1, '2009-03-11 00:00:59', '', '', '', 'Ms.', 'Andrea', 'K', 'Hornung', 'AICP', 'Andrea', NULL, NULL, '9101 Wood Ibis Ct', '', 'Spotsylvania', 'VA', '22553', 'Un', '540-273-2885', '', 'ahornung@co.stafford.va.us', 'ahornung@co.stafford.va.us'),
(240, 1, '2009-03-11 09:47:17', '', '', '', 'Mr.', 'William', 'F', 'DuFault', '', 'William DuFault', NULL, NULL, '1018 New Mill Dr.', '', 'Chesapeake', 'VA', '23322', 'US', '757-836-2814', '', 'william.dufault@navy.mil', 'william.dufault@sbcglobal.net'),
(241, 1, '2009-03-11 11:13:03', '', '', '', 'Mr.', 'Paul ', 'D', 'Holt', 'III', 'Paul Holt', NULL, NULL, '801 Crawford St.', '', 'Portsmouth', 'VA', '23701', 'US', '757393-8641', '7573935241', 'holtp@portsmouthva.gov', ''),
(242, 1, '2009-03-11 17:05:46', '', '', '', 'Mr.', 'Stephen', '', 'Waller', '', 'Stephen Waller, AICP', NULL, NULL, '536 Pantops', 'PMB# 320', 'Charlottesville', 'VA', '22911', 'US', '434-825-0617', '757-282-5811', 'wallersb@gmail.com', 'stephen.waller@wirelessresources.com'),
(243, 1, '2009-03-12 19:40:45', '', '', '', 'Mrs.', 'Katrina', 'A', 'Hickman', '', 'Katrina', NULL, NULL, 'PO Box 487', '', 'Melfa', 'VA', '23410', 'US', '7576780443', '7576780483', 'katrinamelfa@gmail.com', 'khickman@co.northampton.va.us'),
(244, 1, '2009-03-13 09:16:20', '', '', '', 'Mrs.', 'Lorna', 'L', 'Parkins', 'AICP', 'Lorna', NULL, NULL, '1801 Bayberry Ct', 'Suite 101', 'Richmond', 'VA', '23226', 'US', '804-287-3176', '804-285-8530', 'lparkins@mbakercorp.com', ''),
(245, 1, '2009-03-16 13:23:02', '', '', '', 'Mr.', 'Richard', 'B', 'Smith', '', 'Richard Smith', NULL, NULL, '118 S Main St', '', 'Kannapolis', 'NC', '28081', 'US', '704.933.5990', '704.933.6160', 'richardsmith@benchmarkplanning.com', ''),
(246, 1, '2009-03-16 13:49:56', '', '', '', 'Mr.', 'Ed', '', 'Ware', '', 'Ed Ware', NULL, NULL, 'P. O. Box 968', '', 'Norfolk', 'VA', '23501', 'US', '757-314-1300', '', 'eware@nrha.us', 'oevans@nhra.us'),
(247, 1, '2009-03-16 16:56:36', '', '', '', 'Mr.', 'Deborah', 'A', 'Boone', '', 'Deborah A. Boone', NULL, NULL, '207 W. @2nd Ave', '', 'Franklin', 'VA', '23851', 'US', '757 562-8580', '757 562-0870', 'dboone@franklinva.com', ''),
(248, 1, '2009-03-16 17:03:27', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(249, 1, '2009-03-17 09:07:20', '', '', '', 'Mr.', 'George', 'E', 'McCormack', 'Jr', 'Ted McCormack', NULL, NULL, 'Va. Assoc. of Counties', '1001 E. Broad Street', 'Richmond', 'VA', '23219', 'US', '804-343-2506', '804-788-0083', 'tmccormack@vaco.org', ''),
(250, 1, '2009-03-17 09:48:24', '', '', '', 'Mr.', 'Correy', 'W', 'Dietz', '', 'Correy Dietz', NULL, NULL, '3299 Salinger Way', '', 'Tallahassee', 'FL', '32311', 'US', '(850) 383-9772', '', 'correy.dietz@edaw.com', 'wollven@gmail.com'),
(251, 1, '2009-03-17 13:20:57', '', '', '', 'Mr.', 'Kevin', 'A', 'Foster', '', 'Kevin Foster', NULL, NULL, '3101 Mt. Carmel Cemetery Rd.', '', 'Brookeville', 'MD', '20833', 'US', '301-774-3802', '301-421-4186', 'kfoaster@glwpa.com', ''),
(252, 1, '2009-03-18 09:41:13', '', '', '', 'Mr.', 'Anthony', 'J', 'Gibson', '', 'Tony Gibson', NULL, NULL, '1700 N. Main St', '', 'Suffolk', 'VA', '23434', 'US', '757.925.1525', '757.925.6039', 'tony.gibson@vdot.virginia.gov', ''),
(253, 1, '2009-03-18 09:44:44', '', '', '', 'Mr.', 'Anthony', 'J', 'Gibson', '', 'Tony Gibson', NULL, NULL, '1700 N. Main St', '', 'Suffolk', 'VA', '23434', 'US', '757.925.1525', '757.925.6039', 'tony.gibson@vdot.virginia.gov', ''),
(254, 1, '2009-03-18 10:49:12', '', '', '', 'Mr.', 'tes', '', 'test', '', '', NULL, NULL, '', '', '', 'VA', '', 'US', '', '', 'vaplanning@comcast.net', ''),
(255, 1, '2009-03-18 12:35:48', '', '', '', 'Ms.', 'Caroline', 'H', 'Ellis', '', 'Caroline', NULL, NULL, '2900 S. Quincy St.', 'Suite 200', 'Arlington', 'VA', '22206', 'US', '703-253-5843', '', 'cellis@hntb.com', 'care.ellis@gmail.com'),
(256, 1, '2009-03-18 15:09:32', '', '', '', 'Ms.', 'Hillary', 'K', 'Zahm', '', 'Hillary', NULL, NULL, 'Tysons Corner Center', '1961 Chain Bridge Road, Suite 105', 'McLean', 'VA', '22102', 'US', '(703) 847-7323', '', 'hillary.zahm@macerich.com', 'hillzahm@gmail.com'),
(257, 1, '2009-03-18 16:16:29', '', '', '', 'Mr.', 'Robert', 'E', 'Kuhns', '', 'Bob', NULL, NULL, '5510 Cherokee Avenue', 'Suite 110', 'Alexandria', 'VA', '22312', 'US', '703-256-3344', '703-256-6622', 'rkuhns@clarknexsen.com', ''),
(258, 1, '2009-03-18 16:49:37', '', '', '', 'Mrs.', 'Stephanie', 'K', 'Mertig', '', 'Stephanie Mertig', NULL, NULL, '448 Viking Drive', 'Suite 145', 'Virginia Beach', 'VA', '23452', 'US', '757-306-6703', '757-306-4001', 'stephanie.mertig@edaw.com', 'smertig@cox.net'),
(259, 1, '2009-03-18 17:09:24', '', '', '', 'Ms.', 'Mary', 'A', 'Darby', '', 'Mary Ashburn', NULL, NULL, '707 E Franklin Street, Suite C', '', 'Richmond', 'VA', '23219', 'US', '804-643-7000', '804-643-7001', 'mdarby@campbell-paris.com', ''),
(260, 1, '2009-03-18 17:16:29', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(261, 1, '2009-03-19 16:09:40', '', '', '', 'Mr.', 'Rick', '', 'Hanson', '', 'Rick Hanson', NULL, NULL, '5320 Palmer Lane', '', 'Williamsburg', 'VA', '23188', 'US', '757-259-5341', '', 'rhanson@james-city.va.us', ''),
(262, 1, '2009-03-19 17:11:38', '', '', '', 'Ms.', 'Karen', 'E', 'Firehock', '', 'Karen E. Firehock', NULL, NULL, 'GIC', '921 Second St SW', 'Charlottesville', 'VA', '22902', 'US', '434-975-6700', '434-975-6701', 'firehock@gicinc.org', 'kef8w@virginia.edu'),
(263, 1, '2009-03-20 09:05:08', '', '', '', 'Mr.', 'Matthew', '', 'Ebinger', '', 'Matthew Ebinger', NULL, NULL, '', '', '', '', '', '', '804-966-8563', '804-966-8531', 'mjebinger@co.newkent.state.va.us', ''),
(264, 1, '2009-03-20 10:17:49', '', '', '', 'Mr.', 'William', 'J', 'Cockrell', '', 'Will Cockrell', NULL, NULL, 'PO Box 1505', '401 East Water Street', 'Charlottesville', 'VA', '22902', 'US', '434-979-7310', '434-979-1597', 'wcockrell@tjpdc.org', ''),
(265, 1, '2009-03-20 10:25:16', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(266, 1, '2009-03-20 12:48:37', '', '', '', 'Mr.', 'George', 'W', 'Nester', '', 'George', NULL, NULL, 'Bedford County', '122 E Main Street, Suite G-03', 'Bedford', 'VA', '24523', 'US', '540-586-7616', '540-586-2059', 'g.nester@co.bedford.va.us', 'geonester@aol.com'),
(267, 1, '2009-03-23 09:19:55', '', '', '', 'Mr.', 'Jason', '', 'Purse', '', 'Jason', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'jpurse@james-city.va.us', ''),
(268, 1, '2009-03-23 09:22:57', '', '', '', 'Mr.', 'Jason', '', 'Purse', '', 'Jason', NULL, NULL, '101 A Mounts Bay Road', '', 'Williamsburg', 'VA', '23185', 'US', '757-253-6685', '757-253-6822', 'jpurse@james-city.va.us', ''),
(269, 1, '2009-03-23 09:27:22', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(270, 1, '2009-03-23 10:38:29', '', '', '', 'Mr.', 'Christopher', 'M', 'Price', '', 'Chris Price, AICP', NULL, NULL, 'NSVRC', '103 E. 6th St.', 'Front Royal', 'VA', '22630', 'US', '(540) 636-8800', '(540) 635-4147', 'cprice@shentel.net', ''),
(271, 1, '2009-03-23 11:11:25', '', '', '', 'Mr.', 'Andrew', 'S', 'Wilson', '', 'Andrew', NULL, NULL, '2406 Taylor Avenue', '', 'Alexandria', 'VA', '22302', 'US', '7033857830', '7033859265', 'awilson@fairfaxva.gov', ''),
(272, 1, '2009-03-24 10:31:05', '', '', '', 'Ms.', 'Shereen', '', 'Hughes', '', 'Shereen Hughes', NULL, NULL, '103 Holly Road', '', 'Williamsburg', 'VA', '23185', 'US', '', '', 'sshues@verizon.net', ''),
(273, 1, '2009-03-24 13:52:55', '', '', '', 'Ms.', 'Michelle', '', 'Fall', '', 'Michelle Fall', NULL, NULL, '', '', '', 'VA', '', 'US', '', '', 'michelle.fall@parsons.com', 'mfall7@yahoo.com'),
(274, 1, '2009-03-24 13:55:29', '', '', '', 'Mrs.', 'Maribeth', 'B', 'Mills', '', 'Maribeth Mills', NULL, NULL, 'Noel C. Taylor Municipal Building', '215 Church Avenue SW', 'Roanoke', 'VA', '24011', 'US', '540-853-1502', '', 'maribeth.mills@roanokeva.gov', 'mbendl@hotmail.com'),
(275, 1, '2009-03-24 14:19:24', '', '', '', 'Mr.', 'Rebecca', '', 'Stewart', '', 'Rebecca', NULL, NULL, '10900 Courthouse Road', '', 'Charles City ', 'VA', '23030', 'US', '804-652-4712', '', 'rstewart@co.charles-city.va.us', ''),
(276, 1, '2009-03-24 16:04:50', '', '', '', 'Mrs.', 'Maribeth', 'B', 'Mills', '', 'Maribeth Mills', NULL, NULL, 'Noel C. Taylor Municipal Building', '215 Church Avenue SW', 'Roanoke', 'VA', '24011', 'US', '540-853-1502', '540-853-1230', 'maribeth.mills@roanokeva.gov', 'mbendl@hotmail.com'),
(277, 1, '2009-03-24 16:12:03', '', '', '', 'Mrs.', 'Maribeth', '', 'Mills', '', 'Maribeth Mills', NULL, NULL, '215 Church Avenue, SW', 'Room 166', 'Roanoke', 'VA', '24011', 'US', '(540) 853-1502', '(540) 853-1230', 'maribeth.mills@roanokeva.gov', ''),
(278, 1, '2009-03-25 11:44:56', '', '', '', 'Mr.', 'John', 'H', 'Hodges', '', 'John Hodges', NULL, NULL, 'PO Box 470', '', 'Hanover', 'VA', '23069', 'US', '804-365-6005', '804-365-6234', 'jhodges@co.hanover.va.us', 'dchenault@co.hanover.va.us'),
(279, 1, '2009-03-25 12:22:20', '', '', '', 'Ms.', 'Sara', '', 'Woolfenden', '', 'Sara Woolfenden', NULL, NULL, '', '', '', 'VA', '', 'US', '540-658-5126', '', 'swoolfenden@co.stafford.va.us', ''),
(280, 1, '2009-03-25 14:43:07', '', '', '', 'Mr.', 'John ', 'H', 'Hodges', '', 'John Hodges', NULL, NULL, 'PO Box 470', '', 'Hanover', 'VA', '23069', 'US', '804-365-6005', '804-365-6234', 'jhodges@co.hanover.va.us', 'dchenault@co.hanover.va.us'),
(281, 1, '2009-03-25 14:43:31', '', '', '', 'Mr.', 'John ', 'H', 'Hodges', '', 'John Hodges', NULL, NULL, 'PO Box 470', '', 'Hanover', 'VA', '23069', 'US', '804-365-6005', '804-365-6234', 'jhodges@co.hanover.va.us', 'dchenault@co.hanover.va.us'),
(282, 1, '2009-03-25 14:45:58', '', '', '', 'Mr.', 'John', 'H', 'Hodges', '', 'John Hodges', NULL, NULL, 'PO Box 470', '', 'Hanover', 'VA', '23069', 'US', '804-365-6005', '804-365-6234', 'jhodges@co.hanover.va.us', 'dchenault@co.hanover.va.us'),
(283, 1, '2009-03-25 14:58:28', '', '', '', 'Mr.', 'John ', 'H', 'Hodges', '', 'John Hodges', NULL, NULL, 'PO Box 470', '', 'Hanover', 'VA', '23069', 'US', '804-365-6005', '804-365-6234', 'jhodges@co.hanover.va.us', 'dchenault@co.hanover.va.us'),
(284, 1, '2009-03-25 15:04:10', '', '', '', 'Mr.', 'Geoffrey', 'H', 'Knight', '', 'Geoffrey Knight', NULL, NULL, '1900 West Main Street', '', 'Richmond', 'VA', '23220', 'US', '', '', 'knightg@vcu.edu', 'geoffrey.knight@greeningurban.com'),
(285, 1, '2009-03-25 15:15:33', '', '', '', 'Mr.', 'Hayley', 'S', 'Cohen', '', 'Hayley Cohen', NULL, NULL, '3201 Ellwood Ave.', 'Apt. D', 'Richmond', 'VA', '23221', 'US', '908-377-8836', '', 'hcohen@vcu.edu', 'hcohen@vcu.edu'),
(286, 1, '2009-03-25 15:17:15', '', '', '', 'Mr.', 'Hayley', 'S', 'Cohen', '', 'Hayley Cohen', NULL, NULL, '3201 Ellwood Ave.', 'Apt. D', 'Richmond', 'VA', '23221', 'US', '908-377-8836', '', 'cohenhs@vcu.edu', 'cohenhs@vcu.edu'),
(287, 1, '2009-03-25 15:51:29', '', '', '', 'Mr.', 'John ', 'H', 'Hodges', '', 'John Hodges', NULL, NULL, 'PO Box 470', '', 'Hanover', 'VA', '23069', 'US', '804-365-6005', '804-365-6234', 'jhodges@co.hanover.va.us', 'dchenault@co.hanover.va.us'),
(288, 1, '2009-03-25 16:13:50', '', '', '', 'Mr.', 'Mike', 'L', 'Fenner', '', 'Mike Fenner', NULL, NULL, '220 East High Street', '', 'Charlottesville', 'VA', '22902', 'US', '434-295-7131', '', 'mikefenner@thecoxcompany.biz', ''),
(289, 1, '2009-03-25 16:14:05', '', '', '', 'Mr.', 'Mike', 'L', 'Fenner', '', 'Mike Fenner', NULL, NULL, '220 East High Street', '', 'Charlottesville', 'VA', '22902', 'US', '434-295-7131', '', 'mikefenner@thecoxcompany.biz', ''),
(290, 1, '2009-03-25 16:15:03', '', '', '', 'Mr.', 'Mike', 'L', 'Fenner', '', 'Mike Fenner', NULL, NULL, '220 East High Street', '', 'Charlottesville', 'VA', '22902', 'US', '434-295-7131', '', 'mikefenner@thecoxcompany.biz', ''),
(291, 1, '2009-03-25 23:24:19', '', '', '', 'Mr.', 'test', '', 'test', '', 'testing form', NULL, NULL, 'just testing', '', 'testing', 'VA', '23465', 'US', '7575551212', '', 'testingform@app.org', ''),
(292, 1, '2009-03-25 23:25:07', '', '', '', 'Mr.', 'test', '', 'test', '', 'testing form', NULL, NULL, 'just testing', '', 'testing', 'VA', '23465', 'US', '7575551212', '', 'testingform@app.org', ''),
(293, 1, '2009-03-27 08:51:06', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(294, 1, '2009-03-27 08:51:39', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(295, 1, '2009-03-27 08:51:52', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(296, 1, '2009-03-27 08:52:09', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(297, 1, '2009-03-27 08:52:33', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(298, 1, '2009-03-27 08:53:00', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(299, 1, '2009-03-27 08:55:02', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(300, 1, '2009-03-27 08:55:59', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(301, 1, '2009-03-27 08:56:21', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '23219', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(302, 1, '2009-03-31 08:42:37', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(303, 1, '2009-03-31 08:44:03', '', '', '', 'Mr.', 'David', '', 'Sacks', '', 'David Sacks', NULL, NULL, '900 E. Main Street', '8th Floor', 'RICHMOND', 'VA', '', 'US', '804-225-3440', '804-225-3447', 'David.Sacks@dcr.virginia.gov', ''),
(304, 1, '2009-08-05 08:28:47', '', '', '', 'Mr.', 'Robert', '', 'Bolich', '', 'Rob Bolich, AICP', NULL, NULL, '324 Southport Circle', 'Suite 103', 'Virginia Beach', 'VA', '23452', 'US', '757-350-5555', '757-456-5356', 'rbolich@ene.com', 'rob.bolich@hotmail.com'),
(305, 1, '2009-08-05 10:07:19', '', '', '', 'Mr.', 'Tim', '', 'Villanueva', '', 'Tim Villanueva', NULL, NULL, '3311 Ellsworth Rd', '', 'Richmond', 'VA', '23235', 'US', '8042723256', '', 'thvill@comcast.net', 'thvill@comcast.net'),
(306, 1, '2009-08-06 13:10:27', '', '', '', 'Mr.', 'William', 'D', 'Kastning', 'Mr.', 'Bill Kastning', NULL, NULL, '13 N. Third Street', '', 'Denton/MD/21629', 'VA', '', 'US', '410 479-3625', '410 479-3435', 'wkastning@dentonmaryland.com', ''),
(307, 1, '2009-08-09 00:44:56', '', '', '', 'Mrs.', 'Jeryl', 'R', 'Phillips', '', 'Jeryl Rose Phillips, AICP', NULL, NULL, '810 Union Street', 'Suite 508', 'Norfolk', 'VA', '23510', 'US', '757-664-6771', '', 'jeryl.phillips@norfolk.gov', ''),
(308, 1, '2009-08-09 00:45:33', '', '', '', 'Mrs.', 'Jeryl', 'R', 'Phillips', '', 'Jeryl Rose Phillips, AICP', NULL, NULL, '810 Union Street', 'Suite 508', 'Norfolk', 'VA', '23510', 'US', '757-664-6771', '', 'jeryl.phillips@norfolk.gov', ''),
(309, 1, '2009-08-09 00:46:27', '', '', '', 'Mrs.', 'Jeryl', 'R', 'Phillips', '', 'Jeryl Rose Phillips, AICP', NULL, NULL, '810 Union Street', 'Suite 508', 'Norfolk', 'VA', '23510', 'US', '757-664-6771', '', 'jeryl.phillips@norfolk.gov', ''),
(310, 1, '2009-08-09 00:52:34', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(311, 1, '2009-08-10 08:50:35', '', '', '', 'Ms.', 'Mayra', 'R', 'Nickerson', '', 'Mayra Nickerson', NULL, NULL, '14108 Shallowford Landing Ct', '', 'Midlothian', 'VA', '23112', 'US', '(804) 539-3669 cell', '(804) 355-6407', 'mnickerson@telamon.org', 'mrn@forwardpass.com'),
(312, 1, '2009-08-10 10:38:51', '', '', '', 'Mr.', 'Kenneth', 'W', 'Poore', '', 'Ken', NULL, NULL, '2201 W. Broad St. Suite 204', '', 'Richmond', 'VA', '23220', 'US', '804-204-1022', '804-204-1024', 'kpoore@kwpoore.com', ''),
(313, 1, '2009-08-10 10:48:48', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(314, 1, '2009-08-10 10:49:04', '', '', '', 'Mr.', 'Kenneth', 'W', 'Poore', '', 'Ken', NULL, NULL, '2201 W. Broad St. Suite 204', '', 'Richmond', 'VA', '23220', 'US', '(804) 204-1022', '804-204-1024', 'kpoore@kwpoore.com', ''),
(315, 1, '2009-08-10 13:50:56', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(316, 1, '2009-08-11 11:06:43', '', '', '', 'Mr.', 'James', 'E', 'Tolbert', '', 'Jim', NULL, NULL, 'P. O. Box 911', '610 East Market Street', 'Charlottesville', 'VA', '22902', 'US', '434-970-3182', '434-970-3359', 'tolbertj@charlottesville.org', 'pattersn@charlottesville.org'),
(317, 1, '2009-08-14 16:59:02', '', '', '', 'Ms.', 'Sarah', 'V', 'Eckstein', '', 'Sarah', NULL, NULL, 'Community Affairs/24th Floor', 'P O Box 27622', 'Richmond', 'VA', '23261', 'US', '804-697-2782', '804-697-8473', 'sarah.eckstein@rich.frb.org', 'deborah.jackson@rich.frb.org'),
(318, 1, '2009-08-14 17:05:32', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(319, 1, '2009-08-18 12:30:21', '', '', '', 'Ms.', 'Danielle', '', 'Arigoni', '', 'Danielle', NULL, NULL, '1300 Pennsylvania Ave. NW MC 1807T', '', 'Washington', 'DC', '20460', 'US', '202-566-2859', '202-566-2868', 'arigoni.danielle@epa.gov', 'danarigoni@yahoo.com'),
(320, 1, '2009-08-18 14:38:45', '', '', '', 'Ms.', 'Sarah', 'V', 'Eckstein', '', 'Sarah', NULL, NULL, 'Community Affairs/24th Floor', 'P O Box 27622', 'Richmond', 'VA', '23261', 'US', '804-697-2782', '804-697-8473', 'sarah.eckstein@rich.frb.org', 'deborah.jackson@rich.frb.org'),
(321, 1, '2009-08-18 21:36:02', '', '', '', 'Mr.', 'Kenneth', 'A', 'Shannon', '', 'Ken', NULL, NULL, '152 Old Carriage Way', '', 'Williamsburg', 'VA', '23188', 'US', '7575093000', '', 'shannon2830@cox.net', ''),
(322, 1, '2009-08-19 10:15:08', '', '', '', 'Ms.', 'Lynn', 'E', 'Everett', '', 'Lynn Everett', NULL, NULL, '4350 N. Fairfax Drive, Suite 720', '', 'Arlington', 'VA', '22203', 'US', '703-524-3322', '703-524-1756', 'lynn@nvtdc.org', 'floridalynn@att.net'),
(323, 1, '2009-08-19 11:49:30', '', '', '', 'Ms.', 'Cynthia', 'S', 'Taylor', '', 'Cindy Taylor', NULL, NULL, '103 Watch Harbour Circle', '', 'Smithfield', 'VA', '23430', 'US', '(757) 514-4071', '(757) 539-7693', 'ctaylor@city.suffolk.va.us', 'firstmate49@charter.net'),
(324, 1, '2009-08-19 12:09:47', '', '', '', 'Mr.', 'Philip', 'T', 'Jones', '', 'Philip Tenley Jones', NULL, NULL, '8401 Greensboro Drive,', 'Suite 300', 'McLean', 'VA', '22102', 'US', '703 821 2500 x 231', '', 'pjones@millerandsmith.com', ''),
(325, 1, '2009-08-19 13:49:46', '', '', '', 'Mr.', 'Barry', 'F', 'Griffith', '', 'Barry Griffith', NULL, NULL, '117 BAY STREET', '', 'EASTON', 'MD', '21601', 'US', '410-822-8003', '410-822-2024', 'bgriffith@leinc.com', 'griffith@atlanticbb.net'),
(326, 1, '2009-08-24 11:07:35', '', '', '', 'Mr.', 'James', 'C', 'Sullivan', 'Jr.', 'Jim Sullivan', NULL, NULL, '89 Kings Highway', 'Div. of Soil & Water Conservation', 'Dover', 'DE', '19901', 'US', '13027399921', '13027396724', 'james.sullivan@state.de.us', ''),
(327, 1, '2009-08-27 10:29:54', '', '', '', 'Mrs.', 'Jeryl', 'R', 'Phillips', '', 'Jeryl R. Phillips, AICP', NULL, NULL, '810 Union Street', '', 'Norfolk', 'VA', '23510', 'US', '7576646771', '', 'jeryl.phillips@norfolk.gov', ''),
(328, 1, '2009-08-27 15:06:43', '', '', '', 'Mr.', 'Timothy ', 'M', 'Bourcier', '', 'Tim Bourcier, AICP', NULL, NULL, 'One Plaza East; Suite 200', '', 'Salisbury', 'VA', '21801', 'US', '4105439091', '4109120713', 'tmb@dbfinc.com', 'tmb@dbfinc.com'),
(329, 1, '2009-08-27 15:22:38', '', '', '', 'Mr.', 'Dave', 'e', 'Wilson', 'Jr.', 'Dave Wilson', NULL, NULL, '9919 Stephen Decatur Hwy', 'Suite 4', 'Ocean City', 'MD', '21842', 'US', '410-213-2297', '410-213-2574', 'dwilson@mdcoastalbays.org', ''),
(330, 1, '2009-08-27 15:33:45', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(331, 1, '2009-08-27 16:18:18', '', '', '', 'Mrs.', 'Jeryl', 'R', 'Phillips', '', 'Jeryl R. Phillips, AICP', NULL, NULL, '810 Union Street', 'Suite 508', 'Norfolk', 'VA', '23505', 'US', '757-664-6771', '', 'jeryl.phillips@norfolk.gov', ''),
(332, 1, '2009-08-27 18:39:05', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(333, 1, '2009-08-28 16:52:33', '', '', '', 'Ms.', 'Ursula', 'M', 'Lemanski', '', 'Ursula', NULL, NULL, '633 Tammy Tarrace', '', 'Leesburg', 'VA', '20175', 'US', '703-431-7728', '', 'ursula_lemanski@nps.gov', ''),
(334, 1, '2009-08-31 13:45:20', '', '', '', 'Mr.', 'Paul', 'F', 'Berge', '', 'Paul', NULL, NULL, '31144 Bunting Point Road', '', 'Melfa', 'VA', '23410', 'US', '757-787-3844', '', 'eulaland@verizon.net', ''),
(335, 1, '2009-09-02 18:03:17', '', '', '', 'Ms.', 'Carol', 'A', 'Truppi', '', 'Carol Truppi', NULL, NULL, '6006 Anniston Road', '', 'Bethesda', 'MD', '20817', 'US', '301.325.6708', '', 'carrick6006@starpower.net', 'carol.truppi@gmail.com'),
(336, 1, '2009-09-03 07:55:55', '', '', '', 'Mr.', 'Craig', '', 'Goodwin', '', 'CRAIG', NULL, NULL, 'P. O. Box 73399', '', 'Puyallup', 'WA', '98373', 'US', '800-444-2371', '253-848-2545', 'craig@nwcascade.com', ''),
(337, 1, '2009-09-03 14:19:40', '', '', '', 'Mr.', 'mark', '', 'gionet', '', 'mark gionet', NULL, NULL, '1919 Gallows Road', 'Suite 110', 'Vienna', 'VA', '22182', 'US', '703-821-2045', '', 'mgionet@lsginc.com', ''),
(338, 1, '2009-09-03 14:30:01', '', '', '', 'Ms.', 'Patricia', '', 'Tyson', '', 'Tish Tyson', NULL, NULL, '810 Vermont Avenue, NW ', '', 'Washington', 'DC', '20420', 'US', '703-216-9492', '', 't_Tyson@mindspring.com', ''),
(339, 1, '2009-09-04 07:55:11', '', '', '', 'Mr.', 'Matthew', 'J', 'Fitzsimmons', '', 'Matthew', NULL, NULL, '750 E Pratt Street', 'Suite 1100', 'Baltimore', 'VA', '', 'US', '410.837.7311', '', 'mfitzsimmons@hcm2.com', 'm_fitzsimmons@hotmail.com'),
(340, 1, '2009-09-08 17:45:30', '', '', '', 'Dr.', 'Diane', 'L', 'Zahm', '', 'Diane Zahm', NULL, NULL, '218 Woods Edge Court', '', 'Blacksburg', 'VA', '24060', 'US', '540-552-8268', '540-231-3367', 'dzahm@vt.edu', ''),
(341, 1, '2009-09-09 10:24:30', '', '', '', 'Mr.', 'Eric', 'W', 'Tiso', '', 'Eric Tiso', NULL, NULL, '417 East Fayette Street, 8th floor', '', 'Baltimore', 'MD', '21202-3416', 'US', '410-396-8358', '410-244-7358', 'eric.tiso@baltimorecity.gov', ''),
(342, 1, '2009-09-09 10:32:48', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(343, 1, '2009-09-09 12:44:03', '', '', '', 'Mr.', 'Mark', 'W', 'Eisner', '', 'Mark Eisner', NULL, NULL, '7540 Main Street', 'Suite 7', 'Sykesville', 'MD', '21784', 'US', '410-795-4626', '410-795-4611', 'meisner@alwi.com', ''),
(344, 1, '2009-09-09 13:36:17', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(345, 1, '2009-09-10 09:17:44', '', '', '', 'Mr.', 'Christopher', 'N', 'Jakubiak', '', 'Chris', NULL, NULL, '1410 Forest Drive', 'Suite 23', 'Annapolis', 'MD', '21403', 'US', '410-263-7776', '410-263-4431', 'cj@jakubiak.net', ''),
(346, 1, '2009-09-10 09:18:22', '', '', '', 'Mr.', 'Christopher', 'N', 'Jakubiak', '', 'Chris', NULL, NULL, '1410 Forest Drive', 'Suite 23', 'Annapolis', 'MD', '21403', 'US', '410-263-7776', '410-263-4431', 'cj@jakubiak.net', ''),
(347, 1, '2009-09-11 10:40:53', '', '', '', 'Mrs.', 'Lisa', '', 'Feibelman', '', 'Lisa Feibelman', NULL, NULL, '1900 Toyon Way', '', 'Vienna', 'VA', '22182', 'US', '703-324-1247', '', 'Lisa.Feibelman@fairfaxcountygov.', ''),
(348, 1, '2009-09-11 12:29:46', '', '', '', 'Mr.', 'john', 'd', 'hutchinson', 'V', 'John Hutchinson', NULL, NULL, '118 Madison Place', '', 'staunton', 'VA', '24401', 'US', '5402920396', '5408872325', 'johnhutchinson@jenningsgap.com', ''),
(349, 1, '2009-09-14 12:47:05', '', '', '', 'Mr.', 'John', 'F', 'Lenox', 'AICP', 'Jack', NULL, NULL, '8984 Executive Club Drive', '', 'Delmar', 'MD', '21875', 'US', '410-548-4860', '410-548-4955 ', 'JLenox@Wicomicocounty.org', ''),
(350, 1, '2009-09-16 13:32:44', '', '', '', 'Mr.', 'Michael', 'E', 'Perry', 'ASLA,', 'Mike Perry', NULL, NULL, '5033 Rouse Drive', '', 'Virginia Beach', 'VA', '23462', 'US', '7574909264', '7574900634', 'mike_perry@msaonline.com', 'janell_dixon@msaonline.com'),
(351, 1, '2009-09-16 13:37:40', '', '', '', 'Mr.', 'Michael', 'E', 'Perry', 'ASLA,', 'Mike Perry', NULL, NULL, '5033 Rouse Drive', '', 'Virginia Beach', 'VA', '23462', 'US', '7574909264', '7574900634', 'mike_perry@msaonline.com', 'janell_dixon@msaonline.com'),
(352, 1, '2009-09-16 13:45:52', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(353, 1, '2009-09-18 11:17:38', '', '', '', 'Mr.', 'Colin', '', 'Vissering', '', 'Colin Vissering', NULL, NULL, '6709 Newbold Drive', '', 'Bethesda', 'MD', '20817', 'US', '3015125685', '', 'cvissering@visseringpardue.com', 'cvissering@visseringpardue.com'),
(354, 1, '2009-09-18 11:22:39', '', '', '', 'Mr.', 'Steve', '', 'Pardue', '', 'Steve Pardue', NULL, NULL, '3458 Tyler Drive', '', 'Ellicott City', 'MD', '21042', 'US', '4107461487', '4107461487', 'spardue@visseringpardue.com', 'spardue@visseringpardue.com'),
(355, 1, '2009-09-18 11:34:23', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(356, 1, '2009-09-22 14:06:52', '', '', '', 'Mr.', 'Jeremy', 'L', 'Sewall', '', 'Jeremy', NULL, NULL, '2021 Nordlie Pl', '', 'Falls Church', 'VA', '22043', 'US', '703-635-4392', '', 'jeremysewall@gmail.com', 'jlsewall@vt.edu'),
(357, 1, '2009-09-23 11:42:51', '', '', '', 'Mrs.', 'Barbara', '', 'Duke', '', 'Barbara Duke', NULL, NULL, '516 Crosby Road', '', 'Virginia Beach', 'VA', '23452', 'US', '757-286-1807', '', 'bduke@vbgov.com', ''),
(358, 1, '2009-09-23 18:37:38', '', '', '', 'Ms.', 'Laura', '', 'McKay', '', 'Laura McKay', NULL, NULL, '629 E. Main Street', '', 'Richmond', 'VA', '23219', 'US', '804 698-4323', '804 698-4319', 'laura.mckay@deq.virginia.gov', ''),
(359, 1, '2009-09-23 18:38:45', '', '', '', 'Ms.', 'Laura', '', 'McKay', '', 'Laura McKay', NULL, NULL, '629 E. Main Street', '', 'Richmond', 'VA', '23219', 'US', '804 698-4323', '804 698-4319', 'laura.mckay@deq.virginia.gov', 'Speaker Rate - $0'),
(360, 1, '2009-09-23 18:47:37', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(361, 1, '2009-09-24 09:38:19', '', '', '', 'Mrs.', 'Faith ', 'M', 'Christie', '', 'Faith Chrisite', NULL, NULL, '2405 Courthouse Dr', '', 'Va. Beach', 'VA', '23456', 'US', '757-385-6379', '757-385-5667', 'fchristi@vbgov.com', ''),
(362, 1, '2009-09-24 11:13:45', '', '', '', 'Mr.', 'Tom', '', 'Bonadeo', '', 'Tom Bonadeo', NULL, NULL, '2 Plum Street', '', 'Cape Charles', 'VA', '23310', 'US', '757-331-3259', '757-331-4820', 'planner@capecharles.org', 'tom@bonadeo.net'),
(363, 1, '2009-09-24 13:36:45', '', '', '', 'Mr.', 'Miguel', '', 'Iraola', '', 'Miguel', NULL, NULL, '750 E. Pratt Street', 'Suite 1100', 'Baltimore', 'md', '21202', 'US', '410-837-7311', '410-837-6530', 'miraola@hcm2.com', 'pbiagi@hcm2.com'),
(364, 1, '2009-09-24 13:37:29', '', '', '', 'Mr.', 'Miguel', '', 'Iraola', '', 'Miguel', NULL, NULL, '750 E. Pratt Street', 'Suite 1100', 'Baltimore', 'md', '21202', 'US', '410-837-7311', '410-837-6530', 'miraola@hcm2.com', 'pbiagi@hcm2.com'),
(365, 1, '2009-09-24 15:55:45', '', '', '', 'Ms.', 'Laura', '', 'McKay', '', 'Laura McKay', NULL, NULL, '629 East Main Street', '', 'Richmond', 'VA', '23219', 'US', '804 698-4323', '804 698-4319', 'laura.mckay@deq.virginia.gov', ''),
(366, 1, '2009-09-25 15:47:33', '', '', '', 'Mr.', 'Chad', 'M', 'Adkins', '', 'Chad M Adkins, AICP', NULL, NULL, '448 Viking Drive', '', 'Virginia Beach', 'VA', '23462', 'US', '757-306-6701', '757-306-6704', 'chad.adkins@aecom.com', ''),
(367, 1, '2009-09-25 15:49:02', '', '', '', 'Mr.', 'Chad', 'M', 'Adkins', '', 'Chad M Adkins, AICP', NULL, NULL, '448 Viking Drive', '', 'Virginia Beach', 'VA', '23452', 'US', '757-306-6701', '757-306-6704', 'chad.adkins@aecom.com', ''),
(368, 1, '2009-09-25 15:57:49', '', '', '', 'Mr.', 'Correy', 'W', 'Dietz', '', 'Correy Dietz', NULL, NULL, '448 Viking Drive', 'Suite 145', 'Virginia Beach', 'VA', '23452', 'US', '7573066702', '', 'correy.dietz@aecom.com', ''),
(369, 1, '2009-09-30 08:12:32', '', '', '', 'Mr.', 'Wallace', 'S', 'Lippincott, Jr.', '', 'Wally Lippincott, Jr.', NULL, NULL, '246 Gaywood Road', '', 'Baltimore', 'MD', '21212', 'US', '410-377-7918', '', 'wlippincott@baltimorecountymd.gov', ''),
(370, 1, '2009-09-30 08:37:35', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(371, 1, '2009-09-30 16:03:06', '', '', '', 'Mr.', 'William', 'W', 'Neville', '', 'Bill Neville', NULL, NULL, '10211 Ruffian Lane', '', 'Berlin', 'MD', '21811', 'US', '4436690852', '', 'wwneville@comcast.net', ''),
(372, 1, '2009-09-30 16:09:11', '', '', '', 'Ms.', 'Sandra', '', 'Benson', '', 'Sandra', NULL, NULL, 'P. O. Box 1196', '', 'Eastville', 'VA', '23347', 'US', '757-678-0443 x522', '757-678-0483', 'sbenson@co.northampton.va.us', 's3benson@verizon.net'),
(373, 1, '2009-09-30 16:29:20', '', '', '', 'Ms.', 'Katheleen', '', 'Freeman', '', 'Katheleen Freeman', NULL, NULL, '403 S. 7th Street,Suite 210', '', 'Denton', 'MD', '21629', 'US', '410-479-8100', '410-479-4187', 'kfreeman@co.caroline.md.us', ''),
(374, 1, '2009-10-01 10:18:58', '', '', '', 'Mr.', 'Kyle ', 'F', 'Gulbronson', '', 'Kyle Gulbronson', NULL, NULL, '28485 DuPont Blvd.', '', 'Millsboro', 'DE', '19966', 'US', '302-933-0200', '302-933-0320', 'kyle_gulbronson@urscorp.com', ''),
(375, 1, '2009-10-02 11:14:27', '', '', '', 'Mr.', 'Tony', '', 'Redman', '', 'Tony Redman', NULL, NULL, '28485 DuPont Blvd.', '', 'Millsboro', 'DE', '19966', 'US', '302-933-0200', '302-933-0320', 'tony_Redman@urscorp.com', ''),
(376, 1, '2009-10-07 10:34:56', '', '', '', 'Mr.', 'Betsy', '', 'Walk', '', '', NULL, NULL, '', '', '', 'VA', '', 'US', '', '', 'bwalk@co.caroline.md.us', ''),
(377, 1, '2009-10-13 09:23:40', '', '', '', 'Ms.', 'Stacy', 'J', 'Porter', '', 'Stacy Porter', NULL, NULL, '801 Crawford Street', '', 'Portsmouth', 'VA', '', 'US', '757 393-8836', '757 393-5223', 'humphreyr@portsmouthva.gov', ''),
(378, 1, '2009-10-13 14:55:52', '', '', '', 'Mr.', 'Erik', '', 'Fisher', '', '', NULL, NULL, '', '', '', 'MD', '', 'US', '', '', 'efisher@cbf.org', ''),
(379, 1, '2009-10-13 15:01:21', '', '', '', '', '', '', '', '', '', NULL, NULL, '', '', '', '', '', '', '', '', '', ''),
(380, 1, '2009-10-13 17:11:36', '', '', '', 'Mr.', 'Curtis', '', 'Smith', '', 'Curt Smith', NULL, NULL, 'P.O. Box 417', '', 'Accomac', 'VA', '23301', 'US', '757 787 2936', '757 787 4221', 'csmith@a-npdc.org', 'lmason@a-npdc.org'),
(381, 1, '2009-10-13 17:18:13', '', '', '', 'Mrs.', 'Elaine', 'N', 'Meil', '', 'Elaine Meil', NULL, NULL, 'P.O. Box 417', '', 'Accomac', 'VA', '23301', 'US', '757-787-2936', '757-787-4221', 'emeil@a-npdc.org', 'lmason@a-npdc.org');

-- --------------------------------------------------------

--
-- Table structure for table `user_ceu_mapping`
--

CREATE TABLE IF NOT EXISTS `user_ceu_mapping` (
  `ceu_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  KEY `ceu_id` (`ceu_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_ceu_mapping`
--


-- --------------------------------------------------------

--
-- Table structure for table `user_registration_mapping`
--

CREATE TABLE IF NOT EXISTS `user_registration_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `registration_option_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `payment_status` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `registration_option_id` (`registration_option_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=323 ;

--
-- Dumping data for table `user_registration_mapping`
--

INSERT INTO `user_registration_mapping` (`id`, `site_id`, `registration_option_id`, `user_id`, `registered_date`, `payment_status`) VALUES
(1, 1, 1, 1, '2009-02-10 11:05:59', 'paid'),
(2, 1, 1, 2, '2009-02-10 11:47:32', 'unpaid'),
(3, 1, 1, 3, '2009-02-10 11:58:34', 'unpaid'),
(4, 1, 1, 4, '2009-02-10 12:00:17', 'unpaid'),
(5, 1, 1, 5, '2009-02-10 12:02:56', 'unpaid'),
(6, 1, 7, 6, '2009-02-10 12:23:52', 'unpaid'),
(7, 1, 1, 7, '2009-02-10 15:46:39', 'unpaid'),
(8, 1, 21, 8, '2009-02-10 17:16:48', 'unpaid'),
(9, 1, 1, 9, '2009-02-11 08:52:18', 'paid'),
(10, 1, 1, 10, '2009-02-11 09:51:15', 'paid'),
(11, 1, 1, 11, '2009-02-11 10:29:49', 'paid'),
(12, 1, 1, 12, '2009-02-11 10:48:35', 'paid'),
(13, 1, 1, 13, '2009-02-11 12:19:38', 'paid'),
(14, 1, 1, 14, '2009-02-11 12:46:12', 'unpaid'),
(15, 1, 1, 15, '2009-02-11 13:34:19', 'unpaid'),
(16, 1, 1, 16, '2009-02-11 13:34:28', 'paid'),
(17, 1, 5, 17, '2009-02-11 15:33:43', 'paid'),
(18, 1, 1, 19, '2009-02-11 19:01:14', 'paid'),
(19, 1, 1, 20, '2009-02-12 11:42:29', 'paid'),
(20, 1, 1, 21, '2009-02-12 12:30:52', 'unpaid'),
(21, 1, 1, 22, '2009-02-12 12:32:08', 'paid'),
(22, 1, 1, 23, '2009-02-12 16:02:54', 'paid'),
(23, 1, 1, 24, '2009-02-12 16:48:32', 'paid'),
(24, 1, 1, 25, '2009-02-13 13:58:17', 'paid'),
(25, 1, 19, 26, '2009-02-13 19:15:48', 'paid'),
(26, 1, 1, 27, '2009-02-16 09:27:28', 'paid'),
(27, 1, 19, 28, '2009-02-17 08:00:20', 'paid'),
(28, 1, 1, 29, '2009-02-17 08:50:34', 'paid'),
(29, 1, 1, 31, '2009-02-17 14:51:02', 'paid'),
(30, 1, 1, 33, '2009-02-17 17:58:12', 'paid'),
(31, 1, 1, 34, '2009-02-18 09:18:20', 'paid'),
(32, 1, 1, 35, '2009-02-18 10:05:44', 'paid'),
(33, 1, 1, 36, '2009-02-18 11:31:19', 'paid'),
(34, 1, 1, 38, '2009-02-18 12:41:18', 'paid'),
(35, 1, 1, 39, '2009-02-18 13:22:03', 'paid'),
(36, 1, 2, 40, '2009-02-18 14:36:28', 'unpaid'),
(37, 1, 5, 41, '2009-02-19 09:13:16', 'paid'),
(38, 1, 2, 42, '2009-02-20 11:59:24', 'paid'),
(39, 1, 1, 43, '2009-02-20 14:56:19', 'paid'),
(40, 1, 19, 44, '2009-02-20 15:31:44', 'paid'),
(41, 1, 1, 45, '2009-02-20 16:15:05', 'paid'),
(42, 1, 1, 47, '2009-02-22 15:53:20', 'paid'),
(43, 1, 1, 48, '2009-02-23 09:06:03', 'paid'),
(44, 1, 7, 49, '2009-02-23 11:34:44', 'paid'),
(45, 1, 1, 51, '2009-02-23 11:43:54', 'paid'),
(46, 1, 1, 52, '2009-02-23 11:49:52', 'paid'),
(47, 1, 1, 53, '2009-02-23 13:05:18', 'paid'),
(48, 1, 1, 54, '2009-02-23 14:40:54', 'unpaid'),
(49, 1, 1, 56, '2009-02-23 15:26:49', 'unpaid'),
(50, 1, 1, 57, '2009-02-23 15:35:34', 'unpaid'),
(51, 1, 1, 58, '2009-02-23 16:25:59', 'unpaid'),
(52, 1, 2, 60, '2009-02-24 08:30:44', 'unpaid'),
(53, 1, 2, 61, '2009-02-24 09:07:19', 'paid'),
(54, 1, 1, 62, '2009-02-24 09:42:27', 'unpaid'),
(55, 1, 1, 63, '2009-02-24 09:52:43', 'paid'),
(56, 1, 1, 64, '2009-02-24 12:40:52', 'paid'),
(57, 1, 1, 65, '2009-02-24 14:04:24', 'paid'),
(58, 1, 1, 66, '2009-02-24 14:57:10', 'paid'),
(59, 1, 21, 67, '2009-02-24 16:18:05', 'unpaid'),
(60, 1, 19, 68, '2009-02-24 17:05:46', 'paid'),
(61, 1, 1, 69, '2009-02-25 08:43:32', 'paid'),
(62, 1, 1, 70, '2009-02-25 10:59:44', 'paid'),
(63, 1, 1, 71, '2009-02-25 11:20:51', 'paid'),
(64, 1, 1, 72, '2009-02-25 11:53:30', 'paid'),
(65, 1, 2, 73, '2009-02-25 13:31:07', 'paid'),
(66, 1, 1, 74, '2009-02-25 15:07:24', 'paid'),
(67, 1, 21, 75, '2009-02-25 15:38:41', 'paid'),
(68, 1, 1, 76, '2009-02-25 16:51:45', 'unpaid'),
(69, 1, 1, 77, '2009-02-25 17:14:04', 'paid'),
(70, 1, 1, 78, '2009-02-26 06:58:22', 'paid'),
(71, 1, 1, 80, '2009-02-26 08:27:21', 'paid'),
(72, 1, 1, 81, '2009-02-26 09:17:30', 'paid'),
(73, 1, 1, 83, '2009-02-26 14:23:58', 'paid'),
(74, 1, 1, 84, '2009-02-26 16:25:04', 'paid'),
(75, 1, 1, 85, '2009-02-26 23:42:38', 'unpaid'),
(76, 1, 1, 86, '2009-02-26 23:47:07', 'paid'),
(77, 1, 1, 87, '2009-02-27 08:27:49', 'paid'),
(78, 1, 1, 88, '2009-02-27 08:41:06', 'unpaid'),
(79, 1, 1, 89, '2009-02-27 09:08:52', 'paid'),
(80, 1, 1, 90, '2009-02-27 09:15:33', 'paid'),
(81, 1, 1, 91, '2009-02-27 09:26:04', 'paid'),
(82, 1, 1, 92, '2009-02-27 10:50:10', 'paid'),
(83, 1, 1, 93, '2009-02-28 16:05:15', 'paid'),
(84, 1, 1, 94, '2009-02-28 20:22:41', 'paid'),
(85, 1, 1, 95, '2009-03-01 21:28:08', 'paid'),
(86, 1, 3, 96, '2009-03-02 08:46:06', 'paid'),
(87, 1, 5, 97, '2009-03-02 10:17:46', 'paid'),
(88, 1, 1, 98, '2009-03-02 10:40:45', 'paid'),
(89, 1, 2, 99, '2009-03-02 11:14:06', 'unpaid'),
(90, 1, 19, 100, '2009-03-02 12:11:20', 'paid'),
(91, 1, 1, 101, '2009-03-02 13:44:45', 'paid'),
(92, 1, 5, 102, '2009-03-02 14:18:46', 'unpaid'),
(93, 1, 1, 103, '2009-03-02 14:44:37', 'paid'),
(94, 1, 1, 104, '2009-03-02 14:52:18', 'paid'),
(95, 1, 1, 105, '2009-03-02 14:59:25', 'paid'),
(96, 1, 19, 106, '2009-03-02 15:30:07', 'paid'),
(97, 1, 1, 108, '2009-03-02 15:40:04', 'paid'),
(98, 1, 3, 109, '2009-03-02 16:12:10', 'unpaid'),
(99, 1, 1, 110, '2009-03-02 16:31:34', 'paid'),
(100, 1, 1, 111, '2009-03-02 17:39:13', 'paid'),
(101, 1, 5, 113, '2009-03-03 09:00:33', 'paid'),
(102, 1, 5, 114, '2009-03-03 09:05:23', 'paid'),
(103, 1, 2, 115, '2009-03-03 09:50:09', 'unpaid'),
(104, 1, 2, 116, '2009-03-03 10:01:01', 'paid'),
(105, 1, 2, 117, '2009-03-03 10:07:31', 'paid'),
(106, 1, 1, 118, '2009-03-03 10:13:16', 'unpaid'),
(107, 1, 1, 119, '2009-03-03 10:20:11', 'paid'),
(108, 1, 1, 120, '2009-03-03 10:35:40', 'unpaid'),
(109, 1, 1, 121, '2009-03-03 10:43:23', 'paid'),
(110, 1, 1, 122, '2009-03-03 10:49:55', 'paid'),
(111, 1, 1, 123, '2009-03-03 10:51:07', 'paid'),
(112, 1, 1, 124, '2009-03-03 11:01:43', 'paid'),
(113, 1, 2, 125, '2009-03-03 11:03:51', 'paid'),
(114, 1, 1, 126, '2009-03-03 11:54:07', 'paid'),
(115, 1, 1, 127, '2009-03-03 12:01:00', 'paid'),
(116, 1, 20, 128, '2009-03-03 13:06:23', 'unpaid'),
(117, 1, 1, 129, '2009-03-03 14:32:02', 'paid'),
(118, 1, 1, 130, '2009-03-03 14:47:39', 'paid'),
(119, 1, 1, 131, '2009-03-03 14:56:30', 'unpaid'),
(120, 1, 19, 132, '2009-03-03 15:57:19', 'paid'),
(121, 1, 1, 133, '2009-03-03 16:11:47', 'paid'),
(122, 1, 5, 134, '2009-03-03 16:22:34', 'paid'),
(123, 1, 5, 135, '2009-03-03 17:24:41', 'paid'),
(124, 1, 1, 136, '2009-03-04 09:08:52', 'paid'),
(125, 1, 1, 137, '2009-03-04 09:12:16', 'paid'),
(126, 1, 2, 138, '2009-03-04 10:00:58', 'paid'),
(127, 1, 20, 139, '2009-03-04 11:02:46', 'paid'),
(128, 1, 1, 140, '2009-03-04 11:16:53', 'paid'),
(129, 1, 1, 141, '2009-03-04 11:18:18', 'paid'),
(130, 1, 1, 142, '2009-03-04 11:53:50', 'paid'),
(131, 1, 1, 143, '2009-03-04 11:59:01', 'paid'),
(132, 1, 19, 144, '2009-03-04 13:00:16', 'paid'),
(133, 1, 3, 145, '2009-03-04 14:33:31', 'paid'),
(134, 1, 5, 146, '2009-03-04 15:19:30', 'paid'),
(135, 1, 5, 147, '2009-03-04 16:58:13', 'paid'),
(136, 1, 4, 148, '2009-03-04 17:04:48', 'paid'),
(137, 1, 19, 149, '2009-03-04 17:15:01', 'paid'),
(138, 1, 1, 150, '2009-03-04 17:15:50', 'paid'),
(139, 1, 1, 151, '2009-03-04 18:51:53', 'paid'),
(140, 1, 1, 152, '2009-03-05 08:47:35', 'paid'),
(141, 1, 3, 153, '2009-03-05 09:03:21', 'paid'),
(142, 1, 7, 154, '2009-03-05 09:46:01', 'paid'),
(143, 1, 1, 155, '2009-03-05 09:55:47', 'paid'),
(144, 1, 4, 156, '2009-03-05 09:59:40', 'paid'),
(145, 1, 1, 157, '2009-03-05 10:03:01', 'paid'),
(146, 1, 19, 158, '2009-03-05 10:44:11', 'paid'),
(147, 1, 2, 159, '2009-03-05 10:50:01', 'unpaid'),
(148, 1, 1, 160, '2009-03-05 11:33:00', 'paid'),
(149, 1, 5, 161, '2009-03-05 11:33:13', 'unpaid'),
(150, 1, 1, 162, '2009-03-05 13:50:51', 'paid'),
(151, 1, 1, 163, '2009-03-05 15:51:03', 'paid'),
(152, 1, 1, 164, '2009-03-05 16:29:40', 'paid'),
(153, 1, 1, 165, '2009-03-06 09:14:20', 'paid'),
(154, 1, 5, 166, '2009-03-06 09:17:09', 'unpaid'),
(155, 1, 5, 167, '2009-03-06 10:30:00', 'paid'),
(156, 1, 3, 168, '2009-03-06 10:39:41', 'paid'),
(157, 1, 5, 169, '2009-03-06 10:56:38', 'paid'),
(158, 1, 1, 170, '2009-03-06 10:59:43', 'paid'),
(159, 1, 1, 171, '2009-03-06 12:18:44', 'paid'),
(160, 1, 1, 172, '2009-03-06 14:16:24', 'paid'),
(161, 1, 5, 173, '2009-03-06 14:44:30', 'paid'),
(162, 1, 1, 174, '2009-03-06 15:01:03', 'paid'),
(163, 1, 5, 175, '2009-03-06 15:30:46', 'paid'),
(164, 1, 1, 176, '2009-03-06 15:34:31', 'paid'),
(165, 1, 4, 177, '2009-03-06 15:58:33', 'paid'),
(166, 1, 1, 178, '2009-03-06 16:10:18', 'paid'),
(167, 1, 5, 179, '2009-03-09 10:07:15', 'paid'),
(168, 1, 1, 180, '2009-03-09 10:50:18', 'paid'),
(169, 1, 4, 181, '2009-03-09 11:07:37', 'paid'),
(170, 1, 1, 182, '2009-03-09 11:25:18', 'paid'),
(171, 1, 2, 183, '2009-03-09 11:37:37', 'paid'),
(172, 1, 19, 185, '2009-03-09 11:45:47', 'unpaid'),
(173, 1, 1, 186, '2009-03-09 12:07:30', 'paid'),
(174, 1, 1, 187, '2009-03-09 12:59:06', 'paid'),
(175, 1, 5, 188, '2009-03-09 13:38:12', 'paid'),
(176, 1, 5, 189, '2009-03-09 13:55:09', 'paid'),
(177, 1, 5, 190, '2009-03-09 14:00:37', 'paid'),
(178, 1, 1, 191, '2009-03-09 14:23:15', 'paid'),
(179, 1, 5, 192, '2009-03-09 14:23:57', 'unpaid'),
(180, 1, 5, 193, '2009-03-09 14:25:30', 'paid'),
(181, 1, 2, 194, '2009-03-09 15:05:09', 'paid'),
(182, 1, 1, 195, '2009-03-09 15:12:54', 'paid'),
(183, 1, 2, 196, '2009-03-09 15:44:56', 'unpaid'),
(184, 1, 2, 197, '2009-03-09 16:05:22', 'paid'),
(185, 1, 1, 198, '2009-03-09 16:19:42', 'paid'),
(186, 1, 2, 199, '2009-03-09 17:00:57', 'unpaid'),
(187, 1, 5, 201, '2009-03-09 17:57:42', 'paid'),
(188, 1, 1, 202, '2009-03-09 19:52:59', 'paid'),
(189, 1, 2, 203, '2009-03-09 22:29:54', 'paid'),
(190, 1, 15, 204, '2009-03-10 05:47:30', 'paid'),
(191, 1, 19, 205, '2009-03-10 09:19:13', 'paid'),
(192, 1, 19, 206, '2009-03-10 09:43:51', 'paid'),
(193, 1, 1, 207, '2009-03-10 09:56:58', 'paid'),
(194, 1, 5, 208, '2009-03-10 10:12:15', 'paid'),
(195, 1, 19, 209, '2009-03-10 10:19:50', 'paid'),
(196, 1, 2, 210, '2009-03-10 10:32:48', 'paid'),
(197, 1, 1, 211, '2009-03-10 10:40:41', 'paid'),
(198, 1, 1, 212, '2009-03-10 10:50:47', 'paid'),
(199, 1, 3, 213, '2009-03-10 11:02:17', 'paid'),
(200, 1, 1, 214, '2009-03-10 12:25:58', 'paid'),
(201, 1, 3, 215, '2009-03-10 12:28:06', 'paid'),
(202, 1, 4, 216, '2009-03-10 12:42:27', 'paid'),
(203, 1, 1, 217, '2009-03-10 13:37:25', 'paid'),
(204, 1, 1, 218, '2009-03-10 13:55:20', 'paid'),
(205, 1, 1, 219, '2009-03-10 14:15:24', 'paid'),
(206, 1, 1, 220, '2009-03-10 14:37:50', 'paid'),
(207, 1, 1, 221, '2009-03-10 14:41:33', 'paid'),
(208, 1, 1, 222, '2009-03-10 14:47:41', 'paid'),
(209, 1, 1, 223, '2009-03-10 14:50:42', 'paid'),
(210, 1, 1, 224, '2009-03-10 14:54:33', 'paid'),
(211, 1, 3, 225, '2009-03-10 15:00:07', 'paid'),
(212, 1, 5, 226, '2009-03-10 15:38:13', 'paid'),
(213, 1, 1, 227, '2009-03-10 15:44:35', 'paid'),
(214, 1, 8, 228, '2009-03-10 15:56:44', 'paid'),
(215, 1, 8, 229, '2009-03-10 16:01:55', 'paid'),
(216, 1, 3, 230, '2009-03-10 16:30:40', 'unpaid'),
(217, 1, 1, 231, '2009-03-10 17:13:33', 'paid'),
(218, 1, 4, 232, '2009-03-10 17:25:58', 'paid'),
(219, 1, 3, 233, '2009-03-10 18:00:57', 'unpaid'),
(220, 1, 8, 234, '2009-03-10 18:51:40', 'paid'),
(221, 1, 7, 235, '2009-03-10 20:03:51', 'paid'),
(222, 1, 20, 236, '2009-03-10 23:05:24', 'unpaid'),
(223, 1, 3, 237, '2009-03-10 23:10:48', 'paid'),
(224, 1, 19, 238, '2009-03-10 23:58:15', 'paid'),
(225, 1, 2, 239, '2009-03-11 00:00:59', 'paid'),
(226, 1, 13, 240, '2009-03-11 09:47:19', 'paid'),
(227, 1, 15, 241, '2009-03-11 11:13:03', 'paid'),
(228, 1, 13, 242, '2009-03-11 17:05:46', 'paid'),
(229, 1, 17, 243, '2009-03-12 19:40:45', 'paid'),
(230, 1, 18, 244, '2009-03-13 09:16:20', 'unpaid'),
(231, 1, 13, 245, '2009-03-16 13:23:02', 'paid'),
(232, 1, 13, 246, '2009-03-16 13:49:56', 'unpaid'),
(233, 1, 17, 247, '2009-03-16 16:56:36', 'unpaid'),
(234, 1, 19, 249, '2009-03-17 09:07:20', 'paid'),
(235, 1, 13, 250, '2009-03-17 09:48:24', 'paid'),
(236, 1, 22, 251, '2009-03-17 13:20:57', 'paid'),
(237, 1, 22, 252, '2009-03-18 09:41:13', 'unpaid'),
(238, 1, 22, 253, '2009-03-18 09:44:45', 'paid'),
(239, 1, 14, 254, '2009-03-18 10:49:12', 'unpaid'),
(240, 1, 18, 255, '2009-03-18 12:35:48', 'paid'),
(241, 1, 19, 256, '2009-03-18 15:09:32', 'paid'),
(242, 1, 19, 257, '2009-03-18 16:16:29', 'unpaid'),
(243, 1, 22, 258, '2009-03-18 16:49:37', 'paid'),
(244, 1, 17, 259, '2009-03-18 17:09:24', 'paid'),
(245, 1, 20, 261, '2009-03-19 16:09:40', 'paid'),
(246, 1, 17, 262, '2009-03-19 17:11:38', 'paid'),
(247, 1, 17, 263, '2009-03-20 09:05:08', 'paid'),
(248, 1, 24, 264, '2009-03-20 10:17:49', 'paid'),
(249, 1, 22, 266, '2009-03-20 12:48:37', 'paid'),
(250, 1, 18, 267, '2009-03-23 09:19:55', 'unpaid'),
(251, 1, 18, 268, '2009-03-23 09:22:57', 'paid'),
(252, 1, 24, 270, '2009-03-23 10:38:29', 'paid'),
(253, 1, 17, 271, '2009-03-23 11:11:25', 'paid'),
(254, 1, 16, 272, '2009-03-24 10:31:05', 'paid'),
(255, 1, 22, 273, '2009-03-24 13:52:55', 'paid'),
(256, 1, 17, 274, '2009-03-24 13:55:29', 'unpaid'),
(257, 1, 17, 275, '2009-03-24 14:19:24', 'paid'),
(258, 1, 17, 276, '2009-03-24 16:04:50', 'unpaid'),
(259, 1, 17, 277, '2009-03-24 16:12:03', 'paid'),
(260, 1, 25, 304, '2009-08-05 08:28:47', 'paid'),
(261, 1, 28, 305, '2009-08-05 10:07:19', 'paid'),
(262, 1, 25, 306, '2009-08-06 13:10:27', 'paid'),
(263, 1, 29, 307, '2009-08-09 00:44:56', 'unpaid'),
(264, 1, 29, 308, '2009-08-09 00:45:33', 'unpaid'),
(265, 1, 25, 309, '2009-08-09 00:46:27', 'unpaid'),
(266, 1, 25, 311, '2009-08-10 08:50:35', 'unpaid'),
(267, 1, 25, 312, '2009-08-10 10:38:51', 'unpaid'),
(268, 1, 25, 314, '2009-08-10 10:49:04', 'paid'),
(269, 1, 25, 316, '2009-08-11 11:06:43', 'unpaid'),
(270, 1, 25, 317, '2009-08-14 16:59:02', 'unpaid'),
(271, 1, 29, 319, '2009-08-18 12:30:22', 'unpaid'),
(272, 1, 25, 320, '2009-08-18 14:38:45', 'unpaid'),
(273, 1, 25, 321, '2009-08-18 21:36:02', 'paid'),
(274, 1, 25, 322, '2009-08-19 10:15:08', 'paid'),
(275, 1, 25, 323, '2009-08-19 11:49:30', 'paid'),
(276, 1, 25, 324, '2009-08-19 12:09:47', 'paid'),
(277, 1, 25, 325, '2009-08-19 13:49:46', 'paid'),
(278, 1, 25, 326, '2009-08-24 11:07:35', 'paid'),
(279, 1, 29, 327, '2009-08-27 10:29:54', 'unpaid'),
(280, 1, 29, 328, '2009-08-27 15:06:43', 'unpaid'),
(281, 1, 29, 329, '2009-08-27 15:22:38', 'unpaid'),
(282, 1, 29, 331, '2009-08-27 16:18:19', 'unpaid'),
(283, 1, 25, 333, '2009-08-28 16:52:33', 'paid'),
(284, 1, 25, 334, '2009-08-31 13:45:20', 'paid'),
(285, 1, 29, 335, '2009-09-02 18:03:17', 'unpaid'),
(286, 1, 29, 336, '2009-09-03 07:55:55', 'unpaid'),
(287, 1, 26, 337, '2009-09-03 14:19:40', 'paid'),
(288, 1, 26, 338, '2009-09-03 14:30:01', 'paid'),
(289, 1, 29, 339, '2009-09-04 07:55:11', 'unpaid'),
(290, 1, 26, 340, '2009-09-08 17:45:30', 'paid'),
(291, 1, 26, 341, '2009-09-09 10:24:30', 'paid'),
(292, 1, 29, 343, '2009-09-09 12:44:03', 'unpaid'),
(293, 1, 29, 345, '2009-09-10 09:17:44', 'unpaid'),
(294, 1, 29, 346, '2009-09-10 09:18:22', 'unpaid'),
(295, 1, 26, 347, '2009-09-11 10:40:53', 'paid'),
(296, 1, 26, 348, '2009-09-11 12:29:46', 'paid'),
(297, 1, 26, 349, '2009-09-14 12:47:05', 'paid'),
(298, 1, 26, 350, '2009-09-16 13:32:44', 'unpaid'),
(299, 1, 26, 351, '2009-09-16 13:37:40', 'unpaid'),
(300, 1, 26, 353, '2009-09-18 11:17:38', 'paid'),
(301, 1, 26, 354, '2009-09-18 11:22:39', 'paid'),
(302, 1, 26, 356, '2009-09-22 14:06:52', 'paid'),
(303, 1, 26, 357, '2009-09-23 11:42:51', 'paid'),
(304, 1, 26, 358, '2009-09-23 18:37:38', 'unpaid'),
(305, 1, 26, 359, '2009-09-23 18:38:45', 'unpaid'),
(306, 1, 26, 361, '2009-09-24 09:38:19', 'paid'),
(307, 1, 26, 362, '2009-09-24 11:13:45', 'unpaid'),
(308, 1, 29, 363, '2009-09-24 13:36:45', 'unpaid'),
(309, 1, 29, 364, '2009-09-24 13:37:29', 'unpaid'),
(310, 1, 29, 365, '2009-09-24 15:55:45', 'unpaid'),
(311, 1, 26, 366, '2009-09-25 15:47:33', 'unpaid'),
(312, 1, 26, 367, '2009-09-25 15:49:02', 'paid'),
(313, 1, 26, 368, '2009-09-25 15:57:49', 'paid'),
(314, 1, 26, 369, '2009-09-30 08:12:33', 'paid'),
(315, 1, 26, 371, '2009-09-30 16:03:06', 'paid'),
(316, 1, 26, 372, '2009-09-30 16:09:11', 'paid'),
(317, 1, 26, 373, '2009-09-30 16:29:20', 'unpaid'),
(318, 1, 26, 374, '2009-10-01 10:18:59', 'paid'),
(319, 1, 27, 377, '2009-10-13 09:23:40', 'paid'),
(320, 1, 27, 378, '2009-10-13 14:55:52', 'paid'),
(321, 1, 27, 380, '2009-10-13 17:11:36', 'paid'),
(322, 1, 27, 381, '2009-10-13 17:18:13', 'paid');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `continuing_ed_event_mapping`
--
ALTER TABLE `continuing_ed_event_mapping`
  ADD CONSTRAINT `continuing_ed_event_mapping_ibfk_1` FOREIGN KEY (`ceu_id`) REFERENCES `continuing_ed_item` (`id`),
  ADD CONSTRAINT `continuing_ed_event_mapping_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `continuing_ed_item`
--
ALTER TABLE `continuing_ed_item`
  ADD CONSTRAINT `continuing_ed_item_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `registration_options`
--
ALTER TABLE `registration_options`
  ADD CONSTRAINT `registration_options_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `registration_options_ibfk_2` FOREIGN KEY (`registrationperiod_id`) REFERENCES `registration_period` (`id`);

--
-- Constraints for table `registration_period`
--
ALTER TABLE `registration_period`
  ADD CONSTRAINT `registration_period_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `registration_period_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `topic_ceu_mapping`
--
ALTER TABLE `topic_ceu_mapping`
  ADD CONSTRAINT `topic_ceu_mapping_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `topic_ceu_mapping_ibfk_2` FOREIGN KEY (`ceu_id`) REFERENCES `continuing_ed_item` (`id`);

--
-- Constraints for table `topic_event_mapping`
--
ALTER TABLE `topic_event_mapping`
  ADD CONSTRAINT `topic_event_mapping_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  ADD CONSTRAINT `topic_event_mapping_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`);

--
-- Constraints for table `user_ceu_mapping`
--
ALTER TABLE `user_ceu_mapping`
  ADD CONSTRAINT `user_ceu_mapping_ibfk_1` FOREIGN KEY (`ceu_id`) REFERENCES `continuing_ed_item` (`id`),
  ADD CONSTRAINT `user_ceu_mapping_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_registration_mapping`
--
ALTER TABLE `user_registration_mapping`
  ADD CONSTRAINT `user_registration_mapping_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  ADD CONSTRAINT `user_registration_mapping_ibfk_2` FOREIGN KEY (`registration_option_id`) REFERENCES `registration_options` (`id`),
  ADD CONSTRAINT `user_registration_mapping_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
