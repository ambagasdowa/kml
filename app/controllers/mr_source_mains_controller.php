<?php
class MrSourceMainsController extends AppController {

	var $name = 'MrSourceMains';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript');
	var $presetVars = array( 
		array('field' => 'name', 'type' => 'value'),
	);
	
	function index() {
		$this->Prg->commonProcess();
		
		$this->MrSourceMain->recursive = 0;
		$this->set('mrSourceMains', $this->paginate());
		
// 		debug($this->MrSourceMain->query('SELECT * FROM view_sp_watch_jobs_monitors'));
		$this->LoadModel('ViewSpWatchJobsMonitor');
		$monitor_mr = $this->ViewSpWatchJobsMonitor->find('all');
		$this->LoadModel('MrViewMonitorCosto');
		$monitor_mr_costos = $this->MrViewMonitorCosto->find('all');
// 		debug($monitor_mr_costos);
		
		$this->set(compact('monitor_mr','monitor_mr_costos'));
		
		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source main', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceMain', $this->MrSourceMain->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrSourceMain->create();
			if ($this->MrSourceMain->save($this->data)) {
				$this->Session->setFlash(__('The mr source main has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source main could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source main', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceMain->save($this->data)) {
				$this->Session->setFlash(__('The mr source main has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source main could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceMain->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source main', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceMain->delete($id)) {
			$this->Session->setFlash(__('Mr source main deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source main was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
