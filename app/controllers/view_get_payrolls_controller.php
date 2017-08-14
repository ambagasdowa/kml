<?php
class ViewGetPayrollsController extends AppController {

	var $name = 'ViewGetPayrolls';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');

	function index() {
		$this->ViewGetPayroll->recursive = 0;
		$this->paginate = array(
			'limit' => '500'
		);
// 		debug($this->params);
		
		if (!empty($this->data['SecureStructure']['id'])) { // then the second post goes hir
			
			$this->LoadModel('SecureStructure');
			$this->LoadModel('SecureControlUser');
			debug($this->data['ViewGetPayroll']);
			debug($this->data['SecureStructure']['id']);
			$secure_structure_data = $this->SecureStructure->findByid($this->data['SecureStructure']['id']);
			debug($secure_structure_data);
			$count = 0;
			foreach ($this->data['ViewGetPayroll'] as $cvetra => $status) {
				var_dump($cvetra);
				$SecureControlUser['SecureControlUser'][$count]['secure_structures_id'] = $this->data['SecureStructure']['id'];
				$SecureControlUser['SecureControlUser'][$count]['view_get_payrolls_id'] = $cvetra;
				$SecureControlUser['SecureControlUser'][$count]['secure_calendars_id'] = $secure_structure_data['SecureCalendars']['id'];
				++$count;
			}
// debug($this->data);
			$this->SecureControlUser->create();
			if ($this->SecureControlUser->saveAll($SecureControlUser['SecureControlUser'])) {
				$this->Session->setFlash(__('The view get payroll has been saved', true));
				$this->redirect(array('controller' => 'SecureCalendars', 'action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view get payroll could not be saved. Please, try again.', true));
			}
		}
		
		$this->set('viewGetPayrolls', $this->paginate());
		$this->set('secure_structure_data_id',$this->data['ViewGetPayroll']['id']); // at firts post set the id of structure
		//General variable id 
// 			Configure::write('debug', 0);
// 			$this->autoRender = false;
// 			$this->autoLayout = false;
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid view get payroll', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('viewGetPayroll', $this->ViewGetPayroll->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ViewGetPayroll->create();
			if ($this->ViewGetPayroll->save($this->data)) {
				$this->Session->setFlash(__('The view get payroll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view get payroll could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid view get payroll', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ViewGetPayroll->save($this->data)) {
				$this->Session->setFlash(__('The view get payroll has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The view get payroll could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ViewGetPayroll->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for view get payroll', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ViewGetPayroll->delete($id)) {
			$this->Session->setFlash(__('View get payroll deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('View get payroll was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
