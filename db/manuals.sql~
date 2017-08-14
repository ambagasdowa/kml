drop database if exists `manuals`; 
create database `manuals`;
use `manuals`;

grant usage on manuals.* to manuals@localhost identified by '@manuals#';
grant select, insert, update, delete, drop, alter, create temporary tables on manuals.* to manuals@localhost;
flush privileges;

drop table if exists `manuals`;
create table `manuals`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `empresa_id` int(11) unsigned NOT NULL,
  `manuals_path` varchar(255) not null,
  `name` varchar(150) null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

drop table if exists `manuals_filters`;
create table `manuals_filters`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `manuals_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `view` boolean not null default false,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

drop table if exists `manuals_anexos`;
create table `manuals_anexos`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `manuals_id` int(11) unsigned NOT NULL,
  `anexo_path` varchar(100) not null,
  `name` varchar(200) not null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;