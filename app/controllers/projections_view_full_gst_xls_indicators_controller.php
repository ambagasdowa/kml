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
class ProjectionsViewFullGstXlsIndicatorsController extends AppController {

	var $name = 'ProjectionsViewFullGstXlsIndicators';


	function index() {
		$this->ProjectionsViewFullGstXlsIndicator->recursive = 0;
		$this->set('projectionsViewFullGstXlsIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view full gst xls indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewFullGstXlsIndicator', $this->ProjectionsViewFullGstXlsIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewFullGstXlsIndicator->create();
			if ($this->ProjectionsViewFullGstXlsIndicator->save($this->data)) {
				$this->Session->setFlash(__('The projections view full gst xls indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view full gst xls indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view full gst xls indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewFullGstXlsIndicator->save($this->data)) {
				$this->Session->setFlash(__('The projections view full gst xls indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view full gst xls indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewFullGstXlsIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view full gst xls indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewFullGstXlsIndicator->delete($id)) {
			$this->Session->setFlash(__('Projections view full gst xls indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view full gst xls indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
