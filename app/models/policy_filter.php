<?php
class PolicyFilter extends AppModel {
	var $name = 'PolicyFilter';
	var $useDbConfig = 'policy';
	var $useTable = 'policies_filter';
	var $primaryKey = 'id';
	var $validate = array(
// 		'user_id' => array(
// 			'numeric' => array(
// 				'rule' => array('numeric'),
// 				//'message' => 'Your custom message here',
// 				//'allowEmpty' => false,
// 				//'required' => false,
// 				//'last' => true, // Stop validation after this rule
// 				//'on' => 'create', // Limit validation to 'create' or 'update' operations
// 			),
// 		),
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
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Policies' => array(
			'className' => 'Policy',
			'foreignKey' => 'policies_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
