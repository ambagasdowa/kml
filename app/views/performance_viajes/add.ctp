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
    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
    // $evaluate = false;
    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
    // blog
    $evaluate = true;
    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
    $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
?>



<?php 	echo $this->Session->flash();?>

<?php
    if ($performanceFacturaStatus == true) {
      $new_dates = array('recepcionEvidencias','entregaEvidenciasCliente','validacionEvidenciasCliente');

      foreach ($new_dates as $inx => $new_name) {
        $new_promise[$new_name] = new datetime($performanceViajes['PerformanceViaje'][$new_name]);
        $new_dates[$new_name] = $new_promise[$new_name]->format('Y/m/d');
      }
      extract($new_dates, EXTR_PREFIX_SAME, "wddx");
    }

    // debug($performanceViajes['PerformanceViaje']);
?>

		<div class="colorbax">

      <div class="row">

        <h5>
          <i class="fa fa-file-o"></i>
          <span>
          		 Agregar Fechas
          </span>
        </h5>

      </div>


    <div class="row">

      <ul class="list-group">
        <li class="list-group-item"> Guia : &nbsp; <?php echo $performanceViajes['PerformanceViaje']['performance_num_guia_id'] ?></li>
        <li class="list-group-item"> Viaje : &nbsp; <?php echo $performanceViajes['PerformanceViaje']['performance_no_viaje_id'] ?></li>
        <li class="list-group-item"> Unidad de Negocio : &nbsp; <?php echo $performanceViajes['PerformanceViaje']['bsu'] ?></li>
      </ul>
    </div>

  <?php echo $this->Form->create('PerformanceFactura',array('enctype' => 'multipart/form-data','class'=>'form','id'=>'post_form'));?>

			<div class="performanceFacturas form">
        	<?php
            // this always set a value
            // var_dump($performanceViajes['PerformanceViaje']['id']);

            if ( isset($performanceViajes['PerformanceViaje']['id']) ) {

              echo $this->Form->input(
                          'id',
                          array(
                                'type'        => 'hidden',
                                'value'       => $performanceViajes['PerformanceViaje']['id'],
                                'placeholder' => 'id',
                                'class'       => 'u-full-width',
                                'label'       => false
                               )
                  );
            }


        		echo $this->Form->input(
                        'performance_num_guia_id',
                        array(
                              'type'        => 'hidden',
                              'value'       => $performanceViajes['PerformanceViaje']['performance_num_guia_id'],
                              'placeholder' => 'performance_num_guia_id',
                              'class'       => 'u-full-width',
                              'label'       => false
                             )
                );

        		echo $this->Form->input(
                        'performance_no_guia_id',
                        array(
                              'type'        =>  'hidden',
                              'value'       =>  $performanceViajes['PerformanceViaje']['performance_no_guia_id'],
                              'placeholder' =>  'performance_no_guia_id',
                              'label'       =>  false,
                              'class'       =>  'u-full-width'
                             )
                  );

        		echo $this->Form->input(
                        'performance_no_viaje_id',
                        array(
                              'type'        => 'hidden',
                              'value'       => $performanceViajes['PerformanceViaje']['performance_no_viaje_id'],
                              'placeholder' => 'performance_bsus_id',
                              'label'       => false,
                              'class'       => 'u-full-width'
                             )
                  );

        		echo $this->Form->input(
                        'projections_corporations_id',
                        array(
                              'type'        => 'hidden',
                              'value'       => $performanceViajes['PerformanceViaje']['projections_corporations_id'],
                              'placeholder' => 'performance_bsus_id',
                              'label'       => false,
                              'class'       => 'u-full-width'
                             )
                  );

        		echo $this->Form->input(
                        'id_area',
                        array(
                              'type'        => 'hidden',
                              'value'       => $performanceViajes['PerformanceViaje']['id_area'],
                              'placeholder' => 'performance_bsus_id',
                              'label'       => false,
                              'class'       => 'u-full-width'
                             )
                  );

              // but this
        		echo $this->Form->input(
                        'recepcionEvidencias',
                        array(
                              'type'=>'text',
                              'id'=> 'datepicker_deliver',
                              'placeholder'=>'recepcionEvidencias',
                              // 'value'      => ($performanceFacturaStatus == true ? $recepcionEvidencias : ''), // check this??
                              'value'      => $recepcionEvidencias, // check this??
                              'class'=>'u-full-width'
                             )
                 );

        		echo $this->Form->input(
                        'entregaEvidenciasCliente',
                        array(
                              'type'=>'text',
                              'placeholder'=>'entregaEvidenciasCliente',
                              'id'=>'datepicker_aproved',
                              'value'      => $entregaEvidenciasCliente,
                              'class'=>'u-full-width'
                             )
                  );
        		// echo $this->Form->input(
            //             'fechaPromesaPago',
            //             array(
            //                  'type'=>'text',
            //                  'id'=>'datepicker_promise',
            //                  'placeholder'=>'fechaPromesaPago',
            //                  'value'      => ($performanceFacturaStatus == true ? $fechaPromesaPago : ''),
            //                  'class'=>'u-full-width'
            //                  )
            //       );
        		echo $this->Form->input(
                        'validacionEvidenciasCliente',
                        array(
                             'type'=>'text',
                             'id'=>'datepicker_payment',
                             'placeholder'=>'validacionEvidenciasCliente',
                             'value'      =>  $validacionEvidenciasCliente ,
                             'class'=>'u-full-width'
                             )
                );

        		echo $this->Form->input(
                        'user_id',
                        array(
                             'type' => 'hidden',
                             'value' => $_SESSION['Auth']['User']['id'],
                             'class'=>'u-full-width'
                             )
                );
        		echo $this->Form->input('status',array('type'=>'hidden','value'=>true,'placeholder'=>'status','class'=>'u-full-width'));
        		echo $this->Form->input('dataUpdate',array('type'=>'hidden','value'=>$performanceFacturaStatus));
        	?>
			</div>
		</div> <!--container-->

    <div class="button_send">
      <a  id="add_update" data-update="<?php e($performanceFacturaStatus)?>" href="#" class="btn btn-primary btn-sm pull-right">
        <?php $performanceFacturaStatus?e('Actualizar Registro'):e('Agregar Nuevo'); ?>
      </a>
    </div>
