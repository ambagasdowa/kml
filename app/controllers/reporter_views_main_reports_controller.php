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
		* @mail	     		 baizabal.jesus@gmail.com
		* @package       cake
		* @subpackage    cake.cake.console.libs.templates.views
		* @since         CakePHP(tm) v 1.2.0.5234
		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
		*/
?>

<?php
class ReporterViewsMainReportsController extends AppController {

	var $name = 'ReporterViewsMainReports';


	function index() {
		$this->ReporterViewsMainReport->recursive = 0;
		$this->set('reporterViewsMainReports', $this->paginate());
	}

	function view($id = null , $page = null) {
		// debug($this->data);
		// debug($this->params);
		// debug($id);
		// debug($page);

		if (!$id) {
			$this->Session->setFlash(__('Invalid reporter views main report', true));
			$this->redirect(array('action' => 'index'));
		}

		$this->LoadModel('ReporterViewsMainSubreport');

		$this->paginate =	 array (
			 'conditions' => array ('ReporterViewsMainSubreport.RowFormatID' => $id),
			 'order' 			=> array ('ReporterViewsMainSubreport.RowNumber' => 'asc'),
			 'limit' 			=> 100
		);
		$reporterViewsMainSubreports = $this->paginate('ReporterViewsMainSubreport');
		$this->set(compact('reporterViewsMainSubreports','page'));
	}

	function add( $id = null ) {

	if (!empty($this->data)) {

			// for set the data in key table
			// ask for $this->data
			// debug($this->data);
			$page = $this->data['ReporterViewsMainReport']['page'];
			$pushData['ReporterTableKey']['_key'] = $this->data['ReporterViewsMainReport']['_key'];
			$pushData['ReporterTableKey']['_description'] = $this->data['ReporterViewsMainReport']['_description'];
			$pushData['ReporterTableKey']['row_detail_id'] = $this->data['ReporterViewsMainReport']['RowDetailID'];
			$this->LoadModel('ReporterTableKey');

			$this->ReporterTableKey->create();
			if ($this->ReporterTableKey->save($pushData)) {
				$this->Session->setFlash(__('The reporter views main report has been saved', true));
				// $this->redirect(array('action' => 'index'));
				// index/page:2/sort:index_id/direction:asc
				$this->redirect(array('action' => 'index/page:'.$page.'/sort:index_id/direction:asc'));
			} else {
				$this->Session->setFlash(__('The reporter views main report could not be saved. Please, try again.', true));
			}

		} else {

			// debug($this->params);
			$page = $this->params['named']['page'];
			$rowDetailID = $this->params['named']['id'];
			$this->LoadModel('ReporterViewsMainSubreportsAccount');

			$this->paginate =	 array (
				 'conditions' => array ('ReporterViewsMainSubreportsAccount.RowDetailID' => $rowDetailID),
				 'order'			=> array ('ReporterViewsMainSubreportsAccount.DisplayOrder' => 'asc' ),
				 'limit' 			=> 100
			);

			$reporterViewsMainSubreportsAccounts = $this->paginate('ReporterViewsMainSubreportsAccount');
			// debug($reporterViewsMainSubreportsAccounts);
			$this->set(compact('reporterViewsMainSubreportsAccounts','rowDetailID','page'));
		//

		}

	} // End function

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reporter views main report', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ReporterViewsMainReport->save($this->data)) {
				$this->Session->setFlash(__('The reporter views main report has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reporter views main report could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ReporterViewsMainReport->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reporter views main report', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ReporterViewsMainReport->delete($id)) {
			$this->Session->setFlash(__('Reporter views main report deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Reporter views main report was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
