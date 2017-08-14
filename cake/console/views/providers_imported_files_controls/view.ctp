
<div class="providersImportedFilesControls view">
<h2><?php  __('Providers Imported Files Control');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersImportedFilesControl['User']['name'], array('controller' => 'users', 'action' => 'view', $providersImportedFilesControl['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_file_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers File Name Desc'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_file_name_desc']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Md5sum Check'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_md5sum_check']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Standings Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_standings_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Parents Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['providers_parents_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __(' Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersImportedFilesControl['ProvidersImportedFilesControl']['_status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Providers Imported Files Control', true), array('action' => 'edit', $providersImportedFilesControl['ProvidersImportedFilesControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Providers Imported Files Control', true), array('action' => 'delete', $providersImportedFilesControl['ProvidersImportedFilesControl']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersImportedFilesControl['ProvidersImportedFilesControl']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers Imported Files Controls', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers Imported Files Control', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
