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
class ReporterTableKey extends AppModel {
	var $name = 'ReporterTableKey';
	var $useDbConfig = 'mssql_sistemas';


	function reporter_list_keys ( $mode=null ) {
			// return a list model with Underscores
		if ($mode != null) {
			if ($mode == "join") {
				$result = $this->find('list',array('fields'=>array('_key','_description')));
				foreach ($result as $key_result => $value_result) {
					# code...
					$out[$key_result] = str_replace(' ', '_', $value_result);
				}
			}
			$result = $out;
		} else {

			// return as origin model
			$result = $this->find('list',array('fields'=>array('_key','_description')));
		}
		return $result;
	}

	public function FunctionSample ( $value='' ) {
		# code...
		return null;
	}

} // End class
