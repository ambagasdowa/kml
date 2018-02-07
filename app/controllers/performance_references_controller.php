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
		// Configure::write('debug',2);
		$this->LoadModel('PerformanceViewFactura');
		$this->LoadModel('PerformanceBsu');

		$posted = json_decode(base64_decode($this->params['named']['data']),true);

		$conditions = array();

		foreach ($posted as $keys => $postvalue) {
			if ($keys > 0 ) {

				$content = $postvalue['name'];
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				if ( isset($chars[2]) && $chars[2] == 'performance_bsu' && $postvalue['value'] != '') {
					$add_conditions[] = $postvalue['value'];
				}
				// debug($chars);
				if(isset($chars[2])) {
					$conditions[$chars[2]] = $postvalue['value'];
				}

			}
		}
		// debug($posted);
		$conditions['performance_bsu'] = $add_conditions;

		//1. Transform request parameters to MySQL datetime format.
		$date_init = new DateTime($conditions['performance_dateini']);
		$mysqlstart =  $date_init->format('Y-m-d');
		// debug($mysqlstart);
		$date_end = new DateTime($conditions['performance_dateend']);
		$mysqlend = $date_end->format('Y-m-d');
		// debug($mysqlend);

		if ( $mysqlstart == $mysqlend) {
			$conditionsPerformance['PerformanceViewFactura.ElaboracionFactura'] = $mysqlstart;
		} else {
			$conditionsPerformance['PerformanceViewFactura.ElaboracionFactura BETWEEN ? AND ?'] = array($mysqlstart,$mysqlend);
		}

		if (isset($conditions['performance_fraccion']) AND $conditions['performance_fraccion'] != '') {
			if ($conditions['performance_fraccion'] == '1') {
				$conditionsPerformance['PerformanceViewFactura.Clasificacion'] = array('Granel');
			}
			if ($conditions['performance_fraccion'] == '2') {
				$conditionsPerformance['PerformanceViewFactura.Clasificacion'] = array('Terceros');
			}
			if ($conditions['performance_fraccion'] == '3') {
				$conditionsPerformance['PerformanceViewFactura.Clasificacion'] = array('Otros');
			}
			if ($conditions['performance_fraccion'] == '4') {
				$conditionsPerformance['PerformanceViewFactura.Clasificacion'] = array('Colaboracion');
			}
			if ($conditions['performance_fraccion'] == '5') {
				// $conditionsPerformance['PerformanceViewFactura.Clasificacion NOT'] = array('Granel','Terceros','Otros','Colaboracion');
				$conditionsPerformance['PerformanceViewFactura.Clasificacion'] = null;
			}
		}

		$conditionsPerformance['PerformanceViewFactura.Empresa'] = $conditions['performance_bsu'];
		// debug($conditionsPerformance);

		$performanceReferences = $this->PerformanceViewFactura->find('all',array('conditions'=>$conditionsPerformance,'order'=>array('PerformanceViewFactura.performance_customers_id'=>'desc')));

		// NOTE FILTER
		$condBsu['PerformanceBsu.id'] = $conditions['performance_bsu'];
		$bsu_compact = ucwords(strtolower(implode(',',$this->PerformanceBsu->find('list',array('fields'=>array('id','label'),'conditions'=>$condBsu)))));

		$dashboard = array('inicio'=>$mysqlstart,'fin'=>$mysqlend,'bsu'=>$bsu_compact);

		foreach ($performanceReferences as $key_performance => $data_performance) {
			# code...
			$performanceReferencesMod[$data_performance['PerformanceViewFactura']['performance_customers_id']][]['PerformanceViewFactura'] = $data_performance['PerformanceViewFactura'] ;
			$performanceReferencesIdx[$data_performance['PerformanceViewFactura']['performance_customers_id']] = $data_performance['PerformanceViewFactura']['Nombre'] ;

			if (!empty($data_performance['PerformanceViewFactura']['ElaboracionFactura']) AND !empty($data_performance['PerformanceViewFactura']['entregaFacturaCliente'])) {

				$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['deliver'][] = $data_performance['PerformanceViewFactura']['deliver'];
			}

			if (!empty($data_performance['PerformanceViewFactura']['aprobacionFactura']) AND !empty($data_performance['PerformanceViewFactura']['entregaFacturaCliente'])) {

				$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['proved'][] = $data_performance['PerformanceViewFactura']['proved'];
			}

			if (!empty($data_performance['PerformanceViewFactura']['aprobacionFactura'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['promise'][] = 	$data_performance['PerformanceViewFactura']['promise'];
			}

			if (!empty($data_performance['PerformanceViewFactura']['fechaPago']) AND !empty($data_performance['PerformanceViewFactura']['fechaPromesaPago'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['payment'][] = $data_performance['PerformanceViewFactura']['payment'];
			}

			if (!empty($data_performance['PerformanceViewFactura']['Total'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewFactura']['performance_customers_id']]['amount'][$data_performance['PerformanceViewFactura']['Referencia']] = (float)$data_performance['PerformanceViewFactura']['Total'];
			}
		}



		if (!isset($performanceReferencesResume)) {
			$performanceReferencesResume = null ;
		}
		$generalResume = $performanceReferencesResume;
		$general['Dias de Entrega'] = null;
		$general['Dias de Aprobacion'] = null;
		$general['Dias de Promesa'] = null;
		$general['Dias de Pago'] = null;
		$general['Cantidad'] = null;
		// Quantities
		$general['Entrega'] = null;
		$general['Aprobado'] = null;
		$general['Promesa'] = null;
		$general['Pago'] = null;
		$general['Monto'] = null;

		// debug($generalResume);

	if (isset($generalResume)) {
		foreach ( $generalResume as $resumenkey => $resumenvalue ) {
			# code...
			debug($resumenvalue);
			$general['Dias de Entrega'] += array_sum($resumenvalue['deliver']);
			$general['Dias de Aprobacion'] += array_sum($resumenvalue['proved']);
			$general['Dias de Promesa'] += array_sum($resumenvalue['promise']);
			$general['Dias de Pago'] += array_sum($resumenvalue['payment']);
			// $general['Cantidad'] += count($resumenvalue['deliver']);
			$general['Monto'] += array_sum($resumenvalue['amount']);

			// NOTE Counts
			foreach ($resumenvalue as $rkey => $rvalue) {
				foreach ($rvalue as $gkey => $gvalue) {
					// if ($gvalue > 0 ) {
						if (!isset($subgeneral[$resumenkey][$rkey])) {
							$subgeneral[$resumenkey][$rkey] = null;
						}
						if (!isset($generalall[$rkey])) {
							$generalall[$rkey] = null;
						}
						$subgeneral[$resumenkey][$rkey] += 1;
						$generalall[$rkey] += 1;
					// }
				}
			} // NOTE end foreach


			//Continue
		} // NOTE end General

// debug($subgeneral);
// debug($generalall);

// debug(array_key_exists('Cantidad',$general));

		$general['Entrega'] = $generalall['deliver'];
		$general['Aprobado'] = $generalall['proved'];
		$general['Promesa'] = $generalall['promise'];
		$general['Pago'] = $generalall['payment'];

		foreach ($general as $key => $value) {
			# code...
			if ($key != 'Entrega' and $key != 'Aprobado' and $key != 'Promesa' and $key != 'Pago') {

				if ($key == 'Dias de Entrega') {
					$result_array[$key] =
					number_format(
							money_format(
									'%i',
									(
										$value / $generalall['deliver']
									)
							), 2, '.', ','
					);
				} else if ($key == 'Dias de Aprobacion') {
					$result_array[$key] =
					number_format(
							money_format(
									'%i',
									(
										$value / $generalall['proved']
									)
							), 2, '.', ','
					);
				} else if ($key == 'Dias de Promesa') {
					$result_array[$key] =
					number_format(
							money_format(
									'%i',
									(
										$value / $generalall['promise']
									)
							), 2, '.', ','
					);
				} else if ($key == 'Dias de Pago') {
					$result_array[$key] =
					number_format(
							money_format(
									'%i',
									(
										$value / $generalall['payment']
									)
							), 2, '.', ','
					);
				} else if ($key == 'Monto') {
					$result_array[$key] =
					number_format(
							money_format(
									'%i',
									(
										$value
									)
							), 2, '.', ','
					);
				// } else {
				// 	$result_array[$key] =
				// 	number_format(
				// 			money_format(
				// 					'%i',
				// 					(
				// 						$value / $general['Cantidad']
				// 					)
				// 			), 2, '.', ','
				// 	);
				}

			} else {
				$result_array[$key] = $value;
			}
		}
		$performanceGeneral = $result_array;
	} else {
		$performanceGeneral = null;
	}

	// NOTE to concvert need drop al traces of a string
		$new_monto = str_replace(',','',$performanceGeneral['Monto']);
		$factor = ( (100) / $new_monto );

		foreach ($performanceReferencesIdx as $key_rfc => $comp_name) {
			$to_parsing[] = json_encode(array('name'=>$comp_name,'y'=>round((array_sum($performanceReferencesResume[$key_rfc]['amount']))*$factor,2),'drilldown'=>$key_rfc), JSON_PRETTY_PRINT);
			foreach ($performanceReferencesResume[$key_rfc]['amount'] as $key_reference => $amount_value) {
				$data_x[$key_rfc][$key_reference] = '["'.$key_reference.'",'. $amount_value * $factor . ']' ;
				$performanceReferencesResumePercent[$key_rfc]['amount'][$key_reference] = $amount_value * $factor;
			}

			$data='['.str_replace('}',']',str_replace('{','[',str_replace(':',',',str_replace(',','],[',json_encode($performanceReferencesResumePercent[$key_rfc]['amount']))))).']';
			$init_parsing[$key_rfc] = json_encode(array('name'=>$comp_name,'id'=>$key_rfc,'data'=>"{$data}"), JSON_FORCE_OBJECT);
		}

		$in_parsing = str_replace(']"',']',str_replace('"[','[',str_replace('\"','"',$init_parsing)));
		$json_parsing_level_one = implode(',',$to_parsing);
		$json_parsing_level_two = implode(',',$in_parsing);

		// debug($json_parsing_level_two);

// debug($performanceReferencesResume);

		$this->set(compact('performanceReferencesMod','performanceReferencesIdx','dashboard','performanceReferencesResume','performanceGeneral','subgeneral','json_parsing_level_one','json_parsing_level_two'));

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
