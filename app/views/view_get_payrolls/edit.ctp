
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<center>
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ViewGetPayroll.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ViewGetPayroll.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List View Get Payrolls', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>
</center>

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit View Get Payroll'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ViewGetPayroll',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="viewGetPayrolls form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('Cvetno',array('placeholder'=>'Cvetno','class'=>'input'));
		echo $this->Form->input('Cvepue',array('placeholder'=>'Cvepue','class'=>'input'));
		echo $this->Form->input('Cvecia',array('placeholder'=>'Cvecia','class'=>'input'));
		echo $this->Form->input('Cveare',array('placeholder'=>'Cveare','class'=>'input'));
		echo $this->Form->input('Cvetra',array('placeholder'=>'Cvetra','class'=>'input'));
		echo $this->Form->input('Apepat',array('placeholder'=>'Apepat','class'=>'input'));
		echo $this->Form->input('Apemat',array('placeholder'=>'Apemat','class'=>'input'));
		echo $this->Form->input('Nombre',array('placeholder'=>'Nombre','class'=>'input'));
		echo $this->Form->input('Nomina',array('placeholder'=>'Nomina','class'=>'input'));
		echo $this->Form->input('Company',array('placeholder'=>'Company','class'=>'input'));
		echo $this->Form->input('Area',array('placeholder'=>'Area','class'=>'input'));
		echo $this->Form->input('Departamento',array('placeholder'=>'Departamento','class'=>'input'));
		echo $this->Form->input('Puesto',array('placeholder'=>'Puesto','class'=>'input'));
		echo $this->Form->input('Baja',array('placeholder'=>'Baja','class'=>'input'));
		echo $this->Form->input('Numrfc',array('placeholder'=>'Numrfc','class'=>'input'));
		echo $this->Form->input('Curp',array('placeholder'=>'Curp','class'=>'input'));
		echo $this->Form->input('Numims',array('placeholder'=>'Numims','class'=>'input'));
		echo $this->Form->input('Cvecau',array('placeholder'=>'Cvecau','class'=>'input'));
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

    





