drop database if exists `portal_user_menu`; 
create database `portal_user_menu`;
use `portal_user_menu`;

grant usage on portal_user_menu.* to portal_user_menu@localhost identified by '@portal_user_menu#';
grant select, insert, update, delete, drop, alter, create temporary tables on portal_user_menu.* to portal_user_menu@localhost;
flush privileges;

-----------------------------------------------------------------------------------------------------
--                                    Building Menus section                                       --
-----------------------------------------------------------------------------------------------------
-- -- catalog of tyoe of link controller or view
-- -- this must be created from app_controller in installation mode
-- drop table if exists `app_links_type`;
-- create table `app_links_type`(
--   `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
--   `link_name_type` varchar(250) null,
--   `link_name_type_description` text null,
--   `create` timestamp DEFAULT current_timestamp,
--   `modified` DATETIME,
--   `status` enum('Active','Inactive') NOT NULL default 'Active',
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
-- 
-- LOCK TABLES `app_links_type` WRITE;
-- /*!40000 ALTER TABLE `app_links_type` DISABLE KEYS */;
-- INSERT INTO `app_links_type` VALUES 
-- 							(1,'controller','controller',NOW(),null,'ACTIVE'), -- if this is all then the struct comes from a script
-- 							(2,'action','action',NOW(),null,'ACTIVE');
-- /*!40000 ALTER TABLE `app_links_type` ENABLE KEYS */;
-- UNLOCK TABLES;

-- catalog for the controllers
-- build the menu access

drop table if exists `app_links`;
create table `app_links`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
--   `app_links_type_id` unsigned not null,
  `link_name` varchar(250) null,
  `view_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



-- this approach belongs to the views of the controller
drop table if exists `app_sublinks`;
create table `app_sublinks`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_links_id` int(11) unsigned not null,
  `app_sublinks_name` varchar(150) null,
  `app_sublinks_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-----------------------------------------------------------------------------------------------------
--                                 Configuration menus section                                     --
-----------------------------------------------------------------------------------------------------

-- Link menu definition set the menu for a unique group--
-- this set who is to be ; set the default for root
drop table if exists `link_menu_name`;
create table `link_menu_name`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groups_id` int(11) unsigned not null,
  `link_menu_name` varchar(150) null,
  `link_menu_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

LOCK TABLES `link_menu_name` WRITE;
/*!40000 ALTER TABLE `link_menu_name` DISABLE KEYS */;
INSERT INTO `link_menu_name` VALUES 
							(1,1,'*','all granted',NOW(),null,'Active'), -- if this is all then the struct comes from a script
							(2,3,'Policies','Policies menu',NOW(),null,'Active');
/*!40000 ALTER TABLE `link_menu_name` ENABLE KEYS */;
UNLOCK TABLES;


-- define the top struct of the menu and set the permisions too --
-- add definition peer group so any group has is menu and the default must be the less permissive menu--
drop table if exists `link_menu_builds`; -- this going to be the root link
create table `link_menu_builds`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_menu_name_id` unsigned not null, -- were definition belongs to 
  `app_links_id` unsigned null,
  `app_sublinks_id` unsigned null,
  `link_name` varchar(150) null, -- name we wont to show in the menu
  `link_name_description` text null, -- a description of course
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


-- Define the group were belongs the menu
-- maybe is as the definition of the menu
drop table if exists `link_submenu_builds`;
create table `link_submenu_builds`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `link_menu_builds_id` unsigned not null,
  `link_submenu_builds_level` unsigned not null,
  `link_submenu_builds_sublevel` unsigned not null,
  `link_submenu_name` varchar(150) null,
  `link_submenu_name_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;





