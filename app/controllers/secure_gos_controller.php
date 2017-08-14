<?php
class SecureGosController extends AppController {

	var $name = 'SecureGos';

	function index() {
		$this->SecureGo->recursive = 0;
		$this->set('secureGos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure go', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureGo', $this->SecureGo->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecureGo->create();
			if ($this->SecureGo->save($this->data)) {
				$this->Session->setFlash(__('The secure go has been saved', true));
				$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure go could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->SecureGo->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure go', true));
			$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureGo->save($this->data)) {
				$this->Session->setFlash(__('The secure go has been saved', true));
				$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure go could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureGo->read(null, $id);
		}
		$groups = $this->SecureGo->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure go', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureGo->delete($id)) {
			$this->Session->setFlash(__('Secure go deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure go was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
