<?php
class FieldData extends AppModel {
	var $name = 'FieldData';
	var $useDbConfig = 'users_info';
	var $displayField = 'data';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'FieldNames' => array(
			'className' => 'FieldName',
			'foreignKey' => 'field_names_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
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
		),
		'CatalogDatas' => array(
			'className' => 'CatalogData',
			'foreignKey' => 'catalog_datas_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
