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
class ProvidersImportedDatabase extends AppModel {
	var $name = 'ProvidersImportedDatabase';
	var $useDbConfig = 'mssql_sistemas';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ProvidersImportedFilesControls' => array(
			'className' => 'ProvidersImportedFilesControl',
			'foreignKey' => 'providers_imported_files_controls_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProvidersViewCompaniesUnits' => array(
			'className' => 'ProvidersViewCompaniesUnit',
			'foreignKey' => 'providers_view_companies_units_id',
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
		)
	);
}
