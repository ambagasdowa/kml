<?php
class CasetasController extends AppController {

	var $name = 'Casetas';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');

	var $presetVars = array(
		array('field' => 'name', 'type' => 'value'),
	);
// 	function beforeFilter() {
// 		parent::beforeFilter();
// 		$this->Auth->allowedActions = array('index', 'view','add','edit','delete');
// 	}

	function index($id=null) {
// 		debug($this->data);
// 		debug($this->params);
//         debug($_SESSION['Auth']['User']['full_name']);

		if (!$id ) {
			$caseta_id = array();
		} else {
			$caseta_id = array('CasetasViewResume.id'=>$id);
		}

// 		debug($id);
//         debug($caseta_id);

		$this->Prg->commonProcess();
// 		$this->Caseta->recursive = 0;

// 		debug($_SESSION['Auth']['User']);
		$this->LoadModel('Company');
		$conditonsCnpy['Company.nom_id'] = $_SESSION['Auth']['User']['company_id'];
		$cpny_id = $this->Company->find('list',array('conditions'=>$conditonsCnpy));
		// debug(key($cpny_id));

		$this->LoadModel('BusinessUnit');
		$this->LoadModel('CasetasCorporation');
		$this->LoadModel('CasetasUnit');
		$this->LoadModel('CasetasViewResume');
		$this->LoadModel('CasetasControlsUser');

		if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
// 			$conditionsUnit = null;
			$conditionsUnits['BusinessUnit.name NOT'] = 'TBKCUL';
			$conditionsCasetasViewResume = array_merge($this->CasetasViewResume->parseCriteria($this->passedArgs),$caseta_id);
		}else {

			$condBsu['CasetasControlsUser.user_id'] = $this->Auth->User('id');
			$bsu_id = current($this->CasetasControlsUser->find('list',array('fields'=>array('user_id','casetas_units_id'),'conditions'=>$condBsu)));
			$condBsuMs['BusinessUnit.id'] = $bsu_id;
			$conditionsUnits['BusinessUnit.company_id'] = key($cpny_id);
			$conditionsUnits['BusinessUnit.name NOT'] = 'TBKCUL';
			$conditionsUnits['BusinessUnit.name LIKE'] = current($this->BusinessUnit->find('list',array('conditions'=>$condBsuMs)));

			$conditionsUnitsGet['CasetasUnit.casetas_units_name like'] = current($this->BusinessUnit->find('list',array('conditions'=>$conditionsUnits)));
// 			debug(current($this->BusinessUnit->find('list',array('conditions'=>$condBsuMs))));
			$id_corporations = $this->CasetasUnit->find('list',array('conditions'=>$conditionsUnitsGet));
// 			$conditionsCasetasViewResume['CasetasViewResume.casetas_units_id'] = key($id_corporations);
			$conditionsCasetasViewResume = array_merge($this->CasetasViewResume->parseCriteria($this->passedArgs),array('CasetasViewResume.casetas_units_id'=>key($id_corporations),$caseta_id));
		}
		$this->CasetasViewResume->parseCriteria($this->passedArgs);
// 		$casetas_resume = $this->CasetasViewResume->find('all',array('conditions'=>$conditionsCasetasViewResume));
		$casetas_resume_stand = $this->resume_stand();

		(checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') ? : $conditionsCasetasViewResume['CasetasViewResume._status'] = '1';


		$this->paginate = array(
			'conditions' => $conditionsCasetasViewResume,
			'limit' => 2,
			'order' => array('CasetasViewResume.id' => 'desc')
		);

// 		'order' => array('Model.created', 'Model.field3 DESC'), //string or array defining order
		$casetas_resume = $this->paginate('CasetasViewResume');
// 		debug($casetas_resume);


		$this->set(compact('casetas_resume','casetas_resume_stand'));
// 		$this->set('casetas', $this->paginate('CasetasResume'));
	}

	function resume_stand(){
		$this->LoadModel('CasetasViewResumeStand');
		$resume_stand = $this->CasetasViewResumeStand->find('all',array('order'=>array('CasetasViewResumeStand.casetas_standings_id ASC')));
		return $resume_stand;
	}

	function closeFile () {
        // add close Conciliations

    debug($this->params['named']);
		if (!empty($this->params['named'])) {
			$casetas_options = $this->params['named'];
		}
		$file_id = $casetas_options['casetas_controls_files_id'];
		$user_id = $casetas_options['user_id'];
		$unit_id = $casetas_options['casetas_units_id'];
		$this->LoadModel('CasetasControlsFile');


			// exit();
// 		$conditionFile['CasetasControlsFile.id'] = $file_id;
//         $this->CasetasControlsFile->updateAll(array('CasetasControlsFile.casetas_parents_id'=>'10'),array('CasetasControlsFile.id'=>$file_id));
// 		debug($this->CasetasControlsFile->find('all',array('conditions'=>$conditionFile)));
		if ($this->CasetasControlsFile->updateAll(array('CasetasControlsFile.casetas_parents_id'=>'10'),array('CasetasControlsFile.id'=>$file_id))) {
            // LOG SECTION
//             $logs['CasetasLog']['data_name'] = 'update parents id as closed concilition';
//             $logs['CasetasLog']['data'] = 'module : casetas successfull execution; user_id : ' .$user_id. ';full_name : '.$_SESSION['Auth']['User']['full_name'].'; worker_id : '.$_SESSION['Auth']['User']['number_id'].'; company : ' .$unit_id.'; engine : '.$engine_name.'; file_id : '.$file_id;
//             $this->CasetasLog->create();
//             $this->CasetasLog->Save($logs['CasetasLog']);
            $this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>La Conciliacion se cerro correctamente </strong>
                </div>', true));
        } else {
            $this->Session->setFlash(__('<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Ocurrio un error en la ejecucion de la Conciliacion , intentelo de nuevo mas tarde</strong>
                    ahora puede volver al
                </div>', true));
        }

        $this->redirect(array('action' => 'index/'.$file_id.'/sort:id/direction:asc'));
// exit();

	} //end closeFile

	function tiger_casetas(){
// 		debug($this->params['named']);
		if (!empty($this->params['named'])) {
			$casetas_options = $this->params['named'];
		}

// 		$casetas_tiger_runs['CasetasTigerRun']['bussines_unit'] =  $casetas_options['casetas_units_id'];
// 		$casetas_tiger_runs['CasetasTigerRun']['casetas_controls_files_id'] =  $casetas_options['casetas_controls_files_id'];
// 		$casetas_tiger_runs['CasetasTigerRun']['user_id'] = $casetas_options['user_id'];
// 		$casetas_tiger_runs['CasetasTigerRun']['created'] = date('Y-m-d H:m:s');
// 		$casetas_tiger_runs['CasetasTigerRun']['_status'] = '1';
// 		$this->LoadModel('CasetasTigerRun');
// 		if($this->CasetasTigerRun->save($casetas_tiger_runs)){

		$file_id = $casetas_options['casetas_controls_files_id'];
		$user_id = $casetas_options['user_id'];
		$unit_id = $casetas_options['casetas_units_id'];

		$this->LoadModel('CasetasOption');
            $cond_options['CasetasOption.option_name'] = 'engine_selection';
            $cond_options['CasetasOption.switch'] = '1';

		$needle = $this->CasetasOption->find('list',array('fields'=>array('id','data'),'conditions'=>$cond_options));

        if (in_array($unit_id,$needle) === TRUE) { // 8 bsu unit is teisa
            $engine = 'sistemas.dbo.sp_tollbooth_poop';
            $engine_name = 'teisa_engine_beta_v.0.0.1';
        } else {
						$engine = 'sistemas.dbo.sp_tollbooth_poop';
            // $engine = 'sistemas.dbo.sp_tollbooth_net';
            $engine_name = 'engine_stable_v2.0.1';
        }

        // manual section
        $this->LoadModel('CasetasLog');

//         debug($this->CasetasLogs->find('list'));

        if ($this->Caseta->query("exec sp_upt_tollbooth_zam_trips_records_conciliation;")) {

            // LOG SECTION
            $logs['CasetasLog']['data_name'] = 'procedure execution sp_upt_tollbooth_zam_trips_records_conciliation';
            $logs['CasetasLog']['data'] = 'module : casetas successfull execution; user_id : ' .$user_id. ';full_name : '.$_SESSION['Auth']['User']['full_name'].'; worker_id : '.$_SESSION['Auth']['User']['number_id'].'; company : ' .$unit_id.'; engine : '.$engine_name.'; file_id : '.$file_id;
            $this->CasetasLog->create();
            $this->CasetasLog->Save($logs['CasetasLog']);

                if($this->Caseta->query("exec ".$engine." ".(int)$unit_id.", ".(int)$file_id.", ".(int)$user_id.";")){

                        $logs['CasetasLog']['data_name'] = 'procedure => run '.$engine;
                        $logs['CasetasLog']['data'] = 'module : casetas successfull execution; user_id : ' .$user_id. ';full_name : '.$_SESSION['Auth']['User']['full_name'].'; worker_id : '.$_SESSION['Auth']['User']['number_id'].'; company : ' .$unit_id.'; engine : '.$engine_name.'; file_id : '.$file_id;
                        $this->CasetasLog->create();
                        $this->CasetasLog->Save($logs['CasetasLog']);

                        $this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>La Conciliacion se ejecuto correctamente with '.$engine_name.'</strong>
                            </div>', true));
                } else {

                        $logs['CasetasLog']['data_name'] = 'procedure => run '.$engine;
                        $logs['CasetasLog']['data'] = 'module : casetas unsuccessfull execution; user_id : ' .$user_id. ';full_name : '.$_SESSION['Auth']['User']['full_name'].'; worker_id : '.$_SESSION['Auth']['User']['number_id'].'; company : ' .$unit_id.'; engine : '.$engine_name.'; file_id : '.$file_id;
                        $this->CasetasLog->create();
                        $this->CasetasLog->Save($logs['CasetasLog']);

                        $this->Session->setFlash(__('<div class="alert alert-warning alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Ocurrio un error en la ejecucion de la Conciliacion , intentelo de nuevo mas tarde</strong>
                                ahora puede volver al
                            </div>', true));
								}
        } else {
            $logs['CasetasLog']['data_name'] = 'procedure execution sp_upt_tollbooth_zam_trips_records_conciliation';
            $logs['CasetasLog']['data'] = 'module : casetas unsuccessfull execution; user_id : ' .$user_id. ';full_name : '.$_SESSION['Auth']['User']['full_name'].'; worker_id : '.$_SESSION['Auth']['User']['number_id'].'; company : ' .$unit_id.'; engine : '.$engine_name.'; file_id : '.$file_id;
            $this->CasetasLog->create();
            $this->CasetasLog->Save($logs['CasetasLog']);

            $this->Session->setFlash(__('<div class="alert alert-warning alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Ocurrio un error en la Actualizacion de Cruces Lis , intentelo de nuevo mas tarde</strong>
                    ahora puede volver al
                </div>', true));
        } // drop when engine is complete
// 		exit();
// 		$this->redirect(array('action' => 'index/page:'.$casetas_options['casetas_page'].'/sort:id/direction:asc'));
		$this->redirect(array('action' => 'index/'.$file_id.'/sort:id/direction:asc'));

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid caseta', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('caseta', $this->Caseta->read(null, $id));
	}

	function add() {


		// Configure::write('debug',2);

		$this->LoadModel('Company');
		$this->LoadModel('BusinessUnit');
		$this->LoadModel('CasetasControlsConciliation');
		$this->LoadModel('CasetasControlsUser');

		$conditionsCompany['Company.nom_id'] = $_SESSION['Auth']['User']['company_id'];
		$company = $this->Company->find('list',array( 'fields'=>array('id','name'),'conditions'=>$conditionsCompany));
		// debug($company);

		if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
			$conditionsUnit = null;
			$conditionsUnit['BusinessUnit.name NOT'] = 'TBKCUL';
		}else {

			$conditions_control['CasetasControlsUser.user_id'] = $_SESSION['Auth']['User']['id'];

			$bsu_control = current($this->CasetasControlsUser->find('list',array('conditions'=>$conditions_control,'fields'=>array('user_id','casetas_units_id'))));

			$conditionsUnit['BusinessUnit.company_id'] = key($company);
			$conditionsUnit['BusinessUnit.name NOT'] = 'TBKCUL';
			$conditionsUnit['BusinessUnit.id'] = $bsu_control;
			// debug($bsu_control);
		}

		$unidades = $this->BusinessUnit->find('list',array('fields'=>array('id','description'),'conditions'=>$conditionsUnit));

// 		debug($unidades);


// 		debug($bsu_control);
// 		debug($this->CasetasControlsUser->findByUserId($_SESSION['Auth']['User']['id']));

// 		debug($unidades);


		$this->set(compact('unidades'));
		$unidades = $this->BusinessUnit->find('list',array('conditions'=>$conditionsUnit));// Reset to default value

		if (!empty($this->data)) {
			$mime = 'text/plain';

// 			debug($company[key($company)]);
// 			debug($unidades[$this->data['Caseta']['_area']]);
			$file_caseta_name = str_replace('.'.end(explode('.',$this->data['Caseta']['upload']['name'])),'',$this->data['Caseta']['upload']['name']);
			/*
			select count(id) as 'numRecords',_filename,_area,_user_company,_username,_datetime_login,_ip_remote from casetas  group by _filename,_area,_user_company,_username,_datetime_login,_ip_remote order by _filename

			*/
			$conditionsFields = array(
							'conditions'=>array(
										'Caseta._filename' => $file_caseta_name
								             ),
							'fields'=>array(
										'COUNT(Caseta.id) as record',
										'Caseta._filename',
										'Caseta._area',
										'Caseta._user_company',
										'Caseta._username',
										'Caseta._datetime_login',
										'Caseta._ip_remote'
									   ),
							'group' =>array(
										'Caseta._filename',
										'Caseta._area',
										'Caseta._user_company',
										'Caseta._username',
										'Caseta._datetime_login',
										'Caseta._ip_remote'
									   )
			);

			$finderCasetaFilename = $this->Caseta->find('all',$conditionsFields);
// 			debug($finderCasetaFilename);
			$md5 = md5_file($this->data['Caseta']['upload']['tmp_name']);
			$stat = stat($this->data['Caseta']['upload']['tmp_name']);
// 			debug($stat);
// 			debug($this->data['Caseta']['upload']['tmp_name']);
// 			debug($stat['atime']);
// 			debug(date('Y-m-d H:m:s',$stat['atime']));
// // 			debug(date('Y-m-d H:m:s'));
// 			debug($stat['mtime']);
// 			debug(date('Y-m-d H:m:s',$stat['mtime']));
// 			debug($stat['ctime']);
// 			debug(date('Y-m-d H:m:s',$stat['ctime']));
// 			debug(filectime($this->data['Caseta']['upload']['tmp_name']));
// 			exit();

			debug($this->data);
			if ( $finderCasetaFilename ) {
				//NOTE this must be a very rare case but one never knows
				if (count($finderCasetaFilename) > 1) {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										El archivo <strong> '.$file_caseta_name.' </strong>
										ya se encuentra en la base de datos.
										Por favor elija otro archivo o dirijase al
										<a href="'.$this->webroot.'/Casetas/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de Casetas</a>
									</div>', true));
					$this->redirect($this->referer());
				}
				$idx_caseta_name = current($finderCasetaFilename);

				$caseta_data['Caseta'] = $idx_caseta_name['Caseta'];
				$caseta_data['Caseta']['records'] = $idx_caseta_name['0']['record'];

				debug($caseta_data);

				$this->Session->setFlash(__('<div class="alert alert-info alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										El archivo <strong><a href="#" id="log_view"> '.$file_caseta_name.' </a></strong>
										ya se encuentra en la base de datos.
										Por favor elija otro archivo o dirijase al
										<a href="'.$this->webroot.'/Casetas/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de Casetas</a>
									</div>

									<div class="log_show" style="display: none">
									<pre>
										<br /> Registros : '.$caseta_data['Caseta']['records'].
										'<br /> Subio : '.$caseta_data['Caseta']['_username'].
										'<br /> Fecha y Hora : '.$caseta_data['Caseta']['_datetime_login'].
										'<br /> IP : '.$caseta_data['Caseta']['_ip_remote'].
										'<br /> Unidad : '.$caseta_data['Caseta']['_area'].
									'</pre>'.
									'</div><br />'.
									'<script>
										$(document).ready(function () {
											$( "#log_view" ).click(function() {
												$( ".log_show" ).toggle(["slow"]);
												console.log("catcha");
											});
										});//end document.ready
									</script>', true));
				$this->redirect($this->referer());
			}

			/** <get user information> **/
			$_username = $_SESSION['Auth']['User']['username'];
			$_datetime = date('Y-m-d H:m:s');
			$_ip = $_SERVER['REMOTE_ADDR'];
// 			$_useragent = $_SERVER['HTTP_USER_AGENT'];
			$_area = $unidades[$this->data['Caseta']['_area']];
// 			debug($_area);
			$_file_size = $this->data['Caseta']['upload']['size'];


			if(strtolower(end(explode('.',$this->data['Caseta']['upload']['name']))) !== ('txt'|'TXT') and ($this->data['Caseta']['upload']['type'] !== $mime) ){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano con la extension txt </strong>
											</div>', true));
				$this->redirect(array('action' => 'add'));
			} else {
				$ext = '.' . strtolower(end(explode('.',$this->data['Caseta']['upload']['name'])));
			}
				$name = basename(md5($this->data['Caseta']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp

				/** NOTE Build Casetas Constrols File */

				$this->LoadModel('CasetasCorporation');
				$this->LoadModel('CasetasUnit');
				$conditionsUnit = null;// reset the conditions
				$conditionsUnit['CasetasUnit.casetas_units_name'] = $_area;

				$conditionsCorporation['CasetasCorporation.id'] = array_values($this->CasetasUnit->find('list',array('fields'=>array('id','casetas_corporations_id'),'conditions'=>$conditionsUnit)));

// 				debug($conditionsUnit);
				$id_unit = $this->CasetasUnit->find('list',array('conditions'=>$conditionsUnit));
				$id_corporation = $this->CasetasCorporation->find('list',array('conditions'=>$conditionsCorporation));
/*
				debug($id_unit);
				debug($id_corporation);

				exit();*/
				$casetas_controls_files['CasetasControlsFile']['_filename'] = str_replace('.'.end(explode('.',$this->data['Caseta']['upload']['name'])),'',$this->data['Caseta']['upload']['name']);
				$casetas_controls_files['CasetasControlsFile']['_user_company'] = $company[key($company)];
				$casetas_controls_files['CasetasControlsFile']['_unidad'] = $company[key($company)];
				$casetas_controls_files['CasetasControlsFile']['_username'] = $_username;
				$casetas_controls_files['CasetasControlsFile']['_datetime_login'] = $_datetime;
				$casetas_controls_files['CasetasControlsFile']['_ip_remote'] = $_ip;
				$casetas_controls_files['CasetasControlsFile']['_file_size'] = $_file_size;
				$casetas_controls_files['CasetasControlsFile']['created'] = $_datetime;
				$casetas_controls_files['CasetasControlsFile']['_area'] = $_area;
				$casetas_controls_files['CasetasControlsFile']['_montos'] = $casetas_monto['montos'];
				$casetas_controls_files['CasetasControlsFile']['casetas_corporations_id'] = key($id_corporation);
				$casetas_controls_files['CasetasControlsFile']['casetas_units_id'] = key($id_unit);
				$casetas_controls_files['CasetasControlsFile']['user_id'] = $_SESSION['Auth']['User']['id'];
				$casetas_controls_files['CasetasControlsFile']['_md5sum'] = $md5;
				$casetas_controls_files['CasetasControlsFile']['casetas_standings_id'] = '10'; // Por Conciliar
				$casetas_controls_files['CasetasControlsFile']['casetas_parents_id'] = '2'; // Status de Archivo
				$casetas_controls_files['CasetasControlsFile']['casetas_events_id'] = '2'; // Nombre de Evento
				$casetas_controls_files['CasetasControlsFile']['_atime'] = $stat['atime']; // Nombre de Evento
				$casetas_controls_files['CasetasControlsFile']['_ctime'] = $stat['ctime']; // Nombre de Evento
				$casetas_controls_files['CasetasControlsFile']['_mtime'] = $stat['mtime']; // Nombre de Evento

				$this->LoadModel('CasetasControlsFile');

			if($this->CasetasControlsFile->Save($casetas_controls_files)){
				$casetas_controls_files_id = $this->CasetasControlsFile->getLastInsertId();
			/** NOTE Build Casetas Constrols File */

			/** NOTE Assing an id to Casetas Constrols Conciliations */
				$casetas_controls_files_conciliations['CasetasControlsConciliation']['casetas_controls_files_id'] = $casetas_controls_files_id;
				$casetas_controls_files_conciliations['CasetasControlsConciliation']['user_id'] = $_SESSION['Auth']['User']['id'];
				$casetas_controls_files_conciliations['CasetasControlsConciliation']['conciliations_count'] = '0';
				$casetas_controls_files_conciliations['CasetasControlsConciliation']['created'] = $_datetime;
				$casetas_controls_files_conciliations['CasetasControlsConciliation']['casetas_standings_id'] = '1'; // Conciliacion
				$casetas_controls_files_conciliations['CasetasControlsConciliation']['casetas_parents_id'] = '1'; // Conciliado

				if($this->CasetasControlsConciliation->Save($casetas_controls_files_conciliations)){
					// write to log
				}

				move_uploaded_file($this->data['Caseta']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'casetas'.DS.$name.$ext);

				$file = WWW_ROOT.'files'.DS.'casetas'.DS.$name.$ext;
				$lines = file($file);
				$line_num_start = 0;
				foreach ($lines as $line_num => $line) {
					echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
					$chop_lines = explode('|',$line);
					$count_lines = count($chop_lines);
					//136
					if(ctype_digit($chop_lines[0])){

						$last_chop = end($chop_lines);

						if($count_lines > 19 ) {
							array_pop($chop_lines);
						}
						$dataCasetas = $this->data;

						// NOTE filename section
						// this fix for  filename build from hir
		// 				perhaps you need use basename
						$dataCasetasFileName['_filename'] = str_replace('.'.end(explode('.',$this->data['Caseta']['upload']['name'])),'',$this->data['Caseta']['upload']['name']);
						// this fix for  filename build from hir

						unset($dataCasetas['Caseta']['upload'],$dataCasetas['Caseta']['name'],$dataCasetas['Caseta']['status'],$dataCasetas['Caseta']['description']);

						$id_data_model = 0;

						foreach ($dataCasetas as $nameModel => $dataModel) {
							foreach ($dataModel as $key_data_model => $value_data_model) {

									if ($key_data_model === 'float_data') {
	// 									pr($key_data_model);
	// 									pr((float)trim($chop_lines[$id_data_model]));
										$casetas_monto['montos'] += (float)trim($chop_lines[$id_data_model]);
									}
									if ($key_data_model === 'key_num_2') {
										$casetas_monto['key_num_2'] = (int)trim($chop_lines[$id_data_model]);
									}

									$casetas_data_model['Caseta'][$line_num_start][$key_data_model] = trim($chop_lines[$id_data_model]);
									$casetas_data_model['Caseta'][$line_num_start]['_filename'] = $dataCasetasFileName['_filename'];
									$casetas_data_model['Caseta'][$line_num_start]['_user_company'] = $company[key($company)];
									$casetas_data_model['Caseta'][$line_num_start]['_unidad'] = $company[key($company)];
									$casetas_data_model['Caseta'][$line_num_start]['_username'] = $_username;
									$casetas_data_model['Caseta'][$line_num_start]['_datetime_login'] = $_datetime;
									$casetas_data_model['Caseta'][$line_num_start]['_ip_remote'] = $_ip;
									$casetas_data_model['Caseta'][$line_num_start]['_area'] = $_area;
									$casetas_data_model['Caseta'][$line_num_start]['casetas_controls_files_id'] = $casetas_controls_files_id;
			// 						$casetas_data_model['_user_agent'] = $_useragent;
									++$id_data_model;
							}
						}
						++$line_num_start;
					}
				}
			}
			debug($casetas_data_model);
			exit();
// 			debug($casetas_monto['key_num_2']);
			$count_cross = count($casetas_data_model['Caseta']);

			if($this->Caseta->saveAll($casetas_data_model['Caseta'])) {

				/** NOTE Save the total of the _montos*/
				$this->CasetasControlsFile->id = $casetas_controls_files_id;
				$this->CasetasControlsFile->saveField('_fraction', $casetas_monto['key_num_2']);
				$this->CasetasControlsFile->saveField('_montos', $casetas_monto['montos']);
				$this->CasetasControlsFile->saveField('cruces', $count_cross);

                //ALERT add update of temporal tables  sp_upt_tollbooth_zam_trips_records_conciliation

                $this->Caseta->query("exec sp_upt_tollbooth_zam_trips_records_conciliation;");

				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									<strong>Sus archivo de datos se ha Guardado Correctamente</strong>
									ahora ir al
									<a href="'.$this->webroot.'/Casetas/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de Casetas</a>
									</div>', true)
								);
				///
			} else {
				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong>Su archivo de datos no pudo guardarse correctamente!</strong>
												puede volver al
												<a href="'.$this->webroot.'/Casetas/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de Casetas</a>
												o intentarlo de nuevo
											</div>', true));
			}
			$this->redirect($this->referer());
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid caseta', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Caseta->save($this->data)) {
				$this->Session->setFlash(__('The caseta has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The caseta could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Caseta->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for caseta', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Caseta->delete($id)) {
			$this->Session->setFlash(__('Caseta deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Caseta was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
