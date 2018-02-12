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
class PerformanceFacturasController extends AppController {

	var $name = 'PerformanceFacturas';


	function index() {
		$this->PerformanceFactura->recursive = 0;
		$this->set('performanceFacturas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid performance factura', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('performanceFactura', $this->PerformanceFactura->read(null, $id));
	}

	function add() {

			Configure::write('debug', 2);
			// debug($this->params['named']);
			$posted = json_decode(base64_decode($this->params['named']['data']),true);
			// debug($posted); // NOTE set this in the add view for parsing as hidden values
			foreach ($posted as $idx => $data ) {
				$conditionsPerformanceFactura['PerformanceFactura.'.$idx]	= $data;
				$parse_id['PerformanceFactura'][$idx] = $data;
			}
			// NOTE add status filter
			$conditionsPerformanceFactura['PerformanceFactura.status'] = 1;

			debug($conditionsPerformanceFactura);
			debug($parse_id);
			// NOTE add the array param fields
			$search = $this->PerformanceFactura->find(
																				'all',
																				array(
																							'fields'=>array(
																															'id',
																															'performance_customers_id',
																															'performance_references_id',
																															'performance_bsus_id',
																															'entregaFacturaCliente',
																															'aprobacionFactura',
																															'fechaPromesaPago',
																															'fechaPago'
																						 								 ),
																							'conditions'=>$conditionsPerformanceFactura
																			));
			// NOTE count the array elements
			// debug($search);

			if ( !empty($search) && count($search) > 0 ) {
				// NOTE means that we have encounter a least one record (and shut be only one ) for this id

				$msg_output = 'Update';
				$performanceFacturaStatus = 1;
				$performanceFacturas = current($search);
				// NOTE set the old values and ids in the form
			} else {
				$msg_output = 'Add';
				$performanceFacturaStatus = 0;
				$performanceFacturas = $parse_id;
				// NOTE set the ids in the form
			}
			debug(current($search));
			// set vars
			// NOTE check like if $this->data

		if (!empty($this->params['named']['save']) && $this->params['named']['save'] != null) {

			debug($this->params['named']['save']);
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
			$dates = array('entregaFacturaCliente','aprobacionFactura','fechaPromesaPago','fechaPago');

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
				$this->PerformanceFactura->id = $conditions['id'];

				$this->PerformanceFactura->create();
				if ($this->PerformanceFactura->updateAll($conditions)) {
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

			} else {
				// save new
				// NOTE don't need check any just save this
				// NOTE parse the ids
				$saveData['PerformanceFactura'] = $conditions;

				$this->PerformanceFactura->create();
				if ($this->PerformanceFactura->save($saveData)) {
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
			}

		} // end save or update
		//
		$performanceCustomers = $this->PerformanceFactura->PerformanceCustomers->find('list');
		$performanceReferences = $this->PerformanceFactura->PerformanceReferences->find('list');
		$users = $this->PerformanceFactura->User->find('list');

		$this->set(compact('performanceCustomers', 'performanceReferences','performanceFacturas', 'users', 'performanceFacturaStatus'));
		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;

	} // End ADD

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid performance factura', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->PerformanceFactura->save($this->data)) {
				$this->Session->setFlash(__('The performance factura has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The performance factura could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->PerformanceFactura->read(null, $id);
		}
		$performanceCustomers = $this->PerformanceFactura->PerformanceCustomer->find('list');
		$performanceReferences = $this->PerformanceFactura->PerformanceReference->find('list');
		$users = $this->PerformanceFactura->User->find('list');
		$this->set(compact('performanceCustomers', 'performanceReferences', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for performance factura', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->PerformanceFactura->delete($id)) {
			$this->Session->setFlash(__('Performance factura deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Performance factura was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
