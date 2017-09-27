<?php
App::import('Sanitize');
class SecureCalendarsController extends AppController {

	var $name = 'SecureCalendars';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js' => array('Jquery'));


	function index() {
		$this->SecureCalendar->recursive = 0;
		$this->set('calendars', $this->paginate());


		$this->LoadModel('SecureStructure');
		$secureStructures = $this->SecureStructure->find('all');

		$groups = $this->SecureStructure->Group->find('list');
		$users = $this->SecureStructure->User->find('list');
		$secureTopics = $this->SecureStructure->SecureTopics->find('list',array('conditions'=>array('SecureTopics.status'=>'1')));
		$secureTopicsTypes = $this->SecureStructure->SecureTopicsTypes->find('list');
		$secureGpoChiefs = $this->SecureStructure->SecureGpoChiefs->find('list');
		$secureGoes = $this->SecureStructure->SecureGoes->find('list');
		$secureCalendars = $this->SecureStructure->SecureCalendars->find('list');

// 		debug($this->statistics_topics());
// 		debug(json_encode($this->statistics_topics()['totalOperators']['0']['ViewGetPayroll']));

// 		$json_courses['0']['name'] = 'Cursos Totales';
// 		$json_courses['0']['data'] = array(count($this->statistics_topics()['totalCourses']));

// 		$json_courses['1']['name'] = 'Operadores Totales';
// 		$json_courses['1']['data'] = array(count($this->statistics_topics()['totalOperators']));

		$json_courses = $this->statistics_topics();
		debug($json_courses);

		debug(json_encode(array_keys($json_courses['totalOperators'])));
		debug(json_encode(array_values($json_courses['totalOperators'])));


		$this->set('total_courses',count($json_courses['totalCourses']));

// 			$str = "exit();";
// 			eval($str);
// 		var_dump(eval("echo 2/3;"));
// 		capacitacionesTotales = cursos X total de operadores
		$label_courses_stats = $this->math_map($arr_ = $json_courses['totalOperators'],$num_data = count($json_courses['totalCourses']),$type = null,$operator = '/');
		debug(json_encode($label_courses_stats));

// 		porcentaje de cumplimiento = capacitaciones capturadas / capacitaciones totales X 100
		$this->accomplishment();


		$this->set('label_bases',json_encode(array_keys($json_courses['totalOperators'])));
		$this->set('label_workers',json_encode(array_values($json_courses['totalOperators'])));
		$this->set('label_courses_stats',json_encode($label_courses_stats));


// 		debug(json_encode($this->statistics_topics()['totalCourses']));

// 		$this->set(compact('json_courses'));
// 		$this->LoadModel('ViewGetPayroll'); //NOTE Operadores totales
// 		$conditionsPayroll['ViewGetPayroll.Cvepue'] = array('000017','000026','000028');
// 		$conditionsPayroll['ViewGetPayroll.Puesto LIKE'] = '%OPERADOR%';
// 		$total_operator_users = $this->ViewGetPayroll->find('all',array('conditions'=>$conditionsPayroll));
// 		var_dump('TotalOperators');
// 		debug(count($total_operator_users));
// 		var_dump('TotalCourses');
// 		debug(count($secureTopics));
// 		debug($secureStructures);
// 		debug($secureTopics);
// 		debug($secureCalendars);

		$this->set(compact('secureStructures','groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes', 'secureCalendars'));

	}

	function accomplishment ($year= null, $month = null) {
		// NOTE Temporal
			$year = date('Y');
			$month = date('m');
// 			$month = '12';
		// NOTE Temporal

		if (!empty($year) and !empty($month)) {
			$this->LoadModel('SecureControlUser');
			$conditionsAccomplishment['YEAR(SecureControlUser.modified)'] = $year;
			$conditionsAccomplishment['MONTH(SecureControlUser.modified)'] = $month;
			$conditionsAccomplishment['SecureControlUser.course_is_taken'] = TRUE;

			$fieldsAccomplishment = array('id','secure_structures_id');
			debug( $this->SecureControlUser->find('list',array('conditions'=>$conditionsAccomplishment,'fields'=>$fieldsAccomplishment)) );

		} else {
			return null;
		}
	} //end accomplishment

	function math_map ($arr_ = array(),$num_data = null,$type = null,$operator = null) {

		if ($type == 'key') {
			foreach (array_keys($arr_) as $index => $value) {
// 				debug($value.$operator.$num_data);
// 				debug(eval("echo $value"."$operator"."$num_data".";"));
// 				$op = $value.$operator.$num_data.";";
				$result[$index] = $value * $num_data;
			}
			return $result;
		} else if ($type == 'value') {
			foreach (array_values($arr_) as $index => $value) {
// 				debug($value.$operator.$num_data);
// 				debug(eval("$value"."$operator"."$num_data".";"));
// 				$op = $value.$operator.$num_data;
// 				eval("\$data = \$op;");
				$result[$index] = $value * $num_data;
			}
			return $result;
		} else if ($type === null){
			$count = '0';
			foreach ($arr_ as $index => $value) {
				$result[$count]['name'] = $index;
				$result[$count]['y'] = $value * $num_data;
				++$count;
			}
			return $result;
		} else {
			return null;
		}
	}

	function statistics_topics () {

		$this->LoadModel('SecureStructure');
		$secureStructures = $this->SecureStructure->find('all');

		$groups = $this->SecureStructure->Group->find('list');
		$users = $this->SecureStructure->User->find('list');
		$secureTopics = $this->SecureStructure->SecureTopics->find('list',array('conditions'=>array('SecureTopics.status'=>'1')));
		$secureTopicsTypes = $this->SecureStructure->SecureTopicsTypes->find('list');
		$secureGpoChiefs = $this->SecureStructure->SecureGpoChiefs->find('list');
		$secureGoes = $this->SecureStructure->SecureGoes->find('list');
		$secureCalendars = $this->SecureStructure->SecureCalendars->find('list');
		$this->LoadModel('ViewGetPayroll'); //NOTE Operadores totales
		$conditionsPayroll['ViewGetPayroll.Cvepue'] = array('000017','000026','000028');
		$conditionsPayroll['ViewGetPayroll.Puesto LIKE'] = '%OPERADOR%';
		$groupPayroll = array('ViewGetPayroll.Departamento','ViewGetPayroll.Company');
		$fieldPayroll = array('ViewGetPayroll.Departamento','count(ViewGetPayroll.Cvetra)');
		$orderPayroll = null;

		$total_operator_users = $this->ViewGetPayroll->find('list',array('conditions'=>$conditionsPayroll,'group'=>$groupPayroll,'fields'=>$fieldPayroll,'order'=>$orderPayroll));
// 		var_dump('TotalOperators');
// 		debug($total_operator_users);
// 		debug(json_encode($total_operator_users));
// 		var_dump('TotalCourses');
// 		debug(count($secureTopics));
		$stats['totalCourses'] = $secureTopics;
		$stats['totalOperators'] = $total_operator_users;

// 		debug($stats);
		//NOTE JSON SECTION
// 		Configure::write('debug', 0);
// 		$this->autoRender = false;
// 		$this->autoLayout = false;
// 		$this->layout='empty';
// 		$this->header('Content-Type: application/json');
// 		return json_encode($stats);
		return $stats;
	}

	function feed() {
		//1. Transform request parameters to MySQL datetime format.
		$date_init = new DateTime($this->params['url']['start']);
		$mysqlstart =  $date_init->format('Y-m-d H:i:s');

		$date_end = new DateTime($this->params['url']['end']);
		$mysqlend =  $date_end->format('Y-m-d H:i:s');
		//2. Get the events corresponding to the time range
		$conditions = array ('SecureCalendar.start BETWEEN ? AND ?'=> array ($mysqlstart,$mysqlend));
		$events = $this->SecureCalendar->find('all', array ('conditions' => $conditions));
		//3. Re-build of Create the json array
		foreach($events as $idx_cal => $CalendarContaint) {
			foreach($CalendarContaint['SecureCalendar'] as $option_calendar => $data_calendar){
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
			$calendar_record = $this->SecureCalendar->findById($json_array['id']);

			$date_cal_start = new DateTime($calendar_record['SecureCalendar']['start']);
			$date_cal_end = new DateTime($calendar_record['SecureCalendar']['end']);
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
			$this->SecureCalendar->id = $json_array['id'];
			$this->SecureCalendar->saveField('start', $date_calendar_init);
			$this->SecureCalendar->saveField('end', $date_calendar_endit);
			$this->SecureCalendar->saveField('modified', date('Y-m-d H:i:s'));

			Configure::write('debug', 0);
			$this->autoRender = false;
			$this->autoLayout = false;
	// 		$this->layout='empty';
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid secure calendar', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('secureCalendar', $this->SecureCalendar->read(null, $id));
	}

// 	function add_() {
// 		if (!empty($this->data)) {
// 			$this->SecureCalendar->create();
// 			if ($this->SecureCalendar->save($this->data)) {
// 				$this->Session->setFlash(__('The secure calendar has been saved', true));
// 				$this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The secure calendar could not be saved. Please, try again.', true));
// 			}
// 		}
// 	}

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
				$event['SecureCalendar']['allday'] = 1;
				$displayTime = 'All day event: ('
					. date('D',strtotime($day.'/'.$month.'/'.$year)).' '.
					$day.' / '. date("M", mktime(0, 0, 0, $month, 10)).')';
			} else {
				$event['SecureCalendar']['allday'] = 0;
				$displayTime = date('D',strtotime($day.'/'.$month.'/'.$year)).' '
					.$day.' / '.date("M", mktime(0, 0, 0, $month, 10)).
					', '.$hour.' : '.$min.' &mdash; '.$hourPlus.' : '.$min;
			}
			$this->set("displayTime",$displayTime);
			//Populate the event fields for the add form
			$event['SecureCalendar']['title'] = 'SecureCalendar description';
			$event['SecureCalendar']['start'] = $year.'-'.$month.'-'.$day.' '.$hour.':'.$min.':00';
			$event['SecureCalendar']['end'] = $year.'-'.$month.'-'.$day.' '.$hourPlus.':'.$min.':00';
			$this->set('event',$event);
			//Do not use a view template.
// 			$this->layout="empty";

			/** NOTE section belongs to SecureStructures*/
			$this->LoadModel('SecureStructure');
			$this->LoadModel('SecurePresenter');
				$groups = $this->SecureStructure->Group->find('list');
				$users_all = $this->SecureStructure->User->find('list');
				$usersSecure = $this->SecurePresenter->find('list');

				foreach ($usersSecure as $id_secure_users => $_users_id ) {
					$users[$_users_id] = $users_all[$_users_id];
				}

				$secureTopics = $this->SecureStructure->SecureTopics->find('list');
				$secureTopicsTypes = $this->SecureStructure->SecureTopicsTypes->find('list');
				$secureGpoChiefs = $this->SecureStructure->SecureGpoChiefs->find('list');
				$secureGoes = $this->SecureStructure->SecureGoes->find('list');
				$this->set(compact('groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes'));
// 				debug($groups);

// 				debug($users);

// 				foreach($users_secure as $user_content){
// 					$secure_users[$user_content['SecurePresenter']['id']] = $user_content['User']['name'];
// 				}
// 				debug($secure_users);
// 				debug($users);


			/** NOTE section belongs to SecureCalendarss*/


		if (!empty($this->data)) {

// 			debug($this->params);
// 			debug($this->data);
// 			exit();
			//Create and save the new event in the table.
			//Event type is set to editable - because this is a user event.
			$this->SecureCalendar->create();
			$this->data['SecureCalendar']['title'] = Sanitize::paranoid($this->data["SecureCalendar"]["title"], array('!','\'','?','_','.',' ','-'));
			$this->data['SecureCalendar']['editable']='1';

			if ($this->SecureCalendar->save($this->data['SecureCalendar'])) {
				// NOTE catch the id for the calendar
// 				$secure_calendars_id = $this->SecureCalendar->getLastInsertID();

				$this->data['SecureStructure']['secure_calendars_id'] = $this->SecureCalendar->getLastInsertID();
				$this->data['SecureStructure']['description'] = $this->data['SecureCalendar']['description'];
				$this->data['SecureStructure']['create'] = date('Y-m-d h:m:s');
				$this->data['SecureStructure']['status'] = true;

				$this->SecureStructure->create();
				if ($this->SecureStructure->save($this->data['SecureStructure'])) {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<strong> The calendar event has been saved </strong>
												</div>', true));
				} else {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<strong> Failed!  The calendar event has been saved </strong>
												</div>', true));
				}

				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar could not be saved. Please, try again.', true));
			}
		} else {

		}
		$this->autoLayout = false;
// 		$this->layout='empty';
	}



// 	function edit_($id = null) {
// 		if (!$id && empty($this->data)) {
// 			$this->Session->setFlash(__('Invalid secure calendar', true));
// 			$this->redirect(array('action' => 'index'));
// 		}
// 		if (!empty($this->data)) {
// 			if ($this->SecureCalendar->save($this->data)) {
// 				$this->Session->setFlash(__('The secure calendar has been saved', true));
// 				$this->redirect(array('action' => 'index'));
// 			} else {
// 				$this->Session->setFlash(__('The secure calendar could not be saved. Please, try again.', true));
// 			}
// 		}
// 		if (empty($this->data)) {
// 			$this->data = $this->SecureCalendar->read(null, $id);
// 		}
// 	}

	function edit($id = null) {

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid calendar', true));
			$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
		}
// 		debug($id);
			/** NOTE section belongs to SecureStructures*/
			$this->LoadModel('SecureStructure');
			$this->LoadModel('SecurePresenter');
			$secureStructures = $this->SecureStructure->findBySecureCalendarsId($id); // what happend if a calendar has many structures???

				$groups = $this->SecureStructure->Group->find('list');
				$users_all = $this->SecureStructure->User->find('list');
				$usersSecure = $this->SecurePresenter->find('list');
				foreach ($usersSecure as $id_secure_users => $_users_id ) {
					$users[$_users_id] = $users_all[$_users_id];
				}
				$secureTopics = $this->SecureStructure->SecureTopics->find('list');
				$secureTopicsTypes = $this->SecureStructure->SecureTopicsTypes->find('list');
				$secureGpoChiefs = $this->SecureStructure->SecureGpoChiefs->find('list');
				$secureGoes = $this->SecureStructure->SecureGoes->find('list');
				$secureCalendars = $this->SecureStructure->SecureCalendars->find('list');
				$this->set(compact('groups', 'users', 'secureTopics', 'secureTopicsTypes', 'secureGpoChiefs', 'secureGoes', 'secureCalendars','secureStructures'));
// 				debug($groups);
			/** NOTE section belongs to SecureCalendarss*/

		if (!empty($this->data)) {

// 			debug($this->params);
// 			debug($this->data);

			isset($this->data['SecureCalendar']['allday']) ? $this->data['SecureCalendar']['allday'] = '1' : $this->data['SecureCalendar']['allday'] = '0';
			isset($this->data['SecureCalendar']['editable']) ? $this->data['SecureCalendar']['editable'] = '1' : $this->data['SecureCalendar']['editable'] = '0';

			$calendar = $this->SecureCalendar->findById($id); // and this what jajaja???
// 			var_dump($calendar);

// 				$this->data['SecureStructure']['secure_calendars_id'] = $this->SecureCalendar->getLastInsertID();
				$this->data['SecureStructure']['description'] = $this->data['SecureCalendar']['description'];
				$this->data['SecureStructure']['modified'] = date('Y-m-d h:m:s');
				$this->data['SecureStructure']['status'] = true;

// 			debug($this->data);
// 			debug($this->SecureStructure->findBySecureCalendarsId($id)); // what happend if a calendar has many structures???

// 			exit();

			if ($this->SecureCalendar->save($this->data)) {
// 								$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
// 												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
// 													<span aria-hidden="true">&times;</span>
// 												</button>
// 												<strong> The calendar has been saved </strong>
// 											</div>', true));
				// ALERT NOTE edit the SecureStructure too
				$this->SecureStructure->create();
				if ($this->SecureStructure->save($this->data['SecureStructure'])) {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<strong> The calendar event has been saved </strong>
												</div>', true));
				} else {
					$this->Session->setFlash(__('<div class="alert alert-danger alert-dismissible fade in" role="alert">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">&times;</span>
													</button>
													<strong> Failed!  The calendar event has been saved </strong>
												</div>', true));
				}

				$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
			} else {
				$this->Session->setFlash(__('The calendar could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SecureCalendar->read(null, $id);
		}
		$this->autoLayout = false;
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for secure calendar', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SecureCalendar->delete($id)) {
			$this->Session->setFlash(__('Secure calendar deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Secure calendar was not deleted', true));
		$this->redirect(array('controller'=>'SecureCalendars','action' => 'index'));
	}
}
