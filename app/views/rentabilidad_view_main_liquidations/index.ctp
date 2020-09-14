

													<th><?php echo $this->Paginator->sort('id');?></th>
													<th><?php echo $this->Paginator->sort('id_area');?></th>
													<th><?php echo $this->Paginator->sort('year');?></th>
													<th><?php echo $this->Paginator->sort('UdN');?></th>
													<th><?php echo $this->Paginator->sort('liquidacion');?></th>
													<th><?php echo $this->Paginator->sort('fecha_liquidacion');?></th>
													<th><?php echo $this->Paginator->sort('Mes');?></th>
													<th><?php echo $this->Paginator->sort('Unidad');?></th>
													<th><?php echo $this->Paginator->sort('COMBUSTIBLE');?></th>
													<th><?php echo $this->Paginator->sort('CASETAS');?></th>
													<th><?php echo $this->Paginator->sort('CONCEPTOS SUELDO');?></th>
													<th><?php echo $this->Paginator->sort('OTROS');?></th>
													<th><?php echo $this->Paginator->sort('qtyCombustible');?></th>
													<th><?php echo $this->Paginator->sort('qtyCasetas');?></th>
													<th><?php echo $this->Paginator->sort('qtySueldoLiquidacion');?></th>
													<th><?php echo $this->Paginator->sort('qtyOtros');?></th>
													<th><?php echo $this->Paginator->sort('IngresoTotalRuta');?></th>
													<th><?php echo $this->Paginator->sort('viajes');?></th>
													<th><?php echo $this->Paginator->sort('del');?></th>
													<th><?php echo $this->Paginator->sort('al');?></th>
													<th><?php echo $this->Paginator->sort('kms_camion_lleno');?></th>
													<th><?php echo $this->Paginator->sort('kms_camion_vacio');?></th>
													<th><?php echo $this->Paginator->sort('DuracionViaje');?></th>
													<th class="actions" colspan="3"><?php __('Actions');?></th>

	<tr<?php echo $class;?>>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id_area']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['year']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['UdN']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['liquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['fecha_liquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Mes']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['Unidad']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['COMBUSTIBLE']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CASETAS']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['CONCEPTOS SUELDO']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['OTROS']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCombustible']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyCasetas']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtySueldoLiquidacion']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['qtyOtros']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['IngresoTotalRuta']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['viajes']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['del']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['al']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['kms_camion_lleno']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['kms_camion_vacio']; ?>&nbsp;</td>
		<td><?php echo $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['DuracionViaje']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id'])); ?>
		</td>
		<td class="actions">
	<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rentabilidadViewMainLiquidation['RentabilidadViewMainLiquidation']['id'])); ?>




    
    
    
    
    

    
    
