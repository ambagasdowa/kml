
<div class="projectionsGlobalCorps view">
<h2><?php  __('Projections Global Corp');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Global Companies Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['projections_global_companies_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Global Companies Desc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['projections_global_companies_desc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsGlobalCorp['User']['name'], array('controller' => 'users', 'action' => 'view', $projectionsGlobalCorp['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Standings Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['projections_standings_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Projections Parents Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['projections_parents_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsGlobalCorp['ProjectionsGlobalCorp']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Global Corp', true), array('action' => 'edit', $projectionsGlobalCorp['ProjectionsGlobalCorp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Global Corp', true), array('action' => 'delete', $projectionsGlobalCorp['ProjectionsGlobalCorp']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsGlobalCorp['ProjectionsGlobalCorp']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Global Corps', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Global Corp', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
