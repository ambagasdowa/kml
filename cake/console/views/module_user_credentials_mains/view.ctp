
<div class="moduleUserCredentialsMains view">
<h2><?php  __('Module User Credentials Main');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['module_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Model Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['model_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Database Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['database_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Database Column'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['database_column']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Model Option Var'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['model_option_var']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is In'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['is_in']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Module Ui Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['module_ui_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moduleUserCredentialsMain['ModuleUserCredentialsMain']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Module User Credentials Main', true), array('action' => 'edit', $moduleUserCredentialsMain['ModuleUserCredentialsMain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Module User Credentials Main', true), array('action' => 'delete', $moduleUserCredentialsMain['ModuleUserCredentialsMain']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $moduleUserCredentialsMain['ModuleUserCredentialsMain']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Module User Credentials Mains', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Module User Credentials Main', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
