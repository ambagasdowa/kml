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
class CasetasPendingsController extends AppController {

	var $name = 'CasetasPendings';

	function index() {
		$this->CasetasPending->recursive = 0;
		$this->set('casetasPendings', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas pending', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasPending', $this->CasetasPending->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasPending->create();
			if ($this->CasetasPending->save($this->data)) {
				$this->Session->setFlash(__('The casetas pending has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas pending could not be saved. Please, try again.', true));
			}
		}
		$casetasViews = $this->CasetasPending->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasPending->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasPending->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasPending->CasetasStanding->find('list');
		$casetasParents = $this->CasetasPending->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas pending', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasPending->save($this->data)) {
				$this->Session->setFlash(__('The casetas pending has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas pending could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasPending->read(null, $id);
		}
		$casetasViews = $this->CasetasPending->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasPending->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasPending->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasPending->CasetasStanding->find('list');
		$casetasParents = $this->CasetasPending->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas pending', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasPending->delete($id)) {
			$this->Session->setFlash(__('Casetas pending deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas pending was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>