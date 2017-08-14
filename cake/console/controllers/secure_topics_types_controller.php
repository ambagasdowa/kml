<?php
class SecureTopicsTypesController extends AppController {

	var $name = 'SecureTopicsTypes';

	function index() {
		$this->SecureTopicsType->recursive = 0;
		$this->set('secureTopicsTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure topics type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureTopicsType', $this->SecureTopicsType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecureTopicsType->create();
			if ($this->SecureTopicsType->save($this->data)) {
				$this->Session->setFlash(__('The secure topics type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure topics type could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->SecureTopicsType->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure topics type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureTopicsType->save($this->data)) {
				$this->Session->setFlash(__('The secure topics type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure topics type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureTopicsType->read(null, $id);
		}
		$groups = $this->SecureTopicsType->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure topics type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureTopicsType->delete($id)) {
			$this->Session->setFlash(__('Secure topics type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure topics type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
