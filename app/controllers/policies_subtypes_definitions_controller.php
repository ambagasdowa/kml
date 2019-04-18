<?php
class PoliciesSubtypesDefinitionsController extends AppController {

	var $name = 'PoliciesSubtypesDefinitions';

	function index() {
		$this->PoliciesSubtypesDefinition->recursive = 0;
		$this->set('policiesSubtypesDefinitions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid policies subtypes definition', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('policiesSubtypesDefinition', $this->PoliciesSubtypesDefinition->read(null, $id));
	}

	function add() {
		// Configure::write('debug',2);
		if (!empty($this->data)) {
			// debug($this->data);
			$this->data['PoliciesSubtypesDefinition']['create'] = date('Y-m-d h:m:s');
			$this->data['PoliciesSubtypesDefinition']['modified'] = date('Y-m-d h:m:s');
			// exit();
			$this->PoliciesSubtypesDefinition->create();
			if ($this->PoliciesSubtypesDefinition->save($this->data)) {
				$this->Session->setFlash(__('The policies subtypes definition has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies subtypes definition could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policies subtypes definition', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PoliciesSubtypesDefinition->save($this->data)) {
				$this->Session->setFlash(__('The policies subtypes definition has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies subtypes definition could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PoliciesSubtypesDefinition->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for policies subtypes definition', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PoliciesSubtypesDefinition->delete($id)) {
			$this->Session->setFlash(__('Policies subtypes definition deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Policies subtypes definition was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
