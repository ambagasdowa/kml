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
	var $useDbConfig = 'mssql_systems';


	function reporter_list_keys ( $mode=null, $options=array() ) {
		/**
			*		NOTE call to view sistemas.dbo.reporter_costos
			*		@function fetch_costos_units
			*		@param <cperiod> define the period to calculate
			*		@param mode : compact , detail , semi-detail ??
			*		@param $options = array('period'=>'','backward'=>null,'forward'=>null);
			*		@return fetch the matrix with the condensed data
			*		@debug(date("Y/m/d H:i:s"). substr((string)microtime(), 1, 6));
			*/


			if ( $mode == null  ) { // NOTE no mode do nothing or act as defaults current period

				// print_r("params => \$mode  : compact , detail .... etc ; \$options => array('period'=>array(),'backward'=>array(),'forward'=>array())");
				//NOTE return as origin model
				$result = $this->find('list',array('fields'=>array('_key','_description')));
				// exit();
			} elseif ( $mode != null && is_string($mode) ) { //NOTE first check
				//NOTE if mode exists the check options
				if ( $options != null && is_array($options) ) {
					$conditions = ( array_key_exists('conditions',$options) ? $options['conditions'] : false ) ?: false ;					//NOTE if false calculate months forward
				} else {
					// NOTE set the defaults
					$conditions = null;
				}

			} else {
			//  code ninja
			}
				//NOTE build the querys

			if ($mode == 'join') { // NOTE Now check the options
					//NOTE return a list model with Underscores
					// $conditions['ReporterTableKey._key'] = array('OF','OV');
					$result = $this->find('list',array('fields'=>array('_key','_description'),'conditions'=>$conditions));
					foreach ($result as $key_result => $value_result) {
						# code...
						$out[$key_result] = str_replace(' ', '_', $value_result);
					}
					$result = $out;
			}
				// NOTE until hir tomorrow
		return $result;
	}

	public function FunctionSample ( $value='' ) {
		# code...
		return null;
	}

} // End class
