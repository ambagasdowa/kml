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
class CasetasConciliationsController extends AppController {

	var $name = 'CasetasConciliations';


	function index() {
		$this->CasetasConciliation->recursive = 0;
		$this->set('casetasConciliations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasConciliation', $this->CasetasConciliation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasConciliation->create();
			if ($this->CasetasConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas conciliation could not be saved. Please, try again.', true));
			}
		}
		$casetasViews = $this->CasetasConciliation->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasConciliation->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasConciliation->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasConciliation->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas conciliation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasConciliation->read(null, $id);
		}
		$casetasViews = $this->CasetasConciliation->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasConciliation->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasConciliation->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasConciliation->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas conciliation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasConciliation->delete($id)) {
			$this->Session->setFlash(__('Casetas conciliation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas conciliation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>