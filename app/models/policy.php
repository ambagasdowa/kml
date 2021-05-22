<?php
class Policy extends AppModel {
	var $name = 'Policy';
	var $useDbConfig = 'policie';
	var $useTable = 'policies';
	var $primaryKey = 'id';

	var $virtualFields = array(
		    'link' => "CONCAT('Policies/view/id:',Policy.id,'/type:', Policy.policies_type)"
	);

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
	
	var $hasAndBelongsToMany = array(
		'Anexo' => array(
			'className' => 'PoliciesAnexo',
			'joinTable' => 'policies_anexos',
			'foreignKey' => 'policies_id',
			'associationForeignKey' => 'id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
		'Filter' => array(
			'className' => 'PoliciesFilter',
			'joinTable' => 'policies_filters',
			'foreignKey' => 'policies_id',
			'associationForeignKey' => 'id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
	
// JW - Behavior initiated from plugin. 
	var $actsAs = array('Search.Searchable');
	var $filterArgs = array(array('name' => 'name', 'type' => 'query', 'method' => 'filterTitle'));
	
// JW - method as decalred in $filterArgs to process the free form search.
	function filterTitle($data, $field = null) {
		
// 		debug($this->alias);
		if (empty($data['name'])) {
			return array();
		}
		if(checkAdmin($_SESSION['Auth']['User']['group_id']) !== TRUE){
			$status = array($this->alias . '.status' => 'Active');
		}else{
			$status = array($this->alias . '.status' => array('Active','Inactive'));
		}
// 		debug($status);
		$search = '%' . $data['name'] . '%';
		return array(
				'AND' => array (
					$status
				),
				'OR'  => array(
					$this->alias . '.name LIKE' => $search,
					$this->alias . '.description LIKE' => $search,
				)
			);
	}
	
}
