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
		* @package       PerformanceReferences
		* @subpackage    Get
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
		    // $requiere = $evaluate ? e($this->element('kml/blog/blog')) : e($this->element('requiere/norequiere') );
				// $requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
				$requiere = $evaluate ? e($this->element('kml/rentabilidad/rentabilidad')) : e($this->element('requiere/norequiere') );
				// var_dump($rendViewFullGstCoreIndicators);exit();

		?>


<div style="display:none;">
		<div id="json_one">
			<?php print($json_parsing_level_one) ?>
		</div>
		<div id="json_two">
			<?php print($json_parsing_level_two) ?>
		</div>
</div>

	<div class="row head_datetime">
		<div></div>

			<div class="six columns"></div>

			<div class="one columns dash_datetime">
				Periodo
			</div>
			<div class="one columns dash_datetime">
				del
			</div>
			<div id="date-ini" class="one columns dash_datetime">
				<?php echo $dashboard['inicio'] ?>
			</div>
			<div class="one columns dash_datetime">
				al
			</div>
			<div id="date-end" class="one columns dash_datetime">
				<?php echo $dashboard['fin'] ?>
			</div>

			<div class="one columns dash_datetime pull-right">
				Unidad de Negocio <?php echo $dashboard['bsu'] ?>
			</div>

		<div></div>

	</div>

	<!-- <div class="row">
		<div class="twelve columns">
			<div id="chart" class="chart" style="display:none;" >
						<div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">
						</div>
			</div>
		</div>
	</div> -->

	<div class="row">
		<?php ($info == 0) ? : e('<div class="alert alert-success alert-dismissible fade in" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
						</button>
						<strong>No se encontraron Registros </strong>
				</div>'); ?>
	</div>

	<div class="row noprint">
		<?php	echo $this->Session->flash();?>
	</div>

	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			<!-- <input type="text" id="kwd_search" value="" placeholder="Buscar"/> -->

			<!-- <a id="details" class="button button-primary" href="#">Totales</a>

			<a id="charting" class="button button-primary" href="#">Graficas</a>

			<a id="upd_checkboxes" class="button button-primary" href="#">Guardar</a> -->

			<!-- <div id="print" class="pull-right"> -->
				<!-- <i class="fa fa-print" aria-hidden="true"></i> -->
			<!-- </div> -->
		</div>

	</div>
<!--
	<div class="row">
 	 <div class="twelve columns">
 		 <div id="chart" class="chart" >
 					 <div id="the-chart" style="min-width:80%; min-height: 480px; margin: 0 auto">

 					 </div>
 		 </div>
 	 </div>
  </div> -->

<div class="con">
<div id="cont" style="height: 10px; margin: 0 auto"></div>
</div>


<div class="row">
<?php
// echo '<div class="two columns"><i class="fa fa-barcode"></i></div>';
// echo '<div class="two columns"></div>';
// echo
// 			$this->Form->input
// 												(
// 													'searchbox',
// 													 array
// 																(
// 																	'type'=>'text',
// 																	'class'=>'search_udn u-full-width form-control',
// 																	'id'=>'myInput',
// 																	'placeholder' => 'Filtro General',
// 																	// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
// 																	// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
// 																	'div'=>FALSE,
// 																	'label'=>FALSE,
// 																	// 'options'=>array(1=>'ATSA IZUCAR - SIVESA ORIZABA',2=>'ATSA MIXQUI - SIVESA ORIZABA',3=>'CALIZA MIXQUI - FANAL TULTITLAN'),
// 																	'tabindex'=>'2'
// 																)
// 												);\
// 	echo '</div>';
 ?>
 </div>


<div id="first-datatable-output" class="table-responsive">


		<!-- <table id="table_res" class="display order-table table table-bordered table-hover table-striped responstable"> -->
		<table id="table_response" class="table table-striped table-bordered">
			<thead>
				<tr>
												<!-- <th>id</th> -->
												<!-- <th>Guias</th> -->
												<th>Viaje</th>
												<!-- <th>Guia</th> -->
												<!-- <th>id_area</th> -->
												<!-- <th>IsEmptyTrip</th> -->
												<!-- <th>InReembarco</th> -->
												<!-- <th>TipoViajeReembarco</th> -->
												<!-- <th>no_liquidacion</th> -->
												<!-- <th>viaje_no_guia</th> -->
												<!-- <th>reembarco_no_guia</th> -->
												<!-- <th>viaje1</th> -->
												<!-- <th>viaje2</th> -->
												<!-- <th>kms_ruta1</th> -->
												<!-- <th>kms_ruta2</th> -->
												<!-- <th>TipoViaje</th> -->
												<th>Unidad de Negocio</th>
												<!-- <th>TiempoTotal</th> -->

												<!-- <th>kms</th> -->
												<!-- <th>TipoOperacion</th> -->
												<!-- <th>f_despachado</th> -->
												<!-- <th>mes-despacho</th> -->
												<!-- <th>f_despachado_m</th> -->
												<th>Operacion</th>
												<!-- <th>fraccion</th> -->
												<!-- <th>fraction</th> -->
												<!-- <th>peso-despachado</th> -->
												<!-- <th>subtotal</th> -->
												<!-- <th>Operador</th> -->
												<th>Unidad</th>
												<th>Cliente</th>
												<!-- <th>Remitente</th> -->
												<!-- <th>Destinatario</th> -->

												<!-- <th>fecha_guia</th> -->
												<th>Origen</th>
												<th>Destino</th>

												<th>TiempoCarga</th>
												<th>TiempoTransito</th>
												<th>TiempoDescarga</th>
												<th>TiempoCiclo</th>
												<th>LlegadaATiempo</th>

												<!-- <th>kms_real</th> -->
												<!-- <th>INICIO DE VIAJE</th> -->
												<!-- <th>LLEGADA A CARGA</th> -->
												<!-- <th>INICIO DE CARGA</th> -->
												<!-- <th>FIN DE CARGA</th> -->
												<!-- <th>EN RUTA CARGADO</th> -->
												<!-- <th>LLEGADA A DESCARGA</th> -->
												<!-- <th>INICIO DE DESCARGA</th> -->
												<!-- <th>FIN DE DESCARGA</th> -->
												<!-- <th>FIN DE VIAJE</th> -->
												<!-- <th>id_seguimiento</th> -->
												<!-- <th>periodo_despachado</th> -->
												<!-- <th>status_guia</th> -->
												<!-- <th>prestamo</th> -->
												<!-- <th>tipo_doc</th> -->
												<!-- <th>trip_count</th> -->
												<!-- <th>FlagIsDisminution</th> -->
												<!-- <th>FlagIsProvision</th> -->
												<!-- <th>FlagIsNextMonth</th> -->
				</tr>
			</thead>
		<tbody>
		<?php
		foreach ($logisticaViewGstDatesheets as $key => $logisticaViewGstDatesheet) {
			// code...
		?>

		<tr>
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['id']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['Guias']; ?></td> -->
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['no_viaje']; ?></td>
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['num_guia']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['id_area']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['IsEmptyTrip']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['InReembarco']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['TipoViajeReembarco']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['no_liquidacion']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['viaje_no_guia']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['reembarco_no_guia']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['viaje1']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['viaje2']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['kms_ruta1']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['kms_ruta2']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['TipoViaje']; ?></td> -->
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['area']; ?></td>
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['TiempoTotal']; ?></td> -->

			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['kms_viaje']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['tipo_de_operacion']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['f_despachado']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['mes-despacho']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['f_despachado_m']; ?></td> -->
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['projections_rp_definition']; ?></td>
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['fraccion']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['fraction']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['peso-despachado']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['subtotal']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['Operador']; ?></td> -->
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['id_unidad']; ?></td>
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['cliente']; ?></td>
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['remitente']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['destinatario']; ?></td> -->

			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['fecha_guia']; ?></td> -->
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['Origen']; ?></td>
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['Destino']; ?></td>

			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['kms_real']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['InicioDeViaje']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['LlegadaACarga']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['InicioDeCarga']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['FinDeCarga']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['EnRutaCargado']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['LlegadaADescarga']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['InicioDeDescarga']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['FinDeDescarga']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['FinDeViaje']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['id_seguimiento']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['periodo_despachado']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['status_guia']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['prestamo']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['tipo_doc']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['trip_count']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['FlagIsDisminution']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['FlagIsProvision']; ?></td> -->
			<!-- <td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['FlagIsNextMonth']; ?></td> -->
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['TiempoCarga']; ?></td>
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['TiempoTransito']; ?></td>
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['TiempoDescarga']; ?></td>
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['TiempoCiclo']; ?></td>
			<td><?php echo $logisticaViewGstDatesheet['LogisticaViewGstDatesheet']['LlegadaATiempo']; ?></td>
		</tr>
	<?php }//endforeach; ?>
		</tbody>
		<?php /*
		<tfoot>
	            <tr>
	                <th colspan="9" style="text-align:right">Total:</th>
	                <th></th>
	                <th></th>
	                <!-- <th></th> -->
	                <!-- <th></th> -->
	                <th class="rendimiento_totales"></th>
	            </tr>
	  </tfoot>
		*/?>
		</table>
</div>
