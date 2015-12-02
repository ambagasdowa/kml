drop table if exists `policies_subtypes_definitions`;
create table `policies_subtypes_definitions`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
--   `policies_type_id` int(11) unsigned NOT NULL,
--   `group_id` int(11) unsigned NOT NULL,
  `name` varchar(150) null,
  `description` text null,
  `create` timestamp not null DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;