
<div class="providersViewSearchEditions view">
<h2><?php  __('Providers View Search Edition');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Providers Imported Files Controls'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersViewSearchEdition['ProvidersImportedFilesControls']['id'], array('controller' => 'providers_imported_files_controls', 'action' => 'view', $providersViewSearchEdition['ProvidersImportedFilesControls']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($providersViewSearchEdition['User']['name'], array('controller' => 'users', 'action' => 'view', $providersViewSearchEdition['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZAPBatNbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZAPBatNbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZCnpyId'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZCnpyId']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZPerPost'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZPerPost']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZCuryRcptCtrlAmt'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZCuryRcptCtrlAmt']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZMontoPago'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZMontoPago']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ZUUID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['ZUUID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('BatNbr'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['BatNbr']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewSearchEdition['ProvidersViewSearchEdition']['Status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Providers View Search Edition', true), array('action' => 'edit', $providersViewSearchEdition['ProvidersViewSearchEdition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Providers View Search Edition', true), array('action' => 'delete', $providersViewSearchEdition['ProvidersViewSearchEdition']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersViewSearchEdition['ProvidersViewSearchEdition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers View Search Editions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers View Search Edition', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers Imported Files Controls', true), array('controller' => 'providers_imported_files_controls', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
