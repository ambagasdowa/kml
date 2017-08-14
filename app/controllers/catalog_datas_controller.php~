<?php
class CatalogDatasController extends AppController {

	var $name = 'CatalogDatas';

	function index() {
		$this->CatalogData->recursive = 0;
		$this->set('catalogDatas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid catalog data', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('catalogData', $this->CatalogData->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CatalogData->create();
			if ($this->CatalogData->save($this->data)) {
				$this->Session->setFlash(__('The catalog data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catalog data could not be saved. Please, try again.', true));
			}
		}
		$catalogNames = $this->CatalogData->CatalogName->find('list');
		$catalogFields = $this->CatalogData->CatalogField->find('list');
		$this->set(compact('catalogNames', 'catalogFields'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid catalog data', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CatalogData->save($this->data)) {
				$this->Session->setFlash(__('The catalog data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catalog data could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CatalogData->read(null, $id);
		}
		$catalogNames = $this->CatalogData->CatalogName->find('list');
		$catalogFields = $this->CatalogData->CatalogField->find('list');
		$this->set(compact('catalogNames', 'catalogFields'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for catalog data', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CatalogData->delete($id)) {
			$this->Session->setFlash(__('Catalog data deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Catalog data was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
