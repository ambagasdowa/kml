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
class CasetasViewsController extends AppController {

	var $name = 'CasetasViews';


	function index() {
		$this->CasetasView->recursive = 0;
		$this->set('casetasViews', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas view', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasView', $this->CasetasView->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasView->create();
			if ($this->CasetasView->save($this->data)) {
				$this->Session->setFlash(__('The casetas view has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view could not be saved. Please, try again.', true));
			}
		}
		$casetasHistoricalConciliations = $this->CasetasView->CasetasHistoricalConciliation->find('list');
		$casetasControlsFiles = $this->CasetasView->CasetasControlsFile->find('list');
		$casetasStandings = $this->CasetasView->CasetasStanding->find('list');
		$casetasParents = $this->CasetasView->CasetasParent->find('list');
		$this->set(compact('casetasHistoricalConciliations', 'casetasControlsFiles', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas view', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasView->save($this->data)) {
				$this->Session->setFlash(__('The casetas view has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasView->read(null, $id);
		}
		$casetasHistoricalConciliations = $this->CasetasView->CasetasHistoricalConciliation->find('list');
		$casetasControlsFiles = $this->CasetasView->CasetasControlsFile->find('list');
		$casetasStandings = $this->CasetasView->CasetasStanding->find('list');
		$casetasParents = $this->CasetasView->CasetasParent->find('list');
		$this->set(compact('casetasHistoricalConciliations', 'casetasControlsFiles', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas view', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasView->delete($id)) {
			$this->Session->setFlash(__('Casetas view deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas view was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
