
<div class="disponibilidadViewUnidadesGstIndicators view">
<h2><?php  __('Disponibilidad View Unidades Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['unidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Idestatus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['idestatus']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estatus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['estatus']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['tipo_status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operador'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['operador']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Remolque'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['remolque']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Segmento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['segmento']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Disponibilidad View Unidades Gst Indicator', true), array('action' => 'edit', $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['unidad'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Disponibilidad View Unidades Gst Indicator', true), array('action' => 'delete', $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['unidad']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disponibilidadViewUnidadesGstIndicator['DisponibilidadViewUnidadesGstIndicator']['unidad'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Disponibilidad View Unidades Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disponibilidad View Unidades Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
