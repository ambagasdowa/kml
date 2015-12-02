<div class="policiesSubtypes view">
<h2><?php  __('Policies Subtype');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtype['PoliciesSubtype']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Policies Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($policiesSubtype['PoliciesType']['name'], array('controller' => 'policies_types', 'action' => 'view', $policiesSubtype['PoliciesType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtype['PoliciesSubtype']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtype['PoliciesSubtype']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtype['PoliciesSubtype']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtype['PoliciesSubtype']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtype['PoliciesSubtype']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policies Subtype', true), array('action' => 'edit', $policiesSubtype['PoliciesSubtype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Policies Subtype', true), array('action' => 'delete', $policiesSubtype['PoliciesSubtype']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesSubtype['PoliciesSubtype']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies Subtypes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies Subtype', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies Types', true), array('controller' => 'policies_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies Type', true), array('controller' => 'policies_types', 'action' => 'add')); ?> </li>
	</ul>
</div>
