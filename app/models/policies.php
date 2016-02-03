<?php
class Policies extends AppModel {
	var $name = 'Policies';
	var $useDbConfig = 'policie';
	var $useTable = 'policies';
	var $primaryKey = 'id';
	
// JW - Behavior initiated from plugin. 
	var $actsAs = array('Search.Searchable');
	var $filterArgs = array(array('name' => 'name', 'type' => 'query', 'method' => 'filterTitle'));
	
	
	var $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
// 		'empresa_id' => array(
// 			'numeric' => array(
// 				'rule' => array('numeric'),
// 				//'message' => 'Your custom message here',
// 				//'allowEmpty' => false,
// 				//'required' => false,
// 				//'last' => true, // Stop validation after this rule
// 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
// 			),
// 		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
// 		'Empresa' => array(
// 			'className' => 'Empresa',
// 			'foreignKey' => 'empresa_id',
// 			'conditions' => '',
// 			'fields' => '',
// 			'order' => ''
// 		)
	);
	

// JW - method as decalred in $filterArgs to process the free form search.
	function filterTitle($data, $field = null) {
		
		debug($data);
		if (empty($data['name'])) {
			return array();
		}
		$search = '%' . $data['name'] . '%';
		return array(
			'OR'  => array(
				$this->alias . '.name LIKE' => $search,
				$this->alias . '.description LIKE' => $search,
			));
	}
	
	
	
}
