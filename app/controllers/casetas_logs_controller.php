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
class CasetasLogsController extends AppController {

	var $name = 'CasetasLogs';

	function index() {
		$this->CasetasLog->recursive = 0;
		$this->set('casetasLogs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas log', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasLog', $this->CasetasLog->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasLog->create();
			if ($this->CasetasLog->save($this->data)) {
				$this->Session->setFlash(__('The casetas log has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas log could not be saved. Please, try again.', true));
			}
		}
		$casetasViews = $this->CasetasLog->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasLog->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasLog->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasLog->CasetasStanding->find('list');
		$casetasParents = $this->CasetasLog->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas log', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasLog->save($this->data)) {
				$this->Session->setFlash(__('The casetas log has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas log could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasLog->read(null, $id);
		}
		$casetasViews = $this->CasetasLog->CasetasView->find('list');
		$casetasControlsFiles = $this->CasetasLog->CasetasControlsFile->find('list');
		$casetasControlsEvents = $this->CasetasLog->CasetasControlsEvent->find('list');
		$casetasStandings = $this->CasetasLog->CasetasStanding->find('list');
		$casetasParents = $this->CasetasLog->CasetasParent->find('list');
		$this->set(compact('casetasViews', 'casetasControlsFiles', 'casetasControlsEvents', 'casetasStandings', 'casetasParents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas log', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasLog->delete($id)) {
			$this->Session->setFlash(__('Casetas log deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas log was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>