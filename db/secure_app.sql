drop database if exists `portal_secure`; 
create database `portal_secure`;
use `portal_secure`;

grant usage on portal_secure.* to portal_secure@localhost identified by '@portal_secure#';
grant select, insert, update, delete, drop, alter, create temporary tables on portal_secure.* to portal_secure@localhost;
flush privileges;

-- ---------------------------------------------------------------------------------------------------------------------------------------------------
-- Catalogs Section
-- ---------------------------------------------------------------------------------------------------------------------------------------------------
-- TEMA
drop table if exists `secure_topics`;
create table `secure_topics`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `name` varchar(255) not null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` boolean NOT NULL default true,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secure_topics`
--

LOCK TABLES `secure_topics` WRITE;
/*!40000 ALTER TABLE `secure_topics` DISABLE KEYS */;
INSERT INTO `secure_topics` VALUES (1,4,'Induccion a personal de nuevo ingreso','Induccion a personal de nuevo ingreso\r\n','0000-00-00 00:00:00','2016-02-25 17:32:09',1),(2,3,'Politica de Seguridad','Poli­tica de Seguridad\r\n','0000-00-00 00:00:00','2016-03-08 15:25:57',1);
/*!40000 ALTER TABLE `secure_topics` ENABLE KEYS */;
UNLOCK TABLES;


-- Documentp
drop table if exists `secure_topics_types`;
create table `secure_topics_types`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `name` varchar(255) not null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` boolean NOT NULL default true,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `secure_topics_types` WRITE;
/*!40000 ALTER TABLE `secure_topics_types` DISABLE KEYS */;
INSERT INTO `secure_topics_types` VALUES (1,1,'Documental','Documental','0000-00-00 00:00:00','2016-02-25 17:33:05',1);
/*!40000 ALTER TABLE `secure_topics_types` ENABLE KEYS */;
UNLOCK TABLES;

-- User (presentador) :
drop table if exists `secure_presenters`;
create table `secure_presenters`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` boolean NOT NULL default true,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `secure_presenters` WRITE;
/*!40000 ALTER TABLE `secure_presenters` DISABLE KEYS */;
INSERT INTO `secure_presenters` VALUES (1,4,49,'user of secure ','0000-00-00 00:00:00','2016-03-08 16:35:12',1),(2,4,63,'test user for secure','0000-00-00 00:00:00','2016-03-08 16:35:31',1),(3,4,5,'aa','0000-00-00 00:00:00','2016-03-08 17:12:41',1);
/*!40000 ALTER TABLE `secure_presenters` ENABLE KEYS */;
UNLOCK TABLES;


-- Resposnsable
drop table if exists `secure_gpo_chiefs`;
create table `secure_gpo_chiefs`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `name` varchar(255) not null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` boolean NOT NULL default true,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


LOCK TABLES `secure_gpo_chiefs` WRITE;
/*!40000 ALTER TABLE `secure_gpo_chiefs` DISABLE KEYS */;
INSERT INTO `secure_gpo_chiefs` VALUES (1,1,'Seguridad e Higiene','Seguridad e Higiene','0000-00-00 00:00:00','2016-02-25 17:33:46',1);
/*!40000 ALTER TABLE `secure_gpo_chiefs` ENABLE KEYS */;
UNLOCK TABLES;



-- Dirigido a :
drop table if exists `secure_goes`;
create table `secure_goes`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `name` varchar(255) not null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` boolean NOT NULL default true,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `secure_goes`
--

LOCK TABLES `secure_goes` WRITE;
/*!40000 ALTER TABLE `secure_goes` DISABLE KEYS */;
INSERT INTO `secure_goes` VALUES (1,1,'Operadores de Tractocamiones','Operadores de Tractocamiones\r\n','0000-00-00 00:00:00','2016-02-25 17:35:22',1);
/*!40000 ALTER TABLE `secure_goes` ENABLE KEYS */;
UNLOCK TABLES;


-- ---------------------------------------------------------------------------------------------------------------------------------------------------
-- Config Calendar
-- ---------------------------------------------------------------------------------------------------------------------------------------------------
-- id title start end url constraint color rendering overlap

drop table if exists `secure_calendars`;
create table `secure_calendars`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NULL,
  `allday` boolean not null default false, -- just for compabilitie
  `editable` boolean not null default false, -- just for compabilitie
  `start` timestamp NULL,
  `end` timestamp null,
  `url` varchar(255) null,
  `constraint` varchar(255) null,
  `color` varchar(255) null,
  `rendering` varchar(255) null,
  `overlap` varchar(255) null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` boolean NOT NULL default TRUE,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- ---------------------------------------------------------------------------------------------------------------------------------------------------
-- Config Structure
-- ---------------------------------------------------------------------------------------------------------------------------------------------------

drop table if exists `secure_structures`;
create table `secure_structures`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `secure_topics_id` int(11) unsigned NOT NULL,
  `secure_topics_types_id` int(11) unsigned NOT NULL,
  `secure_gpo_chiefs_id` int(11) unsigned NOT NULL,
  `secure_goes_id` int(11) unsigned NOT NULL,
  `secure_calendars_id` int(11) unsigned NOT NULL,
  `start_real` timestamp null,
  `end_real` timestamp null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` boolean NOT NULL default TRUE,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- ---------------------------------------------------------------------------------------------------------------------------------------------------
-- Source for individual properties for taken courses
-- ---------------------------------------------------------------------------------------------------------------------------------------------------

drop table if exists `secure_control_users`;
create table `secure_control_users`(
  `id` int(11) unsigned not null auto_increment,
  `secure_structures_id` int(11) unsigned not null, -- identifier for 
  `view_get_payrolls_id` int(11) unsigned not null, -- just for build the payroll squema but use cvetra
  `secure_calendars_id` int(11) unsigned not null, -- just for build the payroll squema but use cvetra
  `course_is_taken` tinyint not null default false,
  `description` text null,
  `create` timestamp default current_timestamp,
  `modified` timestamp,
  `status` boolean not null default true,
  primary key (`id`)
) engine=myisam auto_increment=1 default charset=utf8;

