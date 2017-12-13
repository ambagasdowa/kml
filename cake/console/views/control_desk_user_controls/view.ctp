
<div class="controlDeskUserControls view">
<h2><?php  __('Control Desk User Control');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $controlDeskUserControl['ControlDeskUserControl']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($controlDeskUserControl['User']['name'], array('controller' => 'users', 'action' => 'view', $controlDeskUserControl['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Storage'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $controlDeskUserControl['ControlDeskUserControl']['storage']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Clear Key'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $controlDeskUserControl['ControlDeskUserControl']['clear_key']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $controlDeskUserControl['ControlDeskUserControl']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $controlDeskUserControl['ControlDeskUserControl']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $controlDeskUserControl['ControlDeskUserControl']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $controlDeskUserControl['ControlDeskUserControl']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Control Desk User Control', true), array('action' => 'edit', $controlDeskUserControl['ControlDeskUserControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Control Desk User Control', true), array('action' => 'delete', $controlDeskUserControl['ControlDeskUserControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $controlDeskUserControl['ControlDeskUserControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Control Desk User Controls', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Control Desk User Control', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
