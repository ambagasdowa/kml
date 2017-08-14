<div class="catalogFields view">
<h2><?php  __('Catalog Field');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogField['CatalogField']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Names'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($catalogField['CatalogNames']['catalog_name'], array('controller' => 'catalog_names', 'action' => 'view', $catalogField['CatalogNames']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Field'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogField['CatalogField']['catalog_field']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Catalog Field Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogField['CatalogField']['catalog_field_description']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Create'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogField['CatalogField']['create']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogField['CatalogField']['modified']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $catalogField['CatalogField']['status']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Catalog Field', true), array('action' => 'edit', $catalogField['CatalogField']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Catalog Field', true), array('action' => 'delete', $catalogField['CatalogField']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $catalogField['CatalogField']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Fields', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Field', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Catalog Names', true), array('controller' => 'catalog_names', 'action' => 'add')); ?> </li>
	</ul>
</div>
