		<table id="table_grp" class="display order-table table table-bordered table-hover table-striped responstable">
			<thead>
					<!-- <th><?php echo 'id';?></th> -->
					<th><?php echo 'Unidades';?></th>
					<!-- <th><?php echo 'id_status';?></th> -->
					<th><?php echo 'Estatus';?></th>
					<!-- <th><?php echo 'id_area';?></th> -->
					<!-- <th><?php echo 'Area';?></th> -->
			</thead>
			<tbody>
				<?php
					foreach ($disponibilidadViewRptGroupGstIndicators as $key => $disponibilidadViewRptGroupGstIndicator) {
				?>
				<tr>
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id']; ?></td> -->
					<td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['unidades']; ?></td>
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id_status']; ?></td> -->
					<td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['clasification_name']; ?></td>
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id_area']; ?></td> -->
					<!-- <td><?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['area']; ?></td> -->
				</tr>
				<?php } ?>
			</tbody>
			<tfoot>
					<td></td>
					<td></td>
			</tfoot>
		</table>
