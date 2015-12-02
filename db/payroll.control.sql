drop database if exists `portal_user_info`; 
create database `portal_user_info`;
use `portal_user_info`;

grant usage on portal_user_info.* to portal_user_info@localhost identified by '@portal_user_info#';
grant select, insert, update, delete, drop, alter, create temporary tables on portal_user_info.* to portal_user_info@localhost;
flush privileges;

/* View configuration */

-- catalog for the views definitions of the number of horizontal lenght @media fields
-- anyway this can be managed by bootstrap

drop table if exists `view_types`;
create table `view_types`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `view_name` varchar(150) null,
  `view_media` varchar (255) null,
  `view_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `view_types` WRITE;
/*!40000 ALTER TABLE `view_types` DISABLE KEYS */;
INSERT INTO `view_types` VALUES 
							(1,'horizontal','desktop','horizontal lenght',NOW(),null,'ACTIVE'),
							(2,'vertical','desktop','vertical lenght',NOW(),null,'ACTIVE');
/*!40000 ALTER TABLE `view_types` ENABLE KEYS */;
UNLOCK TABLES;


-- this approach is just for performance issues 
drop table if exists `field_views`;
create table `field_views`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `view_types_id` int(11) unsigned not null,
  `field_view_lenght` varchar(150) null,
  `field_view_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `field_views` WRITE;
/*!40000 ALTER TABLE `field_views` DISABLE KEYS */;
INSERT INTO `field_views` VALUES 
							(1,1,6,'horizontal header lenght',NOW(),null,'ACTIVE'),
							(2,1,3,'horizontal header lenght',NOW(),null,'ACTIVE');
/*!40000 ALTER TABLE `field_views` ENABLE KEYS */;
UNLOCK TABLES;


-- define the type of field example chr, int, varchar  this must be static and no changes to hir 
-- maybe can convert the type with code
-- drop table if exists `field_types`;
-- create table `field_types`(
--   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
--   `field_names` varchar(150) null,
--   `field_description` text null,
--   `create` timestamp DEFAULT current_timestamp,
--   `modified` DATETIME,
--   `status` enum('Active','Inactive') NOT NULL default 'Active',
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- 
-- LOCK TABLES `field_types` WRITE;
-- /*!40000 ALTER TABLE `field_types` DISABLE KEYS */;
-- INSERT INTO `field_types` VALUES 
-- 							(1,'char','strings',NOW(),null,'ACTIVE'),
-- 							(2,'int','integer',NOW(),null,'ACTIVE'),
-- 							(3,'date','datetime',NOW(),null,'ACTIVE'),
-- 							(4,'varchar','varchar',NOW(),null,'ACTIVE');
-- /*!40000 ALTER TABLE `field_types` ENABLE KEYS */;
-- UNLOCK TABLES;



-- ---------------------------------------------------------------------------------------------------
--                                 Catalog build conf                                              --
-- ---------------------------------------------------------------------------------------------------

drop table if exists `catalog_names`;
create table `catalog_names`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_name` varchar(250) not null,
  `catalog_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


drop table if exists `catalog_fields`;
create table `catalog_fields`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_names_id` int(11) unsigned not null,
  `catalog_field` varchar(250) not null,
  `catalog_field_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


drop table if exists `catalog_datas`;
create table `catalog_datas`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_names_id` int(11) unsigned not null,
  `catalog_fields_id` int(11) unsigned not null,
  `catalog_data` varchar(250) null,
  `catalog_data_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



-- ---------------------------------------------------------------------------------------------------
--                                 User build info                                                 --
-- ---------------------------------------------------------------------------------------------------
-- this works

drop table if exists `field_names`;
create table `field_names`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `catalog_names_id` int(11) unsigned null,
  `catalog_fields_id` int(11) unsigned null,
--   `catalog_datas_id` int(11) unsigned null,
  `field_names` varchar(150) null,
  `field_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- examples
-- LOCK TABLES `field_names` WRITE;
-- /*!40000 ALTER TABLE `field_names` DISABLE KEYS */;
-- INSERT INTO `field_names` VALUES 
-- 							(1,2,'local ip','computer local ip',NOW(),null,'ACTIVE'),
-- 							(2,2,'external ip','external computer id',NOW(),null,'ACTIVE'),
-- 							(3,2,'extension','caller id extension',NOW(),null,'ACTIVE'),
-- 							(4,1,'computer model','varchar',NOW(),null,'ACTIVE');
-- /*!40000 ALTER TABLE `field_names` ENABLE KEYS */;
-- UNLOCK TABLES;

-- in the code can use the field type for select the column into going to work in this case only need manipulate this two 
-- tables field_types and field_data , can construct an cakephp schema shell script
drop table if exists `field_datas`;
create table `field_datas`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `field_names_id` int(11) unsigned NULL,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `catalog_datas_id` int(11) unsigned null, --  if have an id of the catalog then fill the next field automatically
 -- `data` varchar(255)  null, -- this field is fiiled manual or automatic , depends of catalog_datas_id field
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`),
  UNIQUE KEY (`catalog_datas_id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

