-- MySQL dump 10.13  Distrib 5.7.20, for Linux (x86_64)
--
-- Host: localhost    Database: Photo_Gallery
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.04.1

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
-- Table structure for table `Album`
--

DROP TABLE IF EXISTS `Album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Album` (
  `Album_Name` varchar(255) NOT NULL,
  `Album_Description` varchar(255) DEFAULT 'No description provided',
  `date_time` varchar(255) DEFAULT NULL,
  `Size` int(11) DEFAULT '0',
  `Cover` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Privacy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Album`
--

LOCK TABLES `Album` WRITE;
/*!40000 ALTER TABLE `Album` DISABLE KEYS */;
INSERT INTO `Album` VALUES ('Cricket','Cricket Players','2019-05-23 20:47:26',5,'download.jpeg','swapnil159','public'),('SD_1007','No description provided','2019-05-23 21:56:20',1,'download(13).jpeg','dixit_10','private'),('Sd10','Birthday','2019-05-23 21:57:12',2,'download(2).jpeg','dixit_10','public'),('Crc','Cricket','2019-05-23 21:59:12',3,'download(12).jpeg','swapnil159','public'),('Kushagra','No description provided','2019-05-23 22:02:21',4,'download(5).jpeg','kush159','public'),('India','Indian Cricketers','2019-05-23 22:03:38',2,'download(6).jpeg','kush159','private');
/*!40000 ALTER TABLE `Album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Album_Likes`
--

DROP TABLE IF EXISTS `Album_Likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Album_Likes` (
  `Username` varchar(255) NOT NULL,
  `Album_Name` varchar(255) NOT NULL,
  `Liked_By` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Album_Likes`
--

LOCK TABLES `Album_Likes` WRITE;
/*!40000 ALTER TABLE `Album_Likes` DISABLE KEYS */;
INSERT INTO `Album_Likes` VALUES ('swapnil159','Cricket','kush159'),('kush159','Kushagra','swapnil159');
/*!40000 ALTER TABLE `Album_Likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Likes`
--

DROP TABLE IF EXISTS `Likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Likes` (
  `Username` varchar(255) NOT NULL,
  `Album_Name` varchar(255) NOT NULL,
  `Photo_Name` varchar(255) NOT NULL,
  `Liked_By` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Likes`
--

LOCK TABLES `Likes` WRITE;
/*!40000 ALTER TABLE `Likes` DISABLE KEYS */;
INSERT INTO `Likes` VALUES ('swapnil159','Cricket','download(2).jpeg','kush159');
/*!40000 ALTER TABLE `Likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Photo`
--

DROP TABLE IF EXISTS `Photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Photo` (
  `Username` varchar(255) NOT NULL,
  `Album_Name` varchar(255) NOT NULL,
  `Photo_Name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `Description` varchar(255) DEFAULT 'No description provided',
  `Privacy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Username`,`Album_Name`,`Photo_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Photo`
--

LOCK TABLES `Photo` WRITE;
/*!40000 ALTER TABLE `Photo` DISABLE KEYS */;
INSERT INTO `Photo` VALUES ('dixit_10','Sd10','download(8).jpeg','2019-05-23 21:57:19','No description provided','public'),('dixit_10','Sd10','download.jpeg','2019-05-23 21:57:29','Its private','private'),('dixit_10','SD_1007','download(4).jpeg','2019-05-23 21:56:39','Its private','private'),('kush159','India','download(10).jpeg','2019-05-23 22:03:49','No description provided','public'),('kush159','India','download(9).jpeg','2019-05-23 22:03:44','No description provided','public'),('kush159','Kushagra','download(11).jpeg','2019-05-23 22:02:48','lol','public'),('kush159','Kushagra','download(7).jpeg','2019-05-23 22:03:09','No description provided','private'),('kush159','Kushagra','download(8).jpeg','2019-05-23 22:02:56','Hero','public'),('kush159','Kushagra','download.jpeg','2019-05-23 22:03:03','No description provided','public'),('swapnil159','Crc','download(2).jpeg','2019-05-23 21:59:19','No description provided','public'),('swapnil159','Crc','download(6).jpeg','2019-05-23 21:59:45','BOSS','private'),('swapnil159','Crc','download(9).jpeg','2019-05-23 21:59:37','Its Protected','protected'),('swapnil159','Cricket','download(1).jpeg','2019-05-23 20:49:59','No description provided','private'),('swapnil159','Cricket','download(2).jpeg','2019-05-23 20:50:10','Crc','public'),('swapnil159','Cricket','download(3).jpeg','2019-05-23 21:58:07','Greats','public'),('swapnil159','Cricket','download(6).jpeg','2019-05-23 21:58:14','king','public'),('swapnil159','Cricket','download(8).jpeg','2019-05-23 21:58:20','No description provided','private');
/*!40000 ALTER TABLE `Photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Register`
--

DROP TABLE IF EXISTS `Register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Register` (
  `First_Name` varchar(255) NOT NULL,
  `Last_Name` varchar(255) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_time` datetime DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Register`
--

LOCK TABLES `Register` WRITE;
/*!40000 ALTER TABLE `Register` DISABLE KEYS */;
INSERT INTO `Register` VALUES ('Shubham','Dixit','male','swapnilmahajan159@gmail.com','dixit_10','sdknowsthis',382938,'2019-05-23 22:04:39'),('Kushagra','Mahajan','male','goldensnake159@gmail.com','kush159','kishu',706531,'2019-05-23 21:24:38'),('Swapnil','Mahajan','male','swapnilmahajan159@gmail.com','swapnil159','swap',382938,'2019-05-23 22:04:39');
/*!40000 ALTER TABLE `Register` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-23 22:10:01
