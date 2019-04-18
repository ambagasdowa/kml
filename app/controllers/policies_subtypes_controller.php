<?php
class PoliciesSubtypesController extends AppController {

	var $name = 'PoliciesSubtypes';

	function index() {
		$this->PoliciesSubtype->recursive = 0;
		$this->set('policiesSubtypes', $this->paginate());

		$this->LoadModel('PoliciesSubtypesDefinition');
		$conditionsSubDef['PoliciesSubtypesDefinition.status'] = 'Active';
		$policies_subtypes_definitions = $this->PoliciesSubtypesDefinition->find('list',array('conditions'=>$conditionsSubDef));
		$this->set(compact('policies_subtypes_definitions'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid policies subtype', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('policiesSubtype', $this->PoliciesSubtype->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['PoliciesSubtype']['modified'] = date('Y-m-d h:m:s');
			$this->data['PoliciesSubtype']['create'] = date('Y-m-d h:m:s');
			// unset($this->data['PoliciesSubtypesDefinition']['create']);
			// Configure::write('debug',2);
			// debug($this->data);
			// exit();

			$this->PoliciesSubtype->create();
			if ($this->PoliciesSubtype->save($this->data)) {
				$this->Session->setFlash(__('The policies subtype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies subtype could not be saved. Please, try again.', true));
			}
		}
		$conditions['PoliciesType.status'] = 'Active';
		$policiesTypes = $this->PoliciesSubtype->PoliciesType->find('list',array('conditions'=>$conditions));
		$this->set(compact('policiesTypes'));

		$this->LoadModel('PoliciesSubtypesDefinition');
		$conditionsSubDef['PoliciesSubtypesDefinition.status'] = 'Active';
		$policies_subtypes_definitions = $this->PoliciesSubtypesDefinition->find('list',array('conditions'=>$conditionsSubDef));
// 		debug($policies_subtypes_definitions);
		$this->set(compact('policies_subtypes_definitions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policies subtype', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['PoliciesSubtype']['modified'] = date('Y-m-d h:m:s');
			// $this->data['PoliciesSubtype']['create'] = date('Y-m-d h:m:s');
			unset($this->data['PoliciesSubtype']['create']);
			if ($this->PoliciesSubtype->save($this->data)) {
				$this->Session->setFlash(__('The policies subtype has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies subtype could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PoliciesSubtype->read(null, $id);
		}
		$conditions['PoliciesType.status'] = 'Active';
		$policiesTypes = $this->PoliciesSubtype->PoliciesType->find('list',array('conditions'=>$conditions));
		$this->set(compact('policiesTypes'));

		$this->LoadModel('PoliciesSubtypesDefinition');
		$conditionsSubDef['PoliciesSubtypesDefinition.status'] = 'Active';
		$policies_subtypes_definitions = $this->PoliciesSubtypesDefinition->find('list',array('conditions'=>$conditionsSubDef));
// 		debug($policies_subtypes_definitions);
		$this->set(compact('policies_subtypes_definitions'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for policies subtype', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PoliciesSubtype->delete($id)) {
			$this->Session->setFlash(__('Policies subtype deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Policies subtype was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
