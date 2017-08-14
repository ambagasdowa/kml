<div class="secureStructures view">
<h2><?php  __('Secure Structure');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureStructure['SecureStructure']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureStructure['Group']['name'], array('controller' => 'groups', 'action' => 'view', $secureStructure['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureStructure['User']['name'], array('controller' => 'users', 'action' => 'view', $secureStructure['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Secure Topics'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureStructure['SecureTopics']['name'], array('controller' => 'secure_topics', 'action' => 'view', $secureStructure['SecureTopics']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Secure Topics Types'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureStructure['SecureTopicsTypes']['name'], array('controller' => 'secure_topics_types', 'action' => 'view', $secureStructure['SecureTopicsTypes']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Secure Gpo Chiefs'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureStructure['SecureGpoChiefs']['name'], array('controller' => 'secure_gpo_chiefs', 'action' => 'view', $secureStructure['SecureGpoChiefs']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Secure Goes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureStructure['SecureGoes']['name'], array('controller' => 'secure_gos', 'action' => 'view', $secureStructure['SecureGoes']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Secure Calendars'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureStructure['SecureCalendars']['title'], array('controller' => 'secure_calendars', 'action' => 'view', $secureStructure['SecureCalendars']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureStructure['SecureStructure']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureStructure['SecureStructure']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureStructure['SecureStructure']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureStructure['SecureStructure']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Secure Structure', true), array('action' => 'edit', $secureStructure['SecureStructure']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Secure Structure', true), array('action' => 'delete', $secureStructure['SecureStructure']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureStructure['SecureStructure']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Structures', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Structure', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Topics', true), array('controller' => 'secure_topics', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Topics', true), array('controller' => 'secure_topics', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Topics Types', true), array('controller' => 'secure_topics_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Topics Types', true), array('controller' => 'secure_topics_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Gpo Chiefs', true), array('controller' => 'secure_gpo_chiefs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Gpo Chiefs', true), array('controller' => 'secure_gpo_chiefs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Gos', true), array('controller' => 'secure_gos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Goes', true), array('controller' => 'secure_gos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Calendars', true), array('controller' => 'secure_calendars', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Calendars', true), array('controller' => 'secure_calendars', 'action' => 'add')); ?> </li>
	</ul>
</div>
