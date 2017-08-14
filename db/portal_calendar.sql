drop database if exists `portal_calendar`;
create database `portal_calendar`;
use `portal_calendar`;

grant usage on portal_calendar.* to portal_calendar@localhost identified by '@portal_calendar#';
grant select, insert, update, delete, drop, alter, create temporary tables on portal_calendar.* to portal_calendar@localhost;
flush privileges;

-- id title start end url constraint color rendering overlap

drop table if exists `calendars`;
create table `calendars`(
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
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

