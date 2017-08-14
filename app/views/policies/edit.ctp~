<?php //edit?>
<?php //debug($this->params);?>

<?php echo $this->Session->flash();?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

				<li class="list-group-item">
					<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Policy.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Policy.id'))); ?>
				</li>
				<li class="list-group-item">
					<?php echo $this->Html->link(__('List Policies', true), array('action' => 'index'));?>
				</li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List Policies Anexos', true), array('controller' => 'policies_anexos', 'action' => 'index')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('New Anexo', true), array('controller' => 'policies_anexos', 'action' => 'add')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('List Policies Filters', true), array('controller' => 'policies_filters', 'action' => 'index')); ?> </li>
				<li class="list-group-item"><?php echo $this->Html->link(__('New Filter', true), array('controller' => 'policies_filters', 'action' => 'add')); ?> </li>

			</ul>
        </div>
        

        <div class="container">

		  <i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading"><span>Editar Documento</span></h2>
		  
          <?php echo $this->Form->create('Policy');?>
<!-- 			<div class="policies form"> -->

<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
									echo $this->Form->input('id',array('class'=>'form-control'));
									echo $this->Form->input('user_id',array('class'=>'form-control'));
									echo $this->Form->input('group_id',array('class'=>'form-control'));
// 									echo $this->Form->input('empresa_id',array('class'=>'form-control'));
// 									echo $this->Form->input('policies_path',array('class'=>'form-control'));
									echo $this->Form->input('Policy.policies_type',array('type'=>'select','class'=>'form-control','options'=> $policies_type));

									e($ajax->observeField('PolicyPoliciesType',
													array('url'=>array('controller'=>'Policies',
																		'action'=>'edit_subtype',
																),
				// 											"loading"=>"Element.hide(hide);Element.show('waiting');",
				// 											"complete"=>"reloading()"
															"update"=>"divSubtype"
													)
										)
									);
									e('<div id="divSubtype">');
									echo $this->Form->input('policies_subtypes_id',array('type'=>'select','class'=>'form-control','options'=> $policies_subtype));
									e('</div>');
									echo $this->Form->input('format_id',array('type'=>'select','class'=>'form-control','options'=> $policies_format));
									echo $this->Form->input('name',array('class'=>'input'));
// 									echo $this->Form->input('description',array('class'=>'placeholder'));
									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion del Documento','rows'=>'5','cols'=>'82'));

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
											
											echo $this->Form->input('status',
														array(
																'type'=>'select',
																'options'=>array('Active'=>'Active','Inactive'=>'Inactive'),
																'class'=>'form-control',
																'label'=>false,
																'placeholder'=>'Status'
															 )
											    );
// 					echo $this->Form->input('Anexo',array('class'=>'form-control'));
// 					echo $this->Form->input('Filter',array('class'=>'form-control'));

	?>
						
<!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
<!-- 					<?php echo $this->Form->button('Submit', array('class'=>'btn btn-success'));?> -->
					<?php echo $this->Form->end(__('Enviar', true));?>
<!-- 		</div> -->

        </div> <!--container-->
      </div> <!--row-->
    </div> <!--container fluid-->

    





