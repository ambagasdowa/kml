<?php
/* Company Test cases generated on: 2015-07-20 12:34:11 : 1437413651*/
App::import('Model', 'Company');

class CompanyTestCase extends CakeTestCase {
	var $fixtures = array('app.company', 'app.user', 'app.group');

	function startTest() {
		$this->Company =& ClassRegistry::init('Company');
	}

	function endTest() {
		unset($this->Company);
		ClassRegistry::flush();
	}

}
