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
class ProjectionsViewIndicatorsPeriodsFleetsController extends AppController {

	var $name = 'ProjectionsViewIndicatorsPeriodsFleets';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');

	function index($year = null , $month = null) {
        
//         var_dump($this->params['named']['year']);
	
        if (!empty($this->params['named']['year']) && !empty($this->params['named']['month'])) {
			$projections_options = $this->params['named'];
            $cyear    = $projections_options['year'];
            $cmonth   = $projections_options['month'];
            $fraction   = $projections_options['fraction'];
		} else {
		    $cyear    = date('Y');
            $cmonth   = date('m');
            $fraction = 'GRANEL';
		}

        $this->ProjectionsViewIndicatorsPeriodsFleet->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
        
		// ALERT get tw0 years
		$work = GetWorkingDays($MexicanoHolidays=GetNationalMexicanHolidays(array('2016','2017')),$debug=false,$return_compact=true,$saturday_is_weekend=false);

		$newFetchDate = new DateTime($cyear.'-'.$cmonth.'-01');
		$newDate = $newFetchDate->format('Y-m-d');

		debug($newDate);

		$fullDetailsLabDays = $work[$cyear][$cmonth]['list'];

		$current_lab_days = null;
		$offset_days = null;
		$totalLabDaysInMonth = array_sum($fullDetailsLabDays);
		$totalFullDaysInMonth = count($fullDetailsLabDays);

		$start = new DateTime($cyear.'-'.$cmonth.'-01');
		$start->sub(new DateInterval('P1M'));
		$newDateSub = $start->format('Y-m-d');
        $off_month = explode('-',$newDateSub);
        debug($off_month);
		$backwardsMonthDays = $work[$off_month['0']][$off_month['1']]['list'];
		
		debug($newDateSub);

// 		$totalFullDaysInCurrentMonth = date('t');

		debug('totalLabDaysInMonth => '.$totalLabDaysInMonth);
		debug('totalFullDaysInMonth => '.$totalFullDaysInMonth);


		foreach ($fullDetailsLabDays as $date_key => $setDate) {
            if ($date_key <= date('Y-m-d')){
                $current_lab_days += $setDate;
            } else {
                $offset_days += $setDate;
            }
		}

		debug('labs_days => ' . $current_lab_days);

		debug('offset_days => ' . $offset_days);

		debug($backwardsMonthDays);

		debug($fullDetailsLabDays);

		
        $this->LoadModel('ProjectionsViewIndicatorsPeriodsFullFleet'); // Load the model full fleets 
        
        
		$conditionsProjectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet.cyear'] = $cyear;
		$conditionsProjectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet.mes'] = ucwords(months_es()[(int)$cmonth]);
		
		$conditionsProjectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet.fraccion'] = $fraction; // this can be dinamic
// 		$conditionsProjectionsViewIndicatorsPeriodsFleet['ProjectionsViewIndicatorsPeriodsFleet.fraccion'] = 'CAJA SECA'; // this can be dinamic
		
		
		debug($conditionsProjectionsViewIndicatorsPeriodsFleet);
		

		$this->paginate = array(
			'conditions' => $conditionsProjectionsViewIndicatorsPeriodsFleet,
			'limit' => 50,
			'order' => array('CasetasProjectionsViewIndicatorsPeriodsFleet.id' => 'desc')
		);

		$this->ProjectionsViewIndicatorsPeriodsFleet->recursive = 0;
		$this->set('projectionsViewIndicatorsPeriodsFleets', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid projections view indicators periods fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('projectionsViewIndicatorsPeriodsFleet', $this->ProjectionsViewIndicatorsPeriodsFleet->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProjectionsViewIndicatorsPeriodsFleet->create();
			if ($this->ProjectionsViewIndicatorsPeriodsFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods fleet could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid projections view indicators periods fleet', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProjectionsViewIndicatorsPeriodsFleet->save($this->data)) {
				$this->Session->setFlash(__('The projections view indicators periods fleet has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The projections view indicators periods fleet could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProjectionsViewIndicatorsPeriodsFleet->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for projections view indicators periods fleet', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProjectionsViewIndicatorsPeriodsFleet->delete($id)) {
			$this->Session->setFlash(__('Projections view indicators periods fleet deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Projections view indicators periods fleet was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
