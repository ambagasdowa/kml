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
class PerformanceFactura extends AppModel {
	var $name = 'PerformanceFactura';
	var $useDbConfig = 'portal_apps';
	var $displayField = 'id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PerformanceCustomers' => array(
			'className' => 'PerformanceCustomer',
			'foreignKey' => 'performance_customers_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PerformanceReferences' => array(
			'className' => 'PerformanceReference',
			'foreignKey' => 'performance_references_id',
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
