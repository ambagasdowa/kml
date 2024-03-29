<?php
/**

		* 

		* PHP versions 4 and 5 

		* 

		* kml : Kamila Software 

		* Licensed under The MIT License  

		* Redistributions of files must retain the above copyright notice. 

		* 

		* @copyright     Jesus Baizabal 

		* @link          http://baizabal.xyz 

		* @mail	     baizabal.jesus@gmail.com 

		* @package       cake 

		* @subpackage    cake.cake.console.libs.templates.views 

		* @since         CakePHP(tm) v 1.2.0.5234 

		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php) 

		*/
?>

<?php
class ReporterViewsMainSubreportsAccountsController extends AppController {

	var $name = 'ReporterViewsMainSubreportsAccounts';


	function index() {
		$this->ReporterViewsMainSubreportsAccount->recursive = 0;
		$this->set('reporterViewsMainSubreportsAccounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid reporter views main subreports account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reporterViewsMainSubreportsAccount', $this->ReporterViewsMainSubreportsAccount->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ReporterViewsMainSubreportsAccount->create();
			if ($this->ReporterViewsMainSubreportsAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter views main subreports account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter views main subreports account could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reporter views main subreports account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReporterViewsMainSubreportsAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter views main subreports account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter views main subreports account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReporterViewsMainSubreportsAccount->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reporter views main subreports account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReporterViewsMainSubreportsAccount->delete($id)) {
			$this->Session->setFlash(__('Reporter views main subreports account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Reporter views main subreports account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
