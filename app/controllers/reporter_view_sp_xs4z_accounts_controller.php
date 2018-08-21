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
class ReporterViewSpXs4zAccountsController extends AppController {

	var $name = 'ReporterViewSpXs4zAccounts';
	var $uses = array('ReporterViewSpXs4zAccount','ReporterTableKey','ProjectionsViewBussinessUnit');
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');

	function credentials () {
		// NOTE define the credentials access

		$this->LoadModel('ModuleUserCredentialsControl');
		$auth_user = $this->ModuleUserCredentialsControl->getCredentials('all',array('user_id'=>$this->Auth->User('id')));

		// debug($auth_user);

		if ($auth_user) {
			if (array_key_exists('bsu',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
					$bsu_conditions = $auth_user['ModuleUserCredentialsControl']['bsu'];
					$conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.area'] = $bsu_conditions['ProjectionsViewBussinessUnit.name'];
			}
			if (array_key_exists('bsu_label',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
					$bsu_label_conditions = $auth_user['ModuleUserCredentialsControl']['bsu_label'];
			}
			if (array_key_exists('fraction',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
					$fraction_conditions = $auth_user['ModuleUserCredentialsControl']['fraction'];
					$conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.fraccion'] = $fraction_conditions['ProjectionsViewFraction.desc_producto'];
			}
			if (array_key_exists('areas',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
					$conditions_chart_index = $auth_user['ModuleUserCredentialsControl']['areas'];
			}
			if (array_key_exists('type',$auth_user['ModuleUserCredentialsControl'])) { // set UI type-tabbed filter
					$conditions_mod_index = $auth_user['ModuleUserCredentialsControl']['type'];
			}
		}

	}


	function get () {

				// NOTE if select an empty option
				// if ($this->params['url']['data']['ModuleMainId'] == null) {
				// 	Configure::write('debug', 0);
				// 	$this->autoLayout = false;
				// 	exit();
				// }
				// debug($this->params);
				// debug($this->data);
			// 	var_dump(count($_GET)); //if more than one
				$decrypted_encrypt = base64_decode($this->params['named']['data']);

				$this->LoadModel('ModuleUserCredentialsControl');

				$this->ModuleUserCredentialsControl->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
				$undata = explode('_',$decrypted_encrypt);
				$header_string_data['cyear'] = $undata['2'];
				$header_string_data['Mes'] = $undata['3'];
				$header_string_data['area'] = $undata['4'];
				$header_string_data['account'] = $undata['5'];
				$header_string_data['type'] = $undata['6'];
				$header_string_data['real'] = $undata['7'];
				$header_string_data['presupuesto'] = $undata['8'];

				// debug($header_string_data);

				$reporterPortalCostosDetailsAccounts['ReporterPortalCostosDetailsAccount'] = $this->ReporterViewSpXs4zAccount->fetch_cost_units('detail',array('conditions_detail'=>$decrypted_encrypt));

				// debug($reporterPortalCostosDetailsAccounts);

				$this->set(compact('reporterPortalCostosDetailsAccounts','header_string_data'));

				Configure::write('debug', 2);
				$this->autoLayout = false;

	}


	function index( $cyear=null ) {

		Configure::write('debug', 2);

		if ( $cyear==null ) {
			$cyear = date('Y');
		}

		$this->ReporterViewSpXs4zAccount->query('SET	ANSI_NULLS	ON;SET	ANSI_WARNINGS	ON;');
		// debug($this->ReporterTableKey->reporter_list_keys()); //get the list of keys /** type of costs*/
		// debug($this->ReporterTableKey->reporter_list_keys("join")); //get the list of keys /** type of costs*/

		$this->LoadModel('ModuleUserCredentialsControl');
		$auth_user = $this->ModuleUserCredentialsControl->getCredentials('all',array('user_id'=>$this->Auth->User('id')));

		// debug($auth_user);

		if ($auth_user) {
			if (array_key_exists('key',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
					$key_conditions = $auth_user['ModuleUserCredentialsControl']['key'];
			}
			if (array_key_exists('area',$auth_user['ModuleUserCredentialsControl'])) { // set logical areas filter
					$bsu_conditions = $auth_user['ModuleUserCredentialsControl']['area'];
			}
		} else {
			$key_conditions = null;
			$bsu_conditions = null;
		}

		$mod_index = $this->ReporterTableKey->reporter_list_keys('join',array('conditions'=>$key_conditions));

		// $mod_index = $this->ReporterTableKey->reporter_list_keys("join");
		// debug($mod_index);
		$ui_mod_index = key($mod_index);

		foreach ($mod_index as $keymod => $modvalue) {
				$mod_index_one[$keymod] = str_replace('_', ' ', $modvalue);
		}
		// debug($mod_index);
		// $mod_index_one = $this->ReporterTableKey->reporter_list_keys();
		// debug($mod_index_one);

		// debug($this->ReporterViewSpXs4zAccount->get_list_accounts()); // get the list of the accounts by key (OF,OV ... etc)
		$fraction = $this->ReporterViewSpXs4zAccount->get_list_accounts();
		// debug($fraction);

		$months = months_es();  // get a list of a months in spanish
		// $rest_chart_index = json_encode($chart);
		$json_months = json_encode($months,JSON_PRETTY_PRINT);
		// debug($months);
		// fetch BussinessUnits
		// debug($this->ProjectionsViewBussinessUnit->find('list'));
		// debug($this->ProjectionsViewBussinessUnit->find('all'));
		$bsu = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','label'),'conditions'=>$bsu_conditions));
		$bsu_label = $bsu;
		// $bsu_label = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','label')));

		$ui_bsu_index = key($bsu);
		// debug($bsu);
		// debug($ui_bsu_index);
		// debug($bsu_label);

		//TODO => debug($this->ReporterViewSpXs4zAccount->fetch_cost_units());
		// debug($this->ReporterViewSpXs4zAccount->fetch_cost_units('detail',array('backward'=>'6','forward'=>'1','period'=>'2017-07-14')));
		//TODO save as chart_index for backwards compability

			// TODO ALERT uncomment this
			$data_index = $this->ReporterViewSpXs4zAccount->fetch_cost_units('company',array('struct'=>true,'conditions_key'=>$key_conditions,'conditions_bsu'=>$bsu_conditions));

		//TODO check the performance
		// app/controllers/reporter_view_sp_xs4z_accounts_controller.php (line 62)
			$chart = $this->ReporterViewSpXs4zAccount->fetch_cost_units('compact_bsu',array('struct'=>true,'conditions_key'=>$key_conditions,'conditions_bsu'=>$bsu_conditions));

			// debug($chart);

			// exit();



		  $chart_index = $data_index;

		// foreach ($charting as $key_chart => $value_chart) {
		// 	debug($value_chart);
		// }

		// exit();
		// $this->ReporterViewSpXs4zAccount->recursive = 0;
		// $this->set('reporterViewSpXs4zAccounts', $this->paginate());

		$ui_config = array(1=>'C/M',2=>'&nbsp;',3=>'&nbsp;');

		Configure::write('debug', 0);
		$this->set(
								compact(
													'bsu',
													'bsu_label',
													'fraction',
													'chart_index',
													'mod_index',
													'mod_index_one',
													'cyear',
													'months',
													'rest_chart_index',
													'chart',
													'json_months',
													'ui_bsu_index',
													'ui_mod_index',
													'ui_config'
											)
							);
	} // End index


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid reporter view sp xs4z account', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reporterViewSpXs4zAccount', $this->ReporterViewSpXs4zAccount->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ReporterViewSpXs4zAccount->create();
			if ($this->ReporterViewSpXs4zAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter view sp xs4z account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter view sp xs4z account could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reporter view sp xs4z account', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReporterViewSpXs4zAccount->save($this->data)) {
				$this->Session->setFlash(__('The reporter view sp xs4z account has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter view sp xs4z account could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReporterViewSpXs4zAccount->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reporter view sp xs4z account', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReporterViewSpXs4zAccount->delete($id)) {
			$this->Session->setFlash(__('Reporter view sp xs4z account deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Reporter view sp xs4z account was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
