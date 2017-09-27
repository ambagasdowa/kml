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
class ModuleUserCredentialsMainsController extends AppController {

	var $name = 'ModuleUserCredentialsMains';


	function index() {
		$this->ModuleUserCredentialsMain->recursive = 0;
		$this->set('moduleUserCredentialsMains', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid module user credentials main', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('moduleUserCredentialsMain', $this->ModuleUserCredentialsMain->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ModuleUserCredentialsMain->create();
			if ($this->ModuleUserCredentialsMain->save($this->data)) {
				$this->Session->setFlash(__('The module user credentials main has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module user credentials main could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid module user credentials main', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ModuleUserCredentialsMain->save($this->data)) {
				$this->Session->setFlash(__('The module user credentials main has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module user credentials main could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ModuleUserCredentialsMain->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for module user credentials main', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ModuleUserCredentialsMain->delete($id)) {
			$this->Session->setFlash(__('Module user credentials main deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Module user credentials main was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
