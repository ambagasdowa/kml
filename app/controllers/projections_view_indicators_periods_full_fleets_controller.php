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
class ProjectionsViewIndicatorsPeriodsFullFleetsController extends AppController {

	var $name = 'ProjectionsViewIndicatorsPeriodsFullFleets';


	function index() {

			Configure::write('debug',0);

        $this->ProjectionsViewIndicatorsPeriodsFullFleet->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');

        $debug = false ;

        $this->LoadModel('ProjectionsViewBussinessUnit');   // Add units

        //NOTE Call the presupuesto

        // $this->LoadModel('ProjectionsBsuPresupuesto'); // Add presupuesto

    if (!empty($this->params['named']['year']) && !empty($this->params['named']['month'])) {
			$projections_options = $this->params['named'];
            $cyear    = $projections_options['year'];
            $cmonth   = $projections_options['month'];
            if (!empty($this->params['named']['fraction'])) {
                $fraction   = $projections_options['fraction'];
            } else {
                $fraction = 'GRANEL';
            }
		} else {
		    $cyear    = date('Y');
            $cmonth   = date('m');
            $fraction = 'GRANEL';
		}

		// ALERT get avaliable working days over the years
		$work = GetWorkingDays($MexicanoHolidays=GetNationalMexicanHolidays(array('2017','2018')),$debug=false,$return_compact=true,$saturday_is_weekend=false);

		$newFetchDate = new DateTime($cyear.'-'.$cmonth.'-01');
		$newDate = $newFetchDate->format('Y-m-d');

// 		debug('$newDate');
// 		debug($newDate);

        // get the data of working days
		$fullDetailsLabDays = $work[$cyear][$cmonth]['list'];

		$current_lab_days = null;
		$offset_days = null;
		$totalLabDaysInMonth = array_sum($fullDetailsLabDays); // get the working in current month
		$totalFullDaysInMonth = count($fullDetailsLabDays); // counting that


		$newFetchDate->sub(new DateInterval('P1M'));
		$newDateSub = $newFetchDate->format('Y-m-d');
        $off_month = explode('-',$newDateSub);
        // debug($off_month);
		$backwardsMonthDays = $work[$off_month['0']][$off_month['1']]['list'];

		// data of one month backwards
		$totalLabBackwardsMonthDays = array_sum($backwardsMonthDays);
		$totalFullBackwardsMonthDays = count($backwardsMonthDays);

// 		debug('$newDateSub');
// 		debug($newDateSub);
// NOTE @build a today-1 because trafic dont have any

        $newDayDate = new DateTime(date('Y-m-d'));
        $newDayDate->sub(new DateInterval('P1D'));
        $newDay = $newDayDate->format('Y-m-d');

//         debug($newDay);


		$newFetchDate->sub(new DateInterval('P1M'));
		$anotherDateSub = $newFetchDate->format('Y-m-d');

        $an_off_month = explode('-',$anotherDateSub);
        // debug($an_off_month);
		$backwardsMonthDaysTwo = $work[$an_off_month['0']][$an_off_month['1']]['list'];
		// debug($backwardsMonthDaysTwo);
// 		debug('$anotherDateSub');
// 		debug($anotherDateSub);

		$totalLabBackwardsMonthDaysTwo = array_sum($backwardsMonthDaysTwo);
		$totalFullBackwardsMonthDaysTwo = count($backwardsMonthDaysTwo);

// 		$totalFullDaysInCurrentMonth = date('t');
        if ($debug == true) {
            debug('totalLabDaysInMonth => '.$totalLabDaysInMonth);
            debug('totalFullDaysInMonth => '.$totalFullDaysInMonth);

            debug('totalLabBackwardsMonthDays => '.$totalLabBackwardsMonthDays);
            debug('totalFullBackwardsMonthDays => '.$totalFullBackwardsMonthDays);

            debug('totalLabBackwardsMonthDaysTwo => '.$totalLabBackwardsMonthDaysTwo);
            debug('totalFullBackwardsMonthDaysTwo => '.$totalFullBackwardsMonthDaysTwo);
        }

		foreach ($fullDetailsLabDays as $date_key => $setDate) {
            if ($date_key <= $newDay){
                $current_lab_days += $setDate;
            } else {
                $offset_days += $setDate;
            }
		}

		// debug('labs_days => ' . $current_lab_days);

		// debug('offset_days => ' . $offset_days);

    $conditionsProjectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.cyear'] = $cyear;
		$conditionsProjectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.mes'] = ucwords(months_es()[(int)$cmonth]);

		$conditionsProjectionsViewIndicatorsPeriodsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.fraccion'] = $fraction; // this can be dinamic
// 		$conditionsProjectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet.fraccion'] = 'CAJA SECA'; // this can be dinamic

		$projectionsViewIndicatorsPeriodsFullFleets = $this->ProjectionsViewIndicatorsPeriodsFullFleet->find('all',array('conditions'=>$conditionsProjectionsViewIndicatorsPeriodsFullFleet));

		// DEBUG bugging
		// debug($projectionsViewIndicatorsPeriodsFullFleets);

		$bssus = array_values($this->ProjectionsViewBussinessUnit->find('list',array('conditions'=>$bsu_conditions)));
// debug($bssus);
		$new_projections_back = $projectionsViewIndicatorsPeriodsFullFleets;
// debug($new_projections_back);

		foreach ($new_projections_back  as $indx_now => $jarray_now) {
			$array_now[$jarray_now['ProjectionsViewIndicatorsPeriodsFullFleet']['area']] = $jarray_now;
		}

		// debug($array_now);

		foreach ($bssus as $indX => $area_name) {
			// debug($area_name);
			if ( isset ($array_now[$area_name])) {
				$change_proj_inx[] = $array_now[$area_name];
			} else {
				$change_proj_inx[] = array('ProjectionsViewIndicatorsPeriodsFullFleet'=>array('area'=>$area_name));
			}
              // $bsus_key = array_search($array_now['ProjectionsViewIndicatorsPeriodsFullFleet']['area'],$bssus);
							// debug($bsus_key);
              // if ( isset($bsus_key) ) {
              //     $change_proj_inx[$bsus_key] = $array_now;
              // }
		} //NOTE end foreach loop

// debug($change_proj_inx);

		$projectionsViewIndicatorsPeriodsFullFleets = null; //reset
		$projectionsViewIndicatorsPeriodsFullFleets = $change_proj_inx; //load with the new arragement

// 		debug($projectionsViewIndicatorsPeriodsFullFleets);
// calculate from hir
        //hacking
//           $offset_days = 27;
        $conditionsPrep['ProjectionsBsuPresupuesto.cyear'] = $cyear;
        $conditionsPrep['ProjectionsBsuPresupuesto.cmonth'] = (int)$cmonth;
        $conditionsPrep['ProjectionsBsuPresupuesto.fraction'] = $fraction;

//         $presupuesto = $this->ProjectionsBsuPresupuesto->find('list',array('conditions'=>$conditionsPrep,'fields'=>array('fraction','data','bsu_name')));

        // $presupuesto = $this->ProjectionsBsuPresupuesto->find('all',array('conditions'=>$conditionsPrep));
				//
        // debug($presupuesto);

//         foreach ($presupuesto as $ind_prep => $presupuesto_data) {
// //             debug($ind_prep);
// //             debug($presupuesto_data['ProjectionsBsuPresupuesto']);
//
//             $presupuesto_nt[$presupuesto_data['ProjectionsBsuPresupuesto']['cyear']][$presupuesto_data['ProjectionsBsuPresupuesto']['cmonth']][$presupuesto_data['ProjectionsBsuPresupuesto']['bsu_name']][$presupuesto_data['ProjectionsBsuPresupuesto']['fraction']] = $presupuesto_data['ProjectionsBsuPresupuesto']['data'];
//         }

        // debug($presupuesto_nt);

        if ($offset_days > $totalLabBackwardsMonthDays) {
            //making double calculation

						if ($an_off_month['0'] < $off_month['0'] ) { //NOTE check what happen when we are in DECEMBER
							$conditionsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.cyear'] = array($an_off_month['0'],$off_month['0']);
						} else {
							$conditionsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.cyear'] = array($off_month['0']);
						}
            $conditionsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.mes'] = array(ucwords(months_es()[(int)$an_off_month['1']]),ucwords(months_es()[(int)$off_month['1']]));
            $conditionsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.fraccion'] = $fraction; // this can be dinamic
            // debug($conditionsFullFleet);
            $rsl_past_month = $this->ProjectionsViewIndicatorsPeriodsFullFleet->find('all',array('conditions'=>$conditionsFullFleet/*,'fields'=>array('area','subpeso')*/));
						// debug($rsl_past_month);

        } else {

//            e('<kbd>do the stuff</kbd><br />');
//             $totalLabBackwardsMonthDays;
            $conditionsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.cyear'] = $off_month['0'];
            $conditionsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.mes'] = ucwords(months_es()[(int)$off_month['1']]);
            $conditionsFullFleet['ProjectionsViewIndicatorsPeriodsFullFleet.fraccion'] = $fraction; // this can be dinamic
//             debug($conditionsFullFleet);
            $rsl_past_month = $this->ProjectionsViewIndicatorsPeriodsFullFleet->find('all',array('conditions'=>$conditionsFullFleet/*,'fields'=>array('area','subpeso')*/));

            // debug($rsl_past_month);
        }

        if (isset($rsl_past_month)) {
            foreach ($rsl_past_month as $index_rsl_past_month => $ind_rsl_past_month ) {

                foreach ($ind_rsl_past_month['ProjectionsViewIndicatorsPeriodsFullFleet'] as $name_past_index => $data_idc_past_month) {
                    // debug($index_rsl_past_month['ProjectionsViewIndicatorsPeriodsFullFleet']);
                    // debug($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]);

                    if ($name_past_index == 'subpeso') {

//                         e('<kbd>prom tons vs days</kbd><br />');

                        if ( !isset($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['subpeso']) ) {
                            $current_tons = 0;
                        } else {
                            $current_tons = $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['subpeso'];
                        }
                        // sum_tons = current_tons + offset_tons;
                        $sum_tons = ( ($current_tons) + ( ($data_idc_past_month/$totalLabBackwardsMonthDays)*$offset_days) );

												if (isset($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['presupuesto'])) {
													$prep = $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['presupuesto'];
												} else {
													$prep = 0;
												}
												// e('<kbd>Presupuesto</kbd><br />');
												// debug($prep);
												// debug($rsl_past_month[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['area']);
												// debug($index_rsl_past_month);
                        // build the array
                        $rsl_past_month[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['sum_tons'] = ($data_idc_past_month + ( $data_idc_past_month/$totalLabBackwardsMonthDays)*$offset_days);

                        $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['offset_tons'] = ( (( $data_idc_past_month/$totalLabBackwardsMonthDays))*$offset_days);


                        // NOTE add this to the

                        if ( !isset($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['area']) ) {
                            $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['area'] = $ind_rsl_past_month['ProjectionsViewIndicatorsPeriodsFullFleet']['area'];
                        }

                        if ( !isset($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['cyear']) ) {
                            $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['cyear'] = $ind_rsl_past_month['ProjectionsViewIndicatorsPeriodsFullFleet']['cyear'];
                        }
                        if ( !isset($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['fraccion']) ) {
                            $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['fraccion'] = $ind_rsl_past_month['ProjectionsViewIndicatorsPeriodsFullFleet']['fraccion'];
                        }
                        if ( !isset($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['mes']) ) {
                            $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['mes'] = ucwords(months_es()[(int)$cmonth]);
                        }
                        if ( !isset($projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['subpeso']) ) {
                            $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['subpeso'] = 0;
                        }
                        // NOTE add this

                        $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['sum_tons'] = $sum_tons;

                        // $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['presupuesto'] = $prep;

                        $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['current_tons'] = $current_tons;

                        $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['variacion_vs_presupuesto_diario'] = $sum_tons-$prep;


                        if($prep == 0) {
                          $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['variacion_promedio_diario'] = 0;
                        } else {
                            $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['variacion_promedio_diario'] = (($sum_tons/$prep) -1)*100;
                        }
                        $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['current_lab_days'] = $current_lab_days;

                        $projectionsViewIndicatorsPeriodsFullFleets[$index_rsl_past_month]['ProjectionsViewIndicatorsPeriodsFullFleet']['totalLabDaysInMonth'] = $totalLabDaysInMonth;
                    }

                }
            }
        }

//         debug($projectionsViewIndicatorsPeriodsFullFleets);

        // NOTE prepare the UI

//         $this->LoadModel('ProjectionsViewBussinessUnit');   // Add units
        $this->LoadModel('ProjectionsViewFraction');        // Add fractions
        $this->LoadModel('ProjectionsConfig');             // module Configs
//         $this->LoadModel('ProjectionsViewIndicatorsPeriodsFullFleet');             // module Full

        $bsu_conditions = null;
        $bsu_label_conditions = null;
        $fraction_conditions = null;
        // MORE conditions ??
//         $conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.cyear'] = $cyear;

        // NOTE begin the patches -- remove this when done
				$this->LoadModel('ModuleUserCredentialsControl');
        $auth_user = $this->ModuleUserCredentialsControl->getCredentials('all',array('user_id'=>$this->Auth->User('id')));

      if ($auth_user) {
        if (array_key_exists('bsu',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
            $bsu_conditions = $auth_user['ModuleUserCredentialsControl']['bsu'];
            $conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.area'] = $bsu_conditions['ProjectionsViewBussinessUnit.name'];
        }
        if (array_key_exists('bsu_label',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
            $bsu_label_conditions = $auth_user['ModuleUserCredentialsControl']['bsu_label'];
        }
        // if (array_key_exists('fraction',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
        //     $fraction_conditions = $auth_user['ModuleUserCredentialsControl']['fraction'];
        //     $conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.fraccion'] = $fraction_conditions['ProjectionsViewFraction.desc_producto'];
        // }
        if (array_key_exists('areas',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
            $conditions_chart_index = $auth_user['ModuleUserCredentialsControl']['areas'];
        }
        if (array_key_exists('type',$auth_user['ModuleUserCredentialsControl'])) { // set UI type-tabbed filter
            $conditions_mod_index = $auth_user['ModuleUserCredentialsControl']['type'];
        }
      }
         // hir can be another table or section example module , data
        // $auth_users = array(
        //                         // adds for ambagasdowa
        //                         '5'=>array('fraction'=>array('GRANEL'),'type'=>array('toneladas'))
				// 												// '181'=>array('fraction'=>array('GRANEL'),'type'=>array('toneladas'))
        //               );
				//
        // if (array_key_exists($_SESSION['Auth']['User']['id'],$auth_users) === true) { // set areas
				//
        //     if (array_key_exists('areas',$auth_users[$_SESSION['Auth']['User']['id']])) { // set filter for graphics
        //         $conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.area'] = $auth_users[$_SESSION['Auth']['User']['id']]['areas'];
        //     }
        //     if (array_key_exists('bsu',$auth_users[$_SESSION['Auth']['User']['id']])) { // set logical areas filter
        //         $bsu_conditions['ProjectionsViewBussinessUnit.name'] = $auth_users[$_SESSION['Auth']['User']['id']]['bsu'];
        //     }
        //     if (array_key_exists('bsu_label',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI areas filter
        //         $bsu_label_conditions['ProjectionsViewBussinessUnit.label'] = $auth_users[$_SESSION['Auth']['User']['id']]['bsu_label'];
        //     }
        //     if (array_key_exists('fraction',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI fraction filter
        //         $fraction_conditions['ProjectionsViewFraction.desc_producto'] = $auth_users[$_SESSION['Auth']['User']['id']]['fraction'];
        //     }
        //     if (array_key_exists('type',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI type-tabbed filter
        //         $conditions_mod_index['ProjectionsConfig.module_data_definition'] = $auth_users[$_SESSION['Auth']['User']['id']]['type'];
        //     }
//             .... add more filters
        // } else {
                $fraction_conditions['ProjectionsViewFraction.desc_producto'] = 'GRANEL';
                $conditions_mod_index['ProjectionsConfig.module_data_definition'] = 'toneladas';
        // }

        $conditions_mod_index['ProjectionsConfig.projections_type_configs_id'] = 3 ;
        $mod_index = $this->ProjectionsConfig->find('list',array('fields'=>array('module_field_translation','module_data_definition'),'conditions'=>$conditions_mod_index));
        $months = months_es();

        $bsu = $this->ProjectionsViewBussinessUnit->find('list',array('conditions'=>$bsu_conditions));
				$bsu_label = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','label'),'conditions'=>$bsu_label_conditions));
				$fraction = $this->ProjectionsViewFraction->find('list',array('fields'=>array('projections_corporations_id','id_fraccion','desc_producto'),'conditions'=>$fraction_conditions));

		$ui_bsu_index = key($bsu);
		$ui_mod_index = key($mod_index);

		$chart_index = $projectionsViewIndicatorsPeriodsFullFleets;

// 		debug($chart_index);

        foreach ($chart_index as $name_idx => $findForChart) {

            foreach ($mod_index as $module_table => $module_type) {
                if (isset($findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['cyear'])){
                    $chart[$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['cyear']][$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['area']][$module_type][$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['fraccion']][$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['mes']] = $findForChart['ProjectionsViewIndicatorsPeriodsFullFleet'][$module_table];
                }
            }

        }
				// debug($projectionsViewIndicatorsPeriodsFullFleets);
		$this->set(compact('projectionsViewIndicatorsPeriodsFullFleets','bsu','bsu_label','fraction','ui_bsu_index','months','mod_index','chart_index','chart','cyear','cmonth','ui_mod_index'));
// 		Configure::write('debug', 0);
	} // end index


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view indicators periods full fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewIndicatorsPeriodsFullFleet', $this->ProjectionsViewIndicatorsPeriodsFullFleet->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewIndicatorsPeriodsFullFleet->create();
			if ($this->ProjectionsViewIndicatorsPeriodsFullFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods full fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods full fleet could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view indicators periods full fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewIndicatorsPeriodsFullFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods full fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods full fleet could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewIndicatorsPeriodsFullFleet->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view indicators periods full fleet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewIndicatorsPeriodsFullFleet->delete($id)) {
			$this->Session->setFlash(__('Projections view indicators periods full fleet deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view indicators periods full fleet was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
