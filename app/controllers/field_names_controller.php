<?php
class FieldNamesController extends AppController {

	var $name = 'FieldNames';

	function index() {
		$this->FieldName->recursive = 0;
		$this->set('fieldNames', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid field name', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fieldName', $this->FieldName->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			
			$this->LoadModel('User');
			$this->LoadModel('FieldData');
// 			$this->LoadModel('Group');
			debug($this->data);
			
// 			debug($this->User->find('list'));
// 			debug($this->User->find('all'));
// 			debug($this->Group->find('list'));
			$user = $this->User->find('list');
			$user_group = $this->User->find('list',array('fields'=>array('id','group_id')));
			$data_user = $this->data['FieldName'];
			
			
			$this->FieldName->create();
			
			if ($this->FieldName->save($this->data)) {
				
				$FieldNameId = $this->FieldName->getLastInsertID();
				debug($FieldNameId);
				
				foreach ($user as $user_id => $username ) {
					debug($user_id);
					// build the array 
					$data_user['user_id'] = $user_id ;
					$data_user['group_id'] = $user_group[$user_id];
					$data_user['field_names_id'] = $FieldNameId;
					$data_user['create'] = date('Y-m-d H:m:s');
					$dataSet[] = $data_user;
				}

				$this->FieldData->create();
				if ($this->FieldData->saveAll($dataSet)) {
					$this->Session->setFlash(__('The field name has been saved', true));
				} else {
					$this->Session->setFlash(__('The field name could not be saved. Please, try again.', true));
				}

				$this->Session->setFlash(__('The field name has been saved', true));
				$this->redirect(array('action' => 'index'));
				
			} else {
				$this->Session->setFlash(__('The field name could not be saved. Please, try again.', true));
			}
		}
		
		$catalogNames = $this->FieldName->CatalogNames->find('list');
		$catalogFields = $this->FieldName->CatalogFields->find('list');
// 		$catalogDatas = $this->FieldName->CatalogDatas->find('list');
		$this->set(compact('catalogNames', 'catalogFields', 'catalogDatas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid field name', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FieldName->save($this->data)) {
				$this->Session->setFlash(__('The field name has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field name could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FieldName->read(null, $id);
		}
		$catalogNames = $this->FieldName->CatalogNames->find('list');
		$catalogFields = $this->FieldName->CatalogFields->find('list');
// 		$catalogDatas = $this->FieldName->CatalogDatas->find('list');
		$this->set(compact('catalogNames', 'catalogFields', 'catalogDatas'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for field name', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FieldName->delete($id)) {
			$this->Session->setFlash(__('Field name deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Field name was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
