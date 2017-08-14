<?php
/* CasetasViews Test cases generated on: 2016-05-30 11:59:26 : 1464627566*/
App::import('Controller', 'CasetasViews');

class TestCasetasViewsController extends CasetasViewsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class CasetasViewsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.casetas_view', 'app.casetas_historical_conciliation', 'app.user', 'app.group', 'app.casetas_controls_file', 'app.casetas_event', 'app.casetas_corporation', 'app.casetas_standing', 'app.casetas_parent', 'app.casetas_unit', 'app.casetas_controls_event', 'app.casetas_pending', 'app.casetas_conciliation', 'app.casetas_not_conciliation', 'app.casetas_log');

	function startTest() {
		$this->CasetasViews =& new TestCasetasViewsController();
		$this->CasetasViews->constructClasses();
	}

	function endTest() {
		unset($this->CasetasViews);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
