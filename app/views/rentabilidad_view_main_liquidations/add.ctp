
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
							<?php echo $this->Html->link(__('List Rentabilidad View Main Liquidations', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Rentabilidad View Main Liquidation'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('RentabilidadViewMainLiquidation',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="rentabilidadViewMainLiquidations form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id_area',array('placeholder'=>'id_area','class'=>'input'));
		echo $this->Form->input('year',array('placeholder'=>'year','class'=>'input'));
		echo $this->Form->input('UnidadNegocio',array('placeholder'=>'UnidadNegocio','class'=>'input'));
		echo $this->Form->input('liquidacion',array('placeholder'=>'liquidacion','class'=>'input'));
		echo $this->Form->input('fecha_liquidacion',array('placeholder'=>'fecha_liquidacion','class'=>'input'));
		echo $this->Form->input('Mes',array('placeholder'=>'Mes','class'=>'input'));
		echo $this->Form->input('Unidad',array('placeholder'=>'Unidad','class'=>'input'));
		echo $this->Form->input('COMBUSTIBLE',array('placeholder'=>'COMBUSTIBLE','class'=>'input'));
		echo $this->Form->input('CASETAS',array('placeholder'=>'CASETAS','class'=>'input'));
		echo $this->Form->input('CONCEPTOS_SUELDO',array('placeholder'=>'CONCEPTOS_SUELDO','class'=>'input'));
		echo $this->Form->input('OTROS',array('placeholder'=>'OTROS','class'=>'input'));
		echo $this->Form->input('qtyCombustible',array('placeholder'=>'qtyCombustible','class'=>'input'));
		echo $this->Form->input('qtyCasetas',array('placeholder'=>'qtyCasetas','class'=>'input'));
		echo $this->Form->input('qtySueldoLiquidacion',array('placeholder'=>'qtySueldoLiquidacion','class'=>'input'));
		echo $this->Form->input('qtyOtros',array('placeholder'=>'qtyOtros','class'=>'input'));
		echo $this->Form->input('IngresoTotalRuta',array('placeholder'=>'IngresoTotalRuta','class'=>'input'));
		echo $this->Form->input('viajes',array('placeholder'=>'viajes','class'=>'input'));
		echo $this->Form->input('rendimiento_reseteo',array('placeholder'=>'rendimiento_reseteo','class'=>'input'));
		echo $this->Form->input('del',array('placeholder'=>'del','class'=>'input'));
		echo $this->Form->input('al',array('placeholder'=>'al','class'=>'input'));
		echo $this->Form->input('KmsCaminoLleno',array('placeholder'=>'KmsCaminoLleno','class'=>'input'));
		echo $this->Form->input('KmsCamionVacio',array('placeholder'=>'KmsCamionVacio','class'=>'input'));
		echo $this->Form->input('DuracionViaje',array('placeholder'=>'DuracionViaje','class'=>'input'));
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

    





