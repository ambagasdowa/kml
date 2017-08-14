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
class CasetasStandingsController extends AppController {

	var $name = 'CasetasStandings';


	function index() {
		$this->CasetasStanding->recursive = 0;
		$this->set('casetasStandings', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas standing', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasStanding', $this->CasetasStanding->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasStanding->create();
			if ($this->CasetasStanding->save($this->data)) {
				$this->Session->setFlash(__('The casetas standing has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas standing could not be saved. Please, try again.', true));
			}
		}
		$casetasParents = $this->CasetasStanding->CasetasParent->find('list');
		$users = $this->CasetasStanding->User->find('list');
		$this->set(compact('casetasParents', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas standing', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasStanding->save($this->data)) {
				$this->Session->setFlash(__('The casetas standing has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas standing could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasStanding->read(null, $id);
		}
		$casetasParents = $this->CasetasStanding->CasetasParent->find('list');
		$users = $this->CasetasStanding->User->find('list');
		$this->set(compact('casetasParents', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas standing', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasStanding->delete($id)) {
			$this->Session->setFlash(__('Casetas standing deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas standing was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>