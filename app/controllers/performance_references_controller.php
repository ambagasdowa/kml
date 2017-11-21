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

class PerformanceReferencesController extends AppController {

	var $name = 'PerformanceReferences';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');
	// var $uses = array('PerformanceReference','PerformanceYear');
	// var $presetVars = array(
	// 	array('field' => 'name', 'type' => 'value'),
	// );


	function get() {
		Configure::write('debug',2);

		$this->LoadModel('PerformanceViewFactura');
		$this->LoadModel('PerformanceBsu');

		$posted = json_decode(base64_decode($this->params['named']['data']),true);

		foreach ($posted as $keys => $postvalue) {
			if ($keys > 0 ) {

				$content = $postvalue['name'];
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				$conditions[$chars[2]] = $postvalue['value'];

			}
		}
		//1. Transform request parameters to MySQL datetime format.
		$date_init = new DateTime($conditions['performance_dateini']);
		$mysqlstart =  $date_init->format('Y-m-d');
		// debug($mysqlstart);
		$date_end = new DateTime($conditions['performance_dateend']);
		$mysqlend = $date_end->format('Y-m-d');
		// debug($mysqlend);
		$conditionsPerformance['PerformanceViewFactura.ElaboracionFactura BETWEEN ? AND ?'] = array($mysqlstart,$mysqlend);
		$conditionsPerformance['PerformanceViewFactura.Empresa'] = $conditions['performance_bsu'];
		$performanceReferences = $this->PerformanceViewFactura->find('all',array('conditions'=>$conditionsPerformance));

		// NOTE FILTER
		$condBsu['PerformanceBsu.id'] = $conditions['performance_bsu'];
		$bsu_compact = ucwords(strtolower(current($this->PerformanceBsu->find('list',array('fields'=>array('id','label'),'conditions'=>$condBsu)))));

		$dashboard = array('inicio'=>$mysqlstart,'fin'=>$mysqlend,'bsu'=>$bsu_compact);

		foreach ($performanceReferences as $key_performance => $data_performance) {
			# code...
			$performanceReferencesMod[$data_performance['PerformanceViewFactura']['performance_customers_id']][]['PerformanceViewFactura'] = $data_performance['PerformanceViewFactura'] ;
			$performanceReferencesIdx[$data_performance['PerformanceViewFactura']['performance_customers_id']] = $data_performance['PerformanceViewFactura']['Nombre'] ;

			$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['deliver'][] = $data_performance['PerformanceViewFactura']['deliver'];

			$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['proved'][] = $data_performance['PerformanceViewFactura']['proved'];

			$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['promise'][] = $data_performance['PerformanceViewFactura']['promise'];

			$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['payment'][] = $data_performance['PerformanceViewFactura']['payment'];
		}

		$this->set(compact('performanceReferencesMod','performanceReferencesIdx','dashboard','performanceReferencesResume'));

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
		$performance_bsus = $this->PerformanceBsu->find('list',array('fields'=>array('tname','label')));

		$this->set(compact('performance_bsus'));

		$this->PerformanceReference->recursive = 0;
		$this->set('performanceReferences', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance reference', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceReference', $this->PerformanceReference->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->PerformanceReference->create();
			if ($this->PerformanceReference->save($this->data)) {
				$this->Session->setFlash(__('The performance reference has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance reference could not be saved. Please, try again.', true));
			}
		}
		$performanceCustomers = $this->PerformanceReference->PerformanceCustomer->find('list');
		$this->set(compact('performanceCustomers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance reference', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceReference->save($this->data)) {
				$this->Session->setFlash(__('The performance reference has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance reference could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceReference->read(null, $id);
		}
		$performanceCustomers = $this->PerformanceReference->PerformanceCustomer->find('list');
		$this->set(compact('performanceCustomers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance reference', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceReference->delete($id)) {
			$this->Session->setFlash(__('Performance reference deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance reference was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
