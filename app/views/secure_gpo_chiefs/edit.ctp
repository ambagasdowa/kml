
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<!-- <center> -->
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SecureGpoChief.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SecureGpoChief.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Secure Gpo Chiefs', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
<!-- 						<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li> -->

			</ul>
        </div>
<!-- </center> -->

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Secure Gpo Chief'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('SecureGpoChief',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="secureGpoChiefs form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('group_id',array('placeholder'=>'group_id','class'=>'input'));
		echo $this->Form->input('name',array('placeholder'=>'name','class'=>'input'));
		echo $this->Form->input('description',array('placeholder'=>'description','class'=>'input'));

											
						?>

						<?php

											
// 		echo $this->Form->input('status',array('placeholder'=>'status','class'=>'input'));
	?>
						<?php
// 						echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
// 									echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
// 								e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
// // 									echo $this->Form->file('upload', array('type'=>'file','label'=>false));
// 								e('</span>');
								?><!-- 					</table> -->
<!-- 				</div>  -->
          <!--end table response-->
					<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?>
					<div class="form-group pull-right">
						<?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?>
<!-- 								<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
					</div>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





