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
class CasetasControlsConciliationsController extends AppController {

	var $name = 'CasetasControlsConciliations';


	function index() {
		$this->CasetasControlsConciliation->recursive = 0;
		$this->set('casetasControlsConciliations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas controls conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasControlsConciliation', $this->CasetasControlsConciliation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasControlsConciliation->create();
			if ($this->CasetasControlsConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls conciliation could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasControlsConciliation->User->find('list');
		$casetasControlsFiles = $this->CasetasControlsConciliation->CasetasControlsFile->find('list');
		$casetasStandings = $this->CasetasControlsConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsConciliation->CasetasParent->find('list');
		$this->set(compact('users', 'casetasControlsFiles', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas controls conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasControlsConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls conciliation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasControlsConciliation->read(null, $id);
		}
		$users = $this->CasetasControlsConciliation->User->find('list');
		$casetasControlsFiles = $this->CasetasControlsConciliation->CasetasControlsFile->find('list');
		$casetasStandings = $this->CasetasControlsConciliation->CasetasStanding->find('list');
		$casetasParents = $this->CasetasControlsConciliation->CasetasParent->find('list');
		$this->set(compact('users', 'casetasControlsFiles', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas controls conciliation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasControlsConciliation->delete($id)) {
			$this->Session->setFlash(__('Casetas controls conciliation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas controls conciliation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
