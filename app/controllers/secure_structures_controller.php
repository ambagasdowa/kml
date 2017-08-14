<?php
class SecureStructuresController extends AppController {

	var $name = 'SecureStructures';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js' => array('Jquery'));
// 	var $helpers = array('Js' => array('Jquery'));
	
	function index() {
		$this->SecureStructure->recursive = 0;
		$this->set('secureStructures', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure structure', true));
			$this->redirect(array('action' => 'index'));
		}

// 		$this->LoadModel('SecureControlUser');
// 		$conditionsSecureStructure['SecureControlUser.secure_structures_id'] = $id;
// 		$secure_structure_data = $this->SecureControlUser->find('list',array('fields'=>array('id','view_get_payrolls_id'),'conditions'=>$conditionsSecureStructure));
// 		debug($secure_structure_data);
// 		
// 		$this->LoadModel('ViewGetPayroll');
// 		$conditionsViewPayroll['ViewGetPayroll.Cvetra'] = $secure_structure_data;
// 		$courses_users = $this->ViewGetPayroll->find('list',array('conditions'=>$conditionsViewPayroll));
// 		debug($courses_users);
		
		$this->set('secureStructure', $this->SecureStructure->read(null, $id));
	}

	function add() {
// 		debug($this->data);
// 		debug($this->params);
// 		exit();
		
		if (!empty($this->data)) {
			$this->SecureStructure->create();
			if ($this->SecureStructure->save($this->data)) {
				$this->Session->setFlash(__('The secure structure has been saved', true));
				$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure structure could not be saved. Please, try again.', true));
			}
		}
		$groups = $this->SecureStructure->Group->find('list');
		$users = $this->SecureStructure->User->find('list');
		$secureTopics = $this->SecureStructure->SecureTopics->find('list');
		$secureTopicsTypes = $this->SecureStructure->SecureTopicsTypes->find('list');
		$secureGpoChiefs = $this->SecureStructure->SecureGpoChiefs->find('list');
		$secureGoes = $this->SecureStructure->SecureGoes->find('list');
		$secureCalendars = $this->SecureStructure->SecureCalendars->find('list');
		$this->set(compact('groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes', 'secureCalendars'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure structure', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SecureStructure->save($this->data)) {
				$this->Session->setFlash(__('The secure structure has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure structure could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureStructure->read(null, $id);
		}
		$groups = $this->SecureStructure->Group->find('list');
		$users = $this->SecureStructure->User->find('list');
		$secureTopics = $this->SecureStructure->SecureTopics->find('list');
		$secureTopicsTypes = $this->SecureStructure->SecureTopicsTypes->find('list');
		$secureGpoChiefs = $this->SecureStructure->SecureGpoChiefs->find('list');
		$secureGoes = $this->SecureStructure->SecureGoes->find('list');
		$secureCalendars = $this->SecureStructure->SecureCalendars->find('list');
		$this->set(compact('groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes', 'secureCalendars'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure structure', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureStructure->delete($id)) {
			$this->Session->setFlash(__('Secure structure deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure structure was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
