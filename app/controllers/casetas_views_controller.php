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
class CasetasViewsController extends AppController {

	var $name = 'CasetasViews';


	function index($casetas_historical_conciliations_id=null,$casetas_controls_files_id=null,$casetas_standings_id=null) {
// 		casetas_historical_conciliations_id:1/casetas_controls_files_id:1/casetas_standings_id:8
// 		debug($this->params);
// 		var_dump($casetas_historical_conciliations_id);
// 		debug($casetas_controls_files_id);
// 		debug($casetas_standings_id);
// 		debug($this->data);
// 		$this->set(compact('data'));
		if (!empty($this->params['named'])) {
			$conditionsCasetasViews['CasetasView.casetas_historical_conciliations_id'] = $this->params['named']['casetas_historical_conciliations_id'];
			$conditionsCasetasViews['CasetasView.casetas_controls_files_id'] = $this->params['named']['casetas_controls_files_id'];
			$conditionsCasetasViews['CasetasView.casetas_standings_id'] = $this->params['named']['casetas_standings_id'];

            if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
			  // ah!
            } else {
                $conditionsCasetasViews['CasetasView._status'] = '1';
            }

		} else {

			if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
                $conditionsCasetasViews = null;
            } else {
                $conditionsCasetasViews['CasetasView._status'] = '1';
            }

		}
// 		debug($conditionsCasetasViews);
// 		exit();
// http://integradev/gst/CasetasViews/edit/
// id:3053916/
// iave_key:IMDM24021428../
// monto:1310.0000/
// nombre:QUERETARO%20ARCO%20N%201/
// unidad:TT1248/
// fecha_cruce:2017-09-10/
// hora_cruce:14:32:37.0000000
		$this->paginate = array(
			'conditions' => $conditionsCasetasViews,
			'limit' => 500,
			'order' => array(
                            'CasetasView.id' => 'desc'
                            )
		);
// 		$this->paginate['conditions'] = $conditionsCasetasViews;
// 		debug($this->paginate());
		$this->LoadModel('CasetasStanding');
		$standings_name = $this->CasetasStanding->find('list',array('conditions'=>array('CasetasStanding.id'=>$this->params['named']['casetas_standings_id'])));

		if (key($standings_name) == 6) {
			$blockquote = 'Fechas de Cruce no encontrados en LIS';
		} else {
			$blockquote = null;
		}

		$this->CasetasView->recursive = 0;
		$this->set('standings_name',html_entity_decode(htmlentities(current($standings_name),ENT_XHTML,'ISO-8859-1')));
		$this->set('standings_blockquote',$blockquote);
		$this->set('casetasViews', $this->paginate('CasetasView'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas view', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasView', $this->CasetasView->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasView->create();
			if ($this->CasetasView->save($this->data)) {
				$this->Session->setFlash(__('The casetas view has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view could not be saved. Please, try again.', true));
			}
		}
		$casetasHistoricalConciliations = $this->CasetasView->CasetasHistoricalConciliation->find('list');
		$casetasControlsFiles = $this->CasetasView->CasetasControlsFile->find('list');
		$casetasStandings = $this->CasetasView->CasetasStanding->find('list');
		$casetasParents = $this->CasetasView->CasetasParent->find('list');
		$this->set(compact('casetasHistoricalConciliations', 'casetasControlsFiles', 'casetasStandings', 'casetasParents'));
	}


    function getStringBetween($str,$from,$to) {
        $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
        return substr($sub,0,strpos($sub,$to));
    }

    function extract_string ($string = null,$mapper=array()) {
        foreach ($mapper as $idx => $map_data) {
            $mapper[$idx] = str_replace($string,'',$map_data);
        }
        return $mapper;
    }

	function save () {

        debug($this->data);
        debug($this->params);

        $this->data = key($this->params['form']);

        $casetas_historical_conciliations_id = $this->params['named']['casetas_historical_conciliations_id'];
        $casetas_controls_files_id = $this->params['named']['casetas_controls_files_id'];

//         debug($this->data);

        foreach (explode(':',$this->data) as $value) {
                preg_match_all("~\"(.+?)\"~", $value, $m);
                $code[] = $m[1];
        }

        foreach ($code as $id_code => $data_code) {
//             debug($data_code);
            foreach ($data_code as $idx_dcode => $dat_dcode) {
                if (substr($dat_dcode,0,3) === 'lis') {
                    unset($data_code[$idx_dcode]);
                    $code_trvls[$id_code][substr($dat_dcode,4)] = $this->extract_string('iave_',$data_code);
                }
            }
        }

//         debug($code_trvls);

        $this->LoadModel('CasetasView');
        $this->LoadModel('CasetasLisFullConciliation');
        $this->LoadModel('Caseta');
        $this->Loadmodel('CasetasIaveCasetaDescription');

        $cto_mex_id = $this->CasetasIaveCasetaDescription->find('list',array('fields'=>array('id','casetas_iave_id')));
        $modified_date = date('Y-m-d H:m:s');

//         debug($code_trvls);

// // // // // // Update this

//         $this->LoadModel('Caseta');
// 		$arr_casetas = $this->CasetasView->find('list',array('conditions'=>$conditionsCasetasViewCon,'fields'=>array('id','iave_cruce_id')));
// //         debug($arr_casetas);
// //         debug(array_values($arr_casetas));
//         $conditions_casetas_file['Caseta.id'] = array_values($arr_casetas);


        foreach ($code_trvls as $code_data_trv) {
//             debug(key($code_data_trv));
            $conditions_rips['CasetasView.id'] = key($code_data_trv);
            $conditions_rips['CasetasView.casetas_historical_conciliations_id'] = $casetas_historical_conciliations_id;
            $conditions_rips['CasetasView.casetas_controls_files_id'] = $casetas_controls_files_id;

//             debug($this->CasetasView->find('all',array('conditions'=>$conditions_rips)));

            $cas_ = $this->CasetasView->find('all',array('conditions'=>$conditions_rips));

            debug($cas_['0']['CasetasView']);

            foreach ($code_data_trv as $no_viaje => $id_iave) {
                debug('iave?');
//                 debug('casetasView for update => '.key($code_data_trv));
                if (isset($id_iave) AND !empty($id_iave)) {
                    debug('yes');

                    $conditionsCasVN['CasetasView.id'] = $id_iave;

                    $iaves = $this->CasetasView->find('all', array('conditions'=>$conditionsCasVN));
                    debug($iaves[0]['CasetasView']);

                    $save_casetas['CasetasView']['id'] = key($code_data_trv);

                    // which record in file ?
                    $arr_casetas = $this->CasetasView->find('list',array('conditions'=>$conditionsCasVN,'fields'=>array('id','iave_cruce_id')));




                    debug($arr_casetas);
//                     debug(array_values($arr_casetas));
                    debug('id for delete => '.key($arr_casetas));
                    debug('id for take => '.current($arr_casetas));
                    debug('casetasView for update => '.key($code_data_trv));

/*
                    $conditions_casetas_file['Caseta.id'] = array_values($arr_casetas);
                    $iaves_j = $this->Caseta->find('all', array('conditions'=>$conditions_casetas_file));
                    debug($iaves_j);*/

// // //      update section
//                     $this->CasetasView->updateAll(array('no_viaje'=>key($code_data_trv), 'no_tarjeta_iave'=> '\''.$cas_['CasetasLisFullConciliation']['iave_catalogo'].'\'','id_unidad'=>'\''.$cas_['CasetasLisFullConciliation']['id_unidad'].'\'','f_despachado'=>'\''.$cas_['CasetasLisFullConciliation']['f_despachado'].'\'','fecha_fin_viaje'=>'\''.$cas_['CasetasLisFullConciliation']['fecha_real_fin_viaje'].'\'','casetas_standings_id'=>'1','casetas_parents_id'=>'4','modified'=>'\''.$modified_date.'\''),array('casetasView.id'=>key($code_data_trv)));


            $iave_caseta_id_file = $iaves[0]['CasetasView']['iave_caseta_id'];
            $conditions_view['CasetasView.id'] = key($code_data_trv);

            $name_casetas_view = $this->CasetasView->find('all',array('conditions'=>$conditions_view))['0']['CasetasView']['description_casetas'];


            debug($iave_caseta_id_file);

            if(in_array($iave_caseta_id_file,$cto_mex_id)){
                $name_iave_file = $this->CasetasView->find('list',array('conditions'=>$conditionsCasVN,'fields'=>array('id','alpha_location')));
            } else {
                $name_iave_file = $this->CasetasView->find('list',array('conditions'=>$conditionsCasVN,'fields'=>array('id','key_num_5')));
            }

                debug($name_casetas_view);
                debug(current($name_iave_file));

                debug(str_replace('.','',$name_casetas_view));
                $name_conciliato = trim(str_replace('.','',$name_casetas_view));


                debug(str_replace('.','',current($name_iave_file)));
                $name_file = trim(str_replace('.','',current($name_iave_file)));


$search_names = false;

                if ($search_names == false) {
                    if ($name_conciliato == $name_file) {
                        e('name is ok and go to break'. "\n");
                        $search_names = true;
//                         break;
                    } else {
                        e('name not found fetch next '. "\n");
                    }
                }

                if ($search_names == false) {
                    foreach(explode('-',$name_file) as $id_name => $name) {

                        if (in_array($name,explode('-',$name_conciliato))) {
                            e('name in_array with guion is ok and go to break'. "\n");
                            $search_names = true;
//                             break;
                        } else {
                            e('names in_array aren\'t the same with guion '." \n");
                        }
                    }
                }

                if ($search_names == false) {
                    foreach(explode(' ',$name_file) as $id_name => $name) {

                        if (in_array($name,explode(' ',$name_conciliato))) {
                            e('name in_array with space is ok and go to break'. "\n");
                            $search_names = true;
//                             break;
                        } else {
                            e('names in_array aren\'t the same with space '." \n");
                        }
                    }
                }

                if ($search_names == false) {
                    foreach(explode('(',$name_file) as $id_name => $name) {

                        if (in_array($name,explode('(',$name_conciliato))) {
                            e('name in_array with ( is ok and go to break'. "\n");
                            $search_names = true;
//                             break;
                        } else {
                            e('names in_array aren\'t the same with ( '." \n");
                        }
                    }
                }

  debug('is search_names true ;');
  var_dump($search_names);
  // exit();
                    if ($search_names == true) {

                    $this->CasetasView->updateAll(
                                    array(
                                            'unit'=> '\''.$iaves[0]['CasetasView']['unit'].'\'',
                                            'alpha_num_code'=> '\''.$iaves[0]['CasetasView']['alpha_num_code'].'\'',
                                            'alpha_location'=>'\''.$iaves[0]['CasetasView']['alpha_location'].'\'',
                                            'alpha_location_1'=>'\''.$iaves[0]['CasetasView']['alpha_location_1'].'\'',
                                            '_filename'=>'\''.$iaves[0]['CasetasView']['_filename'].'\'',
                                            'fecha_cruce'=>'\''.$iaves[0]['CasetasView']['fecha_cruce'].'\'',
                                            'float_data'=>'\''.$iaves[0]['CasetasView']['float_data'].'\'',
                                            'hora_cruce'=>'\''.$iaves[0]['CasetasView']['hora_cruce'].'\'',
                                            'cia'=>'\''.$iaves[0]['CasetasView']['cia'].'\'',
                                            'Monto_archivo'=>'\''.$iaves[0]['CasetasView']['Monto_archivo'].'\'',
                                            'key_num_5' => '\''.$iaves[0]['CasetasView']['key_num_5'].'\'',
    //                                         'date_cruce' => '\''.$iaves[0]['CasetasView']['fecha_cruce'].' '.$iaves[0]['CasetasView']['hora_cruce'].'\'',
                                            'iave_cruce_id' => '\''.$iaves[0]['CasetasView']['iave_cruce_id'].'\'',
                                            '_monto_archivo' => '\''.$iaves[0]['CasetasView']['_monto_archivo'].'\'',
                                            'iave_ejes' => '\''.$iaves[0]['CasetasView']['iave_ejes'].'\'',
                                            'iave_iave' => '\''.$iaves[0]['CasetasView']['iave_iave'].'\'',
                                            'iave_caseta_id' => '\''.$iaves[0]['CasetasView']['iave_caseta_id'].'\'',
                                            'period_iave_id' => '\''.$iaves[0]['CasetasView']['period_iave_id'].'\'',
                                            'casetas_standings_id'=>'1',
                                            'casetas_parents_id'=>'4',
                                            'modified'=>'\''.$modified_date.'\''
                                        )
                                    ,array(
                                            'casetasView.id'=>key($code_data_trv)
                                        )
                                );


                        $this->CasetasView->updateAll(array('_status'=>'0'),array('id'=>key($arr_casetas)));
                    }

                } else {
                    debug('no');
                }

            }
        }

// // // // When all is finish then update
$this->CasetasView->query("exec sp_upt_tollbooth_manual_conciliation '{$casetas_controls_files_id}' ,'{$casetas_historical_conciliations_id}' ,'1' ;");
//      if (   ) {
//         $this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
//                                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                                     <span aria-hidden="true">&times;</span>
//                                 </button>
//                                 <strong> La conciliacion Manual se ejecuto correctamente </strong>
//                             </div>', true));
//      } else {
//         $this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
//                                         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                                             <span aria-hidden="true">&times;</span>
//                                         </button>
//                                         <strong> Ocurrio un problema en la ejecucion manual de la conciliacion actualize e intente de nuevo  </strong>
//                                     </div>', true));
//      }

//      $this->redirect(array('controller'=>'CasetasViews','action' => 'index/'.$casetas_controls_files_id.'/sort:id/direction:asc'));

//          if ($this->CasetasView->query("exec sp_upt_tollbooth_manual_conciliation '{$casetas_controls_files_id}' ,'{$casetas_historical_conciliations_id}' ,'1' ;")) {
//             $this->CasetasView->query("exec sp_upt_tollbooth_manual_trips_not_conciliation ;");
// 				$this->Session->setFlash(__('The casetas view has been saved', true));
// // 				$this->redirect(array('action' => 'edit'));
// 				$this->redirect($this->referer(array('action' => 'edit')));
// 			} else {
// 				$this->Session->setFlash(__('The casetas view could not be saved. Please, try again.', true));
// 			}
//
//         exit();
	}

	function export() {
//         debug($this->data);
//         debug($this->params);

//         $this->data['CasetasView'] = $this->params['named'];
//         $casetas_historical_conciliations_id = $this->data['CasetasView']['casetas_historical_conciliations_id'];
// 		$casetas_controls_files_id = $this->data['CasetasView']['casetas_controls_files_id'];
// 		$casetas_standings_id =  $this->data['CasetasView']['casetas_standings_id'];
//
// 		$casetas_print['CasetasView.casetas_controls_files_id'] = $casetas_controls_files_id;
//         $casetas_print['CasetasView.casetas_historical_conciliations_id'] = $casetas_historical_conciliations_id;
//         $casetas_print['CasetasView.casetas_standings_id'] = $casetas_standings_id;
//
//         $casetasView = $this->CasetasView->find('all',array('conditions'=>$casetas_print));
//
//         $this->set(compact('casetasView'));

		if (!empty($this->params['named'])) {
			$conditionsCasetasViews['CasetasView.casetas_historical_conciliations_id'] = $this->params['named']['casetas_historical_conciliations_id'];
			$conditionsCasetasViews['CasetasView.casetas_controls_files_id'] = $this->params['named']['casetas_controls_files_id'];
			$conditionsCasetasViews['CasetasView.casetas_standings_id'] = $this->params['named']['casetas_standings_id'];

            if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
			  // ah!
            } else {
                $conditionsCasetasViews['CasetasView._status'] = '1';
            }

		} else {

			if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
                $conditionsCasetasViews = null;
            } else {
                $conditionsCasetasViews['CasetasView._status'] = '1';
            }

		}
// 		debug($conditionsCasetasViews);
// 		exit();
// 		$this->paginate = array(
// 			'conditions' => $conditionsCasetasViews,
// 			'limit' => 20500,
// 			'order' => array(
//                             'CasetasView.id' => 'desc'
//                             )
// 		);

		$casetasView = $this->CasetasView->find('all',array('conditions'=>$conditionsCasetasViews));

// 		$this->paginate['conditions'] = $conditionsCasetasViews;
// 		debug($this->paginate());
		$this->LoadModel('CasetasStanding');
		$standings_name = $this->CasetasStanding->find('list',array('conditions'=>array('CasetasStanding.id'=>$this->params['named']['casetas_standings_id'])));

		if (key($standings_name) == 6) {
			$blockquote = 'Fechas de Cruce no encontrados en LIS';
		} else {
			$blockquote = null;
		}

		$this->CasetasView->recursive = 0;
		$this->set('standings_name',html_entity_decode(htmlentities(current($standings_name),ENT_XHTML,'ISO-8859-1')));
		$this->set('standings_blockquote',$blockquote);
// 		$this->set('casetasViews', $this->paginate('CasetasView'));
		$this->set('casetasViews', $casetasView);

        // Configure::write('debug', 0);
// 		$this->autoRender = false;
		$this->autoLayout = false;


	}

	function edit($id = null) {
//         debug($this->data);
//         debug($this->params);
	Configure::write('debug', 2);
        $id = $this->params['named']['id'];
//         var_dump($id);

//         exit();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas view', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
//             if ($this->CasetasView->save($this->data)) {
// 				$this->Session->setFlash(__('The casetas view has been saved', true));
// 				$this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The casetas view could not be saved. Please, try again.', true));
// 			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasView->read(null, $id);
		}

// 		debug($this->data);
		$casetas_historical_conciliations_id = $this->data['CasetasView']['casetas_historical_conciliations_id'];
		$casetas_controls_files_id = $this->data['CasetasView']['casetas_controls_files_id'];

		$this->LoadModel('CasetasLisFullConciliation');




		//hir
//         $conditionsCasetasNotView['CasetasView.casetas_historical_conciliations_id'] = $this->data['CasetasView']['casetas_historical_conciliations_id'];
// 		$conditionsCasetasNotView['CasetasView.casetas_controls_files_id'] = $this->data['CasetasView']['casetas_controls_files_id'];
// 		$conditionsCasetasNotView['CasetasView.no_tarjeta_iave'] = $this->params['named']['tarjeta_iave'];
// 		$conditionsCasetasNotView['CasetasView.casetas_standings_id'] = '5';
// 		$conditionsCasetasNotView['CasetasView.id'] = $id;


		if (isset($this->params['named']['iave_key'])) {
        // set a filter when unidad or iave exists
            $conditionsCasetasNotConc['CasetasView.casetas_historical_conciliations_id'] = $this->data['CasetasView']['casetas_historical_conciliations_id'];
            $conditionsCasetasNotConc['CasetasView.casetas_controls_files_id'] = $this->data['CasetasView']['casetas_controls_files_id'];
            $conditionsCasetasNotConc['CasetasView.no_tarjeta_iave'] = $this->params['named']['iave_key'];
            $conditionsCasetasNotConc['CasetasView.no_viaje <>'] = null;
            $conditionsCasetasNotConc['CasetasView._status'] = 1;
		} else if ( isset($this->params['named']['tarjeta_iave']) ) {
            $conditionsCasetasNotConc['CasetasView.casetas_historical_conciliations_id'] = $this->data['CasetasView']['casetas_historical_conciliations_id'];
            $conditionsCasetasNotConc['CasetasView.casetas_controls_files_id'] = $this->data['CasetasView']['casetas_controls_files_id'];
            $conditionsCasetasNotConc['casetasView.no_tarjeta_iave'] = $this->params['named']['tarjeta_iave'];
            $conditionsCasetasNotConc['CasetasView.no_viaje <>'] = null;
            $conditionsCasetasNotConc['CasetasView._status'] = 1;
		}
		$conditionsCasetasNotConc['CasetasView.orden <>'] = null ;
		// debug($conditionsCasetasNotConc);
        if($id and !isset($this->params['named']['iave_key']) and !isset($this->params['named']['tarjeta_iave'])) {
            $conditionsCasetasNotConc['CasetasView.id'] = $id;
            $conditionsCasetasNotConc['CasetasView.casetas_historical_conciliations_id'] = $this->data['CasetasView']['casetas_historical_conciliations_id'];
            $conditionsCasetasNotConc['CasetasView.casetas_controls_files_id'] = $this->data['CasetasView']['casetas_controls_files_id'];
            $conditionsCasetasNotConc['CasetasView.no_viaje <>'] = null;
            $conditionsCasetasNotConc['CasetasView._status'] = 1;
//             $conditionsCasetasNotConc['CasetasView._status'] = 1;
        }
		$casetasViewNotConciliations = $this->CasetasView->find('all', array('conditions'=>array($conditionsCasetasNotConc)));

//         debug($casetasViewNotConciliations);

		$conditionsCasetasViewCon['CasetasView.casetas_controls_files_id'] = $this->data['CasetasView']['casetas_controls_files_id'];
		$conditionsCasetasViewCon['CasetasView.casetas_historical_conciliations_id'] = $this->data['CasetasView']['casetas_historical_conciliations_id'];
		if (isset($this->params['named']['iave_key'])) {
            $conditionsCasetasViewCon['CasetasView.alpha_num_code'] = $this->params['named']['iave_key'];
		} else if ( isset($this->params['named']['tarjeta_iave']) ) {
            $conditionsCasetasViewCon['CasetasView.alpha_num_code'] = $this->params['named']['tarjeta_iave'];
		}
		$conditionsCasetasViewCon['CasetasView.casetas_standings_id <>'] = 1 ;
		$conditionsCasetasViewCon['CasetasView.iave_cruce_id <>'] = null ;
        $conditionsCasetasViewCon['CasetasView._status'] = 1 ;


		$this->paginate = array(
			'conditions' => $conditionsCasetasViewCon,
			'limit' => 500
		);

// 		$casetasViewConciliationPaginate = $this->CasetasView->find('all',array('conditions'=>$conditionsCasetasViewCon));

// 		$casetasViewConciliation = $this->paginate($casetasViewConciliationPaginate);

		$casetasViewConciliation = $this->paginate('CasetasView');

// 		debug($casetasViewNotConciliations);

		foreach ( $casetasViewNotConciliations as $trips ) {
            foreach ($trips['CasetasView'] as $desc => $retri) {
//                 debug($desc);
                $casetasNotConciliatinsDetail[$trips['CasetasView']['no_viaje']][$trips['CasetasView']['id']][$desc] = $retri;
                $casetasNotConciliatinsDetailtr[$trips['CasetasView']['no_viaje']]['fecha_real_viaje'] = $trips['CasetasView']['fecha_real_viaje'];
                $casetasNotConciliatinsDetailtr[$trips['CasetasView']['no_viaje']]['fecha_real_fin_viaje'] = $trips['CasetasView']['fecha_real_fin_viaje'] ;
                $casetasNotConciliatinsDetailtr[$trips['CasetasView']['no_viaje']]['diff_length_hours'] = $trips['CasetasView']['diff_length_hours'];
                $casetasNotConciliatinsDetailtr[$trips['CasetasView']['no_viaje']]['id_unidad'] = $trips['CasetasView']['id_unidad'] ;
                $casetasNotConciliatinsDetailtr[$trips['CasetasView']['no_viaje']]['iave_catalogo'] = $trips['CasetasView']['no_tarjeta_iave'] ;
                $casetasNotConciliatinsDetailtr[$trips['CasetasView']['no_viaje']]['id_ruta'] = $trips['CasetasView']['id_ruta'] ;
//                 $casetasNotConciliatinsDetailtr[$trips['CasetasView']['no_viaje']]['monto_iave'] = $trips['CasetasView']['monto_iave'] ;

            }
		}

//          debug($casetasNotConciliatinsDetailtr);

    // NOTE select the bsu ? XDXD

    	$this->LoadModel('CasetasOption');
        $cond_options['CasetasOption.option_name'] = 'engine_selection';
        $cond_options['CasetasOption.switch'] = '1';

        $needle = $this->CasetasOption->find('list',array('fields'=>array('id','data'),'conditions'=>$cond_options));

				// debug($casetas_unit_id); this not exists ??? jajajajaja

        if(isset($casetas_unit_id)) {
            $condCtrlUser['CasetasControlsUser.user_id'] = $_SESSION['Auth']['User']['id'];
            $this->LoadModel('CasetasControlsUser');
            $casetas_unit_id = $this->CasetasControlsUser->find('list',array('conditions'=>$condCtrlUser,'fields'=>array('user_id','casetas_units_id')));
            $this->LoadModel('BusinessUnit');
            $src_unit = $this->BusinessUnit->find('list',array('fields'=>array('id','name')));
            $cond_uni['CasetasUnit.casetas_units_name'] = $src_unit[current($casetas_unit_id)];
            $this->LoadModel('CasetasUnit');
            $unit_id = $this->CasetasUnit->find('list',array('conditions'=>$cond_uni));

            if (in_array(key($unit_id),$needle) === TRUE) { // 8 bsu unit is teisa
                $filter = true;
            } else {
                $filter = false;
            }

        } else {
            $filter = TRUE;
        }

    // ALERT Done

		$casetasHistoricalConciliations = $this->CasetasView->CasetasHistoricalConciliations->find('list');
		$casetasControlsFiles = $this->CasetasView->CasetasControlsFiles->find('list');
		$casetasStandings = $this->CasetasView->CasetasStandings->find('list');
		$casetasParents = $this->CasetasView->CasetasParents->find('list');
		$this->set(compact('casetasHistoricalConciliations', 'casetasControlsFiles', 'casetasStandings', 'casetasParents','casetasViewNotConciliations','casetasViewConciliation','casetasNotConciliatinsDetail','casetasNotConciliatinsDetailtr','casetas_historical_conciliations_id','casetas_controls_files_id','filter'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas view', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasView->delete($id)) {
			$this->Session->setFlash(__('Casetas view deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas view was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
