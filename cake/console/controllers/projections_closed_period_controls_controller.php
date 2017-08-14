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
class ProjectionsClosedPeriodControlsController extends AppController {

	var $name = 'ProjectionsClosedPeriodControls';


	function index() {
		$this->ProjectionsClosedPeriodControl->recursive = 0;
		$this->set('projectionsClosedPeriodControls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections closed period control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsClosedPeriodControl', $this->ProjectionsClosedPeriodControl->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsClosedPeriodControl->create();
			if ($this->ProjectionsClosedPeriodControl->save($this->data)) {
				$this->Session->setFlash(__('The projections closed period control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections closed period control could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsClosedPeriodControl->User->find('list');
		$projectionsViewBussinessUnits = $this->ProjectionsClosedPeriodControl->ProjectionsViewBussinessUnit->find('list');
		$this->set(compact('users', 'projectionsViewBussinessUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections closed period control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsClosedPeriodControl->save($this->data)) {
				$this->Session->setFlash(__('The projections closed period control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections closed period control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsClosedPeriodControl->read(null, $id);
		}
		$users = $this->ProjectionsClosedPeriodControl->User->find('list');
		$projectionsViewBussinessUnits = $this->ProjectionsClosedPeriodControl->ProjectionsViewBussinessUnit->find('list');
		$this->set(compact('users', 'projectionsViewBussinessUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections closed period control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsClosedPeriodControl->delete($id)) {
			$this->Session->setFlash(__('Projections closed period control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections closed period control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
