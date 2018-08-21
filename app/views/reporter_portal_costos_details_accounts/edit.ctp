
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('ReporterPortalCostosDetailsAccount.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('ReporterPortalCostosDetailsAccount.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Reporter Portal Costos Details Accounts', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Reporter Portal Costos Details Account'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('ReporterPortalCostosDetailsAccount',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="reporterPortalCostosDetailsAccounts form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('_source_company',array('placeholder'=>'_source_company','class'=>'input'));
		echo $this->Form->input('area',array('placeholder'=>'area','class'=>'input'));
		echo $this->Form->input('UnidadNegocio',array('placeholder'=>'UnidadNegocio','class'=>'input'));
		echo $this->Form->input('mes',array('placeholder'=>'mes','class'=>'input'));
		echo $this->Form->input('account',array('placeholder'=>'account','class'=>'input'));
		echo $this->Form->input('name',array('placeholder'=>'name','class'=>'input'));
		echo $this->Form->input('Real',array('placeholder'=>'Real','class'=>'input'));
		echo $this->Form->input('Presupuesto',array('placeholder'=>'Presupuesto','class'=>'input'));
		echo $this->Form->input('_period',array('placeholder'=>'_period','class'=>'input'));
		echo $this->Form->input('Descripcion',array('placeholder'=>'Descripcion','class'=>'input'));
		echo $this->Form->input('NombreEntidad',array('placeholder'=>'NombreEntidad','class'=>'input'));
		echo $this->Form->input('TipoTransaccion',array('placeholder'=>'TipoTransaccion','class'=>'input'));
		echo $this->Form->input('Referencia',array('placeholder'=>'Referencia','class'=>'input'));
		echo $this->Form->input('ReferenciaExterna',array('placeholder'=>'ReferenciaExterna','class'=>'input'));
		echo $this->Form->input('type',array('placeholder'=>'type','class'=>'input'));
		echo $this->Form->input('cyear',array('placeholder'=>'cyear','class'=>'input'));
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

    





