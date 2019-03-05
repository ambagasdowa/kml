
<div class="disponibilidadTblUnidadesGstIndicators view">
<h2><?php  __('Disponibilidad Tbl Unidades Gst Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Unidad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['unidad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Compromise'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['compromise']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Disponibilidad Tbl Unidades Gst Indicator', true), array('action' => 'edit', $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Disponibilidad Tbl Unidades Gst Indicator', true), array('action' => 'delete', $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $disponibilidadTblUnidadesGstIndicator['DisponibilidadTblUnidadesGstIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Disponibilidad Tbl Unidades Gst Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Disponibilidad Tbl Unidades Gst Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
