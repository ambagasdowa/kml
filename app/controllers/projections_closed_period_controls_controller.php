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
class ProjectionsClosedPeriodControlsController extends AppController {

	var $name = 'ProjectionsClosedPeriodControls';


	function users(){
		$this->LoadModel('User');
		$this->LoadModel('ProjectionsControlsUser');
		$conditionsControlUser['User.id'] = $this->ProjectionsControlsUser->find('list',array('fields'=>array('id','user_id')));
		$users = $this->User->find('list',array('fields'=>array('id','full_name'),'conditions'=>$conditionsControlUser));
		$projectionsControlsUsers = $this->ProjectionsControlsUser->find('list',array('fields'=>array('id','user_id')));
//         debug(array_combine($projectionsControlsUsers,$users));
        foreach($projectionsControlsUsers as $id => $user_id){
            $projectionsControlsUsers[$id] = $users[$user_id];
        }
        return $projectionsControlsUsers;
	}

	function index() {
		$this->ProjectionsClosedPeriodControl->recursive = 0;
		$this->set('projectionsClosedPeriodControls', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections closed period control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsClosedPeriodControl', $this->ProjectionsClosedPeriodControl->read(null, $id));
	}

	function add() {

		if (!empty($this->data)) {

		/** TODO * if find a major period then reject */

            $this->LoadModel('ProjectionsViewBussinessUnit');
            $conditionsUnits['ProjectionsViewBussinessUnit.id'] = $this->data['ProjectionsClosedPeriodControl']['projections_view_bussiness_units_id'];
            $units = current($this->ProjectionsViewBussinessUnit->find('all',array('conditions'=>$conditionsUnits)));
            $this->data['ProjectionsClosedPeriodControl']['projections_corporations_id'] = $units['ProjectionsViewBussinessUnit']['projections_corporations_id'];
            $this->data['ProjectionsClosedPeriodControl']['id_area'] = $units['ProjectionsViewBussinessUnit']['id_area'];
            $this->data['ProjectionsClosedPeriodControl']['user_id'] = $this->Auth->user('id');

			$this->ProjectionsClosedPeriodControl->create();
			if ($this->ProjectionsClosedPeriodControl->save($this->data)) {

                $projectionsClosedPeriodControlId = $this->ProjectionsClosedPeriodControl->getLastInsertId();
                $date = explode('-',$this->data['ProjectionsClosedPeriodControl']['projections_closed_periods']);
                $procedure_data['year'] = $date['0'];
                $procedure_data['month'] = $date['1'];
                $procedure_data['companies'] = $this->data['ProjectionsClosedPeriodControl']['projections_corporations_id'];
                $procedure_data['bunit'] = $this->data['ProjectionsClosedPeriodControl']['id_area'];
//                 $procedure_data['doctype'] = 1;
                $procedure_data['mode'] = 1;
                $procedure_data['user_id'] = $this->Auth->user('id');
                $procedure_data['period_id'] = $projectionsClosedPeriodControlId;

//                 debug($procedure_data);
//                 going to close a period
//                     exec sistemas.dbo.sp_xd3e_getFullCompanyOperations
// 										'2016',	-- year or years (char) ex:'2016|2017'
// 										'09',	-- month or months (char) ex: '01|02|03|04|05|06|07|08|09|10'
// 										 0,		-- companies (int) id's ex: 1(tbk) or 2(amt) or 3(tei) or 0 (zero means all companies)
// 										'0',	-- bussiness unit (char) like 1 for orizaba or cuatitlan and 3 for ramos whats is true for tbk but not case of teisa or atm
// 										 2,		-- mode 0 = query ;1 = insert period
// 										 1,		-- user_id when mode is set to 0 this can be empty ''
//										 1      -- projections_closed_period_controls_id when mode is set to 0 this can be empty ''
                if($this->ProjectionsClosedPeriodControl->query("exec sistemas.dbo.sp_xd3e_getFullCompanyOperations '{$procedure_data['year']}', '{$procedure_data['month']}', '{$procedure_data['companies']}','{$procedure_data['bunit']}','{$procedure_data['mode']}','{$procedure_data['user_id']}','{$procedure_data['period_id']}' ;")){

                    if($this->ProjectionsClosedPeriodControl->query("exec sistemas.dbo.sp_xd3e_getFullCompanyOperations '{$procedure_data['year']}', '{$procedure_data['month']}', '{$procedure_data['companies']}','{$procedure_data['bunit']}','3','{$procedure_data['user_id']}','{$procedure_data['period_id']}' ;")){

                        $this->Session->setFlash(__('The projections closed period control has been saved', true));
                        $this->redirect(array('action' => 'index'));
                    }

                } else {
                    $this->Session->setFlash(__('procedure insert period fail . Please, try again.', true));
                }
// 				$this->Session->setFlash(__('The projections closed period control has been saved', true));
// 				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections closed period control could not be saved. Please, try again.', true));
			}
		}
		$users = $this->ProjectionsClosedPeriodControl->User->find('list');
		$projectionsViewBussinessUnits = $this->ProjectionsClosedPeriodControl->ProjectionsViewBussinessUnits->find('list');
		$this->set(compact('users', 'projectionsViewBussinessUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections closed period control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsClosedPeriodControl->save($this->data)) {
				$this->Session->setFlash(__('The projections closed period control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections closed period control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsClosedPeriodControl->read(null, $id);
		}
		$users = $this->ProjectionsClosedPeriodControl->User->find('list');
		$projectionsViewBussinessUnits = $this->ProjectionsClosedPeriodControl->ProjectionsViewBussinessUnit->find('list');
		$this->set(compact('users', 'projectionsViewBussinessUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections closed period control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsClosedPeriodControl->delete($id)) {
			$this->Session->setFlash(__('Projections closed period control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections closed period control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
