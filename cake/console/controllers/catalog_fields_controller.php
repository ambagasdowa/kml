<?php
class CatalogFieldsController extends AppController {

	var $name = 'CatalogFields';

	function index() {
		$this->CatalogField->recursive = 0;
		$this->set('catalogFields', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid catalog field', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('catalogField', $this->CatalogField->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CatalogField->create();
			if ($this->CatalogField->save($this->data)) {
				$this->Session->setFlash(__('The catalog field has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catalog field could not be saved. Please, try again.', true));
			}
		}
		$catalogNames = $this->CatalogField->CatalogName->find('list');
		$this->set(compact('catalogNames'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid catalog field', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CatalogField->save($this->data)) {
				$this->Session->setFlash(__('The catalog field has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catalog field could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CatalogField->read(null, $id);
		}
		$catalogNames = $this->CatalogField->CatalogName->find('list');
		$this->set(compact('catalogNames'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for catalog field', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CatalogField->delete($id)) {
			$this->Session->setFlash(__('Catalog field deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Catalog field was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
