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
				// init_set("output_buffering",4096);
				// init_set("output_handler",'');
				// init_set("zlib.output_compression",'off');
				// apache_getenv("no-gzip");
				// ini_set("zlib.output_compression", 0); // this issue are from production server that enable ob_gzhandler by defautl
				// ini_set("output_handler", "off"); // this issue are from production server that enable ob_gzhandler by defautl
				// ob_end_clean(); //Clean (erase) the output buffer
				// flush();
				// ob_start();
			}


			function update() {

				Configure::write('debug',2);
				// App::uses('Xml', 'Lib');
				$posted = json_decode(base64_decode($this->params['named']['data']),true);

				debug('POSTED');
				debug($posted);
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

	//
				// debug($conditionsBl);


	// exit();
				$providersViewRelations = $this->ProvidersViewRelation->find('all',array('conditions'=>$conditionsBl));

				// $ProvidersViewRelationss = $this->ProvidersViewRelation->find('all');

	// debug($ProvidersViewRelations);


	//
	// 			foreach ($ProvidersViewRelations as $key => $value) {
	// 				// code...
	// 				// debug($key);
	// 				 // debug($value['ProvidersViewRelation']['xml']);
	// 				 // $xmlm = $value['ProvidersViewRelation']['xml'];
	//
	// 				 // $xml[] = new SimpleXMLElement($value['ProvidersViewRelation']['xml']);
	// 				 $xml = new SimpleXMLElement($value['ProvidersViewRelation']['xml']);
	// 				 // $xml = simplexml_load_string($value['ProvidersViewRelation']['xml']);
	// 				 // $json = json_encode($xml);
	// 				 // $array = json_decode($json,TRUE);
	//
	// 				 // debug($xml);
	//
	// 				// var_dump($xml->children());
	// 				// $ns = $xml->getNamespaces(true);
	// 				// debug($ns);
	// 				// $xml->registerXPathNamespace('cfdi', $ns['cfdi']);
	// 				// $xml->registerXPathNamespace('t', $ns['tfd']);
	// 				// debug($xml->getName());
	//
	//
	// 				$addenum = $xml->addChild('Addenda');
	// 				$addspace = $addenum->addChild('eu:AddendaEU',null,"http://factura.envasesuniversales.com/addenda/eu");
	// 				$addspace->addAttribute( "xmlns:xsi:schemaLocation", ">http://factura.envasesuniversales.com/addenda/eu http://factura.envasesuniversales.com/addenda/eu/EU_Addenda.xsd");
	//
	// 				$tipoFactura = $addspace->addChild('TipoFactura');
	// 				$tipoFactura->addChild('IdFactura',$value['ProvidersViewRelation']['IdFactura']);
	// 				$tipoFactura->addChild('Version',$value['ProvidersViewRelation']['Version']);
	// 				$tipoFactura->addChild('FechaMensaje',$value['ProvidersViewRelation']['FechaMensaje']);
	//
	// 				$tipoTransaction = $addspace->addChild('TipoTransaccion');
	// 				$tipoTransaction->addChild('IdTransaccion',$value['ProvidersViewRelation']['IdTransaccion']);
	// 				$tipoTransaction->addChild('Transaccion',$value['ProvidersViewRelation']['Transaccion']);
	//
	// 				$ordenesCompra = $addspace->addChild('OrdenesCompra');
	// 					$secuencia = $ordenesCompra->addChild('Secuencia');
	// 						$secuencia->addAttribute("consec","1");
	// 						$secuencia->addChild('IdPedido', $value['ProvidersViewRelation']['IdPedido'] );
	// 							$addAlbaran = $secuencia->addChild('EntradaAlmacen');
	// 							$addAlbaran->addChild('Albaran',$value['ProvidersViewRelation']['Albaran']);
	//
	// 				$addMoneda = $addspace->addChild('Moneda');
	// 				$addMoneda->addChild('MonedaCve',$value['ProvidersViewRelation']['MonedaCve']);
	// 				$addMoneda->addChild('TipoCambio',$value['ProvidersViewRelation']['TipoCambio']);
	// 				$addMoneda->addChild('SubtotalM',$value['ProvidersViewRelation']['SubtotalM']);
	// 				$addMoneda->addChild('TotalM',$value['ProvidersViewRelation']['TotalM']);
	// 				$addMoneda->addChild('ImpuestoM',$value['ProvidersViewRelation']['ImpuestoM']);
	//
	// 				$addImpuestosR = $addspace->addChild('ImpuestosR');
	// 				$addImpuestosR->addChild('BaseImpuesto',$value['ProvidersViewRelation']['BaseImpuesto']);
	//
	// // Add to data
	//
	// 				$ProvidersViewRelations[$key]['ProvidersViewRelation']['addenum'] = base64_encode($xml->asXML());
	//
	// // $xmlfile[] = $xml->asXML();
	// 				// $json = json_encode($xml->asXML());
	// 				// debug($json);
	// 				// $array = json_decode($json,TRUE);
	//
	// 				//Format XML to save indented tree rather than one line
	// 				// $dom = new DOMDocument('1.0');
	// 				// $dom->preserveWhiteSpace = false;
	// 				// $dom->formatOutput = true;
	// 				// $dom->preserveWhiteSpace = false;
	// 				// $dom->formatOutput = false;
	// 				// $dom->loadXML($xml->asXML());
	// 				//Echo XML - remove this and following line if echo not desired
	// 				// echo $dom->saveXML();
	// 				//Save XML to file - remove this and following line if save not desired
	// 				// $dom->save('/tmp/fileName.xml');
	//
	//
	//
	//
	//
	// 		 	// header('Content-type: "text/xml"; charset="utf8"');
	// 		 	// header('Content-disposition: attachment; filename="example.xml"');
	// 			// echo $xml->asXML();
	//
	//
	// // exit();
	//
	// /*
	// 				//EMPIEZO A LEER LA INFORMACION DEL CFDI E IMPRIMIRLA
	// 				foreach ($xml->xpath('//cfdi:Comprobante') as $cfdiComprobante){
	//
	// 					debug($cfdiComprobante);
	// 				    //   echo $cfdiComprobante['Version'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['Fecha'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['Sello'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['Total'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['SubTotal'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['Certificado'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['FormaDePago'];
	// 					  // echo "<br>";
	// 					  // echo $cfdiComprobante['MetodoPago'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['NoCertificado'];
	// 				    //   echo "<br />";
	// 				    //   echo $cfdiComprobante['TipoDeComprobante'];
	// 				    //   echo "<br />";
	// 				}
	// 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor') as $Emisor){
	// 					debug($Emisor);
	// 					 // echo $Emisor['Rfc'];
	// 				   // echo "<br />";
	// 				   // echo $Emisor['Nombre'];
	// 				   // echo "<br />";
	// 				}
	// 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:DomicilioFiscal') as $DomicilioFiscal){
	//
	// 					debug($DomicilioFiscal);
	// 				   // echo $DomicilioFiscal['Pais'];
	// 				   // echo "<br />";
	// 				   // echo $DomicilioFiscal['Calle'];
	// 				   // echo "<br />";
	// 				   // echo $DomicilioFiscal['Estado'];
	// 				   // echo "<br />";
	// 				   // echo $DomicilioFiscal['Colonia'];
	// 				   // echo "<br />";
	// 				   // echo $DomicilioFiscal['Municipio'];
	// 				   // echo "<br />";
	// 				   // echo $DomicilioFiscal['NoExterior'];
	// 				   // echo "<br />";
	// 				   // echo $DomicilioFiscal['CodigoPostal'];
	// 				   // echo "<br />";
	// 				}
	// 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Emisor//cfdi:ExpedidoEn') as $ExpedidoEn){
	// 					debug($ExpedidoEn);
	// 				   // echo $ExpedidoEn['Pais'];
	// 				   // echo "<br />";
	// 				   // echo $ExpedidoEn['Calle'];
	// 				   // echo "<br />";
	// 				   // echo $ExpedidoEn['Estado'];
	// 				   // echo "<br />";
	// 				   // echo $ExpedidoEn['Colonia'];
	// 				   // echo "<br />";
	// 				   // echo $ExpedidoEn['NoExterior'];
	// 				   // echo "<br />";
	// 				   // echo $ExpedidoEn['CodigoPostal'];
	// 				   // echo "<br />";
	// 				}
	// 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor') as $Receptor){
	// 					debug($Receptor);
	// 				   // echo $Receptor['Rfc'];
	// 				   // echo "<br />";
	// 				   // echo $Receptor['Nombre'];
	// 				   // echo "<br />";
	// 				}
	// 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Receptor//cfdi:Domicilio') as $ReceptorDomicilio){
	// 					 debug($ReceptorDomicilio);
	// 					 // echo $ReceptorDomicilio['Pais'];
	// 				   // echo "<br />";
	// 				   // echo $ReceptorDomicilio['Calle'];
	// 				   // echo "<br />";
	// 				   // echo $ReceptorDomicilio['Estado'];
	// 				   // echo "<br />";
	// 				   // echo $ReceptorDomicilio['Colonia'];
	// 				   // echo "<br />";
	// 				   // echo $ReceptorDomicilio['Municipio'];
	// 				   // echo "<br />";
	// 				   // echo $ReceptorDomicilio['NoExterior'];
	// 				   // echo "<br />";
	// 				   // echo $ReceptorDomicilio['NoInterior'];
	// 				   // echo "<br />";
	// 				   // echo $ReceptorDomicilio['CodigoPostal'];
	// 				   // echo "<br />";
	// 				}
	// 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Conceptos//cfdi:Concepto') as $Concepto){
	// 					debug($Concepto);
	// 					 // echo "<br />";
	// 				   // echo $Concepto['Unidad'];
	// 				   // echo "<br />";
	// 				   // echo $Concepto['Importe'];
	// 				   // echo "<br />";
	// 				   // echo $Concepto['Cantidad'];
	// 				   // echo "<br />";
	// 				   // echo $Concepto['Descripcion'];
	// 				   // echo "<br />";
	// 				   // echo $Concepto['ValorUnitario'];
	// 				   // echo "<br />";
	// 				   // echo "<br />";
	// 				}
	// 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
	// 					debug($Traslado);
	// 					 // echo $Traslado['Tasa'];
	// 				   // echo "<br />";
	// 				   // echo $Traslado['Importe'];
	// 				   // echo "<br />";
	// 				   // echo $Traslado['Impuesto'];
	// 				   // echo "<br />";
	// 				   // echo "<br />";
	// 				}
	//
	// 				foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
	// 					 debug($tfd);
	// 					 // echo $tfd['SelloCFD'];
	// 				   // echo "<br />";
	// 				   // echo $tfd['FechaTimbrado'];
	// 				   // echo "<br />";
	// 				   // echo $tfd['UUID'];
	// 				   // echo "<br />";
	// 				   // echo $tfd['NoCertificadoSAT'];
	// 				   // echo "<br />";
	// 				   // echo $tfd['Version'];
	// 				   // echo "<br />";
	// 				   // echo $tfd['SelloSAT'];
	// 				}
	// */
	//
	//
	// 			 }


	// debug($ProvidersViewRelations);


	/*
	foreach ($ProvidersViewRelations as $dkey => $dvalue) {
		// code...

		$xml = new SimpleXMLElement($dvalue['ProvidersViewRelation']['addenum']);
			print "<pre><textarea style=\"width:1600px;height:1600px;\">";
				$dom = new DOMDocument('1.0');
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = true;
				$dom->preserveWhiteSpace = false;
				$dom->formatOutput = false;
				$dom->loadXML($xml->asXML());
				// Echo XML - remove this and following line if echo not desired
				echo $dom->saveXML();
				 // echo $xml->asXML();
			print "</textarea></pre>";

	}
	*/


			$this->set(compact('providersViewRelations'));

				// NOTE set the response output for an ajax call
				Configure::write('debug', 0);
				$this->autoLayout = false;

			}


	function index() {
		// index-section
			$this->ProvidersControlsFile->recursive = 0;
			$this->set('providersControlsFiles', $this->paginate());
		// NOTE File section

		if (!empty($this->data)) {

			debug($this->data);
			debug($this->data['ProvidersControlsFile']['upload']);

exit();
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
                $file['ProvidersControlsFile']['_status'] = '1';

                $this->ProvidersControlsFile->create();

			if ($this->ProvidersControlsFile->save($file)) {

			$providers_controls_files_id = $this->ProvidersControlsFile->getLastInsertId();
      /**=======================================================*/
      //             The file is correct

			// NOTE Hir must validate the xml

      move_uploaded_file($this->data['ProvidersControlsFile']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext);
            $file = WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext;

			if ( in_array($ext,array('.xls','.xlsx')) === TRUE) {

				$filename = WWW_ROOT.'files'.DS.'providers'.DS.$name;

				$this->convertXLStoCSV($file,$filename.'.csv');

				$file_csv = $filename.'.csv';

			} else if ($ext === '.csv') {

				$file_csv = $file ;
			} else {
				// $this->redirect(array('action' => 'add'));
			}
    /**=======================================================*/

      // $lines = file($file_csv,FILE_SKIP_EMPTY_LINES);

				// $line_num_start = 0;
				// foreach ($lines as $line_num => $line) {
				// 	$chop_lines = explode(',',str_replace('"','',$line));
				// 	if ($line_num == 0) {
        //                 $providers_data_headers = $chop_lines;
				// 	}
				//
				// 	if(ctype_digit($chop_lines[0])){
				//
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start] = array_combine($providers_data_headers,$chop_lines);
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['providers_imported_files_controls_id'] = $providers_controls_files_id ;
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['user_id'] = $_SESSION['Auth']['User']['id'];
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['created'] = $data_stat['datetime'];
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['modified'] = null;
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['_status'] = '1';
				// 		++$line_num_start;
				// 	}
				// }
			}
// debug($providers_controls_files_id);
// 			debug($providers_data_model);
			// exit();
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
