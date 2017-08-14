
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->

      <?php 	echo $this->Session->flash();?>
		<div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">
				<li>
					<?php echo $this->Html->link(__('List Mr Source Accounts', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>		
				</li>
				
			</ul>
        </div>


		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
			<h2 class="form-signin-heading">
				<span>
					<?php __('Add Mr Source Accounts'); ?>
				</span>
			</h2>
		
          <?php echo $this->Form->create('MrSourceAccount',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="mrSourceAccounts form">

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

					<div class="checkbox"><span><kbd> Replace </kbd>&nbsp;</span>
						<label>
							<input type="checkbox" name="data[MrSourceAccount][source_replace]">
							<i class="fa fa-square-o"></i>
						</label>
					</div>
					<div class="checkbox"><span><kbd> Some Check </kbd>&nbsp;</span>
						<label>
							<input type="checkbox" name="data[MrSourceAccount][some_check]">
							<i class="fa fa-square-o"></i>
						</label>
					</div>
				<?php

// 					echo $this->Form->input('MrSourceAccount._key',
// 														array(	
// 																'type'=>'select',
// 																'empty'=>'Seleccione',
// 																'class'=>'form-control',
// 																'options'=>$sourceKeys
// 																)
// 											);
// 					echo $this->Form->input('_key',array('placeholder'=>'_key','class'=>'input'));
					echo $this->Form->input('_status',array('type'=>'hidden','value'=>'1','placeholder'=>'_status','class'=>'input'));
				?>
				<?php
// 					echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion ','rows'=>'5','cols'=>'80'));
					
					
// 					echo $this->Form->input('One.record',
// 														array(	
// 																'type'=>'select',
// 																'empty'=>'Agregar Registro',
// 																'class'=>'form-control',
// 																'options'=>array('si','no')
// 																)
// 											);
// 											
// 					e($ajax->observeField('OneRecord',
// 															array('url'=>array(
// 																					'controller'=>'MrSourceAccounts',
// 																					'action'=>'record',
// 																		),
// 																	"update"=>"divUpdateRecord"
// 															)
// 										)
// 					);
// 
// 					e('<div id="divUpdateRecord">'.$this->Form->file('upload', array('type'=>'file','class'=>'input','label'=>false)).'</div>');
					
// 					echo $this->Form->input('SubAccount',array('placeholder'=>'SubAccount','class'=>'input'));
					echo $this->Form->file('upload', array('type'=>'file','class'=>'input','label'=>false));

				?>
				<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?><?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





