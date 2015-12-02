<?php
class PoliciesFilter extends AppModel {
	var $name = 'PoliciesFilter';
	var $useDbConfig = 'policie';
	var $displayField = 'group_id';
// 	var $useTable = 'policies_filters';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Policies' => array(
			'className' => 'Policy',
			'foreignKey' => 'policies_id',
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
		)
	);
}
