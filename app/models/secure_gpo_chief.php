<?php
class SecureGpoChief extends AppModel {
	var $name = 'SecureGpoChief';
	var $useDbConfig = 'portal_secure';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
