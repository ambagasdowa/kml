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
class DisponibilidadViewHistoricalGstIndicatorsController extends AppController {

	var $name = 'DisponibilidadViewHistoricalGstIndicators';


	function index() {
		$this->DisponibilidadViewHistoricalGstIndicator->recursive = 0;
		$this->set('disponibilidadViewHistoricalGstIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid disponibilidad view historical gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('disponibilidadViewHistoricalGstIndicator', $this->DisponibilidadViewHistoricalGstIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DisponibilidadViewHistoricalGstIndicator->create();
			if ($this->DisponibilidadViewHistoricalGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad view historical gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad view historical gst indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid disponibilidad view historical gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DisponibilidadViewHistoricalGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad view historical gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad view historical gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DisponibilidadViewHistoricalGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for disponibilidad view historical gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DisponibilidadViewHistoricalGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Disponibilidad view historical gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Disponibilidad view historical gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
