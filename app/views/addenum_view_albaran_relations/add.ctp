
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
							<?php echo $this->Html->link(__('List Addenum View Albaran Relations', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Add Addenum View Albaran Relation'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('AddenumViewAlbaranRelation',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="addenumViewAlbaranRelations form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('xml',array('placeholder'=>'xml','class'=>'input'));
		echo $this->Form->input('pdf',array('placeholder'=>'pdf','class'=>'input'));
		echo $this->Form->input('index',array('placeholder'=>'index','class'=>'input'));
		echo $this->Form->input('RefNbr',array('placeholder'=>'RefNbr','class'=>'input'));
		echo $this->Form->input('BatNbr',array('placeholder'=>'BatNbr','class'=>'input'));
		echo $this->Form->input('no_remision',array('placeholder'=>'no_remision','class'=>'input'));
		echo $this->Form->input('@xsi:schemaLocation',array('placeholder'=>'@xsi:schemaLocation','class'=>'input'));
		echo $this->Form->input('eu:TipoFactura/eu:IdFactura',array('placeholder'=>'eu:TipoFactura/eu:IdFactura','class'=>'input'));
		echo $this->Form->input('eu:TipoFactura/eu:Version',array('placeholder'=>'eu:TipoFactura/eu:Version','class'=>'input'));
		echo $this->Form->input('eu:TipoFactura/eu:FechaMensaje',array('placeholder'=>'eu:TipoFactura/eu:FechaMensaje','class'=>'input'));
		echo $this->Form->input('eu:TipoTransaccion/eu:IdTransaccion',array('placeholder'=>'eu:TipoTransaccion/eu:IdTransaccion','class'=>'input'));
		echo $this->Form->input('eu:TipoTransaccion/eu:Transaccion',array('placeholder'=>'eu:TipoTransaccion/eu:Transaccion','class'=>'input'));
		echo $this->Form->input('eu:OrdenesCompra/eu:Secuencia/@consec',array('placeholder'=>'eu:OrdenesCompra/eu:Secuencia/@consec','class'=>'input'));
		echo $this->Form->input('eu:OrdenesCompra/eu:Secuencia/eu:IdPedido',array('placeholder'=>'eu:OrdenesCompra/eu:Secuencia/eu:IdPedido','class'=>'input'));
		echo $this->Form->input('eu:OrdenesCompra/eu:Secuencia/eu:EntradaAlmacen/eu:Albaran',array('placeholder'=>'eu:OrdenesCompra/eu:Secuencia/eu:EntradaAlmacen/eu:Albaran','class'=>'input'));
		echo $this->Form->input('eu:Moneda/eu:MonedaCve',array('placeholder'=>'eu:Moneda/eu:MonedaCve','class'=>'input'));
		echo $this->Form->input('eu:Moneda/eu:TipoCambio',array('placeholder'=>'eu:Moneda/eu:TipoCambio','class'=>'input'));
		echo $this->Form->input('eu:Moneda/eu:SubtotalM',array('placeholder'=>'eu:Moneda/eu:SubtotalM','class'=>'input'));
		echo $this->Form->input('eu:Moneda/eu:TotalM',array('placeholder'=>'eu:Moneda/eu:TotalM','class'=>'input'));
		echo $this->Form->input('eu:Moneda/eu:ImpuestoM',array('placeholder'=>'eu:Moneda/eu:ImpuestoM','class'=>'input'));
		echo $this->Form->input('eu:ImpuestosR/eu:BaseImpuesto',array('placeholder'=>'eu:ImpuestosR/eu:BaseImpuesto','class'=>'input'));
		echo $this->Form->input('CadenaOriginal',array('placeholder'=>'CadenaOriginal','class'=>'input'));
		echo $this->Form->input('no_guia',array('placeholder'=>'no_guia','class'=>'input'));
		echo $this->Form->input('no_viaje',array('placeholder'=>'no_viaje','class'=>'input'));
		echo $this->Form->input('subtotal',array('placeholder'=>'subtotal','class'=>'input'));
		echo $this->Form->input('desc_flete',array('placeholder'=>'desc_flete','class'=>'input'));
		echo $this->Form->input('observacion',array('placeholder'=>'observacion','class'=>'input'));
		echo $this->Form->input('FlagIsDisminution',array('placeholder'=>'FlagIsDisminution','class'=>'input'));
		echo $this->Form->input('FlagIsProvision',array('placeholder'=>'FlagIsProvision','class'=>'input'));
		echo $this->Form->input('status_guia',array('placeholder'=>'status_guia','class'=>'input'));
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

    





