	



<table class="order-table table table-bordered table-hover table-striped responstable">
		<thead>
			<tr>
			    <th><?php echo $this->Paginator->sort('id');?></th>
			    <th><?php echo $this->Paginator->sort('id_area');?></th>
			    <th><?php echo $this->Paginator->sort('year');?></th>
			    <th><?php echo $this->Paginator->sort('UnidadNegocio');?></th>
			    <th><?php echo $this->Paginator->sort('liquidacion');?></th>
			    <th><?php echo $this->Paginator->sort('fecha_liquidacion');?></th>
			    <th><?php echo $this->Paginator->sort('Mes');?></th>
			    <th><?php echo $this->Paginator->sort('Unidad');?></th>
			    <th><?php echo $this->Paginator->sort('COMBUSTIBLE');?></th>
			    <th><?php echo $this->Paginator->sort('CASETAS');?></th>
			    <th><?php echo $this->Paginator->sort('CONCEPTOS_SUELDO');?></th>
			    <th><?php echo $this->Paginator->sort('OTROS');?></th>
			    <th><?php echo $this->Paginator->sort('qtyCombustible');?></th>
			    <th><?php echo $this->Paginator->sort('qtyCasetas');?></th>
			    <th><?php echo $this->Paginator->sort('qtySueldoLiquidacion');?></th>
			    <th><?php echo $this->Paginator->sort('qtyOtros');?></th>
			    <th><?php echo $this->Paginator->sort('IngresoTotalRuta');?></th>
			    <th><?php echo $this->Paginator->sort('viajes');?></th>
			    <th><?php echo $this->Paginator->sort('rendimiento_reseteo');?></th>
			    <th><?php echo $this->Paginator->sort('del');?></th>
			    <th><?php echo $this->Paginator->sort('al');?></th>
			    <th><?php echo $this->Paginator->sort('KmsCaminoLleno');?></th>
			    <th><?php echo $this->Paginator->sort('KmsCamionVacio');?></th>
			    <th><?php echo $this->Paginator->sort('DuracionViaje');?></th>	
			</tr>
		</thead>
	<?php
		foreach ($rentabilidadViewMainLiquidations as $rentabilidadViewMainLiquidation):
	?>
	<tr>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id_area']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['year']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UnidadNegocio']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['fecha_liquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Mes']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS_SUELDO']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCasetas']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtySueldoLiquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyOtros']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['rendimiento_reseteo']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCaminoLleno']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['KmsCamionVacio']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td>
	</tr>
	<?php endforeach; ?>
</table>
