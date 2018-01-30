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
				$requiere = $evaluate ? e($this->element('kml/forms/forms')) : e($this->element('requiere/norequiere') );
		?>


	<div class="row head_datetime">
<div>&nbsp;</div>
		<div class="six columns"></div>

		<div class="one columns dash_datetime">
			Periodo
		</div>
		<div class="one columns dash_datetime">
			del
		</div>
		<div class="one columns dash_datetime">
			<?php echo $dashboard['inicio'] ?>
		</div>
		<div class="one columns dash_datetime">
			al
		</div>
		<div class="one columns dash_datetime">
			<?php echo $dashboard['fin'] ?>
		</div>

		<div class="one columns dash_datetime pull-right">
			Unidad de Negocio <?php echo $dashboard['bsu'] ?>
		</div>

<div>&nbsp;</div>
	</div>

	<div class="row">
		<div class="twelve columns">
			<div id="chart" class="chart" style="display:none;">
			<!-- <div id="chart" class="chart"> -->
				<div id="the-chart">

				</div>
			</div>
		</div>
	</div>


	<div class="row noprint">
		<?php	echo $this->Session->flash();?>
	</div>

	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			<input type="text" id="kwd_search" value="" placeholder="Buscar"/>

			<a id="details" class="button button-primary" href="#">Totales</a>

			<!-- <a id="charting" class="button button-primary" href="#">Graficas</a> -->
			<!-- <a id="charting" class="button button-primary" href="#" style="display:none;">Graficas</a> -->

			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>

	<div class="row">
			<div class="twelve columns">
				<table class="table table-hover">
					<tr>
						<th colspan="<?php echo count($performanceGeneral)*2; ?>">Totales</th>
					</tr>
					<tr>
							<?php
								foreach ($performanceGeneral as $inx_gral => $gral_data) {
										echo "<td>{$inx_gral}</td>";
										echo "<td>{$gral_data}</td>";
								}
							?>
					</tr>
				</table>
			</div>
	</div>


<div id="first-datatable-output" class="table-responsive">

		<table id="tableFilter" class="table table-bordered table-hover">

		<thead class="detail_header">
			<tr class="cache-header">
            <th>Cliente</th>
            <th>Porte</th>
            <!-- <th>id</th> -->
            <th>Unidad</th>
            <!-- <th>id_configuracionviaje</th> -->
            <!-- <th>id_tipo_operacion</th> -->
            <!-- <th>id_fraccion</th> -->
            <!-- <th>id_flota</th> -->
            <th class="hideme">Viaje</th>
            <!-- <th>num_guia</th> -->
            <th class="hideme">No guia</th>
            <!-- <th>f_despachado</th> -->
            <th class="hideme">Inicio de Viaje</th>
            <th>Cierre de Viaje</th>
            <th>End</th>
            <th>RecepcionEvidencias</th>
            <th>Reception</th>
            <th>Aceptaci&oacute;n de Viajes</th>
            <th>Aceptance</th>
            <th>EntregaEvidenciasCliente</th>
            <th>Deliver</th>
            <th>ValidacionEvidenciasCliente</th>
            <th>Validation</th>
            <th class="hideme">Mes</th>
            <!-- <th>cliente</th> -->
            <!-- <th>kms_viaje</th> -->
            <!-- <th>kms_real</th> -->
            <th class="hideme">Subtotal</th>
            <!-- <th>peso</th> -->
            <th class="hideme">Configuracion_viaje</th>
            <th class="hideme">Tipo_de_operacion</th>
            <th class="hideme">Flota</th>
            <th class="hideme">Area</th>
            <th class="hideme">Fraccion</th>
			</tr>

		</thead>

		<tbody>

		<?php
			foreach ($performanceReferencesMod as $performanceReferencesKey => $performanceReferences) {
		?>

		<?php
			foreach ($performanceReferences as $performanceViewViaje):
		?>
				<tr class="dropdown-container_<?php print($performanceReferencesKey)?>">

					<td><?php echo $performanceReferencesIdx[$performanceReferencesKey]; ?></td>

					<td class="item_<?php echo $performanceReferencesKey?>">
<!-- `performance_no_guia_id` 			varchar(250) not null,
`performance_num_guia_id`			varchar(250) not null,
`performance_no_viaje_id`			varchar(250) not null,
`projections_corporations_id` 	varchar(250) not null,
`id_area`							varchar(250) not null, -->
						<?php
									echo
									$this->Html->link(
																			$performanceViewViaje['PerformanceViewViaje']['num_guia'],
																			// array('action' => 'get', null),
																			array('controller' => 'performance_customers', 'action' => 'view', $performanceViewViaje['PerformanceViewViaje']['num_guia']),
																			array(
																						'id'=>'get_factura_'.$performanceViewViaje['PerformanceViewViaje']['num_guia'],
																						'data-id'=>$performanceViewViaje['PerformanceViewViaje']['internal_id'],
																						'data-numguia'=>$performanceViewViaje['PerformanceViewViaje']['num_guia'],
																						'data-guia'=>$performanceViewViaje['PerformanceViewViaje']['no_guia'],
																						'data-viaje' => $performanceViewViaje['PerformanceViewViaje']['no_viaje'],
																						'data-empresa' => $performanceViewViaje['PerformanceViewViaje']['company'],
																						'data-area' => $performanceViewViaje['PerformanceViewViaje']['id_area'],
																						'div'=>false
																					)
																		);
						?>
					</td>
<!-- add -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['id']; ?>&nbsp;</td> -->
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_unidad']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_configuracionviaje']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_tipo_operacion']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_fraccion']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_flota']; ?>&nbsp;</td> -->
          <td class="hideme"><?php echo $performanceViewViaje['PerformanceViewViaje']['no_viaje']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['num_guia']; ?>&nbsp;</td> -->
          <td class="hideme"><?php echo $performanceViewViaje['PerformanceViewViaje']['no_guia']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['f_despachado']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['fecha_ingreso']; ?>&nbsp;</td> -->
					<td class="hideme">
							<?php
									!empty($performanceViewViaje['PerformanceViewViaje']['fecha_ingreso']) ? e(date('Y-m-d',strtotime($performanceViewViaje['PerformanceViewViaje']['fecha_ingreso']))) : e('&infin;') ;
							?>
					</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['fecha_guia']; ?>&nbsp;</td> -->
					<td>
							<?php
									!empty($performanceViewViaje['PerformanceViewViaje']['fecha_guia']) ? e(date('Y-m-d',strtotime($performanceViewViaje['PerformanceViewViaje']['fecha_guia']))) : e('&infin;') ;
							?>
					</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['end']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['recepcionEvidencias']; ?>&nbsp;</td> -->
					<td>
							<?php
									!empty($performanceViewViaje['PerformanceViewViaje']['recepcionEvidencias']) ? e(date('Y-m-d',strtotime($performanceViewViaje['PerformanceViewViaje']['recepcionEvidencias']))) : e('&infin;') ;
							?>
					</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['reception']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['fecha_modifico']; ?>&nbsp;</td> -->
					<td>
							<?php
									!empty($performanceViewViaje['PerformanceViewViaje']['fecha_modifico']) ? e(date('Y-m-d',strtotime($performanceViewViaje['PerformanceViewViaje']['fecha_modifico']))) : e('&infin;') ;
							?>
					</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['aceptance']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['entregaEvidenciasCliente']; ?>&nbsp;</td> -->
					<td>
							<?php
									!empty($performanceViewViaje['PerformanceViewViaje']['entregaEvidenciasCliente']) ? e(date('Y-m-d',strtotime($performanceViewViaje['PerformanceViewViaje']['entregaEvidenciasCliente']))) : e('&infin;') ;
							?>
					</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['deliver']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['validacionEvidenciasCliente']; ?>&nbsp;</td> -->
					<td>
							<?php
									!empty($performanceViewViaje['PerformanceViewViaje']['validacionEvidenciasCliente']) ? e(date('Y-m-d',strtotime($performanceViewViaje['PerformanceViewViaje']['validacionEvidenciasCliente']))) : e('&infin;') ;
							?>
					</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['validation']; ?>&nbsp;</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['mes']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['cliente']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['kms_viaje']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['kms_real']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['subtotal']; ?>&nbsp;</td> -->
          <td>
						<?php
							echo
							number_format(
									money_format(
											'%i',
											(
											$performanceViewViaje['PerformanceViewViaje']['subtotal']
											)
									), 2, '.', ','
							);
						?>&nbsp;
					</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['peso']; ?>&nbsp;</td> -->
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['configuracion_viaje']; ?>&nbsp;</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['tipo_de_operacion']; ?>&nbsp;</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['flota']; ?>&nbsp;</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['area']; ?>&nbsp;</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['fraccion']; ?>&nbsp;</td>
<!-- add -->
				</tr>

			<?php
					endforeach;
			?>

      <!-- footer -->
			<tr id="resume_footer" class="resume_compact_footer success">
				<td><?php echo $performanceReferencesIdx[$performanceReferencesKey]; ?></td>
				<td>
					<?php //print($performanceReferencesKey)?>
					Cartas Porte
				</td>
				<td id="footer_dropdown_qty_<?php print($performanceReferencesKey)?>">
					<?php
						echo count($performanceReferencesResume[$performanceReferencesKey]['end']);
					?>
				</td>

				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="compact_footer">Cierre de Viaje</td>

				<td id="footer_dropdown_promedio_deliver_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['end'])/count($performanceReferencesResume[$performanceReferencesKey]['end'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['end'])
													/
												$subgeneral[$performanceReferencesKey]['end']
										)
								), 2, '.', ','
						);
					?>
				</td>
				<td id="_footer_td" class="compact_footer">Recepcion de Evidencias</td>
				<td id="footer_dropdown_promedio_proved_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['reception'])/count($performanceReferencesResume[$performanceReferencesKey]['reception'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['reception'])
													/
												$subgeneral[$performanceReferencesKey]['reception']
										)
								), 2, '.', ','
						);
					?>
				</td>
				<td id="_footer_td" class="compact_footer">Promedio Aceptacion de Documentos</td>
				<td id="footer_dropdown_promedio_promise_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['aceptance'])/count($performanceReferencesResume[$performanceReferencesKey]['aceptance'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['aceptance'])
													/
												$subgeneral[$performanceReferencesKey]['aceptance']
										)
								), 2, '.', ','
						);
					?>
				</td>
				<td id="_footer_td" class="compact_footer">Entrega de Evidencias</td>
				<td id="footer_dropdown_promedio_payment_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['deliver'])/count($performanceReferencesResume[$performanceReferencesKey]['deliver'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['deliver'])
													/
												$subgeneral[$performanceReferencesKey]['deliver']
										)
								), 2, '.', ','
						);
					?>
				</td>

				<td id="_footer_td" class="compact_footer">Validacion de Evidencias</td>
				<td id="footer_dropdown_promedio_payment_<?php print($performanceReferencesKey)?>">
					<?php
						// echo (array_sum($performanceReferencesResume[$performanceReferencesKey]['validation'])/count($performanceReferencesResume[$performanceReferencesKey]['validation'])) ;
						echo
						number_format(
								money_format(
										'%i',
										(
												array_sum($performanceReferencesResume[$performanceReferencesKey]['validation'])
													/
												$subgeneral[$performanceReferencesKey]['validation']
										)
								), 2, '.', ','
						);
					?>
				</td>

				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>
				<td id="_footer_td" class="hideme"></td>

			</tr>
			<?php
				}
			?>


			</tbody>
		</table>

		<div id="paging-first-datatable"></div>

</div>


<!-- if clients -->
