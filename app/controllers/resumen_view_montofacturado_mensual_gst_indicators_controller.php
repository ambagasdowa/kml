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
class ResumenViewMontofacturadoMensualGstIndicatorsController extends AppController {

	var $name = 'ResumenViewMontofacturadoMensualGstIndicators';

	function get (){
		Configure::write('debug',2);

		$posted = json_decode(base64_decode($this->params['named']['data']),true);
		// debug($posted);
		// exit();
		$conditions = array();
		$add_conditions = array();
		foreach ($posted as $keys => $postvalue) {

			if ($keys > 0 ) {
				$content = $postvalue['name'];
				// debug($postvalue['value']);
				$chars = preg_split('/\[([^\]]*)\]/i', $content, -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
				// debug($chars);
				if ( isset($chars[1]) && $chars[1] == 'ResumenViewMontofacturadoMensualGstIndicators' && $postvalue['value'] != '') {
					$add_conditions[$chars[2]] = $postvalue['value'];
					$conditions[$chars[2]] = $postvalue['value'];
				}
				// if(isset($chars[2])) {
				// 	$conditions[$chars[2]] = $postvalue['value'];
				// }
			}
		}
		// debug($conditions);
		// debug($add_conditions);
		//
		// exit();
			$model_id = $add_conditions['model_id'] ;

			$models[0][0] = 'ResumenViewMontofacturadoMensualGstIndicator';
			$models[0][1] = 'ResumenViewMontofacturadoUnidadGstIndicator';
			$models[1][0] = 'ResumenViewViajesMensualGstIndicator';
			$models[1][1] = 'ResumenViewViajesMensualpoblacionGstIndicator';

			$this->LoadModel('ResumenViewMontofacturadoMensualGstIndicator');
			$this->LoadModel('ResumenViewMontofacturadoUnidadGstIndicator');
			$this->LoadModel('ResumenViewViajesMensualGstIndicator');
			$this->LoadModel('ResumenViewViajesMensualpoblacionGstIndicator');

			$conditions = array();
			foreach ($models[$model_id] as $key => $modelo) {
				$conditions[$model_id][$key][$modelo.'.id_area'] = $add_conditions['id_area'];
				$conditions[$model_id][$key][$modelo.'.periodo'] = $add_conditions['periodo'];
			}

		// debug($conditions);
		$resumenViewGrands = $this->$models[$model_id][0]->find('all',array('conditions'=>$conditions[$model_id][0]));
		$resumenViewDetails = $this->$models[$model_id][1]->find('all',array('conditions'=>$conditions[$model_id][1]));

		// debug
		// debug($resumenViewGrands);
		// debug($resumenViewDetails);
// exit();

		$this->set(compact('resumenViewGrands','resumenViewDetails','model_id'));

	} // end get function



	function index() {
		// $this->ResumenViewMontofacturadoMensualGstIndicator->recursive = 0;
		// $this->set('resumenViewMontofacturadoMensualGstIndicators', $this->paginate());
		$this->LoadModel('ProjectionsViewBussinessUnit');
		$this->LoadModel('ProjectionsViewFraction');

		$bssus = $this->ProjectionsViewBussinessUnit->find('list',array('fields'=>array('id','name')));
		$operacion = $this->ProjectionsViewFraction->find('list',array('fields'=>array('id','desc_producto')));
		// debug($bssus);
		// add periodo
		//
		// $this->RendViewFullGstCoreIndicator->recursive = 0;
		// $this->set('rendViewFullGstCoreIndicators', $this->paginate());
		$this->set(compact('bssus','operacion'));

	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('resumenViewMontofacturadoMensualGstIndicator', $this->ResumenViewMontofacturadoMensualGstIndicator->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ResumenViewMontofacturadoMensualGstIndicator->create();
			if ($this->ResumenViewMontofacturadoMensualGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ResumenViewMontofacturadoMensualGstIndicator->save($this->data)) {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The resumen view montofacturado mensual gst indicator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ResumenViewMontofacturadoMensualGstIndicator->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for resumen view montofacturado mensual gst indicator', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ResumenViewMontofacturadoMensualGstIndicator->delete($id)) {
			$this->Session->setFlash(__('Resumen view montofacturado mensual gst indicator deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Resumen view montofacturado mensual gst indicator was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
