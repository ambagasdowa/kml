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
class CasetasControlsFile extends AppModel {
	var $name = 'CasetasControlsFile';
	var $useDbConfig = 'mssql_sistemas';
	var $displayField = '_filename';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'CasetasEvents' => array(
			'className' => 'CasetasEvent',
			'foreignKey' => 'casetas_events_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CasetasCorporations' => array(
			'className' => 'CasetasCorporation',
			'foreignKey' => 'casetas_corporations_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CasetasUnits' => array(
			'className' => 'CasetasUnit',
			'foreignKey' => 'casetas_units_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CasetasStandings' => array(
			'className' => 'CasetasStanding',
			'foreignKey' => 'casetas_standings_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CasetasParents' => array(
			'className' => 'CasetasParent',
			'foreignKey' => 'casetas_parents_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
