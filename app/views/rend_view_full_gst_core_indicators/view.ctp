
<div class="rendViewFullGstCoreIndicators view">
<h2><?php  __('Rend View Full Gst Core Indicator');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Viaje'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['viaje']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Operador'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['operador']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tracto'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['tracto']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Config'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['config']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['fecha']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Origen'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['origen']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Destino'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['destino']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modelo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['modelo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Kms'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['kms']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Diesel'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['diesel']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Periodo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['periodo']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Rend View Full Gst Core Indicator', true), array('action' => 'edit', $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Rend View Full Gst Core Indicator', true), array('action' => 'delete', $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $rendViewFullGstCoreIndicator['RendViewFullGstCoreIndicator']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rend View Full Gst Core Indicators', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rend View Full Gst Core Indicator', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
