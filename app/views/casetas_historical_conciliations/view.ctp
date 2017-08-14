
<div class="casetasHistoricalConciliations view">
<h2><?php  __('Casetas Historical Conciliation');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasHistoricalConciliation['CasetasHistoricalConciliation']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasHistoricalConciliation['User']['name'], array('controller' => 'users', 'action' => 'view', $casetasHistoricalConciliation['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Controls Files'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasHistoricalConciliation['CasetasControlsFiles']['_filename'], array('controller' => 'casetas_controls_files', 'action' => 'view', $casetasHistoricalConciliation['CasetasControlsFiles']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Monto Conciliado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasHistoricalConciliation['CasetasHistoricalConciliation']['monto_conciliado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Cruces Conciliados'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasHistoricalConciliation['CasetasHistoricalConciliation']['cruces_conciliados']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasHistoricalConciliation['CasetasHistoricalConciliation']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasHistoricalConciliation['CasetasHistoricalConciliation']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasHistoricalConciliation['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasHistoricalConciliation['CasetasStandings']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Parents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasHistoricalConciliation['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasHistoricalConciliation['CasetasParents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasHistoricalConciliation['CasetasHistoricalConciliation']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas Historical Conciliation', true), array('action' => 'edit', $casetasHistoricalConciliation['CasetasHistoricalConciliation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas Historical Conciliation', true), array('action' => 'delete', $casetasHistoricalConciliation['CasetasHistoricalConciliation']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasHistoricalConciliation['CasetasHistoricalConciliation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Historical Conciliations', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Historical Conciliation', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Files', true), array('controller' => 'casetas_controls_files', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> </li>
	</ul>
</div>
