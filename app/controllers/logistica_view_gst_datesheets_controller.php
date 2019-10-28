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
class LogisticaViewGstDatesheetsController extends AppController {

	var $name = 'LogisticaViewGstDatesheets';

	function date_convert($date) {
		//1. Transform request parameters to MySQL datetime format.
		$date_return = null;
		$date_init = new DateTime($date);
		$start =  $date_init->format('Y-m-d');
		return $start;
	}


	function get() {

		Configure::write('debug',0);
		// App::uses('Xml', 'Lib');
		debug($this->params);

		// exit();
		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);
		// $this->loadModel('LogisticaViewGstDatesheets');
		$conditions = array();
		$add_conditions = array();
		foreach ( $posted as $keys => $postvalue ) {

			if ( $keys > 0 ) {
				$content = $postvalue['name'];
				// debug($postvalue['value']);
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				// debug($chars);
				if ( isset($chars[1]) && $chars[1] == 'LogisticaViewGstDatesheet' && $postvalue['value'] != '') {

					// if ($chars[2] == 'Funcionario' && $postvalue['value'] != '') {
					// 	// code...
					// }

					$add_conditions[$chars[2]] = $postvalue['value'];
					$conditionsBl[$chars[2]] = $postvalue['value'];
				}
				// if(isset($chars[2])) {
				// 	$conditions[$chars[2]] = $postvalue['value'];
				// }
			}
		}

		debug($add_conditions);
		// exit();

		// debug($this->date_convert($add_conditions['dateini']));

		if (isset($add_conditions['dateini']) && isset($add_conditions['dateend'])){
			// code for both date

			$conditions = array('LogisticaViewGstDatesheet.f_despachado BETWEEN ? AND ?'=> array ($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));

		} elseif (isset($add_conditions['dateini']) || isset($add_conditions['dateend'])){

				if( isset($add_conditions['dateini']) ) {
					$conditions['LogisticaViewGstDatesheet.f_despachado'] = $this->date_convert($add_conditions['dateini']);
				} else {
					$conditions['LogisticaViewGstDatesheet.f_despachado'] = $this->date_convert($add_conditions['dateend']);
				}
		} else {
			// $add_conditions['dateini'] = null;
			// $add_conditions['dateend'] = null;
			$conditions['LogisticaViewGstDatesheet.f_despachado'] = $this->date_convert(date('Y-m-d'));
		}



		if(isset($add_conditions['id_area'])){
			$conditions['LogisticaViewGstDatesheet.id_area'] = $add_conditions['id_area'];
		}

		if(isset($add_conditions['IsEmptyTrip'])){
			$conditions['LogisticaViewGstDatesheet.IsEmptyTrip'] = $add_conditions['IsEmptyTrip'];
		}

		if(isset($add_conditions['projections_rp_definition'])){
			$conditions['LogisticaViewGstDatesheet.projections_rp_definition'] = $add_conditions['projections_rp_definition'];
		}

//
		debug($conditions);


// exit();
		$logisticaViewGstDatesheets = $this->LogisticaViewGstDatesheet->find('all',array('conditions'=>$conditions));

		if ( count($logisticaViewGstDatesheets) > 0 ) {
			// code...
			$info = 0;
		} else {
			$info = 1;
		}
// debug($conditions);


	$this->set(compact('logisticaViewGstDatesheets','info'));

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;

	}



	function index() {
		// Configure::write('debug', 2);
		// echo '<textarea height"900" width="600"></textarea>';
		// $this->LogisticaViewGstDatesheet->recursive = 0;
		// $this->set('logisticaViewGstDatesheets', $this->paginate());
		$this->LoadModel('ProjectionsViewBussinessUnit');
		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id_area','label')));
		// debug($bssus);
		$IsEmptyTrip = array(0=>'Cargado',1=>'Vacio');
		$projections_rp_definition = array('GRANEL'=>'Granel','OTROS'=>'Otros');

		$this->set(compact('bssus','IsEmptyTrip','projections_rp_definition'));

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid logistica view gst datesheet', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('logisticaViewGstDatesheet', $this->LogisticaViewGstDatesheet->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->LogisticaViewGstDatesheet->create();
			if ($this->LogisticaViewGstDatesheet->save($this->data)) {
				$this->Session->setFlash(__('The logistica view gst datesheet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The logistica view gst datesheet could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid logistica view gst datesheet', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->LogisticaViewGstDatesheet->save($this->data)) {
				$this->Session->setFlash(__('The logistica view gst datesheet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The logistica view gst datesheet could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->LogisticaViewGstDatesheet->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for logistica view gst datesheet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->LogisticaViewGstDatesheet->delete($id)) {
			$this->Session->setFlash(__('Logistica view gst datesheet deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Logistica view gst datesheet was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
