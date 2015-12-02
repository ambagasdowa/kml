<?php
/* Policies Test cases generated on: 2015-07-08 17:18:59 : 1436393939*/
App::import('Controller', 'Policies');

class TestPoliciesController extends PoliciesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class PoliciesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.policy');

	function startTest() {
		$this->Policies =& new TestPoliciesController();
		$this->Policies->constructClasses();
	}

	function endTest() {
		unset($this->Policies);
		ClassRegistry::flush();
	}

}
