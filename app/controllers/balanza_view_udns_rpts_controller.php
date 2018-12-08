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
		// $this->BalanzaViewUdnsRpt->recursive = 0;
		// $this->set('balanzaViewUdnsRpts', $this->paginate());

		// $this->LoadModel('');
	}

	function getJson(){
		Configure::write('debug',2);
		debug($this->params);
		// NOTE retrieve the data from server for select boxes as json
		exit();
	}

	function get() {
		Configure::write('debug',2);

		$this->LoadModel('BalanzaViewUdnsRpt');

		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);

		$conditions = array();
		$add_conditions = array();
		foreach ($posted as $keys => $postvalue) {

			if ($keys > 0 ) {
				$content = $postvalue['name'];
				// debug($postvalue['value']);
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				// debug($chars);
				if ( isset($chars[1]) && $chars[1] == 'BalanzaViewUdnsRpt' && $postvalue['value'] != '') {

					// if ($chars[2] == 'Funcionario' && $postvalue['value'] != '') {
					// 	// code...
					// }

					$add_conditions[$chars[2]] = $postvalue['value'];
					$conditions[$chars[2]] = $postvalue['value'];
				}
				// if(isset($chars[2])) {
				// 	$conditions[$chars[2]] = $postvalue['value'];
				// }
			}
		}

		// debug($conditions);
		$conditionsBl['BalanzaViewUdnsRpt.Empleado'] = $add_conditions['Empleado'];

		$balanzaViewUdnsRpts = $this->BalanzaViewUdnsRpt->find('all',array('conditions'=>$conditionsBl));

		$this->set(compact('balanzaViewUdnsRpts'));

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
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
