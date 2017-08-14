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
class CasetasTigerRunsController extends AppController {

	var $name = 'CasetasTigerRuns';


	function index() {
		$this->CasetasTigerRun->recursive = 0;
		$this->set('casetasTigerRuns', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas tiger run', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasTigerRun', $this->CasetasTigerRun->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasTigerRun->create();
			if ($this->CasetasTigerRun->save($this->data)) {
				$this->Session->setFlash(__('The casetas tiger run has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas tiger run could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas tiger run', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasTigerRun->save($this->data)) {
				$this->Session->setFlash(__('The casetas tiger run has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas tiger run could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasTigerRun->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas tiger run', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasTigerRun->delete($id)) {
			$this->Session->setFlash(__('Casetas tiger run deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas tiger run was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
