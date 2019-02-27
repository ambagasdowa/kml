
<div class="rendimientoViewFullGstCoreIndicators view">
<h2><?php  __('Rendimiento View Full Gst Core Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Viaje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['viaje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operador'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['operador']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tracto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['tracto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Config'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['config']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Origen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['origen']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Destino'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['destino']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modelo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['modelo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kms'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['kms']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Diesel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['diesel']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['periodo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rendimiento View Full Gst Core Indicator', true), array('action' => 'edit', $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rendimiento View Full Gst Core Indicator', true), array('action' => 'delete', $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rendimientoViewFullGstCoreIndicator['RendimientoViewFullGstCoreIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rendimiento View Full Gst Core Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rendimiento View Full Gst Core Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
