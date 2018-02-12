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
class PerformanceViajesController extends AppController {

	var $name = 'PerformanceViajes';


	function index() {
		$this->PerformanceViaje->recursive = 0;
		$this->set('performanceViajes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance viaje', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceViaje', $this->PerformanceViaje->read(null, $id));
	}

	function add() {

			Configure::write('debug', 2);
			// debug($this->params);
			$posted = json_decode(base64_decode($this->params['named']['data']),true);
			// debug($posted); // NOTE set this in the add view for parsing as hidden values
			foreach ($posted as $idx => $data ) {
				$conditionsPerformanceViajes['PerformanceViaje.'.$idx]	= $data;
				$parse_id['PerformanceViaje'][$idx] = $data;
			}

			// debug($conditionsPerformanceViajes);
			// debug($parse_id);
			// NOTE add the array param fields
			$search = $this->PerformanceViaje->find(
																				'all',
																				array(
																							'fields'=>array(
																															'id',
																															'performance_num_guia_id',
																															'performance_no_viaje_id',
																															'performance_no_guia_id',
																															'projections_corporations_id',
																															'id_area',
																															'recepcionEvidencias',
																															'entregaEvidenciasCliente',
																															'validacionEvidenciasCliente'
																						 								 ),
																							'conditions'=>$conditionsPerformanceViajes
																			));
			// NOTE count the array elements
			// debug($search);
			// NOTE add status filter
			$conditionsPerformanceViajes['PerformanceViaje.status'] = 1;

			if ( !empty($search) && count($search) > 0 ) {
				// NOTE means that we have encounter a least one record (and shut be only one ) for this id

				$msg_output = 'Update';
				$performanceFacturaStatus = 1;
				$performanceViajes = current($search);
				// NOTE set the old values and ids in the form
			} else {
				$msg_output = 'Add';
				$performanceFacturaStatus = 0;
				$performanceViajes = $parse_id;
				// NOTE set the ids in the form
			}
			// debug(current($search));
			// debug($parse_id);
			$this->LoadModel('PerformanceBsu');
			$condBsus['PerformanceBsu.projections_corporations_id'] = $performanceViajes['PerformanceViaje']['projections_corporations_id'];
			$condBsus['PerformanceBsu.id_area'] = $performanceViajes['PerformanceViaje']['id_area'];
			$bsus_name = current($this->PerformanceBsu->find('list',array('conditions'=>$condBsus,'fields'=>array('id','label'))));
			// // set the bsu
			$performanceViajes['PerformanceViaje']['bsu'] = $bsus_name;
			// set vars
			// debug($performanceViajes);
			// NOTE check like if $this->data

		if (!empty($this->params['named']['save']) && $this->params['named']['save'] != null) {
			// debug($this->params['named']['save']);
			$posted = json_decode(base64_decode($this->params['named']['save']),true);
			// debug($posted);
			foreach ($posted as $keys => $postvalue) {

				if ($keys > 0 ) {
					$content = $postvalue['name'];
					$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
					if ( $postvalue['value'] != "") {
						$conditions[$chars[2]] = $postvalue['value'];
					}

				}

			}

			// debug($conditions);
			// set the search array
			$dates = array('recepcionEvidencias','entregaEvidenciasCliente','validacionEvidenciasCliente');
			foreach ($conditions as $indx => $perData) {
				if ( in_array($indx,$dates) == true ) {
					if ($perData != "" OR $perData != null) {
						$dates_conv = new DateTime($perData);
						$conditions[$indx] = $dates_conv->format('Y-m-d');
					}
				}
			}
			// debug($conditions);
			// exit();
			if ($conditions['dataUpdate'] === true ) {
				// update
				// NOTE firts check for the id , then update
				// parse the ids and form data
				// search for the id
				$this->PerformanceViaje->id = $conditions['id'];

				$this->PerformanceViaje->create();
				if ($this->PerformanceViaje->updateAll($conditions)) {
					// $this->Session->setFlash(__('The performance factura has been saved', true));
					$this->Session->setFlash(__(
								'<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
									</button>
									<strong>Las fechas se han Guardado Correctamente</strong>
									</div>'
					, true));

					$this->redirect(array('action' => 'index'));
				} else {
					// $this->Session->setFlash(__('The performance factura could not be saved. Please, try again.', true));
					$this->Session->setFlash(__(
								'<div class="alert alert-warning alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
									</button>
									<strong>Las fechas no se han podido Guardar por favor intentelo nuevamente</strong>
									</div>'
					, true));
				}

			} else {
				// save new
				// NOTE don't need check any just save this
				// NOTE parse the ids
				$saveData['PerformanceViaje'] = $conditions;

				$this->PerformanceViaje->create();
				if ($this->PerformanceViaje->save($saveData)) {
					$this->Session->setFlash(__(
								'<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
									</button>
									<strong>Las fechas se han Guardado Correctamente</strong>
									</div>'
					, true));
					$this->redirect(array('action' => 'index'));
				} else {

					$this->Session->setFlash(__(
								'<div class="alert alert-warning alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
									</button>
									<strong>Las fechas no se han podido Guardar por favor intentelo nuevamente</strong>
									</div>'
					, true));
				}
			}

		} // end save or update
		// $performanceCustomers = $this->PerformanceFactura->PerformanceCustomers->find('list');
		// $performanceReferences = $this->PerformanceFactura->PerformanceReferences->find('list');

		$users = $this->PerformanceViaje->User->find('list');
		// debug($performanceFacturaStatus);
		// debug($performanceViajes);
		$this->set(compact('performanceViajes','performanceCustomers', 'performanceReferences','users', 'performanceFacturaStatus'));
		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}


	// function add() {
	//
	// 	debug($this->params());
	//
	//
	// 	if (!empty($this->data)) {
	// 		$this->PerformanceViaje->create();
	// 		if ($this->PerformanceViaje->save($this->data)) {
	// 			$this->Session->setFlash(__('The performance viaje has been saved', true));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The performance viaje could not be saved. Please, try again.', true));
	// 		}
	// 	}
	// 	$projectionsCorporations = $this->PerformanceViaje->ProjectionsCorporations->find('list');
	// 	$performanceBsuses = $this->PerformanceViaje->PerformanceBsus->find('list');
	// 	$users = $this->PerformanceViaje->User->find('list');
	// 	$this->set(compact('projectionsCorporations', 'performanceBsuses', 'users'));
	// }

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance viaje', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceViaje->save($this->data)) {
				$this->Session->setFlash(__('The performance viaje has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance viaje could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceViaje->read(null, $id);
		}
		$projectionsCorporations = $this->PerformanceViaje->ProjectionsCorporation->find('list');
		$performanceBsuses = $this->PerformanceViaje->PerformanceBsus->find('list');
		$users = $this->PerformanceViaje->User->find('list');
		$this->set(compact('projectionsCorporations', 'performanceBsuses', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance viaje', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceViaje->delete($id)) {
			$this->Session->setFlash(__('Performance viaje deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance viaje was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
