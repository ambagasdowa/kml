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
class ProjectionsViewBussinessUnitsController extends AppController {

	var $name = 'ProjectionsViewBussinessUnits';


	function index() {
		$this->ProjectionsViewBussinessUnit->recursive = 0;
		$this->set('projectionsViewBussinessUnits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view bussiness unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewBussinessUnit', $this->ProjectionsViewBussinessUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewBussinessUnit->create();
			if ($this->ProjectionsViewBussinessUnit->save($this->data)) {
				$this->Session->setFlash(__('The projections view bussiness unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view bussiness unit could not be saved. Please, try again.', true));
			}
		}
		$projectionsCorporations = $this->ProjectionsViewBussinessUnit->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view bussiness unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewBussinessUnit->save($this->data)) {
				$this->Session->setFlash(__('The projections view bussiness unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view bussiness unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewBussinessUnit->read(null, $id);
		}
		$projectionsCorporations = $this->ProjectionsViewBussinessUnit->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view bussiness unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewBussinessUnit->delete($id)) {
			$this->Session->setFlash(__('Projections view bussiness unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view bussiness unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
