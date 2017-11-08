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
class PerformanceViewFactura extends AppModel {
	var $name = 'PerformanceViewFactura';
	var $useDbConfig = 'portal_apps';
	var $displayField = 'Empresa';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PerformanceCustomers' => array(
			'className' => 'PerformanceCustomers',
			'foreignKey' => 'performance_customers_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PerformanceFacturas' => array(
			'className' => 'PerformanceFacturas',
			'foreignKey' => 'performance_facturas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PerformanceReferences' => array(
			'className' => 'PerformanceReferences',
			'foreignKey' => 'performance_references_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'PerformanceBsus' => array(
			'className' => 'PerformanceBsus',
			'foreignKey' => 'performance_bsus_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
