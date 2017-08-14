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
class ProjectionsCorporationsController extends AppController {

	var $name = 'ProjectionsCorporations';


	function index() {
		$this->ProjectionsCorporation->recursive = 0;
		$this->set('projectionsCorporations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections corporation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsCorporation', $this->ProjectionsCorporation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsCorporation->create();
			if ($this->ProjectionsCorporation->save($this->data)) {
				$this->Session->setFlash(__('The projections corporation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections corporation could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsCorporation->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections corporation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsCorporation->save($this->data)) {
				$this->Session->setFlash(__('The projections corporation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections corporation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsCorporation->read(null, $id);
		}
		$users = $this->ProjectionsCorporation->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections corporation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsCorporation->delete($id)) {
			$this->Session->setFlash(__('Projections corporation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections corporation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
