
<div class="casetasControlsEvents view">
<h2><?php  __('Casetas Controls Event');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsEvent['CasetasControlsEvent']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsEvent['User']['name'], array('controller' => 'users', 'action' => 'view', $casetasControlsEvent['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Corporations'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsEvent['CasetasCorporations']['casetas_companies_name'], array('controller' => 'casetas_corporations', 'action' => 'view', $casetasControlsEvent['CasetasCorporations']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Units'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsEvent['CasetasUnits']['casetas_units_name'], array('controller' => 'casetas_units', 'action' => 'view', $casetasControlsEvent['CasetasUnits']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Events'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsEvent['CasetasEvents']['casetas_event_name'], array('controller' => 'casetas_events', 'action' => 'view', $casetasControlsEvent['CasetasEvents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas View'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsEvent['CasetasView']['_filename'], array('controller' => 'casetas_views', 'action' => 'view', $casetasControlsEvent['CasetasView']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Events From'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsEvent['CasetasControlsEvent']['casetas_events_from']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Events To'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsEvent['CasetasControlsEvent']['casetas_events_to']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsEvent['CasetasControlsEvent']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsEvent['CasetasControlsEvent']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Standings'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsEvent['CasetasStandings']['casetas_standings_name'], array('controller' => 'casetas_standings', 'action' => 'view', $casetasControlsEvent['CasetasStandings']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Casetas Parents'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($casetasControlsEvent['CasetasParents']['casetas_parents_name'], array('controller' => 'casetas_parents', 'action' => 'view', $casetasControlsEvent['CasetasParents']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $casetasControlsEvent['CasetasControlsEvent']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Casetas Controls Event', true), array('action' => 'edit', $casetasControlsEvent['CasetasControlsEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Casetas Controls Event', true), array('action' => 'delete', $casetasControlsEvent['CasetasControlsEvent']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $casetasControlsEvent['CasetasControlsEvent']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Controls Events', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Controls Event', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Corporations', true), array('controller' => 'casetas_corporations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Corporations', true), array('controller' => 'casetas_corporations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Units', true), array('controller' => 'casetas_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Units', true), array('controller' => 'casetas_units', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Events', true), array('controller' => 'casetas_events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Events', true), array('controller' => 'casetas_events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Views', true), array('controller' => 'casetas_views', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas View', true), array('controller' => 'casetas_views', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Standings', true), array('controller' => 'casetas_standings', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Casetas Parents', true), array('controller' => 'casetas_parents', 'action' => 'add')); ?> </li>
	</ul>
</div>
