<?php
class FieldDatasController extends AppController {

	var $name = 'FieldDatas';

	function index() {
		$this->FieldData->recursive = 0;
		$this->set('fieldDatas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid field data', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fieldData', $this->FieldData->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FieldData->create();
			if ($this->FieldData->save($this->data)) {
				$this->Session->setFlash(__('The field data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field data could not be saved. Please, try again.', true));
			}
		}
		$fieldNames = $this->FieldData->FieldName->find('list');
		$users = $this->FieldData->User->find('list');
		$groups = $this->FieldData->Group->find('list');
		$catalogDatas = $this->FieldData->CatalogData->find('list');
		$this->set(compact('fieldNames', 'users', 'groups', 'catalogDatas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid field data', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FieldData->save($this->data)) {
				$this->Session->setFlash(__('The field data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field data could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FieldData->read(null, $id);
		}
		$fieldNames = $this->FieldData->FieldName->find('list');
		$users = $this->FieldData->User->find('list');
		$groups = $this->FieldData->Group->find('list');
		$catalogDatas = $this->FieldData->CatalogData->find('list');
		$this->set(compact('fieldNames', 'users', 'groups', 'catalogDatas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for field data', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FieldData->delete($id)) {
			$this->Session->setFlash(__('Field data deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Field data was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
