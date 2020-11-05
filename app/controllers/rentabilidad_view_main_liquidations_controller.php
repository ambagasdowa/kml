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
class RentabilidadViewMainLiquidationsController extends AppController {

	var $name = 'RentabilidadViewMainLiquidations';


#	function beforeFilter() {
#	 parent::beforeFilter();
#	 $this->Auth->allow(array('index','add','*'));
#  }
		function date_convert($date) {
				//1. Transform request parameters to MySQL datetime format.
				$date_return = null;
				$date_init = new DateTime($date);
				$start =  $date_init->format('Y-m-d');
				return $start;
		}

		function get() {

			// Configure::write('debug',0);
			// App::uses('Xml', 'Lib');

			$posted = json_decode(base64_decode($this->params['named']['data']),true);
	//	 debug($posted);
			// exit();

			$this->LoadModel('ProjectionsViewBussinessUnit');
			$this->ProjectionsViewBussinessUnit->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
//			$this->loadModel('RentabilidadViewMainLiquidation');

			$conditions = array();
			$add_conditions = array();
			// exit();
			foreach ( $posted as $keys => $postvalue ) {
				 if ( $keys > 0 ) {
				$content = $postvalue['name'];
				// debug($postvalue['value']);
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				// debug($chars);
				if ( isset($chars[1]) && $chars[1] == 'RentabilidadViewMainLiquidations' && $postvalue['value'] != '') {
					$add_conditions[$chars[2]] = $postvalue['value'];
					$conditions[$chars[2]] = $postvalue['value'];
						}
					}
				}

	//			 debug($conditions);
	//			 debug($add_conditions);
//	 exit();
				// debug($this->date_convert($add_conditions['dateini']));

				if (isset($add_conditions['dateini']) && isset($add_conditions['dateend'])){
				// code for both date

				 $conditionsBl = array('RentabilidadViewMainLiquidation.fecha_liquidacion BETWEEN ? AND ?'=> array ($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));

					} elseif (isset($add_conditions['dateini']) || isset($add_conditions['dateend'])){
						if( isset($add_conditions['dateini']) ) {
							$conditionsBl['RentabilidadViewMainLiquidation.fecha_liquidacion'] = $this->date_convert($add_conditions['dateini']);
						} else {
							$conditionsBl['RentabilidadViewMainLiquidation.fecha_liquidacion'] = $this->date_convert($add_conditions['dateend']);
						}
					} else {
						// $add_conditions['dateini'] = null;
						// $add_conditions['dateend'] = null;
						$conditionsBl['RentabilidadViewMainLiquidation.fecha_liquidacion'] = $this->date_convert(date('Y-m-d'));
					}


					if( isset($add_conditions['bsu']) ){
					//	$bsu = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id_area','tname')));
					//	$conditionsBl['RentabilidadViewMainLiquidation.UnidadNegocio'] = $bsu[$add_conditions['bsu']];
						$conditionsBl['RentabilidadViewMainLiquidation.id_area'] = $add_conditions['bsu'];
						// prepare a response
				//	} elseif ( !isset($add_conditions['bsu']) && !isset($add_conditions['liquidacion']))  {
						// $add_conditions['bsu'] = null;
				/*		$message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
									Debe indicar una Unidad de Negocio y un Numero de Liquidacion
								</div>';
						// $conditionsBl = null; //WARNING if choose lote then reset all other conditions
						$this->set(compact('message')); //exit();
						return null;
				 */	}


					if(isset($add_conditions['liquidacion'])){
					///	$conditionsBl = null; //WARNING if choose lote then reset all other conditions
						$conditionsBl['RentabilidadViewMainLiquidation.liquidacion'] = $add_conditions['liquidacion'];
					}

					if ( isset($add_conditions['Unidad'])  ) {
				//		$conditionsBl = null;
						$conditionsBl['RentabilidadViewMainLiquidation.Unidad'] = $add_conditions['Unidad'];
					}

				 // if ( !isset($conditionsBL) || count($conditionsBL) == 0 /*|| empty($conditionsBL)*/ ) {
					// 	$message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
					// 						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					// 							<span aria-hidden="true">&times;</span>
					// 						</button>
					// 							Debe indicar un rango de fechas y Unidad de Negocio o un Numero de Lote
					// 						</div>';
					// 	$this->set(compact('message')); //exit();
					// 	return null;
					// }


//					if($_SESSION['Auth']['User']['group_id'] == 16){
//						$conditionsBl['RentabilidadViewMainLiquidation.VendId'] = $_SESSION['Auth']['User']['username'];
//						$conditionsBl['RentabilidadViewMainLiquidation.isview'] = 1;
//					}
					// Configure::write('debug',2);


//	 debug($message);debug($conditionsBl);exit();

					$rentabilidadViewMainLiquidation = $this->RentabilidadViewMainLiquidation->find('all',array('conditions'=>$conditionsBl));
					$rentabilidadViewMainLiquidations = null;
					debug($conditionsBl);
//					debug($rentabilidadViewMainLiquidations);
			// NOTE || WARNING
	//		exit();
				foreach ($rentabilidadViewMainLiquidation as $main => $liquidation) {
//					debug($main);
					//					debug($liquidation);
					$rentabilidadViewMainLiquidations[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ][ $liquidation['RentabilidadViewMainLiquidation']['liquidacion'] ] = $liquidation;
					
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['viajes'] += $liquidation['RentabilidadViewMainLiquidation']['viajes'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['DuracionViaje'] += $liquidation['RentabilidadViewMainLiquidation']['DuracionViaje'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['KmsCaminoLleno'] += $liquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['KmsCamionVacio'] += $liquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio'];

					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['IngresoTotalRuta'] += $liquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['Combustible'] += $liquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['Casetas'] += $liquidation['RentabilidadViewMainLiquidation']['CASETAS'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['ConceptosSueldo'] += $liquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['Otros'] += $liquidation['RentabilidadViewMainLiquidation']['OTROS'];

					
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['CostoDirectoViaje'] += $liquidation['RentabilidadViewMainLiquidation']['CostoDirectoViaje'];			
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['IngresoTotalRuta'] += $liquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta'];
					
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['qtyCombustible'] += $liquidation['RentabilidadViewMainLiquidation']['qtyCombustible'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['rendimiento_reseteo'] += $liquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo'];
					$sum_data[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ]['RendViaje'] += $liquidation['RentabilidadViewMainLiquidation']['RendViaje'];
		 



					$counting[ $liquidation['RentabilidadViewMainLiquidation']['Unidad'] ] += 1;
					
				}

				$tds = max($counting);

				//NOTE from hir work
					debug($rentabilidadViewMainLiquidations);
					debug($counting);
					debug($sum_data);
				//	debug(max($counting));
		/*			
			foreach ($counting as unit => $counts) {
				
			}	
		 */


					if (!isset($rentabilidadViewMainLiquidations) || count($rentabilidadViewMainLiquidations) == 0) {
						$message = '<div class="alert alert-success alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
										</button>
										<strong>No se encontraron Registros Asociados </strong>
								</div>';
						$this->set(compact('message')); //exit();
						return null;
					}

					/*
					$app = basename(ROOT);
					$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/";
					$url = 'app/webroot/files/providers_sat/';
					$route = $path.$url;
					*/

					// if (!isset($message)) {
					// 	$message = null;
					// }
				// exit();

// NOTE this goes to $_SESSION variable

//				debug($_SESSION);
//				debug($_SERVER);

				$this_session['session']['rentabilidadViewMainLiquidations'] = $rentabilidadViewMainLiquidations;
				$this_session['session']['route'] = $route;
				$this_session['session']['message'] = $message;
				$this_session['session']['tds'] = $tds;
				$this_session['session']['counting'] = $counting;
				$this_session['session']['sum_data'] = $sum_data;

				$_SESSION['Gerencial'] = $this_session['session'];

					$this->set(compact('rentabilidadViewMainLiquidations','route','message','tds','counting','sum_data'));
	// exit();
					// NOTE set the response output for an ajax call
					Configure::write('debug', 2);
					$this->autoLayout = false;

				}



	function export($rentabilidadViewMainLiquidations=null,$route=null,$message=null,$tds=null,$counting=null,$sum_data=null) {
		
		//debug($_SESSION);
		$rentabilidadViewMainLiquidations = $_SESSION['Gerencial']['rentabilidadViewMainLiquidations'];
		$route = $_SESSION['Gerencial']['route'];
		$message = $_SESSION['Gerencial']['message'];
		$tds = $_SESSION['Gerencial']['tds'];
		$counting = $_SESSION['Gerencial']['counting'];
		$sum_data = $_SESSION['Gerencial']['sum_data'];


		$this->set(compact('rentabilidadViewMainLiquidations','route','message','tds','counting','sum_data'));
					// End fucntion pass_xls
		$this->autoLayout=false;
	}


	function index() {
		// index-section
//		Configure::write('debug', 2);
			// $this->ProvidersControlsFile->recursive = 0;
			// $this->set('providersControlsFiles', $this->paginate());
		// NOTE File section
		// $this->LoadModel('ProjectionsViewBussinessUnit');
		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->ProjectionsViewBussinessUnit->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
		$bsu = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id_area','tname')));
		// debug($bsu);
		$this->set(compact('bsu'));
	} // End Index Method


	function index_() {
		$this->RentabilidadViewMainLiquidation->recursive = 0;
		$this->set('rentabilidadViewMainLiquidations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid rentabilidad view main liquidation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('rentabilidadViewMainLiquidation', $this->RentabilidadViewMainLiquidation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->RentabilidadViewMainLiquidation->create();
			if ($this->RentabilidadViewMainLiquidation->save($this->data)) {
				$this->Session->setFlash(__('The rentabilidad view main liquidation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rentabilidad view main liquidation could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid rentabilidad view main liquidation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->RentabilidadViewMainLiquidation->save($this->data)) {
				$this->Session->setFlash(__('The rentabilidad view main liquidation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rentabilidad view main liquidation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->RentabilidadViewMainLiquidation->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for rentabilidad view main liquidation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->RentabilidadViewMainLiquidation->delete($id)) {
			$this->Session->setFlash(__('Rentabilidad view main liquidation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rentabilidad view main liquidation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}

?>

