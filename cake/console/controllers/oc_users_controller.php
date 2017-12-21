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
class OcUsersController extends AppController {

	var $name = 'OcUsers';


	function index() {
		$this->OcUser->recursive = 0;
		$this->set('ocUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid oc user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ocUser', $this->OcUser->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->OcUser->create();
			if ($this->OcUser->save($this->data)) {
				$this->Session->setFlash(__('The oc user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oc user could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid oc user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->OcUser->save($this->data)) {
				$this->Session->setFlash(__('The oc user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The oc user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->OcUser->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for oc user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->OcUser->delete($id)) {
			$this->Session->setFlash(__('Oc user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Oc user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
