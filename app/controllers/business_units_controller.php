<?php
class BusinessUnitsController extends AppController {

	var $name = 'BusinessUnits';

	function index() {
		$this->BusinessUnit->recursive = 0;
		$this->set('businessUnits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid business unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('businessUnit', $this->BusinessUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->BusinessUnit->create();
			if ($this->BusinessUnit->save($this->data)) {
				$this->Session->setFlash(__('The business unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business unit could not be saved. Please, try again.', true));
			}
		}
		$companies = $this->BusinessUnit->Company->find('list');
		$this->set(compact('companies'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid business unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BusinessUnit->save($this->data)) {
				$this->Session->setFlash(__('The business unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The business unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BusinessUnit->read(null, $id);
		}
		$companies = $this->BusinessUnit->Company->find('list');
		$this->set(compact('companies'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for business unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BusinessUnit->delete($id)) {
			$this->Session->setFlash(__('Business unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Business unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
