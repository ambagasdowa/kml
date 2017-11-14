<?php
	// NOTE Config the libraries if requiere == true load prototype and jquery with requiere else load jquery as normal
	$evaluate = false;
	$requiere = $evaluate ? e($this->element('requiere/requiere')) : e($this->element('requiere/norequiere') );
?>

<div class="policiesSubtypesDefinitions view">
<h2><?php  __('Policies Subtypes Definition');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Policies Subtypes Definition', true), array('action' => 'edit', $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Policies Subtypes Definition', true), array('action' => 'delete', $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $policiesSubtypesDefinition['PoliciesSubtypesDefinition']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Policies Subtypes Definitions', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Policies Subtypes Definition', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
