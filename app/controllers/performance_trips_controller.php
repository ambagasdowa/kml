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


	// function csv( $data = null ) {
	//
  //   $data = array(
  //     array("firstname" => "Mary", "lastname" => "Johnson", "age" => 25),
  //     array("firstname" => "Amanda", "lastname" => "Miller", "age" => 18),
  //     array("firstname" => "James", "lastname" => "Brown", "age" => 31),
  //     array("firstname" => "Patricia", "lastname" => "Williams", "age" => 7),
  //     array("firstname" => "Michael", "lastname" => "Davis", "age" => 43),
  //     array("firstname" => "Sarah", "lastname" => "Miller", "age" => 24),
  //     array("firstname" => "Patrick", "lastname" => "Miller", "age" => 27)
  //   );
	//
	// 	// filename for download
  //   $filename = "website_data_" . date('Ymd') . ".csv";
  //   $out = fopen("php://output", 'w');
  //   $flag = false;
	//
	// 	Configure::write('debug', 0);
	// 	$this->autoRender = false;
	// 	$this->autoLayout = false;
	// 	$this->header('Content-Disposition: attachment; filename=\"$filename\"');
	// 	$this->header('Content-Type: text/csv');
	//
  //   foreach($data as $row) {
  //     if(!$flag) {
  //       // display field/column names as first row
  //       fputcsv($out, array_keys($row), ',', '"');
  //       $flag = true;
  //     }
  //     array_walk($row, __NAMESPACE__ . '\cleanData');
  //     fputcsv($out, array_values($row), ',', '"');
  //   }
  //   fclose($out);
  //   // exit();
	// } // NOTE end csv

	function get( $xport=null ) {
		// Configure::write('debug',2);

		$this->LoadModel('PerformanceViewViaje');
		$this->LoadModel('PerformanceBsu');

		$posted = json_decode(base64_decode($this->params['named']['data']),true);

		// debug($posted);
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
		// debug($conditions);
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
		// debug($area);
		//NOTE Fixed needed
		$bsu_compact = ucwords(strtolower(implode(',',$area)));
		// debug($bsu_compact);

		if ( $mysqlstart == $mysqlend) {
			$conditionsPerformance['PerformanceViewViaje.fecha_guia'] = $mysqlstart;
		} else {
				$conditionsPerformance['PerformanceViewViaje.fecha_guia BETWEEN ? AND ?'] = array($mysqlstart,$mysqlend);
		}

		$conditionsPerformance['PerformanceViewViaje.area'] = $area;

		// var_dump(isset($conditions['performance_fraccion']));
		// echo("<br />");
		// var_dump($conditions['performance_fraccion']);
		// NOTE Filter Fraction TODO make the query
		if (isset($conditions['performance_fraccion']) AND $conditions['performance_fraccion'] != '') {

			if ($conditions['performance_fraccion'] == '1') {
				$conditionsPerformance['PerformanceViewViaje.id_fraccion'] = array('1','2','6');
			}
			if ($conditions['performance_fraccion'] == '2') {
				$conditionsPerformance['PerformanceViewViaje.id_fraccion NOT'] = array('1','2','6');
			}

		}


		debug($conditionsPerformance);

		$performanceViewViaje = $this->PerformanceViewViaje->find('all',array('conditions'=>$conditionsPerformance));
		$dashboard = array('inicio'=>$mysqlstart,'fin'=>$mysqlend,'bsu'=>$bsu_compact);

		// debug($performanceViewViaje);

// NOTE from hir work in this
		$performanceReferences = $performanceViewViaje;

		foreach ($performanceReferences as $key_performance => $data_performance) {
			# code...
			$performanceReferencesMod[$data_performance['PerformanceViewViaje']['id_cliente']][]['PerformanceViewViaje'] = $data_performance['PerformanceViewViaje'] ;

			$performanceReferencesIdx[$data_performance['PerformanceViewViaje']['id_cliente']] = $data_performance['PerformanceViewViaje']['cliente'] ;

			if (!empty($data_performance['PerformanceViewViaje']['fecha_guia']) AND !empty($data_performance['PerformanceViewViaje']['fecha_ingreso'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['end'][] = $data_performance['PerformanceViewViaje']['end'];
			}
			if (!empty($data_performance['PerformanceViewViaje']['recepcionEvidencias']) AND !empty($data_performance['PerformanceViewViaje']['fecha_guia'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['reception'][] = $data_performance['PerformanceViewViaje']['reception'];
			}

			if (!empty($data_performance['PerformanceViewViaje']['fecha_modifico']) AND !empty($data_performance['PerformanceViewViaje']['recepcionEvidencias']) ) {
				$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['aceptance'][] = $data_performance['PerformanceViewViaje']['aceptance'];
			}

			if (!empty($data_performance['PerformanceViewViaje']['entregaEvidenciasCliente']) AND !empty($data_performance['PerformanceViewViaje']['fecha_modifico'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['deliver'][] = $data_performance['PerformanceViewViaje']['deliver'];
			}

			if (!empty($data_performance['PerformanceViewViaje']['validacionEvidenciasCliente']) AND !empty($data_performance['PerformanceViewViaje']['entregaEvidenciasCliente'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['validation'][] = $data_performance['PerformanceViewViaje']['validation'];
			}

			if (!empty($data_performance['PerformanceViewViaje']['subtotal'])) {
				$performanceReferencesResume[$data_performance['PerformanceViewViaje']['id_cliente']]['amount'][$data_performance['PerformanceViewViaje']['num_guia']] = (float)$data_performance['PerformanceViewViaje']['subtotal'];
			}

		}

		// debug($performanceReferencesResume);
	if (isset($performanceReferencesResume)) {

		$generalResume = $performanceReferencesResume;
		$general['Dias de Cierre'] = null;
		$general['Dias de Recepcion'] = null;
		$general['Dias de Aceptado'] = null;
		$general['Dias de Entrega'] = null;
		$general['Dias de Validacion'] = null;
		$general['Cantidad'] = null;
		// NOTE generals
		$general['Cierre'] = null;
		$general['Recepcion'] = null;
		$general['Aceptado'] = null;
		$general['Entrega'] = null;
		$general['Validacion'] = null;
		$general['Monto'] = null;

		// debug($generalResume);

			foreach ( $generalResume as $resumenkey => $resumenvalue ) {
				# code...
				if (isset($resumenvalue['end']) == true and !empty($resumenvalue['end']) == true and ($resumenvalue['end']) != null ) {
					$general['Dias de Cierre'] += array_sum($resumenvalue['end']);
				}
				if (isset($resumenvalue['reception']) == true and !empty($resumenvalue['reception']) == true and ($resumenvalue['reception']) != null ) {
					$general['Dias de Recepcion'] += array_sum($resumenvalue['reception']);
				}
				if (isset($resumenvalue['aceptance']) == true and !empty($resumenvalue['aceptance']) == true and ($resumenvalue['aceptance']) != null ) {
					$general['Dias de Aceptado'] += array_sum($resumenvalue['aceptance']);
				}
				if (isset($resumenvalue['deliver']) == true and !empty($resumenvalue['deliver']) == true and ($resumenvalue['deliver']) != null ) {
					$general['Dias de Entrega'] += array_sum($resumenvalue['deliver']);
				}
				if (isset($resumenvalue['validation']) == true and !empty($resumenvalue['validation']) == true and ($resumenvalue['validation']) != null ) {
					$general['Dias de Validacion'] += array_sum($resumenvalue['validation']);
				}
				$general['Cantidad'] += count($resumenvalue['end']);
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

			}
			// debug($generalall);
			// debug($general);
		$general['Cierre'] = $generalall['end'];
		$general['Recepcion'] = $generalall['reception'];
		$general['Aceptado'] = $generalall['aceptance'];
		$general['Entrega'] = $generalall['deliver'];
		$general['Validacion'] = $generalall['validation'];

			foreach ($general as $key => $value) {
				# code...
				if ($key != 'Cantidad' and $key != 'Cierre' and $key != 'Recepcion' and $key != 'Aceptado' and $key != 'Entrega' and $key != 'Validacion') {
					if ($key == 'Dias de Cierre') {
						$result_array[$key] =
						number_format(
								money_format(
										'%i',
										(
											$value / $generalall['end']
										)
								), 2, '.', ','
						);
					} else if ($key == 'Dias de Recepcion') {
						$result_array[$key] =
						number_format(
								money_format(
										'%i',
										(
											$value / $generalall['reception']
										)
								), 2, '.', ','
						);
					} else if ($key == 'Dias de Aceptado') {
						$result_array[$key] =
						number_format(
								money_format(
										'%i',
										(
											$value / $generalall['aceptance']
										)
								), 2, '.', ','
						);
					} else if ($key == 'Dias de Entrega') {
						$result_array[$key] =
						number_format(
								money_format(
										'%i',
										(
											$value / $generalall['deliver']
										)
								), 2, '.', ','
						);
					} else if ($key == 'Dias de Validacion') {
						$result_array[$key] =
						number_format(
								money_format(
										'%i',
										(
											$value / $generalall['validation']
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
					} else {
						$result_array[$key] =
						number_format(
								money_format(
										'%i',
										(
											$value / $general['Cantidad']
										)
								), 2, '.', ','
						);
					}
				} else {
					$result_array[$key] = $value;
				}
			}
			// debug($result_array);
			$performanceGeneral = $result_array;
		}
			// $performanceGeneral = $general;
			// NOTE to concvert need drop al traces of a string
				$new_monto = str_replace(',','',$performanceGeneral['Monto']);
				$factor = ( (100) / $new_monto );

				foreach ($performanceReferencesIdx as $key_rfc => $comp_name) {
					$to_parsing[] = json_encode(array('name'=>$comp_name,'y'=>round((array_sum($performanceReferencesResume[$key_rfc]['amount']))*$factor,2),'drilldown'=>$key_rfc), JSON_PRETTY_PRINT);
					foreach ($performanceReferencesResume[$key_rfc]['amount'] as $key_reference => $amount_value) {
						$data_x[$key_rfc][$key_reference] = '["'.$key_reference.'",'. $amount_value * $factor . ']' ;
						$performanceReferencesResume[$key_rfc]['amount'][$key_reference] = $amount_value * $factor;
					}

					$data='['.str_replace('}',']',str_replace('{','[',str_replace(':',',',str_replace(',','],[',json_encode($performanceReferencesResume[$key_rfc]['amount']))))).']';
					$init_parsing[$key_rfc] = json_encode(array('name'=>$comp_name,'id'=>$key_rfc,'data'=>"{$data}"), JSON_FORCE_OBJECT);
				}

				$in_parsing = str_replace(']"',']',str_replace('"[','[',str_replace('\"','"',$init_parsing)));
				$json_parsing_level_one = implode(',',$to_parsing);
				$json_parsing_level_two = implode(',',$in_parsing);



			if ( isset($xport) and $xport != null)  {

				debug($xport);
				  $data = array(
			      array("firstname" => "Mary", "lastname" => "Johnson", "age" => 25),
			      array("firstname" => "Amanda", "lastname" => "Miller", "age" => 18),
			      array("firstname" => "James", "lastname" => "Brown", "age" => 31),
			      array("firstname" => "Patricia", "lastname" => "Williams", "age" => 7),
			      array("firstname" => "Michael", "lastname" => "Davis", "age" => 43),
			      array("firstname" => "Sarah", "lastname" => "Miller", "age" => 24),
			      array("firstname" => "Patrick", "lastname" => "Miller", "age" => 27)
			    );
					csv($data);

			} else {

			$this->set(compact('performanceViewViaje','performanceReferencesMod','performanceReferencesIdx','dashboard','performanceReferencesResume','performanceGeneral','subgeneral','json_parsing_level_one','json_parsing_level_two'));

			// NOTE set the response output for an ajax call
			Configure::write('debug', 0);
			$this->autoLayout = false;
		}

	} // NOTE End get()

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
