
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
							<?php echo $this->Html->link(__('List Projections View Full Gst Xls Indicators', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Projections View Full Gst Xls Indicator'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ProjectionsViewFullGstXlsIndicator',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="projectionsViewFullGstXlsIndicators form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id_area',array('placeholder'=>'id_area','class'=>'input'));
		echo $this->Form->input('mes',array('placeholder'=>'mes','class'=>'input'));
		echo $this->Form->input('id_tipo_operacion',array('placeholder'=>'id_tipo_operacion','class'=>'input'));
		echo $this->Form->input('projections_rp_definition',array('placeholder'=>'projections_rp_definition','class'=>'input'));
		echo $this->Form->input('area',array('placeholder'=>'area','class'=>'input'));
		echo $this->Form->input('periodo',array('placeholder'=>'periodo','class'=>'input'));
		echo $this->Form->input('FlagIsDisminution',array('placeholder'=>'FlagIsDisminution','class'=>'input'));
		echo $this->Form->input('FlagIsProvision',array('placeholder'=>'FlagIsProvision','class'=>'input'));
		echo $this->Form->input('FlagIsNextMonth',array('placeholder'=>'FlagIsNextMonth','class'=>'input'));
		echo $this->Form->input('kms',array('placeholder'=>'kms','class'=>'input'));
		echo $this->Form->input('subtotal',array('placeholder'=>'subtotal','class'=>'input'));
		echo $this->Form->input('peso',array('placeholder'=>'peso','class'=>'input'));
		echo $this->Form->input('viajes',array('placeholder'=>'viajes','class'=>'input'));
		echo $this->Form->input('year',array('placeholder'=>'year','class'=>'input'));
		echo $this->Form->input('tpo',array('placeholder'=>'tpo','class'=>'input'));
		echo $this->Form->input('fecha',array('placeholder'=>'fecha','class'=>'input'));
		echo $this->Form->input('id_month',array('placeholder'=>'id_month','class'=>'input'));
		echo $this->Form->input('is_current',array('placeholder'=>'is_current','class'=>'input'));
		echo $this->Form->input('labDays',array('placeholder'=>'labDays','class'=>'input'));
		echo $this->Form->input('labRestDays',array('placeholder'=>'labRestDays','class'=>'input'));
		echo $this->Form->input('labFullDays',array('placeholder'=>'labFullDays','class'=>'input'));
		echo $this->Form->input('PresupuestoIngresos',array('placeholder'=>'PresupuestoIngresos','class'=>'input'));
		echo $this->Form->input('PresupuestoKms',array('placeholder'=>'PresupuestoKms','class'=>'input'));
		echo $this->Form->input('PresupuestoTon',array('placeholder'=>'PresupuestoTon','class'=>'input'));
		echo $this->Form->input('PresupuestoViajes',array('placeholder'=>'PresupuestoViajes','class'=>'input'));
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

    





