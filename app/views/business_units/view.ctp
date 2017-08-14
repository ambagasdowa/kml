<div class="businessUnits view">
<h2><?php  __('Business Unit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $businessUnit['BusinessUnit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $businessUnit['BusinessUnit']['company_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $businessUnit['BusinessUnit']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $businessUnit['BusinessUnit']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $businessUnit['BusinessUnit']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $businessUnit['BusinessUnit']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $businessUnit['BusinessUnit']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Business Unit', true), array('action' => 'edit', $businessUnit['BusinessUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Business Unit', true), array('action' => 'delete', $businessUnit['BusinessUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $businessUnit['BusinessUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Business Units', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Business Unit', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
