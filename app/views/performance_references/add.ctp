
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
    // NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal.
    // $evaluate = false;
    // $requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere'));
    // blog
    $evaluate = true;
    $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
?>



      <?php 	echo $this->Session->flash();?>        <div class="col-md-offset-1 col-sm-11 col-md-11">
			<ul class="list-group list-inline">

										<li>
							<?php echo $this->Html->link(__('List Performance References', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
						<li><?php echo $this->Html->link(__('List Performance Customers', true), array('controller' => 'performance_customers', 'action' => 'index'),array('class'=>'btn btn-default list-group-item')); ?> </li>
		<li><?php echo $this->Html->link(__('New Performance Customers', true), array('controller' => 'performance_customers', 'action' => 'add'),array('class'=>'btn btn-default list-group-item')); ?> </li>

			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Performance Reference'); ?>			</span>
		</h2>

          <?php echo $this->Form->create('PerformanceReference',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="performanceReferences form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('performance_customers_id',array('placeholder'=>'performance_customers_id','class'=>'input'));
		echo $this->Form->input('Empresa',array('placeholder'=>'Empresa','class'=>'input'));
		echo $this->Form->input('TipoDocumento',array('placeholder'=>'TipoDocumento','class'=>'input'));
		echo $this->Form->input('Folio',array('placeholder'=>'Folio','class'=>'input'));
		echo $this->Form->input('Nombre',array('placeholder'=>'Nombre','class'=>'input'));
		echo $this->Form->input('Flete',array('placeholder'=>'Flete','class'=>'input'));
		echo $this->Form->input('Iva',array('placeholder'=>'Iva','class'=>'input'));
		echo $this->Form->input('Retencion',array('placeholder'=>'Retencion','class'=>'input'));
		echo $this->Form->input('Total',array('placeholder'=>'Total','class'=>'input'));
		echo $this->Form->input('Referencia',array('placeholder'=>'Referencia','class'=>'input'));
		echo $this->Form->input('Lote',array('placeholder'=>'Lote','class'=>'input'));
		echo $this->Form->input('Descripcion',array('placeholder'=>'Descripcion','class'=>'input'));
		echo $this->Form->input('ElaboracionFactura',array('placeholder'=>'ElaboracionFactura','class'=>'input'));
		echo $this->Form->input('MES',array('placeholder'=>'MES','class'=>'input'));
		echo $this->Form->input('DIA',array('placeholder'=>'DIA','class'=>'input'));
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
