
<div class="projectionsViewClosedPeriodUnits view">
<h2><?php  __('Projections View Closed Period Unit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewClosedPeriodUnit['ProjectionsViewClosedPeriodUnit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsViewClosedPeriodUnit['ProjectionsCorporations']['id'], array('controller' => 'projections_corporations', 'action' => 'view', $projectionsViewClosedPeriodUnit['ProjectionsCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Area'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewClosedPeriodUnit['ProjectionsViewClosedPeriodUnit']['id_area']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewClosedPeriodUnit['ProjectionsViewClosedPeriodUnit']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Closed Periods'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsViewClosedPeriodUnit['ProjectionsViewClosedPeriodUnit']['projections_closed_periods']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections View Closed Period Unit', true), array('action' => 'edit', $projectionsViewClosedPeriodUnit['ProjectionsViewClosedPeriodUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections View Closed Period Unit', true), array('action' => 'delete', $projectionsViewClosedPeriodUnit['ProjectionsViewClosedPeriodUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsViewClosedPeriodUnit['ProjectionsViewClosedPeriodUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Closed Period Units', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Closed Period Unit', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Corporations', true), array('controller' => 'projections_corporations', 'action' => 'add')); ?> </li>
	</ul>
</div>
