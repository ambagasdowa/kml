<?php
class CatalogData extends AppModel {
	var $name = 'CatalogData';
	var $useDbConfig = 'users_info';
	var $displayField = 'catalog_data';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'CatalogNames' => array(
			'className' => 'CatalogName',
			'foreignKey' => 'catalog_names_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'CatalogFields' => array(
			'className' => 'CatalogField',
			'foreignKey' => 'catalog_fields_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
