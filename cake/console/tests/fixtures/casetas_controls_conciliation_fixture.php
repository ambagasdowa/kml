<?php
/* CasetasControlsConciliation Fixture generated on: 2016-05-26 09:41:52 : 1464273712 */
class CasetasControlsConciliationFixture extends CakeTestFixture {
	var $name = 'CasetasControlsConciliation';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'length' => 11, 'key' => 'primary'),
		'user_id' => array('type' => 'integer', 'null' => true, 'length' => 4),
		'casetas_controls_files_id' => array('type' => 'integer', 'null' => true, 'length' => 4),
		'conciliations_count' => array('type' => 'integer', 'null' => true, 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true),
		'modified' => array('type' => 'datetime', 'null' => true),
		'casetas_standings_id' => array('type' => 'integer', 'null' => true, 'length' => 4),
		'casetas_parents_id' => array('type' => 'integer', 'null' => true, 'length' => 4),
		'_status' => array('type' => 'integer', 'null' => true, 'default' => '1', 'length' => 1),
		'indexes' => array('0' => array()),
		'tableParameters' => array()
	);

	var $records = array(
		array(
			'id' => 1,
			'user_id' => 1,
			'casetas_controls_files_id' => 1,
			'conciliations_count' => 1,
			'created' => '2016-05-26 09:41:52',
			'modified' => '2016-05-26 09:41:52',
			'casetas_standings_id' => 1,
			'casetas_parents_id' => 1,
			'_status' => 1
		),
	);
}
