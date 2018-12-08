<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 * <Most of you are familiar with the virtues of a programmer. There are three, of course: laziness, impatience, and hubris>
 */

class AppController extends Controller {
    var $components = array('Acl', 'Auth', 'Session','ControllerList','DebugKit.Toolbar');
    var $helpers = array('Html', 'Form', 'Session');
    var $uses = array('Company'); //Company must change for root_menu


	/** @GST <SECTION>*/

    /** NOTE <GST check payroll users >*/
    function checkExternalDb ($model=null,$data=null,$check=null) {

		if ($check === true) { // double check for gst
// 			debug($this->Auth->hashPasswords($delta));
// 			debug($this->Auth->password($data['User']['password']));
			$this->loadModel($model,'User');

      // var_dump($this->Auth->user());
			// var_dump($this->Session->read('Auth.User'));
			// debug($this->MssqlPayroll->getPayrollByCompany($cvecia=null,$cveare=null,$cvepue=null,$cvetra=$data['User']['username']));
			// debug($this->User->find('all',array('conditions'=>array('User.number_id'=>$data['User']['username']))));



			if(!$this->User->find('all',array('conditions'=>array('User.number_id'=>$data['User']['username'])))){
				$nominaUser = $this->MssqlPayroll->getPayrollByCompany($cvecia=null,$cveare=null,$cvepue=null,$cvetra=$data['User']['username']);

				if (empty($nominaUser) or !isset($nominaUser)) {
					$this->Auth->loginError = "Su numero de empleado no se encuentra en nuestra base de datos si usted es un empleado <strong>activo</strong>,por favor comuniquelo con el departamento de Recursos Humanos";
				} else {

					if(count($nominaUser) === 1){ // just a precaution over a not know inconsistence in the system NOM

						foreach ($nominaUser as $idNominaUser => $valueNominaUser) {
							foreach ($valueNominaUser as $dataNominaUser) {
								$user['User']['username'] = strtolower(explode("\x20",$this->normalizeChars(utf8_encode($dataNominaUser['nombre'])))[0]).'.'.strtolower(explode("\x20",$this->normalizeChars(utf8_encode($dataNominaUser['apepat'])))[0]).substr(strtolower(explode("\x20",$this->normalizeChars(utf8_encode($dataNominaUser['apemat'])))[0]),0,1);
								$user['User']['name'] = ucwords(strtolower(htmlentities($dataNominaUser['nombre'],ENT_XHTML,'ISO-8859-1')));
								$user['User']['last_name'] = ucwords(strtolower(htmlentities($dataNominaUser['apepat'],ENT_XHTML,'ISO-8859-1')))."\x20".ucwords(strtolower(htmlentities($dataNominaUser['apemat'],ENT_XHTML,'ISO-8859-1')));
								$user['User']['gender'] = strtoupper($dataNominaUser['sexo']);
								$user['User']['password'] = $this->Auth->password(strtolower($dataNominaUser['numrfc']));
                $user['User']['clear_password'] = $dataNominaUser['numrfc'];
								$user['User']['group_id'] = '3'; //this must be the default as user then you can chane this in the panel app
								$user['User']['created'] = date('Y-m-d H:m:s');
								$user['User']['modified'] = date('Y-m-d H:m:s');
								$user['User']['last_access'] = date('Y-m-d H:m:s');
								$user['User']['status'] = 'Active'; //because it found in nom
								$user['User']['current_date_time'] = date('Y-m-d H:m:s');
								$user['User']['languaje'] = 'es'; // we are in gst
								$user['User']['number_id'] = $dataNominaUser['cvetra']; // the worker key
								$user['User']['company_id'] = (int)$dataNominaUser['cvecia']; // where are from ??
								$user['User']['user_agent'] = $_SERVER['HTTP_USER_AGENT']; // user agent from ??
								$user['User']['last_user_agent'] = $_SERVER['HTTP_USER_AGENT']; // user agent from ??
							}
						}

						if(!$this->User->save($user['User'])){
							$this->Auth->loginError = "Ha ocurrido un error al generar su usuario , por favor comuniquelo con el departamento de Sistemas o intentelo de nuevo mas tarde";
						} else {

							/** NOTE <add directory for this user> */
							$username = $user['User']['username'];
							if (!empty($username)) {
							// $directory = WWW_ROOT.'files'.DS.'users'.DS.$username.DS;
							// $directory = 'RichFilemanager/userfiles'.DS.$username.DS;
              $directory = WWW_ROOT.'vendors'.DS.'RichFilemanager'.DS.'userfiles'.DS.$this->Auth->user('username').DS;
								if ( !is_dir($directory) ) {
                  if(!mkdir($directory.DS, 0777, true)) {
                    die('the dir '.$dir_name.' could not be create');
                  }
									// foreach (createDirs() as $indx => $dir_name) {
									// 	if(!mkdir($directory.$dir_name.DS, 0777, true)) {
									// 		die('the dir '.$dir_name.' could not be create');
									// 	}
									// }
								}
							}

							/** NOTE <set the proper permissions and smb account >*/

							/** NOTE <add FieldNames to Fieldatas for this user>*/
// 							$this->LoadModel('FieldName');
// 							$this->LoadModel('FieldData');
// 							$FieldName = $this->FieldName->find('list');
// 							$user_id = $this->User->getLastInsertID();
// 							$user_group = $user['User']['group_id'];
//
// 							foreach ($FieldName as  $id_field_name => $field_name) {
// 								$data_user['user_id'] = $user_id;
// 								$data_user['group_id'] = $user_group;
// 								$data_user['field_names_id'] = $id_field_name;
// 								$data_user['create'] = date('Y-m-d H:m:s');
// // 								$data_user['last_ip'] = $_SERVER['REMOTE_ADDR'];
// 								$dataSet[] = $data_user;
// 							}
//
// 							$this->FieldData->create();
// 							if ($this->FieldData->saveAll($dataSet)) {
// 								$this->Session->setFlash(__('The field name has been saved', true));
// 							} else {
// 								$this->Session->setFlash(__('The field name could not be saved. Please, try again.', true));
// 							}
						}

            // exit();
						/* mkdir for this user */
					} else if (count($nominaUser) > 1) {
						$this->Auth->loginError = "No se ha podido generar su usuario favor de comunicarlo a recursos humanos  o enviar un correo a soporte@gsttransportes.com con el codigo de error:0x0000001 y su informaci&oacute;n";
					} else {
						$this->Auth->loginError = "No se ha podido generar su usuario favor de comunicarlo al departamento de Sistemas con el codigo de error:0x0000002";
					}
				}
			} else {
				// if user exists check in nom2001
// 				$payroll = $this->User->find('all',array('conditions'=>array('User.number_id'=>$data['User']['username'])));
// 				var_dump($payroll);
// 				exit();
// 				$nominaUser = $this->MssqlPayroll->getPayrollByCompany($cvecia=null,$cveare=null,$cvepue=null,$cvetra=$data['User']['username']);
			}
			return null;
		}
	}
	/** NOTE <GST check payroll users >*/

	/** NOTE <GST build Menu's' options>*/
	// conecct to policiesTypes for build the menu of the documents
	function getDocuments ($menu=null) {
			if (!empty($menu)) {
				$qry = 'all';
			} else {
				$qry = 'list';
			}
			$this->LoadModel('PoliciesType');
			$conditions['PoliciesType.status'] = 'Active';
			$documents = $this->PoliciesType->find($qry,array('fields'=>array('id','description'),'conditions'=>$conditions));
		return $documents;
	}

	// build the menus for gst
	function buildMenu () {
		$menu = $this->getDocuments(true);
		$conditionsMenu['PoliciesSubtypesDefinition.status'] = 'Active';
		$this->LoadModel('PoliciesSubtypesDefinition');
		$submenu = $this->PoliciesSubtypesDefinition->find('list',array('fields'=>array('id','description'),'conditions'=>$conditionsMenu));
		foreach ($menu as $id_menu => $PoliciesType) {
			if (empty($PoliciesType['PoliciesSubtype'])) {
				$setMenu[$PoliciesType['PoliciesType']['id']][$PoliciesType['PoliciesType']['description']] = null;
			} else {
				foreach ($PoliciesType['PoliciesSubtype'] as $id_policies_subtype => $PoliciesSubtype) {
					$setMenu[$PoliciesType['PoliciesType']['id']][$PoliciesType['PoliciesType']['description']][$PoliciesSubtype['policies_subtypes_definitions_id']] = $submenu[$PoliciesSubtype['policies_subtypes_definitions_id']];
				}
			}
		}
		$this->set(compact('setMenu'));
// 		debug($menu);
// 		debug($submenu);
// 		debug($setMenu);
	}

	/** NOTE <GST build Menu's' options>*/

	/** NOTE <GST build M-r's report>*/
		// 	...
	/** NOTE <GST build M-r's report>*/


/** @CORE <SECTION>*/

/** NOTE <CORE builtin functions>*/


	function extendsUsersMenu() {
		// debug($this->ControllerList->get());

		$controller = $this->ControllerList->get();

		foreach ($controller as $controllerName => $containerViews) {
			// debug($controllerName);
		}

	}

/** NOTE <CORE set the proper permissions and shares account >
*   @vendor
*/

  function controlModules($user_id = null) {

    return null;
  }

/** NOTE <CORE set the proper permissions and shares account >*/

	function setShares ($user_id = null) {
		// procedure
		$smb_directory = WWW_ROOT.'vendors'.DS.'RichFilemanager'.DS.'userfiles'.DS.$this->Auth->user('username').DS;
    $remote = "http://nextcloud/gstcloud/remote.php/webdav";
		// var_dump(is_dir($smb_directory));

  // NOTE check if the user has a shared
    $this->LoadModel('ControlDeskUserControl');

    //
      $conditions_storage['ControlDeskUserControl.user_id'] = $this->Auth->user('id');
      $storage = $this->ControlDeskUserControl->find('first',array('fields'=>array('id','clear_key','storage'),'conditions'=>$conditions_storage));

      if (!isset($storage)) {
        //set the record in db
        // NOTE Save an user set the password and create a record
        $this->LoadModel('MssqlPayroll');
        // $userInfo = $this->MssqlPayroll->getPayrollByCompany($cvecia=null,$cveare=null,$cvepue=null,$cvetra=$this->Auth->user('number_id'));
        $conditions_nomina['MssqlPayroll.cvetra'] = $this->Auth->user('number_id');
        $userInfo = $this->MssqlPayroll->find('all',array('conditions'=>$conditions_nomina));

        // echo "<pre>";
        //   print_r($userInfo);
        // echo "</pre>";
        $is_shared = false;
      } else {

        $is_shared = $storage['ControlDeskUserControl']['storage'];
        // $_SESSION['Auth']['User']['storage'] = 1;
        // var_dump(($_SESSION['Auth']['User']));
        // var_dump($this->Auth->User());

        if(isset($_SESSION['Auth']['User'])) {
          $_SESSION['Auth']['User']['storage'] = $is_shared;
          $_SESSION['Auth']['User']['remote'] = $remote;
        }

        // echo "<pre>";
        //     print_r($storage);
        //     print_r($is_shared['ControlDeskUserControl']['storage']);
        //     // print_r($this->Auth->user('number_id'));
        // echo "</pre>";
        // NOTE just in case
        if ($storage['ControlDeskUserControl']['clear_key'] == '' || $storage['ControlDeskUserControl']['clear_key'] == null) {
          #call to nomina and set the key in db
          // NOTE This is a plus
        } else {
          $access = $storage['ControlDeskUserControl']['clear_key'];
        }
        // NOTE Mount the resource
        // var_dump($access);

        if ( is_dir($smb_directory) && $is_shared == true ) {
    			// $check_permissions = ;
          // var_dump ('mount granted');
          // var_dump ('check if already mounted');
          /** @link https://cloud.example.com/webDAV/URL <username>  <password> */
          /** @package this command is working **/
          // var_dump( WWW_ROOT.'vendors/RichFilemanager/userfiles/'.$this->Auth->user('username') );
          /** @bash  the command**/

          // $mount_point = WWW_ROOT.'vendors/RichFilemanager/userfiles/'.$this->Auth->user('username');
          $mount_point = $smb_directory;
          $options = "users,rw,noauto,username=".$this->Auth->user('username').",file_mode=0777,dir_mode=0777";


          $out = shell_exec('mountpoint '.$mount_point);
          // echo "<pre>$out</pre>";

          if (strpos( $out, 'not') !== false){
            // echo "is_unmount";
            $command = '#!/bin/bash
                        echo "TOP: Now start expecting things"
                        expect -c \'
                            spawn sudo mount.davfs http://nextcloud/gstcloud/remote.php/webdav '.$mount_point.' -o '.$options.'
                            expect "Password: "
                            send \'"'.$access.'\r"\'
                            expect "$ "
                            send "exit\r"
                            expect "$ "
                            send "pbrun bash\r"
                            expect "$ "
                            send "exit\r"
                             \'
                        ';
              // $command = 'whoami';
              // $command = 'sudo umount.davfs '.$mount_point;
              $output = shell_exec($command);
              // echo "<pre>$output</pre>";
          } else {
            // echo "is_mount";
          }

    		} else {
    			// var_dump ('check_permissions_and try again');
    		} //NOTE mount

      } // End storage
		return null;

	} // NOTE End shares
	/** NOTE <Define dirs>**/

/** NOTE <CORE builtin functions>*/
    function afterFilter() {
        # Update User last_access datetime
        if ($this->Auth->user()) {
            $this->loadModel('User');
            $this->User->id = $this->Auth->user('id');
            $this->User->saveField('last_access', date('Y-m-d H:i:s'));
            $this->User->saveField('last_user_agent', $_SERVER['HTTP_USER_AGENT']);
            $this->User->saveField('last_ip', $_SERVER['REMOTE_ADDR']);

            /**Set Counter*/

			/** NOTE <add directory to an user if not exits>*/
			if ($this->Auth->user('username')) {
			// $directory = WWW_ROOT.'files'.DS.'users'.DS.$this->Auth->user('username').DS;
      // $directory = ROOT.DS.'../RichFilemanager/userfiles'.DS.$this->Auth->user('username').DS;
      // $directory = ROOT.DS.'app'.DS.'webroot'.DS.'RichFilemanager/userfiles'.DS.$this->Auth->user('username').DS;
      $directory = WWW_ROOT.'vendors'.DS.'RichFilemanager'.DS.'userfiles'.DS.$this->Auth->user('username').DS;
				if ( !is_dir($directory) ) {
          if(!mkdir($directory.DS, 0777, true)) {
            die('the dir '.$directory.' could not be create::after');
          }
				}
        // else {
        //   if(!mkdir($directory.DS, 0777, true)) {
        //     die('the dir '.$directory.' could not be create::after:else');
        //   }
				// }
			} //End add directory

			/** NOTE <add mount points for samba => setSmb('mount|umount|create','username')>*/
// 			$this->setSmb('mount');

		/** NOTE This is gst so you can remove */
			$conditonsCnpy['Company.nom_id'] = $_SESSION['Auth']['User']['company_id'];
			$cpny_id = $this->Company->find('list',array('conditions'=>$conditonsCnpy));
			$_SESSION['Auth']['User']['casetas_company'] = key($cpny_id);
		/** NOTE This is gst so you can remove */
        }
    }

    function beforeFilter() {

  // NOTE core php config
    ini_set('memory_limit','-1');
    ini_set('max_execution_time', '300');

        //Configure AuthComponent
		$this->Auth->authorize = 'actions';
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
//         	$this->Auth->loginRedirect = array('controller' => 'somController', 'action' => 'someAction');
		$this->Auth->actionPath = 'controllers/';
		$this->Auth->allowedActions = array('display');
		$this->Auth->loginError = "<strong>Error</strong> en el inicio de Sesi&oacute;n : revise su nombre de <strong>usuario</strong> o <strong>contrase&ntilde;a</strong>";
		$this->Auth->authError = "El Acceso a este sitio esta <strong>restringido</strong>";
		$this->Auth->flashElement    = "message_error";
		$this->Auth->userScope = array('User.status' => 'Active');

		/** NOTE -> map actions for diferrent apps use a selector for example for gst
		*/
		$this->Auth->mapActions(
			array(
				'create' => array('addToPolicy','select_catalog_data','select_new_data'),
				'read' => array('testing','select_catalog_data','select_new_data'),
				'update' => array('edit_password','edit_subtype','select_new_data')
// 				'delete' => array('someAction', 'someAction2')
			)
		);

		// if we have other field for authenticathion for example email add the field hir
		if (isset($this->data['User']['username']) and is_numeric($this->data['User']['username'])) {
			$this->data['User']['number_id'] = $this->data['User']['username'];
			$this->Auth->fields = array(
										'username' => 'number_id',
										'password' => 'password'
										);
		}
		// set languaje config for current theme
		// this can be set by a country detection
		if(isset($this->Auth->user()['User']['languaje'])) {
				$languaje = $this->Auth->user()['User']['languaje'];
		} else {
			$languaje = 'es';
// 			$languaje = 'en';
		}
		$this->set('languaje',$languaje);
		// set the images paths this can be static and in db a default value ... or not??
		// we can search in db or set hir in the else statement
		if(isset($this->Auth->user()['User']['portal'])) {
				$portalUrl = $this->Auth->user()['User']['portal'];
		} else {
			$portalUrl = 'gst';
// 			$portalUrl = 'portal';
		}
		$this->set('portalUrl',$portalUrl);

		// idon't remenber what this do XD!
		if(isset($this->Auth->user()['User']['id'])) {
// 				$public = true;
				$this->set('public', true);
		} else {
				$this->set('public', false);
		}


		// extra check for Gst Payroll if user isn't in the local Db then create and return the new $this->data instead old for proper login
		// this only if gst because need connect to mssql server
		/** <GST> */
		if ($portalUrl === 'gst') {
		// this can be removed if you need upper and lower case detection password
			if (isset($this->data['User']['password'])) {
				$this->data['User']['password'] = strtolower($this->data['User']['password']);
			}
			if (isset($this->data['User']['username']) and is_numeric($this->data['User']['username'])) {
				$this->checkExternalDb($model='MssqlPayroll',$data=$this->data,$check=true);
			}
// 			/** NOTE -> map actions for diferrent apps use a selector for example for gst
// 			*/
// 			$this->Auth->mapActions(
// 				array(
// 					'create' => array('addToPolicy'),
// 					'read' => array('testing'),
// 					'update' => array('edit_password','edit_subtype')
// 	// 				'delete' => array('someAction', 'someAction2')
// 				)
// 			);
// 			set the documents type and buid the nav menu
			$documents = $this->getDocuments();
			$documents ? $this->set('documents',$documents) : $this->set('documents',null);

			if (isset($this->Auth->user()['User']) && $this->Auth->user()['User']['group_id'] == 3) {
				$this->Auth->loginRedirect = array('controller' => 'Policies', 'action' => 'view','type'=>'1','subtype'=>'1');
			}
			$this->buildMenu();

		} /** <GST> */ // End gst options

    $this->setShares($this->Auth->user()['User']['id']);
// 		$this->extendsUsersMenu();

    /** NOTE Add function for control Module Control Module
    * @packages this module controls the main menu
    * $this->controlModuleUsers($this->Auth->user()['User']['id']);
    */




// 		exit();

// 		$this->extendsUsersMenu();

// 		debug($this->getDocuments());
		//if need define a variable in a view scope you can reset or destroid that var hir in app_controller
		// jajaja Rules
		if (isset($_SESSION['Auth']['User']['alert'])) {
			unset($_SESSION['Auth']['User']['alert']);
		}
//

// 			debug($this->Auth->hashPasswords($delta));
// 			debug($this->Auth->password($data['User']['password']));

// 		maybe can just use crud ops
// 		pr($this->Company->find('all'));
// 		var_dump(FULL_BASE_URL);

// 		$this->Auth->mapActions(array('create' => array('add', 'register'));
//
// 		Or equivalently:
//
// 		$this->Auth->mapActions(array('register' => 'create', 'add' => 'create'));
// 		exit();
// 		debug($_SESSION);
    }

	/**
	* Replace language-specific characters by ASCII-equivalents.
	* @param string $s
	* @return string
	*/
	function normalizeChars($string) {
		$replace = array(
			'ъ'=>'-', 'Ь'=>'-', 'Ъ'=>'-', 'ь'=>'-',
			'Ă'=>'A', 'Ą'=>'A', 'À'=>'A', 'Ã'=>'A', 'Á'=>'A', 'Æ'=>'A', 'Â'=>'A', 'Å'=>'A', 'Ä'=>'Ae',
			'Þ'=>'B',
			'Ć'=>'C', 'ץ'=>'C', 'Ç'=>'C',
			'È'=>'E', 'Ę'=>'E', 'É'=>'E', 'Ë'=>'E', 'Ê'=>'E',
			'Ğ'=>'G',
			'İ'=>'I', 'Ï'=>'I', 'Î'=>'I', 'Í'=>'I', 'Ì'=>'I',
			'Ł'=>'L',
			'Ñ'=>'N', 'Ń'=>'N',
			'Ø'=>'O', 'Ó'=>'O', 'Ò'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'Oe',
			'Ş'=>'S', 'Ś'=>'S', 'Ș'=>'S', 'Š'=>'S',
			'Ț'=>'T',
			'Ù'=>'U', 'Û'=>'U', 'Ú'=>'U', 'Ü'=>'Ue',
			'Ý'=>'Y',
			'Ź'=>'Z', 'Ž'=>'Z', 'Ż'=>'Z',
			'â'=>'a', 'ǎ'=>'a', 'ą'=>'a', 'á'=>'a', 'ă'=>'a', 'ã'=>'a', 'Ǎ'=>'a', 'а'=>'a', 'А'=>'a', 'å'=>'a', 'à'=>'a', 'א'=>'a', 'Ǻ'=>'a', 'Ā'=>'a', 'ǻ'=>'a', 'ā'=>'a', 'ä'=>'ae', 'æ'=>'ae', 'Ǽ'=>'ae', 'ǽ'=>'ae',
			'б'=>'b', 'ב'=>'b', 'Б'=>'b', 'þ'=>'b',
			'ĉ'=>'c', 'Ĉ'=>'c', 'Ċ'=>'c', 'ć'=>'c', 'ç'=>'c', 'ц'=>'c', 'צ'=>'c', 'ċ'=>'c', 'Ц'=>'c', 'Č'=>'c', 'č'=>'c', 'Ч'=>'ch', 'ч'=>'ch',
			'ד'=>'d', 'ď'=>'d', 'Đ'=>'d', 'Ď'=>'d', 'đ'=>'d', 'д'=>'d', 'Д'=>'d', 'ð'=>'d',
			'є'=>'e', 'ע'=>'e', 'е'=>'e', 'Е'=>'e', 'Ə'=>'e', 'ę'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'Ē'=>'e', 'Ė'=>'e', 'ė'=>'e', 'ě'=>'e', 'Ě'=>'e', 'Є'=>'e', 'Ĕ'=>'e', 'ê'=>'e', 'ə'=>'e', 'è'=>'e', 'ë'=>'e', 'é'=>'e',
			'ф'=>'f', 'ƒ'=>'f', 'Ф'=>'f',
			'ġ'=>'g', 'Ģ'=>'g', 'Ġ'=>'g', 'Ĝ'=>'g', 'Г'=>'g', 'г'=>'g', 'ĝ'=>'g', 'ğ'=>'g', 'ג'=>'g', 'Ґ'=>'g', 'ґ'=>'g', 'ģ'=>'g',
			'ח'=>'h', 'ħ'=>'h', 'Х'=>'h', 'Ħ'=>'h', 'Ĥ'=>'h', 'ĥ'=>'h', 'х'=>'h', 'ה'=>'h',
			'î'=>'i', 'ï'=>'i', 'í'=>'i', 'ì'=>'i', 'į'=>'i', 'ĭ'=>'i', 'ı'=>'i', 'Ĭ'=>'i', 'И'=>'i', 'ĩ'=>'i', 'ǐ'=>'i', 'Ĩ'=>'i', 'Ǐ'=>'i', 'и'=>'i', 'Į'=>'i', 'י'=>'i', 'Ї'=>'i', 'Ī'=>'i', 'І'=>'i', 'ї'=>'i', 'і'=>'i', 'ī'=>'i', 'ĳ'=>'ij', 'Ĳ'=>'ij',
			'й'=>'j', 'Й'=>'j', 'Ĵ'=>'j', 'ĵ'=>'j', 'я'=>'ja', 'Я'=>'ja', 'Э'=>'je', 'э'=>'je', 'ё'=>'jo', 'Ё'=>'jo', 'ю'=>'ju', 'Ю'=>'ju',
			'ĸ'=>'k', 'כ'=>'k', 'Ķ'=>'k', 'К'=>'k', 'к'=>'k', 'ķ'=>'k', 'ך'=>'k',
			'Ŀ'=>'l', 'ŀ'=>'l', 'Л'=>'l', 'ł'=>'l', 'ļ'=>'l', 'ĺ'=>'l', 'Ĺ'=>'l', 'Ļ'=>'l', 'л'=>'l', 'Ľ'=>'l', 'ľ'=>'l', 'ל'=>'l',
			'מ'=>'m', 'М'=>'m', 'ם'=>'m', 'м'=>'m',
			'ñ'=>'n', 'н'=>'n', 'Ņ'=>'n', 'ן'=>'n', 'ŋ'=>'n', 'נ'=>'n', 'Н'=>'n', 'ń'=>'n', 'Ŋ'=>'n', 'ņ'=>'n', 'ŉ'=>'n', 'Ň'=>'n', 'ň'=>'n',
			'о'=>'o', 'О'=>'o', 'ő'=>'o', 'õ'=>'o', 'ô'=>'o', 'Ő'=>'o', 'ŏ'=>'o', 'Ŏ'=>'o', 'Ō'=>'o', 'ō'=>'o', 'ø'=>'o', 'ǿ'=>'o', 'ǒ'=>'o', 'ò'=>'o', 'Ǿ'=>'o', 'Ǒ'=>'o', 'ơ'=>'o', 'ó'=>'o', 'Ơ'=>'o', 'œ'=>'oe', 'Œ'=>'oe', 'ö'=>'oe',
			'פ'=>'p', 'ף'=>'p', 'п'=>'p', 'П'=>'p',
			'ק'=>'q',
			'ŕ'=>'r', 'ř'=>'r', 'Ř'=>'r', 'ŗ'=>'r', 'Ŗ'=>'r', 'ר'=>'r', 'Ŕ'=>'r', 'Р'=>'r', 'р'=>'r',
			'ș'=>'s', 'с'=>'s', 'Ŝ'=>'s', 'š'=>'s', 'ś'=>'s', 'ס'=>'s', 'ş'=>'s', 'С'=>'s', 'ŝ'=>'s', 'Щ'=>'sch', 'щ'=>'sch', 'ш'=>'sh', 'Ш'=>'sh', 'ß'=>'ss',
			'т'=>'t', 'ט'=>'t', 'ŧ'=>'t', 'ת'=>'t', 'ť'=>'t', 'ţ'=>'t', 'Ţ'=>'t', 'Т'=>'t', 'ț'=>'t', 'Ŧ'=>'t', 'Ť'=>'t', '™'=>'tm',
			'ū'=>'u', 'у'=>'u', 'Ũ'=>'u', 'ũ'=>'u', 'Ư'=>'u', 'ư'=>'u', 'Ū'=>'u', 'Ǔ'=>'u', 'ų'=>'u', 'Ų'=>'u', 'ŭ'=>'u', 'Ŭ'=>'u', 'Ů'=>'u', 'ů'=>'u', 'ű'=>'u', 'Ű'=>'u', 'Ǖ'=>'u', 'ǔ'=>'u', 'Ǜ'=>'u', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'У'=>'u', 'ǚ'=>'u', 'ǜ'=>'u', 'Ǚ'=>'u', 'Ǘ'=>'u', 'ǖ'=>'u', 'ǘ'=>'u', 'ü'=>'ue',
			'в'=>'v', 'ו'=>'v', 'В'=>'v',
			'ש'=>'w', 'ŵ'=>'w', 'Ŵ'=>'w',
			'ы'=>'y', 'ŷ'=>'y', 'ý'=>'y', 'ÿ'=>'y', 'Ÿ'=>'y', 'Ŷ'=>'y',
			'Ы'=>'y', 'ž'=>'z', 'З'=>'z', 'з'=>'z', 'ź'=>'z', 'ז'=>'z', 'ż'=>'z', 'ſ'=>'z', 'Ж'=>'zh', 'ж'=>'zh'
		);
		return strtr($string, $replace);
	}




/**
 * Reconstruye el Acl basado en los controladores actuales de la aplicación.
 *
 * @return void
 */

/* As mentioned before, there is no pre-built way to input all of our controllers and actions into the Acl. However, we all
 * hate doing repetitive things like typing in what could be hundreds of actions in a large application. We’ve whipped up
 * an automated set of functions to build the ACO table. These functions will look at every controller in your application.
 * It will add any non-private, non Controller methods to the Acl table, nicely nested underneath the owning controller.
 * You can add and run this in your AppController or any controller for that matter, just be sure to remove it before
 * putting your application into production.
 */
//  function build_acl() {
//         if (!Configure::read('debug')) {
//             return $this->_stop();
//         }
//         $log = array();
//
//         $aco =& $this->Acl->Aco;
//         $root = $aco->node('controllers');
//         if (!$root) {
//             $aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
//             $root = $aco->save();
//             $root['Aco']['id'] = $aco->id;
//             $log[] = 'Created Aco node for controllers';
//         } else {
//             $root = $root[0];
//         }
//
//         App::import('Core', 'File');
//         $Controllers = App::objects('controller');
//         $appIndex = array_search('App', $Controllers);
//         if ($appIndex !== false ) {
//             unset($Controllers[$appIndex]);
//         }
//         $baseMethods = get_class_methods('Controller');
//         $baseMethods[] = 'build_acl';
//
//         $Plugins = $this->_getPluginControllerNames();
//         $Controllers = array_merge($Controllers, $Plugins);
//
//         // look at each controller in app/controllers
//         foreach ($Controllers as $ctrlName) {
//             $methods = $this->_getClassMethods($this->_getPluginControllerPath($ctrlName));
//
//             // Do all Plugins First
//             if ($this->_isPlugin($ctrlName)){
//                 $pluginNode = $aco->node('controllers/'.$this->_getPluginName($ctrlName));
//                 if (!$pluginNode) {
//                     $aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginName($ctrlName)));
//                     $pluginNode = $aco->save();
//                     $pluginNode['Aco']['id'] = $aco->id;
//                     $log[] = 'Created Aco node for ' . $this->_getPluginName($ctrlName) . ' Plugin';
//                 }
//             }
//             // find / make controller node
//             $controllerNode = $aco->node('controllers/'.$ctrlName);
//             if (!$controllerNode) {
//                 if ($this->_isPlugin($ctrlName)){
//                     $pluginNode = $aco->node('controllers/' . $this->_getPluginName($ctrlName));
//                     $aco->create(array('parent_id' => $pluginNode['0']['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginControllerName($ctrlName)));
//                     $controllerNode = $aco->save();
//                     $controllerNode['Aco']['id'] = $aco->id;
//                     $log[] = 'Created Aco node for ' . $this->_getPluginControllerName($ctrlName) . ' ' . $this->_getPluginName($ctrlName) . ' Plugin Controller';
//                 } else {
//                     $aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $ctrlName));
//                     $controllerNode = $aco->save();
//                     $controllerNode['Aco']['id'] = $aco->id;
//                     $log[] = 'Created Aco node for ' . $ctrlName;
//                 }
//             } else {
//                 $controllerNode = $controllerNode[0];
//             }
//
//             //clean the methods. to remove those in Controller and private actions.
//             foreach ($methods as $k => $method) {
//                 if (strpos($method, '_', 0) === 0) {
//                     unset($methods[$k]);
//                     continue;
//                 }
//                 if (in_array($method, $baseMethods)) {
//                     unset($methods[$k]);
//                     continue;
//                 }
//                 $methodNode = $aco->node('controllers/'.$ctrlName.'/'.$method);
//                 if (!$methodNode) {
//                     $aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $method));
//                     $methodNode = $aco->save();
//                     $log[] = 'Created Aco node for '. $method;
//                 }
//             }
//         }
//         if(count($log)>0) {
//             debug($log);
//         }
//     }
//
//     function _getClassMethods($ctrlName = null) {
//         App::import('Controller', $ctrlName);
//         if (strlen(strstr($ctrlName, '.')) > 0) {
//             // plugin's controller
//             $num = strpos($ctrlName, '.');
//             $ctrlName = substr($ctrlName, $num+1);
//         }
//         $ctrlclass = $ctrlName . 'Controller';
//         $methods = get_class_methods($ctrlclass);
//
//         // Add scaffold defaults if scaffolds are being used
//         $properties = get_class_vars($ctrlclass);
//         if (array_key_exists('scaffold',$properties)) {
//             if($properties['scaffold'] == 'admin') {
//                 $methods = array_merge($methods, array('admin_add', 'admin_edit', 'admin_index', 'admin_view', 'admin_delete'));
//             } else {
//                 $methods = array_merge($methods, array('add', 'edit', 'index', 'view', 'delete'));
//             }
//         }
//         return $methods;
//     }
//
//     function _isPlugin($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) > 1) {
//             return true;
//         } else {
//             return false;
//         }
//     }
//
//     function _getPluginControllerPath($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) == 2) {
//             return $arr[0] . '.' . $arr[1];
//         } else {
//             return $arr[0];
//         }
//     }
//
//     function _getPluginName($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) == 2) {
//             return $arr[0];
//         } else {
//             return false;
//         }
//     }
//
//     function _getPluginControllerName($ctrlName = null) {
//         $arr = String::tokenize($ctrlName, '/');
//         if (count($arr) == 2) {
//             return $arr[1];
//         } else {
//             return false;
//         }
//     }

/**
 * Get the names of the plugin controllers ...
 *
 * This function will get an array of the plugin controller names, and
 * also makes sure the controllers are available for us to get the
 * method names by doing an App::import for each plugin controller.
 *
 * @return array of plugin names.
 *
 */
//     function _getPluginControllerNames() {
//         App::import('Core', 'File', 'Folder');
//         $paths = Configure::getInstance();
//         $folder =& new Folder();
//         $folder->cd(APP . 'plugins');
//
//         // Get the list of plugins
//         $Plugins = $folder->read();
//         $Plugins = $Plugins[0];
//         $arr = array();
//
//         // Loop through the plugins
//         foreach($Plugins as $pluginName) {
//             // Change directory to the plugin
//             $didCD = $folder->cd(APP . 'plugins'. DS . $pluginName . DS . 'controllers');
//             // Get a list of the files that have a file name that ends
//             // with controller.php
//             $files = $folder->findRecursive('.*_controller\.php');
//
//             // Loop through the controllers we found in the plugins directory
//             foreach($files as $fileName) {
//                 // Get the base file name
//                 $file = basename($fileName);
//
//                 // Get the controller name
//                 $file = Inflector::camelize(substr($file, 0, strlen($file)-strlen('_controller.php')));
//                 if (!preg_match('/^'. Inflector::humanize($pluginName). 'App/', $file)) {
//                     if (!App::import('Controller', $pluginName.'.'.$file)) {
//                         debug('Error importing '.$file.' for plugin '.$pluginName);
//                     } else {
//                         /// Now prepend the Plugin name ...
//                         // This is required to allow us to fetch the method names.
//                         $arr[] = Inflector::humanize($pluginName) . "/" . $file;
//                     }
//                 }
//             }
//         }
//         return $arr;
//     }


}
