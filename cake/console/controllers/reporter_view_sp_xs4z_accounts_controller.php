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
class ReporterViewSpXs4zAccountsController extends AppController {

	var $name = 'ReporterViewSpXs4zAccounts';


	function index() {
		$this->ReporterViewSpXs4zAccount->recursive = 0;
		$this->set('reporterViewSpXs4zAccounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid reporter view sp xs4z account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reporterViewSpXs4zAccount', $this->ReporterViewSpXs4zAccount->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ReporterViewSpXs4zAccount->create();
			if ($this->ReporterViewSpXs4zAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter view sp xs4z account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter view sp xs4z account could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reporter view sp xs4z account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReporterViewSpXs4zAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter view sp xs4z account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter view sp xs4z account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReporterViewSpXs4zAccount->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reporter view sp xs4z account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReporterViewSpXs4zAccount->delete($id)) {
			$this->Session->setFlash(__('Reporter view sp xs4z account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Reporter view sp xs4z account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
