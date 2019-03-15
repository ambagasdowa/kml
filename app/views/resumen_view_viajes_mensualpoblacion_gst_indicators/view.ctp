
<div class="resumenViewViajesMensualpoblacionGstIndicators view">
<h2><?php  __('Resumen View Viajes Mensualpoblacion Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Viajes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['viajes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TipoViaje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['TipoViaje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['periodo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Destino'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['id_destino']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Poblacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['poblacion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resumen View Viajes Mensualpoblacion Gst Indicator', true), array('action' => 'edit', $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resumen View Viajes Mensualpoblacion Gst Indicator', true), array('action' => 'delete', $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumenViewViajesMensualpoblacionGstIndicator['ResumenViewViajesMensualpoblacionGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumen View Viajes Mensualpoblacion Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resumen View Viajes Mensualpoblacion Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
