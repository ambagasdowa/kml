<?php
class PoliciesType extends AppModel {
	var $name = 'PoliciesType';
	var $useDbConfig = 'policie';
	var $useTable = 'policies_type';
// 	var $displayField = 'group_id';
// 	var $useTable = 'policies_filters';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'PoliciesSubtype' => array(
			'className' => 'PoliciesSubtype',
			'foreignKey' => 'policies_type_id',
			'conditions' => array('status'=>'Active'),
			'fields' => array('id','policies_subtypes_definitions_id'),
			'order' => ''
		)
// 		,'Group' => array(
// 			'className' => 'Group',
// 			'foreignKey' => 'group_id',
// 			'conditions' => '',
// 			'fields' => '',
// 			'order' => ''
// 		)
	);
}
?>
