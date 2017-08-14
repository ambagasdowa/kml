<div class="secureGpoChiefs view">
<h2><?php  __('Secure Gpo Chief');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureGpoChief['SecureGpoChief']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureGpoChief['Group']['name'], array('controller' => 'groups', 'action' => 'view', $secureGpoChief['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureGpoChief['SecureGpoChief']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureGpoChief['SecureGpoChief']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureGpoChief['SecureGpoChief']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureGpoChief['SecureGpoChief']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureGpoChief['SecureGpoChief']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Secure Gpo Chief', true), array('action' => 'edit', $secureGpoChief['SecureGpoChief']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Secure Gpo Chief', true), array('action' => 'delete', $secureGpoChief['SecureGpoChief']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureGpoChief['SecureGpoChief']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Gpo Chiefs', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Gpo Chief', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
	</ul>
</div>
