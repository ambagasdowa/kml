
<div class="providersViewBussinessUnits view">
<h2><?php  __('Providers View Bussiness Unit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewBussinessUnit['ProvidersViewBussinessUnit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewBussinessUnit['ProvidersViewBussinessUnit']['company_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Company'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewBussinessUnit['ProvidersViewBussinessUnit']['company']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Base'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $providersViewBussinessUnit['ProvidersViewBussinessUnit']['base']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Providers View Bussiness Unit', true), array('action' => 'edit', $providersViewBussinessUnit['ProvidersViewBussinessUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Providers View Bussiness Unit', true), array('action' => 'delete', $providersViewBussinessUnit['ProvidersViewBussinessUnit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $providersViewBussinessUnit['ProvidersViewBussinessUnit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Providers View Bussiness Units', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Providers View Bussiness Unit', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
