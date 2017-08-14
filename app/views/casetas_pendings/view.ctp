
<div class="casetasPendings view">
<h2><?php  __('Casetas Pending');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasPending['CasetasPending']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas View'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasPending['CasetasView']['_filename'], array('controller' => 'casetas_views', 'action' => 'view', $casetasPending['CasetasView']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Files'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasPending['CasetasControlsFiles']['_filename'], array('controller' => 'casetas_controls_files', 'action' => 'view', $casetasPending['CasetasControlsFiles']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Events'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasPending['CasetasControlsEvents']['casetas_view_id'], array('controller' => 'casetas_controls_events', 'action' => 'view', $casetasPending['CasetasControlsEvents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasPending['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasPending['CasetasStandings']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Parents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasPending['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasPending['CasetasParents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasPending['CasetasPending']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas Pending', true), array('action' => 'edit', $casetasPending['CasetasPending']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas Pending', true), array('action' => 'delete', $casetasPending['CasetasPending']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasPending['CasetasPending']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Pendings', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Pending', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Views', true), array('controller' => 'casetas_views', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas View', true), array('controller' => 'casetas_views', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Events', true), array('controller' => 'casetas_controls_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Events', true), array('controller' => 'casetas_controls_events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> </li>
	</ul>
</div>
