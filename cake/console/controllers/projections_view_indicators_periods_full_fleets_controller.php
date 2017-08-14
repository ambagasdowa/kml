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
class ProjectionsViewIndicatorsPeriodsFullFleetsController extends AppController {

	var $name = 'ProjectionsViewIndicatorsPeriodsFullFleets';


	function index() {
		$this->ProjectionsViewIndicatorsPeriodsFullFleet->recursive = 0;
		$this->set('projectionsViewIndicatorsPeriodsFullFleets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view indicators periods full fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewIndicatorsPeriodsFullFleet', $this->ProjectionsViewIndicatorsPeriodsFullFleet->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewIndicatorsPeriodsFullFleet->create();
			if ($this->ProjectionsViewIndicatorsPeriodsFullFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods full fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods full fleet could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view indicators periods full fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewIndicatorsPeriodsFullFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods full fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods full fleet could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewIndicatorsPeriodsFullFleet->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view indicators periods full fleet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewIndicatorsPeriodsFullFleet->delete($id)) {
			$this->Session->setFlash(__('Projections view indicators periods full fleet deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view indicators periods full fleet was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
