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
class CasetasViewNotConciliationsController extends AppController {

	var $name = 'CasetasViewNotConciliations';


	function index() {
		$this->CasetasViewNotConciliation->recursive = 0;
		$this->set('casetasViewNotConciliations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas view not conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasViewNotConciliation', $this->CasetasViewNotConciliation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasViewNotConciliation->create();
			if ($this->CasetasViewNotConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas view not conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view not conciliation could not be saved. Please, try again.', true));
			}
		}
		$casetasHistoricalConciliations = $this->CasetasViewNotConciliation->CasetasHistoricalConciliation->find('list');
		$this->set(compact('casetasHistoricalConciliations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas view not conciliation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasViewNotConciliation->save($this->data)) {
				$this->Session->setFlash(__('The casetas view not conciliation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view not conciliation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasViewNotConciliation->read(null, $id);
		}
		$casetasHistoricalConciliations = $this->CasetasViewNotConciliation->CasetasHistoricalConciliation->find('list');
		$this->set(compact('casetasHistoricalConciliations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas view not conciliation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasViewNotConciliation->delete($id)) {
			$this->Session->setFlash(__('Casetas view not conciliation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas view not conciliation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
