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
class ModuleUserCredentialsMainsController extends AppController {

	var $name = 'ModuleUserCredentialsMains';


	function index() {


		//
		// $paranoid = 'paranoid';
		// debug($paranoid);
		// $data =
		// 				array (
		// 								 'cyear'=>date('Y')
		// 								,'Mes'=>date('M')
		// 								,'account'=>'09990909'
		// 								,'paranoid'=>base64_encode($paranoid)
		// 								,'type'=>'OF'
		// 							);
		//
		// debug($data);
		// $Hash = GeraHash(30);
		// debug($Hash);
		// $password = '@'.substr($Hash, 3, 12).'#';
		// debug($password);
		// $decrypt = base64_encode(serialize($data));
		// debug($decrypt);
		// $salt = Configure::read('Security.salt');
		// debug($salt);
		// $encrypt_encode = base64_encode(dEncrypt($decrypt,$password, $salt, 'encrypt'));
		// debug($encrypt_encode);
		// $app = 'filemanager';
		//
		// $path = "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}/{$app}/filemanager.php?{$Hash}={$encrypt_encode}";
		// debug($path);

// =========================================================//


//
// 	// 	var_dump(count($_GET)); //if more than one
// 		$decrypted_encrypt = base64_decode($encrypt_encode);
// 		debug($decrypted_encrypt);
// 		$password = '@'.substr($Hash, 3, 12).'#';
// 		debug($password);
//
// 		// $salt='e6cf180c41435ac086adb154d8be4f9d4e9a4f9e';
// 		$key_of = dEncrypt($decrypted_encrypt, $password, Configure::read('Security.salt') , 'decrypt');
// 		debug($key_of);
//
// 		// extract and unencrypt data
// 			$crypt = $key_of;
// 			$unencrypt = unserialize(base64_decode($crypt));
// 			debug($unencrypt);
//
// 			debug(base64_decode($unencrypt['paranoid']));
// 				// session_id($unencrypt['3']);
//
// exit();


		$this->ModuleUserCredentialsMain->recursive = 0;
		$this->set('moduleUserCredentialsMains', $this->paginate());

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid module user credentials main', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('moduleUserCredentialsMain', $this->ModuleUserCredentialsMain->read(null, $id));
	}


	function get () {
			$modelname = $this->params['url']['data']['model'];
			$this->loadModel($modelname);
			$tbls = $this->$modelname->schema();

			$columns = array_keys($tbls);
			// NOTE and the table is ...
			// if check the database source
			$table_name = $this->$modelname->table;
			$this->set(compact('modelname','columns','table_name'));

			Configure::write('debug', 0);
			$this->autoLayout = false;
	// 		$this->layout='empty';
	}


	function add() {
		// current controller
		// debug($this->params['controller']);

		if (!empty($this->data)) {
			// debug($this->data);
			$_database = $this->data;
// code
			$modelname = $this->data['ModuleUserCredentialsMain']['model_name'];
			$this->loadModel($modelname);
			$tbls = $this->$modelname->schema();
			$columns = array_keys($tbls);
			$column_name = $columns[$this->data['ModuleUserCredentialsMain']['database_column']];

			unset($_database['ModuleUserCredentialsMain']['model_id']);
			$_database['ModuleUserCredentialsMain']['database_column'] = $column_name;
			$_database['ModuleUserCredentialsMain']['module_ui_name'] = $modelname.'s';

			// debug($_database);
			// exit();
			$this->ModuleUserCredentialsMain->create();
			if ($this->ModuleUserCredentialsMain->save($_database)) {
				$this->Session->setFlash(__('The module user credentials main has been saved', true));
				$this->redirect(array('action' => 'index/page:0/sort:id/direction:asc'));
			} else {
				$this->Session->setFlash(__('The module user credentials main could not be saved. Please, try again.', true));
			}
		} else { // if init this view

					// $this->LoadModel('User');
					// Get all Models in Cakephp
					$allModelNames = Configure::listObjects('model');
					// pr($allModelNames);

					// // // Get all Databases in mssql_sistemas connection
					// $db =& ConnectionManager::getDataSource('mssql_sistemas');
					// $databses = $db->listSources();

// NOTE add this as behavior
					// $modelname = 'ModuleUserCredentialsMain';
					// $this->loadModel($modelname);
					// debug($db->describe($this->$modelname)); //working
					// pr($this->$modelname->schema());

					// set variables to the view
					$this->set(compact('allModelNames'));
		}

	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid module user credentials main', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ModuleUserCredentialsMain->save($this->data)) {
				$this->Session->setFlash(__('The module user credentials main has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The module user credentials main could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ModuleUserCredentialsMain->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for module user credentials main', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ModuleUserCredentialsMain->delete($id)) {
			$this->Session->setFlash(__('Module user credentials main deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Module user credentials main was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
