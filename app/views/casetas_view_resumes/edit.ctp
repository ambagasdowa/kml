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

      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('CasetasViewResume.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('CasetasViewResume.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Casetas View Resumes', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Casetas View Resume'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('CasetasViewResume',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="casetasViewResumes form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
                <?php

                        echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
                ?>
                
        <?php if (isset($_SESSION['Auth']['User'])) {
			 	if (checkSuperUser($_SESSION['Auth']['User']['group_id'],$_SESSION['Auth']['User']['number_id'],$_SESSION['Auth']['User']['super_user'])) {
			
//                     echo $this->Form->input('monto_conciliado',array('placeholder'=>'monto_conciliado','class'=>'input'));
//                     echo $this->Form->input('cruces_conciliados',array('placeholder'=>'cruces_conciliados','class'=>'input'));
//                     echo $this->Form->input('_montos',array('placeholder'=>'_montos','class'=>'input'));
//                     echo $this->Form->input('cruces',array('placeholder'=>'cruces','class'=>'input'));
//                     echo $this->Form->input('percent_montos',array('placeholder'=>'percent_montos','class'=>'input'));
//                     echo $this->Form->input('percent_cruces',array('placeholder'=>'percent_cruces','class'=>'input'));
//                     echo $this->Form->input('counter',array('placeholder'=>'counter','class'=>'input'));
//                     echo $this->Form->input('_filename',array('placeholder'=>'_filename','class'=>'input'));
//                     echo $this->Form->input('_area',array('placeholder'=>'_area','class'=>'input'));
//                     echo $this->Form->input('casetas_units_id',array('placeholder'=>'casetas_units_id','class'=>'input'));
//                     echo $this->Form->input('casetas_event_name',array('placeholder'=>'casetas_event_name','class'=>'input'));
//                     echo $this->Form->input('casetas_parents_name',array('placeholder'=>'casetas_parents_name','class'=>'input'));
//                     echo $this->Form->input('casetas_standings_name',array('placeholder'=>'casetas_standings_name','class'=>'input'));
//                     echo $this->Form->input('historical_id',array('placeholder'=>'historical_id','class'=>'input'));
//                     echo $this->Form->input('_ctime',array('placeholder'=>'_ctime','class'=>'input'));
//                     echo $this->Form->input('fileStatId',array('placeholder'=>'fileStatId','class'=>'input'));
                       echo $this->Form->input('casetas_parents_id',array('type'=>'select','placeholder'=>'set 10 for cloack and 2 for uncloack','class'=>'input','options'=>array('empty'=>'select','10'=>'Cerrar Conciliacion','2'=>'Abrir Conciliacion')));
                       echo $this->Form->input('_status',array('type'=>'select','placeholder'=>'set 0 for disable and 1 for enable','class'=>'input','options'=>array('empty'=>'select','0'=>'Archivo desactivar','1'=>'Archivo Activar'),'selected'=>'empty'))
                }
            }
        ?>

          <!--end table response-->
					<?php 

                    ?>
                    <?php echo $this->Form->end(__('Submit', true));?>
			</div>
		</div> <!--container-->
        <!--</div>--> <!--main-->
      <!--</div>--> <!--row-->
    <!--</div>--> <!--container fluid-->

    





