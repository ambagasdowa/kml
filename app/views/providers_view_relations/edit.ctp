
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ProvidersViewRelation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ProvidersViewRelation.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Providers View Relations', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Providers View Relation'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ProvidersViewRelation',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="providersViewRelations form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('BatNbr',array('placeholder'=>'BatNbr','class'=>'input'));
		echo $this->Form->input('CpnyID',array('placeholder'=>'CpnyID','class'=>'input'));
		echo $this->Form->input('Status',array('placeholder'=>'Status','class'=>'input'));
		echo $this->Form->input('Module',array('placeholder'=>'Module','class'=>'input'));
		echo $this->Form->input('JrnlType',array('placeholder'=>'JrnlType','class'=>'input'));
		echo $this->Form->input('ap_status',array('placeholder'=>'ap_status','class'=>'input'));
		echo $this->Form->input('VendId',array('placeholder'=>'VendId','class'=>'input'));
		echo $this->Form->input('PerPost',array('placeholder'=>'PerPost','class'=>'input'));
		echo $this->Form->input('PONbr',array('placeholder'=>'PONbr','class'=>'input'));
		echo $this->Form->input('RefNbr',array('placeholder'=>'RefNbr','class'=>'input'));
		echo $this->Form->input('DocType',array('placeholder'=>'DocType','class'=>'input'));
		echo $this->Form->input('DocDesc',array('placeholder'=>'DocDesc','class'=>'input'));
		echo $this->Form->input('Crtd_DateTime',array('placeholder'=>'Crtd_DateTime','class'=>'input'));
		echo $this->Form->input('LUpd_DateTime',array('placeholder'=>'LUpd_DateTime','class'=>'input'));
		echo $this->Form->input('name',array('placeholder'=>'name','class'=>'input'));
		echo $this->Form->input('xml',array('placeholder'=>'xml','class'=>'input'));
		echo $this->Form->input('voucher',array('placeholder'=>'voucher','class'=>'input'));
		echo $this->Form->input('order',array('placeholder'=>'order','class'=>'input'));
		echo $this->Form->input('Acct',array('placeholder'=>'Acct','class'=>'input'));
		echo $this->Form->input('totalAmt',array('placeholder'=>'totalAmt','class'=>'input'));
		echo $this->Form->input('UUID',array('placeholder'=>'UUID','class'=>'input'));
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

    





