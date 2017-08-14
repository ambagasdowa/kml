
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<center>
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Tralix.id_tralix')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Tralix.id_tralix'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Tralixes', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>
</center>

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Tralix'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('Tralix',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="tralixes form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id_tralix',array('placeholder'=>'id_tralix','class'=>'input'));
		echo $this->Form->input('id_empresa',array('placeholder'=>'id_empresa','class'=>'input'));
		echo $this->Form->input('uuid',array('placeholder'=>'uuid','class'=>'input'));
		echo $this->Form->input('fecha',array('placeholder'=>'fecha','class'=>'input'));
		echo $this->Form->input('rfc',array('placeholder'=>'rfc','class'=>'input'));
		echo $this->Form->input('claveFactura',array('placeholder'=>'claveFactura','class'=>'input'));
		echo $this->Form->input('status',array('placeholder'=>'status','class'=>'input'));
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

    





