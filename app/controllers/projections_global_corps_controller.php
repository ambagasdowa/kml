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
class ProjectionsGlobalCorpsController extends AppController {

	var $name = 'ProjectionsGlobalCorps';


	function index() {
		$this->ProjectionsGlobalCorp->recursive = 0;
		$this->set('projectionsGlobalCorps', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections global corp', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsGlobalCorp', $this->ProjectionsGlobalCorp->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsGlobalCorp->create();
			if ($this->ProjectionsGlobalCorp->save($this->data)) {
				$this->Session->setFlash(__('The projections global corp has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections global corp could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsGlobalCorp->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections global corp', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsGlobalCorp->save($this->data)) {
				$this->Session->setFlash(__('The projections global corp has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections global corp could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsGlobalCorp->read(null, $id);
		}
		$users = $this->ProjectionsGlobalCorp->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections global corp', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsGlobalCorp->delete($id)) {
			$this->Session->setFlash(__('Projections global corp deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections global corp was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
