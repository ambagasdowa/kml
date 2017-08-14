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
class ProjectionsViewClosedPeriodsController extends AppController {

	var $name = 'ProjectionsViewClosedPeriods';


	function index() {
		$this->ProjectionsViewClosedPeriod->recursive = 0;
		$this->set('projectionsViewClosedPeriods', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view closed period', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewClosedPeriod', $this->ProjectionsViewClosedPeriod->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewClosedPeriod->create();
			if ($this->ProjectionsViewClosedPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections view closed period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view closed period could not be saved. Please, try again.', true));
			}
		}
		$projectionsCorporations = $this->ProjectionsViewClosedPeriod->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view closed period', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewClosedPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections view closed period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view closed period could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewClosedPeriod->read(null, $id);
		}
		$projectionsCorporations = $this->ProjectionsViewClosedPeriod->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view closed period', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewClosedPeriod->delete($id)) {
			$this->Session->setFlash(__('Projections view closed period deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view closed period was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
