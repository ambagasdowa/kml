
<div class="casetasControlsUsers view">
<h2><?php  __('Casetas Controls User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsUser['CasetasControlsUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsUser['User']['name'], array('controller' => 'users', 'action' => 'view', $casetasControlsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsUser['CasetasCorporations']['casetas_companies_name'], array('controller' => 'casetas_corporations', 'action' => 'view', $casetasControlsUser['CasetasCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Units'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsUser['CasetasUnits']['casetas_units_name'], array('controller' => 'casetas_units', 'action' => 'view', $casetasControlsUser['CasetasUnits']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsUser['CasetasControlsUser']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsUser['CasetasControlsUser']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsUser['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasControlsUser['CasetasStandings']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Parents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsUser['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasControlsUser['CasetasParents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsUser['CasetasControlsUser']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas Controls User', true), array('action' => 'edit', $casetasControlsUser['CasetasControlsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas Controls User', true), array('action' => 'delete', $casetasControlsUser['CasetasControlsUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasControlsUser['CasetasControlsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Corporations', true), array('controller' => 'casetas_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Corporations', true), array('controller' => 'casetas_corporations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Units', true), array('controller' => 'casetas_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Units', true), array('controller' => 'casetas_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> </li>
	</ul>
</div>
