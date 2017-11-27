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
class PerformanceViewViajesController extends AppController {

	var $name = 'PerformanceViewViajes';


	function index() {





		$this->PerformanceViewViaje->recursive = 0;
		$this->set('performanceViewViajes', $this->paginate());

		
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance view viaje', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceViewViaje', $this->PerformanceViewViaje->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceViewViaje->create();
			if ($this->PerformanceViewViaje->save($this->data)) {
				$this->Session->setFlash(__('The performance view viaje has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance view viaje could not be saved. Please, try again.', true));
			}
		}
		$performanceBsuses = $this->PerformanceViewViaje->PerformanceBsus->find('list');
		$users = $this->PerformanceViewViaje->User->find('list');
		$this->set(compact('performanceBsuses', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance view viaje', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceViewViaje->save($this->data)) {
				$this->Session->setFlash(__('The performance view viaje has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance view viaje could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceViewViaje->read(null, $id);
		}
		$performanceBsuses = $this->PerformanceViewViaje->PerformanceBsus->find('list');
		$users = $this->PerformanceViewViaje->User->find('list');
		$this->set(compact('performanceBsuses', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance view viaje', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceViewViaje->delete($id)) {
			$this->Session->setFlash(__('Performance view viaje deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance view viaje was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
