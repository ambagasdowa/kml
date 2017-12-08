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
class ControlDeskUserControlsController extends AppController {

	var $name = 'ControlDeskUserControls';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript');



	function index() {

		$username = $this->Auth->user('username');

		debug($this->Auth->user());
		// $this->ControlDeskUserControl->recursive = 0;
		$this->set(compact('username'));

		// $this->set('controlDeskUserControls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid control desk user control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('controlDeskUserControl', $this->ControlDeskUserControl->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ControlDeskUserControl->create();
			if ($this->ControlDeskUserControl->save($this->data)) {
				$this->Session->setFlash(__('The control desk user control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The control desk user control could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ControlDeskUserControl->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid control desk user control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ControlDeskUserControl->save($this->data)) {
				$this->Session->setFlash(__('The control desk user control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The control desk user control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ControlDeskUserControl->read(null, $id);
		}
		$users = $this->ControlDeskUserControl->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for control desk user control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ControlDeskUserControl->delete($id)) {
			$this->Session->setFlash(__('Control desk user control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Control desk user control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
