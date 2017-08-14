<?php
  class PayrollShell extends Shell{
	var $uses = array(
					  'Payroll',
					  'User'
	  );

	/** WARNING use with caution the conections for mssql is writable */
	/** TODO no pendings
	 * @usage function idCheck()
	 * @description 
	 * 		@conditions=> <conditions to filter for example by year array('ModelName.fieldName'=>'condition') >
	 * 		@tipoOperacion=> <print just print an indicator for example inside of a loop print the times of executing 								this function>
	 * 		@frecuency=> <print just print an indicator for internal operation if data is erasing or update or delete>
	 * 		@data=> <the data to save as an array in cakephp format example array(['model']=>array(['index']=>['data']))>
	 * 		@model=> <the model to execute this function>
	 * 		@useTable=> <the table to update,erase or save , this is for know which is the last id in the table and for 							make the alter to the index>
	 * 		@prefix=> <the default is 'id_' if you need overwrite use it else null this value used to found the last id>
	 * 		@debug=> <is not obvious anyway is disabled>
	 */
	
	function idCheck($conditions=null,$tipoOperacion=null,$frecuency=null,$data=null,$model=null,$useTable=null,$prefix=null,$debug=null,$system=null){

	  if(empty($prefix)){
		$prefix = 'id_';
	  }

		if($this->$model->find('all',array('conditions'=>$conditions))){
		  $this->out('Data => in Db\'s by '.$frecuency.' find erasing ...');

		  if(!($this->$model->deleteAll($conditions,false))){
			$this->out('Error erasing data in =>'.$model.'with conditions'.pr($conditions));
			$this->out('Erasing fail...');
			exit();
		  }else{
			$this->out('Erasing is done...');
			$this->out('Checking the last id of the old data in => '.$prefix.$useTable);
			$lastIdFound = $this->$model->query('select max('.$prefix.$useTable.') from '.$useTable.';');

			if(!empty($debug)){
				var_dump($lastIdFound);
			}
				foreach($lastIdFound as $firstLevel){
				  foreach($firstLevel as $maxId){
					foreach($maxId as $Id){
					  if(empty($Id)){
						  $this->out('No data of any kind found anyway going to reset the indexing');
						  $this->$model->query('alter table '.$useTable.' AUTO_INCREMENT=1;');
						  $this->out('Reseting the indexes => Done');
						  $this->out('Updating => Db\'s By '.$frecuency.' Data ...');
						  if(!empty($data) and empty($system)){
							$this->$model->saveAll($data);
						  }elseif(empty($data) and !empty($system)){
							system("mysqlimport --local -u ".$system['user']." -h ".$system['host']." --password=".$system['pass']." ".$system['user']." ".$system['file_import_path']);
						  }
  						  
						  $this->out('Updating the data => Done');
					  }else{
						  $this->out('The id is '.$Id);
						  $LasFoundId = $Id+1;
						  $this->$model->query('alter table '.$useTable.' AUTO_INCREMENT='.$LasFoundId.';');
						  $this->out('Updating => Db\'s By '.$frecuency.' with updated Data ...');
						  
						  if(!empty($data) and empty($system)){
							$this->$model->saveAll($data);
						  }elseif(empty($data) and !empty($system)){
							system("mysqlimport --local -u ".$system['user']." -h ".$system['host']." --password=".$system['pass']." ".$system['user']." ".$system['file_import_path']);
						  }
					  }
					}
				  }
				}
		  }//end erasing conditions
		}else{
		  if(!empty($data) and empty($system)){
			$this->$model->saveAll($data);
		  }elseif(empty($data) and !empty($system)){
			system("mysqlimport --local -u ".$system['user']." -h ".$system['host']." --password=".$system['pass']." ".$system['user']." ".$system['file_import_path']);
		  }
		  $this->out('Updating => '.$tipoOperacion.' By '.$frecuency.' Data no issues');
		}
	}//End Checking

// 	function dbOp(){
// 	  $operations=array('1'=>'Toneladas','2'=>'kms','3'=>'ingresos','4'=>'Viajes'); // extract the Mensual ingresos
// 	  return $operations;
// 	}
	
	function payroll($year=null){

			$conditionsDaily['Operacion.year'] = $year;
			$this->idCheck($conditionsDaily,$operations[$tipoOperacion],$frecuency='Diaria',$data=$operacionesDiarias['Operacion'],$model='Operacion',$useTable='operacion',$system=false);
			
			$conditions['OperacionMensual.year'] = $year;
			$this->idCheck($conditions,$operations[$tipoOperacion],$frecuency='Mensual',$data=$operacionesMensuales['OperacionMensual'],$model='OperacionMensual',$useTable='operacionMensual',$system=false);
	}//End main()
	
	function tachionTravel($deep=null){
	  $currentYear=date('Y');
	  if(empty($deep)){
		$deep= '2' ;
	  }
	  for($i=0;$i<=$deep;$i++){
		$tau[$i] = (int)$currentYear-(int)$i;
	  }
	  return $tau;
	}//End tachionTravel
	
	
	function truncateCfg(){
	  /** @config if you need truncate more tables just add */
		$table[] = 'operacion';
		$table[] = 'operacionMensual';

		foreach($table as $index => $tableName){
		  $model[$index] = ucfirst($tableName);
		}
	  return array('table'=>$table,'model'=>$model);
	}
	
	function truncateDb(){
	  foreach($this->truncateCfg()['model'] as $index => $model){
		$this->$model->query("truncate ".$this->truncateCfg()['table'][$index]);
	  }
	  return true;
	}
	
	function main(){
		
		$this->out(pr($this->Payroll->find('all')));
// 		$this->out(pr($this->Payroll->getPayrollByCompany($cvecia='004',$cveare='007',$cvepue='000011',$cvetra='4000015')));
		
		exit();
		
	  pr($this->truncateCfg());
// 	  $this->_stop();
// 	  $this->operations(null,$year=null);
	 if(!($this->args)){
// 		 $this->help();
         $this->err(__("Usage : if you need define how may years backwards are going to update set as first parameter 
						\n if you need define the year going to update backwards set as second parameter
						\n programs <yearCountBackwards|(int)> <year|(int)>
						\n if you want to count backwards starting from 2014 and end in 2011 then
						\n example: programs 3 2014
						\n if you on want go backwards from the current year just set the firts parameter
						\n example : programs 1
						\n without arguments the default options is one year backwards from current year and truncate
						\n all data in db
						\n if you need truncate all the data in db set as third argument
						\n example programs 1 2015 truncate", true));

	  /** ALERT  so we are hir because you automatize this process and because you know what are you doing */
	  /** ALERT and @remenber this process only takes the (date('Y')-1) and the current year data and until march**/
	  if(date('n') < 3){
		$this->out('Truncate the data in DB');
		$this->out('Mes => '.date('M'));
		if(!$this->truncateDb()){ /** DANGER function use with CAUTION */
		  $this->out('Error truncating Db please check your db data and you know wereaver to do');
		}else{
		  $this->out('Truncate is successfull executing');
		}
		// Ok go and truncate the db XD
		$this->out('Updating data in DB with records of year '.(date('Y')-1));
		$this->operations($year=(date('Y')-1)); // current year -1 ;
		$this->out('Now Updating data in DB with records of year '.date('Y'));
		$this->operations(); //then current Year
		$this->out('All the jobs is done .. bye');
		$this->_stop();
		// the routine is truncate all data then execute anter year but if we have more years ? then what
	  }else{
		/** ALERT after march of current year go normal*/
		$this->payroll();
	  }

     }else{
	  /** TODO @status=>developing in progress **/
	 }

	}// end main
	
  }//End OperacionesShell
?>