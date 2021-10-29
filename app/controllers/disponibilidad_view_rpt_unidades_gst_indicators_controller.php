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
class DisponibilidadViewRptUnidadesGstIndicatorsController extends AppController {

	var $name = 'DisponibilidadViewRptUnidadesGstIndicators';
	// var $uses = array('DisponibilidadViewStatusGstIndicator');



	function date_convert($date) {
		//1. Transform request parameters to MySQL datetime format.
		$date_return = null;
		$date_init = new DateTime($date);
		$start =  $date_init->format('Y-m-d');
		return $start;
	}


	function get() {

		 Configure::write('debug',0);

	  $this->loadModel('DisponibilidadMainViewCalculateDay');

		$posted = json_decode(base64_decode($this->params['named']['data']),true);
	//	 debug($posted);
		$conditions = array();
		$add_conditions = array();
		foreach ($posted as $keys => $postvalue) {

			if ($keys > 0 ) {
				$content = $postvalue['name'];
				// debug($postvalue['value']);
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				// debug($chars);
				if ( isset($chars[1]) && $chars[1] == 'DisponibilidadViewRptUnidadesGstIndicator' && $postvalue['value'] != '') {

					// if ($chars[2] == 'Funcionario' && $postvalue['value'] != '') {
					// 	// code...
					// }


					if ( $chars[2] == 'id_tipo_operacion' ) {
						$condition[$chars[2]][] = $postvalue['value'];
					} else {
						$add_conditions[$chars[2]] = $postvalue['value'];
						$conditions[$chars[2]] = $postvalue['value'];
					}

				}
				// if(isset($chars[2])) {
				// 	$conditions[$chars[2]] = $postvalue['value'];
				// }
			}
		}

		debug($add_conditions);
/*		debug($conditions);
		debug($condition);
 */

// NOTE 
		// Search the highest value
		if (isset($condition) && !isset($conditions['units_types'])) {
			$is_hight = in_array('A',$condition['id_tipo_operacion'],TRUE); 
	//		var_dump($is_hight);
		}

//======================================================================================================================

			if (isset($add_conditions['dateini']) && isset($add_conditions['dateend'])){
				// code for both date

				$conditionsTf = array('DisponibilidadViewRptGroupGstIndicator.created BETWEEN ? AND ?' =>  array($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));


	//			$conditionsClass = array('DisponibilidadViewRptGroupClasificationsIndicator.created BETWEEN ? AND ?' =>  array($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));

	// NOTE remove this is just for test 
				$conditionsDisp = array('Disponibilidad.created BETWEEN ? AND ?' =>  array($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend']))); 

				// NOTE calculate the inner days

				$datetime_one = new DateTime($add_conditions['dateini']);
				$datetime_two = new DateTime($add_conditions['dateend']);
				$betweendays = $datetime_one -> diff($datetime_two);

				$bdays = $betweendays->days;

				debug($bdays);

// NOTE	build the array for days
				for ($i = 0; $i <= $bdays; $i++) {
					$lenght = 'P'.$i.'D';
					$date_arr = new DateTime($add_conditions['dateini']);
					$date_arr->add(new DateInterval($lenght));
					$dateLenght[$date_arr->format('Y-m-d')] = $date_arr->format('Y-m-d');
					$xdateLenght[] = $date_arr->format('Y-m-d');
				}

				debug($dateLenght);

				$conditionsDays = array('DisponibilidadMainViewCalculateDay.created BETWEEN ? AND ?' =>  array($this->date_convert($add_conditions['dateini']),$this->date_convert($add_conditions['dateend'])));
	
				$cdays = $this->DisponibilidadMainViewCalculateDay->find('all',array('conditions'=>$conditionsDays));
				$days = count($cdays);

				debug($cdays);
				debug($days);

			} elseif (isset($add_conditions['dateini']) || isset($add_conditions['dateend'])){

					if( isset($add_conditions['dateini']) ) {
	//					$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.created'] = $this->date_convert($add_conditions['dateini']);
						$conditionsTf['DisponibilidadViewRptGroupGstIndicator.created'] = $this->date_convert($add_conditions['dateini']);
//						$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.created'] = $this->date_convert($add_conditions['dateini']);
						$conditionsDisp['Disponibilidad.created'] = $this->date_convert($add_conditions['dateini']);
						$days = 1;
						$xdateLenght[] =  $this->date_convert($add_conditions['dateini']);
						$dateLenght =  $xdateLenght;
debug($xdateLenght);
					} else {
	//					$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.created'] = $this->date_convert($add_conditions['dateend']);
						$conditionsTf['DisponibilidadViewRptGroupGstIndicator.created'] = $this->date_convert($add_conditions['dateend']);
	//					$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.created'] = $this->date_convert($add_conditions['dateend']);
						$conditionsDisp['Disponibilidad.created'] = $this->date_convert($add_conditions['dateend']);
						$days = 1;
						$xdateLenght[] =  $this->date_convert($add_conditions['dateend']);
						$dateLenght = $xdateLenght;
debug($xdateLenght);
					}
			} else {
				// $add_conditions['dateini'] = null;
				// $add_conditions['dateend'] = null;
	//			$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.created'] = $this->date_convert(date('Y-m-d'));
				$conditionsTf['DisponibilidadViewRptGroupGstIndicator.created'] = $this->date_convert(date('Y-m-d'));
	//			$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.created'] = $this->date_convert(date('Y-m-d'));
				$conditionsDisp['Disponibilidad.created'] = $this->date_convert(date('Y-m-d'));
				$days =1;
				$xdateLenght[] =  $this->date_convert(date('Y-m-d'));
				$dateLenght =  $xdateLenght;
debug($xdateLenght);
			}
//=====================================================================================================================//

		$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.created'] = $this->date_convert(date('Y-m-d')); //NOTE the 3rd table is not afected by a hist date range


		$this->LoadModel('DisponibilidadViewStatusGstIndicator');
		$this->LoadModel('DisponibilidadViewRptGroupGstIndicator');
		$this->LoadModel('DisponibilidadViewRptGroupClasificationsIndicator');
		$this->LoadModel('DisponibilidadViewCrossName');
		$this->LoadModel('DisponibilidadTblUnidadesClasification');

		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->LoadModel('ProjectionsViewFraction');
		$this->LoadModel('DisponibilidadViewMenuOperation');


		$cond_bssus['ProjectionsViewBussinessUnit.id_area <>'] = 7;
//		$cond_bssus['ProjectionsViewBussinessUnit.id_area <>'] = null;

		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','name'),'conditions'=>$cond_bssus));
//		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','name')));
		$operacion = $this->ProjectionsViewFraction->find('list',array('fields'=>array('id','desc_producto'),'conditions'=>array('ProjectionsViewFraction.id <>'=>0)));
		$tipoOp = $this->DisponibilidadViewMenuOperation->find('list'
																																		,array(
																																			 'fields'=>array('id_tipo_operacion','tipoOperacion','operation')
																																			,'order' => array('operation' => 'ASC')
																																		)
		);

		$addop = array('Operacion'=>array('A'=>'TODO','G'=>'GRANEL','O'=>'OTROS.'));
  
		$tipoOperacion = array_merge($addop,$tipoOp);


// NOTE Work from hir

//		$units_type = $_SESSION['Auth']['User']['units_type'];
		
		// debug($units_type);
		debug($conditions['units_types']);

		$units_id = array(
				 1=>array(1,13)			//Tractocamiones
				,2=>array(2,3,5,6,7,8,9)				//remolques
				,3=>array(1,2,3,4,5,6,7,8,9,13)		//ALL
				,4=>array(4)											//only dollys
		);




		$units_def = 
			array(
				 1=>'Tractocamiones'
				,2=>'Remolques'
				,4=>'Dollys'
			);

//		var_dump(isset($units_type));

		if (isset($conditions['units_types'])) {
			$units_type = $conditions['units_types'];
			$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.units_type'] = $units_id[$units_type];
			$conditionsTf['DisponibilidadViewRptGroupGstIndicator.units_type'] = $units_id[$units_type];
			$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.TipoVehiculo'] = $units_def[$units_type];
			$conditionsDisp['Disponibilidad.TipoVehiculo'] = $units_def[$units_type]; //NOTE Drop this when finish
//			$conditionsXt['DisponibilidadViewCrossName.units_type'] = $units_id[$units_type];
		}/* else {
			$units_type = 3;
//			$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.units_type'] = $units_id[$units_type];
//			$conditionsTf['DisponibilidadViewRptGroupGstIndicator.units_type'] = $units_id[$units_type];
		}
		 */
//		$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.units_type'] = $units_id[$units_type];
//		$conditionsTf['DisponibilidadViewRptGroupGstIndicator.units_type'] = $units_id[$units_type];


		// debug(var_dump($units_type));

		// debug($units_id[$units_type]);

// 		(4,6,8,15,14,18,11)
			$conditionsStatus['DisponibilidadViewStatusGstIndicator.id_status'] = array(4,6,8,15,14,18,11);

		$disponibilidadViewStatusGstIndicators = $this->DisponibilidadViewStatusGstIndicator->find('list',array('fields'=>array('id_status','nombre'),'conditions'=>$conditionsStatus));

		if ( (!isset($add_conditions['id_area']) && !isset($add_conditions['id_flota']) && !isset($add_conditions['units_type']) && !isset($condition) ) /*OR (isset($is_hight) && $is_hight == true)*/ )  {
					
					debug('inside hight');

					if (isset($units_type)) {

// NOTE The graphics section
								$disponibilidadViewRptGraphGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all',array(
													 'fields' => array(
																						 'sum(unidades) as [unidades]'
																				//		,'id_status'
																						,'group_name'
																					)
													 ,'group' => array('group_name')
													 ,'conditions' => $conditionsTf
																 )
								);
								debug($conditionsTf);
								debug($disponibilidadViewRptGraphGstIndicators);
//NOTE 1st Table Section						
								$disponibilidadViewRptGroupGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all',array(
													 'fields' => array(
																						 'sum(unidades) as [unidades]'
																						,'id_status'
																						,'estatus'
																					)
													 ,'group' => array('id_status','estatus')
													 ,'conditions' => $conditionsTf
																 )

								);
								debug($disponibilidadViewRptGroupGstIndicators);
// NOTE 2nd Table section
								$disponibilidadViewRptUnidadesGstIndicators = $this->DisponibilidadViewRptUnidadesGstIndicator->find('all',array('conditions'=>$conditionsBl));

					} else {

// NOTE The graphics section
								$disponibilidadViewRptGraphGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all',array(
													 'fields' => array(
																						 'sum(unidades) as [unidades]'
																				//		,'id_status'
																						,'group_name'
																					)
													 ,'group' => array('group_name')
													 )

								);

							$disponibilidadViewRptGroupGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all',array(
																 'fields'=>array(
																									 'sum(unidades) as [unidades]'
																									,'id_status'
																									,'estatus'
																							  )
																 ,'group'=>array('id_status','estatus')
															 )

							);
							$disponibilidadViewRptUnidadesGstIndicators = $this->DisponibilidadViewRptUnidadesGstIndicator->find('all');
						}
				} else {

					if (isset($add_conditions['id_area'])) {

						$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.id_area'] = $add_conditions['id_area'];
						$conditionsTf['DisponibilidadViewRptGroupGstIndicator.id_area'] = $add_conditions['id_area'];
						$conditionsXt['DisponibilidadViewCrossName.id_area'] = $add_conditions['id_area']; // NOTE we need to know which area is in 
						$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.id_area'] = $add_conditions['id_area']; // NOTE we need to know which area is in 
						$conditionsDisp['Disponibilidad.id_area'] = $add_conditions['id_area']; // NOTE we need to know which area is in 
					}
		 
/*
					if (isset($add_conditions['units_type'])) {
					// code...
						$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.units_type'] =  $units_id[$units_type];
						$conditionsTf['DisponibilidadViewRptGroupGstIndicator.units_type'] =  $units_id[$units_type];
					}
 */
					if (isset($condition['id_tipo_operacion'])) {

						// TODO NOTE WARNING Work from hir 
								if (in_array('A',$condition['id_tipo_operacion'],TRUE)) {
									debug('IN ALL');
								} else {
									if (in_array('G',$condition['id_tipo_operacion'],TRUE) OR in_array('O',$condition['id_tipo_operacion'],TRUE)) {
										if (in_array('G',$condition['id_tipo_operacion'],TRUE))	{
											debug('Granell');
											$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.id_flota'] = 1;
											$conditionsTf['DisponibilidadViewRptGroupGstIndicator.id_flota'] = 1;
											$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.id_flota'] = 1;
											$conditionsDisp['Disponibilidad.id_flota'] = 1;
										}							
										if (in_array('O',$condition['id_tipo_operacion'],TRUE))	{
											debug('Otherss');
											$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.id_flota'] = 2;
											$conditionsTf['DisponibilidadViewRptGroupGstIndicator.id_flota'] = 2;
											$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.id_flota'] = 2;
											$conditionsDisp['Disponibilidad.id_flota'] = 2;
										}
									} else {
										debug('BY_Tipo de Operacion');
											$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.id_tipo_operacion'] = $condition['id_tipo_operacion'];
											$conditionsTf['DisponibilidadViewRptGroupGstIndicator.id_tipo_operacion'] = $condition['id_tipo_operacion'];   												
											$conditionsClass['DisponibilidadViewRptGroupClasificationsIndicator.id_tipo_operacion'] = $condition['id_tipo_operacion'];   												
											$conditionsDisp['Disponibilidad.id_tipo_operacion'] = $condition['id_tipo_operacion'];   												
									}
								}
//NOTE					  when is a letter and can be 3 
//			firts check the most hightest card and is A or Empty then G and last O
//      after check if is numeric and omit letters 
					}

// debug($conditionsBl);
// debug($conditionsTf);
					// NOTE The table new approach 


// NOTE The graphics section
					//			NOTE add condition for not nulls tuples :: This Become a Global Parameter
					$conditionsTf['DisponibilidadViewRptGroupGstIndicator.group_name !='] = null ;


								$disponibilidadViewRptGraphGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all',array(
													 'fields' => array(
																						 'sum(unidades) as [unidades]'
																						 ,'group_name'
																						 ,'created'
																					)
													 ,'group' => array('group_name','created')
													 ,'conditions' => $conditionsTf
													 ,'order' => 'group_name DESC'
																 )
								);


					//NOTE Zero Table Section
					
//	debug($conditionsBl);
//	debug($conditionsTf);

						$disponibilidadViewCrossNames = $this->DisponibilidadViewRptGroupGstIndicator->find('all'
									,array(
											 'conditions'=>$conditionsTf
											 ,'fields'=>array(
//																			 'id_area'
																			 'area'
//																			 ,'id_flota'
																			 ,'id_tipo_operacion'
																			 ,'segmento'
//																			 ,'units_type'
																			 ,'sum(unidades) as [unidades]'
//																			 ,'unidades'
																			 ,'clasification_name'
																		 )
												 ,'group'=>array(
//																			'id_area'
																			'area'
//																			,'id_flota'
																			,'id_tipo_operacion'
																			,'segmento'
//																			,'units_type'
																			,'clasification_name'
												 )
									));
					//'DisponibilidadViewRptGroupClasificationsIndicator'
//		debug($conditionsClass);

						$disponibilidadViewClasifications = $this->DisponibilidadViewRptGroupClasificationsIndicator->find('all'
									,array(
										'conditions'=>$conditionsClass
										,'fields'=>array(
																			 'id_area'
																			,'area' 
																			,'id_flota' 
																			,'id_tipo_operacion'
																			,'Flota' 
																			,'TipoVehiculo' 
																			,'Disponible' 
																			,'Operando' 
																			,'Taller' 
																			,'Gestoria' 
																			,'Siniestrado' 
																			,'Robo' 
																			,'Exhibicion' 
																			,'Venta' 
																			,'TotalDisponibilidad'
																			,'TotalFlota' 
																			,'DisponibilidadFlota' 
																			,'FlotaOperando' 
																			,'Disp_S_Viaje' 
																			,'Op_FlotaGestoria_Siniestro' 
																			,'FlotaMtto' 
//																			,'created' 
										)
										 ,'order'=>array('Flota'=>'desc','TipoVehiculo'=>'asc')
										 ,'group'=>array(
																			 'id_area'
																			,'area' 
																			,'id_flota' 
																			,'id_tipo_operacion'
																			,'Flota' 
																			,'TipoVehiculo' 
																			,'Disponible' 
																			,'Operando' 
																			,'Taller' 
																			,'Gestoria' 
																			,'Siniestrado' 
																			,'Robo' 
																			,'Exhibicion' 
																			,'Venta' 
																			,'TotalDisponibilidad'
																			,'TotalFlota' 
																			,'DisponibilidadFlota' 
																			,'FlotaOperando' 
																			,'Disp_S_Viaje' 
																			,'Op_FlotaGestoria_Siniestro' 
																			,'FlotaMtto' 
										 )
									 )
						);

//					$this->loadModel('Disponibilidad');
//
//					debug($conditionsClass);
//
//					debug('days => '.$days);
//
//						$disponibilidad = $this->Disponibilidad->find('all'
//									,array(
//										 'conditions'=>$conditionsDisp
//										,'order'=>array('Flota'=>'desc','TipoVehiculo'=>'asc')
//									 )
//						);
//
//					debug($disponibilidad);
					
					
//	$this->loadModel('DisponibilidadViewRxptGroupClasificationsIndicator');

//	$disponibilidadViewXClasifications = $this->DisponibilidadViewRptGroupClasificationsIndicator->groupClass($conditionsClass);

//  debug($disponibilidadXViewClasifications);

//					debug($this->DisponibilidadViewRptGroupClasificationsIndicator->groupClass($conditionsClass));


//NOTE 1st Table Section
						$disponibilidadViewRptGroupGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all'
									,array(
											 'conditions'=>$conditionsTf
											,'fields'=>array(
																				'sum(unidades) as [unidades]'
//																			 ,'id_status'
																			 ,'clasification_name'
																		 )
											,'group'=>array('clasification_name')
									));

//NOTE 2nd Table Section
						$disponibilidadViewRptUnidadesGstIndicators = $this->DisponibilidadViewRptUnidadesGstIndicator->find('all',array('conditions'=>$conditionsBl));
				}

				debug($conditionsTf);
//				debug($conditionsBl);

//debug($disponibilidadViewCrossNames);
debug($disponibilidadViewRptGroupGstIndicators);
//debug( $disponibilidadViewRptGraphGstIndicators );
//debug( $disponibilidadViewRptUnidadesGstIndicators );

				$tableSquema = $this->DisponibilidadViewCrossName->find( 'all',array('conditions'=>$conditionsXt) );
			                                                                                                                                	
					foreach ($tableSquema as $idx => $value) {
						$Squema[$value['DisponibilidadViewCrossName']['clasification_name']][$value['DisponibilidadViewCrossName']['label']] = 0;

					}
//				debug($tableSquema);
//				debug($Squema);
// NOTE Define total of the flota 

				$flotaFirst = $this->DisponibilidadTblUnidadesClasification->find('list',array('fields'=>array('id','clasification_name'),'conditions'=>array('DisponibilidadTblUnidadesClasification.is_sum'=>1)));

				$fleet = $this->DisponibilidadTblUnidadesClasification->find('list',array('fields'=>array('id','clasification_name')));
				
//			debug($flotaFirst);

				$counting = 0 ;

				foreach($disponibilidadViewCrossNames as $key => $v){
					$dta[$v['DisponibilidadViewRptGroupGstIndicator']['clasification_name']][$v['DisponibilidadViewRptGroupGstIndicator']['area']] += $v[0]['unidades'];
					
					// NOTE check according of the definition of total flota for this issue 
					
					if (in_array($v['DisponibilidadViewRptGroupGstIndicator']['clasification_name'],$flotaFirst)) {
						$units[$v['DisponibilidadViewRptGroupGstIndicator']['clasification_name']] += $v[0]['unidades'];
					}
					
					// NOTE 
					$areas[$v['DisponibilidadViewRptGroupGstIndicator']['area']] = $counting + 1;
					$counting++;
				}

//				debug($dta);
//				debug($units);
				$totalUnits = array_sum($units)	;

			 $dispCross = $Squema;
				foreach ( $Squema as $skey => $dtav  ) {
					if ($dta[$skey]){
						$dispCross[$skey] =	array_replace($Squema[$skey],$dta[$skey]);
					}
				}
				$dispCross = array_replace($Squema,$dta);


debug($disponibilidadViewRptGroupGstIndicators);

		    foreach ($disponibilidadViewRptGroupGstIndicators as $key => $value) {
					$disponibilidadViewRptGroupGstIndicators[$key]['DisponibilidadViewRptGroupGstIndicator']['unidades'] = $value[0]['unidades'];
				}
// Group data under modelKeyName
				$xdisponibilidadViewRptGraphGstIndicators = array();
				foreach (	$disponibilidadViewRptGraphGstIndicators  as $key => $value) {

					$disponibilidadViewRptGraphGstIndicators[$key]['DisponibilidadViewRptGroupGstIndicator']['unidades'] = $value[0]['unidades'];

				}

				debug($disponibilidadViewRptGraphGstIndicators);
				debug($dateLenght);
				$unitsdate = $dateLenght;
				debug($unitsdate);

				foreach ($disponibilidadViewRptGraphGstIndicators as $xkey => $xvalue) {
					$xdisponibilidadViewRptGraphGstIndicators[$xvalue['DisponibilidadViewRptGroupGstIndicator']['group_name']]['group_name']=$xvalue['DisponibilidadViewRptGroupGstIndicator']['group_name'];

					debug($xkey);
					debug($xvalue);


					foreach ($dateLenght as $keydate => $date) {
						
						debug($date);

						if ($date === $this->date_convert($xvalue['DisponibilidadViewRptGroupGstIndicator']['created'])) {
//						debug('Y => '.$xvalue['DisponibilidadViewRptGroupGstIndicator']['unidades'].' => '.$date);	
							$xdisponibilidadViewRptGraphGstIndicators[$xvalue['DisponibilidadViewRptGroupGstIndicator']['group_name']]['unidades'][$date]=$xvalue['DisponibilidadViewRptGroupGstIndicator']['unidades'];
						} else {
//							debug('X => '.$xvalue['DisponibilidadViewRptGroupGstIndicator']['unidades'].' => '.$date);
							if (!isset($xdisponibilidadViewRptGraphGstIndicators[$xvalue['DisponibilidadViewRptGroupGstIndicator']['group_name']]['unidades'][$date])) {
								$xdisponibilidadViewRptGraphGstIndicators[$xvalue['DisponibilidadViewRptGroupGstIndicator']['group_name']]['unidades'][$date]=0;
							}	
						}

					}

				}


		debug($xdisponibilidadViewRptGraphGstIndicators);		


		$json_categories = json_encode($xdateLenght);
//		$json_categories = "'".implode("','",$xdateLenght)."'";

		debug($json_categories);

		$json_parsing_lv_one = null;

		$disp_grp = $xdisponibilidadViewRptGraphGstIndicators ;
		

		foreach ($disp_grp as $key => $data) {
			// code...
			//NOTE data for PIE;
/*					$json_parsing_lv_one .= json_encode(
																		array(
																						 'name'=>$data['DisponibilidadViewRptGroupGstIndicator']['estatus']
																						,'y'=>round($data['DisponibilidadViewRptGroupGstIndicator']['unidades'],2)
																						// ,'drilldown'=>$key_viajes
																						,'drilldown'=>null
																				 )
																						, JSON_PRETTY_PRINT
						);
 */
// NOTE data for columns 
					$json_parsing_lv_one .= json_encode(
																		array(
																						 'name'=>$data['group_name']
																						,'data'=>'['.implode(',',$data['unidades']).']'
																				 )
																						, JSON_PRETTY_PRINT
											);


		}


//		debug(str_replace ('"[','[', str_replace(']"',']',$json_parsing_lv_one) ) );

		$json_parsing_level_one = implode('},{',explode('}{', str_replace ('"[','[', str_replace(']"',']',$json_parsing_lv_one) ) ));
   
//		debug($json_parsing_level_one);

		// 	$json_parsing_level_two[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']][] = json_encode(
		// 																				array(
		// 																							'name'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
		// 																							,'id'=>$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']
		// 																							,'data'=>"{$data[$rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['route']]}"
		// 																						 )
		// 																			 ,JSON_FORCE_OBJECT
		// 																			);
		// }

		//
		// 		$json_parsing_lv_one .= json_encode(
		// 															array(
		// 																			 'name'=>$key_viajes
		// 																			,'y'=>round((array_sum($values_viajes)),2)
		// 																			// ,'drilldown'=>$key_viajes
		// 																			,'drilldown'=>null
		// 																	 )
		// 																			, JSON_PRETTY_PRINT
		// 								);
		// }


	if (
				$this->Auth->user('group_id') == 7
				OR
				$this->Auth->user('id') == 297
				OR
				$this->Auth->user('id') == 5
/*				OR
				$this->Auth->user('id') == 5
                                OR
				$this->Auth->user('id') == 294
                                OR
				$this->Auth->user('id') == 314
                                OR
				$this->Auth->user('id') == 283
                                OR
				$this->Auth->user('id') == 284
                                OR
				$this->Auth->user('id') == 96
                                OR
				$this->Auth->user('id') == 214
                                OR
				$this->Auth->user('id') == 294
                                OR
				$this->Auth->user('id') == 297
                                OR
				$this->Auth->user('id') == 187
                                OR
				$this->Auth->user('id') == 320
 */
			) {
			$user_mod = true;
	} else {
			$user_mod = false;
	}
	// $user_mod = false;
	// $user_mod = true;
		$user_id = $this->Auth->user('id');
/*
	debug($Squema);
	debug($tipoOp);
	debug($dispCross);
	debug($disponibilidadViewCrossNames);
	debug($units);

debug($areas);
 */
//		debug($disponibilidadViewClasifications);
	$xareas =	array_flip($areas);
	
		debug($xareas);

		debug(count($xareas));

 		 define("LOW",1);
		 define("MEDIUM", 4);
		 define("HIGH", 8);

		$level = count($xareas);


	  if ( $level > 0 and $level < 2 ) {
			$stripe = 30;
			debug('SMALL');
		} else if ( $level < 4 ) {
			$stripe = 50;
			debug('MEDIUM');
		} else {
			$stripe = 100;
			debug('FULL');
		}


		//	NOTE what we need ? an array with all dates , an object with the name clasifications and data with an value for each datetime
			
		//	json_categories = [20210801,20210802,20210803]
		//	json_series = {"name":"Disponibilidad","data":[300,25,21]}{"name":"EnTaller","data":[25,10,9]}

		debug($json_parsing_level_one);

	$this->set(compact(
											  'disponibilidadViewRptUnidadesGstIndicators'
											 ,'disponibilidadViewStatusGstIndicators'
											 ,'disponibilidadViewRptGroupGstIndicators'
											 ,'user_mod'
											 ,'user_id'
											// ,'sums_kms'
											// ,'sums_diesel'
											// ,'sums_rendimiento'
											 // ,'sums_viajes'
											 ,'disponibilidadViewCrossNames'
											 ,'json_parsing_level_one'                    // graphics after get 
											 ,'json_categories'
											 ,'disponibilidadViewClasifications'
											 ,'Squema','dispCross','units','totalUnits','xareas','bssus','operacion','fleet','flotaFirst'
											 ,'days'  // counting days
											 ,'stripe' // width of table_one
										)
						);

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}


// fiddle
// https://jsfiddle.net/ambagasdowa/qp0ur9dk/
// https://jsfiddle.net/ambagasdowa/b3y8297x/1/

	function index() {
		 Configure::write('debug',0);

		// debug($this->Auth->User());
		// debug($this->params['url']['units_type']);
//		$_SESSION['Auth']['User']['units_type'] = $this->params['url']['units_type'];
		// debug($this->Auth->User());

// Note add funtions
//		$units_type = $_SESSION['Auth']['User']['units_type'];

		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->LoadModel('ProjectionsViewFraction');
		$this->LoadModel('DisponibilidadViewMenuOperation');

		$cond_bssus['ProjectionsViewBussinessUnit.id_area <>'] = 7;
//		$cond_bssus['ProjectionsViewBussinessUnit.id_area <>'] = null;

		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','name'),'conditions'=>$cond_bssus));
		$operacion = $this->ProjectionsViewFraction->find('list',array('fields'=>array('id','desc_producto')));
		$tipoOp = $this->DisponibilidadViewMenuOperation->find('list'
																																		,array(
																																			 'fields'=>array('id_tipo_operacion','tipoOperacion','operation')
																																			,'order' => array('operation' => 'ASC')
																																		)
		);

//debug($tipoOp);
		$addop = array('Operacion'=>array('A'=>'TODO','G'=>'GRANEL','O'=>'OTROS.'));
  
		$tipoOperacion = array_merge($addop,$tipoOp);

// NOTE start the view main



//////////////////////////////////////////////////// NOTE START CODE  ////////////////////////////////////////////
		// Search the highest value
//		$units_type = $_SESSION['Auth']['User']['units_type'];
		$this->LoadModel('DisponibilidadViewStatusGstIndicator');
		$this->LoadModel('DisponibilidadViewRptGroupGstIndicator');
		$this->LoadModel('DisponibilidadViewAreaUnit');
		$this->LoadModel('DisponibilidadViewCrossUnit');
		$this->LoadModel('DisponibilidadTblUnidadesGroup');
// NOTE Work from hir
//		$units_type = $_SESSION['Auth']['User']['units_type'];

		$units_id = array(
				 1=>array(1,13)			//Tractocamiones
				,2=>array(2,3,5,6,7,8,9)				//remolques
				,3=>array(1,2,3,4,5,6,7,8,9,13)		//ALL
				,4=>array(4)											//only dollys
		);


		if (isset($units_type)) {
//			$conditionsBl['DisponibilidadViewRptUnidadesGstIndicator.units_type'] = $units_id[$units_type];
			$conditionsTf['DisponibilidadViewRptGroupGstIndicator.units_type'] = $units_id[$units_type];
			$conditionsAr['DisponibilidadViewAreaUnit.units_type'] = $units_id[$units_type];
		}

		$conditionsStatus['DisponibilidadViewStatusGstIndicator.id_status'] = array(4,6,8,15,14,18,11);

		$disponibilidadViewStatusGstIndicators = $this->DisponibilidadViewStatusGstIndicator->find('list',array('fields'=>array('id_status','nombre'),'conditions'=>$conditionsStatus));

// NOTE The graphics section
					//			NOTE add condition for not nulls tuples :: This Become a Global Parameter
		$conditionsTf['DisponibilidadViewRptGroupGstIndicator.group_name !='] = null ;

								$disponibilidadViewRptGraphGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all',array(
													 'fields' => array(
																						 'sum(unidades) as [unidades]'
																						,'group_name'
																					)
													 ,'group' => array('group_name')
													 ,'conditions' => $conditionsTf
													 ,'order' => 'group_name DESC'
																 )
								);

//NOTE 1st Table Section
						$disponibilidadViewRptGroupGstIndicators = $this->DisponibilidadViewRptGroupGstIndicator->find('all'
									,array(
											 'conditions'=>$conditionsTf
											,'fields'=>array(
																				'sum(unidades) as [unidades]'
																			 ,'clasification_name'
																		 )
											,'group'=>array('clasification_name')
									));


















		$squema  = $this->DisponibilidadViewCrossUnit->find('all');

	$disponibilidadViewCrossUnits = $this->DisponibilidadViewCrossUnit->find('all'
								,array(
//										'conditions'=>$conditionsAr
										'fields'=>array(
																				 'sum(unidades) as [unidades]'
																				,'label'
																				,'id_area'
																				,'group_name'
																				,'[DisponibilidadViewAreaUnit].types'											
											)
										,'joins'=>array(
														 'table'=>'left join disponibilidad_view_area_units'
														,'alias'=>' as [DisponibilidadViewAreaUnit]'
//														,'type'=>'left join'
														,'conditions'=> 'on [DisponibilidadViewAreaUnit].id_area = [DisponibilidadViewCrossUnit].id_area and [DisponibilidadViewAreaUnit].group_name = [DisponibilidadViewCrossUnit].group_name '//' and '."[DisponibilidadViewAreaUnit].units_type in  (".implode(',',$units_id[$units_type]).")"																						
										)
										,'group'=>array('[DisponibilidadViewCrossunit].group_name','[DisponibilidadViewCrossUnit].label','[DisponibilidadViewCrossUnit].id_area','[DisponibilidadViewAreaUnit].types')																	
										,'order'=>'[DisponibilidadViewCrossUnit].id_area'														
								)
	);

//debug($conditionsTf);
//debug($conditionsBl);
//debug( $disponibilidadViewRptGraphGstIndicators );
//debug($disponibilidadViewCrossUnits);


		    foreach ($disponibilidadViewRptGroupGstIndicators as $key => $value) {
					$disponibilidadViewRptGroupGstIndicators[$key]['DisponibilidadViewRptGroupGstIndicator']['unidades'] = $value[0]['unidades'];
				}

				foreach (	$disponibilidadViewRptGraphGstIndicators  as $key => $value) {
					$disponibilidadViewRptGraphGstIndicators[$key]['DisponibilidadViewRptGroupGstIndicator']['unidades'] = $value[0]['unidades'];
				}

//				foreach (	$disponibilidadViewAreaUnits  as $key => $value) {
//					$disponibilidadViewRptGraphGstIndicators[$key]['DisponibilidadViewAreaUnits']['unidades'] = $value[0]['unidades'];
//				}

				$groups = $this->DisponibilidadTblUnidadesGroup->find('list',array('fields'=>array('id','group_name')));
//				disponibilidad_tbl_unidades_groups

//	debug($groups);


				$json_parsing_lv_one = null;

				foreach ($squema as $idx => $data_value) {
					$dispSquema[$data_value['DisponibilidadViewCrossUnit']['group_name']][$data_value['DisponibilidadViewCrossUnit']['label']] = $data_value[0]['unidades']?$data_value[0]['unidades']:0;	 
				}

			// NOTE build the squema for each area
				debug($dispSquema);

				foreach ($disponibilidadViewCrossUnits as $key => $data_value) {
//					if ($key) {
//						$dispCross[$data_value[0]['DisponibilidadViewAreaUnit__3']][$data_value['DisponibilidadViewCrossUnit']['group_name']][$data_value['DisponibilidadViewCrossUnit']['label']] = $data_value[0]['unidades']?$data_value[0]['unidades']:0;	 
					if (isset($data_value[0]['DisponibilidadViewAreaUnit__3'])){	
							$dispCross[$data_value[0]['DisponibilidadViewAreaUnit__3']][$data_value['DisponibilidadViewCrossUnit']['group_name']][$data_value['DisponibilidadViewCrossUnit']['label']] = $data_value[0]['unidades'];


//							$unitsCross[$data_value[0]['DisponibilidadViewAreaUnit__3']][$data_value['DisponibilidadViewCrossUnit']['label']][$data_value['DisponibilidadViewCrossUnit']['group_name']] = $data_value[0]['unidades'];
							$totalCross[$data_value[0]['DisponibilidadViewAreaUnit__3']][$data_value['DisponibilidadViewCrossUnit']['label']] += $data_value[0]['unidades'];
					}
				}	
	
//				krsort($dispCross[1]);
//				debug($disponibilidadViewCrossUnits);
				debug($dispCross);
//				debug($unitsCross);
//				debug($totalCross);

				//				debug($squema);
				//
				//debug(array_merge($dispCross[1],$dispSquema));
				//
				$disp[1] = $disp[2] = $disp[4] = $dispSquema;

				foreach ($dispSquema as $skey => $sdata) {
					if($dispCross[1][$skey]){
							$disp[1][$skey] = array_replace($dispSquema[$skey],$dispCross[1][$skey]);
					}
					if($dispCross[2][$skey]){
							$disp[2][$skey] = array_replace($dispSquema[$skey],$dispCross[2][$skey]);
					}
					if($dispCross[4][$skey]){
							$disp[4][$skey] = array_replace($dispSquema[$skey],$dispCross[4][$skey]);
					}
				}

				debug($disp);

				$percents = $disp ;
//				debug($percents);
// NOTE NOTE DEBUG WORK from HIR
				foreach ( $percents as $idOp => $concept ){
				//	debug($idOp);debug($concept);
					foreach( $concept as $group_name => $areas_units ){
//						debug($areas_units);
						foreach ($areas_units as $area => $units) {
//							debug($area); debug($units);
							$percents[$idOp][$group_name][$area] =round( ($units*100)/($totalCross[$idOp][$area]),2 );
						}
					}
 				}

				//	debug(array_replace($dispSquema,$dispCross[1]));
//				debug($percents);

			foreach($percents as $k => $v) {
				krsort($v);				
					foreach ($v as $key => $data) {
					// NOTE data for columns 
					//
							$json_parsing_lv_one[$k] .= json_encode(
																				array(
																								 'name'=>$key
																								,'data'=>'['.implode(',',$data).']'
																						 )
																								, JSON_PRETTY_PRINT
							);	
					}
			}

		debug($json_parsing_lv_one);

		$json_parsing_level_index[1] = implode('},{',explode('}{', str_replace ('"[','[', str_replace(']"',']',$json_parsing_lv_one[1]) ) ));
		$json_parsing_level_index[2] = implode('},{',explode('}{', str_replace ('"[','[', str_replace(']"',']',$json_parsing_lv_one[2]) ) ));
		$json_parsing_level_index[4] = implode('},{',explode('}{', str_replace ('"[','[', str_replace(']"',']',$json_parsing_lv_one[4]) ) ));

//		debug($json_parsing_level_index[1]);

 
//		debug(	$disponibilidadViewAreaUnits );


	//debug("'".implode("','",$bssus)."'");
//////////////////////////////////////////////// NOTE END CODE /////////////////////////////////////////////////


// NOTE add the new vars
		$this->set(compact(
						'bssus','operacion','units_type','tipoOperacion'
						,'disponibilidadViewRptGroupGstIndicators'
	//					,'disponibilidadView'
						,'json_parsing_level_index','disp','groups','percents'
					)
		);
// NOTE End the main 
	} // NOTE End index



	function view($id = null) {
		Configure::write('debug',2);

		$this->LoadModel('DisponibilidadViewHistoricalGstIndicator');
		// debug($this->params);
		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);
		// $conditions = array();
		// $add_conditions = array();
		// foreach ($posted as $keys => $postvalue) {
		//
		// 	if ($keys > 0 ) {
		// 		$content = $postvalue['name'];
		// 		// debug($postvalue['value']);
		// 		$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		// 		// debug($chars);
		// 		if ( isset($chars[1]) && $chars[1] == 'DisponibilidadViewHistoricalGstIndicator' && $postvalue['value'] != '') {
		//
		// 			// if ($chars[2] == 'Funcionario' && $postvalue['value'] != '') {
		// 			// 	// code...
		// 			// }
		//
		// 			$add_conditions[$chars[2]] = $postvalue['value'];
		// 			$conditions[$chars[2]] = $postvalue['value'];
		// 		}
		// 		// if(isset($chars[2])) {
		// 		// 	$conditions[$chars[2]] = $postvalue['value'];
		// 		// }
		// 	}
		// }

		$conditions['DisponibilidadViewHistoricalGstIndicator.unidad'] = $posted['unidad'];
		// debug($conditions);
		$disponibilidadViewHistoricalGstIndicators = $this->DisponibilidadViewHistoricalGstIndicator->find('all',array('conditions'=>$conditions));

		$json_parsing_lv_one = null;
				$disp_hist = $disponibilidadViewHistoricalGstIndicators ;

				foreach ($disp_hist as $key => $data) {
					// code...
					// debug($data);
							$json_parsing_lv_one .= json_encode(
																				array(
																								 'name'=>$data['DisponibilidadViewHistoricalGstIndicator']['estatus']
																								,'y'=>round($data['DisponibilidadViewHistoricalGstIndicator']['compromiso'],2)
																								// ,'drilldown'=>$key_viajes
																								,'drilldown'=>null
																						 )
																								, JSON_PRETTY_PRINT
													);

				}

				$json_parsing_level_one = implode('},{',explode('}{',$json_parsing_lv_one));
// DEBUG:
// debug($json_parsing_level_one);
		$this->set(compact('disponibilidadViewHistoricalGstIndicators','json_parsing_level_one'));

		// debug($disponibilidadViewHistoricalGstIndicators);

		//
		// exit();
		// if (!$id) {
		// 	$this->Session->setFlash(__('Invalid disponibilidad view rpt unidades gst indicator', true));
		// 	$this->redirect(array('action' => 'index'));
		// }
		// $this->set('disponibilidadViewRptUnidadesGstIndicator', $this->DisponibilidadViewRptUnidadesGstIndicator->read(null, $id));

		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	} //end view




	function add() {

		Configure::write('debug', 1);
		// NOTE check like if $this->data
		debug($this->params);
		// exit();

	if (!empty($this->params['named']['save']) && $this->params['named']['save'] != null) {

		debug($this->params['named']['save']);

		$posted['DisponibilidadTblUnidadesGstIndicator'] = json_decode(base64_decode($this->params['named']['save']),true);
		debug($posted);
		$conditions = $posted;
		//
		// foreach ($posted as $keys => $postvalue) {
		//
		// 	if ($keys > 0 ) {
		// 		$content = $postvalue['name'];
		// 		$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
		// 		if ( $postvalue['value'] != "") {
		// 			$conditions[$chars[2]] = $postvalue['value'];
		// 		}
		// 	}
		//
		// }

		// set the search array
		// $dates = array('entregaFacturaCliente','aprobacionFactura','fechaPromesaPago','fechaPago');
		//
		// foreach ($conditions as $indx => $perData) {
		// 	if ( in_array($indx,$dates) == true ) {
		// 		if ($perData != "" OR $perData != null) {
		// 			$dates_conv = new DateTime($perData);
		// 			$conditions[$indx] = $dates_conv->format('Y-m-d');
		// 		}
		// 	}
		// }
	debug($conditions);
	// exit();
}

if (!empty($conditions)) {
	$this->LoadModel('DisponibilidadTblUnidadesGstIndicator');
	$this->DisponibilidadTblUnidadesGstIndicator->create();
	if ($this->DisponibilidadTblUnidadesGstIndicator->save($conditions)) {
		// $this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator has been saved', true));
		// $this->redirect(array('action' => 'index'));
		debug('save is successfully');
	} else {
		// $this->Session->setFlash(__('The disponibilidad tbl unidades gst indicator could not be saved. Please, try again.', true));
		debug('something is wrong !!');
	}
}
// exit();
		// NOTE set the response output for an ajax call
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid disponibilidad view rpt unidades gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->DisponibilidadViewRptUnidadesGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The disponibilidad view rpt unidades gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The disponibilidad view rpt unidades gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->DisponibilidadViewRptUnidadesGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for disponibilidad view rpt unidades gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->DisponibilidadViewRptUnidadesGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Disponibilidad view rpt unidades gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Disponibilidad view rpt unidades gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
