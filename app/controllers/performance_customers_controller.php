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
class PerformanceCustomersController extends AppController {

	var $name = 'PerformanceCustomers';


	function index() {
		$this->PerformanceCustomer->recursive = 0;
		$this->set('performanceCustomers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance customer', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceCustomer', $this->PerformanceCustomer->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceCustomer->create();
			if ($this->PerformanceCustomer->save($this->data)) {
				$this->Session->setFlash(__('The performance customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance customer could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance customer', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceCustomer->save($this->data)) {
				$this->Session->setFlash(__('The performance customer has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance customer could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceCustomer->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance customer', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceCustomer->delete($id)) {
			$this->Session->setFlash(__('Performance customer deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance customer was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
