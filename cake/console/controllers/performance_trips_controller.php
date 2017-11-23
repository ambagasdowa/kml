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
class PerformanceTripsController extends AppController {

	var $name = 'PerformanceTrips';


	function index() {
		$this->PerformanceTrip->recursive = 0;
		$this->set('performanceTrips', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance trip', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceTrip', $this->PerformanceTrip->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceTrip->create();
			if ($this->PerformanceTrip->save($this->data)) {
				$this->Session->setFlash(__('The performance trip has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance trip could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance trip', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceTrip->save($this->data)) {
				$this->Session->setFlash(__('The performance trip has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance trip could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceTrip->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance trip', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceTrip->delete($id)) {
			$this->Session->setFlash(__('Performance trip deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance trip was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
