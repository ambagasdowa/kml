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



	<div class="row noprint">

		<div class="two colums">

		</div>

		<div class="ten colums">
			Filtrar: <input type="text" id="kwd_search" value=""/>

			<div id="print" class="pull-right">
				<i class="fa fa-print" aria-hidden="true"></i>
			</div>
		</div>

	</div>


<div id="first-datatable-output">

		<table id="tableFilter" class="table table-bordered dropdown-filter-table dropdown-processed">

		<thead>
			<tr id="detail_header" class="detail_header">
            <th class="firts-header-element"><?php echo 'Cliente'; ?> </th>
            <th><?php echo 'Porte'; ?> </th>
            <!-- <th><?php echo 'id'; ?> </th> -->
            <th><?php echo 'id_unidad'; ?> </th>
            <!-- <th><?php echo 'id_configuracionviaje'; ?> </th> -->
            <!-- <th><?php echo 'id_tipo_operacion'; ?> </th> -->
            <!-- <th><?php echo 'id_fraccion'; ?> </th> -->
            <!-- <th><?php echo 'id_flota'; ?> </th> -->
            <th><?php echo 'no_viaje'; ?> </th>
            <th><?php echo 'num_guia'; ?> </th>
            <th><?php echo 'no_guia'; ?> </th>
            <!-- <th><?php echo 'f_despachado'; ?> </th> -->
            <th><?php echo 'fecha_ingreso'; ?> </th>
            <th><?php echo 'fecha_guia'; ?> </th>
            <th><?php echo 'end'; ?> </th>
            <th><?php echo 'recepcionEvidencias'; ?> </th>
            <th><?php echo 'reception'; ?> </th>
            <th><?php echo 'fecha_modifico'; ?> </th>
            <th><?php echo 'aceptance'; ?> </th>
            <th><?php echo 'entregaEvidenciasCliente'; ?> </th>
            <th><?php echo 'deliver'; ?> </th>
            <th><?php echo 'validacionEvidenciasCliente'; ?> </th>
            <th><?php echo 'validation'; ?> </th>
            <th><?php echo 'mes'; ?> </th>
            <!-- <th><?php echo 'cliente'; ?> </th> -->
            <!-- <th><?php echo 'kms_viaje'; ?> </th> -->
            <!-- <th><?php echo 'kms_real'; ?> </th> -->
            <th><?php echo 'subtotal'; ?> </th>
            <!-- <th><?php echo 'peso'; ?> </th> -->
            <th><?php echo 'configuracion_viaje'; ?> </th>
            <th><?php echo 'tipo_de_operacion'; ?> </th>
            <th><?php echo 'flota'; ?> </th>
            <th><?php echo 'area'; ?> </th>
            <th><?php echo 'fraccion'; ?> </th>
            <!-- <th><?php echo 'company'; ?> </th> -->
            <!-- <th><?php echo 'trip_count'; ?> </th> -->
            <!-- <th><?php echo 'internal_id'; ?> </th> -->
            <!-- <th><?php echo 'id_area'; ?> </th> -->
            <!-- <th><?php echo 'performance_bsus_id'; ?> </th> -->
            <!-- <th><?php echo 'recepcionEvidencias'; ?> </th> -->
            <!-- <th><?php echo 'entregaEvidenciasCliente'; ?> </th> -->
            <!-- <th><?php echo 'validacionEvidenciasCliente'; ?> </th> -->
            <!-- <th><?php echo 'user_id'; ?> </th> -->
            <!-- <th><?php echo 'status'; ?> </th> -->
            <!-- <th><?php echo 'created'; ?> </th> -->
            <!-- <th><?php echo 'modified'; ?> </th> -->

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
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['no_viaje']; ?>&nbsp;</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['num_guia']; ?>&nbsp;</td>
          <td><?php echo $performanceViewViaje['PerformanceViewViaje']['no_guia']; ?>&nbsp;</td>
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['f_despachado']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['fecha_ingreso']; ?>&nbsp;</td> -->
					<td>
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
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['company']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['trip_count']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['internal_id']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['id_area']; ?>&nbsp;</td> -->
          <!-- <td>
            <?php echo $this->Html->link($performanceViewViaje['PerformanceBsus']['label'], array('controller' => 'performance_bsus', 'action' => 'view', $performanceViewViaje['PerformanceBsus']['id'])); ?>
          </td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['recepcionEvidencias']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['entregaEvidenciasCliente']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['validacionEvidenciasCliente']; ?>&nbsp;</td> -->
          <!-- <td>
            <?php echo $this->Html->link($performanceViewViaje['User']['name'], array('controller' => 'users', 'action' => 'view', $performanceViewViaje['User']['id'])); ?>
          </td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['status']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['created']; ?>&nbsp;</td> -->
          <!-- <td><?php echo $performanceViewViaje['PerformanceViewViaje']['modified']; ?>&nbsp;</td> -->
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

				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer">
					<?php
						// echo array_sum($performanceReferencesResume[$performanceReferencesKey]['deliver']);
					?>
				</td>
				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>
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
												count($performanceReferencesResume[$performanceReferencesKey]['end'])
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
												count($performanceReferencesResume[$performanceReferencesKey]['reception'])
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
												count($performanceReferencesResume[$performanceReferencesKey]['aceptance'])
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
												count($performanceReferencesResume[$performanceReferencesKey]['deliver'])
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
												count($performanceReferencesResume[$performanceReferencesKey]['validation'])
										)
								), 2, '.', ','
						);
					?>
				</td>

				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>
				<td id="_footer_td" class="compact_footer"></td>

			</tr>
			<?php
				}
			?>


			</tbody>
		</table>

		<div id="paging-first-datatable"></div>

</div>


<!-- if clients -->
