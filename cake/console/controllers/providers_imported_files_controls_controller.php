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
class ProvidersImportedFilesControlsController extends AppController {

	var $name = 'ProvidersImportedFilesControls';


	function index() {
		$this->ProvidersImportedFilesControl->recursive = 0;
		$this->set('providersImportedFilesControls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers imported files control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersImportedFilesControl', $this->ProvidersImportedFilesControl->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersImportedFilesControl->create();
			if ($this->ProvidersImportedFilesControl->save($this->data)) {
				$this->Session->setFlash(__('The providers imported files control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers imported files control could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProvidersImportedFilesControl->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers imported files control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersImportedFilesControl->save($this->data)) {
				$this->Session->setFlash(__('The providers imported files control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers imported files control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersImportedFilesControl->read(null, $id);
		}
		$users = $this->ProvidersImportedFilesControl->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers imported files control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersImportedFilesControl->delete($id)) {
			$this->Session->setFlash(__('Providers imported files control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers imported files control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
