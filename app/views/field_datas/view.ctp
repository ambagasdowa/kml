<div class="fieldDatas view">
<h2><?php  __('Field Data');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldData['FieldData']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field Names'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldData['FieldNames']['field_names'], array('controller' => 'field_names', 'action' => 'view', $fieldData['FieldNames']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldData['User']['name'], array('controller' => 'users', 'action' => 'view', $fieldData['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldData['Group']['name'], array('controller' => 'groups', 'action' => 'view', $fieldData['Group']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Datas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldData['CatalogDatas']['catalog_data'], array('controller' => 'catalog_datas', 'action' => 'view', $fieldData['CatalogDatas']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Data'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldData['FieldData']['data']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldData['FieldData']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldData['FieldData']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldData['FieldData']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Field Data', true), array('action' => 'edit', $fieldData['FieldData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Field Data', true), array('action' => 'delete', $fieldData['FieldData']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fieldData['FieldData']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Field Datas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field Data', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Field Names', true), array('controller' => 'field_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field Names', true), array('controller' => 'field_names', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Groups', true), array('controller' => 'groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Group', true), array('controller' => 'groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Datas', true), array('controller' => 'catalog_datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Datas', true), array('controller' => 'catalog_datas', 'action' => 'add')); ?> </li>
	</ul>
</div>
