<?php
class MrSourceAccountsController extends AppController {

	var $name = 'MrSourceAccounts';

	function index() {
		$this->MrSourceAccount->recursive = 0;
		$this->set('mrSourceAccounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceAccount', $this->MrSourceAccount->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrSourceAccount->create();
			if ($this->MrSourceAccount->save($this->data)) {
				$this->Session->setFlash(__('The mr source account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source account could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceAccount->save($this->data)) {
				$this->Session->setFlash(__('The mr source account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceAccount->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceAccount->delete($id)) {
			$this->Session->setFlash(__('Mr source account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
