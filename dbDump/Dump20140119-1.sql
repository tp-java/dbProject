CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 5.5.32, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: mydb
-- ------------------------------------------------------
-- Server version	5.5.32-0ubuntu0.12.04.1

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
-- Table structure for table `Calls`
--

DROP TABLE IF EXISTS `Calls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Calls` (
  `idCalls` int(11) NOT NULL,
  `client` int(11) NOT NULL,
  `emloyer` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `duration` time NOT NULL,
  `comment` text,
  `result` enum('send_offer','offer_approve','deal','money_waiting','closed','fail') NOT NULL,
  PRIMARY KEY (`idCalls`),
  KEY `client_idx` (`client`),
  KEY `employer_idx` (`emloyer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Calls`
--

LOCK TABLES `Calls` WRITE;
/*!40000 ALTER TABLE `Calls` DISABLE KEYS */;
/*!40000 ALTER TABLE `Calls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Clients`
--

DROP TABLE IF EXISTS `Clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Clients` (
  `idClients` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `l_name` varchar(100) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `status` enum('call','send_offer','offer_approve','deal','money_waiting','closed','fail') NOT NULL,
  `employer` int(11) NOT NULL,
  PRIMARY KEY (`idClients`),
  KEY `emloyer_idx` (`employer`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Clients`
--

LOCK TABLES `Clients` WRITE;
/*!40000 ALTER TABLE `Clients` DISABLE KEYS */;
INSERT INTO `Clients` VALUES (1,'Евгений','Петрович','Клиентский',NULL,'коммент','offer_approve',1),(2,'Евгений','Петрович','Клиентский','Семеновский проспект д.54','коммент','call',2),(3,'Семен','Петрович','Клиентский','Семеновский проспект д.54','коммент','send_offer',3),(4,'Григорий','Петрович','Клиентский','Семешовский проспект д.54','коммент','deal',4),(6,'Валентин','Петрович','Клиентский','Семшовский проспект д.44','коммент','send_offer',5);
/*!40000 ALTER TABLE `Clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Groups`
--

DROP TABLE IF EXISTS `Groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Groups` (
  `idGroups` int(11) NOT NULL AUTO_INCREMENT,
  `employer` int(11) NOT NULL,
  `manager` int(11) NOT NULL,
  PRIMARY KEY (`idGroups`),
  UNIQUE KEY `index2` (`employer`,`manager`),
  KEY `manager_idx` (`manager`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Groups`
--

LOCK TABLES `Groups` WRITE;
/*!40000 ALTER TABLE `Groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `Groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Offers`
--

DROP TABLE IF EXISTS `Offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Offers` (
  `idOffers` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `call` int(11) NOT NULL,
  `comment` text,
  `result` enum('approve','change','fail') NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`idOffers`),
  KEY `type_idx` (`type`),
  KEY `call_idx` (`call`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Offers`
--

LOCK TABLES `Offers` WRITE;
/*!40000 ALTER TABLE `Offers` DISABLE KEYS */;
/*!40000 ALTER TABLE `Offers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Offers_types`
--

DROP TABLE IF EXISTS `Offers_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Offers_types` (
  `idOffers_types` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  PRIMARY KEY (`idOffers_types`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Offers_types`
--

LOCK TABLES `Offers_types` WRITE;
/*!40000 ALTER TABLE `Offers_types` DISABLE KEYS */;
/*!40000 ALTER TABLE `Offers_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Sessions`
--

DROP TABLE IF EXISTS `Sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Sessions` (
  `sessionID` int(11) NOT NULL,
  `cookie` varchar(32) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`sessionID`),
  KEY `fk_table1_Users1_idx` (`userID`),
  CONSTRAINT `fk_table1_Users1` FOREIGN KEY (`userID`) REFERENCES `Users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Sessions`
--

LOCK TABLES `Sessions` WRITE;
/*!40000 ALTER TABLE `Sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `Sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tel_numbers`
--

DROP TABLE IF EXISTS `Tel_numbers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tel_numbers` (
  `idTel_numbers` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(45) NOT NULL,
  `client` int(11) NOT NULL,
  PRIMARY KEY (`idTel_numbers`),
  UNIQUE KEY `number_UNIQUE` (`number`),
  KEY `client_idx` (`client`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tel_numbers`
--

LOCK TABLES `Tel_numbers` WRITE;
/*!40000 ALTER TABLE `Tel_numbers` DISABLE KEYS */;
INSERT INTO `Tel_numbers` VALUES (1,'+79248433834',1),(2,'+79248433833',2),(3,'+79248433811',3),(4,'+79248433856',4),(5,'+79248433866',5);
/*!40000 ALTER TABLE `Tel_numbers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `idUsers` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(100) NOT NULL,
  `s_name` varchar(100) NOT NULL,
  `l_name` varchar(100) NOT NULL,
  `role` enum('employer','manager') NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `bossID` int(11) DEFAULT NULL,
  PRIMARY KEY (`idUsers`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'Василий','Петрович','Звонилков','manager','коммент','vassa','vassa',NULL),(2,'Петр','Петрович','Менеджерович','employer','коммент','petya','petya',1),(3,'Костя','Петрович','Звонилков','employer','коммент','kostya','kostya',1),(4,'Геннадий','Петрович','Менеджерович','manager','коммент','gena','gena',NULL),(5,'Лёша','Петрович','Звонилков','employer','коммент','lyosha','lyosha',4);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-01-19 20:40:52
