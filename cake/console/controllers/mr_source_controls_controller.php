<?php
class MrSourceControlsController extends AppController {

	var $name = 'MrSourceControls';

	function index() {
		$this->MrSourceControl->recursive = 0;
		$this->set('mrSourceControls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceControl', $this->MrSourceControl->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrSourceControl->create();
			if ($this->MrSourceControl->save($this->data)) {
				$this->Session->setFlash(__('The mr source control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source control could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceControl->save($this->data)) {
				$this->Session->setFlash(__('The mr source control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceControl->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceControl->delete($id)) {
			$this->Session->setFlash(__('Mr source control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
