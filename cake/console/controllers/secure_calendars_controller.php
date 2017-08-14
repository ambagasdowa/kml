<?php
class SecureCalendarsController extends AppController {

	var $name = 'SecureCalendars';

	function index() {
		$this->SecureCalendar->recursive = 0;
		$this->set('secureCalendars', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure calendar', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureCalendar', $this->SecureCalendar->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SecureCalendar->create();
			if ($this->SecureCalendar->save($this->data)) {
				$this->Session->setFlash(__('The secure calendar has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure calendar could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure calendar', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureCalendar->save($this->data)) {
				$this->Session->setFlash(__('The secure calendar has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure calendar could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureCalendar->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure calendar', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureCalendar->delete($id)) {
			$this->Session->setFlash(__('Secure calendar deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure calendar was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
