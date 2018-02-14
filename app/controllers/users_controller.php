<?php
class UsersController extends AppController {

	var $name = 'Users';
    var $components = array('RequestHandler','Session');
    var $helpers = array('Html','Form','Ajax','Javascript','Js');
//     var $paginate = array(
// 							'User' => array(
// 								'limit' => 20,
// 								'conditions'=>array('status'=>'Active'),
// 								'order' => array(
// 									'User.full_name' => 'asc',
// 								),
// 							),
// 					);
    var $uses = array('User','Company','FieldName','FieldData');

	/** NOTE adding from cake* Auth module */

	function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow(array('logout'));
	}


	function index() {

		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
		$this->LoadModel('Company');
		$company = $this->Company->find('list',array('fields'=>array('nom_id','name')));
		$this->set(compact('company'));
		$this->set('htmlMotor',htmlMotor());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			/** when the data of the user arrives hir already are check */

			$this->User->create();
			if ($this->User->save($this->data)) {

				/** NOTE <add directory for this user> */

				if (!empty($this->data['User']['username'])) {
				$directory = WWW_ROOT.'files'.DS.'users'.DS.$this->data['User']['username'].DS;
					if ( !is_dir($directory) ) {
						foreach (createDirs() as $indx => $dir_name) {
							if(!mkdir($directory.$dir_name.DS, 0777, true)) {
								die('the dir '.$dir_name.' could not be create');
							}
						}
					}
				}

				/** NOTE <add FieldNames to Fieldatas for this user>*/
				$FieldName = $this->FieldName->find('list');
				$user_id = $this->User->getLastInsertID();
				$user_group = $this->data['User']['group_id'];

				foreach ($FieldName as  $id_field_name => $field_name) {
					$data_user['user_id'] = $user_id ;
					$data_user['group_id'] = $user_group;
					$data_user['field_names_id'] = $id_field_name;
					$data_user['create'] = date('Y-m-d H:m:s');
					$data_user['last_ip'] = $_SERVER['REMOTE_ADDR'];
					$dataSet[] = $data_user;
				}

				$this->FieldData->create();
				if ($this->FieldData->saveAll($dataSet)) {
					$this->Session->setFlash(__('The field name has been saved', true));
				} else {
					$this->Session->setFlash(__('The field name could not be saved. Please, try again.', true));
				}

				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}

		$groups = $this->User->Group->find('list');
		/** NOTE <set => this must be replaced for compability > */

		$companies = $this->Company->find('list',array('fields'=>array('nom_id','name')));

		$this->set(compact('groups','companies'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ( $this->data['User']['password'] === $this->Auth->Password('') ) {
				unset($this->data['User']['password']);
			}
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));

		$this->LoadModel('Company');
		$companies = $this->Company->find('list',array('fields'=>array('nom_id','name')));
// 		debug($company);
		$this->set(compact('companies'));
	}

	function edit_password($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {

			if ( $this->data['User']['password'] === $this->Auth->Password('') ) {
				unset($this->data['User']['password']);
			}

			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
												<strong>Sus datos han sido actualizados</strong>
												ahora puede volver al
												<a href="'.$this->webroot.'" class="alert-link">Inicio del Portal</a>
											</div>', true));
				$this->redirect($this->referer());
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}


		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));

		$this->LoadModel('Company');
		$company = $this->Company->find('list',array('fields'=>array('nom_id','name')));
// 		debug($company);
		$this->set(compact('company'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->User->delete($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	/** NOTE @set<adding form bake of cake>*/

	function login() {

		//Auth Magic
// 		if (!empty($this->data) && $this->Auth->user()) {
// // 			$this->User->id = $this->Auth->user('id');
// 			$number_id = $this->Auth->user('number_id');
// 			pr($this->data);
//
// 			$this->Session->setFlash('You are logged in!');
// 			exit();
// 			$this->redirect('/', null, false);
// 		}
		if ($this->Session->read('Auth.User')) {

			$this->Session->setFlash('');
			$this->redirect('/', null, false);

		}
	}

	function logout() {
		//Leave empty for now.
		$this->Session->setFlash('Session Terminada');
		foreach($_SESSION as $container => $arrayContainer){
		  if($container !== 'Auth' AND $container !== 'Config' AND $container !== 'Message'){//Belong to normal Session
		  unset($_SESSION[$container]); // Sanitize the Global var $_SESSION
		  }
		}
        $this->redirect($this->Auth->logout());

	}



// 	function initDB() {
// 		$group =& $this->User->Group;
// 		//Allow admins to everything
// 		$group->id = 1;
// 		$this->Acl->allow($group, 'controllers');
//
// 		//allow managers to posts and widgets
// // 		$group->id = 2;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Posts');
// // 		$this->Acl->allow($group, 'controllers/Widgets');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/policies');
//
//
// 		//allow users to only add and edit on posts and widgets
// // 		$group->id = 3;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Posts/add');
// // 		$this->Acl->allow($group, 'controllers/Posts/edit');
// // 		$this->Acl->allow($group, 'controllers/Widgets/add');
// // 		$this->Acl->allow($group, 'controllers/Widgets/edit');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/policies');
//
// 		// allow a fourt (mortals) group only to edit can be editors group or revisors
// // 		$group->id = 4;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Posts/view');
// // 		$this->Acl->allow($group, 'controllers/Posts/index');
// // 		$this->Acl->allow($group, 'controllers/Widgets/view');
// // 		$this->Acl->allow($group, 'controllers/Widgets/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// // 		$this->Acl->allow($group, 'controllers/Policies/policies');
//
// 		// build the work groups "Policies"
// // 		$group->id = 5;
// // 		$this->Acl->deny($group, 'controllers');
// // 		$this->Acl->allow($group, 'controllers/Policies/view');
// // 		$this->Acl->allow($group, 'controllers/Policies/index');
// 		//we add an exit to avoid an ugly "missing views" error message
// 		echo "all done";
// 		exit;
// 	}
}
