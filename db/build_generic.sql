drop database if exists `helpdesk`; 
create database `helpdesk`;
use `helpdesk`;

grant usage on helpdesk.* to helpdesk@localhost identified by '@helpdesk#';
grant select, insert, update, delete, drop, alter, create, index,create temporary tables on helpdesk.* to helpdesk@localhost;
flush privileges;