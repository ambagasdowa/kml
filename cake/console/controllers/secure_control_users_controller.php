<?php
class SecureControlUsersController extends AppController {

	var $name = 'SecureControlUsers';
	var $helpers = array('Ajax', 'Javascript');

	function index() {
		$this->SecureControlUser->recursive = 0;
		$this->set('secureControlUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure control user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureControlUser', $this->SecureControlUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecureControlUser->create();
			if ($this->SecureControlUser->save($this->data)) {
				$this->Session->setFlash(__('The secure control user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure control user could not be saved. Please, try again.', true));
			}
		}
		$secureStructures = $this->SecureControlUser->SecureStructure->find('list');
		$viewGetPayrolls = $this->SecureControlUser->ViewGetPayroll->find('list');
		$this->set(compact('secureStructures', 'viewGetPayrolls'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure control user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureControlUser->save($this->data)) {
				$this->Session->setFlash(__('The secure control user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure control user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureControlUser->read(null, $id);
		}
		$secureStructures = $this->SecureControlUser->SecureStructure->find('list');
		$viewGetPayrolls = $this->SecureControlUser->ViewGetPayroll->find('list');
		$this->set(compact('secureStructures', 'viewGetPayrolls'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure control user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureControlUser->delete($id)) {
			$this->Session->setFlash(__('Secure control user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure control user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
