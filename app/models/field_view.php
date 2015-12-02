<?php
class FieldView extends AppModel {
	var $name = 'FieldView';
	var $useDbConfig = 'users_info';
	
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ViewTypes' => array(
			'className' => 'ViewType',
			'foreignKey' => 'view_types_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
