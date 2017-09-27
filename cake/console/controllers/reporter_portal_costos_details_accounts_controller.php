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
class ReporterPortalCostosDetailsAccountsController extends AppController {

	var $name = 'ReporterPortalCostosDetailsAccounts';


	function index() {
		$this->ReporterPortalCostosDetailsAccount->recursive = 0;
		$this->set('reporterPortalCostosDetailsAccounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid reporter portal costos details account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reporterPortalCostosDetailsAccount', $this->ReporterPortalCostosDetailsAccount->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ReporterPortalCostosDetailsAccount->create();
			if ($this->ReporterPortalCostosDetailsAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter portal costos details account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter portal costos details account could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reporter portal costos details account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReporterPortalCostosDetailsAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter portal costos details account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter portal costos details account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReporterPortalCostosDetailsAccount->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reporter portal costos details account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReporterPortalCostosDetailsAccount->delete($id)) {
			$this->Session->setFlash(__('Reporter portal costos details account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Reporter portal costos details account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
