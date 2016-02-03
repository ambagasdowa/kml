<?php
class Post extends AppModel {
	var $name = 'Post';
	var $validate = array(
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => true, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
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
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * Behaviors
 *
 * @var array
 * @access public
 */
 
// JW - Behavior initiated from plugin. 
	var $actsAs = array(
		'Search.Searchable');

/**
 * Field names accepted for search queries.
 *
 * @var array
 * @see SearchableBehavior
 */
 
 // JW - Search fields data description for processing.
	var $filterArgs = array(
		array('name' => 'title', 'type' => 'query', 'method' => 'filterTitle'),
// // 		array('name' => 'body', 'type' => 'string'),
	);

	
/**
 * Constructor
 *
 * @param mixed $id Model ID
 * @param string $table Table name
 * @param string $ds Datasource
 * @access public
 */
 
// JW - Data constructed for add.ctp
// 	public function __construct($id = false, $table = null, $ds = null) {
// 		$this->statuses = array(
// 			'open' => __('Open', true),
// 			'closed' => __('Closed', true));
// 		$this->categories = array(
// 			'bug' => __('Bug', true),
// 			'support' => __('Support', true),
// 			'technical' => __('Technical', true),
// 			'other' => __('Other', true));
// 		parent::__construct($id, $table, $ds);
// 	}
// 	
// JW - method as decalred in $filterArgs to process the free form search.
	public function filterTitle($data, $field = null) {
		if (empty($data['title'])) {
			return array();
		}
		$title = '%' . $data['title'] . '%';
		return array(
			'OR'  => array(
				$this->alias . '.title LIKE' => $title,
				$this->alias . '.body LIKE' => $title,
			));
	}
	
}
