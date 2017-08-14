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
class ProjectionsPeriodsController extends AppController {

	var $name = 'ProjectionsPeriods';


	function index() {
		$this->ProjectionsPeriod->recursive = 0;
		$this->set('projectionsPeriods', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections period', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsPeriod', $this->ProjectionsPeriod->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsPeriod->create();
			if ($this->ProjectionsPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections period could not be saved. Please, try again.', true));
			}
		}
		$projectionsCorporations = $this->ProjectionsPeriod->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections period', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections period could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsPeriod->read(null, $id);
		}
		$projectionsCorporations = $this->ProjectionsPeriod->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections period', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsPeriod->delete($id)) {
			$this->Session->setFlash(__('Projections period deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections period was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
