
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('RendViewFullGstCoreIndicator.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('RendViewFullGstCoreIndicator.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Rend View Full Gst Core Indicators', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Rend View Full Gst Core Indicator'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('RendViewFullGstCoreIndicator',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="rendViewFullGstCoreIndicators form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('viaje',array('placeholder'=>'viaje','class'=>'input'));
		echo $this->Form->input('area',array('placeholder'=>'area','class'=>'input'));
		echo $this->Form->input('operador',array('placeholder'=>'operador','class'=>'input'));
		echo $this->Form->input('tracto',array('placeholder'=>'tracto','class'=>'input'));
		echo $this->Form->input('config',array('placeholder'=>'config','class'=>'input'));
		echo $this->Form->input('fecha',array('placeholder'=>'fecha','class'=>'input'));
		echo $this->Form->input('origen',array('placeholder'=>'origen','class'=>'input'));
		echo $this->Form->input('destino',array('placeholder'=>'destino','class'=>'input'));
		echo $this->Form->input('modelo',array('placeholder'=>'modelo','class'=>'input'));
		echo $this->Form->input('kms',array('placeholder'=>'kms','class'=>'input'));
		echo $this->Form->input('diesel',array('placeholder'=>'diesel','class'=>'input'));
		echo $this->Form->input('periodo',array('placeholder'=>'periodo','class'=>'input'));
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

    





