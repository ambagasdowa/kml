
<div class="disponibilidadViewStatusGstIndicators view">
<h2><?php  __('Disponibilidad View Status Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewStatusGstIndicator['DisponibilidadViewStatusGstIndicator']['id_status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewStatusGstIndicator['DisponibilidadViewStatusGstIndicator']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Disponibilidad View Status Gst Indicator', true), array('action' => 'edit', $disponibilidadViewStatusGstIndicator['DisponibilidadViewStatusGstIndicator']['id_status'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Disponibilidad View Status Gst Indicator', true), array('action' => 'delete', $disponibilidadViewStatusGstIndicator['DisponibilidadViewStatusGstIndicator']['id_status']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disponibilidadViewStatusGstIndicator['DisponibilidadViewStatusGstIndicator']['id_status'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Disponibilidad View Status Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disponibilidad View Status Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
