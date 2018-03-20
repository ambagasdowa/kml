<?php
		/**
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
class CasetasViewResumesController extends AppController {

	var $name = 'CasetasViewResumes';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');
	var $presetVars = array( array('field' => 'name', 'type' => 'value') );


	function index() {
		// Configure::write('debug',2);
		$this->Prg->commonProcess();
		$this->CasetasViewResume->recursive = 0;

		$this->LoadModel('Company');
		$conditonsCnpy['Company.nom_id'] = $_SESSION['Auth']['User']['company_id'];
		$cpny_id = $this->Company->find('list',array('conditions'=>$conditonsCnpy));
		// debug(key($cpny_id));

		$this->LoadModel('BusinessUnit');
		$this->LoadModel('CasetasCorporation');
		$this->LoadModel('CasetasUnit');
		$this->LoadModel('CasetasViewResume');
		$this->LoadModel('CasetasControlsUser');

		if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
// 			$conditionsUnit = null;
			$conditionsUnits['BusinessUnit.name NOT'] = 'TBKCUL';
			$conditionsCasetasViewResume = $this->CasetasViewResume->parseCriteria($this->passedArgs);
		}else {
			$conditionsUnits['BusinessUnit.company_id'] = key($cpny_id);
			debug(key($cpny_id));
			$conditionsUnits['BusinessUnit.name NOT'] = 'TBKCUL';
			$conditionsUnitsGet['CasetasUnit.casetas_units_name like'] = current($this->BusinessUnit->find('list',array('conditions'=>$conditionsUnits)));

			debug(current($this->BusinessUnit->find('list',array('conditions'=>$conditionsUnits))));

			debug($this->BusinessUnit->find('all',array('fields'=>array('id','name'))));

			$id_corporations = $this->CasetasUnit->find('list',array('conditions'=>$conditionsUnitsGet));

			debug($this->CasetasUnit->find('list'));

			$condUc['CasetasControlsUser.user_id'] = $this->Auth->User('id');
			debug($this->CasetasControlsUser->find('all',array('conditions'=>$condUc)));

			debug($id_corporations);


			$conditions_control['CasetasControlsUser.user_id'] = $_SESSION['Auth']['User']['id'];
			$bsu_control = current($this->CasetasControlsUser->find('list',array('conditions'=>$conditions_control,'fields'=>array('user_id','casetas_units_id'))));

			$conditionsUnitsControls['CasetasUnit.id'] = $bsu_control;

			$unitsControls = current($this->CasetasUnit->find('list',array('conditions'=>$conditionsUnitsControls)));

			// debug($unitsControls);


// 			$conditionsCasetasViewResume['CasetasViewResume.casetas_units_id'] = key($id_corporations);
			$conditionsCasetasViewResume = array_merge($this->CasetasViewResume->parseCriteria($this->passedArgs),array('CasetasViewResume._area'=>$unitsControls));
		}

		$this->paginate = array(
			'conditions' => $conditionsCasetasViewResume,
			'limit' => 12
		);
		$this->set('casetasViewResumes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid casetas view resume', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('casetasViewResume', $this->CasetasViewResume->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->CasetasViewResume->create();
			if ($this->CasetasViewResume->save($this->data)) {
				$this->Session->setFlash(__('The casetas view resume has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view resume could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid casetas view resume', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {

            $this->LoadModel('CasetasControlsFile');


			if ($this->CasetasControlsFile->updateAll( array('CasetasControlsFile._status'=>$this->data['CasetasViewResume']['_status'],'CasetasControlsFile.casetas_parents_id'=>$this->data['CasetasViewResume']['casetas_parents_id']),array('CasetasControlsFile.id'=>$id))) {
				$this->Session->setFlash(__('The casetas view resume has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The casetas view resume could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->CasetasViewResume->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for casetas view resume', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->CasetasViewResume->delete($id)) {
			$this->Session->setFlash(__('Casetas view resume deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Casetas view resume was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
