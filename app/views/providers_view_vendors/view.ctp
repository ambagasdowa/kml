
<div class="providersViewVendors view">
<h2><?php  __('Providers View Vendor');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Vendid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['vendid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Is Vendor'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['is_vendor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id Repeat'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['id_repeat']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['Status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('ClassID'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['ClassID']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tstamp'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewVendor['ProvidersViewVendor']['tstamp']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Providers View Vendor', true), array('action' => 'edit', $providersViewVendor['ProvidersViewVendor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Providers View Vendor', true), array('action' => 'delete', $providersViewVendor['ProvidersViewVendor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersViewVendor['ProvidersViewVendor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers View Vendors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers View Vendor', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
