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
class ProvidersViewBussinessUnitsController extends AppController {

	var $name = 'ProvidersViewBussinessUnits';
	var $helpers = array('Y');


	function index() {
		$this->ProvidersViewBussinessUnit->recursive = 0;
		$this->set('providersViewBussinessUnits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers view bussiness unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersViewBussinessUnit', $this->ProvidersViewBussinessUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersViewBussinessUnit->create();
			if ($this->ProvidersViewBussinessUnit->save($this->data)) {
				$this->Session->setFlash(__('The providers view bussiness unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view bussiness unit could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers view bussiness unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersViewBussinessUnit->save($this->data)) {
				$this->Session->setFlash(__('The providers view bussiness unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view bussiness unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersViewBussinessUnit->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers view bussiness unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersViewBussinessUnit->delete($id)) {
			$this->Session->setFlash(__('Providers view bussiness unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers view bussiness unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
