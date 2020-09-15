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
class RentabilidadViewMainLiquidationsController extends AppController {

	var $name = 'RentabilidadViewMainLiquidations';


	function beforeFilter() {
	 parent::beforeFilter();
	 $this->Auth->allow(array('index','add','*'));
        }



	function index() {
		$this->RentabilidadViewMainLiquidation->recursive = 0;
		$this->set('rentabilidadViewMainLiquidations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rentabilidad view main liquidation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rentabilidadViewMainLiquidation', $this->RentabilidadViewMainLiquidation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RentabilidadViewMainLiquidation->create();
			if ($this->RentabilidadViewMainLiquidation->save($this->data)) {
				$this->Session->setFlash(__('The rentabilidad view main liquidation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rentabilidad view main liquidation could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rentabilidad view main liquidation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RentabilidadViewMainLiquidation->save($this->data)) {
				$this->Session->setFlash(__('The rentabilidad view main liquidation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rentabilidad view main liquidation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RentabilidadViewMainLiquidation->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rentabilidad view main liquidation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RentabilidadViewMainLiquidation->delete($id)) {
			$this->Session->setFlash(__('Rentabilidad view main liquidation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rentabilidad view main liquidation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
