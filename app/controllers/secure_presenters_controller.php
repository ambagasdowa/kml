<?php
class SecurePresentersController extends AppController {

	var $name = 'SecurePresenters';

	function index() {
		$this->SecurePresenter->recursive = 0;
		$this->set('securePresenters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure presenter', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('securePresenter', $this->SecurePresenter->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecurePresenter->create();
			if ($this->SecurePresenter->save($this->data)) {
				$this->Session->setFlash(__('The secure presenter has been saved', true));
				$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure presenter could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->SecurePresenter->Group->find('list');
		$users = $this->SecurePresenter->User->find('list');
		$this->set(compact('groups', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure presenter', true));
			$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecurePresenter->save($this->data)) {
				$this->Session->setFlash(__('The secure presenter has been saved', true));
				$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure presenter could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecurePresenter->read(null, $id);
		}
		$groups = $this->SecurePresenter->Group->find('list');
		$users = $this->SecurePresenter->User->find('list');
		$this->set(compact('groups', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure presenter', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecurePresenter->delete($id)) {
			$this->Session->setFlash(__('Secure presenter deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure presenter was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
