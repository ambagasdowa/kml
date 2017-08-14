<?php
class ViewGetPayrollsController extends AppController {

	var $name = 'ViewGetPayrolls';

	function index() {
		$this->ViewGetPayroll->recursive = 0;
		$this->set('viewGetPayrolls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid view get payroll', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('viewGetPayroll', $this->ViewGetPayroll->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ViewGetPayroll->create();
			if ($this->ViewGetPayroll->save($this->data)) {
				$this->Session->setFlash(__('The view get payroll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view get payroll could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid view get payroll', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ViewGetPayroll->save($this->data)) {
				$this->Session->setFlash(__('The view get payroll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view get payroll could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ViewGetPayroll->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for view get payroll', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ViewGetPayroll->delete($id)) {
			$this->Session->setFlash(__('View get payroll deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('View get payroll was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
