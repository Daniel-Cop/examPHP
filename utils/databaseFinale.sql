-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: dauphineexam
-- ------------------------------------------------------
-- Server version	11.2.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imageUrl` varchar(250) DEFAULT NULL,
  `contenu` text NOT NULL,
  `titre` varchar(250) NOT NULL,
  `auteur` varchar(250) NOT NULL,
  `datePublication` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `annonce_id_uindex` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annonce`
--

/*!40000 ALTER TABLE `annonce` DISABLE KEYS */;
INSERT INTO `annonce` VALUES (1,'','Lorem ipsum docet merdam','Example','Daniel Coppi','2024-04-26 22:05:00'),(3,'imgs/css-662cd563b6620.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis nisl non nisi consectetur, quis imperdiet nisl feugiat. Nam feugiat ante sed felis vulputate, in dapibus lorem aliquet. Mauris ut felis eget ante egestas tincidunt at sed ligula. Nam in efficitur leo, et rhoncus justo. Nam urna ex, tincidunt non velit eget, ultrices eleifend diam. Fusce feugiat ex vel tempus volutpat. Ut pharetra euismod dolor vel fermentum. Sed nisi nisl, tristique vel enim ac, consectetur pharetra ipsum. Curabitur condimentum, risus a pretium interdum, mauris sem tincidunt ante, id rhoncus turpis elit sit amet est. Mauris tempor, libero eget finibus congue, justo augue malesuada est, vitae laoreet massa dui ac orci. Aenean in fringilla purus. Praesent urna nisi, efficitur nec laoreet vestibulum, posuere consectetur arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin faucibus ut lorem eget mattis.\r\n\r\nDonec placerat non libero sed faucibus. Curabitur tincidunt eu turpis ut pellentesque. In hac habitasse platea dictumst. Sed mattis placerat placerat. Etiam lacus libero, tincidunt at pharetra id, feugiat sed lacus. Sed pharetra sagittis nibh, at bibendum sapien cursus eget. Mauris varius lectus quis pulvinar lacinia. In luctus arcu non nisl venenatis, nec sagittis tellus tempor.\r\n\r\nAliquam condimentum dolor sit amet orci interdum, at ultrices arcu pretium. Vestibulum mollis quis erat quis aliquet. Nunc quis imperdiet ipsum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras id felis nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas dictum pretium vehicula. Duis tristique sem at ultricies gravida. Vestibulum hendrerit, nisi eu imperdiet commodo, erat est sollicitudin dolor, sit amet blandit diam justo ut dui.\r\n\r\nVivamus tincidunt luctus suscipit. Vestibulum quis malesuada est. Vestibulum et sem at arcu hendrerit scelerisque. In hac habitasse platea dictumst. Aliquam sagittis non libero lobortis finibus. Fusce lobortis consequat nisl ut luctus. Donec sem sapien, blandit sed ex tincidunt, aliquet ultricies nibh. Etiam at erat libero.','Test','Always me','2024-04-26 23:39:25'),(5,'imgs/Semi-colon-662cd58e47387.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis nisl non nisi consectetur, quis imperdiet nisl feugiat. Nam feugiat ante sed felis vulputate, in dapibus lorem aliquet. Mauris ut felis eget ante egestas tincidunt at sed ligula. Nam in efficitur leo, et rhoncus justo. Nam urna ex, tincidunt non velit eget, ultrices eleifend diam. Fusce feugiat ex vel tempus volutpat. Ut pharetra euismod dolor vel fermentum. Sed nisi nisl, tristique vel enim ac, consectetur pharetra ipsum. Curabitur condimentum, risus a pretium interdum, mauris sem tincidunt ante, id rhoncus turpis elit sit amet est. Mauris tempor, libero eget finibus congue, justo augue malesuada est, vitae laoreet massa dui ac orci. Aenean in fringilla purus. Praesent urna nisi, efficitur nec laoreet vestibulum, posuere consectetur arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin faucibus ut lorem eget mattis.\r\n\r\nDonec placerat non libero sed faucibus. Curabitur tincidunt eu turpis ut pellentesque. In hac habitasse platea dictumst. Sed mattis placerat placerat. Etiam lacus libero, tincidunt at pharetra id, feugiat sed lacus. Sed pharetra sagittis nibh, at bibendum sapien cursus eget. Mauris varius lectus quis pulvinar lacinia. In luctus arcu non nisl venenatis, nec sagittis tellus tempor.\r\n\r\nAliquam condimentum dolor sit amet orci interdum, at ultrices arcu pretium. Vestibulum mollis quis erat quis aliquet. Nunc quis imperdiet ipsum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras id felis nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas dictum pretium vehicula. Duis tristique sem at ultricies gravida. Vestibulum hendrerit, nisi eu imperdiet commodo, erat est sollicitudin dolor, sit amet blandit diam justo ut dui.\r\n\r\nVivamus tincidunt luctus suscipit. Vestibulum quis malesuada est. Vestibulum et sem at arcu hendrerit scelerisque. In hac habitasse platea dictumst. Aliquam sagittis non libero lobortis finibus. Fusce lobortis consequat nisl ut luctus. Donec sem sapien, blandit sed ex tincidunt, aliquet ultricies nibh. Etiam at erat libero.','We fear semi-colon','Secret','2024-04-27 12:38:06'),(6,'imgs/trustworthy-662cd5f706155.jpg','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed facilisis nisl non nisi consectetur, quis imperdiet nisl feugiat. Nam feugiat ante sed felis vulputate, in dapibus lorem aliquet. Mauris ut felis eget ante egestas tincidunt at sed ligula. Nam in efficitur leo, et rhoncus justo. Nam urna ex, tincidunt non velit eget, ultrices eleifend diam. Fusce feugiat ex vel tempus volutpat. Ut pharetra euismod dolor vel fermentum. Sed nisi nisl, tristique vel enim ac, consectetur pharetra ipsum. Curabitur condimentum, risus a pretium interdum, mauris sem tincidunt ante, id rhoncus turpis elit sit amet est. Mauris tempor, libero eget finibus congue, justo augue malesuada est, vitae laoreet massa dui ac orci. Aenean in fringilla purus. Praesent urna nisi, efficitur nec laoreet vestibulum, posuere consectetur arcu. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin faucibus ut lorem eget mattis.\r\n\r\nDonec placerat non libero sed faucibus. Curabitur tincidunt eu turpis ut pellentesque. In hac habitasse platea dictumst. Sed mattis placerat placerat. Etiam lacus libero, tincidunt at pharetra id, feugiat sed lacus. Sed pharetra sagittis nibh, at bibendum sapien cursus eget. Mauris varius lectus quis pulvinar lacinia. In luctus arcu non nisl venenatis, nec sagittis tellus tempor.\r\n\r\nAliquam condimentum dolor sit amet orci interdum, at ultrices arcu pretium. Vestibulum mollis quis erat quis aliquet. Nunc quis imperdiet ipsum. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras id felis nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas dictum pretium vehicula. Duis tristique sem at ultricies gravida. Vestibulum hendrerit, nisi eu imperdiet commodo, erat est sollicitudin dolor, sit amet blandit diam justo ut dui.\r\n\r\nVivamus tincidunt luctus suscipit. Vestibulum quis malesuada est. Vestibulum et sem at arcu hendrerit scelerisque. In hac habitasse platea dictumst. Aliquam sagittis non libero lobortis finibus. Fusce lobortis consequat nisl ut luctus. Donec sem sapien, blandit sed ex tincidunt, aliquet ultricies nibh. Etiam at erat libero.','Do i trust my self?','Me','2024-04-27 12:39:51');
/*!40000 ALTER TABLE `annonce` ENABLE KEYS */;

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `nom` varchar(250) NOT NULL,
  `prenom` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `utilisateur_id_uindex` (`id`),
  UNIQUE KEY `utilisateur_login_uindex` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateur`
--

/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` VALUES (1,'jose','Jose','Bove','$2y$10$nb4HrLsLMKZMWM.h2AWineffPz2H7r1PRJWkEkDkilm1GttbtLdmm');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

--
-- Dumping routines for database 'dauphineexam'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-27 12:58:24
