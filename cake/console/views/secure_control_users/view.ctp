<div class="secureControlUsers view">
<h2><?php  __('Secure Control User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureControlUser['SecureControlUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Secure Structures'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureControlUser['SecureStructures']['id'], array('controller' => 'secure_structures', 'action' => 'view', $secureControlUser['SecureStructures']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('View Get Payrolls'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($secureControlUser['ViewGetPayrolls']['Nombre'], array('controller' => 'view_get_payrolls', 'action' => 'view', $secureControlUser['ViewGetPayrolls']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Courses'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureControlUser['SecureControlUser']['date_courses']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Course Is Taken'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureControlUser['SecureControlUser']['course_is_taken']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureControlUser['SecureControlUser']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureControlUser['SecureControlUser']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureControlUser['SecureControlUser']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $secureControlUser['SecureControlUser']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Secure Control User', true), array('action' => 'edit', $secureControlUser['SecureControlUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Secure Control User', true), array('action' => 'delete', $secureControlUser['SecureControlUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $secureControlUser['SecureControlUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Control Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Control User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Secure Structures', true), array('controller' => 'secure_structures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Secure Structures', true), array('controller' => 'secure_structures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List View Get Payrolls', true), array('controller' => 'view_get_payrolls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New View Get Payrolls', true), array('controller' => 'view_get_payrolls', 'action' => 'add')); ?> </li>
	</ul>
</div>
