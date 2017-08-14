
<div class="providersControlsUsers view">
<h2><?php  __('Providers Controls User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersControlsUser['ProvidersControlsUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersControlsUser['User']['name'], array('controller' => 'users', 'action' => 'view', $providersControlsUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers View Companies Units'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersControlsUser['ProvidersViewCompaniesUnits']['id'], array('controller' => 'providers_view_companies_units', 'action' => 'view', $providersControlsUser['ProvidersViewCompaniesUnits']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersControlsUser['ProvidersControlsUser']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersControlsUser['ProvidersControlsUser']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersControlsUser['ProvidersControlsUser']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Providers Controls User', true), array('action' => 'edit', $providersControlsUser['ProvidersControlsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Providers Controls User', true), array('action' => 'delete', $providersControlsUser['ProvidersControlsUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersControlsUser['ProvidersControlsUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers Controls Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers Controls User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers View Companies Units', true), array('controller' => 'providers_view_companies_units', 'action' => 'add')); ?> </li>
	</ul>
</div>
