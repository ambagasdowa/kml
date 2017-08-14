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
class ProjectionsAccess extends AppModel {
	var $name = 'ProjectionsAccess';
	var $useDbConfig = 'mssql_sistemas';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ProjectionsControlsUsers' => array(
			'className' => 'ProjectionsControlsUser',
			'foreignKey' => 'projections_controls_users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProjectionsAccessModules' => array(
			'className' => 'ProjectionsAccessModule',
			'foreignKey' => 'projections_access_modules_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProjectionsViewBussinessUnits' => array(
			'className' => 'ProjectionsViewBussinessUnit',
			'foreignKey' => 'projections_view_bussiness_units_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
