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
class CasetasControlsFilesController extends AppController {

	var $name = 'CasetasControlsFiles';


	function index() {
		$this->CasetasControlsFile->recursive = 0;
		$this->set('casetasControlsFiles', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas controls file', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasControlsFile', $this->CasetasControlsFile->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasControlsFile->create();
			if ($this->CasetasControlsFile->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls file could not be saved. Please, try again.', true));
			}
		}
		$casetasEvents = $this->CasetasControlsFile->CasetasEvent->find('list');
		$users = $this->CasetasControlsFile->User->find('list');
		$casetasCorporations = $this->CasetasControlsFile->CasetasCorporation->find('list');
		$casetasUnits = $this->CasetasControlsFile->CasetasUnit->find('list');
		$casetasStandings = $this->CasetasControlsFile->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsFile->CasetasParent->find('list');
		$this->set(compact('casetasEvents', 'users', 'casetasCorporations', 'casetasUnits', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas controls file', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasControlsFile->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasControlsFile->read(null, $id);
		}
		$casetasEvents = $this->CasetasControlsFile->CasetasEvent->find('list');
		$users = $this->CasetasControlsFile->User->find('list');
		$casetasCorporations = $this->CasetasControlsFile->CasetasCorporation->find('list');
		$casetasUnits = $this->CasetasControlsFile->CasetasUnit->find('list');
		$casetasStandings = $this->CasetasControlsFile->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsFile->CasetasParent->find('list');
		$this->set(compact('casetasEvents', 'users', 'casetasCorporations', 'casetasUnits', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas controls file', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasControlsFile->delete($id)) {
			$this->Session->setFlash(__('Casetas controls file deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas controls file was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>