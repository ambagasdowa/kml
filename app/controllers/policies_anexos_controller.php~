<?php
class PoliciesAnexosController extends AppController {

	var $name = 'PoliciesAnexos';
	var $components = array('RequestHandler','Session');
	var $helpers = array('Html','Form','Ajax','Javascript');

	function index() {
		$this->PoliciesAnexo->recursive = 0;
		$this->set('policiesAnexos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid policies anexo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('policiesAnexo', $this->PoliciesAnexo->read(null, $id));
	}

	function add() {
		
		$this->LoadModel('Policy','PoliciesFilter','PoliciesType');
		
		$policies = $this->Policy->find('list');
		$policies_types = $this->PoliciesType->find('list');
		$this->set(compact('policy_types'));
		
		if (!empty($this->data)) {
			
			debug($this->data);
			
			if (isset($this->data['PoliciesAnexo']['link']) and $this->data['PoliciesAnexo']['link'] === 'true' ) {
				
				if(end(explode('.',$this->data['PoliciesAnexo']['upload']['name'])) !== 'pdf'){

					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<strong> si el anexo no es descargable solo se permiten archivos pdf </strong>
												</div>', true));
					$this->redirect(array('action' => 'add'));
				} else {
					$ext = '.' . end(explode('.',$this->data['PoliciesAnexo']['upload']['name']));
				}
				
				$name = basename(md5($this->data['PoliciesAnexo']['name'])); // for the long and inconsistent names and drop the basename /tmp
/** ALERT @Work->from->hir->IMPORTANT*/
// 				debug($name);
// 				exit();
/** ALERT IMPORTANT*/
				// Move file to folder in server 
				move_uploaded_file($this->data['PoliciesAnexo']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'policies'.DS.$name.$ext);
				// set the data for policy record
				$this->data['Policy'] = $this->data['PoliciesAnexo'];
				$this->data['Policy']['policies_path'] = $name.$ext;
				$this->Policy->create();
				if ($this->Policy->save($this->Policy->set($this->data['Policy'])) ) {
					$policy_id = $this->Policy->getLastInsertID();
					$this->Session->setFlash(__('The policies anexo has been saved', true));
				} else {
					$this->Session->setFlash(__('The policies anexo could not be saved. Please, try again.', true));
					$this->redirect(array('action' => 'index'));
				}
				
				$this->data['PoliciesAnexo']['anexo_path'] = "policies/view/type:{$this->data['PoliciesAnexo']['policies_type']}/id:$policy_id"; //policies/view/type:/id:/
				$this->data['PoliciesAnexo']['create'] = date('Y-m-d h:m:s'); // appears mysql not working

// 				debug($this->data);
// 				exit();

				$this->PoliciesAnexo->create();

				if ( $this->PoliciesAnexo->save($this->data) ) {
					$this->Session->setFlash(__('The policies anexo has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The policies anexo could not be saved. Please, try again.', true));
				}
			} else {
			
				$ext ='.'. end(explode('.',$this->data['PoliciesAnexo']['upload']['name']));
				$name = basename(md5($this->data['PoliciesAnexo']['name'])); // for the long and inconsistent names and drop the basename /tmp
				move_uploaded_file($this->data['PoliciesAnexo']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'anexos'.DS.$name.$ext);
				$this->data['PoliciesAnexo']['anexo_path'] = $name.$ext;
				$this->data['PoliciesAnexo']['create'] = date('Y-m-d h:m:s'); // appears mysql not working

				$this->PoliciesAnexo->create();
				if ($this->PoliciesAnexo->save($this->data)) {
					$this->Session->setFlash(__('The policies anexo has been saved', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The policies anexo could not be saved. Please, try again.', true));
				}
			}
		}
// 		$policies = $this->Policy->find('list');
		$this->set(compact('policies'));
	}
	
	function addToPolicy () {
		$this->LoadModel('PoliciesType');

		$conditions['PoliciesType.status'] = 'Inactive';
		$policies_types = $this->PoliciesType->find('list',array('conditions'=>$conditions));
		$this->set(compact('policies_types'));

		$this->LoadModel('Group');
		$groups = $this->Group->find('list');
		$this->set(compact('groups'));

		$this->LoadModel('User');
		$users = $this->User->find('list');
		$this->set(compact('users'));
		
		$this->LoadModel('PoliciesFormat');
		$policies_format = $this->PoliciesFormat->find('list');
		$this->set(compact('policies_format'));
		
		if ((int)$this->data['PoliciesAnexo']['download'] !== 0 ) {
			$this->set('anexos_url','policies_anexos_download');
		} else {
			$this->set('anexos_url','policies_anexos_link');
		}
	} // end addToPolicy

	function edit($id = null) {
		$this->LoadModel('Policy','PoliciesFilter');
		$policies = $this->Policy->find('list');
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policies anexo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PoliciesAnexo->save($this->data)) {
				$this->Session->setFlash(__('The policies anexo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policies anexo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PoliciesAnexo->read(null, $id);
		}
		$this->set(compact('policies'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for policies anexo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PoliciesAnexo->delete($id)) {
			$this->Session->setFlash(__('Policies anexo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Policies anexo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
