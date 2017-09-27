<?php
class User extends AppModel {
	var $name = 'User';

	var $virtualFields = array(
        'full_name' => "CONCAT(User.name, ' ', User.last_name)",
    );

    var $diplayField = 'username';

	var $validate = array(
		'username' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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

	/** NOTE <add support to catalogs>*/
	// var $hasMany = array(
	// // 	'Post' => array(
	// // 		'className' => 'Post',
	// // 		'foreignKey' => 'user_id',
	// // 		'dependent' => false,
	// // 		'conditions' => '',
	// // 		'fields' => '',
	// // 		'order' => '',
	// // 		'limit' => '',
	// // 		'offset' => '',
	// // 		'exclusive' => '',
	// // 		'finderQuery' => '',
	// // 		'counterQuery' => ''
	// // 	),
	// 	'ModuleUserCredentialsControl' => array(
	// 		'className' => 'ModuleUserCredentialsControl',
	// 		'foreignKey' => 'user_id',
	// 		'dependent' => false,
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => '',
	// 		'limit' => '',
	// 		'offset' => '',
	// 		'exclusive' => '',
	// 		'finderQuery' => '',
	// 		'counterQuery' => ''
	// 	)
	// 	,
	// 	'FieldDatas' => array(
	// 		'className' => 'FieldData',
	// 		'foreignKey' => 'user_id',
	// 		'dependent' => false,
	// 		'conditions' => '',
	// 		'fields' => '',
	// 		'order' => '',
	// 		'limit' => '',
	// 		'offset' => '',
	// 		'exclusive' => '',
	// 		'finderQuery' => '',
	// 		'counterQuery' => ''
	// 	)
	// );

	// var $hasAndBelongsToMany = array(
	//
  //        'ModuleUserCredentialsControl' =>
  //            array(
  //                'className' => 'ModuleUserCredentialsControl',
  //                'joinTable' => 'module_user_credentials_controls',
  //                'foreignKey' => 'user_id',
  //                'associationForeignKey' => 'user_id',
  //                'unique' => true,
  //                'conditions' => '',
  //                'fields' => '',
  //                'order' => '',
  //                'limit' => '',
  //                'offset' => '',
  //                'finderQuery' => '',
  //                'with' => ''
  //            )
  //    );
// 	var $name = 'User';
// 	var $belongsTo = array('Group');
	var $actsAs = array('Acl' => array('type' => 'requester'));

	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		if (isset($this->data['User']['group_id'])) {
		$groupId = $this->data['User']['group_id'];
		} else {
			$groupId = $this->field('group_id');
		}
		if (!$groupId) {
		return null;
		} else {
			return array('Group' => array('id' => $groupId));
		}
	}

	function fetchUpdateUser() {
		return null;
	}//fetchUpdateUser(



} // NOTE END CLASS
