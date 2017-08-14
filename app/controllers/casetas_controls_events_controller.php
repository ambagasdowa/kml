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
class CasetasControlsEventsController extends AppController {

	var $name = 'CasetasControlsEvents';


	function index() {
		$this->CasetasControlsEvent->recursive = 0;
		$this->set('casetasControlsEvents', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas controls event', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasControlsEvent', $this->CasetasControlsEvent->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasControlsEvent->create();
			if ($this->CasetasControlsEvent->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls event could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasControlsEvent->User->find('list');
		$casetasCorporations = $this->CasetasControlsEvent->CasetasCorporation->find('list');
		$casetasUnits = $this->CasetasControlsEvent->CasetasUnit->find('list');
		$casetasEvents = $this->CasetasControlsEvent->CasetasEvent->find('list');
		$casetasViews = $this->CasetasControlsEvent->CasetasView->find('list');
		$casetasStandings = $this->CasetasControlsEvent->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsEvent->CasetasParent->find('list');
		$this->set(compact('users', 'casetasCorporations', 'casetasUnits', 'casetasEvents', 'casetasViews', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas controls event', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasControlsEvent->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasControlsEvent->read(null, $id);
		}
		$users = $this->CasetasControlsEvent->User->find('list');
		$casetasCorporations = $this->CasetasControlsEvent->CasetasCorporation->find('list');
		$casetasUnits = $this->CasetasControlsEvent->CasetasUnit->find('list');
		$casetasEvents = $this->CasetasControlsEvent->CasetasEvent->find('list');
		$casetasViews = $this->CasetasControlsEvent->CasetasView->find('list');
		$casetasStandings = $this->CasetasControlsEvent->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsEvent->CasetasParent->find('list');
		$this->set(compact('users', 'casetasCorporations', 'casetasUnits', 'casetasEvents', 'casetasViews', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas controls event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasControlsEvent->delete($id)) {
			$this->Session->setFlash(__('Casetas controls event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas controls event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>