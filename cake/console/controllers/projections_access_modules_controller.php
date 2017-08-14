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
class ProjectionsAccessModulesController extends AppController {

	var $name = 'ProjectionsAccessModules';


	function index() {
		$this->ProjectionsAccessModule->recursive = 0;
		$this->set('projectionsAccessModules', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections access module', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsAccessModule', $this->ProjectionsAccessModule->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsAccessModule->create();
			if ($this->ProjectionsAccessModule->save($this->data)) {
				$this->Session->setFlash(__('The projections access module has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections access module could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections access module', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsAccessModule->save($this->data)) {
				$this->Session->setFlash(__('The projections access module has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections access module could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsAccessModule->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections access module', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsAccessModule->delete($id)) {
			$this->Session->setFlash(__('Projections access module deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections access module was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
