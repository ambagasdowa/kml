<?php
/**
		*
		* PHP versions 4 and 5
		*
		* kml : Kamila Software
		* Licensed under The MIT License
		* Redistributions of files must retain the above copyright notice.
		*
		* @copyright     	Jesus Baizabal
		* @link          	http://baizabal.xyz
		* @mail	     			baizabal.jesus@gmail.com
		* @package       	cake
		* @subpackage    	cake.cake.console.libs.templates.views
		* @since         	CakePHP(tm) v 1.2.0.5234
		* @license       	MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
?>
<?php
class ReporterViewSpXs4zAccount extends AppModel {
	var $name = 'ReporterViewSpXs4zAccount';
	var $useDbConfig = 'mssql_sistemas';
	var $primaryKey = '_key';

 	function get_list_accounts () {
		$get_accounts = $this->find(
												'all',
												array(
																'fields'	=> array('_key','rangeaccounta','name'),
																'group'		=> array('_key','rangeaccounta','name'),
																'order'		=> array('_key')
														 )
											);
		// debug($get_accounts);
    foreach ($get_accounts as $get_key => $get_accounts_value) {
    	# code...
			foreach ($get_accounts_value as $key => $value) {
				$result_accounts[$get_accounts_value['ReporterViewSpXs4zAccount']['_key']][$get_accounts_value['ReporterViewSpXs4zAccount']['name']] = $get_accounts_value['ReporterViewSpXs4zAccount']['rangeaccounta'] ;
			}
    }
		return $result_accounts;
	} // end get_list_accounts ()


	function fetch_cost_units ( $mode=null, $options=array() ) {
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

			} elseif ( $mode != null && is_string($mode) ) { //NOTE first check

				$cdate = date('n') ; //NOTE check the current month

				//NOTE if mode exists the check options
				if ( $options != null && is_array($options) ) {

					$cperiod = ( array_key_exists('period',$options) ? $options['period'] : false ) ?: date('Y-m-d H:i:s') ;	//NOTE if false set to current date
					$tachion_backward = ( array_key_exists('backward',$options) ? $options['backward'] : false ) ?: ($cdate == 1 ?: --$cdate) ;		//NOTE if false calculate months backward
					$tachion_forward = ( array_key_exists('forward',$options) ? $options['forward'] : false ) ?: '1';					//NOTE if false calculate months forward

					// NOTE restrict uix
					$conditions_key = ( array_key_exists('conditions_key',$options) ? $options['conditions_key'] : false ) ?: false ;					//NOTE if false calculate months forward
					$conditions_bsu = ( array_key_exists('conditions_bsu',$options) ? $options['conditions_bsu'] : false ) ?: false ;					//NOTE if false calculate months forward

					// NOTE restrict the query
					$conditions_detail = ( array_key_exists('conditions_detail',$options) ? $options['conditions_detail'] : false ) ?: false ;					//NOTE if false calculate months forward

				} else {
					// NOTE set the defaults
					$cperiod = date('Y-m-d H:i:s') ;
					$tachion_backward = ($cdate == 1 ?: --$cdate) ;
					$tachion_forward =  '1' ;
					$conditions_key = null;
					$conditions_bsu = null;
				}
				// debug($tachion_backward)
// NOTE build the special conditions
				if ($conditions_key != null ) {
					$str_len = (strlen(key($conditions_key))-1) - strpos(key($conditions_key), '.') ;
					$str_table = substr(key($conditions_key), -$str_len);
					$str_table = 'type';
					$str_add = " and ${str_table} in "."('".implode("','", current($conditions_key))."')";
				} else {
					$str_add = '';
				}

				if ($conditions_bsu != null ) {
					$str_bsu_len = (strlen(key($conditions_bsu))-1) - strpos(key($conditions_bsu), '.') ;
					$str_bsu_table = substr(key($conditions_bsu), -$str_bsu_len);
					$str_bsu_table = 'area';
					$str_bsu_add = " and ${str_bsu_table} in "."('".implode("','", current($conditions_bsu))."')";
				} else {
					$str_bsu_add = '';
				}

				// debug($conditions_detail);
				$add_str_data = $string_data = null;

				if ($conditions_detail != null ) {

					$undata = explode('_',$conditions_detail);

					$string_data[0] = ' and acc.FiscYr = "'.$undata['2'].'"';
					$string_data[1] = ' and acc.Mes = "'.$undata['3'].'"';
					$string_data[2] = ' and units.label = "'.$undata['4'].'"';
					$string_data[3] = ' and acc.NoCta = "'.$undata['5'].'"';
					$string_data[4] = ' and acc._key = "'.$undata['6'].'"';
				}
				if (isset($string_data)) {
					$add_str_data = implode('', $string_data);
				}

				//NOTE build the querys

				if ($mode == 'compact') { // NOTE Now check the options
					//NOTE  query the compact version of costos
							$theQuery = $this->query(
										"
											select
													 _source_company
													,area
													,mes
													,UnidadNegocio
													,Real
													,Presupuesto
													,_period
													,type
													,cyear
											from
													sistemas.dbo.reporter_costos
											where
													_period
														between
																(left(CONVERT(VARCHAR(10), (dateadd(month,-{$tachion_backward},'{$cperiod}')), 112), 6))
														and
																(left(CONVERT(VARCHAR(10), (dateadd(month,{$tachion_forward},'{$cperiod}')), 112), 6))
									"
							);
							// return $theQuery;
				} // end compact

				if ($mode == 'compact_bsu') { // NOTE Now check the options

					//NOTE  query the compact_bsu version of costos
							$theQuery = $this->query(
										"
											select
													 _source_company
													,area
													,mes
													,sum(Real) as Real
													,sum(Presupuesto) as Presupuesto
													,_period
													,type
													,cyear
											from
													sistemas.dbo.reporter_costos
											where
													_period
														between
																(left(CONVERT(VARCHAR(10), (dateadd(month,-{$tachion_backward},'{$cperiod}')), 112), 6))
														and
																(left(CONVERT(VARCHAR(10), (dateadd(month,{$tachion_forward},'{$cperiod}')), 112), 6))
														and
																(
																		(
																			_source_company in ('ATMMAC','TEICUA','TCGTUL')
																		)
																or
																		(
																			_source_company not in ('ATMMAC','TEICUA','TCGTUL')
																		and
																			UnidadNegocio not in ('00')
																		)
																)
													{$str_add}
													{$str_bsu_add}
											group by
														_source_company
													 ,area
													 ,mes
													 ,_period
													 ,type
													 ,cyear
									"
							);
				} // end compact_bsu

				if ($mode == 'detail') { // NOTE Now check the options

					//NOTE  query the detail version of costos build the query
							$theQuery = $this->query(
										"
										select
								            row_number() over( order by units.label asc) as 'id'
								            ,acc._source_company
								            ,units.label as 'area'
								            ,acc.UnidadNegocio
								            ,acc.Mes as 'mes'
								            ,acc.NoCta as 'account'
								            ,acc.NombreCta as 'name'
								            ,round(sum(acc.Cargo - acc.Abono),3) as 'Real'
								            ,round(sum(acc.Presupuesto),3) as 'Presupuesto'
								            ,acc._period
								            ,acc.Descripcion
								            ,acc.NombreEntidad
								            ,acc.TipoTransaccion
								            ,acc.Referencia
								            ,acc.ReferenciaExterna
								            ,acc._key as 'type'
								            ,acc.FiscYr as 'cyear'
								        from
								            sistemas.dbo.reporter_view_report_accounts as acc
								        inner join
								            sistemas.dbo.projections_view_bussiness_units as units
								            on acc._source_company = units.tname
								        where
								            (
								                (
								                    _source_company in ('ATMMAC','TEICUA','TCGTUL')
								                )
								            or
								                (
								                    _source_company not in ('ATMMAC','TEICUA','TCGTUL')
								                and
								                    acc.Compania not in ('ATMMAC','TEICUA','TCGTUL')
								                and
								                    UnidadNegocio not in ('00')
								                )
								            )
								        {$add_str_data}
								        group by
								              acc.UnidadNegocio
								             ,acc._period
								             ,acc._source_company
								             ,units.label
								             ,acc.NoCta
								             ,acc.NombreCta
								             ,acc.Mes
								             ,acc.Descripcion
								             ,acc.NombreEntidad
								             ,acc.TipoTransaccion
								             ,acc.Referencia
								             ,acc.ReferenciaExterna
								             ,acc._key
								             ,acc.FiscYr
									"
							);
							// debug($theQuery);
				} // end detail

				if ($mode == 'company') { // NOTE Now check the options

					//NOTE  query the detail version of costos build the query
							$theQuery = $this->query(
										"
											select
													 _source_company
													,area
													,mes
													,account
													,name
													,sum(Real) as 'Real'
													,sum(Presupuesto) as 'Presupuesto'
													,_period
													,type
													,cyear
											from
													sistemas.dbo.reporter_costos_accounts
											where
													_period
														between
																(left(CONVERT(VARCHAR(10), (dateadd(month,-{$tachion_backward},'{$cperiod}')), 112), 6))
														and
																(left(CONVERT(VARCHAR(10), (dateadd(month,{$tachion_forward},'{$cperiod}')), 112), 6))
														and
																(
																		(
																			_source_company in ('ATMMAC','TEICUA','TCGTUL')
																		)
																or
																		(
																			_source_company not in ('ATMMAC','TEICUA','TCGTUL')
																		and
																			UnidadNegocio not in ('00')
																		)
																)
														{$str_add}
														{$str_bsu_add}
											group by
													 _source_company
 													,area
 													,mes
 													,account
 													,name
 													,_period
 													,type
 													,cyear
									"
							);
							// return $theQuery;
				} // end detail

			} // end else

			// debug($theQuery);
			// exit();
		if (isset($theQuery)) {
			foreach ($theQuery as $qry_key => $qry_value) {
				# code...
				foreach ($qry_value as $key => $value) {
					# code...
					if ( $options != null && is_array($options) && array_key_exists('struct',$options) && ( $mode == 'company' || $mode == 'detail' ) ) {

								$array_struct[$value['cyear']][$value['mes']][$value['type']][$value['area']][$value['account']] = $value;

					} else if ( $options != null && is_array($options) && array_key_exists('struct',$options) && ( $mode == 'compact' || $mode == 'compact_bsu') ) {

							if ( $mode == 'compact') {
								$array_struct[$value['cyear']][$value['mes']][$value['type']][$value['area']][$value['UnidadNegocio']] = $value;
							} else {
								$array_struct[$value['cyear']][$value['type']][$value['area']][$value['mes']] = $value;
							}

					} else {

								$array_struct[] = $value;

					}

				}
			} // end foreach $theQuery

			return $array_struct;

	 } else {

		 return null;

	 }// end isset

	} // end function fetch_costos_units



} // End Class
