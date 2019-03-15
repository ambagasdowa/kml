
<div class="resumenViewMontofacturadoMensualGstIndicators view">
<h2><?php  __('Resumen View Montofacturado Mensual Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flete'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['flete']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['subtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Iva'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['iva']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Retencion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['retencion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['total']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['periodo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resumen View Montofacturado Mensual Gst Indicator', true), array('action' => 'edit', $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resumen View Montofacturado Mensual Gst Indicator', true), array('action' => 'delete', $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumenViewMontofacturadoMensualGstIndicator['ResumenViewMontofacturadoMensualGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumen View Montofacturado Mensual Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resumen View Montofacturado Mensual Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
