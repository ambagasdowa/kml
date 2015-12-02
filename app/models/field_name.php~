<?php
class FieldName extends AppModel {
	var $name = 'FieldName';
	var $useDbConfig = 'users_info';
	var $displayField = 'field_names';
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
