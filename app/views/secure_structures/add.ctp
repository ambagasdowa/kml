<?php 
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->



      <?php
		echo $this->Session->flash();?>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
	<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Secure Structure'); ?>
			</span>
		</h2>
          <?php echo $this->Form->create('SecureStructure',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="secureStructures form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('group_id',array('placeholder'=>'group_id','class'=>'input'));
		echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'input'));
		echo $this->Form->input('secure_topics_id',array('placeholder'=>'secure_topics_id','class'=>'input'));
		echo $this->Form->input('secure_topics_types_id',array('placeholder'=>'secure_topics_types_id','class'=>'input'));
		echo $this->Form->input('secure_gpo_chiefs_id',array('placeholder'=>'secure_gpo_chiefs_id','class'=>'input'));
		echo $this->Form->input('secure_goes_id',array('placeholder'=>'secure_goes_id','class'=>'input'));
		echo $this->Form->input('secure_calendars_id',array('placeholder'=>'secure_calendars_id','class'=>'input'));
		echo $this->Form->input('description',array('placeholder'=>'description','class'=>'input'));

		if(checkBrowser($_SERVER['HTTP_USER_AGENT'],true) === TRUE) {
				echo $this->Form->input('create',
					array(	
							'type' => 'text',
							'label'=>false,
							'class'=>'form-control',
							'placeholder'=>'Seleccione una fecha',
							'id'=>'calendar_create_one',
							'value'=>''
					)
				);
				
				echo $this->Form->input('create',
					array(	
							'type' => 'text',
							'label'=>false,
							'class'=>'form-control',
							'placeholder'=>'Seleccione una fecha',
							'id'=>'calendar_create_two',
							'value'=>''
					)
				);
						?>

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
											
// 								echo $this->Form->input('status',array('placeholder'=>'status','class'=>'input'));
	?>


					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?>
					<?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?>
<!-- 				</table> -->
<!-- 				</div> -->
			</div>
		</div> <!--container-->




<script>
	$(document).ready(function () {
		$(function () {
			$('#calendar_create_one').datepicker({showButtonPanel: true});
			$('#calendar_create_two').datepicker({showButtonPanel: true});
		});
	});
</script>



