
<div class="casetasNotConciliations view">
<h2><?php  __('Casetas Not Conciliation');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasNotConciliation['CasetasNotConciliation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas View'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasNotConciliation['CasetasView']['_filename'], array('controller' => 'casetas_views', 'action' => 'view', $casetasNotConciliation['CasetasView']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Files'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasNotConciliation['CasetasControlsFiles']['_filename'], array('controller' => 'casetas_controls_files', 'action' => 'view', $casetasNotConciliation['CasetasControlsFiles']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Events'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasNotConciliation['CasetasControlsEvents']['casetas_view_id'], array('controller' => 'casetas_controls_events', 'action' => 'view', $casetasNotConciliation['CasetasControlsEvents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasNotConciliation['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasNotConciliation['CasetasStandings']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Parents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasNotConciliation['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasNotConciliation['CasetasParents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasNotConciliation['CasetasNotConciliation']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas Not Conciliation', true), array('action' => 'edit', $casetasNotConciliation['CasetasNotConciliation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas Not Conciliation', true), array('action' => 'delete', $casetasNotConciliation['CasetasNotConciliation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasNotConciliation['CasetasNotConciliation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Not Conciliations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Not Conciliation', true), array('action' => 'add')); ?> </li>
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
