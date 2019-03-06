
<div class="disponibilidadViewRptGroupGstIndicators view">
<h2><?php  __('Disponibilidad View Rpt Group Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidades'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['unidades']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id_status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Estatus'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['estatus']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['area']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Disponibilidad View Rpt Group Gst Indicator', true), array('action' => 'edit', $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Disponibilidad View Rpt Group Gst Indicator', true), array('action' => 'delete', $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disponibilidadViewRptGroupGstIndicator['DisponibilidadViewRptGroupGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Disponibilidad View Rpt Group Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disponibilidad View Rpt Group Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
