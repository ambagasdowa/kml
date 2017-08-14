drop database if exists `payroll`; 
create database `payroll`;
use `payroll`;

grant usage on payroll.* to payroll@localhost identified by '@payroll#';
grant select, insert, update, delete, drop, alter, create temporary tables on payroll.* to payroll@localhost;
flush privileges;

drop table if exists `payroll`;
create table `payroll`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  `payroll_path` varchar(255) not null,
  `name` varchar(150) null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

drop table if exists `payroll_import`;
create table `payroll_import`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cvetra` varchar(25) not null defautl '',
  `apepat` varchar(25) not null defautl '',
  `apemat` varchar(25) not null defautl '',
  `nombre` varchar(25) not null defautl '',
  `Puesto` varchar(25) not null defautl '',
  `Department` varchar(25) not null defautl '',
  `numrfc` varchar(25) not null defautl '',
  `numims` varchar(25) not null defautl '',
  `cvecia` varchar(25) not null defautl '',
  `cveare` varchar(25) not null defautl '',
  `cvepue` varchar(25) not null defautl '',
  `ctaban` varchar(25) not null defautl '',
  `sexo` varchar(25) not null defautl '',
  `cveban` varchar(25) not null defautl '',
  `sucurs` varchar(25) not null defautl '',
  `curp` varchar(25) not null defautl '',
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

