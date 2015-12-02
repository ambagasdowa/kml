<?php
class PoliciesFiltersController extends AppController {

	var $name = 'PoliciesFilters';

	function index() {
		$this->paginate = array(
			'limit' => 10
		);
		$this->PoliciesFilter->recursive = 0;
		$this->set('policiesFilters', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid policies filter', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('policiesFilter', $this->PoliciesFilter->read(null, $id));
	}

	function add() {
		$this->LoadModel('Policy');
		if (!empty($this->data)) {
			$this->PoliciesFilter->create();
			if ($this->PoliciesFilter->save($this->data)) {
				$this->Session->setFlash(__('The policies filter has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies filter could not be saved. Please, try again.', true));
			}
		}
		$policies = $this->Policy->find('list');
		$groups = $this->PoliciesFilter->Group->find('list');
		$this->set(compact('policies', 'groups'));
	}

	function edit($id = null) {
		$this->LoadModel('Policy');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policies filter', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PoliciesFilter->save($this->data)) {
				$this->Session->setFlash(__('The policies filter has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies filter could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PoliciesFilter->read(null, $id);
		}
		$policies = $this->Policy->find('list');
		$groups = $this->PoliciesFilter->Group->find('list');
		$this->set(compact('policies', 'groups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for policies filter', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PoliciesFilter->delete($id)) {
			$this->Session->setFlash(__('Policies filter deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Policies filter was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
