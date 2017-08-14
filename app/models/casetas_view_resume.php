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
class CasetasViewResume extends AppModel {
	var $name = 'CasetasViewResume';
	var $useDbConfig = 'mssql_sistemas';
	var $displayField = '_filename';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	var $actsAs = array('Search.Searchable');
	var $filterArgs = array(array('name' => 'name', 'type' => 'query', 'method' => 'filterTitle'));

	function filterTitle($data, $field = null) {

		// debug($data);
		// debug($_SESSION['Auth']['User']);
// 		exit();
		if (checkAdmin($_SESSION['Auth']['User']['group_id']) OR $_SESSION['Auth']['User']['group_id'] == '8') { // NOTE Fix with a better conf
			$casetas_company = array();
		} else {
			$casetas_company = array('AND'=>array($this->alias . '._cia_id' =>$_SESSION['Auth']['User']['casetas_company']));
			$casetas_company['CasetasViewResume._status'] = '1';
			// $casetas_company['CasetasViewResume._area'] = '1';
		}
// 		debug($_SESSION['Auth']['User']['casetas_company']);
// 		debug($casetas_company);

		$search = $data['name'];

		if (empty($search)) {
			return array();
		}

		if (is_numeric($search)) {
			$search_query = array(
				'OR'  => array(
							$this->alias . '.id' => $search,
							$this->alias . '._filename LIKE' => '%' . $search . '%',
						  ) ,
				$casetas_company
			);
		} else {
			$search_query = array(
				'OR'  => array(
							$this->alias . '._filename LIKE' => '%' . $search . '%',
						  ) ,
				$casetas_company
			);
		}

// 		debug($search_query);

		return $search_query;
	}

}
