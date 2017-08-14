
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<!-- <center> -->
      <?php 	echo $this->Session->flash();?>
      <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li>
					<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('PoliciesSubtypesDefinition.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('PoliciesSubtypesDefinition.id'))); ?>						</li>
				<li>
					<?php echo $this->Html->link(__('List Policies Subtypes Definitions', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>
				</li>
			</ul>
        </div>
<!-- </center> -->

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
				 <?php __('Edit Policies Subtypes Definition'); ?>
			</span>
		</h2>
		
          <?php echo $this->Form->create('PoliciesSubtypesDefinition',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="policiesSubtypesDefinitions form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
								echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
								echo $this->Form->input('name',array('placeholder'=>'name','class'=>'input','placeholder'=>'Name of the Subtype','label'=>false));
								echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'82'));

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


// 										$(document).on('change', '.btn-file :file', function() {
// 										var input = $(this),
// 											numFiles = input.get(0).files ? input.get(0).files.length : 1,
// 											label = input.val().replace(/\/g, '/').replace(/.*\//, '');
// 											input.trigger('fileselect', [numFiles, label]);
// 										});
// 										
// 										$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
// 											console.log(numFiles);
// 											console.log(label);
// 											document.getElementById('create.{ucfirst(edit)}').innerHTML = label;
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
											
													echo $this->Form->input('status',
														array(
																'type'=>'select',
																'options'=>array('Active'=>'Active','Inactive'=>'Inactive'),
																'class'=>'form-control',
																'label'=>false,
																'placeholder'=>'Status'
															 )
											    );
	?>
						<?php 	//echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
									
// 								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
// 									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
// 								e('</span>');
								?><!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php 
// 						echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))
					?>
					<?php 
						echo $this->Form->end(__('Submit', true));
					?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





