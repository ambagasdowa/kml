<?php
class FieldViewsController extends AppController {

	var $name = 'FieldViews';

	function index() {
		
		
		App::import('Core', 'HttpSocket');
		
		$HttpSocketPr = new HttpSocket();
// 		$results = $HttpSocketPr->get('https://www.google.com.mx/search', 'q=php');
		$HttpSocketPr->get('http://anonymouse.org/cgi-bin/anon-www.cgi/http://187.141.67.234/projections/users/login');
// 		returns html for Google's search results for the query "cakephp"
		if(!empty($HttpSocketPr->response['cookies']['CAKEPHP']['path']) and $HttpSocketPr->response['cookies']['CAKEPHP']['path'] === '/projections'){
			debug($HttpSocketPr->response['cookies']);
			var_dump('Projections External site is OK');
		} else {
			var_dump('Projections External site is Down');
		}
		
		
		$HttpSocketGst = new HttpSocket();
		$HttpSocketGst->get('http://anonymouse.org/cgi-bin/anon-www.cgi/http://187.141.67.234/gst/users/login');
		if(!empty($HttpSocketGst->response['cookies']['CAKEPHP']['path']) and $HttpSocketGst->response['cookies']['CAKEPHP']['path'] === '/gst'){
			debug($HttpSocketGst->response['cookies']);
			var_dump('Gst External site is OK');
		} else {
			var_dump('Gst External site is Down');
		}
		
// 		$HttpSocketFm = new HttpSocket();
// 		$HttpSocketFm->get('http://localhost/smb/class/filemanager/filemanager.php');
// 
// 		$this->set('fm',$HttpSocketFm->response['body']);

		$this->FieldView->recursive = 0;
		$this->set('fieldViews', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid field view', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fieldView', $this->FieldView->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FieldView->create();
			if ($this->FieldView->save($this->data)) {
				$this->Session->setFlash(__('The field view has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field view could not be saved. Please, try again.', true));
			}
		}
		$viewTypes = $this->FieldView->ViewType->find('list');
		$this->set(compact('viewTypes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid field view', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FieldView->save($this->data)) {
				$this->Session->setFlash(__('The field view has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field view could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FieldView->read(null, $id);
		}
		$viewTypes = $this->FieldView->ViewType->find('list');
		$this->set(compact('viewTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for field view', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FieldView->delete($id)) {
			$this->Session->setFlash(__('Field view deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Field view was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
