<div class="policiesFormats view">
<h2><?php  __('Policies Format');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFormat['PoliciesFormat']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFormat['PoliciesFormat']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFormat['PoliciesFormat']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFormat['PoliciesFormat']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFormat['PoliciesFormat']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesFormat['PoliciesFormat']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policies Format', true), array('action' => 'edit', $policiesFormat['PoliciesFormat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Policies Format', true), array('action' => 'delete', $policiesFormat['PoliciesFormat']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesFormat['PoliciesFormat']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies Formats', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies Format', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
