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
class ControlDeskUserControlsController extends AppController {

	var $name = 'ControlDeskUserControls';
	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript');



	function index() {

		// $this->ControlDeskUserControl->recursive = 0;

		$controlDeskUserControls = $this->ControlDeskUserControl->find('all');

		$this->set(compact('controlDeskUserControls'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid control desk user control', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('controlDeskUserControl', $this->ControlDeskUserControl->read(null, $id));
	}

	function add() {

		Configure::write('debug',2);
		if (!empty($this->data)) {
			debug($this->data);
			// NOTE search in controlDesk
			$the_id = $this->data['ControlDeskUserControl']['user_id'];
			$conditionsCtrl['ControlDeskUserControl.user_id'] = $the_id;
			$getControl = $this->ControlDeskUserControl->find('all',array('conditions'=>$conditionsCtrl));

			debug($getControl);

			if (!$getControl) {
//
					if ($this->data['ControlDeskUserControl']['nomina'] == true) {
						// NOTE go to search in mssql
						$this->LoadModel('User');
						$this->LoadModel('MssqlPayroll');

						$conditionsUser['User.id'] = $the_id;
						$getTheNum = $this->User->find('first',array('conditions'=>$conditionsUser));

						debug($getTheNum['User']);
						debug($getTheNum['User']['number_id']);

						$username = $getTheNum['User']['username'];

						$getPass = $this->MssqlPayroll->getPayrollByCompany($cvecia=null,$cveare=null,$cvepue=null,$cvetra=$getTheNum['User']['number_id']);

							if (!$getPass) {
								$this->Session->setFlash(__('this user must create in with option nomina = off ', true));
								$this->redirect(array('action' => 'index'));
							} else {
								$set_pass = current($getPass)['MssqlPayroll']['numrfc'];
								// debug($set_pass);
							}
							$save_this['ControlDeskUserControl']['user_id'] = $this->data['ControlDeskUserControl']['user_id'];
							$save_this['ControlDeskUserControl']['storage'] = 1;
							$save_this['ControlDeskUserControl']['clear_key'] = $set_pass;
						} else {
							$save_this = $this->data;
						}

						// NOTE add automation of users in Gst-Cloud

						// $conditionsOcUser['OcUser.uid'] = $username;
						// $this->LoadModel('OcUser');
						//
						// debug($this->OcUser->find('first',array('conditions'=>$conditionsOcUser)));
						//
						// if (!$this->OcUser->find('first',array('conditions'=>$conditionsOcUser))) {
						// 	// NOTE create user
						// 	debug("build the user");
						// }
						debug($save_this);

						$command = 'sudo -u www-data php /var/www/nextcloud/public_html/gstcloud/occ --help';
						// $command = '#!/bin/bash
            //             echo "TOP: Now start expecting things"
            //             expect -c \'
            //                 spawn sudo mount.davfs http://nextcloud/gstcloud/remote.php/webdav '.$mount_point.' -o '.$options.'
            //                 expect "Password: "
            //                 send \'"'.$access.'\r"\'
            //                 expect "$ "
            //                 send "exit\r"
            //                 expect "$ "
            //                 send "pbrun bash\r"
            //                 expect "$ "
            //                 send "exit\r"
            //                  \'
            //             ';

						exec($command,$response);
						debug($response);
						$output = shell_exec($command);
						debug($output);

						exit();

						$this->ControlDeskUserControl->create();
						if ($this->ControlDeskUserControl->save($save_this)) {
							//NOTE create a cloud user
							$this->Session->setFlash(__('The control desk user control has been saved', true));
							$this->redirect(array('action' => 'index'));
						} else {
							$this->Session->setFlash(__('The control desk user control could not be saved. Please, try again.', true));
						}

			} else {
					$this->Session->setFlash(__('This user already set ', true));
					$this->redirect(array('action' => 'index'));
			}
		}

		$users = $this->ControlDeskUserControl->User->find('list',array('fields'=>array('id','full_name')));
		Configure::write('debug',2);
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid control desk user control', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ControlDeskUserControl->save($this->data)) {
				$this->Session->setFlash(__('The control desk user control has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The control desk user control could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ControlDeskUserControl->read(null, $id);
		}
		$users = $this->ControlDeskUserControl->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for control desk user control', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ControlDeskUserControl->delete($id)) {
			$this->Session->setFlash(__('Control desk user control deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Control desk user control was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
