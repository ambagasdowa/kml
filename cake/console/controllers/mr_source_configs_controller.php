<?php
class MrSourceConfigsController extends AppController {

	var $name = 'MrSourceConfigs';

	function index() {
		$this->MrSourceConfig->recursive = 0;
		$this->set('mrSourceConfigs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source config', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceConfig', $this->MrSourceConfig->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrSourceConfig->create();
			if ($this->MrSourceConfig->save($this->data)) {
				$this->Session->setFlash(__('The mr source config has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source config could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source config', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceConfig->save($this->data)) {
				$this->Session->setFlash(__('The mr source config has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source config could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceConfig->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source config', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceConfig->delete($id)) {
			$this->Session->setFlash(__('Mr source config deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source config was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
