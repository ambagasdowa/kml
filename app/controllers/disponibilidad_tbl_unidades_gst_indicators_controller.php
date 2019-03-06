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
class DisponibilidadTblUnidadesGstIndicatorsController extends AppController {

	var $name = 'DisponibilidadTblUnidadesGstIndicators';


	function index() {
		$this->DisponibilidadTblUnidadesGstIndicator->recursive = 0;
		$this->set('disponibilidadTblUnidadesGstIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid disponibilidad tbl unidades gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('disponibilidadTblUnidadesGstIndicator', $this->DisponibilidadTblUnidadesGstIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->DisponibilidadTblUnidadesGstIndicator->create();
			if ($this->DisponibilidadTblUnidadesGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid disponibilidad tbl unidades gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DisponibilidadTblUnidadesGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DisponibilidadTblUnidadesGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for disponibilidad tbl unidades gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DisponibilidadTblUnidadesGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Disponibilidad tbl unidades gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Disponibilidad tbl unidades gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
