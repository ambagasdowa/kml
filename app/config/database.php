<?php
/**
 * This is core configuration file.
 *
 * Use it to configure core behaviour ofCake.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
/**
 * In this file you set up your database connection details.
 *
 * @package       cake
 * @subpackage    cake.config
 */
/**
 * Database configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * driver => The name of a supported driver; valid options are as follows:
 *		mysql 		- MySQL 4 & 5,
 *		mysqli 		- MySQL 4 & 5 Improved Interface (PHP5 only),
 *		sqlite		- SQLite (PHP5 only),
 *		postgres	- PostgreSQL 7 and higher,
 *		mssql		- Microsoft SQL Server 2000 and higher,
 *		db2			- IBM DB2, Cloudscape, and Apache Derby (http://php.net/ibm-db2)
 *		oracle		- Oracle 8 and higher
 *		firebird	- Firebird/Interbase
 *		sybase		- Sybase ASE
 *		adodb-[drivername]	- ADOdb interface wrapper (see below),
 *		odbc		- ODBC DBO driver
 *
 * You can add custom database drivers (or override existing drivers) by adding the
 * appropriate file to app/models/datasources/dbo.  Drivers should be named 'dbo_x.php',
 * where 'x' is the name of the database.
 *
 * persistent => true / false
 * Determines whether or not the database should use a persistent connection
 *
 * connect =>
 * ADOdb set the connect to one of these
 *	(http://phplens.com/adodb/supported.databases.html) and
 *	append it '|p' for persistent connection. (mssql|p for example, or just mssql for not persistent)
 * For all other databases, this setting is deprecated.
 *
 * host =>
 * the host you connect to the database.  To add a socket or port number, use 'port' => #
 *
 * prefix =>
 * Uses the given prefix for all the tables in this database.  This setting can be overridden
 * on a per-table basis with the Model::$tablePrefix property.
 *
 * schema =>
 * For Postgres and DB2, specifies which schema you would like to use the tables in. Postgres defaults to
 * 'public', DB2 defaults to empty.
 *
 * encoding =>
 * For MySQL, MySQLi, Postgres and DB2, specifies the character encoding to use when connecting to the
 * database.  Uses database default.
 *
 */
class DATABASE_CONFIG {

	// in the default must be the essential data for correct funtionality of the app
	var $default = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'portal_users',
		'password' => '@portal_users#',
		'database' => 'portal_users',
		'encoding' => 'utf8'
	);

	//semi essential can load as module

	var $users_info = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'portal_user_info',
		'password' => '@portal_user_info#',
		'database' => 'portal_user_info',
		'encoding' => 'utf8'
	);

	var $portal_company = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'portal_company',
		'password' => '@portal_company#',
		'database' => 'portal_company',
		'encoding' => 'utf8'
	);

	var $portal_calendar = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'portal_calendar',
		'password' => '@portal_calendar#',
		'database' => 'portal_calendar',
		'prefix' => '',
	);

	//then can add the non-essential data of the app

	var $portal_secure = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'portal_secure',
		'password' => '@portal_secure#',
		'database' => 'portal_secure',
		'prefix' => '',
	);

	var $portal_apps = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'portal_apps',
		'password' => '@portal_apps#',
		'database' => 'portal_apps',
		'encoding' => 'utf8',
		'prefix' => ''
	);

	var $portal_cloud = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'portal_nextcloud',
		'password' => '@portal_nextcloud#',
		'database' => 'portal_nextcloud',
		'encoding' => 'utf8',
		'prefix' => ''
	);

	var $policie = array(
		'driver' => 'mysql',
		'persistent' => true,
		'host' => 'localhost',
		'login' => 'policies',
		'password' => '@policies#',
		'database' => 'policies',
		'encoding' => 'utf8'
	);

	var $tralix = array(
		'driver' => 'mysql',
		'persistent' => false,
		'host' => 'localhost',
		'login' => 'tralix',
		'password' => '@tralix#',
		'database' => 'tralix',
		'prefix' => '',
		'encoding' => 'utf8',
	);

	//this is and must be non-sessential connection to mssql
	// payroll => lista de empleados
/** WARNING starting mssql connections **/
/** NOTE get the entire db of all workers compare against login */
	var $mssql_payroll = array( // connect to remote mssql server
		'driver' => 'mssql',
		'persistent' => false,
		'host' => 'IntegraDb',
		'login' => 'zam',
		'password' => 'lis',
		'database' => 'NOM2001',
		'prefix' => '',
//  		'encoding' => 'ISO-8859-1',
// 		'encoding' => 'Latin 1',
// 		'encoding' => 'utf8',
		'port' => '1433'
	);

	//this is and must be non-sessential connection to mssql
	// concilation => concilation fo iave
/** WARNING starting mssql connections **/
/** NOTE get the database and write to it */
	var $mssql_sistemas = array( // connect to remote mssql server
		'driver' => 'mssql',
		'persistent' => false,
		'host' => 'IntegraDb',
		'login' => 'zam',
		'password' => 'lis',
		'database' => 'sistemas',
		'prefix' => '',
// 		'encoding' => 'ISO-8859-1',
// 		'encoding' => 'Latin1',
		'encoding' => 'utf8',
		'port' => '1433'
	);

	var $mssql_sistemas_larsa = array( // connect to remote mssql server
		'driver' => 'mssql',
		'persistent' => false,
		'host' => '192.168.20.190',
		'login' => 'sa',
		'password' => 'effeta',
		'database' => 'sistemas',
		'prefix' => '',
// 		'encoding' => 'ISO-8859-1',
// 		'encoding' => 'Latin1',
		'encoding' => 'utf8',
		'port' => '1433'
	);

}
?>
