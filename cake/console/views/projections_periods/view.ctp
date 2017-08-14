
<div class="projectionsPeriods view">
<h2><?php  __('Projections Period');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsPeriod['ProjectionsPeriod']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Closed Periods'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsPeriod['ProjectionsPeriod']['projections_closed_periods']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsPeriod['ProjectionsCorporations']['id'], array('controller' => 'projections_corporations', 'action' => 'view', $projectionsPeriod['ProjectionsCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Status Period'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsPeriod['ProjectionsPeriod']['projections_status_period']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsPeriod['ProjectionsPeriod']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsPeriod['ProjectionsPeriod']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsPeriod['ProjectionsPeriod']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Period', true), array('action' => 'edit', $projectionsPeriod['ProjectionsPeriod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Period', true), array('action' => 'delete', $projectionsPeriod['ProjectionsPeriod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsPeriod['ProjectionsPeriod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Periods', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Period', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'add')); ?> </li>
	</ul>
</div>
