
<div class="projectionsViewClosedPeriods view">
<h2><?php  __('Projections View Closed Period');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewClosedPeriod['ProjectionsViewClosedPeriod']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Closed Periods'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewClosedPeriod['ProjectionsViewClosedPeriod']['projections_closed_periods']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsViewClosedPeriod['ProjectionsCorporations']['id'], array('controller' => 'projections_corporations', 'action' => 'view', $projectionsViewClosedPeriod['ProjectionsCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Status Period'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewClosedPeriod['ProjectionsViewClosedPeriod']['projections_status_period']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Closed Period', true), array('action' => 'edit', $projectionsViewClosedPeriod['ProjectionsViewClosedPeriod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Closed Period', true), array('action' => 'delete', $projectionsViewClosedPeriod['ProjectionsViewClosedPeriod']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewClosedPeriod['ProjectionsViewClosedPeriod']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Closed Periods', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Closed Period', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'add')); ?> </li>
	</ul>
</div>
