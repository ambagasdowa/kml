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
class AddenumViewAlbaranRelationsController extends AppController {

	var $name = 'AddenumViewAlbaranRelations';



		function date_convert($date) {
			//1. Transform request parameters to MySQL datetime format.
			$date_return = null;
			$date_init = new DateTime($date);
			$start =  $date_init->format('Y-m-d');
			return $start;
		}

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

			debug($conditions);
			// debug(isset($add_conditions['id_tipo_operacion']));
			exit();

			// //2. Get the events corresponding to the time range
			// $conditions = array ('Calendar.start BETWEEN ? AND ?'=> array ($mysqlstart,$mysqlend));
			// $events = $this->Calendar->find('all', array ('conditions' => $conditions));
			//

			debug($this->date_convert($add_conditions['dateini']));

			if (isset($add_conditions['dateini']) && isset($add_conditions['dateend'])){
				// code for both date

				$conditionsBl = array('RendViewFullGstCoreIndicator.fecha BETWEEN ? AND ?'=> array ($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));

			} elseif (isset($add_conditions['dateini']) || isset($add_conditions['dateend'])){

					if( isset($add_conditions['dateini']) ) {
						$conditionsBl['RendViewFullGstCoreIndicator.fecha'] = $this->date_convert($add_conditions['dateini']);
					} else {
						$conditionsBl['RendViewFullGstCoreIndicator.fecha'] = $this->date_convert($add_conditions['dateend']);
					}
			} else {
				$add_conditions['dateini'] = null;
				$add_conditions['dateend'] = null;
				$conditionsBl['RendViewFullGstCoreIndicator.fecha'] = $this->date_convert(date('Y-m-d'));
			}

			if(isset($add_conditions['id_tipo_operacion'])){
				$conditionsBl['RendViewFullGstCoreIndicator.id_tipo_operacion'] = $add_conditions['id_tipo_operacion'];
			}
			// $conditionsBl['RendViewFullGstCoreIndicator.periodo'] = $add_conditions['periodo'];
			$conditionsBl['RendViewFullGstCoreIndicator.id_area'] = $add_conditions['id_area'];

			// $conditionsBl['RendViewFullGstCoreIndicator.id'] = 10;

			debug($conditionsBl);

			$rendViewFullGstCoreIndicators = $this->RendViewFullGstCoreIndicator->find('all',array('conditions'=>$conditionsBl));

			$rendViewFullGstCoreIndicatorsx = $rendViewFullGstCoreIndicators;
			// debug($rendViewFullGstCoreIndicators);

			$sum_kms = $sum_diesel = $sum_viajes = $sum_rendimiento = array();
			$rsum_origen = $rsum_destino = $rsum_kms = $rsum_diesel = $rsum_viajes = $rsum_rendimiento = array();

			foreach ($rendViewFullGstCoreIndicators as $key => $rendViewFullGstCoreIndicator) {
				// debug($key);
				if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']]) ) {
					$sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']] = null;
				}
				if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']]) ) {
					$sum_diesel[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']] = null;
				}
				if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']]) ) {
					$sum_rendimiento[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']] = null;
				}
				if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']]) ) {
					$sum_viajes[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']] = null;
				}


				$sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['kms'];
				$sum_diesel[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['diesel'];
				$sum_rendimiento[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['rendimiento'];
				$sum_viajes[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viajes'];
				$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']] = $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viaje'].','.$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['rendimiento'];
				// debug($data);
				$json_parsing_level_two[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']][] = json_encode(
																							array(
																										'name'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']
																										,'id'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']
																										,'data'=>"{$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tipoOperacion']]}"
																									 )
																						 ,JSON_FORCE_OBJECT
																						);

				//NOTE Start Route table data
				if ( !isset($rsum_kms[$rendViewFullGstCoreIndicators['RendViewFullGstCoreIndicator']['route']]) ) {
					$rsum_origen[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
				}
				if ( !isset($rsum_kms[$rendViewFullGstCoreIndicators['RendViewFullGstCoreIndicator']['route']]) ) {
					$rsum_destino[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
				}
				if ( !isset($rsum_kms[$rendViewFullGstCoreIndicators['RendViewFullGstCoreIndicator']['route']]) ) {
					$rsum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
				}
				if ( !isset($rsum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]) ) {
					$rsum_diesel[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
				}
				if ( !isset($rsum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]) ) {
					$rsum_rendimiento[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
				}
				if ( !isset($rsum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]) ) {
					$rsum_viajes[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
				}

				$rsum_origen[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['origen'];
				$rsum_destino[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['destino'];

				$rsum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['kms'];
				$rsum_diesel[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['diesel'];
				$rsum_rendimiento[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['rendimiento'];
				$rsum_viajes[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viajes'];
				$rdata[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viaje'].','.$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['rendimiento'];
				// debug($data);
				// $rjson_parsing_level_two[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] = json_encode(
				// 																			array(
				// 																						'name'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
				// 																						,'id'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
				// 																						,'data'=>"{$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]}"
				// 																					 )
				// 																		 ,JSON_FORCE_OBJECT
				// 																		);
			}

			// debug($rsum_origen);
			// debug($rsum_destino);

			// debug($json_parsing_level_two);

			foreach ($sum_kms as $key_kms => $values_kms) {
					$sums_kms[$key_kms]= array_sum($values_kms);
			}

			foreach ($sum_diesel as $key_diesel => $values_diesel) {
					$sums_diesel[$key_diesel]= array_sum($values_diesel);
			}

			$json_parsing_lv_one = null;
			foreach ($sum_viajes as $key_viajes => $values_viajes) {
					$sums_viajes[$key_viajes]= array_sum($values_viajes);

					$json_parsing_lv_one .= json_encode(
																		array(
																						 'name'=>$key_viajes
																						// ,'y'=>round((array_sum($values_viajes)),2)
																						,'y'=>round(($sums_kms[$key_viajes] / $sums_diesel[$key_viajes]),2)
																						// ,'drilldown'=>$key_viajes
																						,'drilldown'=>null
																				 )
																						, JSON_PRETTY_PRINT
											);
			}

			$json_parsing_lv_one .= json_encode(
																				array(
																								 'name'=>'GST'
																								// ,'y'=>round((array_sum($values_viajes)),2)
																								,'y'=>round(array_sum($sums_kms)/array_sum($sums_diesel),2)
																								// ,'drilldown'=>$key_viajes
																								,'drilldown'=>null
																						 )
																								, JSON_PRETTY_PRINT
													);

			// debug();

			$json_parsing_level_one = implode('},{',explode('}{',$json_parsing_lv_one));

			// debug($json_parsing_level_one);
			// debug(array_sum($sums_kms));
			// debug(array_sum($sums_diesel));

			// debug();

			foreach ($sum_rendimiento as $key_rendimiento => $values_rendimiento) {
				// $sums_rendimiento[$key_rendimiento]= round(array_sum($values_rendimiento) /*/ $sums_viajes[$key_rendimiento]*/,2);
				$sums_rendimiento[$key_rendimiento]= round( $sums_kms[$key_rendimiento] / $sums_diesel[$key_rendimiento],2);
				$sums_rendimiento_af[$key_rendimiento]= round(array_sum($values_rendimiento),2);
			}

			// debug($json_parsing_level_two);

			foreach ($rsum_kms as $rkey_kms => $rvalues_kms) {
					$rsums_kms[$rkey_kms]= array_sum($rvalues_kms);
			}

			foreach ($rsum_diesel as $rkey_diesel => $rvalues_diesel) {
					$rsums_diesel[$rkey_diesel]= array_sum($rvalues_diesel);
			}

			// $json_parsing_lv_one = null;
			foreach ($rsum_viajes as $rkey_viajes => $rvalues_viajes) {
					$rsums_viajes[$rkey_viajes]= array_sum($rvalues_viajes);

					$rjson_parsing_lv_one .= json_encode(
																		array(
																						 'name'=>$rkey_viajes
																						,'y'=>round((array_sum($rvalues_viajes)),2)
																						// ,'drilldown'=>$key_viajes
																						,'drilldown'=>null
																				 )
																						, JSON_PRETTY_PRINT
											);
			}

			$rjson_parsing_level_one = implode('},{',explode('}{',$rjson_parsing_lv_one));

			// debug($rjson_parsing_level_one);

			foreach ($rsum_rendimiento as $rkey_rendimiento => $rvalues_rendimiento) {
				$rsums_rendimiento[$rkey_rendimiento]= round(array_sum($rvalues_rendimiento) / $rsums_viajes[$rkey_rendimiento],2);
				$rsums_rendimiento_af[$rkey_rendimiento]= round(array_sum($rvalues_rendimiento),2);
			}



		$this->set(compact(
												 'rendViewFullGstCoreIndicators'
												,'sums_kms'
												,'sums_diesel'
												,'sums_rendimiento'
												,'sums_viajes'
												,'json_parsing_level_one'
												// route data
												// ,'rsum_origen'
												// ,'rsum_destino'
												// ,'rsums_kms'
												// ,'rsums_diesel'
												// ,'rsums_rendimiento'
												// ,'rsums_viajes'
												// ,'rjson_parsing_level_one'
											)
							);

			// NOTE set the response output for an ajax call
			Configure::write('debug', 0);
			$this->autoLayout = false;
		}



	function index() {
		$this->AddenumViewAlbaranRelation->recursive = 0;
		$this->set('addenumViewAlbaranRelations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid addenum view albaran relation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('addenumViewAlbaranRelation', $this->AddenumViewAlbaranRelation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AddenumViewAlbaranRelation->create();
			if ($this->AddenumViewAlbaranRelation->save($this->data)) {
				$this->Session->setFlash(__('The addenum view albaran relation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The addenum view albaran relation could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid addenum view albaran relation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AddenumViewAlbaranRelation->save($this->data)) {
				$this->Session->setFlash(__('The addenum view albaran relation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The addenum view albaran relation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AddenumViewAlbaranRelation->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for addenum view albaran relation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AddenumViewAlbaranRelation->delete($id)) {
			$this->Session->setFlash(__('Addenum view albaran relation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Addenum view albaran relation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
