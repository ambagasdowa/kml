
<div class="moduleUserCredentialsControls view">
<h2><?php  __('Module User Credentials Control');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsControl['ModuleUserCredentialsControl']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module User Credentials Mains'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($moduleUserCredentialsControl['ModuleUserCredentialsMains']['id'], array('controller' => 'module_user_credentials_mains', 'action' => 'view', $moduleUserCredentialsControl['ModuleUserCredentialsMains']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($moduleUserCredentialsControl['User']['name'], array('controller' => 'users', 'action' => 'view', $moduleUserCredentialsControl['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Value'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsControl['ModuleUserCredentialsControl']['value']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsControl['ModuleUserCredentialsControl']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsControl['ModuleUserCredentialsControl']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsControl['ModuleUserCredentialsControl']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Module User Credentials Control', true), array('action' => 'edit', $moduleUserCredentialsControl['ModuleUserCredentialsControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Module User Credentials Control', true), array('action' => 'delete', $moduleUserCredentialsControl['ModuleUserCredentialsControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $moduleUserCredentialsControl['ModuleUserCredentialsControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Module User Credentials Controls', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module User Credentials Control', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Module User Credentials Mains', true), array('controller' => 'module_user_credentials_mains', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module User Credentials Mains', true), array('controller' => 'module_user_credentials_mains', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
