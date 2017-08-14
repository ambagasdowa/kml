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
class ProjectionsClosedPeriodDatasController extends AppController {

	var $name = 'ProjectionsClosedPeriodDatas';


	function index() {
		$this->ProjectionsClosedPeriodData->recursive = 0;
		$this->set('projectionsClosedPeriodDatas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections closed period data', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsClosedPeriodData', $this->ProjectionsClosedPeriodData->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsClosedPeriodData->create();
			if ($this->ProjectionsClosedPeriodData->save($this->data)) {
				$this->Session->setFlash(__('The projections closed period data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections closed period data could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsClosedPeriodData->User->find('list');
		$projectionsClosedPeriodControls = $this->ProjectionsClosedPeriodData->ProjectionsClosedPeriodControl->find('list');
		$this->set(compact('users', 'projectionsClosedPeriodControls'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections closed period data', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsClosedPeriodData->save($this->data)) {
				$this->Session->setFlash(__('The projections closed period data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections closed period data could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsClosedPeriodData->read(null, $id);
		}
		$users = $this->ProjectionsClosedPeriodData->User->find('list');
		$projectionsClosedPeriodControls = $this->ProjectionsClosedPeriodData->ProjectionsClosedPeriodControl->find('list');
		$this->set(compact('users', 'projectionsClosedPeriodControls'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections closed period data', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsClosedPeriodData->delete($id)) {
			$this->Session->setFlash(__('Projections closed period data deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections closed period data was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
