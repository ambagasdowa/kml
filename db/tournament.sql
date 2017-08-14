drop database if exists `portal_versus`; 
create database `portal_versus`;
use `portal_versus`;

grant usage on portal_versus.* to portal_versus@localhost identified by '@portal_versus#';
grant select, insert, update, delete, drop, alter, create temporary tables on portal_versus.* to portal_versus@localhost;
flush privileges;

/* View configuration */

drop table if exists `challenger_tournament`;
create table `challenger_tournament`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `challenger_name` varchar(150) null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


drop table if exists `tournament`;
create table `tournament`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tournament_name` varchar(150) null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;


drop table if exists `game_tournament`;
create table `game_tournament`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `game_name` varchar(150) null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

drop table if exists `vs_tournament`;
create table `vs_tournament`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tournament_id` unsigned NOT NULL,
  `game_tournament_id` int(11) unsigned NOT NULL,
  `one_challenger_name_id` int(11) unsigned NOT NULL,
  `two_challenger_name_id` int(11) unsigned NOT NULL,
  `score_one` tinyint(1) default 0,
  `score_two` tinyint(1) default 0,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
