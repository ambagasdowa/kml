
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<!-- <center> -->
      <?php 	echo $this->Session->flash();?>
	<div class="col-md-offset-1 col-sm-11 col-md-11">
		<ul class="list-group list-inline">
			<li>
				<?php echo $this->Html->link(__('List Catalog Datas', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						
			</li>
			<li>
				<?php echo $this->Html->link(__('List Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?>
			</li>
			<li>
				<?php echo $this->Html->link(__('New Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?>
			</li>
			<li>
				<?php echo $this->Html->link(__('List Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?>
			</li>
			<li>
				<?php echo $this->Html->link(__('New Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?>
			</li>

		</ul>
	</div>
<!-- </center> -->

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
				 <?php __('Add Catalog Data'); ?>
			</span>
		</h2>
		
          <?php echo $this->Form->create('CatalogData',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="catalogDatas form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('catalog_names_id',array('placeholder'=>'catalog_names_id','class'=>'input'));
		echo $this->Form->input('catalog_fields_id',array('placeholder'=>'catalog_fields_id','class'=>'input'));
		echo $this->Form->input('catalog_data',array('placeholder'=>'catalog_data','class'=>'input'));
		echo $this->Form->input('catalog_data_description',array('placeholder'=>'catalog_data_description','class'=>'placeholder','label'=>false,'rows'=>'5','cols'=>'80'));

											if(checkBrowser($_SERVER['HTTP_USER_AGENT'],true) === TRUE) {
													echo $this->Form->input('create',
														array(	
																'type' => 'text',
																'label'=>false,
																'class'=>'input',
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
											
// 		echo $this->Form->input('status',array('placeholder'=>'status','class'=>'input'));
	?>
						<?php 
// 						echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
// 									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'rows'=>'5','cols'=>'80'));
// 								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
// 									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
// 								e('</span>');
								?><!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?>
					<div class="pull-right">
						<?php echo $this->Form->end(__('Submit', true));?>
					</div>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





