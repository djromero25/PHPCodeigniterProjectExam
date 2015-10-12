CREATE DATABASE  IF NOT EXISTS `friends` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `Friends`;
-- MySQL dump 10.13  Distrib 5.6.24, for osx10.8 (x86_64)
--
-- Host: 127.0.0.1    Database: Friends
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_friends_users1_idx` (`user_id`),
  KEY `fk_friends_users2_idx` (`friend_id`),
  CONSTRAINT `fk_friends_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_friends_users2` FOREIGN KEY (`friend_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (1,1,2,NULL,NULL),(2,1,3,NULL,NULL),(3,2,1,NULL,NULL),(4,3,1,NULL,NULL),(5,4,2,NULL,NULL),(7,2,4,NULL,NULL),(11,3,4,'2015-08-28 12:41:59','2015-08-28 12:41:59'),(12,4,3,'2015-08-28 12:41:59','2015-08-28 12:41:59'),(15,5,4,'2015-08-28 12:59:19','2015-08-28 12:59:19'),(16,4,5,'2015-08-28 12:59:19','2015-08-28 12:59:19'),(17,5,1,'2015-08-28 12:59:20','2015-08-28 12:59:20'),(18,1,5,'2015-08-28 12:59:20','2015-08-28 12:59:20');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `alias` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Daniel Romero','Daniel','daniel@daniel.com','password',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'Andrew Wang','Andrew','andrew@andrew.com','password',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'Eaton Wong','Eaton','eaton@eaton.com','password',NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'Kailin Gao','Kailin','kailin@kailin.com','password',NULL,NULL,NULL),(5,'Marie Spanish','Marie','marie@marie.com','password','1989-01-01','2015-08-28 12:50:43','2015-08-28 12:50:43'),(6,'','','','','0000-00-00','2015-08-28 13:24:33','2015-08-28 13:24:33'),(7,'test again','test','test@test.com','password','0000-00-00','2015-08-28 13:28:02','2015-08-28 13:28:02'),(8,'test again','test','test@test.com','password','0000-00-00','2015-08-28 13:29:15','2015-08-28 13:29:15');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-08-28 13:44:59
