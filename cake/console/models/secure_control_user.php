<?php
class SecureControlUser extends AppModel {
	var $name = 'SecureControlUser';
	var $useDbConfig = 'portal_secure';
	var $displayField = 'description';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'SecureStructures' => array(
			'className' => 'SecureStructure',
			'foreignKey' => 'secure_structures_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ViewGetPayrolls' => array(
			'className' => 'ViewGetPayroll',
			'foreignKey' => 'view_get_payrolls_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
