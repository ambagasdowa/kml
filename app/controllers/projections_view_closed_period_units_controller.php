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
class ProjectionsViewClosedPeriodUnitsController extends AppController {

	var $name = 'ProjectionsViewClosedPeriodUnits';


	function index() {
		$this->ProjectionsViewClosedPeriodUnit->recursive = 0;
		$this->set('projectionsViewClosedPeriodUnits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view closed period unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewClosedPeriodUnit', $this->ProjectionsViewClosedPeriodUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewClosedPeriodUnit->create();
			if ($this->ProjectionsViewClosedPeriodUnit->save($this->data)) {
				$this->Session->setFlash(__('The projections view closed period unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view closed period unit could not be saved. Please, try again.', true));
			}
		}
		$projectionsCorporations = $this->ProjectionsViewClosedPeriodUnit->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view closed period unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewClosedPeriodUnit->save($this->data)) {
				$this->Session->setFlash(__('The projections view closed period unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view closed period unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewClosedPeriodUnit->read(null, $id);
		}
		$projectionsCorporations = $this->ProjectionsViewClosedPeriodUnit->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view closed period unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewClosedPeriodUnit->delete($id)) {
			$this->Session->setFlash(__('Projections view closed period unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view closed period unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
