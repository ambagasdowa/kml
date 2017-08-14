<div class="fieldNames view">
<h2><?php  __('Field Name');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldName['FieldName']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Names'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldName['CatalogNames']['catalog_name'], array('controller' => 'catalog_names', 'action' => 'view', $fieldName['CatalogNames']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Fields'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldName['CatalogFields']['catalog_field'], array('controller' => 'catalog_fields', 'action' => 'view', $fieldName['CatalogFields']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Datas'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($fieldName['CatalogDatas']['catalog_data'], array('controller' => 'catalog_datas', 'action' => 'view', $fieldName['CatalogDatas']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field Names'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldName['FieldName']['field_names']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Field Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldName['FieldName']['field_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldName['FieldName']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldName['FieldName']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $fieldName['FieldName']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Field Name', true), array('action' => 'edit', $fieldName['FieldName']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Field Name', true), array('action' => 'delete', $fieldName['FieldName']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $fieldName['FieldName']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Field Names', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Field Name', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Fields', true), array('controller' => 'catalog_fields', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Datas', true), array('controller' => 'catalog_datas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Datas', true), array('controller' => 'catalog_datas', 'action' => 'add')); ?> </li>
	</ul>
</div>
