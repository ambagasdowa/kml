-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: portal_users
-- ------------------------------------------------------
-- Server version	5.5.37-1

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

grant usage on portal_users.* to portal_users@localhost identified by '@portal_users#';
grant select, insert, update, delete, drop, alter, create temporary tables on portal_users.* to portal_users@localhost;
flush privileges;

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acos`
--

LOCK TABLES `acos` WRITE;
/*!40000 ALTER TABLE `acos` DISABLE KEYS */;
INSERT INTO `acos` VALUES (1,NULL,NULL,NULL,'controllers',1,98),(2,1,NULL,NULL,'Pages',2,15),(3,2,NULL,NULL,'display',3,4),(4,2,NULL,NULL,'add',5,6),(5,2,NULL,NULL,'edit',7,8),(6,2,NULL,NULL,'index',9,10),(7,2,NULL,NULL,'view',11,12),(8,2,NULL,NULL,'delete',13,14),(9,1,NULL,NULL,'Users',16,33),(10,9,NULL,NULL,'index',17,18),(11,9,NULL,NULL,'view',19,20),(12,9,NULL,NULL,'add',21,22),(13,9,NULL,NULL,'edit',23,24),(14,9,NULL,NULL,'delete',25,26),(15,9,NULL,NULL,'login',27,28),(16,9,NULL,NULL,'logout',29,30),(17,9,NULL,NULL,'initDB',31,32),(18,1,NULL,NULL,'Posts',34,45),(19,18,NULL,NULL,'index',35,36),(20,18,NULL,NULL,'view',37,38),(21,18,NULL,NULL,'add',39,40),(22,18,NULL,NULL,'edit',41,42),(23,18,NULL,NULL,'delete',43,44),(24,1,NULL,NULL,'Groups',46,57),(25,24,NULL,NULL,'index',47,48),(26,24,NULL,NULL,'view',49,50),(27,24,NULL,NULL,'add',51,52),(28,24,NULL,NULL,'edit',53,54),(29,24,NULL,NULL,'delete',55,56),(30,1,NULL,NULL,'Downloads',58,69),(31,30,NULL,NULL,'index',59,60),(32,30,NULL,NULL,'edit',61,62),(33,30,NULL,NULL,'add',63,64),(34,30,NULL,NULL,'view',65,66),(35,30,NULL,NULL,'delete',67,68),(36,1,NULL,NULL,'Policies',70,85),(37,36,NULL,NULL,'index',71,72),(38,36,NULL,NULL,'view',73,74),(39,36,NULL,NULL,'edit',75,76),(40,36,NULL,NULL,'dashboard',77,78),(41,36,NULL,NULL,'policies',79,80),(42,36,NULL,NULL,'add',81,82),(43,36,NULL,NULL,'delete',83,84),(44,1,NULL,NULL,'Widgets',86,97),(45,44,NULL,NULL,'index',87,88),(46,44,NULL,NULL,'view',89,90),(47,44,NULL,NULL,'add',91,92),(48,44,NULL,NULL,'edit',93,94),(49,44,NULL,NULL,'delete',95,96);
/*!40000 ALTER TABLE `acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros`
--

LOCK TABLES `aros` WRITE;
/*!40000 ALTER TABLE `aros` DISABLE KEYS */;
INSERT INTO `aros` VALUES (1,2,'User',1,NULL,2,3),(2,NULL,'Group',1,NULL,1,8),(3,NULL,'Group',2,NULL,9,12),(4,NULL,'Group',3,NULL,13,16),(5,2,'User',2,NULL,4,5),(6,3,'User',3,NULL,10,11),(7,4,'User',4,NULL,14,15),(8,NULL,'Group',4,NULL,17,20),(9,8,'User',5,NULL,18,19),(10,NULL,'Group',5,NULL,21,24),(11,2,'User',6,NULL,6,7),(12,10,'User',7,NULL,22,23);
/*!40000 ALTER TABLE `aros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aros_acos`
--

LOCK TABLES `aros_acos` WRITE;
/*!40000 ALTER TABLE `aros_acos` DISABLE KEYS */;
INSERT INTO `aros_acos` VALUES (1,2,1,'1','1','1','1'),(2,3,1,'-1','-1','-1','-1'),(3,3,18,'1','1','1','1'),(4,3,44,'1','1','1','1'),(5,3,38,'1','1','1','1'),(6,3,37,'1','1','1','1'),(7,4,1,'-1','-1','-1','-1'),(8,4,21,'1','1','1','1'),(9,4,22,'1','1','1','1'),(10,4,47,'1','1','1','1'),(11,4,48,'1','1','1','1'),(12,4,38,'1','1','1','1'),(13,4,37,'1','1','1','1'),(14,8,1,'-1','-1','-1','-1'),(15,8,20,'1','1','1','1'),(16,8,19,'1','1','1','1'),(17,8,46,'1','1','1','1'),(18,8,45,'1','1','1','1'),(19,8,38,'1','1','1','1'),(20,8,37,'1','1','1','1'),(21,10,1,'-1','-1','-1','-1'),(22,10,38,'1','1','1','1'),(23,10,37,'1','1','1','1');
/*!40000 ALTER TABLE `aros_acos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `current_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `description` varchar(255) DEFAULT 'Group',
  `key` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'administrators','2015-06-24 12:03:11','2015-06-24 12:03:11','Active','2015-06-24 17:03:00','administrators','ad'),(2,'managers','2015-06-24 12:03:28','2015-06-24 12:03:28','Active','2015-06-24 17:03:00','managers','ma'),(3,'users','2015-06-24 12:03:37','2015-06-24 12:03:37','Active','2015-06-24 17:03:00','users','us'),(4,'mortals','2015-06-24 12:21:20','2015-06-24 12:21:30','Active','2015-06-24 17:21:00','mortals','mo'),(5,'Policies','2015-07-01 08:53:57','2015-07-01 08:53:57','Active','2015-07-01 13:53:00','Politicas de Grupo','po');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `current_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,1,'Testing Posts','This is only testing purpouse\r\n\r\nVeniam marfa mustache skateboard, adipisicing fugiat velit pitchfork beard. Freegan beard aliqua cupidatat mcsweeney\'s vero. Cupidatat four loko nisi, ea helvetica nulla carles. Tattooed cosby sweater food truck, mcsweeney\'s quis non freegan vinyl. Lo-fi wes anderson +1 sartorial. Carles non aesthetic exercitation quis gentrify. Brooklyn adipisicing craft beer vice keytar deserunt. Veniam marfa mustache skateboard, adipisicing fugiat velit pitchfork beard. Freegan beard aliqua cupidatat mcsweeney\'s vero. Cupidatat four loko nisi, ea helvetica nulla carles. Tattooed cosby sweater food truck, mcsweeney\'s quis non freegan vinyl. Lo-fi wes anderson +1 sartorial. Carles non aesthetic exercitation quis gentrify. Brooklyn adipisicing craft beer vice keytar deserunt.\r\nAd leggings keytar, brunch id art party dolor labore. Pitchfork yr enim lo-fi before they sold out qui. Tumblr farm-to-table bicycle rights whatever. Anim keffiyeh carles cardigan. Velit seitan mcsweeney\'s photo booth 3 wolf moon irure. Cosby sweater lomo jean shorts, williamsburg hoodie minim qui you probably haven\'t heard of them et cardigan trust fund culpa biodiesel wes anderson aesthetic. Nihil tattooed accusamus, cred irony biodiesel keffiyeh artisan ullamco consequat.\r\n\r\nKeytar twee blog, culpa messenger bag marfa whatever delectus food truck. Sapiente synth id assumenda. Locavore sed helvetica cliche irony, thundercats you probably haven\'t heard of them consequat hoodie gluten-free lo-fi fap aliquip. Labore elit placeat before they sold out, terry richardson proident brunch nesciunt quis cosby sweater pariatur keffiyeh ut helvetica artisan. Cardigan craft beer seitan readymade velit. VHS chambray laboris tempor veniam. Anim mollit minim commodo ullamco thundercats.\r\n\r\nFood truck fixie locavore, accusamus mcsweeney\'s marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.','2015-06-24 12:54:39','2015-06-24 12:55:37','Active','2015-06-24 17:54:00');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` char(40) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` char(50) not null,
  `last_name` char(80) null,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `current_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_access` datetime NOT NULL,
  `languaje` char(2) NOT NULL DEFAULT 'en',
  `number_id` int(11) NOT NULL,
  `gender` enum('M','F','R') null , -- Male , Female , Robot
  `super_user` boolean not null DEFAULT false,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ambagasdowa','0f8850517aaad80f5a45388845b5113f9d4db9ad',1,'Ambagasdowa','sistemas','2015-06-24 00:00:00','2015-07-01 10:20:27','2015-06-24 17:02:00','2015-07-01 10:20:27','en',9000000,'M',FALSE,'ACTIVE'),
(2,'administrator','12898bc5b53bf1de9c619c0d0109d0c0aef1c56b',1,'Administrador','sistemas','2015-06-24 12:06:06','2015-06-24 12:06:06','2015-06-24 17:05:00','0000-00-00 00:00:00','en',9000001,'M',FALSE,'ACTIVE'),
(3,'predeterminada','40f00424f04e69be4c0a5fc780af2b2ca08b11ec',1,'predeterminada','sistemas','2015-06-24 12:06:06','2015-06-24 12:06:06','2015-06-24 17:05:00','0000-00-00 00:00:00','en',9000002,'R',FALSE,'ACTIVE'),(4,'miriam.estradag','40f00424f04e69be4c0a5fc780af2b2ca08b11ec',1,'Miriam','Estrada Garcia','2015-07-01 10:07:10','2015-07-01 10:22:04','2015-07-01 15:03:00','2015-07-01 10:22:04','es',4000003,'F',FALSE,'ACTIVE'),(5,'jesus.mendozab','0f8850517aaad80f5a45388845b5113f9d4db9ad',5,'Jesus Alberto','Mendoza Baizabal','2015-07-01 10:11:42','2015-07-01 17:48:02','2015-07-01 15:11:00','2015-07-01 17:48:02','es',4000015,'M',FALSE,'ACTIVE');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `part_no` varchar(12) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `current_date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-07-02  8:59:35


drop table if exists `policies`;
create table `policies`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `policies_path` varchar(255) not null,
  `name` varchar(150) null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


drop table if exists `company`;
create table `company`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `name` varchar(150) null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;