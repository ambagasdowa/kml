<?php
class PoliciesTypesController extends AppController {

	var $name = 'PoliciesTypes';

	function index() {
		$this->PoliciesType->recursive = 0;
		$this->set('policiesTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid policies type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('policiesType', $this->PoliciesType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PoliciesType->create();
			if ($this->PoliciesType->save($this->data)) {
				$this->Session->setFlash(__('The policies type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies type could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policies type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PoliciesType->save($this->data)) {
				$this->Session->setFlash(__('The policies type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PoliciesType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for policies type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PoliciesType->delete($id)) {
			$this->Session->setFlash(__('Policies type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Policies type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
