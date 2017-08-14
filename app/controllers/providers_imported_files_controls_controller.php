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
class ProvidersImportedFilesControlsController extends AppController {

	var $name = 'ProvidersImportedFilesControls';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');

	var $presetVars = array( 
		array('field' => 'name', 'type' => 'value'),
	);

	function index() {
		$this->ProvidersImportedFilesControl->recursive = 0;
		$this->set('providersImportedFilesControls', $this->paginate());
		
		if($this->data){
// 		 debug($this->data);
		 $this->add($this->data);
		 exit();
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid providers imported files control', true));
			$this->redirect(array('action' => 'index'));
		}

            $this->LoadModel('ProvidersViewSearchEdition');
//             ProvidersViewSearchEditions/index/page:1/sort:id/direction:asc
            $conditionsEditions['ProvidersViewSearchEdition.providers_imported_files_controls_id'] = $id;

            $this->paginate = array(
                'conditions' => $conditionsEditions,
                'limit' => 200
            );
            $providersViewSearchEditions = $this->paginate('ProvidersViewSearchEdition');

            $this->set(compact('providersViewSearchEditions'));
//         $this->set('providersViewSearchEditions', $result);
// 		$this->set('providersImportedFilesControl', $this->ProvidersImportedFilesControl->read(null, $id));
	}

	
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
		if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf

		}else {

		}

		if (!empty($this->data)) {

            $file_providers_name = str_replace('.'.end(explode('.',$this->data['ProvidersImportedFilesControl']['upload']['name'])),'',$this->data['ProvidersImportedFilesControl']['upload']['name']);


			$md5 = md5_file($this->data['ProvidersImportedFilesControl']['upload']['tmp_name']);
			
			$stat = stat($this->data['ProvidersImportedFilesControl']['upload']['tmp_name']);

            $conditionsFields['ProvidersImportedFilesControl.providers_md5sum_check'] = $md5;

            $finderFilename = $this->ProvidersImportedFilesControl->find('all',array('conditions'=>$conditionsFields));
            

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
			$_file_size = $this->data['ProvidersImportedFilesControl']['upload']['size'];
			
			
			$data_stat['username'] = $_username;
			$data_stat['datetime'] = $_datetime;
			$data_stat['ip'] = $_ip;

			$data_stat['filesize'] = $_file_size;
			
            
            $extensions = array('txt' , 'xls' , 'xlsx' , 'csv');

			if( in_array(strtolower(end(explode('.',$this->data['ProvidersImportedFilesControl']['upload']['name']))), $extensions ) === FALSE){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos de texto plano con la extension txt , csv o archivos excel xls ,xlsx </strong>
											</div>', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$ext = '.' . strtolower(end(explode('.',$this->data['ProvidersImportedFilesControl']['upload']['name'])));
				debug('miss');
			}
			
			$name = basename(md5($this->data['ProvidersImportedFilesControl']['upload']['name'])); // for the long and inconsistent names and drop the basename /tmp

            $data_stat['name'] = $name;
            $data_stat['ext'] = strtolower(end(explode('.',$this->data['ProvidersImportedFilesControl']['upload']['name'])));
            if(!isset($ext)){
                $ext = '.' . $data_stat['ext'];
            }

// all ok now save at db 

                $file['ProvidersImportedFilesControl']['user_id'] = $_SESSION['Auth']['User']['id'];
                $file['ProvidersImportedFilesControl']['providers_file_name'] = $data_stat['name'].$ext;
                $file['ProvidersImportedFilesControl']['providers_file_name_desc'] = $this->data['ProvidersImportedFilesControl']['upload']['name'];
                $file['ProvidersImportedFilesControl']['providers_md5sum_check'] = $md5;
                $file['ProvidersImportedFilesControl']['created'] = $data_stat['datetime'];
                $file['ProvidersImportedFilesControl']['modified'] = null;
                $file['ProvidersImportedFilesControl']['_status'] = '1';

                $this->ProvidersImportedFilesControl->create();
                
			if ($this->ProvidersImportedFilesControl->save($file)) {
                $providers_controls_files_id = $this->ProvidersImportedFilesControl->getLastInsertId();
            /**=======================================================*/
            //             The file is correct
            
            move_uploaded_file($this->data['ProvidersImportedFilesControl']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'providers'.DS.$name.$ext);
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
									<a href="'.$this->webroot.'/ProvidersImportedFilesControls/index/page:1/sort:id/direction:asc" class="alert-link">ProvidersImportedFilesControls</a>
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
												<a href="'.$this->webroot.'/ProvidersImportedFilesControls/index/page:1/sort:id/direction:asc" class="alert-link">M&oacute;dulo de Conciliaci&oacute;n de ProvidersImportedFilesControls</a>
												o intentarlo de nuevo
											</div>', true));
			}
			$this->redirect($this->referer());
		}
        
        
        
     } //endif()DAta
	} //end_data

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid providers imported files control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProvidersImportedFilesControl->save($this->data)) {
				$this->Session->setFlash(__('The providers imported files control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The providers imported files control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProvidersImportedFilesControl->read(null, $id);
		}
		$users = $this->ProvidersImportedFilesControl->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for providers imported files control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProvidersImportedFilesControl->delete($id)) {
			$this->Session->setFlash(__('Providers imported files control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Providers imported files control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
