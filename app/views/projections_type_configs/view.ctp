
<div class="projectionsTypeConfigs view">
<h2><?php  __('Projections Type Config');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsTypeConfig['ProjectionsTypeConfig']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsTypeConfig['User']['name'], array('controller' => 'users', 'action' => 'view', $projectionsTypeConfig['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsTypeConfig['ProjectionsTypeConfig']['module']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module Type Int'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsTypeConfig['ProjectionsTypeConfig']['module_type_int']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module Lenght'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsTypeConfig['ProjectionsTypeConfig']['module_lenght']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsTypeConfig['ProjectionsTypeConfig']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsTypeConfig['ProjectionsTypeConfig']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsTypeConfig['ProjectionsTypeConfig']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Type Config', true), array('action' => 'edit', $projectionsTypeConfig['ProjectionsTypeConfig']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Type Config', true), array('action' => 'delete', $projectionsTypeConfig['ProjectionsTypeConfig']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsTypeConfig['ProjectionsTypeConfig']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Type Configs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Type Config', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
