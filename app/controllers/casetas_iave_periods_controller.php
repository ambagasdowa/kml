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
class CasetasIavePeriodsController extends AppController {

	var $name = 'CasetasIavePeriods';


	function index() {
		$this->CasetasIavePeriod->recursive = 0;
		$this->set('casetasIavePeriods', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas iave period', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasIavePeriod', $this->CasetasIavePeriod->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasIavePeriod->create();

			$this->data['CasetasIavePeriod']['fecha_ini'] .= ' 00:00:00.000';
			$this->data['CasetasIavePeriod']['fecha_fin'] .= ' 23:59:00.000';

			if ($this->CasetasIavePeriod->save($this->data)) {
				$this->Session->setFlash(__('The casetas iave period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas iave period could not be saved. Please, try again.', true));
			}
		}
		
		$period = current(current(current($this->CasetasIavePeriod->query('select max(period_iave_id) from sistemas.dbo.casetas_iave_periods'))));
		$period_iave_id = $period + 1;

		$users = $this->CasetasIavePeriod->User->find('list');

		$this->set(compact('users','period_iave_id'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas iave period', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasIavePeriod->save($this->data)) {
				$this->Session->setFlash(__('The casetas iave period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas iave period could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasIavePeriod->read(null, $id);
		}
		$users = $this->CasetasIavePeriod->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas iave period', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasIavePeriod->delete($id)) {
			$this->Session->setFlash(__('Casetas iave period deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas iave period was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
