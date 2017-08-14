
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CasetasView.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CasetasView.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Casetas Views', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
						<li><?php echo $this->Html->link(__('List Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Historical Conciliations', true), array('controller' => 'casetas_historical_conciliations', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Events', true), array('controller' => 'casetas_controls_events', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Event', true), array('controller' => 'casetas_controls_events', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Pendings', true), array('controller' => 'casetas_pendings', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Pending', true), array('controller' => 'casetas_pendings', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Conciliations', true), array('controller' => 'casetas_conciliations', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Conciliation', true), array('controller' => 'casetas_conciliations', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Not Conciliations', true), array('controller' => 'casetas_not_conciliations', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Not Conciliation', true), array('controller' => 'casetas_not_conciliations', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Logs', true), array('controller' => 'casetas_logs', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Log', true), array('controller' => 'casetas_logs', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Casetas View'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('CasetasView',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="casetasViews form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('id_unidad',array('placeholder'=>'id_unidad','class'=>'input'));
		echo $this->Form->input('unit',array('placeholder'=>'unit','class'=>'input'));
		echo $this->Form->input('no_tarjeta_iave',array('placeholder'=>'no_tarjeta_iave','class'=>'input'));
		echo $this->Form->input('alpha_num_code',array('placeholder'=>'alpha_num_code','class'=>'input'));
		echo $this->Form->input('alpha_location',array('placeholder'=>'alpha_location','class'=>'input'));
		echo $this->Form->input('alpha_location_1',array('placeholder'=>'alpha_location_1','class'=>'input'));
		echo $this->Form->input('_filename',array('placeholder'=>'_filename','class'=>'input'));
		echo $this->Form->input('no_viaje',array('placeholder'=>'no_viaje','class'=>'input'));
		echo $this->Form->input('fecha_cruce',array('placeholder'=>'fecha_cruce','class'=>'input'));
		echo $this->Form->input('f_despachado',array('placeholder'=>'f_despachado','class'=>'input'));
		echo $this->Form->input('fecha_fin_viaje',array('placeholder'=>'fecha_fin_viaje','class'=>'input'));
		echo $this->Form->input('float_data',array('placeholder'=>'float_data','class'=>'input'));
		echo $this->Form->input('hora_cruce',array('placeholder'=>'hora_cruce','class'=>'input'));
		echo $this->Form->input('cia',array('placeholder'=>'cia','class'=>'input'));
		echo $this->Form->input('Monto_archivo',array('placeholder'=>'Monto_archivo','class'=>'input'));
		echo $this->Form->input('_next',array('placeholder'=>'_next','class'=>'input'));
		echo $this->Form->input('fecha_inicio',array('placeholder'=>'fecha_inicio','class'=>'input'));
		echo $this->Form->input('fecha_fin',array('placeholder'=>'fecha_fin','class'=>'input'));
		echo $this->Form->input('description_casetas',array('placeholder'=>'description_casetas','class'=>'input'));
		echo $this->Form->input('casetas_historical_conciliations_id',array('placeholder'=>'casetas_historical_conciliations_id','class'=>'input'));
		echo $this->Form->input('casetas_controls_files_id',array('placeholder'=>'casetas_controls_files_id','class'=>'input'));
		echo $this->Form->input('casetas_standings_id',array('placeholder'=>'casetas_standings_id','class'=>'input'));
		echo $this->Form->input('casetas_parents_id',array('placeholder'=>'casetas_parents_id','class'=>'input'));
		echo $this->Form->input('_status',array('placeholder'=>'_status','class'=>'input'));
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

    





