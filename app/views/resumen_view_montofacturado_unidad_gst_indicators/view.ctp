
<div class="resumenViewMontofacturadoUnidadGstIndicators view">
<h2><?php  __('Resumen View Montofacturado Unidad Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Flete'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['flete']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Subtotal'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['subtotal']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Iva'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['iva']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Retencion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['retencion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Total'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['total']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['unidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['periodo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Resumen View Montofacturado Unidad Gst Indicator', true), array('action' => 'edit', $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Resumen View Montofacturado Unidad Gst Indicator', true), array('action' => 'delete', $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $resumenViewMontofacturadoUnidadGstIndicator['ResumenViewMontofacturadoUnidadGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Resumen View Montofacturado Unidad Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Resumen View Montofacturado Unidad Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
