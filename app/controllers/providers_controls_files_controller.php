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

					debug($this->params);
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


			function validate( $xml_path = null, $BatNbr = null , $CpnyId = null ) {
				// Liberar LOTE

			// NOTE call to structure validation with xls engine
				//WARNING  maybe we need extract the content of the file as 1st step readfile()

	// print_r();


	        // $file = current(file($xml_path));

					// $xml = new SimpleXMLElement($file);

					$xml = simplexml_load_file($xml_path, 'SimpleXMLElement',LIBXML_NOCDATA);

					// $xml = simplexml_load_string($value['AddenumViewAlbaranRelation']['xml']);
					// $json = json_encode($xml);
					// $array = json_decode($json,TRUE);

					// debug($xml);
					// exit();
	        $response = array();
				 // var_dump($xml->children());
				 $ns = $xml->getNamespaces(true);
				 // debug($ns);
				 foreach ($ns as $key => $value) {
				 	// code...
						$xml->registerXPathNamespace($key, $ns[$key]);
				 }

				 // $xml->registerXPathNamespace('cfdi', $ns['cfdi']);
				 // $xml->registerXPathNamespace('t', $ns['tfd']);

				 // debug($xml->getName());
// exit();
		 				//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
		 				foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){

		 					// debug($cfdiComprobante);
		 					// print_r($cfdiComprobante);
		 				    //   echo $cfdiComprobante['Version'];
		 				    //   echo "<br />";
		 				    //   echo $cfdiComprobante['Fecha'];
		 				    //   echo "<br />";
		 				    //   echo $cfdiComprobante['Sello'];
		 				    //   echo "<br />";
	 				      // echo $cfdiComprobante['Total'];
	 				      // echo "<br />";
		 				    //   echo $cfdiComprobante['SubTotal'];
		 				    //   echo "<br />";
		 				    //   echo $cfdiComprobante['Certificado'];
		 				    //   echo "<br />";
		 				    //   echo $cfdiComprobante['FormaDePago'];
		 					  // echo "<br>";
		 					  // echo $cfdiComprobante['MetodoPago'];
		 				    //   echo "<br />";
		 				    //   echo $cfdiComprobante['NoCertificado'];
		 				    //   echo "<br />";
		 				    //   echo $cfdiComprobante['TipoDeComprobante'];
		 				    //   echo "<br />";
								$response['Sello'] = $cfdiComprobante['Sello'];
								$response['Total'] = $cfdiComprobante['Total'];
								$response['SubTotal'] = $cfdiComprobante['SubTotal'];
								$response['Certificado'] = $cfdiComprobante['Certificado'];
								$response['FormaDePago'] = $cfdiComprobante['FormaDePago'];
								$response['MetodoPago'] = $cfdiComprobante['MetodoPago'];
								$response['NoCertificado'] = $cfdiComprobante['NoCertificado'];
								$response['TipoDeComprobante'] = $cfdiComprobante['TipoDeComprobante'];
		 				}
		 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
		 					// print_r($Emisor);
		 					// debug($Emisor);
		 					 // echo $Emisor['Rfc'];
	             $response['re'] = $Emisor['Rfc'];
		 				   // echo "<br />";
		 				   // echo $Emisor['Nombre'];
		 				   // echo "<br />";
		 				}
		 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){

		 					// print_r($DomicilioFiscal);
		 					// debug($DomicilioFiscal);
		 				   // echo $DomicilioFiscal['Pais'];
		 				   // echo "<br />";
		 				   // echo $DomicilioFiscal['Calle'];
		 				   // echo "<br />";
		 				   // echo $DomicilioFiscal['Estado'];
		 				   // echo "<br />";
		 				   // echo $DomicilioFiscal['Colonia'];
		 				   // echo "<br />";
		 				   // echo $DomicilioFiscal['Municipio'];
		 				   // echo "<br />";
		 				   // echo $DomicilioFiscal['NoExterior'];
		 				   // echo "<br />";
		 				   // echo $DomicilioFiscal['CodigoPostal'];
		 				   // echo "<br />";
		 				}
		 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){
		 					// print_r($ExpedidoEn);
		 					// debug($ExpedidoEn);
		 				   // echo $ExpedidoEn['Pais'];
		 				   // echo "<br />";
		 				   // echo $ExpedidoEn['Calle'];
		 				   // echo "<br />";
		 				   // echo $ExpedidoEn['Estado'];
		 				   // echo "<br />";
		 				   // echo $ExpedidoEn['Colonia'];
		 				   // echo "<br />";
		 				   // echo $ExpedidoEn['NoExterior'];
		 				   // echo "<br />";
		 				   // echo $ExpedidoEn['CodigoPostal'];
		 				   // echo "<br />";
		 				}
		 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
		 					// print_r($Receptor);
		 					// debug($Receptor);
		 				   // echo $Receptor['Rfc'];
	             $response['rr'] = $Receptor['Rfc'];
		 				   // echo "<br />";
		 				   // echo $Receptor['Nombre'];
		 				   // echo "<br />";
		 				}
		 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){
		 					 // print_r($ReceptorDomicilio);
		 					 // debug($ReceptorDomicilio);
		 					 // echo $ReceptorDomicilio['Pais'];
		 				   // echo "<br />";
		 				   // echo $ReceptorDomicilio['Calle'];
		 				   // echo "<br />";
		 				   // echo $ReceptorDomicilio['Estado'];
		 				   // echo "<br />";
		 				   // echo $ReceptorDomicilio['Colonia'];
		 				   // echo "<br />";
		 				   // echo $ReceptorDomicilio['Municipio'];
		 				   // echo "<br />";
		 				   // echo $ReceptorDomicilio['NoExterior'];
		 				   // echo "<br />";
		 				   // echo $ReceptorDomicilio['NoInterior'];
		 				   // echo "<br />";
		 				   // echo $ReceptorDomicilio['CodigoPostal'];
		 				   // echo "<br />";
		 				}
		 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){
		 					// print_r($Concepto);
		 					// debug($Concepto);
		 					 // echo "<br />";
		 				   // echo $Concepto['Unidad'];
		 				   // echo "<br />";
		 				   // echo $Concepto['Importe'];
		 				   // echo "<br />";
		 				   // echo $Concepto['Cantidad'];
		 				   // echo "<br />";
		 				   // echo $Concepto['Descripcion'];
		 				   // echo "<br />";
		 				   // echo $Concepto['ValorUnitario'];
							 	$response['Unidad'] = $Concepto['Unidad'];
							 	$response['ImporteConcepto'] = $Concepto['Importe'];
							 	$response['Cantidad'] = $Concepto['Cantidad'];
							 	$response['Descripcion'] = $Concepto['Descripcion'];
							 	$response['ValorUnitario'] = $Concepto['ValorUnitario'];
		 				}
		 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
		 					// print_r($Traslado);
		 					// debug($Traslado);
		 					 // echo $Traslado['TasaOCuota'];
		 				   // echo "<br />";
		 				   // echo $Traslado['Importe'];
		 				   // echo "<br />";
		 				   // echo $Traslado['Impuesto'];
							 $response['TasaOCuota'] = $Traslado['TasaOCuota'];
							 $response['ImporteTraslado'] = $Traslado['Importe'];
							 $response['Impuesto'] = $Traslado['Impuesto'];
		 				}

		 				foreach ($xml->xpath('//tfd:TimbreFiscalDigital') as $tfd) {
		 					 // print_r($tfd);
		 					 // debug($tfd);
		 					 // echo $tfd['SelloCFD'];
		 				   // echo "<br />";
		 				   // echo $tfd['FechaTimbrado'];
		 				   // echo "<br />";
		 				   // echo $tfd['UUID'];
		 				   // echo "<br />";
		 				   // echo $tfd['NoCertificadoSAT'];
		 				   // echo "<br />";
		 				   // echo $tfd['Version'];
		 				   // echo "<br />";
		 				   // echo $tfd['SelloSAT'];
							 $response['uuid'] = $tfd['UUID'];
	             $response['selloCFD'] = $tfd['selloCFD'];
	             $response['FechaTimbrado'] = $tfd['FechaTimbrado'];
	             $response['NoCertificadoSAT'] = $tfd['NoCertificadoSAT'];
	             $response['Version'] = $tfd['Version'];
	             $response['selloSAT'] = $tfd['selloSAT'];
		 				}

						if (array_key_exists('implocal',$ns)) {

							foreach ($xml->xpath('//implocal:ImpuestosLocales//implocal:TrasladosLocales') as $implocal) {
								// code...ImpLocTrasladado="ISH" TasadeTraslado="4" Importe="92.00"
								$response['ImpLocTrasladado'] = $implocal['ImpLocTrasladado'];
								$response['TasadeTraslado'] = $implocal['TasadeTraslado'];
								$response['Importe'] = $implocal['Importe'];
							}

						}

	          return $response;

	      }  //WARNING End of validate



				function check_sat( $info = array(), $ref_data = array() ) {
				// debug('INFO INSIDE CHECKSAT');
				// debug($info);

				// NOTE Firts check after check in sat servers
				// WARNING several check's beetwen the xml file and solomon records  just add in hir
				// NOTE Call refData[1] => this is the batnbr ->connect to batch and vallidate
				// NOTE model => ProvidersViewBatchAmount
				$this->LoadModel('ProvidersViewBatchAmount');
				$amount = current($info['Total']);
				$BatNbr = $ref_data[1];
				$CpnyId = $ref_data[2];

				$conditionsAmount['ProvidersViewBatchAmount.BatNbr'] = $BatNbr;
				$conditionsAmount['ProvidersViewBatchAmount.CpnyId'] = $CpnyId;
				$result = $this->ProvidersViewBatchAmount->find('first',array( 'conditions' => $conditionsAmount));
				// NOTE amounts
				$xml_amount = $amount ;
				$slx_amount = $result['ProvidersViewBatchAmount']['crtot'];
				$is_exceded = abs($slx_amount - $xml_amount);

				 // debug($is_exceded);
				// debug($result);

				if ($is_exceded > 10 ) {
					// code...
					$message = 'El Monto no Concuerda: Monto Xml ['.number_format($xml_amount, 2, '.', ',').'] , Monto en Sistema ['.number_format($slx_amount, 2, '.', ',').']';

					$responseCode = array(
																	'message'=>'<div class="alert alert-danger alert-dismissible fade in" role="alert">
																								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																								<span aria-hidden="true">&times;</span>
																								</button>'.$message.'
																							</div>',
																	'status'=>false
															 );
					return $responseCode;
				}

				// debug('go out is ok!');
				// exit();

				// $batnbr =
// exit();
					// debug(current($info['uuid']));
					$curl = curl_init();
							curl_setopt_array($curl, array(
								CURLOPT_URL => "https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl=",
								CURLOPT_RETURNTRANSFER => true,
								CURLOPT_ENCODING => "",
								CURLOPT_MAXREDIRS => 10,
								CURLOPT_TIMEOUT => 30,
								CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								CURLOPT_CUSTOMREQUEST => "POST",
								CURLOPT_POSTFIELDS => "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\">\n   <soapenv:Header/>\n   <soapenv:Body>\n      <tem:Consulta>\n         <tem:expresionImpresa><![CDATA[?re=".current($info['re'])."&rr=".current($info['rr'])."&tt=".current($info['Total'])."&id=".current($info['uuid'])."]]></tem:expresionImpresa> \n      </tem:Consulta>\n   </soapenv:Body>\n</soapenv:Envelope>",
								CURLOPT_HTTPHEADER => array(
									"Accept: text/xml",
									"Accept-Encoding: gzip, deflate",
									// "Content-Length: 379",
									"Content-type: text/xml;charset=\"utf-8\"",
									"Host: consultaqr.facturaelectronica.sat.gob.mx",
									"Postman-Token: 662e6b92-6fa3-4127-b1fd-e9b3f8c51dce,ef9e2caf-bbee-453e-b7fe-702251b65696",
									"SOAPAction: http://tempuri.org/IConsultaCFDIService/Consulta",
									"User-Agent: PostmanRuntime/7.20.1",
									"cache-control: no-cache,no-cache"
								)
							)
					);

					$response = curl_exec($curl);
					$err = curl_error($curl);

					curl_close($curl);
					//
					// debug('SETRESPONSE');
					// print('<pre>');
					// print_r($response);
					// print('</pre>');

					$xml = simplexml_load_string($response);

					if ($err) {
						echo
						$message = "cURL Error #:" . $err;
						$return_set = false;
					} else {

							// debug('DEBUG-RESPONSE');
							$ns = $xml->getNamespaces(true);
							$xml->registerXPathNamespace('s', $ns['s']);
							$xml->registerXPathNamespace('a', $ns['a']);
							// debug($xml->getName());
								 foreach ($xml->xpath('//a:CodigoEstatus') as $CodigoResponse){
										$response = $CodigoResponse;
										if (substr(current($response),0,1) == 'S') {
											// save to db Method

											$message = 'El archivo xml se valido <strong> correctamente </strong>';
											$return_set = true;
										} elseif (substr(current($response),0,1) == 'N') {

											if (substr(current($response),2,3) == '601') {
												$message = 'La expresion proporcion impresa no es valida';
												$return_set = false;
											}

											if (substr(current($response),2,3) == '602') {
												$message = 'Comprobante no encontrado';
												$return_set = false;
											}

										} else {   // NOTE end elseif
											$message = 'Comprobante no encontrado';
											$return_set = false;
										}

								 } //NOTE end path
					}
						$responseCode = array(
																		'message'=>'<div class="alert alert-danger alert-dismissible fade in" role="alert">
																									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																									<span aria-hidden="true">&times;</span>
																									</button>'.$message.'
																								</div>',
																		'status'=>$return_set
																 );
					return $responseCode;
					// add return stat
      } //NOTE END CHECKSAT()


			function relation( $file = array() , $fid = null ,$xml = array(),$type = null ) {

				// debug('INSIDE RELATION');
				// debug($file);
				// debug($fid);

				// for file $fid relation with $file
				//
				$this->loadModel('ProvidersAssocVendor');
				$this->loadModel('ProvidersViewRelation');
				$this->loadModel('ProvidersControlsFile');
				$this->loadModel('ProvidersUuidRequest');
				//
				// check if assoc exists
				$fileConditions['ProvidersViewRelation.BatNbr'] = $fileAssc['ProvidersAssocVendor.BatNbr'] = $file[1];
				$fileConditions['ProvidersViewRelation.CpnyID'] = $fileAssc['ProvidersAssocVendor.CpnyID'] = $file[2];
				$fileConditions['ProvidersViewRelation.RefNbr'] = $fileAssc['ProvidersAssocVendor.RefNbr'] = $file[3];

				// $fileConditions['ProvidersViewRelation.BatNbr'] = $file[1];
				// $fileConditions['ProvidersViewRelation.CpnyID'] = $file[2];
				// $fileConditions['ProvidersViewRelation.RefNbr'] = $file[3];

				// $checkFile = $this->ProvidersViewRelation->find('all',array('conditions'=>$filleConditions));
				$checkFile = $this->ProvidersViewRelation->find('all',array('conditions'=>$fileConditions));
				$data = current($checkFile)['ProvidersViewRelation'];

				// debug('DATA');
				// debug($data);
				// debug($xml);
				// debug(current($xml['Total']));
				// debug(current($xml['uuid']));

				// exit();
// WARNING NOTE save xml relation if xml is not empty or type is equal to .xml
// ----=======
	// work form hir
				if ($type == '.xml') {
					$is_xml = true;
						$SaveUUID['ProvidersUuidRequest']['BatNbr'] = $data['BatNbr'];
						$SaveUUID['ProvidersUuidRequest']['CpnyId'] = $data['CpnyID'];
						$SaveUUID['ProvidersUuidRequest']['RefNbr'] = $data['RefNbr'];
						$SaveUUID['ProvidersUuidRequest']['VendId'] = $data['VendId'];
						$SaveUUID['ProvidersUuidRequest']['PONbr'] = $data['PONbr'];
						$SaveUUID['ProvidersUuidRequest']['TermsId'] = $data['TermsId'];
						$SaveUUID['ProvidersUuidRequest']['DueIntrv'] = $data['DueIntrv'];
						$SaveUUID['ProvidersUuidRequest']['InvDate'] = $data['InvDate'];
						$SaveUUID['ProvidersUuidRequest']['InvcNbr'] = $data['InvcNbr'];

						$SaveUUID['ProvidersUuidRequest']['Sello'] = current($xml['Sello']);
						$SaveUUID['ProvidersUuidRequest']['Total'] = current($xml['Total']);
						$SaveUUID['ProvidersUuidRequest']['SubTotal'] = current($xml['SubTotal']);
						$SaveUUID['ProvidersUuidRequest']['Certificado'] = current($xml['Certificado']);
						// $SaveUUID['ProvidersUuidRequest']['FormaDePago'] = current($xml['FormaDePago']);
						$SaveUUID['ProvidersUuidRequest']['MetodoPago'] = current($xml['MetodoPago']);
						$SaveUUID['ProvidersUuidRequest']['NoCertificado'] = current($xml['NoCertificado']);
						$SaveUUID['ProvidersUuidRequest']['TipoDeComprobante'] = current($xml['TipoDeComprobante']);
						$SaveUUID['ProvidersUuidRequest']['re'] = current($xml['re']);
						$SaveUUID['ProvidersUuidRequest']['rr'] = current($xml['rr']);
						$SaveUUID['ProvidersUuidRequest']['Unidad'] = current($xml['Unidad']);
						$SaveUUID['ProvidersUuidRequest']['ImporteConcepto'] = current($xml['ImporteConcepto']);
						$SaveUUID['ProvidersUuidRequest']['Cantidad'] = current($xml['Cantidad']);
						$SaveUUID['ProvidersUuidRequest']['Descripcion'] = current($xml['Descripcion']);
						$SaveUUID['ProvidersUuidRequest']['ValorUnitario'] = current($xml['ValorUnitario']);
						$SaveUUID['ProvidersUuidRequest']['TasaOCuota'] = current($xml['TasaOCuota']);
						$SaveUUID['ProvidersUuidRequest']['ImporteTraslado'] = current($xml['ImporteTraslado']);
						$SaveUUID['ProvidersUuidRequest']['Impuesto'] = current($xml['Impuesto']);
						$SaveUUID['ProvidersUuidRequest']['uuid'] = current($xml['uuid']);
						$SaveUUID['ProvidersUuidRequest']['selloCFD'] = current($xml['selloCFD']);
						$SaveUUID['ProvidersUuidRequest']['FechaTimbrado'] = current($xml['FechaTimbrado']);
						$SaveUUID['ProvidersUuidRequest']['NoCertificadoSAT'] = current($xml['NoCertificadoSAT']);
						$SaveUUID['ProvidersUuidRequest']['Version'] = current($xml['Version']);
						$SaveUUID['ProvidersUuidRequest']['selloSAT'] = current($xml['selloSAT']);

						$SaveUUID['ProvidersUuidRequest']['created'] = date('Y-m-d H:i:s');
						$SaveUUID['ProvidersUuidRequest']['modified'] = date('Y-m-d H:i:s');
						$SaveUUID['ProvidersUuidRequest']['providers_standings_id'] = '1';
						$SaveUUID['ProvidersUuidRequest']['providers_parents_id'] = '1';
						$SaveUUID['ProvidersUuidRequest']['_status'] = 1;

				} else {
					$is_xml = false;
				}

				// debug('SAVEUUID');
				// debug($SaveUUID);


				// if ($this->ProvidersUuidRequest->crsave('compact',$SaveUUID)) {
				if ($this->ProvidersUuidRequest->save($SaveUUID['ProvidersUuidRequest'])) {
					// debug('Save ProvidersUuidRequest ok');
					// $ProvidersUuidRequestId = $this->ProvidersUuidRequest->getLastInsertId();
				} else {
					// debug('Save ProvidersUuidRequest has Error!');
				}

				// debug($this->ProvidersUuidRequest->validationErrors); //show validationErrors
				// debug($this->ProvidersUuidRequest->getDataSource()->getLog(false, false)); //show last sql query

					// debug('COUNT');
					// debug(count($this->ProvidersAssocVendor->find('all',array('conditions'=>$fileAssc))));

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
								// debug('Save ProvidersAssocVendor ok');

								$ProvidersAssocVendorId = $this->ProvidersAssocVendor->getLastInsertId();
//NOTE add xml info
// providers_uuid_requests
							}
					} else {
							$ProvidersAssocVendorId = current($check_assoc)['ProvidersAssocVendor']['id'];
					}

					// debug($ProvidersAssocVendorId);

				// $fileCond['ProvidersControlsFile.id'] = $fid;
				$fileIdUp['ProvidersAssocVendor']['providers_assoc_vendors_id'] = $ProvidersAssocVendorId;
				$fileIdUp['ProvidersAssocVendor']['providers_standings_id'] = $file[4];

				$this->ProvidersControlsFile->id = $fid;
				// if ($this->ProvidersControlsFile->updateAll($fileUp)) {
				if ($this->ProvidersControlsFile->save($fileIdUp['ProvidersAssocVendor'])) {
					// debug('Update File');
				}



				// NOTE last query
				// sistemas.dbo.providers_view_relations
				// Configure::write('debug', 2);
				// debug($data);

				$getUpdated = current($this->ProvidersViewRelation->find('all',array('conditions'=>$fileConditions)))['ProvidersViewRelation'];
				// $data = current($ge)['ProvidersViewRelation'];
				// debug($getUpdated);

				// $anx = $this->Html->url('/files/anexos/', true);

				$app = basename(ROOT);
				$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/";
				$url = 'app/webroot/files/providers_sat/';


				if ($is_xml == true) {
					$response['message'] = 'Su documento se valido y libero correctamente';
					$response['uuid'] = $SaveUUID['ProvidersUuidRequest']['uuid'];
					$response['status'] = $getUpdated['Status'];
					$response['fecha'] = $getUpdated['InvcDate'];
					$response['totalAmt'] = $SaveUUID['ProvidersUuidRequest']['Total'];
					$response['xml'] = "<a id=\"uptXml_{$getUpdated['BatNbr']}\" href=\"{$path}{$url}{$getUpdated['xml_src']}\" download=\"{$getUpdated['xml_name']}\"><i class=\"fa fa-file-text\"></i></a>";
				} else {
					// $response['message'] = 'Su documento se envio correctamente';
					// NOTE: work from hir
					if ($getUpdated['voucher']) {
						$response['voucher'] = "<a id=\"uptVoucher_{$getUpdated['BatNbr']}\" href=\"{$path}{$url}{$getUpdated['voucher_src']}\" download=\"{$getUpdated['voucher_name']}\"><i class=\"fa fa-file-text\"></i></a>";
					}

					if ($getUpdated['order']) {
						$response['order'] = "<a id=\"uptOrder_{$getUpdated['BatNbr']}\" href=\"{$path}{$url}{$getUpdated['order_src']}\" download=\"{$getUpdated['order_name']}\"><i class=\"fa fa-file-text\"></i></a>";
					}
				}
				return $response;
			} // End Relation

			function file_proccess( $form_data = array() , $ref_data = array() ) {

Configure::write('debug',0);
//
// 				debug('FORM_DATA');
// 				debug($form_data);
// 				debug($ref_data);
// 				// $bat = $ref_data[1];
// exit();

				if (isset($form_data)) {
						$this->data['ProvidersControlsFile']['upload'] = $form_data;
				}

				// debug($this->data);

				$file_providers_name = str_replace('.'.end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])),'',$this->data['ProvidersControlsFile']['upload']['name']);

				$md5 = md5_file($this->data['ProvidersControlsFile']['upload']['tmp_name']);

				$stat = stat($this->data['ProvidersControlsFile']['upload']['tmp_name']);

				$conditionsFields['ProvidersControlsFile._md5sum'] = $md5;

				$finderFilename = $this->ProvidersControlsFile->find('all',array('conditions'=>$conditionsFields));


						//NOTE this must be a very rare case but one never knows
						if (count($finderFilename) >= 1) {

							// $this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
							// 					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							// 						<span aria-hidden="true">&times;</span>
							// 					</button>
							// 					El archivo <strong> '.$file_providers_name.' </strong>
							// 					ya se encuentra en la base de datos.
							// 					Por favor elija otro archivo </div>', true));

							$message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												El archivo <strong> '.$file_providers_name.' </strong>
												ya se encuentra en la base de datos.
												Por favor elija otro archivo </div>';
							// $this->redirect($this->referer());
							$response = array('message'=>$message);
							return $response;
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


					$extensions = array( 'xml', 'pdf');

					if( in_array(strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name']))), $extensions ) === FALSE){

						// $this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
						// 								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						// 									<span aria-hidden="true">&times;</span>
						// 								</button>
						// 								<strong> Solo se permiten archivos de texto plano con la extension xml o archivos pdf </strong>
						// 							</div>', true));
						$message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<strong> Solo se permiten archivos de texto plano con la extension xml o archivos pdf </strong>
													</div>';
							$response = array('message'=>$message);
							return $response;
						// $this->redirect(array('action' => 'index'));
					} else {
						$ext = '.' . strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
						// debug('miss');

					}

					$name = basename(md5($this->data['ProvidersControlsFile']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp
					// debug('NAME IN THIS->DATA');
					// debug($name);
					// debug($this->data['ProvidersControlsFile']['upload']['name']);

								$data_stat['name'] = $name;
								$data_stat['ext'] = strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
								if(!isset($ext)){
										$ext = '.' . $data_stat['ext'];
								}

					if ($ext == '.xml') {
						// code...
						// go to validate in SAT if false go to referrer
						//NOTE extract data from xml for analize ,
						$info = $this->validate($this->data['ProvidersControlsFile']['upload']['tmp_name']);

						// debug('VARDUMP');
						// echo '<pre>';
						// var_dump($info);
						// echo '</pre>';

						// debug('CHECKSAT');

						$check = $this->check_sat($info,$ref_data);
						// echo '<pre>';
						debug($check);
						// echo '</pre>';

						// exit();

						if ($check['status'] == false) {

							// print_r($check['message']);
							$response = array('message'=>$check['message']);
							return $response;

							// NOTE change behaivor of the alert againsts response squema
							// $this->Session->setFlash(__($check['message'], true));
							// $this->redirect(array('action' => 'index'));
							// exit();
							//NOTE set mecjha for alert the status
						}
						// print_r($check['message']);
						// $response = array('message'=>$check['message']);
						// return $response;
						// es valido continua
						// no es valido , salir
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
								// debug('REF_DATA');
								$response = $this->relation($ref_data,$providers_controls_files_id,$info,$ext);
						}
					/**=======================================================*/
					}

					// $response = array('message'=>$message,'uuid'=>'the uid','error'=>'cuack');
					return $response;
			} //file_proccess


			function upload() {

				Configure::write('debug',0);
				// App::uses('Xml', 'Lib');
							// debug('FORM');
							// debug($this->params['form']);
							$forms = $this->params['form'];

								foreach ($forms as $key_code => $data_code) {
									// code...
									if($key_code == 'batnbr') {
										// debug('KEYCODE => '.$key_code);
										// debug('DATACODE => '.$data_code);
										$batnbr = $data_code;
									}
										// NOTE split for datacode
											$split_code = explode('_',$key_code);

										if ($data_code['error'] == 0 ) {
											// save the file and set storage
											// debug('$this->file_proccess($data_code,$split_code)');
											$response[] = $this->file_proccess($data_code,$split_code);
											// debug($response);

										}
								}
				//NOTE update table and send data for update download cell
					// $this->set(compact('response'));
							// NOTE set the response output for an ajax call
						// 	Configure::write('debug', 2);
					$count = count($response);
						// debug($response);
							// $this->autoLayout = false;
					if ($count == 2) {
						// NOTE if more than one element
						$response = array_merge($response[0],$response[1]);
					} elseif ($count == 3) {
						// NOTE if more than one element
						$response = array_merge($response[0],$response[2]);
					} else {
						$response = current($response);
					}

					$response = array_merge($response,array('count'=>$count));
					// DEBUG:
					debug($response);
							//4. Return as a json array
							Configure::write('debug', 0);
							$this->autoRender = false;
							$this->autoLayout = false;
					// 		$this->layout='empty';
							$this->header('Content-Type: application/json');
							echo json_encode($response);
			} //NOTE end update


			function _check( $data ) {

			} // ENd _check



			function get() {

				Configure::write('debug',0);
				// App::uses('Xml', 'Lib');

				$posted = json_decode(base64_decode($this->params['named']['data']),true);
				// debug($posted);
				// exit();
				$this->loadModel('ProvidersViewRelation');
				$this->LoadModel('ProjectionsViewBussinessUnit');

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
							$add_conditions[$chars[2]] = $postvalue['value'];
							$conditions[$chars[2]] = $postvalue['value'];
						}
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
					$conditionsBl['ProvidersViewRelation.InvDate'] = $this->date_convert(date('Y-m-d'));
				}


				if( isset($add_conditions['bsu']) ){
					$bsu = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id_area','tname')));
					$conditionsBl['ProvidersViewRelation.CpnyID'] = $bsu[$add_conditions['bsu']];
					// prepare a response
				} elseif( !isset($add_conditions['bsu']) && !isset($add_conditions['BatNbr']))  {
					// $add_conditions['bsu'] = null;
					$message = '<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
											Debe indicar una Unidad de Negocio o un Numero de Lote 1
										</div>';

					// $conditionsBl = null; //WARNING if choose lote then reset all other conditions
					$this->set(compact('message')); //exit();
					return null;
				}


				if(isset($add_conditions['BatNbr'])){
					$conditionsBl = null; //WARNING if choose lote then reset all other conditions
					$conditionsBl['ProvidersViewRelation.BatNbr'] = $add_conditions['BatNbr'];
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
					$conditionsBl['ProvidersViewRelation.VendId'] = $_SESSION['Auth']['User']['username'];
					$conditionsBl['ProvidersViewRelation.isview'] = 1;
				}
				// Configure::write('debug',2);


// debug($message);debug($conditionsBl);exit();

				$providersViewRelations = $this->ProvidersViewRelation->find('all',array('conditions'=>$conditionsBl));

				// debug($providersViewRelations);

				if (!isset($providersViewRelations) || count($providersViewRelations) == 0) {
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

				$this->set(compact('providersViewRelations','route','message'));
// exit();
				// NOTE set the response output for an ajax call
				Configure::write('debug', 0);
				$this->autoLayout = false;

			}


	function index() {
		// index-section
		// Configure::write('debug', 2);
			// $this->ProvidersControlsFile->recursive = 0;
			// $this->set('providersControlsFiles', $this->paginate());
		// NOTE File section
		$this->LoadModel('ProjectionsViewBussinessUnit');
		$bsu = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id_area','tname')));
		// debug($bsu);
		$this->set(compact('bsu'));
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
