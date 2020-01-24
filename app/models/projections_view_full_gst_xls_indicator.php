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
class ProjectionsViewFullGstXlsIndicator extends AppModel {
	var $name = 'ProjectionsViewFullGstXlsIndicator';
	var $useDbConfig = 'mssql_sistemas';
	var $primaryKey = 'id';
	// var $displayField = 'BatNbr';



	function fetch ( $mode=null, $options=array() ) {
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
				if ( $options != null && is_array($options) ) {

					$dateini = (array_key_exists('dateini',$options) ? $options['dateini'] : false ) ?: false;
					$dateend = (array_key_exists('dateend',$options) ? $options['dateend'] : false ) ?: false;
					// $id_area = implode(',',$area) = (array_key_exists('id_area',$options) ? $options['id_area'] : false ) ?: false;
					$id_area = (array_key_exists('id_area',$options) ? $options['id_area'] : false ) ?: false;

					$id_tipo_operacion = (array_key_exists('id_tipo_operacion',$options) ? $options['id_tipo_operacion'] : false ) ?: false;
					//
					// debug($dateini);
					// debug($dateend);
					// debug($id_area);

				// } else {
					// NOTE set the defaults
					// $cperiod = date('Y-m-d H:i:s') ;
					// $tachion_backward = ($cdate == 1 ?: --$cdate) ;
					// $tachion_forward =  '1' ;
					// $conditions_key = null;
					// $conditions_bsu = null;
				}

				//NOTE build the querys

				if ($mode == 'compact') { // NOTE Now check the options
					//NOTE  query the compact version of costos
							$theQuery = $this->query(
										"
										select
											   id_area
												,mes
												,id_tipo_operacion
												,projections_rp_definition
												,area
												,periodo
												,sum(kms) as 'kms'
												,sum(subtotal) as 'subtotal'
												,sum(peso) as 'peso'
												,sum(viajes) as 'viajes'
												,tpo
												,id_month
												,is_current
												,labDays
												,labRestDays
												,labFullDays
												,PresupuestoIngresos
												,PresupuestoKms
												,PresupuestoTon
												,PresupuestoViajes
										from
												sistemas.dbo.projections_view_full_gst_xls_indicators
										where
												fecha between '{$dateini}' and '{$dateend}' and id_area in ($id_area) and id_tipo_operacion = $id_tipo_operacion
										group by
												 id_area
												,mes
												,id_tipo_operacion
												,projections_rp_definition
												,area
												,periodo
												,tpo
												,id_month
												,is_current
												,labDays
												,labRestDays
												,labFullDays
												,PresupuestoIngresos
												,PresupuestoKms
												,PresupuestoTon
												,PresupuestoViajes
									"
							);
							// return $theQuery;
				} // end compact


			} // end else

			// debug($theQuery);
			// exit();
		if (isset($theQuery)) {
			foreach ($theQuery as $qry_key => $qry_value) {
				# code...
				foreach ($qry_value as $key => $value) {
				// 	# code...
					$response[$value['tpo']] = $value;
				// 	if ( $options != null && is_array($options) && array_key_exists('struct',$options) && ( $mode == 'company' || $mode == 'detail' ) ) {
				//
				// 				$array_struct[$value['cyear']][$value['mes']][$value['type']][$value['area']][$value['account']] = $value;
				//
				// 	} else if ( $options != null && is_array($options) && array_key_exists('struct',$options) && ( $mode == 'compact' || $mode == 'compact_bsu') ) {
				//
				// 			if ( $mode == 'compact') {
				// 				$array_struct[$value['cyear']][$value['mes']][$value['type']][$value['area']][$value['UnidadNegocio']] = $value;
				// 			} else {
				// 				$array_struct[$value['cyear']][$value['type']][$value['area']][$value['mes']] = $value;
				// 			}
				//
				// 	} else {
				// 				$array_struct[] = $value;
				// 	}
				//
				} // NOTE End $qry_value

			} // end foreach $theQuery
	 //
			return $response;
		// 	return $array_struct;
	 //
	 // } else {
	 //
		//  return null;
	 //
	 }// end isset

	} // end function fetch_costos_units


}
