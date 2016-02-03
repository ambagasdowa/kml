<?php
App::import('Sanitize');
class CalendarsController extends AppController {

	var $name = 'Calendars';
	var $helpers = array('Form','Javascript');

	function index() {
		$this->Calendar->recursive = 0;
		$this->set('calendars', $this->paginate());
	}

	
	function feed() {
		//1. Transform request parameters to MySQL datetime format.
		$date_init = new DateTime($this->params['url']['start']);
		$mysqlstart =  $date_init->format('Y-m-d H:i:s');
		
		$date_end = new DateTime($this->params['url']['end']);
		$mysqlend =  $date_end->format('Y-m-d H:i:s');
		//2. Get the events corresponding to the time range
		$conditions = array ('Calendar.start BETWEEN ? AND ?'=> array ($mysqlstart,$mysqlend));
		$events = $this->Calendar->find('all', array ('conditions' => $conditions));
		//3. Re-build of Create the json array
		foreach($events as $idx_cal => $CalendarContaint) {
			foreach($CalendarContaint['Calendar'] as $option_calendar => $data_calendar){
				if($option_calendar !== 'description' AND $option_calendar !== 'create' AND $option_calendar !== 'modified' AND $option_calendar !== 'status'){
					if(!empty($data_calendar)){
						$calendar[$idx_cal][$option_calendar] = $data_calendar;
					}
				}
			}
		}
		//4. Return as a json array
		Configure::write('debug', 0);
		$this->autoRender = false;
		$this->autoLayout = false;
// 		$this->layout='empty';
		$this->header('Content-Type: application/json');
		echo json_encode($calendar);
	}
	
	function negative($data = null) {
		if(is_numeric($data)){
			return (min(1, max(-1, $data)) === -1) ?  TRUE : FALSE ;
		} else {
			return null;
		}
	}
	
	function dropsize($id = null){
		if (!$id) {
			$this->Session->setFlash(__('Invalid calendar', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$data = current($this->params['pass']);
			$json_data = current(json_decode(base64_decode($data)));
			// convert to an array ?? is this necesary ?
			foreach($json_data as $name_json => $data_json){
				$json_array[$name_json] = $data_json;
			}

			/** NOTE <Already Done!!> TODO <must contruct something like this $_datetime => 'P7Y5M4DT4H3M2S'>*/
			$_datetime = 'P'.abs($json_array['days']).'D'; // like 'P1DT2H30M' ??
			$calendar_record = $this->Calendar->findById($json_array['id']);

			$date_cal_start = new DateTime($calendar_record['Calendar']['start']);
			$date_cal_end = new DateTime($calendar_record['Calendar']['end']);
			/** @ask*/
			//**from krees at php.net very clean*/
// 			$sign = min(1, max(-1, $json_array['days']));
			if($this->negative($json_array['days']) === TRUE) {
				$date_cal_start->sub(new DateInterval($_datetime));
				$date_cal_end->sub(new DateInterval($_datetime));
			} else {
				$date_cal_start->add(new DateInterval($_datetime));
				$date_cal_end->add(new DateInterval($_datetime));
			}
			/** @return*/
			/** @we have the date with date*/
			$date_calendar_init =  $date_cal_start->format('Y-m-d H:i:s');
			$date_calendar_endit =  $date_cal_end->format('Y-m-d H:i:s');

			/**NOW calculate the time More or Less*/
			/** @if miliseconds */
			if($json_array['milisecs'] <> 0 ) {
				$miliseconds = abs($json_array['milisecs']);
				$secs = floor($miliseconds/1000);
				$new_time = new DateTime("@$secs");
				$exp_time = explode(':',$new_time->format('H:i:s'));
				$str_time = 'PT';
				foreach ($exp_time as $index => $time_data) {
					var_dump(abs($time_data));
					
					if( abs($time_data) != 0 ){
						if ($index == 0) {
							$str_time .= abs($time_data).'H';
						} else if ($index == 1) {
							$str_time .= abs($time_data).'M';
						} else if ($index == 2) {
							$str_time .= abs($time_data).'S';
						} else {
							return 0; // this never happend
						}
					}
				}
				// add or substract the new interval to the recent datetime
				$new_date_calendar_init = new DateTime($date_calendar_init);
				$new_date_calendar_end = new DateTime($date_calendar_endit);
				if ($this->negative($json_array['milisecs']) === TRUE) {
					// if is a resize 
					if (!isset($json_array['resize'])) {
						$new_date_calendar_init->sub(new DateInterval($str_time));
					}
						$new_date_calendar_end->sub(new DateInterval($str_time));
				} else {
					if (!isset($json_array['resize'])) {
						$new_date_calendar_init->add(new DateInterval($str_time));
					}
						$new_date_calendar_end->add(new DateInterval($str_time));
				}
				// reset the values of the datetime fields
				$date_calendar_init =  $new_date_calendar_init->format('Y-m-d H:i:s');
				$date_calendar_endit =  $new_date_calendar_end->format('Y-m-d H:i:s');
				
			}
			/** @if miliseconds */
			/** @save*/
			$this->Calendar->id = $json_array['id'];
			$this->Calendar->saveField('start', $date_calendar_init);
			$this->Calendar->saveField('end', $date_calendar_endit);
			$this->Calendar->saveField('modified', date('Y-m-d H:i:s'));

			Configure::write('debug', 0);
			$this->autoRender = false;
			$this->autoLayout = false;
	// 		$this->layout='empty';
		}
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid calendar', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('calendar', $this->Calendar->read(null, $id));
	}

	function add($allday=null,$day=null,$month=null,$year=null,$hour=null,$min=null) {
			//Set default duration: 1hr and format to a leading zero.
			/** TODO <Re-code this> */
			$hourPlus=intval($hour)+1;
			if (strlen($hourPlus)==1) {
				$hourPlus = '0'.$hourPlus;
			}
			//Create a time string to display in view. The time string
			//is either  "Fri 26 / Mar, 09 : 00 â€” 10 : 00" or
			//"All day event: (Fri 26 / Mar)"
			if ($allday=='true') {
				$event['Calendar']['allday'] = 1;
				$displayTime = 'All day event: ('
					. date('D',strtotime($day.'/'.$month.'/'.$year)).' '.
					$day.' / '. date("M", mktime(0, 0, 0, $month, 10)).')';
			} else {
				$event['Calendar']['allday'] = 0;
				$displayTime = date('D',strtotime($day.'/'.$month.'/'.$year)).' '
					.$day.' / '.date("M", mktime(0, 0, 0, $month, 10)).
					', '.$hour.' : '.$min.' &mdash; '.$hourPlus.' : '.$min;
			}
			$this->set("displayTime",$displayTime);
			//Populate the event fields for the add form
			$event['Calendar']['title'] = 'Calendar description';
			$event['Calendar']['start'] = $year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':00';
			$event['Calendar']['end'] = $year.'-'.$month.'-'.$day.' '.$hourPlus.':'.$min.':00';
			$this->set('event',$event);
			//Do not use a view template.
// 			$this->layout="empty";
			
		if (!empty($this->data)) {
			//Create and save the new event in the table.
			//Event type is set to editable - because this is a user event.
			$this->Calendar->create();
			$this->data['Calendar']['title'] = Sanitize::paranoid($this->data["Calendar"]["title"], array('!','\'','?','_','.',' ','-'));
			$this->data['Calendar']['editable']='1';
			if ($this->Calendar->save($this->data)) {
				$this->Session->setFlash(__('The calendar has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar could not be saved. Please, try again.', true));
			}
		} else {
			
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid calendar', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {
			
			var_dump($id);
			$calendar = $this->Calendar->findById($id);
			debug($calendar);

			if ($this->Calendar->save($this->data)) {
				$this->Session->setFlash(__('The calendar has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Calendar->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for calendar', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Calendar->delete($id)) {
			$this->Session->setFlash(__('Calendar deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Calendar was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
