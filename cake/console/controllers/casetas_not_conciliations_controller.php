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
class CasetasNotConciliationsController extends AppController {

	var $name = 'CasetasNotConciliations';


	function index() {
		$this->CasetasNotConciliation->recursive = 0;
		$this->set('casetasNotConciliations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas not conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasNotConciliation', $this->CasetasNotConciliation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasNotConciliation->create();
			if ($this->CasetasNotConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas not conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas not conciliation could not be saved. Please, try again.', true));
			}
		}
		$casetasViews = $this->CasetasNotConciliation->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasNotConciliation->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasNotConciliation->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasNotConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasNotConciliation->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas not conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasNotConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas not conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas not conciliation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasNotConciliation->read(null, $id);
		}
		$casetasViews = $this->CasetasNotConciliation->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasNotConciliation->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasNotConciliation->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasNotConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasNotConciliation->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas not conciliation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasNotConciliation->delete($id)) {
			$this->Session->setFlash(__('Casetas not conciliation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas not conciliation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>