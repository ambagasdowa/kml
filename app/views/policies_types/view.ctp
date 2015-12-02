<div class="policiesTypes view">
<h2><?php  __('Policies Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesType['PoliciesType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesType['PoliciesType']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesType['PoliciesType']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesType['PoliciesType']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesType['PoliciesType']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesType['PoliciesType']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policies Type', true), array('action' => 'edit', $policiesType['PoliciesType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Policies Type', true), array('action' => 'delete', $policiesType['PoliciesType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesType['PoliciesType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies Type', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
