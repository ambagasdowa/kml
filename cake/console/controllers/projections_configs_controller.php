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
class ProjectionsConfigsController extends AppController {

	var $name = 'ProjectionsConfigs';


	function index() {
		$this->ProjectionsConfig->recursive = 0;
		$this->set('projectionsConfigs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections config', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsConfig', $this->ProjectionsConfig->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsConfig->create();
			if ($this->ProjectionsConfig->save($this->data)) {
				$this->Session->setFlash(__('The projections config has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections config could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsConfig->User->find('list');
		$projectionsTypeConfigs = $this->ProjectionsConfig->ProjectionsTypeConfig->find('list');
		$this->set(compact('users', 'projectionsTypeConfigs'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections config', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsConfig->save($this->data)) {
				$this->Session->setFlash(__('The projections config has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections config could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsConfig->read(null, $id);
		}
		$users = $this->ProjectionsConfig->User->find('list');
		$projectionsTypeConfigs = $this->ProjectionsConfig->ProjectionsTypeConfig->find('list');
		$this->set(compact('users', 'projectionsTypeConfigs'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections config', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsConfig->delete($id)) {
			$this->Session->setFlash(__('Projections config deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections config was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
