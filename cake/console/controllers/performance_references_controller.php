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
class PerformanceReferencesController extends AppController {

	var $name = 'PerformanceReferences';


	function index() {
		$this->PerformanceReference->recursive = 0;
		$this->set('performanceReferences', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance reference', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceReference', $this->PerformanceReference->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceReference->create();
			if ($this->PerformanceReference->save($this->data)) {
				$this->Session->setFlash(__('The performance reference has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance reference could not be saved. Please, try again.', true));
			}
		}
		$performanceCustomers = $this->PerformanceReference->PerformanceCustomer->find('list');
		$this->set(compact('performanceCustomers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance reference', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceReference->save($this->data)) {
				$this->Session->setFlash(__('The performance reference has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance reference could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceReference->read(null, $id);
		}
		$performanceCustomers = $this->PerformanceReference->PerformanceCustomer->find('list');
		$this->set(compact('performanceCustomers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance reference', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceReference->delete($id)) {
			$this->Session->setFlash(__('Performance reference deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance reference was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
