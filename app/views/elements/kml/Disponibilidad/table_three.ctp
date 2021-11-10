
		<table id="table_det" class="display order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<th><?php echo 'UdN';?></th>
				<th><?php echo 'Unidad';?></th>
				<th><?php echo 'Estatus';?></th>
		    <th class="xts">Status</th>
		    <th class="xts">Clasification</th>
		    <th class="xts">Group</th>
				<!-- <th><?php echo 'Tipo_status';?></th> -->
			<!--	<th><?php echo 'Operador';?></th> -->
				<th><?php echo 'Remolque';?></th>
				<!-- <th><?php echo 'Area';?></th> -->
				<th><?php echo 'Operacion';?></th>
				<th>Raz&oacute;nRep</th>
				<th><?php echo 'AreaTaller';?></th>
				<th>Descripci&oacute;n</th>
				<th>FechaIngreso</th>
<!--				<th><?php echo 'Fecha Compromiso';?></th> -->
				<th><?php echo 'NoOrden';?></th>
				<th>DiasEstatus</th>
				<th><?php echo 'FechaPrometida';?></th>
				<!-- <th><?php echo 'Status_viaje';?></th> -->
				<!-- <th><?php echo 'Desc_viaje';?></th> -->
				<!-- <th><?php echo 'Status_taller';?></th> -->
				<!-- <th><?php echo 'Desc_taller';?></th> -->
				<!-- <th><?php echo 'Iseditable';?></th> -->
				<th class="xts">Count</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($disponibilidadViewRptUnidadesGstIndicators as $key => $disponibilidadViewRptUnidadesGstIndicator) {
			// code...
		?>
		<tr id="<?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'] ?>">
			<td>
					<?php	echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['area']; ?>
			</td>
			<td>
						<?php
									echo
									$this->Html->link(
																			$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																			// array('action' => 'get', null),
																			array('controller' => 'DisponibilidadViewRptUnidadesGstIndicator', 'action' => 'view', $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad']),
																			array(
																						'id'=>'historical_'.$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-empresa' => $performanceReference['PerformanceViewFactura']['Empresa'],
																						// 'data-resume' => $performanceReference['PerformanceViewFactura']['performance_customers_id'],
																						'div'=>false
																					)
																		);
						?>
			</td>
			<td style="width:20%;"><?php
			 			if ($disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable'] == true and $user_mod == true ) {
							echo
										$this->Form->input
																			(
																				'searchbox',
																				 array
																							(
																								'type'=>'select',
																								'class'=>'update_status u-full-width form-control',
																								'id'=>'myInput',
																								'style'=>'width:100%;margin:0 auto;overflow:auto;position:relative;overflow:hidden;',
																								'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																								'data-status'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																								'data-user' => $user_id,
																								'placeholder' => $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																								// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																								// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																								'selected'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																								'div'=>FALSE,
																								'label'=>FALSE,
																								'empty'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																								'options'=>$disponibilidadViewStatusGstIndicators
																								// 'tabindex'=>'2'
																							)
																			);
			 			} else {
							echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'];
						}

								// echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['tipo_status'];
					?>
			</td>

			<td class="xts"><?php	echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus']; ?></td>
			<td class="xts"><?php	echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['clasification_name']; ?></td>
			<td class="xts"><?php	echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['group_name']; ?></td>

			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['remolque']; ?></td>
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['area']; ?>&nbsp;</td> -->
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['segmento']; ?></td>
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['desc_taller']; ?></td>
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['area_taller']; ?></td>
			<td>
				<?php
				if ($disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable'] == true and $user_mod == true ) {
					echo
								$this->Form->input
																	(
																		'searchbox',
																		 array
																					(
																						'type'=>'text',
																						'class'=>'u-full-width form-control',
																						'id'=>'description_'.$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-status'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						// 'placeholder' => $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'selected'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						'style'=>'width:100%;margin:0 auto;overflow:auto;position:relative;overflow:hidden;',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>$disponibilidadViewStatusGstIndicators
																						// 'tabindex'=>'2'
																					)
																	);
				} else {
							echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['description'];
				}
				?>
			</td>
			<td>
				<?php
					echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['fecha_ingreso'];
				?>
			</td>

<!--
			<td>
				<?php
				if ($disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable'] == true and $user_mod == true ) {
					echo
								$this->Form->input
																	(
																		'searchbox',
																		 array
																					(
																						'type'=>'text',
																						'class'=>'calendar u-full-width form-control',
																						'id'=>'compromise_'.$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-unidad'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['unidad'],
																						// 'data-status'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						// 'placeholder' => $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['estatus'],
																						// 'alt'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'title'=>'Puede teclear la fecha en Formato yyyymmdd',
																						// 'selected'=>$disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_status'],
																						'style'=>'width:100%;margin:0 auto;overflow:auto;position:relative;overflow:hidden;',
																						'div'=>FALSE,
																						'label'=>FALSE
																						// 'options'=>$disponibilidadViewStatusGstIndicators
																						// 'tabindex'=>'2'
																					)
																	);
				} else {
							echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['compromise'];
				}
				?>
			</td>
-->

			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['status_viaje']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['desc_viaje']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['status_taller']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['desc_taller']; ?>&nbsp;</td> -->
			<!-- <td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['iseditable']; ?>&nbsp;</td> -->
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['id_orden']; ?></td>
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['StatusDays']; ?></td>
			<td><?php echo $disponibilidadViewRptUnidadesGstIndicator['DisponibilidadViewRptUnidadesGstIndicator']['fecha_prometida']; ?></td>
			<th class="xts">1</th>
		</tr>
	<?php } //endforeach; ?>
		</tbody>
<!--		<tfoot>
							<tr>
									<th colspan="2"></th>
									<th colspan="3" class="xts">&nbsp;</th>
									<th colspan="7" style="text-align:right">Total Unidades:</th>
									<th id="sum_result"></th>
									<th class="xtss"></th>
	            </tr>
	  </tfoot>-->
		</table>
