<?php
class FieldNamesController extends AppController {

	var $name = 'FieldNames';

	function index() {
		$this->FieldName->recursive = 0;
		$this->set('fieldNames', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid field name', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fieldName', $this->FieldName->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FieldName->create();
			if ($this->FieldName->save($this->data)) {
				$this->Session->setFlash(__('The field name has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field name could not be saved. Please, try again.', true));
			}
		}
		$catalogNames = $this->FieldName->CatalogName->find('list');
		$catalogFields = $this->FieldName->CatalogField->find('list');
		$catalogDatas = $this->FieldName->CatalogData->find('list');
		$this->set(compact('catalogNames', 'catalogFields', 'catalogDatas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid field name', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FieldName->save($this->data)) {
				$this->Session->setFlash(__('The field name has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field name could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FieldName->read(null, $id);
		}
		$catalogNames = $this->FieldName->CatalogName->find('list');
		$catalogFields = $this->FieldName->CatalogField->find('list');
		$catalogDatas = $this->FieldName->CatalogData->find('list');
		$this->set(compact('catalogNames', 'catalogFields', 'catalogDatas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for field name', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FieldName->delete($id)) {
			$this->Session->setFlash(__('Field name deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Field name was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
