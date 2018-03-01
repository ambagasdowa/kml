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

			// Configure::write('debug', 1);
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

$this->LoadModel('PerformanceViewFactura');


			if (isset($conditions['performance_date_ini']) && isset($conditions['performance_date_end'])) {
				/** NOTE we know */
				//1. Transform request parameters to MySQL datetime format.
				$date_init = new DateTime($conditions['performance_date_ini']);
				$mysqlstart =  $date_init->format('Y-m-d');
				// debug($mysqlstart);
				$date_end = new DateTime($conditions['performance_date_end']);
				$mysqlend = $date_end->format('Y-m-d');
				// debug($mysqlend);

				if ( $mysqlstart == $mysqlend) {
					$saveGroup['PerformanceViewFactura.ElaboracionFactura'] = $mysqlstart;
					// $updateFacturas['PerformanceFactura.ElaboracionFactura'] = $mysqlstart;
				} else {
					$saveGroup['PerformanceViewFactura.ElaboracionFactura BETWEEN ? AND ?'] = array($mysqlstart,$mysqlend);
					// $updateFacturas['PerformanceFactura.ElaboracionFactura BETWEEN ? AND ?'] = array($mysqlstart,$mysqlend);
				}

				$saveGroup['PerformanceViewFactura.performance_customers_id'] = $conditions['performance_customers_id'];
				$saveGroup['PerformanceViewFactura.Empresa'] = $conditions['performance_bsus_id'];

				$rowsView = $this->PerformanceViewFactura->find('list',array('conditions'=>$saveGroup,'fields'=>array('id','performance_facturas_id')));

				$saveFacturas['PerformanceFactura'] = $conditions;
				unset($saveFacturas['PerformanceFactura']['dataUpdate']);
				unset($saveFacturas['PerformanceFactura']['performance_date_ini']);
				unset($saveFacturas['PerformanceFactura']['performance_date_end']);

				/** @package 始める **/
				foreach ($rowsView as $reference => $facturas_id) {
					if ($facturas_id == null) {
						// debug($reference);
						$saveFacturas['PerformanceFactura']['performance_references_id'] = $reference;
						$createFacturas['PerformanceFactura'][] = $saveFacturas['PerformanceFactura'];
					} else {
						// update
						$facturas[] = $facturas_id;
					}
				}
			// debug($createFacturas);
			if (count($createFacturas['PerformanceFactura']) > 0) {
				$this->PerformanceFactura->create();
				if ($this->PerformanceFactura->saveAll($createFacturas['PerformanceFactura'])) {
					debug('succesfull save ');
				}
			}
			// NOTE this is done

			if (count($facturas) > 0) {
					$updateFacturas['PerformanceFactura.performance_customers_id'] = $saveGroup['PerformanceViewFactura.performance_customers_id'];
					$updateFacturas['PerformanceFactura.performance_bsus_id'] = $saveGroup['PerformanceViewFactura.Empresa'];
					$updateFacturas['PerformanceFactura.status'] = 1;
					// set the data
					$tmpcond = $conditions;
					$tounset = array('performance_customers_id','performance_bsus_id','performance_date_ini','performance_date_end','user_id','status','dataUpdate');

					foreach ($tounset as $unsetkey => $unsetval) {
						if (array_key_exists($unsetval , $tmpcond) == true ) {
							unset($tmpcond[$unsetval]);
						}
					}

					foreach ($facturas as $key => $value) {
						$updateData['PerformanceFactura'][$key]['id'] = $value;
						$updateData['PerformanceFactura'][$key]['performance_customers_id'] = $saveGroup['PerformanceViewFactura.performance_customers_id'];
						$updateData['PerformanceFactura'][$key]['performance_bsus_id'] = $saveGroup['PerformanceViewFactura.Empresa'];;
						$updateData['PerformanceFactura'][$key]['status'] = 1;
						$updateData['PerformanceFactura'][$key]['modified'] = date('Y-m-d H:i:s');
						foreach ($tmpcond as $indexm => $datam) {
							$updateData['PerformanceFactura'][$key][$indexm] = $datam;
						}
					}
					if ($this->PerformanceFactura->saveAll($updateData['PerformanceFactura'])) {
						debug('successfull update ');
					} else {
						debug('error');
					}
			}
			exit();
		} // Go ELSE

			//NOTE  build conditions for multiple save or update
// exit();
// Configure::write('debug', 2);

				// NOTE don't need check any just save this
				// NOTE parse the ids
				$saveData['PerformanceFactura'] = $conditions;
				if ($conditions['dataUpdate'] == true ) {
					$this->PerformanceFactura->id = $conditions['id'];
					$lastInsertId = $this->PerformanceFactura->id;
				} else {
					$this->PerformanceFactura->create();
				}
				if ($this->PerformanceFactura->save($saveData)) {
					if ($conditions['dataUpdate'] != true ) {
						$lastInsertId = $this->PerformanceFactura->getLastInsertId();
					}
					$this->Session->setFlash(__(
								'<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
									</button>
									<strong>Las fechas se han Guardado Correctamente</strong>
									</div>'
					, true));
					// // NOTE get the inserted field
					$conditionsPerformanceFactView['PerformanceViewFactura.performance_facturas_id'] = $lastInsertId;
					$setData = $this->PerformanceViewFactura->find('all',array('conditions'=>$conditionsPerformanceFactView,'limit'=>'1'));
					$response = json_encode(current($setData)['PerformanceViewFactura']);
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
		} // end save or update
		//


			// debug($this->params['named']);
			$posted = json_decode(base64_decode($this->params['named']['data']),true);
			// debug($posted); // NOTE set this in the add view for parsing as hidden values
			if (isset($posted['performance_mode']) and $posted['performance_mode'] == 'group') {
				debug('xcontrol');
				$pd['fecha_init'] = $posted['performance_fecha_ini'];
				$pd['fecha_end'] = $posted['performance_fecha_end'];

				unset($posted['performance_mode']);
				unset($posted['performance_fecha_ini']);
				unset($posted['performance_fecha_end']);
				$xcontrol = true;
			} else {
				$xcontrol = false;
			}

// debug($posted); // NOTE set this in the add view for parsing as hidden values
			foreach ($posted as $idx => $data ) {
				$conditionsPerformanceFactura['PerformanceFactura.'.$idx]	= $data;
				$parse_id['PerformanceFactura'][$idx] = $data;
			}
			// NOTE add status filter
			$conditionsPerformanceFactura['PerformanceFactura.status'] = 1;

			// debug($conditionsPerformanceFactura);
			// debug($parse_id);
			if ($xcontrol == false) {
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
																				)
				);
			} else {
				// debug($conditionsPerformanceFactura);
				// debug($pd);
				// exit();
				$search = null;
			}

			// NOTE count the array elements
			// Configure::write('debug',2);
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
			// debug(current($search));
			// set vars


		if (isset($response) and $response != null) {
			// 4. Return as a json array
			Configure::write('debug', 0);
			$this->autoRender = false;
			$this->autoLayout = false;
			// $this->layout='empty';
			$this->header('Content-Type: application/json');
			echo json_encode($response);
			// break;
		} else {
			$performanceCustomers = $this->PerformanceFactura->PerformanceCustomers->find('list');
			$performanceReferences = $this->PerformanceFactura->PerformanceReferences->find('list');
			$users = $this->PerformanceFactura->User->find('list');

			$this->set(compact('performanceCustomers', 'performanceReferences','performanceFacturas', 'users', 'performanceFacturaStatus','xcontrol','pd'));
			// NOTE set the response output for an ajax call
			Configure::write('debug', 0);
			$this->autoLayout = false;
		}

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
