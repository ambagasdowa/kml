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
        /** WARNING XD-> getout from hir どうもありがとうミスターロボット nah! */
//         e(number_format($AreaCorp['TotalMes'], 2, '.', ','));
//         e(number_format(round($AreaCorp['TotalMes'])));
//            number_format(money_format('%i',$num), 2, '.', ','));
?>

<?php
class ProjectionsViewIndicatorsPeriodsController extends AppController {

	var $name = 'ProjectionsViewIndicatorsPeriods';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');


	// NOTE RESTful response

	function rest() {
        // this is for external conecctions so in this is not needed

	}


	function index($json = null) {

        $this->ProjectionsViewIndicatorsPeriod->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
// 		$this->paginate = array (
// // 		'conditions' => $conditionsCasetasViewResume,
//         'limit' => 100
//         );
// 		$this->ProjectionsViewIndicatorsPeriod->recursive = 0;
// 		$this->set('projectionsViewIndicatorsPeriods', $this->paginate());

        $cyear = '2017';

        $this->LoadModel('ProjectionsViewBussinessUnit');                           // Add units
        $this->LoadModel('ProjectionsViewFraction');                                // Add fractions
        $this->LoadModel('ProjectionsConfig');                                      // module Configs
        $this->LoadModel('ProjectionsViewIndicatorsPeriodsFullFleet');              // module Full

        $bsu_conditions = null;
        $bsu_label_conditions = null;
        $fraction_conditions = null;
        // MORE conditions ??
        $conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.cyear'] = $cyear;

        // NOTE begin the patches -- remove this when done

        $auth_users = array(
                                // jesus baizabal
                                // '5'=>array('areas'=>array('GUADALAJARA','LA PAZ'),'bsu'=>array('GUADALAJARA','LA PAZ'),'bsu_label'=>array('GUADALAJARA','LA PAZ'),'fraction'=>array('GRANEL'),'type'=>array('toneladas','viajes')),
                                // jorge.floresb
                                '96'=>array('areas'=>array('GUADALAJARA','LA PAZ'),'bsu'=>array('GUADALAJARA','LA PAZ'),'bsu_label'=>array('GUADALAJARA','LA PAZ'),'fraction'=>array('GRANEL'))
                           );

        if (array_key_exists($_SESSION['Auth']['User']['id'],$auth_users) === true) { // set areas

            if (array_key_exists('areas',$auth_users[$_SESSION['Auth']['User']['id']])) { // set filter for graphics
                $conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.area'] = $auth_users[$_SESSION['Auth']['User']['id']]['areas'];
            }
            if (array_key_exists('bsu',$auth_users[$_SESSION['Auth']['User']['id']])) { // set logical areas filter
                $bsu_conditions['ProjectionsViewBussinessUnit.name'] = $auth_users[$_SESSION['Auth']['User']['id']]['bsu'];
            }
            if (array_key_exists('bsu_label',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI areas filter
                $bsu_label_conditions['ProjectionsViewBussinessUnit.label'] = $auth_users[$_SESSION['Auth']['User']['id']]['bsu_label'];
            }
            if (array_key_exists('fraction',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI fraction filter
                $fraction_conditions['ProjectionsViewFraction.desc_producto'] = $auth_users[$_SESSION['Auth']['User']['id']]['fraction'];
                $conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.fraccion'] = $auth_users[$_SESSION['Auth']['User']['id']]['fraction'];
            }
            if (array_key_exists('type',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI type-tabbed filter
                $conditions_mod_index['ProjectionsConfig.module_data_definition'] = $auth_users[$_SESSION['Auth']['User']['id']]['type'];
            }
//             .... add more filters
        }

      $bsu = $this->ProjectionsViewBussinessUnit->find('list',array('conditions'=>$bsu_conditions));
		  $bsu_label = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','label'),'conditions'=>$bsu_label_conditions));
		  $fraction = $this->ProjectionsViewFraction->find('list',array('fields'=>array('projections_corporations_id','id_fraccion','desc_producto'),'conditions'=>$fraction_conditions));

        $chart_index = $this->ProjectionsViewIndicatorsPeriodsFullFleet->find('all', array('conditions'=>$conditions_chart_index) );

        $conditions_mod_index['ProjectionsConfig.projections_type_configs_id'] = 3 ;
        $mod_index = $this->ProjectionsConfig->find('list',array('fields'=>array('module_field_translation','module_data_definition'),'conditions'=>$conditions_mod_index));
        $months = months_es();

        $ui_bsu_index = key($bsu);
        $ui_mod_index = key($mod_index);


        foreach ($chart_index as $name_idx => $findForChart) {

            foreach ($mod_index as $module_table => $module_type) {
                $chart[$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['cyear']][$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['area']][$module_type][$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['fraccion']][$findForChart['ProjectionsViewIndicatorsPeriodsFullFleet']['mes']] = $findForChart['ProjectionsViewIndicatorsPeriodsFullFleet'][$module_table];
            }

        }

        $rest_chart_index = json_encode($chart);

        $json_months = json_encode($months,JSON_PRETTY_PRINT);

		if ($json === true) {

            //4. Return as a json array
            Configure::write('debug', 0);
            $this->autoRender = false;
            $this->autoLayout = false;
    // 		$this->layout='empty';
            $this->header('Content-Type: application/json');
            echo json_encode($calendar);

		} else {
            Configure::write('debug', 0);
            $this->set(compact('bsu','bsu_label','fraction','chart_index','mod_index','cyear','months','rest_chart_index','chart','json_months','ui_bsu_index','ui_mod_index'));
		}


	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view indicators period', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewIndicatorsPeriod', $this->ProjectionsViewIndicatorsPeriod->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewIndicatorsPeriod->create();
			if ($this->ProjectionsViewIndicatorsPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators period could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view indicators period', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewIndicatorsPeriod->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators period has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators period could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewIndicatorsPeriod->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view indicators period', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewIndicatorsPeriod->delete($id)) {
			$this->Session->setFlash(__('Projections view indicators period deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view indicators period was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
