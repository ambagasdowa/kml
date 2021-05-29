<?php
class PoliciesController extends AppController {

	var $name = 'Policies';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');
	var $uses = array('Policy','PoliciesFilter','Group','User');

	var $presetVars = array(
		array('field' => 'name', 'type' => 'value'),
	);

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('*'));
	}

// 	function isAuthorized() {
// 		if ($this->Auth->user('group_id') != '1') {
// 			$this->Auth->deny('delete');
// 		}
// 	}

	function index(){

		Configure::write('debug',2);

		$this->Prg->commonProcess();

//		if(checkAdmin($_SESSION['Auth']['User']['group_id']) !== TRUE) {
			$this->paginate['conditions'] = array_merge($this->Policy->parseCriteria($this->passedArgs),array('Policy.status'=>'Active'));
//		} else {
//			$this->paginate['conditions'] = $this->Policy->parseCriteria($this->passedArgs);
//		}


			

		$this->LoadModel('PoliciesType');
		$policies_type = $this->PoliciesType->find('list');
		$this->set(compact('policies_type'));

		$this->Policy->recursive = 0;

		debug($this->paginate);

		$this->set('policies', $this->paginate());
	}

	function __index() {

// 		debug($this->paginate);
// 		$conditions = ''
// 		debug($this->Auth);
// 		$id_company = $_SESSION['Auth']['User']['group_id'];
// 		$cvecia = '004';
// 		$cveare = '007';
// // 		$cvepue = '000005';
// 		$cvepue = '000011';
// 		$cvetra = '4000015';


// 		$payroll = $this->Payroll->find('all');
//
// 		var_dump($this->Payroll->getPayrollByCompany($cvecia,$cveare,$cvepue,$cvetra));


// 		App::import('Core', 'HttpSocket');
// 		$HttpSocket = new HttpSocket();
// 		$results = $HttpSocket->get('https://www.google.com.mx/search', 'q=php');
// 		$results = $HttpSocket->get('http://localhost:14921/@exercise/intro-hello-webgl/');
// 		pr('print_r');
// 		var_dump(Configure::read());
		//returns html for Google's search results for the query "cakephp"
// 		e(utf8_encode($results));
// 		e($results);
		// Example response array
		// Responses will include varying header and cookie fields
// 		debug($HttpSocket->response);

// 		e($HttpSocket->response['body']);
// 		var_dump($_SESSION['Auth']['User']['group_id']);

		$group_id = (int)($_SESSION['Auth']['User']['group_id']);
		if ( $group_id != 1  and $group_id != 5 and $group_id != 3 and $group_id != 7 and $group_id != 6 and $group_id != 8 and $group_id != 9 and $group_id != 10 and $group_id != 11 and $group_id != 12) {
			$conditions['Policy.group_id'] = $group_id;
		}
// 		if come from view ?
		if (!empty($this->params['named']['type'])) {
			$conditions['Policy.policies_type'] = $this->params['named']['type'];
		}

		if(checkAdmin($_SESSION['Auth']['User']['group_id']) !== TRUE){
			$conditions['Policy.status'] = 'Active';
		}

		// set the var conditions for all policies
		if (empty($conditions) OR !isset($conditions)) {
// 			$conditions = null;
			$this->Prg->commonProcess();
			$conditions = $this->Policy->parseCriteria($this->passedArgs,array('Policy.status'=>'Active'));
		}
		$this->paginate = array(
			'conditions' => $conditions,
			'limit' => 10
		);

		$this->LoadModel('PoliciesType');
		$policies_type = $this->PoliciesType->find('list');
		$this->set(compact('policies_type'));

		$this->Policy->recursive = 0;
		$this->set('policies', $this->paginate());
	}

	function view($id = null, $type=null, $subtype=null) {

		if (!empty($this->params['named']['id'])) {
			$id = $this->params['named']['id'];
		}if (!empty($this->params['named']['type'])) {
			$type = $this->params['named']['type'];
		}if (!empty($this->params['named']['subtype'])) {
			$subtype = $this->params['named']['subtype'];
		}


// 		var_dump($id,$type,$subtype);

		$this->LoadModel('PoliciesAnexo');

		if(!empty($id)) {
			$conditions['PoliciesAnexo.policies_id'] = $id;
			$conditionsPolicy['Policy.id'] = $id;
		}else{
			$conditions = null;
			$conditionsPolicy = null;
		}
		$anexos = $this->PoliciesAnexo->find('list',array('conditions'=>$conditions,'fields'=>array('id','anexo_path','policies_id')));
		$anexos_names = $this->PoliciesAnexo->find('list',array('conditions'=>$conditions,'fields'=>array('id','name')));

		$anexos_type = $this->PoliciesAnexo->find('list',array('conditions'=>$conditions,'fields'=>array('id','download')));

		$policies_mode = $this->Policy->find('list',array('conditions'=>$conditionsPolicy,'fields'=>array('id','policies_type')));


// 		debug($anexos);
// 		debug($anexos_names);
// 		debug($anexos_type);
// 		debug($policies_mode);

		$filterFiles = $this->filterFiles($id,$type,$subtype);
// 		var_dump($filterFiles);
		if (empty($filterFiles['filenames'])) {
			$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
												Aun no existen Archivos para esta categoría'
// 												<a href="'.$path.'" class="alert-link">Subtypo</a> para ésta <strong> categoría </strong>
										.'</div>', true
										)
									);
			$this->redirect(array('action' => 'index','type'=>$type));
		}
		$filenames = $filterFiles['filenames'];
		$full_names = $filterFiles['full_names'];

		$app = basename(ROOT);
		$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/files/policies/";
		$directory = WWW_ROOT.'files'.DS.'policies'.DS;
		$scanned_directory = array_diff(scandir($directory), array('..', '.'));
		$dir_paths = array_values($scanned_directory);

		foreach($filenames as $id_file => $filename) {
			$files[$id_file] = base64_encode($path.$filename);
		}


// 		debug($this->type($type));

		// build this as function firts just take the format landscape or portrait
		$format = $this->Policy->find('list',array('fields'=>array('id','format_id'),'conditions'=>$conditionsPolicy));

// 		debug($format);

		if(isset($files)) {
			$this->set('first_key',key($files)); //this set the firts item as higligthed in menu
			$this->set('files',$files);
			$this->set('filenames',$full_names);
			$this->set('anexos',$anexos);
			$this->set('anexos_names',$anexos_names);
			$this->set('anexos_type',$anexos_type);
			isset($type) ? $this->set('type',$this->type($type)) : $this->set('type','Documento');
			isset($format) ? $this->set('format',$format) : $this->set('format',array('1'));
		}

// 		if (!$id) {
// 			$this->Session->setFlash(__('Invalid policie', true));
// 			$this->redirect(array('action' => 'index'));
// 		}
// 		$this->set('policies', $this->Policy->read(null, $id));
// 		exit();
// 		debug($_SESSION['Auth']['User']['id']);

	}

	// temporary upload
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid policie', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Policy->updateAll(array("policies_subtypes_id"=>$this->data['Policy']['policies_subtypes_id']),array("id"=>$this->data['Policy']['id']))) {
				$this->Session->setFlash(__('The policie has been Updated', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policie could not be Updated. Please, try again.', true));
			}

		}
		if (empty($this->data)) {
			$this->data = $this->Policy->read(null, $id);
		}

		$groups = $this->Policy->Group->find('list');
		$this->set(compact('groups'));

		$users = $this->Policy->User->find('list');
		$this->set(compact('users'));

		$this->LoadModel('PoliciesType');
		$policies_type = $this->PoliciesType->find('list');
		$this->set(compact('policies_type'));


		if (isset($id)) {
			$conditionsSubType['PoliciesSubtype.policies_type_id'] = $this->data['Policy']['policies_type'];
		}

		$this->LoadModel('PoliciesSubtypesDefinition');
		$policies_subtypes_definitions = $this->PoliciesSubtypesDefinition->find('list');
		// debug($policies_subtypes_definitions);
		$this->set(compact('policies_subtypes_definitions'));

		$this->LoadModel('PoliciesSubtype');
		$policies_subtypes = $this->PoliciesSubtype->find('list',array('fields'=>array('id','policies_subtypes_definitions_id'),'conditions'=>$conditionsSubType));

		foreach ($policies_subtypes as $id_policies_subtype => $subtype) {
			$policies_subtype[$subtype] = $policies_subtypes_definitions[$subtype];
		}

// 		debug($policies_subtype);
		// debug($policies_subtypes_definitions);
		$this->set(compact('policies_subtype'));


		$this->LoadModel('PoliciesFormat');
		$policies_format = $this->PoliciesFormat->find('list');
		$this->set(compact('policies_format'));
	}

	function edit_subtype () {

		if ($this->data) {
			$conditionsSubType['PoliciesSubtype.policies_type_id'] = $this->data['Policy']['policies_type'];
		}

		$this->LoadModel('PoliciesSubtypesDefinition');
		$policies_subtypes_definitions = $this->PoliciesSubtypesDefinition->find('list');
		// debug($policies_subtypes_definitions);

		$this->LoadModel('PoliciesSubtype');
		$policies_subtype = $this->PoliciesSubtype->find('list',array('fields'=>array('id','policies_subtypes_definitions_id'),'conditions'=>$conditionsSubType));
		// debug($policies_subtype);


		if (!$policies_subtype) {
			$app = basename(ROOT);
			$ref = 'PoliciesSubtypes/';
			$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/{$ref}";
			$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
												Primero debe crear un <a href="'.$path.'" class="alert-link">Subtypo</a> para ésta <strong> categoría </strong>
										</div>', true
										)
									);
		}
		foreach ($policies_subtype as $id_policies_subtype => $subtype) {
			$policies_subtypes[$subtype] = $policies_subtypes_definitions[$subtype];
		}
		$policies_subtype = $policies_subtypes;

		$this->set(compact('policies_subtype'));
	}

	function add() {
// 		var_dump($this->data);
// // 		debug($this->params);
// 		exit();
		if (!empty($this->data)) {

			if(end(explode('.',$this->data['Policy']['upload']['name'])) !== 'pdf'){

				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong> Solo se permiten archivos pdf </strong>
											</div>', true));


				$this->redirect(array('action' => 'add'));
			} else {
				$ext = '.' . end(explode('.',$this->data['Policy']['upload']['name']));
			}

			$name = basename(md5($this->data['Policy']['name'])); // for the long and inconsistent names and drop the basename /tmp
			move_uploaded_file($this->data['Policy']['upload']['tmp_name'],WWW_ROOT.'files'.DS.'policies'.DS.$name.$ext);
			$this->data['Policy']['policies_path'] = $name.$ext;
			$this->data['Policy']['create'] = date('Y-m-d h:m:s'); // appears mysql not working
// 			$this->data['Policy']['status'] = 'Active'; // appears mysql not working
			$this->data['Policy']['empresa_id'] = 0;
// 		var_dump($this->data);
// // 		debug($this->params);
// 		exit();
//			$this->Policy->create();

			if ($this->Policy->save($this->data)) {
	// 			Build the struct for view permissions
				$conditions['Group.status'] = 'Active';
				$groups = $this->Group->find('list',array('fields'=>array('id','name'),'conditions'=>$conditions));

				foreach ($groups as $group_id => $groups_name) {
	// 				build the schema
					// set the administrator permissions
					$group_id == '1' ? $set = true : $set = false;
					$group_id == '1' ? $active = 'Inactive' : $active = 'Active';
					$policyFilter['PoliciesFilter'] = array(
															'policies_id' => $this->Policy->getLastInsertID(),
															'group_id' => $group_id,
															'view'     => $set,
															'create'   => date('Y-m-d h:m:s'),
															'modified' => date('Y-m-d h:m:s'),
															'status'   => $active

														);
					$this->PoliciesFilter->create();
					$this->PoliciesFilter->set($policyFilter);
					$this->PoliciesFilter->save();
				}
				$this->Session->setFlash(__('The policie has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The policie could not be saved. Please, try again.', true));
			}
		}

		$groups = $this->Policy->Group->find('list');
		$this->set(compact('groups'));

		$users = $this->Policy->User->find('list');
		$this->set(compact('users'));

		$this->LoadModel('PoliciesType');
		$conditionsPoliciesType['PoliciesType.status'] = 'Active';
		$policies_type = $this->PoliciesType->find('list',array('conditions'=>$conditionsPoliciesType));
		$this->set(compact('policies_type'));

		$this->LoadModel('PoliciesFormat');
		$policies_format = $this->PoliciesFormat->find('list');
		$this->set(compact('policies_format'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for company', true));
			$this->redirect(array('action'=>'index'));
		}
// 		firts delete the file associated to id
		$conditions['Policy.id'] = $id;
		$delete = $this->Policy->find('list',array('fields'=>array('id','policies_path'),'conditions'=>$conditions));
		$filename = each($delete)['value'];
		$file = new File(WWW_ROOT.'files'.DS.'policies'.DS.$filename);

		if ($file->exists()) {
			if($file->delete()) {
				$this->Session->setFlash(__('Policies File was deleted successfully => '.$filename, true));
			} else {
				$this->Session->setFlash(__('Policies File was not deleted => '.$filename, true));
			}
		} else {
			$this->Session->setFlash(__($filename . ' does not exists' , true));
		}
		// delete the associated permissions of the file
		$conditions = null; // reset the var for reuse
		$conditions['PoliciesFilter.policies_id'] = $id;
		$this ->PoliciesFilter->deleteAll($conditions, $cascade = false);
		// now delete the record
		if ($this->Policy->delete($id)) {
			$this->Session->setFlash(__('Policies deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Policies was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}


	/** NOTE section of non-strict methods **/

	function filterFiles ($id=null,$type=null,$subtype=null) {
// 		conditions for all users this rules by group where the user belongs
// 		var_dump($id);
		$conditions['Policy.status'] = 'Active';
		$group_id = (int)($_SESSION['Auth']['User']['group_id']);
		if ( $group_id != 1  and $group_id != 5 and $group_id != 3 and $group_id != 7 and $group_id != 6 and $group_id != 8 and $group_id != 9 and $group_id != 10 and $group_id != 11 and $group_id != 12) {
			$conditions['Policy.group_id'] = $group_id;
		}
// 		conditions from user and selected file
		if (!empty($id)){
			$conditions['Policy.id'] = $id;
		}
		if (!empty($type)) {
			$conditions['Policy.policies_type'] = $type;
		}if(!empty($subtype)) {
			$conditions['Policy.policies_subtypes_id'] = $subtype;
		}
// 		debug($conditions);
		// set the var conditions for all policies
		if (empty($conditions)) {
			$conditions = null;
		}

		$files['filenames'] = $this->Policy->find('list',array('fields'=>array('id','policies_path'),'conditions'=>$conditions));
		$files['full_names'] = $this->Policy->find('list',array('fields'=>array('id','name'),'conditions'=>$conditions));

		return $files;
	}

	function type ($type = null) {
		$this->LoadModel('PoliciesType');
		$conditions['PoliciesType.id'] = $type;
// 		$conditions['PoliciesType.status'] = 'Active';
		$docType = end($this->PoliciesType->find('list',array('fields'=>array('id','name'),'conditions'=>$conditions)));
		return $docType;
	}

	function format ($format_id = null) {
		$this->LoadModel('PoliciesFormat');

		if (!empty ($format_id)) {
			$conditions['PoliciesFormat.id'] = $format_id;
		} else {
			$conditions = null;
		}
		$formats = $this->PoliciesFormat->find('list',array('fields'=>array('id','name'),'conditions'=>$conditions));
		return $formats;
	}

} /** ALERT End Class */
