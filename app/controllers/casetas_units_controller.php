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
class CasetasUnitsController extends AppController {

	var $name = 'CasetasUnits';


	function index() {
		$this->CasetasUnit->recursive = 0;
		$this->set('casetasUnits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasUnit', $this->CasetasUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasUnit->create();
			if ($this->CasetasUnit->save($this->data)) {
				$this->Session->setFlash(__('The casetas unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas unit could not be saved. Please, try again.', true));
			}
		}
		
		$casetasCorporations = $this->CasetasUnit->CasetasCorporations->find('list');
		$users = $this->CasetasUnit->User->find('list');
		
		$casetasStandings = $this->CasetasUnit->CasetasStandings->find('list');
		$casetasParents = $this->CasetasUnit->CasetasParents->find('list');
		$this->set(compact('casetasCorporations', 'users', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasUnit->save($this->data)) {
				$this->Session->setFlash(__('The casetas unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasUnit->read(null, $id);
		}
		$casetasCorporations = $this->CasetasUnit->CasetasCorporation->find('list');
		$users = $this->CasetasUnit->User->find('list');
		$casetasStandings = $this->CasetasUnit->CasetasStanding->find('list');
		$casetasParents = $this->CasetasUnit->CasetasParent->find('list');
		$this->set(compact('casetasCorporations', 'users', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasUnit->delete($id)) {
			$this->Session->setFlash(__('Casetas unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
