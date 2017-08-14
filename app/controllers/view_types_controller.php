<?php
class ViewTypesController extends AppController {

	var $name = 'ViewTypes';

	function index() {
		$this->ViewType->recursive = 0;
		$this->set('viewTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid view type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('viewType', $this->ViewType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ViewType->create();
			if ($this->ViewType->save($this->data)) {
				$this->Session->setFlash(__('The view type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view type could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid view type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ViewType->save($this->data)) {
				$this->Session->setFlash(__('The view type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ViewType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for view type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ViewType->delete($id)) {
			$this->Session->setFlash(__('View type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('View type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
