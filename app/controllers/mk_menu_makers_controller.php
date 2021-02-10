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
class MkMenuMakersController extends AppController {

	var $name = 'MkMenuMakers';


	function index() {
		$this->MkMenuMaker->recursive = 0;
		$this->set('mkMenuMakers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mk menu maker', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mkMenuMaker', $this->MkMenuMaker->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MkMenuMaker->create();
			if ($this->MkMenuMaker->save($this->data)) {
				$this->Session->setFlash(__('The mk menu maker has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mk menu maker could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mk menu maker', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MkMenuMaker->save($this->data)) {
				$this->Session->setFlash(__('The mk menu maker has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mk menu maker could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MkMenuMaker->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mk menu maker', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MkMenuMaker->delete($id)) {
			$this->Session->setFlash(__('Mk menu maker deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mk menu maker was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
