
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CasetasViewNotConciliation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CasetasViewNotConciliation.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Casetas View Not Conciliations', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
						<li><?php echo $this->Html->link(__('List Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Casetas View Not Conciliation'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('CasetasViewNotConciliation',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="casetasViewNotConciliations form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('period_iave_id',array('placeholder'=>'period_iave_id','class'=>'input'));
		echo $this->Form->input('fecha_ini',array('placeholder'=>'fecha_ini','class'=>'input'));
		echo $this->Form->input('fecha_fin',array('placeholder'=>'fecha_fin','class'=>'input'));
		echo $this->Form->input('name',array('placeholder'=>'name','class'=>'input'));
		echo $this->Form->input('no_viaje',array('placeholder'=>'no_viaje','class'=>'input'));
		echo $this->Form->input('f_despachado',array('placeholder'=>'f_despachado','class'=>'input'));
		echo $this->Form->input('fecha_real_viaje',array('placeholder'=>'fecha_real_viaje','class'=>'input'));
		echo $this->Form->input('fecha_real_fin_viaje',array('placeholder'=>'fecha_real_fin_viaje','class'=>'input'));
		echo $this->Form->input('id_unidad',array('placeholder'=>'id_unidad','class'=>'input'));
		echo $this->Form->input('iave_catalogo',array('placeholder'=>'iave_catalogo','class'=>'input'));
		echo $this->Form->input('id_ruta',array('placeholder'=>'id_ruta','class'=>'input'));
		echo $this->Form->input('desc_ruta',array('placeholder'=>'desc_ruta','class'=>'input'));
		echo $this->Form->input('id_caseta',array('placeholder'=>'id_caseta','class'=>'input'));
		echo $this->Form->input('diff_length_hours',array('placeholder'=>'diff_length_hours','class'=>'input'));
		echo $this->Form->input('no_de_ejes',array('placeholder'=>'no_de_ejes','class'=>'input'));
		echo $this->Form->input('orden',array('placeholder'=>'orden','class'=>'input'));
		echo $this->Form->input('desc_caseta',array('placeholder'=>'desc_caseta','class'=>'input'));
		echo $this->Form->input('monto_iave',array('placeholder'=>'monto_iave','class'=>'input'));
		echo $this->Form->input('tarifas',array('placeholder'=>'tarifas','class'=>'input'));
		echo $this->Form->input('trliq_fecha_ingreso',array('placeholder'=>'trliq_fecha_ingreso','class'=>'input'));
		echo $this->Form->input('_filename',array('placeholder'=>'_filename','class'=>'input'));
		echo $this->Form->input('casetas_controls_files_id',array('placeholder'=>'casetas_controls_files_id','class'=>'input'));
		echo $this->Form->input('casetas_historical_conciliations_id',array('placeholder'=>'casetas_historical_conciliations_id','class'=>'input'));
		echo $this->Form->input('fecha_conciliacion',array('placeholder'=>'fecha_conciliacion','class'=>'input'));
		echo $this->Form->input('_modified',array('placeholder'=>'_modified','class'=>'input'));
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

    





