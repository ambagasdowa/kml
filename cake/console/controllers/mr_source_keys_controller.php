<?php
class MrSourceKeysController extends AppController {

	var $name = 'MrSourceKeys';

	function index() {
		$this->MrSourceKey->recursive = 0;
		$this->set('mrSourceKeys', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source key', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceKey', $this->MrSourceKey->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrSourceKey->create();
			if ($this->MrSourceKey->save($this->data)) {
				$this->Session->setFlash(__('The mr source key has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source key could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source key', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceKey->save($this->data)) {
				$this->Session->setFlash(__('The mr source key has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source key could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceKey->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source key', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceKey->delete($id)) {
			$this->Session->setFlash(__('Mr source key deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source key was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
