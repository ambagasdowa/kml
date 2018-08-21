
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ProvidersImportedDatabase.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ProvidersImportedDatabase.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Providers Imported Databases', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
						<li><?php echo $this->Html->link(__('List Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Providers Imported Database'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ProvidersImportedDatabase',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="providersImportedDatabases form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('providers_imported_files_controls_id',array('placeholder'=>'providers_imported_files_controls_id','class'=>'input'));
		echo $this->Form->input('providers_view_companies_units_id',array('placeholder'=>'providers_view_companies_units_id','class'=>'input'));
		echo $this->Form->input('providers_units_name',array('placeholder'=>'providers_units_name','class'=>'input'));
		echo $this->Form->input('providers_units_desc',array('placeholder'=>'providers_units_desc','class'=>'input'));
		echo $this->Form->input('keypri',array('placeholder'=>'keypri','class'=>'input'));
		echo $this->Form->input('id_file',array('placeholder'=>'id_file','class'=>'input'));
		echo $this->Form->input('ZCpnyId',array('placeholder'=>'ZCpnyId','class'=>'input'));
		echo $this->Form->input('ZBatNbr',array('placeholder'=>'ZBatNbr','class'=>'input'));
		echo $this->Form->input('ZRcptDate',array('placeholder'=>'ZRcptDate','class'=>'input'));
		echo $this->Form->input('ZVendId',array('placeholder'=>'ZVendId','class'=>'input'));
		echo $this->Form->input('ZCuryRcptCtrlAmt',array('placeholder'=>'ZCuryRcptCtrlAmt','class'=>'input'));
		echo $this->Form->input('ZAPBatNbr',array('placeholder'=>'ZAPBatNbr','class'=>'input'));
		echo $this->Form->input('ZAPRefno',array('placeholder'=>'ZAPRefno','class'=>'input'));
		echo $this->Form->input('ZAPDocDate',array('placeholder'=>'ZAPDocDate','class'=>'input'));
		echo $this->Form->input('ZEstatus',array('placeholder'=>'ZEstatus','class'=>'input'));
		echo $this->Form->input('ZInvcNbr',array('placeholder'=>'ZInvcNbr','class'=>'input'));
		echo $this->Form->input('ZInvcDate',array('placeholder'=>'ZInvcDate','class'=>'input'));
		echo $this->Form->input('ZPerPost',array('placeholder'=>'ZPerPost','class'=>'input'));
		echo $this->Form->input('ZPayDate',array('placeholder'=>'ZPayDate','class'=>'input'));
		echo $this->Form->input('ZUUID',array('placeholder'=>'ZUUID','class'=>'input'));
		echo $this->Form->input('ZAcct',array('placeholder'=>'ZAcct','class'=>'input'));
		echo $this->Form->input('ZFechaPago',array('placeholder'=>'ZFechaPago','class'=>'input'));
		echo $this->Form->input('ZMontoPago',array('placeholder'=>'ZMontoPago','class'=>'input'));
		echo $this->Form->input('ZRefPago',array('placeholder'=>'ZRefPago','class'=>'input'));
		echo $this->Form->input('tstamp',array('placeholder'=>'tstamp','class'=>'input'));
		echo $this->Form->input('Ztbknbr',array('placeholder'=>'Ztbknbr','class'=>'input'));
		echo $this->Form->input('exportado',array('placeholder'=>'exportado','class'=>'input'));
		echo $this->Form->input('florensia',array('placeholder'=>'florensia','class'=>'input'));
		echo $this->Form->input('tipocomprobante',array('placeholder'=>'tipocomprobante','class'=>'input'));
		echo $this->Form->input('user_id',array('placeholder'=>'user_id','class'=>'input'));
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

    





