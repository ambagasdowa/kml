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
class ReporterViewsMainSubreportsController extends AppController {

	var $name = 'ReporterViewsMainSubreports';


	function index() {
		$this->ReporterViewsMainSubreport->recursive = 0;
		$this->set('reporterViewsMainSubreports', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid reporter views main subreport', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reporterViewsMainSubreport', $this->ReporterViewsMainSubreport->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ReporterViewsMainSubreport->create();
			if ($this->ReporterViewsMainSubreport->save($this->data)) {
				$this->Session->setFlash(__('The reporter views main subreport has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter views main subreport could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reporter views main subreport', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReporterViewsMainSubreport->save($this->data)) {
				$this->Session->setFlash(__('The reporter views main subreport has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter views main subreport could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReporterViewsMainSubreport->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reporter views main subreport', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReporterViewsMainSubreport->delete($id)) {
			$this->Session->setFlash(__('Reporter views main subreport deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Reporter views main subreport was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
