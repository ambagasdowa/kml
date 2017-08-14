
<div class="projectionsControlsUsers view">
<h2><?php  __('Projections Controls User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsControlsUser['ProjectionsControlsUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($projectionsControlsUser['User']['name'], array('controller' => 'users', 'action' => 'view', $projectionsControlsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsControlsUser['ProjectionsControlsUser']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsControlsUser['ProjectionsControlsUser']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $projectionsControlsUser['ProjectionsControlsUser']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Projections Controls User', true), array('action' => 'edit', $projectionsControlsUser['ProjectionsControlsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Projections Controls User', true), array('action' => 'delete', $projectionsControlsUser['ProjectionsControlsUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $projectionsControlsUser['ProjectionsControlsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Projections Controls Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Projections Controls User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
