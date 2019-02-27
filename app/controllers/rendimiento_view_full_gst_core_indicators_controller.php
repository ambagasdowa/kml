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
class RendimientoViewFullGstCoreIndicatorsController extends AppController {

	var $name = 'RendimientoViewFullGstCoreIndicators';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');

	function index() {
		$this->RendimientoViewFullGstCoreIndicator->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
		// $this->ModuleUserCredentialsControl->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
		Configure::write('debug', 2);
		// $this->LoadModel('RendimientoViewFullGstCoreIndicator');
		debug($this->RendimientoViewFullGstCoreIndicator->find('all',array('fields',array('id','viaje','area','operador'))));
exit();
		// $this->RendimientoViewFullGstCoreIndicator->recursive = 0;
		// debug($this->paginate());
		// $this->set('rendimientoViewFullGstCoreIndicators', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rendimiento view full gst core indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rendimientoViewFullGstCoreIndicator', $this->RendimientoViewFullGstCoreIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RendimientoViewFullGstCoreIndicator->create();
			if ($this->RendimientoViewFullGstCoreIndicator->save($this->data)) {
				$this->Session->setFlash(__('The rendimiento view full gst core indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rendimiento view full gst core indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rendimiento view full gst core indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RendimientoViewFullGstCoreIndicator->save($this->data)) {
				$this->Session->setFlash(__('The rendimiento view full gst core indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rendimiento view full gst core indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RendimientoViewFullGstCoreIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rendimiento view full gst core indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RendimientoViewFullGstCoreIndicator->delete($id)) {
			$this->Session->setFlash(__('Rendimiento view full gst core indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rendimiento view full gst core indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
