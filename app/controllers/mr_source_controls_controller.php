<?php
class MrSourceControlsController extends AppController {

	var $name = 'MrSourceControls';
	var $components = array('RequestHandler','Session');
	var $helpers = array('Html','Form','Ajax','Javascript');

	function index() {
		$this->MrSourceControl->recursive = 0;
		$this->paginate = array(
			'limit' => '35'
		);
		$this->set('mrSourceControls', $this->paginate());
		
		$this->LoadModel('MrSourceAccount');
	}

	function add_period ($set_array,$period,$period_name) {
		if($period and $set_array and $period_name){
			foreach($set_array as $inx_arr_data => $data) {
				$set_array[$inx_arr_data][$period_name] = $period;
			}
			return $set_array;
		} else {
			return null;
		}
	} //end add_period
	
	function updateSources() {

		if (!empty($this->data)) {
			$mr_source_control = $this->data;
// 			debug($mr_source_control);
			$not_empty = $empty = null;
			foreach ($mr_source_control as $mr_source_control_data ) {
				foreach ($mr_source_control_data as $id_mr_source_control => $source_data) {
					  if( (!empty($source_data['from']) and empty($source_data['to'])) OR (!empty($source_data['from']) AND !empty($source_data['to'])) ){
						$not_empty[] = $id_mr_source_control;
						
						if(!empty($source_data['from']) and !empty($source_data['to'])){

							$ranges[$id_mr_source_control]['from'] = explode('/',$source_data['from']);
							$ranges[$id_mr_source_control]['to'] = explode('/',$source_data['to']);

// 							calculate the month snmp_counter
							$ranges[$id_mr_source_control]['from']['0'] = $ranges[$id_mr_source_control]['from']['1'];
							$ranges[$id_mr_source_control]['to']['0'] = $ranges[$id_mr_source_control]['to']['1'];
							
							$ranges[$id_mr_source_control]['from']['1'] = '01';
							$ranges[$id_mr_source_control]['to']['1'] = '01';

// 							var_dump($ranges);
							$source_from = implode('/',$ranges[$id_mr_source_control]['from']);
							$source_to = implode('/',$ranges[$id_mr_source_control]['to']);
// 							debug($source_from);
// 							debug($source_to);
// 							exit();
							$date_to = new DateTime($source_to);
// 							$date_to->add(new DateInterval('P1M'));
							$DateTo =  $date_to->format('Ym');
// 							var_dump('date_to => '.$DateTo);

							$date_from = new DateTime($source_from);
// 							$date_form->add(new DateInterval('P1M'));
							$DateFrom =  $date_from->format('Ym');
// 							var_dump('date_from => '.$DateFrom);

							$interval = $date_from->diff($date_to);
							
// 							var_dump($interval->format('%m month, %d days'));
// 							var_dump($interval->format('%m months'));

							$mounth_counter = (int)$interval->format('%m');

// 							var_dump($mounth_counter);
// 							var_dump($date_from);
							$date_ranges[$id_mr_source_control][] = $DateFrom;
							
							for ($i = 0 ; $i < $mounth_counter ; $i++) {
								$date_from->add(new DateInterval('P1M'));
								$newDate = $date_from->format('Ym');
								$date_ranges[$id_mr_source_control][] = $newDate;
							}
							

							
						} else if (!empty($source_data['from']) and empty($source_data['to'])) {

							$ranges[$id_mr_source_control]['from'] = explode('/',$source_data['from']);
// 							calculate the month snmp_counter
							$ranges[$id_mr_source_control]['from']['0'] = $ranges[$id_mr_source_control]['from']['1'];
							$ranges[$id_mr_source_control]['from']['1'] = '01';
							$source_data['from'] = implode('/',$ranges[$id_mr_source_control]['from']);
							
							$date_from = new DateTime($source_data['from']);
							$source_date =  $date_from->format('Ym');
							$date_ranges[$id_mr_source_control][] = $source_date;
						}
						
					} else {
						$empty[] = $id_mr_source_control;
					} // end classification
				}
			}
			
			$legend_not_empty = ($not_empty ?'Se generaron los campos con los siguientes id => <strong>'.implode(',',$not_empty).'</strong> ,':null);
			$legend_empty = ($empty ? ' Si quiere definir los siguientes id <strong>'.implode(',',$empty).'</strong> debe definir un rango inicial y un rango final de fechas o un unico rango inicial':null);
			
// 			debug($this->data);
// 			debug($date_ranges);
// 			debug($legend_not_empty);
// 			debug($legend_empty);
// 			var_dump($not_empty);
// 			var_dump(isset($this->data['MrSourceReports']['1']));
// exit();
			
			if (!empty($not_empty)) {

				$this->LoadModel('MrSourceAccount');
				$this->LoadModel('MrSourceConfig');

				$conditionsSourceControl['MrSourceControl.id'] = $not_empty;
				$MrSourceControl = $this->MrSourceControl->find('all',array('conditions'=>$conditionsSourceControl));
	
// 				debug($date_ranges);
				// build the conditions
				foreach ($MrSourceControl as $MrSourceControlData) {
					foreach($MrSourceControlData as $MrSourceControlContent){
						// fetch the sourceAccount to insert
						if(!isset($this->data['MrSourceReports'][$MrSourceControlContent['id']])){
// 							var_dump('Records to save in SourceConfig Goes => '.$MrSourceControlContent['id']);
							$conditionsSourceAccount['MrSourceAccount.mr_source_controls_id'] = $MrSourceControlContent['id'];
							$fieldsSourceAccount = array('SubAccount','company','source_company','_key','_status');

							$MrSourceAccount = $this->MrSourceAccount->find('all',array('conditions'=>$conditionsSourceAccount,'fields'=>$fieldsSourceAccount));
							/** NOTE <rearrange the index and remove the model keyName>*/
							$fetchMrSourceAccount = Set::classicExtract($MrSourceAccount, '{n}.MrSourceAccount');

							$conditionsSourceConfig['MrSourceConfig.source_company'] = $MrSourceControlContent['source_company'];
							$conditionsSourceConfig['MrSourceConfig._key'] = $MrSourceControlContent['_key'];
							$conditionsSourceConfig['MrSourceConfig.period'] = $date_ranges[$MrSourceControlContent['id']];

							$MrSourceConfig[$MrSourceControlContent['id']] = $this->MrSourceConfig->find('all',array('conditions'=>$conditionsSourceConfig));
	// 						delete found records
							if(!empty($MrSourceConfig[$MrSourceControlContent['id']])) {
// 								var_dump('delete records in in source_config with conditions ...');

								$conditionsSourceConfig['MrSourceConfig.source_company'] = $MrSourceControlContent['source_company'];
								$conditionsSourceConfig['MrSourceConfig._key'] = $MrSourceControlContent['_key'];
								$conditionsSourceConfig['MrSourceConfig.period'] = $date_ranges[$MrSourceControlContent['id']];
	// 							var_dump($conditionsSourceConfig);
								//delete records
								if(!$this->MrSourceConfig->deleteAll($conditionsSourceConfig,FALSE)){
									
									$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true">&times;</span>
																</button>Something is wrong 
																<a href="'.$this->webroot.'" class="alert-link">volver</a>
																</div>',
															true));
								}
							}
							//saving the new records
							foreach($date_ranges[$MrSourceControlContent['id']] as $indx => $date_build){
	// 							var_dump('save records in source_config ...');

	// 							debug($this->add_period($fetchMrSourceAccount,$date_build,'period'));

								$save_records = $this->add_period($fetchMrSourceAccount,$date_build,'period');
// 								debug($save_records);
								$this->MrSourceConfig->saveAll($save_records);
								
							}
						} else {
// 							build MrSourceReports or execute the procedure
							var_dump('Records to ReBuild or save to Report Goes => '.$MrSourceControlContent['id']);
							$this->LoadModel('MrSourceReport');
							if(isset($this->data['MrSourceReports'][$MrSourceControlContent['id']])){
								
								// logic hir
								if (is_array($date_ranges[$MrSourceControlContent['id']])) {
									$_period = implode('|',$date_ranges[$MrSourceControlContent['id']]);
								} else {
									$_period =$date_ranges[$MrSourceControlContent['id']];
								}
								var_dump($_period);
								if (is_array($MrSourceControlContent['source_company'])) {
									$_source_company = implode('|',$MrSourceControlContent['source_company']);
								} else {
									$_source_company = $MrSourceControlContent['source_company'];
								}
								var_dump($_source_company);
								if (is_array($MrSourceControlContent['_key'])) {
									$_key = implode('|',$MrSourceControlContent['_key']);
								} else {
									$_key = $MrSourceControlContent['_key'];
								}
								var_dump($_key);
								
								// set the procedure to start
								if($this->MrSourceConfig->query("exec sistemas.dbo.setDataMr N'{$_period}', N'|', N'{$_source_company}',N'{$_key}';")){
									$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
											<strong>Sus archivo de datos se ha Guardado y se han Actualizado los nuevos datos en la DB</strong>
											ahora puede volver al
											<a href="'.$this->webroot.'" class="alert-link">Inicio del Portal</a>
										</div>', true));
								} else {
									var_dump('Warning');
								}
							}
							
							
						}
					}
				}
				
			}

					$this->Session->setFlash(__('<div class="alert alert-success alert-dismissible fade in" role="alert">
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>'.$legend_not_empty . $legend_empty .'
												<a href="'.$this->webroot.'" class="alert-link">volver</a>
												</div>',
											true));
											
		} // $this->data
	} // end updateSources
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mr source control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mrSourceControl', $this->MrSourceControl->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MrSourceControl->create();
			if ($this->MrSourceControl->save($this->data)) {
				$this->Session->setFlash(__('The mr source control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source control could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mr source control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MrSourceControl->save($this->data)) {
				$this->Session->setFlash(__('The mr source control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mr source control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MrSourceControl->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mr source control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MrSourceControl->delete($id)) {
			$this->Session->setFlash(__('Mr source control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mr source control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
