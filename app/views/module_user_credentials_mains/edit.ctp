
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ModuleUserCredentialsMain.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ModuleUserCredentialsMain.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Module User Credentials Mains', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Module User Credentials Main'); ?>			</span>
		</h2>

          <?php echo $this->Form->create('ModuleUserCredentialsMain',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="moduleUserCredentialsMains form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('model_name',array('placeholder'=>'model_name','class'=>'input'));
		echo $this->Form->input('database_name',array('placeholder'=>'database_name','class'=>'input'));
		echo $this->Form->input('database_column',array('placeholder'=>'database_column','class'=>'input'));
		echo $this->Form->input('model_option_var',array('placeholder'=>'model_option_var','class'=>'input'));
		echo $this->Form->input('is_in',array('placeholder'=>'is_in','class'=>'input'));
		echo $this->Form->input('module_ui_name',array('placeholder'=>'module_ui_name','class'=>'input'));
    echo $this->Form->input('module_description',array('type'=>'textbox','placeholder'=>'model_option_var','class'=>'input'));
	?>
  <?php echo $this->Form->input('status',array('type'=>'hidden','class'=>'form-control','value'=>'1'))?>

  <div class="block">
    &nbsp;
  </div>

  <div class="form-group pull-right">
    <?php echo $this->Form->end(array('div'=>false,'class'=>'btn btn-success'));?>
<!-- 								<button type="button" class="btn btn-warning" data-dismiss="modal">Close</button> -->
  </div>

			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->
