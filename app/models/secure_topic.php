<?php
class SecureTopic extends AppModel {
	var $name = 'SecureTopic';
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

// 	var $hasAndBelongsToMany = array(
// 		'Type' => array(
// 			'className' => 'Type',
// 			'joinTable' => 'secure_topics_types',
// 			'foreignKey' => 'secure_topic_id',
// 			'associationForeignKey' => 'type_id',
// 			'unique' => true,
// 			'conditions' => '',
// 			'fields' => '',
// 			'order' => '',
// 			'limit' => '',
// 			'offset' => '',
// 			'finderQuery' => '',
// 			'deleteQuery' => '',
// 			'insertQuery' => ''
// 		)
// 	);

}
