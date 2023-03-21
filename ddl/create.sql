-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for osx10.10 (x86_64)
--
-- Host: localhost    Database: siumas
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `m_keluarga`
--

DROP TABLE IF EXISTS `m_keluarga`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_keluarga` (
  `keluarga_id` int(32) NOT NULL AUTO_INCREMENT,
  `keluarga_name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `no_kk` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `member_count` int(5) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`keluarga_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_keluarga`
--

LOCK TABLES `m_keluarga` WRITE;
/*!40000 ALTER TABLE `m_keluarga` DISABLE KEYS */;
INSERT INTO `m_keluarga` VALUES (1,'H. Febrianto (dul)','12341234','Jalan Cinere Raya',4,1,1);
/*!40000 ALTER TABLE `m_keluarga` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `m_users`
--

DROP TABLE IF EXISTS `m_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `m_users` (
  `user_id` int(32) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `role_id` int(2) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `nik` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `user_fullname` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `m_users`
--

LOCK TABLES `m_users` WRITE;
/*!40000 ALTER TABLE `m_users` DISABLE KEYS */;
INSERT INTO `m_users` VALUES (-1,'admin','$2y$10$V4mwUxNRUsgh9THrLTUAWelaV25xRSIlVE//kvLi/lipuKKHwgZ06',11,'2023-03-21 08:15:44','123123123','Admin'),(2,'febrianto','$2y$10$Rs4lYy1cU5ZtREymToz2KuzJJEpe8YCD4PEe3NntYMV6srOZrkMN2',22,'2023-03-21 08:50:06','121248721091248219489018240912','Febriantos');
/*!40000 ALTER TABLE `m_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengeluaran_images`
--

DROP TABLE IF EXISTS `pengeluaran_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengeluaran_images` (
  `pengeluaran_image_id` int(32) NOT NULL AUTO_INCREMENT,
  `pengeluaran_id` int(32) DEFAULT NULL,
  `path` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  PRIMARY KEY (`pengeluaran_image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengeluaran_images`
--

LOCK TABLES `pengeluaran_images` WRITE;
/*!40000 ALTER TABLE `pengeluaran_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengeluaran_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_iuran`
--

DROP TABLE IF EXISTS `t_iuran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_iuran` (
  `iuran_id` int(32) NOT NULL AUTO_INCREMENT,
  `amount` int(32) DEFAULT NULL,
  `type` int(2) DEFAULT NULL,
  `paid_date` datetime DEFAULT NULL,
  `due_date` datetime DEFAULT NULL,
  `keluarga_id` int(32) DEFAULT NULL,
  `total_amount` int(32) DEFAULT NULL,
  `denda_amount` int(32) DEFAULT NULL,
  PRIMARY KEY (`iuran_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_iuran`
--

LOCK TABLES `t_iuran` WRITE;
/*!40000 ALTER TABLE `t_iuran` DISABLE KEYS */;
INSERT INTO `t_iuran` VALUES (3,5000,20,NULL,'2023-03-20 23:59:59',1,5000,0),(4,10000,10,NULL,'2023-02-21 23:59:59',1,10000,0);
/*!40000 ALTER TABLE `t_iuran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_pengeluaran`
--

DROP TABLE IF EXISTS `t_pengeluaran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_pengeluaran` (
  `pengeluaran_id` int(32) NOT NULL AUTO_INCREMENT,
  `pengeluaran_name` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pengeluaran_description` text COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `pengeluaran_date` datetime DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp(),
  `amount` int(32) DEFAULT NULL,
  PRIMARY KEY (`pengeluaran_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_pengeluaran`
--

LOCK TABLES `t_pengeluaran` WRITE;
/*!40000 ALTER TABLE `t_pengeluaran` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_pengeluaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'siumas'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-21  8:51:49
