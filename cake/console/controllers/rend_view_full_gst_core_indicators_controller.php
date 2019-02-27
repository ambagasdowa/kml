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
class RendViewFullGstCoreIndicatorsController extends AppController {

	var $name = 'RendViewFullGstCoreIndicators';


	function index() {
		$this->RendViewFullGstCoreIndicator->recursive = 0;
		$this->set('rendViewFullGstCoreIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rend view full gst core indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rendViewFullGstCoreIndicator', $this->RendViewFullGstCoreIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RendViewFullGstCoreIndicator->create();
			if ($this->RendViewFullGstCoreIndicator->save($this->data)) {
				$this->Session->setFlash(__('The rend view full gst core indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rend view full gst core indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rend view full gst core indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RendViewFullGstCoreIndicator->save($this->data)) {
				$this->Session->setFlash(__('The rend view full gst core indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rend view full gst core indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RendViewFullGstCoreIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rend view full gst core indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RendViewFullGstCoreIndicator->delete($id)) {
			$this->Session->setFlash(__('Rend view full gst core indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rend view full gst core indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
