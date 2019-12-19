
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
							<?php echo $this->Html->link(__('List Providers View Vendors', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Providers View Vendor'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ProvidersViewVendor',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="providersViewVendors form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('vendid',array('placeholder'=>'vendid','class'=>'input'));
		echo $this->Form->input('is_vendor',array('placeholder'=>'is_vendor','class'=>'input'));
		echo $this->Form->input('id_repeat',array('placeholder'=>'id_repeat','class'=>'input'));
		echo $this->Form->input('name',array('placeholder'=>'name','class'=>'input'));
		echo $this->Form->input('Status',array('placeholder'=>'Status','class'=>'input'));
		echo $this->Form->input('ClassID',array('placeholder'=>'ClassID','class'=>'input'));
		echo $this->Form->input('tstamp',array('placeholder'=>'tstamp','class'=>'input'));
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

    





