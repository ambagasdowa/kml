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
class ProjectionsPeriodsController extends AppController {

	var $name = 'ProjectionsPeriods';


	function index() {
		$this->ProjectionsPeriod->recursive = 0;
		$this->set('projectionsPeriods', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections period', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsPeriod', $this->ProjectionsPeriod->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
		
            debug($this->data);

		
			$this->ProjectionsPeriod->create();
			if ($this->ProjectionsPeriod->save($this->data)) {
			
//                 exec sistemas.dbo.sp_xd3e_getFullCompanyOperations 
//                     '2016',	-- year or years (char) ex:'2016|2017' 
//                     '08',	-- month or months (char) ex: '01|02|03|04|05|06|07|08|09|10'
//                     3,		-- companies (int) id's ex: 1(tbk) or 2(amt) or 3(tei) or 0 (zero means all companies)
//                     '0',	-- bussiness unit (char) like 1 for orizaba or cuatitlan and 3 for ramos whats is true for tbk but not case of teisa or atm 0 = zero mean all bases
//                     3,		-- mode 0 = queryAccepted ;1 = insert Accepted in period ; 3 = queryCancel
//                     1,		-- user_id when mode is set to 0 this can be empty ''
//                     2      -- projections_closed_period_controls_id when mode is set to 0 this can be empty ''

                    $ProjectionsPeriod = $this->ProjectionsPeriod->getLastInsertId();
                    $date = explode('-',$this->data['ProjectionsPeriod']['projections_closed_periods']);
                    $procedure_data['year'] = $date['0'];
                    $procedure_data['month'] = $date['1'];
                    $procedure_data['companies'] = $this->data['ProjectionsPeriod']['projections_corporations_id'];
                    $procedure_data['bunit'] = '0';
                    $procedure_data['mode'] = 3;
                    $procedure_data['user_id'] = $this->Auth->user('id');
                    $procedure_data['period_id'] = $ProjectionsPeriod;

			
                if($this->ProjectionsPeriod->query("exec sistemas.dbo.sp_xd3e_getFullCompanyOperations '{$procedure_data['year']}', '{$procedure_data['month']}', '{$procedure_data['companies']}','{$procedure_data['bunit']}','{$procedure_data['mode']}','{$procedure_data['user_id']}','{$procedure_data['period_id']}' ;")){

                    $this->Session->setFlash(__('The projections closed period control has been saved', true));
                    $this->redirect(array('action' => 'index'));

                } else {
                    $this->Session->setFlash(__('procedure insert period fail . Please, try again.', true));
                }


				$this->Session->setFlash(__('The projections period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections period could not be saved. Please, try again.', true));
			}
		}
		$projectionsCorporations = $this->ProjectionsPeriod->ProjectionsCorporations->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections period', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections period could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsPeriod->read(null, $id);
		}
		$projectionsCorporations = $this->ProjectionsPeriod->ProjectionsCorporation->find('list');
		$this->set(compact('projectionsCorporations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections period', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsPeriod->delete($id)) {
			$this->Session->setFlash(__('Projections period deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections period was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
