<?php
  class BackupDbShell extends Shell {
	var $uses = array(
					  'User'
	  );

	/** WARNING EDIT use with caution the conections for mssql is writable */
	/** TODO no pendings
	 * @usage function idCheck()
	 * @description 
	 * 		@conditions=> <conditions to filter for example by year array('ModelName.fieldName'=>'condition') >
	 * 		@tipoOperacion=> <print just print an indicator for example inside of a loop print the times of executing this function>
	 * 		@frecuency=> <print just print an indicator for internal operation if data is erasing or update or delete>
	 * 		@data=> <the data to save as an array in cakephp format example array(['model']=>array(['index']=>['data']))>
	 * 		@model=> <the model to execute this function>
	 * 		@useTable=> <the table to update,erase or save , this is for know which is the last id in the table and for make the alter to the index>
	 * 		@prefix=> <the default is 'id_' if you need overwrite use it else null this value used to found the last id>
	 * 		@debug=> <is not obvious anyway is disabled>
	 */

	function checkMountpoints($mount=null,$pathMountConfig=null,$sudo=null){

		foreach($pathMountConfig as $pathDesc => $pathUrl){
		  $scan_dir = array_diff(scandir($pathUrl), array('..', '.','.directory'));
		  if(!isset($output[$pathDesc])){
			$output[$pathDesc] = null;
		  }
		  exec('mountpoint '.$pathUrl,$output[$pathDesc]);
		  
			if($mount === true){
			  	foreach($output[$pathDesc] as $string){
					if (strpos( $string, 'not') !== false){
					  $this->hr();
					  $this->out($pathUrl.' => Is already unmounted');
					  $this->hr();
					}else{
					  $this->hr();
					  $this->out('Unmounting => '.$pathUrl);
						if($sudo === true){
							exec('sudo umount '.$pathUrl);
						}else {
							exec('umount '.$pathUrl);
						}
					  
					  $this->hr();
					}
				}
			}else{
			  if(!$scan_dir){
				e("\n".'folder "'.$pathUrl.'" is empty.'."\n".'performance the mounting'."\n");
				foreach($output[$pathDesc] as $strings){
					if (strpos( $strings, 'not') !== false){

						if($sudo === true){
							exec('sudo mount '.$pathUrl);
						}else {
							exec('mount '.$pathUrl);
						}
						
					}
				}
				$this->out('Done the mounting stuff');
			  }else{
				  $this->hr();
				  $this->out($pathUrl.' => Already mounted');
				  $this->hr();
			  }//end Structure control scandir
			}//End if parameter mount 
		}//End foeach check the mounts paths
		$this->hr();
		if((!empty($mount)) and ($mount === true)){
		  $this->out('Stopping program ...');
		}else{
		  $this->out('Now Running ...');
		}
		$this->hr();
	}

	/**
	 * @package name <pathMountConfig> this must change
	 * @congif build a script code to call datepicker
	 * @usage
	 * @param=>userAgent <string | return the path of backup >
	 * NOTE  this function is far away to be complete but for the purpose is ok
	 */
	/** @BACKUP_CONFIG_SECTION  */
	
	/** @SET the paths for mounting paths for nomina shell  */
	/** TODO @set <move this to a database configuration>*/
	function pathMountConfig() {
		$pathMountConfig = array(
					'backup_path' => DS.'media'.DS.'db'.DS
					,'usb_path' => DS.'media'.DS.'mssql_backup_disk'.DS
					);
		return $pathMountConfig;
	}
	

	function scannDir($urlBasename=null,$extension=null,$is_mountpoint=null,$output_dir=null,$test=null,$days=null) {
		
// 		building after days
		$afterDay = 'P'.$days.'D';

		if(file_exists($urlBasename) === false) {
			exec('mkdir -p '.$urlBasename);
		}
		if(file_exists($output_dir) === false) {
			exec('mkdir -p '.$output_dir);
		}

		$scanned_directory = array_diff(scandir($urlBasename), array('..', '.','.directory'));
		if(!$scanned_directory){
			e("\n".'folder "'.$urlBasename.'" is empty.'."\n".'nothing to do'."\n");

			if($is_mountpoint == true) {
				exec('mountpoint '.$urlBasename,$output);
				foreach($output as $strings){
					if (strpos( $strings, 'not') !== false){
	// 					exec('mount '.$urlBasename);
						exit();
					}
				}
			}

			exit();

		} else {
		

			foreach($scanned_directory as $index => $path){
				if(end(explode('.',$path)) == $extension){

				/** NOTE <calculate n days after >
				 */
						$date = new DateTime(date('Y-m-d'));
						$date->sub(new DateInterval($afterDay));
						$calculateDate =  $date->format('Y-m-d');
						$this->out('calculating Date for making of the backup must be less than => ' . $calculateDate);

					if(file_exists($urlBasename.$path)){
					
							$dirName = strtolower(date('F_Y ',filemtime($urlBasename.$path)));
							$this->out( 'building dir '.$dirName.' if not exists');
							$buildDirName = $output_dir.$dirName;
							exec('mkdir -p '.$buildDirName);
							
						if (date('Y-m-d',filemtime($urlBasename.$path)) < $calculateDate) {

							$this->out('---------------- the date is ok --------------');

							$this->out('--------------- start the backup -------------');

							/**
							* TODO make a database report of the backup 
							*/
							//proceed with the database mssql backup
							
							/** @check if the file exixts */

							if ( file_exists( trim($buildDirName).DS.pathinfo($path)['filename'].'.7z' ) ) {
								
								$filzm = trim($buildDirName).DS.pathinfo($path)['filename'].'.7z' ;
								
								$this->out('--------------- backup '.$filzm.' exists then updating -------------');
								$lzm_command = 'u';
							} else {
								$this->out('--------------- backup : '.$path.' -------------');
								$lzm_command = 'a';
							}
							
							exec('7za '.$lzm_command.' -t7z -m0=lzma -mx=9 -mfb=64 -md=32m -ms=on '.trim($buildDirName).DS.pathinfo($path)['filename'].'.7z'.' '.$urlBasename.$path,$outexec);
							$this->out($outexec);


							if($test === true){
								$this->hr();
								$this->out(' simulating the deleteing of the file ');
								$this->hr();
							} else {
								$this->hr();
								$this->out('wait for removing files we don\'t need anymore');
								$this->hr();
								exec('sleep 10s');
								exec('rm -f '.$urlBasename.$path);
							}
							
						} else {
							$this->out('--------------- the file: '.$path.' whith '.date('Y-m-d',filemtime($urlBasename.$path)).' is going to stay idle more days -------------');
// 							$this->_stop();
						}
					}//end of if file_exists
				}
			} // End foreach file
		}
	}// end scandir

	function main(){

		if (!($this->args)) {
		  $this->help();
		  $this->err(__('Usage :Testing the err stuff', true));
// 		  $this->_stop();
		}
// 		$args = $this->args;
// 		$this->out(var_dump($this->args));
// 		$this->out(system('whoami'));
// 		$this->out(exec('whoami',$ou));
// 		$this->out($ou);
		
		if (($this->args)) {
			if($this->args[0] === '1') {
			/** NOTE @check the mounted dirs and umount when not needed anymore */
			/** @check only this paths */
				$this->checkMountpoints(false,$this->pathMountConfig(),true); // check and mount paths
			/** NOTE @So at this point we have the mountpoints already working then */

			}else if($this->args[0] === '2') {
			/** @check only this paths */
				$this->checkMountpoints(true,$this->pathMountConfig(),true); // check and mount paths
			}else if($this->args[0] === '3') {
			/** @check only this paths */
				$output_dir = DS.'tmp'.DS.'mssql_backup_disk'.DS.'Respaldos_BD'.DS;
				$this->out($output_dir);
				exec('ls '.$output_dir,$deb);
				$this->out($deb);
			}
			
		} else {

// 			$urlBasename = DS.'tmp'.DS.'backup'.DS;
// 			$extension = 'bak';
// 			$is_mountpoint = false;
// 			$output_dir = DS.'tmp'.DS.'back'.DS;
// 			$test = false;
// 			$days='1';
			
			$urlBasename = DS.'media'.DS.'db'.DS;
			$extension = 'bak';
			$is_mountpoint = false;
			$output_dir = DS.'media'.DS.'mssql_backup_disk'.DS.'RespaldosBD'.DS;
			$test = false;
			$days='2';
			
			$this->checkMountpoints(false,$this->pathMountConfig(),true); // check and mount paths

			$this->scanndir($urlBasename,$extension,$is_mountpoint,$output_dir,$test,$days);
			
			$this->checkMountpoints(true,$this->pathMountConfig(),true); // check and mount paths

		}

	} //end main
}
?>