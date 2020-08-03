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

class ProvidersUuidRequest extends AppModel {
	var $name = 'ProvidersUuidRequest';
	var $useDbConfig = 'mssql_systems';
	// var $displayField = 'BatNbr';
	var $primaryKey = 'id';
// }




	function crsave( $mode=null, $SaveUUID=array() ) {
		/**
			*		NOTE call to view sistemas.dbo.reporter_costos
			*		@function fetch_costos_units
			*		@param <cperiod> define the period to calculate
			*		@param mode : compact , detail , semi-detail ??
			*		@param $options = array('period'=>'','backward'=>null,'forward'=>null);
			*		@return fetch the matrix with the condensed data
			*		@debug(date("Y/m/d H:i:s"). substr((string)microtime(), 1, 6));
			*/

			if ( $mode == null  ) { // NOTE no mode do nothing or act as defaults current period

				print_r("params => \$mode  : compact , detail .... etc ; \$options => array('period'=>array(),'backward'=>array(),'forward'=>array())");

				exit();
			// } elseif ( $mode != null && is_string($mode) ) { //NOTE first check
			} else {
				// $cdate = date('n') ; //NOTE check the current month

				//NOTE if mode exists the check options
				// if ( $options != null && is_array($options) ) {
				//
				// 	$dateini = (array_key_exists('dateini',$options) ? $options['dateini'] : false ) ?: false;
				// 	$dateend = (array_key_exists('dateend',$options) ? $options['dateend'] : false ) ?: false;
				// 	// $id_area = implode(',',$area) = (array_key_exists('id_area',$options) ? $options['id_area'] : false ) ?: false;
				// 	$id_area = (array_key_exists('id_area',$options) ? $options['id_area'] : false ) ?: false;
				//
				// 	$id_tipo_operacion = (array_key_exists('id_tipo_operacion',$options) ? $options['id_tipo_operacion'] : false ) ?: false;
				// 	//
				// 	// debug($dateini);
				// 	// debug($dateend);
				// 	// debug($id_area);
				//
				// // } else {
				// 	// NOTE set the defaults
				// 	// $cperiod = date('Y-m-d H:i:s') ;
				// 	// $tachion_backward = ($cdate == 1 ?: --$cdate) ;
				// 	// $tachion_forward =  '1' ;
				// 	// $conditions_key = null;
				// 	// $conditions_bsu = null;
				// }
// debug($SaveUUID);
				//NOTE build the querys

				if ($mode == 'compact') { // NOTE Now check the options
					//NOTE  query the compact version of costos
							// $theQuery = $this->query(
							$theQuery =
									"insert into sistemas.dbo.providers_uuid_requests(
										             BatNbr
										            ,CpnyId
										            ,RefNbr
										            ,VendId
										            ,PONbr
										            ,TermsId
										            ,DueIntrv
										            ,InvDate
										            ,InvcNbr
										            ,Sello
										            ,Total
										            ,SubTotal
										            ,Certificado
										            ,MetodoPago
										            ,NoCertificado
										            ,TipoDeComprobante
										            ,re
										            ,rr
										            ,Unidad
										            ,ImporteConcepto
										            ,Cantidad
										            ,Descripcion
										            ,ValorUnitario
										            ,TasaOCuota
										            ,ImporteTraslado
										            ,Impuesto
										            ,uuid
										            ,selloCFD
										            ,FechaTimbrado
										            ,NoCertificadoSAT
										            ,Version
										            ,selloSAT
										            ,created
										            ,modified
										            ,providers_standings_id
										            ,providers_parents_id
										            ,_status
										)
										values		(
																'".$SaveUUID['ProvidersUuidRequest']['BatNbr']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['CpnyId']."'															 ,'".$SaveUUID['ProvidersUuidRequest']['RefNbr']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['VendId']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['PONbr']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['TermsId']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['DueIntrv']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['InvDate']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['InvcNbr']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['Sello']."'
															 ,".$SaveUUID['ProvidersUuidRequest']['Total']."
															 ,".$SaveUUID['ProvidersUuidRequest']['SubTotal']."
															 ,'".$SaveUUID['ProvidersUuidRequest']['Certificado']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['MetodoPago']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['NoCertificado']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['TipoDeComprobante']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['re']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['rr']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['Unidad']."'
															 ,".$SaveUUID['ProvidersUuidRequest']['ImporteConcepto']."
															 ,".$SaveUUID['ProvidersUuidRequest']['Cantidad']."
															 ,'".$SaveUUID['ProvidersUuidRequest']['Descripcion']."'
															 ,".$SaveUUID['ProvidersUuidRequest']['ValorUnitario']."
															 ,".$SaveUUID['ProvidersUuidRequest']['TasaOCuota']."
															 ,".$SaveUUID['ProvidersUuidRequest']['ImporteTraslado']."
															 ,'".$SaveUUID['ProvidersUuidRequest']['Impuesto']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['uuid']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['selloCFD']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['FechaTimbrado']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['NoCertificadoSAT']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['Version']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['selloSAT']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['created']."'
															 ,'".$SaveUUID['ProvidersUuidRequest']['modified']."'
															 ,".$SaveUUID['ProvidersUuidRequest']['providers_standings_id']."
															 ,".$SaveUUID['ProvidersUuidRequest']['providers_parents_id']."														 ,".$SaveUUID['ProvidersUuidRequest']['_status'].")";

				} // end compact
			} // end else

			// return $theQuery;
			debug($theQuery);

			$this->query($theQuery);
// exit();
	} // end function fetch_costos_units


}

?>
