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
class ResumenViewMontofacturadoMensualGstIndicatorsController extends AppController {

	var $name = 'ResumenViewMontofacturadoMensualGstIndicators';


	function index() {
		$this->ResumenViewMontofacturadoMensualGstIndicator->recursive = 0;
		$this->set('resumenViewMontofacturadoMensualGstIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resumenViewMontofacturadoMensualGstIndicator', $this->ResumenViewMontofacturadoMensualGstIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ResumenViewMontofacturadoMensualGstIndicator->create();
			if ($this->ResumenViewMontofacturadoMensualGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumenViewMontofacturadoMensualGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ResumenViewMontofacturadoMensualGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumenViewMontofacturadoMensualGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Resumen view montofacturado mensual gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resumen view montofacturado mensual gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
