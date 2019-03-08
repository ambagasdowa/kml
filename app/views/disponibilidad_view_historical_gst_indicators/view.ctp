
<div class="disponibilidadViewHistoricalGstIndicators view">
<h2><?php  __('Disponibilidad View Historical Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['unidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estatus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['estatus']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['descripcion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Compromiso'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['compromiso']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Creacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['creacion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Disponibilidad View Historical Gst Indicator', true), array('action' => 'edit', $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Disponibilidad View Historical Gst Indicator', true), array('action' => 'delete', $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disponibilidadViewHistoricalGstIndicator['DisponibilidadViewHistoricalGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Disponibilidad View Historical Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disponibilidad View Historical Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
