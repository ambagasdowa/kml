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
class CasetasControlsUsersController extends AppController {

	var $name = 'CasetasControlsUsers';


	function index() {
		$this->CasetasControlsUser->recursive = 0;
		$this->set('casetasControlsUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasControlsUser', $this->CasetasControlsUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasControlsUser->create();
			if ($this->CasetasControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls user could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasControlsUser->User->find('list');
		$casetasCorporations = $this->CasetasControlsUser->CasetasCorporation->find('list');
		$casetasUnits = $this->CasetasControlsUser->CasetasUnit->find('list');
		$casetasStandings = $this->CasetasControlsUser->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsUser->CasetasParent->find('list');
		$this->set(compact('users', 'casetasCorporations', 'casetasUnits', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasControlsUser->read(null, $id);
		}
		$users = $this->CasetasControlsUser->User->find('list');
		$casetasCorporations = $this->CasetasControlsUser->CasetasCorporation->find('list');
		$casetasUnits = $this->CasetasControlsUser->CasetasUnit->find('list');
		$casetasStandings = $this->CasetasControlsUser->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsUser->CasetasParent->find('list');
		$this->set(compact('users', 'casetasCorporations', 'casetasUnits', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas controls user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasControlsUser->delete($id)) {
			$this->Session->setFlash(__('Casetas controls user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas controls user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
