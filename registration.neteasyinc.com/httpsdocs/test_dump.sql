-- MySQL dump 10.13  Distrib 5.1.35, for redhat-linux-gnu (x86_64)
--
-- Host: localhost    Database: eventregtest
-- ------------------------------------------------------
-- Server version	5.1.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `member_id` int(5) NOT NULL,
  `site_id` int(5) NOT NULL,
  `event_id` int(5) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  PRIMARY KEY (`member_id`,`site_id`,`event_id`),
  UNIQUE KEY `username` (`username`),
  KEY `site_id` (`site_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  CONSTRAINT `admin_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,1,1,'Prafull','Shirodkar','prafull','ChangeMe');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `continuing_ed_event_mapping`
--

DROP TABLE IF EXISTS `continuing_ed_event_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `continuing_ed_event_mapping` (
  `ceu_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  KEY `ceu_id` (`ceu_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `continuing_ed_event_mapping_ibfk_1` FOREIGN KEY (`ceu_id`) REFERENCES `continuing_ed_item` (`id`),
  CONSTRAINT `continuing_ed_event_mapping_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `continuing_ed_event_mapping`
--

LOCK TABLES `continuing_ed_event_mapping` WRITE;
/*!40000 ALTER TABLE `continuing_ed_event_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `continuing_ed_event_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `continuing_ed_item`
--

DROP TABLE IF EXISTS `continuing_ed_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `continuing_ed_item` (
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
  KEY `site_id` (`site_id`),
  CONSTRAINT `continuing_ed_item_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `continuing_ed_item`
--

LOCK TABLES `continuing_ed_item` WRITE;
/*!40000 ALTER TABLE `continuing_ed_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `continuing_ed_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
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
  `start_date` varchar(15) DEFAULT NULL,
  `end_date` varchar(15) DEFAULT NULL,
  `event_description` longtext CHARACTER SET ucs2,
  `status` varchar(10) NOT NULL DEFAULT 'Not Active',
  `check_payable_to` varchar(65) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  CONSTRAINT `events_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,1,'2009 Annual APA Virginia Conference','2010-03-16 00:27:36','Williamsburg Lodge','			','','','Williamsburg','VA','','US','804-754-4120','','','office@apavirginia.org','Room rate is $189/night must be booked by March 4th.		','03/27/2009','03/29/2009','GREEN COMMUNITIES VIRGINIA - Planning for Environmental, Economic, and Cultural Sustainability in the Commonwealth		','Not Active','APA Virginia'),(2,1,'ECO3 Eastern Shore Symposium 2009','2009-07-24 14:51:09','Chincoteague Community Center','','6155 Community Drive','','Chincoteague','VA','23336','US','(757) 466-9622','','http://www.chincoteaguecenter.org','','','10/16/2009','10/17/2009','','Not Active','APA Virginia'),(14,1,'Annual conference 2010','2010-03-09 17:28:59','Norfolk','Norfolk VA','Norfolk','Norfolk','Norfolk','VA','23508','','','','','test@test.com','		','05/03/2010','05/05/2010','test','Active','APA Virginia'),(15,1,'Norfolk Tides Baseball Game ','2010-04-08 10:04:05','Norfolk','					','','','Norfolk','VA','','US','','','apavirginia.org','info@apavirginia.org','				','05/02/2010','05/02/2010','Pre-conference event','Active','APA Virginia'),(16,1,'Mobile Workshop ','2010-04-08 10:09:16','VA Beach','								','','','VA Beach','VA','','US','','','apavirginia.org','info@apavirginia.org','						','05/04/2010','05/04/2010','limited to 28				','Active','APA Virginia'),(19,1,'Mobile Workshop','2010-04-08 10:09:23','Norfolk','									','','','Norfolk','VA','','US','','','apavirginia.org','info@apavirginia.org','		','05/04/2010','05/04/2010','						','Active','');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item_table`
--

DROP TABLE IF EXISTS `item_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_number` varchar(11) NOT NULL DEFAULT '0',
  `mc_gross` decimal(9,2) NOT NULL DEFAULT '0.00',
  `mc_currency` enum('USD','CAD','EUR','GBP','JPY','CAD') NOT NULL DEFAULT 'USD',
  PRIMARY KEY (`id`),
  UNIQUE KEY `item_number2` (`item_number`),
  KEY `item_number1` (`item_number`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item_table`
--

LOCK TABLES `item_table` WRITE;
/*!40000 ALTER TABLE `item_table` DISABLE KEYS */;
INSERT INTO `item_table` VALUES (1,'1','0.01','USD');
/*!40000 ALTER TABLE `item_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paypal_table`
--

DROP TABLE IF EXISTS `paypal_table`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paypal_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payer_id` varchar(60) DEFAULT NULL,
  `payment_date` varchar(50) DEFAULT NULL,
  `txn_id` varchar(50) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `payer_email` varchar(75) DEFAULT NULL,
  `payment_type` varchar(50) DEFAULT NULL,
  `memo` tinytext,
  `item_name` varchar(127) DEFAULT NULL,
  `item_number` varchar(127) DEFAULT NULL,
  `mc_gross` decimal(9,2) DEFAULT NULL,
  `mc_currency` char(3) DEFAULT NULL,
  `address_name` varchar(255) NOT NULL DEFAULT '',
  `address_street` varchar(255) NOT NULL DEFAULT '',
  `address_city` varchar(255) NOT NULL DEFAULT '',
  `address_state` varchar(255) NOT NULL DEFAULT '',
  `address_zip` varchar(255) NOT NULL DEFAULT '',
  `address_country` varchar(255) NOT NULL DEFAULT '',
  `payment_status` varchar(255) NOT NULL DEFAULT '',
  `pending_reason` varchar(255) NOT NULL DEFAULT '',
  `reason_code` varchar(255) NOT NULL DEFAULT '',
  `txn_type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `txn_id` (`txn_id`),
  KEY `txn_id_2` (`txn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal_table`
--

LOCK TABLES `paypal_table` WRITE;
/*!40000 ALTER TABLE `paypal_table` DISABLE KEYS */;
INSERT INTO `paypal_table` VALUES (31,'','','1DC265583S555012G','Sharlee','Mills','','','','Item Code :#539311,#539381,','','260.00','USD','Sharlee Mills','P.O.Box 470','Hanover','VA','23069','United States','Completed','','','web_accept'),(32,'','','6D922854G9270602V','Sharlee','Mills','','','','Item Code :#540341,#540381,','','160.00','USD','Sharlee Mills','P.O.Box 470','Hanover','VA','23069','United States','Completed','','','web_accept'),(33,'','','99E97960K08740337','Sharlee','Mills','','','','Item Code :#541341,#541381,','','160.00','USD','Sharlee Mills','P.O.Box 470','Hanover','VA','23069','United States','Completed','','','web_accept'),(34,'','','1FR17245JW550351N','Sharlee','Mills','','','','Item Code :#542331,#542371,','','158.50','USD','Sharlee Mills','P.O.Box 470','Hanover','VA','23069','United States','Completed','','','web_accept'),(35,'','','70E81577YS405954Y','Sharlee','Mills','','','','Item Code :#543331,','','150.00','USD','Sharlee Mills','P.O.Box 470','Hanover','VA','23069','United States','Completed','','','web_accept'),(36,'','','9H809014DL885663X','Mary','Jones','','','','Item Code :#545301,#545371,','','303.50','USD','Mary Jones','1508 Inwood Ave','Norfolk','VA','23503','United States','Completed','','','web_accept'),(37,'','','77U853814V997051B','Dan','McKinney','','','','Item Code :#546321,#546381,','','110.00','USD','Dan McKinney','6718 Bradley Road','Radford','VA','24141','United States','Completed','','','web_accept'),(38,'','','4NR28243UC1784343','David','McGettigan','','','','Item Code :#547301,','','170.00','USD','David McGettigan','8028 Folkstone Rd','Manassas','VA','20111','United States','Completed','','','web_accept'),(39,'','','2M136948ML312391T','John','Accordino','','','','Item Code :#548341,','','150.00','USD','John Accordino','2860 Braidwood Road','Richmond','VA','23225','United States','Completed','','','web_accept'),(40,'','','5CY028274M803451A','Frederick','Wagg','','','','Item Code :#550331,','','150.00','USD','Frederick Wagg','309 Overbrook Road','Richmond','VA','23222','United States','Completed','','','web_accept'),(41,'','','8NB21466A9654164U','Joanne','Bailey','','','','Registered for:#470301','','295.00','USD','','','','','','','Completed','','','web_accept'),(42,'','','4VJ06986AL8903107','James','McGowan','','','','Item Code :#552301,#552381,#552391','','315.00','USD','James McGowan','P.O. Box 686','Accomac','VA','23301','United States','Completed','','','web_accept'),(43,'','','8EK29785KJ2599732','Robert','Bolich','','','','Item Code :#553301,#553381,','','305.00','USD','Robert Bolich','703 Rockwood Avenue','Pittsburgh','PA','15234','United States','Completed','','','web_accept'),(44,'','','2B571612LL863751T','Scott','Dunn','','','','Item Code :#554301,','','295.00','USD','Scott Dunn','11909 Reeds Bluff Lane','Midlothian','VA','23113','United States','Completed','','','web_accept'),(45,'','','11N40374RG087560T','Jane','Berge','','','','Item Code :#556301,','','295.00','USD','Jane Berge','31144 Bunting Pt. Rd.','Melfa','VA','23410','United States','Completed','','','web_accept'),(46,'','','59P44955EF2949101','Richard','Krapf','','','','Item Code :#557311,','','250.00','USD','Richard Krapf','2404 Forge Road','Toano','VA','23168','United States','Completed','','','web_accept'),(47,'','','8CE00146UD344914J','George','McCormack','','','','Item Code :#562301,','','345.00','USD','George McCormack','14301 Chepstow Road','Midlothian','VA','23113','United States','Completed','','','web_accept'),(48,'','','0EJ89684MD3786308','Alexander','Lee','','','','Item Code :#563301,','','345.00','USD','Alexander Lee','3501 John Marshall Drive','Arlington','VA','22207','United States','Completed','','','web_accept'),(49,'','','7UL026177J7686054','Benjamin','McFarlane','','','','Item Code :#565301,#565371,','','178.50','USD','Benjamin McFarlane','608 Colonial Ave Apt 4','Norfolk','VA','23507','United States','Completed','','','web_accept'),(50,'','','5TF40273FS795731D','Andrea','Hornung','','','','Registered for:#488301','','295.00','USD','','','','','','','Completed','','','web_accept'),(51,'','','91112182YH105945E','Lisa','Hardy','','','','Item Code :#566311,','','300.00','USD','Lisa Hardy','912 Spotswood Ave<br />\r\nApt. B1','Norfolk','VA','23517','United States','Completed','','','web_accept'),(52,'','','7D687079JX357224F','Regina','Jackson','','','','Registered for:#567331','','175.00','USD','','','','','','','Completed','','','web_accept'),(53,'','','59W645589Y323350F','Julie','Jordan','','','','Item Code :#570301,#570381,','','355.00','USD','Julie Jordan','P.O. Box 111','Orange','VA','22960','United States','Completed','','','web_accept');
/*!40000 ALTER TABLE `paypal_table` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paypaltest`
--

DROP TABLE IF EXISTS `paypaltest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paypaltest` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `status` varchar(20) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypaltest`
--

LOCK TABLES `paypaltest` WRITE;
/*!40000 ALTER TABLE `paypaltest` DISABLE KEYS */;
/*!40000 ALTER TABLE `paypaltest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quantities`
--

DROP TABLE IF EXISTS `quantities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quantities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL,
  `Price` double(6,2) NOT NULL,
  `Cost` double(6,2) NOT NULL,
  PRIMARY KEY (`id`,`site_id`,`user_id`,`event_id`,`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1098 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quantities`
--

LOCK TABLES `quantities` WRITE;
/*!40000 ALTER TABLE `quantities` DISABLE KEYS */;
INSERT INTO `quantities` VALUES (1097,1,570,16,38,1,10.00,10.00),(1096,1,570,14,30,1,345.00,345.00),(1095,1,569,14,30,1,50.00,50.00),(1094,1,568,14,36,1,0.00,0.00),(1093,1,567,14,33,1,175.00,175.00),(1092,1,566,14,31,1,300.00,300.00),(1091,1,565,15,37,1,8.50,8.50),(1090,1,565,14,30,1,170.00,170.00),(1089,1,564,14,30,1,345.00,345.00),(1088,1,563,14,30,1,345.00,345.00),(1087,1,562,14,30,1,345.00,345.00),(1086,1,561,14,36,1,0.00,0.00),(1085,1,560,14,34,1,150.00,150.00),(1084,1,559,16,38,1,10.00,10.00),(1083,1,559,14,30,1,295.00,295.00),(1082,1,559,16,38,1,10.00,10.00),(1081,1,559,16,38,1,10.00,10.00),(1080,1,558,14,33,1,150.00,150.00),(1079,1,557,14,31,1,250.00,250.00),(1078,1,556,14,30,1,295.00,295.00),(1077,1,555,14,33,1,150.00,150.00),(1076,1,554,14,30,1,295.00,295.00),(1075,1,553,16,38,1,10.00,10.00),(1074,1,553,14,30,1,295.00,295.00),(1073,1,552,19,39,1,10.00,10.00),(1072,1,552,16,38,1,10.00,10.00),(1071,1,552,14,30,1,295.00,295.00),(1070,1,551,14,30,1,295.00,295.00),(1069,1,550,14,33,1,150.00,150.00),(1068,1,549,16,38,1,10.00,10.00),(1067,1,549,15,37,2,8.50,17.00),(1066,1,549,16,38,1,10.00,10.00),(1065,1,549,15,37,2,8.50,17.00),(1064,1,548,14,34,1,150.00,150.00),(1063,1,547,14,30,1,170.00,170.00),(1062,1,546,16,38,1,10.00,10.00),(1061,1,546,14,32,1,100.00,100.00),(1060,1,545,15,37,1,8.50,8.50),(1059,1,545,14,30,1,295.00,295.00),(1058,1,545,15,37,1,8.50,8.50),(1057,1,544,14,30,1,170.00,170.00),(1056,1,543,14,33,1,150.00,150.00),(1055,1,542,15,37,1,8.50,8.50),(1054,1,542,14,33,1,150.00,150.00),(1053,1,541,16,38,1,10.00,10.00),(1052,1,541,14,34,1,150.00,150.00),(1051,1,540,16,38,1,10.00,10.00),(1050,1,540,14,34,1,150.00,150.00),(1049,1,539,16,38,1,10.00,10.00),(1048,1,539,14,31,1,250.00,250.00),(1047,1,538,14,32,1,225.00,225.00),(1046,1,537,14,34,1,150.00,150.00),(1045,1,536,14,30,1,295.00,295.00),(1044,1,535,14,35,1,125.00,125.00),(1043,1,534,14,31,1,250.00,250.00),(1042,1,527,14,30,1,295.00,295.00),(1041,1,533,14,32,1,50.00,50.00),(1040,1,533,14,36,1,0.00,0.00),(1039,1,532,14,31,1,125.00,125.00),(1038,1,531,14,31,1,250.00,250.00),(1037,1,528,16,38,1,10.00,10.00),(1036,1,528,14,30,1,295.00,295.00),(1035,1,530,14,31,1,250.00,250.00),(1034,1,529,14,33,1,150.00,150.00),(1033,1,525,14,34,1,25.00,25.00),(1032,1,524,14,31,1,250.00,250.00),(1031,1,523,14,32,1,100.00,100.00),(1030,1,522,14,33,1,150.00,150.00),(1029,1,521,14,31,1,250.00,250.00),(1028,1,520,14,31,1,250.00,250.00),(1027,1,519,14,31,1,125.00,125.00),(1026,1,518,14,30,1,295.00,295.00),(1025,1,517,14,32,1,100.00,100.00),(1024,1,516,14,31,1,250.00,250.00),(1023,1,436,14,36,1,0.00,0.00),(1022,1,515,14,30,1,295.00,295.00),(1021,1,513,14,33,1,150.00,150.00),(1003,1,507,14,31,1,250.00,250.00),(1002,1,506,14,30,1,295.00,295.00),(1001,1,505,16,38,1,10.00,10.00),(1000,1,505,16,38,1,10.00,10.00),(999,1,505,16,38,1,10.00,10.00),(998,1,505,14,30,1,295.00,295.00),(1020,1,514,14,30,1,295.00,295.00),(1012,1,512,14,30,1,295.00,295.00),(1011,1,511,14,30,1,295.00,295.00),(1010,1,510,14,31,1,250.00,250.00),(1009,1,509,15,37,1,8.50,8.50),(992,1,493,14,32,1,100.00,100.00),(991,1,493,14,36,1,0.00,0.00),(990,1,504,14,30,1,295.00,295.00),(989,1,503,19,39,1,10.00,10.00),(988,1,503,15,37,3,8.50,25.50),(987,1,503,14,30,1,170.00,170.00),(1008,1,509,14,30,1,345.00,345.00),(985,1,502,14,31,1,250.00,250.00),(983,1,501,16,38,1,10.00,10.00),(980,1,500,16,38,1,10.00,10.00),(976,1,495,14,35,1,125.00,125.00),(975,1,494,14,33,1,150.00,150.00),(970,1,491,14,32,1,225.00,225.00),(969,1,491,19,39,1,10.00,10.00),(968,1,454,19,39,1,10.00,10.00),(967,1,454,14,30,1,295.00,295.00),(966,1,488,14,30,1,295.00,295.00),(965,1,487,14,36,1,0.00,0.00),(964,1,486,14,30,1,50.00,50.00),(963,1,484,14,30,1,295.00,295.00),(962,1,485,14,36,1,0.00,0.00),(961,1,483,14,36,1,0.00,0.00),(960,1,482,14,36,1,0.00,0.00),(959,1,481,14,36,1,0.00,0.00),(958,1,480,14,30,1,295.00,295.00),(957,1,479,14,36,1,0.00,0.00),(956,1,478,14,30,1,295.00,295.00),(954,1,476,19,39,1,10.00,10.00),(953,1,476,14,30,1,295.00,295.00),(952,1,460,14,31,1,250.00,250.00),(951,1,469,19,39,1,10.00,10.00),(950,1,467,14,33,1,150.00,150.00),(949,1,474,14,30,1,295.00,295.00),(948,1,473,15,37,4,8.50,34.00),(947,1,473,14,30,1,295.00,295.00),(946,1,472,14,30,1,170.00,170.00),(945,1,471,14,30,1,50.00,50.00),(944,1,470,14,30,1,295.00,295.00),(981,1,501,16,38,1,10.00,10.00),(982,1,501,14,30,1,295.00,295.00),(941,1,469,14,30,1,295.00,295.00),(939,1,437,14,36,1,0.00,0.00),(938,1,466,16,38,1,10.00,10.00),(937,1,466,14,30,1,295.00,295.00),(935,1,0,14,33,1,150.00,150.00),(934,1,464,14,35,1,125.00,125.00),(933,1,463,14,30,1,295.00,295.00),(932,1,462,14,31,1,250.00,250.00),(930,1,458,14,33,1,150.00,150.00),(929,1,457,14,30,1,295.00,295.00),(928,1,456,14,30,1,295.00,295.00),(927,1,455,14,30,1,295.00,295.00),(926,1,452,14,36,1,0.00,0.00),(925,1,451,14,30,1,295.00,295.00),(924,1,0,14,31,1,125.00,125.00),(923,1,448,14,30,1,295.00,295.00),(977,1,497,14,32,1,100.00,100.00),(921,1,449,14,31,1,125.00,125.00),(920,1,441,16,38,1,10.00,10.00),(919,1,441,14,30,1,50.00,50.00),(955,1,477,14,31,1,250.00,250.00),(917,1,442,14,30,1,50.00,50.00),(916,1,447,19,39,1,10.00,10.00),(915,1,447,14,30,1,170.00,170.00),(909,1,445,14,30,1,295.00,295.00),(914,1,446,16,38,1,10.00,10.00),(913,1,446,14,30,1,295.00,295.00),(906,1,443,14,30,1,295.00,295.00),(978,1,498,14,30,1,170.00,170.00),(979,1,500,14,30,1,295.00,295.00),(1007,1,508,14,30,1,295.00,295.00),(901,1,440,14,30,1,295.00,295.00),(900,1,439,14,30,1,295.00,295.00),(899,1,439,14,30,1,295.00,295.00),(898,1,438,14,30,1,295.00,295.00),(897,1,437,14,30,1,295.00,295.00);
/*!40000 ALTER TABLE `quantities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration_options`
--

DROP TABLE IF EXISTS `registration_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `option_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `registrationperiod_id` (`event_id`),
  CONSTRAINT `registration_options_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  CONSTRAINT `registration_options_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration_options`
--

LOCK TABLES `registration_options` WRITE;
/*!40000 ALTER TABLE `registration_options` DISABLE KEYS */;
INSERT INTO `registration_options` VALUES (30,1,14,'Full (Monday through Wednesday, May 3-5)'),(31,1,14,'Monday & Tuesday (May 3 & 4)'),(32,1,14,'Tuesday & Wednesday (May 4 & 5)'),(33,1,14,'Monday (May 3)'),(34,1,14,'Tuesday (May 4)'),(35,1,14,'Wednesday (May 5)'),(36,1,14,'Complimentary day of Registration'),(37,1,15,'Sunday, May 2 at 1:15 pm'),(38,1,16,'Virginia Beach Strategic Growth Area Plans - limited to 28 (Pembroke/Town Center & Burton Station)'),(39,1,19,'Norfolk East Beach - limited to 28 (Tuesday, May 4)');
/*!40000 ALTER TABLE `registration_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registration_period`
--

DROP TABLE IF EXISTS `registration_period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registration_period` (
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
  KEY `event_id` (`event_id`),
  CONSTRAINT `registration_period_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  CONSTRAINT `registration_period_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registration_period`
--

LOCK TABLES `registration_period` WRITE;
/*!40000 ALTER TABLE `registration_period` DISABLE KEYS */;
INSERT INTO `registration_period` VALUES (1,1,1,'Early Registration','2009-02-01 00:00:00','2009-03-11 00:00:00',1,1),(2,1,1,'Late Registration','2009-03-11 00:00:00','2009-03-25 00:00:00',1,1),(3,1,1,'Speaker registration','2009-02-01 00:00:00','2009-03-25 00:00:00',1,1),(4,1,2,'Early Registration','2009-07-24 14:55:24','2009-08-31 23:59:00',1,0),(5,1,2,'Regular Registration','2009-08-31 23:59:00','2009-10-01 23:59:00',1,0),(6,1,2,'Regular Registration','2009-10-01 23:59:00','2009-09-12 23:59:00',1,0),(7,1,2,'Special Registrations','2009-07-24 15:02:43','2009-10-01 23:59:00',1,0);
/*!40000 ALTER TABLE `registration_period` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regprice`
--

DROP TABLE IF EXISTS `regprice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regprice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `after_april_11` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `usertype_id` (`usertype_id`,`option_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regprice`
--

LOCK TABLES `regprice` WRITE;
/*!40000 ALTER TABLE `regprice` DISABLE KEYS */;
INSERT INTO `regprice` VALUES (1,1,30,'295.00','345.00'),(2,1,31,'250.00','300.00'),(3,1,32,'225.00','275.00'),(4,1,33,'150.00','175.00'),(5,1,34,'150.00','175.00'),(6,1,35,'125.00','150.00'),(7,2,30,'345.00','395.00'),(8,2,31,'300.00','350.00'),(9,2,32,'275.00','325.00'),(10,2,33,'150.00','175.00'),(11,2,34,'150.00','175.00'),(12,2,35,'125.00','150.00'),(13,3,30,'170.00','170.00'),(14,3,31,'125.00','125.00'),(15,3,32,'100.00','100.00'),(16,4,30,'50.00','50.00'),(17,4,31,'50.00','50.00'),(18,4,32,'50.00','50.00'),(19,4,33,'25.00','25.00'),(20,4,34,'25.00','25.00'),(21,4,35,'25.00','25.00'),(22,3,36,'0.00','0.00'),(23,0,37,'8.50','8.50'),(24,0,38,'10.00','10.00'),(25,0,39,'10.00','10.00');
/*!40000 ALTER TABLE `regprice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sites`
--

DROP TABLE IF EXISTS `sites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sites`
--

LOCK TABLES `sites` WRITE;
/*!40000 ALTER TABLE `sites` DISABLE KEYS */;
INSERT INTO `sites` VALUES (1,'VA Planning'),(2,'CVC-AALNC');
/*!40000 ALTER TABLE `sites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tickets`
--

DROP TABLE IF EXISTS `tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tickets` (
  `t_id` int(5) NOT NULL AUTO_INCREMENT,
  `opid` int(5) NOT NULL,
  `max` int(5) NOT NULL,
  `available` int(5) NOT NULL,
  PRIMARY KEY (`t_id`,`opid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tickets`
--

LOCK TABLES `tickets` WRITE;
/*!40000 ALTER TABLE `tickets` DISABLE KEYS */;
INSERT INTO `tickets` VALUES (1,37,500,484),(2,38,28,4),(3,39,28,19);
/*!40000 ALTER TABLE `tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic_ceu_mapping`
--

DROP TABLE IF EXISTS `topic_ceu_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic_ceu_mapping` (
  `topic_id` int(11) DEFAULT NULL,
  `ceu_id` int(11) DEFAULT NULL,
  KEY `topic_id` (`topic_id`),
  KEY `ceu_id` (`ceu_id`),
  CONSTRAINT `topic_ceu_mapping_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  CONSTRAINT `topic_ceu_mapping_ibfk_2` FOREIGN KEY (`ceu_id`) REFERENCES `continuing_ed_item` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic_ceu_mapping`
--

LOCK TABLES `topic_ceu_mapping` WRITE;
/*!40000 ALTER TABLE `topic_ceu_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `topic_ceu_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic_event_mapping`
--

DROP TABLE IF EXISTS `topic_event_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic_event_mapping` (
  `topic_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  KEY `topic_id` (`topic_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `topic_event_mapping_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`),
  CONSTRAINT `topic_event_mapping_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic_event_mapping`
--

LOCK TABLES `topic_event_mapping` WRITE;
/*!40000 ALTER TABLE `topic_event_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `topic_event_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topics`
--

DROP TABLE IF EXISTS `topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `topic_name` varchar(100) CHARACTER SET ucs2 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topics`
--

LOCK TABLES `topics` WRITE;
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `user_password` varchar(100) CHARACTER SET ucs2 NOT NULL,
  `security_question_text` varchar(150) CHARACTER SET ucs2 DEFAULT NULL,
  `security_question_answer` varchar(150) CHARACTER SET ucs2 DEFAULT NULL,
  `title` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
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
  `email` varchar(50) NOT NULL,
  `alt_email` varchar(50) CHARACTER SET ucs2 DEFAULT NULL,
  `status` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `username` (`username`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=571 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (436,1,'2010-03-25 11:28:39','prafullgs','prafullgs123','Company','Neteasy Inc','Progr','Prafull','G','Shirodkar','','Prafull','Neteasy Inc','1','8600 Quioccasin Rd','Suite 201','Richmond','Virginia','','US','7572857269','','prafull.shirodkar@neteasyinc.com','',2),(437,1,'2010-03-25 12:04:00','earl_anders','buddhaboy','Favorite TV show','Lost','Plann','Earl','W','Anderson','','Earl','York County Planning Division','2','PO Box 532','224 Ballard Street','Yorktown','Virginia','','US','757-890-3497','757-890-4077','andersone@yorkcounty.gov','',1),(438,1,'2010-03-25 13:31:44','amoss','gohoosgo','mother\'s maiden name','fox','Planner','Ashby','M','Moss','','Ashby Moss','City of Virginia Beach','2','2405 Courthouse Dr.','','Virginia Beach','Virginia','','US','757-385-8573','','amoss@vbgov.com','',0),(439,1,'2010-03-25 13:38:06','fkaleba','Towhee10','full name of cat','Beatrice','Senior Engineer','Frank','','Kaleba','','Frank','R&K Engineering','2','6446 Honey Tree Ct','','Burke','Virginia','','US','703-568-7338','703-440-1251','fjkaleba@rkeng.com','',0),(440,1,'2010-03-25 14:01:48','JeffNein','graciepaws','last pet','Gracie','Senior Urban Planner','Jeffrey','A','Nein','','Jeff Nein','Cooley Godward Kronish LLP','2','11951 Freedom Drive','','Reston','Virginia','','US','(703) 456-8103','','jnein@cooley.com','janein@verizon.net',0),(441,1,'2010-03-25 14:07:10','kyoungbluth','Rettij12','First Dog\'s Name?','joe','GRAD STUDENT','KATHERINE','D','YOUNGBLUTH','','KATHERINE YOUNGBLUTH','VIRGINIA TECH','1','2100 CLARENDON BOULEVARD','#900','ARLINGTON','Virginia','','US','703 228 3392','','kyoungbl@vt.edu','',0),(442,1,'2010-03-25 14:22:50','ashantiaa','I2thk4ul2cpl','name of pet','Pluto','student','Aaron','A','Ashanti','','Aaron A. Ashanti','City of Chesapeake','1','630 Potomac AVe','','Portsmouth','Virginia','','US','1-757-399-1952','1-757-399-1952','ashantiaa@vcu.edu','safmin@gmail.com',0),(443,1,'2010-03-25 16:13:49','LavetaOwen','collie','dog name','otis','Natural Resouces Man','David','L','Morris','Mr','Dave Morris','Newport News Waterworks','2','700 Town Center Drive','Suite 400','Newport News','Virginia','','US','757-926-1103','757-926-1168','lowens@nngov.com','',0),(445,1,'2010-03-25 16:28:25','DonRice','collie','dog name','otis','Water Resource Engin','Donald ','P','Rice','Mr','Donald','Newport News Waterworks','2','700 Town Center Drive','Suite 400','Newport News','Virginia','','US','757-926-1103','757-926-1168','lowens@nngov.com','',0),(446,1,'2010-03-25 17:19:24','hkzahm','buffalo','home','home','Senior Development M','Hillary','K','Zahm','','Hillary','Macerich','2','Tysons Corner Center','1961 Chain Bridge Road, Suite 105','McLean','Virginia','','US','703-847-7323','','hillary.zahm@macerich.com','',0),(447,1,'2010-03-26 08:01:49','GMHomewood','erinerin','Mother\'s Maiden Name?','Stolp','Director of Communit','George','M','Homewood','','George','New Kent County','2','PO Box 50','','New Kent','Virginia','','US','804-966-9603','804-966-8531','gmhomewood@co.newkent.state.va.us','george.homewood@verizon.net',0),(448,1,'2010-03-26 08:53:24','cwgirl','cwgirl1776','first pet','Whiskers','Senior Planner','Amy','M','Parker','Ms.','Amy M. Parker','York County','1','York County Planning Division','P.O. Box 532','Yorktown','Virginia','','US','757 890-3495','757 890-4030','aparker@yorkcounty.gov','',0),(449,1,'2010-03-26 11:13:16','alexandria','virginia','Daughter\'s names','sadiesophie','Transportation Plann','Yon','','Lambert','','Yon Lambert','City of Alexandria','2','301 King Street','Room 3200','Alexandria','Virginia','','US','703-746-4086','703-838-4299','yon.lambert@alexandriava.gov','to hamods',0),(450,1,'2010-03-26 12:32:08','sandra','transportation','location of office','business center drive','Transportation Plann','Sandra','','Marks','','Sandra Marks','City of Alexandria','2','301 King Street','Room 3200','Alexandria','Virginia','','US','703-906-5184','703-838-4299','sandra.marks@alexandriava.gov','',0),(451,1,'2010-03-26 14:48:24','GregoryHemb','sp3ncerd4kota4','Mother\'s maiden name','Cockerill','Director of Planning','Gregory','M','Hembree','','Greg Hembree','Town of Vienna, VA','2','127 Center Street South','','Vienna','Virginia','','US','703-255-6341','703-255-5729','ghembree@viennava.gov','dpz@viennava.gov',0),(452,1,'2010-03-26 16:56:36','Curtissb','M!ahalo54','What was your first pet\'s name?','fluppy','Community Planner','Bonnie','','Curtiss','','Bonnie Curtiss','Dept of Navy/NAVFAC','1','6506 Hampton Blvd','','Norfolk','Virginia','','US','757-322-4464','757-322-4835','bonnie.curtiss@navy.mil','',0),(453,1,'2010-03-26 17:30:05','DavidJGoo','daryll','My brother\'s name.','Daryll','Bicycle & Pedestrian','David','J','Goodman','','David J Goodman','Arlington County','2','2100 Clarendon Blvd.','','Arlington','Virginia','','US','(703) 228-3709','703-228-7548','dgoodman@arlingtonva.us','daavman@gmail.com',0),(454,1,'2010-03-26 17:31:24','Harris276','oneworld76','What was the name of your first pet?','nopet','Planner II','Jennifer','','Harris','','Jennifer Harris','ATCS PLC','2','2825 Quisenberry Street','','Midlothian','Virginia','','US','','','travelerjen@yahoo.com','jgayle76@gmail.com',0),(455,1,'2010-03-29 08:42:57','brownmaxie','redbarn123','use brown plus mm','animal','Zoning Administrator','Maxie','C','Brown','','Maxie','Town of Culpeper','2','400 S. Main St., Suite 301','','Culpeper','Virginia','','US','540-829-8260','540-82-8279','mbrown@culpeper.to','mbrown@lintonhallrealtors.com',0),(456,1,'2010-03-29 08:56:07','mulhern100p','culpeper200','your name plus numbers','city plus job','Director of Planning','Patrick','','Mulhern','','Patrick Mulhern','Town of Culpeper','2','400 S. Main Street','Suite 301','Culpeper','Virginia','','US','540-829-8260','540-829-8279','pmulhern@culpeper.to','mbrown@culpeper.to',0),(457,1,'2010-03-29 13:37:47','mzirkle','440cleveland','cat','Dirtball','Chief of Planning','Mary','A','Zirkle','','Mary A. Zirkle','Bedford County','2','122 E Main St','Ste G-03','Bedford','Virginia','','US','540-586-7616','540-586-2059','mzirkle@bedfordcountyva.gov','mzirkle@verizon.net',0),(458,1,'2010-03-29 16:27:41','VictoriaGu','calendar20','What is mother\'s maiden name?','buckland','Director, Property P','Victoria','','Gussman','','Tory Gussman','The Colonial Williamsburg Foundation','2','PO Box 1776','','Williamsburg','Virginia','','US','757-220-7159','757-565-8042','vgussman@cwf.org','klevy@cwf.org',0),(460,1,'2010-03-29 20:11:28','UrsulaLema','ursula123!@#','Mothers maiden name?','anselmo','Project Manager','Ursula','M','Lemanski','','Ursula Lemanski','National Park Service, RTCA','2','633 Tammy Terrace','','Leesburg','Virginia','','US','703-431-7728','','ursula_lemanski@nps.gov','',0),(461,1,'2010-03-30 07:59:20','Literarydiv','Rattler','Mother\'s maiden name','Jones','Facility Planner','Tara','','Turner','','Tara Turner','NAVFAC Atlantic','2','1021 Christiana Circle','','Portsmouth','Virginia','','US','757-686-2344','','tara.turner@navy.mil','tara.turner@navy.mil',0),(462,1,'2010-03-30 10:14:46','tcross','Cooley#47','What is wife\'s maiden name?','Forssell','Principal Planner','Timothy','C','Cross','','Tim Cross','County of York, Virginia','2','PO Box 532','224 Ballard Street','Yorktown','Virginia','','US','','','tcross@yorkcounty.gov','',0),(463,1,'2010-03-30 10:57:42','tturner333','Rattler','Mom\'s maiden name','Jones','Facilities Planner','Tara','','Turner','','Tara Turner','NAVFAC Atlantic','2','1021 Christiana Circle','','Portsmouth','Virginia','','US','','','tara.turner@navy.mil','suitelady333@yahoo.com',0),(464,1,'2010-03-30 14:41:33','kelli_leduc','butterfly','what is my husband\'s name?','Josh','Planner','Kelli','L','Le Duc','','Kelli Le Duc','New Kent County','1','PO Box 50','','New Kent','Virginia','','US','804-966-8505','804-966-8531','klleduc@co.newkent.state.va.us','',0),(466,1,'2010-03-31 11:49:57','flanagan','planner','year greenway established','1970','Planner','EVAN','A','WYATT','','EVAN WYATT','Greenway Engineering','2','151 WINDY HILL LANE','','WINCHESTER','Virginia','','US','540-662-4185','540-722-9528','ewyatt@greenwayeng.com','',0),(467,1,'2010-03-31 11:52:11','judithwiega','2525252525','mom\'s maiden name','Casaday','Senior Planner','Judith','C','Wiegand','','Judy','County of Albemarle','2','PO Box 2403','','Staunton','Virginia','','US','434-296-5832','','jwiegand@albemarle.org','judithwiegand@aol.com',0),(469,1,'2010-03-31 12:53:30','ElaineEchols','8857eke1','What is your bd and initial?','August 8, 1957','Principal Planner','Elaine','K','Echols','','Elaine Echols','Albemarle County Dept. of Community Development','2','401 McIntire Road','','Charlottesville','Virginia','','US','434-296-5823 x 3252','','eechols@albemarle.org','jeechols@verizon.net',0),(470,1,'2010-03-31 13:42:47','jbailey4','04052003','where were you born','manchester','Planner','Joanne','','Bailey','','Joanne Bailey','NAVFAC Mid-Atlantic','2','328 Spice Bush Court','','Chesapeake','Virginia','','US','','','joannembailey@gmail.com','',0),(471,1,'2010-03-31 14:11:32','kpaluck','anhinga54','Mother\'s maiden name','Sheline','Student/Graduate Ass','Kelly','M','Paluck','','','','1','1776 West Community Dr.','','Jupiter','Florida','','US','','','kmpaluck@gmail.com','mercury20@gmail.com',0),(472,1,'2010-03-31 14:17:47','DavidGoodman','bluethecat','my cat','blue','Bicycle & Pedestrian','David','J','Goodman','Mr.','David J Goodman','Arlington County','2','5400 20th Street N','','Arlington','Virginia','','US','703-533-2171','','daavman@gmail.com','dgoodman@arlingtonva.us',0),(473,1,'2010-03-31 14:19:41','JerylPhillips','thelorax','cats name','abby','City Planning Manage','Jeryl','R','Phillips','','Jeryl Rose Phillips, AICP','City of Norfolk','2','Dept. of Planning & Community Development','810 Union Street, Suite 508','Norfolk','Virginia','','US','757-664-6771','','jeryl.phillips@norfolk.gov','',0),(474,1,'2010-03-31 14:57:29','TerryONeill','newman','Place of Birth','Sequin, Texas','Director','Terry','P','ONeill','','Terry','City of Hampton','2','1 Franklin Street','Suite 603 ','Hampton ','Virginia','','US','757 727-6140','','toneill@hampton.gov','',0),(475,1,'2010-03-31 16:29:42','ESTUDIO','819320319','FIRST CAT\'S NAME','REX','Civil Engineer/Facil','George','L','Nelson','','George Nelson','NAVFAC Atlantic','2','4101 Bishops Place','','Portsmouth','Virginia','','US','757 483-2659','','george.l.nelson@navy.mil','harmonicstrings@verizon.net',0),(476,1,'2010-04-01 10:23:57','msalinas','x0424','Favorite Color','Black','Program ','Michael \"Miguel\"','','Salinas','','Miguel Salinas','Loudoun County Planning','1','1 Harrison Street, 3rd Fl','MSC 62, P.O. Box 7000','Leesburg','Virginia','','US','703-777-0246','703-777-0441','michael.salinas@loudoun.gov','jennifer.grimmell@loudoun.gov',0),(477,1,'2010-04-01 15:15:14','barzimm','sam&mojo18','high school mascot','indian','Chief Planner','Barbara','J','Zimmerman','MS','Barbara','Loudoun County Department of Building and Development','2','17572 Madison Avenue','','Hamilton','Virginia','','US','703-777-0395','703-771-5522','barbara.zimmerman@loudoun.gov','zbarbara93@yahoo.com',0),(478,1,'2010-04-01 16:45:36','timnorfolk','norfolktim','pet name','bunbun','Planning Director','Timothy','A','Youmans','','Tim','City of Winchester','1','15 N Cameron St','','Winchester','Virginia','','US','540 667-1815','','tyoumans@ci.winchester.va.us','midgetim@verizon.net',0),(479,1,'2010-04-02 08:20:34','troyfrew','nomoref00f','test','test','','troy','','frew','','','','1','123 test','','test','Virginia','','US','','','troy.frew@neteasyinc.com','',0),(480,1,'2010-04-02 09:35:27','cprice','pippin103','What shape is our roof?','Flying nun\'s hat','Executive Director','Christopher','M','Price','','Christopher Price','Northern Shenandoah Valley Regional Commission','2','103 E. 6th St.','','Front Royal','Virginia','','US','540-636-8800','540-635-4147','gcrigler@shentel.net','',0),(481,1,'2010-04-02 11:00:06','erosenb','il2satvi','Neighborhood','East Beach','Environmental Servic','Edwin','L','Rosenberg','','Lee Rosenberg','City of Norfolk','1','Rm 508 City Hall','810 Union Street','Norfolk','Virginia','','US','757-664-4373','757-664-4370','lee.rosenberg@norfolk.gov','',0),(482,1,'2010-04-02 11:54:47','miraola','hcm123','Wife\'s Name','Brenda','Principal','Miguel','','Iraola','','Miguel','Hord Coplan Macht, Inc.','1','750 E. Pratt Street','Suite 1100','Baltimore','Maryland','','US','410-837-7311','410-837-6530','miraola@hcm2.com','pbiagi@hcm2.com',0),(483,1,'2010-04-02 11:59:12','mfitzsimmons','hcm123','Wife\'s Name','Laura','Planner','Matthew','','Fitzsimmons','','Matthew','Hord Coplan Macht, Inc.','2','750 E. Pratt Street','Suite 1100','Baltimore','Maryland','','US','410-837-7311','410-837-6530','mfitzsimmons@hcm2.com','pbiagi@hcm2.com',0),(484,1,'2010-04-02 12:16:14','davidbaxa','Vistatsi','Place of Birth ','Richmond ','','David ','','Baxa ','','David Baxa ','VISTAtsi ','2','13454 Sunrise Valley Drive ','Suite 110 A ','Herndon ','Virginia','','US','703-561-4161','','david.baxa@vistatsi.com','liana.siems@vistatsi.com',0),(485,1,'2010-04-02 12:17:43','LNewcomb','catalina42','mother\'s birthday','June 12,1925','Zoning Services Mana','Leonard','M','Newcomb ','III','Lenny Newcomb','City of Norfolk VA','1','1457 Hadlock Avenue','','Norfolk','Virginia','','US','757 664-4764','757 664 4748','lenny.newcomb@norfolk.gov','lmn3rd@cox.net',0),(486,1,'2010-04-02 14:37:48','aaronnorfolk','norfolkaaron','pet name','bunbun','student','Aaron','T','Youmans','','Aaron','Christopher Newport Univ','1','1000 University Place','Student Union Box 2350','Newport News','Virginia','','US','5404097823','','aaron.youmans.07@cnu.edu','',0),(487,1,'2010-04-02 16:10:45','piersonfe','verybigdog','Wife\'s maiden name','krieger','Encroachment Program','Fred','','Pierson','','Fred Pierson','U.S. Navy','1','4021 Buchanan Drive','','Hampton','Virginia','','US','','','piersonfe@aol.com','fred.pierson@navy.mil',0),(488,1,'2010-04-03 08:27:36','akhornung13','bdhrch13','ryans password','bluedog','','Andrea','K','Hornung','AICP','Andrea','Stafford County','2','9101 Wood Ibis Ct','','Spotsylvania','Virginia','','Un','5402732885','','akhornung13@hotmail.com','ahornung@co.stafford.va.us',0),(489,1,'2010-04-03 09:25:06','Snowshoe','Southgate','Name of cat','Snowshoe','County Supervisor','Benjamin ','T','Pitts','','Benjamin','Spotsylvania Co., Va. Board of Supervisors','1','207 Southgate Avenue','','Fredericksburg','Virginia','','US','540-735-7239','','bpitts@spotsylvania.va.us','',0),(490,1,'2010-04-05 09:40:37','APAoffice','registration10','What is your favorite color?','red','Executive Director','Robin','M','Morrison','','Robin Morrison','APA Virginia','1','2231 Oak Bay Lane','','Richmond','Virginia','','US','','','office@apavirginia.org','acs.robin@comcast.net',1),(491,1,'2010-04-05 11:27:03','lynne','Spring2010','mother\'s maiden name','Dickerson','Planner ','William','S','Daniel','Mr.','Sam Daniel','York County Development and Compliance','1','105 Service Drive','','Yorktown','Virginia','','US','757-890-3558','757-890-3759','lynne.mettler@yorkcounty.gov','',0),(492,1,'2010-04-05 12:15:15','juliamaitland','justatest','favorite color','red','','Julia','','Maitland','','Julia','APA Virginia','1','2231 Oak Bay Lane','','Richmond','Virginia','','US','','','acs.julia@comcast.net','',0),(493,1,'2010-04-05 12:56:26','bryanfogleman','4fghNB321','kid1','Hayley','','Bryan','','Fogleman','','','','1','8600 Quioccasin Rd. ','Suite 201','Richmond','Virginia','','US','804-740-73279','','bryan.fogleman@neteasyinc.com','',1),(494,1,'2010-04-05 13:55:19','wmoore','wmooreapava','employed with City since (year)? ','2001','Planner','William','M','Moore','','William Moore','City of WInchester','1','15 N Cameron St','','Winchester','Virginia','','US','540-667-1815','','wmoore@ci.winchester.va.us','',0),(495,1,'2010-04-05 14:47:23','Milly','19molly67','Mothers Maiden Name','Morgan','Planner','Milissa','','Story','','Milissa','York County','1','105 Service Drive','PO Box 532','Yorktown','Virginia','','US','757-890-3561','','milissa.story@yorkcounty.gov','',0),(496,1,'2010-04-05 15:13:02','kseckman','apavirginia','work address street name','main street','Director','Joan','K','Salvati','','Joan Salvati','Chesapeake Bay Local Assistance/Dept. of Conservation and Recreation','1','900 East Main Street','8th Floor','Richmond','Virginia','','US','804-225-3440','804225-3447','joan.salvati@dcr.virginia.gov','k.seckman@dcr.virginia.gov',0),(497,1,'2010-04-06 08:32:13','davidrouse','mikami','maiden name','alaska','Principal','David','','Rouse','Mr.','David Rouse','WRT','2','1700 Market Street','28th Floor','Philadelphia','Pennsylvan','','US','215-772-1465','215-732-2551','drouse@ph.wrtdesign.com','',0),(498,1,'2010-04-06 08:40:15','darbyma1','cpe116','what is my phone extension','116','Project Planner','MaryAshburn','','Darby','Miss','Mary Ashburn','Campbell & Paris Engineers','1','707 East Franklin','Suite C','Richmond','Virginia','','US','804-643-7000  Ext 11','','mdarby@campbell-paris.com','sshifflett@campbell-paris.com',0),(499,1,'2010-04-06 09:42:26','sara.hamberg@navy.mi','SaraAPAVirginia10','Where were you born?','Fairfax','Community Planner','Sara','E','Hamberg','','Sara Hamberg','NEPA Planner, Naval Facilities Engineering Command (NAVFAC)','1','501 New Hampshire Ave','','Norfolk','Virginia','','US','757-650-5570','','sara.hamberg@navy.mil','sara_hamberg@yahoo.com',0),(500,1,'2010-04-06 10:18:49','smcculloch','city47','what\'s your dog\'s name','jojo','Community Planner','Susan','E','McCulloch','','Susan McCulloch','City of Martinsville','1','PO Box 1112','55 West Church Street','Martinsville','Virginia','','US','276-403-5156','','smcculloch@ci.martinsville.va.us','smcculloch4@gmail.com',0),(501,1,'2010-04-06 10:30:15','trumley','chantel','what is your daughter\'s name?','chantel','Admin Associate II','Tonya','','Rumley','','Tonya Rumley','City of Martinsville','1','PO Box 1112','55 W Church Street','Martinsville','Virginia','','US','276-403-5380','','trumley@ci.martinsville.va.us','punky1076@comcast.net',0),(502,1,'2010-04-06 11:55:14','hamtownmanager','babynikey2k','Mother\'s Maiden Name','Brown','Town Manager','Peter','M','Stephenson','','Peter','Town of Smithfield','2','P.O. Box 246','310 Institute Street','Smithfield','Virginia','','US','757-365-9505','757-365-9508','pstephenson@smithfieldva.gov','p.stephenson@charter.net',0),(503,1,'2010-04-06 12:52:47','htwaddell','mama2108','What comes after Marion?','ClementeStargell','Principal','Hannah','W','Twaddell','','Hannah Twaddell','Renaissance Planning Group','1','455 Second St SE','Suite 300','Charlottesville','Virginia','','US','434-296-2554','','htwaddell@citiesthatwork.com','',0),(504,1,'2010-04-06 13:11:57','mroyal','mroyal04062010','what today is? ','Tuesday','Transportation Plann','Makayah','','Royal','','Makayah','DOT / FHWA / EFLHD','2','21400 Ridgetop Circle','','Sterling','Virginia','','US','703-948-1405','571-434-1550','makayah.royal@dot.gov','',0),(505,1,'2010-04-07 15:48:02','SStewart','stewart','What is my office number?','228','Senior Planner','Sarah','G','Stewart','','Sarah Stewart','Richmond Regional Planning District Commission','1','9211 Forest Hill Ave ','Suite 200','Richmond','Virginia','','US','8043232033','8043232025','qbrooks@richmondregional.org','',0),(506,1,'2010-04-07 16:13:37','jgreen','jgreen','who\'s jack','supervisor','AIP, Director ','Jack ','','Green','','Jack','King George Counry','2','10459 Courthouse Drive','Suite 104','King George ','Virginia','','US','540-775-8556','540-775-3139','jgreen@co.kinggeorge.state.va.us','tcox@co.kinggeorge.state.va.us',0),(507,1,'2010-04-07 16:18:00','shall','media','POB','POB','Assistant City  Mana','Steven','','Hall','','Steve Hall','City of Emporia','1','201 South Main Street','','Emporia','Virginia','','US','','','shall@ci.emporia.va.us','shall@ci.emporia.va.us',0),(508,1,'2010-04-08 08:23:03','Region2000','alexander','young son\'s name','trey','Admin Assist','Marjorie','P','Dunn','','Bob White','Region 2000 LGC','2','828 Main St. 12th Floor','','Lynchburg','Virginia','','US','434-845-3491','434-845-3493','mdunn@region2000.org','bwhite@region2000.org',0),(509,1,'2010-04-08 08:39:27','Region2000LGC','scottsmith','son\'s name','carter','Planner','William','S','Smith','','Scott Smith','Region 2000 LGC','1','828 Main St. 12th fl','','Lynchburg','Virginia','','US','434-845-3491','434-845-3493','mdunn@region.org','ssmith@region2000.org',0),(510,1,'2010-04-08 09:09:12','cooperash','wahoogrl','city of birth?','bristol','Principal of Cooper ','Erica','A','Cooper','','Ashley Cooper','Cooper Planning','2','304 7th Street SW','','Charlottesville','Virginia','','US','434-409-9127','','acooper@cooper-planning.com','',0),(511,1,'2010-04-08 09:15:54','EmilyGibson','dylan','What county do you work in?','Gloucester','Planner II','Emily','','Gibson','','Emily Gibson','County of Gloucester','1','P O Box 329','','Gloucester','Virginia','','US','804-693-3301','804-693-7037','egibson@gloucesterva.info','',0),(512,1,'2010-04-08 09:25:20','ChrisPerez','rockstar','What county do you work in?','Gloucester','Planner I','Christopher','P','Perez','','Christopher P. Perez','Gloucester County','1','P O Box 329','','Gloucester','Virginia','','US','804-693-0271','804-693-7037','cperez@gloucesterva.info','',0),(513,1,'2010-04-08 09:33:23','jvandyke','jump45','Name of nephew','Carter','Administrative Servi','Jennifer','A','VanDyke','Mrs.','Jennifer VanDyke','James City County','1','101 A Mounts Bay Road','','Williamsburg','Virginia','','US','757-253-6685','757-253-6822','jvandyke@james-city.va.us','jenavandyke@gmail.com',0),(514,1,'2010-04-08 09:52:04','mountain_one','gonorway','Childhood street','LeGrand','Manager of Transport','Susan','L','Wilson','','Susan L Wilson','City of Portsmouth','2','801 Crawford St.','','Portsmouth','Virginia','','US','757-393-8836','757-393-5223','wilsons@portsmouthva.gov','',0),(515,1,'2010-04-08 10:35:19','rojackson','Gold4Silver','mothers maiden name','Griffin','ADMINIISTRATIVE ASSI','Regina','O','Jackson','Ms.','','City of Portsmouth','1','801 Crawford Street','','Portsmouth','Virginia','','US','757 393-8836','757 393-5223','jacksonr@portsmouthva.gov','',0),(516,1,'2010-04-08 10:46:35','EllenCook','Snow2010','What is my cat\'s name?','Iola','','Ellen','G','Cook','','','','1','101-A Mounts Bay Road','P.O. Box 8784','Williamsburg','Virginia','','US','','','ellenc@james-city.va.us','',0),(517,1,'2010-04-08 11:11:22','shellmast','11454htc','Where were you born?','San Antonio, TX','Professor in Practic','Shelley','','Mastran','','Shelley','Virginia Tech','1','1021 Prince Street','','Alexandria','Virginia','','US','703-927-4584','','smastran@vt.edu','shellmast@comcast.net',0),(518,1,'2010-04-08 11:24:12','susanw','gonorway3','mother\'s maiden','pond','Manager of Transport','Susan','L','Wilson','','Susan L Wilson','City of Portsmouth','2','801 Crawford St.','','Portsmouth','Virginia','','US','757-393-8836','','susanw1976@gmail.com','',0),(519,1,'2010-04-08 11:43:29','Lreidenbach','Twister22','Mother\'s maiden name','Lawler','Senior Planner','Leanne','','Reidenbach','','Leanne','James City County','1','101 A Mounts Bay Road','','Williamsburg','Virginia','','US','(757)253-6876','','lreidenbach@james-city.va.us','',0),(520,1,'2010-04-08 11:57:26','JPurse','Truck3rs#1','Wife\'s maiden name','Coleman','Senior Planner','Jason','','Purse','','Jason','James City County','1','101 A Mounts Bay Road','','Williamsburg','Virginia','','US','(757)253-6689','','jpurse@james-city.va.us','',0),(521,1,'2010-04-08 12:04:09','WALESB','uppermill','mothers maiden name','haddock','Senior Urban Planner','Ben','','Wales','','Ben Wales','Cooley Godward Kronish','2','2403 Simpkins Farm Drive','','Herndon','Virginia','','US','7034568609','','bwales@cooley.com','',0),(522,1,'2010-04-08 12:43:36','JoseR','papai1970','favorite language','German','Planner','Jose-Ricardo','l','Ribeiro','','Jose-Ricardo','James City County','1','100 North Crenshaw ave','apt 6','Richmond','Virginia','','US','804-212-7946','','jribeiro@james-city.va.us','urbanne70@yahoo.com',0),(523,1,'2010-04-08 13:40:04','trosario','!SVerrir','First pet\'s name','Dusty','Principal Planner','Tammy','','Rosario','','Tammy Rosario','James City County Planning Division','2','101-A Mounts Bay Road','PO Box 8784','Williamsburg','Virginia','','US','757.253.6685','757.253.6822','trosario@james-city.va.us','',0),(524,1,'2010-04-08 13:51:58','vincigla','4altoids','how many?','four','Planner','Luke','','Vinciguerra','','Luke Vinciguerra','James City County','1','101A Mounts Bay Rd','','Williamsburg','Virginia','','US','7572536783','','lvinciguerra@james-city.va.us','triakis@yahoo.com',0),(525,1,'2010-04-08 14:01:32','spropst','Rust1dog','timeshare state','florida','Planner','Sarah','E','Propst','','Sarah Propst','James City County','2','101 Mounts Bay Road','Building A','Williamsburg','Virginia','','US','757-253-6692','757-253-6822','spropst@james-city.va.us','',0),(526,1,'2010-04-08 14:15:27','hmerke','gozto11@3-','Who was your maid of honor?','Laura MacLean','Senior Planner','Heidi','T','Merkel','Mrs.','Heidi','Fairfax County Dept. of Planning and Zoning','2','6028 23rd St. N','','Arlington','Virginia','','US','703-324-1383','','heidi.merkel@fairfaxcounty.gov','',0),(527,1,'2010-04-08 14:21:10','AnneDuceyOrtiz','emily','What county do you work in?','Gloucester','Planning Director','Anne','','Ducey-Ortiz','','Anne','Gloucester County','2','P O Box 329','','Gloucester','Virginia','','US','804-693-1216','804-693-7037','aducey@gloucesterva.info','',0),(528,1,'2010-04-08 14:58:43','CharlesJohnston','123abc','Dead Cat\'s name','Wilma','Planning Director','Charles','','Johnston','','Chuck','Clarke County ','2','101 Chalmers Court','','Berryville','Virginia','','US','540-955-5130','','cjohnston@clarkecounty.gov','',0),(529,1,'2010-04-08 15:30:46','cgrant','claudette','What is mother\'s maiden name?','Anderson','Senior Planner','Claudette','T','Grant','','Claudette Grant','Albemarle County','1','909 St. Charles Ave.','','Charlottesville','Virginia','','US','434-296-5832 ext. 32','434-972-4126','cgrant@albemarle.org','',0),(530,1,'2010-04-08 15:37:02','PeterWilliams','onebunn8','what is mighty man made of?','rubber','Planner III','Peter','B','Williams','','Peter Williams','City of Virginia Beach','2','1121 North Shore Road','','Norfolk','Virginia','','US','757 423-4243','','longdog2@aol.com','pbwillia@vbgov.com',0),(531,1,'2010-04-08 16:15:00','KateSipes','ch8r8k88','Luke\'s middle name','Thompson','Senior Planner','Kathryn','','Sipes','Ms.','Kate Sipes','James City County','1','101-A Mounts Bay Road','P.O. Box 8784','Williamsburg','Virginia','','US','757-253-6685','757-253-6878','ksipes@james.city.va.us','write2kates@gmail.com',0),(532,1,'2010-04-08 17:57:54','FrankDuke','Planner0','Mother\'s Maiden Name','McDonald','Planning Director','Frank','M','Duke','','Frank','City of Norfolk','2','810 Union Street','Suite 500','Norfolk','Virginia','','US','(757)664-4752','(757)664-4748','frank.duke@norfolk.gov','',0),(533,1,'2010-04-08 21:24:02','rakshavasudevan','Arccc1155!','What is my dog\'s name?','Gooch','','Raksha','','Vasudevan','','Raksha Vasudevan','Virginia Tech','1','2333 Colts Brook Drive','','Reston','Virginia','','US','','','reachraksha@gmail.com','',0),(534,1,'2010-04-09 09:25:27','apickard','calvin99','What kind of car?','Malibu','','Andy','','Pickard','','','','1','544 Deerneck Drive','','Chesapeake','Virginia','','US','','','acpickard@hotmail.com','',0),(535,1,'2010-04-09 10:05:58','jeremyfcamp','elidog','Cat\'s Name?','Vashka','Director','Jeremy','F','Camp','','Jeremy F. Camp','Louisa County','1','1 Woolfolk Avenue','','Louisa','Virginia','','US','5409673430','','jcamp@louisa.org','jeremyfcamp@yahoo.com',0),(536,1,'2010-04-09 10:11:59','VANESSAA','1Psalm6410','favorite scripture','Psalm6410','Planning & Zoning Di','Vanessa','A','Watson','','Vanessa Watson','City o fManassas Park','1','One Park Center Court','','Manassas Park','Virginia','','US','703-335-8820','','v.watson@manassasparkva.gov','',0),(537,1,'2010-04-09 10:14:04','davidholtzman','johndoe','County of residence?','Orange','Senior Planner','David','','Holtzman','','David Holtzman','Louisa County','1','1 woolfolk avenue','','Louisa ','Virginia','','US','540-967-3430','540-967-3486','dholtzman@louisa.org','',0),(538,1,'2010-04-09 11:08:23','mje7559','jesus123','First dog\'s name?','penny','County Planner','Matthew','','Ebinger','','Matthew','New Kent County','1','PO Box 50','','New Kent','Virginia','','US','804-966-9690','','mjebinger@co.newkent.state.va.us','',0),(539,1,'2010-04-09 11:37:25','david','maloney1','What is my title','deputy director','Deputy Director of P','David','P','Maloney','','David','Hanover County','2','P.O. Box 470','','Hanover','Virginia','','US','804-365-6171','804-365-6232','sdmills@co.hanover.va.us','',0),(540,1,'2010-04-09 12:00:12','janie','kaplan12','what is my job title','sr. planner','Sr. Planner','Janet ','P','Kaplan','','Janie','Hanover County','1','P.O. Box 470','','Hanover','Virginia','','US','804-365-6171','804-365-6232','jpkaplan@co.hanover.va.us','',0),(541,1,'2010-04-09 12:12:22','gretchen','biernot1','what is my job title','sr.planner','Sr. Planner/Applican','Gretchen','W','Biernot','','Gretchen','Hanover County','2','P.O. Box 470','','Hanover','Virginia','','US','804-365-6171','804-365-6232','gwbiernot@co.hanover.va.us','',0),(542,1,'2010-04-09 12:22:32','claudia','cheely12','what is my job title','sr.planner','Sr. Planner','Claudia','D','Cheely','','Claudia','Hanover County','2','P.O. Box 470','','Hanover','Virginia','','US','804-365-6171','804-365-6232','cdcheely@co.hanover.va.us','',0),(543,1,'2010-04-09 12:31:18','jeff','holland1','what is my job title','sr.planner','Sr. Planner','Jeff','P','Holland','','Jeff','Hanover County','2','P.O. Box 470','','Hanover','Virginia','','US','804-365-6171','804-365-6232','jpholland@co.hanover.va.us','',0),(544,1,'2010-04-09 12:46:59','boenaua','boenau234','what is login','AECOM login','Transportation Plann','Andrew','E','Boenau','','Andy','AECOM','1','4840 Cox Rd','','Glen Allen','Virginia','','US','804-515-8536','','andy.boenau@aecom.com','aboenau@gmail.com',0),(545,1,'2010-04-09 13:47:59','veryclaire','lollyjinx2','Elementary school name','Ryan','','Mary ','','Jones','','Claire','','2','723 Woodlake Dr','','Chesapeake','Virginia','','US','','','cjones@hrpdcva.gov','',0),(546,1,'2010-04-09 14:57:29','DanMc262','Hunter23','First Sailboat type','Hunter 23','Vice President','Dan','E','McKinney','','Dan','Campbell & Paris','2','104 Hubbard Street','','Blacksburg','Virginia','','US','540-961-0401','','dmckinney@campbell-paris.com','',0),(547,1,'2010-04-09 15:11:02','dmcgettigansr','virtualph','What\'s your favorite part of the newspaper?','dilbert','Planner','David','J','McGettigan','Sr., ','David McGettigan, AICP','Prince William County','2','8028 Folkstone Rd.','','Manassas','Virginia','','US','703-792-7189','703-792-4401','dmcgettigan@pwcgov.org','dmcgettigansr@comcast.net',0),(548,1,'2010-04-09 15:31:54','jaccordi','M1a2r3i4o','mname','Mengisen','Professo','John','','Accordino','PhD, ','John Accordino','Virginia Commonwealth University','2','923 West Franklin Street','Box 842018','Richmond','Virginia','','US','804-827-0525','','jaccordi@vcu.edu','',0),(549,1,'2010-04-09 15:35:16','jgahres','october31','first car','thor','Business Development','James','E','Gahres','','Jim','Prince William County Dept. of Economic Development','2','10530 Linden Lake Plaza, Suite 105','','Manassas','Virginia','','US','703-792-5505','703-792-5502','jgahres@pwcgov.org','',0),(550,1,'2010-04-09 16:19:04','scudderwagg','VW99jetta','First school','East Hill Christian','Planner','Frederick','E','Wagg','','F. E. Scudder Wagg','Michael Baker Jr, Inc.','2','1801 Bayberry Ct','Suite 101','Richmond','Virginia','','US','804-287-3161','804-285-8530','swagg@mbakercorp.com','scudderwagg@yahoo.com',0),(551,1,'2010-04-09 17:15:56','jlassiter','jlml1993','Who is my favorite co-worker?','David McGettigan','Planner','Lassiter','E','John','AICP','John Lassiter, AICP','Prince William County','2','10314 Abbott Rd','','Manassas','Virginia','','US','703-216-3444','703-792-4401','jlassiter@pwcgov.org','lassiter09@verizon.net',0),(552,1,'2010-04-09 22:20:35','jmcgowan','jmcg8105','favorite food','chocolate','Director of Planning','James','M','McGowan','','Jim McGowan','Accomack County','2','P.O. Box 686','','Accomac','Virginia','','US','','','jmcgowan@co.accomack.va.us','mcgowan1997@verizon.net',0),(553,1,'2010-04-10 13:57:41','rbolich','roseglen','first pet\'s name','charlie','Environmental Planne','Robert','','Bolich','','Rob Bolich, AICP','Ecology & Environment, Inc.','2','324 Southport Circle','Suite 103','Virginia Beach','Virginia','','US','757-456-5356','','rbolich@ene.com','',0),(554,1,'2010-04-10 21:31:04','scottdunn','edward01','mothers maiden name','stewart','Senior Project Manag','Wendell','S','Dunn','','Scott Dunn','Timmons Group','2','1001 Boulders Parkway','','Richmond','Virginia','','US','804-200-6955','804-560-1438','scott.dunn@timmons.com','',0),(555,1,'2010-04-11 10:45:24','tderrickson','twderrick1','first dog','jet','None','Tom','','Derrickson','','Tom Derrickson','','2','2804 Sassafras Ct','','Williamsburg','Virginia','','US','757-813-1067','757-258-2689','twderrickson@cox.net','dderrickson@cox.net',0),(556,1,'2010-04-11 11:31:37','pberge','jane3844','Mother\'s Maiden Name','Diersen','','Paul','','Berge','','Paul Berge','','2','31144 Bunting Point Road','','Melfa','Virginia','','US','757-787-3844','','eulaland@verizon.net','',0),(557,1,'2010-04-11 15:29:26','rkrapf','australia','Mother\'s maiden name','Eastgate','Planning Commissione','Richard','W','Krapf','','Rich Krapf','James-City County','1','2404 Forge Road','','Toano','Virginia','','US','757-220-7615','757-565-8965','rkrapf@james-city.va.us','',0),(558,1,'2010-04-11 19:26:53','sgbenson','4235+cheriton','Who is the first cat?','Paprika','','Sandra','G','Benson','','Sandra','Northampton County','2','P. O. Box 1196','','Eastville','Virginia','','US','757-678-0443 x522','757-678-0483','sbenson@co.northampton.va.us','s3benson@verizon.net',0),(559,1,'2010-04-11 20:57:48','robertson','crazyhorse','favorite food','chocolate','Senior Project Plann','Kay ','D','Robertson','','Kay D. Robertson','Town of Herndon','2','20919 Watermill Road','','Purcellville','Virginia','','US','7037878395','','krobertson24@comcast.net','',0),(560,1,'2010-04-11 21:28:58','AArtemel','france','birth city','La Rochelle','President','Agnes','P','Artemel','','Agnes','Artemel & Associates Inc.','1','2121 Eisenhower Avenue','Suite 200','Alexandria','Virginia','','US','703-683-2788','703-683-2789','apa@artemel.com','aartemel@gmail.com',0),(561,1,'2010-04-11 21:34:27','JMSchilling','Felice','My favorite Pet','Chloe','Associate Director','Joe','','Schilling','','Joe','Virginia Tech\'s Metropolitan Institute','1','1021 Prince','','Alexandria','Virginia','','US','703-706-8102','','jms33@vt.edu','',0),(562,1,'2010-04-12 07:48:05','tedmac23113','Uscgc281','High school mascot','mountie','Dir. of Governmental','George','','McCormack','','Ted','Virginia Association of Counties','2','1207 E. Main Street','','Richmond','Virginia','','US','804.343.2506','804.788.0083','tmccormack@vaco.org','',0),(563,1,'2010-04-12 09:42:26','Alexlee','Orlando10','Dog','Sarahlee','Communications Progr','Alexander','E','Lee','','Alex','CH2M Hill','2','6363 Walker Lane, Ste 500','','Arlington','Virginia','','US','571-483-2592','571-483-2601','a.lee@vamegaprojects.com','',0),(564,1,'2010-04-12 11:01:45','AnneMcClung','bunkieluv','Cat with charge card','bunkie','Planning and Buildin','Anne','L','McClung','','Anne McClung','Town of Blacksburg','2','400 South Main Street','','Blacskburg ','Virginia','','US','540-961-1183','540-951-0672','amcclung@blacksburg.gov','annemcclung@comcast.net',0),(565,1,'2010-04-12 11:58:27','saxplayer757','one02tenor','What is my mother\'s maiden name?','Mooney','','Benjamin','','McFarlane','','','','1','608 Colonial Ave Apt 4','','Norfolk','Virginia','','US','','','benjamin.mcfarlane@gmail.com','',0),(566,1,'2010-04-12 12:09:51','LisaLHardy','Bepeace1','Pet\'s name','Squirm','Environmental Planne','Lisa','L','Hardy','','Lisa Hardy','Hampton Roads Planning Dist. Com. ','1','912 Spotswood Ave','Apt. B1','Norfolk','Virginia','','US','','','lhardy@hrpdcva.gov','',0),(567,1,'2010-04-12 12:29:18','cr8tvgrl','creative','Mom\'s Name','Ethel','Senior Planner','Stacy','J','Porter','','Stacy J. Porter','City of Portsmouth','1','801 Crawford Street','','Portsmouth','Virginia','','US','7573938836','7573935223','porters@portsmouthva.gov','cr8tvgrl@gmail.com',0),(568,1,'2010-04-12 13:00:25','oauvang','Mtn2ocn1','from where?','from where?','VT - MURP student','Orient','R','Au-Vang','','Orient R. Au-Vang','Virginia Tech','1','P.O. Box 771','','Alexandria','Virginia','','US','571-225-8521','','oauvang@vt.edu','',0),(569,1,'2010-04-12 14:41:30','jlsewall','claymore17man','On what street did you grow up?','Winchester Way','','Jeremy','L','Sewall','','Jeremy Sewall','Virginia Tech','1','2021 Nordlie Pl','','Falls Church','Virginia','','US','703-635-4392','','jeremysewall@gmail.com','',0),(570,1,'2010-04-12 15:43:54','dskplanner','norfolkconf','how long have i worked in Orange County?','13 years','Interim Planning Dir','Deborah','S','Kendall','','Debbie Kendall','Orange County','2','128 W. Main Street','','Orange','Virginia','','US','5406724347','','dkendall@orangecountyva.gov','dkendall@orangecountyva.gov',0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_ceu_mapping`
--

DROP TABLE IF EXISTS `user_ceu_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_ceu_mapping` (
  `ceu_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  KEY `ceu_id` (`ceu_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `user_ceu_mapping_ibfk_1` FOREIGN KEY (`ceu_id`) REFERENCES `continuing_ed_item` (`id`),
  CONSTRAINT `user_ceu_mapping_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ceu_mapping`
--

LOCK TABLES `user_ceu_mapping` WRITE;
/*!40000 ALTER TABLE `user_ceu_mapping` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_ceu_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_registration_mapping`
--

DROP TABLE IF EXISTS `user_registration_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_registration_mapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `registration_option_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `registered_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `payment_method` varchar(15) NOT NULL,
  `payment_status` varchar(20) CHARACTER SET ucs2 DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `site_id` (`site_id`),
  KEY `registration_option_id` (`registration_option_id`),
  KEY `user_id` (`user_id`),
  KEY `event_id` (`event_id`),
  CONSTRAINT `user_registration_mapping_ibfk_1` FOREIGN KEY (`site_id`) REFERENCES `sites` (`id`),
  CONSTRAINT `user_registration_mapping_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1520 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_registration_mapping`
--

LOCK TABLES `user_registration_mapping` WRITE;
/*!40000 ALTER TABLE `user_registration_mapping` DISABLE KEYS */;
INSERT INTO `user_registration_mapping` VALUES (1313,1,14,30,437,'2010-03-25 12:15:26','0000-00-00 00:00:00','Paypal','Paid','Registered'),(1314,1,14,30,439,'2010-03-25 01:15:26','0000-00-00 00:00:00','Paypal','Paid','Registered'),(1316,1,14,30,438,'2010-03-25 01:10:46','0000-00-00 00:00:00','Check','Pending','Registered'),(1317,1,14,30,440,'2010-03-25 14:03:04','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1329,1,14,30,445,'2010-03-25 16:28:52','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1331,1,14,30,443,'2010-03-25 16:15:26','0000-00-00 00:00:00','Paypal','Paid','Registered'),(1334,1,14,30,446,'2010-03-25 17:27:01','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1335,1,16,38,446,'2010-03-25 17:27:01','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1336,1,14,30,447,'2010-03-26 08:03:48','0000-00-00 00:00:00','Check','Pending','Registered'),(1337,1,19,39,447,'2010-03-26 08:03:48','0000-00-00 00:00:00','Check','Pending','Registered'),(1338,1,14,30,442,'2010-03-26 08:28:51','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1340,1,14,30,441,'2010-03-26 09:27:05','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1341,1,16,38,441,'2010-03-26 09:27:05','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1342,1,14,31,449,'2010-03-26 11:15:40','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1343,1,14,31,449,'2010-03-26 11:21:24','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1344,1,14,30,448,'2010-03-26 12:21:50','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1347,1,14,36,452,'2010-03-26 16:57:42','2010-04-02 15:58:32','FreeEvent','Paid','Registered'),(1348,1,14,30,455,'2010-03-29 08:44:19','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1349,1,14,30,456,'2010-03-29 08:56:32','2010-04-09 14:55:18','PayPal','Paid','Registered'),(1350,1,14,30,457,'2010-03-29 13:39:02','2010-04-09 14:55:07','PayPal','Paid','Registered'),(1352,1,14,33,458,'2010-03-29 16:33:55','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1353,1,14,31,462,'2010-03-30 10:16:01','2010-04-09 14:54:04','PayPal','Paid','Registered'),(1354,1,14,30,463,'2010-03-30 10:58:04','2010-04-05 17:48:23','PayPal','Paid','Registered'),(1355,1,14,35,464,'2010-03-30 14:42:23','2010-04-09 14:53:49','PayPal','Paid','Registered'),(1358,1,14,30,466,'2010-03-31 11:52:14','0000-00-00 00:00:00','Check','Pending','Registered'),(1359,1,16,38,466,'2010-03-31 11:52:14','0000-00-00 00:00:00','Check','Pending','Registered'),(1360,1,14,36,437,'2010-03-31 12:26:44','2010-04-06 11:20:19','FreeEvent','Paid','Cancelled'),(1362,1,14,30,469,'2010-03-31 12:54:04','2010-04-09 14:53:28','PayPal','Paid','Registered'),(1363,1,19,39,469,'2010-03-31 12:54:04','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1365,1,14,30,470,'2010-03-31 13:43:06','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1366,1,14,30,471,'2010-03-31 14:13:53','2010-04-09 14:51:39','PayPal','Paid','Registered'),(1367,1,14,30,472,'2010-03-31 14:19:07','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1368,1,14,30,473,'2010-03-31 14:21:31','2010-04-09 14:50:06','PayPal','Paid','Registered'),(1369,1,15,37,473,'2010-03-31 14:21:31','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1370,1,14,30,474,'2010-03-31 14:58:48','2010-04-09 14:49:57','PayPal','Paid','Registered'),(1371,1,14,33,467,'2010-03-31 15:31:40','2010-04-09 14:53:39','PayPal','Paid','Registered'),(1373,1,14,31,460,'2010-03-31 15:58:56','0000-00-00 00:00:00','Check','Pending','Registered'),(1374,1,14,30,476,'2010-04-01 10:24:43','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1375,1,19,39,476,'2010-04-01 10:24:43','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1376,1,14,31,477,'2010-04-01 15:22:56','0000-00-00 00:00:00','Check','Pending','Registered'),(1377,1,14,30,478,'2010-04-01 16:47:34','0000-00-00 00:00:00','Check','Pending','Registered'),(1378,1,14,36,479,'2010-04-02 08:20:53','2010-04-02 08:24:23','FreeEvent','Free','Cancelled'),(1379,1,14,30,480,'2010-04-02 09:42:36','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1380,1,14,36,481,'2010-04-02 11:01:53','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1381,1,14,36,482,'2010-04-02 11:56:10','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1382,1,14,36,483,'2010-04-02 11:59:26','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1383,1,14,36,485,'2010-04-02 12:19:25','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1384,1,14,30,484,'2010-04-02 12:36:25','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1385,1,14,30,486,'2010-04-02 14:38:19','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1386,1,14,36,487,'2010-04-02 16:11:31','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1387,1,14,30,488,'2010-04-03 08:28:24','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1388,1,14,30,454,'2010-04-03 20:31:06','2010-04-09 14:57:15','PayPal','Paid','Registered'),(1389,1,19,39,454,'2010-04-03 20:31:06','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1390,1,19,39,491,'2010-04-05 11:32:48','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1391,1,14,32,491,'2010-04-05 11:38:07','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1396,1,14,33,494,'2010-04-05 13:56:07','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1397,1,14,35,495,'2010-04-05 14:47:56','2010-04-06 11:22:48','PayPal','Paid','Registered'),(1398,1,14,32,497,'2010-04-06 08:33:26','2010-04-09 14:42:09','PayPal','Paid','Registered'),(1399,1,14,30,498,'2010-04-06 08:44:41','0000-00-00 00:00:00','Check','Pending','Registered'),(1400,1,14,30,500,'2010-04-06 10:19:33','2010-04-09 14:41:56','PayPal','Paid','Registered'),(1401,1,16,38,500,'2010-04-06 10:19:33','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1402,1,16,38,501,'2010-04-06 10:30:35','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1403,1,14,30,501,'2010-04-06 10:34:46','2010-04-09 14:41:52','PayPal','Paid','Registered'),(1406,1,14,31,502,'2010-04-06 11:57:41','0000-00-00 00:00:00','Check','Pending','Registered'),(1408,1,14,30,503,'2010-04-06 12:55:15','2010-04-09 14:39:49','PayPal','Paid','Registered'),(1409,1,15,37,503,'2010-04-06 12:55:15','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1410,1,19,39,503,'2010-04-06 12:55:15','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1411,1,14,30,504,'2010-04-06 13:12:44','0000-00-00 00:00:00','Check','Pending','Registered'),(1412,1,14,36,493,'2010-04-06 13:27:42','2010-04-09 14:43:56','FreeEvent','Paid','Cancelled'),(1413,1,14,32,493,'2010-04-06 13:28:11','2010-04-09 14:44:00','PayPal','Paid','Cancelled'),(1419,1,14,30,505,'2010-04-07 15:48:58','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1420,1,16,38,505,'2010-04-07 15:48:58','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1421,1,16,38,505,'2010-04-07 15:50:20','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1422,1,16,38,505,'2010-04-07 15:51:25','0000-00-00 00:00:00','Check','Pending','Registered'),(1423,1,14,30,506,'2010-04-07 16:16:10','2010-04-09 14:38:16','PayPal','Paid','Registered'),(1424,1,14,31,507,'2010-04-07 16:18:38','0000-00-00 00:00:00','Check','Pending','Registered'),(1428,1,14,30,508,'2010-04-08 08:24:42','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1429,1,14,30,509,'2010-04-08 08:39:45','0000-00-00 00:00:00','Check','Pending','Registered'),(1430,1,15,37,509,'2010-04-08 08:40:42','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1431,1,14,31,510,'2010-04-08 09:11:38','2010-04-09 14:38:02','PayPal','Paid','Registered'),(1432,1,14,30,511,'2010-04-08 09:18:45','0000-00-00 00:00:00','Check','Pending','Registered'),(1433,1,14,30,512,'2010-04-08 09:25:48','0000-00-00 00:00:00','Check','Pending','Registered'),(1441,1,14,30,514,'2010-04-08 09:53:58','0000-00-00 00:00:00','Check','Pending','Registered'),(1442,1,14,33,513,'2010-04-08 09:56:09','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1443,1,14,30,515,'2010-04-08 10:35:59','2010-04-09 14:35:49','PayPal','Paid','Registered'),(1444,1,14,36,436,'2010-04-08 10:37:24','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1445,1,14,31,516,'2010-04-08 10:49:02','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1446,1,14,32,517,'2010-04-08 11:12:29','0000-00-00 00:00:00','Check','Pending','Registered'),(1447,1,14,30,518,'2010-04-08 11:25:05','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1448,1,14,31,519,'2010-04-08 11:44:22','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1449,1,14,31,520,'2010-04-08 11:59:24','2010-04-09 14:31:25','PayPal','Paid','Registered'),(1450,1,14,31,521,'2010-04-08 12:04:59','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1451,1,14,33,522,'2010-04-08 12:46:37','2010-04-09 14:30:49','PayPal','Paid','Registered'),(1452,1,14,32,523,'2010-04-08 13:44:38','2010-04-09 14:30:23','PayPal','Paid','Registered'),(1453,1,14,31,524,'2010-04-08 13:53:07','2010-04-09 14:30:11','PayPal','Paid','Registered'),(1454,1,14,34,525,'2010-04-08 14:05:50','2010-04-09 14:30:07','PayPal','Paid','Registered'),(1455,1,14,33,529,'2010-04-08 15:32:09','2010-04-09 14:28:50','PayPal','Paid','Registered'),(1456,1,14,31,530,'2010-04-08 15:37:34','2010-04-09 14:28:27','PayPal','Paid','Registered'),(1457,1,14,30,528,'2010-04-08 15:45:55','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1458,1,16,38,528,'2010-04-08 15:45:55','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1459,1,14,31,531,'2010-04-08 16:17:42','2010-04-09 14:28:15','PayPal','Paid','Registered'),(1460,1,14,31,532,'2010-04-08 17:58:53','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1461,1,14,36,533,'2010-04-08 21:27:02','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1462,1,14,32,533,'2010-04-08 21:30:16','0000-00-00 00:00:00','Check','Pending','Registered'),(1463,1,14,30,527,'2010-04-09 08:24:47','0000-00-00 00:00:00','Check','Pending','Registered'),(1464,1,14,31,534,'2010-04-09 09:26:26','2010-04-09 14:27:24','PayPal','Paid','Registered'),(1465,1,14,35,535,'2010-04-09 10:09:03','0000-00-00 00:00:00','Check','Pending','Registered'),(1466,1,14,30,536,'2010-04-09 10:13:13','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1467,1,14,34,537,'2010-04-09 10:14:23','0000-00-00 00:00:00','Check','Pending','Registered'),(1468,1,14,32,538,'2010-04-09 11:09:15','2010-04-09 14:27:06','PayPal','Paid','Registered'),(1469,1,14,31,539,'2010-04-09 11:40:30','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1470,1,16,38,539,'2010-04-09 11:40:30','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1471,1,14,34,540,'2010-04-09 12:00:40','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1472,1,16,38,540,'2010-04-09 12:00:40','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1473,1,14,34,541,'2010-04-09 12:13:11','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1474,1,16,38,541,'2010-04-09 12:13:11','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1475,1,14,33,542,'2010-04-09 12:23:27','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1476,1,15,37,542,'2010-04-09 12:23:27','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1477,1,14,33,543,'2010-04-09 12:31:49','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1478,1,14,30,544,'2010-04-09 12:48:28','0000-00-00 00:00:00','Check','Pending','Registered'),(1479,1,15,37,545,'2010-04-09 13:58:17','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1480,1,14,30,545,'2010-04-09 13:58:55','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1481,1,15,37,545,'2010-04-09 13:58:55','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1482,1,14,30,451,'2010-03-26 11:51:28','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1483,1,14,32,546,'2010-04-09 15:00:52','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1484,1,16,38,546,'2010-04-09 15:00:52','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1485,1,14,30,547,'2010-04-09 15:12:02','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1486,1,14,34,548,'2010-04-09 15:32:50','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1487,1,15,37,549,'2010-04-09 15:38:03','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1488,1,16,38,549,'2010-04-09 15:38:03','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1489,1,15,37,549,'2010-04-09 15:40:20','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1490,1,16,38,549,'2010-04-09 15:40:20','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1491,1,14,33,550,'2010-04-09 16:19:52','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1492,1,14,30,551,'2010-04-09 17:17:22','0000-00-00 00:00:00','Check','Pending','Registered'),(1493,1,14,30,552,'2010-04-09 22:21:36','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1494,1,16,38,552,'2010-04-09 22:21:36','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1495,1,19,39,552,'2010-04-09 22:21:36','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1496,1,14,30,553,'2010-04-10 14:02:56','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1497,1,16,38,553,'2010-04-10 14:02:56','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1498,1,14,30,554,'2010-04-10 21:32:11','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1499,1,14,33,555,'2010-04-11 10:46:01','0000-00-00 00:00:00','Check','Pending','Registered'),(1500,1,14,30,556,'2010-04-11 11:34:40','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1501,1,14,31,557,'2010-04-11 15:30:43','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1502,1,14,33,558,'2010-04-11 19:27:51','0000-00-00 00:00:00','Check','Pending','Registered'),(1503,1,16,38,559,'2010-04-11 20:58:39','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1504,1,16,38,559,'2010-04-11 21:00:07','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1505,1,14,30,559,'2010-04-11 21:03:44','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1506,1,16,38,559,'2010-04-11 21:03:44','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1507,1,14,34,560,'2010-04-11 21:29:45','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1508,1,14,36,561,'2010-04-11 21:35:09','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1509,1,14,30,562,'2010-04-12 07:48:34','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1510,1,14,30,563,'2010-04-12 09:46:11','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1511,1,14,30,564,'2010-04-12 11:02:50','0000-00-00 00:00:00','Check','Pending','Registered'),(1512,1,14,30,565,'2010-04-12 11:59:04','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1513,1,15,37,565,'2010-04-12 11:59:04','0000-00-00 00:00:00','PayPal','Paid','Registered'),(1514,1,14,31,566,'2010-04-12 12:10:57','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1515,1,14,33,567,'2010-04-12 12:30:32','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1516,1,14,36,568,'2010-04-12 13:04:21','0000-00-00 00:00:00','FreeEvent','Free','Registered'),(1517,1,14,30,569,'2010-04-12 14:42:04','0000-00-00 00:00:00','Check','Pending','Registered'),(1518,1,14,30,570,'2010-04-12 15:50:36','0000-00-00 00:00:00','PayPal','Pending','Registered'),(1519,1,16,38,570,'2010-04-12 15:50:36','0000-00-00 00:00:00','PayPal','Pending','Registered');
/*!40000 ALTER TABLE `user_registration_mapping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `id` int(5) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
INSERT INTO `user_roles` VALUES (1,'Member'),(2,'Non-Member'),(3,'Speaker'),(4,'Student');
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-04-13 13:59:57
