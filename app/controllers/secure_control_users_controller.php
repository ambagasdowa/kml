<?php
class SecureControlUsersController extends AppController {

	var $name = 'SecureControlUsers';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');
// 	var $helpers = array('Html','Form','Ajax','Javascript','Js' => array('Jquery'));

	function index($id = null) {
// 		$id = '2';
// 		debug($this->params);
// 		debug($this->paging);
		$this->SecureControlUser->recursive = 0;

		if (!empty($id)) {
			$conditionsSecureControlUser['SecureControlUser.secure_structures_id'] = $id;
		} else {
			$conditionsSecureControlUser = null;
		}

		$this->paginate = array(
			'conditions' => $conditionsSecureControlUser,
			'limit' => 500
		);
// 		$data = $this->paginate('Recipe');
// 		$this->set(compact('data'));
		
// 		debug($this->paginate());
		$this->LoadModel('SecureStructure');
		$groups = $this->SecureStructure->Group->find('list');
		$users = $this->SecureStructure->User->find('list');
		$secureTopics = $this->SecureStructure->SecureTopics->find('list');
		$secureTopicsTypes = $this->SecureStructure->SecureTopicsTypes->find('list');
		$secureGpoChiefs = $this->SecureStructure->SecureGpoChiefs->find('list');
		$secureGoes = $this->SecureStructure->SecureGoes->find('list');
		$secureCalendars = $this->SecureStructure->SecureCalendars->find('list');
		$this->set(compact('groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes', 'secureCalendars'));
		$this->set('secureControlUsers', $this->paginate());
		if (!empty($id)) {
			$this->set('secureControl_id',$id);
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure control user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureControlUser', $this->SecureControlUser->read(null, $id));
	}

	function add() {

		if (!empty($this->data)) {
			debug($this->data);
			exit();
			$this->SecureControlUser->create();
			if ($this->SecureControlUser->save($this->data)) {
				$this->Session->setFlash(__('The secure control user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The secure control user could not be saved. Please, try again.', true));
			}
		}
		$secureStructures = $this->SecureControlUser->SecureStructures->find('list');

		// NOTE create a virtual field on the fly
		$this->SecureControlUser->ViewGetPayrolls->virtualFields['virtual_name'] = "rtrim(ltrim(ViewGetPayrolls.Nombre)) + ' ' + rtrim(ltrim(ViewGetPayrolls.Apepat))";
		// NOTICE encode properly
		$viewGetPayrolls = array_map('utf8_encode',$this->SecureControlUser->ViewGetPayrolls->find('list',array('fields'=>array('id','virtual_name'))));

		$this->set(compact('secureStructures', 'viewGetPayrolls'));
		debug($viewGetPayrolls);
	}

	
	function edit($id = null) {
// 		debug($this->params);
		debug($this->data);
// 		var_dump($id);
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid secure control user', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {

			$conditionsSecureControlUser['SecureControlUser.secure_structures_id'] = $this->data['SecureControl_id']['secureControl_id'];
// 			debug($conditionsSecureControlUser);
			$full_secure_data = $this->SecureControlUser->find('list',array('fields'=>array('id','view_get_payrolls_id'),'conditions'=>$conditionsSecureControlUser));
			debug($full_secure_data);
			
			if ( isset($this->data['SecureControlUser']) ) {
				$count = 0;
				foreach($this->data['SecureControlUser'] as $keys => $status) {
	// 				var_dump($status);
					if ($status === 'on') {
						$secureControlUserOn[$count] = $keys;
					}
					++$count;
				}
				
				$secureControlUserOff = array_diff($full_secure_data,$secureControlUserOn);
				// Build Conditions for on and off
				var_dump($secureControlUserOn);
// 			      $this->Leader->unbindModel(array('hasMany' => array('Follower')));
				
				$conditionsSecureControlUserOn['SecureControlUser.view_get_payrolls_id'] = $secureControlUserOn;
				// NOTE then update on records
// 					$this->SecureControlUser->unbindModel(array('belongsTo'=>array('SecureStructure','ViewGetPayroll')));
					if ($this->SecureControlUser->updateAll(array('SecureControlUser.course_is_taken'=>true),$conditionsSecureControlUserOn)) {
						$this->Session->setFlash(__('The secure control user has been saved', true));
					} else {
						$this->Session->setFlash(__('The secure control user could not be saved. Please, try again.', true));
					}
				var_dump(array_values($secureControlUserOff));
				
				if ( !empty($secureControlUserOff) ) {
					$conditionsSecureControlUserOff['SecureControlUser.view_get_payrolls_id'] = array_values($secureControlUserOff);
				// NOTE then update off records
					$this->SecureControlUser->unbindModel(array('belongsTo'=>array('SecureStructures','ViewGetPayrolls')));
					if ($this->SecureControlUser->updateAll(array('SecureControlUser.course_is_taken'=>'0'),$conditionsSecureControlUserOff)) {
						$this->Session->setFlash(__('The secure control user has been saved', true));
					} else {
						$this->Session->setFlash(__('The secure control user could not be saved. Please, try again.', true));
					}
				}
			} else { // End isset this data
					$conditionsSecureControlUserOff['SecureControlUser.view_get_payrolls_id'] = array_values($full_secure_data);
				// NOTE then update off records
					$this->SecureControlUser->unbindModel(array('belongsTo'=>array('SecureStructures','ViewGetPayrolls')));
					if ($this->SecureControlUser->updateAll(array('SecureControlUser.course_is_taken'=>'0'),$conditionsSecureControlUserOff)) {
						$this->Session->setFlash(__('The secure control user has been saved', true));
					} else {
						$this->Session->setFlash(__('The secure control user could not be saved. Please, try again.', true));
					}
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureControlUser->read(null, $id);
		}
		$secureStructures = $this->SecureControlUser->SecureStructures->find('list');
		$viewGetPayrolls = $this->SecureControlUser->ViewGetPayrolls->find('list');
		$this->set(compact('secureStructures', 'viewGetPayrolls'));
		Configure::write('debug', 0);
		$this->autoRender = false;
		$this->autoLayout = false;
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure control user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureControlUser->delete($id)) {
			$this->Session->setFlash(__('Secure control user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure control user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
