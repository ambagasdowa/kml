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
class PerformanceViajesController extends AppController {

	var $name = 'PerformanceViajes';


	function index() {
		$this->PerformanceViaje->recursive = 0;
		$this->set('performanceViajes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance viaje', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceViaje', $this->PerformanceViaje->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceViaje->create();
			if ($this->PerformanceViaje->save($this->data)) {
				$this->Session->setFlash(__('The performance viaje has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance viaje could not be saved. Please, try again.', true));
			}
		}
		$projectionsCorporations = $this->PerformanceViaje->ProjectionsCorporation->find('list');
		$performanceBsuses = $this->PerformanceViaje->PerformanceBsus->find('list');
		$users = $this->PerformanceViaje->User->find('list');
		$this->set(compact('projectionsCorporations', 'performanceBsuses', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance viaje', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceViaje->save($this->data)) {
				$this->Session->setFlash(__('The performance viaje has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance viaje could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceViaje->read(null, $id);
		}
		$projectionsCorporations = $this->PerformanceViaje->ProjectionsCorporation->find('list');
		$performanceBsuses = $this->PerformanceViaje->PerformanceBsus->find('list');
		$users = $this->PerformanceViaje->User->find('list');
		$this->set(compact('projectionsCorporations', 'performanceBsuses', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance viaje', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceViaje->delete($id)) {
			$this->Session->setFlash(__('Performance viaje deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance viaje was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
