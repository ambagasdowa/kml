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
class CasetasViewResumeStand extends AppModel {
	var $name = 'CasetasViewResumeStand';
	var $useDbConfig = 'mssql_sistemas';
	var $primaryKey = 'casetas_historical_conciliations_id';
	var $displayField = 'casetas_historical_conciliations_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed


	function resume(){
		$Model = $this->find('all');
// 		return $Model;
		foreach($Model as $upKey => $Data){ // Setting up the month as identifier
		  $Model = Set::combine($Model, '{n}.'.'CasetasViewResumeStand.casetas_historical_conciliations_id', '{n}');
		}
		return $Model;
	}

}


