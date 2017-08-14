
<div class="projectionsConfigs view">
<h2><?php  __('Projections Config');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsConfig['ProjectionsConfig']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsConfig['User']['name'], array('controller' => 'users', 'action' => 'view', $projectionsConfig['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Type Configs'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsConfig['ProjectionsTypeConfigs']['id'], array('controller' => 'projections_type_configs', 'action' => 'view', $projectionsConfig['ProjectionsTypeConfigs']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module Data Definition'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsConfig['ProjectionsConfig']['module_data_definition']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsConfig['ProjectionsConfig']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsConfig['ProjectionsConfig']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsConfig['ProjectionsConfig']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Config', true), array('action' => 'edit', $projectionsConfig['ProjectionsConfig']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Config', true), array('action' => 'delete', $projectionsConfig['ProjectionsConfig']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsConfig['ProjectionsConfig']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Configs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Config', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Type Configs', true), array('controller' => 'projections_type_configs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Type Configs', true), array('controller' => 'projections_type_configs', 'action' => 'add')); ?> </li>
	</ul>
</div>
