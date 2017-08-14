<?php
class SecureStructure extends AppModel {
	var $name = 'SecureStructure';
	var $useDbConfig = 'portal_secure';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Group' => array(
			'className' => 'Group',
			'foreignKey' => 'group_id',
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
		'SecureTopics' => array(
			'className' => 'SecureTopic',
			'foreignKey' => 'secure_topics_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SecureTopicsTypes' => array(
			'className' => 'SecureTopicsType',
			'foreignKey' => 'secure_topics_types_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SecureGpoChiefs' => array(
			'className' => 'SecureGpoChief',
			'foreignKey' => 'secure_gpo_chiefs_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SecureGoes' => array(
			'className' => 'SecureGo',
			'foreignKey' => 'secure_goes_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SecureCalendars' => array(
			'className' => 'SecureCalendar',
			'foreignKey' => 'secure_calendars_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
