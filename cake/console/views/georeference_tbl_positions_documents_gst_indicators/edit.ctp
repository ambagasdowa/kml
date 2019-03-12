
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('GeoreferenceTblPositionsDocumentsGstIndicator.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('GeoreferenceTblPositionsDocumentsGstIndicator.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Georeference Tbl Positions Documents Gst Indicators', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Georeference Tbl Positions Documents Gst Indicator'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('GeoreferenceTblPositionsDocumentsGstIndicator',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="georeferenceTblPositionsDocumentsGstIndicators form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('AsignacionDesc',array('placeholder'=>'AsignacionDesc','class'=>'input'));
		echo $this->Form->input('Seguimiento',array('placeholder'=>'Seguimiento','class'=>'input'));
		echo $this->Form->input('StatusDescription',array('placeholder'=>'StatusDescription','class'=>'input'));
		echo $this->Form->input('statdesc',array('placeholder'=>'statdesc','class'=>'input'));
		echo $this->Form->input('enBase',array('placeholder'=>'enBase','class'=>'input'));
		echo $this->Form->input('inBase',array('placeholder'=>'inBase','class'=>'input'));
		echo $this->Form->input('DescriptionViaje',array('placeholder'=>'DescriptionViaje','class'=>'input'));
		echo $this->Form->input('traceroute',array('placeholder'=>'traceroute','class'=>'input'));
		echo $this->Form->input('Area',array('placeholder'=>'Area','class'=>'input'));
		echo $this->Form->input('Unidad',array('placeholder'=>'Unidad','class'=>'input'));
		echo $this->Form->input('Asignacion',array('placeholder'=>'Asignacion','class'=>'input'));
		echo $this->Form->input('status_asignacion',array('placeholder'=>'status_asignacion','class'=>'input'));
		echo $this->Form->input('seguimiento_actual',array('placeholder'=>'seguimiento_actual','class'=>'input'));
		echo $this->Form->input('FechaAsignacion',array('placeholder'=>'FechaAsignacion','class'=>'input'));
		echo $this->Form->input('Viaje',array('placeholder'=>'Viaje','class'=>'input'));
		echo $this->Form->input('Despachado',array('placeholder'=>'Despachado','class'=>'input'));
		echo $this->Form->input('Operador',array('placeholder'=>'Operador','class'=>'input'));
		echo $this->Form->input('Latitud',array('placeholder'=>'Latitud','class'=>'input'));
		echo $this->Form->input('Longitud',array('placeholder'=>'Longitud','class'=>'input'));
		echo $this->Form->input('FechaPosition',array('placeholder'=>'FechaPosition','class'=>'input'));
		echo $this->Form->input('id_geocerca',array('placeholder'=>'id_geocerca','class'=>'input'));
		echo $this->Form->input('base',array('placeholder'=>'base','class'=>'input'));
		echo $this->Form->input('max_latitud',array('placeholder'=>'max_latitud','class'=>'input'));
		echo $this->Form->input('min_latitud',array('placeholder'=>'min_latitud','class'=>'input'));
		echo $this->Form->input('max_longitud',array('placeholder'=>'max_longitud','class'=>'input'));
		echo $this->Form->input('min_longitud',array('placeholder'=>'min_longitud','class'=>'input'));
		echo $this->Form->input('control_id',array('placeholder'=>'control_id','class'=>'input'));
		echo $this->Form->input('status',array('placeholder'=>'status','class'=>'input'));
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

    





