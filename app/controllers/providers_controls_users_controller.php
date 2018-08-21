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
class ProvidersControlsUsersController extends AppController {

	var $name = 'ProvidersControlsUsers';


	function index() {
		$this->ProvidersControlsUser->recursive = 0;
		$this->set('providersControlsUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersControlsUser', $this->ProvidersControlsUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersControlsUser->create();
			if ($this->ProvidersControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The providers controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers controls user could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProvidersControlsUser->User->find('list');
		$providersViewCompaniesUnits = $this->ProvidersControlsUser->ProvidersViewCompaniesUnit->find('list');
		$this->set(compact('users', 'providersViewCompaniesUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The providers controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers controls user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersControlsUser->read(null, $id);
		}
		$users = $this->ProvidersControlsUser->User->find('list');
		$providersViewCompaniesUnits = $this->ProvidersControlsUser->ProvidersViewCompaniesUnit->find('list');
		$this->set(compact('users', 'providersViewCompaniesUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers controls user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersControlsUser->delete($id)) {
			$this->Session->setFlash(__('Providers controls user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers controls user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
