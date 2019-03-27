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
class GeoreferenceViewPositionsDashMainGstIndicatorsController extends AppController {

	var $name = 'GeoreferenceViewPositionsDashMainGstIndicators';


	function index() {
		$this->GeoreferenceViewPositionsDashMainGstIndicator->recursive = 0;
		$this->set('georeferenceViewPositionsDashMainGstIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid georeference view positions dash main gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('georeferenceViewPositionsDashMainGstIndicator', $this->GeoreferenceViewPositionsDashMainGstIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->GeoreferenceViewPositionsDashMainGstIndicator->create();
			if ($this->GeoreferenceViewPositionsDashMainGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The georeference view positions dash main gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The georeference view positions dash main gst indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid georeference view positions dash main gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->GeoreferenceViewPositionsDashMainGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The georeference view positions dash main gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The georeference view positions dash main gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->GeoreferenceViewPositionsDashMainGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for georeference view positions dash main gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->GeoreferenceViewPositionsDashMainGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Georeference view positions dash main gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Georeference view positions dash main gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
