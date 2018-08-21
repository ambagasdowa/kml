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
class ProjectionsViewFractionsController extends AppController {

	var $name = 'ProjectionsViewFractions';


	function index() {
		$this->ProjectionsViewFraction->recursive = 0;
		$this->set('projectionsViewFractions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view fraction', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewFraction', $this->ProjectionsViewFraction->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewFraction->create();
			if ($this->ProjectionsViewFraction->save($this->data)) {
				$this->Session->setFlash(__('The projections view fraction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view fraction could not be saved. Please, try again.', true));
			}
		}
		$projectionsCorporations = $this->ProjectionsViewFraction->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view fraction', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewFraction->save($this->data)) {
				$this->Session->setFlash(__('The projections view fraction has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view fraction could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewFraction->read(null, $id);
		}
		$projectionsCorporations = $this->ProjectionsViewFraction->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view fraction', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewFraction->delete($id)) {
			$this->Session->setFlash(__('Projections view fraction deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view fraction was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
