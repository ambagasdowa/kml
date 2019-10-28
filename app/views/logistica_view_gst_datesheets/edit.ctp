
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
							<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('LogisticaViewGstDatesheet.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('LogisticaViewGstDatesheet.id'))); ?>						</li>
										<li>
							<?php echo $this->Html->link(__('List Logistica View Gst Datesheets', true), array('action' => 'index'),array('class'=>'btn btn-default list-group-item'));?>						</li>
				
			</ul>
        </div>


<!--         <div class="col-sm-9 col-sm-offset-2 col-md-6 col-md-offset-3 main"> -->
		<div class="container">
		<i class="fa fa-file-o fa-2x"></i>
		  <h2 class="form-signin-heading">
			<span>
					 <?php __('Edit Logistica View Gst Datesheet'); ?>			</span>
		</h2>
		
          <?php echo $this->Form->create('LogisticaViewGstDatesheet',array('enctype' => 'multipart/form-data','class'=>'form'));?>
			<div class="logisticaViewGstDatesheets form">

<!-- 				 -->
<!-- 				<div class="table-responsive"> -->
<!-- 					<table class="table table-bordered table-hover table-striped responstable"> -->
							<?php
		echo $this->Form->input('id',array('placeholder'=>'id','class'=>'input'));
		echo $this->Form->input('Guias',array('placeholder'=>'Guias','class'=>'input'));
		echo $this->Form->input('no_viaje',array('placeholder'=>'no_viaje','class'=>'input'));
		echo $this->Form->input('num_guia',array('placeholder'=>'num_guia','class'=>'input'));
		echo $this->Form->input('id_area',array('placeholder'=>'id_area','class'=>'input'));
		echo $this->Form->input('IsEmptyTrip',array('placeholder'=>'IsEmptyTrip','class'=>'input'));
		echo $this->Form->input('InReembarco',array('placeholder'=>'InReembarco','class'=>'input'));
		echo $this->Form->input('TipoViajeReembarco',array('placeholder'=>'TipoViajeReembarco','class'=>'input'));
		echo $this->Form->input('no_liquidacion',array('placeholder'=>'no_liquidacion','class'=>'input'));
		echo $this->Form->input('viaje_no_guia',array('placeholder'=>'viaje_no_guia','class'=>'input'));
		echo $this->Form->input('reembarco_no_guia',array('placeholder'=>'reembarco_no_guia','class'=>'input'));
		echo $this->Form->input('viaje1',array('placeholder'=>'viaje1','class'=>'input'));
		echo $this->Form->input('viaje2',array('placeholder'=>'viaje2','class'=>'input'));
		echo $this->Form->input('kms_ruta1',array('placeholder'=>'kms_ruta1','class'=>'input'));
		echo $this->Form->input('kms_ruta2',array('placeholder'=>'kms_ruta2','class'=>'input'));
		echo $this->Form->input('TipoViaje',array('placeholder'=>'TipoViaje','class'=>'input'));
		echo $this->Form->input('area',array('placeholder'=>'area','class'=>'input'));
		echo $this->Form->input('tipo_de_operacion',array('placeholder'=>'tipo_de_operacion','class'=>'input'));
		echo $this->Form->input('f_despachado',array('placeholder'=>'f_despachado','class'=>'input'));
		echo $this->Form->input('mes-despacho',array('placeholder'=>'mes-despacho','class'=>'input'));
		echo $this->Form->input('f_despachado_m',array('placeholder'=>'f_despachado_m','class'=>'input'));
		echo $this->Form->input('projections_rp_definition',array('placeholder'=>'projections_rp_definition','class'=>'input'));
		echo $this->Form->input('fraccion',array('placeholder'=>'fraccion','class'=>'input'));
		echo $this->Form->input('fraction',array('placeholder'=>'fraction','class'=>'input'));
		echo $this->Form->input('peso-despachado',array('placeholder'=>'peso-despachado','class'=>'input'));
		echo $this->Form->input('subtotal',array('placeholder'=>'subtotal','class'=>'input'));
		echo $this->Form->input('Operador',array('placeholder'=>'Operador','class'=>'input'));
		echo $this->Form->input('cliente',array('placeholder'=>'cliente','class'=>'input'));
		echo $this->Form->input('remitente',array('placeholder'=>'remitente','class'=>'input'));
		echo $this->Form->input('destinatario',array('placeholder'=>'destinatario','class'=>'input'));
		echo $this->Form->input('id_unidad',array('placeholder'=>'id_unidad','class'=>'input'));
		echo $this->Form->input('fecha_guia',array('placeholder'=>'fecha_guia','class'=>'input'));
		echo $this->Form->input('Origen',array('placeholder'=>'Origen','class'=>'input'));
		echo $this->Form->input('Destino',array('placeholder'=>'Destino','class'=>'input'));
		echo $this->Form->input('kms_viaje',array('placeholder'=>'kms_viaje','class'=>'input'));
		echo $this->Form->input('kms_real',array('placeholder'=>'kms_real','class'=>'input'));
		echo $this->Form->input('TiempoTotal',array('placeholder'=>'TiempoTotal','class'=>'input'));
		echo $this->Form->input('TiempoCarga',array('placeholder'=>'TiempoCarga','class'=>'input'));
		echo $this->Form->input('TiempoTransito',array('placeholder'=>'TiempoTransito','class'=>'input'));
		echo $this->Form->input('TiempoDescarga',array('placeholder'=>'TiempoDescarga','class'=>'input'));
		echo $this->Form->input('TiempoCiclo',array('placeholder'=>'TiempoCiclo','class'=>'input'));
		echo $this->Form->input('LlegadaATiempo',array('placeholder'=>'LlegadaATiempo','class'=>'input'));
		echo $this->Form->input('INICIO DE VIAJE',array('placeholder'=>'INICIO DE VIAJE','class'=>'input'));
		echo $this->Form->input('LLEGADA A CARGA',array('placeholder'=>'LLEGADA A CARGA','class'=>'input'));
		echo $this->Form->input('INICIO DE CARGA',array('placeholder'=>'INICIO DE CARGA','class'=>'input'));
		echo $this->Form->input('FIN DE CARGA',array('placeholder'=>'FIN DE CARGA','class'=>'input'));
		echo $this->Form->input('EN RUTA CARGADO',array('placeholder'=>'EN RUTA CARGADO','class'=>'input'));
		echo $this->Form->input('LLEGADA A DESCARGA',array('placeholder'=>'LLEGADA A DESCARGA','class'=>'input'));
		echo $this->Form->input('INICIO DE DESCARGA',array('placeholder'=>'INICIO DE DESCARGA','class'=>'input'));
		echo $this->Form->input('FIN DE DESCARGA',array('placeholder'=>'FIN DE DESCARGA','class'=>'input'));
		echo $this->Form->input('FIN DE VIAJE',array('placeholder'=>'FIN DE VIAJE','class'=>'input'));
		echo $this->Form->input('id_seguimiento',array('placeholder'=>'id_seguimiento','class'=>'input'));
		echo $this->Form->input('periodo_despachado',array('placeholder'=>'periodo_despachado','class'=>'input'));
		echo $this->Form->input('status_guia',array('placeholder'=>'status_guia','class'=>'input'));
		echo $this->Form->input('prestamo',array('placeholder'=>'prestamo','class'=>'input'));
		echo $this->Form->input('tipo_doc',array('placeholder'=>'tipo_doc','class'=>'input'));
		echo $this->Form->input('trip_count',array('placeholder'=>'trip_count','class'=>'input'));
		echo $this->Form->input('FlagIsDisminution',array('placeholder'=>'FlagIsDisminution','class'=>'input'));
		echo $this->Form->input('FlagIsProvision',array('placeholder'=>'FlagIsProvision','class'=>'input'));
		echo $this->Form->input('FlagIsNextMonth',array('placeholder'=>'FlagIsNextMonth','class'=>'input'));
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

    





