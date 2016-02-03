<?php
class MrSourceAccountsController extends AppController {

	var $name = 'MrSourceAccounts';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript');

	var $presetVars = array( 
		array('field' => 'company', 'type' => 'value'),
	);

	function index() {
// 		debug($presetVars);
// 		debug($this->params);
// 		debug($this->passedArgs);
		$this->Prg->commonProcess();
		$this->paginate = array(
			'conditions' => $this->MrSourceAccount->parseCriteria($this->passedArgs)
		);
		$this->MrSourceAccount->recursive = 0;
		$this->set('mrSourceAccounts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceAccount', $this->MrSourceAccount->read(null, $id));
	}

	function convertXLStoCSV($infile,$outfile){
		App::import('Vendor', 'phpexcel', array('file' =>'phpexcel'.DS.'Classes'.DS.'PHPExcel.php'));

		$fileType = PHPExcel_IOFactory::identify($infile);
		var_dump($fileType);
		$objReader = PHPExcel_IOFactory::createReader($fileType);

		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($infile);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		$objWriter->save($outfile);
	}
	
	function record() {
		$this->set('check',$this->data['One']['record']);
	}
	
	function source_company() {
// 		debug($this->data);
		if (!empty($this->data)) {
			
			$this->LoadModel('BusinessUnit');
			$bussinessUnit = $this->BusinessUnit->find('list');
			$this->LoadModel('MrSourceKey');
			$sourceKeys = $this->MrSourceKey->find('list',array('fields'=>array('_key','_description')));
			$this->set(compact('bussinessUnit','sourceKeys'));
			$this->set('loadView',$this->data['MrSourceAccount']['source_company_id']);

		} else {
				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano o archivos de excel 2003 con la extension csv, xls o xlsx </strong>
											</div>', true));
				$this->redirect(array('action' => 'add'));
		}
	}
	
	function add() {

// 		BusinessUnit -> build or take from policies
		// set the view page
		
		$this->LoadModel('BusinessUnit');
		$bussinessUnit = $this->BusinessUnit->find('list');
		
		$this->LoadModel('MrSourceKey');
		$sourceKeys = $this->MrSourceKey->find('list',array('fields'=>array('_key','_description')));
		
		$this->LoadModel('MrSourceControl');
// 		$source_control = $this->MrSourceControl->find('list',array('fields'=>array('_key','source_company')));
		$src_control = $this->MrSourceControl->find('all');
		
		$this->LoadModel('MrSourceAccount');
		
		$source_control[0] = '-- New --';
		
		foreach ($src_control as $id_source => $source_control_name) {
			$source_control[$source_control_name['MrSourceControl']['id']] = $source_control_name['MrSourceControl']['source_company']. "\x20" . $sourceKeys[$source_control_name['MrSourceControl']['_key']];
		}
		if(empty($source_control)){
			$source_control = null;
		}
		$this->set(compact('bussinessUnit','sourceKeys','source_control'));

// 		debug($this->data);exit();
		
		if (!empty($this->data)) {
// 			build the index reference of the menu accounts
			/** NOTE <if build a new record go through this search if exist and delete all asscociated records>**/
			if (isset($this->data['MrSourceControl']['source_company'])  AND isset($this->data['MrSourceControl']['_key']) ) {

/** NOTE @debug */
// 	debug($this->data);exit();
				$bussinessUnitSource = $bussinessUnit[$this->data['MrSourceControl']['source_company']];
				$conditionsSourceControl['MrSourceControl.source_company'] = $bussinessUnitSource;
				$conditionsSourceControl['MrSourceControl._key'] = $this->data['MrSourceControl']['_key'];
				$source_control = $this->MrSourceControl->find('list',array('fields'=>array('id','source_company'),'conditions'=>$conditionsSourceControl));
				$this->MrSourceControl->id = key($source_control);

				if (!empty($this->MrSourceControl->id)) {
// 					delete(int $id = null, boolean $cascade = true);

					$mr_source_controls_id = $this->MrSourceControl->id;
					$this->MrSourceControl->delete($this->MrSourceControl->id,TRUE);

// 					debug('id found =>'.$mr_source_controls_id);
// 					debug($this->MrSourceAccount->find('count',array('conditions'=>array('MrSourceAccount.mr_source_controls_id'=>$mr_source_controls_id))));
					if ( !$this->MrSourceAccount->deleteAll(array('MrSourceAccount.mr_source_controls_id'=>$mr_source_controls_id),TRUE) ) {
						$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<strong> Ocurrio un error at 0x000000127 </strong>
														sus datos no pudieron ser borrados correctamente , intentelo de nuevo
													</div>', true));
						$this->redirect(array('action' => 'add'));
					}
				}

					$MrSourceControl['MrSourceControl']['id'] = NULL;
					$MrSourceControl['MrSourceControl']['source_company'] = $bussinessUnitSource;
					$MrSourceControl['MrSourceControl']['_key'] = $this->data['MrSourceControl']['_key'];
					$MrSourceControl['MrSourceControl']['_generate'] = FALSE;
					$MrSourceControl['MrSourceControl']['_status'] = $this->data['MrSourceAccount']['_status'];

					$this->MrSourceControl->create();
					if(!$this->MrSourceControl->save($MrSourceControl['MrSourceControl'])) {
						$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
														<button type="button" class="close" data-dismiss="alert" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
														<strong> Ocurrio un error at 0x000000121 </strong>
														sus datos no pudieron ser guardados correctamente , intentelo de nuevo
													</div>', true));
						$this->redirect(array('action' => 'add'));
					}
// 				$MrSourceControlId = $this->MrSourceControl->getLastInsertID();
				$src_ctrl = $this->MrSourceControl->findById($this->MrSourceControl->getLastInsertID());
			} else {
				$src_ctrl = $this->MrSourceControl->findById($this->data['MrSourceAccount']['source_company_id']);
			}

			/** NOTE <if source_replace is checked the delete and add the new records otherwise just add>*/
			if(isset($this->data['MrSourceAccount']['source_replace'])){
				$account_company = $bussinessUnit[$this->data['MrSourceAccount']['company']];
// 				debug($this->MrSourceAccount->find('count',array('conditions'=>array('MrSourceAccount.mr_source_controls_id'=>$src_ctrl['MrSourceControl']['id'],'MrSourceAccount._key'=>$src_ctrl['MrSourceControl']['_key'],'MrSourceAccount.company'=>$account_company))));
/** NOTE @debug */
// 	debug($src_ctrl);
// 	debug($this->data);exit();
				if ( !$this->MrSourceAccount->deleteAll(array('MrSourceAccount.mr_source_controls_id'=>$src_ctrl['MrSourceControl']['id'],'MrSourceAccount._key'=>$src_ctrl['MrSourceControl']['_key'],'MrSourceAccount.company'=>$account_company),TRUE) ) {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<strong> Ocurrio un error at 0x000000127 </strong>
													sus datos no pudieron ser borrados correctamente , intentelo de nuevo
												</div>', true));
				}
			}

			$mime[0] = 'text/plain';
			$mime[1] = 'text/csv';
			$mime[2] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';
			
			$this->data['MrSourceAccount']['mr_source_controls_id'] = $src_ctrl['MrSourceControl']['id'];
			$this->data['MrSourceAccount']['source_company'] = $src_ctrl['MrSourceControl']['source_company'];
			$this->data['MrSourceAccount']['company'] = $bussinessUnit[$this->data['MrSourceAccount']['company']];
			$this->data['MrSourceAccount']['_key'] = $src_ctrl['MrSourceControl']['_key'];

/** NOTE @debug */
// 			debug($this->data['MrSourceAccount']);
// 	debug($this->data);exit();

			/** <get user information> **/
			$_username = $_SESSION['Auth']['User']['username'];
			$_datetime = date('Y-m-d H:m:s');
			$_ip = $_SERVER['REMOTE_ADDR'];
			// if comes directly from MR define and create a dir to handle xlsx files
			$bin_dir = WWW_ROOT.'files'.DS.'mr_source'.DS.'bin'.DS;
			mkdir($bin_dir, 0777, true);
// 			if (!mkdir($bin_dir, 0777, true)) {
// 				die('Failed to create folders...');
// 			}
// 			$xml = simplexml_load_file($bin_dir.'sharedStrings.xml');
// 			$json = json_encode($xml);
// 			$arrayx = json_decode($json,TRUE);
// 			debug($arrayx);

			if(strtolower(end(explode('.',$this->data['MrSourceAccount']['upload']['name']))) !== 'xls' AND strtolower(end(explode('.',$this->data['MrSourceAccount']['upload']['name']))) !== 'csv' and strtolower(end(explode('.',$this->data['MrSourceAccount']['upload']['name']))) !== 'xlsx'){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano o archivos de excel 2003 con la extension csv, xls o xlsx </strong>
											</div>', true));
				$this->redirect(array('action' => 'add'));
			} else {
				$ext = '.' . strtolower(end(explode('.',$this->data['MrSourceAccount']['upload']['name'])));
			}
			
			$name = basename(md5($this->data['MrSourceAccount']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp
			move_uploaded_file($this->data['MrSourceAccount']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'mr_source'.DS.$name.$ext);

			$file = WWW_ROOT.'files'.DS.'mr_source'.DS.$name.$ext;
			var_dump($ext);
			// maybe we can use a swicth approach
			if ($ext === '.xls') {
				
				$filename = WWW_ROOT.'files'.DS.'mr_source'.DS.$name;

				$this->convertXLStoCSV($file,$filename.'.csv');

				$file_csv = $filename.'.csv';
				
			} else if ($ext === '.csv') {
				
				$file_csv = $file ;
// 				var_dump($file_csv);
			} else if ($ext === '.xlsx') {

// 				load the scrappy file exported from the Management Reported of Microsoft puaj!
				// unzip the xlsx file
				$zip = new ZipArchive;
				$zip->open($file);
				$zip->extractTo($bin_dir);
				$zip->close();
				// load the xml containing the accounts definitions this is the file and phpexcel can handle MR exporting files! yet 
				$xml = simplexml_load_file($bin_dir.'sharedStrings.xml');
				$csv_file = fopen(WWW_ROOT.'files'.DS.'mr_source'.DS.$name.'.csv', 'w');
// 				write to csv file 
				foreach ($xml->si as $si) {
					fputcsv($csv_file, get_object_vars($si),',','"');
				}
				fclose($csv_file);
// 				export the path for treatment
				$file_csv = WWW_ROOT.'files'.DS.'mr_source'.DS.$name.'.csv';
				//clean the unzipped file and save space
				SureRemoveDir($bin_dir, FALSE);
// 				debug($file_csv);
			} else {
				$this->redirect(array('action' => 'add'));
			}

			$lines = file($file_csv,FILE_SKIP_EMPTY_LINES);
			
			foreach ($lines as $line_num => $line) {
				
// 				command
// 				sed -e '1,3d' costosFijosOpOri_viewl.csv | sed '$d' | sed '$d' | sed 's/^"//g' | cut -c 1-35 | sed 's/-//g' > /disk/costos/accounts.csv
// 				echo "<b>".substr($line,0,1)."</b>";
// 				echo "Line #<b>{$line_num}</b> : " . htmlspecialchars($line) . "<br />\n";
// 				if comes from excel file MAX version supported is 2003
				if ( (substr($line,0,1) === '"') AND substr($line,1,1) != '0') {
					unset($line);
				}
				
// 				or if comes from csv directly
				if ( (substr($line,0,1) != '"') AND (substr($line,0,1) != '0') ) {
					unset($line);
				}

				if(isset($line)) {
					if (substr($line,0,1) === '"') {
						$line = utf8_encode(str_replace('"', '', $line));
					}
					$string_replaced =  str_replace('-','',str_split($line,35)[0]);
					
				/** NOTE <search for the account but ask if you want this (just for performance) > */

					if ($this->data['MrSourceAccount']['some_check']) {
						// ask to database if the account exist in an existing mr_source_controls_id
						$conditions_some_check['MrSourceAccount.SubAccount'] = $string_replaced;
						$conditions_some_check['MrSourceAccount.company'] = $this->data['MrSourceAccount']['company'];
						$conditions_some_check['MrSourceAccount.source_company'] = $this->data['MrSourceAccount']['source_company'];
						$conditions_some_check['MrSourceAccount.mr_source_controls_id'] = $this->data['MrSourceAccount']['mr_source_controls_id'];
						$conditions_some_check['MrSourceAccount._key'] = $this->data['MrSourceAccount']['_key'];

						$are_you_there = $this->MrSourceAccount->find('count',array('conditions'=>$conditions_some_check));
						if (!$are_you_there) {
							$account_build['SubAccount'] = $string_replaced;
							$account_build['company'] = $this->data['MrSourceAccount']['company'];
							$account_build['source_company'] = $this->data['MrSourceAccount']['source_company'];
							$account_build['mr_source_controls_id'] = $this->data['MrSourceAccount']['mr_source_controls_id'];
							$account_build['_key'] = $this->data['MrSourceAccount']['_key'];
							$account_build['_status'] = $this->data['MrSourceAccount']['_status'];
							$accounts_menu['MrSourceAccount'][] = $account_build;
						}
					} else {
					
					/** NOTE <search for the account but ask if you want this (just for performance) > */
						$account_build['SubAccount'] = $string_replaced;
						$account_build['company'] = $this->data['MrSourceAccount']['company'];
						$account_build['source_company'] = $this->data['MrSourceAccount']['source_company'];
						$account_build['mr_source_controls_id'] = $this->data['MrSourceAccount']['mr_source_controls_id'];
						$account_build['_key'] = $this->data['MrSourceAccount']['_key'];
						$account_build['_status'] = $this->data['MrSourceAccount']['_status'];
						$accounts_menu['MrSourceAccount'][] = $account_build;
					}
					
				}
			} // end foreach line

				debug($accounts_menu);

// 			exit();
			if($this->MrSourceAccount->saveAll($accounts_menu['MrSourceAccount'])) {
				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<strong>Sus archivo de datos se ha Guardado</strong>
						ahora puede volver al
						<a href="'.$this->webroot.'" class="alert-link">Inicio del Portal</a>
					</div>', true));

			} else {
				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong>Su archivo de datos no pudo guardarse correctamente!</strong>
												puede volver al
												<a href="'.$this->webroot.'" class="alert-link">Inicio del Portal</a>
												o intentarlo de nuevo
											</div>', true));
			}
// 			$this->redirect($this->referer());
			$this->redirect(array('controller'=>'MrSourceControls','action' => 'index'));
// 			exit();
		}
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceAccount->save($this->data)) {
				$this->Session->setFlash(__('The mr source account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceAccount->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceAccount->delete($id)) {
			$this->Session->setFlash(__('Mr source account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
