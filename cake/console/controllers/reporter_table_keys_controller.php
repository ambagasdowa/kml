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
class ReporterTableKeysController extends AppController {

	var $name = 'ReporterTableKeys';


	function index() {
		$this->ReporterTableKey->recursive = 0;
		$this->set('reporterTableKeys', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid reporter table key', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reporterTableKey', $this->ReporterTableKey->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ReporterTableKey->create();
			if ($this->ReporterTableKey->save($this->data)) {
				$this->Session->setFlash(__('The reporter table key has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter table key could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reporter table key', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReporterTableKey->save($this->data)) {
				$this->Session->setFlash(__('The reporter table key has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter table key could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReporterTableKey->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reporter table key', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReporterTableKey->delete($id)) {
			$this->Session->setFlash(__('Reporter table key deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Reporter table key was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
