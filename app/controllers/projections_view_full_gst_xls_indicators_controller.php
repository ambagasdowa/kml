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
class ProjectionsViewFullGstXlsIndicatorsController extends AppController {

	var $name = 'ProjectionsViewFullGstXlsIndicators';
	// var $uses = array('ReporterViewSpXs4zAccount','ReporterTableKey','ProjectionsViewBussinessUnit');
	// var $components = array('RequestHandler','Session','Search.Prg');
	// var $helpers = array('Html','Form','Ajax','Javascript','Js');

	function date_convert($date) {
		//1. Transform request parameters to MySQL datetime format.
		$date_return = null;
		$date_init = new DateTime($date);
		$start =  $date_init->format('Y-m-d');
		return $start;
	}


	function link () {

	}


	function update() {

	}


	function get() {

		Configure::write('debug',2);
		// App::uses('Xml', 'Lib');

		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->ProjectionsViewBussinessUnit->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
		// $bssus = $this->ProjectionsViewBussinessUnit->find('all',array('fields'=>array('id_area','name')));

		// debug($bssus);

		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);

		$conditions = array();
		$add_conditions = array();
		foreach ( $posted as $keys => $postvalue ) {

			if ( $keys > 0 ) {
				$content = $postvalue['name'];
				// debug($postvalue['value']);
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				// debug($chars);
				if ( isset($chars[1]) && $chars[1] == 'ProjectionsViewFullGstXlsIndicators' && $postvalue['value'] != '') {

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
		// debug($this->date_convert($add_conditions['dateini']));

		if (isset($add_conditions['dateini']) && isset($add_conditions['dateend'])){
			// code for both date

			$conditionsBl = array('ProjectionsViewFullGstXlsIndicator.fecha BETWEEN ? AND ?'=> array ($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));
			$conditions['dateini'] = $this->date_convert($add_conditions['dateini']);
			$conditions['dateend'] = $this->date_convert($add_conditions['dateend']);

		} elseif (isset($add_conditions['dateini']) || isset($add_conditions['dateend'])){

				if( isset($add_conditions['dateini']) ) {
					$conditionsBl['ProjectionsViewFullGstXlsIndicator.fecha'] = $this->date_convert($add_conditions['dateini']);
					$conditions['dateini'] = $this->date_convert($add_conditions['dateini']);
					$conditions['dateend'] = $this->date_convert($add_conditions['dateini']);
				} else {
					$conditionsBl['ProjectionsViewFullGstXlsIndicator.fecha'] = $this->date_convert($add_conditions['dateend']);
					$conditions['dateini'] = $this->date_convert($add_conditions['dateend']);
					$conditions['dateend'] = $this->date_convert($add_conditions['dateend']);
				}
		} else {
			// $add_conditions['dateini'] = null;
			// $add_conditions['dateend'] = null;
			$conditionsBl['ProjectionsViewFullGstXlsIndicator.fecha'] = $this->date_convert(date('Y-m-d'));
			// $conditions['dateini'] = $this->date_convert(date('Y-m-d'));
			$conditions['dateini'] = $this->date_convert(date('Y-m-d', strtotime($this->date_convert(date('Y-m-d')) . ' -1 day')));
			// $conditions['dateend'] = $this->date_convert(date('Y-m-d', strtotime($this->date_convert(date('Y-m-d')) . ' -1 day')));
			$conditions['dateend'] = $this->date_convert(date('Y-m-d'));
		}

// debug($conditions);

		if(isset($add_conditions['id_area'])){
			$conditionsBl['ProjectionsViewFullGstXlsIndicator.id_area'] = $add_conditions['id_area'];
		}

		// debug($conditionsBl);

// exit();
		// $projectionsViewFullGstXlsIndicators = $this->ProjectionsViewFullGstXlsIndicators->find('all');
		$this->loadModel('ProjectionsViewFullGstXlsIndicator');
		// $this->ProjectionsViewFullGstXlsIndicator->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');

		// $projectionsViewFullGstXlsIndicators = $this->ProjectionsViewFullGstXlsIndicator->find('all',array('conditions'=>$conditionsBl));

		// $conditions['dateini'] = $this->date_convert($add_conditions['dateini']);
		// $conditions['dateend'] = $this->date_convert($add_conditions['dateend']);
		$conditions['id_area'] = $add_conditions['id_area'];
		$conditions['id_tipo_operacion'] = $add_conditions['id_tipo_operacion'];

		$projectionsViewFullGstXlsIndicators = $this->ProjectionsViewFullGstXlsIndicator->fetch('compact',$conditions);
		// $projectionsViewFullGstXlsIndicators = $this->ProjectionsViewFullGstXlsIndicator->find('all');

		// debug($projectionsViewFullGstXlsIndicators);

// debug($conditions);
		// foreach($projectionsViewFullGstXlsIndicators as $key => $value) {
		// 	debug($value);
		// }

// exit();

		$this->set(compact('projectionsViewFullGstXlsIndicators'));

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;

	}



	function index() {
		$this->LoadModel('ProjectionsViewBussinessUnit');
		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id_area','name')));
		$this->set(compact('bssus'));
	}



	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view full gst xls indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewFullGstXlsIndicator', $this->ProjectionsViewFullGstXlsIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewFullGstXlsIndicator->create();
			if ($this->ProjectionsViewFullGstXlsIndicator->save($this->data)) {
				$this->Session->setFlash(__('The projections view full gst xls indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view full gst xls indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view full gst xls indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewFullGstXlsIndicator->save($this->data)) {
				$this->Session->setFlash(__('The projections view full gst xls indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view full gst xls indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewFullGstXlsIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view full gst xls indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewFullGstXlsIndicator->delete($id)) {
			$this->Session->setFlash(__('Projections view full gst xls indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view full gst xls indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
