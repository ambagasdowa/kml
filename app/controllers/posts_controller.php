<?php
class PostsController extends AppController {

	var $name = 'Posts';

	var $components = array('RequestHandler','Session','Search.Prg');
	var $helpers = array('Html','Form','Ajax','Javascript','Js');
/**
 * Fields to preset in search forms.
 *
 * @var array $presetVars
 * @see Search.PrgComponent 
 * @access public
 */
 
 // JW - Field names and type of search defined in plugin documentation.
 // JW - these are based on the search form field names. Type value as a more or less standard search. 
	var $presetVars = array( 
		array('field' => 'title', 'type' => 'value'),
// 		array('field' => 'body', 'type' => 'value'),
	);
/**
 * Before filter callback
 * Pass the correct Ticket data to the view where needed
 * 
 * @return void
 * @access public
 */

 // JW - Callbacks for data loading the add.ctp based on the model __construct() (see model for details).

	function beforeFilter() {
		
		parent::beforeFilter();
		$this->Auth->allowedActions = array('index', 'view');
	}
	
	function index() {
		
		$this->Prg->commonProcess();
		
		$this->paginate = array(
			'conditions' => $this->Post->parseCriteria($this->passedArgs),
			'limit' => '2'
		);
		
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	


}
