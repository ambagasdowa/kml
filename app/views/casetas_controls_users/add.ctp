<?php ?>
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
<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = true;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

	
      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

				<li><?php echo $this->Html->link(__('List Casetas Controls Users', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>

			</ul>
        </div>

<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Casetas Controls User'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('CasetasControlsUser',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="casetasControlsUsers form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
	<?php
		echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'input'));
// 		echo $this->Form->input('casetas_corporations_id',array('placeholder'=>'casetas_corporations_id','class'=>'input'));


		e($form->input('CasetasControlsUser.casetas_corporations_id',
						array('type'=>'select',
								'empty'=>'Empresa',
								'label'=>false,
								'placeholder'=>'casetas_corporations_id',
								'class'=>'input',
								'options'=>array_map('strtoupper',$corporations)
// 											  'class'=>'form-control',
// 											  'style'=>"font-size:70%;"
// 									      'empty'=>'Empresa'
						)
				)
		);

		e($ajax->observeField('CasetasControlsUserCasetasCorporationsId',
					array("url"=>array("controller"=>"CasetasControlsUsers",
										"action"=>"selectBsu",
								),
// 										  "loading" => "Element.hide('hide');Element.show('waiting');",
// 									  "after" => "Effect.Grow(reloading(),{duration: 2.0});",
// 										  "complete" => "reloading();",
							'update'=>'divBsu'
					)
				)
		);
				
	?>

	<span id='divBsu'>
		<p>&nbsp;</p>
	</span>
						
          <!--end table response-->
		<?php echo $this->Form->input('_status',array('type'=>'hidden','class'=>'form-control','value'=>'1'))?>
	<p>&nbsp;</p>
		<?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





