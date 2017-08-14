<?php ?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li class="list-group-item">
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Company.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Company.id'))); ?>						</li>
										<li class="list-group-item">
							<?php echo $this->Html->link(__('List Companies', true), array('action' => 'index'));?>						</li>
						<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>

			</ul>
        </div>
        

        <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main">
          <?php echo $this->Form->create('Company');?>
			<div class="companies form">

				<legend>
					<?php __('Edit Company'); ?>				</legend>
<!-- 				 -->
				<div class="table-responsive">
					<table class="table table-bordered table-hover table-striped responstable">
							<?php
		echo $this->Form->input('id',array('class'=>'form-control'));
		echo $this->Form->input('user_id',array('class'=>'form-control'));
		echo $this->Form->input('group_id',array('class'=>'form-control'));
		echo $this->Form->input('name',array('class'=>null));
		echo $this->Form->input('description',array('class'=>'placeholder'));

											if(checkBrowser($_SERVER['HTTP_USER_AGENT'],true) === TRUE) {
													echo $this->Form->input('create',
														array(	
																'type' => 'text',
																'label'=>false,
																'class'=>'form-control',
																'placeholder'=>'Seleccione una fecha',
																'id'=>'calendar_create',
																'value'=>''
														)
												);
												?>
									<script>
									/*-------------------------------------------
										Function for jQuery-UI page (ui_jquery-ui.html)
									---------------------------------------------*/
										require(['jquery','jquery-ui','bootstrap'], function($) {
											$(document).ready(function () {
											
											// Define the Spanish languaje
												$.datepicker.regional['es'] = {
												closeText: 'Cerrar',
												prevText: '<Ant',
												nextText: 'Sig>',
												currentText: 'Hoy',
												monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
												monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
												dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
												dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
												dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
												weekHeader: 'Sm',
												dateFormat: 'dd/mm/yy',
												firstDay: 1,
												isRTL: false,
												showMonthAfterYear: false,
												yearSuffix: ''
												};
												$.datepicker.setDefaults($.datepicker.regional['es']);
											// start the datepicker

												$(function () {
														$('#calendar_create').datepicker({showButtonPanel: true});
												});

		// 										$('#calendar_create').datepicker({
		// 																showButtonPanel: true
		// 										});
											});
										});
									</script>
												<?php
											} else {

													echo $this->Form->text('create',
																	array('type' => 'date',
																	'label'=>false,
																	'class'=>'form-control',
																	'value'=>date('Y-m-d'),
																	'dateFormat' => 'DMY',
																	'min' => '2010-08-14',
// 																	'max' => '2036-12-31',
																	'separator'=>'/',
																	'placeholder'=>'Buscar registro => Ingresa Fecha en formato (yy-mm-dd) (alt+shift+b)'
																	)
														);
											}
		echo $this->Form->input('company_id',array('class'=>'form-control','selected'=>$company_id));
		echo $this->Form->input('status');
	?>
						
					</table>
				</div> 
          <!--end table response-->
					<?php //echo $this->Form->button('Submit', array('class'=>'btn btn-success'));?>
					<?php echo $this->Form->end(__('Submit',true));?>
			</div>

        </div> <!--main-->
      </div> <!--row-->
    </div> <!--container fluid-->

    





