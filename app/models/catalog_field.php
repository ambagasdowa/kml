<?php
class CatalogField extends AppModel {
	var $name = 'CatalogField';
	var $useDbConfig = 'users_info';
	var $displayField = 'catalog_field';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'CatalogNames' => array(
			'className' => 'CatalogName',
			'foreignKey' => 'catalog_names_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
