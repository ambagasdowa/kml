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
		// debug(isset($add_conditions['id_tipo_operacion']));
		// exit();
		if(isset($add_conditions['id_tipo_operacion'])){
			$conditionsBl['RendViewFullGstCoreIndicator.id_tipo_operacion'] = $add_conditions['id_tipo_operacion'];
		}
		$conditionsBl['RendViewFullGstCoreIndicator.periodo'] = $add_conditions['periodo'];
		$conditionsBl['RendViewFullGstCoreIndicator.id_area'] = $add_conditions['id_area'];

		// $conditionsBl['RendViewFullGstCoreIndicator.id'] = 10;

		$rendViewFullGstCoreIndicators = $this->RendViewFullGstCoreIndicator->find('all',array('conditions'=>$conditionsBl));


		// debug($rendViewFullGstCoreIndicators);

		$sum_kms = $sum_diesel = $sum_viajes = $sum_rendimiento = array();

		foreach ($rendViewFullGstCoreIndicators as $key => $rendViewFullGstCoreIndicator) {
			// debug($key);
			if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]) ) {
				$sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
			}
			if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]) ) {
				$sum_diesel[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
			}
			if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]) ) {
				$sum_rendimiento[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
			}
			if ( !isset($sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]) ) {
				$sum_viajes[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = null;
			}

			$sum_kms[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['kms'];
			$sum_diesel[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['diesel'];
			$sum_rendimiento[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['rendimiento'];
			$sum_viajes[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] += $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viajes'];
			$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']] = $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viaje'].','.$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['rendimiento'];
			// debug($data);
			$json_parsing_level_two[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] = json_encode(
																						array(
																									'name'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
																									,'id'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
																									,'data'=>"{$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]}"
																								 )
																					 ,JSON_FORCE_OBJECT
																					);
		}


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
																					,'y'=>round((array_sum($values_viajes)),2)
																					// ,'drilldown'=>$key_viajes
																					,'drilldown'=>null
																			 )
																					, JSON_PRETTY_PRINT
										);
		}

		$json_parsing_level_one = implode('},{',explode('}{',$json_parsing_lv_one));

		// debug($json_parsing_level_one);

		foreach ($sum_rendimiento as $key_rendimiento => $values_rendimiento) {
			$sums_rendimiento[$key_rendimiento]= round(array_sum($values_rendimiento) / $sums_viajes[$key_rendimiento],2);
			$sums_rendimiento_af[$key_rendimiento]= round(array_sum($values_rendimiento),2);
		}



	$this->set(compact(
											 'rendViewFullGstCoreIndicators'
											,'sums_kms'
											,'sums_diesel'
											,'sums_rendimiento'
											,'sums_viajes'
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


		// viajes despa no documentados
		// date , operacion , area
		// resumen , sin_documento / total de viajes ,  | promedio acumulado
		// rendimiento
		// disponibilidad

// vales de combustibles?

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
