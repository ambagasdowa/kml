-- drop database if exists `business_unit`; 
-- create database `business_unit`;
-- use `business_unit`;

-- grant usage on business_unit.* to business_unit@localhost identified by '@business_unit#';
-- grant select, insert, update, delete, drop, alter, create temporary tables on business_unit.* to business_unit@localhost;
-- flush privileges;

--
-- Table structure for table `business_units`
--

CREATE TABLE IF NOT EXISTS `business_units` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int(11) unsigned NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `description` text,
  `create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `business_units`
--

INSERT INTO `business_units` (`id`, `company_id`, `name`, `description`, `create`, `modified`, `status`) VALUES
(1, 1, 'TBKORI', 'unidad de negocio orizaba', '0000-00-00 00:00:00', '2015-09-08 11:28:35', 'Active'),
(2, 1, 'TBKGDL', 'unidad de negocio guadalajara', '0000-00-00 00:00:00', '2015-09-08 11:28:50', 'Active'),
(3, 1, 'TBKRAM', 'unidad de negocio ramos', '0000-00-00 00:00:00', '2015-09-08 11:29:11', 'Active'),
(4, 1, 'TBKHER', 'unidad de negocio hermosillo', '0000-00-00 00:00:00', '2015-09-08 11:32:08', 'Active'),
(5, 1, 'TBKLAP', 'unidad de negocio la paz', '0000-00-00 00:00:00', '2015-09-08 11:32:29', 'Active'),
(6, 1, 'TBKTIJ', 'unidad de negocio mexicali', '0000-00-00 00:00:00', '2015-09-08 11:32:49', 'Active'),
(7, 2, 'ATMMAC', 'unidad de negocio macuspana', '0000-00-00 00:00:00', '2015-09-08 11:33:21', 'Active'),
(8, 3, 'TEICUA', 'unidad de negocio teisa', '0000-00-00 00:00:00', '2015-09-08 11:33:52', 'Active'),
(9, 1, 'TBKCUL', 'TBK culiacan', '0000-00-00 00:00:00', '2016-01-07 15:46:33', 'Active');