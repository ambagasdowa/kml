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
		* @email	     baizabal.jesus@gmail.com
		* @package       cake
		* @subpackage    cake.cake.console.libs.templates.views
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
?>

<?php
class ProvidersControlsFilesController extends AppController {

	var $name = 'ProvidersControlsFiles';
	var $helpers = array('Html','Form','Ajax','Javascript','Js');


			function date_convert($date) {
				//1. Transform request parameters to MySQL datetime format.
				$date_return = null;
				$date_init = new DateTime($date);
				$start =  $date_init->format('Y-m-d');
				return $start;
			}


			function link() {

					Configure::write('debug',0);
					$this->loadModel('ProvidersViewRelation');
				if(isset($this->params['named']['id'])){
					$conditionsBl['ProvidersViewRelation.BatNbr'] = $this->params['named']['id'];
				} else {
					break;
				}

				$ProvidersViewRelations = $this->ProvidersViewRelation->find('all',array('conditions'=>$conditionsBl));

				foreach ($ProvidersViewRelations as $key => $value) {
					// code...
					// debug($key);
					 // debug($value['ProvidersViewRelation']['xml']);
					 // $xmlm = $value['ProvidersViewRelation']['xml'];

					 // $xml[] = new SimpleXMLElement($value['ProvidersViewRelation']['xml']);
					 $xml = new SimpleXMLElement($value['ProvidersViewRelation']['xml']);
					 // $xml = simplexml_load_string($value['ProvidersViewRelation']['xml']);
					 // $json = json_encode($xml);
					 // $array = json_decode($json,TRUE);

					 // debug($xml);

					// var_dump($xml->children());
					// $ns = $xml->getNamespaces(true);
					// debug($ns);
					// $xml->registerXPathNamespace('cfdi', $ns['cfdi']);
					// $xml->registerXPathNamespace('t', $ns['tfd']);
					// debug($xml->getName());


					$addenum = $xml->addChild('Addenda');
					$addspace = $addenum->addChild('eu:AddendaEU',null,"http://factura.envasesuniversales.com/addenda/eu");
					$addspace->addAttribute( "xmlns:xsi:schemaLocation", "http://factura.envasesuniversales.com/addenda/eu http://factura.envasesuniversales.com/addenda/eu/EU_Addenda.xsd");

					$tipoFactura = $addspace->addChild('TipoFactura');
					$tipoFactura->addChild('IdFactura',$value['ProvidersViewRelation']['IdFactura']);
					$tipoFactura->addChild('Version',$value['ProvidersViewRelation']['Version']);
					$tipoFactura->addChild('FechaMensaje',$value['ProvidersViewRelation']['FechaMensaje']);

					$tipoTransaction = $addspace->addChild('TipoTransaccion');
					$tipoTransaction->addChild('IdTransaccion',$value['ProvidersViewRelation']['IdTransaccion']);
					$tipoTransaction->addChild('Transaccion',$value['ProvidersViewRelation']['Transaccion']);

					$ordenesCompra = $addspace->addChild('OrdenesCompra');
						$secuencia = $ordenesCompra->addChild('Secuencia');
							$secuencia->addAttribute("consec","1");
							$secuencia->addChild('IdPedido', $value['ProvidersViewRelation']['IdPedido'] );
								$addAlbaran = $secuencia->addChild('EntradaAlmacen');
								$addAlbaran->addChild('Albaran',$value['ProvidersViewRelation']['Albaran']);

					$addMoneda = $addspace->addChild('Moneda');
					$addMoneda->addChild('MonedaCve',$value['ProvidersViewRelation']['MonedaCve']);
					$addMoneda->addChild('TipoCambio',$value['ProvidersViewRelation']['TipoCambio']);
					$addMoneda->addChild('SubtotalM',$value['ProvidersViewRelation']['SubtotalM']);
					$addMoneda->addChild('TotalM',$value['ProvidersViewRelation']['TotalM']);
					$addMoneda->addChild('ImpuestoM',$value['ProvidersViewRelation']['ImpuestoM']);

					$addImpuestosR = $addspace->addChild('ImpuestosR');
					$addImpuestosR->addChild('BaseImpuesto',$value['ProvidersViewRelation']['BaseImpuesto']);

					$name = $value['ProvidersViewRelation']['BatNbr'];
				 }
				 // $xml = trim($xml,"\n");
				 $this->set(compact('xml','name'));
				//NOTE ALERT print xml
				// print "<pre><textarea style=\"width:1600px;height:1600px;\">";
							// echo $xml->asXML();
				// print "</textarea></pre>";
				// NOTE set the response output for an ajax call
				Configure::write('debug', 0);
				// $this->autoRender = false;
				$this->autoLayout = false;
				// ob_flush();

				ob_clean(); //Clean (erase) the output buffer
				ob_start();
				//

			}


			function validate($xml = null) {
				// Liberar LOTE
			}

			function relation( $file = array() , $fid = null ) {
				debug('INSIDE RELATION');

				debug($file);
				debug($fid);

				// exit();
				// for file $fid relation with $file
				//
				$this->loadModel('ProvidersAssocVendor');
				$this->loadModel('ProvidersViewRelation');
				$this->loadModel('ProvidersControlsFile');
				//
				// check if assoc exists
				$fileAssc['ProvidersAssocVendor.BatNbr'] = $file[1];
				$fileAssc['ProvidersAssocVendor.CpnyID'] = $file[2];
				$fileAssc['ProvidersAssocVendor.RefNbr'] = $file[3];



				$fileConditions['ProvidersViewRelation.BatNbr'] = $file[1];
				$fileConditions['ProvidersViewRelation.CpnyID'] = $file[2];
				$fileConditions['ProvidersViewRelation.RefNbr'] = $file[3];

				// $checkFile = $this->ProvidersViewRelation->find('all',array('conditions'=>$filleConditions));
				$checkFile = $this->ProvidersViewRelation->find('all',array('conditions'=>$fileConditions));
				debug('CheckFile');

				// debug(current($checkFile)['ProvidersViewRelation']);

				$data = current($checkFile)['ProvidersViewRelation'];

				debug('DATA');
				debug($data);

					debug('COUNT');
					// debug(count($this->ProvidersAssocVendor->find('all',array('conditions'=>$fileAssc))));

					// exit();
					$check_assoc = $this->ProvidersAssocVendor->find('all',array('conditions'=>$fileAssc));

					if (count($check_assoc) == 0 ) {

							$fileSave['ProvidersAssocVendor']['BatNbr'] = $data['BatNbr'];
							$fileSave['ProvidersAssocVendor']['CpnyId'] = $data['CpnyID'];
							$fileSave['ProvidersAssocVendor']['RefNbr'] = $data['RefNbr'];
							$fileSave['ProvidersAssocVendor']['VendId'] = $data['VendId'];
							$fileSave['ProvidersAssocVendor']['PONbr'] = $data['PONbr'];
							$fileSave['ProvidersAssocVendor']['created'] = date('Y-m-d H:i:s');
							$fileSave['ProvidersAssocVendor']['modified'] = date('Y-m-d H:i:s');
							$fileSave['ProvidersAssocVendor']['providers_standings_id'] = '1';
							$fileSave['ProvidersAssocVendor']['providers_parents_id'] = '1';
							$fileSave['ProvidersAssocVendor']['_status'] = 1;

							$this->ProvidersAssocVendor->create();

							if ($this->ProvidersAssocVendor->save($fileSave['ProvidersAssocVendor'])) {
								debug('Save ProvidersAssocVendor ok');

								$ProvidersAssocVendorId = $this->ProvidersAssocVendor->getLastInsertId();
							}

					} else {

							$ProvidersAssocVendorId = current($check_assoc)['ProvidersAssocVendor']['id'];

					}

					debug($ProvidersAssocVendorId);

				// $fileCond['ProvidersControlsFile.id'] = $fid;
				$fileIdUp['ProvidersAssocVendor']['providers_assoc_vendors_id'] = $ProvidersAssocVendorId;
				$fileIdUp['ProvidersAssocVendor']['providers_standings_id'] = $file[4];

				$this->ProvidersControlsFile->id = $fid;
				// if ($this->ProvidersControlsFile->updateAll($fileUp)) {
				if ($this->ProvidersControlsFile->save($fileIdUp['ProvidersAssocVendor'])) {
					debug('Update File');
				}

			} // End Relation

			function file_proccess( $form_data = array() , $ref_data = array() ) {

				if (isset($form_data)) {
						$this->data['ProvidersControlsFile']['upload'] = $form_data;
				}


				$file_providers_name = str_replace('.'.end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])),'',$this->data['ProvidersControlsFile']['upload']['name']);

				$md5 = md5_file($this->data['ProvidersControlsFile']['upload']['tmp_name']);

				$stat = stat($this->data['ProvidersControlsFile']['upload']['tmp_name']);

				$conditionsFields['ProvidersControlsFile._md5sum'] = $md5;

				$finderFilename = $this->ProvidersControlsFile->find('all',array('conditions'=>$conditionsFields));


						//NOTE this must be a very rare case but one never knows
						if (count($finderFilename) >= 1) {
							$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												El archivo <strong> '.$file_providers_name.' </strong>
												ya se encuentra en la base de datos.
												Por favor elija otro archivo </div>', true));
							$this->redirect($this->referer());
						}
				// 				$idx_providers_name = current($finderFilename);

					// debug($finderFilename);
					// print_r(count($finderFilename));
				// exit();
				// exit();
					/** <get user information> **/
					$_username = $_SESSION['Auth']['User']['username'];
					$_datetime = date('Y-m-d H:m:s');
					$_ip = $_SERVER['REMOTE_ADDR'];
					$_file_size = $this->data['ProvidersControlsFile']['upload']['size'];


					$data_stat['username'] = $_username;
					$data_stat['datetime'] = $_datetime;
					$data_stat['ip'] = $_ip;

					$data_stat['filesize'] = $_file_size;


					$extensions = array('txt', 'xls', 'xlsx', 'csv', 'xml', 'pdf');

					if( in_array(strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name']))), $extensions ) === FALSE){

						$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<strong> Solo se permiten archivos de texto plano con la extension txt , csv o archivos excel xls ,xlsx </strong>
													</div>', true));
						$this->redirect(array('action' => 'index'));
					} else {
						$ext = '.' . strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
						debug('miss');
					}

					$name = basename(md5($this->data['ProvidersControlsFile']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp
								$data_stat['name'] = $name;
								$data_stat['ext'] = strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
								if(!isset($ext)){
										$ext = '.' . $data_stat['ext'];
								}

					if ($ext == 'xml') {
						// code...
						// go to validate in SAT if false go to referrer

					}

				// all ok now save at db

										$file['ProvidersControlsFile']['user_id'] = $_SESSION['Auth']['User']['id'];
										$file['ProvidersControlsFile']['_filename'] = $data_stat['name'].$ext;
										$file['ProvidersControlsFile']['labelname'] = $this->data['ProvidersControlsFile']['upload']['name'];
										$file['ProvidersControlsFile']['_pathname'] = WWW_ROOT.'files'.DS.'providers'.DS;
										$file['ProvidersControlsFile']['_extname'] = $ext;
										$file['ProvidersControlsFile']['_md5sum'] = $md5;
										$file['ProvidersControlsFile']['_atime'] = $stat['atime'];
										$file['ProvidersControlsFile']['_mtime'] = $stat['mtime'];
										$file['ProvidersControlsFile']['_ctime'] = $stat['ctime'];
										$file['ProvidersControlsFile']['_ip_remote'] = $data_stat['ip'];
										$file['ProvidersControlsFile']['created'] = $data_stat['datetime'];
										$file['ProvidersControlsFile']['modified'] = null;
										$file['ProvidersControlsFile']['providers_parents_id'] = '1';
										$file['ProvidersControlsFile']['_status'] = '1';

										$this->ProvidersControlsFile->create();

					if ($this->ProvidersControlsFile->save($file)) {

					$providers_controls_files_id = $this->ProvidersControlsFile->getLastInsertId();
					/**=======================================================*/
					//             The file is correct

					move_uploaded_file($this->data['ProvidersControlsFile']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'providers_sat'.DS.$name.$ext);

								$file = WWW_ROOT.'files'.DS.'providers_sat'.DS.$name.$ext;

					// NOTE Hir must validate the xml
					// go with refData
						if (isset($ref_data)) {
							// code...
								debug('REF_DATA');
								$this->relation($ref_data,$providers_controls_files_id);
						}
					/**=======================================================*/
					}

			} //file_proccess


			function upload() {

				Configure::write('debug',2);
				// App::uses('Xml', 'Lib');

// debug($this->params);
// debug($this->data);
// exit();
							debug('FORM');
							// debug($this->params['form']);
							//
							$forms = $this->params['form'];

								foreach ($forms as $key_code => $data_code) {
									// code...
									// debug($key_code);
									// NOTE split for datacode

										$split_code = explode('_',$key_code);

									debug($split_code);

									debug($data_code);
									debug($data_code['error']);
									// move section
									//
									if ($data_code['error'] == 0) {
										// save the file and set storage
										$this->file_proccess($data_code,$split_code);

									}

								}

		exit();

$posted = json_decode(base64_decode($this->params['named']['data']),true);
				// $posted = json_decode(base64_decode($this->params['named']['data']),true);
				debug($posted);


				$this->loadModel('ProvidersViewRelation');
				$conditions = array();
				$add_conditions = array();
				foreach ( $posted as $keys => $postvalue ) {

					if ( $keys > 0 ) {
						$content = $postvalue['name'];
						// debug($postvalue['value']);
						$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
						// debug($chars);
						if ( isset($chars[1]) && $chars[1] == 'ProvidersViewRelations' && $postvalue['value'] != '') {

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


				debug('POSTED');
				debug($add_conditions);

				// debug($this->data['ProvidersControlsFile']['upload']);

exit();
				$this->loadModel('ProvidersViewRelation');
				$this->loadModel('AddenumTblAlbaranRelation');
				$conditions = array();
				$add_conditions = array();

				// NOTE check if record exist


				$add_conditions = $posted;
				debug('ADD_CONDITIONS');
				debug($add_conditions);

					$save['AddenumTblAlbaranRelation']['created'] = date('Y-m-d H:i:s');
					$save['AddenumTblAlbaranRelation']['status'] = 1;

				if ($add_conditions['type'] == 'IdPedido') {
					// code...
					$save['AddenumTblAlbaranRelation']['IdPedido'] = $add_conditions['data'];
				} elseif ($add_conditions['type'] == 'Albaran') {
					$save['AddenumTblAlbaranRelation']['Albaran'] = $add_conditions['data'];
				}

				// unset($add_conditions['name']);
				// unset($add_conditions['type']);
				// unset($add_conditions['data']);

				if(isset($add_conditions['batnbr'])) {
					$save['AddenumTblAlbaranRelation']['batnbr'] = $add_conditions['batnbr'];
				}
				if(isset($add_conditions['RefNbr'])) {
					$save['AddenumTblAlbaranRelation']['RefNbr'] = $add_conditions['RefNbr'];
				}
				if(isset($add_conditions['guia'])) {
					$save['AddenumTblAlbaranRelation']['num_guias'] = $add_conditions['guia'];
				}
				if(isset($add_conditions['noguia'])) {
					$save['AddenumTblAlbaranRelation']['RefNbr'] = $add_conditions['noguia'];
				}


				// $save['AddenumTblAlbaranRelation'] = $add_conditions;
				// print_r($save);


				if (isset($add_conditions['idx'])) {
					 //NOTE Create: id isn't set or is null
						$this->AddenumTblAlbaranRelation->id = $add_conditions['idx'];
						// unset($add_conditions['idx']);
				} else {
					//NOTE Update: id is set to a numerical value
					// an ultimate validation
						$response = $this->_check($save['AddenumTblAlbaranRelation']);
						if ($response) {
							// code...
							// NOTE check this
							$this->AddenumTblAlbaranRelation->id = $response;
						} else {
							$this->AddenumTblAlbaranRelation->create();
						}
				}

				debug('RESPONSE');
				debug($response);
				debug('SAVED VAR');
				debug($save);
	// exit();
				if ( isset($posted['data']) and isset($posted['type']) ) {
					// code...
					$this->AddenumTblAlbaranRelation->save($save['AddenumTblAlbaranRelation']);
				}


				//NOTE update table and send data for update download cell

							// NOTE set the response output for an ajax call
							Configure::write('debug', 0);
							$this->autoLayout = false;

			} //NOTE end update


			function _check( $data ) {
				$this->loadModel('AddenumTblAlbaranRelation');
				debug('_CHECK');
				debug($data);
				$conditions['AddenumTblAlbaranRelation.batnbr'] = $data['batnbr'];
				$conditions['AddenumTblAlbaranRelation.RefNbr'] = $data['RefNbr'];

				if($data['idx']) {
					$conditions['AddenumTblAlbaranRelation.id'] = $data['idx'];
				}


				$response = $this->AddenumTblAlbaranRelation->find('all',array('fields'=>array('id'),'conditions'=>$conditions));

				return  current($response)['AddenumTblAlbaranRelation']['id'];

			} // ENd _check



			function get() {

				Configure::write('debug',2);
				// App::uses('Xml', 'Lib');

				$posted = json_decode(base64_decode($this->params['named']['data']),true);
				// debug($posted);
				// exit();
				$this->loadModel('ProvidersViewRelation');
				$conditions = array();
				$add_conditions = array();
				// exit();
				foreach ( $posted as $keys => $postvalue ) {

					if ( $keys > 0 ) {
						$content = $postvalue['name'];
						// debug($postvalue['value']);
						$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
						// debug($chars);
						if ( isset($chars[1]) && $chars[1] == 'ProvidersViewRelations' && $postvalue['value'] != '') {

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
// exit();
				// debug($this->date_convert($add_conditions['dateini']));

				if (isset($add_conditions['dateini']) && isset($add_conditions['dateend'])){
					// code for both date

					$conditionsBl = array('ProvidersViewRelation.InvDate BETWEEN ? AND ?'=> array ($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));

				} elseif (isset($add_conditions['dateini']) || isset($add_conditions['dateend'])){

						if( isset($add_conditions['dateini']) ) {
							$conditionsBl['ProvidersViewRelation.InvDate'] = $this->date_convert($add_conditions['dateini']);
						} else {
							$conditionsBl['ProvidersViewRelation.InvDate'] = $this->date_convert($add_conditions['dateend']);
						}
				} else {
					// $add_conditions['dateini'] = null;
					// $add_conditions['dateend'] = null;
					// $conditionsBl['ProvidersViewRelation.InvDate'] = $this->date_convert(date('Y-m-d'));
				}



				if(isset($add_conditions['BatNbr'])){
					$conditionsBl['ProvidersViewRelation.BatNbr'] = $add_conditions['BatNbr'];
				}

				$providersViewRelations = $this->ProvidersViewRelation->find('all',array('conditions'=>$conditionsBl));
				// debug($providersViewRelations);
				$this->set(compact('providersViewRelations'));
// exit();
				// NOTE set the response output for an ajax call
				Configure::write('debug', 0);
				$this->autoLayout = false;

			}


	function index() {
		// index-section
			$this->ProvidersControlsFile->recursive = 0;
			$this->set('providersControlsFiles', $this->paginate());
		// NOTE File section

		// if (!empty($this->data)) {
		//
		// 	debug($this->data);
		// 	debug($this->data['ProvidersControlsFile']['upload']);
		// }
// exit();
		//
		// if($this->data){
		//  debug($this->data);
		//  $this->add($this->data);
		//  // exit();
		// }
	} // End Index Method




	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers controls file', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersControlsFile', $this->ProvidersControlsFile->read(null, $id));
	}

	// function add() {
	// 	if (!empty($this->data)) {
	// 		$this->ProvidersControlsFile->create();
	// 		if ($this->ProvidersControlsFile->save($this->data)) {
	// 			$this->Session->setFlash(__('The providers controls file has been saved', true));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The providers controls file could not be saved. Please, try again.', true));
	// 		}
	// 	}
	// }



	function convertXLStoCSV($infile,$outfile){
		App::import('Vendor', 'phpexcel', array('file' =>'phpexcel'.DS.'Classes'.DS.'PHPExcel.php'));

		$fileType = PHPExcel_IOFactory::identify($infile);
		var_dump($fileType);
// 		exit();
		$objReader = PHPExcel_IOFactory::createReader($fileType);

		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($infile);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		$objWriter->save($outfile);
	}


	function add($data = null) {

    if(isset($data)){
    $this->data = $data;

		// if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
		//
		// } else {
		//
		// }

		if (!empty($this->data)) {



            $file_providers_name = str_replace('.'.end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])),'',$this->data['ProvidersControlsFile']['upload']['name']);


			$md5 = md5_file($this->data['ProvidersControlsFile']['upload']['tmp_name']);

			$stat = stat($this->data['ProvidersControlsFile']['upload']['tmp_name']);

            $conditionsFields['ProvidersControlsFile.providers_md5sum_check'] = $md5;

            $finderFilename = $this->ProvidersControlsFile->find('all',array('conditions'=>$conditionsFields));


			if ( $finderFilename ) {
				//NOTE this must be a very rare case but one never knows
				if (count($finderFilename) > 1) {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										El archivo <strong> '.$file_providers_name.' </strong>
										ya se encuentra en la base de datos.
										Por favor elija otro archivo </div>', true));
					$this->redirect($this->referer());
				}

// 				$idx_providers_name = current($finderFilename);

				$this->Session->setFlash(__('<div class="alert alert-info alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										El archivo <strong><a href="#" id="log_view"> '.$file_providers_name.' </a></strong>
										ya se encuentra en la base de datos.
										Por favor elija otro archivo
									</div>', true));
				$this->redirect($this->referer());
			}

			/** <get user information> **/
			$_username = $_SESSION['Auth']['User']['username'];
			$_datetime = date('Y-m-d H:m:s');
			$_ip = $_SERVER['REMOTE_ADDR'];
			$_file_size = $this->data['ProvidersControlsFile']['upload']['size'];


			$data_stat['username'] = $_username;
			$data_stat['datetime'] = $_datetime;
			$data_stat['ip'] = $_ip;

			$data_stat['filesize'] = $_file_size;


            $extensions = array('txt' , 'xls' , 'xlsx' , 'csv');

			if( in_array(strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name']))), $extensions ) === FALSE){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano con la extension txt , csv o archivos excel xls ,xlsx </strong>
											</div>', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$ext = '.' . strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
				debug('miss');
			}

			$name = basename(md5($this->data['ProvidersControlsFile']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp

            $data_stat['name'] = $name;
            $data_stat['ext'] = strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
            if(!isset($ext)){
                $ext = '.' . $data_stat['ext'];
            }

// all ok now save at db

                $file['ProvidersControlsFile']['user_id'] = $_SESSION['Auth']['User']['id'];
                $file['ProvidersControlsFile']['providers_file_name'] = $data_stat['name'].$ext;
                $file['ProvidersControlsFile']['providers_file_name_desc'] = $this->data['ProvidersControlsFile']['upload']['name'];
                $file['ProvidersControlsFile']['providers_md5sum_check'] = $md5;
                $file['ProvidersControlsFile']['created'] = $data_stat['datetime'];
                $file['ProvidersControlsFile']['modified'] = null;
                $file['ProvidersControlsFile']['_status'] = '1';

                $this->ProvidersControlsFile->create();

			if ($this->ProvidersControlsFile->save($file)) {
                $providers_controls_files_id = $this->ProvidersControlsFile->getLastInsertId();
            /**=======================================================*/
            //             The file is correct

            move_uploaded_file($this->data['ProvidersControlsFile']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext);
            $file = WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext;

			if ( in_array($ext,array('.xls','.xlsx')) === TRUE) {

				$filename = WWW_ROOT.'files'.DS.'providers'.DS.$name;

				$this->convertXLStoCSV($file,$filename.'.csv');

				$file_csv = $filename.'.csv';

			} else if ($ext === '.csv') {

				$file_csv = $file ;
			} else {
				$this->redirect(array('action' => 'add'));
			}

            /**=======================================================*/

                $lines = file($file_csv,FILE_SKIP_EMPTY_LINES);

				$line_num_start = 0;
				foreach ($lines as $line_num => $line) {
					$chop_lines = explode(',',str_replace('"','',$line));
					if ($line_num == 0) {
                        $providers_data_headers = $chop_lines;
					}

					if(ctype_digit($chop_lines[0])){

                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start] = array_combine($providers_data_headers,$chop_lines);
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['providers_imported_files_controls_id'] = $providers_controls_files_id ;
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['user_id'] = $_SESSION['Auth']['User']['id'];
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['created'] = $data_stat['datetime'];
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['modified'] = null;
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['_status'] = '1';
						++$line_num_start;
					}
				}
			}

// 			debug($providers_data_model);
// 			exit();
			$this->LoadModel('ProvidersImportedDatabase');
			if($this->ProvidersImportedDatabase->saveAll($providers_data_model['ProvidersImportedDatabase'])) {

				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									<strong>Su archivo de datos se ha Guardado Correctamente</strong> with number of file '.$providers_controls_files_id.'
									ahora ir al
									<a href="'.$this->webroot.'/ProvidersControlsFiles/index/page:1/sort:id/direction:asc" class="alert-link">ProvidersControlsFiles</a>
									</div>', true)
								);
				///
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong>Su archivo de datos no pudo guardarse correctamente!</strong>
												puede volver al
												<a href="'.$this->webroot.'/ProvidersControlsFiles/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de ProvidersControlsFiles</a>
												o intentarlo de nuevo
											</div>', true));
			}
			$this->redirect($this->referer());
		} // if this->data


     } //endif()DAta
	} //end_data





	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers controls file', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersControlsFile->save($this->data)) {
				$this->Session->setFlash(__('The providers controls file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers controls file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersControlsFile->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers controls file', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersControlsFile->delete($id)) {
			$this->Session->setFlash(__('Providers controls file deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers controls file was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
