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
class ProvidersViewCompaniesUnitsController extends AppController {

	var $name = 'ProvidersViewCompaniesUnits';


	function index() {
		$this->ProvidersViewCompaniesUnit->recursive = 0;
		$this->set('providersViewCompaniesUnits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers view companies unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersViewCompaniesUnit', $this->ProvidersViewCompaniesUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersViewCompaniesUnit->create();
			if ($this->ProvidersViewCompaniesUnit->save($this->data)) {
				$this->Session->setFlash(__('The providers view companies unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view companies unit could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers view companies unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersViewCompaniesUnit->save($this->data)) {
				$this->Session->setFlash(__('The providers view companies unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view companies unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersViewCompaniesUnit->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers view companies unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersViewCompaniesUnit->delete($id)) {
			$this->Session->setFlash(__('Providers view companies unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers view companies unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
