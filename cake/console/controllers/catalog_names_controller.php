<?php
class CatalogNamesController extends AppController {

	var $name = 'CatalogNames';

	function index() {
		$this->CatalogName->recursive = 0;
		$this->set('catalogNames', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid catalog name', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('catalogName', $this->CatalogName->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CatalogName->create();
			if ($this->CatalogName->save($this->data)) {
				$this->Session->setFlash(__('The catalog name has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catalog name could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid catalog name', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CatalogName->save($this->data)) {
				$this->Session->setFlash(__('The catalog name has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The catalog name could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CatalogName->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for catalog name', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CatalogName->delete($id)) {
			$this->Session->setFlash(__('Catalog name deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Catalog name was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
