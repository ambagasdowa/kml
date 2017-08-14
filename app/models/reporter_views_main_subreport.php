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
class ReporterViewsMainSubreport extends AppModel {
	var $name = 'ReporterViewsMainSubreport';
	var $useDbConfig = 'mssql_sistemas';
	var $primaryKey = 'ID';



	function get_subreport ( $RowFormatID = null) {

		if ($RowFormatID) {
			// NOTE find the report for select the subsubreport accounts defintions

			$conditions['ReporterViewsMainSubreport.RowFormatID'] = (string)$RowFormatID;
			$result = $this->find('all', array('conditions'=>$conditions,'order'=>'RowNumber'));

		}
		return $result;
	}


} /** END CLASS */
