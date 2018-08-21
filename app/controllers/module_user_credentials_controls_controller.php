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
class ModuleUserCredentialsControlsController extends AppController {

	var $name = 'ModuleUserCredentialsControls';


	function index() {

		// $this->loadModel('User');

		// debug($this->User->find('all',array('conditions'=>array('User.id'=>'1'))));

		// NOTE credentials

		// NOTE begin the patches -- remove this when done

		// // $this->LoadModel('ModuleUserCredentialsControl');
		// // $cond['ModuleUserCredentialsControl.module_user_credentials_mains_id'] = $moduleMain['ModuleUserCredentialsMain']['id'];
		// $cond['ModuleUserCredentialsControl.user_id'] = $this->Auth->User('id');
		// $model_static = $this->ModuleUserCredentialsControl->find('list',array('conditions'=>$cond,'fields'=>array('value','value','module_user_credentials_mains_id')));
		// debug($model_static);

		// debug( $this->ModuleUserCredentialsControl->getCredentials('all',array('user_id'=>$this->Auth->User('id'))));


		// debug( $this->ModuleUserCredentialsControl->getCredentials('get',array('user_id'=>$this->Auth->User('id'))));


		$this->ModuleUserCredentialsControl->recursive = 0;
		$this->set('moduleUserCredentialsControls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid module user credentials control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('moduleUserCredentialsControl', $this->ModuleUserCredentialsControl->read(null, $id));
	}


	function get () {
			// NOTE if select an empty option
			if ($this->params['url']['data']['ModuleMainId'] == null) {
				Configure::write('debug', 0);
				$this->autoLayout = false;
				exit();
			}

			$conditionsMain['ModuleUserCredentialsMain.id'] = $this->params['url']['data']['ModuleMainId'];
			$user_id = $this->params['url']['data']['ModuleMainUserId'];
			$this->LoadModel('ModuleUserCredentialsMain');
			$moduleMain = $this->ModuleUserCredentialsMain->find('first',array('conditions'=>$conditionsMain));

			// debug($moduleMain);

			if ( $moduleMain ) {
				$modelname = $moduleMain['ModuleUserCredentialsMain']['model_name'];
				$modeltable =  $moduleMain['ModuleUserCredentialsMain']['database_column'];
			} else {
				$this->Session->setFlash(__('Invalid module user credentials control', true));
				$this->redirect(array('action' => 'add'));
			}

			$model_option_var = $moduleMain['ModuleUserCredentialsMain']['model_option_var'];

			$this->loadModel($modelname);
			// NOTE avoid errors ?? jajajaja lazy you
			$fields = array($modeltable,$modeltable);

			$modeldata = $this->$modelname->find('list',array('fields'=>$fields));
			// $modelControl =  $this->ModuleUserCredentialsControl->getCredentials('all',array('user_id'=>$this->Auth->User('id')));
			// debug($modelControl['ModuleUserCredentialsControl'][$model_option_var]);

			$cond['ModuleUserCredentialsControl.module_user_credentials_mains_id'] = $moduleMain['ModuleUserCredentialsMain']['id'];
			$cond['ModuleUserCredentialsControl.user_id'] = $user_id;
			$model_static = $this->ModuleUserCredentialsControl->find('list',array('conditions'=>$cond,'fields'=>array('value','value')));

			// CHECK
			if ( count($model_static) > 0 and count($model_static) < count($modeldata) ) {

				$new_modeldata = array_diff($modeldata, $model_static);

				foreach ($new_modeldata as $value) {
					# code...
						$newdata[$value]['0'] = $value;
				}
				foreach ($model_static as $datvalue) {
							$newstatic[$datvalue]['1'] = $datvalue;
				}
			// NOTE rewrite the output
					$modeldata = array_merge($newdata, $newstatic);

			} else if (count($model_static) == count($modeldata)) {

				foreach ($model_static as $datvalue) {
							$newstatic[$datvalue]['1'] = $datvalue;
				}
				$modeldata = $newstatic;

			} else {
				foreach ($modeldata as $modvalue) {
						$newdata[$modvalue]['0'] = $modvalue;
				}
				$modeldata = $newdata;
			}

			$this->set(compact('modeldata'));
			// NOTE set the output
			Configure::write('debug', 0);
			$this->autoLayout = false;
	}

	function getuser () {

		// NOTE if select an empty option
		if ($this->params['url']['data']['ModuleUserId'] == null) {
			Configure::write('debug', 0);
			$this->autoLayout = false;
			exit();
		}

		// debug($this->params);
		$user_id = $this->params['url']['data']['ModuleUserId'];
		$moduleUserCredentialsMains = $this->ModuleUserCredentialsControl->ModuleUserCredentialsMains->find('list',array('fields'=>array('id','module_description')));
		$this->set(compact('moduleUserCredentialsMains','user_id'));
		Configure::write('debug', 0);
		$this->autoLayout = false;
	}

	function add() {
		// conde
		$auth_users = array(
														// jesus baizabal
														'1'=>
																	array(
																					'areas'=>array('GUADALAJARA','LA PAZ')
																					,'bsu'=>array('GUADALAJARA','LA PAZ')
																					,'bsu_label'=>array('GUADALAJARA','LA PAZ')
																					,'fraction'=>array('GRANEL')
																					,'type'=>array('toneladas','viajes')),
														// jorge.floresb
														'96'=>
																	array(
																					'areas'=>array('GUADALAJARA','LA PAZ')
																					,'bsu'=>array('GUADALAJARA','LA PAZ')
																					,'bsu_label'=>array('GUADALAJARA','LA PAZ')
																					,'fraction'=>array('GRANEL'))
											 );


		if (!empty($this->data)) {

			debug($this->data);

			$theValue = $this->data['ModuleUserCredentialsControl']['value'];
				$conditionsModuleUserCredentialsControl['ModuleUserCredentialsControl.module_user_credentials_mains_id'] = $this->data['ModuleUserCredentialsControl']['module_user_credentials_mains_id'];
				$conditionsModuleUserCredentialsControl['ModuleUserCredentialsControl.user_id'] = $this->data['ModuleUserCredentialsControl']['user_id'];
			$is_data_ = $this->ModuleUserCredentialsControl->find('all',array('conditions'=>$conditionsModuleUserCredentialsControl));
			$_counter = count($theValue);
			$dataValue = array_keys($theValue);

			if ($_counter > 0) {
				for ( $i = 0 ; $i < $_counter ;$i++ ) {
					# Build the save array
						$saveControl['ModuleUserCredentialsControl'][$i]['module_user_credentials_mains_id'] = $this->data['ModuleUserCredentialsControl']['module_user_credentials_mains_id'];
						$saveControl['ModuleUserCredentialsControl'][$i]['user_id'] = $this->data['ModuleUserCredentialsControl']['user_id'];
						$saveControl['ModuleUserCredentialsControl'][$i]['_status'] = $this->data['ModuleUserCredentialsControl']['_status'];
						$saveControl['ModuleUserCredentialsControl'][$i]['value'] = $dataValue[$i];
				}
			}
			debug($saveControl);

			$countSource = count($is_data_);

			if ($countSource > 0 ) {
				// NOTE deleteAll(mixed $conditions, $cascade = true, $callbacks = false)
				if ($this->ModuleUserCredentialsControl->deleteAll($conditionsModuleUserCredentialsControl)) {
					// $this->Session->setFlash(__('The module user credentials control has been saved', true));
					// $this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('The module user credentials control Fails. Please, try again.', true));
				}
			}
			if ($this->ModuleUserCredentialsControl->saveAll($saveControl['ModuleUserCredentialsControl'])) {
				$this->Session->setFlash(__('The module user credentials control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module user credentials control could not be saved. Please, try again.', true));
			}

			// exit();
			// $this->ModuleUserCredentialsControl->create();
			// if ($this->ModuleUserCredentialsControl->save($this->data)) {
			// 	$this->Session->setFlash(__('The module user credentials control has been saved', true));
			// 	$this->redirect(array('action' => 'index'));
			// } else {
			// 	$this->Session->setFlash(__('The module user credentials control could not be saved. Please, try again.', true));
			// }
		}

		$moduleUserCredentialsMains = $this->ModuleUserCredentialsControl->ModuleUserCredentialsMains->find('list',array('fields'=>array('id','module_description')));

		$users = $this->ModuleUserCredentialsControl->User->find('list',array('fields'=>array('id','full_name')));

		// debug($moduleUserCredentialsMains);
		// debug($this->ModuleUserCredentialsControl->ModuleUserCredentialsMains->find('all'));
		// NOTE set a observe mechanishm
		// code ...

		$this->set(compact('moduleUserCredentialsMains', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid module user credentials control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ModuleUserCredentialsControl->save($this->data)) {
				$this->Session->setFlash(__('The module user credentials control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module user credentials control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ModuleUserCredentialsControl->read(null, $id);
		}
		// $moduleUserCredentialsMains = $this->ModuleUserCredentialsControl->ModuleUserCredentialsMains->find('list');
		$users = $this->ModuleUserCredentialsControl->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for module user credentials control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ModuleUserCredentialsControl->delete($id)) {
			$this->Session->setFlash(__('Module user credentials control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Module user credentials control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
