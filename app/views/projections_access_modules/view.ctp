
<div class="projectionsAccessModules view">
<h2><?php  __('Projections Access Module');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccessModule['ProjectionsAccessModule']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Module Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccessModule['ProjectionsAccessModule']['projections_module_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Modules Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccessModule['ProjectionsAccessModule']['projections_modules_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccessModule['ProjectionsAccessModule']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccessModule['ProjectionsAccessModule']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsAccessModule['ProjectionsAccessModule']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Access Module', true), array('action' => 'edit', $projectionsAccessModule['ProjectionsAccessModule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Access Module', true), array('action' => 'delete', $projectionsAccessModule['ProjectionsAccessModule']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsAccessModule['ProjectionsAccessModule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Access Modules', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Access Module', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
