<?php
class SecureTopicsController extends AppController {

	var $name = 'SecureTopics';

	function index() {
		$this->SecureTopic->recursive = 0;
		$this->set('secureTopics', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure topic', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureTopic', $this->SecureTopic->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecureTopic->create();
			if ($this->SecureTopic->save($this->data)) {
				$this->Session->setFlash(__('The secure topic has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure topic could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->SecureTopic->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure topic', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureTopic->save($this->data)) {
				$this->Session->setFlash(__('The secure topic has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure topic could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureTopic->read(null, $id);
		}
		$groups = $this->SecureTopic->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure topic', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureTopic->delete($id)) {
			$this->Session->setFlash(__('Secure topic deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure topic was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
