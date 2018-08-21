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
class ProjectionsTypeConfigsController extends AppController {

	var $name = 'ProjectionsTypeConfigs';


	function index() {
		$this->ProjectionsTypeConfig->recursive = 0;
		$this->set('projectionsTypeConfigs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections type config', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsTypeConfig', $this->ProjectionsTypeConfig->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsTypeConfig->create();
			if ($this->ProjectionsTypeConfig->save($this->data)) {
				$this->Session->setFlash(__('The projections type config has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections type config could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsTypeConfig->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections type config', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsTypeConfig->save($this->data)) {
				$this->Session->setFlash(__('The projections type config has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections type config could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsTypeConfig->read(null, $id);
		}
		$users = $this->ProjectionsTypeConfig->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections type config', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsTypeConfig->delete($id)) {
			$this->Session->setFlash(__('Projections type config deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections type config was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
