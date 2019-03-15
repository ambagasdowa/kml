
<div class="resumenViewViajesMensualGstIndicators view">
<h2><?php  __('Resumen View Viajes Mensual Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Viajes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['viajes']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Seguimiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['id_seguimiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('TipoViaje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['TipoViaje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['periodo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resumen View Viajes Mensual Gst Indicator', true), array('action' => 'edit', $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resumen View Viajes Mensual Gst Indicator', true), array('action' => 'delete', $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumenViewViajesMensualGstIndicator['ResumenViewViajesMensualGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumen View Viajes Mensual Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resumen View Viajes Mensual Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
