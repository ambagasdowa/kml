<?php
/**
		* 
		* PHP versions 4 and 5 
		* 
		* kml : Kamila Software 
		* Licensed under The MIT License  
		* Redistributions of files must retain the above copyright notice. 
		* 
		* @copyright     Jesus Baizabal 
		* @link          http://baizabal.xyz 
		* @mail	     baizabal.jesus@gmail.com 
		* @package       cake 
		* @subpackage    cake.cake.console.libs.templates.views 
		* @since         CakePHP(tm) v 1.2.0.5234 
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php) 
		*/
?>
<?php
/*
 * NOTE use table with timeline in rpt of units , replacing old view with current data and add new one with current data + historical data , and field created 
 */


class DisponibilidadViewRptUnidadesGstIndicator extends AppModel {
	var $name = 'DisponibilidadMainViewRptUnidadesGstIndicator';
	var $useDbConfig = 'mssql_sistemas';
	var $primaryKey = 'unidad';
}
