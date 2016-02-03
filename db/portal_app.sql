drop database if exists `portal_app`; 
create database `portal_app`;
use `portal_app`;

grant usage on portal_app.* to portal_app@localhost identified by '@portal_app#';
grant select, insert, update, delete, drop, alter, create temporary tables on portal_app.* to portal_app@localhost;
flush privileges;

-----------------------------------------------------------------------------------------------------
--                                    Building App section                                         --
-----------------------------------------------------------------------------------------------------
-- Applications to load in the main 
-- this is just the on off module and must be installed , this is not the load module

drop table if exists `app_catalogs`;
create table `app_catalogs`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_name` varchar(250) null,
  `app_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- This pretend to be load in the app_controller for set the configuration per app
-- or after login and must be jus for menu issues

drop table if exists `app_configs`;
create table `app_catalogs`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11  unsigned not null ,
  `app_catalogs_id` int(11  unsigned not null,
  `app_map_actions_id` int(  unsigned not null, -- this->Auth->mapActions
  `app_control` varchar(250) null,
  `app_control_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

drop table if exists `app_auths`;
create table `app_auths`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned not null ,
  `app_catalogs_id` int(11) unsigned not null,
  `app_map_actions_id` int() unsigned not null, -- this->Auth->mapActions 
  `app_control` varchar(250) null,
  `app_control_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

drop table if exists `app_map_actions`;
create table `app_actions`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned not null ,
  `app_catalogs_id` int(11) unsigned not null,
  `app_map_actions_id` int() unsigned not null, -- this->Auth->mapActions 
  `app_control` varchar(250) null,
  `app_control_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

drop table if exists `app_languajes`;
create table `app_languajes`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `languaje_key` char('2'  not null,
  `action_name` int(11) unsigned not null ,
  `app_catalogs_id` int(11) unsigned not null,
  `app_map_actions_id` int() unsigned not null, -- this->Auth->mapActions 
  `app_control` varchar(250) null,
  `app_control_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

-- modules of the app example what you need inherit to an application
drop table if exists `app_modules`;
create table `app_modules`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_catalogs_id` int(11) unsigned not null,
  `app_modules_name` varchar(150) null,
  `app_modules_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



--  Plugins this belongs to all apps for example the reports modules can be use for all apps 
--  and means that his development is general for any app like cake plugins
drop table if exists `app_plugins`;
create table `app_plugins`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `app_catalogs_id` int(11) unsigned not null,
  `app_plugins_name` varchar(150) null,
  `app_plugins_description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;



