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
class ProjectionsViewIndicatorsPeriodsController extends AppController {

	var $name = 'ProjectionsViewIndicatorsPeriods';


	function index() {
		$this->ProjectionsViewIndicatorsPeriod->recursive = 0;
		$this->set('projectionsViewIndicatorsPeriods', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view indicators period', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewIndicatorsPeriod', $this->ProjectionsViewIndicatorsPeriod->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewIndicatorsPeriod->create();
			if ($this->ProjectionsViewIndicatorsPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators period could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view indicators period', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewIndicatorsPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators period could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewIndicatorsPeriod->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view indicators period', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewIndicatorsPeriod->delete($id)) {
			$this->Session->setFlash(__('Projections view indicators period deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view indicators period was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
