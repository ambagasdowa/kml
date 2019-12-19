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
class ProvidersViewVendorsController extends AppController {

	var $name = 'ProvidersViewVendors';


	function index() {
		$this->ProvidersViewVendor->recursive = 0;
		$this->set('providersViewVendors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers view vendor', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersViewVendor', $this->ProvidersViewVendor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersViewVendor->create();
			if ($this->ProvidersViewVendor->save($this->data)) {
				$this->Session->setFlash(__('The providers view vendor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view vendor could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers view vendor', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersViewVendor->save($this->data)) {
				$this->Session->setFlash(__('The providers view vendor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view vendor could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersViewVendor->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers view vendor', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersViewVendor->delete($id)) {
			$this->Session->setFlash(__('Providers view vendor deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers view vendor was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
