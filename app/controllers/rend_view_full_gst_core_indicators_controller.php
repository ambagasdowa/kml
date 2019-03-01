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
class RendViewFullGstCoreIndicatorsController extends AppController {

	var $name = 'RendViewFullGstCoreIndicators';

	function get() {
		Configure::write('debug',2);

		// $this->LoadModel('BalanzaViewUdnsRpt');

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
				if ( isset($chars[1]) && $chars[1] == 'RendViewFullGstCoreIndicator' && $postvalue['value'] != '') {

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
		// exit();
		$conditionsBl['RendViewFullGstCoreIndicator.periodo'] = $add_conditions['periodo'];
		$conditionsBl['RendViewFullGstCoreIndicator.id_area'] = $add_conditions['id_area'];
		// $conditionsBl['RendViewFullGstCoreIndicator.id'] = 10;

		$rendViewFullGstCoreIndicators = $this->RendViewFullGstCoreIndicator->find('all',array('conditions'=>$conditionsBl));

		// debug($rendViewFullGstCoreIndicators);

		// exit();

		$this->set(compact('rendViewFullGstCoreIndicators'));

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}



	function index() {
		// 
		// $this->LoadModule('ProjectionsViewBussinessUnit');
		// // DEBUG bugging
		// // debug($projectionsViewIndicatorsPeriodsFullFleets);
		// if (!isset($bsu_conditions)){
		// 	$bsu_conditions = null;
		// }
		// $bssus = array_values($this->ProjectionsViewBussinessUnit->find('list',array('conditions'=>$bsu_conditions)));
		// debug($bssus);

		$this->RendViewFullGstCoreIndicator->recursive = 0;
		$this->set('rendViewFullGstCoreIndicators', $this->paginate());
		$this->set(compact('bssus'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rend view full gst core indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rendViewFullGstCoreIndicator', $this->RendViewFullGstCoreIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RendViewFullGstCoreIndicator->create();
			if ($this->RendViewFullGstCoreIndicator->save($this->data)) {
				$this->Session->setFlash(__('The rend view full gst core indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rend view full gst core indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rend view full gst core indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RendViewFullGstCoreIndicator->save($this->data)) {
				$this->Session->setFlash(__('The rend view full gst core indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rend view full gst core indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RendViewFullGstCoreIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rend view full gst core indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RendViewFullGstCoreIndicator->delete($id)) {
			$this->Session->setFlash(__('Rend view full gst core indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rend view full gst core indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
