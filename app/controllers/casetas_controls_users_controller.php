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
class CasetasControlsUsersController extends AppController {

	var $name = 'CasetasControlsUsers';
	var $helpers = array('Html','Form','Ajax','Js');

	function index() {
		
		$this->LoadModel('BusinessUnit');
		$bsu = $this->BusinessUnit->find('list');
		
// 		debug($bsu);
		$this->set(compact('bsu'));
		$this->CasetasControlsUser->recursive = 0;
		$this->set('casetasControlsUsers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasControlsUser', $this->CasetasControlsUser->read(null, $id));
	}

	
	function selectBsu () {

		if (isset($this->data['CasetasControlsUser']['casetas_corporations_id'])) {
			$company_id = $this->data['CasetasControlsUser']['casetas_corporations_id'];
			$this->LoadModel('BusinessUnit');
			$conditionsBsuCompany['BusinessUnit.company_id'] = $company_id;
			$conditionsBsuCompany['BusinessUnit.name NOT'] = 'TBKCUL';
			$bsu = $this->BusinessUnit->find('list',array('fields'=>array('id','name'),'conditions'=>$conditionsBsuCompany));
			$this->set(compact('bsu'));
			
		}

		$this->autoLayout = false;
	}
	
	function add() {

// 		debug($this->data);
// 		exit();
// 		debug($_SESSION['Auth']['User']);
		$this->LoadModel('Company');
		$conditonsCnpy['Company.nom_id'] = $_SESSION['Auth']['User']['company_id'];
		$cpny_id = $this->Company->find('list',array('conditions'=>$conditonsCnpy));
// 		debug(key($cpny_id));

		$this->LoadModel('CasetasCorporations');
		$corporations = $this->CasetasCorporations->find('list');
		$this->set(compact('corporations'));

// 		$this->selectBsu('1');
		

		if (!empty($this->data)) {
			$this->CasetasControlsUser->create();
			if ($this->CasetasControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls user could not be saved. Please, try again.', true));
			}
		}
		$users = $this->CasetasControlsUser->User->find('list',array('fields'=>array('id','username')));
		$casetasCorporations = $this->CasetasControlsUser->CasetasCorporations->find('list');
		$casetasUnits = $this->CasetasControlsUser->CasetasUnits->find('list');
		$this->set(compact('users', 'casetasCorporations', 'casetasUnits'));
	}

	function edit($id = null) {
		
// 		debug($this->data);
// 		debug($id);
		
		$this->LoadModel('CasetasCorporations');
		$corporations = $this->CasetasCorporations->find('list');
		$this->set(compact('corporations'));
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas controls user', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->CasetasControlsUser->save($this->data)) {
				$this->Session->setFlash(__('The casetas controls user has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas controls user could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasControlsUser->read(null, $id);
		}
		$users = $this->CasetasControlsUser->User->find('list');
		$casetasCorporations = $this->CasetasControlsUser->CasetasCorporations->find('list');
		$casetasUnits = $this->CasetasControlsUser->CasetasUnits->find('list');

		$this->set(compact('users', 'casetasCorporations', 'casetasUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas controls user', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasControlsUser->delete($id)) {
			$this->Session->setFlash(__('Casetas controls user deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas controls user was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
