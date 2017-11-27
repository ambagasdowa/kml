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
class PerformanceTripsController extends AppController {

	var $name = 'PerformanceTrips';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');


	function get() {
		Configure::write('debug',2);

		$this->LoadModel('PerformanceViewViaje');
		$this->LoadModel('PerformanceBsu');

		$posted = json_decode(base64_decode($this->params['named']['data']),true);

		foreach ($posted as $keys => $postvalue) {
			if ($keys > 0 ) {

				$content = $postvalue['name'];
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				$conditions[$chars[2]] = $postvalue['value'];

			}
		}

		// debug($posted);
		// debug($conditions);
// exit();
		//1. Transform request parameters to MySQL datetime format.
		$date_init = new DateTime($conditions['performance_dateini']);
		$mysqlstart =  $date_init->format('Y-m-d');
		// debug($mysqlstart);
		$date_end = new DateTime($conditions['performance_dateend']);
		$mysqlend = $date_end->format('Y-m-d');
		// debug($mysqlend);

		// NOTE FILTER
		$condBsu['PerformanceBsu.id'] = $conditions['performance_bsu'];

		$area = $this->PerformanceBsu->find('list',array('fields'=>array('id','label'),'conditions'=>$condBsu));
		$bsu_compact = ucwords(strtolower(current($area)));

		$conditionsPerformance['PerformanceViewViaje.fecha_guia BETWEEN ? AND ?'] = array($mysqlstart,$mysqlend);
		$conditionsPerformance['PerformanceViewViaje.area'] = current($area);
		$performanceViewViaje = $this->PerformanceViewViaje->find('all',array('conditions'=>$conditionsPerformance));

		$dashboard = array('inicio'=>$mysqlstart,'fin'=>$mysqlend,'bsu'=>$bsu_compact);

		// debug($performanceViewViaje);

// NOTE from hir work in this
		$performanceReferences = $performanceViewViaje;

		foreach ($performanceReferences as $key_performance => $data_performance) {
			# code...
			$performanceReferencesMod[$data_performance['PerformanceViewViaje']['id_cliente']][]['PerformanceViewViaje'] = $data_performance['PerformanceViewViaje'] ;

			$performanceReferencesIdx[$data_performance['PerformanceViewViaje']['id_cliente']] = $data_performance['PerformanceViewViaje']['cliente'] ;

			$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['end'][] = $data_performance['PerformanceViewViaje']['end'];
			$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['reception'][] = $data_performance['PerformanceViewViaje']['reception'];
			$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['aceptance'][] = $data_performance['PerformanceViewViaje']['aceptance'];
			$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['deliver'][] = $data_performance['PerformanceViewViaje']['deliver'];
			$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['validation'][] = $data_performance['PerformanceViewViaje']['validation'];

		}

		// debug($performanceReferencesMod);

		$this->set(compact('performanceViewViaje','performanceReferencesMod','performanceReferencesIdx','dashboard','performanceReferencesResume'));

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}

	function index() {

		Configure::write('debug',2);
		// $this->Prg->commonProcess();
   	// $this->LoadModel('PerformanceYear');
		// $this->LoadModel('PerformanceMonth');
		$this->LoadModel('PerformanceBsu');
		// $performance_years = $this->PerformanceYear->find('list');
		// $performance_months = $this->PerformanceMonth->find('list');
		$performance_bsus = $this->PerformanceBsu->find('list',array('fields'=>array('id','label')));
		// debug($performance_bsus);
		$this->set(compact('performance_bsus'));
		// $this->PerformanceTrip->recursive = 0;
		// $this->set('performanceTrips', $this->paginate());
	}


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance trip', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceTrip', $this->PerformanceTrip->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceTrip->create();
			if ($this->PerformanceTrip->save($this->data)) {
				$this->Session->setFlash(__('The performance trip has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance trip could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance trip', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceTrip->save($this->data)) {
				$this->Session->setFlash(__('The performance trip has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance trip could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceTrip->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance trip', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceTrip->delete($id)) {
			$this->Session->setFlash(__('Performance trip deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance trip was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
