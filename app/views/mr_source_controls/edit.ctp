
<!-- <center> -->
      <?php 	echo $this->Session->flash();?>
      <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

				<li>
					<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MrSourceControl.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MrSourceControl.id'))); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List Mr Source Controls', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>		
				</li>
				
			</ul>
        </div>
<!-- </center> -->

		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Mr Source Control'); ?>	
			</span>
		</h2>

          <?php echo $this->Form->create('MrSourceControl',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="mrSourceControls form">

				<?php
					echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
					echo $this->Form->input('source_company',array('placeholder'=>'source_company','class'=>'input'));
					echo $this->Form->input('_key',array('placeholder'=>'_key','class'=>'input'));
					echo $this->Form->input('_description',array('placeholder'=>'_description','class'=>'input'));
					echo $this->Form->input('_status',array('placeholder'=>'_status','class'=>'input'));
				?>
				<?php
						echo $this->Form->input('name',array('type'=>'text','label'=>false,'placeholder'=>'Nombre de la politica'));
						echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion de la politica','rows'=>'5','cols'=>'80'));
						e('<span id="fieldActionExample" class="btn btn-default btn-file form_control">Upload');
						echo $this->Form->file('upload', array('type'=>'file','label'=>false));
						e('</span>');
				?>
				<?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'))?>
				<?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





