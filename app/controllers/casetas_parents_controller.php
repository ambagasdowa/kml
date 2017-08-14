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
class CasetasParentsController extends AppController {

	var $name = 'CasetasParents';


	function index() {
		$this->CasetasParent->recursive = 0;
		$this->set('casetasParents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas parent', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasParent', $this->CasetasParent->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasParent->create();
			if ($this->CasetasParent->save($this->data)) {
				$this->Session->setFlash(__('The casetas parent has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas parent could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasParent->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas parent', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasParent->save($this->data)) {
				$this->Session->setFlash(__('The casetas parent has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas parent could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasParent->read(null, $id);
		}
		$users = $this->CasetasParent->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas parent', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasParent->delete($id)) {
			$this->Session->setFlash(__('Casetas parent deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas parent was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>