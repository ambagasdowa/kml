<?php
class CasetasController extends AppController {

	var $name = 'Casetas';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html','Form','Ajax','Javascript','Js');
// 	function beforeFilter() {
// 		parent::beforeFilter();
// 		$this->Auth->allowedActions = array('index', 'view','add','edit','delete');
// 	}
	
	function index() {

		$this->Caseta->recursive = 0;
		$this->paginate = array(
// 			'conditions' => $conditions,
			'limit' => 20
		);
		
		$this->set('casetas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid caseta', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('caseta', $this->Caseta->read(null, $id));
	}

	function add() {
		
// 			debug($_SESSION);
// 			debug($_SERVER['HTTP_USER_AGENT']);
// 			debug($_SERVER['REMOTE_ADDR']);
		$this->LoadModel('Company');
// 		$this->LoadModel('Caseta');
		$conditionsCompany['Company.nom_id'] = $_SESSION['Auth']['User']['company_id'];
		$company = $this->Company->find('list',array('fields'=>array('id','name'),'conditions'=>$conditionsCompany));

		$this->LoadModel('BusinessUnit');
		if (checkAdmin($_SESSION['Auth']['User']['group_id'])) {
			$conditionsUnit = null;
		}else {
			$conditionsUnit['BusinessUnit.company_id'] = key($company);
		}

		$unidades = $this->BusinessUnit->find('list',array('conditions'=>$conditionsUnit));

		$this->set(compact('unidades'));

		if (!empty($this->data)) {
			$mime = 'text/plain';

// 			debug($company[key($company)]);
// 			debug($unidades[$this->data['Caseta']['_area']]);
			debug($this->data);
// 		exit();
		
			/** <get user information> **/
			$_username = $_SESSION['Auth']['User']['username'];
			$_datetime = date('Y-m-d H:m:s');
			$_ip = $_SERVER['REMOTE_ADDR'];
// 			$_useragent = $_SERVER['HTTP_USER_AGENT'];
			$_area = $unidades[$this->data['Caseta']['_area']];

			
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
								
								$casetas_data_model['Caseta'][$line_num_start][$key_data_model] = trim($chop_lines[$id_data_model]);
								$casetas_data_model['Caseta'][$line_num_start]['_filename'] = $dataCasetasFileName['_filename'];
								$casetas_data_model['Caseta'][$line_num_start]['_user_company'] = $company[key($company)];
								$casetas_data_model['Caseta'][$line_num_start]['_unidad'] = $company[key($company)];
								$casetas_data_model['Caseta'][$line_num_start]['_username'] = $_username;
								$casetas_data_model['Caseta'][$line_num_start]['_datetime_login'] = $_datetime;
								$casetas_data_model['Caseta'][$line_num_start]['_ip_remote'] = $_ip;
								$casetas_data_model['Caseta'][$line_num_start]['_area'] = $_area;
		// 						$casetas_data_model['_user_agent'] = $_useragent;
								++$id_data_model;
						}
					}
					++$line_num_start;
				}
			}

			if($this->Caseta->saveAll($casetas_data_model['Caseta'])) {
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
