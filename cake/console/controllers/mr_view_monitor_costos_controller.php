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
class MrViewMonitorCostosController extends AppController {

	var $name = 'MrViewMonitorCostos';

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


	function index() {
		$this->MrViewMonitorCosto->recursive = 0;
		$this->set('mrViewMonitorCostos', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr view monitor costo', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrViewMonitorCosto', $this->MrViewMonitorCosto->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrViewMonitorCosto->create();
			if ($this->MrViewMonitorCosto->save($this->data)) {
				$this->Session->setFlash(__('The mr view monitor costo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr view monitor costo could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr view monitor costo', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrViewMonitorCosto->save($this->data)) {
				$this->Session->setFlash(__('The mr view monitor costo has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr view monitor costo could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrViewMonitorCosto->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr view monitor costo', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrViewMonitorCosto->delete($id)) {
			$this->Session->setFlash(__('Mr view monitor costo deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr view monitor costo was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
