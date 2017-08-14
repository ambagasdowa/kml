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
class ProjectionsViewIndicatorsPeriodsFleetsController extends AppController {

	var $name = 'ProjectionsViewIndicatorsPeriodsFleets';


	function index() {
		$this->ProjectionsViewIndicatorsPeriodsFleet->recursive = 0;
		$this->set('projectionsViewIndicatorsPeriodsFleets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view indicators periods fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewIndicatorsPeriodsFleet', $this->ProjectionsViewIndicatorsPeriodsFleet->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewIndicatorsPeriodsFleet->create();
			if ($this->ProjectionsViewIndicatorsPeriodsFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods fleet could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view indicators periods fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewIndicatorsPeriodsFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods fleet could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewIndicatorsPeriodsFleet->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view indicators periods fleet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewIndicatorsPeriodsFleet->delete($id)) {
			$this->Session->setFlash(__('Projections view indicators periods fleet deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view indicators periods fleet was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
