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
class CasetasCorporationsController extends AppController {

	var $name = 'CasetasCorporations';

	function index() {
		$this->CasetasCorporation->recursive = 0;
		$this->set('casetasCorporations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas corporation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasCorporation', $this->CasetasCorporation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasCorporation->create();
			if ($this->CasetasCorporation->save($this->data)) {
				$this->Session->setFlash(__('The casetas corporation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas corporation could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasCorporation->User->find('list');
		$casetasStandings = $this->CasetasCorporation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasCorporation->CasetasParent->find('list');
		$this->set(compact('users', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas corporation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasCorporation->save($this->data)) {
				$this->Session->setFlash(__('The casetas corporation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas corporation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasCorporation->read(null, $id);
		}
		$users = $this->CasetasCorporation->User->find('list');
		$casetasStandings = $this->CasetasCorporation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasCorporation->CasetasParent->find('list');
		$this->set(compact('users', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas corporation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasCorporation->delete($id)) {
			$this->Session->setFlash(__('Casetas corporation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas corporation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>