drop table if exists `policies_anexos`;
create table `policies_anexos`(
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `policies_id` int(11) unsigned NOT NULL,
  `anexo_path` varchar(100) not null,
  `name` varchar(200) not null,
  `description` text null,
  `create` timestamp DEFAULT current_timestamp,
  `modified` DATETIME,
  `status` enum('Active','Inactive') NOT NULL default 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;