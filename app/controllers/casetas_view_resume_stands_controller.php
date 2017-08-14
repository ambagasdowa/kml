<?php
/**
		* 
		* PHP versions 4 and 5 
		* 
		* kml : Kamila Software 
		* Licensed under The MIT License  
		* Redistributions of files must retain the above copyright notice. 
		* 
		* @copyright     Jesus Baizabal 
		* @link          http://baizabal.xyz 
		* @mail	     baizabal.jesus@gmail.com 
		* @package       cake 
		* @subpackage    cake.cake.console.libs.templates.views 
		* @since         CakePHP(tm) v 1.2.0.5234 
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php) 
		*/
?>

<?php
class CasetasViewResumeStandsController extends AppController {

	var $name = 'CasetasViewResumeStands';


	function index() {
		$this->CasetasViewResumeStand->recursive = 0;
		$this->set('casetasViewResumeStands', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas view resume stand', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasViewResumeStand', $this->CasetasViewResumeStand->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasViewResumeStand->create();
			if ($this->CasetasViewResumeStand->save($this->data)) {
				$this->Session->setFlash(__('The casetas view resume stand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view resume stand could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas view resume stand', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasViewResumeStand->save($this->data)) {
				$this->Session->setFlash(__('The casetas view resume stand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view resume stand could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasViewResumeStand->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas view resume stand', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasViewResumeStand->delete($id)) {
			$this->Session->setFlash(__('Casetas view resume stand deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas view resume stand was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
