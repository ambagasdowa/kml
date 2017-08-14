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
class ProjectionsControlsUsersController extends AppController {

	var $name = 'ProjectionsControlsUsers';


	function index() {
		$this->ProjectionsControlsUser->recursive = 0;
		$this->set('projectionsControlsUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsControlsUser', $this->ProjectionsControlsUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsControlsUser->create();
			if ($this->ProjectionsControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The projections controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections controls user could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsControlsUser->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The projections controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections controls user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsControlsUser->read(null, $id);
		}
		$users = $this->ProjectionsControlsUser->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections controls user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsControlsUser->delete($id)) {
			$this->Session->setFlash(__('Projections controls user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections controls user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
