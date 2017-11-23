
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
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

      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PerformanceTrip.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PerformanceTrip.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Performance Trips', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Performance Trip'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('PerformanceTrip',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="performanceTrips form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('id_area',array('placeholder'=>'id_area','class'=>'input'));
		echo $this->Form->input('id_unidad',array('placeholder'=>'id_unidad','class'=>'input'));
		echo $this->Form->input('id_configuracionviaje',array('placeholder'=>'id_configuracionviaje','class'=>'input'));
		echo $this->Form->input('id_tipo_operacion',array('placeholder'=>'id_tipo_operacion','class'=>'input'));
		echo $this->Form->input('id_fraccion',array('placeholder'=>'id_fraccion','class'=>'input'));
		echo $this->Form->input('id_flota',array('placeholder'=>'id_flota','class'=>'input'));
		echo $this->Form->input('no_viaje',array('placeholder'=>'no_viaje','class'=>'input'));
		echo $this->Form->input('num_guia',array('placeholder'=>'num_guia','class'=>'input'));
		echo $this->Form->input('no_guia',array('placeholder'=>'no_guia','class'=>'input'));
		echo $this->Form->input('f_despachado',array('placeholder'=>'f_despachado','class'=>'input'));
		echo $this->Form->input('fecha_guia',array('placeholder'=>'fecha_guia','class'=>'input'));
		echo $this->Form->input('fecha_ingreso',array('placeholder'=>'fecha_ingreso','class'=>'input'));
		echo $this->Form->input('fecha_modifico',array('placeholder'=>'fecha_modifico','class'=>'input'));
		echo $this->Form->input('mes',array('placeholder'=>'mes','class'=>'input'));
		echo $this->Form->input('cliente',array('placeholder'=>'cliente','class'=>'input'));
		echo $this->Form->input('kms_viaje',array('placeholder'=>'kms_viaje','class'=>'input'));
		echo $this->Form->input('kms_real',array('placeholder'=>'kms_real','class'=>'input'));
		echo $this->Form->input('subtotal',array('placeholder'=>'subtotal','class'=>'input'));
		echo $this->Form->input('peso',array('placeholder'=>'peso','class'=>'input'));
		echo $this->Form->input('configuracion_viaje',array('placeholder'=>'configuracion_viaje','class'=>'input'));
		echo $this->Form->input('tipo_de_operacion',array('placeholder'=>'tipo_de_operacion','class'=>'input'));
		echo $this->Form->input('flota',array('placeholder'=>'flota','class'=>'input'));
		echo $this->Form->input('area',array('placeholder'=>'area','class'=>'input'));
		echo $this->Form->input('fraccion',array('placeholder'=>'fraccion','class'=>'input'));
		echo $this->Form->input('company',array('placeholder'=>'company','class'=>'input'));
		echo $this->Form->input('trip_count',array('placeholder'=>'trip_count','class'=>'input'));
	?>
						<?php 	echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
								e('</span>');
								?><!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?><?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





