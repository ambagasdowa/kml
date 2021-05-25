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
class PortalAppsMenuMakersController extends AppController {

	var $name = 'PortalAppsMenuMakers';


	function beforeFilter () {
		parent::beforeFilter();
		$this->Auth->allow(array('index','add'));
//		$this->Auth->allowedActions(array('index'));
	}






			function date_convert($date) {
					 //1. Transform request parameters to MySQL datetime format.
						 $date_return = null;
						 $date_init = new DateTime($date);
						 $start =  $date_init->format('Y-m-d H:i:s');
						 return $start;
					 
			}


	function index() {		
//		debug($this->PortalAppsMenuMaker->find('all'));
		//    $conditionsMenu['PortalAppsMenuMaker'] = 	'max(current)';
		//
 
		$last_id = $this->PortalAppsMenuMaker->find('first',array('fields'=>array("MAX([PortalAppsMenuMaker].id) as 'id'")));

			//	debug($last_id[0]['id']);
		$conditionsMenu['PortalAppsMenuMaker.id'] = $last_id[0]['id'];
		$json_menuix = $this->PortalAppsMenuMaker->find('list',array('fields'=>array('id','json_menu_string'),'conditions'=>$conditionsMenu));
//		debug($json_menuix);

		$json_menu = base64_decode(current($json_menuix));

		//NOTE Call to policias 
		$this->LoadModel('Policy');
		$conditionsPol['Policy.status'] = 'Active';
		$docs = $this->Policy->find('list',array('fields'=>array('link','name'),'conditions'=>$conditionsPol));

//		debug($docs);

		$this->set(compact('json_menu','docs'));

	}

	


	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid mk menu maker', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('mkMenuMaker', $this->MkMenuMaker->read(null, $id));
	}

	function add() {

		//NOTE This will clear all cached data, excluding cached view files
		Cache::clear();
		//NOTE if we need clear the then 
		//clearCache()

		debug($this->params);

            // Configure::write('debug',2);
             // App::uses('Xml', 'Lib');
   
   // $posted = base64_decode($this->params['named']['data']);
    $posted = $this->params['named']['data'];
    $posted_old = json_decode(base64_decode($this->params['named']['data']),true);
	 
		debug($posted);
//    $this->LoadModel('ProjectionsViewBussinessUni');
		$this->PortalAppsMenuMaker->query('SET ANSI_NULLS  ON;SET  ANSI_WARNINGS   ON;');
		
		debug($this->Auth->User('id'));	

		$save['PortalAppsMenuMaker']['user_id'] = $this->Auth->User('id');
		$save['PortalAppsMenuMaker']['json_menu_string'] = $posted;
//		$save['PortalAppsMenuMaker']['description'] = 'url string for main menu';
		$save['PortalAppsMenuMaker']['created'] = date('Y-m-d H:i:s');

	//	debug($save);

			$this->PortalAppsMenuMaker->create();
			if ($this->PortalAppsMenuMaker->save($save['PortalAppsMenuMaker'])) {
//				$this->Session->setFlash(__('The mk menu maker has been saved', true));
//				$this->redirect(array('action' => 'index'));
//				NOTE save to log
			} else {
//				$this->Session->setFlash(__('The mk menu maker could not be saved. Please, try again.', true));
//				NOTE again save to log
			}










  // $this->loadModel('AddenumViewAlbaranRelation');

/*
		if (!empty($this->data)) {
			$this->PortalAppsMenuMaker->create();
			if ($this->PortalAppsMenuMaker->save($this->data)) {
				$this->Session->setFlash(__('The mk menu maker has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mk menu maker could not be saved. Please, try again.', true));
			}
		}
*/
	}


	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid mk menu maker', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MkMenuMaker->save($this->data)) {
				$this->Session->setFlash(__('The mk menu maker has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mk menu maker could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MkMenuMaker->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for mk menu maker', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MkMenuMaker->delete($id)) {
			$this->Session->setFlash(__('Mk menu maker deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Mk menu maker was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
