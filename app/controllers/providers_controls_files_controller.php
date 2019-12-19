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
		* @email	     baizabal.jesus@gmail.com
		* @package       cake
		* @subpackage    cake.cake.console.libs.templates.views
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
?>

<?php
class ProvidersControlsFilesController extends AppController {

	var $name = 'ProvidersControlsFiles';
	var $helpers = array('Html','Form','Ajax','Javascript','Js');


	function index() {
		// index-section
			$this->ProvidersControlsFile->recursive = 0;
			$this->set('providersControlsFiles', $this->paginate());
		// NOTE File section

		if (!empty($this->data)) {

			debug($this->data);
			debug($this->data['ProvidersControlsFile']['upload']);

exit();
            $file_providers_name = str_replace('.'.end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])),'',$this->data['ProvidersControlsFile']['upload']['name']);

			$md5 = md5_file($this->data['ProvidersControlsFile']['upload']['tmp_name']);

			$stat = stat($this->data['ProvidersControlsFile']['upload']['tmp_name']);

            $conditionsFields['ProvidersControlsFile._md5sum'] = $md5;

            $finderFilename = $this->ProvidersControlsFile->find('all',array('conditions'=>$conditionsFields));


				//NOTE this must be a very rare case but one never knows
				if (count($finderFilename) >= 1) {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										El archivo <strong> '.$file_providers_name.' </strong>
										ya se encuentra en la base de datos.
										Por favor elija otro archivo </div>', true));
					$this->redirect($this->referer());
				}
// 				$idx_providers_name = current($finderFilename);

			// debug($finderFilename);
			// print_r(count($finderFilename));
// exit();
// exit();
			/** <get user information> **/
			$_username = $_SESSION['Auth']['User']['username'];
			$_datetime = date('Y-m-d H:m:s');
			$_ip = $_SERVER['REMOTE_ADDR'];
			$_file_size = $this->data['ProvidersControlsFile']['upload']['size'];


			$data_stat['username'] = $_username;
			$data_stat['datetime'] = $_datetime;
			$data_stat['ip'] = $_ip;

			$data_stat['filesize'] = $_file_size;


      $extensions = array('txt', 'xls', 'xlsx', 'csv', 'xml', 'pdf');

			if( in_array(strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name']))), $extensions ) === FALSE){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano con la extension txt , csv o archivos excel xls ,xlsx </strong>
											</div>', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$ext = '.' . strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
				debug('miss');
			}

			$name = basename(md5($this->data['ProvidersControlsFile']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp
            $data_stat['name'] = $name;
            $data_stat['ext'] = strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
            if(!isset($ext)){
                $ext = '.' . $data_stat['ext'];
            }

// all ok now save at db

                $file['ProvidersControlsFile']['user_id'] = $_SESSION['Auth']['User']['id'];
                $file['ProvidersControlsFile']['_filename'] = $data_stat['name'].$ext;
                $file['ProvidersControlsFile']['labelname'] = $this->data['ProvidersControlsFile']['upload']['name'];
                $file['ProvidersControlsFile']['_pathname'] = WWW_ROOT.'files'.DS.'providers'.DS;
                $file['ProvidersControlsFile']['_extname'] = $ext;
                $file['ProvidersControlsFile']['_md5sum'] = $md5;
                $file['ProvidersControlsFile']['_atime'] = $stat['atime'];
                $file['ProvidersControlsFile']['_mtime'] = $stat['mtime'];
                $file['ProvidersControlsFile']['_ctime'] = $stat['ctime'];
                $file['ProvidersControlsFile']['_ip_remote'] = $data_stat['ip'];
                $file['ProvidersControlsFile']['created'] = $data_stat['datetime'];
                $file['ProvidersControlsFile']['modified'] = null;
                $file['ProvidersControlsFile']['_status'] = '1';

                $this->ProvidersControlsFile->create();

			if ($this->ProvidersControlsFile->save($file)) {

			$providers_controls_files_id = $this->ProvidersControlsFile->getLastInsertId();
      /**=======================================================*/
      //             The file is correct

			// NOTE Hir must validate the xml

      move_uploaded_file($this->data['ProvidersControlsFile']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext);
            $file = WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext;

			if ( in_array($ext,array('.xls','.xlsx')) === TRUE) {

				$filename = WWW_ROOT.'files'.DS.'providers'.DS.$name;

				$this->convertXLStoCSV($file,$filename.'.csv');

				$file_csv = $filename.'.csv';

			} else if ($ext === '.csv') {

				$file_csv = $file ;
			} else {
				// $this->redirect(array('action' => 'add'));
			}
    /**=======================================================*/

      // $lines = file($file_csv,FILE_SKIP_EMPTY_LINES);

				// $line_num_start = 0;
				// foreach ($lines as $line_num => $line) {
				// 	$chop_lines = explode(',',str_replace('"','',$line));
				// 	if ($line_num == 0) {
        //                 $providers_data_headers = $chop_lines;
				// 	}
				//
				// 	if(ctype_digit($chop_lines[0])){
				//
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start] = array_combine($providers_data_headers,$chop_lines);
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['providers_imported_files_controls_id'] = $providers_controls_files_id ;
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['user_id'] = $_SESSION['Auth']['User']['id'];
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['created'] = $data_stat['datetime'];
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['modified'] = null;
        //                 $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['_status'] = '1';
				// 		++$line_num_start;
				// 	}
				// }
			}
// debug($providers_controls_files_id);
// 			debug($providers_data_model);
			// exit();
			$this->LoadModel('ProvidersImportedDatabase');
			if($this->ProvidersImportedDatabase->saveAll($providers_data_model['ProvidersImportedDatabase'])) {

				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									<strong>Su archivo de datos se ha Guardado Correctamente</strong> with number of file '.$providers_controls_files_id.'
									ahora ir al
									<a href="'.$this->webroot.'/ProvidersControlsFiles/index/page:1/sort:id/direction:asc" class="alert-link">ProvidersControlsFiles</a>
									</div>', true)
								);
				///
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong>Su archivo de datos no pudo guardarse correctamente!</strong>
												puede volver al
												<a href="'.$this->webroot.'/ProvidersControlsFiles/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de ProvidersControlsFiles</a>
												o intentarlo de nuevo
											</div>', true));
			}
			$this->redirect($this->referer());
		} // if this->data


		//
		// if($this->data){
		//  debug($this->data);
		//  $this->add($this->data);
		//  // exit();
		// }
	} // End Index Method




	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers controls file', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('providersControlsFile', $this->ProvidersControlsFile->read(null, $id));
	}

	// function add() {
	// 	if (!empty($this->data)) {
	// 		$this->ProvidersControlsFile->create();
	// 		if ($this->ProvidersControlsFile->save($this->data)) {
	// 			$this->Session->setFlash(__('The providers controls file has been saved', true));
	// 			$this->redirect(array('action' => 'index'));
	// 		} else {
	// 			$this->Session->setFlash(__('The providers controls file could not be saved. Please, try again.', true));
	// 		}
	// 	}
	// }



	function convertXLStoCSV($infile,$outfile){
		App::import('Vendor', 'phpexcel', array('file' =>'phpexcel'.DS.'Classes'.DS.'PHPExcel.php'));

		$fileType = PHPExcel_IOFactory::identify($infile);
		var_dump($fileType);
// 		exit();
		$objReader = PHPExcel_IOFactory::createReader($fileType);

		$objReader->setReadDataOnly(true);
		$objPHPExcel = $objReader->load($infile);

		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');
		$objWriter->save($outfile);
	}


	function add($data = null) {

    if(isset($data)){
    $this->data = $data;

		// if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
		//
		// } else {
		//
		// }

		if (!empty($this->data)) {



            $file_providers_name = str_replace('.'.end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])),'',$this->data['ProvidersControlsFile']['upload']['name']);


			$md5 = md5_file($this->data['ProvidersControlsFile']['upload']['tmp_name']);

			$stat = stat($this->data['ProvidersControlsFile']['upload']['tmp_name']);

            $conditionsFields['ProvidersControlsFile.providers_md5sum_check'] = $md5;

            $finderFilename = $this->ProvidersControlsFile->find('all',array('conditions'=>$conditionsFields));


			if ( $finderFilename ) {
				//NOTE this must be a very rare case but one never knows
				if (count($finderFilename) > 1) {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										El archivo <strong> '.$file_providers_name.' </strong>
										ya se encuentra en la base de datos.
										Por favor elija otro archivo </div>', true));
					$this->redirect($this->referer());
				}

// 				$idx_providers_name = current($finderFilename);

				$this->Session->setFlash(__('<div class="alert alert-info alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
										El archivo <strong><a href="#" id="log_view"> '.$file_providers_name.' </a></strong>
										ya se encuentra en la base de datos.
										Por favor elija otro archivo
									</div>', true));
				$this->redirect($this->referer());
			}

			/** <get user information> **/
			$_username = $_SESSION['Auth']['User']['username'];
			$_datetime = date('Y-m-d H:m:s');
			$_ip = $_SERVER['REMOTE_ADDR'];
			$_file_size = $this->data['ProvidersControlsFile']['upload']['size'];


			$data_stat['username'] = $_username;
			$data_stat['datetime'] = $_datetime;
			$data_stat['ip'] = $_ip;

			$data_stat['filesize'] = $_file_size;


            $extensions = array('txt' , 'xls' , 'xlsx' , 'csv');

			if( in_array(strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name']))), $extensions ) === FALSE){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano con la extension txt , csv o archivos excel xls ,xlsx </strong>
											</div>', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$ext = '.' . strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
				debug('miss');
			}

			$name = basename(md5($this->data['ProvidersControlsFile']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp

            $data_stat['name'] = $name;
            $data_stat['ext'] = strtolower(end(explode('.',$this->data['ProvidersControlsFile']['upload']['name'])));
            if(!isset($ext)){
                $ext = '.' . $data_stat['ext'];
            }

// all ok now save at db

                $file['ProvidersControlsFile']['user_id'] = $_SESSION['Auth']['User']['id'];
                $file['ProvidersControlsFile']['providers_file_name'] = $data_stat['name'].$ext;
                $file['ProvidersControlsFile']['providers_file_name_desc'] = $this->data['ProvidersControlsFile']['upload']['name'];
                $file['ProvidersControlsFile']['providers_md5sum_check'] = $md5;
                $file['ProvidersControlsFile']['created'] = $data_stat['datetime'];
                $file['ProvidersControlsFile']['modified'] = null;
                $file['ProvidersControlsFile']['_status'] = '1';

                $this->ProvidersControlsFile->create();

			if ($this->ProvidersControlsFile->save($file)) {
                $providers_controls_files_id = $this->ProvidersControlsFile->getLastInsertId();
            /**=======================================================*/
            //             The file is correct

            move_uploaded_file($this->data['ProvidersControlsFile']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext);
            $file = WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext;

			if ( in_array($ext,array('.xls','.xlsx')) === TRUE) {

				$filename = WWW_ROOT.'files'.DS.'providers'.DS.$name;

				$this->convertXLStoCSV($file,$filename.'.csv');

				$file_csv = $filename.'.csv';

			} else if ($ext === '.csv') {

				$file_csv = $file ;
			} else {
				$this->redirect(array('action' => 'add'));
			}

            /**=======================================================*/

                $lines = file($file_csv,FILE_SKIP_EMPTY_LINES);

				$line_num_start = 0;
				foreach ($lines as $line_num => $line) {
					$chop_lines = explode(',',str_replace('"','',$line));
					if ($line_num == 0) {
                        $providers_data_headers = $chop_lines;
					}

					if(ctype_digit($chop_lines[0])){

                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start] = array_combine($providers_data_headers,$chop_lines);
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['providers_imported_files_controls_id'] = $providers_controls_files_id ;
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['user_id'] = $_SESSION['Auth']['User']['id'];
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['created'] = $data_stat['datetime'];
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['modified'] = null;
                        $providers_data_model['ProvidersImportedDatabase'][$line_num_start]['_status'] = '1';
						++$line_num_start;
					}
				}
			}

// 			debug($providers_data_model);
// 			exit();
			$this->LoadModel('ProvidersImportedDatabase');
			if($this->ProvidersImportedDatabase->saveAll($providers_data_model['ProvidersImportedDatabase'])) {

				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									</button>
									<strong>Su archivo de datos se ha Guardado Correctamente</strong> with number of file '.$providers_controls_files_id.'
									ahora ir al
									<a href="'.$this->webroot.'/ProvidersControlsFiles/index/page:1/sort:id/direction:asc" class="alert-link">ProvidersControlsFiles</a>
									</div>', true)
								);
				///
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong>Su archivo de datos no pudo guardarse correctamente!</strong>
												puede volver al
												<a href="'.$this->webroot.'/ProvidersControlsFiles/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de ProvidersControlsFiles</a>
												o intentarlo de nuevo
											</div>', true));
			}
			$this->redirect($this->referer());
		} // if this->data


     } //endif()DAta
	} //end_data





	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers controls file', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersControlsFile->save($this->data)) {
				$this->Session->setFlash(__('The providers controls file has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers controls file could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersControlsFile->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers controls file', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersControlsFile->delete($id)) {
			$this->Session->setFlash(__('Providers controls file deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers controls file was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
