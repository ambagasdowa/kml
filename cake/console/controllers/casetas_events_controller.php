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
class CasetasEventsController extends AppController {

	var $name = 'CasetasEvents';

	function index() {
		$this->CasetasEvent->recursive = 0;
		$this->set('casetasEvents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasEvent', $this->CasetasEvent->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasEvent->create();
			if ($this->CasetasEvent->save($this->data)) {
				$this->Session->setFlash(__('The casetas event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas event could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasEvent->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasEvent->save($this->data)) {
				$this->Session->setFlash(__('The casetas event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasEvent->read(null, $id);
		}
		$users = $this->CasetasEvent->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasEvent->delete($id)) {
			$this->Session->setFlash(__('Casetas event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>