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
		* @link          http://baizabal.xyz/resume
		* @mail	     baizabal.jesus@gmail.com
		* @package       cake
		* @subpackage    cake.cake.console.libs.templates.views
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
?>

<?php
class ProjectionsViewIndicatorsDispatchPeriodsFullOpsController extends AppController {

	var $name = 'ProjectionsViewIndicatorsDispatchPeriodsFullOps';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');

	function index() {
// Configure::write('debug', 2);
			// debug($this->params);
        // $this->ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');

// 		$this->ProjectionsViewIndicatorsDispatchPeriodsFullOp->recursive = 0;
// 		$this->set('projectionsViewIndicatorsDispatchPeriodsFullOps', $this->paginate());

       $cyear = '2019';

        $this->LoadModel('ProjectionsViewBussinessUnit');   // Add units
        $this->LoadModel('ProjectionsViewFraction');        // Add fractions
        $this->LoadModel('ProjectionsConfig');             // module Configs
        // $this->LoadModel('ProjectionsViewIndicatorsDispatchPeriodsFullOp');  // module Full
        $this->LoadModel('ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp');  // module Full
				$this->ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');

        $bsu_conditions = null;
        $bsu_label_conditions = null;
        $fraction_conditions = null;
        // MORE conditions ??
        $conditions_chart_index['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp.cyear'] = $cyear;

        // NOTE begin the patches -- remove this when done
				$this->LoadModel('ModuleUserCredentialsControl');
        $auth_user = $this->ModuleUserCredentialsControl->getCredentials('all',array('user_id'=>$this->Auth->User('id')));

      if ($auth_user) {
        if (array_key_exists('bsu',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
            $bsu_conditions = $auth_user['ModuleUserCredentialsControl']['bsu'];
            $conditions_chart_index['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp.area'] = $bsu_conditions['ProjectionsViewBussinessUnit.name'];
        }
        if (array_key_exists('bsu_label',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
            $bsu_label_conditions = $auth_user['ModuleUserCredentialsControl']['bsu_label'];
        }
        if (array_key_exists('fraction',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
            $fraction_conditions = $auth_user['ModuleUserCredentialsControl']['fraction'];
            $conditions_chart_index['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp.fraccion'] = $fraction_conditions['ProjectionsViewFraction.desc_producto'];
        }
        if (array_key_exists('areas',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
            $conditions_chart_index = $auth_user['ModuleUserCredentialsControl']['areas'];
        }
        if (array_key_exists('type',$auth_user['ModuleUserCredentialsControl'])) { // set UI type-tabbed filter
            $conditions_mod_index = $auth_user['ModuleUserCredentialsControl']['type'];
        }
      }

    $bsu = $this->ProjectionsViewBussinessUnit->find('list',array('conditions'=>$bsu_conditions));
		$bsu_label = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','label'),'conditions'=>$bsu_label_conditions));
		$fraction = $this->ProjectionsViewFraction->find('list',array('fields'=>array('projections_corporations_id','id_fraccion','desc_producto'),'conditions'=>$fraction_conditions));

		$fraction['VACIO'] = array(); // NOTE add the ghost fraction Empty's

// 		debug($fraction);

        $chart_index = $this->ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp->find('all', array('conditions'=>$conditions_chart_index) );

				// debug($chart_index);

        $conditions_mod_index['ProjectionsConfig.projections_type_configs_id'] = 7 ;
        $mod_index = $this->ProjectionsConfig->find('list',array('fields'=>array('module_field_translation','module_data_definition'),'conditions'=>$conditions_mod_index));
//         debug($mod_index);

        $months = months_es();

        $ui_bsu_index = key($bsu);
        $ui_mod_index = key($mod_index);


        foreach ($chart_index as $name_idx => $findForChart) {

            foreach ($mod_index as $module_table => $module_type) {
//                 debug($module_table);
                $chart[$findForChart['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp']['cyear']][$findForChart['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp']['area']][$module_type][$findForChart['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp']['fraccion']][$findForChart['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp']['mes']] = $findForChart['ProjectionsViewIndicatorsDispatchPeriodsFullSrcOp'][$module_table];
            }

        }
				// debug($chart);
        $rest_chart_index = json_encode($chart);

        $json_months = json_encode($months,JSON_PRETTY_PRINT);
				// debug($rest_chart_index);

// 		if ($json === true) {
//
//             //4. Return as a json array
//             Configure::write('debug', 0);
//             $this->autoRender = false;
//             $this->autoLayout = false;
//     // 		$this->layout='empty';
//             $this->header('Content-Type: application/json');
//             echo json_encode($calendar);
//
// 		} else {
            Configure::write('debug', 0);
            $this->set(compact('bsu','bsu_label','fraction','chart_index','mod_index','cyear','months','rest_chart_index','chart','json_months','ui_bsu_index','ui_mod_index'));
// 		}

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view indicators dispatch periods full op', true));
			$this->redirect(array('action' => 'index'));
		}
		// $this->set('projectionsViewIndicatorsDispatchPeriodsFullOp', $this->ProjectionsViewIndicatorsDispatchPeriodsFullOp->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewIndicatorsDispatchPeriodsFullOp->create();
			if ($this->ProjectionsViewIndicatorsDispatchPeriodsFullOp->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators dispatch periods full op has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators dispatch periods full op could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view indicators dispatch periods full op', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewIndicatorsDispatchPeriodsFullOp->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators dispatch periods full op has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators dispatch periods full op could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewIndicatorsDispatchPeriodsFullOp->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view indicators dispatch periods full op', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewIndicatorsDispatchPeriodsFullOp->delete($id)) {
			$this->Session->setFlash(__('Projections view indicators dispatch periods full op deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view indicators dispatch periods full op was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
