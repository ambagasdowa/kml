
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<center>
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Caseta.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Caseta.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Casetas', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>
</center>

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Caseta'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('Caseta',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="casetas form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>null));
		echo $this->Form->input('key_num',array('placeholder'=>'key_num','class'=>null));
		echo $this->Form->input('key_num_1',array('placeholder'=>'key_num_1','class'=>null));
		echo $this->Form->input('key_num_2',array('placeholder'=>'key_num_2','class'=>null));
		echo $this->Form->input('alpha_code',array('placeholder'=>'alpha_code','class'=>null));
		echo $this->Form->input('key_num_3',array('placeholder'=>'key_num_3','class'=>null));
		echo $this->Form->input('alpha_num_code',array('placeholder'=>'alpha_num_code','class'=>null));
		echo $this->Form->input('unit',array('placeholder'=>'unit','class'=>null));
		echo $this->Form->input('fecha_a',array('placeholder'=>'fecha_a','class'=>null));
		echo $this->Form->input('time_a',array('placeholder'=>'time_a','class'=>null));
		echo $this->Form->input('key_num_4',array('placeholder'=>'key_num_4','class'=>null));
		echo $this->Form->input('alpha_location',array('placeholder'=>'alpha_location','class'=>null));
		echo $this->Form->input('alpha_location_1',array('placeholder'=>'alpha_location_1','class'=>null));
		echo $this->Form->input('float_data',array('placeholder'=>'float_data','class'=>null));
		echo $this->Form->input('float_data_1',array('placeholder'=>'float_data_1','class'=>null));
		echo $this->Form->input('float_data_2',array('placeholder'=>'float_data_2','class'=>null));
		echo $this->Form->input('float_data_3',array('placeholder'=>'float_data_3','class'=>null));
		echo $this->Form->input('float_data_4',array('placeholder'=>'float_data_4','class'=>null));
		echo $this->Form->input('float_data_5',array('placeholder'=>'float_data_5','class'=>null));
		echo $this->Form->input('float_data_6',array('placeholder'=>'float_data_6','class'=>null));
	?>
							echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
								e('</span>');<!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?>;<?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





