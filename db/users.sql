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