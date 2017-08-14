<?php
/* Policy Test cases generated on: 2015-07-08 17:18:57 : 1436393937*/
App::import('Model', 'Policy');

class PolicyTestCase extends CakeTestCase {
	var $fixtures = array('app.policy');

	function startTest() {
		$this->Policy =& ClassRegistry::init('Policy');
	}

	function endTest() {
		unset($this->Policy);
		ClassRegistry::flush();
	}

}
