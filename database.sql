-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: take_home_test
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.13.10.1

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
-- Table structure for table `access_credential`
--

DROP TABLE IF EXISTS `access_credential`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `access_credential` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `profile_id` int(10) unsigned NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` enum('pending','inactive','active','deleted') NOT NULL DEFAULT 'pending',
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `access_credential_fk1` (`profile_id`),
  KEY `access_credential_ix1` (`status`,`username`,`password`),
  CONSTRAINT `access_credential_fk1` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `access_credential`
--

LOCK TABLES `access_credential` WRITE;
/*!40000 ALTER TABLE `access_credential` DISABLE KEYS */;
INSERT INTO `access_credential` VALUES (1,5,'login','pass','active','2014-06-13 00:00:00'),(2,6,'test','test','active','2014-06-13 00:00:00'),(3,7,'abt','password','active','2014-06-13 00:00:00');
/*!40000 ALTER TABLE `access_credential` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `address_line` varchar(80) NOT NULL,
  `city` varchar(80) NOT NULL,
  `state` char(2) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `status` enum('pending','active','inactive','deleted') NOT NULL DEFAULT 'pending',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `address_ix1` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (1,'123 Main St','Raleigh','NC','27613','active','2014-06-13 00:00:00'),(2,'1600 Pennsylvania Ave','Washinton DC','DC','20500','active','2014-06-13 00:00:00'),(3,'8015 Creedmoor Rd Suite 101','Raleigh','NC','27613','active','2014-06-13 00:00:00'),(4,'100 Main Blvd','New York','NY','10055','active','2014-06-13 00:00:00'),(5,'13579 Busy St','Atlanta','GA','30322','active','2014-06-13 00:00:00'),(6,'4401 Tipperary Dr','Raleigh','NC','27604','active','2014-06-13 00:00:00'),(7,'3805 Knickerbocker Parkway','Raleigh','NC','27612','active','2014-06-13 00:00:00'),(8,'Address','City','CA','27613','active','2014-06-13 00:00:00');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(80) DEFAULT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `middle_initial` char(1) DEFAULT NULL,
  `contact_phone_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `address_id` int(10) unsigned DEFAULT NULL,
  `status` enum('pending','active','inactive','deleted') NOT NULL DEFAULT 'pending',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `profile_ix1` (`status`),
  KEY `profile_ix2` (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (5,'William','Bonar','R','919-785-9732','bill@atlanticbt.com',1,'active','2014-06-13 00:00:00'),(6,'Jeremy','Wiggins','','','wiggs@email.com',6,'active','2014-06-13 00:00:00'),(7,'Daryl','Hemeon','','','d.hemoen@fake.com',7,'active','2014-06-13 00:00:00'),(8,'Barak','Obama','','','president@whitehouse.gov',2,'active','2014-06-13 00:00:00'),(9,'John','Public','Q','555-555-5555','',8,'active','2014-06-13 00:00:00'),(10,'John','Doe','','','',NULL,'active','2014-06-13 00:00:00'),(11,'James','Red','','','',NULL,'active','2014-06-13 00:00:00'),(12,'George','Bones','','','',NULL,'active','2014-06-13 00:00:00');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-13 15:29:24
