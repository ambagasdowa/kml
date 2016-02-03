<?php
class FieldDatasController extends AppController {

	var $name = 'FieldDatas';
	var $components = array('RequestHandler','Session');
	var $helpers = array('Html','Form','Ajax','Javascript');
// 	var $helpers = array('Html','Form','Ajax','Javascript','Js'=>array('Prototype'));
    var $paginate = array(
			'User'=>array( 'fields'=>array('id','name','last_name','last_access','last_ip','last_user_agent','company_id'),'order' => array('id'=>'asc'), 'limit'=> 10 ,'conditions' => array('User.group_id !=' => '7') )
// 			'FieldData'=>array('limit' => 10 ,'order' => array('id'=>'asc'))
		 );

	/** NOTE <function select_catalog_data>
	 * 
	 **/
	function select_catalog_data () {
		
		$conditions['FieldNames.id'] = current($this->data);
		$fieldNamesFull = current($this->FieldData->FieldNames->find('all',array('conditions'=>$conditions)));
		$conditionsCatalogData['CatalogDatas.catalog_names_id'] = $fieldNamesFull['CatalogNames']['id'];
		$conditionsCatalogData['CatalogDatas.catalog_fields_id'] = $fieldNamesFull['CatalogFields']['id'];
		$catalogDatas = $this->FieldData->CatalogDatas->find('list',array('conditions'=>$conditionsCatalogData));
		$this->set(compact('catalogDatas'));
	}
	
	function select_new_data() {
		$id_get = current( current($this->data));
		$this->set('select_new_data',$id_get);
	}

	function fieldConfig () {

		$fieldConfig = array (
								'max_num_fields'=>'6'
		);
		return ($fieldConfig);
	}
	
	function index() {

// 		debug(func_get_args());
// 		debug($this->params['pass']);
// 		debug($this->passedArgs);
		$this->FieldData->recursive = 0;
		$this->LoadModel('Company');
		$company = $this->Company->find('list',array('fields'=>array('nom_id','name')));
		$company['0'] = ' ';
		$this->set(compact('company'));
		$this->set('htmlMotor',htmlMotor());

	/** NOTE <build the process for group access conditions for the special group root > */

		(int)$group_id = $_SESSION['Auth']['User']['group_id'] ;
		if (!checkAdmin($group_id)) {
			$user_id = $_SESSION['Auth']['User']['id'];
			$this->paginate = array(
									'conditions' => array('User.id' => $user_id)
						       );
		}

		$userFieldDatas = $this->paginate('User');
		
		foreach ( $userFieldDatas as $indexFieldDatas => $fieldDatasContent ) {
				$fieldDataUser[] = $fieldDatasContent['User'];
			foreach ($fieldDatasContent['FieldDatas'] as $indexFieldDatasContent => $contentFieldDatasContent) {
				$conditionsFieldData['FieldData.id'][] = $contentFieldDatasContent['id'];
				$dataUserFieldData[$fieldDatasContent['User']['id']][] = $contentFieldDatasContent['id'];
			}
		}

		$fieldData = $this->FieldData->find('all',array('conditions'=>$conditionsFieldData));
		/** NOTE <set the index array as field.id>*/
		$resultFieldData = Set::combine($fieldData, '{n}.FieldData.id', '{n}');

// 		debug($resultFieldData);
		/** NOTE <set the var for the encrypted filemanager>*/

		$file_dir = WWW_ROOT.'files'.DS.'users'.DS;
		$data = array ('1'=>'value','2'=>Configure::read('Security.salt'),'3'=>$this->Session->id(),'dir_path'=>base64_encode($file_dir),'_ip'=>$this->Auth->user('last_ip'));
		$Hash = GeraHash(30);
		$decrypt = base64_encode(serialize($data));
		$password = '@'.substr($Hash, 3, 12).'#';
		$salt = Configure::read('Security.salt');
		$encrypt_encode = base64_encode(dEncrypt($decrypt,$password, $salt, 'encrypt'));
		$app = 'filemanager';
		$path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/filemanager.php?{$Hash}={$encrypt_encode}";
		
		
		$this->set( compact('resultFieldData','fieldDataUser','dataUserFieldData','data','Hash','decrypt','password','salt','encrypt_encode','app','path') );
		$this->set('fieldConfig' , $this->fieldConfig());
	} //End Index

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid field data', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('fieldData', $this->FieldData->read(null, $id));
	}
	
	function add() {

		if (!empty($this->data)) {

			debug($this->data);
				$catalog_data = $this->data['FieldData']['catalog_datas_search_id'];
				$catalog_new =  $this->data['FieldData']['new_catalog_datas'];
				$catalog_description =  $this->data['FieldData']['new_catalog_description'];

			if ( $catalog_data === '' and !empty($catalog_new) ) {
				debug('new');
				$FieldName = $this->data['FieldData'];
				
				$conditionsFieldNames['FieldNames.id'] = $FieldName['field_names_id'];
				
				$fieldNamesData = $this->FieldData->FieldNames->find('first',array('conditions'=>$conditionsFieldNames));
				
				debug($fieldNamesData['FieldNames']);
				
				$catalog_names_id = $fieldNamesData['FieldNames']['catalog_names_id'];
				$catalog_fields_id = $fieldNamesData['FieldNames']['catalog_fields_id'];
				
				/** @Build <new catalog data>*/
				$catalog_data = array(
										'catalog_names_id'=>$catalog_names_id,
										'catalog_fields_id'=>$catalog_fields_id,
										'catalog_data'=>$FieldName['new_catalog_datas'],
										'create'=>date('Y-m-d H:m.s'),
										'catalog_data_description'=>$catalog_description,
										'status'=>'Active'
				);
				
// 				debug($catalog_data);
				
				$this->LoadModel('CatalogData');
				$this->CatalogData->create();
				if ($this->CatalogData->save($catalog_data)) {
					$this->Session->setFlash(__('The field data has been saved', true));
					$catalog_data_id = $this->CatalogData->getLastInsertID();
				} else {
					$this->Session->setFlash(__('The field data could not be saved. Please, try again.', true));
				}
			}
			
			$this->FieldData->create();
			
			if (isset($catalog_data_id) and !empty($catalog_data_id) and empty($this->data['FieldData']['catalog_datas_search_id'])) {
				debug($catalog_data_id);
				$this->data['FieldData']['catalog_datas_id'] = $catalog_data_id;
			} else {
				$this->data['FieldData']['catalog_datas_id'] = $this->data['FieldData']['catalog_datas_search_id'];
			}

			if ($this->FieldData->save($this->data)) {
				$this->Session->setFlash(__('The field data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The field data could not be saved. Please, try again.', true));
			}
		}

		$fieldNames = $this->FieldData->FieldNames->find('list');
		$users = $this->FieldData->User->find('list');
		$groups = $this->FieldData->Group->find('list');
		$catalogDatas = $this->FieldData->CatalogDatas->find('list');
		$this->set(compact('fieldNames', 'users', 'groups', 'catalogDatas'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid field data', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {

// 			debug($this->data);
				$catalog_data = $this->data['FieldData']['catalog_datas_search_id'];
				$catalog_new =  $this->data['FieldData']['new_catalog_datas'];
				if (isset($this->data['FieldData']['new_catalog_description'])) {
					$catalog_description =  $this->data['FieldData']['new_catalog_description'];
				}

			if ( $catalog_data === '' and !empty($catalog_new) ) {
// 				debug('new');
				$FieldName = $this->data['FieldData'];
				
				$conditionsFieldNames['FieldNames.id'] = $FieldName['field_names_id'];
				
				$fieldNamesData = $this->FieldData->FieldNames->find('first',array('conditions'=>$conditionsFieldNames));
				
// 				debug($fieldNamesData['FieldNames']);
				
				$catalog_names_id = $fieldNamesData['FieldNames']['catalog_names_id'];
				$catalog_fields_id = $fieldNamesData['FieldNames']['catalog_fields_id'];
				
				/** @Build <new catalog data>*/
				$catalog_data = array(
										'catalog_names_id'=>$catalog_names_id,
										'catalog_fields_id'=>$catalog_fields_id,
										'catalog_data'=>$FieldName['new_catalog_datas'],
										'create'=>date('Y-m-d H:m.s'),
										'catalog_data_description'=>$catalog_description,
										'status'=>'Active'
				);
				
// 				debug($catalog_data);
				$this->LoadModel('CatalogData');
				$this->CatalogData->create();
				if ($this->CatalogData->save($catalog_data)) {
					$this->Session->setFlash(__('The field data has been saved', true));
					$catalog_data_id = $this->CatalogData->getLastInsertID();
				} else {
					$this->Session->setFlash(__('The field data could not be saved. Please, try again.', true));
				}
			} // end set new data to the catalog
			
			$this->FieldData->create();
			
			if (isset($catalog_data_id) and !empty($catalog_data_id) and empty($this->data['FieldData']['catalog_datas_search_id'])) {
				debug($catalog_data_id);
				$this->data['FieldData']['catalog_datas_id'] = $catalog_data_id;
			} else {
				$data = $this->data['FieldData'] ;
				$this->data['FieldData'] = null;
				$this->data['FieldData']['id'] = $data['id'];
				$this->data['FieldData']['catalog_datas_id'] = $data['catalog_datas_search_id'];
			}

			if ($this->FieldData->save($this->data)) {
				$this->Session->setFlash(__('The field data has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
								<strong> The data could not be saved or is taken by another User Please, try again. </strong>
								<strong> Change to option New and add another record to catalog</strong>
							</div>', true));
				if (!empty($id)) {
					$this->redirect(array('action' => "edit/$id/"));
				} else {
					$this->redirect(array('action' => "index"));
				}
				
			}
			
		}

		if (empty($this->data)) {
			$this->data = $this->FieldData->read(null, $id);
		}
		
		$FieldName = $this->data['FieldData'];

		$conditionsFieldNames['FieldNames.id'] = $FieldName['field_names_id'];
		
		$fieldNamesData = $this->FieldData->FieldNames->find('first',array('conditions'=>$conditionsFieldNames));
		
		$catalog_names_id = $fieldNamesData['FieldNames']['catalog_names_id'];
		$catalog_fields_id = $fieldNamesData['FieldNames']['catalog_fields_id'];
		
		$conditionsCatalogData['CatalogDatas.catalog_names_id'] = $catalog_names_id;
// 		$conditionsCatalogData['CatalogDatas.catalog_fields_id'] = $catalog_fields_id;

		$fieldNames = $this->FieldData->FieldNames->find('list');
		$users = $this->FieldData->User->find('list');
		$groups = $this->FieldData->Group->find('list');
		
		$catalogDatas = $this->FieldData->CatalogDatas->find('list',array('fields'=>array('id','catalog_data','catalog_fields_id'),'conditions'=>$conditionsCatalogData));
		
		$this->LoadModel('CatalogField');
		$catalog_fields_names = $this->CatalogField->find('list');
		
		foreach ($catalogDatas as $idx_fields => $catalogContent) {
			$catalog[$catalog_fields_names[$idx_fields]] = $catalogContent;
		}
		$catalogDatas = $catalog;

// 		debug($catalog);
// 		debug($catalogDatas);
		/** add the zero selection menu*/
		$catalogDatas['0'] = 'Seleccione';
		ksort($catalogDatas);

		$this->set(compact('fieldNames', 'users', 'groups', 'catalogDatas','FieldName'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for field data', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FieldData->delete($id)) {
			$this->Session->setFlash(__('Field data deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Field data was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
