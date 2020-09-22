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


	function beforeFilter() {
	 parent::beforeFilter();
	 $this->Auth->allow(array('index','add','*'));
  }


	function get() {

		// Configure::write('debug',0);
		// App::uses('Xml', 'Lib');

		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);
		// exit();

		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->ProjectionsViewBussinessUnit->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
		$this->loadModel('RentabilidadViewMainLiquidation');

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

			// debug($conditions);
			 debug($add_conditions);
// exit();
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
					$bsu = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id_area','tname')));
					$conditionsBl['RentabilidadViewMainLiquidation.CpnyID'] = $bsu[$add_conditions['bsu']];
					// prepare a response
				} elseif( !isset($add_conditions['bsu']) && !isset($add_conditions['BatNbr']))  {
					// $add_conditions['bsu'] = null;
					$message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
								Debe indicar una Unidad de Negocio o un Numero de Lote
							</div>';
					// $conditionsBl = null; //WARNING if choose lote then reset all other conditions
					$this->set(compact('message')); //exit();
					return null;
				}


				if(isset($add_conditions['BatNbr'])){
					$conditionsBl = null; //WARNING if choose lote then reset all other conditions
					$conditionsBl['RentabilidadViewMainLiquidation.BatNbr'] = $add_conditions['BatNbr'];
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


				if($_SESSION['Auth']['User']['group_id'] == 16){
					$conditionsBl['RentabilidadViewMainLiquidation.VendId'] = $_SESSION['Auth']['User']['username'];
					$conditionsBl['RentabilidadViewMainLiquidation.isview'] = 1;
				}
				// Configure::write('debug',2);


 debug($message);debug($conditionsBl);exit();

				$rentabilidadViewMainLiquidations = $this->RentabilidadViewMainLiquidation->find('all',array('conditions'=>$conditionsBl));

debug($rentabilidadViewMainLiquidations);
		// NOTE || WARNING
		exit();


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

				$app = basename(ROOT);
				$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/";
				$url = 'app/webroot/files/providers_sat/';
				$route = $path.$url;

				// if (!isset($message)) {
				// 	$message = null;
				// }
// exit();
				$this->set(compact('rentabilidadViewMainLiquidations','route','message'));
// exit();
				// NOTE set the response output for an ajax call
				Configure::write('debug', 0);
				$this->autoLayout = false;

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

