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
class ProvidersViewSearchEditionsController extends AppController {

	var $name = 'ProvidersViewSearchEditions';


	function index() {
		$this->ProvidersViewSearchEdition->recursive = 0;
		$this->set('providersViewSearchEditions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers view search edition', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersViewSearchEdition', $this->ProvidersViewSearchEdition->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProvidersViewSearchEdition->create();
			if ($this->ProvidersViewSearchEdition->save($this->data)) {
				$this->Session->setFlash(__('The providers view search edition has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view search edition could not be saved. Please, try again.', true));
			}
		}
		$providersImportedFilesControls = $this->ProvidersViewSearchEdition->ProvidersImportedFilesControl->find('list');
		$users = $this->ProvidersViewSearchEdition->User->find('list');
		$this->set(compact('providersImportedFilesControls', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers view search edition', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersViewSearchEdition->save($this->data)) {
				$this->Session->setFlash(__('The providers view search edition has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers view search edition could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersViewSearchEdition->read(null, $id);
		}
		$providersImportedFilesControls = $this->ProvidersViewSearchEdition->ProvidersImportedFilesControl->find('list');
		$users = $this->ProvidersViewSearchEdition->User->find('list');
		$this->set(compact('providersImportedFilesControls', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers view search edition', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersViewSearchEdition->delete($id)) {
			$this->Session->setFlash(__('Providers view search edition deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers view search edition was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
