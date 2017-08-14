<!--   -->
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<!-- <center> -->
<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = true;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>
      <?php 	echo $this->Session->flash();?>
		<div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li>
					<?php echo $this->Html->link(__('List Mr Source Configs', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>		
				</li>
				
			</ul>
        </div>
<!-- </center> -->

		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
			<h2 class="form-signin-heading">
				<span>
					<?php __('Add Period'); ?>
				</span>
			</h2>
		
          <?php echo $this->Form->create('MrSourceConfig',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="mrSourceConfigs form">

					<?php
						echo $this->Form->input('MrSourceAccount.source_company_id',
															array(	
																	'type'=>'select',
																	'empty'=>'Seleccione',
																	'class'=>'form-control',
// 																			'options'=>$bussinessUnit,
																	'options'=>$source_control
																	)
												);
					?>
					<?php
						e($ajax->observeField('MrSourceAccountSourceCompanyId',
																array('url'=>array(
																						'controller'=>'MrSourceAccounts',
																						'action'=>'source_company',
																			),
																		"update"=>"divUpdateCompany"
																)
											)
						);
					?>

					<div id="divUpdateCompany">
						
						<?php
							 echo $this->Form->input('company',
														array(	
																'type'=>'select',
																'class'=>'form-control',
																'disabled'=>true,
																'options'=>array('1'=>'none'),
																'label'=>false
															 )
							);
						?>
						
					</div> <!--end divUpdateCompany-->

				<?php
					echo $this->Form->input('_status',array('type'=>'hidden','value'=>'1','placeholder'=>'_status','class'=>'input'));
				?>
				

					<div class="checkbox"><span><kbd> Replace </kbd>&nbsp;</span>
						<label>
							<input type="checkbox" name="data[MrSourceConfig][source_replace]">
							<i class="fa fa-square-o"></i>
						</label>
					</div>
			
				<?php
// 					echo $this->Form->input('SubAccount',array('placeholder'=>'SubAccount','class'=>'input'));
// 					echo $this->Form->input('company',array('placeholder'=>'company','class'=>'input'));
// 					echo $this->Form->input('source_company',array('placeholder'=>'company','class'=>'input'));
// 					echo $this->Form->input('period',array('placeholder'=>'period','class'=>'input'));
// 					echo $this->Form->input('_key',array('placeholder'=>'_key','class'=>'input'));
// 					echo $this->Form->input('_status',array('placeholder'=>'_status','class'=>'input'));
				?>
				
				<span><kbd> Period </kbd>&nbsp;</span>
				<?php 
					echo $this->Form->input('MrSourceConfig.period',
														array(
																'type'=>'text',
																'class'=>'input',
																'id'=>'calendarConfig',
																'div'=>FALSE,
																'label'=>FALSE
															  )
											)
				?>				
				
				
				
				<?php
					echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion ','rows'=>'5','cols'=>'80'));
					echo $this->Form->file('upload', array('type'=>'file','class'=>'input','label'=>false));

				?>
				<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?><?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    
	<script>
	/*-------------------------------------------
		Function for jQuery-UI page (ui_jquery-ui.html)
	---------------------------------------------*/
		require(['jquery','jquery-ui','bootstrap'], function($) {
			$(document).ready(function () {
			
				$(function () {
						$('#calendarConfig').datepicker({showButtonPanel: true});
				});

			});
		});
	</script>




