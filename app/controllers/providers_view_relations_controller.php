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
class ProvidersViewRelationsController extends AppController {

	var $name = 'ProvidersViewRelations';


	function index() {
		$this->ProvidersViewRelation->recursive = 0;
		$this->set('providersViewRelations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers view relation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersViewRelation', $this->ProvidersViewRelation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersViewRelation->create();
			if ($this->ProvidersViewRelation->save($this->data)) {
				$this->Session->setFlash(__('The providers view relation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view relation could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers view relation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersViewRelation->save($this->data)) {
				$this->Session->setFlash(__('The providers view relation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view relation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersViewRelation->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers view relation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersViewRelation->delete($id)) {
			$this->Session->setFlash(__('Providers view relation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers view relation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
