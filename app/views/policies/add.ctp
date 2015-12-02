<?php ?>

<center>
<?php echo $this->Session->flash();?>
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

				<li>
					<?php echo $this->Html->link(__('List Document', true), array('action' => 'index') ,array('class'=>'btn btn-default list-group-item'));?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List Document Anexos', true), array('controller' => 'policies_anexos', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('New Anexo', true), array('controller' => 'policies_anexos', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('List Document Filters', true), array('controller' => 'policies_filters', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>
				<li>
					<?php echo $this->Html->link(__('New Filter', true), array('controller' => 'policies_filters', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?>
				</li>

			</ul>
        </div>
      </div>
</center>

        <div class="container">

		  <i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading"><span>Agregar Documento</span></h2>
          <?php echo $this->Form->create('Policy',array('enctype' => 'multipart/form-data','class'=>'form'));?>

		<?php
			echo $this->Form->input('user_id',array('class'=>'form-control','label'=>false,'tag'=>'p'));
			echo $this->Form->input('group_id',array('class'=>'form-control','label'=>false));
			echo $this->Form->input('name',array('type'=>'text','class'=>'input','label'=>false,'placeholder'=>'Nombre del Documento'));
			echo $this->Form->input('description',array('type'=>'textarea','class'=>'placeholder','label'=>false,'placeholder'=>'Descripcion del Documento','rows'=>'5','cols'=>'82'));
// 								e('<span id="createPolicy" class="btn btn-default btn-file form_control">Upload');
			echo $this->Form->file('upload', array('type'=>'file','label'=>false,'class'=>'input'));
// 								e('</span>');
		?>

		<?php
			echo $this->Form->input('policies_type',array('type'=>'select','label'=>false,'class'=>'form-control','options'=> $policies_type));
			echo $this->Form->input('format_id',array('type'=>'select','label'=>false,'class'=>'form-control','options'=> $policies_format));
			echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'Active'));
		?>

		<?php echo $this->Form->end(__('Enviar', true));?>


        </div> <!--container-->
        
	</div>
		
    <script>
							/*-------------------------------------------
								Function for jQuery-UI page (ui_jquery-ui.html)
							---------------------------------------------*/
								require(['jquery','jquery-ui','bootstrap'], function($) {
									$(document).ready(function () {

										$(document).on('change', '.btn-file :file', function() {
										var input = $(this),
											numFiles = input.get(0).files ? input.get(0).files.length : 1,
											label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
											input.trigger('fileselect', [numFiles, label]);
										});
										
										$('.btn-file :file').on('fileselect', function(event, numFiles, label) {
											console.log(numFiles);
											console.log(label);
											document.getElementById("createPolicy").innerHTML = label;
										});

									});
								});
    </script>