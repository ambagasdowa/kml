<?php
App::import('HttpSocket', 'Network/Http');
// App::import('Xml', 'Utility');

  class XmlTestShell extends Shell {
	var $uses = array(
					  'User'
	  );

	/** WARNING EDIT use with caution the conections for mssql is writable */
	/** TODO no p+endings
	 * @usage function idCheck()
	 * @description
	 * 		@conditions=> <conditions to filter for example by year array('ModelName.fieldName'=>'condition') >
	 * 		@tipoOperacion=> <print just print an indicator for example inside of a loop print the times of executing this function>
	 * 		@frecuency=> <print just print an indicator for internal operation if data is erasing or update or delete>
	 * 		@data=> <the data to save as an array in cakephp format example array(['model']=>array(['index']=>['data']))>
	 * 		@model=> <the model to execute this function>
	 * 		@useTable=> <the table to update,erase or save , this is for know which is the last id in the table and for make the alter to the index>
	 * 		@prefix=> <the default is 'id_' if you need overwrite use it else null this value used to found the last id>
	 * 		@debug=> <is not obvious anyway is disabled>
	 */

	/**
	 * @package name <pathMountConfig> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | return the path of backup >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
	/** @BACKUP_CONFIG_SECTION  */

	/** @SET the paths for mounting paths for nomina shell  */
	/** TODO @set <move this to a database configuration>*/
	function pathMountConfig() {
		$pathMountConfig = array(
					'backup_path' => DS.'media'.DS.'db'.DS
					,'usb_path' => DS.'media'.DS.'mssql_backup_disk'.DS
					);
		return $pathMountConfig;
	}



		function validate($xml_path = null) {
			// Liberar LOTE

		// NOTE call to structure validation with xls engine
			//WARNING  maybe we need extract the content of the file as 1st step readfile()

// print_r();


        $file = current(file($xml_path));
				$xml = new SimpleXMLElement($file);

				// $xml = simplexml_load_string($value['AddenumViewAlbaranRelation']['xml']);
				// $json = json_encode($xml);
				// $array = json_decode($json,TRUE);

				// debug($xml);
        $response = array();
			 // var_dump($xml->children());
			 $ns = $xml->getNamespaces(true);
			 // debug($ns);
			 $xml->registerXPathNamespace('cfdi', $ns['cfdi']);
			 $xml->registerXPathNamespace('t', $ns['tfd']);
			 // debug($xml->getName());

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
             $response['Total'] = $cfdiComprobante['Total'];
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
	 				   // echo "<br />";
	 				   // echo "<br />";
	 				}
	 				foreach ($xml->xpath('//cfdi:Comprobante//cfdi:Impuestos//cfdi:Traslados//cfdi:Traslado') as $Traslado){
	 					// print_r($Traslado);
	 					// debug($Traslado);
	 					 // echo $Traslado['Tasa'];
	 				   // echo "<br />";
	 				   // echo $Traslado['Importe'];
	 				   // echo "<br />";
	 				   // echo $Traslado['Impuesto'];
	 				   // echo "<br />";
	 				   // echo "<br />";
	 				}

	 				foreach ($xml->xpath('//t:TimbreFiscalDigital') as $tfd) {
	 					 // print_r($tfd);
	 					 // debug($tfd);
	 					 // echo $tfd['SelloCFD'];
	 				   // echo "<br />";
	 				   // echo $tfd['FechaTimbrado'];
	 				   // echo "<br />";
	 				   // echo $tfd['UUID'];
             $response['UUID'] = $tfd['UUID'];
	 				   // echo "<br />";
	 				   // echo $tfd['NoCertificadoSAT'];
	 				   // echo "<br />";
	 				   // echo $tfd['Version'];
	 				   // echo "<br />";
	 				   // echo $tfd['SelloSAT'];
	 				}

          return $response;

      }  //WARNING End of validate

		/** NOTE <calculate n days after >
		 */
				// $date = new DateTime(date('Y-m-d'));
				// $date->sub(new DateInterval($afterDay));
				// $calculateDate =  $date->format('Y-m-d');
				// $this->out('calculating Date for making of the delete must be less than => ' . $calculateDate);


  function check_sat($info = array()) {
    // Content-type: text/xml;charset="utf-8"
    // Accept: text/xml
    // SOAPAction: http://tempuri.org/IConsultaCFDIService/Consulta
    // cache-control: no-cache
    // Host: consultaqr.facturaelectronica.sat.gob.mx
    //accept-encoding: gzip, deflate
    //content-length: 414
    //Connection: close

//
//     $request = new HttpRequest();
//     $request->setUrl('https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc');
//     $request->setMethod(HTTP_METH_POST);
//
//     $request->setQueryData(array(
//       'wsdl' => ''
//     ));
//
//     $request->setHeaders(array(
//       'Content-Length' => '379',
//       'Accept-Encoding' => 'gzip, deflate',
//       'Postman-Token' => '662e6b92-6fa3-4127-b1fd-e9b3f8c51dce,928306aa-0d4a-4c72-a3d2-957e261a34cb',
//       'User-Agent' => 'PostmanRuntime/7.20.1',
//       'Host' => 'consultaqr.facturaelectronica.sat.gob.mx',
//       'cache-control' => 'no-cache,no-cache',
//       'SOAPAction' => 'http://tempuri.org/IConsultaCFDIService/Consulta',
//       'Accept' => 'text/xml',
//       'Content-type' => 'text/xml;charset="utf-8"'
//     ));
//
//     $request->setBody('<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
//        <soapenv:Header/>
//        <soapenv:Body>
//           <tem:Consulta>
//              <tem:expresionImpresa><![CDATA[?re=APU640930KV9&rr=TBO7911166Z6&tt=476.00&id=A626E91A-5E74-47D6-A768-414BB647EEBC]]></tem:expresionImpresa>
//           </tem:Consulta>
//        </soapenv:Body>
//     </soapenv:Envelope>');
//
//     try {
//       $response = $request->send();
//
//       echo $response->getBody();
//     } catch (HttpException $ex) {
//       echo $ex;
//     }
//
// exit();

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl=",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => "<soapenv:Envelope xmlns:soapenv=\"http://schemas.xmlsoap.org/soap/envelope/\" xmlns:tem=\"http://tempuri.org/\">\n   <soapenv:Header/>\n   <soapenv:Body>\n      <tem:Consulta>\n         <tem:expresionImpresa><![CDATA[?re=APU640930KV9&rr=TBO7911166Z6&tt=476.00&id=A626E91A-5E74-47D6-A768-414BB647EEBC]]></tem:expresionImpresa> \n      </tem:Consulta>\n   </soapenv:Body>\n</soapenv:Envelope>",
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
      ),
    ));

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
      print_r("cURL Error #:" . $err);
    } else {
      print_r($response);
    }

    exit();

    // $http = new HttpSocket();
    // // $http->configAuth('Basic', 'user', 'password'); //optional, if needs authentication
    // // $xml_data = Xml::fromArray($this->request->data);
    // // $xml_string = $xml_data->asXML();
    //
    //           $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
    //                    <soapenv:Header/>
    //                    <soapenv:Body>
    //                       <tem:Consulta>
    //                          <tem:expresionImpresa><![CDATA[?re=APU640930KV9&rr=TBO7911166Z6&tt=476.00&id=A626E91A-5E74-47D6-A768-414BB647EEBC]]></tem:expresionImpresa>
    //                       </tem:Consulta>
    //                    </soapenv:Body>
    //                 </soapenv:Envelope>';
    // $response = $http->post('https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl', $xml);
    //
    // print_r($response);

      //
      $aHTTP['http']['header'] = "Content-type: text/xml;charset=\"utf-8\" \r\n";
      $aHTTP['http']['header'].= "Accept: text/xml \r\n";
      $aHTTP['http']['header'].= "SOAPAction: http://tempuri.org/IConsultaCFDIService/Consulta\r\n";
      $aHTTP['http']['header'].= "cache-control: no-cache\r\n";
      $aHTTP['http']['header'].= "Host: consultaqr.facturaelectronica.sat.gob.mx\r\n";
      //
      // // //
      // //
      $context = stream_context_create($aHTTP);



      //
      // $client = new SoapClient("https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl",array('trace' => 1,"stream_context" => $context));
      // //
      // $params = array(
      //             "tem:expresionImpresa" => '<![CDATA[?re=APU640930KV9&rr=TBO7911166Z6&tt=476.00&id=A626E91A-5E74-47D6-A768-414BB647EEBC]]>'
      //           );
      //
      // // $params = array(
      // //             "re" => 'APU640930KV9',
      // //             "rr" => 'TBO7911166Z6',
      // //             "tt" => '476.00',
      // //             "id" => 'A626E91A-5E74-47D6-A768-414BB647EEBC'
      // //           );
      //
      // $response = $client->__soapCall("Consulta", array($params));
      //
      // print_r($response);
      //
      // exit();

      $wsdl   = "https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl";
      $client = new SoapClient($wsdl, array(  'soap_version' => SOAP_1_1,
                                              'trace' => true
                                              // "stream_context" => $context
                                            ));



      try {

          $xml = '<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:tem="http://tempuri.org/">
                   <soapenv:Header/>
                   <soapenv:Body>
                      <tem:Consulta>
                         <tem:expresionImpresa><![CDATA[?re=APU640930KV9&rr=TBO7911166Z6&tt=476.00&id=A626E91A-5E74-47D6-A768-414BB647EEBC]]></tem:expresionImpresa>
                      </tem:Consulta>
                   </soapenv:Body>
                </soapenv:Envelope>';

          $args = array(new SoapVar($xml, XSD_ANYXML));
          print_r($args);
          $res  = $client->__SoapCall('Consulta', $args);
          print_r($res);
          // return $res;
      } catch (SoapFault $e) {
          echo "Error: {$e}";
      }

      print_r("<hr>Last Request\n");
      print_r($client->__getLastResponse());

      // return $response;

  } //NOTE End Check_sat

	function main(){

		if (!($this->args)) {
		  $this->help();
		  $this->err(__('Usage :Testing the err stuff', true));
// 		  $this->_stop();
		}


		if (( $this->args )) {
			if ( $this->args[0] === '1' ) {

			} else if($this->args[0] === '2') {
			/** @check only this paths */
			} else if($this->args[0] === '3') {
			/** @check only this paths */
			}

		} else {

			$file['urlBasename'] = DS.'tmp'.DS.'xml'.DS.'file.xml';
			$file['extension'] = 'xml';
			$file['is_mountpoint'] = false;
			$file['test'] = false;

      $response = $this->validate($file['urlBasename']);

      print_r($response);

// web service sat section
      $this->check_sat($response);
      // $wsdl = file_get_contents('https://consultaqr.facturaelectronica.sat.gob.mx/ConsultaCFDIService.svc?wsdl');
      // print_r($wsdl);



		}

	} //end main
}
?>
