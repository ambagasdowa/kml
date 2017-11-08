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
class PerformanceFacturasController extends AppController {

	var $name = 'PerformanceFacturas';


	function index() {
		$this->PerformanceFactura->recursive = 0;
		$this->set('performanceFacturas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance factura', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceFactura', $this->PerformanceFactura->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceFactura->create();
			if ($this->PerformanceFactura->save($this->data)) {
				$this->Session->setFlash(__('The performance factura has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance factura could not be saved. Please, try again.', true));
			}
		}
		$performanceCustomers = $this->PerformanceFactura->PerformanceCustomer->find('list');
		$performanceReferences = $this->PerformanceFactura->PerformanceReference->find('list');
		$users = $this->PerformanceFactura->User->find('list');
		$this->set(compact('performanceCustomers', 'performanceReferences', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance factura', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceFactura->save($this->data)) {
				$this->Session->setFlash(__('The performance factura has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance factura could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceFactura->read(null, $id);
		}
		$performanceCustomers = $this->PerformanceFactura->PerformanceCustomer->find('list');
		$performanceReferences = $this->PerformanceFactura->PerformanceReference->find('list');
		$users = $this->PerformanceFactura->User->find('list');
		$this->set(compact('performanceCustomers', 'performanceReferences', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance factura', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceFactura->delete($id)) {
			$this->Session->setFlash(__('Performance factura deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance factura was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
