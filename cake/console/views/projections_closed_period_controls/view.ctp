
<div class="projectionsClosedPeriodControls view">
<h2><?php  __('Projections Closed Period Control');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsClosedPeriodControl['User']['name'], array('controller' => 'users', 'action' => 'view', $projectionsClosedPeriodControl['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Closed Periods'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['projections_closed_periods']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections View Bussiness Units'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsClosedPeriodControl['ProjectionsViewBussinessUnits']['name'], array('controller' => 'projections_view_bussiness_units', 'action' => 'view', $projectionsClosedPeriodControl['ProjectionsViewBussinessUnits']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Status Period'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['projections_status_period']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Closed Period Control', true), array('action' => 'edit', $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Closed Period Control', true), array('action' => 'delete', $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsClosedPeriodControl['ProjectionsClosedPeriodControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Closed Period Controls', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Closed Period Control', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections View Bussiness Units', true), array('controller' => 'projections_view_bussiness_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections View Bussiness Units', true), array('controller' => 'projections_view_bussiness_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
