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
class BalanzaViewUdnsRptsController extends AppController {

	var $name = 'BalanzaViewUdnsRpts';


	function index() {
		$this->BalanzaViewUdnsRpt->recursive = 0;
		$this->set('balanzaViewUdnsRpts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid balanza view udns rpt', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('balanzaViewUdnsRpt', $this->BalanzaViewUdnsRpt->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->BalanzaViewUdnsRpt->create();
			if ($this->BalanzaViewUdnsRpt->save($this->data)) {
				$this->Session->setFlash(__('The balanza view udns rpt has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The balanza view udns rpt could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid balanza view udns rpt', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->BalanzaViewUdnsRpt->save($this->data)) {
				$this->Session->setFlash(__('The balanza view udns rpt has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The balanza view udns rpt could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->BalanzaViewUdnsRpt->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for balanza view udns rpt', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->BalanzaViewUdnsRpt->delete($id)) {
			$this->Session->setFlash(__('Balanza view udns rpt deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Balanza view udns rpt was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
