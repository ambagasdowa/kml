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
class AddenumViewAlbaranRelationsController extends AppController {

	var $name = 'AddenumViewAlbaranRelations';



		function date_convert($date) {
			//1. Transform request parameters to MySQL datetime format.
			$date_return = null;
			$date_init = new DateTime($date);
			$start =  $date_init->format('Y-m-d');
			return $start;
		}


		function link() {

				Configure::write('debug',0);
				$this->loadModel('AddenumViewAlbaranRelation');
			if(isset($this->params['named']['id'])){
				$conditionsBl['AddenumViewAlbaranRelation.BatNbr'] = $this->params['named']['id'];
			} else {
				break;
			}

			$addenumViewAlbaranRelations = $this->AddenumViewAlbaranRelation->find('all',array('conditions'=>$conditionsBl));

			foreach ($addenumViewAlbaranRelations as $key => $value) {
				// code...
				// debug($key);
				 // debug($value['AddenumViewAlbaranRelation']['xml']);
				 // $xmlm = $value['AddenumViewAlbaranRelation']['xml'];

				 // $xml[] = new SimpleXMLElement($value['AddenumViewAlbaranRelation']['xml']);
				 $xml = new SimpleXMLElement($value['AddenumViewAlbaranRelation']['xml']);
				 // $xml = simplexml_load_string($value['AddenumViewAlbaranRelation']['xml']);
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
				$tipoFactura->addChild('IdFactura',$value['AddenumViewAlbaranRelation']['IdFactura']);
				$tipoFactura->addChild('Version',$value['AddenumViewAlbaranRelation']['Version']);
				$tipoFactura->addChild('FechaMensaje',$value['AddenumViewAlbaranRelation']['FechaMensaje']);

				$tipoTransaction = $addspace->addChild('TipoTransaccion');
				$tipoTransaction->addChild('IdTransaccion',$value['AddenumViewAlbaranRelation']['IdTransaccion']);
				$tipoTransaction->addChild('Transaccion',$value['AddenumViewAlbaranRelation']['Transaccion']);

				$ordenesCompra = $addspace->addChild('OrdenesCompra');
					$secuencia = $ordenesCompra->addChild('Secuencia');
						$secuencia->addAttribute("consec","1");
						$secuencia->addChild('IdPedido', $value['AddenumViewAlbaranRelation']['IdPedido'] );
							$addAlbaran = $secuencia->addChild('EntradaAlmacen');
							$addAlbaran->addChild('Albaran',$value['AddenumViewAlbaranRelation']['Albaran']);

				$addMoneda = $addspace->addChild('Moneda');
				$addMoneda->addChild('MonedaCve',$value['AddenumViewAlbaranRelation']['MonedaCve']);
				$addMoneda->addChild('TipoCambio',$value['AddenumViewAlbaranRelation']['TipoCambio']);
				$addMoneda->addChild('SubtotalM',$value['AddenumViewAlbaranRelation']['SubtotalM']);
				$addMoneda->addChild('TotalM',$value['AddenumViewAlbaranRelation']['TotalM']);
				$addMoneda->addChild('ImpuestoM',$value['AddenumViewAlbaranRelation']['ImpuestoM']);

				$addImpuestosR = $addspace->addChild('ImpuestosR');
				$addImpuestosR->addChild('BaseImpuesto',$value['AddenumViewAlbaranRelation']['BaseImpuesto']);

				$name = $value['AddenumViewAlbaranRelation']['BatNbr'];
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
			ini_set("zlib.output_compression", 1); // this issue are from production server that enable ob_gzhandler by defautl
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
			$this->loadModel('AddenumViewAlbaranRelation');
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
			$this->loadModel('AddenumViewAlbaranRelation');
			$conditions = array();
			$add_conditions = array();
			foreach ( $posted as $keys => $postvalue ) {

				if ( $keys > 0 ) {
					$content = $postvalue['name'];
					// debug($postvalue['value']);
					$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
					// debug($chars);
					if ( isset($chars[1]) && $chars[1] == 'AddenumViewAlbaranRelations' && $postvalue['value'] != '') {

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

			// debug($this->date_convert($add_conditions['dateini']));

			if (isset($add_conditions['dateini']) && isset($add_conditions['dateend'])){
				// code for both date

				$conditionsBl = array('AddenumViewAlbaranRelation.FechaMensaje BETWEEN ? AND ?'=> array ($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));

			} elseif (isset($add_conditions['dateini']) || isset($add_conditions['dateend'])){

					if( isset($add_conditions['dateini']) ) {
						$conditionsBl['AddenumViewAlbaranRelation.FechaMensaje'] = $this->date_convert($add_conditions['dateini']);
					} else {
						$conditionsBl['AddenumViewAlbaranRelation.FechaMensaje'] = $this->date_convert($add_conditions['dateend']);
					}
			} else {
				// $add_conditions['dateini'] = null;
				// $add_conditions['dateend'] = null;
				// $conditionsBl['AddenumViewAlbaranRelation.FechaMensaje'] = $this->date_convert(date('Y-m-d'));
			}



			if(isset($add_conditions['BatNbr'])){
				$conditionsBl['AddenumViewAlbaranRelation.BatNbr'] = $add_conditions['BatNbr'];
			}

//
			// debug($conditionsBl);


// exit();
			$addenumViewAlbaranRelations = $this->AddenumViewAlbaranRelation->find('all',array('conditions'=>$conditionsBl));

// debug($conditions);


//
// 			foreach ($addenumViewAlbaranRelations as $key => $value) {
// 				// code...
// 				// debug($key);
// 				 // debug($value['AddenumViewAlbaranRelation']['xml']);
// 				 // $xmlm = $value['AddenumViewAlbaranRelation']['xml'];
//
// 				 // $xml[] = new SimpleXMLElement($value['AddenumViewAlbaranRelation']['xml']);
// 				 $xml = new SimpleXMLElement($value['AddenumViewAlbaranRelation']['xml']);
// 				 // $xml = simplexml_load_string($value['AddenumViewAlbaranRelation']['xml']);
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
// 				$tipoFactura->addChild('IdFactura',$value['AddenumViewAlbaranRelation']['IdFactura']);
// 				$tipoFactura->addChild('Version',$value['AddenumViewAlbaranRelation']['Version']);
// 				$tipoFactura->addChild('FechaMensaje',$value['AddenumViewAlbaranRelation']['FechaMensaje']);
//
// 				$tipoTransaction = $addspace->addChild('TipoTransaccion');
// 				$tipoTransaction->addChild('IdTransaccion',$value['AddenumViewAlbaranRelation']['IdTransaccion']);
// 				$tipoTransaction->addChild('Transaccion',$value['AddenumViewAlbaranRelation']['Transaccion']);
//
// 				$ordenesCompra = $addspace->addChild('OrdenesCompra');
// 					$secuencia = $ordenesCompra->addChild('Secuencia');
// 						$secuencia->addAttribute("consec","1");
// 						$secuencia->addChild('IdPedido', $value['AddenumViewAlbaranRelation']['IdPedido'] );
// 							$addAlbaran = $secuencia->addChild('EntradaAlmacen');
// 							$addAlbaran->addChild('Albaran',$value['AddenumViewAlbaranRelation']['Albaran']);
//
// 				$addMoneda = $addspace->addChild('Moneda');
// 				$addMoneda->addChild('MonedaCve',$value['AddenumViewAlbaranRelation']['MonedaCve']);
// 				$addMoneda->addChild('TipoCambio',$value['AddenumViewAlbaranRelation']['TipoCambio']);
// 				$addMoneda->addChild('SubtotalM',$value['AddenumViewAlbaranRelation']['SubtotalM']);
// 				$addMoneda->addChild('TotalM',$value['AddenumViewAlbaranRelation']['TotalM']);
// 				$addMoneda->addChild('ImpuestoM',$value['AddenumViewAlbaranRelation']['ImpuestoM']);
//
// 				$addImpuestosR = $addspace->addChild('ImpuestosR');
// 				$addImpuestosR->addChild('BaseImpuesto',$value['AddenumViewAlbaranRelation']['BaseImpuesto']);
//
// // Add to data
//
// 				$addenumViewAlbaranRelations[$key]['AddenumViewAlbaranRelation']['addenum'] = base64_encode($xml->asXML());
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


// debug($addenumViewAlbaranRelations);


/*
foreach ($addenumViewAlbaranRelations as $dkey => $dvalue) {
	// code...

	$xml = new SimpleXMLElement($dvalue['AddenumViewAlbaranRelation']['addenum']);
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


		$this->set(compact('addenumViewAlbaranRelations'));

			// NOTE set the response output for an ajax call
			Configure::write('debug', 0);
			$this->autoLayout = false;

		}



	function index() {
		$this->AddenumViewAlbaranRelation->recursive = 0;
		$this->set('addenumViewAlbaranRelations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid addenum view albaran relation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('addenumViewAlbaranRelation', $this->AddenumViewAlbaranRelation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AddenumViewAlbaranRelation->create();
			if ($this->AddenumViewAlbaranRelation->save($this->data)) {
				$this->Session->setFlash(__('The addenum view albaran relation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The addenum view albaran relation could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid addenum view albaran relation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AddenumViewAlbaranRelation->save($this->data)) {
				$this->Session->setFlash(__('The addenum view albaran relation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The addenum view albaran relation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AddenumViewAlbaranRelation->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for addenum view albaran relation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AddenumViewAlbaranRelation->delete($id)) {
			$this->Session->setFlash(__('Addenum view albaran relation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Addenum view albaran relation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
