drop database if exists `apps_owncloud`;
create database `apps_owncloud`;
use `apps_owncloud`;

grant usage on apps_owncloud.* to apps_owncloud@localhost identified by '@apps_owncloud#';
grant select, insert, update, delete, drop, alter, create temporary tables on apps_owncloud.* to apps_owncloud@localhost;
flush privileges;