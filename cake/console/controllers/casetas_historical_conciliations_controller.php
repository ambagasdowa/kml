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
class CasetasHistoricalConciliationsController extends AppController {

	var $name = 'CasetasHistoricalConciliations';


	function index() {
		$this->CasetasHistoricalConciliation->recursive = 0;
		$this->set('casetasHistoricalConciliations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas historical conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasHistoricalConciliation', $this->CasetasHistoricalConciliation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasHistoricalConciliation->create();
			if ($this->CasetasHistoricalConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas historical conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas historical conciliation could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasHistoricalConciliation->User->find('list');
		$casetasControlsFiles = $this->CasetasHistoricalConciliation->CasetasControlsFile->find('list');
		$casetasStandings = $this->CasetasHistoricalConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasHistoricalConciliation->CasetasParent->find('list');
		$this->set(compact('users', 'casetasControlsFiles', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas historical conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasHistoricalConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas historical conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas historical conciliation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasHistoricalConciliation->read(null, $id);
		}
		$users = $this->CasetasHistoricalConciliation->User->find('list');
		$casetasControlsFiles = $this->CasetasHistoricalConciliation->CasetasControlsFile->find('list');
		$casetasStandings = $this->CasetasHistoricalConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasHistoricalConciliation->CasetasParent->find('list');
		$this->set(compact('users', 'casetasControlsFiles', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas historical conciliation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasHistoricalConciliation->delete($id)) {
			$this->Session->setFlash(__('Casetas historical conciliation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas historical conciliation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
