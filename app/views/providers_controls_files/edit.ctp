
<!--     <div class="container-fluid"> -->
<!--       <div class="row"> -->
<?php
/**

		* 

		* PHP versions 4 and 5 

		* 

		* kml : Kamila Software 

		* Licensed under The MIT License  

		* Redistributions of files must retain the above copyright notice. 

		* 

		* @copyright     Jesus Baizabal 

		* @link          http://baizabal.xyz 

		* @mail	     baizabal.jesus@gmail.com 

		* @package       cake 

		* @subpackage    cake.cake.console.libs.templates.views 

		* @since         CakePHP(tm) v 1.2.0.5234 

		* @license       MIT License (http://www.opensource.org/licenses/mit-license.php) 

		*/
?>

      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ProvidersControlsFile.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ProvidersControlsFile.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Providers Controls Files', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Providers Controls File'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ProvidersControlsFile',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="providersControlsFiles form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('providers_events_id',array('placeholder'=>'providers_events_id','class'=>'input'));
		echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'input'));
		echo $this->Form->input('labelname',array('placeholder'=>'labelname','class'=>'input'));
		echo $this->Form->input('_filename',array('placeholder'=>'_filename','class'=>'input'));
		echo $this->Form->input('_pathname',array('placeholder'=>'_pathname','class'=>'input'));
		echo $this->Form->input('_extname',array('placeholder'=>'_extname','class'=>'input'));
		echo $this->Form->input('_md5sum',array('placeholder'=>'_md5sum','class'=>'input'));
		echo $this->Form->input('_file_size',array('placeholder'=>'_file_size','class'=>'input'));
		echo $this->Form->input('_atime',array('placeholder'=>'_atime','class'=>'input'));
		echo $this->Form->input('_mtime',array('placeholder'=>'_mtime','class'=>'input'));
		echo $this->Form->input('_ctime',array('placeholder'=>'_ctime','class'=>'input'));
		echo $this->Form->input('_username',array('placeholder'=>'_username','class'=>'input'));
		echo $this->Form->input('_datetime_login',array('placeholder'=>'_datetime_login','class'=>'input'));
		echo $this->Form->input('_ip_remote',array('placeholder'=>'_ip_remote','class'=>'input'));
		echo $this->Form->input('providers_standings_id',array('placeholder'=>'providers_standings_id','class'=>'input'));
		echo $this->Form->input('providers_parents_id',array('placeholder'=>'providers_parents_id','class'=>'input'));
		echo $this->Form->input('_status',array('placeholder'=>'_status','class'=>'input'));
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

    





