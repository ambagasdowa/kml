<?php
class SecureStructuresController extends AppController {

	var $name = 'SecureStructures';

	function index() {
		$this->SecureStructure->recursive = 0;
		$this->set('secureStructures', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure structure', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureStructure', $this->SecureStructure->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecureStructure->create();
			if ($this->SecureStructure->save($this->data)) {
				$this->Session->setFlash(__('The secure structure has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure structure could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->SecureStructure->Group->find('list');
		$users = $this->SecureStructure->User->find('list');
		$secureTopics = $this->SecureStructure->SecureTopic->find('list');
		$secureTopicsTypes = $this->SecureStructure->SecureTopicsType->find('list');
		$secureGpoChiefs = $this->SecureStructure->SecureGpoChief->find('list');
		$secureGoes = $this->SecureStructure->SecureGo->find('list');
		$secureCalendars = $this->SecureStructure->SecureCalendar->find('list');
		$this->set(compact('groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes', 'secureCalendars'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure structure', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureStructure->save($this->data)) {
				$this->Session->setFlash(__('The secure structure has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure structure could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureStructure->read(null, $id);
		}
		$groups = $this->SecureStructure->Group->find('list');
		$users = $this->SecureStructure->User->find('list');
		$secureTopics = $this->SecureStructure->SecureTopic->find('list');
		$secureTopicsTypes = $this->SecureStructure->SecureTopicsType->find('list');
		$secureGpoChiefs = $this->SecureStructure->SecureGpoChief->find('list');
		$secureGoes = $this->SecureStructure->SecureGo->find('list');
		$secureCalendars = $this->SecureStructure->SecureCalendar->find('list');
		$this->set(compact('groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes', 'secureCalendars'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure structure', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureStructure->delete($id)) {
			$this->Session->setFlash(__('Secure structure deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure structure was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
