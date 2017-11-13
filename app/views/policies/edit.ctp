<?php //edit?>
<?php //debug($this->params);?>
<?php

// SecureCalendar index
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

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
									echo $this->Form->input('id',array('type'=>'hidden','class'=>'form-control'));
									// echo $this->Form->input('user_id',array('class'=>'form-control'));
									echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$_SESSION['Auth']['User']['id'],'class'=>'form-control','label'=>false,'tag'=>'p'));
									echo $this->Form->input('group_id',array('type'=>'hidden','value'=>$_SESSION['Auth']['User']['group_id'],'class'=>'form-control','label'=>false));
									// echo $this->Form->input('group_id',array('class'=>'form-control'));
// 									echo $this->Form->input('empresa_id',array('class'=>'form-control'));
// 									echo $this->Form->input('policies_path',array('class'=>'form-control'));
									echo $this->Form->input('Policy.policies_type',array('label'=>'Elemento','type'=>'select','class'=>'form-control','options'=> $policies_type));

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
									echo $this->Form->input('policies_subtypes_id',array('label'=>'Clasificación','type'=>'select','class'=>'form-control','options'=> $policies_subtype));
									e('</div>');
									echo $this->Form->input('format_id',array('type'=>'select','class'=>'form-control','options'=> $policies_format));
									echo $this->Form->input('name',array('class'=>'input'));
// 									echo $this->Form->input('description',array('class'=>'placeholder'));
									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion del Documento','rows'=>'5','cols'=>'82'));

						?>

						<?php
// 											} else {
//
// 													echo $this->Form->text('create',
// 																	array('type' => 'date',
// 																	'label'=>false,
// 																	'class'=>'form-control',
// 																	'value'=>date('Y-m-d'),
// 																	'dateFormat' => 'DMY',
// 																	'min' => '2010-08-14',
// // 																	'max' => '2036-12-31',
// 																	'separator'=>'/',
// 																	'placeholder'=>'Buscar registro => Ingresa Fecha en formato (yy-mm-dd) (alt+shift+b)'
// 																	)
// 														);
// 											}

											echo $this->Form->input('status',
														array(
																'type'=>'hidden',
																// 'options'=>array('Active'=>'Active','Inactive'=>'Inactive'),
																'value'=>'Active',
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
