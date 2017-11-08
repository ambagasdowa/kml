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
class PerformanceReference extends AppModel {
	var $name = 'PerformanceReference';
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
		)
	);

	/**
	 * Behaviors
	 * @var array
	 * @access public
	 */

	// JW - Behavior initiated from plugin.
		// var $actsAs = array(
		// 	'Search.Searchable');
		//
		// var $filterArgs = array(
		// 	array('name' => 'title', 'type' => 'like'),
		// 	array('name' => 'status', 'type' => 'value'),
		// 	array('name' => 'blog_id', 'type' => 'value'),
		// 	array('name' => 'search', 'type' => 'like', 'field' => 'Article.description'),
		// 	array('name' => 'range', 'type' => 'expression', 'method' => 'makeRangeCondition', 'field' => 'Article.views BETWEEN ? AND ?'),
		// 	array('name' => 'username', 'type' => 'like', 'field' => 'User.username'),
		// 	array('name' => 'tags', 'type' => 'subquery', 'method' => 'findByTags', 'field' => 'Article.id'),
		// 	array('name' => 'filter', 'type' => 'query', 'method' => 'orConditions'),
		// );

}
