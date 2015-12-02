-- drop database if exists `business_unit`; 
-- create database `business_unit`;
-- use `business_unit`;

-- grant usage on business_unit.* to business_unit@localhost identified by '@business_unit#';
-- grant select, insert, update, delete, drop, alter, create temporary tables on business_unit.* to business_unit@localhost;
-- flush privileges;

drop table if exists `business_units`;
create table `business_units`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) unsigned NOT NULL,
--   `group_id` int(11) unsigned NOT NULL,
  `name` varchar(150) null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;