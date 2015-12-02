<?php
class FieldViewsController extends AppController {

	var $name = 'FieldViews';

	function index() {
		$this->FieldView->recursive = 0;
		$this->set('fieldViews', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid field view', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fieldView', $this->FieldView->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FieldView->create();
			if ($this->FieldView->save($this->data)) {
				$this->Session->setFlash(__('The field view has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field view could not be saved. Please, try again.', true));
			}
		}
		$viewTypes = $this->FieldView->ViewType->find('list');
		$this->set(compact('viewTypes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid field view', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FieldView->save($this->data)) {
				$this->Session->setFlash(__('The field view has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field view could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FieldView->read(null, $id);
		}
		$viewTypes = $this->FieldView->ViewType->find('list');
		$this->set(compact('viewTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for field view', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FieldView->delete($id)) {
			$this->Session->setFlash(__('Field view deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Field view was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
