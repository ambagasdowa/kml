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
class ProjectionsAccessesController extends AppController {

	var $name = 'ProjectionsAccesses';


	function index() {
		$this->ProjectionsAccess->recursive = 0;
		$this->set('projectionsAccesses', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections access', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsAccess', $this->ProjectionsAccess->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsAccess->create();
			if ($this->ProjectionsAccess->save($this->data)) {
				$this->Session->setFlash(__('The projections access has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections access could not be saved. Please, try again.', true));
			}
		}
		$projectionsControlsUsers = $this->ProjectionsAccess->ProjectionsControlsUser->find('list');
		$projectionsAccessModules = $this->ProjectionsAccess->ProjectionsAccessModule->find('list');
		$projectionsViewBussinessUnits = $this->ProjectionsAccess->ProjectionsViewBussinessUnit->find('list');
		$this->set(compact('projectionsControlsUsers', 'projectionsAccessModules', 'projectionsViewBussinessUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections access', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsAccess->save($this->data)) {
				$this->Session->setFlash(__('The projections access has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections access could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsAccess->read(null, $id);
		}
		$projectionsControlsUsers = $this->ProjectionsAccess->ProjectionsControlsUser->find('list');
		$projectionsAccessModules = $this->ProjectionsAccess->ProjectionsAccessModule->find('list');
		$projectionsViewBussinessUnits = $this->ProjectionsAccess->ProjectionsViewBussinessUnit->find('list');
		$this->set(compact('projectionsControlsUsers', 'projectionsAccessModules', 'projectionsViewBussinessUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections access', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsAccess->delete($id)) {
			$this->Session->setFlash(__('Projections access deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections access was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
