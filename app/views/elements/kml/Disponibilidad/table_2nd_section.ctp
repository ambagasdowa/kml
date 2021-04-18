<!-- disponibilidad_view_rpt_group_clasifications_indicators -->

		<table id="table_2nd_section" class="display order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
				<th>Area</th>
				<th>Flota</th>
				<th>Vehiculo</th>
				<th>Disponible</th>
				<th>Operando</th>
				<th>Taller</th>
				<th>Gestoria</th>
				<th>Siniestrado</th>
				<th>Robo</th>
				<th>Exhibicion</th>
				<th>Venta</th>
				<th>TotalDisp</th>
				<th>TotalFlota</th>
				<th>DispFlota</th>
				<th>FlotaOperando</th>
				<th>Disp.S/Viaje</th>
				<th>Op.FlotaGestoria/Sin.</th>
				<th>FlotaMtto</th>
			</tr>
		</thead>
		<tbody>
		<?php
		foreach ($disponibilidadViewClasifications as $key => $disponibilidadViewClass) {
			// code...
		?>
		<tr> 
			<td>
						<?php
									echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['area'];
						?>
			</td>
			<td style="width:20%;">
					<?php
							echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Flota'];
					?>
			</td>

			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['TipoVehiculo']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Disponible']; ?></td>
			<td>
				<?php
							echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Operando'];
				?>
			</td>
			<td>
				<?php
							echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Taller'];
				?>
			</td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Gestoria']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Siniestrado']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Robo']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Exhibicion']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Venta']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['TotalDisponibilidad']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['TotalFlota']; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['DisponibilidadFlota'].' %'; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['FlotaOperando'].' %'; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Disp_S_Viaje'].' %'; ?></td>
			<td><?php echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['Op_FlotaGestoria_Siniestro'].' %'; ?></td>
			<td>
				<?php 
							$mtto = $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['FlotaMtto'];
							echo $mtto > 10 ? '<span style="color:red"> ':'<span>';
							echo $disponibilidadViewClass['DisponibilidadViewRptGroupClasificationsIndicator']['FlotaMtto'].' % </span>'; 
				?>
			</td>
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
