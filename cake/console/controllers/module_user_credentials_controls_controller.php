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
class ModuleUserCredentialsControlsController extends AppController {

	var $name = 'ModuleUserCredentialsControls';


	function index() {
		$this->ModuleUserCredentialsControl->recursive = 0;
		$this->set('moduleUserCredentialsControls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid module user credentials control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('moduleUserCredentialsControl', $this->ModuleUserCredentialsControl->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ModuleUserCredentialsControl->create();
			if ($this->ModuleUserCredentialsControl->save($this->data)) {
				$this->Session->setFlash(__('The module user credentials control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module user credentials control could not be saved. Please, try again.', true));
			}
		}
		$moduleUserCredentialsMains = $this->ModuleUserCredentialsControl->ModuleUserCredentialsMain->find('list');
		$users = $this->ModuleUserCredentialsControl->User->find('list');
		$this->set(compact('moduleUserCredentialsMains', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid module user credentials control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ModuleUserCredentialsControl->save($this->data)) {
				$this->Session->setFlash(__('The module user credentials control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module user credentials control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ModuleUserCredentialsControl->read(null, $id);
		}
		$moduleUserCredentialsMains = $this->ModuleUserCredentialsControl->ModuleUserCredentialsMain->find('list');
		$users = $this->ModuleUserCredentialsControl->User->find('list');
		$this->set(compact('moduleUserCredentialsMains', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for module user credentials control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ModuleUserCredentialsControl->delete($id)) {
			$this->Session->setFlash(__('Module user credentials control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Module user credentials control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
