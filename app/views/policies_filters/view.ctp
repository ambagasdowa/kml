<div class="policiesFilters view">
<h2><?php  __('Policies Filter');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFilter['PoliciesFilter']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Policies'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($policiesFilter['Policies']['name'], array('controller' => 'policies', 'action' => 'view', $policiesFilter['Policies']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($policiesFilter['Group']['name'], array('controller' => 'groups', 'action' => 'view', $policiesFilter['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('View'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFilter['PoliciesFilter']['view']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFilter['PoliciesFilter']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFilter['PoliciesFilter']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFilter['PoliciesFilter']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policies Filter', true), array('action' => 'edit', $policiesFilter['PoliciesFilter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Policies Filter', true), array('action' => 'delete', $policiesFilter['PoliciesFilter']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesFilter['PoliciesFilter']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies Filters', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies Filter', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies', true), array('controller' => 'policies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies', true), array('controller' => 'policies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
