
<div class="casetasUnits view">
<h2><?php  __('Casetas Unit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasUnit['CasetasUnit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasUnit['CasetasCorporations']['casetas_companies_name'], array('controller' => 'casetas_corporations', 'action' => 'view', $casetasUnit['CasetasCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Units Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasUnit['CasetasUnit']['casetas_units_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Units Desc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasUnit['CasetasUnit']['casetas_units_desc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasUnit['CasetasUnit']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasUnit['CasetasUnit']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasUnit['User']['name'], array('controller' => 'users', 'action' => 'view', $casetasUnit['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasUnit['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasUnit['CasetasStandings']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Parents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasUnit['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasUnit['CasetasParents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasUnit['CasetasUnit']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas Unit', true), array('action' => 'edit', $casetasUnit['CasetasUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas Unit', true), array('action' => 'delete', $casetasUnit['CasetasUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasUnit['CasetasUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Units', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Unit', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Corporations', true), array('controller' => 'casetas_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Corporations', true), array('controller' => 'casetas_corporations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> </li>
	</ul>
</div>
