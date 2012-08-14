-- MySQL dump 10.13  Distrib 5.5.24, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bemo
-- ------------------------------------------------------
-- Server version	5.5.24-0ubuntu0.12.04.1

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
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `desc` varchar(500) NOT NULL,
  `social_lastfm` varchar(100) NOT NULL DEFAULT '0',
  `social_youtube` varchar(100) NOT NULL DEFAULT '0',
  `social_vimeo` varchar(100) NOT NULL DEFAULT '0',
  `social_soundcloud` varchar(100) NOT NULL DEFAULT '0',
  `social_bandcamp` varchar(100) NOT NULL DEFAULT '0',
  `social_facebook` varchar(100) NOT NULL DEFAULT '0',
  `social_twitter` varchar(100) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist`
--

LOCK TABLES `artist` WRITE;
/*!40000 ALTER TABLE `artist` DISABLE KEYS */;
INSERT INTO `artist` VALUES (1,'Dreamers','We are all dreamers dreeaaaming','last.fm/last','www.youtube.com/test','vimeo.com/vimeo','soundcloud.com/sc','bandcamp.com/bc','facebook.com/fb','twitter.com/tw','2012-07-28 08:00:51','/images/artist/2-Lelouch-Lamperouge1.jpg'),(2,'Archer','King of thrones','last.fm/archer','','','soundcloud.com/archer','','','twitter.com/archer','2012-07-28 08:04:57','/images/artist/Ichigo-kurosaki-ichigo-15959170-640-480.jpg'),(3,'Bemo','Bemobemobemo','','','','','','','','2012-07-28 09:46:54','/images/artist/Kurosaki_Ichigo_Chibi_Bleach.JPG'),(4,'Kyle','Badass','lastfm','','','','','','','2012-08-07 21:16:24','/images/artist/Luffy-one-piece-7934118-704-395.jpg'),(5,'Kyle','Badass','','','','','','','','2012-08-07 21:17:27','/images/artist/Luffy-one-piece-7934118-704-3951.jpg'),(6,'Bakemono','It\'s a monster','','','','','','','','2012-08-14 17:00:57','/images/artist/nisemonogatari-11_02.jpg'),(7,'Shika','Another horror','','','','','','','','2012-08-14 17:17:09','/images/artist/nisemonogatari-11.jpg');
/*!40000 ALTER TABLE `artist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `artist_social`
--

DROP TABLE IF EXISTS `artist_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artist_social` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `artist_id` int(10) NOT NULL,
  `social_id` int(1) NOT NULL,
  `desc` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artist_social`
--

LOCK TABLES `artist_social` WRITE;
/*!40000 ALTER TABLE `artist_social` DISABLE KEYS */;
/*!40000 ALTER TABLE `artist_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign`
--

DROP TABLE IF EXISTS `campaign`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `desc` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(100) DEFAULT NULL,
  `round` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  `campaign_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign`
--

LOCK TABLES `campaign` WRITE;
/*!40000 ALTER TABLE `campaign` DISABLE KEYS */;
INSERT INTO `campaign` VALUES (1,'Bempop','Pop stardom','2012-08-07 20:13:21','/images/campaign/My-Neighbor-Totoro-Wallpaper-Anime-HD-Widescreen-Wallpapers-1920-1080.jpg',1,1,1),(2,'Bempop','Pop stardom','2012-08-07 20:13:21','/images/campaign/bleach_ichigo00371.jpg',2,0,1),(3,'Bempop','Pop stardom','2012-08-07 20:13:21','/images/campaign/bleach_ichigo00371.jpg',3,0,1),(4,'Nise','Monogatari','2012-08-11 12:46:02','/images/campaign/nisemonogatari_0000933_thumb.jpg',1,1,2),(5,'Nise','Monogatari','2012-08-11 12:46:02','/images/campaign/nisemonogatari_0000933_thumb.jpg',2,0,2),(6,'Nise','Monogatari','2012-08-11 12:46:02','/images/campaign/nisemonogatari_0000933_thumb.jpg',3,0,2);
/*!40000 ALTER TABLE `campaign` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_artists`
--

DROP TABLE IF EXISTS `campaign_artists`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_artists` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(10) NOT NULL,
  `artist_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_artists`
--

LOCK TABLES `campaign_artists` WRITE;
/*!40000 ALTER TABLE `campaign_artists` DISABLE KEYS */;
INSERT INTO `campaign_artists` VALUES (1,2,2),(2,2,1),(3,2,3),(4,1,1),(5,2,6),(6,2,7);
/*!40000 ALTER TABLE `campaign_artists` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `artist_id` int(10) NOT NULL,
  `campaign_id` int(10) NOT NULL,
  `payment_id` int(10) NOT NULL,
  `amount` float NOT NULL,
  `status` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social`
--

LOCK TABLES `social` WRITE;
/*!40000 ALTER TABLE `social` DISABLE KEYS */;
INSERT INTO `social` VALUES (1,'LastFm'),(2,'Vimeo'),(3,'Youtube'),(4,'Facebook'),(5,'Twitter'),(6,'Soundcloud'),(7,'Bandcamp');
/*!40000 ALTER TABLE `social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `role` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Bemo','05ad5d715855a16b1b91a58dd9ad7b09','bemo@bemo.fm','I am Bemo',1,'2012-07-24 19:20:16');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_role`
--

DROP TABLE IF EXISTS `user_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_role`
--

LOCK TABLES `user_role` WRITE;
/*!40000 ALTER TABLE `user_role` DISABLE KEYS */;
INSERT INTO `user_role` VALUES (1,'Admin'),(2,'Label'),(3,'Artist'),(4,'Promoter'),(5,'User');
/*!40000 ALTER TABLE `user_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vote`
--

DROP TABLE IF EXISTS `vote`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vote` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `artist_id` int(100) NOT NULL,
  `campaign_id` int(100) NOT NULL,
  `round` int(1) DEFAULT NULL,
  `ip` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vote`
--

LOCK TABLES `vote` WRITE;
/*!40000 ALTER TABLE `vote` DISABLE KEYS */;
/*!40000 ALTER TABLE `vote` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-08-14 21:30:40
