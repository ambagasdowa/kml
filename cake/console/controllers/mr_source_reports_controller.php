<?php
class MrSourceReportsController extends AppController {

	var $name = 'MrSourceReports';

	function index() {
		$this->MrSourceReport->recursive = 0;
		$this->set('mrSourceReports', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source report', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceReport', $this->MrSourceReport->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrSourceReport->create();
			if ($this->MrSourceReport->save($this->data)) {
				$this->Session->setFlash(__('The mr source report has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source report could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source report', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceReport->save($this->data)) {
				$this->Session->setFlash(__('The mr source report has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source report could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceReport->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source report', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceReport->delete($id)) {
			$this->Session->setFlash(__('Mr source report deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source report was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
