<?php
class MrSourceConfigsController extends AppController {

	var $name = 'MrSourceConfigs';
	var $components = array('RequestHandler','Session');
	var $helpers = array('Html','Form','Ajax','Javascript');

	function index() {
		$this->MrSourceConfig->recursive = 0;
		$this->set('mrSourceConfigs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source config', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceConfig', $this->MrSourceConfig->read(null, $id));
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

// 		$source_control[0] = '-- New --';

		foreach ($src_control as $id_source => $source_control_name) {
			$source_control[$source_control_name['MrSourceControl']['id']] = $source_control_name['MrSourceControl']['source_company']. "\x20" . $sourceKeys[$source_control_name['MrSourceControl']['_key']];
		}
		if(empty($source_control)){
			$source_control = null;
		}
		$this->set(compact('bussinessUnit','sourceKeys','source_control'));



		if (!empty($this->data)) {


// 			debug($this->MrSourceConfig->query("select * from integraapp.dbo.getCostos('201511','|','TBKORI','OF')"));
// 			if (!function_exists('mssql_min_message_severity')) {
// 				trigger_error(__("PHP SQL Server interface is not installed", true), E_USER_WARNING);
// 			}
			/** NOTE <search and delete section build from mr_source_controls_controller>*/

				//re-build the date
				if(isset($this->data['MrSourceConfig']['period'])){
					$date = explode('/',$this->data['MrSourceConfig']['period']);
					$period = $date[2].$date[1];
					$this->data['MrSourceConfig']['period'] = $period;
				}
				// search for the selected key
				$source_ctrl = $this->MrSourceControl->findById($this->data['MrSourceAccount']['source_company_id']);
// 				debug($source_ctrl);
// 				$bussinessUnitSource = $bussinessUnit[$this->data['MrSourceAccount']['source_company_id']];
				$bussinessUnit_ = $bussinessUnit[$this->data['MrSourceAccount']['company']];
				$conditionsSourceConfig['MrSourceConfig.source_company'] = $source_ctrl['MrSourceControl']['source_company'];
				$conditionsSourceConfig['MrSourceConfig.company'] = $bussinessUnit_;
				$conditionsSourceConfig['MrSourceConfig._key'] = $source_ctrl['MrSourceControl']['_key'];
				$conditionsSourceConfig['MrSourceConfig.period'] = $this->data['MrSourceConfig']['period'];

// 				var_dump($conditionsSourceConfig);

				$source_config = $this->MrSourceConfig->find('list',array('fields'=>array('id','source_company'),'conditions'=>$conditionsSourceConfig));
// 				debug($source_config);

				$this->data['MrSourceConfig']['_key'] = $source_ctrl['MrSourceControl']['_key'];
				$this->data['MrSourceConfig']['source_company'] = $source_ctrl['MrSourceControl']['source_company'];
				$this->data['MrSourceConfig']['company'] = $bussinessUnit_;

			if (isset($this->data['MrSourceConfig']['source_replace'])) {

				if ( !$this->MrSourceConfig->deleteAll(array($conditionsSourceConfig),TRUE) ) {
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

		/** NOTE <search and delete section build from mr_source_controls_controller>*/

			$mime[0] = 'text/plain';
			$mime[1] = 'text/csv';
			$mime[2] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet';

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

			if(strtolower(end(explode('.',$this->data['MrSourceConfig']['upload']['name']))) !== 'xls' AND strtolower(end(explode('.',$this->data['MrSourceConfig']['upload']['name']))) !== 'csv' and strtolower(end(explode('.',$this->data['MrSourceConfig']['upload']['name']))) !== 'xlsx'){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano o archivos de excel 2003 con la extension csv, xls o xlsx </strong>
											</div>', true));
				$this->redirect(array('action' => 'add'));
			} else {
				$ext = '.' . strtolower(end(explode('.',$this->data['MrSourceConfig']['upload']['name'])));
			}

			$name = basename(md5($this->data['MrSourceConfig']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp

			move_uploaded_file($this->data['MrSourceConfig']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'mr_source'.DS.$name.$ext);

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
// 					$string_replaced =  str_replace('-','',str_split($line,35)[0]);
					$string_replaced =  str_replace('-','',str_split($line,24)[0]);

					$accounts_index[] = $string_replaced;
					$account_build['SubAccount'] = $string_replaced;
					$account_build['company'] = $this->data['MrSourceConfig']['company'];
					$account_build['source_company'] = $this->data['MrSourceConfig']['source_company'];
					$account_build['period'] = $this->data['MrSourceConfig']['period'];
					$account_build['_key'] = $this->data['MrSourceConfig']['_key'];
					$account_build['_status'] = $this->data['MrSourceConfig']['_status'];
					$accounts_menu['MrSourceConfig'][] = $account_build;

				}
			} // end foreach line
			// old behavior
			debug($accounts_menu);

			// ALERT new behavior
				debug($accounts_index);

// 					$account_build['SubAccount'] = $string_replaced;
					$account_builder['company'] = $this->data['MrSourceConfig']['company'];
					$account_builder['source_company'] = $this->data['MrSourceConfig']['source_company'];
					$account_builder['period'] = $this->data['MrSourceConfig']['period'];
					$account_builder['_key'] = $this->data['MrSourceConfig']['_key'];
					$account_builder['_status'] = $this->data['MrSourceConfig']['_status'];

				/** NOTE @DEBUG <check for duplicates> */
				$accounts_end = array_unique($accounts_index);
				debug($accounts_end);
				e('accounts_ => ' .count($accounts_index));
				e('accounts_end => ' .count($accounts_end));

				$accounts = array_values($accounts_end);
// 				debug($accounts);
// 				$accounts_ = null;
				foreach($accounts as $index_account => $account){
					$accounts_[$index_account]['MrSourceConfig']['SubAccount'] = trim($account);
					$accounts_[$index_account]['MrSourceConfig']['company'] = trim($account_builder['company']);
					$accounts_[$index_account]['MrSourceConfig']['source_company'] = trim($account_builder['source_company']);
					$accounts_[$index_account]['MrSourceConfig']['period'] = trim($account_builder['period']);
					$accounts_[$index_account]['MrSourceConfig']['_key'] = trim($account_builder['_key']);
					$accounts_[$index_account]['MrSourceConfig']['_status'] = trim($account_builder['_status']);
				}

			$accounts_menu['MrSourceConfig'] = $accounts_;
			debug($accounts_);
// 			exit();
			// ALERT new behavior

			if($this->MrSourceConfig->saveAll($accounts_menu['MrSourceConfig'])) {

			/** NOTE <mssql_procedure re-build the mr_source_account and set a proper msg to inform on success >*/

					$_source_company = $this->data['MrSourceConfig']['source_company'];;
					$_period = $this->data['MrSourceConfig']['period'];;
					$_key = $this->data['MrSourceConfig']['_key'];;

					if($this->MrSourceConfig->query("exec sistemas.dbo.setDataMr N'{$_period}', N'|', N'{$_source_company}',N'{$_key}';")){
						$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong>Sus archivo de datos se ha Guardado y se han Actualizado los nuevos datos en la DB</strong>
								ahora puede volver al
								<a href="'.$this->webroot.'" class="alert-link">Inicio del Portal</a>
							</div>', true));
					}

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
			$this->redirect($this->referer());
// 			maybe you want execute an procedure from hir
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source config', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceConfig->save($this->data)) {
				$this->Session->setFlash(__('The mr source config has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source config could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceConfig->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source config', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceConfig->delete($id)) {
			$this->Session->setFlash(__('Mr source config deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source config was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
