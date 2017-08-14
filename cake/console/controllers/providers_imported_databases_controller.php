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
class ProvidersImportedDatabasesController extends AppController {

	var $name = 'ProvidersImportedDatabases';


	function index() {
		$this->ProvidersImportedDatabase->recursive = 0;
		$this->set('providersImportedDatabases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers imported database', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersImportedDatabase', $this->ProvidersImportedDatabase->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersImportedDatabase->create();
			if ($this->ProvidersImportedDatabase->save($this->data)) {
				$this->Session->setFlash(__('The providers imported database has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers imported database could not be saved. Please, try again.', true));
			}
		}
		$providersImportedFilesControls = $this->ProvidersImportedDatabase->ProvidersImportedFilesControl->find('list');
		$providersViewCompaniesUnits = $this->ProvidersImportedDatabase->ProvidersViewCompaniesUnit->find('list');
		$users = $this->ProvidersImportedDatabase->User->find('list');
		$this->set(compact('providersImportedFilesControls', 'providersViewCompaniesUnits', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers imported database', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersImportedDatabase->save($this->data)) {
				$this->Session->setFlash(__('The providers imported database has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers imported database could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersImportedDatabase->read(null, $id);
		}
		$providersImportedFilesControls = $this->ProvidersImportedDatabase->ProvidersImportedFilesControl->find('list');
		$providersViewCompaniesUnits = $this->ProvidersImportedDatabase->ProvidersViewCompaniesUnit->find('list');
		$users = $this->ProvidersImportedDatabase->User->find('list');
		$this->set(compact('providersImportedFilesControls', 'providersViewCompaniesUnits', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers imported database', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersImportedDatabase->delete($id)) {
			$this->Session->setFlash(__('Providers imported database deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers imported database was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
