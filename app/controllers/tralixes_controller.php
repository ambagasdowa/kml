<?php
class TralixesController extends AppController {

	var $name = 'Tralixes';

	function index() {
		$this->Tralix->recursive = 0;
		$this->set('tralixes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tralix', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tralix', $this->Tralix->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tralix->create();
			if ($this->Tralix->save($this->data)) {
				$this->Session->setFlash(__('The tralix has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tralix could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tralix', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tralix->save($this->data)) {
				$this->Session->setFlash(__('The tralix has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tralix could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tralix->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tralix', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tralix->delete($id)) {
			$this->Session->setFlash(__('Tralix deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tralix was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
