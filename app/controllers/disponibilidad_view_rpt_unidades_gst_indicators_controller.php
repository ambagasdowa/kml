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
class DisponibilidadViewRptUnidadesGstIndicatorsController extends AppController {

	var $name = 'DisponibilidadViewRptUnidadesGstIndicators';
	// var $uses = array('DisponibilidadViewStatusGstIndicator');



	function get() {

		Configure::write('debug',2);

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
				if ( isset($chars[1]) && $chars[1] == 'DisponibilidadViewRptUnidadesGstIndicator' && $postvalue['value'] != '') {

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
		// debug($add_conditions);
		//
		// exit();


		// $conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.periodo'] = $add_conditions['periodo'];
		$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.id_area'] = $add_conditions['id_area'];
		$conditionsTf['DisponibilidadViewRptGroupGstIndicator.id_area'] = $add_conditions['id_area'];
		// $conditionsBl['RendViewFullGstCoreIndicator.id'] = 10;

		$disponibilidadViewRptUnidadesGstIndicators = $this->DisponibilidadViewRptUnidadesGstIndicator->find('all',array('conditions'=>$conditionsBl));

		$this->LoadModel('DisponibilidadViewStatusGstIndicator');

		$this->LoadModel('DisponibilidadViewRptGroupGstIndicator');

		$disponibilidadViewStatusGstIndicators = $this->DisponibilidadViewStatusGstIndicator->find('list',array('fields'=>array('id_status','nombre')));

		$disponibilidadViewRptGroupGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all',array('conditions'=>$conditionsTf));
$json_parsing_lv_one = null;
		$disp_grp = $disponibilidadViewRptGroupGstIndicators ;

		foreach ($disp_grp as $key => $data) {
			// code...
			// debug($data);
					$json_parsing_lv_one .= json_encode(
																		array(
																						 'name'=>$data['DisponibilidadViewRptGroupGstIndicator']['estatus']
																						,'y'=>round($data['DisponibilidadViewRptGroupGstIndicator']['unidades'],2)
																						// ,'drilldown'=>$key_viajes
																						,'drilldown'=>null
																				 )
																						, JSON_PRETTY_PRINT
											);

		}

		$json_parsing_level_one = implode('},{',explode('}{',$json_parsing_lv_one));


		// 	$json_parsing_level_two[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] = json_encode(
		// 																				array(
		// 																							'name'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
		// 																							,'id'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
		// 																							,'data'=>"{$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]}"
		// 																						 )
		// 																			 ,JSON_FORCE_OBJECT
		// 																			);
		// }

		//
		// 		$json_parsing_lv_one .= json_encode(
		// 															array(
		// 																			 'name'=>$key_viajes
		// 																			,'y'=>round((array_sum($values_viajes)),2)
		// 																			// ,'drilldown'=>$key_viajes
		// 																			,'drilldown'=>null
		// 																	 )
		// 																			, JSON_PRETTY_PRINT
		// 								);
		// }


	if (
				$this->Auth->user('group_id') == 7
				// OR
				// $this->Auth->user('group_id') == 1
			) {
			$user_mod = true;
	} else {
			$user_mod = false;
	}
	// $user_mod = false;
	// $user_mod = true;
	$this->set(compact(
											  'disponibilidadViewRptUnidadesGstIndicators'
											 ,'disponibilidadViewStatusGstIndicators'
											 ,'disponibilidadViewRptGroupGstIndicators'
											 ,'user_mod'
											// ,'sums_kms'
											// ,'sums_diesel'
											// ,'sums_rendimiento'
											// ,'sums_viajes'
											,'json_parsing_level_one'
										)
						);

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}



	function index() {
		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->LoadModel('ProjectionsViewFraction');

		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','name')));
		$operacion = $this->ProjectionsViewFraction->find('list',array('fields'=>array('id','desc_producto')));
		// debug($bssus);
		//
		$this->RendViewFullGstCoreIndicator->recursive = 0;
		$this->set('rendViewFullGstCoreIndicators', $this->paginate());
		$this->set(compact('bssus','operacion'));

		// $this->DisponibilidadViewRptUnidadesGstIndicator->recursive = 0;
		// $this->set('disponibilidadViewRptUnidadesstIndicators', $this->paginate());
	}



	function view($id = null) {
		Configure::write('debug',2);

		$this->LoadModel('DisponibilidadViewHistoricalGstIndicator');
		// debug($this->params);
		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);
		// $conditions = array();
		// $add_conditions = array();
		// foreach ($posted as $keys => $postvalue) {
		//
		// 	if ($keys > 0 ) {
		// 		$content = $postvalue['name'];
		// 		// debug($postvalue['value']);
		// 		$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		// 		// debug($chars);
		// 		if ( isset($chars[1]) && $chars[1] == 'DisponibilidadViewHistoricalGstIndicator' && $postvalue['value'] != '') {
		//
		// 			// if ($chars[2] == 'Funcionario' && $postvalue['value'] != '') {
		// 			// 	// code...
		// 			// }
		//
		// 			$add_conditions[$chars[2]] = $postvalue['value'];
		// 			$conditions[$chars[2]] = $postvalue['value'];
		// 		}
		// 		// if(isset($chars[2])) {
		// 		// 	$conditions[$chars[2]] = $postvalue['value'];
		// 		// }
		// 	}
		// }

		$conditions['DisponibilidadViewHistoricalGstIndicator.unidad'] = $posted['unidad'];
		// debug($conditions);
		$disponibilidadViewHistoricalGstIndicators = $this->DisponibilidadViewHistoricalGstIndicator->find('all',array('conditions'=>$conditions));

		$json_parsing_lv_one = null;
				$disp_hist = $disponibilidadViewHistoricalGstIndicators ;

				foreach ($disp_hist as $key => $data) {
					// code...
					// debug($data);
							$json_parsing_lv_one .= json_encode(
																				array(
																								 'name'=>$data['DisponibilidadViewHistoricalGstIndicator']['estatus']
																								,'y'=>round($data['DisponibilidadViewHistoricalGstIndicator']['compromiso'],2)
																								// ,'drilldown'=>$key_viajes
																								,'drilldown'=>null
																						 )
																								, JSON_PRETTY_PRINT
													);

				}

				$json_parsing_level_one = implode('},{',explode('}{',$json_parsing_lv_one));
// DEBUG:
// debug($json_parsing_level_one);
		$this->set(compact('disponibilidadViewHistoricalGstIndicators','json_parsing_level_one'));

		// debug($disponibilidadViewHistoricalGstIndicators);

		//
		// exit();
		// if (!$id) {
		// 	$this->Session->setFlash(__('Invalid disponibilidad view rpt unidades gst indicator', true));
		// 	$this->redirect(array('action' => 'index'));
		// }
		// $this->set('disponibilidadViewRptUnidadesGstIndicator', $this->DisponibilidadViewRptUnidadesGstIndicator->read(null, $id));

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	} //end view




	function add() {

		Configure::write('debug', 1);
		// NOTE check like if $this->data
		debug($this->params);
		// exit();

	if (!empty($this->params['named']['save']) && $this->params['named']['save'] != null) {

		debug($this->params['named']['save']);

		$posted['DisponibilidadTblUnidadesGstIndicator'] = json_decode(base64_decode($this->params['named']['save']),true);
		debug($posted);
		$conditions = $posted;
		//
		// foreach ($posted as $keys => $postvalue) {
		//
		// 	if ($keys > 0 ) {
		// 		$content = $postvalue['name'];
		// 		$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		// 		if ( $postvalue['value'] != "") {
		// 			$conditions[$chars[2]] = $postvalue['value'];
		// 		}
		// 	}
		//
		// }

		// set the search array
		// $dates = array('entregaFacturaCliente','aprobacionFactura','fechaPromesaPago','fechaPago');
		//
		// foreach ($conditions as $indx => $perData) {
		// 	if ( in_array($indx,$dates) == true ) {
		// 		if ($perData != "" OR $perData != null) {
		// 			$dates_conv = new DateTime($perData);
		// 			$conditions[$indx] = $dates_conv->format('Y-m-d');
		// 		}
		// 	}
		// }
debug($conditions);
// exit();
}

if (!empty($conditions)) {
	$this->LoadModel('DisponibilidadTblUnidadesGstIndicator');
	$this->DisponibilidadTblUnidadesGstIndicator->create();
	if ($this->DisponibilidadTblUnidadesGstIndicator->save($conditions)) {
		// $this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator has been saved', true));
		// $this->redirect(array('action' => 'index'));
	} else {
		// $this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator could not be saved. Please, try again.', true));
	}
}
		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid disponibilidad view rpt unidades gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DisponibilidadViewRptUnidadesGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad view rpt unidades gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad view rpt unidades gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DisponibilidadViewRptUnidadesGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for disponibilidad view rpt unidades gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DisponibilidadViewRptUnidadesGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Disponibilidad view rpt unidades gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Disponibilidad view rpt unidades gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}