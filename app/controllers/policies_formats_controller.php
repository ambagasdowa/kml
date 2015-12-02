<?php
class PoliciesFormatsController extends AppController {

	var $name = 'PoliciesFormats';

	function index() {
		$this->PoliciesFormat->recursive = 0;
		$this->set('policiesFormats', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid policies format', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('policiesFormat', $this->PoliciesFormat->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PoliciesFormat->create();
			if ($this->PoliciesFormat->save($this->data)) {
				$this->Session->setFlash(__('The policies format has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies format could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policies format', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PoliciesFormat->save($this->data)) {
				$this->Session->setFlash(__('The policies format has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies format could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PoliciesFormat->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for policies format', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PoliciesFormat->delete($id)) {
			$this->Session->setFlash(__('Policies format deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Policies format was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
