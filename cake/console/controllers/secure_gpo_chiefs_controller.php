<?php
class SecureGpoChiefsController extends AppController {

	var $name = 'SecureGpoChiefs';

	function index() {
		$this->SecureGpoChief->recursive = 0;
		$this->set('secureGpoChiefs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure gpo chief', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureGpoChief', $this->SecureGpoChief->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecureGpoChief->create();
			if ($this->SecureGpoChief->save($this->data)) {
				$this->Session->setFlash(__('The secure gpo chief has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure gpo chief could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->SecureGpoChief->Group->find('list');
		$this->set(compact('groups'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure gpo chief', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureGpoChief->save($this->data)) {
				$this->Session->setFlash(__('The secure gpo chief has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure gpo chief could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureGpoChief->read(null, $id);
		}
		$groups = $this->SecureGpoChief->Group->find('list');
		$this->set(compact('groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure gpo chief', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureGpoChief->delete($id)) {
			$this->Session->setFlash(__('Secure gpo chief deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure gpo chief was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
