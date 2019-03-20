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
class ResumenViewMontofacturadoMensualGstIndicatorsController extends AppController {

	var $name = 'ResumenViewMontofacturadoMensualGstIndicators';

	function get (){
		Configure::write('debug',2);

		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);
		// exit();
		$conditions = array();
		$add_conditions = array();
		foreach ($posted as $keys => $postvalue) {

			if ($keys > 0 ) {
				$content = $postvalue['name'];
				// debug($postvalue['value']);
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				// debug($chars);
				if ( isset($chars[1]) && $chars[1] == 'ResumenViewMontofacturadoMensualGstIndicators' && $postvalue['value'] != '') {
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
			$model_id = $add_conditions['model_id'] ;

			$models[0][0] = 'ResumenViewMontofacturadoMensualGstIndicator';
			$models[0][1] = 'ResumenViewMontofacturadoUnidadGstIndicator';
			$models[1][0] = 'ResumenViewViajesMensualGstIndicator';
			$models[1][1] = 'ResumenViewViajesMensualpoblacionGstIndicator';

			$fields[0][0][0] = 'area';
			$fields[0][0][1] = 'total';
			$fields[0][0][2] = 'area';

			$fields[1][1][0] = 'TipoViaje';
			$fields[1][1][1] = 'viajes';
			$fields[1][1][2] = 'area';

			$fieldsdetail[0][0][0] = 'area';
			$fieldsdetail[0][0][1] = 'unidad';
			$fieldsdetail[0][0][2] = 'total';

			$fieldsdetail[1][1][0] = 'area';
			$fieldsdetail[1][1][1] = 'poblacion';
			$fieldsdetail[1][1][2] = 'viajes';


			$this->LoadModel('ResumenViewMontofacturadoMensualGstIndicator');
			$this->LoadModel('ResumenViewMontofacturadoUnidadGstIndicator');
			$this->LoadModel('ResumenViewViajesMensualGstIndicator');
			$this->LoadModel('ResumenViewViajesMensualpoblacionGstIndicator');

			$conditions = array();
			foreach ($models[$model_id] as $key => $modelo) {
				$conditions[$model_id][$key][$modelo.'.id_area'] = $add_conditions['id_area'];
				$conditions[$model_id][$key][$modelo.'.periodo'] = $add_conditions['periodo'];
			}

		// debug($conditions);
		$resumenViewGrands = $this->$models[$model_id][0]->find('all',array('conditions'=>$conditions[$model_id][0]));
		$resumenViewDetails = $this->$models[$model_id][1]->find('all',array('conditions'=>$conditions[$model_id][1]));

		// debug
		// debug($resumenViewGrands);
		// debug($resumenViewDetails);
// exit();
// debug($models[$model_id][0]);
// debug($fields[$model_id]);
// debug($fields[$model_id][$model_id][0]);
// debug($fields[$model_id][$model_id][1]);
// NOTE on LEVEL 2
		$json_parsing_lv_one = null;

				$disp_grp = $resumenViewGrands ;
				foreach ($disp_grp as $key => $data) {
							$json_parsing_lv_one .= json_encode(
																				array(
																								 'name'=>$data[$models[$model_id][0]][$fields[$model_id][$model_id][0]]
																								,'y'=>round($data[$models[$model_id][0]][$fields[$model_id][$model_id][1]],2)
																								// ,'drilldown'=>$key_viajes
																								,'drilldown'=>$data[$models[$model_id][0]][$fields[$model_id][$model_id][2]]
																						 )
																								, JSON_PRETTY_PRINT
													);
				}
		$json_parsing_level_one = implode('},{',explode('}{',$json_parsing_lv_one));

			// json_parsing_level_two

			$disp_detail = $resumenViewDetails ;

			foreach ($disp_detail as $key => $value) {

				$key_a = $value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][0]];
				// if ($model_id == 0) {
					$getJson[$key_a][$models[$model_id][1]]['name'] = $value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][0]] ;
					$getJson[$key_a][$models[$model_id][1]]['id'] = $value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][0]] ;
					$getJson[$key_a][$models[$model_id][1]]['data'][] = '"'.$value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][1]].'"'.','.round($value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][2]],2) ;
				// } elseif($model_id == 1) {
				// 	$getJson[$key_a][$models[$model_id][1]]['name'] = $value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][0]] ;
				// 	$getJson[$key_a][$models[$model_id][1]]['id'] = $value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][0]] ;
				// 	$getJson[$key_a][$models[$model_id][1]]['data'][] = '"'.$value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][1]].'"'.','.round($value[$models[$model_id][1]][$fieldsdetail[$model_id][$model_id][2]],2) ;
				// }
			}
			// debug($getJson);

			foreach ($getJson as $jkey => $son) {
				// debug($jkey);
				foreach ($son as $nkey => $data) {
					// debug($nkey);
					$code[$jkey]['name'] =  $son[$nkey]['name'];
					$code[$jkey]['id'] =  $son[$nkey]['id'];
					$code[$jkey]['data'] =  '['. implode( '],[' , $son[$nkey]['data'] ) .']';
				}
			}

			foreach ($code as $udn => $detail) {
				$json_code = json_encode(
													array(
																 'name'=>$udn
																,'id'=>$udn
																,'data'=>'['.$detail['data'].']'
															 )
												 ,JSON_FORCE_OBJECT
					 );
			}

//
			// debug();
			$json_parsing_level_two = str_replace('\"','"',str_replace(']]"',']]',str_replace('"[[','[[',$json_code)));


// NOTE on LEVEL 2
			// debug(str_replace("\"data\":\"","\"data\":[",$json_code));
		if ($model_id == 0 ) {
			// code...
			$description = 'Click en las columnas para ver el detalle del Monto Facturado';
			$export = 'Monto Facturado';
		} else {
			$description = 'Click en las columnas para ver el detalle de los Viajes';
			$export = 'Viajes';
		}



			// 	 json_encode(
			// 																				array(
			// 																							'name'=>area
			// 																							,'id'=>area
			// // data => unidad,total
			// 																							,'data'=>"{$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]}"
			// 																						 )
			// 																			 ,JSON_FORCE_OBJECT
			// 	 );




		$this->set(compact('resumenViewGrands','resumenViewDetails','json_parsing_level_one','json_parsing_level_two','model_id','description','export'));
		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	} // end get function



	function index() {
		// $this->ResumenViewMontofacturadoMensualGstIndicator->recursive = 0;
		// $this->set('resumenViewMontofacturadoMensualGstIndicators', $this->paginate());
		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->LoadModel('ProjectionsViewFraction');

		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','name')));
		$operacion = $this->ProjectionsViewFraction->find('list',array('fields'=>array('id','desc_producto')));
		// debug($bssus);
		// add periodo
		//
		// $this->RendViewFullGstCoreIndicator->recursive = 0;
		// $this->set('rendViewFullGstCoreIndicators', $this->paginate());
		$this->set(compact('bssus','operacion'));

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resumenViewMontofacturadoMensualGstIndicator', $this->ResumenViewMontofacturadoMensualGstIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ResumenViewMontofacturadoMensualGstIndicator->create();
			if ($this->ResumenViewMontofacturadoMensualGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumenViewMontofacturadoMensualGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ResumenViewMontofacturadoMensualGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumenViewMontofacturadoMensualGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Resumen view montofacturado mensual gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resumen view montofacturado mensual gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
