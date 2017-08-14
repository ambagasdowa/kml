<?php
class PoliciesAnexo extends AppModel {
	var $name = 'PoliciesAnexo';
	var $useDbConfig = 'policie';
	var $displayField = 'name';
// 	var $useTable = 'policies_anexos';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Policies' => array(
			'className' => 'Policy',
			'foreignKey' => 'policies_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
}
