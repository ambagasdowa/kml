<div class="policiesAnexos view">
<h2><?php  __('Policies Anexo');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Policies Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['policies_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Anexo Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['anexo_path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesAnexo['PoliciesAnexo']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policies Anexo', true), array('action' => 'edit', $policiesAnexo['PoliciesAnexo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Policies Anexo', true), array('action' => 'delete', $policiesAnexo['PoliciesAnexo']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesAnexo['PoliciesAnexo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies Anexos', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies Anexo', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
