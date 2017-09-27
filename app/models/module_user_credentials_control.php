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
class ModuleUserCredentialsControl extends AppModel {
	var $name = 'ModuleUserCredentialsControl';
	var $useDbConfig = 'mssql_sistemas';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ModuleUserCredentialsMains' => array(
			'className' => 'ModuleUserCredentialsMain',
			'foreignKey' => 'module_user_credentials_mains_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


			function getCredentials ( $mode=null, $options=array() ) {
				/**
					*		NOTE call to view sistemas.dbo.reporter_costos
					*		@function fetch_costos_units
					*		@param <cperiod> define the period to calculate
					*		@param mode : compact , detail , semi-detail ??
					*		@param $options = array('period'=>'','backward'=>null,'forward'=>null);
					*		@return fetch the matrix with the condensed data
					*		@debug(date("Y/m/d H:i:s"). substr((string)microtime(), 1, 6));
					*/

					// App::import('model','User');
					//   $User = new User();
					//   $Users = $User->find('list',array('fields'=>array('id','username')));

					// exit();

					if ( $mode == null  ) { // NOTE no mode do nothing or act as defaults current period

						print_r("params => \$mode  : compact , detail .... etc ; \$options => array('period'=>array(),'backward'=>array(),'forward'=>array())");
						exit();

					} elseif ( $mode != null && is_string($mode) ) { //NOTE first check

						//NOTE if mode exists the check options
						if ( $options != null && is_array($options) ) {
								// NOTE this is for raw method
							$user_id = ( array_key_exists('user_id',$options) ? $options['user_id'] : false ) ?: $this->Auth->User('id') ;	//NOTE if false calculate months backward
							// NOTE for get method
							$conditions['ModuleUserCredentialsControl.user_id'] = $user_id;
						} else {
							// NOTE set the defaults
							// $tachion_backward = ($cdate == 1 ?: --$cdate) ;
						}
						//NOTE build the querys
						if ($mode == 'all') { // NOTE Now check the options
							//NOTE  query the compact version of costos

									$theQuery = $this->query(
												"
													select
																 mn.module_description
																,mn.model_name
																,mn.database_name
																,mn.database_column
																,mn.model_option_var
																,mn.is_in
																,mn.module_ui_name
																,ctrl.module_user_credentials_mains_id
																,ctrl.user_id
																,ctrl.value
													from
																sistemas.dbo.module_user_credentials_controls as ctrl
													inner join
																sistemas.dbo.module_user_credentials_mains as mn
														on
																ctrl.module_user_credentials_mains_id = mn.id
													where user_id = '{$user_id}'
											"
									);

									// NOTE now do the maths for a better presentation
									$conditionsModule = null;
									foreach ($theQuery as $inx => $theQArr ) {
										$conditionsModule[$this->name][current($theQArr)['model_option_var']][current($theQArr)['model_name'].'.'.current($theQArr)['database_column']][] = current($theQArr)['value'];
									}
									if (!empty($conditionsModule)) {
										$module = $conditionsModule;
									} else {
										$module = null;
									}

									// $module = $conditions;
									// return $theQuery;
						} // end all
						if ($mode == 'get') { // NOTE Now check the options
							//NOTE  query the compact version of costos
									$theQuery = $this->find('list',array('conditions'=>$conditions,'fields'=>array('id','value')));
									// return $theQuery;
									$module = $theQuery;
						} // end all




						// NOTE until hir i have a module variable
					// NOTE Moded
						// $auth_users = array(
						// 												// jesus baizabal
						// 												'1'=>array('areas'=>array('GUADALAJARA','LA PAZ'),'bsu'=>array('GUADALAJARA','LA PAZ'),'bsu_label'=>array('GUADALAJARA','LA PAZ'),'fraction'=>array('GRANEL'),'type'=>array('toneladas','viajes')),
						// 												// jorge.floresb
						// 												'96'=>array('areas'=>array('GUADALAJARA','LA PAZ'),'bsu'=>array('GUADALAJARA','LA PAZ'),'bsu_label'=>array('GUADALAJARA','LA PAZ'),'fraction'=>array('GRANEL'))
						// 									 );

					// 	if (array_key_exists($_SESSION['Auth']['User']['id'],$auth_users) === true) { // set areas
					//
					// 			if (array_key_exists('areas',$auth_users[$_SESSION['Auth']['User']['id']])) { // set filter for graphics
					// 					$conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.area'] = $auth_users[$_SESSION['Auth']['User']['id']]['areas'];
					// 			}
					// 			if (array_key_exists('bsu',$auth_users[$_SESSION['Auth']['User']['id']])) { // set logical areas filter
					// 					$bsu_conditions['ProjectionsViewBussinessUnit.name'] = $auth_users[$_SESSION['Auth']['User']['id']]['bsu'];
					// 			}
					// 			if (array_key_exists('bsu_label',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI areas filter
					// 					$bsu_label_conditions['ProjectionsViewBussinessUnit.label'] = $auth_users[$_SESSION['Auth']['User']['id']]['bsu_label'];
					// 			}
					// 			if (array_key_exists('fraction',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI fraction filter
					// 					$fraction_conditions['ProjectionsViewFraction.desc_producto'] = $auth_users[$_SESSION['Auth']['User']['id']]['fraction'];
					// 					$conditions_chart_index['ProjectionsViewIndicatorsPeriodsFullFleet.fraccion'] = $auth_users[$_SESSION['Auth']['User']['id']]['fraction'];
					// 			}
					// 			if (array_key_exists('type',$auth_users[$_SESSION['Auth']['User']['id']])) { // set UI type-tabbed filter
					// 					$conditions_mod_index['ProjectionsConfig.module_data_definition'] = $auth_users[$_SESSION['Auth']['User']['id']]['type'];
					// 			}
					// //             .... add more filters
					// 	}
					//
					// 	// debug($conditions_chart_index);
					// 	debug($bsu_conditions);
					// 	// debug($bsu_label_conditions);
					// 	debug($fraction_conditions);
						// debug($conditions_mod_index);
						//
						// debug($auth_users);

						// NOTE Moded

					} // end else

					return $module;
			} // end function getCredentials

}
