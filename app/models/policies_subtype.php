<?php
class PoliciesSubtype extends AppModel {
	var $name = 'PoliciesSubtype';
	var $useDbConfig = 'policie';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'PoliciesType' => array(
			'className' => 'PoliciesType',
			'foreignKey' => 'policies_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
